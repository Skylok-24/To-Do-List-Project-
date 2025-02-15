<?php

class TaskController
{
    public function index()
    {
        $keyvalue = Request::get('completed');
        if ($keyvalue != null) {
            $tasks = \app\data_base\QueryBuilder::get('tasks',['completed','=',$keyvalue]);
        }else
            $tasks = \app\data_base\QueryBuilder::get('tasks');
        view('index',$tasks);
    }

    public function create()
    {
        \app\data_base\QueryBuilder::insert('tasks',[
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
            \app\data_base\QueryBuilder::delete('tasks',$id);
        }

        back();
    }
    public function update()
    {
        $id = Request::get('id');
        $completed = Request::get('completed');
        if ($id && $completed != null) {
            \app\data_base\QueryBuilder::update('tasks',$id,[
                'completed' => $completed
            ]);
        }

        back();
    }
}