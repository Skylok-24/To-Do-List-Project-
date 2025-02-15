<?php

namespace app\data_base;

use PDO;

class QueryBuilder
{
    public static $pdo;

    public static function meke(PDO $pdo)
    {
        self::$pdo = $pdo;
    }

    public static function get(string $table , $where = null)
    {
        $querystr = "SELECT * FROM {$table}";
        if (is_array($where)) {
            $querystr .= " WHERE " . implode(' ',$where);
        }
        $query = self::$pdo->prepare($querystr);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public static function insert($table , $data)
    {
        $column = array_keys($data);
        $columnvalues = implode(',',$column);
        $values = str_repeat('?,',count($data) - 1) . '?';
        $insert = "INSERT INTO {$table} ({$columnvalues}) VALUES ({$values})";
        $query = self::$pdo->prepare($insert);
        $query->execute(array_values($data));
    }

    public static function update($tabel , $id , $data)
    {
        $fields = implode('= ? ,' , array_keys($data)) . '= ?';
        $update = "UPDATE {$tabel} SET {$fields} WHERE id = {$id} ";
        $query = self::$pdo->prepare($update);
        $query->execute(array_values($data));
    }

    public static function delete($table,$id,$column = 'id',$operator = '=')
    {
        $delete = "DELETE FROM {$table} WHERE {$column} {$operator} {$id}";
        $query = self::$pdo->prepare($delete);
        $query->execute();
    }
}