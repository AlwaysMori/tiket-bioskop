<div class="container mx-auto">
    <!-- Header Section -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-semibold text-sky-500">Movie Catalog</h2>
            <span class="text-sm text-gray-400">List of all movies in the system.</span>
        </div>
        <button class="neo-button bg-gradient-to-r from-sky-400 to-sky-500 hover:from-sky-400/90 hover:to-sky-500/90 text-white font-semibold py-2.5 px-4 rounded-xl flex items-center transition-all duration-200 gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Add New Movie
        </button>
    </div>

    <!-- Table Section -->
    <div class="bg-white neo-shadow rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gradient-to-r from-sky-50 to-blue-50">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-semibold text-sky-500">Poster</th>
                        <th scope="col" class="px-6 py-4 font-semibold text-sky-500">Title</th>
                        <th scope="col" class="px-6 py-4 font-semibold text-sky-500">Genre</th>
                        <th scope="col" class="px-6 py-4 font-semibold text-sky-500">Duration</th>
                        <th scope="col" class="px-6 py-4 font-semibold text-sky-500">Release Date</th>
                        <th scope="col" class="px-6 py-4 font-semibold text-sky-500">Studio</th>
                        <th scope="col" class="px-6 py-4 font-semibold text-sky-500">Status</th>
                        <th scope="col" class="px-6 py-4 text-center font-semibold text-sky-500">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($movies as $movie)
                    <tr class="hover:bg-sky-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <img src="{{ $movie['poster_url'] }}" alt="{{ $movie['title'] }} Poster" class="h-20 w-auto rounded-lg shadow-sm">
                        </td>
                        <td class="px-6 py-4 font-medium text-slate-700">{{ $movie['title'] }}</td>
                        <td class="px-6 py-4 text-slate-600">{{ $movie['genre'] }}</td>
                        <td class="px-6 py-4 text-slate-600">{{ $movie['duration'] }}</td>
                        <td class="px-6 py-4 text-slate-600">{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</td>
                        <td class="px-6 py-4 text-slate-600">{{ $movie['studio'] ?? 'N/A' }}</td>
                        <td class="px-6 py-4">
                            @php
                                $statusClass = match(strtolower($movie['status'])) {
                                    'showing' => 'bg-sky-100 text-sky-600',
                                    'coming soon' => 'bg-amber-100 text-amber-600',
                                    'ended' => 'bg-rose-100 text-rose-600',
                                    default => 'bg-gray-100 text-gray-600'
                                };
                            @endphp
                            <span class="px-3 py-1 text-xs font-medium rounded-full {{ $statusClass }}">
                                {{ $movie['status'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                <button class="p-2 text-sky-500 hover:bg-sky-50 rounded-lg transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <button class="p-2 text-rose-400 hover:bg-rose-50 rounded-lg transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-12">
                            <div class="flex flex-col items-center justify-center text-center">
                                <div class="bg-sky-50 p-4 rounded-full mb-4">
                                    <svg class="w-8 h-8 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h18M3 16h18" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-sky-500 mb-2">No Movies Found</h3>
                                <p class="text-gray-400 max-w-sm">Start adding movies to your catalog to see them listed here.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="p-4 border-t border-gray-100">
            <div class="flex items-center justify-between text-sm text-gray-500">
                <p>
                    Showing <span class="font-medium">1</span> to <span class="font-medium">{{ count($movies) }}</span> of <span class="font-medium">{{ count($movies) }}</span> results
                </p>
                <div class="flex gap-1">
                    <button disabled class="neo-button px-3 py-1 rounded-lg text-gray-400 bg-gray-50">Previous</button>
                    <button class="neo-button px-3 py-1 rounded-lg text-sky-500 hover:bg-sky-50">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>
