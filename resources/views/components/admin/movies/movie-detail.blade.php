<div class="bg-white neo-shadow rounded-2xl p-8 max-w-2xl mx-auto">
    <h2 class="text-xl font-bold text-sky-600 mb-6">Movie Details</h2>
    <div class="flex gap-8">
        <div class="w-1/3">
            <img src="{{ $movie['poster_url'] ?? 'https://placehold.co/300x450?text=No+Image' }}" 
                 alt="{{ $movie['title'] ?? 'Movie Poster' }}" 
                 class="w-full h-auto rounded-xl shadow-lg">
        </div>
        <div class="flex-1">
            <div class="space-y-4">
                <div>
                    <h3 class="text-2xl font-semibold text-gray-800">{{ $movie['title'] ?? 'Movie Title' }}</h3>
                    <span class="inline-block mt-2 px-3 py-1 text-xs font-medium rounded-full 
                        {{ $statusClass ?? 'bg-gray-100 text-gray-600' }}">
                        {{ $movie['status'] ?? 'Status' }}
                    </span>
                </div>
                
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="text-gray-500">Genre</p>
                        <p class="font-medium">{{ $movie['genre'] ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Duration</p>
                        <p class="font-medium">{{ $movie['duration'] ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Release Date</p>
                        <p class="font-medium">{{ isset($movie['release_date']) ? \Carbon\Carbon::parse($movie['release_date'])->format('F d, Y') : 'N/A' }}</p>
                    </div>
                </div>

                <div class="mt-6">
                    <p class="text-gray-500 text-sm mb-2">Description</p>
                    <p class="text-gray-700">{{ $movie['description'] ?? 'No description available.' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
