<?php
namespace Config;
use PDO;

class Database {
    private static ?PDO $connection = null;

    public static function getConnection(): PDO {
        if (self::$connection === null) {
            self::$connection = new PDO(
                sprintf('mysql:host=%s;dbname=%s;charset=utf8mb4', 
                $_ENV['DB_HOST'], 
                $_ENV['DB_NAME']), 
                $_ENV['DB_USER'], 
                $_ENV['DB_PASS']
            );

            self::$connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            self::$connection->setAttribute(
                PDO::ATTR_DEFAULT_FETCH_MODE,
                PDO::FETCH_ASSOC
            );
        }
        return self::$connection;
    }
}
?>