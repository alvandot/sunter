<?php

namespace Database\Seeders;

use App\Models\Mapel;
use App\Models\SekolahAsal;
use App\Models\Siswa;
use App\Models\Tentor;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(100)->create();
        SekolahAsal::factory(10)->create();
        Siswa::factory(100)->create();

        $mapels = [
            'Matematika',
            'Bahasa Indonesia',
            'Bahasa Inggris',
            'Sosiologi',
            'Geografi',
            'Biologi'
        ];

        foreach ($mapels as $mapel) {
            Mapel::create([
                'nama_mapel' => $mapel,
            ]);
        }

        $tentors = Tentor::factory(10)->create();

        foreach ($tentors as $tentor) {
            $randomMapels = Mapel::inRandomOrder()->take(rand(3, count($mapels)))->get();
            $tentor->mapel()->attach($randomMapels);
        }
    }
}
