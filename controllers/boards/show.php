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
//權限判別

if ($pdo2->find['level'] == '2'){
    $pdo->getAllmessage($startRow_records,$pageRow_records);
}
else {
    $pdo->getAllmessageByName($pdo2->find['name']);
}
view("show.view.php", [
    'heading' => 'All Messages',
    'result' => $pdo->result,
    'row_result' => $pdo->row_result,
    'total_pages' => $pdo->total_pages,
    'num_pages' => $num_pages,
]);