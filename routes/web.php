<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

Route::get('home', [HomeController::class, 'index'])->name('test');

Route::prefix('tracks')->name('tracks.')->group(function () {
    Route::get('/', [TrackController::class, 'index'])->name('index');
});
