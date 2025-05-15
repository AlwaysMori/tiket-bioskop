<form action="{{ route('admin.movies.store') }}" method="POST" enctype="multipart/form-data" class="bg-white neo-shadow rounded-2xl p-8 max-w-xl mx-auto space-y-6">
    @csrf
    <h2 class="text-xl font-bold text-sky-600 mb-4">Add New Movie</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
            <input type="text" name="title"
                class="w-full border border-sky-200 bg-sky-50/50 rounded-lg px-3 py-2 shadow-sm focus:ring-2 focus:ring-sky-400 focus:border-sky-500 transition-all duration-200 outline-none"
                required>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Genre</label>
            <input type="text" name="genre"
                class="w-full border border-sky-200 bg-sky-50/50 rounded-lg px-3 py-2 shadow-sm focus:ring-2 focus:ring-sky-400 focus:border-sky-500 transition-all duration-200 outline-none"
                required>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Duration <span class="text-xs text-gray-400">(minutes)</span></label>
            <input type="number" name="duration"
                class="w-full border border-sky-200 bg-sky-50/50 rounded-lg px-3 py-2 shadow-sm focus:ring-2 focus:ring-sky-400 focus:border-sky-500 transition-all duration-200 outline-none"
                min="1" required>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
            <select name="status"
                class="w-full border border-sky-200 bg-sky-50/50 rounded-lg px-3 py-2 shadow-sm focus:ring-2 focus:ring-sky-400 focus:border-sky-500 transition-all duration-200 outline-none"
                required>
                <option value="showing">Showing</option>
                <option value="coming soon">Coming Soon</option>
                <option value="ended">Ended</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Studio</label>
            <select name="studio"
                class="w-full border border-sky-200 bg-sky-50/50 rounded-lg px-3 py-2 shadow-sm focus:ring-2 focus:ring-sky-400 focus:border-sky-500 transition-all duration-200 outline-none">
                <option value="">Select Studio</option>
                <option value="Studio 1">Studio 1</option>
                <option value="Studio 2">Studio 2</option>
                <option value="Studio 3">Studio 3</option>
                <option value="Studio 4">Studio 4</option>
            </select>
        </div>
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Upload Poster</label>
            <input type="file" name="poster_file" accept="image/*"
                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-sky-50 file:text-sky-700 hover:file:bg-sky-100 border border-sky-200 bg-sky-50/50 rounded-lg shadow-sm focus:ring-2 focus:ring-sky-400 focus:border-sky-500 transition-all duration-200 outline-none"
                id="posterFileInput">
            <div class="mt-2 flex items-center gap-4">
                <img id="posterPreview" src="" alt="Poster Preview" class="hidden h-20 rounded-lg shadow border border-gray-200">
                <span id="posterPreviewText" class="text-xs text-gray-400">No image selected</span>
            </div>
        </div>
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <textarea name="description" rows="4"
                class="w-full border border-sky-200 bg-sky-50/50 rounded-lg px-3 py-2 shadow-sm focus:ring-2 focus:ring-sky-400 focus:border-sky-500 transition-all duration-200 outline-none resize-none"
                required></textarea>
        </div>
    </div>
    <div class="pt-4 flex justify-end gap-2">
        <button type="button" id="cancelMovieForm" class="neo-button bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold py-2.5 px-6 rounded-xl transition-all duration-200">
            Cancel
        </button>
        <button type="submit" class="neo-button bg-gradient-to-r from-sky-500 to-blue-500 hover:from-sky-600 hover:to-blue-600 text-white font-semibold py-2.5 px-6 rounded-xl transition-all duration-200">
            Add Movie
        </button>
    </div>
</form>
<script>
    // Poster preview logic
    const posterFileInput = document.getElementById('posterFileInput');
    const posterPreview = document.getElementById('posterPreview');
    const posterPreviewText = document.getElementById('posterPreviewText');

    function showPosterPreview(src) {
        if (src) {
            posterPreview.src = src;
            posterPreview.classList.remove('hidden');
            posterPreviewText.classList.add('hidden');
        } else {
            posterPreview.src = '';
            posterPreview.classList.add('hidden');
            posterPreviewText.classList.remove('hidden');
        }
    }

    if (posterFileInput) {
        posterFileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(ev) {
                    showPosterPreview(ev.target.result);
                };
                reader.readAsDataURL(file);
            } else {
                showPosterPreview('');
            }
        });
    }
</script>


