<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $name = ['Škoda','Kia','Toyota','Hyundai','Ford'];
        $is_registered_range = [1, 0];     // 1-true 0-false, must be bolean type 
        $is_registered = $is_registered_range[rand(0, count($is_registered_range)-1)];
        $registration_number = $is_registered == 1 ? $this->faker->lexify('?????????????????') : null;

        return [
            'name' => $name[rand(0, count($name)-1)],
            'is_registered' => $is_registered,
            'registration_number' => strtoupper($registration_number),

        ];

    }
}
