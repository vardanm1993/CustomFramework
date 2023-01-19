<?php

use App\core\Application;

require __DIR__ . '/../vendor/autoload.php';

$app = new Application(dirname(__DIR__));

$app->router->get('/', 'home');

$app->router->get('/contact', 'contacts/contact');

$app->run();