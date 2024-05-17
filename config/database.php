<?php
namespace Config;

class Database
{
    private \PDO|null $connection = null;

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
    public function create(string $table, array $data): bool
    {
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $columns_str = [];
        $bind_str = [];
        foreach ($data as $column => $value) {
            $columns_str[] = $column;
            $bind_str[] = ":$column";
        }
        $columns_str = implode(', ',$columns_str);
        $bind_str = implode(', ',$bind_str);
        $statement = $this->connection->prepare("INSERT INTO $table ($columns_str) VALUES ($bind_str);");
        $statement->execute($data);
        $result = $statement->rowCount();
        return $result;
    }
    public function read(string $table, int $id): array
    {
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $statement = $this->connection->prepare("SELECT * FROM $table WHERE id = :id");
        $statement->execute(['id' => $id]);
        $result = $statement->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }
    public function update(string $table, array $data, int $id): bool
    {
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $query = [];
        foreach ($data as $column => $value) {
            $query[] = "$column = :$column";
        }
        $query_str = implode(', ',$query);
        $statement = $this->connection->prepare("UPDATE $table SET ". $query_str ." SET  FROM $table WHERE id = :id;");
        $statement->execute($data);
        $result = $statement->rowCount();
        return $result;
    }
    public function delete(string $table, int $id): bool
    {
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $statement = $this->connection->prepare("DELETE FROM $table WHERE id = :id");
        $statement->execute(['id' => $id]);
        $result = $statement->rowCount();
        return $result;
    }


    public function readOne(string $table, array $condition = [], string $columns = '*'): array
    {
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $statement = $this->connection->prepare("SELECT ". $columns ." FROM $table WHERE ". $condition[0] . " " . $condition[1] . " :" . $condition[0] ." ;");
        $statement->execute([$condition[0] => $condition[2]]);
        $result = $statement->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }
    public function readMany(string $table, array $condition = [], string $columns = '*',): array
    {
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $condition_str = count($condition) > 0 ? implode(' ',$condition) : '1 = 1';
        $statement = $this->connection->prepare("SELECT ". $columns ." FROM $table WHERE $condition_str;");
        $statement->execute();
        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
}

?>