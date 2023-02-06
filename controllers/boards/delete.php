<?php

use models\Guestbook;
//use Core\Database;
authorize(@$_POST["action"]&&$_POST["action"]=="delete");
$delete = new Guestbook();

$no = @$_POST['no'];

$delete->delete($no);

echo "
         <script>
            window.alert('留言已刪除！');
            setTimeout(function(){window.location.href='/show';},0);
        </script>";
//$config = require base_path('config.php');
//$pdo = new Database($config['database']);
//$name = htmlspecialchars($_POST['name']);
//$no = htmlspecialchars($_POST['no']);
//
//$sql = "DELETE from guestbook where no= ?";
//
///** @var $pdo */
//$result = $pdo->query_execute($sql,[$no]);
//if (!$result) {
//    die();
//} else {
