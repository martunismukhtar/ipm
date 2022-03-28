<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid'=>Str::uuid()->toString(),
            'nama'=>$this->faker->name(),
            'pekerjaan'=>$this->faker->jobTitle,
            'tanggal_lahir'=> $this->faker->dateTimeInInterval(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
