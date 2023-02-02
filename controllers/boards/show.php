<?php

use Core\Database;
$config = require base_path('config.php');

if (!isset($_SESSION)) {
    session_start();
}
//dd($_SESSION);
$currentUserName = $_SESSION['name'];
$name = htmlspecialchars($_SESSION['name']);
//var_dump($name);
$level = htmlspecialchars($_SESSION['level']);
$pdo = new Database($config['database']);

$pageRow_records = 5;
$num_pages = 1;
if (isset($_GET['page']) && $level == '2') {
    $num_pages = $_GET['page'];
}
$startRow_records = ($num_pages-1) * $pageRow_records;
$sql_query = "SELECT * FROM guestbook";
//$sql_query_limit = $sql_query." LIMIT ".$startRow_records.",".$pageRow_records;
//$result = $pdo->query_execute($sql_query_limit);
////$all_result = $pdo->query_execute($sql_query);
//$total_records = $pdo->query($sql_query)->rowCount();
//$total_pages = ceil($total_records/$pageRow_records);
//$row_result = $pdo->query_execute($sql_query)->fetch();





//dd($level);
//權限判別
//if ($level == '2' ){
//    $sql = "SELECT * from guestbook ";
//    /** @var $pdo */
//    $result = $pdo->query($sql);
    $sql_query_limit = $sql_query." LIMIT ".$startRow_records.",".$pageRow_records;
    $result = $pdo->query_execute($sql_query_limit);
//$all_result = $pdo->query_execute($sql_query);
    $total_records = $pdo->query($sql_query)->rowCount();
    $total_pages = ceil($total_records/$pageRow_records);
    $row_result = $pdo->query_execute($sql_query)->fetch();

//}
//else {
//    $sql = 'SELECT * from guestbook WHERE name =:name';
//    //$sth =
//    /** @var $pdo */
//    $result = $pdo->query_execute($sql, [
//        'name' => $name
//    ]);
////    dd($result);
//    $fin=$result->fetchAll();
//}
        authorize($row_result['name'] === $currentUserName or $row_result != 'true');
//dd($fin);
//      authorize($fin['id'] === $currentUserId);

//從資料庫中撈留言紀錄並顯示
//foreach ($fin as $row) {
////    dd($fin);
//    echo "<br>Visitor Name：" . $row['name'];
//    echo "<br>Subject：" . $row['subject'];
//    echo "<br>Content：" . nl2br($row['content']) . "<br>";
//    $no = $row['no'];
//    $name = $row['name'];
//    if ($name  or $name == 'admin') {
//        echo "<table>";
//        echo "<form class='mt-6' method='POST' action='/boards/edit_show'>";
//        echo "<td align='right' colspan='2'  style='background: #FFF;'>";
//        echo "<input type='hidden' name='no' value='$no'>";
//        echo "<input type='hidden' name='name' value='$name'>";
//        echo "<button class='text-sm text-red-500'>Edit message content</button>";
//        echo "</form>";
//        echo "</td>";
//        echo "<td>";
//        echo "<form class='mt-6' method='POST' action='/boards/delete'>";
//        echo "<input type='hidden' name='no' value='$no'>";
//        echo "<input type='hidden' name='name' value='$name'>";
//        echo "<button class='text-sm text-red-500'>Delete the message</button>";
//        echo "</form>";
//        echo "</td>";
//        echo "</table>";
//    }
//    echo "Time：" . $row['time'] . "<br>";
//    echo "<hr>";
//}

view("show.view.php", [
    'heading' => 'All Messages',
    'result' => $result,
    'row_result' => $row_result,
    'total_pages' => "$total_pages",
    'num_pages' => "$num_pages"
]);
