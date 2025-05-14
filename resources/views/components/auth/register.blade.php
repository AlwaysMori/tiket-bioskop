<div class="w-full max-w-md p-6">
    <h2 class="text-2xl font-bold text-gray-900 mb-6 font-poppins text-center">Daftar Akun Baru</h2>
    <form class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1 font-poppins">Nama Lengkap</label>
            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent font-poppins" required>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1 font-poppins">Email</label>
            <input type="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent font-poppins" required>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1 font-poppins">Password</label>
            <input type="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent font-poppins" required>
        </div>
        <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-poppins font-semibold transition-colors">
            Daftar Sekarang
        </button>
    </form>
    <div class="mt-6 text-center">
        <p class="text-sm text-gray-600 font-poppins">
            Sudah punya akun?
            <button onclick="switchAuthTab('login')" class="text-blue-600 hover:text-blue-700 font-semibold ml-1">Masuk</button>
        </p>
    </div>
</div>
