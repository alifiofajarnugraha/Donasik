<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\ZakatController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;

Route::get('/', function () {
    return view('homepage');
});

// Guest routes
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'showDashboardForm'])->name('dashboard');
    
    // Resource routes
    Route::resource('volunteer', VolunteerController::class);
    Route::resource('campaigns', CampaignController::class);
    
    // Zakat routes
    Route::resource('zakat', ZakatController::class);
    Route::post('/zakat/{zakat}/pay', [ZakatController::class, 'pay'])->name('zakat.pay');
    
    // Donation routes
    Route::get('/donations', [DonationController::class, 'index'])->name('donations.index');
    
    Route::get('/donations/create/{campaign}', [DonationController::class, 'create'])->name('donations.create');
    Route::post('/donations/store', [DonationController::class, 'store'])->name('donations.store');
    Route::get('/donations/{donation}/edit', [DonationController::class, 'edit'])->name('donations.edit');
    Route::put('/donations/{donation}', [DonationController::class, 'update'])->name('donations.update');
    Route::delete('/donations/{donation}', [DonationController::class, 'destroy'])->name('donations.destroy');
    Route::get('/my-donations', [DonationController::class, 'show'])->name('donations.show');
        
});