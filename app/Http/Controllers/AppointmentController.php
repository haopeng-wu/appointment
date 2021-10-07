<?php


namespace App\Http\Controllers;


use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function store(Request  $request)
    {
        $attributes = request()->validate([
            'customer_name'=>["required", ""],
            'email'=>["required","email"],
            'tel'=>["between:6,18"],
            'date'=>["required"],
            'which_slot'=>["required"]
        ]);

        // create the user and leave the password empty for now.
        $user = User::create(['name'=>$attributes['name'], 'email'=>$attributes['email'], 'tel'=>$attributes['tel']]);

        $appointment_no = "AT".date("ymdh").random_int(1000,9999);

        $attributes['appointment_no'] = $appointment_no;
        $attributes['customer_id'] = $user->id;
        $appointment = Appointment::create($attributes);
        dd($attributes);
    }
}