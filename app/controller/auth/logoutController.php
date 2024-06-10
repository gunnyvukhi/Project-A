<?php


require_once 'config/db.php';

class logoutController {
    public function logout() {
        if(isset($_POST['logout'])){
            $db = new DB();
            $email = $_SESSION['userEmail'];
            //setting status user
            $sql = "UPDATE user_basic SET status = 'offline' WHERE email = '$email'";
            $db->query($sql);

            session_unset();
            session_destroy();

            //check if isset cookie
            if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
                //delete cookie
                setcookie('email', '', time() - 1);
                setcookie('password', '', time() - 1);
            }

            //redirect to login page
            header('Location: http://localhost/project-a/login');
        }
    }
}