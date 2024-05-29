<?php include_once 'header.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="resources/css/Profile.css">
    <link rel="stylesheet" href="resources/css/mainPage.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                    <a name="" id="Profile_Header_themtin" class="btn btn-primary" href="#" role="button"><i class="fa fa-plus" aria-hidden="true"></i>  Thêm vào tin</a>
                    <a name="" id="Profile_Header_chinhsua" class="btn btn-primary" href="#" role="button"><i class="fa fa-pencil" aria-hidden="true"></i>  Chỉnh sửa trang cá nhân</a>
                </div>
            </div>
            <div class="Profile__header__menu" id="Profile__header__menu">
                <ul>
                    <li>Bài viết</li>
                    <li>Giới thiệu</li>
                    <li>Ảnh</li>
                    <li>Bạn bè</li>
                    <li>Video</li>
                    <li>Xem thêm</li>
                </ul>
            </div>
        </div>
    </div>



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
            <!-- <div id="Profile_NewPost" class="ProfilePost">
                <img src="resources/image/avatar.jpg" id="NewPost_Avatar" class="NewPost_Avatar" alt="">
                <input type="text" id="NewPost_Input" class="NewPost_Input" placeholder="Bạn đang nghĩ gì?">
            </div> -->
            <div id="PostList" class="ProfilePost">
                <?php include_once 'postedList.php' ?> 
            </div>
        </div>
    </div>
</body>

</html>