<?php


class TaskController
{

    public function index()
    {
        $tasks = QueryBuilder::get('tasks');

        require "./resources/index.view.php";
    }

    public function create()
    {
        $description = $_POST['description'];

        QueryBuilder::insert('tasks', ['description' => $description]);

        header("Location: http://localhost/examProjects/php_basics/");
    }

    public function update()
    {
        $id = $_POST['id'];
        $completed = $_POST['completed'];
        QueryBuilder::update('tasks', $id,['completed' => $completed] );
        header("Location: http://localhost/examProjects/php_basics/");
    }

    public function delete()
    {
        $id = $_POST['id'];
        QueryBuilder::delete('tasks', $id);
        header("Location: http://localhost/examProjects/php_basics/");
    }
}