<?php

use Illuminate\Database\Seeder;
use App\Helpers\DataConvertor;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // read the data from json and convert it to array
        $categories = new DataConvertor();


        // hardcoded the insertion process because leak of time !
        foreach ($categories->getCategories() as $category) {
            $to_insert[] = ['name' =>$category];
        }
        DB::table('categories')->insert($to_insert);

    }
}
