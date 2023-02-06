<?php
namespace models;
use Core\Database;
class User  {
    public $connection;
    public $name;
    public $password;
    public $result;
    public $row_result;
    public $total_pages;
    public $find;
    public $rows;
    // 在建構子將 Database 物件實例化
    public function __construct()
    {
        $config = require base_path('config.php');
        $this->connection = new Database($config['database']);
//        var_dump($this->connection);
    }
    public function getAllUser($startRow_records,$pageRow_records)
    {
        $sql_query = "SELECT * FROM user";
        $sql_query_limit = $sql_query." LIMIT ".$startRow_records.",".$pageRow_records;
        $this->result = $this->connection->query_execute($sql_query_limit);
        $total_records = $this->connection->query($sql_query)->rowCount();
        $this->total_pages = ceil($total_records/$pageRow_records);
        $this->row_result = $this->connection->query_execute($sql_query)->fetch();
    }
    public function getUserByName($name)
    {

        $sql = "SELECT * from user where name = :name";
        $result = $this->connection->query_execute($sql, [
            "name" => $name
        ]);
        $this->result = $result->fetch();
        $this->rows = $result->rowCount();
    }
    public function getUserById($id)
    {

        $sql = "SELECT * from user where id = :id";
        $result = $this->connection->query_execute($sql, [
            "id" => $id
        ]);
        $this->result = $result->fetch();
        $this->rows = $result->rowCount();
    }
    public function findLogin($name,$password)
    {
        $sql = "SELECT * FROM user WHERE name = :name AND password = :password";
        $result = $this->connection->query_execute($sql, [
            "name" => $name,
            "password" => $password
        ]);
        $this->find = $result->fetch();
        $this->rows = $result->rowCount();
    }
    public function insert($name,$hash_password)
    {
        $sql = "INSERT INTO user(id,name,password) values (null,:name,:password)";
        $this->result = $this->connection->query_execute($sql, [
            "name" => $name,
            "password" => $hash_password
        ]);
    }
    public function update($name,$password,$level,$id): void
    {
        $sql = "UPDATE user SET name=:name,password=:password,level=:level WHERE id=:id ";
        $this->result = $this->connection->query_execute($sql, [
            "name" => $name,
            "password" => $password,
            "level" => $level,
            "id" => $id
        ]);
    }
    public function delete($userid): void
    {
        $sql = "DELETE FROM user WHERE id =:id";
        $this->result = $this->connection->query_execute($sql,[
            'id' => $userid
        ]);
    }
}