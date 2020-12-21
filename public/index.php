<?php

//session_start();
//var_dump($_SESSION);
//use app\models\Product;
//use app\models\Users;
//use app\models\Orders;
//use app\models\Orders_Products;
//use app\models\Reviews;
use app\engine\Db;
use app\engine\Autoload;
//use app\models\Categories;
use app\engine\TwigRender;
use app\engine\Request;

require_once '../vendor/autoload.php';
include "../config/config.php";
//include "../engine/Autoload.php";

//spl_autoload_register([new Autoload(), 'loadClass']);

$session = new \app\engine\Session();
$session->sessionStart();

try {
$request = new Request();

$controllerName = $request->getControllerName() ?: 'product';
$actionName = $request->getActionName();

$controllerClass =  CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new TwigRender());
    $controller->runAction($actionName);
}
} catch (\PDOException $e) {
    var_dump($e->getMessage());
} catch (\Exception $e) {
    var_dump($e->getMessage());
}
//$url = explode('/', $_SERVER['REQUEST_URI']);
//$controllerName = $url[1] ?: 'product';
//$actionName = $url[2];

//$controllerClass =  CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";
//
//if (class_exists($controllerClass)) {
//
//    $controller = new $controllerClass(new \app\engine\TwigRender());//(new \app\engine\Render());
//
//    $controller->runAction($actionName);
//}




