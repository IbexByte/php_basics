<?php

namespace App\Database;
class QueryBuilder
{
    private static $pdo;
    private static $log;

    public static function make(\PDO $pdo, $log)
    {
        self::$pdo = $pdo;
        self::$log = $log;
    }

    public static function get($table, $where = null)
    {
        $query_sql = "SELECT * from {$table}";

        if (is_array($where)) {
            $query_sql .= ' WHERE ' . implode(' ', $where);

        }

        $response =  self::excute($query_sql);
        return $response->fetchAll(\PDO::FETCH_OBJ);
    }

    public static function insert($table, $data)
    {
        $data_keys = array_keys($data);
        $fields = implode(',', $data_keys);
        $values_sympol = str_repeat('?,', count($data_keys) - 1) . '?';
        $query_text = "INSERT INTO {$table} ({$fields}) VALUES ($values_sympol) ";
        self::excute($query_text , array_values($data));
    }

    public static function update($table, $id, $data)
    {
        $keysStr = implode('= ? ,', array_keys($data)) . '= ?';
        $query = "UPDATE {$table} SET {$keysStr} WHERE id= {$id}";
       
        self::excute($query, array_values($data));
    }

    public static function delete($table, $target, $column = 'id', $operater = '='): void
    {
        $query = "DELETE FROM {$table} WHERE {$column} {$operater} {$target}  ";
        self::excute($query);
    }


    public static function excute($query, $value = [])
    {
        if (self::$log) {
            self::$log->info($query);
        }
        $statement = self::$pdo->prepare($query);
         $statement->execute($value);
         return $statement ;
    }
}