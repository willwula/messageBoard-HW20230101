<?php
use models\User;
@$name = $_POST['name'];
@$password = $_POST['password'];
@$level = $_POST['level'];
@$id = $_POST['id'];
authorize(@$_POST["action"]&&$_POST["action"]=="edit");
    $update = new User();
    $update->update($name,$password,$level,$id);
    header("Location:/accounts");



