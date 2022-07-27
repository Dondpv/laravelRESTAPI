<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('order', 'Order\OrderController@order');
Route::get('order/{id}', 'Order\OrderController@orderById');

Route::post('order', 'Order\OrderController@orderSave');

Route::put('order/{id}', 'Order\OrderController@orderEdit');

Route::delete('order/{order}', 'Order\OrderController@orderDelete');
