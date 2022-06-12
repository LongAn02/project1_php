<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->userName.'@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'), // password
            'remember_token' => Str::random(10),
            'address' => $this->faker->address(),
            'phone' => '0'.rand(111111111,999999999),
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
