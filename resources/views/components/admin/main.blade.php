<div class="space-y-8">
    <!-- Welcome Banner -->
    <div class="bg-gradient-to-r from-[#1447e6] to-[#3867f8] rounded-2xl neo-shadow p-6 text-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full transform translate-x-32 -translate-y-24 blur-2xl"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-white/5 rounded-full transform -translate-x-32 translate-y-24 blur-xl"></div>
        
        <div class="relative">
            <h2 class="text-2xl font-bold mb-1">Welcome to CinemaTicket Admin</h2>
            <p class="text-blue-100 mb-4">Here's what's happening with your cinema platform today.</p>
            
            <div class="flex flex-wrap gap-4 mt-4">
                <div class="bg-white/20 backdrop-blur-sm py-2 px-4 rounded-lg flex items-center space-x-2">
                    <svg class="w-5 h-5 text-blue-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span class="text-sm">{{ now()->format('l, F d, Y') }}</span>
                </div>
                <a href="#" class="bg-white/20 hover:bg-white/30 backdrop-blur-sm py-2 px-4 rounded-lg flex items-center space-x-2 transition-all duration-300 hover:shadow-lg">
                    <svg class="w-5 h-5 text-blue-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span class="text-sm">Check Reports</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Movies Card -->
        <div class="bg-white rounded-2xl neo-shadow p-6 transform transition-all duration-300 hover:translate-y-[-5px] hover:shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Movies</p>
                    <h3 class="text-3xl font-bold text-gray-900 mt-1 counting-number" data-target="0">0</h3>
                    <p class="text-xs text-gray-500 mt-2">+0% from last month</p>
                </div>
                <div class="rounded-2xl p-3" style="background: linear-gradient(135deg, #1447e6, #3867f8);">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h18M3 16h18" />
                    </svg>
                </div>
            </div>
            <div class="mt-6 h-1 bg-gray-100 rounded-full">
                <div class="h-1 bg-blue-600 rounded-full" style="width: 45%"></div>
            </div>
        </div>

        <!-- Users Card -->
        <div class="bg-white rounded-2xl neo-shadow p-6 transform transition-all duration-300 hover:translate-y-[-5px] hover:shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Users</p>
                    <h3 class="text-3xl font-bold text-gray-900 mt-1 counting-number" data-target="{{ $totalUsers ?? 0 }}">{{ $totalUsers ?? 0 }}</h3>
                    <p class="text-xs text-gray-500 mt-2">+0% from last month</p>
                </div>
                <div class="rounded-2xl p-3" style="background: linear-gradient(135deg, #22c55e, #16a34a);">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-6 h-1 bg-gray-100 rounded-full">
                <div class="h-1 bg-green-500 rounded-full" style="width: 65%"></div>
            </div>
        </div>
        
        <!-- Revenue Card -->
        <div class="bg-white rounded-2xl neo-shadow p-6 transform transition-all duration-300 hover:translate-y-[-5px] hover:shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Revenue</p>
                    <h3 class="text-3xl font-bold text-gray-900 mt-1">$<span class="counting-number" data-target="48750">0</span></h3>
                    <p class="text-xs text-gray-500 mt-2">+22% from last month</p>
                </div>
                <div class="rounded-2xl p-3" style="background: linear-gradient(135deg, #f97316, #fb923c);">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-6 h-1 bg-gray-100 rounded-full">
                <div class="h-1 bg-orange-500 rounded-full" style="width: 78%"></div>
            </div>
        </div>
        
        <!-- Bookings Card -->
        <div class="bg-white rounded-2xl neo-shadow p-6 transform transition-all duration-300 hover:translate-y-[-5px] hover:shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Bookings</p>
                    <h3 class="text-3xl font-bold text-gray-900 mt-1 counting-number" data-target="1234">0</h3>
                    <p class="text-xs text-gray-500 mt-2">+14% from last month</p>
                </div>
                <div class="rounded-2xl p-3" style="background: linear-gradient(135deg, #8b5cf6, #a78bfa);">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                    </svg>
                </div>
            </div>
            <div class="mt-6 h-1 bg-gray-100 rounded-full">
                <div class="h-1 bg-purple-500 rounded-full" style="width: 55%"></div>
            </div>
        </div>
    </div>

    <!-- Middle Section: Chart and Top Movies -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Chart Section -->
        <div class="lg:col-span-2 bg-white rounded-2xl neo-shadow p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Booking Statistics</h3>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 text-sm bg-blue-50 text-blue-600 rounded-lg neo-button">Day</button>
                    <button class="px-3 py-1 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors">Week</button>
                    <button class="px-3 py-1 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors">Month</button>
                </div>
            </div>
            <div>
                <canvas id="bookingChart" height="200"></canvas>
            </div>
        </div>

        <!-- Top Movies -->
        <div class="bg-white rounded-2xl neo-shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-6">Top Movies</h3>
            
            <div class="space-y-5">
                <!-- Movie Item -->
                <div class="flex items-center p-3 hover:bg-gray-50 rounded-xl transition-colors">
                    <div class="h-12 w-12 rounded-lg overflow-hidden bg-gray-100 mr-4 flex-shrink-0">
                        <div class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white text-lg font-bold">1</div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="text-sm font-semibold text-gray-800 truncate">Avengers: Endgame</h4>
                        <p class="text-xs text-gray-500 mt-1">356 bookings</p>
                    </div>
                    <div class="flex-shrink-0 text-green-500 text-sm font-medium">+23%</div>
                </div>
                
                <!-- Movie Item -->
                <div class="flex items-center p-3 hover:bg-gray-50 rounded-xl transition-colors">
                    <div class="h-12 w-12 rounded-lg overflow-hidden bg-gray-100 mr-4 flex-shrink-0">
                        <div class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white text-lg font-bold">2</div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="text-sm font-semibold text-gray-800 truncate">Spider-Man: No Way Home</h4>
                        <p class="text-xs text-gray-500 mt-1">298 bookings</p>
                    </div>
                    <div class="flex-shrink-0 text-green-500 text-sm font-medium">+15%</div>
                </div>
                
                <!-- Movie Item -->
                <div class="flex items-center p-3 hover:bg-gray-50 rounded-xl transition-colors">
                    <div class="h-12 w-12 rounded-lg overflow-hidden bg-gray-100 mr-4 flex-shrink-0">
                        <div class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white text-lg font-bold">3</div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="text-sm font-semibold text-gray-800 truncate">Joker</h4>
                        <p class="text-xs text-gray-500 mt-1">245 bookings</p>
                    </div>
                    <div class="flex-shrink-0 text-green-500 text-sm font-medium">+8%</div>
                </div>
            </div>
            
            <button class="w-full mt-6 py-2 text-center text-sm text-blue-600 hover:text-blue-800 font-medium transition-colors">
                View All Movies
            </button>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-white rounded-2xl neo-shadow overflow-hidden">
        <div class="flex justify-between items-center p-6 border-b border-gray-100">
            <h2 class="text-lg font-semibold text-gray-800">Recent Activity</h2>
            <button class="text-sm text-blue-600 hover:text-blue-800 font-medium transition-colors neo-button py-1 px-3 rounded-lg">View All</button>
        </div>
        <div class="p-6">
            <div class="space-y-5">
                @if(false)
                <!-- Activity Item with real data would go here -->
                @else
                <div class="flex flex-col items-center justify-center py-10 text-center">
                    <div class="bg-blue-50 p-4 rounded-full mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-gray-700 text-lg font-medium mb-2">No Recent Activity</h3>
                    <p class="text-gray-500 text-sm max-w-md">There hasn't been any activity recorded yet. Activities will appear here once users start interacting with the platform.</p>
                    
                    <button class="mt-6 px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors neo-button">
                        Refresh Data
                    </button>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Counting animation for statistics
            const countElements = document.querySelectorAll('.counting-number');
            
            function animateCount(el, start = 0) {
                const target = parseInt(el.getAttribute('data-target'));
                const duration = 1500;
                const step = Math.ceil(target / (duration / 30)); // Update roughly every 30ms
                
                let current = start;
                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        el.textContent = new Intl.NumberFormat().format(target);
                        clearInterval(timer);
                    } else {
                        el.textContent = new Intl.NumberFormat().format(current);
                    }
                }, 30);
            }
            
            // Intersection Observer to start counting when elements are visible
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCount(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.2 });
            
            countElements.forEach(el => {
                observer.observe(el);
            });
            
            // Chart initialization
            const ctx = document.getElementById('bookingChart');
            if (ctx) {
                const bookingChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                        datasets: [{
                            label: 'Ticket Bookings',
                            data: [65, 78, 52, 91, 43, 125, 92],
                            backgroundColor: 'rgba(20, 71, 230, 0.1)',
                            borderColor: '#1447e6',
                            borderWidth: 3,
                            tension: 0.4,
                            fill: true,
                            pointBackgroundColor: '#1447e6',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            pointRadius: 5,
                            pointHoverRadius: 8
                        }]
                    },
                    options: {
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.05)'
                                }
                            },
                            x: {
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.05)'
                                }
                            }
                        }
                    }
                });
            }
        });
    </script>
</div>
