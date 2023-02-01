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
        $sql = "SELECT * FROM user WHERE name = :name AND password = :password";
        $result = $pdo->query_execute($sql,[
            "name" => $name,
            "password" => $password
        ]);
        $fin = $result->fetch();
//        $_SESSION = $fin;
//        dd($_SESSION);
        @$_SESSION['name'] = $fin['name'];
        @$_SESSION['password'] = $fin['password'];
        @$_SESSION['id'] = $fin['id'];
        @$_SESSION['level'] = $fin['level'];
        $rows = $result->rowCount();
        if ($rows) {
                echo "
                        <script>
                            window.alert('WELCOME！');
                            setTimeout(function(){window.location.href='/show';},0);
                        </script>";
            exit;
        } else {
            echo '<div class="warning">Wrong Username or Password！</div>';
            echo "
                <script>
                setTimeout(function(){window.location.href='/';},2000);
                </script>";
        }
    } else {

        echo '<div class="warning">Uncompleted form！ </div>';
        echo "
            <script>
            setTimeout(function(){window.location.href='/';},2000);
            </script>";
    }
}

view("index.view.php", [
    'heading' => 'Login in',
]);