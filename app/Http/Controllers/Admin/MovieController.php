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
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'genre' => 'required|string|max:255',
                'duration' => 'required|integer|min:1',
                'status' => 'required|in:showing,coming soon,ended',
                'poster_file' => 'nullable|image|mimes:jpg,jpeg,png|max:5120', // 5MB limit
                'description' => 'required|string',
                'release_date' => 'required|date',
            ], [
                'poster_file.max' => 'The poster file must not be larger than 5MB.',
            ]);

            // Handle poster upload
            if ($request->hasFile('poster_file')) {
                $validated['poster_file'] = $request->file('poster_file')->store('posters', 'public');
            }

            // Tambahkan ini jika ada kolom release_date di tabel
            $validated['release_date'] = now();

            $film = Film::create($validated);

            return redirect()->route('admin.movies.index')->with('success', 'Movie added successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'File upload failed! ' . $e->validator->errors()->first('poster_file'));
        }
    }

    // Show a single movie
    public function show(Film $film)
    {
        return response()->json([
            'id' => $film->id_film,
            'title' => $film->title,
            'genre' => $film->genre,
            'duration' => $film->duration,
            'status' => $film->status,
            'description' => $film->description,
            'poster_url' => $film->poster_file ? asset('storage/' . $film->poster_file) : null,
            'release_date' => $film->release_date,
        ]);
    }

    // Update an existing movie
    public function update(Request $request, Film $film)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'genre' => 'required|string|max:255',
                'duration' => 'required|integer|min:1',
                'status' => 'required|in:showing,coming soon,ended',
                'poster_file' => 'nullable|image|mimes:jpg,jpeg,png|max:12120', // 5MB limit
                'description' => 'required|string',
                'release_date' => 'required|date',
            ], [
                'poster_file.max' => 'The poster file must not be larger than 5MB.',
            ]);

            if ($request->hasFile('poster_file')) {
                if ($film->poster_file) {
                    Storage::disk('public')->delete($film->poster_file);
                }
                $validated['poster_file'] = $request->file('poster_file')->store('posters', 'public');
            }

            $film->update($validated);

            return redirect()->route('admin.movies.index')->with('success', 'Movie updated successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'File upload failed! ' . $e->validator->errors()->first('poster_file'));
        }
    }
    
    // Detail component for a single movie
    public function detailComponent(Film $film)
    {
        $movie = [
            'id' => $film->id_film,
            'title' => $film->title,
            'genre' => $film->genre,
            'duration' => $film->duration . ' min',
            'status' => ucfirst($film->status),
            'poster_url' => $film->poster_file ? asset('storage/' . $film->poster_file) : null,
            'release_date' => $film->release_date,
            'description' => $film->description,
        ];

        $statusClass = match(strtolower($film->status)) {
            'showing' => 'bg-sky-100 text-sky-600',
            'coming soon' => 'bg-amber-100 text-amber-600',
            'ended' => 'bg-rose-100 text-rose-600',
            default => 'bg-gray-100 text-gray-600'
        };

        return view('components.admin.movies.movie-detail', compact('movie', 'statusClass'));
    }

    // Edit component for a single movie
    public function editComponent(Film $film)
    {
        $movie = [
            'id' => $film->id_film,
            'title' => $film->title,
            'genre' => $film->genre,
            'duration' => $film->duration,
            'status' => $film->status,
            'poster_url' => $film->poster_file ? asset('storage/' . $film->poster_file) : null,
            'description' => $film->description,
            'release_date' => $film->release_date,
        ];

        return view('components.admin.movies.movie-edit', compact('movie'));
    }

    public function destroy(Film $film)
    {
        // Delete poster file if exists
        if ($film->poster_file) {
            Storage::disk('public')->delete($film->poster_file);
        }
        
        $film->delete();
        
        return redirect()->route('admin.movies.index')
            ->with('success', 'Movie deleted successfully!');
    }
}
