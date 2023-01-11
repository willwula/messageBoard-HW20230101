<?php

use Core\Database;

$config = require base_path('config.php');
$pdo = new Database($config['database']);

if (!isset($_SESSION)) {
    session_start();
}
$userid=$_POST["id"];
$sql_query = "SELECT * FROM user WHERE id = $userid";
$row_result = $pdo->query($sql_query)->fetch();
$edit_id = $row_result['id'];
$edit_name = $row_result["name"];
$edit_password = $row_result["password"];
$edit_level = $row_result["level"];

view("account_edit.view.php" ,[
    'heading' => 'Account Management',
    'edit_id' => "$edit_id",
    'edit_name' => "$edit_name",
    'edit_password' => "$edit_password",
    'edit_level' => "$edit_level"
]);