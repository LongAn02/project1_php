<?php

namespace Database\Factories;

use App\Models\Brands;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => Str::random(15),
            'price' => rand(700000,2000000),
            'main_image' => $this->faker->text(30),
            'img_sp' => $this->faker->text(10),
            'description' => $this->faker->text(100),
            'brand_id' => Brands::all('id')->random(),
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ];
    }
}
