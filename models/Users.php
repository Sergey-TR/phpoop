<?php

namespace app\models;

class Users extends DbModels
{
    public $id;
    public $login;
    public $password;
    public $email;

    protected $props = [
        'login' => false,
        'password' => false,
        'email' => false
    ];
    
    public static function auth($login, $pass) {
        //var_dump($login, $pass);
        $user = Users::getOneWhere('login', $login);
        //var_dump($user->password);
        if (password_verify($pass, $user->password)) {
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $user->id;
            return true;
        } else {
            return false;
        }
    }

    public static function isAuth() {
        return isset($_SESSION['login']);
    }

    public static function getName() {
        //var_dump($_SESSION['login']);
        return $_SESSION['login'];
    }

    public function __construct($login = null, $password = null, $email = null)
    {
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
    }




    protected static function getTableName () {
        return "users";
    }
}