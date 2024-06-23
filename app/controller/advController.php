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
            $caption = $_POST['caption'];
            $views = $_POST['views'];
            $image = $_FILES['image']['name'];
            
            $create_at = date('Y-m-d H:i:s');
            $end_at = $_POST['end_at'];
            $end_at = date('Y-m-d H:i:s', strtotime($create_at . ' + ' . $end_at . ' days'));
            $target = 'resources\image\adv\\' . $image;
            move_uploaded_file($_FILES['image']['tmp_name'], $target);

            $trend = $_POST['trend'];
            $max_view = $_POST['max_view'];
            $user_id = $_SESSION['user_id'];
            $advModel->addAdv($user_id, $caption, $views, $image, $create_at, $end_at, $trend, $max_view);
            header('Location: ' . APPURL);
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
        header('Location: ' . APPURL . 'adv');
    }
}

