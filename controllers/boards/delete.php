<?php
use models\Guestbook;
authorize(@$_POST["action"]&&$_POST["action"]=="delete");
$delete = new Guestbook();
$no = @$_POST['no'];
$delete->delete($no);
echo "
         <script>
            window.alert('留言已刪除！');
            setTimeout(function(){window.location.href='/show';},0);
        </script>";