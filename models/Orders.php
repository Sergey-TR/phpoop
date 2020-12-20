<?php

namespace app\models;

use app\engine\Db;
use app\models\Orders_Products;

class Orders extends DbModels
{
    public $id;
    public $idUser;
    public $userName;
    public $phone;
    public $comment;

    protected $props = [
        'idUser' => false,
        'userName' => false,
        'phone' => false,
        'comment' => false
    ];

    public function __construct($idUser = null, $userName = null, $phone = null, $comment = null)
    {
        $this->idUser = $idUser;
        $this->userName = $userName;
        $this->phone = $phone;
        $this->comment = $comment;
    }

    public static function ordersUser($id) {
        $sql = "SELECT count(*) as count FROM orders WHERE idUser = :id";
        return Db::getInstance()->queryAll($sql, ['id' => $id]);
    }

//    public static function getOrders() {
//        $sql = "SELECT id "
//    }

    protected static function getTableName () {
        return "orders";
    }
}