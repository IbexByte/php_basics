<?php 
class Task {
    public $id ;
    public $description ;
    public $completed ;
 }
 
 
 
 class DBconnection {
     private static $pdo = null;

 
     public static function make($config) {
         if (!self::$pdo) {
             try {
                 self::$pdo = new PDO(
                     "mysql:host=" . $config['host'] . ";dbname=" . $config['name'] . ";charset=utf8mb4",
                     $config['user'],
                     $config['password']
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
 