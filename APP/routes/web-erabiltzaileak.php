<?php

use App\Http\Controllers\ErabiltzaileakController;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Support\Facades\Route;

Route::get('/erabiltzaileak', [ErabiltzaileakController::class, 'index'])/*->middleware(['auth', 'verified'])*/ ->name('erabiltzaileak');

Route::get('/erabiltzaileak/create', [ErabiltzaileakController::class, 'create'])->middleware(['auth', 'verified'])->name('erabiltzaileak.create');
Route::post('/erabiltzaileak', [ErabiltzaileakController::class, 'store'])->withoutMiddleware(PreventRequestForgery::class)/*->middleware(['auth', 'verified'])*/ ->name('erabiltzaileak.store');

Route::get('/erabiltzaileak/{id}', [ErabiltzaileakController::class, 'show'])/*->middleware(['auth', 'verified'])*/ ->name('erabiltzaileak.show');

Route::get('/erabiltzaileak/{id}/edit', [ErabiltzaileakController::class, 'edit'])->middleware(['auth', 'verified'])->name('erabiltzaileak.edit');
Route::put('/erabiltzaileak/{id}', [ErabiltzaileakController::class, 'update'])->withoutMiddleware(PreventRequestForgery::class)/*->middleware(['auth', 'verified'])*/ ->name('erabiltzaileak.update');

Route::delete('/erabiltzaileak/{id}', [ErabiltzaileakController::class, 'destroy'])->withoutMiddleware(PreventRequestForgery::class)/*->middleware(['auth', 'verified'])*/ ->name('erabiltzaileak.destroy');