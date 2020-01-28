<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public    $table = "products";
    protected $guarded = array('id');

    protected $attributes = [
        'category_id' => 1,
    ];

    public  function category() {
        return $this->belongsTo('App\Models\Category');
    }


    public  function categories() {
        return $this->belongsToMany(Category::class);
    }


    public  function attributes() {
        return $this->hasMany('App\Models\ProductAttributes');
    }


    public function updateAttribute($attribute) {

        $updated_attribute = $this->attributes()->where('attr_name',$attribute['attr_name'])->first();
        if($updated_attribute) {
            $updated_attribute->update($attribute);
        }
    }
}
