<?php 


require_once 'config/db.php';  


class HiddenPostModel {
    public function createHiddenPost($user_id, $post_id){
        $sql = "INSERT INTO hidden_posts (user_id, post_id) VALUES ('$user_id', '$post_id')";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    public function deleteHiddenPost($user_id, $post_id){
        $sql = "DELETE FROM hidden_posts WHERE user_id = $user_id AND post_id = $post_id";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    public function getHiddenPost($user_id, $post_id){
        $sql = "SELECT * FROM hidden_posts WHERE user_id = $user_id AND post_id = $post_id";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    public function getHiddenPosts($user_id){
        $sql = "SELECT * FROM hidden_posts WHERE user_id = $user_id";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }
}