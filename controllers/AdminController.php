<?php


namespace app\controllers;

use app\models\entities\Admin;
use app\engine\Request;
use app\engine\Session;
use app\models\repositories\AdminRepository;
use app\models\repositories\UserRepository;


class AdminController extends Controller
{
    public function actionViewOrders() {
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
        $idOrder = (new Request())->getParams()['idOrder'];
        //$idOrder = $_POST['idOrder'];
        //var_dump($idOrder);
        $orderUser = (new AdminRepository())->getOrderByUser($idOrder);
        echo $this->render('adminpage', [
           'order' => $orderUser
        ]);
    }
}