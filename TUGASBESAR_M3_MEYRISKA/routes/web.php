<?php

use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('pasiens.index');
});

Route::resource('pasiens', PasienController::class);