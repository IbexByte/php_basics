<?php 

use App\Database\DBconnection ;
use App\Database\QueryBuilder ;
use App\App ;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


require './vendor/autoload.php';
require './app/App.php';
require './app/database/DBconnection.php';
require './app/database/QueryBuilder.php';
require './app/Core/Router.php';
require './app/Core/Request.php';
require './app/Controllers/TaskController.php';
require './app/helpers.php';

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('database.log',  Logger::INFO));

App::set('config' , require './config.php');
 QueryBuilder::make(DBconnection::make(App::get('config')['database']), $log);

