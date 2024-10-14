<div>
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li>Data Siswa</li>
        </ul>
    </div>

    <!-- HEADER -->
    <x-header title="Data Siswa" separator progress-indicator>
        <x-slot:middle class="!justify-end">
            <x-input placeholder="Cari..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
        </x-slot:middle>
        <x-slot:actions>
            <x-button label="Filter" @click="$wire.drawer = true" responsive icon="o-funnel" class="btn-primary" />
        </x-slot:actions>
    </x-header>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 ">
        <x-stat
            title="Total Siswa"
            value="{{ App\Models\Siswa::all()->count() }}"
            icon="o-users"
            class="text-blue-500" />


        <x-stat
            title="Siswa Baru"
            value="{{ $siswas->where('tanggal_bergabung', '>=', now()->subMonth())->count() }}"
            icon="o-user-plus"
            class="text-orange-500" />
    </div>


    @foreach($siswas as $siswa)
        {{-- All slots --}}
        <x-list-item :item="$siswa" no-separator no-hover link="/siswa/{{ $siswa->id }}">
            <x-slot:avatar>
                <x-avatar :image="$siswa->foto" class="!w-14 !rounded-lg" />
            </x-slot:avatar>
            <x-slot:value>
                {{ $siswa->nama }}
            </x-slot:value>
            <x-slot:sub-value>
                {{ $siswa->sekolahAsal->nama_sekolah }}
            </x-slot:sub-value>
            <x-slot:actions>
                <x-button icon="o-trash" class="text-red-500" wire:click="confirmDelete({{ $siswa->id }})" spinner />
            </x-slot:actions>
        </x-list-item>
    @endforeach
    <!-- FILTER DRAWER -->
    <x-drawer wire:model="drawer" title="Filter" right separator with-close-button class="lg:w-1/3">
        <x-datetime label="Tanggal" wire:model="date" icon="o-calendar" @keydown.enter="$wire.drawer = false" />

        <x-slot:actions>
            <x-button label="Reset" icon="o-x-mark" wire:click="clear" spinner />
            <x-button label="Selesai" icon="o-check" class="btn-primary" @click="$wire.drawer = false" />
        </x-slot:actions>
    </x-drawer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @script
<script>
    document.addEventListener('livewire:initialized', () => {
        @this.on('confirmDelete', (id) => {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Siswa yang ingin dihapus tidak akan bisa dikembalikan lagi",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('delete', id);
                }
            })
        });
    });
    </script>
    @endscript
</div>
