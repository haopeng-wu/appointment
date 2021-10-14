<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class CheckoutController extends Controller
{
    public function checkout(Request $request){

        $appointment = $request->session('appt');
        dd($appointment);
        $start_end = $request->session('start_end');
        $html_snippet = $request->session('html_snippet');

        return view('to-pay', [
            'appt' => $appointment,
            'start_end' => $start_end,
            'html_snippet' => $html_snippet
        ]);
    }
}