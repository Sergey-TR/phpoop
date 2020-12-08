<?php

namespace app\models;

use app\engine\Db;

class Reviews extends DbModels
{
    public $id;
    public $idProduct;
    public $idUser;
    public $body;

    public function reviewText ($id) {
        $sql = "SELECT body FROM {$this->getTableName()} WHERE idProduct = :id AND body !=''";
        return Db::getInstance()->queryAll($sql, ['id' => $id]);
    }

    protected static function getTableName () {
        return "review";
    }
}