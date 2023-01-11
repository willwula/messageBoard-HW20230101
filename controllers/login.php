<?php

use Core\Database;

$config = require base_path('config.php');
$pdo = new Database($config['database']);

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $password = htmlspecialchars($_POST['password']);

    if ($name && $password) {
        $sql = "SELECT * FROM user WHERE name = '$name' AND password = '$password'";
        /** @var $pdo */
        $result = $pdo->query($sql);
        $fin = $result->fetch();
        $_SESSION = $fin;
        $rows = $result->rowCount();
        if ($rows) {
                echo "
                        <script>
                            window.alert('WELCOME！');
                            setTimeout(function(){window.location.href='/show';},0);
                        </script>";
//            echo '<div class="sucess">welcome！ </div>';
//            echo "
//                <script>
//                setTimeout(function(){window.location.href='/message?name=" . $name . "';},1000);
//                </script>";
            exit;
        } else {
            echo '<div class="warning">Wrong Username or Password！</div>';
            echo "
                <script>
                setTimeout(function(){window.location.href='/';},2000);
                </script>";
        }
    } else {

        echo '<div class="warning">Incompleted form！ </div>';
        echo "
            <script>
            setTimeout(function(){window.location.href='/';},2000);
            </script>";
    }
}

view("index.view.php", [
    'heading' => 'Login in',
]);