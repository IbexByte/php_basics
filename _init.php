<?php  

require './database/DBconnection.php';
require './database/QueryBuilder.php';

 QueryBuilder::make(DBconnection::make());
 QueryBuilder::update('tasks',3, [
    'description' => 'updated',
    'completed' => 0,
 ]);
$tasks =  QueryBuilder::get('tasks');