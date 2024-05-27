<?php

require_once 'config/db.php';



class PostModel{

    public function createPost($user_id, $content, $image, $privacy_level){
        $sql = "INSERT INTO posts (user_id, content, image, privacy_level) VALUES ('$user_id', '$content', '$image', '$privacy_level')";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    public function getAllPost(){
        $sql = "SELECT * FROM posts";
        $db = new DB;
        $db = $db->query($sql);
        // chage to json
        $db = $db->fetchAll(PDO::FETCH_ASSOC);
        $db = json_encode($db);
        return $db;
    }
}