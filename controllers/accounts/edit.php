<?php

use Core\Database;

$config = require base_path('config.php');
$pdo = new Database($config['database']);

$name = $_POST['edit_name'];
$password = $_POST['edit_password'];
$level = $_POST['edit_level'];
$id = $_POST['edit_id'];

if(isset($_POST["action"])&&($_POST["action"]=="edit")){
    $sql_query = "UPDATE user SET name='$name',password='$password',level='$level' WHERE id= '$id' ";
    $result = $pdo->query($sql_query);
    header("Location:/accounts");
}


