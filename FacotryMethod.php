<?php

/**
 *  Factory class
 *  note that the class it creates has to have prefix "Product_" in a class name
 *  have a look at the test.php to see example of use
 */
class ProductFactory{

    /**
     *  Factory create method
     *  returns object
     */
    public static function create($product, $name){
        if(!class_exists("Product_".$product)) throw new Exception("Product class $product was not registered or loaded", 1);
        $productClass = "Product_".$product;
        return new $productClass($name);
    }
}

