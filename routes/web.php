<?php

use App\Livewire\Auth\Login;
use App\Livewire\Siswa\DetailSiswa;
use App\Livewire\Siswa\Index as SiswaIndex;
use App\Livewire\Siswa\SekolahAsal;
use App\Livewire\Tentor\Index as PengajarIndex;
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
    Route::get('/', Welcome::class)->name('home');
    Route::get('/siswa', SiswaIndex::class)->name('siswa.index');
    Route::get('/siswa/{id}', DetailSiswa::class)->name('siswa.detail');
    Route::get('/sekolah-asal', SekolahAsal::class)->name('sekolah-asal');
    Route::get('/pengajar', PengajarIndex::class)->name('pengajar.index');
});

Route::get('/login', Login::class)->name('login');
Route::get('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/login');
})->name('logout');
