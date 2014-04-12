-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2014 at 09:23 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(30) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_password`) VALUES
(1, 'ayush', 'f2a22537f36161dbc9faf65e75f3e60f');

-- --------------------------------------------------------

--
-- Table structure for table `connect`
--

CREATE TABLE IF NOT EXISTS `connect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `message` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Doc_name` varchar(30) NOT NULL,
  `Doc_email` varchar(100) NOT NULL,
  `doc_contact` varchar(12) NOT NULL,
  `type` varchar(20) NOT NULL,
  `info` varchar(255) NOT NULL,
  `tags` varchar(800) NOT NULL,
  `doc_photo` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `Doc_name`, `Doc_email`, `doc_contact`, `type`, `info`, `tags`, `doc_photo`, `city`) VALUES
(1, 'Dr. Peter', 'peter@example.com', '9828090421', 'dentist', 'MBBS', '                        teeth/tooth       ', 'doc/Dr. Peter.jpg', 'jaipur'),
(2, 'Dr. Alex', 'alex@example.com', '9828096264', 'ent', 'MBBS, MD', '    breathe    head head-headche    neck      smell things    taste     vomit   ', 'doc/Dr. Alex.jpg', 'jaipur'),
(3, 'Dr. Maria', 'maria@exmaple.com', '8696666966', 'gynecologist', 'MBBS MS MD', ' assaulted              passurine            vagina vomit  weak ', 'doc/Dr. Maria.jpg', 'jaipur'),
(4, 'Dr. Eva', 'eva@example.com', '9999999999', 'neurologist', 'MBBS ', '        head head-headche       remember  sleep  sprain   taste      walk  write', 'doc/Dr. Eva.jpg', 'jaipur'),
(5, 'Dr. Harry', 'harry@example.com', '9825556258', 'orthopedic', 'MBBS MS MD', ' assaulted back   chest  fracture head  in a traffic accident   neck                walk  write torncartilage', 'doc/Dr. Harry.jpg', 'jaipur'),
(6, 'Dr. John', 'john@example.com', '8565856587', 'physician', 'MBBS', 'abdomen assaulted back blindness breathe chest cold/fever fracture head head-headche in a traffic accident limb nausea neck nosebleed passurine remember shot sleep smell things sprain stabbed stomach taste teeth/tooth tired torn cartilage vagina vomit walk weak write', 'doc/Dr. John.jpg', 'jaipur'),
(7, 'Dr. Michael', 'michael@example.com', '8745685265', 'surgeon', 'MBBS MD', 'abdomen assaulted back   chest cold/fever fracture head  in a traffic accident limb nausea  nosebleed passurine  shot sleep smell things sprain stabbed stomach     vagina vomit  weak ', 'doc/Dr. Michael.jpg', 'mumbai'),
(8, 'Dr. Jack', 'jack@exmaple.com', '7895458555', 'ent', 'MBBS', '    breathe    head head-headche    neck      smell things    taste     vomit   ', 'doc/Dr. Jack.jpg', 'jaipur'),
(9, 'Dr. Simon', 'simon@exapmle.com', '7898525486', 'neurologist', 'MBBS', '        head head-headche       remember  sleep  sprain   taste      walk  write', 'doc/Dr. Simon.jpg', 'delhi'),
(10, 'Dr. Jane', 'jane@exmaple.com', '8947698524', 'gynecologist', 'MBBS MD MS', ' assaulted              passurine            vagina vomit  weak ', 'doc/Dr. Jane.jpg', 'mumbai'),
(11, 'Dr. Bob', 'bob@example.com', '8925656898', 'surgeon', 'MBBS MD', 'abdomen assaulted back   chest cold/fever fracture head  in a traffic accident limb nausea  nosebleed passurine  shot sleep smell things sprain stabbed stomach     vagina vomit  weak ', 'doc/Dr. Bob.jpg', 'jaipur'),
(12, 'Dr. Ronald', 'ronald@example.com', '8526987456', 'physician', 'MBBS', 'abdomen assaulted back blindness breathe chest cold/fever fracture head head-headche in a traffic accident limb nausea neck nosebleed passurine remember shot sleep smell things sprain stabbed stomach taste teeth/tooth tired torn cartilage vagina vomit walk weak write', 'doc/Dr. Ronald.jpg', 'delhi');

-- --------------------------------------------------------

--
-- Table structure for table `security`
--

CREATE TABLE IF NOT EXISTS `security` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(50) NOT NULL,
  `browser` varchar(50) NOT NULL,
  `time` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE IF NOT EXISTS `signup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `sec_que` varchar(255) NOT NULL,
  `sec_ans` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `username`, `password`, `name`, `email`, `age`, `sex`, `city`, `sec_que`, `sec_ans`, `photo`) VALUES
(1, 'ayush', 'f2a22537f36161dbc9faf65e75f3e60f', 'ayush', 'ayush.sharma469@gmail.com', 19, 'male', 'jaipur', 'who is your favourite teacher ?', 'google', 'profiles/ayush.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
