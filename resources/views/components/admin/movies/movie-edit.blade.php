<div class="bg-white rounded-2xl p-8 max-w-4xl mx-auto">
    <h2 class="text-xl font-bold text-amber-600 mb-6 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
        </svg>
        Edit Movie: {{ $movie['title'] }}
    </h2>

    <form id="editMovieForm" action="{{ route('admin.movies.update', $movie['id']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="flex gap-8">
            <!-- Left Column - Poster -->
            <div class="w-1/3 space-y-4">
                <div class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-xl p-4">
                    <label class="block text-sm font-medium text-amber-700 mb-2">Movie Poster</label>
                    <div class="relative group">
                        <div class="w-full pb-[150%] relative rounded-lg overflow-hidden bg-gray-100">
                            <img src="{{ $movie['poster_url'] }}" alt="Current poster" 
                                 class="absolute inset-0 w-full h-full object-contain"
                                 id="posterPreview">
                            <div class="absolute inset-0 flex items-center justify-center bg-gray-100" id="posterPlaceholder" style="display: none;">
                                <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" 
                                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="absolute inset-0 bg-black/50 group-hover:opacity-100 opacity-0 transition-opacity flex items-center justify-center">
                                <label for="editPosterFileInput" class="cursor-pointer text-white text-sm font-medium bg-white/20 backdrop-blur-sm px-4 py-2 rounded-lg">
                                    Change Poster
                                </label>
                            </div>
                        </div>
                        <input type="file" id="editPosterFileInput" name="poster_file" accept="image/*" class="hidden">
                    </div>
                    <p class="mt-2 text-xs text-amber-600">Current poster will be kept if no new image is uploaded</p>
                </div>

                <div class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-xl p-4">
                    <label class="block text-sm font-medium text-amber-700 mb-2">Movie Status</label>
                    <select name="status" class="w-full border border-amber-200 bg-white rounded-lg px-3 py-2 shadow-sm focus:ring-2 focus:ring-amber-400 focus:border-amber-500 transition-all duration-200 outline-none" required>
                        @foreach(['showing', 'coming soon', 'ended'] as $status)
                            <option value="{{ $status }}" {{ strtolower($movie['status']) == $status ? 'selected' : '' }}>
                                {{ ucfirst($status) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Right Column - Movie Details -->
            <div class="flex-1">
                <div class="grid grid-cols-2 gap-4">
                    <!-- Title -->
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                        <input type="text" name="title" value="{{ $movie['title'] }}"
                            class="w-full border border-amber-200 bg-white rounded-lg px-3 py-2 shadow-sm focus:ring-2 focus:ring-amber-400 focus:border-amber-500 transition-all duration-200 outline-none"
                            required>
                    </div>

                    <!-- Genre and Duration -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Genre</label>
                        <input type="text" name="genre" value="{{ $movie['genre'] }}"
                            class="w-full border border-amber-200 bg-white rounded-lg px-3 py-2 shadow-sm focus:ring-2 focus:ring-amber-400 focus:border-amber-500 transition-all duration-200 outline-none"
                            required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Duration <span class="text-xs text-gray-400">(minutes)</span></label>
                        <input type="number" name="duration" value="{{ (int)$movie['duration'] }}"
                            class="w-full border border-amber-200 bg-white rounded-lg px-3 py-2 shadow-sm focus:ring-2 focus:ring-amber-400 focus:border-amber-500 transition-all duration-200 outline-none"
                            min="1" required>
                    </div>

                    <!-- Release Date -->
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Release Date</label>
                        <input type="date" name="release_date" 
                            value="{{ \Carbon\Carbon::parse($movie['release_date'])->format('Y-m-d') }}"
                            class="w-full border border-amber-200 bg-white rounded-lg px-3 py-2 shadow-sm focus:ring-2 focus:ring-amber-400 focus:border-amber-500 transition-all duration-200 outline-none"
                            required>
                    </div>

                    <!-- Description -->
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="description" rows="6"
                            class="w-full border border-amber-200 bg-white rounded-lg px-3 py-2 shadow-sm focus:ring-2 focus:ring-amber-400 focus:border-amber-500 transition-all duration-200 outline-none resize-none"
                            required>{{ $movie['description'] }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-6 flex justify-end gap-2 border-t border-gray-100 mt-6">
            <button type="button" onclick="closeMovieEdit()" 
                class="neo-button bg-white hover:bg-gray-50 text-gray-600 font-semibold py-2.5 px-6 rounded-xl transition-all duration-200 border border-gray-200">
                Cancel
            </button>
            <button type="submit" 
                class="neo-button bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white font-semibold py-2.5 px-6 rounded-xl transition-all duration-200">
                Update Movie
            </button>
        </div>
    </form>
</div>

<script>
    const posterInput = document.getElementById('editPosterFileInput');
    const posterImg = document.getElementById('posterPreview');
    const posterPlaceholder = document.getElementById('posterPlaceholder');

    // Check if initial image exists
    function checkImage(url) {
        const img = new Image();
        img.onload = () => {
            posterImg.style.display = 'block';
            posterPlaceholder.style.display = 'none';
        };
        img.onerror = () => {
            posterImg.style.display = 'none';
            posterPlaceholder.style.display = 'flex';
        };
        img.src = url;
    }

    // Check initial image
    checkImage(posterImg.src);

    posterInput.addEventListener('change', function(e) {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                posterImg.src = e.target.result;
                posterImg.style.display = 'block';
                posterPlaceholder.style.display = 'none';
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
