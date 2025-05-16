<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-semibold text-blue-700">Pengaturan Jadwal Tayang</h2>
                <span class="text-sm text-gray-400">Atur jadwal tayang film untuk setiap studio.</span>
            </div>
        </div>
        <div class="mt-8 bg-blue-50 mb-6 border border-blue-200 rounded-lg p-4">
            <p class="text-blue-700 text-sm">
                <b>Catatan:</b> Jadwal tayang film harus diatur terlebih dahulu sebelum tiket dapat dipesan oleh penonton.
            </p>
        </div>

        <!-- Studio Tabs -->
        <div class="flex gap-2 mb-6">
            <button class="studio-tab px-5 py-2 rounded-xl font-semibold transition-all duration-200 bg-blue-600 text-white" data-studio="1">Studio 1</button>
            <button class="studio-tab px-5 py-2 rounded-xl font-semibold transition-all duration-200 bg-white text-blue-600 hover:bg-blue-50" data-studio="2">Studio 2</button>
            <button class="studio-tab px-5 py-2 rounded-xl font-semibold transition-all duration-200 bg-white text-blue-600 hover:bg-blue-50" data-studio="3">Studio 3</button>
            <button class="studio-tab px-5 py-2 rounded-xl font-semibold transition-all duration-200 bg-white text-blue-600 hover:bg-blue-50" data-studio="4">Studio 4</button>
        </div>

        <!-- Studio Content -->
        <div class="relative">
            <!-- Studio 1 -->
            <div id="studio-1" class="studio-content opacity-100 transition-opacity duration-300">
                <h3 class="text-xl font-semibold text-blue-700 mb-4">Studio 1</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @include('components.admin.schedule.card.schedule-card', [
                        'title' => 'Avengers: Endgame',
                        'poster' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/or06FN3Dka5tukK1e9sl16pB3iy.jpg',
                        'genre' => 'Action, Sci-Fi',
                        'schedules' => ['10:00', '13:00', '16:00', '19:00']
                    ])
                    
                    @include('components.admin.schedule.card.schedule-card', [
                        'title' => 'Spider-Man: No Way Home',
                        'poster' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/1g0dhYtq4irTY1GPXvft6k4YLjm.jpg',
                        'genre' => 'Action, Adventure',
                        'schedules' => ['11:30', '14:30', '17:30', '20:30']
                    ])
                </div>
            </div>

            <!-- Studio 2 -->
            <div id="studio-2" class="studio-content opacity-0 transition-opacity duration-300 absolute top-0 left-0 w-full hidden">
                <h3 class="text-xl font-semibold text-blue-700 mb-4">Studio 2</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @include('components.admin.schedule.card.schedule-card', [
                        'title' => 'Inception',
                        'poster' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/9gk7adHYeDvHkCSEqAvQNLV5Uge.jpg',
                        'genre' => 'Sci-Fi, Thriller',
                        'schedules' => ['12:00', '15:00', '18:00', '21:00']
                    ])
                </div>
            </div>

            <!-- Studio 3 -->
            <div id="studio-3" class="studio-content opacity-0 transition-opacity duration-300 absolute top-0 left-0 w-full hidden">
                <h3 class="text-xl font-semibold text-blue-700 mb-4">Studio 3</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Empty state or other movies -->
                </div>
            </div>

            <!-- Studio 4 -->
            <div id="studio-4" class="studio-content opacity-0 transition-opacity duration-300 absolute top-0 left-0 w-full hidden">
                <h3 class="text-xl font-semibold text-blue-700 mb-4">Studio 4</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="col-span-full flex justify-center items-center bg-white rounded-xl p-8">
                        <div class="text-center">
                            <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h18M3 16h18" />
                            </svg>
                            <p class="text-gray-500">Belum ada film di studio ini</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('.studio-tab');
        let activeStudio = '1';

        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const studio = this.getAttribute('data-studio');
                if(studio === activeStudio) return;

                // Update tabs
                tabs.forEach(t => {
                    t.classList.remove('bg-blue-600', 'text-white');
                    t.classList.add('bg-white', 'text-blue-600');
                });
                this.classList.remove('bg-white', 'text-blue-600');
                this.classList.add('bg-blue-600', 'text-white');

                // Fade out current content
                const currentContent = document.getElementById(`studio-${activeStudio}`);
                currentContent.classList.add('opacity-0');

                setTimeout(() => {
                    currentContent.classList.add('hidden');
                    // Show new content
                    const newContent = document.getElementById(`studio-${studio}`);
                    newContent.classList.remove('hidden');
                    setTimeout(() => {
                        newContent.classList.remove('opacity-0');
                    }, 50);
                }, 300);

                activeStudio = studio;
            });
        });
    });
</script>

<style>
    .studio-content {
        min-width: 100%;
    }
    table {
        width: 100%;
    }
</style>
