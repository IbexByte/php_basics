<?php


class TaskController
{

    public function index()
    {
        
        $completed = Request::get('completed');
       
        if ($completed !=  null) {
            $tasks = QueryBuilder::get('tasks', ['completed' , '=' , $completed]);

        } else {
            $tasks = QueryBuilder::get('tasks');

        }
        

        require "./resources/index.view.php";
    }

    public function create()
    {
        $description =  Request::get('description');

        QueryBuilder::insert('tasks', ['description' => $description]);

        header("Location: http://localhost/examProjects/php_basics/");
    }

    public function update()
    {
        $id =  Request::get('id');
        $completed = Request::get('completed');
        QueryBuilder::update('tasks', $id,['completed' => $completed] );
        header("Location: http://localhost/examProjects/php_basics/");
    }

    public function delete()
    {
        $id =  Request::get('id');
        QueryBuilder::delete('tasks', $id);
        header("Location: http://localhost/examProjects/php_basics/");
    }
}