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


 
}