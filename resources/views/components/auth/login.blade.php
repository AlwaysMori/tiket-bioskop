<div class="w-full max-w-md p-6">
    <h2 class="text-2xl font-bold text-gray-900 mb-6 font-poppins text-center">Masuk ke Akun</h2>
    <form class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1 font-poppins">Email</label>
            <input type="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent font-poppins" required>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1 font-poppins">Password</label>
            <input type="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent font-poppins" required>
        </div>
        <div class="flex items-center justify-between">
            <label class="flex items-center">
                <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                <span class="ml-2 text-sm text-gray-600 font-poppins">Ingat saya</span>
            </label>
            <a href="#" class="text-sm text-blue-600 hover:text-blue-700 font-poppins">Lupa password?</a>
        </div>
        <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-poppins font-semibold transition-colors">
            Masuk
        </button>
    </form>
    <div class="mt-6 text-center">
        <p class="text-sm text-gray-600 font-poppins">
            Belum punya akun?
            <button onclick="switchAuthTab('register')" class="text-blue-600 hover:text-blue-700 font-semibold ml-1">Daftar</button>
        </p>
    </div>
</div>
