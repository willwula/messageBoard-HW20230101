<?php
use models\Guestbook;
$currentUserName = $_SESSION['name'];
$name = htmlspecialchars($_POST['name']);
$no = htmlspecialchars($_POST['no']);
$result = new Guestbook();
$result->getAllmessageByNo($no);
authorize($result->row['name'] === $currentUserName or $currentUserName == 'admin');
        $name = $result->row['name'];
        $no = $result->row['no'];
        $subject = $result->row['subject'];
        $content = $result->row['content'];

        view("edit.view.php", [
            'heading' => 'Edit Message',
            'subject' => "$subject",
            'content' => "$content",
            'no' => "$no",
        ]);