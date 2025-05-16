<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin/dashboard', function () {
    return view('pages.admin.dashboard');
})->name('admin.dashboard'); // Removed ->middleware('auth')

// Admin Routes
Route::middleware(['auth']) // Temporarily removed 'auth:sanctum', 'verified'
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('pages.admin.dashboard');
        })->name('dashboard');

        Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
        Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');
        Route::get('/movies/{film}', [MovieController::class, 'show'])->name('movies.show');
        Route::put('/movies/{film}', [MovieController::class, 'update'])->name('movies.update');
        Route::delete('/movies/{film}', [MovieController::class, 'destroy'])->name('movies.destroy');
        Route::get('/movies/{film}/detail-component', [MovieController::class, 'detailComponent'])
            ->name('movies.detail-component');
        Route::get('/movies/{film}/edit-component', [MovieController::class, 'editComponent'])
            ->name('movies.edit-component');
        Route::get('/schedule', function () {
            return view('pages.admin.schedule.index');
        })->name('schedule.index');
        // Add other admin routes here (e.g., users, bookings)
    });
