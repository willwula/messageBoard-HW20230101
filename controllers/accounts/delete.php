<?php

use Core\Database;

$config = require base_path('config.php');
$pdo = new Database($config['database']);

if(isset($_POST["action"])&&($_POST["action"]=="delete")) {

    $userid = $_POST['id'];

    $sql_query = "DELETE FROM user WHERE id = $userid";

    $result = $pdo->query_execute($sql_query);

    header("Location: /accounts");
}
