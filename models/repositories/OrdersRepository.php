<?php


namespace app\models\repositories;


use app\engine\Db;
use app\models\entities\Orders;
use app\models\entities\Reviews;
use app\models\Repository;

class OrdersRepository extends Repository
{
    public function ordersUser($id) {
        $sql = "SELECT count(*) as count FROM orders WHERE idUser = :id";
        return Db::getInstance()->queryAll($sql, ['id' => $id]);
    }
    protected function getEntityClass()
    {
        return Orders::class;
    }

    protected function getTableName()
    {
        return "orders";
    }
}