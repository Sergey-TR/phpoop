<?php


namespace app\controllers;

use app\models\entities\Orders_Products;
use app\models\entities\Orders;
use app\models\repositories\BasketRepository;
use app\models\Repository;
use app\models\entities\Product;
use app\models\entities\Basket;
use app\engine\Request;

class BasketController extends Controller
{

    public function actionAddBasket()
    {
        $id = (new Request())->getParams()['id'];
        $total = (new Request())->getParams()['total'];
        (new BasketRepository())->addProductToBasket($id, $total); //Basket::addProductToBasket($id, $total);
        $response = [
            'total' => (new BasketRepository())->viewTotal() //Basket::viewTotal(),
        ];
        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    }

    public function actionBasket() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $change = $_POST;
            (new BasketRepository())->changeCountProduct($change); //Basket::changeCountProduct($change);
            $basket = (new BasketRepository())->getBasket(); //Basket::getBasket();
        }
        if (!empty($_SESSION['basketAdd'])) {
            $basket = (new BasketRepository())->getBasket(); //Basket::getBasket();
            echo $this->render('basket', [
                'basket' => $basket,
                'totalSumm' => (new BasketRepository())->getSumm($basket) //Basket::getSumm($basket)
            ]);
        } else {
            echo $this->render('basket', [
                'info' => "В Вашей корзине нет товаров."
            ]);
        }
    }

    public function actionDeleteProductBasket() {
        $id = (new Request())->getParams()['id'];
        (new BasketRepository())->deleteProductFromBasket($id); //Basket::deleteProductFromBasket($id);
        $basket = (new BasketRepository())->getBasket();//Basket::getBasket();
        $response = [
            'total' => (new BasketRepository())->viewTotal(), //Basket::viewTotal(),
            'totalSumm' => (new BasketRepository())->getSumm($basket) //Basket::getSumm($basket),
        ];
        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK);
        //header('Location: http://' . $_SERVER['HTTP_SELF']);
    }

}