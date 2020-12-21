<?php


namespace app\models\repositories;

use app\models\Repository;
use app\models\entities\Reviews;
use app\engine\Db;

class ReviewsRepository
{
    public function reviewText ($id) {
        $sql = "SELECT body FROM {$this->getTableName()} WHERE idProduct = :id AND body !=''";
        return Db::getInstance()->queryAll($sql, ['id' => $id]);
    }
    protected function getEntityClass()
    {
        return Reviews::class;
    }

    protected function getTableName()
    {
        return "review";
    }
}