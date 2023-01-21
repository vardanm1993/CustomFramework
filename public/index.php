<?php

use App\Http\Controllers\Auth\AuthController;
use Core\Application;
use App\Http\Controllers\SiteController;

require __DIR__ . '/../vendor/autoload.php';

$app = new Application(dirname(__DIR__));

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