<?php


require_once 'config/db.php';
require_once 'app/model/PostModel.php';

class HomeController {
    public function index() {
        $PostModel = new PostModel();
        $data = $PostModel->getAllPost();  
        
        //check is_deleted
        $data = array_filter($data, function($post){
            return $post['is_deleted'] == 0;
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
            header('Location: http://localhost/project-a/');
        }
    }

    public function revertPost() {
        if(isset($_POST['revertPost'])){
            $postId = $_POST['postId'];
            $PostModel = new PostModel();
            $PostModel->revertPost($postId);
        }
    }
}