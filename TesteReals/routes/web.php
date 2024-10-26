<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::post('/update-status', [UserController::class, 'updateStatus'])->name('users.updateStatus');

Route::resource('users', UserController::class);
