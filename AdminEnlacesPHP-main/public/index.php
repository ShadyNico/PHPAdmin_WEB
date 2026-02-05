<?php
require __DIR__ . '/../framework/Database.php';
require __DIR__ . '/../framework/SessionManager.php';
require __DIR__ . '/../framework/Validator.php';

SessionManager::start();

function redirect(string $path): void
{
    header('Location: ' . $path);
    exit;
}
$db = new Database();
$routes = require __DIR__ . '/../routes/web.php';
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST' && isset($_POST['_method'])) {
    $method = strtoupper($_POST['_method']);
}

$route = $routes[$method][$requestUri] ?? null;

if ($route) {
    $middleware = $route['middleware'] ?? [];
    foreach ($middleware as $middlewareClass) {
        $middlewareClass::handle();
    }
    require __DIR__ . '/../' . $route['handler'];
} else {
    http_response_code(404);
    echo "404 Not Found";
}
