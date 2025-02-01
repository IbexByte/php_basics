<?php  

require './_init.php';
$uri = $_SERVER['REQUEST_URI'];
$uri = trim($uri , '/');
$uri = str_replace('examProjects/php_basics' , '' , $uri);
$uri = trim($uri , '/');
 
$routes= [
    '' => "./app/Controllers/index.php",
    'about' => "./app/Controllers/about.php",
];

Router::make($routes)->resolve($uri);
 

 