<?php  

$host= "localhost";
$dbName = "php_basics";
$password = "";
$userName = "root";

try {
     $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8",$userName , $password);

} catch (\Throwable $th) {
   die($th->getMessage());
}
