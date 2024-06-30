<?php

require_once 'config/db.php';
require_once 'app/model/UserModel.php';



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
        $sql = "UPDATE posts SET count_like = count_like + 1 WHERE post_id = $postId";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    //unlike post
    public function unlikePost($postId){
        $sql = "UPDATE posts SET count_like = count_like - 1 WHERE post_id = $postId && count_like > 0";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    public function getPostById($postId){
        $sql = "SELECT * FROM posts WHERE post_id = $postId";
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

    public function commentPost($postId, $userId, $content, $creat_at, $updated_at){
        $sql = "INSERT INTO comments (post_id, user_id, comment_content, create_at, update_at) VALUES ($postId, $userId, '$content', '$creat_at', '$updated_at')";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    public function updateCommentPost($commentId, $content){
        $sql = "UPDATE comments SET comment_content = '$content' WHERE comment_id = $commentId";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    //show comment with post id
    public function getCommentByPostId($postId){
        $sql = "SELECT * FROM comments WHERE post_id = $postId";
        $db = new DB;
        $db = $db->query($sql);
        $db = $db->fetchAll(PDO::FETCH_ASSOC);

        //add user name and avatar to comment
        $userModel = new UserModel();
        foreach ($db as $key => $value) {
            $user = $userModel->getUserById($value['user_id']);
            $db[$key]['user_name'] = $user['user_name'];
            $db[$key]['avatar'] = $user['avatar'];
        }

        //sort comment by create time
        usort($db, function($a, $b){
            return $a['create_at'] <=> $b['create_at'];
        });

        return $db;
    }

    //hasUserLikedPost
    public function hasUserLikedPost($userId, $postId){
        $sql = "SELECT * FROM post_likes WHERE user_id = $userId AND post_id = $postId";
        $db = new DB;
        $db = $db->query($sql);
        $db = $db->fetch(PDO::FETCH_ASSOC);
        if ($db) {
            return true;
        } else {
            return false;
        }
    }

    //check if user has liked post in post_likes table
    public function hasLike($userId, $postId){
        $sql = "INSERT INTO post_likes (user_id, post_id) VALUES ($userId, $postId)";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    public function hasUnlike($userId, $postId){
        $sql = "DELETE FROM post_likes WHERE user_id = $userId AND post_id = $postId";
        $db = new DB;
        $db = $db->query($sql);
        return $db;
    }

    //get all post by user id
    public function getPostByUserId($userId){
        $sql = "SELECT * FROM posts WHERE user_id = $userId";
        $db = new DB;
        $db = $db->query($sql);
        $db = $db->fetchAll(PDO::FETCH_ASSOC);
        return $db;
    }

    //search post by content
    public function searchPost($content){
        $sql = "SELECT post_id FROM posts WHERE content LIKE '%$content%'";
        $db = new DB;
        $db = $db->query($sql);
        $db = $db->fetchAll(PDO::FETCH_ASSOC);
        return $db;
    }





}