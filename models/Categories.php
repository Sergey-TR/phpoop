<?php


namespace app\models;
use app\engine\Db;

class Categories extends DbModels
{
    protected $id;
    protected $name;

    protected $props = [
            'name' => false
        ];

    public function __construct($name = null)
    {
        $this->name = $name;
    }

    public function getCategoryId($name) {
        $sql = "SELECT id FROM {$this->getTableName()} WHERE name = :name";
        return Db::getInstance()->queryOne($sql, [':name' => $name]);
    }

    protected static function getTableName()
    {
        return "categories";
    }
}