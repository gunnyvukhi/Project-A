<?php include_once 'header.html'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="resources/css/Profile.css">
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
                <h2 class="name">Project-A</h2>
                <a name="" id="themtin" class="btn btn-primary" href="#" role="button">Thêm vào tin</a>
                <a name="" id="chinhsua" class="btn btn-primary" href="#" role="button">Chỉnh sửa trang cá nhân</a>
            </div>
            <div class="Profile__header__menu" id="Profile__header__menu">
                <ul>
                    <li>Bài viết</li>
                    <li>Giới thiệu</li>
                    <li>Ảnh</li>
                    <li>Bạn bè</li>
                    <li>Video</li>
                    <li>Xem thêm</li>
                    <a name="" id="" class="btn btn-primary" href="#" role="button"></a>
                </ul>
            </div>
        </div>
    </div>
    </div>


    <div id="Profile2" class="Profile2">
        <div id="Decription" class="ProfilePart2">
            <p id="gioithieu">Giới thiệu</p>
            <p id="nickname">Dien tu vien thong</p>
            <a name="" id="" class="btn btn-primary" href="#" role="button">Chỉnh sửa tiểu sử</a>
            <p></p>
            <a name="" id="" class="btn btn-primary" href="#" role="button">Chỉnh sửa chi tiết</a>
        </div>
        <div id="Post" class="ProfilePart2">
            <div id="NewPost" class="ProfilePost">
                <img src="resources/image/avatar.jpg" id="NewPost_Avatar" class="NewPost_Avatar" alt="">
                <input type="text" id="NewPost_Input" class="NewPost_Input" placeholder="Bạn đang nghĩ gì?">
            </div>
            <div id="PostList" class="ProfilePost">
                <div id="PostList1" class="PostList">
                    <img src="resources/image/avatar.jpg" id="PostList1_Avatar" class="PostList_Avatar" alt="">
                    <p id="PostList1_Name" class="PostList_Name">Project-A</p>
                </div>
            </div>
        </div>
    </div>






</body>

</html>