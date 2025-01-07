<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonasiController; // Tambahkan ini untuk mengimpor DonationController
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\ZakatController;

Route::get('/', function () {
    return view('homepage');
});

// Menggunakan middleware guest untuk login dan register hanya bisa diakses oleh pengguna yang belum login
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

// Menggunakan middleware auth untuk memastikan hanya pengguna yang sudah login yang bisa logout dan mengakses dashboard
Route::middleware(['auth',])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'showDashboardForm']);
    // Route::get('/donasi', [DonasiController::class, 'index'])->name('donasi.index');
    // Route::get('/donasi/create', [DonasiController::class, 'create'])->name('donasi.create');
    // Route::post('/donasi', [DonasiController::class, 'store'])->name('donasi.store');
    // Route::get('/donasi/{donasi}', [DonasiController::class, 'show'])->name('donasi.show');
    // Route::get('/donasi/{donasi}/edit', [DonasiController::class, 'edit'])->name('donasi.edit');
    // Route::put('/donasi/{donasi}', [DonasiController::class, 'update'])->name('donasi.update');
    // Route::delete('/donasi/{donasi}', [DonasiController::class, 'destroy'])->name('donasi.destroy');
    // Route::resource('donais', DonasiController::class);
    Route::resource('volunteer', VolunteerController::class);

    
    Route::resource('zakat', ZakatController::class);
    Route::post('/zakat/{zakat}/pay', [ZakatController::class, 'pay'])->name('zakat.pay');

});
