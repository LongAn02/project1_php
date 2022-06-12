<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'id' => 1,
            'name_brand' => 'Nike',
            'image_brand' => 'nike',
            'status' => 'Just do it',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('brands')->insert([
            'id' => 2,
            'name_brand' => 'Adidas',
            'image_brand' => 'adidas',
            'status' => 'Impossible is nothing',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('brands')->insert([
            'id' => 3,
            'name_brand' => 'Vans',
            'image_brand' => 'vans',
            'status' => 'Endorsed by No One',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);
    }
}
