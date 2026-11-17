<?php

use App\Http\Controllers\ErabiltzaileakController;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Support\Facades\Route;

Route::get('/admin/erabiltzaileak', [ErabiltzaileakController::class, 'index'])->middleware(['auth', 'verified'])->name('front-end.admin.erabiltzaileak.index');

Route::get('/admin/erabiltzaileak/create', [ErabiltzaileakController::class, 'create'])->middleware(['auth', 'verified'])->name('front-end.admin.erabiltzaileak.create');
Route::post('/admin/erabiltzaileak', [ErabiltzaileakController::class, 'store'])->middleware(['auth', 'verified'])->name('front-end.admin.erabiltzaileak.store');

Route::get('/admin/erabiltzaileak/{id}', [ErabiltzaileakController::class, 'show'])->middleware(['auth', 'verified'])->name('front-end.admin.erabiltzaileak.show');

Route::get('/admin/erabiltzaileak/{id}/edit', [ErabiltzaileakController::class, 'edit'])->middleware(['auth', 'verified'])->name('front-end.admin.erabiltzaileak.edit');
Route::put('/admin/erabiltzaileak/{id}', [ErabiltzaileakController::class, 'update'])->middleware(['auth', 'verified'])->name('front-end.admin.erabiltzaileak.update');

Route::delete('/admin/erabiltzaileak/{id}', [ErabiltzaileakController::class, 'destroy'])->middleware(['auth', 'verified'])->name('front-end.admin.erabiltzaileak.destroy');