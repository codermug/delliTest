<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::prefix('v1')->group(function(){

    Route::apiResource('/product', 'Api\v1\ProductController')->only(['show','destroy','update','store']);

    Route::apiResource('/products', 'Api\v1\ProductController')->only(['index']);


    Route::apiResource('/category', 'Api\v1\CategoryController');
    Route::apiResource('/categories', 'Api\v1\CategoryController')->only(['index']);

});
