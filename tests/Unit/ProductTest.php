<?php

namespace Tests\Unit;

use App\Http\Requests\Api\Product\UpdateProductRequest;
use App\Models\Product;
use App\Models\User;
use Tests\TestCase;


class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_product_index_method()
    {
        // Arrange
        $product = Product::factory()->create();
        // Act
        $user =User::factory()->create();
        $token = $user->createToken('auth_token')->plainTextToken;
        $response = $this->withToken($token)->get(('/api/v1/products'));
        $response->assertStatus(200);    
    }
    
    public function test_product_store_method()
    {
        $product = Product::factory()->create();
        
        $user =User::factory()->create();
        $token = $user->createToken('auth_token')->plainTextToken;
        $response = $this->withToken($token)->post(route('products.store'));
        $response->assertStatus(200);            
    }    
    public function test_product_show_method()
    {
        $product = Product::factory()->create();
        
        $user =User::factory()->create();
        $token = $user->createToken('auth_token')->plainTextToken;
        $response = $this->withToken($token)->get(("/api/v1/products/{$product->id}"));
        $response->assertStatus(200);    
    }    
    
    public function test_product_update_method()
    {
        // Arrange
        $product = Product::factory()->create();
        $updateData = [
            'name' => 'test product',
            'description' => fake()->paragraph(),
            'prices' => 33.2,
            'stock_quantity' => 222,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        $request = new UpdateProductRequest();
        $request->merge($updateData);
        // Act
        
        
        $user =User::factory()->create();
        $token = $user->createToken('auth_token')->plainTextToken;
        $response = $this->withToken($token)->put(route("products.update",$product->id),$updateData);
        $response->assertStatus(200);    
        $this->assertDatabaseHas('products', $updateData);
    }    
    public function test_product_delete_method()
    {
        // Arrange
        $product =Product::factory()->create();        
        // Act
        Product::findOrFail($product->id)->delete();

        // Assert
        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }        
}
