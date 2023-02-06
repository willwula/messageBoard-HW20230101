<?php
use models\Guestbook;
use models\User;
$pdo = new Guestbook();
$pdo2= new User();
$pdo2->findLogin(@$_SESSION['name'],@$_SESSION['password']);
authorize($pdo2->rows == '1');
//@$currentUserName = $_SESSION['name'];
//authorize(isset($currentUserName));
//@$name = htmlspecialchars($_SESSION['name']);
//@$level = htmlspecialchars($_SESSION['level']);

$pageRow_records = 5;
$num_pages = 1;
if (@$_GET['page']) {
    $num_pages = $_GET['page'];
}
$startRow_records = ($num_pages-1) * $pageRow_records;
//$sql_query = "SELECT * FROM guestbook";
//$sql_query_limit = $sql_query." LIMIT ".$startRow_records.",".$pageRow_records;
//$result = $pdo->query_execute($sql_query_limit);
////$all_result = $pdo->query_execute($sql_query);
//$total_records = $pdo->query($sql_query)->rowCount();
//$total_pages = ceil($total_records/$pageRow_records);
//$row_result = $pdo->query_execute($sql_query)->fetch();

//權限判別
if ($pdo2->find['level'] == '2'){
    $pdo->getAllmessage($startRow_records,$pageRow_records);

}
else {
    $pdo->getAllmessageByName($pdo2->name);
}
view("show.view.php", [
    'heading' => 'All Messages',
    'result' => $pdo->result,
    'row_result' => $pdo->row_result,
    'total_pages' => $pdo->total_pages,
    'num_pages' => $num_pages,
]);
