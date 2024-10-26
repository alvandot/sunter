<div class="container mx-auto py-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($mapelList as $mapel)
            <div
                class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:scale-105 transform">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-6 relative">
                    <h3 class="text-2xl font-bold text-white mb-2">{{ $mapel->nama_mapel }}</h3>
                    <div class="absolute top-0 right-0 mt-4 mr-4">
                        <svg class="w-8 h-8 text-white opacity-50" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="p-6">
                    <h4 class="text-lg font-semibold text-gray-700 mb-3">Pengajar:</h4>
                    @forelse ($mapel->tentor as $tentor)
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <div class="flex flex-col">
                                    <p wire:click="editTentor({{ $tentor->id }})" class="text-gray-800 font-semibold">
                                        {{ $tentor->nama }}</p>

                                    <span
                                        class="text-sm {{ $tentor->status === 'Mengajar' ? 'text-green-500' : 'text-red-500' }}">
                                        {{ $tentor->status }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                </path>
                            </svg>
                            <p class="text-gray-500 italic">Belum ada pengajar</p>
                        </div>
                    @endforelse
                </div>
            </div>
        @endforeach
    </div>
    <x-modal wire:model="modalEdit" title="{{ $tentor->nama }}">
        <div class="mb-5">
            <x-form>
                <x-input label="Nama" wire:model="tentorNama" disabled />
                <x-select label="Alternative" :options="$tentorMapel" option-value="id" option-label="nama_mapel"
                    placeholder="Select a user" placeholder-value="0" hint="Select one, please."
                    wire:model="selectedMapel" />
            </x-form>
        </div>
        <x-button label="Cancel" wire:click="modalEdit = false" />
    </x-modal>
</div>
