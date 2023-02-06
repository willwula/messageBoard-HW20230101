<?php
namespace AuthConfirm;
use models\User;
Class loginController
{
    public $name;
    public $password;
    public $hash_password;
    public $result;
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
        $this->login = new User();
        $this->login->getUserByName($this->name);
        @$this->hash_password = ($this->login->result['password']);

        if(@password_verify($this->password,$this->hash_password)) {
            $this->login->findLogin($this->name, $this->hash_password);
            @$_SESSION['name'] = $this->login->find['name'];
            @$_SESSION['password'] = $this->login->find['password'];
            @$_SESSION['id'] = $this->login->find['id'];
            @$_SESSION['level'] = $this->login->find['level'];
            @$_SESSION['rows'] = $this->login->rows;
        }
    }
}

$login =new loginController();
    $login->loginCheck();

    if (@$_SESSION['rows'] == '1') {
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
                setTimeout(function(){window.location.href='/';},0);
                </script>";
    }

view("index.view.php", [
    'heading' => 'Login in',
]);