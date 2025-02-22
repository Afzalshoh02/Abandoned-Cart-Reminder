<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Cart::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'items' => json_encode([
                [
                    'product_id' => rand(1, 5),
                    'quantity' => rand(1, 5),
                    'price' => $this->faker->randomFloat(2, 5, 100)
                ],
                [
                    'product_id' => rand(1, 5),
                    'quantity' => rand(1, 3),
                    'price' => $this->faker->randomFloat(2, 5, 100)
                ]
            ])
        ];
    }
}
