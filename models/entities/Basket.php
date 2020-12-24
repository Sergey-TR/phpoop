<?php


namespace app\models\entities;

use app\engine\Db;
use app\models\entities\Product;


class Basket extends Model
{
    public $basket = [];


    public function __construct($basket = [])
    {
        $this->basket = $basket;
    }
}