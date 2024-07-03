<?php


require_once "config/db.php";

class RegisterController {
    public function register() {
        if (isset($_POST['submit']) && isset($_POST['name'])) {
            $name = $_POST['name'];
            $email = $_POST['Email'];
            $password = $_POST['password'];
            $mobileNo = $_POST['mobileNo'];
            $birthDate = $_POST['birthDate'];
            $gender = $_POST['gender'];
            $confirmPassword = $_POST['passwordConfirm'];
            $create_at = date('Y-m-d H:i:s');

            //check password is 6 character
            if (strlen($password) < 6) {
                echo "<script>alert('Mật khẩu phải có ít nhất 6 ký tự');</script>";
            }else{
                //check email exist
                $db = new DB();
                $sql = "SELECT * FROM user_basic WHERE email = '$email'";
                $user = $db->query($sql);
                $user = $user->fetch(PDO::FETCH_ASSOC);
                // echo print_r($user);
                if (!empty($user)) {
                    //alert email exist
                    echo "<script>alert('Email đã tồn tại');</script>";
                }else{
                    if ($password == $confirmPassword) {
                        $db = new DB();
                        $sql = "INSERT INTO user_basic (user_name, email, password, mobile_no, birth_date, gender, create_at) VALUES ('$name', '$email', '$password', '$mobileNo', '$birthDate', '$gender', '$create_at')";
                        $user = $db->query($sql);
        
                        header('Location: ' . APPURL . 'login');
                    } else {
                        echo "<script>success=0</script>";
                    }
                }
            }


        }

        require_once 'resources/view/signIn.html';
    }
}