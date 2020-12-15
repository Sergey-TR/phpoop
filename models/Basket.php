<?php


namespace app\models;
use app\engine\Db;
use app\models\Product;

class Basket extends DbModels
{
    public $id;
    public $userId;
    public $productId;
    public $total;

    protected $props = [
        'userId' => false,
        'productId' => false,
        'total' => false
    ];

    public function __construct($userId = null, $productId = null, $total = null)
    {
        $this->userId = $userId;
        $this->productId = $productId;
        $this->total = $total;
    }
// НЕ УЧАСТВУЕТ В РАБОТЕ
//    public static function getBasket($user_id) {
//        $sql = "SELECT basket.id basket_id, product.id prod_id, product.title, product.images, product.price, total
//                FROM `basket`,`product` WHERE `userId` = :session AND basket.productId = product.id";
//        return Db::getInstance()->queryAll($sql, ['session' => $user_id]);
//    }

// ЭТО РАБОТАЕТ С АСИНХРОНОМ
    public static function addProductToBasket($itemProductId, $itemProductQuantity) {
        if (isset($_SESSION['basketAdd'][$itemProductId])) {

            $_SESSION['basketAdd'][$itemProductId] += $itemProductQuantity;
        } else {
            $_SESSION['basketAdd'][$itemProductId] = $itemProductQuantity;

        }
    }
    // ЭТО БЕЗ АСИНХРОНА
//    public static function addProductToBasket($itemProduct) {
//        $itemProductId = $itemProduct['id'];
//        $itemProductQuantity = $itemProduct['quantity'];
//
//        if (isset($_SESSION['basketAdd'][$itemProductId])) {
//
//            $_SESSION['basketAdd'][$itemProductId] += $itemProductQuantity;
//        } else {
//            $_SESSION['basketAdd'][$itemProductId] = $itemProductQuantity;
//
//        }
//    }

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
                    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/product/catalog/&page=1');
                }
            }
        }
    }

    protected static function getTableName () {
        return "basket";
    }
}