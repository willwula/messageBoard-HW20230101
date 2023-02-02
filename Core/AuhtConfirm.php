<?php

namespace Core;
use PDO;
use Core\Database;

class AuhtConfirm
{
    public function __construct(){
        $config = require base_path('config.php');
        $pdo = new Database($config['database']);
    }
    public function loginConfirm{
        $sql = "SELECT * FROM user WHERE name = :name AND password = :password";
        $result = $pdo->query_execute($sql,[
            "name" => $name,
            "password" => $password
        ]);
        $fin = $result->fetch();
//        $_SESSION = $fin;
//        dd($_SESSION);
        @$_SESSION['name'] = $fin['name'];
        @$_SESSION['password'] = $fin['password'];
        @$_SESSION['id'] = $fin['id'];
        @$_SESSION['level'] = $fin['level'];
        $rows = $result->rowCount();
        return $rows;
    }

}
