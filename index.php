<?php  

require './_init.php';

foreach ($tasks as  $task) {
 echo  $task->description . '</br>' ;
}
echo '<pre>';
var_dump($tasks);
echo '</pre>';
