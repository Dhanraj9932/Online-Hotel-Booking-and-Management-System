-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 06:42 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--
CREATE DATABASE IF NOT EXISTS `hotel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hotel`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `apass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `name`, `mail`, `apass`) VALUES
(98, 'nikhil', 'nikhil@maharaja.com', 'nikhil'),
(99, 'banda', 'banda@maharaja.com', 'banda');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `room_id` int(200) NOT NULL,
  `bk_id` int(200) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `uid` int(200) NOT NULL,
  `cin` date NOT NULL,
  `cout` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `nump` int(50) NOT NULL,
  `phone` int(100) NOT NULL,
  `book` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`room_id`, `bk_id`, `cat`, `uid`, `cin`, `cout`, `name`, `nump`, `phone`, `book`) VALUES
(23, 101, 'Family', 3, '2021-11-25', '2021-11-30', 'Arjun', 3, 456123, 'true'),
(25, 103, 'Family', 0, '0000-00-00', '0000-00-00', '', 4, 0, 'false'),
(26, 104, 'Family', 0, '0000-00-00', '0000-00-00', '', 1, 0, 'false'),
(27, 105, 'Family', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(28, 106, 'Super Comfort', 1, '2021-11-25', '2021-11-30', 'Nikhil', 3, 2147483647, 'true'),
(30, 108, 'Super Comfort', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(31, 109, 'Super Comfort', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(32, 110, 'Super Comfort', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(33, 111, 'Duplex', 4, '2021-11-01', '2021-11-05', 'Shiv K', 2, 2147483647, 'true'),
(34, 112, 'Duplex', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(35, 113, 'Duplex', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(36, 114, 'Duplex', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(37, 115, 'Duplex', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(38, 116, 'King', 0, '0000-00-00', '0000-00-00', '', 0, 0, 'false'),
(39, 117, 'King', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(40, 118, 'King', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(41, 119, 'King', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(42, 120, 'King', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(43, 121, 'Queen', 1, '2021-11-25', '2021-11-30', 'Vashnav', 6, 2147483647, 'true'),
(45, 123, 'Queen', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(46, 124, 'Queen', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(47, 125, 'Queen', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `cancel`
--

CREATE TABLE `cancel` (
  `rec_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `c_amt` float NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `rec_id` int(50) NOT NULL,
  `uid` int(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `pay_mode` varchar(50) NOT NULL,
  `t_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`rec_id`, `uid`, `uname`, `price`, `pay_mode`, `t_date`) VALUES
(1, 3, 'krishna', 3500, 'PayTM/UPI', '2021-11-23 00:00:00'),
(2, 3, 'krishna', 3500, 'Pay at Hotel', '2021-11-23 00:00:00'),
(3, 3, 'Ram', 3500, 'Pay at Hotel', '2021-11-23 00:00:00'),
(4, 3, 'Arjun', 3500, 'Pay at Hotel', '2021-11-23 12:34:57'),
(5, 4, 'Shiv K', 1500, 'PayTM/UPI', '2021-11-24 07:27:26'),
(6, 3, 'Pratam', 2500, 'PayTM/UPI', '2021-11-24 07:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `room_category`
--

CREATE TABLE `room_category` (
  `roomname` text NOT NULL,
  `room_qnty` int(10) NOT NULL,
  `available` int(10) NOT NULL,
  `booked` int(10) NOT NULL,
  `no_bed` int(10) NOT NULL,
  `bedtype` text NOT NULL,
  `facility` text NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_category`
--

INSERT INTO `room_category` (`roomname`, `room_qnty`, `available`, `booked`, `no_bed`, `bedtype`, `facility`, `price`) VALUES
('Duplex', 5, 5, 0, 2, 'single', 'AC, TV, Wifi', 1500),
('Family', 5, 5, 0, 2, 'double', 'Sofa, TV, WIFI, Balcony, AC', 3500),
('King', 5, 5, 0, 2, 'double', 'Sofa, TV, WIFI, Balcony, AC', 3000),
('Queen', 5, 5, 0, 2, 'single', 'TV, WIFI, Balcony, AC', 2500),
('Super Comfort', 5, 5, 0, 1, 'double', 'Sofa, TV, WIFI, Balcony, AC', 2200),
('Luxury', 5, 5, 0, 2, 'double', 'All', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `num` int(100) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `file` blob NOT NULL,
  `nation` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `fname`, `lname`, `num`, `mail`, `file`, `nation`, `pass`) VALUES
(1, 'Rushi', 'K', 456789, 'rushi@mail.com', '', 'Indian', '789'),
(2, 'Shivraj', 'C', 456789, 'shivaraj@mail.com', '', 'Indian', '789'),
(3, 'Krishna', 'B', 456789, 'krishna@mail.com', '', 'Indian', '123'),
(4, 'Shiv', 'K', 2147483647, 'shiv@gmail.com', 0x4b4b2e4a5047, 'INDIAN', 'shiv');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`bk_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `rec_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
