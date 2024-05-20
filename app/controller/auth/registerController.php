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

            if ($password == $confirmPassword) {
                $db = new DB();
                $sql = "INSERT INTO user_basic (last_name, email, password, mobile_no, birth_date, gender) VALUES ('$name', '$email', '$password', '$mobileNo', '$birthDate', '$gender')";
                $user = $db->query($sql);
                // echo "<script>success=1</script>";
                header('Location: http://localhost/project-a/login');
            } else {
                echo "<script>success=0</script>";
            }
        }

        require_once 'resources/view/signIn.html';
    }
}