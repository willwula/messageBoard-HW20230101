<?php
use models\Guestbook;
use models\User;
$pdo = new Guestbook();
$pdo2= new User();
$pdo2->findLogin(@$_SESSION['name'],@$_SESSION['password']);
authorize($pdo2->rows == '1');

$pageRow_records = 5;
$num_pages = 1;
if (@$_GET['page']) {
    $num_pages = $_GET['page'];
}
$startRow_records = ($num_pages-1) * $pageRow_records;

    $pdo->getAllmessage($startRow_records,$pageRow_records);

view("showAll.view.php", [
    'heading' => 'All Messages',
    'result' => $pdo->result,
    'row_result' => $pdo->row_result,
    'total_pages' => $pdo->total_pages,
    'num_pages' => $num_pages,
]);