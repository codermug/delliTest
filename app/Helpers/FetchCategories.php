<?php


namespace App\Helpers;

use DB;

class FetchCategories
{
    // @param  string of categories
    // @return array of ids from database
    static  public function execute($str)
    {

       return DB::table('categories')->whereIn('name', explode(',',$str))
            ->pluck('id');

    }

}
