<?php
    foreach (array_reverse($data) as $postData){
        if ($postData["user_id"] == $_SESSION['userId']){
            $timePosted = '2 hours ago';
            $caption = $postData['content'];
            $photo = $postData['image'];
            $avatarLink = 'resources\image\demoPersonIcon.png';
            echo '  <div class="postContainer">
            <a href="#" alt=' . $userName . ' class="PostAva"><img src=' . $avatarLink . ' alt=' . $userName . ' /></a>
            <div class="nameTimeContainer">
                <p class="userName">' . $userName . '</p>
                <p class="timePosted">' . $timePosted . '</p>
            </div>
            <button type="button" id="deletePost" onclick="DeletePost()">&times;</button>
            <div class="contentContainer">
                <p class="postCaption">' . $caption . '</p>';

                if (!($photo == 'resources/image/post/')){
                    echo '<img class="postPhoto" src=' . $photo . ' alt='. $photo .'>';
                };
            echo '</div>
            <form class="LikeShareContainer" method="post" action="">
                <button class="LikeShareButton" name="likeButton" id="likeButton" type="button" onclick="LikeButton()" alt="0"><img src="resources\image\likeIcon1.png" id="likeButtonImg" alt="like" />Like</button>
                <button class="LikeShareButton" name="commentButton" id="commentButton" type="button" onclick=""><img src="resources\image\commentIcon1.png" alt="comment" />Comments</button>
                <button class="LikeShareButton" name="shareButton" id="shareButton" type="button" onclick=""><img src="resources\image\shareIcon1.png" alt="share" />Share</button>
            </form>
        </div>';
        }
    }

?>