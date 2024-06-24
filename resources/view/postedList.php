<?php
    echo '<script>
    var All_comments = [];
    var pressed = Array(999).fill(1);
    </script>';
    echo '<link rel="stylesheet" href="resources/css/post.css" type="text/css">';
    $NewPostData = $data;
    shuffle($NewPostData);

    $adNum = 0;
    $ad_data = array();
    foreach ($data['adv'] as $temp) {
        for ($i = 0; $i < $temp['trend']; $i++) {
            array_push($ad_data, $temp);
        }
    }
    shuffle($ad_data);

    for ($i = 0; $i < count($NewPostData); $i++)
    {
        if (!isset($NewPostData[$i]["user_id"])){continue;}
        $postData = $NewPostData[$i];
        if (($postData["user_id"] == $_SESSION['userId'] && $postData["privacy_level"] == "private") || ($postData["privacy_level"] == "public")){
        Create_post($postData["user_id"], $postData["is_video"], false,
        $postData["post_id"], $postData["update_at"], $postData['content'], $postData['image'],
        $postData['count_like'], $postData['comments'], $postData["hasLiked"], $currentUserAvatarLink);
        }
        if (Rate(100)) {
            if (!isset($ad_data[$adNum])) {
                $adNum = 0;
            }
            $adNum += 1;
            $adImg = 'resources\image\adv\\' . $ad_data[$adNum]['image'];
            Create_adv($ad_data[$adNum]['user_id'], $ad_data[$adNum]['id'], $ad_data[$adNum]['caption'], $adImg, $ad_data[$adNum]['URL']);
        }
    }

