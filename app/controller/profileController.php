<?php 

require_once "app/model/UserModel.php";

class profileController
{
    public function index()
    {
        $userModel = new UserModel();
        $user = $userModel->getUserById($_SESSION['userId']);
        require_once 'resources\view\Profile.php';
    }
}