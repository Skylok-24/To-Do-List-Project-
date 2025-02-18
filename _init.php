<?php

require_once 'vendor/autoload.php';

use App\Database\QueryBuilder;
use App\Database\DBConnection;
use App\App;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

App::set('config', require 'config.php');

$log = new Logger('PHP_BASICS');

$log->pushHandler(new StreamHandler('queries.log',Logger::INFO));

QueryBuilder::meke(
    DBConnection::make(
        App::get('config')['database']
    ),
    $log
);
