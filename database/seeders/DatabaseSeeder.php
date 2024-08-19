<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\AddressSeeder;
use Database\Seeders\CheckpointSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        DB::table('users')->delete();

        $user =User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('123456789'),
        ]);

        $role = Role::create(['name' => 'Super Admin','guard_name'=>'sanctum']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $role = Role::create(['name' => 'User','guard_name'=>'sanctum']);
        $user->assignRole([$role->id]);
        $this->call(CheckpointSeeder::class);
        $this->call(AddressSeeder::class);
    }
}
