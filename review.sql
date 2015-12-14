-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: mysql.jessicavr.com
-- Generation Time: Dec 01, 2015 at 06:27 AM
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
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `cat_id` mediumint(9) NOT NULL,
  `name` varchar(40) NOT NULL,
  `review` text NOT NULL,
  `rating` tinytext NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `review`
--

