<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
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


Route::get('/', [\App\Http\Controllers\HomeController::class, 'home']);

Route::post('/appointment', 'App\Http\Controllers\AppointmentController@store');

Route::get('/checkout', [\App\Http\Controllers\CheckoutController::class, 'checkout']);

Route::get('/thank-you/{appointment}', [\App\Http\Controllers\ConfirmationController::class, 'render']);

Route::get('/confirmation/push/{appointment}', [\App\Http\Controllers\ConfirmationController::class, 'push']);

Route::post('/confirmation/push/{appointment}', [\App\Http\Controllers\ConfirmationController::class, 'push']);

Route::get('/ack/{appointment}', [\App\Http\Controllers\ConfirmationController::class, 'ack']);

Route::get('/check-server/{appointment}', function (\App\Models\Appointment $appointment) {
    dd($appointment);
});

Route::get('/appointment/{appointment}/details', [\App\Http\Controllers\AppointmentController::class, 'retrieve']);

//Route::post('/validation/{appointment}', [\App\Http\Controllers\ConfirmationController::class, 'checkStock']);

Route::post('/validation/{appointment}', function (){
    Log::debug('in checkStock');
});

Route::get('/out-of-stock', function () { return view('out-of-stock');});

/*
 * admin
 */
Route::get('/admin', [\App\Http\Controllers\AdminDashController::class, 'index'])->name('admin');
Route::get('/dashboard', [\App\Http\Controllers\AdminDashController::class, 'dashboard'])->name('dashboard');

Route::post('/slots/update',[\App\Http\Controllers\SlotController::class, 'update']);
Route::post('/booked-slot-update', [\App\Http\Controllers\BookedSlotController::class, 'update']);
Route::post('/bookable-weekday/update',[\App\Http\Controllers\BookableWeekdayController::class, 'update']);
/*
 * test
 */
Route::get('/check-klarna/{appointment}', function (\App\Models\Appointment $appointment) {
    $klarna_order_id = $appointment->klarna_order_id;
    $response = Http::withBasicAuth('PK45418_9cb391cd02a1', 'ngVXPw5cTH02Rqyj')
        ->withHeaders(['content-type' => 'application/json'])
        ->get("https://api.playground.klarna.com/checkout/v3/orders/$klarna_order_id");
    dd($response->json());
});

Auth::routes();
