<?php

namespace app\models;

class Users extends Model
{
    public $id;
    public $login;
    public $password;
    public $email;

    public function getTableName () {
        return "Users";
    }
}