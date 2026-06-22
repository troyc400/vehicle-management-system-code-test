<?php
namespace Core;

class Session {
    public static function login(array $user): void {
        session_regenerate_id(true);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
    }

    public static function logout(): void {
        session_unset();
        session_destroy();
    }

    public static function isAuthenticated(): bool {
        return isset($_SESSION['user_id']);
    }

    public static function role(): ?string {
        return $_SESSION['role'] ?? null;
    }
}
?>