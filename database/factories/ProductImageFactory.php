<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => $this->faker->image( width: 500, height: 550, category: "cloth", randomize: true ),
            'status' => 'visible',
            'product_id' => \App\Models\Product::factory(),
        ];
    }
}
