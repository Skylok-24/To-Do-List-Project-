<?php


//print_r($_GET);
//
//print_r($_POST);


\app\data_base\QueryBuilder::insert('tasks',[
    'description' => Request::get('task')
]);

header("Location: http://localhost/php_basics");