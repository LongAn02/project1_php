<?php

namespace Database\Seeders;

use App\Models\Brands;
use Database\Seeders\BrandSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BrandSeeder::class,
            UsersSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
