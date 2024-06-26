<?php include_once 'header.php';
$UserId = 1;
$SessionId = 1;
// $userName = $user['user_name'];
// Giả định $userDetail được dự định chứa thông tin chi tiết
// và là mảng đầu tiên được in ra trong đầu ra
// $UserWork = $userDetail[0]['occupation']; // Truy cập phần tử đầu tiên của $userDetail
// $UserEducation = $user['education_level'];
// $UserLive = $user['lives_in'];
// $UserHomeTown = "Hà Nội";
// $UserRelationship = $user['relationship'];
// $UserPhone = $user['mobile_no']; // Truy cập từ $user dựa trên đầu ra được in
// $UserEmail = $user['email']; // Truy cập từ $user
// $UserGender = $user['gender']; // Truy cập từ $user
// $UserBirthdate = $user['birth_date']; // Truy cập từ $user

// Thông tin của người dùng hiện tại

$UserName = $user['user_name'];
$UserId = 1;
$Occupation = $userDetail[0]['occupation'];
$EducationLevel = $userDetail[0]['education_level'];
$LivesIn = $userDetail[0]['lives_in'];
$Relationship = $userDetail[0]['relationship'];
$MobileNo = $user['mobile_no'];
$Email = $user['email'];
$Gender = $user['gender'];
$Birthdate = $user['birth_date'];

// echo '<pre>';
// print_r($userDetail);
// print_r($dataid);
// print_r($user);
// echo '</pre>';
?>
<head>

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
                    <i id="icon1" class="fa fa-camera" style="font-size:24px" onclick="openChangeFormCover()"></i>
                    <div class="Profile__header__cover__img">
                        <img src="resources/image/Profileimg/bia<?php echo $UserId ?>.jpg" id="cover" class="cover" alt="Cover">
                    </div>
                </div>
            </div>
            <div class="Profile__header__avatar" id="Profile__header__avatar">
                <?php echo'<img src="'.$UserAvatar.'" id="avatar" class="img-thumbnail" alt="Avatar">'; ?>
                <i id="icon2" class="fa fa-camera" style="font-size:24px" onclick="openChangeFormAva()"></i>

                <!--------------------------->
                <!-- Thẻ form thay ảnh bìa -->
                <!--------------------------->
                <div id="ChangeCover">
                    <div id="modalBackGroundCover">
                        <div class="ChangeCoverForm">
                            <button type="button" id="closeNewCoverForm" onclick="closeChangeFormCover()">&times;</button>
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
                                        <select name="newCoverPrivacy" id="newCoverPrivacy">
                                            <option value="public" selected>Công khai</option>
                                            <option value="private">Chỉ tôi</option>
                                            <option value="friendOnly">Bạn bè</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Nội dung text của bài viết -->
                                <textarea name="newCoverCaption" id="newCoverCaption" placeholder="Hãy nói gì đó về ảnh bìa của bạn ?"></textarea>
                                <!-- Nội dung hình ảnh/video -->
                                <div class="containerForFile">
                                    <input type="file" id="newCoverFileInput" name="newCoverFileInput" accept=".png, .jpg, .bmp, .jpeg, .gif, .ico, .psd, .mp4, .wmv, .mov, .avi, .flv">

                                    <button type="button" id="deleteFileForNewCover" onclick="deleteCoverFile()">&times;</button>

                                    <button type="button" id="selectFileForNewCover" onclick="importCoverFile()">
                                        <img src="resources/image/pictureIcon.png" alt="picture"><br>
                                        <p>Thêm ảnh/video</p>
                                    </button>
                                    <div id="previewNewCoverFile"></div>
                                </div>
                                <!-- Đăng/Hủy bài viết-->
                                <div class="btnContainer">
                                    <button type="submit" name="submit" id="uploadNewCover" onclick="">Đăng</button>
                                    <button type="reset" id="resetNewCover" onclick="deleteCreatingCover()">Hủy</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-------------------------->
                <!-- Thẻ form thay Avatar -->
                <!-------------------------->
                <div id="ChangeAvatar">
                    <div id="modalBackGroundAva">
                        <div class="ChangeAvatarForm">
                            <button type="button" id="closeNewAvaForm" onclick="closeChangeFormAva()">&times;</button>
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
                                        <select name="newAvaPrivacy" id="newAvaPrivacy">
                                            <option value="public" selected>Công khai</option>
                                            <option value="private">Chỉ tôi</option>
                                            <option value="friendOnly">Bạn bè</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Nội dung text của bài viết -->
                                <textarea name="newAvaCaption" id="newAvaCaption" placeholder="Hãy nói gì đó về ảnh đại diện của bạn ?"></textarea>
                                <!-- Nội dung hình ảnh/video -->
                                <div class="containerForFile">
                                    <input type="file" id="newAvaFileInput" name="newAvaFileInput" accept=".png, .jpg, .bmp, .jpeg, .gif, .ico, .psd, .mp4, .wmv, .mov, .avi, .flv">

                                    <button type="button" id="deleteFileForNewAva" onclick="deleteAvaFile()">&times;</button>

                                    <button type="button" id="selectFileForNewAva" onclick="importAvaFile()">
                                        <img src="resources/image/pictureIcon.png" alt="picture"><br>
                                        <p>Thêm ảnh/video</p>
                                    </button>
                                    <div id="previewNewAvaFile"></div>
                                </div>
                                <!-- Đăng/Hủy bài viết-->
                                <div class="btnContainer">
                                    <button type="submit" name="submit" id="uploadNewAvatar" onclick="">Đăng</button>
                                    <button type="reset" id="resetNewAva" onclick="deleteCreatingAva()">Hủy</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <h2 id="Username" class="name"> <?php echo $UserName ?> </h2>
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
                        <button id="button_ProfilePhotos" class="ProfileChangePage">Ảnh</button>
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
                <i class="fa fa-map-marker" aria-hidden="true"> <?php echo $LivesIn ?> </i>
            </p>
            <p class="Intro__Detail" id="Intro_Relationship" class="Intro_Detail">
                <i class="fa fa-heart" aria-hidden="true"></i> <?php echo $Relationship ?>
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



        <div id="Profile__About__Content">

            <!-- Profile__About__Overview -->


            <div id="Overview" class="Profile__About">

                <!-- Phần Overview__Name -->

                <div class="Overview__Content" id="workingContainer">
                    <?php if ($Occupation != "") { ?>
                        <i class="fa fa-briefcase" aria-hidden="true"><?php echo $Occupation ?></i>
                    <?php } else { ?>
                        <i class="fa fa-briefcase" aria-hidden="true"> Chưa có thông tin về công việc</i>
                    <?php } ?>
                    <button id="Overview__Content__working" class="Overview__Content__btn" onclick="OpenOverview(this)"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                </div>

                <!-- phần Overview__HighSchool     -->

                <div id="HighSchoolContainer" class="Overview__Content">
                    <?php if ($EducationLevel != "") { ?>
                        <i id="Overview__Content__study" class="fa fa-graduation-cap" aria-hidden="true"><?php echo $EducationLevel ?></i>
                    <?php } else { ?>
                        <i id="Overview__Content__study" class="fa fa-graduation-cap" aria-hidden="true"> Chưa có thông tin về trường học</i>
                    <?php } ?>
                    <button id="Overview__Content__HighSchool" class="Overview__Content__btn" onclick="OpenOverview(this)"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true""></i></button>
                </div>

                <!-- Phần Overview__Live -->

                <div class=" Overview__Content" id="LiveContainer">
                            <?php if ($LivesIn != "") { ?>
                                <i class="fa fa-home" aria-hidden="true"> Sống tại <?php echo $LivesIn ?></i>
                            <?php } else { ?>
                                <i class="fa fa-homearia-hidden=" true"> Chưa có thông tin về nơi sống</i>
                            <?php } ?>
                            <button id="Overview__Content__Live" class="Overview__Content__btn" onclick="OpenOverview(this)"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                </div>

                <!-- Phần Overview__HomeTown -->

                <div class="Overview__Content" id="HomeTownContainer">
                    <?php if ($Gender != "") { ?>
                        <i class="fa fa-map-marker" aria-hidden="true"> Đến từ <?php echo $Gender ?></i>
                    <?php } else { ?>
                        <i class="fa fa-map-marker" aria-hidden="true"> Chưa có thông tin về quê quán</i>
                    <?php } ?>
                    <button id="Overview__Content__HomeTown" class="Overview__Content__btn" onclick="OpenOverview(this)"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                </div>

                <!-- Phần Overview__Relationship -->

                <div class="Overview__Content" id="RelationshipContainer">
                    <?php if ($Relationship != "") { ?>
                        <i class="fa fa-heart" aria-hidden="true"> Đang <?php echo $Relationship ?></i>
                    <?php } else { ?>
                        <i class="fa fa-heart" aria-hidden="true"> Chưa có thông tin về mối quan hệ</i>
                    <?php } ?>
                    <button id="Overview__Content__Relationship" class="Overview__Content__btn" onclick="OpenOverview(this)"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>

                </div>

                <!-- Phần Overview__Phone -->

                <div class="Overview__Content" id="PhoneContainer">
                    <?php if ($MobileNo != "") { ?>
                        <i class="fa fa-phone" aria-hidden="true"> Số điện thoại <?php echo $MobileNo ?></i>
                    <?php } else { ?>
                        <i class="fa fa-phone" aria-hidden="true"> Chưa có thông tin về số điện thoại</i>
                    <?php } ?>
                    <button id="Overview__Content__Phone" class="Overview__Content__btn" onclick="OpenOverview(this)"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>

                </div>

            </div>



            <!-- Phần chỉnh sửa của Overview -->

            <div id="Profile__About__Edit" class="Profile__About">

                <form action="" method="Post">
                    <div class="EditArea">
                        <div class="EditGroup" id="edit__Company">
                            <input type="text" name="Company" id="" class="textArea" placeholder="Nơi làm việc"></input type="text">
                        </div>
                        <div class="EditGroup" id="edit__Position">
                            <input type="text" name="Position" id="" class="textArea" placeholder="Chức vụ"></input type="text">
                        </div>
                        <div class="EditGroup" id="edit__School">
                            <input type="text" name="School" id="" class="textArea" placeholder="Trường học"></input type="text">
                        </div>
                        <div class="EditGroup" id="edit__Live">
                            <input type="text" name="Live" id="" class="textArea" placeholder="Nơi sinh sống"></input type="text">
                        </div>
                        <div class="EditGroup" id="edit__HomeTown">
                            <input type="text" name="HomeTown" id="" class="textArea" placeholder="Quê quán"></input type="text">
                        </div>
                        <div class="EditGroup" id="edit__Phone">
                            <input type="text" name="Description" id="" class="textArea" placeholder="Số điện thoại "></input type="text">
                        </div>
                        <select class="btn" name="RelationshipSelect" id="RelationshipSelect">
                            <option value="Độc thân">Độc thân</option>
                            <option value="Đang hẹn hò">Đang hẹn hò</option>
                            <option value="Đang trong mối quan hệ phức tạp">Đang trong mối quan hệ phức tạp</option>
                        </select>

                        <div id="Privacy">
                            <div class="save">
                                <button class="btn" type="submit" name="submit" id="save" onclick="CloseOverview(this)">Save</button>
                            </div>
                            <div class="cancel">
                                <button class="btn" id="cancel" onclick="CloseOverview(this)">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>

        <div id="ProfilePhotos" class="Profile2">
            <p>Photos</p>
        </div>
        <?php include_once "postedlist.php";
        include 'footer.php'; ?>
</body>
<script lang="javascript" type="text/javascript" src="resources/js/Profile.js"></script>
</html>