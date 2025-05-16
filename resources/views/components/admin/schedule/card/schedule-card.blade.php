<div class="bg-white rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 border border-gray-100">
    <div class="flex gap-6 p-6">
        <!-- Movie Poster with Hover Effect -->
        <div class="w-24 flex-shrink-0 group">
            <div class="relative overflow-hidden rounded-lg shadow-md">
                <img src="{{ $poster ?? 'https://via.placeholder.com/300x450' }}" 
                     alt="{{ $title ?? 'Movie Title' }}" 
                     class="w-full h-36 object-cover transform group-hover:scale-110 transition-transform duration-300">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>
        </div>
        
        <!-- Movie Info -->
        <div class="flex-1">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="font-bold text-lg text-gray-800 hover:text-blue-600 transition-colors cursor-pointer">{{ $title ?? 'Movie Title' }}</h3>
                    <p class="text-sm text-gray-500">{{ $genre ?? 'Genre' }}</p>
                </div>
                <span class="px-3 py-1 text-xs font-medium rounded-full {{ $status ?? 'bg-amber-100 text-amber-600' }}">
                    {{ $statusText ?? 'Belum Diatur' }}
                </span>
            </div>
            
            <!-- Schedule Times with Modern Layout -->
            <div class="mt-4 space-y-3">
                @php
                    $times = $schedules ?? ['10:00', '13:00', '16:00', '19:00'];
                @endphp
                
                @foreach($times as $time)
                <div class="flex items-center justify-between bg-gray-50 rounded-lg p-2 hover:bg-gray-100 transition-colors group">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700">{{ $time }}</span>
                    </div>
                    <div class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transform group-hover:translate-x-0 translate-x-2 transition-all duration-300">
                        <button class="px-3 py-1 text-xs font-medium rounded-lg bg-amber-100 text-amber-600 hover:bg-amber-200 focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Change Time
                        </button>
                        <button class="px-3 py-1 text-xs font-medium rounded-lg bg-blue-600 text-white hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                            Set Schedule
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Quick Actions -->
            <div class="mt-4 flex items-center gap-2">
                <button class="flex items-center gap-1 px-3 py-1.5 text-xs font-medium rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    View Details
                </button>
                <button class="flex items-center gap-1 px-3 py-1.5 text-xs font-medium rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add Time Slot
                </button>
            </div>
        </div>
    </div>
</div>
