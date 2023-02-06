<?php

namespace Core;
use PDO;
class Database
{
    protected $connection;

    protected $statement;

    public function __construct($config, $username = 'root', $password = 'hell')
    {
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

    public function query_execute($query, $params = [])
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);

        return $statement;
    }

    public function rowCounted($sql, $name)
    {
        $result = $this->connection->prepare($sql, [$name]);
        $result->execute();
        $result->rowCount();

        return $result;
    }


    public function get(){
        return $this->statement->fetchALl();
    }

    public function find(){
        return $this->statement->fetch();
    }

    public function findOrFail(){
        $result = $this->find();

        if (! $result){
            abort();
        }

        return $result;
    }
}