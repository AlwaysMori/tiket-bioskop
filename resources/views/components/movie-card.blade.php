<div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105">
    <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-64 object-cover">
    <div class="p-4">
        <h3 class="font-poppins font-bold text-lg mb-2">{{ $title }}</h3>
        <div class="flex gap-2 mb-4">
            @foreach($genres as $genre)
                <span class="text-xs font-poppins bg-blue-100 text-blue-600 px-2 py-1 rounded">{{ $genre }}</span>
            @endforeach
        </div>
        <div class="flex justify-between items-center">
            <a href="/movies/{{ $id }}" class="text-blue-600 font-poppins hover:text-blue-700">Lihat Detail</a>
            <a href="/booking/{{ $id }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-poppins hover:bg-blue-700">Pesan</a>
        </div>
    </div>
</div>
