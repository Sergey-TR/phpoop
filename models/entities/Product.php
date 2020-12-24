<?php

namespace app\models\entities;

use app\engine\Db;

class Product extends Model
{
    protected $id;
    protected $title;
    protected $description;
    protected $price;
    protected $images;
    protected $categoryId;

    protected $props = [
        'title' => false,
        'description' => false,
        'price' => false,
        'images' => false,
        'categoryId' => false
    ];

    public function __construct($title = null, $description = null, $price = null, $images = null, $categoryId = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->images = $images;
        $this->categoryId = $categoryId;
    }
}