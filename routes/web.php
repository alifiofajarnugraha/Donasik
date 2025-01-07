<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\ZakatController;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('homepage');
});

// Route untuk pengguna yang belum login (guest)
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

// Route untuk pengguna yang sudah login (auth)
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'showDashboardForm'])->name('dashboard');

    // Route untuk Volunteer
    Route::resource('volunteer', VolunteerController::class);

    // Route untuk Zakat
    Route::resource('zakat', ZakatController::class);

    // Route untuk Articles
    Route::resource('articles', ArticleController::class);
   

    // Route tambahan untuk Articles (History, Restore, Force Delete)
    //Route tambahan
    Route::get('/articles/history', [ArticleController::class, 'history'])->name('articles.history');
    Route::put('/articles/{id}/restore', [ArticleController::class, 'restore'])->name('articles.restore');
    Route::delete('/articles/{id}/force-delete', [ArticleController::class, 'forceDelete'])->name('articles.forceDelete');
    
   
});