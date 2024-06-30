

<?php


require_once 'config/db.php';


class UserDetailModel{

    // get user detail
    public function getUserDetail($user_id){
        $sql = "SELECT * FROM user_about WHERE user_id = $user_id";
        $db = new DB;
        $db = $db->query($sql);
        $db = $db->fetchAll(PDO::FETCH_ASSOC);
        return $db;
    }


    //user_id,	occupation,	education_level	,lives_in	,address_id	,relationship,  date_of_joining	,update_at
    //create user detail
    public function createUserDetail($user_id, $occupation, $education_level, $lives_in, $address_id, $relationship, $date_of_joining, $update_at){
        $sql = "INSERT INTO user_about (user_id, occupation, education_level, lives_in, address_id, relationship, date_of_joining, update_at) VALUES ($user_id, '$occupation', '$education_level', '$lives_in', $address_id, '$relationship', '$date_of_joining', '$update_at')";
        $db = new DB;
        echo $sql;
        $db = $db->query($sql);
        return $db;
    }

    //update user detail
    public function updateUserDetail($user_id, $occupation, $education_level, $lives_in, $address_id, $relationship, $update_at){
        $sql = "UPDATE user_about SET occupation = '$occupation', education_level = '$education_level', lives_in = '$lives_in', address_id = $address_id, relationship = '$relationship', update_at = '$update_at' WHERE user_id = $user_id";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    //get address id by user id
    
    public function getAddressId($user_id){
        $sql = "SELECT address_id FROM user_about WHERE user_id = $user_id";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

}