<?php
namespace App\Http\Requests\Api\User;


use App\Http\Requests\Api\BasicBridge;

class UpdateUserRequest extends BasicBridge
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
        $id= Request()->segment(4);
        return [
            'name'=>['required','string'],
            'roles'=>['nullable'],
            'email'=>['required','email','unique:users,email,'.$id],
            'password'=>['required','min:6'],
        ];
    }
}