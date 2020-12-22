<?php


namespace app\models;


use app\engine\Db;
use app\interfaces\IModel;
use app\models\entities\Model;

abstract class Repository implements IModel
{
    public function getOne($id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject($sql, ['id' => $id], $this->getEntityClass());
    }

    public function getAll($ids = []) {
        $where = '';
        if(!empty($ids)) {
            $in = ltrim(implode(', ', $ids), ",");
            $where = "WHERE id IN ($in)";
        }
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} {$where}";
        return Db::getInstance()->queryAll($sql);
    }

//    public function getLimit($page) {
//        $tableName = $this->getTableName();
//        $sql = "SELECT * FROM {$tableName} LIMIT ?";
//        return Db::getInstance()->queryLimit($sql, $page);
//    }

    protected function insert(Model $entity) {

        $params = [];
        $columns = [];

        foreach ($entity->props as $key => $value) {
            $params[":{$key}"] = $entity->$key;
            $columns[] = "`$key`";
        }

        $columns = implode(", ", $columns);
        $values = implode(", ", array_keys($params));

        $tableName = $this->getTableName();
        $sql = "INSERT INTO `{$tableName}`({$columns}) VALUES ($values)";
        //var_dump($sql);
        //var_dump($params);
        Db::getInstance()->execute($sql, $params);
        $entity->id = Db::getInstance()->lastId();
        //var_dump($entity->id);
        return $entity->id;
    }

    public function delete(Model $entity) {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        $params = ['id' => $entity->id];
        return Db::getInstance()->execute($sql, $params);
    }

    public function update(Model $entity) {
        $result = [];
        $change =[];
        foreach ($entity->props as $key => $value) {
            if($entity->props[$key] == true) {
                $result += ["$key = :{$key}" => "$key = :{$key}"];
                $change += [$key => $this->$key];
                $entity->props[$key] = false;
            }
        }
        $keys = array_keys($result);
        $row = implode(", ", $keys);
        $id = ['id' => $entity->id];
        $params = array_merge($id, $change);
        $tableName = $this->getTableName();
        $sql = "UPDATE {$tableName} SET {$row} WHERE id = :id";
        //var_dump($sql);
        Db::getInstance()->execute($sql, $params);
    }

    public function save($entity) {
       // var_dump($entity);
        if (is_null($entity->id)) {
            $id = $this->insert($entity);
            return $id;
        } else {
            $this->update($entity);
        }
    }

    public function getLimit($page) {
        //var_dump($page);
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, :page";
        //var_dump($sql);
        return Db::getInstance()->queryLimit($sql, $page);
    }

    public function getOneWhere($name, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `{$name}`=:value";
        return Db::getInstance()->queryObject($sql, ['value' => $value], static::class);

    }

    public function getCountWhere($name, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT count(id) as count FROM {$tableName} WHERE `{$name}`= :value";
        return Db::getInstance()->queryOne($sql, ["value" => $value])['count'];
    }

    abstract protected function getEntityClass();
    abstract protected function getTableName();

}