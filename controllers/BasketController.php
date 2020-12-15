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
//    public function actionIndex() {
//        //var_dump($_SESSION['id']);
//        echo $this->render('basket', [
//            'basket' => Basket::getBasket($_SESSION['id'])
//        ]);
//    }
//
//    public function actionAdd() {
//        //$id = json_decode(file_get_contents('php://input'))->id;
//        //$total = json_decode(file_get_contents('php://input'))->total;
//        $id = (new Request())->getParams()['id'];
//var_dump($id);
//
//        (new Basket($_SESSION['id'], $id))->save();
//
//        $response = [
//            'total' => Basket::getCountWhere('userId', $_SESSION['id'])
//        ];
//
//        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
//
//    }
    public  $basket = [];

    public function actionAddBasket()
    {
;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $itemProduct = $_POST;
            Basket::addProductToBasket($itemProduct);
        }
        header("Location: ". $_SERVER["HTTP_REFERER"]);
    }

    // actionBasket() отрисовывает "корзину"

    public function actionBasket() {

        // меняем количество товара в корзине кнопкам + или -

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $change = $_POST;
            Basket::changeCountProduct($change);
        }
        if (!empty($_SESSION['basketAdd'])) {

            $itemProductIds = array_keys($_SESSION['basketAdd']);

            $itemProducts = Product::getAll($itemProductIds);

            foreach($itemProducts as $item) {
                $this->basket [] = [
                    'product' => $item,
                    'qty' => $_SESSION['basketAdd'][$item['id']]
                ];
            }
            echo $this->render('basket', [
                'basket' => $this->basket,
            ]);
        } else {
            echo $this->render('basket', [
                'info' => "В Вашей корзине нет товаров."
            ]);
        }
    }
}