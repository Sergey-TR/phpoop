<?php


namespace app\models\repositories;


use app\models\Repository;
use app\models\entities\Users;

class UserRepository extends Repository
{
    public function auth($login, $pass) {
        $user = (new UserRepository())->getOneWhere('login', $login); //Users::getOneWhere('login', $login);
        //var_dump($_SESSION['login']);
        if (password_verify($pass, $user->password)) {
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $user->id;
            //var_dump($_SESSION['login']);
            return true;
        } else {
            return false;
        }
    }

    public function isAuth() {
        return isset($_SESSION['login']);
    }

    public function getName() {

        return $_SESSION['login'];
    }

    protected function getEntityClass()
    {
        return Users::class;
    }

    protected function getTableName()
    {
        return "users";
    }
}