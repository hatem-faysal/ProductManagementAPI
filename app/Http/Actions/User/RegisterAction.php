<?php
namespace App\Http\Actions\User;
use App\Http\Resources\Api\V1\User\UserResource;
use App\Models\User;
use Illuminate\Http\Response;

/**
 * Summary of RegisterAction
 */
class RegisterAction
{
    public function handle(array $data):Response
    {
        $user = User::create($data);
        return apiResponse(  new UserResource($user),'is success User',true);
    }
}