<?php

use Core\Database;

$config = require base_path('config.php');

$pdo = new Database($config['database']);


if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $password = htmlspecialchars($_POST['password']);
    if ($name && $password) {
        $sql = "SELECT * from user where name = ?";
        $result = $pdo->query_execute($sql,[$name]);
        $rows = $result->rowCount();
        if (!$rows) { //若這個name還未被使用過
            $sql = "INSERT INTO user(id,name,password) values (null,'$name','$password')";

            $result = $pdo->query($sql);
            try {
                if ($result) {
//                    echo '新增成功';
                    echo "
                        <script>
                            window.alert('新增成功！');
                            setTimeout(function(){window.location.href='/';},0);
                        </script>";
//                    echo "
//                        <script>
//                        setTimeout(function(){window.location.href='/';},1000);
//                        </script>";
                } else {
                    echo "
                        <script>
                            window.alert('新增失敗！');
                            setTimeout(function(){window.location.href='/signup';},0);
                        </script>";
//                    echo '新增失敗';
//                    echo "
//                <script>
//                setTimeout(function(){window.location.href='/signup';},1000);
//                </script>";
                }
            } catch (PDOException $e) {
                echo '新增失敗';
            }
        } else { //這個name已被使用
                    echo "
                        <script>
                            window.alert('此名稱已被使用！');
                            setTimeout(function(){window.location.href='/signup';},0);
                        </script>";
//            echo '<div class="warning">The Username has already been used ！</div>';
//            echo "
//                <script>
//                setTimeout(function(){window.location.href='/signup';},1000);
//                </script>";
        }
        } else {
                echo "
                        <script>
                            window.alert('註冊表單尚未完成！');
                            setTimeout(function(){window.location.href='/signup';},0);
                        </script>";
//        echo '<div class="warning">Uncompleted form！ </div>';
//        echo "
//                <script>
//                setTimeout(function(){window.location.href='/signup';},1000);
//                </script>";
    }
}

view("signup.view.php", [
    'heading' => 'Sign up',
]);