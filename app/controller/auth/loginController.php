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
                $_SESSION['userName'] = $user['first_name'] . ' ' . $user['last_name'];
                $_SESSION['userEmail'] = $user['email'];
                $_SESSION['userAvatar'] = $user['avatar'];
                $_SESSION['userId'] = $user['user_id'];

                //remember me
                if(isset($_POST['rememberMe'])){
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    setcookie('email', $email, time() + 60*60*24*30);
                    setcookie('password', $password, time() + 60*60*24*30);
                }else{
                    setcookie('email', $email, time() - 1);
                    setcookie('password', $password, time() - 1);
                }


                echo "<script>success=1</script>";
                header('Location: http://localhost/project-a/');
            } else {
                echo "<script>document.getElementById('result').innerHTML = 'Sai tài khoản email hoặc mật khẩu';</script>";
                $check = 1;

            }
        }
        //check remember me
        if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
            $email = $_COOKIE['email'];
            $password = $_COOKIE['password'];
            $db = new DB();
            $sql = "SELECT * FROM user_basic WHERE email = '$email'";
            $user = $db->query($sql);
            $user = $user->fetch(PDO::FETCH_ASSOC);
            if($user){
                if(password_verify($user['password'], $password)){
                    $_SESSION['userName'] = $user['first_name'] . ' ' . $user['last_name'];
                    $_SESSION['userEmail'] = $user['email'];
                    $_SESSION['userAvatar'] = $user['avatar'];
                    $_SESSION['userId'] = $user['user_id'];
                    header('Location: http://localhost/project-a/');
                }
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