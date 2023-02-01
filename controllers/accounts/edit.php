<?php

use Core\Database;

$config = require base_path('config.php');
$pdo = new Database($config['database']);
//dd($_POST);
$name = $_POST['name'];
$password = $_POST['password'];
$level = $_POST['level'];
$id = $_POST['id'];

if(isset($_POST["action"])&&($_POST["action"]=="edit")){
    $sql_query = "UPDATE user SET name='$name',password='$password',level='$level' WHERE id= '$id' ";
    $result = $pdo->query($sql_query);
    header("Location:/accounts");
}


