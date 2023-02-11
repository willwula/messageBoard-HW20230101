<?php
use models\User;
@$name = htmlspecialchars(strip_tags($_POST['name']));
@$password = htmlspecialchars(strip_tags($_POST['password']));
@$level = htmlspecialchars(strip_tags($_POST['level']));
@$id = htmlspecialchars(strip_tags($_POST['id']));
authorize(@$_POST["action"]&&$_POST["action"]=="edit");
    $update = new User();
    $update->update($name,$password,$level,$id);
    header("Location:/accounts");