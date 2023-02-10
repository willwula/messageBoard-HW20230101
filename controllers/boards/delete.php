<?php
use models\Guestbook;
authorize($_POST["action"]&&$_POST["action"]=="delete");

$delete = new Guestbook();
$delete->getAllmessageByNo($_POST['no']);
//dd($_POST);
//$name = $delete->result['0']['name'];
//dd($_SESSION['name']);
authorize($_POST['name'] == $_SESSION['name']);
$no = @$_POST['no'];
$delete->delete($no);
echo "
         <script>
            window.alert('留言已刪除！');
            setTimeout(function(){window.location.href='/show';},0);
        </script>";