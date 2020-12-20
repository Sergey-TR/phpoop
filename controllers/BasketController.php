<?php


namespace app\controllers;

use app\models\Orders_Products;
use app\models\Orders;
use app\models\DbModels;
use app\models\Product;
use app\models\Basket;
use app\engine\Request;

class BasketController extends Controller
{

    public function actionAddBasket()
    {
        $id = (new Request())->getParams()['id'];
        $total = (new Request())->getParams()['total'];
        Basket::addProductToBasket($id, $total);
        $response = [
            'total' => Basket::viewTotal(),
        ];
        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    }

    public function actionBasket() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $change = $_POST;
            Basket::changeCountProduct($change);
            $basket = Basket::getBasket();
        }
        if (!empty($_SESSION['basketAdd'])) {
            $basket = Basket::getBasket();
            echo $this->render('basket', [
                'basket' => $basket,
                'totalSumm' => Basket::getSumm($basket)
            ]);
        } else {
            echo $this->render('basket', [
                'info' => "В Вашей корзине нет товаров."
            ]);
        }
    }

    public function actionDeleteProductBasket() {
        $id = (new Request())->getParams()['id'];
        Basket::deleteProductFromBasket($id);
        $basket = Basket::getBasket();
        $response = [
            'total' => Basket::viewTotal(),
            'totalSumm' => Basket::getSumm($basket),
        ];
        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK);
        //header('Location: http://' . $_SERVER['HTTP_SELF']);
    }

}