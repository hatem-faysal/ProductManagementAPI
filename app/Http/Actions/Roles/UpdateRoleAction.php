<?php
namespace App\Actions\Roles;

use Spatie\Permission\Models\Role;
class UpdateRoleAction
{
    public function handle(Role $role,array $data): Role
    {
        $role->name = $data['name'];
        $role->guard_name = 'web';
        $role->save();
        $role->syncPermissions($data['permissions']);
        return $role;
    }
}