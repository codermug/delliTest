<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Helpers\DataConvertor;

Route::get('/', function () {
    $products = new DataConvertor();
    $products->getCategories();
    $products = $products->getProducts();

    foreach ($products as $product) {

        $cats = \App\Helpers\FetchCategories::execute($product['category']);

        print_r($cats);

    }

});
