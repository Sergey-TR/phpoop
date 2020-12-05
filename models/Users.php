<?php

namespace app\models;

class Users extends Model
{
    public $id;
    public $login;
    public $password;
    public $email;

    public function __construct($login = null, $password = null, $email = null)
    {
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
    }


    public function getTableName () {
        return "users";
    }
}