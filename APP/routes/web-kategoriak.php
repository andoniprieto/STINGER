<?php

use App\Http\Controllers\KategoriakController;
use Illuminate\Support\Facades\Route;

// Kategorien kudeaketa (admin). web-erabiltzaileak.php-ren egitura bera.
Route::get('/admin/kategoriak', [KategoriakController::class, 'index'])->middleware(['auth', 'verified'])->name('front-end.admin.kategoriak.index');

Route::get('/admin/kategoriak/create', [KategoriakController::class, 'create'])->middleware(['auth', 'verified'])->name('front-end.admin.kategoriak.create');
Route::post('/admin/kategoriak', [KategoriakController::class, 'store'])->middleware(['auth', 'verified'])->name('front-end.admin.kategoriak.store');

Route::get('/admin/kategoriak/{id}/edit', [KategoriakController::class, 'edit'])->middleware(['auth', 'verified'])->name('front-end.admin.kategoriak.edit');
Route::put('/admin/kategoriak/{id}', [KategoriakController::class, 'update'])->middleware(['auth', 'verified'])->name('front-end.admin.kategoriak.update');

Route::delete('/admin/kategoriak/{id}', [KategoriakController::class, 'destroy'])->middleware(['auth', 'verified'])->name('front-end.admin.kategoriak.destroy');
