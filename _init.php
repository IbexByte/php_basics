<?php  

require './database/DBconnection.php';
require './database/QueryBuilder.php';

 QueryBuilder::make(DBconnection::make());
$tasks =  QueryBuilder::get('tasks');