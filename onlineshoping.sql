-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2017 at 07:58 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshoping`
--

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `cardNumber` varchar(150) NOT NULL,
  `postalCode` varchar(150) NOT NULL,
  `years` varchar(20) NOT NULL,
  `months` text NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`id`, `email`, `cardNumber`, `postalCode`, `years`, `months`, `quantity`) VALUES
(1, '', '545454', '5454454', '', '', 0),
(2, '', '545454', '5454454', '', '', 0),
(3, '', '545454', '5454454', '', '', 0),
(4, 'umtskt1122@gmail.com', '545454', '5454454', '', '', 0),
(5, 'akh@a.com', 'asdfas', '22222', '', '', 0),
(6, 'umtskt1122@gmail.com', 'dsdsd', 'ds', '2017', 'Jan', 4),
(7, 'umtskt1122@gmail.com', '3333', '3333', '2017', 'Jan', 4),
(8, 'umtskt1122@gmail.com', '222', '22', '2017', 'Jan', 7),
(9, 'saqbi@yahoo.com', '1234w', '21312', '2017', 'Jan', 3),
(10, 'abdullah@gmail.com', 'sdsds', 'dsddsd', '2017', 'Aug', 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Surgical'),
(2, 'Dental'),
(3, 'Manicure Instruments '),
(4, 'dental'),
(5, 'ahmed');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `image`) VALUES
(2, 'upload/2.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(150) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subCat_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `cat_id`, `subCat_id`, `price`, `description`, `image`) VALUES
(24, 'hshhshs22222', 1, 12, 88, 'skjdsdhdjkdgjdgad', 'upload/33-309-28.jpg'),
(25, '222', 1, 13, 111, 'skjdsdhdjkdgjdgad', 'upload/33-300-21.jpg'),
(26, '12', 1, 13, 3444, 'skjdsdhdjkdgjdgad', 'upload/54-101_41_61_0_l.jpg'),
(27, 'sdifn', 2, 13, 234, 'dfhgrsths', 'upload/33-300-21.jpg'),
(28, 'wer', 3, 12, 234, 'dfgdfg', 'upload/54-101_41_61_0_l.jpg'),
(29, 'uyhygyu', 3, 14, 0, 'ytft6fd', 'upload/13-248-13.jpg'),
(30, 'my new  ;porduct', 2, 12, 23322, 'ssdsdsd', 'upload/1.jpeg'),
(31, 'my new  ;porduct', 1, 12, 23322, 'ssdsdsd', 'upload/cal1l.png');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`sub_id`, `sub_name`, `id`) VALUES
(12, 'lahore', 2),
(13, 'Foot', 1),
(14, 'tum', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` varchar(150) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `email`, `password`, `role`, `time`) VALUES
(1, 'abdullah', 'umtskt1122@gmail.com', '1234567', 'user', '2017-01-15 19:31:36'),
(2, 'test', 'test@gmail.com', 'test123', 'admin', '2017-01-15 20:14:24'),
(3, 'akhlaq', 'akh@a.com', '123', 'user', '2017-01-16 09:39:21'),
(4, 'sa', 'saqbi@yahoo.com', '123', 'user', '2017-01-17 06:50:21'),
(5, 'abdullah', 'abdullah@gmail.com', '12345', 'user', '2017-08-05 11:59:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buy`
--
ALTER TABLE `buy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
