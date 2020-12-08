<?php


namespace app\controllers;

use app\models\Orders_Products;

class BasketController extends Controller
{
    public function actionBasket() {

        $id = 2;// сюда должно прилетать id продукта
        //$orders = new Orders_Products();
        //$orders = $orders->getOrderProduct($id);

        echo $this->render('basket', );

    }
}