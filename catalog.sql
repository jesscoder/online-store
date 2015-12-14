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
-- Table structure for table `productTable`
--

CREATE TABLE IF NOT EXISTS `productTable` (
  `ID` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` float(5,2) NOT NULL,
  `desc_short` tinytext NOT NULL,
  `desc_long` text NOT NULL,
  `image_sm` tinytext NOT NULL,
  `image_lg` varchar(255) NOT NULL,
  `reviews` smallint(6) NOT NULL,
  `rating` float NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `productTable`
--

INSERT INTO `productTable` (`ID`, `name`, `price`, `desc_short`, `desc_long`, `image_sm`, `image_lg`, `reviews`, `rating`) VALUES
(2, 'Holstee - Quote Cards', 15.00, 'Typography Poster Quote', 'Typographic Poster. "Whatever you are, be a good one." - Abraham Lincoln\r\n', 'images/holstee-1.jpg', 'images/holstee-1-l.jpg', 2, 0),
(3, 'Holstee - Quote Cards', 15.00, 'Typography Poster Quote', 'Typographic Poster. "I have learned that to be with those I love is enough." - Walt Whitman', 'images/holstee-2.jpg', 'images/holstee-2-l.jpg', 0, 0),
(4, 'Do You Believe', 20.00, 'Do You Believe - Typographic Poster by Jonathan Minns', 'Do You Believe - Typographic Poster by Jonathan Minns.\r\n\r\n"If you believe you can do it, go out there & do it, because that''s the only way you''re gonna get it!" - Harry Main', 'images/do-you.jpg', 'images/do-you-l.jpg', 1, 0),
(5, 'I was blind, but now I see.', 13.00, 'Typographic Poster From Series: An Idea Everyday', 'Typographic Poster from series: An Idea Everyday. \r\n\r\n"I was blind, but now I see."', 'images/blind.jpg', 'images/blind-l.jpg', 0, 0),
(6, 'Casablanca Movie Poster', 14.50, 'Casablanca Movie Poster', 'Casablanca Movie Poster.\r\n\r\n"Play it, Sam, Play ''As time goes by''".', 'images/casablanca.jpg', 'images/casablanca-l.jpg', 1, 0),
(7, 'The Saw Typography by Zachary Smith', 25.00, 'The Saw Typography by Zachary Smith.', 'The Saw Typography by Zachary Smith.\r\n\r\n"Evertone is hungry. You''re not the only 1 grinding."', 'images/saw.jpg', 'images/saw-l.jpg', 1, 0),
(8, 'Garamond Typeface Poster', 29.00, 'Garamond Typeface Poster.', 'Garamond Typeface Poster. The original Gangsta of serif typography. ', 'images/garamond.jpg', 'images/garamond-l.jpg', 0, 0),
(9, '"Some Day" by Mushky Ginsburg', 12.23, '"Some Day" by Mushky Ginsburg.', '"Some Day" by Mushky Ginsburg.\r\n\r\n"Some day you will go far. I hope you stay there."', 'images/some-day.jpg', 'images/some-day-l.jpg', 0, 0),
(10, 'Rock you! by Overloaded Design', 20.00, 'Rock you! by Overloaded Design.', 'Rock you! by Overloaded Design.\r\n\r\n"Rock You! The rock n'' roll night. Live Bands, Radical Radio, Index Of...etc."', 'images/rock-you.jpg', 'images/rock-you-l.jpg', 0, 0),
(11, 'Bound by Blood', 30.00, 'Bound by Blood.', 'Bound by Blood. 2014', 'images/bound.jpg', 'images/bound-l.jpg', 0, 0);
