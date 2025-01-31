<?php  

require './database/DBconnection.php';
require './database/QueryBuilder.php';

 QueryBuilder::make(DBconnection::make());
 QueryBuilder::delete('tasks',3);
$tasks =  QueryBuilder::get('tasks');