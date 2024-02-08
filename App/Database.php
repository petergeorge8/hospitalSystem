<?php

namespace App;

use PDO;

/**
 * mixin PDO
 */
class Database
{
    private PDO $conn;

    public function __construct(array $dbconfig)
    {

        try {
            $this->conn = new PDO("mysql:host=" . $dbconfig['DB_HOST'] . ";dbname=" . $dbconfig['DB_NAME'], $dbconfig['DB_USER'], $dbconfig['DB_PASS'], [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function __call($method, $args)
    {
        return call_user_func_array([$this->conn, $method], $args);
    }
}
