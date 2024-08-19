<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Actions\Product\StoreProductAction;
use App\Http\Actions\Product\UpdateProductAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Product\StoreProductRequest;
use App\Http\Requests\Api\Product\UpdateProductRequest;
use App\Http\Resources\Api\V1\Product\AllProductResource;
use App\Http\Resources\Api\V1\Product\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return apiResponse(  AllProductResource::collection(Product::get()),'is success Product',true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        return app(StoreProductAction::class)->handle($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return apiResponse(  new ProductResource($product),'is success product',true);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        return app(UpdateProductAction::class)->handle($product,$request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return apiResponse([],'is success  delete product',true);
    }
}
