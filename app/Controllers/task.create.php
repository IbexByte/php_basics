<?php 

$description =  $_POST['description'] ;

QueryBuilder::insert('tasks' , ['description' => $description]);

header("Location: http://localhost/examProjects/php_basics/");