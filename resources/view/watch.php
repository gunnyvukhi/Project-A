<?php require_once 'header.php' ?>
<link rel="stylesheet" href="resources/css/watch.css" type="text/css">
<link href="https://vjs.zencdn.net/8.10.0/video-js.css" rel="stylesheet" />


<!-- Phần Nemu bên trái -->
<div id="mainContentLeftContainer">
    <div class="fuctionNemuContainer">
        <h>Video</h>
        <form method="post" action="" class="SeachVideoForm">
            <img src="resources\image\searchVideoIcon.png">
            <input type="text" name="SeachVideo" id="SeachVideo" placeholder="Tìm kiếm video">
        </form>
        <ul>
            <li>
                <a href="http://localhost/project-a/watch" class="fuctionLink" id="TrangChu">
                <img class="fuctionPic" id="watchMainPageIcon" src="resources\image\watchMainPageIcon1.png" alt="" />
                <div class="fuctionContainer">
                    <p class="fuctionName">Trang Chủ</p>
                </div>
                </a>
            </li>

            <li>
                <a href="#" class="fuctionLink">
                <img class="fuctionPic" src="resources\image\watchLiveIcon1.png" alt="" />
                <div class="fuctionContainer">
                    <p class="fuctionName">Trực tiếp</p>
                </div>
                </a>
            </li>

            <li>
                <a href="" class="fuctionLink">
                <img class="fuctionPic" src="resources\image\watchReelsIcon1.png" alt="" />
                <div class="fuctionContainer">
                    <p class="fuctionName">Reels</p>
                </div>
                </a>
            </li>

            <li>
                <a href="#" class="fuctionLink">
                <img class="fuctionPic" src="resources\image\watchFilmIcon1.png" alt="" />
                <div class="fuctionContainer">
                    <p class="fuctionName">Chương trình</p>
                </div>
                </a>
            </li>

            <li>
                <a href="#" class="fuctionLink">
                <img class="fuctionPic" src="resources\image\watchExploreIcon1.png" alt="" />
                <div class="fuctionContainer">
                    <p class="fuctionName">Khám phá</p>
                </div>
                </a>
            </li>

            <li>
                <a href="#" class="fuctionLink">
                <img class="fuctionPic" src="resources\image\watchFavoritesIcon1.png" alt="" />
                <div class="fuctionContainer">
                    <p class="fuctionName">Video đã lưu</p>
                </div>
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="mainPostContainer" id="mainContainer">
<?php
    for ($i = 0; $i < count($NewPostData); $i++)
    {
        if (!isset($NewPostData[$i]["user_id"])){continue;}
        $postData = $NewPostData[$i];
        if (!$postData["is_video"]) {continue;}
        if (($postData["user_id"] == $_SESSION['userId'] && $postData["privacy_level"] == "private") || ($postData["privacy_level"] == "public")){
            Create_post($postData["user_id"], $postData["is_video"], true,
            $postData["post_id"], $postData["update_at"], $postData['content'], $postData['image'],
            $postData['count_like'], $postData['comments'], $postData["hasLiked"], $currentUserAvatarLink);
            }

        if (Rate(20)) {
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
<script lang="javascript" type="text/javascript" src="resources/js/watch.js"></script>
<?php include_once 'footer.php' ?>
<script src="https://vjs.zencdn.net/8.10.0/video.min.js"></script>
</html>