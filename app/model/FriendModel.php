<?php


require_once 'config/db.php';

class FriendModel
{
    //friend_id,	user_id,	friends_User_id,	start_date	

    //get user who are friend with me
    public function getFriendWithMe($user_id)
    {
        $sql = "SELECT * FROM friends WHERE user_id = $user_id";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    //get all friend
    public function getAllFriend()
    {
        $sql = "SELECT * FROM friends";
        $db = new DB;
        $db = $db->query($sql);
        $db = $db->fetchAll(PDO::FETCH_ASSOC);
        return $db;
    }



    public function addFriend($user_id, $friends_User_id, $start_date)
    {
        $sql = "INSERT INTO friends (user_id, friends_User_id, start_date) VALUES ($user_id, $friends_User_id, '$start_date')";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    public function deleteFriend($friend_id)
    {
        $sql = "DELETE FROM friends WHERE friend_id = '$friend_id'";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }
}