<?php

namespace app\models\entities;

use app\engine\Db;
use app\models\entities\Orders_Products;

class Orders extends Model
{
    protected $id;
    protected $idUser;
    protected $userName;
    protected $phone;
    protected $comment;
    protected $status;
    protected $created_at;
    protected $updated_at;

    protected $props = [
        'idUser' => false,
        'userName' => false,
        'phone' => false,
        'comment' => false,
        'status' => false,
        'created_at' => false,
        'updated_at' => false
    ];

    public function __construct($idUser = null, $userName = null, $phone = null, $comment = null, $status = null,
                                 $created_at = null, $updated_at = null)
    {
        $this->idUser = $idUser;
        $this->userName = $userName;
        $this->phone = $phone;
        $this->comment = $comment;
        $this->status = $status;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }




}