<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/header.css" type="text/css">
</head>
<body>
    <div id="backgorund"></div>
    <header>
        <a href="#" alt="Youcie"><img src="resources/image/logo.jpg" alt="Youcie" id="logo"></a>
        <div class="searchContainer">
            <label for="searchBox"></label>
            <img src="resources/image/searchIcon.png" alt="Search">
            <input type="text" name="searchBox" id="searchBox" placeholder="Tìm kiếm">
        </div>
        <ul class="allSection">
            <li class="currentSection selectSection" id="mainPage"><a href="#" alt="Trang Chủ"><img id="homeIcon" src="resources/image/homeIcon1.png" alt="Trang chủ"></a></li>
            <li class="currentSection selectSection" id="watchPage"><a href="#" alt="Watch"><img id = "watchIcon" src="resources/image/watchIcon1.png" alt="Watch"></a></li>
        </ul>
        <ul class="allNemuContainer">
            <li class="nemu" id="profile"><a href="#" alt="$Name"><img src="resources/image/demoPersonIcon.png" alt="Person"></a></li>
            <li class="nemu" id="notification"><a href="#" alt="Thông báo"><img src="resources/image/notificationIcon1.png" alt="Notification"></a></li>
            <li class="nemu" id="message"><a href="#" alt="Tin nhắn"><img src="resources/image/messageIcon1.png" alt="Message"></a></li>
        </ul>
    </header>
    <script lang="javascript" type="text/javascript" src="resources/js/header.js"></script>

