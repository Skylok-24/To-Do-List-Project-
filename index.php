<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '_init.php';

//echo '<pre>';
//print_r($_SERVER);
//echo '</pre>';

//\app\data_base\QueryBuilder::insert('tasks',[
//    'description' => 'Last Task' ,
//    'completed' => 1
//]);


//echo $uri;

//switch ($uri) {
//    case '' : require_once 'Pages/index.php';
//              break;
//    case 'about' : require_once  'Pages/about.php';
//                    break;
//    default : throw new  Exception('Page Not Found ! ');
//             break;
//}

Router::make()
    ->get('',[TaskController::class , 'index'])
    ->get('about',[TaskController::class , 'about'])
    ->post('task/create',[TaskController::class , 'create'])
    ->get('task/delete',[TaskController::class , 'delete'])
    ->get('task/update',[TaskController::class , 'update'])
    ->resolve(Request::uri(),Request::method());
