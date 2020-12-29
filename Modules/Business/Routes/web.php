<?php

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

Route::prefix('business')->group(function() {
    Route::get('/', 'BusinessController@index');
});


Route::resource('orders', Modules\Business\Http\Controllers\OrderController::class);

Route::resource('orderItems', Modules\Business\Http\Controllers\OrderItemController::class);