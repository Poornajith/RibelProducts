-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 18, 2021 at 06:31 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_products`
--

DROP TABLE IF EXISTS `all_products`;
CREATE TABLE IF NOT EXISTS `all_products` (
  `ItemID` varchar(10) NOT NULL,
  `ItemName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `weight` int NOT NULL,
  `Price` float NOT NULL,
  `Discount` float NOT NULL,
  `InStock` int NOT NULL,
  PRIMARY KEY (`ItemID`),
  KEY `ItemName` (`ItemName`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `all_products`
--

INSERT INTO `all_products` (`ItemID`, `ItemName`, `weight`, `Price`, `Discount`, `InStock`) VALUES
('AA50', 'Aba Ata', 50, 75, 12.5, 500),
('AA100', 'Aba Ata', 100, 135, 12.5, 20),
('AK100', 'Aba Kudu', 100, 150, 12.5, 20),
('AK50', 'Aba Kudu', 50, 80, 12.5, 20),
('SS50', 'Sesami Seed', 50, 50, 16.5, 0),
('MM50', 'Mix Chili Powder', 50, 25.3, 16.2, 50),
('MM100', 'Mix Chili Powder', 100, 86.23, 16.5, 52),
('MM250', 'Mix Chili Powder', 250, 120.3, 26, 512),
('NP100', 'test', 1, 240.5, 28.5, 80),
('AB70', 'Test 2', 2, 500, 28, 10),
('MM500', 'Mix Chili Powder', 500, 750, 22, 6),
('MM1K', 'Mix Chili Powder', 1, 570, 23, 15),
('KA2K', 'test item', 2, 260, 12, 50),
('SS500', 'Seasme seed', 500, 300, 5.3, 42),
('BB1K', 'test 3', 1, 50, 20, 12),
('SSD12', 'Test34', 12, 23, 52, 2),
('NEW1', 'new item', 2, 93, 10, 99),
('MM2K', 'Mix Chili Powder', 2, 513.32, 12.5, 15),
('ABC001', 'ABC Seed', 50, 50, 12, 10),
('ABC1K', 'ABC Seed', 1, 500, 15, 20),
('ZZ2K', 'ZZ seeds', 2, 500, 12, 20),
('KLN50', 'KLN seed', 50, 50, 12, 30);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `ItemName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `itemnames`
--

DROP TABLE IF EXISTS `itemnames`;
CREATE TABLE IF NOT EXISTS `itemnames` (
  `NameID` int NOT NULL AUTO_INCREMENT,
  `ItemID` varchar(50) NOT NULL,
  `ItemName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`NameID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `itemnames`
--

INSERT INTO `itemnames` (`NameID`, `ItemID`, `ItemName`) VALUES
(1, '', 'Mix Chili Powder'),
(2, '', 'Chili Powder'),
(3, '', 'Sesame Seed'),
(4, '', 'Mustard Seed'),
(5, '', 'Mustard powder'),
(6, 'KLN seed', 'KLN50');

-- --------------------------------------------------------

--
-- Table structure for table `removeitem`
--

DROP TABLE IF EXISTS `removeitem`;
CREATE TABLE IF NOT EXISTS `removeitem` (
  `ItemID` varchar(10) NOT NULL,
  `Qty` int NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`ItemID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `SaleId` int NOT NULL AUTO_INCREMENT,
  `ItemID` varchar(10) NOT NULL,
  `soldQty` int NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`SaleId`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`SaleId`, `ItemID`, `soldQty`, `time`) VALUES
(7, 'ABC1K', 20, '2021-11-17 00:00:00'),
(17, 'AK100', 20, '2021-11-17 00:00:00'),
(18, 'MM250', 50, '2021-11-17 00:00:00'),
(19, 'NP100', 21, '2021-11-17 00:00:00'),
(20, 'AB70', 12, '2021-11-17 00:00:00'),
(21, 'MM100', 20, '2021-11-17 00:00:00'),
(22, 'MM50', 3, '2021-11-17 00:00:00'),
(23, 'ABC001', 5, '2021-11-17 07:39:50'),
(24, 'ABC001', 5, '2021-11-17 07:40:41'),
(25, 'AA50', 20, '2021-11-18 11:01:26'),
(26, 'SS50', 5, '2021-11-18 11:01:40'),
(27, 'MM1K', 20, '2021-11-18 11:01:52');

-- --------------------------------------------------------

--
-- Table structure for table `stockin`
--

DROP TABLE IF EXISTS `stockin`;
CREATE TABLE IF NOT EXISTS `stockin` (
  `ItemID` varchar(10) NOT NULL,
  `StockIn` int NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`ItemID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stockout`
--

DROP TABLE IF EXISTS `stockout`;
CREATE TABLE IF NOT EXISTS `stockout` (
  `ItemID` varchar(10) NOT NULL,
  `StockOut` int NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`ItemID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
