<?php



require_once 'app/model/FriendModel.php';

class FriendController
{
    public function index()
    {
        $FriendModel = new FriendModel();
        $friends = $FriendModel->getFriendWithMe($_SESSION['userId']);
        require_once 'resources/view/friend.php';
    }

    public function addFriend()
    {
        if (isset($_POST['submit'])) {
            $FriendModel = new FriendModel();
            $FriendModel->addFriend($_SESSION['userId'], $_POST['friends_User_id'], date('Y-m-d H:i:s'));
        }
    }

    public function deleteFriend()
    {
        $FriendModel = new FriendModel();
        $FriendModel->deleteFriend($_POST['friend_id']);
        header('Location: ' . APPURL . 'friend');
    }

    // flollow friend
    // public function flollowFriend()
    // {
    //     $FriendModel = new FriendModel();
    //     $FriendModel->flollowFriend($_SESSION['userId'], $_POST['friend_id']);
    //     header('Location: ' . APPURL . 'friend');
    // }
}