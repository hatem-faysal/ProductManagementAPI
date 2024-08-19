<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\Api\BasicBridge;
use App\Rules\Api\V1\User\UsersRule;

class LoginRequest extends BasicBridge
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'=>['required',new UsersRule($this->password),'email','exists:users'],
            'password'=>['required','min:6'],
        ];
    }
    
}