

<?php


require_once 'config/db.php';


class UserDetailModel{
    //user_id,	occupation,	education_level	,lives_in	,address_id	,date_of_joining	,update_at
    public function createUserDetail($user_id, $occupation, $education_level, $lives_in, $address_id, $date_of_joining, $update_at){
        $sql = "INSERT INTO user_basic (user_id, occupation, education_level, lives_in, address_id, date_of_joining, update_at) 
        VALUES ('$user_id', '$occupation', '$education_level', '$lives_in', '$address_id', '$date_of_joining', '$update_at')";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    //update user detail
    public function updateUserDetail($user_id, $occupation, $education_level, $lives_in, $address_id, $date_of_joining, $update_at){
        $sql = "UPDATE user_basic SET occupation = '$occupation', education_level = '$education_level', lives_in = '$lives_in', address_id = '$address_id', date_of_joining = '$date_of_joining', update_at = '$update_at' WHERE user_id = $user_id";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

}