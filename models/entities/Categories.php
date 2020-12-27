<?php


namespace app\models\entities;
use app\engine\Db;

class Categories extends Model
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
}