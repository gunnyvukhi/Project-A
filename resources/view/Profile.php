<?php include_once 'header.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="resources/css/Profile.css">
    <link rel="stylesheet" href="resources/css/mainPage.css">
</head>

<body>
    <div class="Profile" id="Profile">
        <div class="outside" id="outside">
            <div class="Profile__header" id="Profile__header">
                <div class="Profile__header__cover" id="Profile__header__cover">
                    <div class="Profile__header__cover__img">
                        <img src="resources/image/bia.jpg" id="cover" class="cover" alt="">
                        <i id="icon1" class="fa fa-camera" style="font-size:24px"></i>
                    </div>
                </div>
            </div>
            <div class="Profile__header__avatar" id="Profile__header__avatar">
                <img src="resources/image/avatar.jpg" id="avatar" class="img-thumbnail" alt="">
                <i id="icon2" class="fa fa-camera" style="font-size:24px"></i>
                <h2 class="name"> <?php   ?> </h2>
                <div id="Profile_Header_Button" class="Profile_Header_Button">
                    <a name="" id="Profile_Header_themtin" class="btn btn-primary" href="#" role="button"><i class="fa fa-plus" aria-hidden="true"></i> Thêm vào tin</a>
                    <a name="" id="Profile_Header_chinhsua" class="btn btn-primary" href="#" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Chỉnh sửa trang cá nhân</a>
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
        <div id="Decription" class="ProfilePart2">
            <p id="Decription_gioithieu">Giới thiệu</p>
            <p id="Decription_nickname">Dien tu vien thong</p>
            <a name="Decription_Edit" id="" class="btn btn-primary" href="#" role="button">Chỉnh sửa tiểu sử</a>
            <p id="Decription_Address" class="Decription_Detail">
                <i class="fa fa-map-marker" aria-hidden="true"> Hà Nội </i>
            </p>
            <p id="Decription_Relationship" class="Decription_Detail">
                <i class="fa fa-heart" aria-hidden="true"></i> Độc thân
            </p>
            <p id="Decription_Ig" class="Decription_Detail">
                <i class="fa fa-instagram" aria-hidden="true"> dang___minh</i>
            </p>
            <a name="Decription_EditDetail" id="" class="btn btn-primary" href="#" role="button">Chỉnh sửa chi tiết</a>
        </div>
        <div id="Profile_Post" class="ProfilePart2">
            <div id="PostList" class="ProfilePost">
                <?php include_once 'postedList.php' ?>
            </div>
        </div>
    </div>


    <!--  Phần giới thiệu của Profile -->



    <div id="Profile2_DecriptionPage" class="Profile2">
        <div id="Profile2_DecriptionPage_btn" class="">
            <div class="Profile2_DecriptionPage_Inside">
                <p id="Decription_gioithieu">Giới thiệu</p>
            </div>
            <div id="Profile2_DecriptionPage_menu" class="">
                <ul>
                    <li>
                        <button id="button_tongquan" class="btn btn-default"> Tổng quan</button>
                    </li>
                    <li>
                        <button id="button_cvvahv" class="btn btn-default">Công việc và học vấn</button>
                    </li>
                    <li>
                        <button id="button_nts" class="btn btn-default">Nơi từng sống</button>
                    </li>
                    <li>
                        <button id="button_ttlh" class="btn btn-default">Thông tin liên hệ và cơ bản</button>
                    </li>
                    <li>
                        <button id="button_gd" class="btn btn-default">Gia đình và các mối quan hệ</button>
                    </li>
                    
                    <li>
                        <button id="button_sk" class="btn btn-default">Sự kiện trong đời</button>
                    </li>
                </ul>
            </div>
        </div>
        <div id="Profile2_DecriptionPage_tongquan">
            <div class="Profile2_Decription_tongquan_detail">
                <div id="Work">
                    <p id="CongViec_title">Công việc</p>
                    <div id="CongViec_btn"></div>
                    <div id="CongViec_Now"></div>
                </div>
                <div id="DaiHoc"></div>
                <div id="TruongTrungHoc"></div>
            </div>
            <div id="Profile2_DecriptionPage_tongquan_1" class="Profile2_DecriptionPage_tongquan_detail">
                <div class="Profile2_DecriptionPage_tongquan_detail_icon">
                    <i class="fa fa-briefcase" aria-hidden="true"> Đang làm việc tại</i>
                    <button id="Profile2_DecriptionPage_tongquan_detail_icon_working" class="Profile2_DecriptionPage_tongquan_detail_icon_btn"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                </div>
                <div class="Profile2_DecriptionPage_tongquan_detail_icon">
                    <i id="Profile2_DecriptionPage_tongquan_detail_icon_study" class="fa fa-graduation-cap" aria-hidden="true"> Đã học tại</i>
                    <button class="Profile2_DecriptionPage_tongquan_detail_icon_btn"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                </div>
                <div class="Profile2_DecriptionPage_tongquan_detail_icon">
                    <i class="fa fa-home" aria-hidden="true"> Sống tại</i>
                    <button id="Profile2_DecriptionPage_tongquan_detail_icon_detail" class="Profile2_DecriptionPage_tongquan_detail_icon_btn"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                </div>
                <div class="Profile2_DecriptionPage_tongquan_detail_icon">
                    <i class="fa fa-map-marker" aria-hidden="true"> Đến từ</i>
                    <button id="Profile2_DecriptionPage_tongquan_detail_icon_home" class="Profile2_DecriptionPage_tongquan_detail_icon_btn"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                </div>
                <div class="Profile2_DecriptionPage_tongquan_detail_icon">
                    <i class="fa fa-heart" aria-hidden="true"> Đang</i>
                    <button id="Profile2_DecriptionPage_tongquan_detail_icon_address" class="Profile2_DecriptionPage_tongquan_detail_icon_btn"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                </div>
                <div class="Profile2_DecriptionPage_tongquan_detail_icon">
                    <i class="fa fa-phone" aria-hidden="true"> Số điện thoại</i>
                    <button id="Profile2_DecriptionPage_tongquan_detail_icon_phone" class="Profile2_DecriptionPage_tongquan_detail_icon_btn"><i id="icondetail" class="fa fa-asterisk" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
    </div>


    <script src="resources/js/Profile.js"></script>
</body>

</html>