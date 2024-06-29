<?php


require_once 'config/db.php';

class ActionLogModel{

    //activity_id user_id	post_id	action_performed	activity_date	

    //get last activity_id
    public function getLastActivityId(){
        $sql = "SELECT activity_id FROM activity_log ORDER BY activity_id DESC LIMIT 1";
        $db = new DB;
        $db = $db->query($sql);
        $db = $db->fetch(PDO::FETCH_ASSOC);
        return $db;
    }

    public function logAction($user_id, $post_id, $action_performed, $activity_date){
        $activity_id = $this->getLastActivityId()['activity_id'] + 1;
        $sql = "INSERT INTO activity_log (activity_id, user_id, post_id, action_performed, activity_date) VALUES ($activity_id, $user_id, $post_id, '$action_performed', '$activity_date')";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    public function getActionLogByUserId($user_id){
        $sql = "SELECT * FROM activity_log WHERE user_id = $user_id";
        $db = new DB;
        $db = $db->query($sql);
        $db = $db->fetchAll(PDO::FETCH_ASSOC);
        return $db;
    }

    public function getActionLogByPostId($post_id){
        $sql = "SELECT * FROM activity_log WHERE post_id = $post_id";
        $db = new DB;
        $db = $db->query($sql);
        $db = $db->fetchAll(PDO::FETCH_ASSOC);
        return $db;
    }

    //changeStatusLogAction
    public function changeStatusLogAction($activity_id){
        $sql = "UPDATE activity_log SET status = 1 WHERE activity_id = $activity_id";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }



}