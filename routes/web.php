<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\Admin\PengumumanController as AdminPengumumanController;
use App\Http\Controllers\UploadController;

/*
|--------------------------------------------------------------------------
| Auth
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

/*
|--------------------------------------------------------------------------
| Rute Siswa
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:siswa'])
    ->prefix('siswa')
    ->name('siswa.')
    ->group(function () {
        // Formulir & Status
        Route::get('/form', [PendaftaranController::class, 'create'])->name('create');
        Route::post('/form', [PendaftaranController::class, 'store'])->name('store');
        Route::get('/status', [PendaftaranController::class, 'status'])->name('status');

        Route::get('/dashboard', function () {
            return view('siswa.dashboard');
        })->name('dashboard');

        // Pengumuman
        Route::get('/pengumuman', [\App\Http\Controllers\Siswa\PengumumanController::class, 'index'])
            ->name('pengumuman');

        /*
        |--------------------------------------------------------------------------
        | Upload Dokumen
        |--------------------------------------------------------------------------
        */
        Route::get('upload/{jenis}', [UploadController::class, 'index'])->name('dokumen.upload');
        Route::post('upload/{jenis}', [UploadController::class, 'store'])->name('dokumen.store');
        Route::get('dokumen', [UploadController::class, 'list'])->name('dokumen.index');
        Route::delete('dokumen/{id}', [UploadController::class, 'destroy'])->name('dokumen.destroy');
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

        // CRUD Pendaftaran
        Route::get('/pendaftaran', [AdminController::class, 'pendaftaran'])->name('pendaftaran');
        Route::get('/pendaftaran/create', [AdminController::class, 'createPendaftaran'])->name('pendaftaran.create');
        Route::post('/pendaftaran', [AdminController::class, 'storePendaftaran'])->name('pendaftaran.store');
        Route::get('/pendaftaran/{id}/edit', [AdminController::class, 'editPendaftaran'])->name('pendaftaran.edit');
        Route::put('/pendaftaran/{id}', [AdminController::class, 'updatePendaftaran'])->name('pendaftaran.update');
        Route::delete('/pendaftaran/{id}', [AdminController::class, 'destroyPendaftaran'])->name('pendaftaran.destroy');

        // Verifikasi
        Route::put('/pendaftaran/{id}/verifikasi', [AdminController::class, 'verifikasi'])->name('pendaftaran.verifikasi');

        // CRUD Pengumuman
        Route::resource('pengumuman', PengumumanController::class);
    });

/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/
Route::get('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');



// Upload dokumen siswa
Route::prefix('siswa')->name('siswa.')->group(function () {
    // Form upload per kategori
    Route::get('/upload/{jenis}', [UploadController::class, 'index'])
        ->name('upload');

    // Simpan dokumen
    Route::post('/upload/{jenis}', [UploadController::class, 'store'])
        ->name('upload.store');

    // List dokumen
    Route::get('/dokumen', [UploadController::class, 'list'])
        ->name('dokumen.index');

    // Hapus dokumen
    Route::delete('/upload/{id}', [UploadController::class, 'destroy'])
        ->name('upload.destroy');
});

Route::middleware(['auth', 'role:siswa'])
    ->prefix('siswa')
    ->name('siswa.')
    ->group(function () {
        Route::get('/upload/{jenis}', [UploadController::class, 'index'])->name('upload');
        Route::post('/upload/{jenis}', [UploadController::class, 'store'])->name('upload.store');

        Route::get('/dokumen', [UploadController::class, 'list'])->name('dokumen.index');
        Route::delete('/dokumen/{id}', [UploadController::class, 'destroy'])->name('dokumen.destroy');
    });



Route::middleware(['auth'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('upload/{jenis}', [UploadController::class, 'index'])->name('upload');
    Route::post('upload/{jenis}', [UploadController::class, 'store'])->name('upload.store');
    Route::get('upload-list', [UploadController::class, 'list'])->name('upload.list');
    Route::delete('upload/{id}', [UploadController::class, 'destroy'])->name('upload.destroy');
    Route::get('/siswa/upload', [UploadController::class, 'list'])->name('siswa.upload.index');

});

// 🔹 Halaman daftar semua dokumen (index utama upload)
Route::get('/siswa/upload', [UploadController::class, 'list'])
    ->name('siswa.upload.index');

// 🔹 Form upload per jenis dokumen
Route::get('/siswa/upload/{jenis}', [UploadController::class, 'index'])
    ->name('siswa.upload');

// 🔹 Proses simpan upload per jenis dokumen
Route::post('/siswa/upload/{jenis}', [UploadController::class, 'store'])
    ->name('siswa.upload.store');

// 🔹 Hapus dokumen
Route::delete('/siswa/upload/{id}', [UploadController::class, 'destroy'])
    ->name('siswa.upload.destroy');