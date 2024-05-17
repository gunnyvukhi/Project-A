<?php 


require_once 'config/db.php';


class LoginController {
    public function login() {

        //demo code
        $db = new DB();
        $data =  $db->query("SELECT * FROM user_basic");

        require_once 'resources/view/login.html';
    }


}