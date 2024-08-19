<?php
namespace App\Http\Actions\User;
use App\Http\Resources\Api\V1\User\UserResource;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

/**
 * Summary of ResetAction
 */
class ResetAction
{
    public function handle(array $data):Response
    {
        $user = User::where('email', $data['email'])->first();
        $user->update(['password'=>Hash::make($data['password'])]);
        $resetRequest = PasswordReset::where('email', $data['email'])->first();
        $resetRequest->delete();   
        return apiResponse(  new UserResource(User::where('email',$user->email)->first()),'is success reset',true);
    }
    
}