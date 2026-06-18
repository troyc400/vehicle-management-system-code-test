<?php
namespace Core;
use Config\Database;
use PDO;

abstract class Model {
    protected PDO $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }
}
?>