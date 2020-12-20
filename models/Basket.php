<?php


namespace app\models;
use app\engine\Db;
use app\models\Product;


class Basket extends DbModels
{
    public $basket = [];


    public function __construct($basket = [])
    {
        $this->basket = $basket;
    }

    public static function addProductToBasket($id, $total) {
        if (isset($_SESSION['basketAdd'][$id])) {
            $_SESSION['basketAdd'][$id] += $total;
        } else {
            $_SESSION['basketAdd'][$id] = $total;
        }
    }

    public static function getBasket() {
        $itemProductIds = array_keys($_SESSION['basketAdd']);
        $itemProducts = Product::getAll($itemProductIds);
        foreach($itemProducts as $item) {
            $basket [] = [
                'product' => $item,
                'qty' => $_SESSION['basketAdd'][$item['id']],
                'summ' => $item['price'] * $_SESSION['basketAdd'][$item['id']]
            ];

        }
        return $basket;
    }

    public static function viewTotal() {
        $catalog = Product::getAll();
       if (!empty($_SESSION['basketAdd'])) {
           foreach ($catalog as $totalCatalog) {
                $total += $_SESSION['basketAdd'][$totalCatalog['id']];
           }
       }
       return $total;
    }

    public static function changeCountProduct($change) {
        if(array_key_exists('plus', $change)) {
            $idChange = $change['plus'];
            $_SESSION['basketAdd'][$idChange] += 1;
        } else  {
            $idChange = $change['minus'];
            $_SESSION['basketAdd'][$idChange] -= 1;
            if($_SESSION['basketAdd'][$idChange] == 0 ) {
                unset($_SESSION['basketAdd'][$idChange]);
                if(empty($_SESSION['basketAdd'])) {
                    header('Location: http://' . $_SERVER['HTTP_HOST']);
                }
            }
        }
    }

    public static function deleteProductFromBasket($id) {
        unset($_SESSION['basketAdd'][$id]);
    }

    public static function getSumm($basket) {
        $totalSumm = (int)"";
        foreach ($basket as $key) {
            $totalSumm += $key['summ'];
        }
        return $totalSumm;
    }

    protected static function getTableName () {
        return "basket";
    }
}