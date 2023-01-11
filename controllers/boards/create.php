<?php
//送出留言後會執行下面這段程式碼
use Core\Database;

$config = require base_path('config.php');
$pdo = new Database($config['database']);

if (isset($_POST['submit'])) {
    echo '<div class="success">Added successfully ！</div>';
    $name = htmlspecialchars($_POST['name']);
    $subject = htmlspecialchars($_POST['subject']);
    $content = htmlspecialchars($_POST['content']);
    $sql = "INSERT INTO guestbook(name, subject, content, time) VALUES ('$name', '$subject', '$content', now())";
    /** @var $pdo */
    $result = $pdo->query_unexecute($sql);
    if (!empty($result)) {
        $result->execute();
    }
    if (!$result) die(); else {
        echo "
                <script>
                setTimeout(function(){window.location.href='/show';},500);
                </script>";

    }
} else {
    view("board.view.php", [
        'heading' => 'Create Message',
    ]);
    echo '<div class="success">Click <strong>Send</strong> when you\'re done.</div>';
}


