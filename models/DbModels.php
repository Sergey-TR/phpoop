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
        //var_dump($ids);
        $where = '';
        if(!empty($ids)) {
            $in = ltrim(implode(', ', $ids), ",");
            //var_dump($in);
            $where = "WHERE id IN ($in)";
            //var_dump($where);
        }
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} {$where}";
        return Db::getInstance()->queryAll($sql);
    }

//    public function insert() {
//        $params = [];
//        foreach ($this as $key => $value) {
//            if ($key == 'id') continue;
//            $params += [$key => $value];
//        }
//        $keys = array_keys($params);
//        $row = implode(", ", $keys);
//        $placeholderRow = implode(", :", $keys);
//        $sql = "INSERT INTO `{$this->getTableName()}` ({$row}) VALUES (:{$placeholderRow})";
//        var_dump($sql);
//        Db::getInstance()->execute($sql, $params);
//        $this->id = Db::getInstance()->lastId ();
//        return $this;
//    }
    protected function insert() {

        $params = [];
        $columns = [];

        foreach ($this->props as $key => $value) {
            $params[":{$key}"] = $this->$key;
            $columns[] = "`$key`";
        }

        $columns = implode(", ", $columns);
        $values = implode(", ", array_keys($params));

        $tableName = static::getTableName();
        $sql = "INSERT INTO `{$tableName}`({$columns}) VALUES ($values)";
        //var_dump($sql);
        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastId();
        return $this->id;
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
            $id = $this->insert();
            return $id;
        } else {
            $this->update();
        }
    }

    public static function getLimit($page) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, :page";
        return Db::getInstance()->queryLimit($sql, $page);
    }

    public static function getOneWhere($name, $value) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `{$name}`=:value";
        return Db::getInstance()->queryObject($sql, ['value' => $value], static::class);

    }

    public static function getCountWhere($name, $value) {
//var_dump($name, $value);
        $tableName = static::getTableName();
        $sql = "SELECT count(id) as count FROM {$tableName} WHERE `{$name}`= :value";
//var_dump($sql);
        return Db::getInstance()->queryOne($sql, ["value" => $value])['count'];
    }
}