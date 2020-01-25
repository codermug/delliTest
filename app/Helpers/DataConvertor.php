<?php


namespace App\Helpers;

class DataConvertor {

    private  $file;
    private $products  = [];
    private $categories = [];

    // @param root of the json array
    // @return array of data

    // load the file
    // loop throw the array
    // check if key == category
    // split the value into array
    // create custom fuunction to return  categores array
    // create custom function to return products array

    function __construct()
    {
        $this->setFile();
        $this->readFile();
    }

    private function  setFile() {
        $root_name = "products";
        try {
            $file       = env('DB_JSON_DATA_FILE');
            $jsonString = file_get_contents(base_path('database/json/' . $file . '.json'));
            $data       = json_decode($jsonString, true);
            $this->file =  $data[$root_name];

        }catch (\Exception $e) {
            die('Unable to parse the file '.env('DB_JSON_DATA_FILE'));
        }
    }

    private function readFile() {

        foreach ($this->file as $item) {

            if(is_array($item)) {
                if (array_key_exists("category",$item))
                {
                    $this->setCategories($item['category']);
                }

                $this->setProducts($item);
            }
        }
    }


    private function setCategories($category) {
       if(is_string($category)) {
           $categories =  explode(",", $category);
           foreach ($categories as $value) {
               if(!in_array($value, $this->categories)) {
                   $this->categories [] = $value;
               }

           }
        }
    }

    private function setProducts($array) {
       // remove unwanted index or key
       // unset($array['category']);
        array_push($this->products, $array);
    }

    public function getCategories(){
        $this->printr($this->categories);
        return $this->categories;
    }
    public function getProducts(){
        $this->printr($this->products);
        return $this->products;
    }

    private function printr($v) {
        echo '<pre>'; print_r($v);
    }



}
