<?php

require_once 'app/model/UserModel.php';
require_once 'app/model/PostModel.php';
require_once 'app/controller/Controller.php';
require_once 'app/model/UserDetailModel.php';

class searchController{
    public function search(){
        if(!isset($_GET['searchBoxInput'])){
            header('Location: ' . APPURL);
        }

        $UserModel = new UserModel();
        $users = $UserModel->searchUser($_GET['searchBoxInput']);

        $friends = Controller::DataFriend();
        $following = Controller::DataFollow();

        //xoa minh ra khoi danh sach tim kiem
        foreach($users as $key => $user){
            if($user['user_id'] == $_SESSION['userId']){
                unset($users[$key]);
            }
        }

        //sap xep lai user theo user la ban be hoac dang theo doi
        usort($users, function($a, $b) use ($friends, $following){
            if(in_array($a['user_id'], $friends) && !in_array($b['user_id'], $friends)){
                return -1;
            }else if(!in_array($a['user_id'], $friends) && in_array($b['user_id'], $friends)){
                return 1;
            }else if(in_array($a['user_id'], $following) && !in_array($b['user_id'], $following)){
                return -1;
            }else if(!in_array($a['user_id'], $following) && in_array($b['user_id'], $following)){
                return 1;
            }else{
                return 0;
            }
        });

        



        $PostModel = new PostModel();
        $posts = $PostModel->searchPost($_GET['searchBoxInput']);

        //sap xep lai post theo post nhieu like nhat
        usort($posts, function($a, $b){
            return $b['count_like'] - $a['count_like'];
        });

        // echo '<pre>';
        // var_dump($users);
        // echo '</pre>';

        //get user detail with users by user_id
        $userDetailModel = new UserDetailModel();
        $userDetail = [];
        foreach($users as $user){
            $userDetail[] = $userDetailModel->getUserDetail($user['user_id']);
        }

        //merge user and user detail    
        for($i = 0; $i < count($users); $i++){
            $users[$i] = array_merge($users[$i], $userDetail[$i]);
        }
        // echo '<pre>';
        // var_dump($users);
        // echo '</pre>';



        require_once 'resources\view\search.php';
    }
}