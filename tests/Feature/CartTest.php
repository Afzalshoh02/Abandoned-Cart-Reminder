<?php

namespace Tests\Feature;

use App\Models\Cart;
use Faker\Factory as Faker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CartTest extends TestCase
{
    public function test_can_create_cart()
    {
        $faker = Faker::create();
        $response = $this->postJson('/api/carts', [
            'user_id' => 1,
            'items' => [
                'product_id' => rand(1, 5),
                'quantity' => rand(1, 5),
                'price' => $faker->randomFloat(2, 5, 100)
            ]
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure(['user_id', 'items']);
    }

    public function test_can_get_cart()
    {
        $cart = Cart::factory()->create();

        $response = $this->getJson('/api/carts/' . $cart->id);

        $response->assertStatus(200)
            ->assertJson(['id' => $cart->id]);
    }

    public function test_can_update_cart()
    {
        $cart = Cart::factory()->create();
        $response = $this->putJson('/api/carts/' . $cart->id, [
            'user_id' => $cart->user_id,
            'items' => ['item3', 'item4']
        ]);
        $response->assertStatus(200)
            ->assertJson([
                'items' => ['item3', 'item4']
            ]);
    }

    public function test_can_delete_cart()
    {
        $cart = Cart::factory()->create();

        $response = $this->deleteJson('/api/carts/' . $cart->id);

        $response->assertStatus(204);
    }
}
