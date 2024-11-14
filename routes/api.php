<?php

use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {

	Route::controller(ClientController::class)->prefix('clients')->group(function () {
		Route::post('register', 'register');
		Route::post('login',    'login');
		Route::get( 'me',       'me')->middleware('auth:sanctum');

	});

	Route::apiResource('categories', CategoryController::class);
});


