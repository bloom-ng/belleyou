<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Review;

use App\Models\Product;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReviewControllerTest extends TestCase
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
    public function it_displays_index_view_with_reviews()
    {
        $reviews = Review::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('reviews.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.reviews.index')
            ->assertViewHas('reviews');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_review()
    {
        $response = $this->get(route('reviews.create'));

        $response->assertOk()->assertViewIs('app.reviews.create');
    }

    /**
     * @test
     */
    public function it_stores_the_review()
    {
        $data = Review::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('reviews.store'), $data);

        $this->assertDatabaseHas('reviews', $data);

        $review = Review::latest('id')->first();

        $response->assertRedirect(route('reviews.edit', $review));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_review()
    {
        $review = Review::factory()->create();

        $response = $this->get(route('reviews.show', $review));

        $response
            ->assertOk()
            ->assertViewIs('app.reviews.show')
            ->assertViewHas('review');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_review()
    {
        $review = Review::factory()->create();

        $response = $this->get(route('reviews.edit', $review));

        $response
            ->assertOk()
            ->assertViewIs('app.reviews.edit')
            ->assertViewHas('review');
    }

    /**
     * @test
     */
    public function it_updates_the_review()
    {
        $review = Review::factory()->create();

        $user = User::factory()->create();
        $product = Product::factory()->create();

        $data = [
            'user_id' => $this->faker->randomNumber,
            'product_id' => $this->faker->randomNumber,
            'rating' => $this->faker->numberBetween(0, 127),
            'title' => $this->faker->sentence(10),
            'message' => $this->faker->sentence(20),
            'visibility' => $this->faker->boolean,
            'user_id' => $user->id,
            'product_id' => $product->id,
        ];

        $response = $this->put(route('reviews.update', $review), $data);

        $data['id'] = $review->id;

        $this->assertDatabaseHas('reviews', $data);

        $response->assertRedirect(route('reviews.edit', $review));
    }

    /**
     * @test
     */
    public function it_deletes_the_review()
    {
        $review = Review::factory()->create();

        $response = $this->delete(route('reviews.destroy', $review));

        $response->assertRedirect(route('reviews.index'));

        $this->assertModelMissing($review);
    }
}
