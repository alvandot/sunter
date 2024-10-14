<?php

namespace Database\Factories;

use App\Models\SekolahAsal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggal_lahir' => fake()->date('Y-m-d'),
            'tanggal_bergabung' => fake()->date('Y-m-d'),
            'nama' => fake()->name(),
            'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'alamat' => fake()->address(),
            'nomor_telepon' => fake()->phoneNumber(),
            'nama_orang_tua' => fake()->name(),
            'nomor_telepon_orang_tua' => fake()->phoneNumber(),
            'sekolah_asal_id' => random_int(SekolahAsal::min('id'), SekolahAsal::max('id')),
            'jenjang_bimbel' => fake()->randomElement(['SD', 'SMP', 'SMA']),
            'foto' => fake()->imageUrl(),
        ];
    }
}
