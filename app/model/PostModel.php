<?php

require_once 'config/db.php';



class PostModel{

    public function createPost($user_id, $content, $image, $privacy_level, $count_like, $creat_at, $updated_at, $is_deleted){
        $sql = "INSERT INTO posts (user_id, content, image, privacy_level, count_like, create_at, update_at, is_deleted) VALUES ('$user_id', '$content', '$image', '$privacy_level', '$count_like', '$creat_at', '$updated_at', '$is_deleted')";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    public function getAllPost(){
        $sql = "SELECT * FROM posts";
        $db = new DB;
        $db = $db->query($sql);
        $db = $db->fetchAll(PDO::FETCH_ASSOC);
        return $db;
    }

    public function deletePost($postId){
        $sql = "UPDATE posts SET is_deleted = 1 WHERE post_id = $postId";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    public function likePost($postId){
        $sql = "UPDATE posts SET count_like = count_like + 1 WHERE id = $postId";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    public function getPostById($postId){
        $sql = "SELECT * FROM posts WHERE id = $postId";
        $db = new DB;
        $db = $db->query($sql);
        $db = $db->fetch(PDO::FETCH_ASSOC);
        return $db;
    }


    public function revertPost($postId){
        $sql = "UPDATE posts SET is_deleted = 0 WHERE post_id = $postId";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    public function updatePost($postId, $content, $image){
        $sql = "UPDATE posts SET content = '$content', image = '$image' WHERE id = $postId";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }
}