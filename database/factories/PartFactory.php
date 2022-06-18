<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Car;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Part>
 */
class PartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'name' => $this->faker->randomElement(['Žiarovka', 'Stierač', 'Sada manžet', 'Spona', 'Závitové spoj', 'Sťahovacie páska', 'Poistka', 'Montážny krúžok']),
            'serialnumber' => $this->faker->bothify('####################'),
            'car_id' => Car::all()->random()->id,
        ];

    }
}
