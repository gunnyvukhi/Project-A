<?php
    echo '<script>
    var All_comments = [];
    var pressed = Array(999).fill(1);
    </script>';
    echo '<link rel="stylesheet" href="resources/css/post.css" type="text/css">';
    $NewPostData = $data;
    shuffle($NewPostData);
    $adNum = 0;
    $AllAdvData = $data['adv'];
    shuffle($AllAdvData);
    for ($i = 0; $i < count($NewPostData); $i++)
    {
        if (!isset($NewPostData[$i]["user_id"])){continue;}
        $postData = $NewPostData[$i];
        if (($postData["user_id"] == $_SESSION['userId'] && $postData["privacy_level"] == "private") || ($postData["privacy_level"] == "public")){
        Create_post($postData["user_id"], $postData["is_video"], false,
        $postData["post_id"], $postData["update_at"], $postData['content'], $postData['image'],
        $postData['count_like'], $postData['comments'], $postData["hasLiked"], $currentUserAvatarLink);
        }
        if (Rate(10)) {
            if (!isset($AllAdvData[$adNum])) {
                $adNum = 0;
            }
            $ad_data = $AllAdvData[$adNum];
            $adNum += 1;
            $adImg = 'resources\image\adv\\' . $ad_data['image'];
            Create_adv(3, $ad_data['id'], $ad_data['caption'], $adImg);
        }
    }
echo '<script lang="javascript" type="text/javascript" src="resources/js/postList.js"></script>';

