-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 10, 2015 at 05:54 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wedding`
--

-- --------------------------------------------------------
DROP TABLE IF EXISTS `groups`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `gifts`;
DROP TABLE IF EXISTS `gift_contributions`;


--
-- Table structure for table `groups`
--
CREATE TABLE IF NOT EXISTS `groups` (
  `id` 			int(4) 		NOT NULL AUTO_INCREMENT,
  `name` 		varchar(64) NOT NULL,
  `password`	varchar(32) NOT NULL,
  `notes` 		text,
  PRIMARY KEY 	(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` 			int(4) 			NOT NULL 	AUTO_INCREMENT,
  `group_id` 	int(4) 			NOT NULL,
  `first_name`	varchar(64) 	NOT NULL,
  `last_name` 	varchar(64) 	NOT NULL,
  `email` 		varchar(128),
  `phone` 		varchar(12),
  `status` 		char(1) 		NOT NULL 	DEFAULT 'u',
  PRIMARY KEY 	(`id`),
  FOREIGN KEY 	(group_id) 		REFERENCES 	groups(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- Table structure for table `gifts`
--
CREATE TABLE IF NOT EXISTS `gifts` (
  `id` 			int(4) 			NOT NULL	AUTO_INCREMENT,
  `title` 		varchar(64)		NOT NULL,
  `cost` 		numeric(15,2) 	NOT NULL,
  `contributed`	numeric(15,2)	NOT NULL 	DEFAULT 0,
  `photo`		varchar(128),
  PRIMARY KEY 	(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Table structure for table `gift_contributions`
--
CREATE TABLE IF NOT EXISTS `gift_contributions` (
  `id` 			int(4) 			NOT NULL	AUTO_INCREMENT,
  `gift_id`		int(4) 			NOT NULL,
  `group_id`	int(4) 			NOT NULL,
  `contributed`	numeric(15,2)	NOT NULL 	DEFAULT 0,
  PRIMARY KEY	(`id`),
  FOREIGN KEY 	(gift_id) 		REFERENCES 	gifts(id),
  FOREIGN KEY 	(group_id) 		REFERENCES 	groups(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `groups` (`name`, `password`) VALUES
('The Coutlees', '12345'),
('Mom', 'mom');

INSERT INTO `users` (`group_id`, `first_name`, `last_name`, `email`) VALUES
(1, 'Shane', 'Coutlee', 'scoutlee@here.com'),
(1, 'Karen', 'Coutlee', 'kcoutlee@here.com'),
(1, 'Paige', 'Coutlee', ''),
(1, 'Maya', 'Coutlee', ''),
(2, 'Suzanne', 'VanElslander', 'svan@here.com'),
(2, 'Noah', 'Bayntun', '');



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
