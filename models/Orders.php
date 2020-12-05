<?php

namespace app\models;

class Orders extends Model
{
    public $id;
    public $idUser;

    public function getTableName () {
        return "orders";
    }
}