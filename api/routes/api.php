<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Publicly accessible routes for authentication
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// This route is protected and requires authentication
// It will be used by the frontend to check if a user is logged in
Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'user']);
