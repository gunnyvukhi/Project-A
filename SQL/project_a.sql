-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th5 29, 2024 lúc 09:08 AM
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
  `user_id` int NOT NULL,
  `friend_id` int DEFAULT NULL,
  `action_performed` varchar(15) DEFAULT NULL,
  `activity_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `comment_content` text,
  `create_at` int DEFAULT NULL,
  `update_at` int DEFAULT NULL,
  `post_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(1, 1, 'cotent', 'public', 'resources/image/post/Pizza_suon_non.jpg', NULL, NULL, NULL, NULL),
(2, 1, 'content', 'public', 'resources/image/post/Pizza_suon_non.jpg', NULL, NULL, NULL, NULL);

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
(1, NULL, 'Trịnh Nhật Anh', '123456', 'trinhnhatanh27@gmail.com', '0336054243', '2024-05-01', 'nam', NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `friend_id` (`friend_id`);

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
-- AUTO_INCREMENT cho bảng `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200531;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `friends`
--
ALTER TABLE `friends`
  MODIFY `friend_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300624;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user_basic`
--
ALTER TABLE `user_basic`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `activity_log`
--
ALTER TABLE `activity_log`
  ADD CONSTRAINT `activity_log_ibfk_2` FOREIGN KEY (`friend_id`) REFERENCES `friends` (`friend_id`),
  ADD CONSTRAINT `activity_log_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user_basic` (`user_id`);

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
