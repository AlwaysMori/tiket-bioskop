<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - CinemaTicket</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Neomorphism styles */
        .neo-shadow {
            box-shadow: 5px 5px 10px rgba(237, 237, 237, 0.4), -5px -5px 10px rgba(255, 255, 255, 1);
        }
        .neo-shadow-inner {
            box-shadow: inset 2px 2px 5px rgba(174, 174, 192, 0.4), inset -2px -2px 5px rgba(255, 255, 255, 0.8);
        }
        .neo-button {
            box-shadow: 5px 5px 10px rgba(174, 174, 192, 0.4), -5px -5px 10px rgba(255, 255, 255, 1);
            transition: all 0.2s ease;
        }
        .neo-button:hover {
            box-shadow: 2px 2px 5px rgba(174, 174, 192, 0.4), -2px -2px 5px rgba(255, 255, 255, 1);
            transform: translateY(2px);
        }
        .neo-button:active {
            box-shadow: inset 2px 2px 5px rgba(174, 174, 192, 0.4), inset -2px -2px 5px rgba(255, 255, 255, 0.8);
        }
        .gradient-bg {
            background: linear-gradient(135deg, #1447e6, #3867f8);
        }
        .sidebar-item {
            transition: all 0.3s ease;
        }
        .sidebar-item:hover {
            transform: translateX(5px);
        }
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .fade-up {
            animation: fadeUp 0.5s ease forwards;
        }
        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.2s; }
        .delay-3 { animation-delay: 0.3s; }
        .delay-4 { animation-delay: 0.4s; }
        
        .svg-hover {
            transition: all 0.3s ease;
        }
        .sidebar-item:hover .svg-hover {
            transform: scale(1.2);
        }

        .pulse {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(20, 71, 230, 0.4);
            }
            70% {
                transform: scale(1.03);
                box-shadow: 0 0 0 10px rgba(20, 71, 230, 0);
            }
            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(20, 71, 230, 0);
            }
        }
    </style>
</head>
<body class="bg-gray-100" style="background-image: url('data:image/svg+xml,%3Csvg xmlns=\"http://www.w3.org/2000/svg\" width=\"100\" height=\"100\" viewBox=\"0 0 100 100\"%3E%3Cg fill-rule=\"evenodd\"%3E%3Cg fill=\"%231447e6\" fill-opacity=\"0.02\"%3E%3Cpath opacity=\".5\" d=\"M96 95h4v1h-4v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9zm-1 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-72 gradient-bg text-white hidden md:flex flex-col rounded-tr-3xl rounded-br-3xl neo-shadow" style="z-index: 10;">
            <div class="p-6 border-b border-blue-500/30">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="p-2 bg-white/10 rounded-xl backdrop-blur-lg">
                        <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h18M3 16h18" />
                        </svg>
                    </div>
                    <span class="text-2xl font-bold tracking-tight">CinemaTicket</span>
                </div>

                <div class="mt-4 relative overflow-hidden neo-shadow-inner bg-blue-600/20 rounded-xl p-3">
                    <div class="flex items-center space-x-3">
                        <div class="h-12 w-12 rounded-full bg-white/10 flex items-center justify-center overflow-hidden backdrop-blur-sm">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-white">Admin User</p>
                            <p class="text-xs text-blue-200">{{ Auth::user()->email ?? 'admin@admin.com' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar Navigation -->
            <nav class="flex-1 p-6 opacity-0 fade-up">
                <div class="mb-6">
                    <p class="uppercase text-xs tracking-wider text-blue-200 font-semibold mb-4 ml-3">Main Menu</p>
                    <div class="space-y-2">
                        <a href="{{ route('admin.dashboard') }}" class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-white/10' : 'hover:bg-white/10' }} transition-all duration-300">
                            <div class="w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-white svg-hover" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </div>
                            <div>
                                <span class="text-sm font-medium">Dashboard</span>
                                <p class="text-xs text-blue-200 mt-1">Overview & Statistics</p>
                            </div>
                        </a>
                        
                        <a href="{{ route('admin.movies.index') }}" class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.movies.index') ? 'bg-white/10' : 'hover:bg-white/10' }} transition-all duration-300">
                            <div class="w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-white svg-hover" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h18M3 16h18" />
                                </svg>
                            </div>
                            <div>
                                <span class="text-sm font-medium">Movies</span>
                                <p class="text-xs text-blue-200 mt-1">Manage Film Catalog</p>
                            </div>
                        </a>
                        
                        <a href="#" class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-white/10 transition-all duration-300">
                            <div class="w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-white svg-hover" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <span class="text-sm font-medium">Users</span>
                                <p class="text-xs text-blue-200 mt-1">Customer Management</p>
                            </div>
                        </a>
                        
                        <a href="#" class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-white/10 transition-all duration-300">
                            <div class="w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-white svg-hover" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                </svg>
                            </div>
                            <div>
                                <span class="text-sm font-medium">Bookings</span>
                                <p class="text-xs text-blue-200 mt-1">Ticket Reservations</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="mt-8">
                    <p class="uppercase text-xs tracking-wider text-blue-200 font-semibold mb-4 ml-3">Settings</p>
                    <div class="space-y-2">
                        <a href="#" class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-white/10 transition-all duration-300">
                            <div class="w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-white svg-hover" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <span class="text-sm font-medium">Settings</span>
                        </a>
                        
                        <a href="#" class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-white/10 transition-all duration-300">
                            <div class="w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-white svg-hover" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="text-sm font-medium">Help Center</span>
                        </a>
                    </div>
                </div>
            </nav>
            
            <!-- Logout Button -->
            <div class="p-6 opacity-0 fade-up delay-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center space-x-2 bg-white/10 hover:bg-white/20 text-white py-3 px-4 rounded-xl transition-all duration-300 backdrop-blur-sm neo-button">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span>Sign Out</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Navigation -->
            <header class="bg-white neo-shadow rounded-2xl mx-6 mt-6">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <button class="md:hidden p-2 text-gray-600 hover:text-blue-600 transition-colors rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        <div class="opacity-0 fade-up">
                            <h1 class="text-xl font-semibold text-gray-800">Admin Dashboard</h1>
                            <p class="text-sm text-gray-500">Welcome back, Admin</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-4 opacity-0 fade-up delay-1">
                        <div class="relative">
                            <button class="p-2 text-gray-600 hover:text-blue-600 transition-colors hover:scale-110 transform duration-200 neo-button rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                                </svg>
                                <span class="absolute top-0 right-0 h-2 w-2 bg-red-500 rounded-full pulse"></span>
                            </button>
                        </div>
                        
                        <div class="h-8 w-0.5 bg-gray-200"></div>
                        
                        <form action="{{ route('logout') }}" method="POST" class="hidden md:block">
                            @csrf
                            <button type="submit" class="flex items-center space-x-2 text-gray-600 hover:text-blue-600 transition-colors text-sm group neo-button px-4 py-2 rounded-xl">
                                <span>Logout</span>
                                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-6 flex-1 opacity-0 fade-up delay-2">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Show fade-up elements with delay
            const fadeElements = document.querySelectorAll('.fade-up');
            fadeElements.forEach(el => {
                setTimeout(() => {
                    el.style.opacity = '1';
                }, 100); // Reduced delay for quicker appearance
            });
            
            // Active state for current page is handled by Blade's request()->routeIs()
            // No need for JS to add active class if Blade handles it directly in the class attribute.
            // However, if you need to update the header title dynamically based on the page:
            const pageTitleElement = document.querySelector('header h1');
            const pageSubtitleElement = document.querySelector('header p');
            
            if (pageTitleElement && pageSubtitleElement) {
                if (window.location.pathname.includes('/admin/dashboard')) {
                    pageTitleElement.textContent = 'Admin Dashboard';
                    pageSubtitleElement.textContent = 'Welcome back, Admin';
                } else if (window.location.pathname.includes('/admin/movies')) {
                    pageTitleElement.textContent = 'Manage Movies';
                    pageSubtitleElement.textContent = 'Film catalog overview';
                }
                // Add more conditions for other pages
            }
        });
    </script>
</body>
</html>
