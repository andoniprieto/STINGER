<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Front-end (prototipoa, datu finkoekin)
Route::view('/', 'front-end.home');
Route::view('/ekitaldiak/{id}', 'front-end.detail');
Route::view('/saioa-hasi', 'front-end.login');
Route::view('/erregistratu', 'front-end.register');
Route::view('/erosi', 'front-end.buy');
Route::view('/erosita', 'front-end.done');
Route::view('/sarrerak', 'front-end.tickets');
Route::view('/profila', 'front-end.profile')->name('front-end.profila');
Route::view('/admin/ekitaldiak', 'front-end.admin.ekitaldiak.index')->name('ekitaldien.kudeaketa');
Route::view('/admin/ekitaldiak/sortu', 'front-end.admin.ekitaldiak.create');
Route::view('/admin/ekitaldiak/{id}', 'front-end.admin.ekitaldiak.show')->whereNumber('id');
Route::view('/admin/ekitaldiak/{id}/editatu', 'front-end.admin.ekitaldiak.edit')->whereNumber('id');

// Breeze-k saioa hasi/erregistratu ondoren 'dashboard'-era bidaltzen du: gure hasierara eraman
Route::redirect('/dashboard', '/')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/web-erabiltzaileak.php';
