<?php
use Core\Validator;
use models\User;
Class signupController
{
    public $name;
    public $password;
    public $rows;
    public $result;
    public $errors = [];
    public function __construct()
    {
        if (isset($_POST['submit'])) {
            $this->name = htmlspecialchars(strip_tags($_POST['name']));
            $this->password = htmlspecialchars(strip_tags($_POST['password']));
            if (!Validator::string($this->name, 1, 20)) {
                $this->errors['name'] = '姓名不可為空或超過20個字元！';
            }
            if (!Validator::string($this->password, 4, 10)) {
                $this->errors['password'] = '密碼不可為空且少於4個或超過10個字元！';
            }
        }
    }
    public function signupCheck(): void
    {
        if (empty($this->errors)) {
//            $config = require base_path('config.php');
//            $pdo = new Database($config['database']);
//            $sql = "SELECT * from user where name = :name";
//            $result = $pdo->query_execute($sql, [
//                "name" => $this->name
//            ]);
//            $this->rows = $result->rowCount();
            $this->result = new User;
            $this->result->getUserByName($this->name);
        }
    }
//    public function insert()
//    {
//        $config = require base_path('config.php');
//        $pdo = new Database($config['database']);
//        $sql = "INSERT INTO user(id,name,password) values (null,'$this->name','$this->password')";
//        $this->result = $pdo->query($sql);
//        echo "
//                        <script>
//                            window.alert('新增成功！');
//                            setTimeout(function(){window.location.href='/';},0);
//                        </script>";
//    }
}
$signup = new signupController();
    $signup->signupCheck();
@$rows = $signup->result->rows;

        if ($rows == '0') { //若這個name還未被使用過
            $hash_password = password_hash($signup->password,PASSWORD_DEFAULT);
            $create = new User();
            $create->insert($signup->name,$hash_password);
            try {
                if (isset($rows)) {
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
    if ($rows == '1') { //這個name已被使用
        echo "
                        <script>
                            window.alert('此名稱已被使用！');
                            setTimeout(function(){window.location.href='/signup';},0);
                        </script>";
    }

view("signup.view.php", [
    'heading' => 'Sign up',
    'errors' => $signup->errors
]);