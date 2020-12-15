<?php


namespace app\controllers;

use app\engine\Render;
use app\interfaces\IRenderer;
use app\engine\TwigRender;
use app\models\Basket;
use app\models\Product;
use app\models\Users;

class Controller
{
    protected $action;
    protected $defaultAction = 'index';
    protected $layout = 'main';
    protected $useLayout = true;
    protected $renderer;
    protected $total = 0;

    public function __construct($renderer) {
        $this->renderer = $renderer;
//        $this->total = $total;

    }

    public function runAction($action = null) {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();

        } else {
            Die("Экшн не существует");
        }
    }

    public function render($template, $params = []) {

        //$loader = new \Twig\Loader\FilesystemLoader('../TwigViews');
        //$twig = new \Twig\Environment($loader);

        if ($this->useLayout) {
            return $this->renderTemplate("layouts/{$this->layout}", [
                'header' =>  $this->renderTemplate('header', [
                    'username' => Users::getName(),
                    'auth' => Users::isAuth(),
                    'total' => Basket::viewTotal()
                    //'total' => Basket::getCountWhere('userId', $_SESSION['id'])
                ]),
                'content' => $this->renderTemplate($template, $params)
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate($template, $params = []) {
        return $this->renderer->renderTemplate($template, $params);
    }
  //  public function actionBasket() {
//        if (!empty($_SESSION['basketAdd'])) {
//
//            $itemProductIds = array_keys($_SESSION['basketAdd']);
//
//            $itemProducts = Product::getAll($itemProductIds);
//
//            foreach($itemProducts as $item) {
//                $this->basket [] = [
//                    'product' => $item,
//                    'qty' => $_SESSION['basketAdd'][$item['id']]
//                ];
//
//                $this->total += $_SESSION['basketAdd'][$item['id']];
//            }
        //return $this->total->actionBasket($this->total);
 //   }
}