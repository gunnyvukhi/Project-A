<?php
    echo "<script type='text/javascript' language='JavaScript'></script>";
    foreach (array_reverse($data) as $postData){
        if ($postData["user_id"] == $_SESSION['userId']){
            $postId = 'postNumber'. strval($postData["post_id"]);
            $timePosted = '2 hours ago';
            $caption = $postData['content'];
            $photo = $postData['image'];
            $like_num = 0;
            $comment_num = 0;
            $avatarLink = 'resources\image\demoPersonIcon.png';
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
                <button class="LikeShareButton" name="likeButton" id='. "likeButton" . $postId  .' type="button" onclick="LikeButton()" alt="0"><img src="resources\image\likeIcon1.png" id="likeButtonImg" alt="like" />Thích</button>
                <button class="LikeShareButton" name="commentButton" id='. "commentButton" . $postId  .' type="button" onclick="display_Comment(this.id)"><img src="resources\image\commentIcon1.png" alt="comment" />Bình luận</button>
                <button class="LikeShareButton" name="shareButton" id='. "shareButton" . $postId  .' type="button" onclick=""><img src="resources\image\shareIcon1.png" alt="share" />Chia sẻ</button>
            </form>

            <!-- GỬi bình luận bài viết -->
            <div class="commentsContainer" id='. "commentsContainer" . $postId  .'>
                <a href="#" onclick="" class="moreComments">Xem thêm bình luận</a><br>
                <form action="" class="sendComment" method="post">
                    <a href="#" alt=' . $userName . ' class="PostAva"><img src=' . $avatarLink . ' alt=' . $userName . '/></a>

                    <!-- Nơi viết bình luận -->
                    <textarea name="newComment" id='. "newComment" . $postId  .' class="newComment" placeholder="Viết bình luận..."></textarea>
                    <button type="button" class="submitComment" id='. "submitComment" . $postId  .' name="submitComment" onclick="send_comment(this.id)"><img src="resources\image\sendCommentIcon.png" alt="send"></button>
                </form>
                <div class="comments">
                othercomment
                </div>
            </div>
        </div>';
        }
    }

?>