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


    public function getTableName () {
        return "Product";
    }
}