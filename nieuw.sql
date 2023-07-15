-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server versie:                10.4.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Versie:              12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Databasestructuur van skillhub wordt geschreven
CREATE DATABASE IF NOT EXISTS `skillhub` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `skillhub`;

-- Structuur van  tabel skillhub.project_post wordt geschreven
CREATE TABLE IF NOT EXISTS `project_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '0',
  `descr` text NOT NULL,
  `sort_job` varchar(50) DEFAULT NULL,
  `min_salary` int(10) DEFAULT NULL,
  `max_salary` int(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel skillhub.project_post: ~9 rows (ongeveer)
INSERT INTO `project_post` (`id`, `email`, `title`, `descr`, `sort_job`, `min_salary`, `max_salary`, `created`) VALUES
	(1, 'jorrit@gmail.com', 'qwdqwdqwd', 'ewfwefw', 'Parttime', 16000, 18000, '2023-05-26 13:28:58'),
	(2, 'test@gmail.com', 'test', 'test', 'Fulltime', 9000, 13000, '2023-05-26 13:31:15'),
	(3, 'test@gmail.com', 'wqdqwd', 'qwdqw', 'Remote', 4000, 4500, '2023-05-26 13:31:44'),
	(14, 'jorrit@gmail.com', 'Building crowdfunding website', 'We are looking for a talented and experienced developer to join our team to develop a new crowdfunding app. As a Crowdfunding App Developer, you will be responsible for designing, developing, and implementing the app, ensuring it is user-friendly, functional and secure.', 'Fulltime', 9000, 13000, '2023-06-07 09:44:35'),
	(23, 'test@gmail.com', 'niwu', 'wqdpoqwdmpqwdnm ', 'Parttime', 0, 4155, '2023-06-08 13:57:35'),
	(24, 'test@gmail.com', 'm;lwqnkdqw', 'qwdqw', 'Fulltime', 2031, 5213, '2023-06-08 13:59:07'),
	(25, 'test@gmail.com', 'wqdqwd', 'eqfew', 'Fulltime', 1505, 4371, '2023-06-08 14:31:13'),
	(26, 'test@gmail.com', 'Jay', 'beschrijving', 'Fulltime', 2000, 3000, '2023-06-09 12:37:13'),
	(27, 'jorrit@gmail.com', 'Jorrit', 'beschrijving', 'Remote', 2000, 3000, '2023-06-09 12:39:39');

-- Structuur van  tabel skillhub.user wordt geschreven
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pfp` varchar(255) NOT NULL DEFAULT 'default.png',
  `aboutme` text NOT NULL,
  `xp` text NOT NULL,
  `website` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `work` varchar(255) NOT NULL,
  `year_xp` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel skillhub.user: ~2 rows (ongeveer)
INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `pfp`, `aboutme`, `xp`, `website`, `location`, `work`, `year_xp`) VALUES
	(5, 'Jorrit', 'Hoenjet', 'bas', 'jorrit@gmail.com', 'efadf323d969b54006568b2be6897656', 'Artwork.jpg', 'niuqfhiuqbwfquibfiu iqwuh fqwuifhqiwufh', 'kaas', 'kaas.nl', 'geleen', 'Software Developer', '3'),
	(15, 'test', 'test', 'henk', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'open-box.png', 'kefoqinfoweinfqiowf', 'wqdmqwkl', 'kaas.nl', 'maasje', 'Software ', '2');

-- Structuur van  tabel skillhub.work wordt geschreven
CREATE TABLE IF NOT EXISTS `work` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `work_xp` varchar(255) NOT NULL,
  `work_pf` varchar(255) NOT NULL,
  `work_info` varchar(255) NOT NULL,
  `work_co` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel skillhub.work: ~2 rows (ongeveer)
INSERT INTO `work` (`id`, `email`, `work_xp`, `work_pf`, `work_info`, `work_co`, `skills`) VALUES
	(1, 'jorrit@gmail.com', '5', 'work.png', 'software developer', 'Apple co.', 'PHP'),
	(2, 'jorrit@gmail.com', '6', 'work.png', 'Logo', 'Downward Co', 'Html');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
