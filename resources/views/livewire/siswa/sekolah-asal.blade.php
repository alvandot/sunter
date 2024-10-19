    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Daftar Sekolah Asal</h2>
        <div class="grid sm:grid-cols-1 lg:grid-cols-2 gap-6">
            @foreach ($sekolah_asal as $item)
                <div class="bg-white shadow-md rounded-lg overflow-hidden transition-all duration-300 hover:shadow-xl">
                    <img src="https://picsum.photos/500/200" alt="{{ $item->nama_sekolah }}"
                        class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2 text-gray-800">{{ $item->nama_sekolah }}</h3>
                        <p class="text-gray-600 mb-4">{{ $item->alamat }}</p>
                        <button
                            class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600 transition-colors duration-300">Detail</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
