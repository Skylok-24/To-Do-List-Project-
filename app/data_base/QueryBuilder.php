<?php

namespace App\Database;

use PDO;

class QueryBuilder
{
    public static $pdo;
    public static $log;

    public static function meke(PDO $pdo , $log = null)
    {
        self::$pdo = $pdo;
        self::$log = $log;
    }

    public static function get(string $table , $where = null)
    {
        $querystr = "SELECT * FROM {$table}";
        if (is_array($where)) {
            $querystr .= " WHERE " . implode(' ',$where);
        }
        $query = self::execute($querystr);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public static function insert($table , $data)
    {
        $column = array_keys($data);
        $columnvalues = implode(',',$column);
        $values = str_repeat('?,',count($data) - 1) . '?';
        $insert = "INSERT INTO {$table} ({$columnvalues}) VALUES ({$values})";
        self::execute($insert,$data);
    }

    public static function update($tabel , $id , $data)
    {
        $fields = implode('= ? ,' , array_keys($data)) . '= ?';
        $update = "UPDATE {$tabel} SET {$fields} WHERE id = {$id} ";
        self::execute($update,$data);
    }

    public static function delete($table,$id,$column = 'id',$operator = '=')
    {
        $delete = "DELETE FROM {$table} WHERE {$column} {$operator} {$id}";
        self::execute($delete);
    }

    public static function execute($query,$data = [])
    {
        if (self::$log) {
            self::$log->info($query);
        }
        $statment= self::$pdo->prepare($query);
        $statment->execute(array_values($data));
        return $statment;
    }
}