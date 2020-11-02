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

//https://code.tutsplus.com/ru/tutorials/build-a-react-app-with-laravel-restful-backend-part-1-laravel-5-api--cms-29442
Route::get('products', function () {
    return response(['Product 1', 'Product 2', 'Product 3'], 200);
});
