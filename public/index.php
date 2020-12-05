<?php

use app\models\Product;
use app\models\Users;
use app\models\Orders;
use app\models\Orders_Products;
use app\models\Reviews;
use app\engine\Db;
use app\engine\Autoload;
use app\models\Categories;


include "../config/config.php";
include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Product();

$users = new Users();

$orders = new Orders();

$orderProduct = new Orders_Products();

$reviews = new Reviews();
//echo "<pre>";
//var_dump($reviews->reviewText(2));
//echo "</pre>";
$category = new Categories();
//echo "<pre>";
//var_dump($product->getOne(25));
//echo "</pre>";
//
//echo "<pre>";
//var_dump($users->getOne(1));
//echo "</pre>";
//$product = new Product('mayka', 'white', '50', '13.png', '1');
//echo "<pre>";
//var_dump($product->insert());
//echo "</pre>";
var_dump($product->getOne(13)->update(['title'=>'mike', 'views'=>'0', 'price'=>'155']));
//$users = new Users('Fuck', 'dogs', 'ful@mail.ru');
//echo "<pre>";
//var_dump($users->insert());
//var_dump($users->delete());
//var_dump($users);
//echo "</pre>";

// так работает
//var_dump($product->getOne(25)->delete());

//так не работает
//var_dump($users->getOne(20));
//$users->delete();


// НЕ УСПЕВАЮ
//var_dump($users->getOne(3)->update(['login'=>'mike', 'email'=>'mim@ya.uu']));
//$users->login = 'mike';
//var_dump($users);
//var_dump($users->update());



