<?php
namespace App\Http\Actions\User;
use App\Http\Resources\Api\V1\User\UserResource;
use App\Models\User;
use Illuminate\Http\Response;

/**
 * Summary of LoginAction
 */
class LoginAction
{
    public function handle(array $data):Response
    {
        return apiResponse(  new UserResource(User::where('email',$data['email'])->first()),'is success User',true);
    }
    
}