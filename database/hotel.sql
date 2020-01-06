-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2020 at 11:41 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `add_room`
--

CREATE TABLE `add_room` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `hotel_id` int(50) NOT NULL,
  `wifi` varchar(100) NOT NULL,
  `ac` varchar(100) NOT NULL,
  `ac_per_day` int(50) NOT NULL,
  `body_message` varchar(100) NOT NULL,
  `body_message_per_day` int(50) NOT NULL,
  `meal` varchar(100) NOT NULL,
  `meal_per_day` int(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `bed_cost` int(100) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_room`
--

INSERT INTO `add_room` (`id`, `name`, `hotel_id`, `wifi`, `ac`, `ac_per_day`, `body_message`, `body_message_per_day`, `meal`, `meal_per_day`, `image`, `price`, `bed_cost`, `type`) VALUES
(23, 'Room_2', 1, 'yes', 'yes', 500, 'yes', 500, 'yes', 3500, '2011-living-room-design.jpg', 5000, 2000, '2'),
(24, 'Room_3', 1, 'yes', 'yes', 1234, 'yes', 500, 'yes', 3500, 'a4b618848bb3cc7c76a1a13eccf9b842.jpg', 3000, 700, '1'),
(25, 'Room_4', 1, 'yes', 'yes', 1234, 'yes', 290, 'yes', 432, 'house-plants-08.jpg', 3000, 2000, '1'),
(26, 'Room-1', 1, 'yes', 'yes', 1234, 'yes', 500, 'yes', 3500, 'la-plus-20915617-3-1538160767.jpg', 3000, 2000, '1');

-- --------------------------------------------------------

--
-- Table structure for table `bed`
--

CREATE TABLE `bed` (
  `sl_id` int(20) NOT NULL,
  `bed_no` varchar(100) NOT NULL,
  `room_id` varchar(100) NOT NULL,
  `check_in` varchar(100) NOT NULL,
  `check_out` varchar(100) NOT NULL,
  `user_id` int(50) NOT NULL,
  `status` int(50) NOT NULL,
  `bed_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bed`
--

INSERT INTO `bed` (`sl_id`, `bed_no`, `room_id`, `check_in`, `check_out`, `user_id`, `status`, `bed_image`) VALUES
(8, 'RDA108-2', '7', '', '', 0, 0, '14.jpg'),
(22, 'RDA1', '22', '', '', 0, 0, '125-great-ideas-for-children39s-room-design-0-916.jpg'),
(23, 'RDA2', '22', '', '', 0, 0, '2011-living-room-design.jpg'),
(24, 'RDA3', '23', '', '', 0, 0, 'a4b618848bb3cc7c76a1a13eccf9b842.jpg'),
(25, 'RDA_4', '23', '', '', 0, 0, 'bedroom-design-ideas-lead-1565726251.jpg'),
(26, 'RDA_Single', '24', '', '', 0, 0, 'nice-bedroom-colors-for-guys-ideas-good-awesome-wall-interesting-best-about-cute-s.jpg'),
(27, 'RDA-4', '25', '', '', 0, 0, 'STL_default_name_100926958.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `bed_no` varchar(100) NOT NULL,
  `check_in` varchar(100) NOT NULL,
  `check_out` varchar(100) NOT NULL,
  `num_days` int(50) NOT NULL,
  `ac` varchar(100) NOT NULL,
  `meal` varchar(100) NOT NULL,
  `spa` varchar(100) NOT NULL,
  `total` int(50) NOT NULL,
  `statas` int(50) NOT NULL,
  `account_number` varchar(100) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `comission` int(30) NOT NULL,
  `earn` int(30) NOT NULL,
  `cus_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `visa_image` varchar(100) NOT NULL,
  `cus_address` varchar(100) NOT NULL,
  `bed_id` int(30) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `bed_no`, `check_in`, `check_out`, `num_days`, `ac`, `meal`, `spa`, `total`, `statas`, `account_number`, `transaction_id`, `comission`, `earn`, `cus_name`, `email`, `mobile`, `image`, `visa_image`, `cus_address`, `bed_id`, `date`) VALUES
(12, 26, 'single bed', '2019-12-28', '2019-12-29', 1, 'no', 'no', 'no', 1000, 1, '5eytedytd', '123653', 0, 0, 'shovo', 'admin', '017597843367', 'm-shutterbug.jpg', 'm-lighthouse.jpg', 'house 123', 14, '2019-12-27'),
(13, 23, 'RDA_4', '2019-12-29', '2019-12-30', 1, 'no', 'no', 'no', 5000, 1, '122334423', '1hiy378162g612', 0, 0, 'shovo', 'Admin@gmail.com', '01759784337', '65-658540_item-01-happy-man-face-png.png', '65-658540_item-01-happy-man-face-png.png', 'Dhaka', 25, '2019-12-29'),
(14, 25, 'RDA3', '2019-12-29', '2019-12-30', 1, 'yes', 'no', 'no', 5500, 0, '5eytedytd', '5edytd', 0, 0, 'shovo', 'sadad@gmail.com', '01759784337', '65-658540_item-01-happy-man-face-png.png', '65-658540_item-01-happy-man-face-png.png', 'dhaka', 24, '2019-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(16) DEFAULT NULL,
  `phoneno` int(80) DEFAULT NULL,
  `cdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `msg` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fullname`, `email`, `phoneno`, `cdate`, `msg`) VALUES
(1, 'shovo das', 'shovodas921@gmai', 1635229748, NULL, 'zvxzv'),
(2, 'shovo das', 'shovodas921@gmai', 1635229748, '2019-12-15 08:42:23', 'vk,vkj hn '),
(3, 'shovo', 'shovo@gmail.com', 0, '2019-12-23 10:54:09', 'cbxbxc');

-- --------------------------------------------------------

--
-- Table structure for table `cost`
--

CREATE TABLE `cost` (
  `id` int(30) NOT NULL,
  `date` varchar(100) NOT NULL,
  `cost` int(20) NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cost`
--

INSERT INTO `cost` (`id`, `date`, `cost`, `desc`) VALUES
(1, '2019-12-29', 500, ' room clean');

-- --------------------------------------------------------

--
-- Table structure for table `criminal_info`
--

CREATE TABLE `criminal_info` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `criminal_info`
--

INSERT INTO `criminal_info` (`id`, `name`, `image`, `mobile`, `details`) VALUES
(0, 'tayeb', '85476233-bearded-man-in-handcuffs-holds-a-sign-criminal-mug-shots.jpg', '01759784337', '  bad boy'),
(0, 'Kawsar', '20191105_081246-removebg-preview.png', '0163522668', ' the best crimial');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `join_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `username`, `email`, `mobile`, `image`, `address`, `city`, `salary`, `join_date`) VALUES
(2, 'shovo', 'sadad@gmail.com', '0176735753', 'profile-pic.jpg', 'dhaka', '', '12999', '2019-12-26'),
(5, 'goni', 'sadad@gmail.com', '01759784337', 'shutterbug.jpg', 'dhaka', '', '26000', '2019-12-25'),
(6, 'mr .konel', 'sadad@gmail.com', '0176735753', 'happy-man.png', 'dhaka', '', '26000', '2019-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `feature_image` varchar(100) NOT NULL,
  `gallary_images` varchar(100) NOT NULL,
  `status` int(20) NOT NULL,
  `wifi` varchar(100) NOT NULL,
  `meal` varchar(200) NOT NULL,
  `meal_price` int(20) NOT NULL,
  `car_parking` varchar(150) NOT NULL,
  `gym` varchar(150) NOT NULL,
  `gym_price` int(20) NOT NULL,
  `code_name` varchar(50) NOT NULL,
  `swiming_pol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `name`, `description`, `location`, `country`, `feature_image`, `gallary_images`, `status`, `wifi`, `meal`, `meal_price`, `car_parking`, `gym`, `gym_price`, `code_name`, `swiming_pol`) VALUES
(1, 'Suite_Hotel', '', 'uttara,dhaka', 'Bangladesh', 'g3.jpg', '', 1, 'Wifi', 'Meal', 1000, 'Car parking', 'Gym', 150, 'suite', 'Swiming pol');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) UNSIGNED NOT NULL,
  `usname` varchar(30) DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL,
  `type` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `usname`, `pass`, `type`) VALUES
(1, 'Admin', '1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `marchant_login`
--

CREATE TABLE `marchant_login` (
  `id` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `status` int(20) NOT NULL,
  `comission` int(10) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marchant_login`
--

INSERT INTO `marchant_login` (`id`, `username`, `email`, `mobile`, `password`, `address`, `city`, `status`, `comission`, `fullname`, `image`) VALUES
(23, 'goni', 'goni@gmail.com', 1759784337, '1234', 'house 4', 'Dhaka', 1, 0, 'ousman', 'hero-img.png'),
(24, 'krishna', 'krishna@gmail.com', 19865243, '1234', 'house 4', 'Dhaka', 1, 0, 'krishna das', 'about-img.png'),
(25, 'shovo', 'sadad@gmail.com', 0, '1234', 'axxzxxz', 'dhaka', 1, 0, 'shovodas', 'a.jpg'),
(26, 'admin', 'sadad@gmail.com', 1759784337, '1234', 'dhaka', 'dhaka', 1, 0, 'tayeb', 'm-liberty.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `sl` int(20) NOT NULL,
  `bed_no` varchar(100) NOT NULL,
  `check_in` varchar(100) NOT NULL,
  `check_out` varchar(100) NOT NULL,
  `user_id` int(20) NOT NULL,
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`sl`, `bed_no`, `check_in`, `check_out`, `user_id`, `status`) VALUES
(1, '25', '2019-12-29', '2019-12-30', 23, 0),
(2, '24', '2019-12-29', '2019-12-30', 25, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_room`
--
ALTER TABLE `add_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bed`
--
ALTER TABLE `bed`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost`
--
ALTER TABLE `cost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marchant_login`
--
ALTER TABLE `marchant_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`sl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_room`
--
ALTER TABLE `add_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `bed`
--
ALTER TABLE `bed`
  MODIFY `sl_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cost`
--
ALTER TABLE `cost`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marchant_login`
--
ALTER TABLE `marchant_login`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `sl` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
