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

            if ($password == $confirmPassword) {
                $db = new DB();
                $sql = "INSERT INTO user_basic (user_name, email, password, mobile_no, birth_date, gender, create_at) VALUES ('$name', '$email', '$password', '$mobileNo', '$birthDate', '$gender', '$create_at')";
                $user = $db->query($sql);

                header('Location: ' . APPURL . 'login');
            } else {
                echo "<script>success=0</script>";
            }
        }

        require_once 'resources/view/signIn.html';
    }
}