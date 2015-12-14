-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: mysql.jessicavr.com
-- Generation Time: Dec 14, 2015 at 07:54 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `jessicavr_com_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `ID` mediumint(9) NOT NULL AUTO_INCREMENT,
  `cat_id` mediumint(9) NOT NULL,
  `name` varchar(40) NOT NULL,
  `reviews` text NOT NULL,
  `rating` tinytext NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ID`, `cat_id`, `name`, `reviews`, `rating`, `date`) VALUES
(1, 0, 'cg', 'fcg', '5', '2015-12-04 00:31:15'),
(2, 0, 'g', 'g', '5', '2015-12-04 00:31:56'),
(3, 0, 'Jessica', 'Test', '5', '2015-12-04 00:32:17'),
(4, 0, '', '', '0', '2015-12-04 00:36:01'),
(5, 0, '', '', '0', '2015-12-05 12:28:26'),
(6, 0, '', '', '0', '2015-12-05 17:42:14'),
(7, 0, '', '', '0', '2015-12-05 17:42:24'),
(8, 0, 'try', 'try', '3', '2015-12-09 18:23:37'),
(9, 0, 'try', 'try try', '5', '2015-12-09 19:48:31'),
(10, 0, 'test', 'test', '2', '2015-12-10 10:02:41'),
(11, 0, 'try', 'try', '3', '2015-12-11 23:35:26'),
(12, 4, '', '0', '', '2015-12-14 05:13:46'),
(13, 6, '', '0', '', '2015-12-14 05:24:29'),
(14, 2, '', '0', '', '2015-12-14 05:32:26'),
(15, 2, '', '0', '', '2015-12-14 06:21:01'),
(16, 7, '', '0', '', '2015-12-14 07:53:07');
