<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Supporter;
use Faker\Factory as Faker;

class SupporterFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();
        return [
            'title' => $faker->randomElement(Supporter::$titles),
            'firstname' => explode(' ', $faker->name())[0],
            'lga' => $faker->randomElement(Supporter::$lgas),
            'lastname' => explode(' ', $faker->name())[1],
            'email' => $faker->email(),
            'phone' => $faker->phoneNumber(),
        ];
    }
}
