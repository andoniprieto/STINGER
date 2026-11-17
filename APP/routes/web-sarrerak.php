<?php

use App\Http\Controllers\SarrerakController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/sarrerak', [SarrerakController::class, 'index'])->name('front-end.tickets');
    Route::get('/erosi/{id}', [SarrerakController::class, 'create'])->name('front-end.buy');
    Route::post('/erosi/{id}', [SarrerakController::class, 'store'])->name('front-end.store');
});
