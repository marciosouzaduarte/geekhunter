<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('companies')->truncate();

        foreach (range(1, 50) as $index) {
            DB::table('companies')->insert([
                'name' => $faker->name,
                'active' => $faker->boolean,
                'zipcode' => $faker->postcode,
                'address' => str_replace(array("\n", "\r\n", "\r"), "", $faker->address)
            ]);
        }
    }
}