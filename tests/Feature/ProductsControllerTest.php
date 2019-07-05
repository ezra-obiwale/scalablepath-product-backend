<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Product;

class ProductsControllerTest extends TestCase
{
    use WithFaker, DatabaseMigrations, DatabaseTransactions;

    public function tearDown(): void
    {
        $this->artisan('migrate:reset');
        parent::tearDown();
    }

    public function setUp(): void
    {
        parent::setUp();

        factory(Product::class, 20)->create();
    }

    public function testIndex()
    {
        $response = $this->get('/api/products');

        $response
            ->assertStatus(200)
            ->assertJsonStructure(['status', 'data']);
    }

    public function testDestroy()
    {
        $product = Product::firstOrFail();
        $response = $this->delete('/api/products/' . $product->id);

        $response->assertStatus(200)
            ->assertJsonStructure(['status', 'data']);

        $this->assertNull(Product::find($product->id));
        $this->assertNotNull(Product::withTrashed()->find($product->id));
    }
}
