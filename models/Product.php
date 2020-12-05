<?php

namespace app\models;

class Product extends Model
{
    public $id;
    public $title;
    public $description;
    public $price;
    public $images;
    public $views;
    public $categoryId;

    public function __construct($title = null, $description = null, $price = null, $images = null, $categoryId = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->images = $images;
        $this->categoryId = $categoryId;
    }

    public function updateViewProduct ($id) {

    }

    public function getTableName () {
        return "product";
    }
}