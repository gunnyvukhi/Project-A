<?php include "header.html"; ?>
<link rel="stylesheet" href="resources/css/mainPage.css" type="text/css">
<!-- thẻ chứa nội dung ở giữa trang -->
<div id="mainContentMidContainer">
    <div class="postContainer">
        <form id="addNewPost" action="">
            <a href="#" alt="$Name" id="addNewPostAva"><img src="resources/image/demoPersonIcon.png" alt="$Name" /></a>
            <input type="text" name="newPostCaptions" id="newPostCaptions" placeholder="Bạn đang cảm thấy thế nào ?" />
        </form>
        <div class="newPostOtherOption">
        <button type="button" class="newPostButton" id="liveButton" onclick="test()"><img src="resources\image\livestreamIcon.png" alt="live" >Phát trực tiếp</button>
        <button type="button" class="newPostButton" id="Button" onclick="test()"><img src="resources\image\reelsIcon.png" alt="reels" >Tạo một reel</button>
        <button type="button" class="newPostButton" id="liveButton" onclick="test()"><img src="resources\image\albumIcon.png" alt="album" >Album mới</button>
        </div>
    </div>
</div>

<!-- form tạo bài post mới -->
<div class="newPostForm">
    <form method="post" action="">
        <h2>Tạo bài viết</h2>
    </form>
</div>

<div id="mainContentRightContainer">

</div>

<div id="mainContentLeftContainer">

</div>

<script>
function test(){
    console.log("test successful");
}
</script>
<script lang="javascript" type="text/javascript" src="resources/js/mainPage.js"></script>
</body>

</html>