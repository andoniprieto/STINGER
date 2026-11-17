<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Front-end (prototipoa, datu finkoekin)
Route::view('/', 'front-end.home');
//Route::view('/ekitaldiak/{id}', 'front-end.detail');
Route::view('/saioa-hasi', 'front-end.login');
Route::view('/erregistratu', 'front-end.register');
Route::view('/erosi', 'front-end.buy');
Route::view('/erosita', 'front-end.done');
Route::view('/sarrerak', 'front-end.tickets');
//Route::view('/admin/ekitaldiak', 'front-end.admin.ekitaldiak.index');
//Route::view('/admin/ekitaldiak/sortu', 'front-end.admin.ekitaldiak.create');
//Route::view('/admin/ekitaldiak/{id}/editatu', 'front-end.admin.ekitaldiak.edit');
//Route::view('/admin/erabiltzaileak', 'front-end.admin.users');
//Route::view('/admin/erabiltzaileak/sortu', 'front-end.admin.user-form');
//Route::view('/admin/erabiltzaileak/{id}', 'front-end.admin.user-show');
//Route::view('/admin/erabiltzaileak/{id}/editatu', 'front-end.admin.user-form');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/web-erabiltzaileak.php';
require __DIR__.'/web-ekitaldiak.php';
