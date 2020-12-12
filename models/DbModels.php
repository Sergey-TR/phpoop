<?php


namespace app\models;


use app\engine\Db;

abstract class DbModels extends Model
{
    public static function getOne($id) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject($sql, ['id' => $id], static::class);
    }

    public static function getAll($ids = []) {
        $where = '';
        if(!empty($ids)) {
            $in = implode(', ', $ids);
            $where = "WHERE id IN ($in)";
        }
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} {$where}";
        return Db::getInstance()->queryAll($sql);
    }


//    function getProductImages (array $ids = []) {
//        if(!empty($ids)) {
//            $in = implode(', ', $ids);
//            $where = "WHERE id IN ($in)";
//        }
//        return queryAll("SELECT * FROM product_img {$where}");
//    }

    public function insert() {
        $tableName = static::getTableName();
        $params = [];
        foreach ($this as $key => $value) {
            if($key == 'id' || $key == 'props') continue;
            $params += [$key => $value];
        }
        $keys = array_keys($params);
        $row = implode(", ", $keys);
        $placeholderRow = implode(", :", $keys);
        $sql = "INSERT INTO `{$tableName}` ({$row}) VALUES (:{$placeholderRow})";
        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastId ();
        return $this;
    }

    /* если вызывать $product->getOne(25)->delete(), то работает.
     * если так var_dump($users->getOne(20));
                $users->delete(); - не работает
     * */
    public function delete() {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        $params = ['id' => $this->id];
        return Db::getInstance()->execute($sql, $params);
    }

    public function update() {
        $result = [];
        $change =[];
        foreach ($this->props as $key => $value) {
            if($this->props[$key] == true) {
                $result += ["$key = :{$key}" => "$key = :{$key}"];
                $change += [$key => $this->$key];
                $this->props[$key] = false;
            }
        }
        $keys = array_keys($result);
        $row = implode(", ", $keys);
        $id = ['id' => $this->id];
        $params = array_merge($id, $change);
        $tableName = static::getTableName();
        $sql = "UPDATE {$tableName} SET {$row} WHERE id = :id";
        Db::getInstance()->execute($sql, $params);
    }

    public function save() {
        if(!($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    public static function getLimit($page) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, :page";
        return Db::getInstance()->queryLimit($sql, $page);
    }
}