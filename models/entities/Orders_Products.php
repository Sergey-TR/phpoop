<?php

namespace app\models\entities;

use app\engine\Db;
use app\models\Orders;
use app\controllers\OrdersController;

class Orders_Products extends Model

{
    public $id;
    public $orderId;
    public $productId;
    public $total;
    public $price;

    protected $props = [
        'orderId' => false,
        'productId' => false,
        'total' => false,
        'price' => false
        ];


    public function __construct($orderId = null, $productId = null, $total = null, $price = null)
    {
        $this->orderId = $orderId;
        $this->productId = $productId;
        $this->total = $total;
        $this->price = $price;
    }

}