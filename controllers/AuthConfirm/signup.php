<?php

use Core\Database;

Class signupController
{
    public $name;
    public $password;
    public $rows;
    public $result;


    public function __construct()
    {
        if (isset($_POST['submit'])) {
            $this->name = htmlspecialchars($_POST['name']);
            $this->password = htmlspecialchars($_POST['password']);
        }

    }

    public function signupCheck()
    {
        $config = require base_path('config.php');
        $pdo = new Database($config['database']);
        $sql = "SELECT * from user where name = :name";
        $result = $pdo->query_execute($sql, [
            "name" => $this->name
        ]);
        $this->rows = $result->rowCount();
    }

    public function insert()
    {
        $config = require base_path('config.php');
        $pdo = new Database($config['database']);
        $sql = "INSERT INTO user(id,name,password) values (null,'$this->name','$this->password')";
        $this->result = $pdo->query($sql);

    }
}


$signup = new signupController();
    $signup->signupCheck();
//dd($signup);
if (empty($signup->name) or empty($signup->password)) {
    echo "
                        <script>
                            window.alert('註冊表單尚未完成！');
                            setTimeout(function(){window.location.href='/signup';},0);
                        </script>";
    exit();
}
        if ($signup->rows == '0') { //若這個name還未被使用過
            $signup->insert();
//dd($signup);
            try {
                if ($signup->result) {
                    echo "
                        <script>
                            window.alert('新增成功！');
                            setTimeout(function(){window.location.href='/';},0);
                        </script>";
                } else {
                    echo "
                        <script>
                            window.alert('新增失敗！');
                            setTimeout(function(){window.location.href='/signup';},0);
                        </script>";
                }
            } catch (PDOException $e) {
                echo '新增失敗';
            }

        }
    if ($signup->rows == '1') { //這個name已被使用
        echo "
                        <script>
                            window.alert('此名稱已被使用！');
                            setTimeout(function(){window.location.href='/signup';},0);
                        </script>";

    }

//
//view("signup.view.php", [
//    'heading' => 'Sign up',
//]);