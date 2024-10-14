<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SekolahAsal>
 */
class SekolahAsalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_sekolah' => fake()->company(),
            'alamat' => fake()->address(),
            'kota' => fake()->city(),
            'provinsi' => fake()->state(),
            'kode_pos' => fake()->postcode(),
        ];
    }
}
