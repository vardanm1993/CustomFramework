<?php

use App\Http\Controllers\Auth\AuthController;
use Core\Application;
use App\Http\Controllers\SiteController;

require dirname(__DIR__) . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];

$app = new Application(dirname(__DIR__), $config);

//home
$app->router->get('/', [SiteController::class, 'home']);

//contact
$app->router->get('/contact', [SiteController::Class, 'contact']);
$app->router->post('/contact', [SiteController::Class, 'storeContact']);

//auth
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->run();