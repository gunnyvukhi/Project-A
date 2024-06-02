-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2024 at 08:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_a`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) DEFAULT NULL,
  `action_performed` varchar(15) DEFAULT NULL,
  `activity_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `street` varchar(80) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(35) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `zipcode` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `region` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_content` text DEFAULT NULL,
  `create_at` int(11) DEFAULT NULL,
  `update_at` int(11) DEFAULT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `Evite_id` int(11) NOT NULL,
  `Invitees_Userid` int(11) DEFAULT NULL,
  `Going_Userid` int(11) DEFAULT NULL,
  `Date_time` datetime DEFAULT NULL,
  `Venue` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `friend_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `friends_User_id` int(11) NOT NULL,
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hidden_posts`
--

CREATE TABLE `hidden_posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `hidden_posts`
--

INSERT INTO `hidden_posts` (`id`, `user_id`, `post_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `category` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `no_of_followers` int(10) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `privacy_level` varchar(12) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `count_like` bigint(20) DEFAULT 0,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `content`, `privacy_level`, `image`, `count_like`, `create_at`, `update_at`, `is_deleted`) VALUES
(1, 1, 'cotent', 'public', 'resources/image/post/Pizza_suon_non.jpg', NULL, NULL, NULL, NULL),
(2, 1, 'content', 'public', 'resources/image/post/Pizza_suon_non.jpg', NULL, NULL, NULL, NULL),
(3, 2, 'Tuyệt vời', 'public', 'resources/image/post/GCk7kv7bYAA4vH0.jpeg', 0, '2024-06-01 13:33:04', '2024-06-01 13:33:04', 0),
(4, 2, 'Usagi', 'public', 'resources/image/post/f1465e7f260537306649c597f71d2c1b.jpg', 0, '2024-06-01 13:43:42', '2024-06-01 13:43:42', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_about`
--

CREATE TABLE `user_about` (
  `user_id` int(11) NOT NULL,
  `occupation` varchar(40) DEFAULT NULL,
  `education_level` varchar(50) DEFAULT NULL,
  `lives_in` varchar(45) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `date_of_joining` date DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_basic`
--

CREATE TABLE `user_basic` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(60) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `mobile_no` varchar(20) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_basic`
--

INSERT INTO `user_basic` (`user_id`, `first_name`, `last_name`, `password`, `email`, `mobile_no`, `birth_date`, `gender`, `avatar`, `status`, `create_at`) VALUES
(1, NULL, 'Trịnh Nhật Anh', '123456', 'trinhnhatanh27@gmail.com', '0336054243', '2024-05-01', 'nam', NULL, NULL, NULL),
(2, NULL, 'Nguyễn Tuấn Anh', '12345', 'gunnytuananh@gmail.com', '0879524005', '2024-05-02', 'Nam', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `friend_id` (`friend_id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD UNIQUE KEY `Address_id_UNIQUE` (`address_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`Evite_id`),
  ADD KEY `fk_Events_User_basic1_idx` (`Invitees_Userid`),
  ADD KEY `fk_Events_User_basic2_idx` (`Going_Userid`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`friend_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `hidden_posts`
--
ALTER TABLE `hidden_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`),
  ADD UNIQUE KEY `Page_id_UNIQUE` (`page_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_about`
--
ALTER TABLE `user_about`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `User_id_UNIQUE` (`user_id`),
  ADD KEY `fk_User_about_Address1` (`address_id`);

--
-- Indexes for table `user_basic`
--
ALTER TABLE `user_basic`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `Email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200531;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `friend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300624;

--
-- AUTO_INCREMENT for table `hidden_posts`
--
ALTER TABLE `hidden_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_basic`
--
ALTER TABLE `user_basic`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD CONSTRAINT `activity_log_ibfk_2` FOREIGN KEY (`friend_id`) REFERENCES `friends` (`friend_id`),
  ADD CONSTRAINT `activity_log_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user_basic` (`user_id`);

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `user_about` (`address_id`);

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_basic` (`user_id`);

--
-- Constraints for table `hidden_posts`
--
ALTER TABLE `hidden_posts`
  ADD CONSTRAINT `hidden_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_basic` (`user_id`),
  ADD CONSTRAINT `hidden_posts_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_basic` (`user_id`);

--
-- Constraints for table `user_about`
--
ALTER TABLE `user_about`
  ADD CONSTRAINT `fk_User_about_Address1` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_about_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_basic` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
