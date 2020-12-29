<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('business')->group(function () {
    Route::resource('businesses', "API\\BusinessAPIController");
});


Route::resource('orders', Modules\Business\Http\Controllers\API\OrderAPIController::class);

Route::resource('order_items', Modules\Business\Http\Controllers\API\OrderItemAPIController::class);