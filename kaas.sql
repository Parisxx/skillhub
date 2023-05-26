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
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel skillhub.project_post: ~5 rows (ongeveer)
INSERT INTO `project_post` (`id`, `email`, `title`, `descr`, `created`) VALUES
	(1, 'jorrit@gmail.com', 'qwdqwdqwd', 'ewfwefw', '2023-05-26 13:28:58'),
	(2, 'test@gmail.com', 'test', 'test', '2023-05-26 13:31:15'),
	(3, 'test@gmail.com', 'wqdqwd', 'qwdqw', '2023-05-26 13:31:44'),
	(4, 'youribartholomeus10@gmail.com', 'slechte site', 'ik geef jorrit een 1/10 voor een slecht wachtwoord beveiliging. de rest 10/10 voor de leuke omgeving', '2023-05-26 14:15:18'),
	(5, 'youribartholomeus10@gmail.com', 'slechte site', 'ik geef jorrit een 1/10 voor een slecht wachtwoord beveiliging. de rest 10/10 voor de leuke omgeving', '2023-05-26 14:15:24');

-- Structuur van  tabel skillhub.user wordt geschreven
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pfp` varchar(255) NOT NULL DEFAULT 'default.png',
  `aboutme` text NOT NULL,
  `skills` varchar(255) NOT NULL,
  `xp` text NOT NULL,
  `website` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `work` varchar(255) NOT NULL,
  `year_xp` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumpen data van tabel skillhub.user: ~4 rows (ongeveer)
INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `pfp`, `aboutme`, `skills`, `xp`, `website`, `location`, `work`, `year_xp`) VALUES
	(5, 'Jorrit', 'Hoenjet', 'jorrit@gmail.com', 'efadf323d969b54006568b2be6897656', 'default.png', '', '', '', '', '', 'Software Developer', '3'),
	(6, 'test', 'test', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'default.png', '', '', '', '', '', '', '0'),
	(7, 'youri', 'bartholomeus', 'youribartholomeus10@gmail.com', '787f2bff3a2bfce9dc670242b1abdfa4', 'default.png', '', '', '', '', '', '', '0'),
	(8, 'bef', 'koning', 'ZuigJeMoeder@cockmail.com', '9cdfb439c7876e703e307864c9167a15', 'default.png', '', '', '', '', '', '', '0'),
	(9, 'firstname', 'lastname', 'kkr@jemoeder.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'default.png', '', '', '', '', '', '', '0');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
