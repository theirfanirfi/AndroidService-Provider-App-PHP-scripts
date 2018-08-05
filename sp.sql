-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2017 at 10:31 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories_tbl`
--

CREATE TABLE `categories_tbl` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories_tbl`
--

INSERT INTO `categories_tbl` (`cat_id`, `cat_name`) VALUES
(1, 'IT'),
(2, 'Teacher'),
(3, 'Labour'),
(4, 'Doctor'),
(5, 'Salesmen');

-- --------------------------------------------------------

--
-- Table structure for table `rating_tbl`
--

CREATE TABLE `rating_tbl` (
  `rating_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ratings` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_tbl`
--

INSERT INTO `rating_tbl` (`rating_id`, `user_id`, `ratings`) VALUES
(1, 0, ''),
(2, 0, ''),
(3, 3, '3.5'),
(4, 1, '3.5'),
(5, 4, '4.0'),
(6, 7, '4.0'),
(7, 3, '5.0'),
(8, 3, '2.5');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fathername` varchar(100) NOT NULL,
  `cat_name` varchar(100) DEFAULT NULL,
  `address` text NOT NULL,
  `contact` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`user_id`, `username`, `fathername`, `cat_name`, `address`, `contact`, `password`, `email`) VALUES
(1, 'xyz', 'abc', 'Teacher', 'Mingora', '09876543211', 'xyz', 'xyz'),
(2, 'ii', '', NULL, '', '', 'ii', 'ii'),
(3, 'Irfan Ullah', 'Ihsan uLLAH', 'Teacher', 'Landikass', '+92345678901', 'theemail@email.com', 'irfan001'),
(4, 'Ejaz Ahmad', 'Abdul Haq', 'Teacher', 'Mingora', '+921234567890', 'ejaz', 'ejaz'),
(5, 'khan ', 'KHAN', NULL, 'Peshawar', '+923451234567', 'khan', 'khan'),
(6, 'khan 2', 'khan 2', NULL, 'Kanju', '+923001234568', 'khan 2', 'khan2'),
(7, 'khan 3', 'khan 3', 'Salesmen', 'Batkhela', '+923321234567', 'khan3', 'khan3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories_tbl`
--
ALTER TABLE `categories_tbl`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `rating_tbl`
--
ALTER TABLE `rating_tbl`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories_tbl`
--
ALTER TABLE `categories_tbl`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `rating_tbl`
--
ALTER TABLE `rating_tbl`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
