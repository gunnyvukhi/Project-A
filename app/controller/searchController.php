<?php

require_once 'app/model/UserModel.php';
require_once 'app/model/PostModel.php';

class searchController{
    public function search(){
        if(!isset($_GET['searchBoxInput'])){
            header('Location: ' . APPURL);
        }

        $UserModel = new UserModel();
        $users = $UserModel->searchUser($_GET['searchBoxInput']);

        $PostModel = new PostModel();
        $posts = $PostModel->searchPost($_GET['searchBoxInput']);

        require_once 'resources\view\search.php';
    }
}