<?php

namespace Tests\Unit;

use App\Http\Requests\Api\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    // use RefreshDatabase;
    protected static ?string $password;
    /**
     * A basic unit test example.
     */
    public function test_update_function()
    {
        // Arrange
        $user =User::factory()->create();
        $updateData = [
            'name' => fake()->name(),
            'password' => static::$password ??= Hash::make('password'),
            'email' => fake()->unique()->safeEmail(),
        ];
        $request = new UpdateUserRequest();
        $request->merge($updateData);
        // Act
        
        $token = $user->createToken('auth_token')->plainTextToken;
        $response = $this->withToken($token)->put(route('users.update', $user->id),$updateData);
        $response->assertStatus(200);    
        $this->assertDatabaseHas('users', $updateData);
    }
    public function test_delete_function()
    {
        // Arrange
        $user =User::factory()->create();        
        // Act
        User::findOrFail($user->id)->delete();

        // Assert
        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }    

    public function test_show_method()
    {
        $user =User::factory()->create();        
        $token = $user->createToken('auth_token')->plainTextToken;
        $response = $this->withToken($token)->get(("/api/v1/users/{$user->id}"));
        $response->assertStatus(200);
    }

    public function test_index_method()
    {
        // Arrange
        $users = User::factory()->create();
        // Act
        $token = $users->createToken('auth_token')->plainTextToken;
        $response = $this->withToken($token)->get(('/api/v1/users'));
        $response->assertStatus(200);            
    }
    
    public function test_register_method()
    {
        // Arrange
        $user = User::factory()->create();
    
        // Act
        $token = $user->createToken('auth_token')->plainTextToken;
        $response = $this->withToken($token)->post(route('register'));
        $response->assertStatus(200);    
    }
    
    public function test_login_method()
    {
        $user =User::factory()->create();
        $token = $user->createToken('auth_token')->plainTextToken;
        $response = $this->withToken($token)->post(route('login'));
        $response->assertStatus(200);            
    }    
    
}
