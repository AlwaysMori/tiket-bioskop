<div class="container mx-auto">
    <!-- Header Section -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-semibold text-sky-500">Movie Catalog</h2>
            <span class="text-sm text-gray-400">List of all movies in the system.</span>
        </div>
        <button id="openAddMovieModal" type="button" class="neo-button bg-gradient-to-r from-sky-400 to-sky-500 hover:from-sky-400/90 hover:to-sky-500/90 text-white font-semibold py-2.5 px-4 rounded-xl flex items-center transition-all duration-200 gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Add New Movie
        </button>
    </div>

    <!-- Modal Popup -->
    <div id="addMovieModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 transition-opacity duration-300 opacity-0 pointer-events-none">
        <div id="addMovieModalContent" class="bg-white rounded-2xl shadow-xl max-w-lg w-full relative p-0 scale-95 opacity-0 transition-all duration-300">
            <button id="closeAddMovieModal" type="button" class="absolute top-3 right-3 text-gray-400 hover:text-rose-500 text-2xl font-bold z-10">&times;</button>
            <div class="p-2">
                <x-admin.movies.movie-form />
            </div>
        </div>
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
                                <button onclick="showMovieDetail({{ $movie['id'] }})" class="p-2 text-sky-500 hover:bg-sky-50 rounded-lg transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <button onclick="showMovieEdit({{ $movie['id'] }})" class="p-2 text-amber-500 hover:bg-amber-50 rounded-lg transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <button onclick="confirmDelete({{ $movie['id'] }}, '{{ $movie['title'] }}')" class="p-2 text-rose-500 hover:bg-rose-50 rounded-lg transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
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
<!-- Add Detail Modal -->
<div id="movieDetailModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 transition-opacity duration-300 opacity-0 pointer-events-none">
    <div id="movieDetailContent" class="bg-white rounded-2xl shadow-xl max-w-2xl w-full relative p-6 scale-95 opacity-0 transition-all duration-300">
        <button onclick="closeMovieDetail()" class="absolute top-3 right-3 text-gray-400 hover:text-rose-500 text-2xl font-bold">&times;</button>
        <div id="movieDetailBody">
            <!-- Will be populated by x-admin.movies.movie-detail -->
        </div>
    </div>
</div>

<!-- Add Edit Modal -->
<div id="movieEditModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 transition-opacity duration-300 opacity-0 pointer-events-none">
    <div id="movieEditContent" class="bg-white rounded-2xl shadow-xl max-w-2xl w-full relative p-0 scale-95 opacity-0 transition-all duration-300">
        <button onclick="closeMovieEdit()" class="absolute top-3 right-3 text-gray-400 hover:text-rose-500 text-2xl font-bold z-10">&times;</button>
        <div id="movieEditBody">
            <!-- Content will be loaded dynamically -->
        </div>
    </div>
</div>

<!-- Add Delete Confirmation Modal -->
<div id="deleteConfirmModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 transition-opacity duration-300 opacity-0 pointer-events-none">
    <div id="deleteConfirmContent" class="bg-white rounded-2xl shadow-xl max-w-md w-full relative p-6 scale-95 opacity-0 transition-all duration-300">
        <div class="text-center">
            <div class="w-16 h-16 rounded-full bg-rose-50 text-rose-500 flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mb-1">Delete Confirmation</h3>
            <p class="text-gray-500 mb-6">Are you sure you want to delete "<span id="deleteMovieTitle" class="font-medium"></span>"? This action cannot be undone.</p>
            
            <div class="flex justify-center gap-3">
                <button onclick="closeDeleteConfirm()" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-lg transition-colors">
                    Cancel
                </button>
                <form id="deleteMovieForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-rose-500 hover:bg-rose-600 text-white rounded-lg transition-colors">
                        Delete Movie
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const openBtn = document.getElementById('openAddMovieModal');
        const closeBtn = document.getElementById('closeAddMovieModal');
        const modal = document.getElementById('addMovieModal');
        const modalContent = document.getElementById('addMovieModalContent');
        // Cancel button in form
        let cancelBtn = null;
        // Wait for form to render
        setTimeout(() => {
            cancelBtn = document.getElementById('cancelMovieForm');
            if (cancelBtn) {
                cancelBtn.addEventListener('click', closeModal);
            }
        }, 300);

        function openModal() {
            modal.classList.remove('pointer-events-none');
            modal.classList.remove('opacity-0');
            modal.classList.add('opacity-100');
            setTimeout(() => {
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);
        }
        function closeModal() {
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                modal.classList.remove('opacity-100');
                modal.classList.add('opacity-0', 'pointer-events-none');
            }, 250);
        }

        if (openBtn && closeBtn && modal && modalContent) {
            openBtn.addEventListener('click', openModal);
            closeBtn.addEventListener('click', closeModal);
            // Optional: close modal on backdrop click
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    closeModal();
                }
            });
        }
        // Re-bind cancel button after modal opens (in case form is re-rendered)
        modal.addEventListener('transitionend', function() {
            cancelBtn = document.getElementById('cancelMovieForm');
            if (cancelBtn) {
                cancelBtn.onclick = closeModal;
            }
        });
    });

    function showMovieDetail(id) {
        fetch(`/admin/movies/${id}`)
            .then(response => response.json())
            .then(movie => {
                // Calculate status class
                const statusClass = getStatusClass(movie.status);
                
                // Render the movie-detail component via a separate endpoint
                fetch(`/admin/movies/${id}/detail-component`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    document.getElementById('movieDetailBody').innerHTML = html;
                    openModal('movieDetailModal', 'movieDetailContent');
                });
            });
    }

    function getStatusClass(status) {
        return {
            'showing': 'bg-sky-100 text-sky-600',
            'coming soon': 'bg-amber-100 text-amber-600',
            'ended': 'bg-rose-100 text-rose-600'
        }[status.toLowerCase()] || 'bg-gray-100 text-gray-600';
    }

    function showMovieEdit(id) {
        fetch(`/admin/movies/${id}`)
            .then(response => response.json())
            .then(movie => {
                // Render the movie-edit component via a separate endpoint
                fetch(`/admin/movies/${id}/edit-component`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    document.getElementById('movieEditBody').innerHTML = html;
                    openModal('movieEditModal', 'movieEditContent');
                });
            });
    }

    function openModal(modalId, contentId) {
        const modal = document.getElementById(modalId);
        const content = document.getElementById(contentId);
        modal.classList.remove('pointer-events-none', 'opacity-0');
        setTimeout(() => {
            content.classList.remove('scale-95', 'opacity-0');
            content.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeMovieDetail() {
        closeModal('movieDetailModal', 'movieDetailContent');
    }

    function closeMovieEdit() {
        closeModal('movieEditModal', 'movieEditContent');
    }

    function closeModal(modalId, contentId) {
        const modal = document.getElementById(modalId);
        const content = document.getElementById(contentId);
        content.classList.remove('scale-100', 'opacity-100');
        content.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            modal.classList.add('pointer-events-none', 'opacity-0');
        }, 200);
    }

    function confirmDelete(id, title) {
        const modal = document.getElementById('deleteConfirmModal');
        const content = document.getElementById('deleteConfirmContent');
        const titleSpan = document.getElementById('deleteMovieTitle');
        const form = document.getElementById('deleteMovieForm');
        
        titleSpan.textContent = title;
        form.action = `/admin/movies/${id}`;
        
        modal.classList.remove('pointer-events-none', 'opacity-0');
        setTimeout(() => {
            content.classList.remove('scale-95', 'opacity-0');
            content.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeDeleteConfirm() {
        const modal = document.getElementById('deleteConfirmModal');
        const content = document.getElementById('deleteConfirmContent');
        
        content.classList.remove('scale-100', 'opacity-100');
        content.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            modal.classList.add('pointer-events-none', 'opacity-0');
        }, 200);
    }
</script>
<style>
    #addMovieModal.opacity-100 {
        opacity: 1 !important;
        pointer-events: auto !important;
    }
    #addMovieModal.opacity-0 {
        opacity: 0 !important;
        pointer-events: none !important;
    }
    #addMovieModalContent.scale-100 {
        transform: scale(1) !important;
        opacity: 1 !important;
    }
    #addMovieModalContent.scale-95 {
        transform: scale(0.95) !important;
        opacity: 0 !important;
    }
</style>
