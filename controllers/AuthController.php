<?php


namespace app\controllers;

use app\engine\Validator;
use app\models\entities\Users;
use app\models\repositories\UserRepository;
use app\helpers\Helper;
use app\engine\Session;

class AuthController extends Controller
{
    public function actionRegistration() {
        echo $this->render('registration');
    }

    public function actionCheckin() {
        $data = $_POST;
        $login = $data['login'];
        $email = $data['email'];
        $password = password_hash($data['password'], PASSWORD_BCRYPT);
        $validator = new \app\engine\validator\Validator($data);
        $errors = $validator->validate();
        if( $errors ) {
            echo $this->render('registration', ['errors' => $errors]);
            die();
    }
        $user = new Users($login, $password, $email);
        (new UserRepository())->save($user);

        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/auth/login');
    }

    public function actionLogin() {
        //$back =isset($_GET['back']) ? $_GET['back'] : '/';
        echo $this->render('login');
    }

    public function actionIn() {
        $login = $_POST['login'];
        $pass = $_POST['password'];
        //$back = (isset($_GET['back']) ? $_GET['back'] : '/') . 'basket';
        //var_dump($back);
        if ((new UserRepository())->auth($login, $pass)) {
            header('Location: http://' . $_SERVER['HTTP_HOST']);
        }
        else {
            $errorMsg = 'Такой комбинации логин и пароль нет.';
            echo $this->render('login', ['error' => $errorMsg]);
        }

    }

    public function actionLogout() {
        $session = new Session();
        $session->regenerateSession();
        $session->destroySession();
//        unset($_SESSION['login']);
//        unset($_SESSION['id']);
        header("Location:" . $_SERVER['HTTP_REFERER']);
        die();
    }

}