<?php
namespace App\Http\Actions\User;
use App\Http\Resources\Api\V1\Product\ProductResource;
use App\Http\Resources\Api\V1\User\OnlyUserResource;
use App\Models\User;

class UpdateUserAction
{
    public function handle(User $user,array $data)
    {
        $user->update($data);
        if(isset($data['roles'])){
            $user->assignRole($data['roles']);
        }        
        return apiResponse(  new OnlyUserResource($user),'is success User',true);
    }
}