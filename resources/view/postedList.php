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
?>