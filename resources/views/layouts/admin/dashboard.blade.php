<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - CinemaTicket</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-700 text-white hidden md:flex flex-col">
            <div class="p-4 border-b border-blue-600">
                <div class="flex items-center space-x-3">
                    <span class="text-xl font-bold">CinemaTicket</span>
                </div>
            </div>
            <!-- Sidebar Navigation -->
            <nav class="flex-1 p-4">
                <div class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition-colors">
                        <span class="text-sm">Dashboard</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition-colors">
                        <span class="text-sm">Movies</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition-colors">
                        <span class="text-sm">Users</span>
                    </a>
                </div>
            </nav>
            <!-- User Info -->
            <div class="border-t border-blue-600 p-4">
                <div class="flex items-center space-x-3">
                    <div>
                        <p class="text-sm font-medium">Admin</p>
                        <p class="text-xs text-blue-200">{{ Auth::user()->email ?? 'admin@admin.com' }}</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between px-6 py-4">
                    <h1 class="text-xl font-semibold">Dashboard</h1>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-blue-600 transition-colors text-sm">
                            Logout
                        </button>
                    </form>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
