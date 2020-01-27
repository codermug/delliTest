<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // final array to be return.
        $products = [];

        foreach($this->collection as $product) {

            array_push($products, [
                //'data' => $this->collection,
                'id' => $product->id,
                'category'=>$product->category,
                'categories'=>$product->categories,
                'name' => $product->name,
                'sku'  => $product->sku,
                'price' => $product->price
            ]);

        }

        return $products;
    }
    public function with($request)
    {
        return [
            'meta' => [
                'key' => 'value',
            ],
        ];
    }
}
