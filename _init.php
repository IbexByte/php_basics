<?php  

require './database/DBconnection.php';
require './database/QueryBuilder.php';

 QueryBuilder::make(DBconnection::make());
 QueryBuilder::insert('tasks', [
    'description' => 'third task',
    'completed' => 0,
 ]);
$tasks =  QueryBuilder::get('tasks');