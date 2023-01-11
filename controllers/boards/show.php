<?php

use Core\Database;

$config = require base_path('config.php');

if (!isset($_SESSION)) {
    session_start();
}
$name = htmlspecialchars($_SESSION['name']);
$level = htmlspecialchars($_SESSION['level']);
$pdo = new Database($config['database']);

//權限判別
if ($level == '2'){
    $sql = "SELECT * from guestbook ";
    /** @var $pdo */
    $result = $pdo->query($sql);
}else {
    $sql = "SELECT * from guestbook WHERE name = ?";
    /** @var $pdo */
    $result = $pdo->query_execute($sql, [$name]);
}
//從資料庫中撈留言紀錄並顯示
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<br>Visitor Name：" . $row['name'];
    echo "<br>Subject：" . $row['subject'];
    echo "<br>Content：" . nl2br($row['content']) . "<br>";
    $no = $row['no'];
    if ($name == $row['name']) {
        echo '<a href="boards/edit_show?no=' . $no . '&name=' . $name . '">
		Edit message content</a>&nbsp|&nbsp<a href="/boards/delete?no=' . $no . '&name=' . $name . '">Delete the message</a><br>';
        }
        echo "Time：" . $row['time'] . "<br>";
        echo "<hr>";

    }
    echo "<br>";
    echo '<div class="bottom left position-abs content">';
    echo "There are " . $result->rowCount() . " messages.";


