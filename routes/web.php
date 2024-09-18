<?php

use App\Livewire\Dashboard;
use App\Livewire\Auth\Login;
use App\Livewire\Rumah\Rumah;
use App\Livewire\Auth\Register;
use App\Livewire\Penghuni\Penghuni;
use App\Livewire\Rumah\HistoryPenghuni;
use Illuminate\Support\Facades\Route;

Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/penghuni', Penghuni::class)->name('penghuni');
    Route::get('/rumah', Rumah::class)->name('rumah');
    Route::get('/history-penghuni', HistoryPenghuni::class)->name('history-penghuni');
});
