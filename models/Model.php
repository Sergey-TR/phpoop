<?php


namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{

//    protected $db;
//
//    public function __construct($db)
//    {
//        $this->db = $db;
//    }

    public function getOne($id) {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = :id";
        return Db::getInstance()->queryObject($sql, ['id' => $id], static::class);
    }

    public function getAll() {
        $sql = "SELECT * FROM {$this->getTableName()}";
        return Db::getInstance()->queryAll($sql);
    }

    public function insert() {
        $params = [];
        foreach ($this as $key => $value) {
            if ($key == 'id') continue;
            $params += [$key => $value];
        }
        $keys = array_keys($params);
        $row = implode(", ", $keys);
        $placeholderRow = implode(", :", $keys);
        $sql = "INSERT INTO `{$this->getTableName()}` ({$row}) VALUES (:{$placeholderRow})";
        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastId ();
        return $this;
    }

//    public function delete($id) {
//        $sql = "DELETE FROM {$this->getTableName()} WHERE id = :id";
//        return Db::getInstance()->query($sql, ['id' => $id]);
//    }

    /* если вызывать $product->getOne(25)->delete(), то работает.
     * если так var_dump($users->getOne(20));
                $users->delete(); - не работает
     * */
    public function delete() {
        $sql = "DELETE FROM {$this->getTableName()} WHERE id = :id";
        $params = ['id' => $this->id];
        //var_dump($params);
        return Db::getInstance()->execute($sql, $params);
    }

    // НЕ УСПЕВАЮ СДАТЬ ДО НАЧАЛА УРОКА
    public function update($data = []) {
        var_dump($data);
        $result = [];
        foreach ($data as $key => $value) {
            $result += ["$key = :{$key}" => "$key = :{$key}"];
        }
        $keys = array_keys($result);
        $row = implode(", ", $keys);
        $id = ['id' => $this->id];
        $params = array_merge($id, $data);
        $sql = "UPDATE {$this->getTableName()} SET {$row} WHERE id = :id";
        Db::getInstance()->execute($sql, $params);
    }
    abstract public function getTableName();
}