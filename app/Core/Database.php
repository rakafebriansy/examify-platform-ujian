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
    public function executeQuery(string $sql, array|null $data = null, bool $fetch_all = false)
    {
        $statement = $this->connection->prepare($sql);
        $statement->execute($data);
        if($fetch_all) {
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
        }
        return $result;
    }
    public function executeNonQuery(string $sql, array $data): bool
    {
        $statement = $this->connection->prepare($sql);
        $statement->execute($data);
        $result = $statement->rowCount();
        return $result;
    }

}

?>