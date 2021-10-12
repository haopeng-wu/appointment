<?php


namespace App\Http\Controllers;


use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        $slots = ['8:30~10:00', '10:30~12:00', '14:30~16:00', '16:30~18:00'];

        $attributes = request()->validate([
            'customer_name' => ["required"],
            'email' => ["required", "email"],
            'tel' => ["between:2,18"],
            'date' => ["required"],
            'which_slot' => ["required"]
        ]);

        // create the user and leave the password empty for now.
        $user = User::where('name', $attributes['customer_name'])->first();
        if (!$user) {
            $user = User::create(['name' => $attributes['customer_name'], 'email' => $attributes['email'], 'tel' => $attributes['tel']]);
        }
        $appointment_no = "AT" . date("ymdh") . random_int(1000, 9999);
        $attributes['appointment_no'] = $appointment_no;
        $attributes['customer_id'] = $user->id;

        $attributes['start_end_time'] = $slots[$attributes['which_slot'] - 1];

        // creat a record in the database for this appointment
        $appointment = Appointment::create($attributes);


        // make an order request to klarna, first step
        $rawBody = '{
          "purchase_country": "SE",
          "purchase_currency": "SEK",
          "locale": "en-SE",
          "order_amount": 10000,
          "order_tax_amount": 909,

          "order_lines": [
              {
                  "type": "digital",
                  "reference": "19-402-USA",
                  "name": "Counselling",
                  "quantity": 1,
                  "quantity_unit": "pcs",
                  "unit_price": 10000,
                  "tax_rate": 1000,
                  "total_amount": 10000,
                  "total_discount_amount": 0,
                  "total_tax_amount": 909
              }
            ],
          "merchant_urls": {
            "terms": "https://www.example.com/terms.html",
            "checkout": "https://www.wuhaopeng.site:22000/checkout",
            "confirmation": "https://www.wuhaopeng.site:22000/thank-you/%d",
            "push": "https://www.example.com/api/push?order_id={checkout.order.id}"
          }
        }';
        $rawBody = sprintf($rawBody, $appointment->id);
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


        $start_end = explode('~', $slots[$attributes['which_slot'] - 1]);

        return view('to-pay', [
            'appt' => $appointment,
            'start_end' => $start_end,
            'html_snippet' => $html_snippet
        ]);
    }
}
