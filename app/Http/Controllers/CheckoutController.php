<?php

namespace App\Http\Controllers;

class CheckoutController extends Controller
{
    public function checkout($appointment, $start_end, $html_snippet){
        return view('to-pay', [
            'appt' => $appointment,
            'start_end' => $start_end,
            'html_snippet' => $html_snippet
        ]);
    }
}