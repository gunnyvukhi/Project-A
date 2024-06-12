<?php


require_once 'app/model/PostModel.php';
require_once 'app/model/HiddenPostModel.php';
require_once 'app/model/ActionLogModel.php';
require_once 'app/model/EventModel.php';


class Controller{
    public static function Data(){
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
        
        //add comment to post with post_id
        $data = array_map(function($post){
            $PostModel = new PostModel();
            $comments = $PostModel->getCommentByPostId($post['post_id']);
            $post['comments'] = $comments;
            return $post;
        }, $data);

        //check user has liked post
        $data = array_map(function($post){
            $PostModel = new PostModel();
            $post['hasLiked'] = $PostModel->hasUserLikedPost($_SESSION['userId'], $post['post_id']);
            return $post;
        }, $data);


        //get all action log by post_id
        $ActionLogModel = new ActionLogModel();
        $data = array_map(function($post){
            $ActionLogModel = new ActionLogModel();
            $actionLogs = $ActionLogModel->getActionLogByPostId($post['post_id']);
            $post['actionLogs'] = $actionLogs;
            return $post;
        }, $data);

        //get all events with now date
        $EventModel = new EventModel();
        $events = $EventModel->getEventsByDate(date('Y-m-d'));

        $data['event'] = $events;


        //get all events before 2 days
        $eventsBeforeDate = $EventModel->getEventsBeforeDate(date('Y-m-d', strtotime('-2 days')));
        $data['eventbefore'] = $eventsBeforeDate;


        return $data;
    }
}