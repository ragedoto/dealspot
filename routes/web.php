<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ModeratorController;

Route::get('/', [CategoryController::class, 'index'])
    ->name('home');

Route::get('/dashboard', function () {
    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/lots/{category}', [CategoryController::class, 'show'])
    ->name('lots.show');

Route::get('/lots/{category}/create', [ListingController::class, 'create'])
    ->middleware('auth')
    ->name('lots.create-listing');

Route::post('/lots', [ListingController::class, 'store'])
    ->middleware('auth')
    ->name('lots.store');

Route::get('/lots/listing/{listing}', [ListingController::class, 'show'])
    ->middleware('auth')
    ->name('lots.listing.show');

Route::delete('/lots/listing/{listing}', [ListingController::class, 'destroy'])
    ->middleware('auth')
    ->name('lots.listing.destroy');

Route::resource('orders', OrderController::class)
    ->middleware('auth');

Route::resource('reviews', ReviewController::class)
    ->middleware('auth');

Route::get('/admin', [AdminController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('admin.index');

Route::get('/moderator', [ModeratorController::class, 'index'])
    ->middleware(['auth', 'moderator'])
    ->name('moderator.index');

require __DIR__.'/auth.php';