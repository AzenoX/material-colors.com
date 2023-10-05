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

Route::post('/test-mail-alexis', function () {
    mail('azen0x.alexis@gmail.com', 'Test mail', 'Test message');
})->name('send-email');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
