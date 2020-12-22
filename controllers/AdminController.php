<?php


namespace app\controllers;

use app\models\entities\Admin;
use app\models\repositories\AdminRepository;
use app\models\repositories\UserRepository;


class AdminController extends Controller
{
    public function actionViewOrders() {
        //if(isAuth())
       //var_dump((new UserRepository())->isAuth());
        if($_SESSION['login'] === 'admin') {
            $orders = (new AdminRepository())->getAllOrders();
            echo $this->render('adminorders', [
                'orders' => $orders
        ]);
        } else {
            $errorMsg = 'Такой комбинации логин и пароль нет.';
            echo $this->render('login', ['error' => $errorMsg]);
        }

    }

    public function actionViewOrderUser() {
        //var_dump($_POST);
        $idOrder = $_POST['idOrder'];
        //var_dump($idOrder);
        $orderUser = (new AdminRepository())->getOrderByUser($idOrder);
        echo $this->render('adminpage', [
           'order' => $orderUser
        ]);
    }
}