<?php require_once 'header.php' ?>
<link rel="stylesheet" href="resources/css/following.css" type="text/css">
<link rel="stylesheet" href="resources/css/event+friends.css" type="text/css">
<div class="mainPostContainer" id="mainContainer">

<?php
    for ($i = 0; $i < count($NewPostData); $i++)
    {
        if (!isset($NewPostData[$i]["user_id"])){continue;}
        $postData = $NewPostData[$i];
        if ($postData["user_id"] == $_SESSION['userId']) {continue;}
        if (($postData["privacy_level"] == "public")){
            Create_post($postData["user_id"], $postData["is_video"], false,
            $postData["post_id"], $postData["update_at"], $postData['content'], $postData['image'],
            $postData['count_like'], $postData['comments'], $postData["hasLiked"], $currentUserAvatarLink);
        }

        if (Rate(10)) {
            if (!isset($ad_data[$adNum])) {
                $adNum = 0;
            }
            $adNum += 1;
            $adImg = 'resources\image\adv\\' . $ad_data[$adNum]['image'];
            Create_adv($ad_data[$adNum]['user_id'], $ad_data[$adNum]['id'], $ad_data[$adNum]['caption'], $adImg, $ad_data[$adNum]['URL']);
        }
    }

?>
</div>
<?php echo '
<link rel="stylesheet" href="resources\css\event+friends.css" type="text/css">
<div id="mainContentRightContainer">
    
    <div class="ListContainer">
        <h3>Đang theo dõi</h3>
        <ul>
            <li>
                <a href="#" class="ContentLink">
                <img class="contentPic" src=' . $currentUserAvatarLink . ' alt=' . $currentUserName . ' />
                <div class="ContentContainer">
                    <p class="FriendsName">' . $currentUserName . '</p>
                </div>
                </a>
            </li>
        </ul>
    </div>

    <div class="ListContainer">
        <h3>Người liên hệ</h3>
        <ul>
            <li>
                <a href="#" class="ContentLink">
                <img class="contentPic" src=' . $currentUserAvatarLink . ' alt=' . $currentUserName . ' />
                <div class="ContentContainer">
                    <p class="FriendsName">' . $currentUserName . '</p>
                </div>
                </a>
            </li>
        </ul>
    </div>
</div>
' ?>
</body>
<script lang="javascript" type="text/javascript" src="resources/js/following.js"></script>
<?php include_once 'footer.php' ?>
</html>