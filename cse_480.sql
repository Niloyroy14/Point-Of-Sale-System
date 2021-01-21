-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 17, 2020 at 02:18 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cse_480`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `age` int(30) NOT NULL,
  `gender` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `phone`, `age`, `gender`) VALUES
(1, 'niloyroy', 'niloyroy3@gmail.com', '12345', 1727532825, 24, 'male');

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

DROP TABLE IF EXISTS `operator`;
CREATE TABLE IF NOT EXISTS `operator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id`, `name`, `user_name`, `email`, `password`, `contact_no`, `address`, `status`) VALUES
(1, 'niloy', 'niloyroy', 'ewu.niloy.roy@gmail.com', '12345', 1727532825, 'Dhaka', 'Active'),
(2, 'rubel', 'rubel12', 'ewu.niloy.roy@gmail.com', '12345', 172676990, 'Dhaka', 'Active'),
(3, 'Apurbo', 'apu', 'royniloy14@gmail.com', '12345', 199235454, 'Dhaka', 'DeActive');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `catagory` varchar(255) NOT NULL,
  `warenty` int(11) NOT NULL,
  `price_cost` int(30) NOT NULL,
  `price_retail` int(30) NOT NULL,
  `barcode` int(30) NOT NULL,
  `reorder_level` int(11) NOT NULL,
  `quantity` int(30) NOT NULL,
  `product_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `description`, `catagory`, `warenty`, `price_cost`, `price_retail`, `barcode`, `reorder_level`, `quantity`, `product_date`, `status`) VALUES
(1, 'mi 9 lite', 'it is a m,obile ', 'mobile     ', 1, 20000, 15000, 11111, 3, 15, '2020-08-28', 'Active'),
(4, 'realme 7 pro', 'flagship mobile  ', 'mobile     ', 1, 20000, 24000, 22222, 1, 97, '2020-09-14', 'Active'),
(5, 'realm 6', ' mobile  ', '', 1, 20000, 24000, 33333, 1, 0, '2020-09-12', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_item`
--

DROP TABLE IF EXISTS `purchase_item`;
CREATE TABLE IF NOT EXISTS `purchase_item` (
  `purrchase_id` int(30) NOT NULL AUTO_INCREMENT,
  `product_code` int(30) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `amount` int(100) NOT NULL,
  PRIMARY KEY (`purrchase_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_item`
--

INSERT INTO `purchase_item` (`purrchase_id`, `product_code`, `product_name`, `price`, `quantity`, `amount`) VALUES
(6, 11111, ' mi 9 lite', 15000, 4, 60000),
(7, 11111, ' mi 9 lite', 15000, 30, 450000),
(11, 22222, ' realme 7 pro', 24000, 100, 2400000);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_report`
--

DROP TABLE IF EXISTS `purchase_report`;
CREATE TABLE IF NOT EXISTS `purchase_report` (
  `pur_report_id` int(30) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(30) NOT NULL,
  `total` int(100) NOT NULL,
  `payment` int(100) NOT NULL,
  `date` date NOT NULL,
  `pay_status` varchar(30) NOT NULL,
  PRIMARY KEY (`pur_report_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_report`
--

INSERT INTO `purchase_report` (`pur_report_id`, `product_name`, `quantity`, `total`, `payment`, `date`, `pay_status`) VALUES
(6, 'realme 7 pro', 2, 48000, 40000, '2020-09-29', 'Card'),
(3, ' mi 9 lite', 1, 24000, 20000, '2020-09-14', 'Cash'),
(4, 'realme 7 pro', 2, 48000, 20000, '2020-09-14', 'Cash'),
(5, 'mi 8 pro', 1, 24000, 20000, '2020-09-14', 'Card');

-- --------------------------------------------------------

--
-- Table structure for table `sales_item`
--

DROP TABLE IF EXISTS `sales_item`;
CREATE TABLE IF NOT EXISTS `sales_item` (
  `sales_id` int(30) NOT NULL AUTO_INCREMENT,
  `product_code` int(30) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `amount` int(100) NOT NULL,
  PRIMARY KEY (`sales_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_item`
--

INSERT INTO `sales_item` (`sales_id`, `product_code`, `product_name`, `price`, `quantity`, `amount`) VALUES
(5, 11111, ' mi 9 lite', 15000, 3, 45000);

-- --------------------------------------------------------

--
-- Table structure for table `sales_report`
--

DROP TABLE IF EXISTS `sales_report`;
CREATE TABLE IF NOT EXISTS `sales_report` (
  `sale_report_id` int(30) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `payment` int(100) NOT NULL,
  `date` date NOT NULL,
  `pay_status` varchar(100) NOT NULL,
  PRIMARY KEY (`sale_report_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_report`
--

INSERT INTO `sales_report` (`sale_report_id`, `product_name`, `quantity`, `total`, `payment`, `date`, `pay_status`) VALUES
(1, 'mi 9 lite', 3, 45000, 40000, '2020-09-14', 'Cash');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
