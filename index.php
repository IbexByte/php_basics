<?php  

require './_init.php';
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim($uri , '/');
$uri = str_replace('examProjects/php_basics' , '' , $uri);
$uri = trim($uri , '/');

$routes= [
    'create/task' => "./app/Controllers/task.create.php",
    '' => "./app/Controllers/index.php",
    'about' => "./app/Controllers/about.php",
];

Router::make($routes)->resolve($uri);
 

 