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
            'tel' => ["between:6,18"],
            'date' => ["required"],
            'which_slot' => ["required"]
        ]);

        // create the user and leave the password empty for now.
        $user = User::where('name', $attributes['customer_name'])->first();
        if (!$user) {
            $user = User::create(['name' => $attributes['customer_name'], 'email' => $attributes['email'], 'tel' => $attributes['tel']]);
        }
        $appointment_no = "AT" . date("ymdh") . random_int(1000, 9999);
        $attributes['start_end_time'] = $slots[$attributes['which_slot']];
        $attributes['appointment_no'] = $appointment_no;
        $attributes['customer_id'] = $user->id;
        $appointment = Appointment::create($attributes);
        $start_end = explode('~', $slots[$attributes['which_slot']]);

        // make an order request to klarna, first step
        $rawBody = '{
  "purchase_country": "GB",
  "purchase_currency": "GBP",
  "locale": "en-GB",
  "order_amount": 50000,
  "order_tax_amount": 4545,
  "order_lines": [
      {
          "type": "physical",
          "reference": "19-402-USA",
          "name": "Red T-Shirt",
          "quantity": 5,
          "quantity_unit": "pcs",
          "unit_price": 10000,
          "tax_rate": 1000,
          "total_amount": 50000,
          "total_discount_amount": 0,
          "total_tax_amount": 4545
      }
    ],
  "merchant_urls": {
    "terms": "https://www.example.com/terms.html",
    "checkout": "https://www.example.com/checkout.html?order_id={checkout.order.id}",
    "confirmation": "https://www.example.com/confirmation.html?order_id={checkout.order.id}",
    "push": "https://www.example.com/api/push?order_id={checkout.order.id}"
  }
}';
        /*
        $response = Http::dd()->withHeaders([
            'username' => 'PK45418_9cb391cd02a1',
            'password' => 'ngVXPw5cTH02Rqyj'
        ])->withBody($rawBody, 'application/json')
            ->post("https://api.playground.klarna.com/checkout/v3/orders");
        */
        $response = Http::dd()->withHeaders([
            'username' => 'PK45418_9cb391cd02a1',
            'password' => 'ngVXPw5cTH02Rqyj'
        ])->withBody($rawBody, 'application/json')
            ->post("https://api.playground.klarna.com/checkout/v3/orders",['data1'=>'data1']);
        //dd($response);
        return view('to_pay', ['appt' => $appointment, 'start_end' => $start_end]);
    }
}