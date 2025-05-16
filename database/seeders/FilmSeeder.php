<?php

namespace Database\Seeders;

use App\Models\Film;
use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    public function run(): void
    {
        $films = [
            [
                'title' => 'Avengers: Secret Wars',
                'genre' => 'Action, Adventure, Sci-Fi',
                'duration' => 150,
                'status' => 'coming soon',
                'release_date' => '2024-12-25',
                'description' => 'The epic conclusion to the multiverse saga.',
            ],
            [
                'title' => 'The Batman 2',
                'genre' => 'Action, Crime, Drama',
                'duration' => 165,
                'status' => 'coming soon',
                'release_date' => '2024-10-15',
                'description' => 'Batman returns to protect Gotham from new threats.',
            ],
            [
                'title' => 'Oppenheimer',
                'genre' => 'Biography, Drama, History',
                'duration' => 180,
                'status' => 'showing',
                'release_date' => '2023-07-21',
                'description' => 'The story of American scientist J. Robert Oppenheimer and his role in the development of the atomic bomb.',
            ],
            [
                'title' => 'Barbie',
                'genre' => 'Adventure, Comedy, Fantasy',
                'duration' => 114,
                'status' => 'showing',
                'release_date' => '2023-07-21',
                'description' => 'Barbie suffers a crisis that leads her to question her world and her existence.',
            ],
            [
                'title' => 'Spider-Man: Across the Spider-Verse',
                'genre' => 'Animation, Action, Adventure',
                'duration' => 140,
                'status' => 'ended',
                'release_date' => '2023-06-02',
                'description' => 'Miles Morales catapults across the Multiverse.',
            ],
            [
                'title' => 'Mission: Impossible - Dead Reckoning Part One',
                'genre' => 'Action, Adventure, Thriller',
                'duration' => 163,
                'status' => 'showing',
                'release_date' => '2023-07-12',
                'description' => 'Ethan Hunt and his IMF team embark on their most dangerous mission yet.',
            ],
            [
                'title' => 'The Super Mario Bros. Movie',
                'genre' => 'Animation, Adventure, Comedy',
                'duration' => 92,
                'status' => 'ended',
                'release_date' => '2023-04-05',
                'description' => 'A plumber named Mario travels through an underground labyrinth with his brother, Luigi.',
            ],
            [
                'title' => 'Guardians of the Galaxy Vol. 3',
                'genre' => 'Action, Adventure, Comedy',
                'duration' => 150,
                'status' => 'ended',
                'release_date' => '2023-05-05',
                'description' => 'Still reeling from the loss of Gamora, Peter Quill rallies his team to defend the universe.',
            ],
            [
                'title' => 'Dune: Part Two',
                'genre' => 'Action, Adventure, Drama',
                'duration' => 165,
                'status' => 'coming soon',
                'release_date' => '2024-03-15',
                'description' => 'Paul Atreides unites with Chani and the Fremen to seek revenge against the conspirators.',
            ],
            [
                'title' => 'The Marvels',
                'genre' => 'Action, Adventure, Fantasy',
                'duration' => 135,
                'status' => 'coming soon',
                'release_date' => '2023-11-10',
                'description' => 'Carol Danvers teams up with Monica Rambeau and Kamala Khan.',
            ],
        ];

        foreach ($films as $film) {
            Film::create($film);
        }
    }
}
