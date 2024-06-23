<link rel="stylesheet" href="resources/css/advertise.css" type="text/css">

<!-- Nemu display ad -->
<div id="adBackGround">
    <div class="AdvertiseContainer">
        <div class="personalInfo">
            <?php
            $money = 0.00;
            echo
                '<a href="http://localhost/project-a/profile" class="PostAva"><img src=' . $currentUserAvatarLink . '></a>
        <div class="nameMoneyContainer">
            <p class="userName">' . $currentUserName . '</p>
            <div class="moneyLeft">Số dư tài khoản:  <b>' . $money . '</b>  vnđ <button type="button" class="addMoney" onclick=""><img src="resources\image\addMoneyICon.png"></button></div>
        </div>'
                ?>
        </div>
        <div class="closeButton" onclick="closeAdvertiseNemu()">X</div>
        <div class="allAdvertiseBox">
            <a href="#" class="advertisePost createNewAd">
                <div class="createNewAdContainer" onclick="openNewAdvertiseForm()">
                    <p>Tạo quảng</p>
                    <p>cáo mới</p>
                    <img src="resources\image\createNewAdIcon.png" class="" />
                </div>
            </a>
            <?php
            foreach ($data['adv'] as $ad){
                $timeLeft = strtotime($ad['end_at']) - strtotime($ad['create_at']);
                $timeLeft = floor($timeLeft/(3600*24));
                echo '
                <a href="#" class="advertisePost" title="'. $ad['caption'] .'">
                <div class="advertiseImg"><img src="resources\image\adv\\'. $ad['image'] .'" class="advPic"/></div>
                <div class="adViewsAndTimeLeft"><img src="resources\image\adViewsIcon.png">'. $ad['views'] .'</div>
                <div class="adViewsAndTimeLeft"><img src="resources\image\adTimeLeftIcon.png">'. $timeLeft .' ngày</div>
                </a>';
            }
        ?>
        </div>
    </div>
</div>

<!-- Form tạo ra Ad mới -->
<div id="NewAdvertiseBackGround">
    <div class="newAdvertiseForm">
        <button type="button" id="closeNewPostForm" onclick="closeNewAdvertiseForm()">&times;</button>
        <h2>Tạo quảng cáo mới</h2>
        <form method="post" action="add-adv" enctype="multipart/form-data">
            <div class="advertiseHead">
                <div class="nameAndAva">
                <!-- phần avatar -->
                <?php echo '<a href="http://localhost/project-a/profile" class="PostAva"><img src=' . $currentUserAvatarLink . ' alt=' . $currentUserName . ' /></a>'; ?>
                <!-- phần tên người dùng -->
                <?php echo '<p class="userName">' . $currentUserName . '</p>' ?>
                </div>
                
                <!-- Các Lựa chọn cho quang cáo -->
                <div class="containerDetailsOptions">
                    
                    <!-- đây là chỗ chọn các options-->
                        <label for="trend">Tỷ lệ xuất hiện</label>
                        <select name="trend" id="occurrenceRate">
                            <option value="5" selected>5 %</option>
                            <option value="10">10 %</option>
                            <option value="20">20 %</option>
                        </select>

                        <label for="end_at">Thời gian hiển thị</label>
                        <select name="end_at" id="end_at">
                            <option value="7" selected>7 ngày</option>
                            <option value="14">14 ngày</option>
                            <option value="30">30 ngày</option>
                        </select>

                        <label for="max_view">Số lượt hiển thị</label>
                        <select name="max_view" id="max_view">
                            <option value="1000" selected>1.000 lượt</option>
                            <option value="5000">5.000 lượt</option>
                            <option value="10000">10.000 lượt</option>
                        </select>
                </div>
            </div>
            <!-- Nội dung text của bài viết -->
            <textarea name="caption" id="newAdCaption" placeholder="Hãy viết gì đó để thu hút khách hàng"></textarea>
            <!-- Add Links -->
            <div class="adLinkToContainer">
            <div class="adLinkToBox" id="adLinkToBox">
                <input type="text" name="adLinkToBoxInput" class="adLinkToBoxInput" id="adLinkToBoxInput">
                <img id="adLinkToImage" src="resources\image\linksToIcon.png" alt="URL">
            </div>
            </div>
            <!-- Nội dung hình ảnh/video -->
            <div class="containerForFile">
                <input type="file" id="newAdFileInput" name="image"
                    accept=".png, .jpg, .bmp, .jpeg, .gif, .ico, .psd, .mp4, .wmv, .mov, .avi, .flv">

                <button type="button" id="deleteFileForNewAd" onclick="deleteAdFile()">&times;</button>

                <button type="button" id="selectFileForNewAd" onclick="importAdFile()">
                    <img src="resources/image/pictureIcon.png" alt="picture"><br>
                    <p>Thêm ảnh/video</p>
                </button>
                <div id="previewNewAdFile"></div>
            </div>
            <!-- Đăng/Hủy bài viết-->
            <div class="btnContainer">
                <button type="submit" name="submit" id="uploadNewAdvertise" onclick="">Thanh toán và đăng</button>
                <button type="reset" id="resetNewAd" onclick="deleteCreatingAd()">Hủy</button>
            </div>
        </form>
    </div>
</div>

<script src="resources\js\advertise.js" type="text/javascript"></script>