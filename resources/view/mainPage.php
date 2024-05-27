<?php include "header.php";
$userName = $_SESSION['userName']  ;
$avatarLink = 'resources/image/demoPersonIcon.png';
    ?>
<link rel="stylesheet" href="resources/css/mainPage.css" type="text/css">
<script lang="javascript" type="text/javascript" src="resources/js/mainPage.js"></script>

<!-- form tạo bài post mới-->
<div id="modalBackGround">
    <div class="newPostForm">
        <button type="button" id="closeNewPostForm" onclick="closeNewPostForm()">&times;</button>
        <h2>Tạo bài viết</h2>
<<<<<<< HEAD
        <form method="post" action="" enctype="multipart/form-data">
=======
        <form method="post" action="createPost" enctype="multipart/form-data" >
>>>>>>> b1c02c70d8e179b0c622e21d14b336842e4195ff
            <div class="postHead">
                <!-- phần avatar -->
                <?php echo '<a href="#" alt=' . $userName . ' class="PostAva"><img src=' . $avatarLink . ' alt=' . $userName . ' /></a>'; ?>
                <!-- Những ai có thể thấy bài viết này ? -->
                <div class="containerNamePrivacy">
                    <!-- phần tên người dùng -->
                    <?php echo '<p class="userName">' . $userName . '</p>' ?>
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
                <button type="button" id="selectFileForNewPost" onclick="importFile()">
                    <img src="resources/image/pictureIcon.png" alt="picture"><br>
                    <p>Thêm ảnh/video</p>
                </button>
                <div id="previewNewPostFile"></div>
            </div>
            <!-- Đăng/Hủy bài viết-->
            <div class="btnContainer">
                <button type="submit" id="uploadNewPost" onclick="" name="submit">Đăng</button>
                <button type="reset" id="resetNewPost" onclick="document.getElementById('modalBackGround').style.display = 'none'">Hủy</button>            </div>
        </form>
    </div>
</div>

<!-- thẻ chứa nội dung ở giữa trang -->
<div id="mainContentMidContainer">
    <!-- thẻ chứa phần thêm post mới. Lưu ý đây chỉ là phần giao diện, ko lấy thông tin ở đây ̣̣̣̣̣ -->
    <div class="postContainer">
        <div id="addNewPost">
            <!-- phần avatar -->
            <?php echo '<a href="#" alt=' . $userName . ' class="PostAva"><img src=' . $avatarLink . ' alt=' . $userName . ' /></a>' ?>
            <button type="button" id="newPostCaptionsBtn" onclick="openNewPostForm()">Bạn đang cảm thấy thế nào ?</button>
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
    <?php require_once 'postedList.php'?>
</div>


<div id="mainContentRightContainer">
    <?php var_dump($data) ?>
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