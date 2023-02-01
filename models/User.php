<?php
namespace models;
use Core\Database;

class User  {
    public $connection;
    public $name;
    // 在建構子將 Database 物件實例化
    public function __construct()
    {
        $config = require base_path('config.php');
        $this->connection = new Database($config['database']);
//        var_dump($this->connection);
    }

    // 取得所有使用者
    public function getUserByName($name)
    {
//        $this->name = $_SESSION['name'];
        $this->name = $name;
        $sql = "SELECT * from user where name = :name";
        $results = $this->connection->query_execute($sql,[
            "name" => $this->name
        ])->fetchAll();
        //dd($results);
        return $results;
    }

}