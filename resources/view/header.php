<?php
require_once "app\model\UserModel.php";
require_once 'app\controller\Controller.php';
require_once 'app\model\MainPageModel.php';

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
    <link rel="stylesheet" href="resources/css/advertise.css" type="text/css">
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
                    <a class="NemuOtherOptions" id="menuBtn" href="#" title="Nemu">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <img id="menuImg" src="resources\image\nemuOptionIcon1.png"></img>
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

    <!-- NEMU Tất cả các tính năng -->
     <div class="MenuContainer" id="MenuContainer">
        <p class="menuTitle">Menu</p>
        <div class="menuOptionsContainer">
            <form method="post" action="" class="SeachMenuForm">
                <img src="resources\image\searchVideoIcon.png">
                <input type="text" name="SeachMenu" id="SeachMenu" placeholder="Tìm kiếm trong Menu">
            </form>
            <div class="menuSections" id="CommunityMenuContainer">
                <p>Xã hội</p>
                <ul>
                    <li>
                        <a href="#" class="MenuOptionsLink">
                            <img class="MenuOptionsPic" src='resources\image\eventIcon.png'/>
                            <div class="MenuOptionsContentContainer">
                                <p class="Options">Sự kiện</p>
                                <p class="OptionsContent">Tổ chức hoặc tìm sự kiện cùng những hoạt động khác trên mạng và ở quanh đây</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="MenuOptionsLink">
                            <img class="MenuOptionsPic" src='resources\image\friendsIcon.png'/>
                            <div class="MenuOptionsContentContainer">
                                <p class="Options">Bạn bè</p>
                                <p class="OptionsContent">Tìm kiếm bạn bè hoặc những người bạn có thể biết</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="MenuOptionsLink">
                            <img class="MenuOptionsPic" src='resources\image\groupIcon.png'/>
                            <div class="MenuOptionsContentContainer">
                                <p class="Options">Nhóm</p>
                                <p class="OptionsContent">Kết nối với những người cùng chung sở thích</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="MenuOptionsLink">
                            <img class="MenuOptionsPic" src='resources\image\FollowingNemuIcon.png'/>
                            <div class="MenuOptionsContentContainer">
                                <p class="Options">Bảng tin</p>
                                <p class="OptionsContent">Xem bài viết phù hợp của những người và Trang bạn theo dõi</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/project-a/" class="MenuOptionsLink">
                            <img class="MenuOptionsPic" src='resources\image\feedIcon.png'/>
                            <div class="MenuOptionsContentContainer">
                                <p class="Options">Bảng feed</p>
                                <p class="OptionsContent">Xem bài viết gần đây nhất từ bạn bè, nhóm, Trang và hơn thế nữa</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/project-a/" class="MenuOptionsLink">
                            <img class="MenuOptionsPic" src='resources\image\menuPageIcon.png'/>
                            <div class="MenuOptionsContentContainer">
                                <p class="Options">Trang</p>
                                <p class="OptionsContent">Khám phá và kết nối với các doanh nghiệp trên toàn thế giới</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="menuSections" id="CommunityMenuContainer">
                    <p>Giải trí</p>
                    <ul>
                        <li>
                            <a href="#" class="MenuOptionsLink">
                                <img class="MenuOptionsPic" src='resources\image\livestreamIcon.png'/>
                                <div class="MenuOptionsContentContainer">
                                    <p class="Options">Live streams</p>
                                    <p class="OptionsContent">Xem, kết nối với những game và người phát trực tiếp mà bạn yêu thích</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="MenuOptionsLink">
                                <img class="MenuOptionsPic" src='resources\image\playGameIcon.png'/>
                                <div class="MenuOptionsContentContainer">
                                    <p class="Options">Chơi game</p>
                                    <p class="OptionsContent">Chơi game bạn yêu thích</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="MenuOptionsLink">
                                <img class="MenuOptionsPic" src='resources\image\videoNemuIcon.png'/>
                                <div class="MenuOptionsContentContainer">
                                    <p class="Options">Xem Video</p>
                                    <p class="OptionsContent">Đích đến của video phù hợp với sở thích và quan hệ kết nối của bạn</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="createNewContainer">
            <p>Tạo</p>
            <ul>
                <li><a href="#" class="MenuCreateLink"><img src="resources\image\uploadPostIcon.png" class="MenuCreatePic"><div class="textContainer">Bài viết</div></a></li>
                <li><a href="#" class="MenuCreateLink"><img src="resources\image\newsIcon.png" class="MenuCreatePic"><div class="textContainer">Tin</div></a></li>
                <li><a href="#" class="MenuCreateLink"><img src="resources\image\watchReelsIcon1.png" class="MenuCreatePic"><div class="textContainer">Thước phim</div></a></li>
                <li><a href="#" class="MenuCreateLink"><img src="resources\image\createEventIcon.png" class="MenuCreatePic"><div class="textContainer">Sự kiện</div></a></li>
                <hr>
                <li><a href="#" class="MenuCreateLink"><img src="resources\image\createPageIcon.png" class="MenuCreatePic"><div class="textContainer">Trang</div></a></li>
                <li><a href="#" class="MenuCreateLink" onclick="openAdvertiseNemu()"><img src="resources\image\createAdIcon1.png" class="MenuCreatePic"><div class="textContainer">Quảng cáo</div></a></li>
                <li><a href="#" class="MenuCreateLink"><img src="resources\image\createGroupIcon.png" class="MenuCreatePic"><div class="textContainer">Nhóm</div></a></li>
                <li><a href="#" class="MenuCreateLink"><img src="resources\image\createReminderIcon.png" class="MenuCreatePic"><div class="textContainer">Lời nhắc</div></a></li>
            </ul>
        </div>
     </div>

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
                if (!isset($postData["user_id"]) || $postData["user_id"] != $_SESSION['userId']) {
                    continue;;
                };
                $postNotiId = $postData["post_id"];
                if (isset($postData["actionLogs"])) {
                    foreach ($postData["actionLogs"] as $notiData) {
                        if ($notiData["action_performed"] == "like") {
                            $type = 1; // like là 1
                        } else if ($notiData["action_performed"] == "unlike") {
                            $type = 2; // unlike là 2
                        } else {
                            $type = 0;
                        }
                        ;
                        array_push($notificationRawData[$postNotiId][$type], $notiData);
                    }
                }
                
                foreach ($postData["comments"] as $commentNotification) {
                    array_push($notificationRawData[$postNotiId][3], $commentNotification);
                }
                ;
            }
            ;
            $finalNotification = array(); // lưu tất cả thống báo sau khi xử lí tại đây
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
            
                    $temp = '<li><a href="#" class="NotificationLink">
                            <img class="NotificationAvaPic" src=' . $firstLikeUserAvatarLink . ' alt=' . $firstLikeName . ' />
                            <div class="NotificationContentContainer">
                                <p class="NotificationContent">' . $Noi_dung . '</p>
                                <p class="NotificationTime">' . $timeNoti . '</p>
                            </div>
                            </a>
                            </li>';
                    array_push($finalNotification, [$temp, $ThisPostNoti[1][0]["activity_date"]]);
                }
                
                $comments = count($ThisPostNoti[3]);
                if ($comments > 0) {
                    foreach ($ThisPostNoti[3] as $comment_) {;
                        if ($comment_['user_name'] == $_SESSION['userName']){continue;}
                        $timeNoti = Get_Time(strval($comment_['update_at']));
                        $temp = '<li><a href="#" class="NotificationLink">
                        <img class="NotificationAvaPic" src="resources\image\userAvater\\' . $comment_['avatar'] . '" alt=' .  $comment_['user_name'] . ' />
                        <div class="NotificationContentContainer">
                            <p class="NotificationContent"><b>' . $comment_['user_name'] . '</b> đã bình luận về một bài viết của bạn</p>
                            <p class="NotificationTime">' . $timeNoti . '</p>
                        </div>
                        </a>
                        </li>';
                        array_push($finalNotification, [$temp, $comment_['update_at']]);
                    }
                }
            }

            // sắp xếp lại thông báo
            function custom_sort($a, $b) {
                $x = (int) strtotime($a[1]);
                $y = (int) strtotime($b[1]);
                return $x <= $y; // Replace this with your comparison logic
            }
            usort($finalNotification, "custom_sort");

            // in ra thông báo
            foreach ($finalNotification as $PrintedNotification){
                echo $PrintedNotification[0];
            }
            ?>
        </ul>
    </div>

<?php
require_once 'advertise.php';

echo '<script>
    var All_comments = [];
    var pressed = Array(999).fill(1);
    </script>';

$NewPostData = $data;
shuffle($NewPostData);

$adNum = 0;
$ad_data = array();
foreach ($data['adv'] as $temp) {
    if (($temp['max_view'] < $temp['views']) || (time() > strtotime($temp['end_at'])) ){
        continue;
    }
    for ($i = 0; $i < $temp['trend']; $i++) {
        array_push($ad_data, $temp);
    }
}
shuffle($ad_data);
?>