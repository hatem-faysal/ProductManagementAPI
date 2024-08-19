<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Actions\User\ForgotAction;
use App\Http\Actions\User\LoginAction;
use App\Http\Actions\User\RegisterAction;
use App\Http\Actions\User\ResetAction;
use App\Http\Actions\User\UpdateUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\ForgetRequest;
use App\Http\Requests\Api\User\LoginRequest;
use App\Http\Requests\Api\User\RegisterRequest;
use App\Http\Requests\Api\User\ResetRequest;
use App\Http\Requests\Api\User\UpdateUserRequest;
use App\Http\Resources\Api\V1\User\AllUsersResource;
use App\Http\Resources\Api\V1\User\OnlyUserResource;
use App\Models\User;
use Illuminate\Http\Response;

class UsersController extends Controller
{
    public function login(LoginRequest $request):Response
    {
        return app(LoginAction::class)->handle($request->validated());
    }
    public function register(RegisterRequest $request):Response
    {
        return app(RegisterAction::class)->handle($request->validated());
    }

    public function forgot(ForgetRequest $request): Response
    {
        return app(ForgotAction::class)->handle($request->validated());
    }
    public function reset(ResetRequest $request) :Response
    {
        return app(ResetAction::class)->handle($request->validated());
    }
    
    public function index()
    {
        return apiResponse(AllUsersResource::collection(User::get()),'is success User',true);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return apiResponse(  new OnlyUserResource(User::find($id)),'is success User',true);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        return app(UpdateUserAction::class)->handle($user,$request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return apiResponse([],'is success  delete User',true);
    }    
}