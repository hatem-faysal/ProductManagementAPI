<?php
namespace App\Rules\Api\V1\User;


use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Hash;

class UsersRule implements ValidationRule
{
    public function __construct(private $password){
        
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail):void
    {
        $user = User::where('email', $value)->first();
        if (!$user || !Hash::check($this->password, $user->password))
            $fail('Bad Credentials');
    }
}
