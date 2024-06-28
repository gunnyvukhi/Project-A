<?php 

require_once "app/model/UserModel.php";
require_once "app/model/PostModel.php";
require_once "app/model/FriendModel.php";
require_once "app/model/UserDetailModel.php";
require_once "app/controller/Controller.php";

class profileController
{
    public function index()
    {
        $userModel = new UserModel();
        $user = $userModel->getUserById($_SESSION['userId']);

        
        $userDetailModel = new UserDetailModel();
        $userDetail = $userDetailModel->getUserDetail($_SESSION['userId']);

        $controller = new Controller();
        $data = $controller->DataId($_SESSION['userId']);

        require_once 'resources\view\Profile.php';
    }

    public function ChangeAvatar()
    {
        $userModel = new UserModel();
        $user = $userModel->getUserById($_SESSION['userId']);
        if (isset($_POST['submit'])) {
            $avatar = $_FILES['avatar']['name'];
            $target = 'resources\image\avatar\\' . $avatar;
            move_uploaded_file($_FILES['avatar']['tmp_name'], $target);
            $userModel->changeAvatar($_SESSION['userId'], $avatar);
            header('Location: ' . APPURL . 'profile');
        }
    }

    public function ChangeBackground()
    {
        $userModel = new UserModel();
        $user = $userModel->getUserById($_SESSION['userId']);
        if (isset($_POST['submit'])) {
            $background = $_FILES['background']['name'];
            $target = 'resources\image\background\\' . $background;
            move_uploaded_file($_FILES['background']['tmp_name'], $target);
            $userModel->changeBackground($_SESSION['userId'], $background);
            header('Location: ' . APPURL . 'profile');
        }
    }
}