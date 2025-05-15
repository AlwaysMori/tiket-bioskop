@extends('layouts.admin.dashboard')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">Movie Catalog</h2>
            <span class="text-sm text-gray-500 dark:text-gray-400">List of all movies in the system.</span>
        </div>
        <button class="neo-button bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg flex items-center transition-colors duration-150 ease-in-out">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Add New Movie
        </button>
    </div>

    <div class="bg-white dark:bg-gray-800 neo-shadow rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs uppercase bg-blue-50 dark:bg-blue-700 text-blue-700 dark:text-blue-300">
                    <tr>
                        <th scope="col" class="px-6 py-3">Poster</th>
                        <th scope="col" class="px-6 py-3">Title</th>
                        <th scope="col" class="px-6 py-3">Genre</th>
                        <th scope="col" class="px-6 py-3">Duration</th>
                        <th scope="col" class="px-6 py-3">Release Date</th>
                        <th scope="col" class="px-6 py-3">Studio</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($movies as $movie)
                    <tr class="bg-white border-b dark:bg-blue-500 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            <img src="{{ $movie['poster_url'] }}" alt="{{ $movie['title'] }} Poster" class="h-20 w-auto rounded neo-shadow-inner">
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $movie['title'] }}
                        </td>
                        <td class="px-6 py-4">{{ $movie['genre'] }}</td>
                        <td class="px-6 py-4">{{ $movie['duration'] }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</td>
                        <td class="px-6 py-4">{{ $movie['studio'] ?? 'N/A' }}</td>
                        <td class="px-6 py-4">
                            @php
                                $statusClass = '';
                                switch (strtolower($movie['status'])) {
                                    case 'showing':
                                        $statusClass = 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300';
                                        break;
                                    case 'coming soon':
                                        $statusClass = 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300';
                                        break;
                                    case 'ended':
                                        $statusClass = 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300';
                                        break;
                                    default:
                                        $statusClass = 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300';
                                }
                            @endphp
                            <span class="px-2 py-1 text-xs font-medium rounded-full {{ $statusClass }}">
                                {{ $movie['status'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center space-x-2">
                                <button class="neo-button p-2 rounded-lg text-blue-600 hover:bg-blue-100 dark:text-blue-400 dark:hover:bg-blue-600/20 transition-colors duration-150 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <button class="neo-button p-2 rounded-lg text-red-500 hover:bg-red-100 dark:text-red-400 dark:hover:bg-red-600/20 transition-colors duration-150 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td colspan="8" class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-12 h-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464A5 5 0 008.464 15.536m0-7.072a5 5 0 017.072 0"></path></svg>
                                <p class="text-xl font-semibold">No movies found.</p>
                                <p class="text-sm">Try adding some movies to the catalog.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination (Placeholder) -->
        <div class="p-4 border-t border-gray-200 dark:border-gray-700">
            <nav class="flex items-center justify-between text-sm">
                <div>
                    <p class="text-gray-700 dark:text-gray-400">
                        Showing <span class="font-medium">1</span> to <span class="font-medium">{{ count($movies) }}</span> of <span class="font-medium">{{ count($movies) }}</span> results
                    </p>
                </div>
                <div class="flex space-x-1">
                    <button class="neo-button px-3 py-1 rounded-md text-blue-600 hover:text-blue-700 hover:bg-blue-100 dark:text-blue-400 dark:hover:text-blue-300 dark:hover:bg-blue-700/20 disabled:opacity-50" disabled>Previous</button>
                    <button class="neo-button px-3 py-1 rounded-md text-blue-600 hover:text-blue-700 hover:bg-blue-100 dark:text-blue-400 dark:hover:text-blue-300 dark:hover:bg-blue-700/20">Next</button>
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection
