<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\Admin\PengumumanController as AdminPengumumanController;


/*
|--------------------------------------------------------------------------
| Custom Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', function () {
    if (Auth::check()) return redirect()->route('dashboard');
    return view('auth.auth', ['page' => 'login']);
})->name('login');

Route::get('/register', function () {
    if (Auth::check()) return redirect()->route('dashboard');
    return view('auth.auth', ['page' => 'register']);
})->name('register');

// Pakai route bawaan Breeze/Fortify
require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return Auth::check() ? redirect()->route('dashboard') : view('welcome');
})->name('welcome');

/*
|--------------------------------------------------------------------------
| Dashboard Redirect sesuai Role
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    if (!Auth::check()) return redirect()->route('login');

    if (Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif (Auth::user()->role === 'siswa') {
        return redirect()->route('siswa.status');
    }

    Auth::logout();
    return redirect()->route('login')->withErrors('Role tidak valid.');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/
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
        Route::get('/form', [PendaftaranController::class, 'create'])->name('create');
        Route::post('/form', [PendaftaranController::class, 'store'])->name('store');
        Route::get('/status', [PendaftaranController::class, 'status'])->name('status');

        Route::get('/dashboard', function () {
            return view('siswa.dashboard');
        })->name('dashboard');

        // Pengumuman untuk siswa
        Route::get('/pengumuman', [\App\Http\Controllers\Siswa\PengumumanController::class, 'index'])
            ->name('pengumuman');
    });


/*
|--------------------------------------------------------------------------
| Rute Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Dashboard
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // ==========================
        // CRUD Pendaftaran
        // ==========================
        Route::get('/pendaftaran', [AdminController::class, 'pendaftaran'])->name('pendaftaran');
        Route::get('/pendaftaran/create', [AdminController::class, 'createPendaftaran'])->name('pendaftaran.create');
        Route::post('/pendaftaran', [AdminController::class, 'storePendaftaran'])->name('pendaftaran.store');
        Route::get('/pendaftaran/{id}/edit', [AdminController::class, 'editPendaftaran'])->name('pendaftaran.edit');
        Route::put('/pendaftaran/{id}', [AdminController::class, 'updatePendaftaran'])->name('pendaftaran.update');
        Route::delete('/pendaftaran/{id}', [AdminController::class, 'destroyPendaftaran'])->name('pendaftaran.destroy');

        // Verifikasi (ubah status jadi diterima)
        Route::put('/pendaftaran/{id}/verifikasi', [AdminController::class, 'verifikasi'])->name('pendaftaran.verifikasi');

        // ==========================
        // CRUD Pengumuman
        // ==========================
        Route::resource('pengumuman', PengumumanController::class);
    });


/*
|--------------------------------------------------------------------------
| Logout Manual (opsional, default Laravel pakai POST)
|--------------------------------------------------------------------------
*/
Route::get('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');
