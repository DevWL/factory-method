<?php
/**
 *  Abstract Product class
 */
abstract class Product{

    /**
     * @var some properyty
     */
    private $_id;

    /**
     * sets product
     */
    public function __construct($id){
        $this->setId($id);
    }

    public function setId($id){
        $this->_id = $id;
        echo $this->_id . PHP_EOL;    
    }
}

/**
 *  Table
 */
class Product_Table extends Product{
    private $legs = 3;
}

/**
 *  Chair
 */
class Product_Chair extends Product{
    private $legs = 4;
}

/**
 *  Factory class
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

/**
 *  Controller uses Factory to create new objects
 */
class ProductConroller{

    /**
     *  Create new product
     */
    public function createProduct($class, $param){
        return ProductFactory::create($class, $param);
    }
}

/**
 * @example
 */
$controller = new ProductConroller();
$Table = $controller->createProduct('Table', 'table-123DFS');
$Chair = $controller->createProduct('Chair', 'chair-8268CF');
// $Something = $controller->create('Something', 'Something-0000');
