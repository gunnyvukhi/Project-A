<?php
    echo '<link rel="stylesheet" href="resources/css/post.css" type="text/css">';
    $My_post = $data;
    $My_post = array_reverse($My_post);
    for ($i = 0; $i < count($My_post); $i++)
    {
        if (!isset($My_post[$i]["user_id"])){continue;}
        $postData = $My_post[$i];
        if ($postData["user_id"] == $_SESSION['userId']){
        Create_post($postData["user_id"], $postData["is_video"], false,
        $postData["post_id"], $postData["update_at"], $postData['content'], $postData['image'],
        $postData['count_like'], $postData['comments'], $postData["hasLiked"], $currentUserAvatarLink);
        }
    }

