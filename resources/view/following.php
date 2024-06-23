<?php require_once 'header.php' ?>
<link rel="stylesheet" href="resources/css/following.css" type="text/css">
<link rel="stylesheet" href="resources/css/event+friends.css" type="text/css">
<script lang="javascript" type="text/javascript" src="resources/js/following.js"></script>
<div class="mainPostContainer" id="mainContainer">

<?php
    include_once "app\model\UserModel.php";
    include_once 'app\model\MainPageModel.php';
    echo '<script>
    var All_comments = [];
    var pressed = Array(999).fill(1);
    </script>';
    
    $NewPostData = $data;
    shuffle($NewPostData);
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

<script lang="javascript" type="text/javascript" src="resources/js/following.js"></script>
<script lang="javascript" type="text/javascript" src="resources/js/postList.js"></script>
<script lang="javascript" type="text/javascript" src="resources/js/scrolling.js"></script>
</body>

</html>