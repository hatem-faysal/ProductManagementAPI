<?php
namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

abstract class BasicBridge extends FormRequest
{
     public function failedValidation(Validator $validator):Response
    {
        throw new HttpResponseException(response()->json([
            'data'      => $validator->errors(),
            'message'   => 'Validation errors',
            'success'   => false,
        ]));
    } 
}