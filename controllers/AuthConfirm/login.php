<?php

use Core\Database;
//use models\User;

Class loginController
{
    public $name;
    public $password;
    public $rows;
    public $find;
public function __construct()
{
    if (isset($_POST['submit'])) {
        $this->name = htmlspecialchars($_POST['name']);
        $this->password = htmlspecialchars($_POST['password']);
    }

}

public function loginCheck()
{
//    dd(empty($this->name));

        $config = require base_path('config.php');
        $pdo = new Database($config['database']);
        $sql = "SELECT * FROM user WHERE name = :name AND password = :password";
        $result = $pdo->query_execute($sql, [
            "name" => $this->name,
            "password" => $this->password
        ]);
        $this->find = $result->fetch();

//        $_SESSION = $fin;
//        dd($_SESSION);
        @$_SESSION['name'] = $this->find['name'];
        @$_SESSION['password'] = $this->find['password'];
        @$_SESSION['id'] = $this->find['id'];
        @$_SESSION['level'] = $this->find['level'];
        $this->rows = $result->rowCount();
}

//    if ($name && $password) {
//
//    }

//        if ($rows) {
//            echo "
//                        <script>
//                            window.alert('WELCOME！');
//                            setTimeout(function(){window.location.href='/show';},0);
//                        </script>";
//            exit;
//        } else {
//            echo '<div class="warning">Wrong Username or Password！</div>';
//            echo "
//                <script>
//                setTimeout(function(){window.location.href='/';},2000);
//                </script>";
//        }
//    } else {
//
//        echo '<div class="warning">Uncompleted form！ </div>';
//        echo "
//            <script>
//            setTimeout(function(){window.location.href='/';},2000);
//            </script>";
//    }
//
//
//view("index.view.php", [
//    'heading' => 'Login in',
//]);
}
//$user=new User();
//$user->getUserByName($this->name);
$login =new loginController();
    $login->loginCheck();

//dd($login->find);

    if ($login->rows == '1') {
        echo "
                        <script>
                            window.alert('WELCOME！');
                            setTimeout(function(){window.location.href='/show';},0);
                        </script>";
        exit;
    }
    else  {
//        echo '<div class="warning">Please Check Username and Password！</div>';
        echo "
                <script>
                 window.alert('Please Check Username or Password！');
                setTimeout(function(){window.location.href='/';},2000);
                </script>";
    }
//if($login->find=false){
//
//        echo '<div class="warning">Uncompleted form！ </div>';
//        echo "
//            <script>
//            setTimeout(function(){window.location.href='/';},2000);
//            </script>";
//
//}

view("index.view.php", [
    'heading' => 'Login in',
]);