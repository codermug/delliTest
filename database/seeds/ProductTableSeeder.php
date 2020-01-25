<?php

use Illuminate\Database\Seeder;

use App\Models\Product;
use App\Helpers\DataConvertor;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // read the data from json and convert it to array
        $products = new DataConvertor();

        // hardcoded the insertion process because leak of time !
        foreach ($products->getProducts() as $product) {
            $products_to_insert[] = [
                'category' => $product['category'],
                'category_id' => 1,
                'name' =>$product['name'],
                'sku'  =>$product['sku'],
                'price'=> $product['price']
            ];

        }
        DB::table('products')->insert($products_to_insert);
    }
}
