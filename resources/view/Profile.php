<?php include_once 'header.php';
$UserId = 1;
$SessionId = 1;
$userName = "Dang Minh";
$UserWork = "Công ty Nước Sạch Hà Nội";
$UserPosition = "Giám đốc";
$UserUniversity = "Đại học Bách Khoa Hà Nội";
$UniversityStatus = "Đã học";
$HighschoolStatus = "Đã học";
$UserHighSchool = "Trường THPT Chuyên Khoa Học Tự Nhiên";
$UserLive = "Hà Nội";
$UserHomeTown = "Hà Nội";
$UserRelationship = "Độc thân";
$UserPhone = "0123456789";
$UserEmail = "abc@gmail.com";
$UserGender = 1;
$UserBirthdate = 3;
$UserBirthmonth = 3;
$UserBirthyear = 2005;


?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="resources/css/Profile.css">
</head>

<body>


    <!-- phần đầu profile -->


    <div class="Profile" id="Profile">
        <div class="outside" id="outside">
            <div class="Profile__header" id="Profile__header">
                <div class="Profile__header__cover" id="Profile__header__cover">
                    <i id="icon1" class="fa fa-camera" style="font-size:24px" onclick="openChangeForm1()"></i>
                    <div class="Profile__header__cover__img">
                        <img src="resources/image/Profileimg/bia.jpg" id="cover" class="cover" alt="Cover">
                    </div>
                </div>
            </div>
            <div class="Profile__header__avatar" id="Profile__header__avatar">
                <img src="resources/image/Profileimg/avatar.jpg" id="avatar" class="img-thumbnail" alt="Avatar">
                <i id="icon2" class="fa fa-camera" style="font-size:24px" onclick="openChangeForm()"></i>
                <div id="ChangeCover">
                    <div id="modalBackGround1">
                        <div class="ChangeCoverForm">
                            <button type="button" id="closeNewPostForm" onclick="closeChangeForm1()">&times;</button>
                            <h2>Đổi ảnh bìa </h2>
                            <form method="post" action="ChangeCover" enctype="multipart/form-data">
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

                                    <button type="button" id="deleteFileForNewCover" onclick="deleteFile()">&times;</button>

                                    <button type="button" id="selectFileForNewCover" onclick="importFile()">
                                        <img src="resources/image/pictureIcon.png" alt="picture"><br>
                                        <p>Thêm ảnh/video</p>
                                    </button>
                                    <div id="previewNewPostFile"></div>
                                </div>
                                <!-- Đăng/Hủy bài viết-->
                                <div class="btnContainer">
                                    <button type="submit" name="submit" id="uploadNewCover" onclick="">Đăng</button>
                                    <button type="reset" id="resetNewPost" onclick="deleteCreatingPost()">Hủy</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
                <h2 id="Username" class="name"> <?php echo $userName ?> </h2>
                <div id="Profile_Header_Button" class="Profile_Header_Button">
                    <?php if ($SessionId == $UserId) {  ?>
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
                        <button id="button_ProfilePost" class="ProfileChangePage"> Bài viết</button>
                    </li>
                    <li>
                        <button id="button_ProfileAbout" class="ProfileChangePage">Giới thiệu</button>
                    </li>
                    <li>
                        <button id="button_anh" class="ProfileChangePage">Ảnh</button>
                    </li>
                    <li>
                        <button id="button_banbe" class="ProfileChangePage">Bạn bè</button>
                    </li>
                    <li>
                        <button id="button_video" class="ProfileChangePage">Video</button>
                    </li>
                    <li>
                        <button id="button_xemthem" class="ProfileChangePage">Xem thêm</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Phần bài viết của trang Profile -->


    <div id="ProfilePost" class="Profile2">
        <div id="Intro" class="ProfilePart2">
            <p class="Intro__Detail" id="Intro_gioithieu">Giới thiệu</p>
            <p class="Intro__Detail" id="Intro_nickname">Dien tu vien thong</p>
            <div class="Intro__Edit" id="Intro__Edit">
                <form id="Intro__EditArea" action="" method="POST">
                    <div class="edit" id="textArea">
                        <textarea name="Intro" id="Intro__Edit__textArea" class="textArea" placeholder="Tiểu sử"></textarea>
                    </div>
                    <div class="Intro__Edit" id="Intro__Btn">
                        <button name="submit" type="submit" id="save" class="btn btn-primary" onclick="CloseIntro()">Save</button>
                        <button id="cancel" class="btn btn-primary" onclick="CloseIntro()">Cancel</button>
                    </div>
                </form>
            </div>



            <a class="Intro__Detail" name="Intro_Edit" id="editBtn" class="btn btn-primary" href="#" role="button" onclick="OpenIntro__EditArea(this)">Chỉnh sửa tiểu sử</a>
            <p class="Intro__Detail" id="Intro_Address" class="Intro_Detail">
                <i class="fa fa-map-marker" aria-hidden="true"> Hà Nội </i>
            </p>
            <p class="Intro__Detail" id="Intro_Relationship" class="Intro_Detail">
                <i class="fa fa-heart" aria-hidden="true"></i> Độc thân
            </p>
            <p class="Intro__Detail" id="Intro_Ig" class="Intro_Detail">
                <i class="fa fa-instagram" aria-hidden="true"> dang___minh</i>
            </p>
            <a name="Intro_EditDetail" id="editDetailBtn" class="btn btn-primary" href="#" role="button" onclick="CloseIntro__EditArea(this)">Chỉnh sửa chi tiết</a>
        </div>
        <div id="Profile_Post" class="ProfilePart2">
            <div id="PostList" class="ProfilePost">
                <?php include_once 'postedList.php' ?>
            </div>
        </div>
    </div>


    <!--  Phần giới thiệu của Profile -->



    <div id="ProfileAbout" class="Profile2">

        <div id="Profile__About__Btn" class="">
            <div class="Profile2_AboutPage_Inside">
                <p id="About">Giới thiệu</p>
            </div>
            <div id="Profile2_AboutPage_menu" class="">
                <ul>
                    <li>
                        <button id="button__Overview" class="Intro__button"> Tổng quan</button>
                    </li>
                    <li>
                        <button id="button__WorkAndEducation" class="Intro__button">Công việc và học vấn</button>
                    </li>
                    <li>
                        <button id="button__PlacesLive" class="Intro__button">Nơi từng sống</button>
                    </li>
                    <li>
                        <button id="button__Contact" class="Intro__button">Thông tin liên hệ và cơ bản</button>
                    </li>
                    <li>
                        <button id="button__FamilyAndRelationship" class="Intro__button">Gia đình và các mối quan hệ</button>
                    </li>

                    <li>
                        <button id="button__Events" class="Intro__button">Sự kiện trong đời</button>
                    </li>
                </ul>
            </div>
        </div>

        <div id="Profile__About__Content">

            <!-- Profile__About__Overview -->

            <!-- Phần button -->
            <div id="Overview" class="Profile__About">
                <div class="Overview__Content" id="workingContainer">
                    <?php if ($UserWork != "") { ?>
                        <i class="fa fa-briefcase" aria-hidden="true"> <?php echo $UserPosition ?> tại <?php echo $UserWork ?></i>
                    <?php } else { ?>
                        <i class="fa fa-briefcase" aria-hidden="true"> Chưa có thông tin về công việc</i>
                    <?php } ?>
                    <button id="Overview__Content__working" class="Overview__Content__btn" onclick="OpenOverview(this)"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                    <div id="working" class="Profile__About__Edit">
                        <form action="" method="Post">
                            <div class="EditArea">
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
                                            <button class="btn" id="save" onclick="CloseOverview(this)">Save</button>
                                        </div>
                                        <div class="cancel">
                                            <button class="btn" id="cancel" onclick="CloseOverview(this)">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

                <!-- phần Overview__HighSchool     -->


                <div id="HighSchoolContainer" class="Overview__Content">
                    <?php if ($UserHighSchool != "") { ?>
                        <i id="Overview__Content__study" class="fa fa-graduation-cap" aria-hidden="true"> <?php echo $HighschoolStatus ?> tại <?php echo $UserHighSchool ?></i>
                    <?php } else { ?>
                        <i id="Overview__Content__study" class="fa fa-graduation-cap" aria-hidden="true"> Chưa có thông tin về trường học</i>
                    <?php } ?>
                    <button id="Overview__Content__HighSchool" class="Overview__Content__btn" onclick="OpenOverview(this)"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true""></i></button>
                    <div id=" HighSchool" class="Profile__About__Edit">
                            <form action="" method="Post">
                                <div class="EditArea">
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
                            </form>

                </div>




            </div>

            <div class="Overview__Content" id="LiveContainer">
                <?php if ($UserLive != "") { ?>
                    <i class="fa fa-home" aria-hidden="true"> Sống tại <?php echo $UserLive ?></i>
                <?php } else { ?>
                    <i class="fa fa-homearia-hidden=" true"> Chưa có thông tin về nơi sống</i>
                <?php } ?>
                <button id="Overview__Content__Live" class="Overview__Content__btn" onclick="OpenOverview(this)"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                <div id="Live" class="Profile__About__Edit">
                    <form action="" method="Post">
                        <div class="EditArea">
                            <div class="EditGroup" id="edit__University">
                                <input type="text" name="University" id="" class="textArea" placeholder="CurrentCity"></input type="text">
                            </div>
                            <div class="EditGroup" id="edit__btn">
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
                    </form>

                </div>
            </div>

            <div class="Overview__Content" id="HomeTownContainer">
                <?php if ($UserHomeTown != "") { ?>
                    <i class="fa fa-map-marker" aria-hidden="true"> Đến từ <?php echo $UserHomeTown ?></i>
                <?php } else { ?>
                    <i class="fa fa-map-marker" aria-hidden="true"> Chưa có thông tin về quê quán</i>
                <?php } ?>
                <button id="Overview__Content__HomeTown" class="Overview__Content__btn" onclick="OpenOverview(this)"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                <div id="HomeTown" class="Profile__About__Edit">
                    <form action="" method="Post">
                        <div class="EditArea">
                            <div class="EditGroup" id="edit__University">
                                <input type="text" name="University" id="" class="textArea" placeholder="HomeTown"></input type="text">
                            </div>
                            <div class="EditGroup" id="edit__btn">
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
                    </form>

                </div>
            </div>

            <div class="Overview__Content" id="RelationshipContainer">
                <?php if ($UserRelationship != "") { ?>
                    <i class="fa fa-heart" aria-hidden="true"> Đang <?php echo $UserRelationship ?></i>
                <?php } else { ?>
                    <i class="fa fa-heart" aria-hidden="true"> Chưa có thông tin về mối quan hệ</i>
                <?php } ?>
                <button id="Overview__Content__Relationship" class="Overview__Content__btn" onclick="OpenOverview(this)"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                <div class="Profile__About__Edit" id="Relationship">
                    <form action="" method="Post">
                        <div class="EditArea">
                            <select class="EditGroup" name="RelationshipValue" id="RelationshipValue">
                                <option value="0">Single</option>
                                <option value="1">In a relationship</option>
                                <option value="2">Engaged</option>
                                <option value="3">Married</option>
                                <option value="4">It's complicated</option>
                                <option value="5">Separated</option>
                                <option value="6">Divorced</option>
                                <option value="7">Widowed</option>
                            </select>
                            <div class="EditGroup" id="edit__Description">
                                <input type="text" name="Description" id="" class="textArea" placeholder="Partner"></input type="text">
                            </div>
                            <div class="EditGroup" id="edit__btn">
                                <div id="Year">
                                    <a id="Yeartext">Since</a>
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
                                        <button class="btn" id="save" onclick="CloseOverview(this)">Save</button>
                                    </div>
                                    <div class="cancel">
                                        <button class="btn" id="cancel" onclick="CloseOverview(this)">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <div class="Overview__Content" id="PhoneContainer">
                <?php if ($UserPhone != "") { ?>
                    <i class="fa fa-phone" aria-hidden="true"> Số điện thoại <?php echo $UserPhone ?></i>
                <?php } else { ?>
                    <i class="fa fa-phone" aria-hidden="true"> Chưa có thông tin về số điện thoại</i>
                <?php } ?>
                <button id="Overview__Content__Phone" class="Overview__Content__btn" onclick="OpenOverview(this)"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                <div id="Phone" class="Profile__About__Edit">
                    <form action="" method="Post">
                        <div class="EditArea">
                            <div class="EditGroup" id="edit__Description">
                                <input type="text" name="Description" id="" class="textArea" placeholder="Phone"></input type="text">
                            </div>
                            <div class="EditGroup" id="edit__btn">
                                <div id="Privacy">
                                    <select class="btn" name="privacy" id="privacybtn">
                                        <option value="0">Privacy</option>
                                        <option value="1">Public</option>
                                        <option value="2">Friends</option>
                                        <option value="3">Only me</option>
                                    </select>
                                    <div class="save">
                                        <button class="btn" id="save" onclick="CloseOverview(this)">Save</button>
                                    </div>
                                    <div class="cancel">
                                        <button class="btn" id="cancel" onclick="CloseOverview(this)">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <!-- Phần About and education -->

        <div id="WorkAndEducation" class="Profile__About">

            <div id="Work" class="Container">
                <div class="Title">
                    <p>Work</p>
                </div>
                <div id="working2" class="Profile__About__Edit">
                    <form method="Post">
                        <div class="EditArea">
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
                                        <button class="btn" id="save" onclick="CloseOverview(this)">Save</button>
                                    </div>
                                    <div class="cancel">
                                        <button class="btn" id="cancel" onclick="CloseOverview(this)">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="Add">
                    <div class="icon">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </div>
                    <div class="text">
                        <a id="Overview__Content__working2" class="EditButton" onclick="OpenOverview(this)">Add a workplace</a>
                    </div>
                </div>
                <div class="Detail">
                    <div class="img">
                        <i class="fa fa-building-o" aria-hidden="true"> </i>
                        <div class="contentContainer">
                            <?php if ($UserWork != "" || $UserPosition != "") { ?>
                                <a><?php echo $UserPosition ?> tại <a> <?php echo $UserWork ?></a>
                                <?php } else { ?>
                                    <a>Chưa có thông tin về công việc</a>
                                <?php } ?>
                        </div>
                    </div>
                    <div class="content">
                        <div id="editIcon">
                            <button id="Overview__Content__working2" class="EditButton" onclick="OpenOverview(this)"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>


            <div id="College" class="Container">

                <div class="Title">
                    <p>College</p>
                </div>
                <div id="CollegeEdit" class="Profile__About__Edit">
                    <div class="EditArea">
                        <div class="EditGroup" id="edit__College">
                            <input type="text" name="CollegeName" id="" class="textArea" placeholder="CollegeName"></input type="text">
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
                                    <button class="btn" id="save" onclick="CloseOverview(this)">Save</button>
                                </div>
                                <div class="cancel">
                                    <button class="btn" id="cancel" onclick="CloseOverview(this)">Cancel</button>
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
                        <a id="Overview__Content__CollegeEdit" class="EditButton" onclick="OpenOverview(this)">Add a workplace</a>
                    </div>
                </div>
                <div class="Detail">
                    <div class="img">
                        <i class="fa fa-university" aria-hidden="true"> </i>
                        <div class="contentContainer">
                            <?php if ($UserUniversity != "") { ?>
                                <a><?php echo $UniversityStatus ?> tại <a> <?php echo $UserUniversity ?></a>
                                <?php } else { ?>
                                    <a>Chưa có thông tin về đại học</a>
                                <?php } ?>
                        </div>
                    </div>
                    <div class="content">
                        <div id="editIcon">
                            <button id="Overview__Content__CollegeEdit" class="EditButton" onclick="OpenOverview(this)"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="HighSchool" class="Container">

                <div class="Title">
                    <p>HighSchool</p>
                </div>
                <div id="HighSchoolEdit" class="Profile__About__Edit">
                    <div class="EditArea">
                        <div class="EditGroup" id="edit__HighSchool">
                            <input type="text" name="HighSchoolName" id="" class="textArea" placeholder="HighSchoolName"></input type="text">
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
                                    <button class="btn" id="save" onclick="CloseOverview(this)">Save</button>
                                </div>
                                <div class="cancel">
                                    <button class="btn" id="cancel" onclick="CloseOverview(this)">Cancel</button>
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
                        <a id="Overview__Content__HighSchoolEdit" class="EditButton" onclick="OpenOverview(this)">Add a workplace</a>
                    </div>
                </div>
                <div class="Detail">
                    <div class="img">
                        <i class="fa fa-graduation-cap" aria-hidden="true"> </i>
                        <div class="contentContainer">
                            <?php if ($UserHighSchool != "") { ?>
                                <a><?php echo $HighschoolStatus ?> tại <a> <?php echo $UserHighSchool ?></a>
                                <?php } else { ?>
                                    <a>Chưa có thông tin về trường học </a>
                                <?php } ?>
                        </div>
                    </div>
                    <div class="content">
                        <div id="editIcon">
                            <button id="Overview__Content__HighSchoolEdit" class="EditButton" onclick="OpenOverview(this)"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Phan Places Live -->
        <div id="PlacesLive" class="Profile__About">

            <div id="Live" class="Container">
                <div class="Title">
                    <p>Places Lived</p>
                </div>
                <div id="PlacesLiveEdit" class="Profile__About__Edit">
                    <form method="Post">
                        <div class="EditArea">
                            <div class="EditGroup" id="edit__Company">
                                <input type="text" name="Places" id="" class="textArea" placeholder="City"></input type="text">
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
                                        <button class="btn" id="save" onclick="CloseOverview(this)">Save</button>
                                    </div>
                                    <div class="cancel">
                                        <button class="btn" id="cancel" onclick="CloseOverview(this)">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="Add">
                    <div class="icon">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </div>
                    <div class="text">
                        <a id="Overview__Content__PlacesLiveEdit" class="EditButton" onclick="OpenOverview(this)">Add a workplace</a>
                    </div>
                </div>
                <div class="Detail">
                    <div class="img">
                        <div class="contentContainer">
                            <?php if ($UserLive != "") { ?>
                                <i class="fa fa-home" aria-hidden="true"> Sống tại <?php echo $UserLive ?></i>
                            <?php } else { ?>
                                <i class="fa fa-homearia-hidden=" true"> Chưa có thông tin về nơi sống</i>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="content">
                        <div id="editIcon">
                            <button id="Overview__Content__PlacesLiveEdit" class="EditButton" onclick="OpenOverview(this)"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Phan Contact -->
        <div id="Contact" class="Profile__About">

            <div id="ContactInfo" class="Container">
                <div class="Title">
                    <p>Contact Info</p>
                </div>
                <div id="ContactInfoEdit" class="Profile__About__Edit">
                    <div class="EditArea">
                        <form action="" method="Post">
                            <div class="EditGroup" id="edit__Phone">
                                <input type="text" name="Phone" id="" class="textArea" placeholder="Phone"></input type="text">
                            </div>

                            <div class="EditGroup" id="edit__btn">
                                <div id="Privacy">
                                    <select class="btn" name="privacy" id="privacybtn">
                                        <option value="0">Privacy</option>
                                        <option value="1">Public</option>
                                        <option value="2">Friends</option>
                                        <option value="3">Only me</option>
                                    </select>
                                    <div class="save">
                                        <button class="btn" id="save" onclick="CloseOverview(this)">Save</button>
                                    </div>
                                    <div class="cancel">
                                        <button class="btn" id="cancel" onclick="CloseOverview(this)">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="Add">
                    <div class="icon">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </div>
                    <div class="text">
                        <a id="Overview__Content__ContactInfoEdit" onclick="OpenOverview(this)">Add a workplace</a>
                    </div>
                </div>
                <div class="Detail">
                    <div class="img">
                        <div class="contentContainer">
                            <?php if ($UserPhone != "") { ?>
                                <i class="fa fa-phone" aria-hidden="true"> Số điện thoại <?php echo $UserPhone ?></i>
                            <?php } else { ?>
                                <i class="fa fa-phone" aria-hidden="true"> Chưa có thông tin về số điện thoại</i>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="content">
                        <div id="editIcon">
                            <button id="Overview__Content__ContactInfoEdit" class="EditButton" onclick="OpenOverview(this)"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="Email" class="Container">

                <div class="Title">
                    <p>Email</p>
                </div>
                <div id="EmailEdit" class="Profile__About__Edit">
                    <form action="" method="Post">
                        <div class="EditArea">
                            <div class="EditGroup" id="edit__Email">
                                <input type="text" name="Email" id="" class="textArea" placeholder="Email"></input type="text">
                            </div>

                            <div class="EditGroup" id="edit__btn">
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
                    </form>

                </div>
                <div class="Add">

                    <div class="icon">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </div>

                    <div class="text">
                        <a id="Overview__Content__EmailEdit" class="Overview__Content__btn" onclick="OpenOverview(this)">Add a Phone</a>
                    </div>
                </div>
                <div class="Detail">
                    <?php if ($UserEmail != "") { ?>
                        <i class="fa fa-envelope-o" aria-hidden="true"> Email <?php echo $UserEmail ?></i>
                    <?php } else { ?>
                        <i class="fa fa-envelope-o" aria-hidden="true"> Chưa có thông tin về Email</i>
                    <?php } ?>

                    <div class="content">
                        <div id="editIcon">
                            <button id="Overview__Content__ContactInfoEdit" class="EditButton" onclick="OpenOverview(this)"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="BasicInfo" class="Container">

                <div class="Title">
                    <p>Basic Info</p>
                </div>
                <div id="BasicInfoEdit" class="Profile__About__Edit">
                    <form action="" method="Post">
                        <div class="EditArea">
                            <div class="EditGroup" id="edit__Day">
                                <input type="text" name="University" id="" class="textArea" placeholder="Day"></input type="text">
                            </div>
                            <div class="EditGroup" id="edit__Month">
                                <input type="text" name="Description" id="" class="textArea" placeholder="Month"></input type="text">
                            </div>
                            <div class="EditGroup" id="edit__Year">
                                <input type="text" name="Description" id="" class="textArea" placeholder="Year"></input type="text">
                            </div>
                            <div class="EditGroup" id="edit__btn">
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
                    </form>

                </div>
                <div class="Add">

                    <div class="icon">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </div>

                    <div class="text">
                        <a id="Overview__Content__BasicInfoEdit" class="Overview__Content__btn" onclick="OpenOverview(this)">Add basic info</a>
                    </div>
                </div>
                <div class="Detail">
                    <div>
                        <?php if ($UserGender != "") { ?>
                            <i class="fa fa-genderless" aria-hidden="true"></i>
                            <?php if ($UserGender == 1) echo "Male";
                            else echo "Female" ?></i>
                        <?php } else { ?>
                            <i class="fa fa-genderless" aria-hidden="true"> Chưa có thông tin về giới tính</i>
                        <?php } ?>
                    </div>
                    <div>
                        <?php if ($UserBirthdate != "" && $UserBirthmonth != "" && $UserBirthyear != "") { ?>
                            <i class="fa fa-birthday-cake" aria-hidden="true"> Ngày sinh <?php echo $UserBirthdate ?> / <?php echo $UserBirthmonth ?> / <?php echo $UserBirthyear ?></i>
                        <?php } else { ?>
                            <i class="fa fa-birthday-cake" aria-hidden="true"> Chưa có thông tin về ngày sinh</i>
                        <?php } ?>
                    </div>
                    <div class="content">
                        <div id="editIcon">
                            <button id="Overview__Content__ContactInfoEdit" class="EditButton" onclick="OpenOverview(this)"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Phan FamilyAndRelationship -->
        <div id="FamilyAndRelationship" class="Profile__About">

            <div id="Relationship" class="Container">

                <div class="Title">
                    <p>Relationship</p>
                </div>
                <div id="RelationshipEdit" class="Profile__About__Edit">
                    <div class="EditArea">
                        <form action="" method="Post">
                            <div class="EditGroup" id="edit__btn">
                                <div id="Year">
                                    <a id="Yeartext">From</a>
                                    <select class="btn" name="RelationshipSelect" id="RelationshipSelect">
                                        <option value="Độc thân">Độc thân</option>
                                        <option value="Đang hẹn hò">Đang hẹn hò</option>
                                        <option value="Đang trong mối quan hệ phức tạp">Đang trong mối quan hệ phức tạp</option>
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
                                        <button class="btn" id="save" onclick="CloseOverview(this)">Save</button>
                                    </div>
                                    <div class="cancel">
                                        <button class="btn" id="cancel" onclick="CloseOverview(this)">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="Add">
                    <div class="icon">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </div>
                    <div class="text">
                        <a id="Overview__Content__RelationshipEdit" onclick="OpenOverview(this)">Add a relationship</a>
                    </div>
                </div>
                <div class="Detail">
                    <div class="img">
                        <div class="contentContainer">
                            <?php if ($UserRelationship != "") { ?>
                                <i class="fa fa-heart" aria-hidden="true"><?php echo $UserRelationship ?></i>
                            <?php } else { ?>
                                <i class="fa fa-heart" aria-hidden="true"> Chưa có thông tin về mối quan hệ</i>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="content">
                        <div id="editIcon">
                            <button id="Overview__Content__RelationshipEdit" class="EditButton" onclick="OpenOverview(this)"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="FamilyMembers" class="Container">

                <div class="Title">
                    <p>Family Members</p>
                </div>
                <div id="FamilyMembersEdit" class="Profile__About__Edit">
                    <form action="" method="Post">
                        <div class="EditArea">
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
                    </form>

                </div>
                <div class="Add">

                    <div class="icon">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </div>

                    <div class="text">
                        <a id="Overview__Content__FamilyMembersEdit" class="Overview__Content__btn" onclick="OpenOverview(this)">Add a university</a>
                    </div>
                </div>
                <div class="Detail">

                </div>
            </div>

        </div>

        <!-- Phan Events -->
        <div id="Events" class="Profile__About">
            <div id="LifeEvents" class="Container">

                <div class="Title">
                    <p>Life Events</p>
                </div>
                <div id="LifeEventsEdit" class="Profile__About__Edit">
                    <div class="EditArea">
                        <form action="" method="Post">
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
                                        <button class="btn" id="save" onclick="CloseOverview(this)">Save</button>
                                    </div>
                                    <div class="cancel">
                                        <button class="btn" id="cancel" onclick="CloseOverview(this)">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="Add">
                    <div class="icon">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </div>
                    <div class="text">
                        <a id="Overview__Content__LifeEventsEdit" onclick="OpenOverview(this)">Add a workplace</a>
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
                            <button id="Overview__Content__working2" class="EditButton" onclick="OpenOverview(this)"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>






    <div class="Profile2" id="FriendsContainer">
        <div id="Title">
            <p>Bạn bè</p>
        </div>
        <div id="menu">
            <ul>
                <li>
                    <button class="Friend__button" id="button__AllFriend">Tất cả bạn bè</button>
                </li>
                <li>
                    <button class="Friend__button" id="button__Recently">Bạn bè mới thêm</button>
                </li>
                <li>
                    <button class="Friend__button" id="Request">Lời mời kết bạn</button>
                </li>
            </ul>
        </div>
        <div id="FriendList">
            <?php foreach ($FriendId as $i) { ?>


            <?php } ?>
        </div>
    </div>











    <!-- Phan Photos cua Profile -->

    <div id="Profile2__PhotosPage" class="Profile2">
        <div id="Photos" class="PhotosPage">
            <div id="btnContainer" class="btnContainer">
                <ul>
                    <li>
                        <button class="btn" id="btn__OfYou" onclick="">Of You</button>
                    </li>
                    <li>
                        <button class="btn" id="btn__YourPhotos" onclick="">Your Photos</button>
                    </li>
                    <li>
                        <button class="btn" id="btn__Album" onclick="">Album</button>
                    </li>
                </ul>
            </div>
            <div id="contentContainer" class="PhotosPage">

            </div>
        </div>
    </div>

    <script src="resources/js/Profile.js"></script>
</body>

</html>