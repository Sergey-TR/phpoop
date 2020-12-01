<?php

namespace app\engine;

class Db
{
    public function queryOne($sql) {
        //выполнить $sql
        return $sql;
    }

    public function queryAll($sql) {
//        $result = mysqli_query(getConnect(), $sql);
//        return mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $sql;
    }


}