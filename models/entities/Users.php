<?php

namespace app\models\entities;

class Users extends Model
{
    protected $id;
    protected $login;
    protected $password;
    protected $email;

    protected $props = [
        'login' => false,
        'password' => false,
        'email' => false
    ];

    public function __construct($login = null, $password = null, $email = null)
    {
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
    }
}