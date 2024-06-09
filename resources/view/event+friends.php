<?php
echo '
<link rel="stylesheet" href="resources\css\event+friends.css" type="text/css">
<div id="mainContentRightContainer">
    <div class="ListContainer">
        <h3>Sự kiện</h3>
        <ul>
            <li>
                <a href="#" class="ContentLink">
                <img class="contentPic" src=' . $currentUserAvatarLink . ' />
                <div class="ContentContainer">
                    <p class="EventContent">Hôm nay là sinh nhật của Đào Đức Minh Hoàn</p>
                </div>
                </a>
            </li>
        </ul>
    </div>
    <div class="ListContainer">
        <h3>Người liên hệ</h3>
        <ul>
            <li>
                <a href="#" class="ContentLink">
                <img class="contentPic" src=' . $currentUserAvatarLink . ' alt=' . $currentUserName . ' />
                <div class="ContentContainer">
                    <p class="FriendsName">' . $currentUserName . '</p>
                </div>
                </a>
            </li>
        </ul>
    </div>
</div>
';