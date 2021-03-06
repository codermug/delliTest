<?php

namespace App\Http\Controllers\Api\v1;



use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductResourceCollection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * @param Product $Product
     *
     * @return Product
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * @return ProductResourceCollection
     */
    public function index(Product $product)
    {
       //return  new ProductResource($product->all());

        return new ProductResourceCollection(Product::all());
    }

    /**
     * @param Request $request
     * @return ProductResource
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'sku'     => 'required|unique:products',
        ]);

        $product = Product::create($request->except('attributes'));

        if($request->has('attributes')) {

            $product->attributes()->createMany($request->get('attributes'));
        }

        return new ProductResource($product);
    }

    /**
     * @param Product $product
     * @param Request $request
     * @return ProductResource
     */
    public function update(Product $product, Request $request): ProductResource
    {
        $product->update($request->except('attributes'));

        // update attributes

        if($request->has('attributes')) {
            foreach ($request->get('attributes') as $attribute) {
                $product->updateAttribute($attribute);
            }
        }

        return new ProductResource($product);
    }

    /**
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(['status'=>'success','msg'=>'Deleted Successfully']);
    }
}
