<?php include "header.php"; ?>
<link rel="stylesheet" href="resources/css/mainPage.css" type="text/css">
<script lang="javascript" type="text/javascript" src="resources/js/mainPage.js"></script>

<!-- form tạo bài post mới-->
<div id="modalBackGround">
    <div class="newPostForm">
        <button type="button" id="closeNewPostForm" onclick="closeNewPostForm()">&times;</button>
        <h2>Tạo bài viết</h2>
        <form method="post" action="createPost" enctype="multipart/form-data">
            <div class="postHead">
                <!-- phần avatar -->
                <?php echo '<a href="http://localhost/project-a/profile" alt=' . $currentUserName . ' class="PostAva"><img src=' . $currentUserAvatarLink . ' alt=' . $currentUserName . ' /></a>'; ?>
                <!-- Những ai có thể thấy bài viết này ? -->
                <div class="containerNamePrivacy">
                    <!-- phần tên người dùng -->
                    <?php echo '<p class="userName">' . $currentUserName . '</p>' ?>
                    <!-- đây là chỗ chọn chế độ chia sẻ-->
                    <select name="newPostPrivacy" id="newPostPrivacy">
                        <option value="public" selected>Công khai</option>
                        <option value="private">Chỉ tôi</option>
                        <option value="friendOnly">Bạn bè</option>
                    </select>
                </div>
            </div>
            <!-- Nội dung text của bài viết -->
            <textarea name="newPostCaption" id="newPostCaption" placeholder="Hôm nay bạn cảm thấy thế nào ?"></textarea>
            <!-- Nội dung hình ảnh/video -->
            <div class="containerForFile">
                <input type="file" id="newPostFileInput" name="newPostFileInput"
                    accept=".png, .jpg, .bmp, .jpeg, .gif, .ico, .psd, .mp4, .wmv, .mov, .avi, .flv">

                <button type="button" id="deleteFileForNewPost" onclick="deleteFile()">&times;</button>

                <button type="button" id="selectFileForNewPost" onclick="importFile()">
                    <img src="resources/image/pictureIcon.png" alt="picture"><br>
                    <p>Thêm ảnh/video</p>
                </button>
                <div id="previewNewPostFile"></div>
            </div>
            <!-- Đăng/Hủy bài viết-->
            <div class="btnContainer">
                <button type="submit" name="submit" id="uploadNewPost" onclick="">Đăng</button>
                <button type="reset" id="resetNewPost" onclick="deleteCreatingPost()">Hủy</button>
            </div>
        </form>
    </div>
</div>

<!-- thẻ chứa nội dung ở giữa trang -->
<div id="mainContentMidContainer">
    <!-- thẻ chứa phần thêm post mới. Lưu ý đây chỉ là phần giao diện, ko lấy thông tin ở đây ̣̣̣̣̣ -->
    <div class="postContainer">
        <div id="addNewPost">
            <!-- phần avatar -->
            <?php echo '<a href="http://localhost/project-a/profile" alt=' . $currentUserName . ' class="PostAva"><img src=' . $currentUserAvatarLink . ' alt=' . $currentUserName . ' /></a>' ?>
            <button type="button" id="newPostCaptionsBtn" onclick="openNewPostForm()">Bạn đang cảm thấy thế nào
                ?</button>
        </div>
        <!-- các lựa chọn khác -->
        <div class="newPostOtherOption">
            <button type="button" class="newPostButton" id="liveButton" onclick="test()"><img
                    src="resources\image\livestreamIcon.png" alt="live">Phát trực tiếp</button>
            <button type="button" class="newPostButton" id="Button" onclick="test()"><img
                    src="resources\image\reelsIcon.png" alt="reels">Tạo một reel</button>
            <button type="button" class="newPostButton" id="liveButton" onclick="test()"><img
                    src="resources\image\albumIcon.png" alt="album">Album mới</button>
        </div>
    </div>
    <?php require_once 'postedList.php' ?>
</div>


<div id="mainContentRightContainer">

    <div class="FriendsListContainer">
        <h3>Người liên hệ</h3>
        <ul>
        <?php
            echo '<li><a href="#" class="NotificationLink">
                <img class="NotificationAvaPic" src=' . $currentUserAvatarLink . ' alt=' . $currentUserName . ' />
                <div class="NotificationContentContainer">
                    <p class="NotificationContent"><b>' . $currentUserName . '</b> đã thêm một ảnh mới vào Album của họ</p>
                    <p class="NotificationTime">vừa xong</p>
                </div>
                </a>
            </li>';
            ?>
            <li>Bạn 2</li>
            <li>Bạn 3</li>
        </ul>
    </div>
</div>

<div id="mainContentLeftContainer"> 
    <?php var_dump($data[3]) ?>
</div>

<script>
    function test() {
        console.log("test successful");
    }
</script>
<script lang="javascript" type="text/javascript" src="resources/js/mainPage.js"></script>
</body>

</html>