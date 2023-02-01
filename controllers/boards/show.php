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
//dd($level);
//權限判別
if ($level == '2' ){
    $sql = "SELECT * from guestbook ";
    /** @var $pdo */
    $result = $pdo->query($sql);
    $fin=$result->fetch();
}else {
    $sql = 'SELECT * from guestbook WHERE name =:name';
    //$sth =
    /** @var $pdo */
    $result = $pdo->query_execute($sql, [
        'name' => $name
    ]);
//    dd($result);
    $fin=$result->fetch();
}
        @authorize($fin['name'] === $currentUserName or $fin != 'true');
//dd($fin);
//      authorize($fin['id'] === $currentUserId);

//從資料庫中撈留言紀錄並顯示

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

//    dd($row);
    echo "<br>Visitor Name：" . $row['name'];
    echo "<br>Subject：" . $row['subject'];
    echo "<br>Content：" . nl2br($row['content']) . "<br>";
    $no = $row['no'];
//    $name = $row['name'];

    if ($name == $row['name'] or $name =='admin') {
        echo "<table>";
        echo "<form class='mt-6' method='POST' action='/boards/edit_show'>";
        echo "<td align='right' colspan='2'  style='background: #FFF;'>";
        echo "<input type='hidden' name='no' value='$no'>";
        echo "<input type='hidden' name='name' value='$name'>";
        echo "<button class='text-sm text-red-500'>Edit message content</button>";
        echo "</form>";
        echo "</td>";
        echo "<td>";
        echo "<form class='mt-6' method='POST' action='/boards/delete'>";
        echo "<input type='hidden' name='no' value='$no'>";
        echo "<input type='hidden' name='name' value='$name'>";
        echo "<button class='text-sm text-red-500'>Delete the message</button>";
        echo "</form>";
        echo "</td>";
        echo "</table>";
//        echo '<a href="boards/edit_show?no=' . $no . '&name=' . $name . '">
//		Edit message content</a>&nbsp|&nbsp<a href="/boards/delete?no=' . $no . '&name=' . $name . '">Delete the message</a><br>';
        }
        echo "Time：" . $row['time'] . "<br>";
        echo "<hr>";

    }


