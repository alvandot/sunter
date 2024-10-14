<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">

    {{-- NAVBAR mobile only --}}
    <x-nav sticky class="lg:hidden">
        <x-slot:brand>
            <x-app-brand />
        </x-slot:brand>
        <x-slot:actions>
            <label for="main-drawer" class="lg:hidden me-3">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>
        </x-slot:actions>
    </x-nav>

    {{-- MAIN --}}
    <x-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">

            {{-- BRAND --}}
            <x-app-brand class="p-5 pt-3" />

            {{-- MENU --}}
            <x-menu activate-by-route>

                {{-- User --}}
                @if($user = auth()->user())
                    <x-menu-separator />

                    <x-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="-mx-2 !-my-2 rounded">
                        <x-slot:actions>
                            <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" no-wire-navigate link="/logout" />
                        </x-slot:actions>
                    </x-list-item>

                    <x-menu-separator />
                @endif

                <x-menu-item title="Dashboard" icon="o-home" link="/" />
                <x-menu-sub title="Manajemen Cabang" icon="o-building-office-2">
                    <x-menu-sub title="Data Siswa" icon="o-users">
                        <x-menu-item title="List Siswa" icon="o-user-group" link="/siswa" />
                        <x-menu-item title="List Sekolah Asal" icon="o-home-modern" link="/sekolah-asal" />
                    </x-menu-sub>
                    <x-menu-item title="Data Pengajar" icon="o-academic-cap" link="/pengajar" />
                    <x-menu-item title="Data Kelas" icon="o-home-modern" link="/kelas" />
                    <x-menu-item title="Data Mapel" icon="o-book-open" link="/mapel" />
                    <x-menu-item title="Data Ruangan" icon="o-building-office-2" link="/ruangan" />
                </x-menu-sub>
                <x-menu-sub title="Laporan" icon="o-document-chart-bar">
                    <x-menu-item title="Laporan Keuangan" icon="o-banknotes" link="/laporan/keuangan" />
                    <x-menu-item title="Laporan Akademik" icon="o-chart-bar" link="/laporan/akademik" />
                </x-menu-sub>
                <x-menu-item title="Pengaturan" icon="o-cog-6-tooth" link="/pengaturan" />
            </x-menu>
        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-main>

    {{--  TOAST area --}}
    <x-toast />
</body>
</html>
