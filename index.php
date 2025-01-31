<?php  

class Task {
   public $id ;
   public $description ;
   public $completed ;
}

$host= "localhost";
$dbName = "php_basics";
$password = "";
$userName = "root";

try {
     $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8",$userName , $password);

} catch (\Throwable $th) {
   die($th->getMessage());
}

$query = $pdo->prepare('SELECT * from tasks');

$query->execute() ;
$tasks = $query->fetchAll(PDO::FETCH_CLASS , 'Task');

foreach ($tasks as  $task) {
 echo  $task->description . '</br>' ;
}
echo '<pre>';
var_dump($tasks);
echo '</pre>';
