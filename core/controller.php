<?php
namespace Core;

abstract class Controller {
    protected function view( string $view, array $data = []): void {
        extract($data);
        require dirname(__DIR__) . "/app/Views/{$view}.php";
    }
}
?>