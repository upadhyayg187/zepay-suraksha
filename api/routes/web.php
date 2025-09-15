<?php

use Illuminate\Support\Facades\Route;

// This will load your Vue application
Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');