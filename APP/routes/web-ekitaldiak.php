<?php

use App\Http\Controllers\EkitaldiakController;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Support\Facades\Route;

Route::get('/admin/ekitaldiak', [EkitaldiakController::class, 'index'])->middleware(['auth', 'verified'])->name('front-end.admin.ekitaldiak.index');

Route::get('/admin/ekitaldiak/create', [EkitaldiakController::class, 'create'])->middleware(['auth', 'verified'])->name('front-end.admin.ekitaldiak.create');
Route::post('/admin/ekitaldiak', [EkitaldiakController::class, 'store'])->middleware(['auth', 'verified'])->name('front-end.admin.ekitaldiak.store');

Route::get('/admin/ekitaldiak/{id}', [EkitaldiakController::class, 'show'])->middleware(['auth', 'verified'])->name('front-end.admin.ekitaldiak.show');
Route::get('/ekitaldiak/{id}', [EkitaldiakController::class, 'show'])->middleware(['auth', 'verified'])->name('front-end.ekitaldiak.show');


Route::get('/admin/ekitaldiak/{id}/edit', [EkitaldiakController::class, 'edit'])->middleware(['auth', 'verified'])->name('front-end.admin.ekitaldiak.edit');
Route::put('/admin/ekitaldiak/{id}', [EkitaldiakController::class, 'update'])->middleware(['auth', 'verified'])->name('front-end.admin.ekitaldiak.update');

Route::delete('/admin/ekitaldiak/{id}', [EkitaldiakController::class, 'destroy'])->middleware(['auth', 'verified'])->name('front-end.admin.ekitaldiak.destroy');