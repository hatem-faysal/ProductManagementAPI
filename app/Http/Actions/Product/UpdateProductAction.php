<?php
namespace App\Http\Actions\Product;
use App\Http\Resources\Api\V1\Product\ProductResource;
use App\Models\Product;

class UpdateProductAction
{
    public function handle(Product $product,array $data)
    {
        $product->update($data);
        return apiResponse(  new ProductResource($product),'is success product',true);
    }
}