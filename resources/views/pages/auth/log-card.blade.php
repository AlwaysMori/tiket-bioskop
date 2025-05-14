<div class="fixed inset-0 bg-black/30 backdrop-blur-sm flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300" id="authModal">
    <div class="bg-white rounded-xl shadow-xl max-w-md w-full mx-4 transform transition-all duration-300 scale-95" id="authContent">
        <div class="relative">
            <!-- Close Button -->
            <button onclick="closeAuthModal()" class="absolute right-4 top-4 text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Auth Tabs Navigation -->
            <div class="flex border-b border-gray-200">
                <button onclick="switchAuthTab('login')" 
                        class="w-1/2 py-4 text-center font-poppins font-medium transition-colors duration-200 tab-btn" 
                        id="loginTabBtn">
                    Masuk
                </button>
                <button onclick="switchAuthTab('register')" 
                        class="w-1/2 py-4 text-center font-poppins font-medium transition-colors duration-200 tab-btn" 
                        id="registerTabBtn">
                    Daftar
                </button>
            </div>

            <!-- Auth Content -->
            <div class="overflow-hidden">
                <div class="flex transition-transform duration-300 ease-in-out" id="authTabs" style="width: 200%">
                    <div class="w-1/2 flex-shrink-0" id="loginTab">
                        @include('components.auth.login')
                    </div>
                    <div class="w-1/2 flex-shrink-0" id="registerTab">
                        @include('components.auth.register')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function switchAuthTab(tab) {
    const tabs = document.getElementById('authTabs');
    const loginBtn = document.getElementById('loginTabBtn');
    const registerBtn = document.getElementById('registerTabBtn');
    
    if (tab === 'register') {
        tabs.style.transform = 'translateX(-50%)';
        registerBtn.classList.add('text-blue-600', 'border-b-2', 'border-blue-600');
        loginBtn.classList.remove('text-blue-600', 'border-b-2', 'border-blue-600');
    } else {
        tabs.style.transform = 'translateX(0)';
        loginBtn.classList.add('text-blue-600', 'border-b-2', 'border-blue-600');
        registerBtn.classList.remove('text-blue-600', 'border-b-2', 'border-blue-600');
    }
}

function closeAuthModal() {
    const modal = document.getElementById('authModal');
    const content = document.getElementById('authContent');
    
    modal.classList.add('opacity-0');
    modal.classList.add('pointer-events-none');
    content.classList.add('scale-95');
    
    switchAuthTab('login'); // Reset to login tab when closing
}

function openAuthModal(tab = 'login') {
    const modal = document.getElementById('authModal');
    const content = document.getElementById('authContent');
    
    modal.classList.remove('opacity-0', 'pointer-events-none');
    content.classList.remove('scale-95');
    switchAuthTab(tab);
}

// Close modal when clicking outside
document.getElementById('authModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeAuthModal();
    }
});

// Initial active tab
document.addEventListener('DOMContentLoaded', function() {
    switchAuthTab('login');
});
</script>

<style>
.tab-btn {
    @apply text-gray-500 hover:text-gray-700;
}
</style>
