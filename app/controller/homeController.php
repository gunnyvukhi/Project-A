<?php


require_once 'config/db.php';
require_once 'app/model/PostModel.php';

class HomeController {
    public function index() {
        $PostModel = new PostModel();
        $data = $PostModel->getAllPost();     
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


            $newPost = new PostModel();
            $newPost->createPost($newPostUserId, $newPostCaption, $newPostImage, $newPostPrivacy);
            header('Location: http://localhost/project-a/');


        }
    }
}