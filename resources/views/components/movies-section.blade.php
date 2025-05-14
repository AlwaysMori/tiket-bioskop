<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold font-poppins">{{ $title }}</h2>
            <a href="/movies" class="text-blue-600 font-poppins hover:text-blue-700">Lihat Semua</a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($movies as $movie)
                @include('components.movie-card', [
                    'id' => $movie['id'],
                    'title' => $movie['title'],
                    'image' => $movie['image'],
                    'genres' => $movie['genres']
                ])
            @endforeach
        </div>
    </div>
</section>
