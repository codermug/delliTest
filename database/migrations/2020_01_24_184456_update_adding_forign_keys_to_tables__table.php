<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAddingForignKeysToTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
           $table->foreign('category_id')
                 ->references('id')->on('categories');
        });

        Schema::table('product_attributes', function (Blueprint $table) {
            $table->foreign('product_id')
                 ->references('id')
                 ->on('products')
                 ->onDelete('cascade');
        });


    }

    public function down() {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_category_id_foreign');

        });



        Schema::table('product_attributes', function (Blueprint $table) {
            $table->dropForeign('product_attributes_product_id_foreign');

        });
    }

}
