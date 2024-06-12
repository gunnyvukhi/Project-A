-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table project_a.activity_log
CREATE TABLE IF NOT EXISTS `activity_log` (
  `activity_id` int NOT NULL,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL,
  `action_performed` varchar(15) DEFAULT NULL,
  `activity_date` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`,`post_id`,`activity_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_a.activity_log: ~4 rows (approximately)
INSERT INTO `activity_log` (`activity_id`, `user_id`, `post_id`, `action_performed`, `activity_date`) VALUES
	(0, 1, 2, 'like', '2024-06-07 09:11:48'),
	(1, 1, 2, 'like', '2024-06-07 09:23:14'),
	(2, 1, 2, 'unlike', '2024-06-07 09:23:24'),
	(3, 1, 2, 'comment', '2024-06-07 09:23:40'),
	(4, 1, 2, 'like', '2024-06-10 01:14:01');

-- Dumping structure for table project_a.address
CREATE TABLE IF NOT EXISTS `address` (
  `address_id` int NOT NULL AUTO_INCREMENT,
  `street` varchar(80) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(35) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `zipcode` int(10) unsigned zerofill DEFAULT NULL,
  `region` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`address_id`),
  UNIQUE KEY `Address_id_UNIQUE` (`address_id`),
  CONSTRAINT `address_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `user_about` (`address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=200531 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_a.address: ~0 rows (approximately)

-- Dumping structure for table project_a.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `comment_content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `post_id` int NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table project_a.comments: ~2 rows (approximately)
INSERT INTO `comments` (`comment_id`, `user_id`, `comment_content`, `create_at`, `update_at`, `post_id`) VALUES
	(1, 1, 'anhcoder', '2024-06-03 08:52:22', '2024-06-03 08:52:22', 2),
	(2, 1, 'anhcoder', '2024-06-07 09:23:40', '2024-06-07 09:23:40', 2);

-- Dumping structure for table project_a.events
CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int NOT NULL AUTO_INCREMENT,
  `event_name` text,
  `event` text,
  `date_time` datetime DEFAULT NULL,
  PRIMARY KEY (`event_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_a.events: ~10 rows (approximately)
INSERT INTO `events` (`event_id`, `event_name`, `event`, `date_time`) VALUES
	(1, 'Ngày thành lập Đảng Cộng sản Việt Nam', 'Ngày 3 tháng 2 năm 1930, Đảng Cộng sản Việt Nam được thành lập.', '1930-02-03 00:00:00'),
	(2, 'Cách mạng tháng Tám', 'Ngày 19 tháng 8 năm 1945, nhân dân Hà Nội tiến hành khởi nghĩa giành chính quyền, mở đầu cho cuộc Tổng khởi nghĩa tháng Tám.', '1945-08-19 00:00:00'),
	(3, 'Ngày Quốc khánh', 'Ngày 2 tháng 9 năm 1945, Chủ tịch Hồ Chí Minh đọc Tuyên ngôn Độc lập, khai sinh nước Việt Nam Dân chủ Cộng hòa.', '1945-09-02 00:00:00'),
	(4, 'Chiến thắng Điện Biên Phủ', 'Ngày 7 tháng 5 năm 1954, quân đội Việt Nam giành chiến thắng tại Điện Biên Phủ, kết thúc chiến tranh Đông Dương.', '1954-05-07 00:00:00'),
	(5, 'Hiệp định Genève', 'Ngày 21 tháng 7 năm 1954, Hiệp định Genève được ký kết, chia đôi Việt Nam thành hai miền với giới tuyến tại vĩ tuyến 17.', '1954-07-21 00:00:00'),
	(6, 'Chiến dịch Mậu Thân', 'Ngày 30 tháng 1 năm 1968, Quân Giải phóng miền Nam Việt Nam phát động cuộc tổng tiến công và nổi dậy trên toàn miền Nam.', '1968-01-30 00:00:00'),
	(7, 'Giải phóng miền Nam', 'Ngày 30 tháng 4 năm 1975, quân đội Giải phóng miền Nam tiến vào Sài Gòn, giải phóng hoàn toàn miền Nam, thống nhất đất nước.', '1975-04-30 00:00:00'),
	(8, 'Ngày thành lập Hội Liên hiệp Phụ nữ Việt Nam', 'Ngày 20 tháng 10 năm 1930, Hội Liên hiệp Phụ nữ Việt Nam được thành lập.', '1930-10-20 00:00:00'),
	(9, 'Ngày nhà giáo Việt Nam', 'Ngày 20 tháng 11 hàng năm được chọn làm Ngày nhà giáo Việt Nam để tôn vinh các thầy cô giáo.', '1958-11-20 00:00:00'),
	(10, 'Việt Nam gia nhập ASEAN', 'Ngày 28 tháng 7 năm 1995, Việt Nam chính thức gia nhập Hiệp hội các quốc gia Đông Nam Á (ASEAN).', '1995-07-28 00:00:00');

-- Dumping structure for table project_a.friends
CREATE TABLE IF NOT EXISTS `friends` (
  `friend_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `friends_User_id` int NOT NULL,
  `start_date` date NOT NULL,
  PRIMARY KEY (`friend_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_basic` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=300624 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_a.friends: ~0 rows (approximately)

-- Dumping structure for table project_a.hidden_posts
CREATE TABLE IF NOT EXISTS `hidden_posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `hidden_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_basic` (`user_id`),
  CONSTRAINT `hidden_posts_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table project_a.hidden_posts: ~0 rows (approximately)
INSERT INTO `hidden_posts` (`id`, `user_id`, `post_id`) VALUES
	(1, 1, 1);

-- Dumping structure for table project_a.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` int NOT NULL,
  `category` varchar(45) DEFAULT NULL,
  `user_id` int NOT NULL,
  `no_of_followers` int(10) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`page_id`),
  UNIQUE KEY `Page_id_UNIQUE` (`page_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_a.pages: ~0 rows (approximately)

-- Dumping structure for table project_a.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `content` text,
  `privacy_level` varchar(12) DEFAULT NULL,
  `image` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `count_like` bigint DEFAULT '0',
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `is_deleted` int DEFAULT '0',
  PRIMARY KEY (`post_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_basic` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_a.posts: ~3 rows (approximately)
INSERT INTO `posts` (`post_id`, `user_id`, `content`, `privacy_level`, `image`, `count_like`, `create_at`, `update_at`, `is_deleted`) VALUES
	(1, 1, 'cotent', 'public', 'resources/image/post/Pizza_suon_non.jpg', 0, NULL, NULL, 0),
	(2, 1, 'content', 'public', 'resources/image/post/Pizza_suon_non.jpg', 1, NULL, NULL, 0),
	(3, 1, 'content', 'public', 'resources/image/post/Pizza_suon_non.jpg', 1, '2024-05-29 10:05:13', '2024-05-29 10:05:13', 0);

-- Dumping structure for table project_a.post_likes
CREATE TABLE IF NOT EXISTS `post_likes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table project_a.post_likes: ~0 rows (approximately)
INSERT INTO `post_likes` (`id`, `user_id`, `post_id`) VALUES
	(5, 1, 3),
	(9, 1, 2);

-- Dumping structure for table project_a.user_about
CREATE TABLE IF NOT EXISTS `user_about` (
  `user_id` int NOT NULL,
  `occupation` varchar(40) DEFAULT NULL,
  `education_level` varchar(50) DEFAULT NULL,
  `lives_in` varchar(45) DEFAULT NULL,
  `address_id` int DEFAULT NULL,
  `date_of_joining` date DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `User_id_UNIQUE` (`user_id`),
  KEY `fk_User_about_Address1` (`address_id`),
  CONSTRAINT `fk_User_about_Address1` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_about_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_basic` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_a.user_about: ~0 rows (approximately)

-- Dumping structure for table project_a.user_basic
CREATE TABLE IF NOT EXISTS `user_basic` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(60) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `mobile_no` varchar(20) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `avatar` text,
  `avatar_backgroud` text,
  `status` text,
  `create_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `Email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table project_a.user_basic: ~2 rows (approximately)
INSERT INTO `user_basic` (`user_id`, `first_name`, `last_name`, `password`, `email`, `mobile_no`, `birth_date`, `gender`, `avatar`, `avatar_backgroud`, `status`, `create_at`) VALUES
	(1, NULL, 'Trịnh Nhật Anh', '123456', 'trinhnhatanh27@gmail.com', '0336054243', '2024-05-01', 'nam', NULL, 'user2.jpeg', 'online', NULL),
	(3, NULL, 'Trịnh Nhật Anh', '123456', 'trinhnhatanh37@gmail.com', '0336054243', '2024-06-20', 'nam', NULL, 'user2.jpeg', NULL, '2024-06-02 01:47:13');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
