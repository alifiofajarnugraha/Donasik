<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\ZakatController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ArticleController;

// Route untuk halaman utama
Route::get('/', function () {
    return view('homepage');
});

// ==========================
// Routes untuk Guest (Belum Login)
// ==========================
Route::middleware(['guest'])->group(function () {
    // Login
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    // Register
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

// ==========================
// Routes untuk Authenticated User (Sudah Login)
// ==========================
Route::middleware(['auth'])->group(function () {
    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'showDashboardForm'])->name('dashboard');

    // ==========================
    // Resource Routes
    // ==========================
    // Volunteer
    Route::resource('volunteer', VolunteerController::class);

    // Campaigns
    Route::resource('campaigns', CampaignController::class);

    // Zakat
    Route::resource('zakat', ZakatController::class);
    Route::post('/zakat/{zakat}/pay', [ZakatController::class, 'pay'])->name('zakat.pay');

    // Articles
    Route::resource('articles', ArticleController::class);

    // ==========================
    // Routes Tambahan untuk Articles
    // ==========================
    Route::get('/articles/history', [ArticleController::class, 'history'])->name('articles.history');
    Route::put('/articles/{id}/restore', [ArticleController::class, 'restore'])->name('articles.restore');
    Route::delete('/articles/{id}/force-delete', [ArticleController::class, 'forceDelete'])->name('articles.forceDelete');

    // ==========================
    // Routes untuk Donations
    // ==========================
    Route::get('/donations', [DonationController::class, 'index'])->name('donations.index');
    Route::get('/donations/create/{campaign}', [DonationController::class, 'create'])->name('donations.create');
    Route::post('/donations/store', [DonationController::class, 'store'])->name('donations.store');
    Route::get('/donations/{donation}/edit', [DonationController::class, 'edit'])->name('donations.edit');
    Route::put('/donations/{donation}', [DonationController::class, 'update'])->name('donations.update');
    Route::delete('/donations/{donation}', [DonationController::class, 'destroy'])->name('donations.destroy');
    Route::get('/my-donations', [DonationController::class, 'show'])->name('donations.show');
});