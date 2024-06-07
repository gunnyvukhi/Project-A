<?php

require_once 'app/model/PostModel.php';


class ActionLogModel{

    //check action Like
    public function checkActionLike($user_id, $post_id){
        $sql = "SELECT * FROM action_log WHERE user_id = $user_id && post_id = $post_id && action_performed = 'like'";
        $db = new DB;
        $db = $db->query($sql);
        $db = $db->fetch(PDO::FETCH_ASSOC);
        return $db;
    }	

    

}