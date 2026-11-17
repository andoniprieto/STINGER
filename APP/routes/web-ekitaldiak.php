<?php

use App\Http\Controllers\EkitaldiakController;
use Illuminate\Support\Facades\Route;

// Ekitaldia saioa hasi gabe ere ikus daiteke (erosteko, saioa hasi behar da)
Route::get('/ekitaldiak/{id}', [EkitaldiakController::class, 'show'])->name('front-end.ekitaldiak.show');

// Kudeaketa: saioa hasita
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/ekitaldiak', [EkitaldiakController::class, 'index'])->name('front-end.admin.ekitaldiak.index');
    Route::get('/admin/ekitaldiak/create', [EkitaldiakController::class, 'create'])->name('front-end.admin.ekitaldiak.create');
    Route::post('/admin/ekitaldiak', [EkitaldiakController::class, 'store'])->name('front-end.admin.ekitaldiak.store');
    Route::get('/admin/ekitaldiak/{id}', [EkitaldiakController::class, 'show'])->name('front-end.admin.ekitaldiak.show');
    Route::get('/admin/ekitaldiak/{id}/edit', [EkitaldiakController::class, 'edit'])->name('front-end.admin.ekitaldiak.edit');
    Route::put('/admin/ekitaldiak/{id}', [EkitaldiakController::class, 'update'])->name('front-end.admin.ekitaldiak.update');
    Route::delete('/admin/ekitaldiak/{id}', [EkitaldiakController::class, 'destroy'])->name('front-end.admin.ekitaldiak.destroy');
});
