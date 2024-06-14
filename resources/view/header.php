<?php
include_once "app\model\UserModel.php";
require_once 'app\controller\Controller.php';
include_once 'app\model\MainPageModel.php';
$currentUserName = $_SESSION['userName'];
if (isset($_SESSION['userAvatar'])) {
    $currentUserAvatarLink = 'resources\image\userAvater\\' . $_SESSION['userAvatar'];
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
            <a href="http://localhost/project-A/" title="Youcie"><img src="resources/image/logo.jpg" alt="Youcie"
                    id="logo"></a>
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
            <li id="HomeMarker"><a href="http://localhost/project-a/" id="Home" class="headerSection" title="Home"><img
                        id="HomeIcon" src="resources\image\homeIcon1.png"></a></li>
            <li id="FollowingMarker"><a href="http://localhost/project-a/following" id="Following" class="headerSection"
                    title="For You"><img id="FollowingIcon" src="resources\image\followingIcon1.png"></a></li>
            <li id="WatchMarker"><a href="http://localhost/project-a/watch" id="Watch" class="headerSection"
                    title="Watch"><img id="WatchIcon" src="resources\image\watchIcon1.png"></a></li>
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
                    '<a class="NemuOtherOptions" id="CurrentUserBtn" href="#" title="' . $currentUserName . '">
                    <img id="CurrentUserImg" src=' . $currentUserAvatarLink . '></img>' ?>
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
                echo '<img id="currentUserAvatarLink" src=' . $currentUserAvatarLink . ' alt="">
                <p id="currentUserName">' . $currentUserName . '</p>'
                    ?>
            </div>
            <a href="http://localhost/project-a/profile" class="profileLink">Xem trang cá nhân của bạn</a>
        </div>
        <!-- Form đăng xuất -->
        <form action="logout" method="post">
            <button type="button" name="helpbtn"><img src="resources\image\helpIcon.png">Trợ giúp và hỗ trợ</button><br>
            <button type="button" name="resetPassword"><img src="resources\image\resetPasswordIcon.png">Đặt lại mật
                khẩu</button><br>
            <button type="button" name="setting"><img src="resources\image\settingIcon.png">Cài đặt</button><br>
            <button type="submit" name="logout"><img src="resources\image\logoutIcon.png">Đăng xuất</button>
        </form>
    </div>

    <!-- Bảng thông báo -->
    <div class="newNotificationContainer" id="newNotificationContainer">
        <h3>Thông báo</h3>
        <ul>
            <?php
            // lấy dữ liệu thông báo
            $notificationRawData = array_fill(0, count($data), array_fill(0, 4, array()));
            foreach ($data as $postData) {
                if (!isset($postData["actionLogs"])) {
                    continue;
                }
                if ($postData["user_id"] != $_SESSION['userId']) {
                    continue;
                };
                foreach ($postData["actionLogs"] as $notiData) {
                    $postNotiId = $notiData["post_id"];
                    if ($notiData["action_performed"] == "like") {
                        $type = 1; // like là 1
                    } else if ($notiData["action_performed"] == "unlike") {
                        $type = 2; // unlike là 2
                    } else if ($notiData["action_performed"] == "comment") {
                        $type = 3; // comment là 3
                    } else {
                        $type = 0;
                    }
                    ;
                    array_push($notificationRawData[$postNotiId][$type], $notiData);
                }
                ;
            }
            ;
            // Xử lí Like và Unlike
            $PUM = new UserModel();
            for($i=0; $i<count($notificationRawData); $i++) {
                $ThisPostNoti = $notificationRawData[$i];
                if (!isset($ThisPostNoti)) {
                    continue;
                }
                $like = count($ThisPostNoti[1]) - count($ThisPostNoti[2]);
                if ($like > 0) {
                    $ActionUser1 = $PUM->getUserById($ThisPostNoti[1][0]["user_id"]);
                    $firstLikeName = $ActionUser1["last_name"];
                    $firstLikeUserAvatarLink = 'resources\image\userAvater\\' . $ActionUser1["avatar"];
                    $timeNoti = Get_Time(strval($ThisPostNoti[1][0]["activity_date"]));

                    $Noi_dung = '';
                    if ($like == 1) {
                        $Noi_dung = '<b>' . $firstLikeName . '</b> đã thích bài viết của bạn';
                    } else if ($like == 2) {
                        $ActionUser2 = $PUM->getUserById($ThisPostNoti[1][1]["user_id"]);
                        $secondLikeName = $ActionUser2["last_name"];
                        $Noi_dung = '<b>' . $firstLikeName . '</b> và <b>' . $secondLikeName . '</b> đã thích bài viết của bạn';
                    } else if ($like > 2) {
                        $ActionUser2 = $PUM->getUserById($ThisPostNoti[1][1]["user_id"]);
                        $secondLikeName = $ActionUser2["last_name"];
                        $NumTemp = $like - 2;
                        $Noi_dung = '<b>' . $firstLikeName . '</b>, <b>' . $secondLikeName . '</b> và ' . $NumTemp . ' người khác đã thích bài viết của bạn';
                    }
                    echo '<li><a href="#" class="NotificationLink">
                            <img class="NotificationAvaPic" src=' . $firstLikeUserAvatarLink . ' alt=' . $firstLikeName . ' />
                            <div class="NotificationContentContainer">
                                <p class="NotificationContent">' . $Noi_dung . '</p>
                                <p class="NotificationTime">' . $timeNoti . '</p>
                            </div>
                            </a>
                            </li>';
                }

                $comments = count($ThisPostNoti[3]);
                if ($comments > 0) {
                    $test = 1;
                }
            }
            ?>
        </ul>
    </div>
    <script lang="javascript" type="text/javascript" src="resources/js/header.js"></script>