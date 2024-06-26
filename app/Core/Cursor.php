<?php

namespace App\Core;

use App\Core\Database;

class Cursor extends Database
{
    public function connect(): void
    {
        parent::connect();
    }
    public function close(): void
    {
        parent::close();
    }
    public function create(string $table, array $data, $get_id = false): bool|int
    {
        try {
            $columns_str = [];
            $bind_str = [];
            foreach ($data as $column => $value) {
                $columns_str[] = $column;
                $bind_str[] = ":$column";
            }
            $columns_str = implode(', ',$columns_str);
            $bind_str = implode(', ',$bind_str);
            $sql = "INSERT INTO $table ($columns_str) VALUES ($bind_str);";
            $result = parent::executeNonQuery($sql,$data,$get_id);
            return $result;
        } catch (\PDOException $e) {
            throw $e;
        }
    }
    public function update(string $table, array $data, int $id): bool
    {
        try {
            $query = [];
            foreach ($data as $column => $value) {
                $query[] = "$column = :$column";
            }
            $query_str = implode(', ',$query);
            $sql = "UPDATE $table SET ". $query_str ." WHERE id = :id;";
            $data['id'] = $id;
            $result = parent::executeNonQuery($sql,$data);
            return $result;
        } catch (\PDOException $e) {
            throw $e;
        }
    }
    public function delete(string $table, int $id): bool
    {
        try {
            $sql = "DELETE FROM $table WHERE id = :id";
            $data = ['id' => $id];
            $result = parent::executeNonQuery($sql,$data);
            return $result;
        } catch (\PDOException $e) {
            return false;
        }
    }
    public function readOne(string $table, array $condition = [], string $columns = '*'): array|false
    {
        try {
            $sql = "SELECT ". $columns ." FROM $table WHERE ". $condition[0] . " " . $condition[1] . " :" . $condition[0] ." ;";
            $data = [$condition[0] => $condition[2]];
            $result = parent::executeQuery($sql,$data);
            return $result?? null;
        } catch (\PDOException $e) {
            throw $e;
        }
    }
    public function readMany(string $table, array $condition = [], string $columns = '*'): array|null
    {
        try {
            $condition_str = count($condition) > 0 ? implode(' ',$condition) : '1 = 1';
            $sql = "SELECT ". $columns ." FROM $table WHERE $condition_str;";
            $result = parent::executeQuery($sql,fetch_all:true);
            return $result?? null;
        } catch (\PDOException $e) {
            throw $e;
        }
    }
}

?>