<?php 


require_once 'config/db.php';


class LoginController {
    public function login() {
        $check = 0;
        
        if (isset($_POST['submit'])) {
            $email = $_POST['Email'];
            $password = $_POST['password'];

            $db = new DB();
            $sql = "SELECT * FROM user_basic WHERE email = '$email' AND password = '$password'";
            

            $user = $db->query($sql);
            $user = $user->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                $_SESSION['user'] = $user;
                echo "<script>success=1</script>";
                header('Location: http://localhost/project-a/');
            } else {
                echo "<script>document.getElementById('result').innerHTML = 'Sai tài khoản email hoặc mật khẩu';</script>";
                $check = 1;

            }
        }
        if($check) {
            require_once 'resources/view/login.html';
            echo "<script>document.getElementById('result').innerHTML = 'Sai tài khoản email hoặc mật khẩu';</script>";
        }else{
            require_once 'resources/view/login.html';
        }
    }


}