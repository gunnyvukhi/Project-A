<?php

require_once 'app/model/PostModel.php';
require_once 'app/model/HiddenPostModel.php';
require_once 'app/model/ActionLogModel.php';
require_once 'app/controller/Controller.php';

class HomeController {
    public function index() {
        
        $data = Controller::Data();

        $friends = Controller::DataFriend();

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
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $created_at = date('Y-m-d H:i:s');
            $updated_at = date('Y-m-d H:i:s');
            $is_deleted = 0;


            $newPost = new PostModel();
            $newPost->createPost($newPostUserId, $newPostCaption, $newPostImage, $newPostPrivacy, 0, $created_at, $updated_at, $is_deleted);
            header('Location: ' . APPURL);


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
        if(isset($_POST['postId'])){
            $postId = $_POST['postId'];
            $userId = $_SESSION['userId'];
            $PostModel = new PostModel();
            if (!$PostModel->hasUserLikedPost($userId, $postId)) {
                //like post in post_likes table
                $PostModel->hasLike($userId, $postId);
                $PostModel->likePost($postId);
                //add notification to action_log table
                $ActionLogModel = new ActionLogModel();
                $ActionLogModel->logAction($userId, $postId, 'like', date('Y-m-d H:i:s'));
            }
        }
    }

    public function unlikePost() {
        if(isset($_POST['postId'])){
            $postId = $_POST['postId'];
            $PostModel = new PostModel();
            $PostModel->unlikePost($postId);

            //unlike post in post_likes table
            $userId = $_SESSION['userId'];
            $PostModel->hasUnlike($userId, $postId);

            //delete notification in action_log table
            $ActionLogModel = new ActionLogModel();
            $ActionLogModel->logAction($userId, $postId, 'unlike', date('Y-m-d H:i:s'));
            
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
        if(isset($_POST['comment'])){
            $postId = $_POST['postId'];
            $userId = $_SESSION['userId'];
            $content = $_POST['comment'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $created_at = date('Y-m-d H:i:s');
            $updated_at = date('Y-m-d H:i:s');
            $PostModel = new PostModel();
            $PostModel->commentPost($postId, $userId, $content, $created_at, $updated_at);

            //add notification to action_log table
            $ActionLogModel = new ActionLogModel();
            $ActionLogModel->logAction($userId, $postId, 'comment', date('Y-m-d H:i:s'));
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

    //change status logaction
    public function changeStatusLogAction() {
        if(isset($_POST['changeStatusLogAction'])){
            $actionLogId = $_POST['actionLogId'];
            $ActionLogModel = new ActionLogModel();
            $ActionLogModel->changeStatusLogAction($actionLogId);
        }
    }
}