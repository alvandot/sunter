<div class="container mx-auto px-4 py-8">
    <nav class="text-sm mb-6">
        <ol class="list-none p-0 inline-flex">
            <li class="flex items-center">
                <a href="{{ route('home') }}" class="text-blue-500 hover:text-blue-700">Beranda</a>
                <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                    <path
                        d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                </svg>
            </li>
        </ol>
    </nav>

    <x-header title="List Tentor">
        <x-slot:middle class="!justify-end">
            <x-input icon="o-bolt" placeholder="Cari..." wire:model.live.debounce="search" clearable />
        </x-slot:middle>
        <x-slot:actions>
            <x-button icon="o-plus" class="btn-primary" />
        </x-slot:actions>
    </x-header>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($tentors as $tentor)
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg hover:scale-105"
                wire:click="detailTentor({{ $tentor->id }})">
                <div class="p-6">
                    <div class="flex items-center space-x-4">
                        <x-avatar :image="$tentor->foto" class="w-16 h-16 rounded-full" />
                        <div>
                            <h2
                                class="text-xl font-semibold text-gray-800 hover:text-primary transition-colors duration-300">
                                {{ $tentor->nama }}</h2>
                            @if ($tentor->mapel->count() > 0)
                                <p class="text-sm text-blue-600 mt-1">
                                    {{ $tentor->mapel->pluck('nama_mapel')->implode(' • ') }}
                                </p>
                            @else
                                <p class="text-sm text-gray-500 italic mt-1">
                                    Belum ada mata pelajaran yang diajar
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
