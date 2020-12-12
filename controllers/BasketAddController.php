<?php


namespace app\controllers;

use app\models\Orders_Products;
use app\models\Orders;
use app\models\DbModels;
use app\models\Product;

class BasketAddController extends Controller
{
    public  $basket = [];
    public $totalCart;

    // actionAddBasket() при добавлении товара в корзину вызывается этот метод,
    // он не должен отображать корзину, я понимаю класс BasketAddController не
    // соответствует SOLID, но пока так.
    // Как сделать редирект чтобы возвращалось на ту страницу с которой был
    // отправлен запрос на добавление в корзину, потому что запрос может быть
    // отправлен со страницы каталога, страниц "man", "women", со страницы просмотра
    // карточки товара?

    public function actionAddBasket()
    {
;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $itemProduct = $_POST;

            $itemProductId = $itemProduct['id'];
            $itemProductQuantity = $itemProduct['quantity'];

            if (isset($_SESSION['basketAdd'][$itemProductId])) {

                $_SESSION['basketAdd'][$itemProductId] += $itemProductQuantity;
            } else {
                $_SESSION['basketAdd'][$itemProductId] = $itemProductQuantity;

            }
        }
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/product/catalog/&page=1');
        //header("Location: ". $_SERVER["REQUEST_URI"]);
        //header('Location: '.$_SERVER['PHP_SELF']);
        //header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"]);
    }

    // actionBasket() отрисовывает "корзину"

    public function actionBasket() {

        // меняем количество товара в корзине кнопкам + или -

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $change = $_POST;
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
        if (!empty($_SESSION['basketAdd'])) {

            $itemProductIds = array_keys($_SESSION['basketAdd']);

            $itemProducts = Product::getAll($itemProductIds);

            foreach($itemProducts as $item) {
                $this->basket [] = [
                    'product' => $item,
                    'qty' => $_SESSION['basketAdd'][$item['id']]
                ];

                $this->total += $_SESSION['basketAdd'][$item['id']];
            }

            echo $this->render('basket', [
                'basket' => $this->basket,
                'total' => $this->total
            ]);
        } else {
            echo $this->render('basket', [
                'basket' => $this->basket,
                'total' => $this->total,
                'info' => "В Вашей корзине нет товаров."
            ]);
        }
    }
}