<?php

namespace app\models\repositories;

use app\engine\Db;
use app\models\entities\Basket;
use app\models\repositories\ProductRepository;
use app\models\Repository;
use app\models\entities\Product;

class BasketRepository extends Repository
{

    public function addProductToBasket($id, $total) {
        if (isset($_SESSION['basketAdd'][$id])) {
            $_SESSION['basketAdd'][$id] += $total;
        } else {
            $_SESSION['basketAdd'][$id] = $total;
        }
    }

    public function getBasket() {
        $itemProductIds = array_keys($_SESSION['basketAdd']);
        $itemProducts = (new ProductRepository())->getAll($itemProductIds); //Product::getAll($itemProductIds);
        foreach($itemProducts as $item) {
            $basket [] = [
                'product' => $item,
                'qty' => $_SESSION['basketAdd'][$item['id']],
                'summ' => $item['price'] * $_SESSION['basketAdd'][$item['id']]
            ];

        }
        return $basket;
    }

    public function viewTotal() {
        $catalog = (new ProductRepository())->getAll();//Product::getAll();
        if (!empty($_SESSION['basketAdd'])) {
            foreach ($catalog as $totalCatalog) {
                $total += $_SESSION['basketAdd'][$totalCatalog['id']];
            }
        }
        return $total;
    }

    public function changeCountProduct($change) {
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

    public function deleteProductFromBasket($id) {
        unset($_SESSION['basketAdd'][$id]);
    }

    public function getSumm($basket) {
        $totalSumm = (int)"";
        foreach ($basket as $key) {
            $totalSumm += $key['summ'];
        }
        return $totalSumm;
    }

    protected function getEntityClass()
    {
        return Basket::class;
    }

    protected function getTableName()
    {
        return "basket";
    }
}