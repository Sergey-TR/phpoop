<?php

namespace app\models;

class Orders extends DbModels
{
    public $id;
    public $idUser;

    protected static function getTableName () {
        return "orders";
    }
}