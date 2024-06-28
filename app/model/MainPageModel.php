<?php
function Get_Time($String) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $a = time();
        $b = strtotime($String);
        $c = $a - $b;
        if (floor($c/31536000)) {
            $c = floor($c/31536000);
            return $c. ' năm trước';
        }
        else if (floor($c/2628000)) {
            $c = floor($c/2628000);
            return $c. ' tháng trước';
        }
        else if (floor($c/604800)) {
            $c = floor($c/604800);
            return $c. ' tuần trước';
        }
        else if (floor($c/86400)) {
            $c = floor($c/86400);
            return $c. ' ngày trước';
        }
        else if (floor($c/3600)) {
            $c = floor($c/3600);
            return $c. ' giờ trước';
        }
        else if (floor($c/60)) {
            $c = floor($c/60);
            return $c. ' phút trước';
        }
        else if ($c < 60){
            return 'Vừa xong';
        }
        return '';
    }

function Rate($percents){
    $percents = (int)$percents;
    $a = rand(0, 100);
    if ($a < $percents){
        return true;
    }
    return false;
}

function Create_post($user_id, $is_video, $allow_video, $post_id, $update_at, $caption, $photo, $like_num, $comment, $hasLiked, $currentUserAvatarLink) {
    if ($is_video == 1){
        if (!$allow_video){return;}
    }
        $postId = 'postNumber'. strval($post_id);
        $timePosted = Get_Time(strval($update_at));

        $PostUserModel = new UserModel();
        $PostUser = $PostUserModel->getUserById($user_id);
        $userName = $PostUser["last_name"];

        $comment_num = count($comment);
        
        if (isset($PostUser["avatar"])){
            $avatarLink = 'resources\image\userAvater\\' . $PostUser["avatar"];
        } else {
            $avatarLink = 'resources\image\demoPersonIcon.png';
        }
        

        echo '  <div class="postContainer" id='. $postId .'>
        <a href="#" alt=' . $userName . ' class="PostAva"><img src=' . $avatarLink . ' alt=' . $userName . ' loading="lazy" /></a>
        <div class="nameTimeContainer">
            <p class="userName">' . $userName . '</p>
            <p class="timePosted">' . $timePosted . '</p>
        </div>
        
        <!-- phần xóa post -->
        <button type="button" class="deletePost" name='. "delete" . $postId  .' id='. "delete" . $postId  .' onclick="DeletePost(this.id)">&times;</button>

        <p class="deletePostText" id='. "deleteText" . $postId  .' >Bạn đã xóa bài viết này khỏi trang cá nhân của bạn</p>

        <!-- hoàn tác xóa post -->
        <button type="button" class="undoDeletePost" name='. "undoDelete" . $postId .' id='. "undoDelete" . $postId .' onclick="UndoDeletePost(this.id)">Hoàn tác</button>

        <div class="contentContainer">
            <p class="postCaption">' . $caption . '</p>';

            if ($is_video == 1){
                echo '<img class="playVideoIcon" loading="lazy" id="playVideoIcon'. $postId .'" src="resources/image/playVideoIcon.png">
                <video
                    id="post-video'. $postId .'"
                    class="post-video video-js vjs-custom-theme"
                    controls
                    preload="auto"
                    data-setup="{}"
                    >
                    <source src="'. $photo.'" type="video/mp4" />
                    <p class="vjs-no-js">
                    To view this video please enable JavaScript, and consider upgrading to a
                    web browser that
                    <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                    </p>
                </video>';
            } else if (!($photo == 'resources/image/post/')){
                echo '<img class="postPhoto" loading="lazy" src="' . $photo . '">';
            };

        echo '</div>
        <div class="LikeShareNumberContainer">
            <div class="likeNumber" id='. "likeNumber" . $postId . '><img loading="lazy" src="resources\image\likeNumberIcon.png" id="likeNumIcon" alt="like">'. $like_num .' lượt thích</div>
            <div class="commentNumber" id='. "commentNumber" . $postId . '>'. $comment_num .' lượt bình luận</div>
        </div>

        <!-- Like, comment, chia sẻ bài viết -->
        <form class="LikeShareContainer" method="post" action="">
            <button class="LikeShareButton" name="likeButton" id='. "likeButton" . $postId  .' type="button" onclick="LikeButton(this.id)" alt="0"><img loading="lazy" src="resources\image\likeIcon1.png" id='. "likeButtonImg" . $postId  .' alt="like" />Thích</button>
            ';
            if (isset($hasLiked)){
                if ($hasLiked)
                {
                echo '<script>
                pressed['. $post_id .'] = 2;
                document.getElementById("'. "likeButton" . $postId  .'").style.color = "#46A3FF";
                document.getElementById("'. "likeButtonImg" . $postId  .'").src = "resources/image/likeIcon2.png";
            </script>';
                }
            }
            echo '<button class="LikeShareButton" name="commentButton" id='. "commentButton" . $postId  .' type="button" onclick="display_Comment(this.id)"><img loading="lazy" src="resources\image\commentIcon1.png" alt="comment" />Bình luận</button>';
            echo '<button class="LikeShareButton" name="shareButton" id='. "shareButton" . $postId  .' type="button" onclick=""><img loading="lazy" src="resources\image\shareIcon1.png" alt="share" />Chia sẻ</button>';
        echo '</form>

        <!-- GỬi bình luận bài viết -->
        <div class="commentsContainer" id='. "commentsContainer" . $postId  .'>
            <button class="moreComments" id='. "moreComments" . $postId  .' onclick="More_comments(this.id)">Xem thêm bình luận</button>
            <form action="" class="sendComment" method="post">
                <a href="#" alt=' . $userName . ' class="PostAva"><img loading="lazy" src="' . $currentUserAvatarLink . '"/></a>

                <!-- Nơi viết bình luận -->
                <textarea name="newComment" id='. "newComment" . $postId  .' class="newComment" placeholder="Viết bình luận..."></textarea>
                <button type="button" class="submitComment" id='. "submitComment" . $postId  .' name="submitComment" onclick="send_comment(this.id)"><img loading="lazy" src="resources\image\sendCommentIcon.png" alt="send"></button>
            </form>';

            $commentsContent = array_reverse($comment);
            $commentsContent = json_encode($commentsContent);
            echo '<script lang="javascript" type="text/javascript">All_comments['. $post_id .'] = '. $commentsContent .'</script>
        </div>
        <button type="button" class="lessComments" id='. "lessComments" . $postId  .' onclick="LessComments(this.id)">Ẩn bình luận</button>
    </div>';
    }


function Create_adv($user_id, $adv_id, $caption, $photo, $URL){
    $postId = 'advNumber'. strval($adv_id);
    $PostUserModel = new UserModel();
    $PostUser = $PostUserModel->getUserById($user_id);
    $userName = $PostUser["last_name"];

    if (!isset($URL)) {
        $URL = "#";
    }
    
    if (isset($PostUser["avatar"])){
        $avatarLink = 'resources\image\userAvater\\' . $PostUser["avatar"];
    } else {
        $avatarLink = 'resources\image\demoPersonIcon.png';
    }
    

    echo '<a href="'.$URL.'" target = "_ blank" class="advLink" id="URL'. strval($adv_id) .'">
    <div class="postContainer advPostContainer" id='. $postId .'>
    <p class="PostAva"><img loading="lazy" src=' . $avatarLink . ' alt=' . $userName . ' /></p>
    <div class="nameTimeContainer">
        <p class="userName">' . $userName . '</p>
        <p class="timePosted">Quảng cáo</p>
    </div>

    <div class="contentContainer">
        <p class="postCaption">' . $caption . '</p>';

        if (!($photo == 'resources/image/post/')){
            echo '<img loading="lazy" class="postPhoto" src="' . $photo . '">';
        };

    echo '</div> </div> </a>';
}