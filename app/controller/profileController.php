<?php 

require_once "app/model/UserModel.php";
require_once "app/model/PostModel.php";

class profileController
{
    public function index()
    {
        
        
        $userModel = new UserModel();
        $user = $userModel->getUserById($_SESSION['userId']);

        $postModel = new PostModel();
        $data = $postModel->getAllPost();
        require_once 'resources\view\Profile.php';
    }
}