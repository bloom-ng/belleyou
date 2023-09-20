<?php

namespace Database\Factories;

use App\Models\Cart;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cart::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->randomNumber,
            'session' => $this->faker->ipv4,
            'quantity' => $this->faker->randomNumber,
            'specification' => $this->faker->text,
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
