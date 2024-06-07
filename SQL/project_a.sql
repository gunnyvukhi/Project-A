-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 07, 2024 lúc 09:28 AM
-- Phiên bản máy phục vụ: 8.0.29
-- Phiên bản PHP: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project_a`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `activity_log`
--

CREATE TABLE `activity_log` (
  `activity_id` int NOT NULL,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL,
  `action_performed` varchar(15) DEFAULT NULL,
  `activity_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `activity_log`
--

INSERT INTO `activity_log` (`activity_id`, `user_id`, `post_id`, `action_performed`, `activity_date`) VALUES
(0, 1, 2, 'like', '2024-06-07 09:11:48'),
(1, 1, 2, 'like', '2024-06-07 09:23:14'),
(2, 1, 2, 'unlike', '2024-06-07 09:23:24'),
(3, 1, 2, 'comment', '2024-06-07 09:23:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address`
--

CREATE TABLE `address` (
  `address_id` int NOT NULL,
  `street` varchar(80) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(35) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `zipcode` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `region` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `comment_id` int NOT NULL,
  `user_id` int NOT NULL,
  `comment_content` text CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `post_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `comment_content`, `create_at`, `update_at`, `post_id`) VALUES
(1, 1, 'anhcoder', '2024-06-03 08:52:22', '2024-06-03 08:52:22', 2),
(2, 1, 'anhcoder', '2024-06-07 09:23:40', '2024-06-07 09:23:40', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `events`
--

CREATE TABLE `events` (
  `Evite_id` int NOT NULL,
  `Invitees_Userid` int DEFAULT NULL,
  `Going_Userid` int DEFAULT NULL,
  `Date_time` datetime DEFAULT NULL,
  `Venue` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `friends`
--

CREATE TABLE `friends` (
  `friend_id` int NOT NULL,
  `user_id` int NOT NULL,
  `friends_User_id` int NOT NULL,
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hidden_posts`
--

CREATE TABLE `hidden_posts` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Đang đổ dữ liệu cho bảng `hidden_posts`
--

INSERT INTO `hidden_posts` (`id`, `user_id`, `post_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pages`
--

CREATE TABLE `pages` (
  `page_id` int NOT NULL,
  `category` varchar(45) DEFAULT NULL,
  `user_id` int NOT NULL,
  `no_of_followers` int(10) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `post_id` int NOT NULL,
  `user_id` int NOT NULL,
  `content` text,
  `privacy_level` varchar(12) DEFAULT NULL,
  `image` text CHARACTER SET utf8mb3 COLLATE utf8_general_ci,
  `count_like` bigint DEFAULT '0',
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `is_deleted` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `content`, `privacy_level`, `image`, `count_like`, `create_at`, `update_at`, `is_deleted`) VALUES
(1, 1, 'cotent', 'public', 'resources/image/post/Pizza_suon_non.jpg', 0, NULL, NULL, 0),
(2, 1, 'content', 'public', 'resources/image/post/Pizza_suon_non.jpg', 0, NULL, NULL, 0),
(3, 1, 'content', 'public', 'resources/image/post/Pizza_suon_non.jpg', 1, '2024-05-29 10:05:13', '2024-05-29 10:05:13', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_likes`
--

CREATE TABLE `post_likes` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `post_likes`
--

INSERT INTO `post_likes` (`id`, `user_id`, `post_id`) VALUES
(5, 1, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_about`
--

CREATE TABLE `user_about` (
  `user_id` int NOT NULL,
  `occupation` varchar(40) DEFAULT NULL,
  `education_level` varchar(50) DEFAULT NULL,
  `lives_in` varchar(45) DEFAULT NULL,
  `address_id` int DEFAULT NULL,
  `date_of_joining` date DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_basic`
--

CREATE TABLE `user_basic` (
  `user_id` int NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(60) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `mobile_no` varchar(20) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `avatar` text,
  `status` text,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `user_basic`
--

INSERT INTO `user_basic` (`user_id`, `first_name`, `last_name`, `password`, `email`, `mobile_no`, `birth_date`, `gender`, `avatar`, `status`, `create_at`) VALUES
(1, NULL, 'Trịnh Nhật Anh', '123456', 'trinhnhatanh27@gmail.com', '0336054243', '2024-05-01', 'nam', NULL, 'online', NULL),
(3, NULL, 'Trịnh Nhật Anh', '123456', 'trinhnhatanh37@gmail.com', '0336054243', '2024-06-20', 'nam', NULL, NULL, '2024-06-02 01:47:13');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`user_id`,`post_id`,`activity_id`) USING BTREE;

--
-- Chỉ mục cho bảng `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD UNIQUE KEY `Address_id_UNIQUE` (`address_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`Evite_id`),
  ADD KEY `fk_Events_User_basic1_idx` (`Invitees_Userid`),
  ADD KEY `fk_Events_User_basic2_idx` (`Going_Userid`);

--
-- Chỉ mục cho bảng `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`friend_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `hidden_posts`
--
ALTER TABLE `hidden_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Chỉ mục cho bảng `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`),
  ADD UNIQUE KEY `Page_id_UNIQUE` (`page_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `post_likes`
--
ALTER TABLE `post_likes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_about`
--
ALTER TABLE `user_about`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `User_id_UNIQUE` (`user_id`),
  ADD KEY `fk_User_about_Address1` (`address_id`);

--
-- Chỉ mục cho bảng `user_basic`
--
ALTER TABLE `user_basic`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `Email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200531;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `friends`
--
ALTER TABLE `friends`
  MODIFY `friend_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300624;

--
-- AUTO_INCREMENT cho bảng `hidden_posts`
--
ALTER TABLE `hidden_posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `post_likes`
--
ALTER TABLE `post_likes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `user_basic`
--
ALTER TABLE `user_basic`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `user_about` (`address_id`);

--
-- Các ràng buộc cho bảng `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_basic` (`user_id`);

--
-- Các ràng buộc cho bảng `hidden_posts`
--
ALTER TABLE `hidden_posts`
  ADD CONSTRAINT `hidden_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_basic` (`user_id`),
  ADD CONSTRAINT `hidden_posts_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_basic` (`user_id`);

--
-- Các ràng buộc cho bảng `user_about`
--
ALTER TABLE `user_about`
  ADD CONSTRAINT `fk_User_about_Address1` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_about_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_basic` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
