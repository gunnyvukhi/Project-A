<?php

require_once 'app/controller/Controller.php';

$currentUserName = $_SESSION['userName'] ;
if (isset($_SESSION['userAvatar'])){
    $currentUserAvatarLink = $_SESSION['userAvatar'];
} else {
    $currentUserAvatarLink = 'resources\image\demoPersonIcon.png';
}

$data = Controller::Data();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/header.css" type="text/css">
</head>
<body>
    <header>
        <!-- Logo bên trái -->
        <div class="logoContainer">
            <a href="http://localhost/project-A/" title="Youcie"><img src="resources/image/logo.jpg" alt="Youcie" id="logo"></a>
        </div>

        <!-- Thanh tìm kiếm -->
        <div class="searchContainer">
        <div class="searchBox" id="searchBox">
            <form name="search">
                <input type="text" name="searchBoxInput" class="searchBoxInput" id="searchBoxInput">
            </form>
            <img id="searchImage" src="resources\image\searchIcon.png">
        </div>
        </div>
        <!-- Nemu ở giữa -->
        <ul class="sectionContainer">
            <li id="HomeMarker"><a href="http://localhost/project-a/" id="Home" class="headerSection" title="Home"><img id="HomeIcon" src="resources\image\homeIcon1.png"></a></li>
            <li id="FollowingMarker"><a href="http://localhost/project-a/following" id="Following" class="headerSection" title="For You"><img id="FollowingIcon" src="resources\image\followingIcon1.png"></a></li>
            <li id="ReelsMarker"><a href="#" id="Reels" class="headerSection" title="Watch"><img id="ReelsIcon" src="resources\image\watchIcon1.png"></a></li>
        </ul>
        <!-- Nemu bên phải -->
        <div class="allNemuContainer">
            <ul>
                <li>
                    <a class="NemuOtherOptions" id="NemuOtherOptionsBtn" href="#" title="Nemu">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <img id="NemuOtherOptions" src="resources\image\nemuOptionIcon1.png"></img>
                    </a>
                </li>
                <li>
                    <a class="NemuOtherOptions" id="messageBtn" href="#" title="Tin nhắn">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <img id="messageImg" src="resources\image\messageIcon1.png"></img>
                    </a>
                </li>
                <li>
                    <a class="NemuOtherOptions" id="NotificationBtn" href="#" title="Thông báo">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <img id="NotificationImg" src="resources\image\notificationIcon1.png"></img>
                    </a>
                </li>
                <li><?php echo 
                    '<a class="NemuOtherOptions" id="CurrentUserBtn" href="#" title="'. $currentUserName .'">
                    <img id="CurrentUserImg" src='. $currentUserAvatarLink. '></img>' ?>
                    </a>
                </li>
            </ul>
        </div>
    </header>

    <!-- NEMU đăng xuất -->
    <div class="logoutNemuContainer" id="logoutNemuContainer">
        <div class="YourProfile">
            <!-- trang trí -->
            <div class="yourProfileAvaName">
                <?php
                echo '<img id="currentUserAvatarLink" src='.$currentUserAvatarLink.' alt="">
                <p id="currentUserName">'.$currentUserName.'</p>'
                ?>
            </div>
            <a href="http://localhost/project-a/profile" class="profileLink">Xem trang cá nhân của bạn</a>
        </div>
        <!-- Form đăng xuất -->
        <form action="logout" method="post">
            <button type="button" name="helpbtn"><img src="resources\image\helpIcon.png">Trợ giúp và hỗ trợ</button><br>
            <button type="button" name="resetPassword"><img src="resources\image\resetPasswordIcon.png">Đặt lại mật khẩu</button><br>
            <button type="button" name="setting"><img src="resources\image\settingIcon.png">Cài đặt</button><br>
            <button type="submit" name="logout"><img src="resources\image\logoutIcon.png">Đăng xuất</button>
        </form>
    </div>

    <!-- Bảng thông báo -->
    <div class="newNotificationContainer" id="newNotificationContainer">
        <h3>Thông báo</h3>
        <ul>
            <?php
                echo '<li><a href="#" class="NotificationLink">
                <img class="NotificationAvaPic" src=' . $currentUserAvatarLink . ' alt=' . $currentUserName . ' />
                <div class="NotificationContentContainer">
                    <p class="NotificationContent"><b>' . $currentUserName . '</b> đã thêm một ảnh mới vào Album của họ</p>
                    <p class="NotificationTime">vừa xong</p>
                </div>
                </a>
                </li>';
            ?>
        </ul>
    </div>
    <script lang="javascript" type="text/javascript" src="resources/js/header.js"></script>

