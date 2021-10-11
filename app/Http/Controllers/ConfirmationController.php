<?php


namespace App\Http\Controllers;


use App\Models\Appointment;

class ConfirmationController extends Controller
{
    public function render(Appointment $appointment){
        return view('thank-you', ['name'=>$appointment->customer_name]);
    }
}