<?php 

require_once "app/model/UserModel.php";
require_once "app/model/PostModel.php";
require_once "app/model/FriendModel.php";
require_once "app/model/UserDetailModel.php";
require_once "app/controller/Controller.php";
require_once "app/model/AddressModel.php";

class profileController
{
    public function index()
    {
        $user = [];
        $userDetail = [];
        $dataid = [];
        if(isset($_GET['id'])){
            $uID = $_GET['id'];
            $userModel = new UserModel();
            $user = $userModel->getUserById($uID);
    
            
            $userDetailModel = new UserDetailModel();
            $userDetail = $userDetailModel->getUserDetail($uID);
    
            $controller = new Controller();
            $dataid = $controller->DataId($uID);
    
            $addressModel = new AddressModel();
            $user = $userModel->getUserById($uID);
        
        }else{
            $uID = $_SESSION['userId'];
            $userModel = new UserModel();
            $user = $userModel->getUserById($uID);
    
            
            $userDetailModel = new UserDetailModel();
            $userDetail = $userDetailModel->getUserDetail($uID);
    
            $controller = new Controller();
            $dataid = $controller->DataId($uID);
    
            $addressModel = new AddressModel();
            $user = $userModel->getUserById($uID);
    

            if (isset($_POST['submit'])) {
                $company = $_POST['Company'];
                $role = $_POST['Position'];
                $occupation = $company . ' - ' . $role;
                $education = $_POST['School'];
                $lives = $_POST['Live'];
                $relationship = $_POST['RelationshipSelect'];
                $date = date('Y-m-d H:i:s');
                $update = date('Y-m-d H:i:s');
    
                $homeTown = $_POST['HomeTown'];
    
                $addressModel->createAddress($homeTown);
                $address_id = $addressModel->getLastAddressId();
                $getuserDetail = $userDetailModel->getUserDetail($uID);
                if(empty($getuserDetail)){
                    $userDetailModel->createUserDetail($uID, $occupation, $education, $lives, $address_id, $relationship, $date, $update);
                }else{
                    $userDetailModel->updateUserDetail($uID, $occupation, $education, $lives, $address_id, $relationship, $update);
                }
                header('Location: ' . APPURL . 'profile');
            }
        }
        require_once 'resources\view\Profile.php';
    }

    public function ChangeAvatar()
    {
        $userModel = new UserModel();
        $user = $userModel->getUserById($_SESSION['userId']);
        if (isset($_POST['submit'])) {
            $avatar = $_FILES['newAvaFileInput']['name'];
            $target = 'resources/image/avatar/' . $avatar;
            move_uploaded_file($_FILES['newAvaFileInput']['tmp_name'], $target);
            $userModel->changeAvatar($_SESSION['userId'], $avatar);
            header('Location: ' . APPURL . 'profile');
        }
    }

    public function ChangeBackground()
    {
        $userModel = new UserModel();
        $user = $userModel->getUserById($_SESSION['userId']);
        if (isset($_POST['submit'])) {
            $background = $_FILES['newCoverFileInput']['name'];
            $target = 'resources/image/background/' . $background;
            move_uploaded_file($_FILES['newCoverFileInput']['tmp_name'], $target);
            $userModel->changeBackground($_SESSION['userId'], $background);
            header('Location: ' . APPURL . 'profile');
        }
    }

}