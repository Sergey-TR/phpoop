<?php

namespace app\models;

class Orders_Products extends DbModels

{
    public $id;
    public $orderId;
    public $productId;
    public $total;




    protected static function getTableName () {
        return "orders_product";
    }

}