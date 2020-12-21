<?php


namespace app\controllers;

use app\engine\Render;
use app\interfaces\IRenderer;
use app\engine\TwigRender;
use app\models\repositories\BasketRepository;
use app\models\repositories\OrdersRepository;
use app\models\repositories\ProductRepository;
use app\models\repositories\UserRepository;

class Controller
{
    protected $action;
    protected $defaultAction = 'index';
    protected $layout = 'main';
    protected $useLayout = true;
    protected $renderer;

    public function __construct($renderer)
    {
        $this->renderer = $renderer;
    }

    public function runAction($action = null)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();

        } else {
            die("Экшн не существует");
        }
    }

    public function render($template, $params = [])
    {
        //var_dump($params);
        if ($this->useLayout) {
            return $this->renderTemplate("layouts/{$this->layout}", [
                'header' => $this->renderTemplate('header', [
                    'username' => (new UserRepository())->getName(), //Users::getName(),
                    'auth' => (new UserRepository())->isAuth(), //Users::isAuth(),
                    'total' => (new BasketRepository())->viewTotal(), //Basket::viewTotal(),
                    'orders' => (new OrdersRepository())->ordersUser($_SESSION['id']) //Orders::ordersUser($_SESSION['id'])
                ]),
                'content' => $this->renderTemplate($template, $params)
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate($template, $params = [])
    {
        return $this->renderer->renderTemplate($template, $params);

    }
}