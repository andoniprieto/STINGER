<?php

use App\Http\Controllers\KategoriakController;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Support\Facades\Route;

Route::get('/kategoriak', [KategoriakController::class, 'index'])/*->middleware(['auth', 'verified'])*/ ->name('kategoriak');

Route::get('/kategoriak/create', [KategoriakController::class, 'create'])->middleware(['auth', 'verified'])->name('kategoriak.create');
Route::post('/kategoriak', [KategoriakController::class, 'store'])->withoutMiddleware(PreventRequestForgery::class)/*->middleware(['auth', 'verified'])*/ ->name('kategoriak.store');

Route::get('/kategoriak/{id}', [KategoriakController::class, 'show'])/*->middleware(['auth', 'verified'])*/ ->name('kategoriak.show');

Route::get('/kategoriak/{id}/edit', [KategoriakController::class, 'edit'])->middleware(['auth', 'verified'])->name('kategoriak.edit');
Route::put('/kategoriak/{id}', [KategoriakController::class, 'update'])->withoutMiddleware(PreventRequestForgery::class)/*->middleware(['auth', 'verified'])*/ ->name('kategoriak.update');

Route::delete('/kategoriak/{id}', [KategoriakController::class, 'destroy'])->withoutMiddleware(PreventRequestForgery::class)/*->middleware(['auth', 'verified'])*/ ->name('kategoriak.destroy');
