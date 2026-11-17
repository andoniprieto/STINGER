<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Front-end (prototipoa). Back-end-a dutenak web-ekitaldiak.php eta web-sarrerak.php fitxategietan daude
Route::view('/', 'front-end.home');
Route::view('/saioa-hasi', 'front-end.login');
Route::view('/erregistratu', 'front-end.register');
Route::view('/profila', 'front-end.profile')->name('front-end.profila');

// Breeze-k saioa hasi/erregistratu ondoren 'dashboard'-era bidaltzen du: gure hasierara eraman
Route::redirect('/dashboard', '/')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/web-erabiltzaileak.php';
require __DIR__.'/web-ekitaldiak.php';
require __DIR__.'/web-sarrerak.php';

