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

/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'welcome']);

//Route::get('/', [\App\Http\Controllers\HomeController::class, 'home']);

Route::post('/appointment', 'App\Http\Controllers\AppointmentController@store');

Route::get('/checkout', [\App\Http\Controllers\CheckoutController::class, 'checkout']);

Route::get('/thank-you/{appointment}', [\App\Http\Controllers\ConfirmationController::class, 'render']);

Route::get('/ack/{appointment}', [\App\Http\Controllers\ConfirmationController::class, 'ack']);

Route::get('/check-server/{appointment}', function (\App\Models\Appointment $appointment) {
    dd($appointment);
});

Route::get('/appointment/{appointment}/details', [\App\Http\Controllers\AppointmentController::class, 'retrieve']);
Route::get('/out-of-stock', function () { return view('out-of-stock');});

/*
 * klarna hook url
*/
Route::post('/klarna/confirmation/push/{appointment}', [\App\Http\Controllers\ConfirmationController::class, 'push']);
Route::post('/klarna/validation/{appointment}', [\App\Http\Controllers\ConfirmationController::class, 'checkStock']);

/*
 * zoom url
 */
Route::get('/zoom/redirect', function (){
    return "hello, this is zoom!";
});

Route::get('/zoom/index', function (){

});

/*
 * adm url
 */
Route::get('/admin3x6y', [\App\Http\Controllers\AdminDashController::class, 'index'])
    ->name('admin')->middleware('auth')->middleware('can:admin');
Route::get('/fds4fgdashboard5y9z', [\App\Http\Controllers\AdminDashController::class, 'dashboard'])
    ->name('dashboard')->middleware('auth')->middleware('can:admin');;

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

// aws hook url
Route::post('/aws/handle-bounces', [\App\Http\Controllers\AWSController::class, 'handle_bounces']);
Route::post('/aws/handle-complaints', [\App\Http\Controllers\AWSController::class, 'handle_complaints']);
Route::post('/aws/deliveries', [\App\Http\Controllers\AWSController::class, 'handle_deliveries']);

//Auth::routes();

require __DIR__.'/auth.php';
