<?php
namespace AuthConfirm;
use models\User;
Class loginController
{
    public $name;
    public $password;
    public $rows;
    public $find;
    protected $login;
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
//        $config = require base_path('config.php');
//        $pdo = new Database($config['database']);
//        $sql = "SELECT * FROM user WHERE name = :name AND password = :password";
//        $result = $pdo->query_execute($sql, [
//            "name" => $this->name,
//            "password" => $this->password
//        ]);
//        $this->find = $result->fetch();
//        $this->rows = $result->rowCount();
        $this->login = new User();
        $this->login->findLogin($this->name,$this->password);

        @$_SESSION['name'] = $this->login->find['name'];
        @$_SESSION['password'] = $this->login->find['password'];
        @$_SESSION['id'] = $this->login->find['id'];
        @$_SESSION['level'] = $this->login->find['level'];
        @$_SESSION['rows'] = $this->login->rows;
    }
}

$login =new loginController();
    $login->loginCheck();

    if ($_SESSION['rows'] == '1') {
        echo "
                        <script>
                            window.alert('WELCOME！');
                            setTimeout(function(){window.location.href='/show';},0);
                        </script>";
        exit;
    }
    else  {
        echo "
                <script>
                 window.alert('Please Check Username or Password！');
                setTimeout(function(){window.location.href='/';},2000);
                </script>";
    }

view("index.view.php", [
    'heading' => 'Login in',
]);