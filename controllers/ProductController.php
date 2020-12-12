<?php


namespace app\controllers;

use app\models\Product;
use app\models\Categories;

class ProductController extends Controller
{
    // ЗДЕСЬ ПРИШЛОСЬ СДЕЛАТЬ ВОТ ТАКОЕ БЕЗОБРАЗИЕ
    //$catalog = Product::getAll();
    //if (!empty($_SESSION['basketAdd'])) {
    //foreach ($catalog as $totalCatalog) {
    //$this->total += $_SESSION['basketAdd'][$totalCatalog['id']];
    //}
    //}
    // ДЛЯ ТОГО ЧТОБЫ У ЗНАЧКА КОРЗИНЫ ОТОБРАЖАЛОСЬ КОЛИЧЕСТВО

    public function actionIndex()
    {
        $catalog = Product::getAll();
        if (!empty($_SESSION['basketAdd'])) {
            foreach ($catalog as $totalCatalog) {
                $this->total += $_SESSION['basketAdd'][$totalCatalog['id']];
            }
        }
        echo $this->render('index', [
            'total' => $this->total
        ]);
    }

    public function actionCatalog()
    {
        $page = $_GET['page']; //1
        $catalog = Product::getLimit($page * PRODUCT_PER_PAGE);//getAll();
        if (!empty($_SESSION['basketAdd'])) {
            foreach ($catalog as $totalCatalog) {
                $this->total += $_SESSION['basketAdd'][$totalCatalog['id']];
            }
        }
        echo $this->render('catalog', [
            'catalog' => $catalog,
            'page' => ++$page,
            'total' => $this->total
        ]);
    }

    public function actionCard()
    {
        $id = (int)$_GET['id'];
        $item = Product::getOne($id);
        $catalog = Product::getAll();
        if (!empty($_SESSION['basketAdd'])) {
            foreach ($catalog as $totalCatalog) {
                $this->total += $_SESSION['basketAdd'][$totalCatalog['id']];
            }
        }
        echo $this->render('card', [
            'product' => $item,
            'total' => $this->total
        ]);
    }

    public function actionCategory()
    {
        $name = (string)$_GET['name'];
        $id = new Categories();
        $id = $id->getCategoryId($name);
        $catalogCategory = new Product();
        $category = $catalogCategory->getCategory($id);
        $catalog = Product::getAll();
        if (!empty($_SESSION['basketAdd'])) {
            foreach ($catalog as $totalCatalog) {
                $this->total += $_SESSION['basketAdd'][$totalCatalog['id']];
            }
        }
        echo $this->render($name, [
            'category' => $category,
            'total' => $this->total
        ]);
    }
}