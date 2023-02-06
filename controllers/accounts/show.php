<?php
use models\User;
$pdo = new User();
$pdo->findLogin(@$_SESSION['name'],@$_SESSION['password']);
authorize($pdo->rows == '1');
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