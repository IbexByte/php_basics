<?php

namespace App\Database;
class QueryBuilder
{
    private static $pdo;

    public static function make(\PDO $pdo)
    {
        self::$pdo = $pdo;
    }

    public static function get($table, $where = null)
    {
        $query_sql = "SELECT * from {$table}";
       
        if (is_array($where)) {
             $query_sql .= ' WHERE ' . implode(' ' , $where) ;
       
        } 

        $query = self::$pdo->prepare($query_sql);

        $query->execute();
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    public static function insert($table, $data)
    {
        $data_keys = array_keys($data);
        $fields = implode(',', $data_keys);
        $values_sympol = str_repeat('?,', count($data_keys) - 1) . '?';
        $query_text = "INSERT INTO {$table} ({$fields}) VALUES ($values_sympol) ";
        $query = self::$pdo->prepare($query_text);
        $query->execute(array_values($data));
    }

    public static function update($table, $id, $data)
    {
        $keysStr = implode('= ? ,', array_keys($data)) . '= ?';
        $query = "UPDATE {$table} SET {$keysStr} WHERE id= {$id}";
        $statement = self::$pdo->prepare($query);
        $statement->execute(array_values($data));
    }

    public static function delete($table, $target, $column = 'id', $operater = '='): void
    {
        $query = "DELETE FROM {$table} WHERE {$column} {$operater} {$target}  ";
        $statement = self::$pdo->prepare($query);
        $statement->execute();
    }
}