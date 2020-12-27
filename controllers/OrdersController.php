<?php


namespace app\controllers;
use app\models\entities\Basket;
use app\models\entities\Orders;
use app\models\entities\Orders_Products;
use app\models\repositories\BasketRepository;
use app\models\repositories\Orders_ProductRepository;
use app\models\repositories\OrdersRepository;
use app\models\repositories\AdminRepository;

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
         $create = new \DateTime();
         $update = new \DateTime();

        $updated_at = $update->format('Y-m-d H:i:s');
        $created_at = $create->format('Y-m-d H:i:s');
         //var_dump($updated_at);
//die();
        $new = new Orders($idUser, $userName, $phone, $comment, $status, $created_at, $updated_at);// -> save();
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



    public function actionChangeStatusOrders() {

        foreach ($_POST as $key => $value) {
            $id = $key;
            $status = $value;
        }

        $order = (new OrdersRepository())->getOne($id);
        $update = new \DateTime();
        $updated_at = $update->format('Y-m-d H:i:s');
        $order->status = $status;
        $order->updated_at = $updated_at;

       (new OrdersRepository())->save($order);

        $orderUser = (new AdminRepository())->getOrderByUser($id);
        echo $this->render('adminpage', [
            'order' => $orderUser
        ]);
        //header('Location: http://' . $_SERVER['HTTP_HOST'] . '/admin/viewOrderUser/');
    }

}