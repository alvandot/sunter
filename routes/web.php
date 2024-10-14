<?php

use App\Livewire\Auth\Login;
use App\Livewire\Siswa\Index as SiswaIndex;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::livewire('/', Welcome::class)->name('home');
    Route::livewire('/siswa', SiswaIndex::class)->name('siswa.index');
});

Route::livewire('/login', Login::class)->name('login');
Route::livewire('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/login');
})->name('logout');
