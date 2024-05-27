<?php 
    session_start();

    require_once 'app/controller/homeController.php';
    require_once 'app/controller/auth/loginController.php';
    require_once 'app/controller/auth/registerController.php';
    require_once 'app/controller/auth/forgotPasswordController.php';




    $url = $_SERVER['REQUEST_URI'];

    $url = explode('/', $url);

    // echo var_dump($url);

    //default route (http://localhost/project-a/)

    switch ($url[2]) {
        case '':
            require_once 'app/controller/homeController.php';
            $home = new HomeController();
            $home->index();
            break;
        case 'login':
            require_once 'app/controller/auth/loginController.php';
            $login = new LoginController();
            $login->login();
            break;
        case 'signIn':
            require_once 'app/controller/auth/registerController.php';
            $register = new RegisterController();
            $register->register();
            break;
        case 'forgotPassword':
            require_once 'app/controller/auth/forgotPasswordController.php';
            $forgotPassword = new ForgotPasswordController();
            $forgotPassword->forgotPassword();
            break;
        case 'mainPage':
            require_once 'resources\view\mainPage.php';
            break;

        case 'forgetPasswordResult':
            require_once 'resources/view/forgetPasswordResult.html';
            break;
        case 'Profile':
            require_once 'resources/view/Profile.php';
            break; 
        default:
            echo "404 Not Found";
            break;
    }