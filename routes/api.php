<?php

use App\Http\Controllers\BrothController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProteinController;
use Illuminate\Support\Facades\Route;





Route::middleware(['api-token'])->group(function () {
    Route::get('/proteins', [ProteinController::class, 'show'])->name('protein.show');
    Route::get('/broths', [BrothController::class, 'show'])->name('broth.show');
    Route::post('/orders', [OrderController::class, 'store'])->name('order.store');
});
