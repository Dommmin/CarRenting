<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rent>
 */
class RentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userIDs = User::pluck('id');
        $carsIDs = Car::pluck('id');

        return [
            'user_id' => $userIDs->random(),
            'car_id' => $carsIDs->random(),
            'starts' => $this->faker->date(now()),
            'ends' => $this->faker->date(now()->days(10)),
            'days' => 7,
            'toPay' => $this->faker->numberBetween(1000, 10000),
        ];
    }
}
