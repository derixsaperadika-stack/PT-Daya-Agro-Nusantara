<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UmkmWebsiteTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    /**
     * Test public homepage loads successfully and contains UMKM identity.
     */
    public function test_homepage_loads_successfully_with_umkm_identity(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('PT Daya Agro Nusantara');
        $response->assertSee('PANGAN &amp; PERTANIAN LOKAL', false);
        $response->assertSee('Keripik Singkong');
    }

    /**
     * Test products catalog page with category and search filter.
     */
    public function test_products_catalog_loads_and_filters(): void
    {
        $response = $this->get('/produk');
        $response->assertStatus(200);
        $response->assertSee('Katalog Produk');

        $category = Category::first();
        $filteredResponse = $this->get('/produk?category='.$category->slug);
        $filteredResponse->assertStatus(200);
        $filteredResponse->assertSee($category->name);
    }

    /**
     * Test product detail page loads with details.
     */
    public function test_product_detail_page_loads(): void
    {
        $product = Product::first();
        $response = $this->get('/produk/'.$product->slug);

        $response->assertStatus(200);
        $response->assertSee($product->name);
        $response->assertSee($product->formatted_price);
        $response->assertSee('Pesan via WhatsApp');
    }

    /**
     * Test admin dashboard loads with metrics.
     */
    public function test_admin_dashboard_loads(): void
    {
        $response = $this->get('/admin');

        $response->assertStatus(200);
        $response->assertSee('Ringkasan Dashboard');
        $response->assertSee('Total Produk');
        $response->assertSee('Total Kategori');
    }

    /**
     * Test admin product CRUD - validation test (required, max, types).
     */
    public function test_product_validation_rules(): void
    {
        $response = $this->post('/admin/products', [
            'name' => '', // required
            'category_id' => 'abc', // not exists / invalid type
            'price' => 'not-numeric', // numeric
            'stock' => -5, // min 0
            'unit' => '', // required
            'description' => 'short', // min 10
        ]);

        $response->assertSessionHasErrors(['name', 'category_id', 'price', 'stock', 'unit', 'description']);
    }

    /**
     * Test admin product creation and file upload.
     */
    public function test_product_can_be_created_with_image(): void
    {
        Storage::fake('public');

        $category = Category::first();
        $file = UploadedFile::fake()->create('test_product.jpg', 100, 'image/jpeg');

        $response = $this->post('/admin/products', [
            'category_id' => $category->id,
            'name' => 'Keripik Singkong Sambal Matah Test',
            'short_description' => 'Keripik singkong dengan sambal matah khas Bali.',
            'description' => 'Keripik singkong gurih renyah dengan racikan sambal matah segar dan irisan serai.',
            'price' => 22000,
            'stock' => 15,
            'unit' => 'Pouch 180g',
            'image' => $file,
            'is_featured' => 1,
        ]);

        $response->assertRedirect('/admin/products');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('products', [
            'name' => 'Keripik Singkong Sambal Matah Test',
            'category_id' => $category->id,
            'price' => 22000,
            'stock' => 15,
        ]);

        $product = Product::where('name', 'Keripik Singkong Sambal Matah Test')->first();
        $this->assertNotNull($product->image);
        Storage::disk('public')->assertExists($product->image);
    }

    /**
     * Test admin product update and delete.
     */
    public function test_product_can_be_updated_and_deleted(): void
    {
        $product = Product::first();

        $updateResponse = $this->put('/admin/products/'.$product->id, [
            'category_id' => $product->category_id,
            'name' => $product->name.' Updated',
            'short_description' => 'Deskripsi update',
            'description' => 'Deskripsi lengkap yang diperbarui dengan teks yang panjang.',
            'price' => 25000,
            'stock' => 20,
            'unit' => 'Pouch 200g',
        ]);

        $updateResponse->assertRedirect('/admin/products');
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => $product->name.' Updated',
            'price' => 25000,
        ]);

        // Delete test
        $deleteResponse = $this->delete('/admin/products/'.$product->id);
        $deleteResponse->assertRedirect('/admin/products');
        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }
}
