<?php


namespace app\models\repositories;

use app\models\entities\Admin;
use app\engine\Db;
use app\models\Repository;

class AdminRepository extends Repository
{
    public function getAllOrders() {
        $sql = "SELECT `orders`.id, `orders`.idUser, `users`.login, `users`.email, `orders`.phone FROM {$this->getTableName()}  
	 JOIN `users` on `orders`.idUser = `users`.id";
      return Db::getInstance()->queryAll($sql);

    }

    public function getOrderByUser($idOrder) {
        $sql = "SELECT `orders_product`.orderId, `users`.login , `product`.title , `orders_product`.total, 
       `orders_product`.price, `orders`.status
	FROM `orders_product`
	 JOIN `orders` ON `orders_product`.orderId = `orders` .id
     JOIN `users` ON `orders`.idUser = `users`.id 
    JOIN `product` ON `orders_product`.productId = `product`.id
   WHERE `orders_product`.orderId = :idOrder";
        return Db::getInstance()->queryAll($sql, ['idOrder' => $idOrder]);
    }

    protected function getEntityClass()
    {
        return Admin::class;
    }

    protected function getTableName()
    {
        return "orders";
    }
}