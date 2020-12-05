<?php

namespace app\models;

class Orders_Products extends Model

{
    public $id;
    public $orderId;
    public $productId;
    public $total;

    public function getTableName () {
        return "orders_product";
    }

}