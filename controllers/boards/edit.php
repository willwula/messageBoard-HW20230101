<?php
use models\Guestbook;
use Core\Validator;
@$currentUserName = $_SESSION['name'];
authorize(isset($currentUserName));
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $no = htmlspecialchars($_POST['no']);
    $name = htmlspecialchars($_POST['name']);
    $subject = htmlspecialchars($_POST['subject']);
    $content = htmlspecialchars($_POST['content']);
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
        $pdo->update($subject,$content,$no);
        echo "<script>
                setTimeout(function(){window.location.href='/show';},0);
              </script>";
    }
}
view("edit.view.php", [
    'heading' => 'Edit Message',
    'no' => $no,
    'name' => $pdo->name,
    'subject' => $pdo->subject,
    'content' => $pdo->content,
    'errors' => $errors
]);