-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2016 at 04:38 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `num` int(50) NOT NULL,
  `name` varchar(70) NOT NULL,
  `catdesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`num`, `name`, `catdesc`) VALUES
(3, 'Science', 'Science is purely science'),
(4, 'Spaces', 'Modify space'),
(5, 'Accounting', 'kira kira weh');

-- --------------------------------------------------------

--
-- Table structure for table `corder`
--

CREATE TABLE `corder` (
  `num` int(50) NOT NULL,
  `transactionid` varchar(50) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(20) NOT NULL,
  `ftotal` int(100) NOT NULL,
  `discount` int(20) NOT NULL,
  `tdisc` int(40) NOT NULL,
  `pos` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `imglink` varchar(40) NOT NULL,
  `tmpayment` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corder`
--

INSERT INTO `corder` (`num`, `transactionid`, `item_id`, `user_id`, `qty`, `total`, `ftotal`, `discount`, `tdisc`, `pos`, `status`, `imglink`, `tmpayment`) VALUES
(69, '76ourcmg2bqjnojmhhpmjifkn7', 5, '2', 1, 10, 10, 0, 0, '', 'Waiting Confirmation', 'mglass.png', '2016-06-07 14:38:28'),
(71, '1aqku4mbhrie7oboujd7nqsvj7', 5, '2', 1, 10, 10, 0, 0, 'You have to pay RM 10 to cover the postage Fees', 'On Hold', '', '0000-00-00 00:00:00'),
(72, '1aqku4mbhrie7oboujd7nqsvj7', 5, '2', 1, 10, 10, 0, 0, 'You have to pay RM 10 to cover the postage Fees', 'On Hold', '', '0000-00-00 00:00:00'),
(73, 'kloc318a9r9cmk2v1919kscgk2', 16, '2', 1, 40, 130, 0, 0, 'Your Postage is Free', 'On Hold', '', '0000-00-00 00:00:00'),
(74, 'kloc318a9r9cmk2v1919kscgk2', 18, '2', 1, 30, 130, 0, 0, 'Your Postage is Free', 'On Hold', '', '0000-00-00 00:00:00'),
(75, 'kloc318a9r9cmk2v1919kscgk2', 19, '2', 1, 60, 130, 0, 0, 'Your Postage is Free', 'On Hold', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `num` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `loginID` int(50) NOT NULL,
  `address` text NOT NULL,
  `notel` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`num`, `name`, `loginID`, `address`, `notel`) VALUES
(2, 'Customer 2', 7, 'tes', 'TE');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `num` int(50) NOT NULL,
  `itemName` varchar(150) NOT NULL,
  `itemPrice` int(51) NOT NULL,
  `itemDesc` text NOT NULL,
  `imglink` varchar(100) NOT NULL,
  `categ` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`num`, `itemName`, `itemPrice`, `itemDesc`, `imglink`, `categ`) VALUES
(15, 'Electrical And Engineering', 10, 'This book is a collection of ultrasonic project for Microcontroller and Microprocessor subject did by third year students in Faculty of Electric and Electronic Engineering, (UTHM). This book chapter is very useful for the reader to understand the ultrasonic operation and how to program the sensor using PIC microcontroller.  It is hope that this book can help the reader to build the application based ultrasonic sensor that can be used for their daily live.', 'b1.png', 'Science'),
(16, 'Electrical And Engineering Chapter 2', 40, 'This books chapter contain the example of projects that was done by the students using ultrasonic sensor.  All the program was clearly discuss in this book, therefore reader will understand how to program deeply.  All the third year students have showing their effort to write this book after they success develop their project based ultrasonic sensor.', 'b2.png', 'Spaces'),
(17, 'Property Facilities In higher Educations', 60, 'This books chapter contain the example of projects that was done by the students using ultrasonic sensor.  All the program was clearly discuss in this book, therefore reader will understand how to program deeply.  All the third year students have showing their effort to write this book after they success develop their project based ultrasonic sensor.', 'b3.png', 'Accounting'),
(18, 'Space and theories', 30, 'This books chapter contain the example of projects that was done by the students using ultrasonic sensor.  All the program was clearly discuss in this book, therefore reader will understand how to program deeply.  All the third year students have showing their effort to write this book after they success develop their project based ultrasonic sensor.', 'b9.png', 'Science'),
(19, 'The Space And Beyond', 60, 'This books chapter contain the example of projects that was done by the students using ultrasonic sensor.  All the program was clearly discuss in this book, therefore reader will understand how to program deeply.  All the third year students have showing their effort to write this book after they success develop their project based ultrasonic sensor.', 'b8.png', 'Spaces'),
(20, 'How to Count in math', 90, 'This books chapter contain the example of projects that was done by the students using ultrasonic sensor.  All the program was clearly discuss in this book, therefore reader will understand how to program deeply.  All the third year students have showing their effort to write this book after they success develop their project based ultrasonic sensor.', 'b7.png', 'Accounting');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `num` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`num`, `nama`, `username`, `password`, `level`) VALUES
(4, 'Adib', 'user', '107cf8204c21284a72931e971457b5e6', 2),
(5, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(7, 'Customer 2', 'cust2', '107cf8204c21284a72931e971457b5e6', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `corder`
--
ALTER TABLE `corder`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `num` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `corder`
--
ALTER TABLE `corder`
  MODIFY `num` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `num` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `num` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `num` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
