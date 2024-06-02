<?php

use App\Http\Controllers\SuccessController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/success/{proteinId}/{brothId}', [SuccessController::class, 'index'])->name('success.index');
