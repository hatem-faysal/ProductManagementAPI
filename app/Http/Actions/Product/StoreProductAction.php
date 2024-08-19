<?php
namespace App\Http\Actions\Product;
use App\Http\Resources\Api\V1\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\Response;

/**
 * Summary of RegisterAction
 */
class StoreProductAction
{
    public function handle(array $data):Response
    {
        $product = Product::create($data);
        return apiResponse(  new ProductResource($product),'is success product',true);
    }
}