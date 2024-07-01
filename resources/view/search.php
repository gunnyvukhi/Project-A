<?php
var_dump($users);
for ($i = 0; $i < count($posts); $i++){$posts[$i] = $posts[$i]['post_id'];}
// var_dump($posts);

?>;

<?php require_once 'header.php' ?>
<link rel="stylesheet" href="resources/css/seach.css" type="text/css">
<link href="https://vjs.zencdn.net/8.10.0/video-js.css" rel="stylesheet" />


<!-- Phần Nemu bên trái -->
<div id="mainContentLeftContainer">
    <div class="fuctionNemuContainer">
        <h>Kết quả tìm kiếm</h>
        <p class="filter">Bộ lọc</p>
        <ul>
            <li>
                <a href="#" class="fuctionLink" id="allResult" onclick="fillterSelect(this.id, 'fillterSelectALLIcon')">
                <img class="fuctionPic" id="fillterSelectALLIcon" src="resources\image\fillterSelectALLIcon1.png" alt="" />
                <div class="fuctionContainer">
                    <p class="fuctionName">Tất cả</p>
                </div>
                </a>
            </li>

            <li>
                <a href="#" class="fuctionLink" id="allPost" onclick="fillterSelect(this.id, 'fillterSelectAllPostIcon')">
                <img class="fuctionPic" id="fillterSelectAllPostIcon" src="resources\image\fillterSelectAllPostIcon1.png" alt="" />
                <div class="fuctionContainer">
                    <p class="fuctionName">Bài viết</p>
                </div>
                </a>
            </li>

            <li>
                <a href="#" class="fuctionLink" id="onlyUser" onclick="fillterSelect(this.id, 'fillterSelectOnlyUserIcon')">
                <img class="fuctionPic" id="fillterSelectOnlyUserIcon" src="resources\image\fillterSelectOnlyUserIcon1.png" alt="" />
                <div class="fuctionContainer">
                    <p class="fuctionName">Mọi người</p>
                </div>
                </a>
            </li>

            <li>
                <a href="#" class="fuctionLink" id="onlyPicture" onclick="fillterSelect(this.id, 'fillterSelectOnlyPictureIcon')">
                <img class="fuctionPic" id="fillterSelectOnlyPictureIcon" src="resources\image\fillterSelectOnlyPictureIcon1.png" alt="" />
                <div class="fuctionContainer">
                    <p class="fuctionName">Ảnh</p>
                </div>
                </a>
            </li>

            <li>
                <a href="#" class="fuctionLink" id="onlyVideo" onclick="fillterSelect(this.id, 'watchReelsIcon')">
                <img class="fuctionPic" id="watchReelsIcon" src="resources\image\watchReelsIcon1.png" alt="" />
                <div class="fuctionContainer">
                    <p class="fuctionName">Video</p>
                </div>
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="mainPostContainer" id="mainContainer">
    <div class="peopleContainer postContainer">
        <p class="title">Mọi người</p>
        <ul>
            <li>
                <div class="UsersContainer">
                <a href="#" class="userAvatarLink"><img class="userAvatar" src="resources\image\userAvater\user3.jpeg"></a>
                <div class="userInfomationContainer">
                    <a href="#" class="userName">Nguyễn Tuấn Anh</a>
                    <p class="otherInfomation" >Song tai Hanoi</p>
                </div></div>
                <a href="" class="seeProfileBtn">Xem trang cá nhân</a>
            </li>
        </ul>
    </div>
<?php
    for ($i = 0; $i < count($NewPostData); $i++)
    {
        if ((!isset($NewPostData[$i]["user_id"])) || (!in_array($NewPostData[$i]["post_id"], $posts))){continue;}
        $postData = $NewPostData[$i];
        if (($postData["user_id"] == $_SESSION['userId'] && $postData["privacy_level"] == "private") || ($postData["privacy_level"] == "public")){
            Create_post($postData["user_id"], $postData["is_video"], true,
            $postData["post_id"], $postData["update_at"], $postData['content'], $postData['image'],
            $postData['count_like'], $postData['comments'], $postData["hasLiked"], $currentUserAvatarLink);
            }

        if (Rate(30)) {
            if (!isset($ad_data[$adNum])) {
                $adNum = 0;
            }
            $adNum += 1;
            $adImg = 'resources\image\adv\\' . $ad_data[$adNum]['image'];
            Create_adv($ad_data[$adNum]['user_id'], $ad_data[$adNum]['id'], $ad_data[$adNum]['caption'], $adImg, $ad_data[$adNum]['URL']);
        }
    }

?>


</body>
<script lang="javascript" type="text/javascript" src="resources/js/seach.js"></script>
<?php include_once 'footer.php' ?>
<script src="https://vjs.zencdn.net/8.10.0/video.min.js"></script>
</html>