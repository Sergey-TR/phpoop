<?php


namespace app\models;


class Categories extends Model
{
    public $id;
    public $name;

    public function __construct($name = null)
    {
        $this->name = $name;
    }


    public function getTableName()
    {
        return "categories";
    }
}