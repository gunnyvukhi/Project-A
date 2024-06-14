<?php


ini_set('session.use_only_cookie', TRUE);
ini_set('session.use_strict_mode', TRUE);

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
define('APPURL', 'http://localhost/project-a/');

require_once 'app/controller/homeController.php';
require_once 'app/controller/auth/loginController.php';
require_once 'app/controller/auth/registerController.php';
require_once 'app/controller/auth/forgotPasswordController.php';
require_once 'app/controller/profileController.php';
require_once 'app/controller/auth/logoutController.php';



$url = $_SERVER['REQUEST_URI'];

$url = explode('/', $url);

//Kiem tra neu khong co session thi chuyen ve trang login
if ($url[2] != 'login' && $url[2] != 'signIn' && $url[2] != 'forgotPassword' && $url[2] != 'forgetPasswordResult' && $url[2] != 'logout') {
    if (!isset($_SESSION['userId'])) {
        header('Location: ' . APPURL . 'login');
    }
}

$home = new HomeController();


switch ($url[2]) {
    case '':
        $home->index();
        break;
    case 'login':
        $login = new LoginController();
        $login->login();
        break;
    case 'signIn':
        $register = new RegisterController();
        $register->register();
        break;
    case 'forgotPassword':
        $forgotPassword = new ForgotPasswordController();
        $forgotPassword->forgotPassword();
        break;
    case 'mainPage':
        require_once 'resources\view\mainPage.php';
        break;

    case 'createPost':
        $home->createPost();
        break;

    case 'forgetPasswordResult':
        require_once 'resources/view/forgetPasswordResult.html';
        break;
    case 'profile':
        $profile = new profileController();
        $profile->index();
        break;
    case 'Profiles_Decription':
        require_once 'resources/view/Profile_Decription.php';
        break;

    case 'deletePost':
        $home->deletePost();
        break;

    case 'revertPost':
        $home->revertPost();
        break;
    case 'likePost':
        $home->likePost();
        break;
    case 'unlikePost':
        $home->unlikePost();
        break;
    case 'commentPost':
        $home->commentPost();
        break;
    case 'hiddenPost':
        $home->hiddenPost();
        break;
    case 'unHiddenPost':
        $home->unHiddenPost();
        break;
    case 'logout':
        $logout = new logoutController();
        $logout->logout();
        break;
    case 'following':
        require_once 'resources\view\following.php';
        break;
    default:
        echo "404 Not Found";
        break;
}
