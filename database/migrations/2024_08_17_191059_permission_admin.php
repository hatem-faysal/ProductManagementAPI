<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $permissions = [
            'good',
            'bad',
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission,'guard_name'=>'sanctum']);
        }
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PermissionAdmin');
    }
};
