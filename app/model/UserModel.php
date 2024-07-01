<?php 


require_once 'config/db.php';

class UserModel{


    //get user by id
    public function getUserById($id){
        $sql = "SELECT * FROM user_basic WHERE user_id = '$id'";
        $db = new DB;
        $db = $db->query($sql);
        $db = $db->fetch(PDO::FETCH_ASSOC);
        return $db;
    }

    //change avatar
    public function changeAvatar($user_id, $avatar){
        $sql = "UPDATE user_basic SET avatar = '$avatar' WHERE user_id = '$user_id'";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    //change background
    public function changeBackground($user_id, $background){
        $sql = "UPDATE user_basic SET avatar_backgroud = '$background' WHERE user_id = '$user_id'";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    //search user by name
    public function searchUser($name){
        $sql = "SELECT user_id, user_name, avatar FROM user_basic WHERE user_name LIKE '%$name%'";
        $db = new DB;
        $db = $db->query($sql);
        $db = $db->fetchAll(PDO::FETCH_ASSOC);
        return $db;
    }



 
}