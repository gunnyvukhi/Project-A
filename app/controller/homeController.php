<?php

require_once 'app/model/PostModel.php';
require_once 'app/model/HiddenPostModel.php';

class HomeController {
    public function index() {
        $PostModel = new PostModel();
        $data = $PostModel->getAllPost();  
        
        //check is_deleted
        $data = array_filter($data, function($post){
            return $post['is_deleted'] == 0;
        });

        //check hidden post with post_id
        $HiddenPostModel = new HiddenPostModel();
        $hiddenPosts = $HiddenPostModel->getHiddenPosts($_SESSION['userId']);

        $data = array_filter($data, function($post) use ($hiddenPosts){
            foreach($hiddenPosts as $hiddenPost){
                if($post['post_id'] == $hiddenPost['post_id']){
                    return false;
                }
            }
            return true;
        });

        require_once 'resources\view\mainPage.php';
    }

    public function createPost() {
        if(isset($_POST['submit'])){
            //save file
            $dir = "resources/image/post/";
            $newPostFile = $_FILES['newPostFileInput'];
            move_uploaded_file($newPostFile['tmp_name'], $dir . $newPostFile['name']);
            
            $newPostCaption = $_POST['newPostCaption'];
            $newPostPrivacy = $_POST['newPostPrivacy'];
            $newPostImage = $dir . $newPostFile['name'];
            $newPostUserId = $_SESSION['userId'];
            $created_at = date('Y-m-d H:i:s');
            $updated_at = date('Y-m-d H:i:s');
            $is_deleted = 0;


            $newPost = new PostModel();
            $newPost->createPost($newPostUserId, $newPostCaption, $newPostImage, $newPostPrivacy, 0, $created_at, $updated_at, $is_deleted);
            header('Location: http://localhost/project-a/');


        }
    }


    public function deletePost() {
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deletePost'])){
            $postId = $_POST['postId'];
            $PostModel = new PostModel();
            $PostModel->deletePost($postId);
        }
    }

    public function likePost() {
        if(isset($_POST['likeButton'])){
            $postId = $_POST['postId'];
            $PostModel = new PostModel();
            $PostModel->likePost($postId);
        }
    }

    public function revertPost() {
        if(isset($_POST['revertPost'])){
            $postId = $_POST['postId'];
            $PostModel = new PostModel();
            $PostModel->revertPost($postId);
        }
    }

    public function commentPost() {
        if(isset($_POST['commentPost'])){
            $postId = $_POST['postId'];
            $userId = $_SESSION['userId'];
            $content = $_POST['commentContent'];
            $created_at = date('Y-m-d H:i:s');
            $updated_at = date('Y-m-d H:i:s');
            $PostModel = new PostModel();
            $PostModel->commentPost($postId, $userId, $content, $created_at, $updated_at);
        }
    }

    public function updatePost() {
        if(isset($_POST['updatePost'])){
            $postId = $_POST['postId'];
            $content = $_POST['newPostCaption'];
            $dir = "resources/image/post/";
            $newPostFile = $_FILES['newPostFileInput'];
            move_uploaded_file($newPostFile['tmp_name'], $dir . $newPostFile['name']);
            $image = $dir . $newPostFile['name'];
            $PostModel = new PostModel();
            $PostModel->updatePost($postId, $content, $image);
        }
    }

    public function updateCommentPost() {
        if(isset($_POST['updateComment'])){
            $commentId = $_POST['commentId'];
            $content = $_POST['newCommentContent'];
            $PostModel = new PostModel();
            $PostModel->updateCommentPost($commentId, $content);
        }
    }

    //hiddent post
    public function hiddenPost() {
        if(isset($_POST['hiddenPost'])){
            $postId = $_POST['postId'];
            $userId = $_SESSION['userId'];
            $HiddenPostModel = new HiddenPostModel();
            $HiddenPostModel->createHiddenPost($userId, $postId);
        }
    }

    //unhide post
    public function unhiddenPost() {
        if(isset($_POST['unhiddenPost'])){
            $postId = $_POST['postId'];
            $userId = $_SESSION['userId'];
            $HiddenPostModel = new HiddenPostModel();
            $HiddenPostModel->deleteHiddenPost($userId, $postId);
        }
    }
}