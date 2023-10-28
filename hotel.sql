-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2017 at 05:44 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `apass` varchar(30) NOT NULL,
   UNIQUE KEY (mail) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `admin` (`aid`, `name`, `apass`, `mail`) VALUES
(1, 'nikhil', 'nikhil', 'nikhil@maharaja.com'),
(2, 'banda', 'banda', 'banda@maharaja.com');


-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `room_id` int(200) NOT NULL,
  `bk_id` int(200) NOT NULL,
  `cat` text NOT NULL,
  `uid` int(200) NOT NULL,
  `cin` date NOT NULL,
  `cout` date NOT NULL,
  `name` text NULL,
  `phone` int(100) NOT NULL,
  `book` text NOT NULL
) ENGINE=InnoDB;


/*
INSERT INTO `booking_details` (`room_id`, `bk_id`, 'cat', 'uid', `cin`, `cout`, `name`, `phone`, `book`) VALUES
(23, 101, 'Family', 0, '0000-00-00', '0000-00-00', '', 0, 'false'),
(24, 102, 'Family', 0, '0000-00-00', '0000-00-00', '', 0, 'false'),
(25, 103, 'Family', 0, '0000-00-00', '0000-00-00', '', 0, 'false'),
(26, 104, 'Family', 0, '0000-00-00', '0000-00-00', '', 0, 'false'),
(27, 105, 'Family', 0, '0000-00-00', '0000-00-00', '', 0, 'false'),
(28, 106, 'Super Comfort', 0, '0000-00-00', '0000-00-00', '', 0, 'false'),
(29, 107, 'Super Comfort', 0, '0000-00-00', '0000-00-00', '', 0, 'false'),
(30, 108, 'Super Comfort', 0, '0000-00-00', '0000-00-00', '', 0, 'false'),
(31, 109, 'Super Comfort', 0, '0000-00-00', '0000-00-00', '', 0, 'false'),
(32, 110, 'Super Comfort', 0, '0000-00-00', '0000-00-00', '', 0, 'false'),
(33, 111, 'Duplex', 0, '0000-00-00', '0000-00-00', '', 0, 'false'),
(34, 112, 'Duplex', 0, '0000-00-00', '0000-00-00', '', 0, 'false'),
(35, 113, 'Duplex', 0, '0000-00-00', '0000-00-00', '', 0, 'false'),
(36, 114, 'Duplex', 0, '0000-00-00', '0000-00-00', '', 0, 'false'),
(37, 115, 'Duplex', 0, '0000-00-00', '0000-00-00', '', 0, 'false');
*/
-- --------------------------------------------------------

--
-- Table structure for table `room_category`
--

CREATE TABLE `room_category` (
  `room_id` int(11) NOT NULL,
  `roomname` text NOT NULL,
  `room_qnty` int(11) NOT NULL,
  `available` int(11) NOT NULL,
  `booked` int(11) NOT NULL,
  `no_bed` int(11) NOT NULL,
  `bedtype` text NOT NULL,
  `facility` text NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY ('room_id')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_category`
--

 INSERT INTO `room_category` (`roomname`, `room_qnty`, `available`, `booked`, `no_bed`, `bedtype`, `facility`, `price`) VALUES
('Duplex', 5, 5, 0, 2, 'single', 'AC, TV, Wifi', 1500),
('Family', 5, 5, 0, 2, 'double', 'Sofa, TV, WIFI, Balcony, AC.', 3500),
('Super Comfort', 5, 5, 0, 1, 'double', 'AC, TV, WIFI', 2200);

--
-- Creating 'user' table
--

CREATE TABLE `user` (
 `uid` INT(11) NOT NULL , 
 `fname` VARCHAR(40) NOT NULL ,
 `lname` VARCHAR(40) NOT NULL ,
 `num` INT(11) NOT NULL ,
 `mail` VARCHAR(20) NOT NULL ,
 `addr` text NOT NULL , 
 `file` BLOB NOT NULL ,
 `nation` text NOT NULL ,
 `pass` VARCHAR(15) NOT NULL ,
  UNIQUE KEY ('mail'),
  UNIQUE KEY ('num')
  PRIMARY KEY (`uid`),
  ) ENGINE = InnoDB;

--
-- Creating 'payment' table
--

CREATE TABLE 'payment' (
'rec_id' INT NOT NULL,
'uid' INT(11) NOT NULL,
'uname' text NOT NULL,
'price' float NOT NULL,
'pay_mode' text NOT NULL,
't_date' DateTime NOT NULL
 ) ENGINE = InnoDB;

--
-- Creating 'cancel' table
--

CREATE TABLE 'cancel'(
'c_amt' float NOT NULL,
'c_date' DateTime NOT NULL,
'rec_id' INT NOT NULL,
'uid' INT NOT NULL,
) ENGINE = InnoDB;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manager`
--
-- ALTER TABLE `manager`
-- ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `rooms`
--
-- ALTER TABLE `rooms`
--  ADD PRIMARY KEY (`room_id`);
  

--
-- Indexes for table `room_category`
--
-- ALTER TABLE `room_category`
--  ADD PRIMARY KEY (`roomname`(100));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `admin`
  MODIFY `uid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `booking_details`
  MODIFY `room_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
