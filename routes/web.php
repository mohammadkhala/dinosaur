<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\WhyItemController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

// ===== Frontend =====
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/services/{slug}', [HomeController::class, 'service'])->name('service');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// ===== Admin Panel =====
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('services',  ServiceController::class)->except('show');
    Route::resource('portfolio', PortfolioController::class)->except('show');
    Route::resource('clients',   ClientController::class)->except('show');
    Route::resource('why',       WhyItemController::class)->except('show')
         ->parameters(['why' => 'why']);

    Route::get('messages',         [ContactMessageController::class, 'index'])->name('messages.index');
    Route::get('messages/{message}',[ContactMessageController::class, 'show'])->name('messages.show');
    Route::delete('messages/{message}',[ContactMessageController::class, 'destroy'])->name('messages.destroy');

    Route::get('settings',  [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Redirect old Breeze dashboard to admin
Route::get('/dashboard', fn() => redirect()->route('admin.dashboard'))->middleware('auth');

require __DIR__.'/auth.php';
