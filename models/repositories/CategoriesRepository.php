<?php


namespace app\models\repositories;


use app\engine\Db;
use app\models\entities\Categories;
use app\models\Repository;

class CategoriesRepository extends Repository
{
    public function getCategoryId($name) {
        $sql = "SELECT id FROM {$this->getTableName()} WHERE name = :name";
        return Db::getInstance()->queryOne($sql, [':name' => $name]);
    }
    protected function getEntityClass()
    {
        return Categories::class;
    }

    protected function getTableName()
    {
        return "categories";
    }
}