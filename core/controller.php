<?php
namespace Core;

class Controller {
    public function view(string $view, array $data = []): void {
        extract($data);
        ob_start();
        require dirname(__DIR__) . "/app/Views/$view.php";
        $content = ob_get_clean();
        require dirname(__DIR__) . "/app/Views/layouts/main.php";
    }
}
?>