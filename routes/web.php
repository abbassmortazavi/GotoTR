<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('menus', App\Http\Controllers\MenuController::class);

Route::resource('food', App\Http\Controllers\FoodController::class);


Route::post('/login', '\App\Http\Controllers\UserController@login')->name('login.verification.resend');
Route::post('/register', '\App\Http\Controllers\UserController@register');
Route::post('/checkCode', '\App\Http\Controllers\UserController@checkCode');
Route::get('/resendCode', '\App\Http\Controllers\UserController@resendCode')->name('code.resendCode');


