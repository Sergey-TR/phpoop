<?php


namespace app\models;
use app\engine\Db;

class Basket extends DbModels
{
    public $id;
    public $userSession;
    public $productId;
    public $total;

    public function gerOrderProduct($productId) {
        $sql = "SELECT * FROM {$this->getTableName()} ";
    }

    protected static function getTableName () {
        return "basket";
    }
}