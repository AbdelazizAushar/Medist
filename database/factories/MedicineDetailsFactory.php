<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicineDetails>
 */
class MedicineDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $typesML = ['Syrup', 'Injection', 'Ointment'];
        $typesMG = ['Tablet', 'Ointment'];
        $dosesNumbers = ['0.5', '1', '2.5', '5' , '10', '25', '50', '100', '150', '200', '250', '500', '1000'];
        $dosesPostfix = ['mg' ,'ml'];
        $type = $typesMG[rand(0,1)];
        $dose = $dosesPostfix[rand(0,1)];
        if($dose == "ml") $type = $typesML[rand(0,2)];
        return [
            'dose' => $dosesNumbers[rand(0,12)] . $dose,
            'type' => $type,
            'price' => fake()->numberBetween(100, 100000),
            'expiry_date' => fake()->dateTimeBetween('+1 day', '+1 year'),
        ];
    }
}
