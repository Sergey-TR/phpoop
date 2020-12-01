<?php


namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{

    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getOne ($id) {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = {$id}";
        return $this->db->queryOne($sql);
    }

    public function getAll () {
        $sql = "SELECT * FROM {$this->getTableName()}";
        return $this->db->queryAll($sql);
    }

    public function insert () {
        $sql = "INSERT INTO {$this->tableName} ({})";
    }

    public function delete() {
        $sql = "Delete ...";
        $this->db->query($sql);
    }

    public function reviewText ($id) {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE idProduct = {$id} AND text !=''";
        return $this->db->queryAll($sql);
    }

    abstract public function getTableName();
}