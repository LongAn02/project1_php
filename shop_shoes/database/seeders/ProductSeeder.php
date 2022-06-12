<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 1 ; $i <= 13 ; $i++){
            if ($i % 2 != 0) {
                DB::table('products')->insert([
                    'name' => Str::random(15),
                    'price' => rand(3000,6000),
                    'main_image' => 'img_vans_('.$i.').jpg',
                    'img_sp' => 'img_vans_('.($i+1).').jpg',
                    'description' => $faker->text(100),
                    'brand_id' => 3,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime(),
                ]);
            }
        }

        for ($i = 1 ; $i <= 53 ; $i++){
            if ($i % 2 != 0) {
                DB::table('products')->insert([
                    'name' => Str::random(15),
                    'price' => rand(3000,6000),
                    'main_image' => 'img_adidas_('.$i.').jpg',
                    'img_sp' => 'img_adidas_('.($i+1).').jpg',
                    'description' => $faker->text(100),
                    'brand_id' => 2,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime(),
                ]);
            }
        }

        for ($i = 1 ; $i <= 53 ; $i++){
            if ($i % 2 != 0) {
                DB::table('products')->insert([
                    'name' => Str::random(15),
                    'price' => rand(3000,6000),
                    'main_image' => 'img_nike_('.$i.').jpg',
                    'img_sp' => 'img_nike_('.($i + 1).').jpg',
                    'description' => $faker->text(100),
                    'brand_id' => 1,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime(),
                ]);
            }
        }
    }
}
