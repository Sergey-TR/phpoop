<?php

session_start();

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

require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../TwigViews');
$twig = new \Twig\Environment($loader);

$url = explode('/', $_SERVER['REQUEST_URI']);
$controllerName = $url[1] ?: 'product';
$actionName = $url[2];

$controllerClass =  CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";
if (class_exists($controllerClass)) {

    $controller = new $controllerClass(new \app\engine\TwigRender($twig));//(new \app\engine\Render());

    $controller->runAction($actionName);
}




