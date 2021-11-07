<?php


namespace App\Http\Controllers;


use App\Models\Appointment;
use App\Models\BookableWeekday;
use App\Models\BookedSlot;
use App\Models\Slot;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ViewErrorBag;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        Log::debug($request);
        /*
         * basic validation
         */
        $validator = Validator::make($request->all(), [
            'date' => ["required", 'date'],
            'which_slot' => ["required"]
        ]);

        /*
         *  double-booked validation
         */
        $validator->sometimes(
            'which_slot',
            'unique:appointments,which_slot,NULL,NULL,date,' . $validator->validated()['date'],
            function ($input) {
                return Appointment::isBookedAndPiad($input->date, $input->which_slot);
            });

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }

        $attributes = $validator->validated();

        /*
         * check the date belongs to future or is at least today
         */
        $today = Carbon::today()->subDays(1);
        $theDate = Carbon::make($attributes['date']);
        if (!$theDate->diff($today)->invert) {
            return redirect('/')
                // The withErrors method accepts a validator, a MessageBag, or a PHP array.
                ->withErrors(['date' => 'Can not book days in the past.'])
                ->withInput();
        }

        /*
         * check the date belongs to the bookable weekdays
         */
        $bookableFlags = BookableWeekday::allBookableDayFlags();
        #if ($bookableFlags[$theDate->locale('en_US')->dayName] != 1){
        if ($bookableFlags[$theDate->dayName] != 1) {
            return redirect('/')
                // The withErrors method accepts a validator, a MessageBag, or a PHP array.
                ->withErrors(['date' => 'The day of the week is not bookable.'])
                ->withInput();
        }

        /*
         * only for testing purpose
         */
        //BookedSlot::sealTheAppointment($attributes['date'], $attributes['which_slot']);

        /*
         * calculate the prices
         */
        $vat = 0.25;
        $prices = Slot::slotPrices();
        $charge = $prices[$attributes['which_slot']];

        $price = $charge / (1 + $vat);
        $tax = $charge - $price;

        /*
         * create the user and leave the password empty for now.
         */
        /*
         * $user = User::where('name', $attributes['customer_name'])->first();
        if (!$user) {
            $user = User::create(['name' => $attributes['customer_name'], 'email' => $attributes['email'], 'tel' => $attributes['tel']]);
        }
         */

        /*
         * prepare the data to store
         */
        $appointment_no = "AT" . date("ymdh") . random_int(1000, 9999);
        $attributes['appointment_no'] = $appointment_no;
        //$attributes['customer_id'] = $user->id;

        $slots = Slot::validSlots();
        $durations = Slot::slotDurations();
        $attributes['start_end_time'] = $slots[$attributes['which_slot']];
        $attributes['duration'] = $durations[$attributes['which_slot']];

        /*
         * creat a record in the database for this appointment
         */
        $appointment = Appointment::create($attributes);

        /*
         * make an order request to klarna, first step
         */
        $rawBody = '{
          "purchase_country": "SE",
          "purchase_currency": "SEK",
          "locale": "en-SE",
          "order_amount": %d,
          "order_tax_amount": %d,

          "order_lines": [
              {
                  "type": "digital",
                  "reference": "19-402-USA",
                  "name": "Counselling",
                  "quantity": 1,
                  "quantity_unit": "pcs",
                  "unit_price": %d,
                  "tax_rate": %d,
                  "total_amount": %d,
                  "total_discount_amount": 0,
                  "total_tax_amount": %d
              }
            ],
          "merchant_urls": {
            "terms": "https://www.example.com/terms.html",
            "checkout": "%s",
            "confirmation": "%sd",
            "push": "%s",
            "validation": "%s"
          }
        }';
        $checkoutUrl = url('/').'/checkout';
        $confirmationUrl = sprintf(url('/thank-you/').'%d', $appointment->id);
        $pushUrl = sprintf(url('/klarna/confirmation/push/').'%d', $appointment->id);
        $validationUrl = sprintf(url('/klarna/validation/').'%d', $appointment->id);
        $rawBody = sprintf($rawBody, $charge, $tax, $charge, intval($vat * 10000), $charge, $tax, $checkoutUrl, $confirmationUrl, $pushUrl, $validationUrl);
        /*
         *  make the call to klarna
         */
        $response = Http::withBasicAuth('PK45418_9cb391cd02a1', 'ngVXPw5cTH02Rqyj')
            ->withBody($rawBody, 'application/json')
            ->post("https://api.playground.klarna.com/checkout/v3/orders");

        if (!$response->successful()) {
            dd($response->json());
        }
        /*
         * get the order create response from klarna
         */
        $klarna_return = $response->json();
        /*
         * parse the order response
         */
        $klarna_order_id = $klarna_return['order_id'];
        //dd($klarna_order_id);
        $html_snippet = $klarna_return['html_snippet'];

        //$attributes['klarna_order_id'] = $klarna_order_id;

        $appointment->klarna_order_id = $klarna_order_id;
        $appointment->save();

        $start_end = explode('-', $slots[$attributes['which_slot']]);

        /*
         * flush these to the session to use it after the redirection
         */
        $request->session()->flash('appt', $appointment);
        $request->session()->flash('start_end', $start_end);
        $request->session()->flash('html_snippet', $html_snippet);


        return redirect('/checkout');
    }

    public function retrieve(Appointment $appointment)
    {
        return view('appointment-details', ['appointment' => $appointment]);
    }
}
