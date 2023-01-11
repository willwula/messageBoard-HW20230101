<?php

namespace Core;
use PDO;
class Database
{
    protected $connection;

    public function __construct($config, $username = 'root', $password = 'hell')
    {
//        $dsn = "mysql:host=localhost;port=3306;dbname=myapp;charset=utf8mb4";
        $dsn = http_build_query($config, '', ';');
        $dsn = "mysql:$dsn";
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query)
    {
        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement;
    }

    public function query_unexecute($query)
    {
        $statement = $this->connection->prepare($query);

        return $statement;
    }

    public function query_execute($query, $params = [])
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);

        return $statement;
    }

    public function query_unexecute_params($query, $params = [])
    {
        $statement = $this->connection->prepare($query);

        return $statement;
    }

    public function rowCount($sql, $name)
    {
        $result = $this->connection->prepare($sql, [$name]);
        $result->execute();
        $result->rowCount();

        return $result;
    }
}
