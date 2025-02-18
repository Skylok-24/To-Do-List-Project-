<?php

namespace App\Controllers;

use App\Core\Request;
use App\Database\QueryBuilder;

class TaskController
{
    public function index()
    {
        $keyvalue = Request::get('completed');
        if ($keyvalue != null) {
            $tasks = QueryBuilder::get('tasks',['completed','=',$keyvalue]);
        }else
            $tasks = QueryBuilder::get('tasks');
        view('index',$tasks);
    }

    public function create()
    {
        QueryBuilder::insert('tasks',[
            'description' => Request::get('description')
        ]);

        back();
    }

    public function about()
    {
        view('about');
    }

    public function delete()
    {
        if ($id = Request::get('id')) {
            QueryBuilder::delete('tasks',$id);
        }

        back();
    }
    public function update()
    {
        $id = Request::get('id');
        $completed = Request::get('completed');
        if ($id && $completed != null) {
            QueryBuilder::update('tasks',$id,[
                'completed' => $completed
            ]);
        }

        back();
    }
}