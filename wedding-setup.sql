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
DROP TABLE IF EXISTS `location`;
DROP TABLE IF EXISTS `contribution`;
DROP TABLE IF EXISTS `gift`;
DROP TABLE IF EXISTS `guest`;
DROP TABLE IF EXISTS `group`;
DROP TABLE IF EXISTS `response`;


--
-- Table structure for table `response`
--
CREATE TABLE IF NOT EXISTS `response`
(
  `id`              int(1)          NOT NULL,
  `description`     varchar(128)    NOT NULL,

  PRIMARY KEY (`id`)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `group`
--
CREATE TABLE IF NOT EXISTS `group`
(
  `id`              int(4)          NOT NULL AUTO_INCREMENT,
  `name`            varchar(64)     NOT NULL,
  `username`        varchar(64)     NOT NULL,
  `password`        varchar(32)     NOT NULL,
  `notes`           text            NULL,

  PRIMARY KEY (`id`)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `guest`
--
CREATE TABLE IF NOT EXISTS `guest`
(
  `id`              int(4)          NOT NULL AUTO_INCREMENT,
  `group_id`        int(4)          NOT NULL,
  `response_id`     int(1)          NOT NULL,
  `first_name`      varchar(64)     NOT NULL,
  `last_name`       varchar(64)     NOT NULL,
  `email`           varchar(128)    NULL,
  `phone`           varchar(12)     NULL,

  PRIMARY KEY (`id`),
  FOREIGN KEY (`group_id`)    REFERENCES `group`    (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`response_id`) REFERENCES `response` (`id`) ON DELETE RESTRICT
)
ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `gift`
--
CREATE TABLE IF NOT EXISTS `gift`
(
  `id`              int(4)          NOT NULL AUTO_INCREMENT,
  `title`           varchar(64)     NOT NULL,
  `description`     text            NOT NULL,
  `cost`            numeric(15,2)   NOT NULL,
  `fulfilled`       bool            NOT NULL DEFAULT FALSE,

  PRIMARY KEY (`id`)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `contribution`
--
CREATE TABLE IF NOT EXISTS `contribution`
(
  `group_id`        int(4)          NOT NULL,
  `gift_id`         int(4)          NOT NULL,
  `quantity`        int(2)          NOT NULL DEFAULT 1,

  PRIMARY KEY (`group_id`, `gift_id`),
  FOREIGN KEY (`group_id`)  REFERENCES `group` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`gift_id`)   REFERENCES `gift`  (`id`) ON DELETE CASCADE
  
)
ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `location`
--
CREATE TABLE IF NOT EXISTS `location`
(
  `id`              int(4)          NOT NULL AUTO_INCREMENT,
  `event_title`     varchar(64)     NOT NULL,
  `description`     varchar(1024)   NOT NULL,
  `start_time`      varchar(64)     NOT NULL,
  `notes`           varchar(1024)   NULL,
  `address`         varchar(256)    NOT NULL,
  `html`            text            NOT NULL,

  PRIMARY KEY (`id`)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Sample data
--

-- --------------------------------------------------------

INSERT INTO `response`
    (`id`, `description`)
VALUES
    (0, 'Yes'),
    (1, 'No'),
    (2, 'Unknown');

INSERT INTO `group`
    (`name`, `username`, `password`, `notes`)
VALUES
    ('The Coutlees', 'coutlees', '12345', 'We are a group'),
    ('Mom', 'mom', 'mom', 'We are also a group'),
    ('The Test Group', 'guest', '', 'This is the ultimate test group');

INSERT INTO `guest`
    (`group_id`, `response_id`, `first_name`, `last_name`, `email`)
VALUES
    (1, 0, 'Shane', 'Coutlee', 'scoutlee@here.com'),
    (1, 1, 'Karen', 'Coutlee', 'kcoutlee@here.com'),
    (1, 0, 'Paige', 'Coutlee', NULL),
    (1, 0, 'Maya', 'Coutlee', NULL),
    (2, 2, 'Suzanne', 'VanElslander', 'svan@here.com'),
    (2, 2, 'Noah', 'Bayntun', NULL),
    (3, 1, 'Homer', 'Simpson', 'homer@simpson.com'),
    (3, 0, 'Marge', 'Simpson', NULL),
    (3, 2, 'Bart', 'Simpson', 'bart@simpson.com'),
    (3, 2, 'Lisa', 'Simpson', 'lisa@simpson.com');

INSERT INTO `gift`
    (`title`, `description`, `cost`, `fulfilled`)
VALUES
    ('TV', 'great!', 600, FALSE),
    ('HoneyMoon', 'Greece!', 3000, FALSE),
    ('Toaster', 'meh', 36, TRUE),
    ('Fruit Basket', 'yum', 21, FALSE),
    ('Goldfish', 'flush', 5, FALSE);

INSERT INTO `location`
    (`event_title`, `description`, `start_time`, `notes`, `address`, `html`)
VALUES
    ('Wedding Ceremony', 'smooth criminal', '6:00pm', '', '1600 Pennsylvania
        Avenue', '<iframe src='),
    ('Cocktail Hour', 'beat it', '7:00pm', '', 'Moscow, Russia, 103073', 
        '<iframe src='),
    ('Reception', 'thriller', '7:00am', '', 'London, SW1A 1AA, United Kingdom',
        '<iframe src=');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;