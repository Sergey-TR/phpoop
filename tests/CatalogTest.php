<?php

namespace app\tests;

use app\models\entities\Product;
use app\models\repositories\ProductRepository;
//require_once './models/entities/Product.php';

class CatalogTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider providerProduct
     */
    public function testProduct($title, $category) {
        $class = new Product($title, $category);
        //$this->assertEquals(($params['id'])->price, $params['price']);
        //$this->assertEquals(Product::find($params['id'])->price, $params['price']);
        $this->assertEquals($title, $class->title);
        $this->assertEquals($category, $class->categoryId);
    }

    public function providerProduct(){
        return [
            ['blond' , 1],
        ['SHIRT', 2]
        ];
    }

    //НЕ ПОНИМАЮ ПОЧЕМУ ЭТО РАБОТАЕТ, А ТО ЧТО ВЫШЕ НЕТ

//    public function testProduct() {
//        $name = "blond";
//        $product = new Product($name);
//        $this->assertEquals($name, $product->title);
//    }

}
