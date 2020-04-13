-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2020 at 09:24 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `njangi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `location` varchar(222) NOT NULL,
  `phonenumber` varchar(222) NOT NULL,
  `role` varchar(222) NOT NULL,
  `pwd` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `location`, `phonenumber`, `role`, `pwd`) VALUES
(1, 'Admin', 'alicendeh16@gmail.com', 'buea', '+237-679-165-995', 'Admin', '$2y$10$aAenGzYUq9C6TBoFluJhZeW7Kh8RH5tVIcYwsKp5V9CI9YohKq0XS');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `role` varchar(222) NOT NULL,
  `user_acc_status` varchar(222) NOT NULL,
  `name` tinytext NOT NULL,
  `location` longtext NOT NULL,
  `phonenumber` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `pwd` longtext NOT NULL,
  `image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `role`, `user_acc_status`, `name`, `location`, `phonenumber`, `email`, `pwd`, `image`) VALUES
(18, 'member', 'APPROVED', 'frank', 'kumba', '+237-679-165-995', 'paul@gmial.com', '$2y$10$7R27OYEE319VXtrnBGTg1e6x1DL0kBTqnaMif6Y8XW2BC1MosfwmO', 'wallpaper_08.jpg'),
(19, 'member', 'APPROVED', 'mama', 'buea', '+237-679-165-995', 'alicendeh16@gmail.com', '$2y$10$YbBUOASZqgrbJEdlaq3Dl.CnL6kxQPAX74697gDVM3SEPEQX3BR9u', 'wallpaper_10.jpg'),
(20, 'member', 'APPROVED', 'yannick', 'buea', '+237-679-165-995', 'alicendeh16@gmail.com', '$2y$10$x7G6xG2SlIm8hYPvDjGMQeX8oZIN.WKa9EaCEhgzZK90VygU1rooy', 'wallpaper_12.jpg'),
(21, 'member', 'APPROVED', 'Muma', 'limbe', '+237-679-165-996', 'muma00@gmail.com', '$2y$10$ReUf3L6nsIsSvcpVm8FrVO7zQQE/IvJgsaEPEvbOMYrGfynDHG6cG', 'wallpaper_10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` varchar(222) NOT NULL,
  `member_id` int(11) NOT NULL,
  `week_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `member_id`, `week_id`, `amount`) VALUES
('181586558005', 18, 1586558005, 8000),
('181586635464', 18, 1586635464, 6000),
('181586723784', 18, 1586723784, 6000),
('191586558005', 19, 1586558005, 8000),
('191586635464', 19, 1586635464, 6000),
('201586558005', 20, 1586558005, 8000),
('201586635464', 20, 1586635464, 6000),
('211586635464', 21, 1586635464, 6000),
('211586723784', 21, 1586723784, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `week`
--

CREATE TABLE `week` (
  `week_id` int(111) NOT NULL,
  `title` varchar(222) NOT NULL,
  `ammount` int(11) NOT NULL,
  `benefiter` varchar(222) NOT NULL,
  `active` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `week`
--

INSERT INTO `week` (`week_id`, `title`, `ammount`, `benefiter`, `active`) VALUES
(1586547935, '0', 5000, '0', ''),
(1586547999, 'Johns week', 5000, '0', ''),
(1586548501, 'Johns week', 6000, '0', 'INACTIVE'),
(1586548744, 'marrys week', 6000, '0', 'INACTIVE'),
(1586549263, 'peters week ', 4000, '0', 'INACTIVE'),
(1586555343, 'mumas week', 5000, '0', 'INACTIVE'),
(1586558005, 'mumas week', 8000, 'muma', 'INACTIVE'),
(1586635464, 'cinthias week', 6000, 'yannick', 'INACTIVE'),
(1586723784, 'Johns week', 6000, 'john', 'ACTIVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
