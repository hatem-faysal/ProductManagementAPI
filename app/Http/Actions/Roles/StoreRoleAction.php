<?php
namespace App\Actions\Roles;

use Spatie\Permission\Models\Role;

class StoreRoleAction
{
    public function handle(array $data):Role
    {
        $role = Role::create(['name' => $data['name'],'guard_name'=>'sanctum']);
        $role->syncPermissions($data['permission']);
        return $role;
    }
}