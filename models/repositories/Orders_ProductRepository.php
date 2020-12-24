<?php


namespace app\models\repositories;

//use app\models\repositories\Orders_ProductRepository;
use app\models\entities\Orders_Products;
use app\models\entities\Users;
use app\models\Repository;
use app\engine\Db;

class Orders_ProductRepository extends Repository
{
    protected function getEntityClass()
    {
        return Orders_Products::class;
    }
    protected function getTableName () {
        return "orders_product";
    }
}