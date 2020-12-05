<?php

namespace app\engine;
use app\traits\TSingletone;

class Db
{
    protected $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'pass' => '********',
        'port' => '3306',
        'database' => 'brand',
        'charset' => 'utf8'
    ];

    use TSingletone;

    protected $connection = null;

    protected function getConnection () {
        if(is_null($this->connection)) {
            //var_dump("Подключаюсь к БД!");
            $this->connection = new \PDO($this->prepareDsnString(),
                $this->config['login'],
                $this->config['pass']);
            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
            //var_dump($this->connection);
        return $this->connection;
    }

    protected function prepareDsnString () {
        return sprintf("%s:host=%s;dbname=%s;port=%s;charset=%s",
                $this->config['driver'],
                $this->config['host'],
                $this->config['database'],
                $this->config['port'],
                $this->config['charset']
        );
    }

    public function query ($sql, $params) {
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function execute($sql, $params = []) {
        return $this->query($sql, $params)->rowCount();
    }
    /*
     * получаем объект
     * */
    public function queryObject($sql, $params, $class) {
        echo "<pre>";
        $stmt = $this->query($sql, $params);//->fetch();
        $stmt->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
        return $stmt->fetch();
    }

    public function queryOne($sql, $params) {
        return $this->query($sql, $params)->fetch();
    }

    public function queryAll($sql, $params = []) {
            return $this->query($sql, $params)->fetchAll();;
    }
      //НЕ АБАЙТЕН
    public function lastId () {
        return $this->connection->lastInsertId();
    }
}