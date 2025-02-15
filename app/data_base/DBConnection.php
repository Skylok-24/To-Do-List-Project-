<?php

namespace app\data_base;

use PDO;
use PDOException;

class DBConnection
{
    private static $pdo = null;

    public static function make($data)
    {

        if (!self::$pdo) {
            try {
                self::$pdo = new PDO("mysql:unix_socket={$data['unix_socket']};dbname={$data['name']}","{$data['user']}","{$data['password']}");
            }catch (PDOException $e) {
                die('could not connect to database '.$e->getMessage());
            }
        }
        return self::$pdo;
    }
}