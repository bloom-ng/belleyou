<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Product;

use App\Models\Cart;
use App\Models\OrderItem;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_products()
    {
        $products = Product::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('products.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.products.index')
            ->assertViewHas('products');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_product()
    {
        $response = $this->get(route('products.create'));

        $response->assertOk()->assertViewIs('app.products.create');
    }

    /**
     * @test
     */
    public function it_stores_the_product()
    {
        $data = Product::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('products.store'), $data);

        $this->assertDatabaseHas('products', $data);

        $product = Product::latest('id')->first();

        $response->assertRedirect(route('products.edit', $product));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_product()
    {
        $product = Product::factory()->create();

        $response = $this->get(route('products.show', $product));

        $response
            ->assertOk()
            ->assertViewIs('app.products.show')
            ->assertViewHas('product');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_product()
    {
        $product = Product::factory()->create();

        $response = $this->get(route('products.edit', $product));

        $response
            ->assertOk()
            ->assertViewIs('app.products.edit')
            ->assertViewHas('product');
    }

    /**
     * @test
     */
    public function it_updates_the_product()
    {
        $product = Product::factory()->create();

        $cart = Cart::factory()->create();
        $orderItem = OrderItem::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'quantity' => $this->faker->randomNumber,
            'price' => $this->faker->randomFloat(2, 0, 9999),
            'description' => $this->faker->text,
            'type' => 'ready_made',
            'short_description' => $this->faker->text,
            'shipping_fee' => $this->faker->randomNumber(1),
            'sale_price' => $this->faker->randomNumber(1),
            'sale_start' => $this->faker->date,
            'sale_end' => $this->faker->date,
            'slug' => $this->faker->slug,
            'id' => $cart->id,
            'id' => $orderItem->id,
        ];

        $response = $this->put(route('products.update', $product), $data);

        $data['id'] = $product->id;

        $this->assertDatabaseHas('products', $data);

        $response->assertRedirect(route('products.edit', $product));
    }

    /**
     * @test
     */
    public function it_deletes_the_product()
    {
        $product = Product::factory()->create();

        $response = $this->delete(route('products.destroy', $product));

        $response->assertRedirect(route('products.index'));

        $this->assertModelMissing($product);
    }
}
