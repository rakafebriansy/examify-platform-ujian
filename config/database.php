<?php
namespace config;

class Database
{
    private string $driver = 'mysql';
    private string $host = 'localhost';
    private string $dbname = 'examify';
    private string $user = 'root';
    private string $password = '';
    private \PDO|null $connection = null;

    public function connect(): void
    {
        try {
            $connection = new \PDO($this->driver.':'.'host='.$this->host.';dbname='.$this->dbname,$this->user,$this->password);
            $this->connection = $connection;
        } catch (\PDOException $e) {
            throw $e;   
        }
    }
    public function close(): void
    {
        $this->connection = null;
    }
    public function create(string $table, array $columns, array $values): bool
    {
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $columns_str = implode(', ', $columns);
        $bind_str = str_replace(', ',', :',$columns_str);
        $statement = $this->connection->prepare("INSERT INTO $table ($columns_str) VALUES ($bind_str);");
        $statement->execute($values);
        $result = $statement->rowCount();
        return $result;
    }
    public function readAll(string $table, array $condition = [], string $columns = '*',): array
    {
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $condition_str = count($condition) > 0 ? implode(' ',$condition) : '1 = 1';
        $statement = $this->connection->prepare("SELECT ". $columns ." FROM $table WHERE $condition_str;");
        $statement->execute();
        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    public function update(string $table, array $data, string $id = ''): bool
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
    public function readOne(string $table, array $condition = [], string $columns = '*'): array
    {
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $condition_str = count($condition) > 0 ? implode(' ',$condition) : '1 = 1';
        $statement = $this->connection->prepare("SELECT ". $columns ." FROM $table WHERE ". $condition_str[0] . " " . $condition_str[1] . " :" . $condition_str[0] ." ;");
        $statement->execute([$condition_str[0] => $condition_str[1]]);
        $result = $statement->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }
    public function delete(string $table, array $condition = []): bool
    {
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $condition_str = count($condition) > 0 ? implode(' ',$condition) : '1 = 1';
        $statement = $this->connection->prepare("DELETE FROM $table WHERE ". $condition_str[0] . " " . $condition_str[1] . " :" . $condition_str[0] ." ;");
        $statement->execute([$condition_str[0] => $condition_str[1]]);
        $result = $statement->rowCount();
        return $result;
    }
}

?>