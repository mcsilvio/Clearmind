-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2013 at 03:05 AM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `clearmind`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `root` int(10) unsigned DEFAULT NULL,
  `lft` int(10) unsigned NOT NULL,
  `rgt` int(10) unsigned NOT NULL,
  `level` smallint(5) unsigned NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lft` (`lft`),
  KEY `rgt` (`rgt`),
  KEY `level` (`level`),
  KEY `root` (`root`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=295 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `user_id`, `root`, `lft`, `rgt`, `level`, `name`, `description`) VALUES
(1, 167, 1, 1, 18, 1, 'Joe Schmoe', 'That''s me'),
(2, 167, 1, 2, 13, 2, 'Personal', 'My personal stuff'),
(280, 167, 1, 3, 12, 3, 'Doctor', 'Ouch my ass'),
(283, 168, 1, 1, 18, 1, 'Joe Schmoe', 'That''s mexxxxxxx'),
(284, 168, 1, 2, 13, 2, 'Personal', 'My personal stuff'),
(285, 168, 1, 3, 12, 3, 'Doctor', 'Ouch Your Ass'),
(289, 167, 1, 4, 7, 4, 'Pleasure', 'My personal stuff'),
(290, 167, 1, 5, 6, 5, 'Doctor', 'Ouch my ass'),
(291, 168, 1, 14, 17, 2, 'School', ''),
(292, 168, 1, 15, 16, 3, 'Sucks', 'Its true2'),
(293, 168, 1, 8, 11, 4, 'School', ''),
(294, 168, 1, 9, 10, 5, 'Sucks', 'Its true3');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `emailNewsLetter` tinyint(1) NOT NULL DEFAULT '0',
  `emailUpdates` tinyint(1) NOT NULL DEFAULT '0',
  `daily_emails` tinyint(1) NOT NULL DEFAULT '1',
  `last_emailed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=97 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `first_name`, `last_name`, `birthday`, `emailNewsLetter`, `emailUpdates`, `daily_emails`, `last_emailed`) VALUES
(95, 167, NULL, NULL, NULL, 0, 0, 1, '2013-03-10 05:41:36'),
(96, 168, NULL, NULL, NULL, 0, 0, 1, '2013-03-14 02:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activationcode` varchar(60) DEFAULT NULL,
  `activated` tinyint(1) NOT NULL,
  `registration_date` datetime NOT NULL,
  `last_login_date` datetime NOT NULL,
  `last_login_ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `activationcode` (`activationcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=169 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `activationcode`, `activated`, `registration_date`, `last_login_date`, `last_login_ip`) VALUES
(167, 'mcsilvio', '$2a$08$476e2fbf45ac927435ac8uzJB3Kk0FqgGXohGTW43bcURk4i3Y1V.', 'mcsilvio@gmail.com', '$2a$08$95ff0bb0bd42988e9eb25uuV2zldKuiGyVrwKRthFTdQ4zKGXkC0i', 1, '2013-03-10 00:41:36', '2013-03-13 23:14:59', 'asdsa'),
(168, 'mcsilvior', '$2a$08$c0a7abeb97aba6104d208OGEKN9rqluyXuEqy.WforE6ZIM7Y3uyy', 'asd@asd.asd', '$2a$08$77328bda04a16126440ecOxHh5GpN1N.0azPLtdaBV73eLnp9GC/W', 1, '2013-03-13 22:26:14', '2013-03-20 22:05:04', 'asdsa');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_9` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

