<?php include_once 'header.php'; ?>
<?php $_SessionId = 1; $UserId = 0;  ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="resources/css/Profile.css">
    <link rel="stylesheet" href="resources/css/mainPage.css">
</head>

<body>


    <!-- phần đầu profile -->


    <div class="Profile" id="Profile">
        <div class="outside" id="outside">
            <div class="Profile__header" id="Profile__header">
                <div class="Profile__header__cover" id="Profile__header__cover">
                    <div class="Profile__header__cover__img">
                        <img src="resources/image/Profileimg/bia.jpg" id="cover" class="cover" alt="Cover">
                        <i id="icon1" class="fa fa-camera" style="font-size:24px"></i>
                    </div>
                </div>
            </div>
            <div class="Profile__header__avatar" id="Profile__header__avatar">
                <img src="resources/image/Profileimg/avatar.jpg" id="avatar" class="img-thumbnail" alt="Avatar">
                <i id="icon2" class="fa fa-camera" style="font-size:24px" onclick="openChangeForm()"></i>
                <div id="ChangeAvatar">
                    <div id="modalBackGround">
                        <div class="ChangeAvatarForm">
                            <button type="button" id="closeNewPostForm" onclick="closeChangeForm()">&times;</button>
                            <h2>Đổi ảnh đại diện</h2>
                            <form method="post" action="ChangeAvatar" enctype="multipart/form-data">
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
                                    <input type="file" id="newPostFileInput" name="newPostFileInput" accept=".png, .jpg, .bmp, .jpeg, .gif, .ico, .psd, .mp4, .wmv, .mov, .avi, .flv">

                                    <button type="button" id="deleteFileForNewAvatar" onclick="deleteFile()">&times;</button>

                                    <button type="button" id="selectFileForNewAvatar" onclick="importFile()">
                                        <img src="resources/image/pictureIcon.png" alt="picture"><br>
                                        <p>Thêm ảnh/video</p>
                                    </button>
                                    <div id="previewNewPostFile"></div>
                                </div>
                                <!-- Đăng/Hủy bài viết-->
                                <div class="btnContainer">
                                    <button type="submit" name="submit" id="uploadNewAvatar" onclick="">Đăng</button>
                                    <button type="reset" id="resetNewPost" onclick="deleteCreatingPost()">Hủy</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <h2 class="name"> <?php   ?> </h2>
                <div id="Profile_Header_Button" class="Profile_Header_Button">
                    <?php if ($UserId == $_SessionId) { ?>
                        <a name="" id="Profile_Header_themtin" class="btn btn-primary" href="#" role="button"><i class="fa fa-plus" aria-hidden="true"></i> Add to story</a>
                        <a name="" id="Profile_Header_chinhsua" class="btn btn-primary" href="#" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Profile</a>
                    <?php } else { ?>
                        <a name="" id="Profile_Header_themtin" class="btn btn-primary" href="#" role="button"><i class="fa fa-plus" aria-hidden="true"></i> Add Friend </a>
                        <a name="" id="Profile_Header_chinhsua" class="btn btn-primary" href="#" role="button"><i class="fa fa-user-plus" aria-hidden="true"></i> Folow </a>
                    <?php } ?>
                </div>
            </div>
            <div class="Profile__header__menu" id="Profile__header__menu">
                <ul>
                    <li>
                        <button id="button_baiviet" class="btn btn-default"> Bài viết</button>
                    </li>
                    <li>
                        <button id="button_gioithieu" class="btn btn-default">Giới thiệu</button>
                    </li>
                    <li>
                        <button id="button_anh" class="btn btn-default">Ảnh</button>
                    </li>
                    <li>
                        <button id="button_banbe" class="btn btn-default">Bạn bè</button>
                    </li>
                    <li>
                        <button id="button_video" class="btn btn-default">Video</button>
                    </li>
                    <li>
                        <button id="button_xemthem" class="btn btn-default">Xem thêm</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Phần bài viết của trang Profile -->


    <div id="Profile2" class="Profile2">
        <div id="Description" class="ProfilePart2">
            <p class="Description__Detail" id="Description_gioithieu">Giới thiệu</p>
            <p class="Description__Detail" id="Description_nickname">Dien tu vien thong</p>
            <a class="Description__Detail" name="Description_Edit" id="editBtn" class="btn btn-primary" href="#" role="button">Chỉnh sửa tiểu sử</a>
            <p class="Description__Detail" id="Description_Address" class="Description_Detail">
                <i class="fa fa-map-marker" aria-hidden="true"> Hà Nội </i>
            </p>
            <p class="Description__Detail" id="Description_Relationship" class="Description_Detail">
                <i class="fa fa-heart" aria-hidden="true"></i> Độc thân
            </p>
            <p class="Description__Detail" id="Description_Ig" class="Description_Detail">
                <i class="fa fa-instagram" aria-hidden="true"> dang___minh</i>
            </p>
            <a name="Description_EditDetail" id="editDetailBtn" class="btn btn-primary" href="#" role="button">Chỉnh sửa chi tiết</a>
        </div>
        <div id="Profile_Post" class="ProfilePart2">
            <div id="PostList" class="ProfilePost">
                <?php include_once 'postedList.php' ?>
            </div>
        </div>
    </div>


    <!--  Phần giới thiệu của Profile -->



    <div id="Profile2_AboutPage" class="Profile2">

        <div id="Profile__About__Btn" class="">
            <div class="Profile2_AboutPage_Inside">
                <p id="About">Giới thiệu</p>
            </div>
            <div id="Profile2_AboutPage_menu" class="">
                <ul>
                    <li>
                        <button id="button_tongquan" class="Description__button"> Tổng quan</button>
                    </li>
                    <li>
                        <button id="button_cvvahv" class="Description__button">Công việc và học vấn</button>
                    </li>
                    <li>
                        <button id="button_nts" class="Description__button">Nơi từng sống</button>
                    </li>
                    <li>
                        <button id="button_ttlh" class="Description__button">Thông tin liên hệ và cơ bản</button>
                    </li>
                    <li>
                        <button id="button_gd" class="Description__button">Gia đình và các mối quan hệ</button>
                    </li>

                    <li>
                        <button id="button_sk" class="Description__button">Sự kiện trong đời</button>
                    </li>
                </ul>
            </div>
        </div>

        <div id="Profile__About__Content">





            <!-- Profile__About__Overview -->
            <div id="Overview" class="Profile__About">

                <div class="Overview__Content">
                    <i class="fa fa-briefcase" aria-hidden="true"> Đang làm việc tại</i>
                    <button id="Overview__Content__working" class="Overview__Content__btn" onclick="OpenOverview(this)"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                </div>
                <!-- phần edit của About__Overview     -->
                <div id="working" class="Profile__About__Edit">
                    <div id="EditArea">
                        <div class="EditGroup" id="edit__Company">
                            <input type="text" name="Company" id="" class="textArea" placeholder="Company"></input type="text">
                        </div>
                        <div class="EditGroup" id="edit__Position">
                            <input type="text" name="Position" id="" class="textArea" placeholder="Position"></input type="text">
                        </div>
                        <div class="EditGroup" id="edit__Location">
                            <input type="text" name="Location" id="" class="textArea" placeholder="City/Town"></input type="text">
                        </div>
                        <div class="EditGroup" id="edit__Description">
                            <input type="text" name="Description" id="" class="textArea" placeholder="Description"></input type="text">
                        </div>
                        <div class="EditGroup" id="edit__btn">
                            <div id="Year">
                                <a id="Yeartext">From</a>
                                <select class="btn" name="Year" id="YearSelect">
                                    <option value="0">Year</option>
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                </select>
                            </div>
                            <div id="Privacy">
                                <select class="btn" name="privacy" id="privacybtn">
                                    <option value="0">Privacy</option>
                                    <option value="1">Public</option>
                                    <option value="2">Friends</option>
                                    <option value="3">Only me</option>
                                </select>
                                <div class="save">
                                    <button class="btn" id="save" onclick="CloseOverview(this)" >Save</button>
                                </div>
                                <div class="cancel">
                                    <button class="btn" id="cancel" onclick="CloseOverview(this)" >Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="Overview__Content">
                    <i id="Overview__Content__study" class="fa fa-graduation-cap" aria-hidden="true"> Đã học tại</i>
                    <button id="Overview__Content__HighSchool" class="Overview__Content__btn" onclick="OpenOverview(this)"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true""></i></button>
                </div>
                <div id="HighSchool" class="Profile__About__Edit">
                    <div id="EditArea">
                        <div class="EditGroup" id="edit__University">
                            <input type="text" name="University" id="" class="textArea" placeholder="School"></input type="text">
                        </div>
                        <div class="EditGroup" id="edit__Description">
                            <input type="text" name="Description" id="" class="textArea" placeholder="Description"></input type="text">
                        </div>
                        <div class="EditGroup" id="edit__btn">
                            <div id="Year">
                                <a id="Yeartext">From</a>
                                <select class="btn" name="Year" id="YearSelect">
                                    <option value="0">Year</option>
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                </select>
                                <a id="Yeartext">to</a>
                                <select class="btn" name="Year" id="YearSelect">
                                    <option value="0">Year</option>
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                </select>
                                <div id="Graduated">
                                    <input type="checkbox" name="Graduated" id="Graduated">Graduated</input type="checkbox">
                                </div>
                            </div>
                            <div id="Privacy">
                                <select class="btn" name="privacy" id="privacybtn">
                                    <option value="0">Privacy</option>
                                    <option value="1">Public</option>
                                    <option value="2">Friends</option>
                                    <option value="3">Only me</option>
                                </select>
                                <div id="save1" class="save">
                                    <button class="btn" id="save" onclick="CloseOverview(this)">Save</button>
                                </div>
                                <div id="cancel1" class="cancel">
                                    <button class="btn" id="cancel" onclick="CloseOverview(this)">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="Overview__Content">
                    <i class="fa fa-home" aria-hidden="true"> Sống tại</i>
                    <button id="Overview__Content__Live" class="Overview__Content__btn" onclick="OpenOverview(this)"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                </div>
                <div id="Live" class="Profile__About__Edit">
                    <div id="EditArea">
                        <div class="EditGroup" id="edit__University">
                            <input type="text" name="University" id="" class="textArea" placeholder="School"></input type="text">
                        </div>
                        <div class="EditGroup" id="edit__Description">
                            <input type="text" name="Description" id="" class="textArea" placeholder="Description"></input type="text">
                        </div>
                        <div class="EditGroup" id="edit__btn">
                            <div id="Year">
                                <a id="Yeartext">From</a>
                                <select class="btn" name="Year" id="YearSelect">
                                    <option value="0">Year</option>
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                </select>
                                <a id="Yeartext">to</a>
                                <select class="btn" name="Year" id="YearSelect">
                                    <option value="0">Year</option>
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                </select>
                                <div id="Graduated">
                                    <input type="checkbox" name="Graduated" id="Graduated">Graduated</input type="checkbox">
                                </div>
                            </div>
                            <div id="Privacy">
                                <select class="btn" name="privacy" id="privacybtn">
                                    <option value="0">Privacy</option>
                                    <option value="1">Public</option>
                                    <option value="2">Friends</option>
                                    <option value="3">Only me</option>
                                </select>
                                <div id="save1" class="save">
                                    <button class="btn" id="save" onclick="CloseOverview(this)">Save</button>
                                </div>
                                <div id="cancel1" class="cancel">
                                    <button class="btn" id="cancel" onclick="CloseOverview(this)">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Overview__Content">
                    <i class="fa fa-map-marker" aria-hidden="true"> Đến từ</i>
                    <button id="Overview__Content__home" class="Overview__Content__btn"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                </div>
                <div class="Overview__Content">
                    <i class="fa fa-heart" aria-hidden="true"> Đang</i>
                    <button id="Overview__Content__address" class="Overview__Content__btn"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                </div>
                <div class="Overview__Content">
                    <i class="fa fa-phone" aria-hidden="true"> Số điện thoại</i>
                    <button id="Overview__Content__phone" class="Overview__Content__btn"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                </div>
            </div>


            <div id="WorkAndEducation" class="Profile__About">

                <div id="Work" class="Container">

                    <div class="Title">
                        <p>Work</p>
                    </div>
                    <div id="Overview__edit__Work" class="Profile__About__Edit">
                        <div id="EditArea">
                            <div class="EditGroup" id="edit__Company">
                                <input type="text" name="Company" id="" class="textArea" placeholder="Company"></input type="text">
                            </div>
                            <div class="EditGroup" id="edit__Position">
                                <input type="text" name="Position" id="" class="textArea" placeholder="Position"></input type="text">
                            </div>
                            <div class="EditGroup" id="edit__Location">
                                <input type="text" name="Location" id="" class="textArea" placeholder="City/Town"></input type="text">
                            </div>
                            <div class="EditGroup" id="edit__Description">
                                <input type="text" name="Description" id="" class="textArea" placeholder="Description"></input type="text">
                            </div>
                            <div class="EditGroup" id="edit__btn">
                                <div id="Year">
                                    <a id="Yeartext">From</a>
                                    <select class="btn" name="Year" id="YearSelect">
                                        <option value="0">Year</option>
                                        <option value="2024">2024</option>
                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                    </select>
                                </div>
                                <div id="Privacy">
                                    <select class="btn" name="privacy" id="privacybtn">
                                        <option value="0">Privacy</option>
                                        <option value="1">Public</option>
                                        <option value="2">Friends</option>
                                        <option value="3">Only me</option>
                                    </select>
                                    <div  class="save">
                                        <button class="btn" id="save">Save</button>
                                    </div>
                                    <div class="cancel">
                                        <button class="btn" id="cancel">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Add">
                        <div class="icon">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        </div>
                        <div class="text">
                            <a>Add a workplace</a>
                        </div>
                    </div>
                    <div class="Detail">
                        <div class="img">
                            <i class="fa fa-building-o" aria-hidden="true"> </i>
                            <div class="contentContainer">
                                <a>Sinh Viên tại <a>Đại học Bách Khoa Hà Nội</a></a>
                            </div>
                        </div>
                        <div class="content">
                            <div id="position"></div>
                            <div id="company"></div>
                            <div id="editIcon">
                                <button id="editBtn" class=""><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="University" class="Container">

                    <div class="Title">
                        <p>University</p>
                    </div>

                    <div id="Overview__edit__University" class="Profile__About__Edit">
                        <div id="EditArea">
                            <div class="EditGroup" id="edit__University">
                                <input type="text" name="University" id="" class="textArea" placeholder="School"></input type="text">
                            </div>
                            <div class="EditGroup" id="edit__Description">
                                <input type="text" name="Description" id="" class="textArea" placeholder="Description"></input type="text">
                            </div>
                            <div class="EditGroup" id="edit__Degree">
                                <input type="text" name="Degree" id="" class="textArea" placeholder="Degree"></input type="text">
                            </div>
                            <div class="EditGroup" id="edit__Concentrations">
                                <input type="text" name="Concentrations" id="" class="textArea" placeholder="Concentrations"></input type="text">
                            </div>
                            <div class="EditGroup" id="edit__btn">
                                <div id="Year">
                                    <a id="Yeartext">From</a>
                                    <select class="btn" name="Year" id="YearSelect">
                                        <option value="0">Year</option>
                                        <option value="2024">2024</option>
                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                    </select>
                                    <a id="Yeartext">to</a>
                                    <select class="btn" name="Year" id="YearSelect">
                                        <option value="0">Year</option>
                                        <option value="2024">2024</option>
                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                    </select>
                                    <div id="Graduated">
                                        <input type="checkbox" name="Graduated" id="Graduated">Graduated</input type="checkbox">
                                    </div>
                                </div>
                                <div id="Privacy">
                                    <select class="btn" name="privacy" id="privacybtn">
                                        <option value="0">Privacy</option>
                                        <option value="1">Public</option>
                                        <option value="2">Friends</option>
                                        <option value="3">Only me</option>
                                    </select>
                                    <div class="save">
                                        <button class="btn" id="save">Save</button>
                                    </div>
                                    <div class="cancel">
                                        <button class="btn" id="cancel">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Add">
                        <div class="icon">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        </div>
                        <div class="text">
                            <a>Add a university</a>
                        </div>
                    </div>
                    <div class="Detail">

                    </div>
                </div>

                <div id="HighSchool" class="Container">
                    <div class="Title">
                        <p>High school</p>
                    </div>
                    <div id="Overview__edit__HighSchool" class="Profile__About__Edit">
                        <div id="EditArea">
                            <div class="EditGroup" id="edit__University">
                                <input type="text" name="University" id="" class="textArea" placeholder="School"></input type="text">
                            </div>
                            <div class="EditGroup" id="edit__Description">
                                <input type="text" name="Description" id="" class="textArea" placeholder="Description"></input type="text">
                            </div>
                            <div class="EditGroup" id="edit__btn">
                                <div id="Year">
                                    <a id="Yeartext">From</a>
                                    <select class="btn" name="Year" id="YearSelect">
                                        <option value="0">Year</option>
                                        <option value="2024">2024</option>
                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                    </select>
                                    <a id="Yeartext">to</a>
                                    <select class="btn" name="Year" id="YearSelect">
                                        <option value="0">Year</option>
                                        <option value="2024">2024</option>
                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                    </select>
                                    <div id="Graduated">
                                        <input type="checkbox" name="Graduated" id="Graduated">Graduated</input type="checkbox">
                                    </div>
                                </div>
                                <div id="Privacy">
                                    <select class="btn" name="privacy" id="privacybtn">
                                        <option value="0">Privacy</option>
                                        <option value="1">Public</option>
                                        <option value="2">Friends</option>
                                        <option value="3">Only me</option>
                                    </select>
                                    <div class="save">
                                        <button class="btn" id="save">Save</button>
                                    </div>
                                    <div class="cancel">
                                        <button class="btn" id="cancel">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Add">
                        <div class="icon">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        </div>
                        <div class="text">
                            <a>Add a High school</a>
                        </div>
                    </div>
                    <div class="Detail">

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="resources/js/Profile.js"></script>
</body>

</html>