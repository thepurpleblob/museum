<?php

// Debugging helper
function dd($message, ...$values) {
    echo "<pre>$message";
    foreach ($values as $value) {
        var_dump($value);
    }
    echo "</pre>";
    die;
}

// debugging (development)
error_reporting(-1);
ini_set('display_errors', 'On');

// Require composer autoloader
require __DIR__ . '/vendor/autoload.php';

// Use
use Purpleblob\lib\system;

// DotEnv
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Whoops
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

// check minimum info for database
system::checkdotenv();

// Create Router instance
$router = new \Bramus\Router\Router();
Purpleblob\routes\web::configure($router);

// RedBean database ORM
require 'rb.php';
$db_host = $_ENV['DB_HOST'];
$db_database = $_ENV['DB_DATABASE'];
$db_username = $_ENV['DB_USERNAME'];
$db_password = $_ENV['DB_PASSWORD'];
R::setup("mysql:host=$db_host;dbname=$db_database", $db_username, $db_password);

// Go!
$router->run();

echo "Should not get here!";
