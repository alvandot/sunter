<div>
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a wire:navigate href="{{ route('home') }}" class="text-blue-500 hover:text-blue-700">Beranda</a></li>
            <li class="font-semibold"><a href="{{ route('siswa.index') }}" class="text-blue-500 hover:text-blue-700">List Siswa</a></li>
            <li class="font-semibold">Detail Siswa</li>
        </ul>
    </div>
    <!-- HEADER -->

    <!-- HEADER -->
    <x-header title="Detail Siswa"/>

    <div class="grid grid-cols-1 gap-6">
        <x-card title="Detail Siswa" separator progress-indicator class="bg-gradient-to-br from-blue-200 to-indigo-200 shadow-xl rounded-2xl overflow-hidden transform hover:scale-105 transition-all duration-300">

            <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-6 p-6">
                <x-avatar :image="$siswa->foto" class="!w-32 !h-32 !rounded-full border-4 border-white shadow-lg" />
                <div class="flex flex-col gap-2 text-center md:text-left">
                    <h1 class="text-4xl font-extrabold text-indigo-800 tracking-tight">{{ $siswa->nama }}</h1>
                    <p class="text-xl text-indigo-600 font-semibold">{{ $siswa->sekolahAsal->nama_sekolah }}</p>

                    <div class="flex items-center justify-center md:justify-start gap-2 mt-2">
                        <span class="inline-block bg-indigo-100 text-indigo-800 px-4 py-2 rounded-full text-sm font-bold uppercase tracking-wide shadow-sm">
                            {{ $siswa->jenis_kelamin }}
                        </span>
                        <span class="inline-block bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-bold uppercase tracking-wide shadow-sm">
                            Siswa Aktif
                        </span>
                    </div>
                </div>
            </div>
            <x-slot:menu>
                <x-button icon="o-pencil" class="btn-circle btn-sm" wire:click="editSiswa" placeholder="Edit Siswa"/>
                <x-button icon="o-trash" class="btn-circle btn-sm" wire:click="hapusSiswa" placeholder="Hapus Siswa"/>
            </x-slot:menu>
        </x-card>

        <x-card class="bg-gradient-to-r from-blue-50 to-indigo-50 shadow-lg rounded-xl overflow-hidden">
            <div class="p-6">
                <h2 class="text-3xl font-bold text-indigo-800 mb-6 border-b-2 border-indigo-200 pb-2">Informasi Siswa</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-lg p-4 shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                        <p class="text-sm font-medium text-indigo-600 mb-1">Tanggal Lahir</p>
                        <p class="text-lg text-gray-800 font-semibold">{{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d F Y') }}</p>
                    </div>
                    <div class="bg-white rounded-lg p-4 shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                        <p class="text-sm font-medium text-indigo-600 mb-1">Alamat</p>
                        <p class="text-lg text-gray-800 font-semibold">{{ $siswa->alamat }}</p>
                    </div>
                    <div class="bg-white rounded-lg p-4 shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                        <p class="text-sm font-medium text-indigo-600 mb-1">Nama Orang Tua</p>
                        <p class="text-lg text-gray-800 font-semibold">{{ $siswa->nama_orang_tua }}</p>
                    </div>
                    <div class="bg-white rounded-lg p-4 shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                        <p class="text-sm font-medium text-indigo-600 mb-1">No. HP Orang Tua</p>
                        <p class="text-lg text-gray-800 font-semibold">{{ $siswa->nomor_telepon_orang_tua }}</p>
                    </div>
                    <div class="bg-white rounded-lg p-4 shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                        <p class="text-sm font-medium text-indigo-600 mb-1">Sekolah Asal</p>
                        <p class="text-lg text-gray-800 font-semibold">{{ $siswa->sekolahAsal->nama_sekolah }}</p>
                    </div>
                    <div class="bg-white rounded-lg p-4 shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                        <p class="text-sm font-medium text-indigo-600 mb-1">Tanggal Bergabung</p>
                        <p class="text-lg text-gray-800 font-semibold">{{ Carbon\Carbon::parse($siswa->tanggal_bergabung)->format('d F Y') }}</p>
                    </div>
                </div>
            </div>
        </x-card>
    </div>
</div>
