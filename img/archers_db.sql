-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 05, 2019 at 12:48 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `archers_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `archers`
--

DROP TABLE IF EXISTS `archers`;
CREATE TABLE IF NOT EXISTS `archers` (
  `id` varchar(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `bow` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archers`
--

INSERT INTO `archers` (`id`, `name`, `surname`, `bow`) VALUES
('LV00001', 'Alice', 'Makarenko', 'recurve'),
('LV0002', 'Nikita', 'Lebedev', 'recurve'),
('LV0003', 'Sergejs', 'Blaze', 'recurve'),
('LV00091', 'Marina', 'Rjabkova', 'Recurve'),
('LV00436', 'Nikolajs', 'Sinnikovs', 'Recurve'),
('LV00600', 'Davis', 'Blaze', 'recurve'),
('LV01', 'a', 'a', 'recurve');

-- --------------------------------------------------------

--
-- Table structure for table `archers_list`
--

DROP TABLE IF EXISTS `archers_list`;
CREATE TABLE IF NOT EXISTS `archers_list` (
  `id` varchar(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `primary_bow` varchar(1) NOT NULL,
  `club` int(11) NOT NULL,
  `division` varchar(3) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `competitions`
--

DROP TABLE IF EXISTS `competitions`;
CREATE TABLE IF NOT EXISTS `competitions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `distances` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `competitions`
--

INSERT INTO `competitions` (`id`, `Name`, `distances`) VALUES
(1, 'Baltic championships', 2),
(3, 'Latvijas Äempionats', 2),
(4, 'Riga Open', 4),
(11, 'ABC', 2),
(15, 'Riga Open2', 4);

-- --------------------------------------------------------

--
-- Table structure for table `competition_archers`
--

DROP TABLE IF EXISTS `competition_archers`;
CREATE TABLE IF NOT EXISTS `competition_archers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `archer_id` varchar(12) NOT NULL,
  `competition_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `archer_id` (`archer_id`),
  KEY `competition_id` (`competition_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `competition_archers`
--

INSERT INTO `competition_archers` (`id`, `archer_id`, `competition_id`) VALUES
(24, 'LV00436', 3),
(25, 'LV00091', 3),
(26, 'LV00001', 3),
(27, 'LV00600', 3),
(29, 'LV0002', 3),
(30, 'LV0003', 3);

-- --------------------------------------------------------

--
-- Table structure for table `competition_info`
--

DROP TABLE IF EXISTS `competition_info`;
CREATE TABLE IF NOT EXISTS `competition_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `info` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comp_id` (`comp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `competition_info`
--

INSERT INTO `competition_info` (`id`, `comp_id`, `city`, `info`, `date`) VALUES
(1, 15, 'Riga', 'Super mega sacensibas', '2019-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

DROP TABLE IF EXISTS `results`;
CREATE TABLE IF NOT EXISTS `results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `archer_id` varchar(12) NOT NULL,
  `competition_id` int(11) NOT NULL,
  `result` int(11) DEFAULT NULL,
  `distance` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `competition_id` (`competition_id`),
  KEY `archer_id` (`archer_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `archer_id`, `competition_id`, `result`, `distance`) VALUES
(7, 'LV00436', 3, 225, 1),
(8, 'LV00436', 3, 269, 2),
(9, 'LV00091', 3, 255, 1),
(10, 'LV00091', 3, 259, 2),
(12, 'LV00001', 3, 256, 1),
(13, 'LV00001', 3, 267, 2),
(14, 'LV00600', 3, 269, 1),
(16, 'LV00600', 3, 288, 2),
(17, 'LV00436', 3, 255, 10),
(18, 'LV00436', 3, 225, 3),
(19, 'LV0002', 3, 123, 1),
(20, 'LV0002', 3, 123, 2),
(21, 'LV0002', 3, 139, 3),
(22, 'LV0002', 3, 123, 4);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `competition_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `competition_id` (`competition_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `competition_id`) VALUES
(1, 'AiM Archery', 1);

-- --------------------------------------------------------

--
-- Table structure for table `team_archers`
--

DROP TABLE IF EXISTS `team_archers`;
CREATE TABLE IF NOT EXISTS `team_archers` (
  `team_id` int(11) NOT NULL,
  `archer_id` varchar(12) NOT NULL,
  KEY `archer_id` (`archer_id`),
  KEY `team_id` (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_archers`
--

INSERT INTO `team_archers` (`team_id`, `archer_id`) VALUES
(1, 'LV00436');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `isAdmin`) VALUES
(1, 'admin', '38655fd5c5aca05d82960e89c762583d', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `competition_archers`
--
ALTER TABLE `competition_archers`
  ADD CONSTRAINT `competition_archers_ibfk_1` FOREIGN KEY (`archer_id`) REFERENCES `archers` (`id`),
  ADD CONSTRAINT `competition_archers_ibfk_2` FOREIGN KEY (`competition_id`) REFERENCES `competitions` (`id`);

--
-- Constraints for table `competition_info`
--
ALTER TABLE `competition_info`
  ADD CONSTRAINT `competition_info_ibfk_1` FOREIGN KEY (`comp_id`) REFERENCES `competitions` (`id`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`competition_id`) REFERENCES `competitions` (`id`),
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`archer_id`) REFERENCES `archers` (`id`);

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`competition_id`) REFERENCES `competitions` (`id`);

--
-- Constraints for table `team_archers`
--
ALTER TABLE `team_archers`
  ADD CONSTRAINT `team_archers_ibfk_1` FOREIGN KEY (`archer_id`) REFERENCES `archers` (`id`),
  ADD CONSTRAINT `team_archers_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
