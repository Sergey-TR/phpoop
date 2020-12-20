<?php


namespace app\controllers;
use app\models\Basket;
use app\models\Orders;
use app\models\Orders_Products;

class OrdersController extends Controller
{
    public function actionAdd() {

        if($_SESSION['id'] === null) {
           header('Location: http://' . $_SERVER['HTTP_HOST'] . '/auth/login/?back=/basket/basket/');
        } else {
            $basket = Basket::getBasket();
            echo $this->render('order', ['basket' => $basket,
                'totalSumm' => Basket::getSumm($basket)
            ] );
        }
    }

    public function actionCheck() {
         $post = $_POST;
         $idUser = $_SESSION['id'];
         $userName = $post['name'];
         $phone = $post['phone'];
         $comment = $post['comment'];

        $new = new Orders($idUser, $userName, $phone, $comment);// -> save();
        $id = $new ->save();

        $basket = Basket::getBasket();

        $price = [];
        $idOrder = [];
        $totalOrder = [];
        foreach ($basket as $value => $item) {
            $price += [$value => $item['product']['price']];
            $idOrder += [$value => $item['product']['id']];
            $totalOrder += [$value => $item['qty']];

        }

for ($i = 0; $i < count($idOrder); $i++) {

    $param = new Orders_Products($id, $idOrder[$i], $totalOrder[$i], $price[$i]);
    $param ->save();
}
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/basket/basket/');
    }

}