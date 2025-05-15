<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    // Show all movies
    public function index()
    {
        $movies = Film::orderByDesc('created_at')->get()->map(function ($film) {
            return [
                'id' => $film->id_film,
                'title' => $film->title,
                'genre' => $film->genre,
                'duration' => $film->duration . ' min',
                'status' => ucfirst($film->status),
                'studio' => ucfirst($film->studio),
                'poster_url' => $film->poster_file ? asset('storage/' . $film->poster_file) : 'https://placehold.co/120x180?text=No+Image',
                'release_date' => $film->created_at,
                'description' => $film->description,
            ];
        });

        return view('pages.admin.movies.index', compact('movies'));
    }

    // Store new movie
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'status' => 'required|in:showing,coming soon,ended',
            'studio' => 'nullable|in:Studio 1,Studio 2,Studio 3,Studio 4',
            'poster_file' => 'nullable|image|max:2048',
            'description' => 'required|string',
        ]);

        // Studio value normalization
        if ($validated['studio']) {
            $validated['studio'] = strtolower($validated['studio']);
        }

        // Handle poster upload
        if ($request->hasFile('poster_file')) {
            $validated['poster_file'] = $request->file('poster_file')->store('posters', 'public');
        }

        // Tambahkan ini jika ada kolom release_date di tabel
        $validated['release_date'] = now();

        $film = Film::create($validated);

        return redirect()->route('admin.movies.index')->with('success', 'Movie added successfully!');
    }
}
