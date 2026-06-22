<?php
namespace Core;

class Request {
    public static function input(string $key) {
        return htmlspecialchars($_POST[$key] ?? '');
    }

    public static function method() {
        return $_SERVER['REQUEST_METHOD'];
    }
}
?>