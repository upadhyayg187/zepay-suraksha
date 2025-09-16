<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

// Forward API calls for login and register to the AuthController
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Fallback route for the Vue application.
// This should always be the LAST route in this file.
Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');