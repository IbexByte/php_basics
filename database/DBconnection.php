<?php 
class Task {
    public $id ;
    public $description ;
    public $completed ;
 }
 
 
 
 class DBconnection {
     private static $pdo = null;
     private static $host = "localhost"; 
     private static $dbName = "php_basics"; 
     private static $password = ""; 
     private static $userName = "root"; 
 
     public static function make() {
         if (!self::$pdo) {
             try {
                 self::$pdo = new PDO(
                     "mysql:host=" . self::$host . ";dbname=" . self::$dbName . ";charset=utf8mb4",
                     self::$userName,
                     self::$password
                 );
 
                 // Set error mode to Exception
                 self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             } catch (PDOException $e) {
                 die("Database Connection Failed: " . $e->getMessage());
             }
         }
         return self::$pdo;
     }
 }
 