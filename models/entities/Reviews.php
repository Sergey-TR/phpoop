<?php

namespace app\models\entities;

use app\engine\Db;

class Reviews extends DbModels
{
    public $id;
    public $idProduct;
    public $idUser;
    public $body;


}