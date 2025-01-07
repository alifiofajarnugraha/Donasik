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
    Route::resource('volunteer', VolunteerController::class);

    
    Route::resource('zakat', ZakatController::class);
    Route::post('/zakat/{zakat}/pay', [ZakatController::class, 'pay'])->name('zakat.pay');

});
