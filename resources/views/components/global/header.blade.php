<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4">
        <nav class="flex items-center justify-between animate-fade-in">
            <div class="flex items-center space-x-6">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h18M3 16h18" />
                        </svg>
                    </div>
                    <a href="/" class="text-xl md:text-2xl font-bold nav-link-hover text-black-600 font-poppins hover:text-blue-600 transition-colors duration-300">CinemaTicket</a>
                </div>
                <div class="hidden md:flex space-x-4">
                    <a href="/featured" class="text-gray-600 font-poppins font-light hover:text-blue-600 transform transition-all duration-300 nav-link-hover">Film Unggulan</a>
                    <a href="/how-it-works" class="text-gray-600 font-poppins font-light hover:text-blue-600 transform transition-all duration-300 nav-link-hover">Cara Kerja</a>
                </div>
            </div>
            
            <!-- Search Bar - Hidden on Mobile -->
            <div class="hidden md:flex flex-1 max-w-2xl lg:max-w-3xl mx-4 lg:mx-8">
                <div class="relative group w-full">
                    <input type="text" 
                           placeholder="Cari film..." 
                           class="w-full px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none nav-link-hover focus:ring-2 focus:ring-blue-300 focus:border-blue-300 font-poppins font-semilight transition-all duration-300 group-hover:border-blue-200 group-hover:shadow-sm">
                    <button class="absolute right-3 top-2 hover:scale-110 transform transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 group-hover:text-blue-500 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Auth Buttons - Hidden on Mobile -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="#" onclick="openAuthModal('login'); return false;" class="px-4 py-2 text-gray-600 nav-link-hover font-poppins hover:text-blue-600 hover:scale-105 transform transition-all duration-300">Masuk</a>
                <a href="#" onclick="openAuthModal('register'); return false;" class="px-4 py-2 bg-blue-600 text-white rounded-lg font-poppins font-bold hover:bg-blue-700 hover:scale-105 hover:shadow-md transform transition-all duration-300">Daftar</a>
            </div>

            <!-- Mobile Menu Button -->
            <button onclick="toggleMobileMenu()" class="md:hidden text-gray-600 hover:text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </nav>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="transform transition-all duration-300 ease-in-out max-h-0 overflow-hidden">
            <div class="flex flex-col space-y-3 pb-3">
                <!-- Mobile Search -->
                <div class="relative w-full">
                    <input type="text" 
                           placeholder="Cari film..." 
                           class="w-full px-3 py-1.5 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 font-poppins text-xs">
                    <button class="absolute right-2.5 top-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
                
                <!-- Mobile Nav Links -->
                <a href="/featured" class="text-gray-600 font-poppins text-sm py-1.5">Film Unggulan</a>
                <a href="/how-it-works" class="text-gray-600 font-poppins text-sm py-1.5">Cara Kerja</a>
                
                <!-- Mobile Auth Buttons -->
                <div class="flex flex-col space-y-1.5 pt-2 border-t border-gray-100">
                    <a href="#" onclick="openAuthModal('login'); return false;" class="text-center py-1.5 text-gray-600 font-poppins text-sm">Masuk</a>
                    <a href="#" onclick="openAuthModal('register'); return false;" class="text-center py-1.5 bg-blue-600 text-white rounded-lg font-poppins font-bold text-sm">Daftar</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        let isOpen = false;
        const mobileMenu = document.getElementById('mobileMenu');
        
        function toggleMobileMenu() {
            isOpen = !isOpen;
            if (isOpen) {
                mobileMenu.style.maxHeight = mobileMenu.scrollHeight + "px";
            } else {
                mobileMenu.style.maxHeight = "0px";
            }
        }

        function openAuthModal(type) {
            // Logic to open the auth modal based on type ('login' or 'register')
            console.log(`Open auth modal: ${type}`);
        }
    </script>
</header>
