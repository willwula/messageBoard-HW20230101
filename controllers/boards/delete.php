<?php

use Core\Database;

$config = require base_path('config.php');
$pdo = new Database($config['database']);

$name = htmlspecialchars($_GET['name']);
$no = htmlspecialchars($_GET['no']);

$sql = "DELETE from guestbook where no= ?";

/** @var $pdo */
$result = $pdo->query_execute($sql,[$no]);
if (!$result) {
    die();
} else {
    echo "
         <script>
            window.alert('警告！正在刪除留言！');
            setTimeout(function(){window.location.href='/show';},0);
        </script>";

}


