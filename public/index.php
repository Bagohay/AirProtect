<?php
// index.php - Main entry point for the application

session_start();


require __DIR__ . '/../vendor//autoload.php';

use Dotenv\Dotenv;

use Config\Database;

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$db = Database::getInstance()->getConnection();


use AltoRouter as Router;

$router = new Router();

require_once __DIR__.'/../routes/web.php';

// AuthMiddleware::handle($accessMap, $publicRoutes);

$match= $router ->match();

if ($match) {
    // Split the controller and method
    list($controller, $method) = explode('#', $match['target']);

    // Instantiate controller
    $controllerInstance = new $controller();

    // Call the method with parameters
    call_user_func_array([$controllerInstance, $method], $match['params']);
} else {
    // No route match, send 404
  
}








    












?>