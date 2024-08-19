<?php

namespace App\Rules\Api\V1\User;

use App\Models\PasswordReset;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckEmailRule implements ValidationRule
{
    public function __construct(private $email){}
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $resetRequest = PasswordReset::where('email', $this->email)->first();
        if(empty($resetRequest)){
            $fail('email is wrong');
        }
    }
}
