<?php

use Core\Database;
use Core\Validator;

require base_path('Core/Validator.php');
$config = require base_path('config.php');

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $no = htmlspecialchars($_POST['no']);
    $name = htmlspecialchars($_POST['name']);
    $subject = htmlspecialchars($_POST['subject']);
    $content = htmlspecialchars($_POST['content']);
    if (!Validator::string($content, 1, 1000)) {
        $errors['content'] = 'A body of no more than 1,000 characters is required.';
        $errors['subject'] = 'A title of no more than 1,000 characters is required.';
    }
    if (strlen($content) > 1000) {
        $errors['content'] = 'The body can not be more than 1000 characters';
        $errors['subject'] = 'The body can not be more than 1000 characters';
    }

    if (empty($errors)) {
        $pdo = new Database($config['database']);
        $sql = "UPDATE guestbook SET subject='$subject',content='$content' where no= ? ";
        $result = $pdo->query_execute($sql,[$no]);
        echo "<script>
                setTimeout(function(){window.location.href='/show';},0);
              </script>";
    }
}

view("board.view.php", [
    'heading' => 'Create Message',
    'errors' => $errors
]);

