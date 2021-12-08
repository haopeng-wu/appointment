<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class CheckoutController extends Controller
{
    public function checkout(Request $request){

        $appointment = $request->session()->get('appt');
        $start_end = $request->session()->get('start_end');
        $html_snippet = $request->session()->get('html_snippet');

        if(isset($appointment)){
            return view('to-pay', [
                'appt' => $appointment,
                'start_end' => $start_end,
                'html_snippet' => $html_snippet
            ]);
        }else{
            redirect(route('fill-form'));
        }
    }
}