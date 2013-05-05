-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2013 at 07:38 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `clearmind`
--

-- --------------------------------------------------------

--
-- Table structure for table `node`
--

CREATE TABLE `node` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `root` int(10) unsigned DEFAULT NULL,
  `lft` int(10) unsigned NOT NULL,
  `rgt` int(10) unsigned NOT NULL,
  `level` smallint(5) unsigned NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lft` (`lft`),
  KEY `rgt` (`rgt`),
  KEY `level` (`level`),
  KEY `root` (`root`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=301 ;

--
-- Dumping data for table `node`
--

INSERT INTO `node` (`id`, `user_id`, `root`, `lft`, `rgt`, `level`, `title`, `content`) VALUES
(1, 167, 1, 1, 16, 1, 'Joe Schmoe', 'That''s me'),
(2, 167, 1, 2, 7, 2, 'Personal', 'My personal stuff'),
(283, 168, 1, 1, 16, 1, 'McSilviorr', 'That''s mexdddhhdjhkfjfhkasdf\n\nwas this the one, i cant believe this is working. oh yeah i know its working.'),
(284, 168, 1, 2, 7, 2, 'Personal', 'My personal stuffuytuyt'),
(295, 168, 1, 8, 13, 2, 'New node', 'kjhkjhkjhk'),
(296, 168, 1, 14, 15, 2, 'hkjhkjhlkjlkj', 'utyui'),
(297, 168, 1, 3, 6, 3, 'asdasdd', ''),
(298, 168, 1, 4, 5, 4, 'asd', ''),
(299, 168, 1, 9, 10, 3, 'oink', ''),
(300, 168, 1, 11, 12, 3, 'oink', '');

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
(167, 'mcsilvio', '$2a$08$476e2fbf45ac927435ac8uzJB3Kk0FqgGXohGTW43bcURk4i3Y1V.', 'mcsilvio@gmail.com', '$2a$08$95ff0bb0bd42988e9eb25uuV2zldKuiGyVrwKRthFTdQ4zKGXkC0i', 1, '2013-03-10 00:41:36', '2013-04-09 11:28:38', 'asdsa'),
(168, 'mcsilvior', '$2a$08$c0a7abeb97aba6104d208OGEKN9rqluyXuEqy.WforE6ZIM7Y3uyy', 'asd@asd.asd', '$2a$08$77328bda04a16126440ecOxHh5GpN1N.0azPLtdaBV73eLnp9GC/W', 1, '2013-03-13 22:26:14', '2013-04-09 11:28:49', 'asdsa');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_9` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
