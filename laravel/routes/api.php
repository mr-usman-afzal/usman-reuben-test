<?php

use App\Http\Controllers\Screen1Controller;
use App\Http\Controllers\Screen2Controller;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/screen-1-data', [Screen1Controller::class, "index"]);
Route::get('/screen-2-data', [Screen2Controller::class, "index"]);
