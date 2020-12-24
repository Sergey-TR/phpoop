<?php


namespace app\controllers;

use app\models\entities\Product;
use app\models\entities\Categories;
use app\models\repositories\CategoriesRepository;
use app\models\repositories\ProductRepository;

class ProductController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('index', [
        ]);
    }

    public function actionCatalog()
    {
        $page = $_GET['page']; //1
        //var_dump($page);
        $catalog = (new ProductRepository())->getLimit(($page +1) * PRODUCT_PER_PAGE); // Product::getLimit(($page +1) * PRODUCT_PER_PAGE);//getAll();
        //var_dump($catalog);
        echo $this->render('catalog', [
            'catalog' => $catalog,
            'page' => ++$page,
        ]);
    }

    public function actionCard()
    {
        $id = (int)$_GET['id'];
        $item = (new ProductRepository())->getOne($id); //Product::getOne($id);
       // $catalog = Product::getAll();
        echo $this->render('card', [
            'product' => $item,
        ]);
    }

    public function actionCategory()
    {
        $name = (string)$_GET['name'];
        //$id = new Categories();
        //var_dump($name);
        $id = (new CategoriesRepository())->getCategoryId($name); //$id->getCategoryId($name);
        //var_dump($id);
        //$catalogCategory = new Product();
        $category = (new ProductRepository())->getCategory($id); //$catalogCategory->getCategory($id);

        echo $this->render($name, [
            'category' => $category,
        ]);
    }
}