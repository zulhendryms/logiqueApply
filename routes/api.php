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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('/users', \App\Http\Controllers\Api\UserController::class);
});

Route::prefix('v1/users')->middleware()->group(function () {
    Route::get('/list', 'UserController@index');
    Route::post('/store', 'UserController@store');
    Route::get('/show', 'UserController@show');
    Route::put('/update', 'UserController@update');
});