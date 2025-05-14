@extends('layouts.app')

@section('content')
<!-- Header Component -->
@include('components.global.header')

<!-- Hero Section -->
<div class="relative min-h-screen">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <div class="w-full h-full bg-cover bg-center bg-no-repeat"
             style="background-image: url('{{ Storage::url('/img.jpg') }}');">
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/30"></div>
    </div>

    <!-- Hero Content -->
    <div class="relative container mx-auto px-4 pt-32">
        <div class="max-w-3xl mx-auto text-center opacity-0 animate-fade-in">
            <h1 class="text-5xl md:text-5xl font-bold text-white font-poppins mb-6 mt-20 leading-tight opacity-0 animate-fade-in-delay-300">
                <span class="whitespace-nowrap">Pesan Tiket Film</span> <span class="bg-gradient-to-r from-blue-400 via-blue-600 to-teal-500 text-transparent bg-clip-text">Lebih Mudah</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-200 font-poppins font-light mb-12 opacity-0 animate-fade-in-delay-600">
                Temukan film terbaru dan terpopuler, pesan tiket dengan mudah, dan nikmati pengalaman menonton terbaik
            </p>
            <a href="/movies" 
               class="inline-block px-8 py-4 bg-blue-600 text-white rounded-lg font-poppins font-semibold 
                      hover:bg-blue-700 hover:scale-105 transform transition-all duration-300 
                      shadow-lg hover:shadow-xl opacity-0 animate-fade-in-delay-900">
                Mulai Nonton Sekarang
            </a>
        </div>
    </div>
</div>

<!-- Content Section -->
<div class="bg-white">
    <div class="container mx-auto px-4 py-12">
        <div class="mb-8 scroll-reveal">
            <div class="flex space-x-8 border-b border-gray-200">
                <button onclick="switchTab('nowPlaying')" 
                        class="text-xl font-poppins font-bold pb-4 border-b-2 border-blue-600 text-blue-600 transition-all duration-300">
                    Sedang Tayang
                </button>
                <button onclick="switchTab('comingSoon')" 
                        class="text-xl font-poppins font-bold pb-4 border-b-2 border-transparent text-gray-400 hover:text-gray-600 transition-all duration-300">
                    Segera Hadir
                </button>
            </div>
        </div>

        <div class="relative">
            <div id="nowPlaying" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 transition-all duration-500 opacity-100 transform translate-x-0">
                <div class="scroll-reveal">
                    @include('components.movie-card', [
                        'id' => 1,
                        'title' => 'Godzilla x Kong',
                        'image' => 'https://image.tmdb.org/t/p/w500/qW4crfED8mpNDadPBrs0gYn2kPf.jpg',
                        'genres' => ['Action', 'Sci-Fi']
                    ])
                </div>
            </div>

            <div id="comingSoon" class="absolute top-0 left-0 w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 transition-all duration-500 opacity-0 transform translate-x-full">
                <div class="scroll-reveal">
                    @include('components.movie-card', [
                        'id' => 2,
                        'title' => 'Deadpool & Wolverine',
                        'image' => 'https://image.tmdb.org/t/p/w500/4yDGlG8wMFqgNsKxzYOeZHkLpBM.jpg',
                        'genres' => ['Action', 'Comedy']
                    ])
                </div>
            </div>
        </div>
    </div>
</div>

<!-- How It Works Section -->
<div class="bg-white border-t border-gray-100">
    <div class="scroll-reveal opacity-0">
        @includeIf('components.how-it-works')
    </div>
</div>


@include('components.hero-alt')

@include('components.global.footer')

<script>
    function switchTab(tabId) {
        const nowPlaying = document.getElementById('nowPlaying');
        const comingSoon = document.getElementById('comingSoon');
        
        if (tabId === 'nowPlaying') {
            // Animate nowPlaying in, comingSoon out
            nowPlaying.classList.remove('opacity-0', 'translate-x-full');
            nowPlaying.classList.add('opacity-100', 'translate-x-0');
            comingSoon.classList.add('opacity-0', 'translate-x-full');
            comingSoon.classList.remove('opacity-100', 'translate-x-0');
        } else {
            // Animate comingSoon in, nowPlaying out
            comingSoon.classList.remove('opacity-0', 'translate-x-full');
            comingSoon.classList.add('opacity-100', 'translate-x-0');
            nowPlaying.classList.add('opacity-0', 'translate-x-full');
            nowPlaying.classList.remove('opacity-100', 'translate-x-0');
        }
        
        // Update tab styles
        const tabs = document.querySelectorAll('[onclick^="switchTab"]');
        tabs.forEach(tab => {
            if (tab.getAttribute('onclick').includes(tabId)) {
                tab.classList.add('border-blue-600', 'text-blue-600');
                tab.classList.remove('border-transparent', 'text-gray-400');
            } else {
                tab.classList.remove('border-blue-600', 'text-blue-600');
                tab.classList.add('border-transparent', 'text-gray-400');
            }
        });
    }

    // Update observer options
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '50px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
                entry.target.classList.remove('opacity-0');
                entry.target.classList.add('opacity-100', 'transform', 'translate-y-0');
                entry.target.style.transition = 'all 0.8s ease-out';
            }
        });
    }, observerOptions);

    // Observe all scroll-reveal elements
    document.querySelectorAll('.scroll-reveal').forEach((element) => {
        element.style.transform = 'translateY(20px)';
        observer.observe(element);
    });
</script>
@endsection
