<?php
namespace Core;

class Router {
    private array $routes = [];

    public function get(string $path, string $controller): void {
        $this->routes['GET'][$path] = $controller;
    }

    public function post(string $path, string $controller): void {
        $this->routes['POST'][$path] = $controller;
    }

    public function dispatch(): void {
        $basePath = dirname($_SERVER['SCRIPT_NAME']);
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = str_replace($basePath, '', $uri);
        $uri = $uri ?: '/';

        if(isset($this->routes[$method][$uri])) {
            [$controller, $action] = explode('@', $this->routes[$method][$uri]);
            $controller = "App\\Controllers\\{$controller}";
            $instance = new $controller();
            $instance->$action();
            return;
        }
        http_response_code(404);
        echo "404 - Page Not Found";
    }
}
?>