<?php

    $id = '';
    $userName = $_SESSION['userName'];
    $avatarLink = 'resources\image\demoPersonIcon.png';
    $timePosted = '2 hours ago';
    $caption = 'Trum Da Den';
    $photo = 'resources\image\bia.jpg';
    echo '  <div class="postContainer">
    <a href="#" alt=' . $userName . ' class="PostAva"><img src=' . $avatarLink . ' alt=' . $userName . ' /></a>
    <div class="nameTimeContainer">
        <p class="userName mb-0">' . $userName . '</p>
        <p class="timePosted mb-0">' . $timePosted . '</p>
    </div>
    <div class="contentContainer">
        <p class="postCaption">' . $caption . '</p>
        <img class="postPhoto" src=' . $photo . ' alt=photo>
    </div>
    <form class="LikeShareContainer" method="post" action="">
        <button class="LikeShareButton" name="likeButton" id="likeButton" type="button" onclick="LikeButton()" alt="0"><img src="resources\image\likeIcon1.png" id="likeButtonImg" alt="like" />Like</button>
        <button class="LikeShareButton" name="commentButton" id="commentButton" type="button" onclick=""><img src="resources\image\commentIcon1.png" alt="comment" />Comments</button>
        <button class="LikeShareButton" name="shareButton" id="shareButton" type="button" onclick=""><img src="resources\image\shareIcon1.png" alt="share" />Share</button>
    </form>
</div>';
    include_once "app\model\UserModel.php";
    include_once 'app\model\MainPageModel.php';
    echo "<script type='text/javascript' language='JavaScript'>var All_comments = []</script>";
    $NewPostData = $data;
    shuffle($NewPostData);
    foreach ($NewPostData as $postData){
        if (($postData["user_id"] == $_SESSION['userId'] && $postData["privacy_level"] == "private") || ($postData["privacy_level"] == "public")){
            $postId = 'postNumber'. strval($postData["post_id"]);
            $timePosted = Get_Time(strval($postData["update_at"]));

            $PostUserModel = new UserModel();
            $PostUser = $PostUserModel->getUserById($postData["user_id"]);
            $userName = $PostUser["last_name"];
            
            $caption = $postData['content'];
            $photo = $postData['image'];
            $like_num = 0;
            $comment_num = 0;
            
            if (isset($PostUser["avatar"])){
                $avatarLink = $PostUser["avatar"];
            } else {
                $avatarLink = 'resources\image\demoPersonIcon.png';
            }
            

            echo '  <div class="postContainer" id='. $postId .'>
            <a href="#" alt=' . $userName . ' class="PostAva"><img src=' . $avatarLink . ' alt=' . $userName . ' /></a>
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

                if (!($photo == 'resources/image/post/')){
                    echo '<img class="postPhoto" src=' . $photo . ' alt='. $photo .'>';
                };
            echo '</div>
            <div class="LikeShareNumberContainer">
                <div class="likeNumber"><img src="resources\image\likeNumberIcon.png" id="likeNumIcon" alt="like">'. $like_num .' lượt thích</div>
                <div class="commentNumber">'. $comment_num .' lượt bình luận</div>
            </div>

            <!-- Like, comment, chia sẻ bài viết -->
            <form class="LikeShareContainer" method="post" action="">
                <button class="LikeShareButton" name="likeButton" id='. "likeButton" . $postId  .' type="button" onclick="LikeButton(this.id)" alt="0"><img src="resources\image\likeIcon1.png" id='. "likeButtonImg" . $postId  .' alt="like" />Thích</button>
                <button class="LikeShareButton" name="commentButton" id='. "commentButton" . $postId  .' type="button" onclick="display_Comment(this.id)"><img src="resources\image\commentIcon1.png" alt="comment" />Bình luận</button>
                <button class="LikeShareButton" name="shareButton" id='. "shareButton" . $postId  .' type="button" onclick=""><img src="resources\image\shareIcon1.png" alt="share" />Chia sẻ</button>
            </form>

            <!-- GỬi bình luận bài viết -->
            <div class="commentsContainer" id='. "commentsContainer" . $postId  .'>
                <button class="moreComments" id='. "moreComments" . $postId  .' onclick="More_comments(this.id)">Xem thêm bình luận</button><br>
                <form action="" class="sendComment" method="post">
                    <a href="#" alt=' . $userName . ' class="PostAva"><img src=' . $avatarLink . ' alt=' . $userName . '/></a>

                    <!-- Nơi viết bình luận -->
                    <textarea name="newComment" id='. "newComment" . $postId  .' class="newComment" placeholder="Viết bình luận..."></textarea>
                    <button type="button" class="submitComment" id='. "submitComment" . $postId  .' name="submitComment" onclick="send_comment(this.id)"><img src="resources\image\sendCommentIcon.png" alt="send"></button>
                </form>';

                $commentsContent = ["Quá tuyệt vời" ,"Quá tuyệt vời" ,"Quá tuyệt vời" ,"Quá tuyệt vời" ,"Quá tuyệt vời" ,"Quá tuyệt vời" ,"Quá tuyệt vời" ,"Quá tuyệt vời" ,"Quá tuyệt vời" ,"Quá tuyệt vời" ,"Quá tuyệt vời"];
                $commentsContent = json_encode($commentsContent);
                echo '<script lang="javascript" type="text/javascript">All_comments['. $postData["post_id"] .'] = '. $commentsContent .'</script>
            </div>
            <button type="button" class="lessComments" id='. "lessComments" . $postId  .' onclick="LessComments(this.id)">Ẩn bình luận</button>
        </div>';
        }
    }

