<?php

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

return [
    'app' => [
        'home_url' => $_ENV['APP_URL']
    ],
    'database' => [
        'unix_socket' => $_ENV['UNIX_SOCKET'],
        'name' => $_ENV['DB_NAME'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];