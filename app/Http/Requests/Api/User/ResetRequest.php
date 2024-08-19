<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\Api\BasicBridge;
use App\Rules\Api\V1\User\CheckEmailRule;
use App\Rules\Api\V1\User\CheckTokenRule;

class ResetRequest extends BasicBridge
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
            'email'=>[new CheckEmailRule($this->email) ,'required','email'],
            'token'=>[new CheckTokenRule($this->email),'required'],
            'password'=>['required','min:6'],
        ];
    }
}
