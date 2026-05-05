<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/events', [\App\Http\Controllers\EventController::class, 'index']);
