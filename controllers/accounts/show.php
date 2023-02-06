<?php
use models\User;
$pdo = new User();
$pdo->findLogin(@$_SESSION['name'],@$_SESSION['password']);
authorize($pdo->rows == '1');

//if (!isset($_SESSION)) {
//    session_start();
//}
//$result=new User();
//$result->getAllUser();
//dd($result);
//$config = require base_path('config.php');
//$pdo = new Database($config['database']);
//dd($pdo);
    $pageRow_records = 5;
    $num_pages = 1;
if(@$_GET['page']) {
    $num_pages = $_GET['page'];
}
    $startRow_records = ($num_pages-1) * $pageRow_records;
$pdo->getAllUser($startRow_records,$pageRow_records);

view("account.view.php" ,[
    'heading' => 'Account Management',
    'result' => $pdo->result,
    'row_result' => $pdo->row_result,
    'total_pages' => "$pdo->total_pages",
    'num_pages' => "$num_pages"
]);