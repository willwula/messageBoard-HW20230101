<?php

use Core\Database;

$config = require base_path('config.php');

if (isset($_POST['submit'])) {
    $no = htmlspecialchars($_POST['no']);
    $name = htmlspecialchars($_POST['name']);
    $subject = htmlspecialchars($_POST['subject']);
    $content = htmlspecialchars($_POST['content']);

    $pdo = new Database($config['database']);
    $sql = "UPDATE guestbook SET subject='$subject',content='$content' where no= ? ";
    $result = $pdo->query_execute($sql,[$no]);

//    if (!empty($result)) {
//        $result->execute();
//    }
    if (!$result)
        die();
    else {
        echo "
         <script>
            setTimeout(function(){window.location.href='/show';},200);
        </script>";

    }
} else {
    echo '<div class="success">Click <strong>Send</strong> when you\'re done.</div>';
}

