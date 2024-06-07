<?php


require_once 'config/db.php';

class ActionLogModel{

    //user_id	friend_id	action_performed	activity_date	

    public function logAction($user_id, $friend_id, $action_performed, $activity_date){
        $sql = "INSERT INTO action_log (user_id, friend_id, action_performed, activity_date) VALUES ($user_id, $friend_id, '$action_performed', '$activity_date')";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    public function getActionLogByUserId($user_id){
        $sql = "SELECT * FROM action_log WHERE user_id = $user_id";
        $db = new DB;
        $db = $db->query($sql);
        $db = $db->fetchAll(PDO::FETCH_ASSOC);
        return $db;
    }

}