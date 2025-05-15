<section class="relative min-h-[40vh] bg-gradient-to-r from-blue-600 to-cyan-400 flex items-center justify-center">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <!-- Headline -->
            <h1 class="text-3xl md:text-5xl font-bold text-white font-poppins mb-4 animate-fade-in">
                Siap Menonton Film Favoritmu?
            </h1>

            <!-- Subheadline -->
            <p class="text-base md:text-lg text-white/90 font-poppins font-light mb-8 animate-fade-in-delay">
                Jangan lewatkan keseruan film-film terbaru. Daftar atau masuk sekarang untuk mulai memesan tiket.
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 animate-fade-in-delay-600">
                <button onclick="openAuthModal('register')" 
                        class="px-8 py-4 bg-white text-blue-600 rounded-lg font-poppins font-bold 
                               hover:bg-blue-50 transform transition-all duration-300 
                               shadow-lg hover:shadow-xl w-full sm:w-auto nav-link-hover text-center">
                    Daftar Gratis
                </button>
                <button onclick="openAuthModal('login')" 
                        class="px-8 py-4 border-2 border-white text-white rounded-lg font-poppins
                               hover:bg-white hover:text-blue-600 transform nav-link-hover transition-all duration-300 
                               w-full sm:w-auto text-center">
                    Masuk Akun
                </button>
            </div>
        </div>
    </div>

    <!-- Decorative Elements -->
    <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-black/10 to-transparent"></div>
</section>
