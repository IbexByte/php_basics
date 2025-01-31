<?php  

require './_init.php';
$uri = $_SERVER['REQUEST_URI'];
$uri = trim($uri , '/');
$uri = str_replace('examProjects/php_basics/' , '' , $uri);
 

switch ($uri) {
    case 'index':
        require './pages/index.php';
        break;
    case 'about':
        require './pages/about.php';
        break;

    
    default:
        echo "Not Valid  !";
        break;
}