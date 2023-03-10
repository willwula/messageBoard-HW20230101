<?php
use models\Guestbook;
use Core\Validator;
@$currentUserName = $_SESSION['name'];
authorize(isset($currentUserName));
$errors = [];

//送出留言後會檢查是否存在POST，若是則檢查POST傳過來的name是否與SESSION的相同。
//接著使用Validator這個class中string方法，刪除左右空白字元後檢查字串是否符合字元數規定。
//如果沒有回傳值則將error訊息寫入陣列，並傳至board.view.php。
//最後判斷error如為空陣列則將留言寫入資料庫中。

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    authorize($currentUserName == $_POST['name']);
    $name = htmlspecialchars(strip_tags($_POST['name']));
    $subject = htmlspecialchars(strip_tags($_POST['subject']));
    $content = htmlspecialchars(strip_tags($_POST['content']));
    if (!Validator::string($content, 1, 1000)) {
        $errors['content'] = 'A body of no more than 1000 characters is required.';
//        $errors['subject'] = 'A title of no more than 100 characters is required.';
    }
    if (strlen($content) > 1000 ) {
        $errors['content'] = 'The body can not be more than 1000 characters';
//        $errors['subject'] = 'The body can not be more than 100 characters';
    }

    if (!Validator::string($subject, 1, 100)) {
//        $errors['content'] = 'A body of no more than 1000 characters is required.';
        $errors['subject'] = 'A title of no more than 100 characters is required.';
    }
    if (strlen($subject) > 100) {
//        $errors['content'] = 'The body can not be more than 1000 characters';
        $errors['subject'] = 'The body can not be more than 100 characters';
    }

    if (empty($errors)) {
        $pdo = new Guestbook();
        $pdo->insert($name,$subject,$content);

        echo "<script>
                setTimeout(function(){window.location.href='/show';},0);
              </script>";
    }
}

view("board.view.php", [
    'heading' => 'Create Message',
    'errors' => $errors
]);

