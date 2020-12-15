<?php


namespace app\controllers;

use app\engine\Validator;
use app\models\Users;
use app\helpers\Helper;

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
        (new Users($login, $password, $email))->save();

        header('Location: http://' . $_SERVER['HTTP_HOST']);
    }

    public function actionLogin() {
        echo $this->render('login');
    }

    public function actionIn() {
        $postIn = $_POST;
        $login = $_POST['login'];
        $pass = $_POST['password'];
//        $helper = new Helper();
//        if(!$helper->array_get($postIn, 'login') || !$helper->array_get($postIn, 'password')){
//            $errorMsg = 'Необходимо передать логин и пароль';
//            echo $this->render('login', ['error' => $errorMsg]);
//        }

        if (Users::auth($login, $pass)) {
            header('Location: http://' . $_SERVER['HTTP_HOST']);
        } else {
            $errorMsg = 'Такой комбинации логин и пароль нет.';
            echo $this->render('login', ['error' => $errorMsg]);
        }

    }

    public function actionLogout() {
        session_destroy();
        header("Location:" . $_SERVER['HTTP_REFERER']);
        die();
    }

}