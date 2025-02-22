<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('cart')->insert([
                'user_id' => rand(1, 10),
                'items' => json_encode([
                    [
                        'product_id' => rand(1, 5),
                        'quantity' => rand(1, 5),
                        'price' => $faker->randomFloat(2, 5, 100)
                    ],
                    [
                        'product_id' => rand(1, 5),
                        'quantity' => rand(1, 3),
                        'price' => $faker->randomFloat(2, 5, 100)
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
