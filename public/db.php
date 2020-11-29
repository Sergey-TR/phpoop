<?php
class Db {
    protected $tableName;
    protected $wheres = [];

    public function table ($tableName) {
        $this->tableName = $tableName;
        return $this;
    }

    public function getById ($id) {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = {$id}<br>";
        return $sql;
    }

    public function get () {
        $sql = "SELECT * FROM {$this->tableName}";
        if(!empty($this->wheres)) $sql .= " WHERE ";
        foreach ($this->wheres as $value) {
            $sql .= $value['field'] . " = " . $value['value'];
            if ($value != end($this->wheres)) $sql .= " AND ";
        }
        $this->wheres = [];
        return $sql . "<br>";
    }

    public function where ($field, $value) {
        $this->wheres[] = [
            'field' => $field,
            'value' => $value
        ];
        return $this;
    }

    public function andWhere ($field, $value) {
        return $this->where($field, $value);
    }
}

$db = new Db ();
echo $db->table('users')->getById(5);
echo $db->table('product')->where('name', 'TV')->where('color', 'black')->andWhere('id', 5)->get();
echo $db->table('users')->get();
