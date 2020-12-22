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
         $status = 'new';

        $new = new Orders($idUser, $userName, $phone, $comment, $status);// -> save();
        //var_dump($new);
        $id = (new OrdersRepository())->save($new);
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


    // А КАК СТАТУС ПОМЕНЯТЬ ЗАПУТАЛСЯ
    public function actionChangeStatusOrders() {
//        //var_dump($_POST);
        foreach ($_POST as $key => $value) {
            $id = $key;
            $status = $value;
        }
        $order = (new OrdersRepository())->getOne($id);
//        //var_dump($order);
//        //$status = $_POST['status'];
//        $idUser = $userName = $phone = $comment = "";
//        $entity = [];
//        foreach ($order as $key => $value) {
//            if($key == 'status') {
//
//            }
//        }
////var_dump($status, $id);
//        $changeStatus = new Orders($idUser, $userName, $phone, $comment, $status);
//       // var_dump($changeStatus);
////        $entity = [];
////        foreach ($changeStatus as $key => $value) {
////            if($key == 'id') {
////
////            }
////            var_dump($key);
////        }
        (new OrdersRepository())->save($order);
////header('Location: http://' . $_SERVER['HTTP_REFERER']);
    }

}