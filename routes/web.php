<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    #return view('welcome');
    return view('home');
});

Route::post('/appointment', 'App\Http\Controllers\AppointmentController@store');

Route::get('/thank-you/{appointment}', [\App\Http\Controllers\ConfirmationController::class, 'render']);

Route::get('/confirmation/push/{appointment}', [\App\Http\Controllers\ConfirmationController::class, 'push']);

Route::post('/confirmation/push/{appointment}', [\App\Http\Controllers\ConfirmationController::class, 'push']);





Auth::routes();
