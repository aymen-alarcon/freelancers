<?php

namespace Database\Seeders;

use App\Models\Technology;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        foreach (range(1, 10) as $index) {
            Technology::create([
                "name" => $faker->name
            ]);
        }
    }
}
