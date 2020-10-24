<?php

namespace Db\Database;

abstract class Connection
{
    private static $conn;

    public static function getConn()
    {
        if (!self::$conn) {
            self::$conn = new \PDO('mysql: host=localhost; dbname=sistema-login', 'ricardo', 'admin');
        }
        return self::$conn;
    }
}
