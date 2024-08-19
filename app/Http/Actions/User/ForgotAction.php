<?php
namespace App\Http\Actions\User;
use App\Mail\SendMailReset;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

/**
 * Summary of ForgotAction
 */
class ForgotAction
{
    public function handle(array $data):Response
    {
        $user = User::where('email', $data['email'])->first();
        $resetPasswordToken = str_pad(random_int(1, 999), 4, '0', STR_PAD_LEFT);
        PasswordReset::updateOrCreate([
            'email' => $user->email,
        ],[
            'email' => $user->email,
            'token' => $resetPasswordToken,
            'created_at' => now(),
        ]);
        $user->update([
            'email_verified_at' => now(),
        ]);
        Mail::to($user->email)->send(new SendMailReset($resetPasswordToken));
        return apiResponse(  [],'A Code has been sent to your Email Address.',true);
    }
    
}