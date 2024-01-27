<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $cars = [
            'Toyota' => [
                'Sedan' => [
                    'Vios',
                    'Camry',
                    'Yaris',
                ],
                'SUV' => [
                    'Fortuner',
                    'Innova',
                    'Avanza',
                ],
                'Pick-up' => [
                    'Land Cruiser',
                ]
            ],
            'Honda' => [
                'Sedan' => [
                    'Civic',
                    'City',
                    'Accord',
                ],
                'SUV' => [
                    'CRV',
                    'BRV',
                    'HRV',
                ],
                'Pick-up' => [
                    'Ridgeline',
                ],
            ],
            'Mitsubishi' => [
                'Sedan' => [
                    'Mirage',
                    'Lancer',
                    'Evo',
                ],
                'SUV' => [
                    'Outlander',
                    'Eclipse Cross',
                    'Outlander Sport',
                ],
                'Pick-up' => [
                    'Strada',
                ],
            ],
            'Ford' => [
                'Sedan' => [
                    'Escort',
                    'Focus',
                    'Mondeo',
                ],
                'SUV' => [
                    'Eco Sport',
                    'Expedition',
                    'Everest',
                ],
                'Pick-up' => [
                    'Ranger',
                ],
            ],
        ];

        $colors = [
            'Black',
            'White',
            'Red',
            'Gray',
            'Silver',
        ];

        
        $brand = array_rand($cars);
        $type = array_rand($cars[$brand]);
        $model = $cars[$brand][$type][array_rand($cars[$brand][$type])];

        return [
            'plate_number' => Str::upper(Str::random(3)) . ' ' . rand(100,9999),
            'brand' => $brand,
            'type' => $type,
            'model' => $model,
            'color' => array_rand($colors),
            'date_of_last_registration' => fake()->date(),
            'status' => rand(0,1),
            'has_crime' => rand(0,1),
        ];
    }
}
