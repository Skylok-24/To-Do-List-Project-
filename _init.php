<?php

require_once 'app/data_base/DBConnection.php';
require_once 'app/data_base/QueryBuilder.php';
require_once 'app/Core/Router.php';
require_once 'app/Core/Request.php';
require_once 'app/controllers/TaskController.php';
require_once 'app/App.php';
require_once 'app/helpers.php';

\app\App::set('config', require 'config.php');

\app\data_base\QueryBuilder::meke(
    \app\data_base\DBConnection::make(
        \app\App::get('config')['database']
    )
);
