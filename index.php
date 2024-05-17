<?php 
    session_start();

    require_once 'app/controller/homeController.php';
    require_once 'app/controller/auth/loginController.php';
    require_once 'app/controller/auth/registerController.php';




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
        case 'register':
            require_once 'app/controller/auth/registerController.php';
            $register = new RegisterController();
            $register->register();
            break;
        default:
            echo "404 Not Found";
            break;
    }