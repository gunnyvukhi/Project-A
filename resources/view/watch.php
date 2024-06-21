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
        if ($postData["is_video"] == 1 ){
            $postId = 'postNumber'. strval($postData["post_id"]);
            $timePosted = Get_Time(strval($postData["update_at"]));

            $PostUserModel = new UserModel();
            $PostUser = $PostUserModel->getUserById($postData["user_id"]);
            $userName = $PostUser["last_name"];
            
            $caption = $postData['content'];
            $photo = $postData['image'];
            $like_num = $postData['count_like'];
            $comment_num = count($postData['comments']);
            
            if (isset($PostUser["avatar"])){
                $avatarLink = 'resources\image\userAvater\\' . $PostUser["avatar"];
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
                <p class="postCaption" id="caption'. $postId .'">' . $caption . '</p>
                <img class="playVideoIcon" id="playVideoIcon'. $postId .'" src="resources/image/playVideoIcon.png">';
                echo '  <video
                        id="post-video'. $postId .'"
                        class="post-video video-js vjs-custom-theme"
                        controls
                        preload="auto"
                        data-setup="{}"
                        >
                        <source src="'. $postData['image'].'" type="video/mp4" />
                        <p class="vjs-no-js">
                        To view this video please enable JavaScript, and consider upgrading to a
                        web browser that
                        <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                        </p>
                    </video>';
            echo '</div>
            <div class="LikeShareNumberContainer">
                <div class="likeNumber" id='. "likeNumber" . $postId . '><img src="resources\image\likeNumberIcon.png" id="likeNumIcon" alt="like">'. $like_num .' lượt thích</div>
                <div class="commentNumber" id='. "commentNumber" . $postId . '>'. $comment_num .' lượt bình luận</div>
            </div>

            <!-- Like, comment, chia sẻ bài viết -->
            <form class="LikeShareContainer" method="post" action="">
                <button class="LikeShareButton" name="likeButton" id='. "likeButton" . $postId  .' type="button" onclick="LikeButton(this.id)" alt="0"><img src="resources\image\likeIcon1.png" id='. "likeButtonImg" . $postId  .' alt="like" />Thích</button>
                ';
                if (isset($postData["hasLiked"])){
                    if ($postData["hasLiked"])
                    {
                 echo '<script>
                    pressed['. $postData["post_id"] .'] = 2;
                    document.getElementById("'. "likeButton" . $postId  .'").style.color = "#46A3FF";
                    document.getElementById("'. "likeButtonImg" . $postId  .'").src = "resources/image/likeIcon2.png";
                </script>';
                    }
                }
                echo '<button class="LikeShareButton" name="commentButton" id='. "commentButton" . $postId  .' type="button" onclick="display_Comment(this.id)"><img src="resources\image\commentIcon1.png" alt="comment" />Bình luận</button>
                <button class="LikeShareButton" name="shareButton" id='. "shareButton" . $postId  .' type="button" onclick=""><img src="resources\image\shareIcon1.png" alt="share" />Chia sẻ</button>
            </form>

            <!-- GỬi bình luận bài viết -->
            <div class="commentsContainer" id='. "commentsContainer" . $postId  .'>
                <button class="moreComments" id='. "moreComments" . $postId  .' onclick="More_comments(this.id)">Xem thêm bình luận</button>
                <form action="" class="sendComment" method="post">
                    <a href="#" alt=' . $userName . ' class="PostAva"><img src=' . $currentUserAvatarLink . ' alt=' . $currentUserName . '/></a>

                    <!-- Nơi viết bình luận -->
                    <textarea name="newComment" id='. "newComment" . $postId  .' class="newComment" placeholder="Viết bình luận..."></textarea>
                    <button type="button" class="submitComment" id='. "submitComment" . $postId  .' name="submitComment" onclick="send_comment(this.id)"><img src="resources\image\sendCommentIcon.png" alt="send"></button>
                </form>';

                $commentsContent = array_reverse($postData['comments']);
                $commentsContent = json_encode($commentsContent);
                echo '<script lang="javascript" type="text/javascript">All_comments['. $postData["post_id"] .'] = '. $commentsContent .'</script>
            </div>
            <button type="button" class="lessComments" id='. "lessComments" . $postId  .' onclick="LessComments(this.id)">Ẩn bình luận</button>
        </div>';
        echo '<script lang="javascript" type="text/javascript" src="resources/js/postList.js"></script>';
        }
    }

?>


<script src="https://vjs.zencdn.net/8.10.0/video.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/intersection-observer@1/dist/intersection-observer.min.js"></script>
<script lang="javascript" type="text/javascript" src="resources/js/postList.js"></script>
<script lang="javascript" type="text/javascript" src="resources/js/watch.js"></script>
<script lang="javascript" type="text/javascript" src="resources/js/scrolling.js"></script>

</body>

</html>