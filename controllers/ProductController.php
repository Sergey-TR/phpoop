<?php


namespace app\controllers;

use app\models\Product;
use app\models\Categories;

class ProductController extends Controller
{


    public function actionIndex()
    {
        echo $this->render('index');
    }

    public function actionCatalog()
    {
        $page = $_GET['page']; //1
        $catalog = Product::getLimit($page * PRODUCT_PER_PAGE);//getAll();
        echo $this->render('catalog', [
            'catalog' => $catalog,
            'page' => ++$page
        ]);
    }

    public function actionCard()
    {
        $id = (int)$_GET['id'];
        $item = Product::getOne($id);
        echo $this->render('card', [
            'product' => $item
        ]);
    }

    public function actionCategory()
    {
        $name = (string)$_GET['name'];
        $id = new Categories();
        $id = $id->getCategoryId($name);
        $catalog = new Product();
        $category = $catalog->getCategory($id);
        echo $this->render($name, [
            'category' => $category
        ]);
    }
}