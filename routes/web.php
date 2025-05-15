<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('pages.home');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin/dashboard', function () {
    return view('pages.admin.dashboard');
})->name('admin.dashboard'); // Removed ->middleware('auth')

// Admin Routes
Route::middleware([/* 'isAdmin' */]) // Temporarily removed 'auth:sanctum', 'verified'
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('pages.admin.dashboard');
        })->name('dashboard');

        Route::get('/movies', function () {
            // Mock data will be defined in the Blade view for now
            // In a real application, you'd fetch this from a controller
            $mockMovies = [
                [
                    'id' => 1,
                    'title' => 'Inception',
                    'genre' => 'Sci-Fi, Thriller',
                    'duration' => '148 mins',
                    'release_date' => '2010-07-16',
                    'poster_url' => 'https://via.placeholder.com/100x150.png?text=Inception',
                    'status' => 'Showing',
                    'studio' => 'Studio 1',
                ],
                [
                    'id' => 2,
                    'title' => 'The Dark Knight',
                    'genre' => 'Action, Crime, Drama',
                    'duration' => '152 mins',
                    'release_date' => '2008-07-18',
                    'poster_url' => 'https://via.placeholder.com/100x150.png?text=Dark+Knight',
                    'status' => 'Showing',
                    'studio' => 'Studio 2',
                ],
                [
                    'id' => 3,
                    'title' => 'Interstellar',
                    'genre' => 'Sci-Fi, Drama, Adventure',
                    'duration' => '169 mins',
                    'release_date' => '2014-11-07',
                    'poster_url' => 'https://via.placeholder.com/100x150.png?text=Interstellar',
                    'status' => 'Coming Soon',
                    'studio' => 'Studio 1',
                ],
                [
                    'id' => 4,
                    'title' => 'Parasite',
                    'genre' => 'Thriller, Drama, Comedy',
                    'duration' => '132 mins',
                    'release_date' => '2019-05-30',
                    'poster_url' => 'https://via.placeholder.com/100x150.png?text=Parasite',
                    'status' => 'Ended',
                    'studio' => 'Studio 3',
                ],
            ];
            return view('pages.admin.movies.index', ['movies' => $mockMovies]);
        })->name('movies.index');

        // Add other admin routes here (e.g., users, bookings)
    });
