<?php

use App\Http\Controllers\ErabiltzaileakController;
use App\Http\Controllers\SarrerakController;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Support\Facades\Route;

Route::get('/sarrerak', [SarrerakController::class, 'index'])->middleware(['auth', 'verified'])->name('front-end.tickets');

Route::get('/erosi/{id}', [SarrerakController::class, 'create'])->middleware(['auth', 'verified'])->name('front-end.buy');
Route::post('/erosi/{id}', [SarrerakController::class, 'store'])->middleware(['auth', 'verified'])->name('front-end.store');

//Route::get('/erosita/{id}', [SarrerakController::class, 'show'])->middleware(['auth', 'verified'])->name('front-end.show');

// Route::get('/admin/erabiltzaileak/{id}/edit', [ErabiltzaileakController::class, 'edit'])->middleware(['auth', 'verified'])->name('front-end.admin.erabiltzaileak.edit');
// Route::put('/admin/erabiltzaileak/{id}', [ErabiltzaileakController::class, 'update'])->middleware(['auth', 'verified'])->name('front-end.admin.erabiltzaileak.update');

// Route::delete('/admin/erabiltzaileak/{id}', [ErabiltzaileakController::class, 'destroy'])->middleware(['auth', 'verified'])->name('front-end.admin.erabiltzaileak.destroy');
