<?php

use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReturnController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    // Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('book', BookController::class);
    Route::resource('book-category', BookCategoryController::class);
    Route::resource('user', UserController::class);
    Route::resource('borrow', BorrowController::class);

    Route::post('/borrow', [BorrowController::class, 'borrow'])->name('borrow.book');
    Route::post('/return', [ReturnController::class, 'return'])->name('return.book');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
