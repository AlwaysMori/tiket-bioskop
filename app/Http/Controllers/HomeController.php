<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $nowPlaying = Film::where('status', 'showing')
            ->latest()
            ->limit(4)
            ->get()
            ->map(function ($film) {
                return [
                    'id' => $film->id_film,
                    'title' => $film->title,
                    'image' => $film->poster_file ? asset('storage/' . $film->poster_file) : 'https://placehold.co/400x600?text=No+Image',
                    'genres' => explode(', ', $film->genre)
                ];
            });

        $comingSoon = Film::where('status', 'coming soon')
            ->latest()
            ->limit(4)
            ->get()
            ->map(function ($film) {
                return [
                    'id' => $film->id_film,
                    'title' => $film->title,
                    'image' => $film->poster_file ? asset('storage/' . $film->poster_file) : 'https://placehold.co/400x600?text=No+Image',
                    'genres' => explode(', ', $film->genre)
                ];
            });

        return view('pages.home', compact('nowPlaying', 'comingSoon'));
    }
}
