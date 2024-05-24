<?php include "header.html";
$userName = "user";
$avatarLink = 'resources/image/demoPersonIcon.png'
    ?>

<link rel="stylesheet" href="resources/css/mainPage.css" type="text/css">

<!-- thẻ chứa nội dung ở giữa trang -->
<div id="mainContentMidContainer">
    <div class="postContainer">
        <form id="addNewPost" action="">
            <?php echo '<a href="#" alt=' . $userName . ' class="PostAva"><img src=' . $avatarLink . ' alt=' . $userName . ' /></a>' ?>
            <input type="text" name="newPostCaptions" id="newPostCaptions" placeholder="Bạn đang cảm thấy thế nào ?" />
        </form>
        <div class="newPostOtherOption">
            <button type="button" class="newPostButton" id="liveButton" onclick="test()"><img
                    src="resources\image\livestreamIcon.png" alt="live">Phát trực tiếp</button>
            <button type="button" class="newPostButton" id="Button" onclick="test()"><img
                    src="resources\image\reelsIcon.png" alt="reels">Tạo một reel</button>
            <button type="button" class="newPostButton" id="liveButton" onclick="test()"><img
                    src="resources\image\albumIcon.png" alt="album">Album mới</button>
        </div>
    </div>
</div>

<!-- form tạo bài post mới -->
<div class="newPostForm">
    <h2>Tạo bài viết</h2>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="postHead">
            <?php echo '<a href="#" alt=' . $userName . ' class="PostAva"><img src=' . $avatarLink . ' alt=' . $userName . ' /></a>'; ?>
            <div class="containerNamePrivacy">
                <?php echo '<p class="userName">' . $userName . '</p>' ?>
                <select name="newPostPrivacy" id="newPostPrivacy">
                    <option value="public" selected>Công khai</option>
                    <option value="private">Chỉ tôi</option>
                    <option value="friendOnly">Bạn bè</option>
                </select>
            </div>
        </div>
        <textarea name="newPostCaption" id="newPostCaption" placeholder="Hôm nay bạn cảm thấy thế nào ?"></textarea>
        <div class="containerForFile">
            <input type="file" id="newPostFileInput"
                accept=".png, .jpg, .bmp, .jpeg, .gif, .ico, .psd, .mp4, .wmv, .mov, .avi, .flv">
            <button type="button" id="selectFileForNewPost" onclick="importFile()"><img src="resources/image/pictureIcon.png" alt="picture"><br><p>Thêm ảnh/video</p></button>
            <div id="previewNewPostFile"></div>
        </div>
        <button type="submit" id="uploadNewPost" onclick="">Đăng</button>


    </form>
</div>

<div id="mainContentRightContainer">

</div>

<div id="mainContentLeftContainer">

</div>

<script>
    function test() {
        console.log("test successful");
    }
</script>
<script lang="javascript" type="text/javascript" src="resources/js/mainPage.js"></script>
</body>

</html>