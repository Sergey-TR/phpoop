<?php

namespace app\models\entities;

use app\engine\Db;
use app\models\entities\Orders_Products;

class Orders extends Model
{
    public $id;
    public $idUser;
    public $userName;
    public $phone;
    public $comment;
    //public $status;

    protected $props = [
        'idUser' => false,
        'userName' => false,
        'phone' => false,
        'comment' => false,
        //'status' => false
    ];

    public function __construct($idUser = null, $userName = null, $phone = null, $comment = null)//, $status = null)
    {
        $this->idUser = $idUser;
        $this->userName = $userName;
        $this->phone = $phone;
        $this->comment = $comment;
        //$this->status = $status;
    }




}