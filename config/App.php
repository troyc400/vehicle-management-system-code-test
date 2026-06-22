<?php
namespace Config;

class App {
    public static function url(string $path = ''): string {
        return '/vehicle-management-system-code-test/public'. $path;
    }
}
?>