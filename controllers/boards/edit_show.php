<?php

use Core\Database;

$config = require base_path('config.php');

if (!isset($_SESSION)) {
    session_start();
}
//dd($_POST);
$currentUserName = $_SESSION['name'];
//dd($currentUserName);
$name = htmlspecialchars($_POST['name']);
$no = htmlspecialchars($_POST['no']);
$pdo = new Database($config['database']);

    $sql = "SELECT * FROM guestbook WHERE  no = ?";
    /** @var $pdo */
    $result = $pdo->query_execute($sql,[$no]);
    $row = $result->fetch(PDO::FETCH_ASSOC);

@authorize($row['name'] === $currentUserName or $currentUserName == 'admin');

        $name = $row['name'];
        $no = $row['no'];
        $subject = $row['subject'];
        $content = $row['content'];

        view("edit.view.php", [
            'heading' => 'Edit Message',
            'subject' => "$subject",
            'content' => "$content",
            'no' => "$no",

        ]);

