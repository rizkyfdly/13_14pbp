<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\SoapController;

Route::get('/', [BukuController::class, 'index']);

Route::resource('buku', BukuController::class);