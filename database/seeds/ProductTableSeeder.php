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
        foreach ($products->getProducts() as $value) {
            $products_to_insert = [
                'categoriesText' => $value['category'],
                'category_id'    => 1,
                'name'           =>$value['name'],
                'sku'            =>$value['sku'],
                'price'          =>$value['price']
            ];

            $categories = \App\Helpers\FetchCategories::execute($value['category']);
            $product = Product::create($products_to_insert);
            $product->categories()->attach($categories);
        }
       // $now = Carbon::now('utc')->toDateTimeString();

       // DB::table('products')->insert($products_to_insert);
    }
}
