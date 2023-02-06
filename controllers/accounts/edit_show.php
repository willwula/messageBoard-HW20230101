<?php
use models\User;
$userid=$_POST["id"];
$pdo = new User();
$pdo->getUserById($userid);

$row_result = $pdo->result;
$edit_id = $row_result['id'];
$edit_name = $row_result["name"];
$edit_password = $row_result["password"];
$edit_level = $row_result["level"];

view("account_edit.view.php" ,[
    'heading' => 'Account Management',
    'edit_id' => $edit_id,
    'edit_name' => $edit_name,
    'edit_password' => $edit_password,
    'edit_level' => $edit_level
]);