<?php 

use App\Database\DBconnection ;
use App\Database\QueryBuilder ;
use App\App ;

require './app/App.php';
require './app/database/DBconnection.php';
require './app/database/QueryBuilder.php';
require './app/Core/Router.php';
require './app/Core/Request.php';
require './app/Controllers/TaskController.php';
require './app/helpers.php';


App::set('config' , require './config.php');
 QueryBuilder::make(DBconnection::make(App::get('config')['database']));
 QueryBuilder::delete('tasks',3);
