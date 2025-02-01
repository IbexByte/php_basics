<?php  

require './app/database/DBconnection.php';
require './app/database/QueryBuilder.php';
require './app/Core/Router.php';
require './app/Core/Request.php';
require './app/Controllers/TaskController.php';

 QueryBuilder::make(DBconnection::make());
 QueryBuilder::delete('tasks',3);
