<?php

use Core\Database;
//use models\User;
if (!isset($_SESSION)) {
    session_start();
}
//$result=new User();
//$result->getAllUser();
//dd($result);
$config = require base_path('config.php');
$pdo = new Database($config['database']);
//dd($pdo);

$pageRow_records = 5;
$num_pages = 1;
if (isset($_GET['page'])) {
    $num_pages = $_GET['page'];
}
$startRow_records = ($num_pages-1) * $pageRow_records;
$sql_query = "SELECT * FROM user";
$sql_query_limit = $sql_query." LIMIT ".$startRow_records.",".$pageRow_records;
//dd($sql_query_limit);
$result = $pdo->query_execute($sql_query_limit);
//$all_result = $pdo->query_execute($sql_query);
$total_records = $pdo->query($sql_query)->rowCount();
$total_pages = ceil($total_records/$pageRow_records);
//dd($result);
$row_result = $pdo->query_execute($sql_query)->fetch();

view("account.view.php" ,[
    'heading' => 'Account Management',
    'result' => $result,
    'row_result' => $row_result,
    'total_pages' => "$total_pages",
    'num_pages' => "$num_pages"
]);

