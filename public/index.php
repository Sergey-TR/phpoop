<?php

use app\models\Product;
use app\models\Users;
use app\models\Orders;
use app\models\Orders_Products;
use app\models\Reviews;
use app\engine\Db;
use app\engine\Autoload;
//use app\models\examples\Product;


include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Product(new Db());
echo "<pre>";
var_dump($product);
echo "</pre>";
//$prod = new Product();
//echo "<pre>";
//var_dump($prod);
//echo "</pre>";
$users = new Users(new Db());
$orders = new Orders(new Db());
$orderProduct = new Orders_Products(new Db());
$reviews = new Reviews(new Db());
var_dump($reviews->reviewText(5));
$db = new Db();

