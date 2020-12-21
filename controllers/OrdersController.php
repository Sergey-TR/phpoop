<?php


namespace app\controllers;
use app\models\entities\Basket;
use app\models\entities\Orders;
use app\models\entities\Orders_Products;
use app\models\repositories\BasketRepository;
use app\models\repositories\Orders_ProductRepository;
use app\models\repositories\OrdersRepository;

class OrdersController extends Controller
{
    public function actionAdd() {

        if($_SESSION['id'] === null) {
           header('Location: http://' . $_SERVER['HTTP_HOST'] . '/auth/login/?back=/basket/basket/');
        } else {
            $basket = (new BasketRepository())->getBasket(); //Basket::getBasket();
            echo $this->render('order', ['basket' => $basket,
                'totalSumm' => (new BasketRepository())->getSumm($basket) //Basket::getSumm($basket)
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
        $id = (new OrdersRepository()) ->save($new);
        if(!$id) {
            throw new \Exception("Не удалось офрмить заказ");
        }
//var_dump($id);
        $basket = (new BasketRepository())->getBasket();//Basket::getBasket();

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
    //var_dump($param);
    (new Orders_ProductRepository())->save($param);
    //$param ->save();
}
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/basket/basket/');
    }

}