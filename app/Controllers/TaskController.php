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
}