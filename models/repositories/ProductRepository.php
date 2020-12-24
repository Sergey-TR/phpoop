<?php


namespace app\models\repositories;


use app\engine\Db;
use app\models\Repository;
use app\models\entities\Product;

class ProductRepository extends Repository
{
    public function getCategory($id) {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE categoryId = :id";
        return Db::getInstance()->queryAll($sql, $id);
    }

    protected function getEntityClass()
    {
        return Product::class;
    }

    protected function getTableName()
    {
        return "product";
    }
}