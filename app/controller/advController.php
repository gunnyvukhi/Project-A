<?php


require_once "app/model/AdvModel.php";



class advController{
    public function index(){
        $advModel = new AdvModel();
        $advs = $advModel->getAdv();
        require_once 'resources\view\adv.php';
    }

    public function add(){
        $advModel = new AdvModel();
        if(isset($_POST['submit'])){

            $_SESSION['cost'] = $_POST['cost'];
            $_SESSION['data'] = $_POST;

            $image = $_FILES['image']['name'];
            $target = 'resources\image\adv\\' . $image;
            move_uploaded_file($_FILES['image']['tmp_name'], $target);

            $_SESSION['image'] = $image;

            require 'app/controller/vnpay_create_payment.php'; 


            
        }
    }

    // view +1
    public function viewPlus(){
        $advModel = new AdvModel();
        $advModel->viewPlus($_GET['id']);
    }

    public function delete(){
        $advModel = new AdvModel();
        $advModel->deleteAdv($_GET['id']);
    }

    public function payment(){

        if(isset($_GET['vnp_ResponseCode'])){
            $vnp_ResponseCode = $_GET['vnp_ResponseCode'];
            if($vnp_ResponseCode == '00'){
                $advModel = new AdvModel();
                $data = $_SESSION['data'];
                $caption = $data['caption'];
                $views = 0;
                $URL = $data['adLinkToBoxInput'];
                $create_at = date('Y-m-d H:i:s');
                $end_at = $data['end_at'];
                $end_at = date('Y-m-d H:i:s', strtotime($create_at . ' + ' . $end_at . ' days'));
                $trend = $data['trend'];
                $max_view = $data['max_view'];
                $user_id = $_SESSION['userId'];
                $image = $_SESSION['image'];
                $advModel->addAdv($user_id, $caption, $URL, $views, $image, $create_at, $end_at, $trend, $max_view);
                
            }
        }
        unset($_SESSION['data']);
        unset($_SESSION['image']);
        unset($_SESSION['cost']);
        header('Location: ' . APPURL);
        
    }
}

