<?php

namespace App\Core;

class Database
{
    protected \PDO|null $connection = null;

    public function connect(): void
    {
        try {
            $connection = new \PDO($_ENV['DB_DRIVER'].':'.'host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_NAME'],$_ENV['DB_USER'],$_ENV['DB_PASSWORD']);
            $this->connection = $connection;
        } catch (\PDOException $e) {
            throw $e;   
        }
    }
    public function close(): void
    {
        $this->connection = null;
    }
    public function executeQuery(string $sql, array $data = [], bool $fetch_all = false): array|bool
    {
        $this->connect();
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $statement = $this->connection->prepare($sql);
        $statement->execute($data);
        if($fetch_all) {
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
        }
        $this->close();
        return $result;
    }
    public function executeNonQuery(string $sql, array $data = [], $get_id = false): bool|int
    {
        $this->connect();
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $statement = $this->connection->prepare($sql);
        $statement->execute($data);
        if($get_id) {
            $result = intval($this->connection->lastInsertId());
        } else {
            $result = $statement->rowCount();
        }
        $this->close();
        return $result;
    }
    public function executeNoBind(string $sql, bool $fetch_all = false): array|bool
    {
        $this->connect();
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $statement = $this->connection->query($sql);
        if($fetch_all) {
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
        }
        $this->close();
        return $result;
    }
}

?>