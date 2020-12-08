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

$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass =  CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";
//var_dump($controllerClass);
if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->runAction($actionName);
}




