<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PendaftaranController;

// Rute Auth kustom (gabungan login & register dalam 1 file)
// Override Login & Register
Route::get('/login', function () {
    if (Auth::check()) return redirect()->route('dashboard');
    return view('auth.auth', ['page' => 'login']);
})->name('login');

Route::get('/register', function () {
    if (Auth::check()) return redirect()->route('dashboard');
    return view('auth.auth', ['page' => 'register']);
})->name('register');


// Proses login & register tetap pakai route bawaan Laravel Breeze/Fortify
require __DIR__ . '/auth.php';

// Landing page
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
})->name('welcome');

// Dashboard redirect sesuai role
Route::get('/dashboard', function () {
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    if (Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif (Auth::user()->role === 'siswa') {
        return redirect()->route('siswa.status');
    }

    Auth::logout();
    return redirect()->route('login')->withErrors('Role tidak valid.');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute Siswa
Route::middleware(['auth', 'role:siswa'])
    ->prefix('siswa')
    ->name('siswa.')
    ->group(function () {
        Route::get('/form', [PendaftaranController::class, 'create'])->name('form');
        Route::post('/form', [PendaftaranController::class, 'store'])->name('store');
        Route::get('/status', [PendaftaranController::class, 'status'])->name('status');
    });
        Route::get('/siswa/dashboard', function () {
        return view('siswa.dashboard');
    })->name('siswa.dashboard');

// Rute Publik
Route::get('/pengumuman', [PendaftaranController::class, 'pengumuman'])->name('pengumuman');

// Rute Admin
Route::middleware(['auth','role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class,'dashboard'])->name('dashboard');
        Route::get('/pendaftaran', [AdminController::class,'pendaftaran'])->name('pendaftaran');
        Route::post('/pendaftaran/{id}/verifikasi', [AdminController::class,'verifikasi'])->name('pendaftaran.verifikasi');
        Route::get('/pengumuman', [AdminController::class,'pengumuman'])->name('pengumuman');
    });

// Logout manual (opsional, default Laravel pakai POST)
Route::get('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');
