<?php
$currentUserName = $_SESSION['userName'] ;
if (isset($_SESSION['userAvatar'])){
    $currentUserAvatarLink = $_SESSION['userAvatar'];
} else {
    $currentUserAvatarLink = 'resources\image\demoPersonIcon.png';
}

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
            <a href="#" alt="Youcie"><img src="resources/image/logo.jpg" alt="Youcie" id="logo"></a>
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
            <li id="HomeMarker"><a href="#" id="Home" class="headerSection"><img id="HomeIcon" src="resources\image\homeIcon1.png"></a></li>
            <li id="FollowingMarker"><a href="#" id="Following" class="headerSection"><img id="FollowingIcon" src="resources\image\followingIcon1.png"></a></li>
            <li id="ReelsMarker"><a href="#" id="Reels" class="headerSection"><img id="ReelsIcon" src="resources\image\watchIcon1.png"></a></li>
        </ul>
        <!-- Nemu bên phải -->
        <div class="allNemuContainer">
            <ul>
                <li>
                    <a class="NemuOtherOptions" id="NemuOtherOptionsBtn" href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <img id="NemuOtherOptions" src="resources\image\nemuOptionIcon1.png"></img>
                    </a>
                </li>
                <li>
                    <a class="NemuOtherOptions" id="messageBtn" href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <img id="messageImg" src="resources\image\messageIcon1.png"></img>
                    </a>
                </li>
                <li>
                    <a class="NemuOtherOptions" id="NotificationBtn" href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <img id="NotificationImg" src="resources\image\notificationIcon1.png"></img>
                    </a>
                </li>
                <li>
                    <a class="NemuOtherOptions" id="CurrentUserBtn" href="#">
                    <?php echo '<img id="CurrentUserImg" src='. $currentUserAvatarLink. '></img>' ?>
                    </a>
                </li>
            </ul>
        </div>
    </header>
    <script lang="javascript" type="text/javascript" src="resources/js/header.js"></script>

