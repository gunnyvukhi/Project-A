<?php
    
    
    ini_set('session.use_only_cookie' , TRUE);
    ini_set('session.use_strict_mode' , TRUE);
    
    session_set_cookie_params([
        'lifetime' => 1800,
        "domain" => "localhost",
        "path" => "/",
        "secure" => TRUE,
        "httpOnly" => TRUE
    ]);
    
    session_start();

    if (!isset($_SESSION['lastGenerated'])) {
        session_regenerate_id(TRUE);
        $_SESSION['lastGenerated'] = time();
    } else {
        $lastTime = 60 * 60 * 24;
        if (time() - $_SESSION['lastGenerated'] >= $lastTime) {
            session_regenerate_id(TRUE);
            $_SESSION['lastGenerated'] = time();
        }
    }

    require_once 'app/controller/homeController.php';
    require_once 'app/controller/auth/loginController.php';
    require_once 'app/controller/auth/registerController.php';
    require_once 'app/controller/auth/forgotPasswordController.php';



    $url = $_SERVER['REQUEST_URI'];

    $url = explode('/', $url);

    // echo var_dump($url);

    //default route (http://localhost/project-a/)

    //Kiem tra neu khong co session thi chuyen ve trang login
    if (!isset($_SESSION['userId'])) {
        require_once 'app/controller/auth/loginController.php';
        $login = new LoginController();
        $login->login();
        return;
    }

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

        case 'createPost':
            require_once 'app/controller/homeController.php';
            $home = new HomeController();
            $home->createPost();
            break;

        case 'forgetPasswordResult':
            require_once 'resources/view/forgetPasswordResult.html';
            break;
        case 'profile':
            require_once 'app/controller/profileController.php';
            $profile = new profileController();
            $profile->index();
            break; 
        case 'Profile_Decription':
            require_once 'resources/view/Profile_Decription.php';
            break; 

        case 'deletePost':
            require_once 'app/controller/homeController.php';
            $home = new HomeController();
            $home->deletePost();
            break;

        case 'revertPost':
            require_once 'app/controller/homeController.php';
            $home = new HomeController();
            $home->revertPost();
            break;
        case 'likePost':
            require_once 'app/controller/homeController.php';
            $home = new HomeController();
            $home->likePost();
            break;
        case 'commentPost':
            require_once 'app/controller/homeController.php';
            $home = new HomeController();
            $home->commentPost();
            break;
        default:
            echo "404 Not Found";
            break;
    }