<?php
namespace App\Models;
use Core\Model;

class User extends Model {
    public function findByUsername(string $username): array|false {
        $stmt = $this->db->prepare(
            "SELECT * FROM users WHERE username = :username"
        );

        $stmt->execute([':username' => $username]);
        return $stmt->fetch();
    }
}
?>