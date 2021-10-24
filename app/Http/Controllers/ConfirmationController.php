<?php


namespace App\Http\Controllers;


use App\Models\Appointment;
use App\Models\BookedSlot;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ConfirmationController extends Controller
{
    public function render(Appointment $appointment)
    {
        /*
         *  make a request to klarna to retrieve the order
         */
        $klarna_order_id = $appointment->klarna_order_id;
        $response = Http::withBasicAuth('PK45418_9cb391cd02a1', 'ngVXPw5cTH02Rqyj')
            ->withHeaders(['content-type' => 'application/json'])
            ->get("https://api.playground.klarna.com/checkout/v3/orders/$klarna_order_id");
        if (!$response->successful()) {
            dd($response->json());
        }
        $klarna_return = $response->json();
        /*
         * Retrieve the customer info from klarna
         */
        $appointment->given_name = $klarna_return['given_name'];
        $appointment->family_name = $klarna_return['family_name'];
        if(isset($klarna_return['date_of_birth'])){
            $appointment->date_of_birth = $klarna_return['date_of_birth'];
        }
        if(isset($klarna_return['gender'])){
            $appointment->gender = $klarna_return['gender'];
        }

        $appointment->purchase_country = $klarna_return['purchase_country'];
        $appointment->purchase_currency = $klarna_return['purchase_currency'];
        $appointment->locale = $klarna_return['locale'];

        $appointment->order_amount = $klarna_return['order_amount'];
        $appointment->email = $klarna_return['email'];
        $appointment->street_address = $klarna_return['street_address'];
        $appointment->postal_code = $klarna_return['postal_code'];
        $appointment->city = $klarna_return['city'];
        $appointment->country = $klarna_return['country'];
        if(isset($klarna_return['phone'])){
            $appointment->phone = $klarna_return['phone'];
        }


        /*
         *  synchronize the checkout status
         */
        if ($klarna_return['status'] == 'checkout_complete') {
            BookedSlot::sealTheAppointment($appointment->date, $appointment->which_slot);
            $appointment->payment_status = 1;

            Http::withBasicAuth('PK45418_9cb391cd02a1', 'ngVXPw5cTH02Rqyj')
                ->withHeaders(['content-type' => 'application/json'])
                ->post("https://api.playground.klarna.com/ordermanagement/v1/orders/$klarna_order_id/acknowledge");
        }
        /*
         * Save to the database
         */
        $appointment->save();

        $html_snippet = $klarna_return['html_snippet'];

        return view('thank-you', ['name' => $appointment->customer_name, 'html_snippet' => $html_snippet]);
    }

    public function push(Appointment $appointment)
    {
        /*
         *  make a request to klarna to retrieve the order and confirm its status
         */
        $klarna_order_id = $appointment->klarna_order_id;
        Log::debug("pushed by klarna");
        //$klarna_order_id = $appointment->klarna_order_id;
        $response =
            Http::withBasicAuth('PK45418_9cb391cd02a1', 'ngVXPw5cTH02Rqyj')
                ->withHeaders(['content-type' => 'application/json', 'Authorization' => 'Basic pwhcueUff0MmwLShJiBE9JHA=='])
                ->get("https://api.playground.klarna.com/checkout/v3/orders/$klarna_order_id");
        if (!$response->successful()) {
            dd($response->json());
        }
        /*
         * read the response
         */
        $klarna_return = $response->json();
        Log::debug($klarna_return);

        if ($klarna_return['status'] == 'checkout_complete') {
            $appointment->payment_status = 1;
            $appointment->order_amount = $klarna_return['order_amount'];
            $appointment->save();

            Http::withBasicAuth('PK45418_9cb391cd02a1', 'ngVXPw5cTH02Rqyj')
                ->withHeaders(['content-type' => 'application/json'])
                ->post("https://api.playground.klarna.com/ordermanagement/v1/orders/$klarna_order_id/acknowledge");
        }
    }

    public function ack(Appointment $appointment)
    {
        $klarna_order_id = $appointment->klarna_order_id;
        $response = Http::withBasicAuth('PK45418_9cb391cd02a1', 'ngVXPw5cTH02Rqyj')
            ->withHeaders(['content-type' => 'application/json'])
            ->post("https://api.playground.klarna.com/ordermanagement/v1/orders/$klarna_order_id/acknowledge");
        dd($response->status());
    }

    public function checkStock(Appointment $appointment)
    {
        $date = $appointment->date;
        $which_slot = $appointment->which_slot;
        Log::debug('in checkStock');

        if (Appointment::isBookedAndPiad($date, $which_slot)) {
            /*
             * out of stock. reply with a HTTP status 200 OK
             */
            Log::debug('Okay! In stock.');
            return response('ok', 200)
                ->header('Content-Type', 'text/plain');
        } else {
            /*
             *  In stock, to reply with a HTTP status 303 and to include a Location header pointing to a page
             *  which informs the consumer why the purchase was not completed. The consumer will be redirected to this page.
             */
            Log::debug('Denied! Out of stock!');
            return response('see other', 303)
                ->header('Location ', '/out-of-stock');
        }
    }
}