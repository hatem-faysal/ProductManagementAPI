<?php

namespace App\Http\Requests\Api\Product;

use App\Http\Requests\Api\BasicBridge;

class StoreProductRequest extends BasicBridge
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
            'name'=>['required','string','min:1','max:255'],
            'description'=>['required','string','min:1','max:4000'],
            'prices'=>['required','numeric'],
            'stock_quantity'=>['required','integer'],
        ];
    }
}