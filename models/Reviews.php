<?php

namespace app\models;

class Reviews extends Model
{
    public $id;
    public $idProduct;
    public $idUser;
    public $body;

    public function getTableName () {
        return "Reviews";
    }
}