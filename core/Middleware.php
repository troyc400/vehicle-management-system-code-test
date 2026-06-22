<?php
namespace Core;

class Middleware {
    public static function auth(): void {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . \Config\App::url('/login'));
            exit;
        }
    }

    public static function admin(): void {
        self::auth();
        if ($_SESSION['role'] !== 'admin') {
            http_response_code(403);
            echo "403 Forbidden";
            exit;
        }
    }
}
?>