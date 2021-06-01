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

Route::get('/game/create', 'App\Http\Controllers\GameController@create');

Route::post('/game/enter', 'App\Http\Controllers\PlayGameController@enter');

Route::post('/game/store', 'App\Http\Controllers\GameController@store');

Route::post('/game/shuffle-cards', 'App\Http\Controllers\GameController@store');




Auth::routes();
