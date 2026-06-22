<?php
namespace Config;
use PDO;

class Database {
    private static ?PDO $connection = null;

    public static function connect(): PDO {
        if(self::$connection === null) {
            self::$connection = new PDO(
                "mysql:host=".$_ENV['DB_HOST'] . ";dbname=".$_ENV['DB_NAME'] . ";charset=utf8mb4", $_ENV['DB_USER'], $_ENV['DB_PASS']
            );

            self::$connection->setAttribute(
                PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
            );

            self::$connection->setAttribute(
                PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC
            );
        }
        return self::$connection;
    }
}
?>