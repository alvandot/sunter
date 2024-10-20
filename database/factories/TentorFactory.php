<?php

namespace Database\Factories;

use App\Models\Mapel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tentor>
 */
class TentorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'alamat' => fake()->address(),
            'no_hp' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'foto' => fake()->imageUrl(),
            'tanggal_lahir' => fake()->date(),
            'tanggal_bergabung' => fake()->date(),
        ];
    }
}
