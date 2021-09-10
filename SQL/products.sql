-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 10, 2021 at 03:57 AM
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
  `ItemName` varchar(255) NOT NULL,
  `weight` int NOT NULL,
  `Price` float NOT NULL,
  `Discount` float NOT NULL,
  `InStock` int NOT NULL,
  PRIMARY KEY (`ItemID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `all_products`
--

INSERT INTO `all_products` (`ItemID`, `ItemName`, `weight`, `Price`, `Discount`, `InStock`) VALUES
('AA50', 'Aba Ata', 50, 75, 12.5, 20),
('AA100', 'Aba Ata', 100, 135, 12.5, 20),
('AK100', 'Aba Kudu', 100, 150, 12.5, 20),
('AK50', 'Aba Kudu', 50, 80, 12.5, 20),
('SS50', 'Sesami Seed', 50, 50, 16.5, 10),
('MM50', 'Mix Chili Powder', 50, 25.3, 16.2, 18),
('MM100', 'Mix Chili Powder', 100, 86.23, 16.5, 52),
('MM250', 'Mix Chili Powder', 250, 120.3, 26, 12),
('NP100', 'test', 1, 240.5, 28.5, 30),
('AB70', 'Test 2', 2, 500, 28, 10),
('MM500', 'Mix Chili Powder', 500, 750, 22, 6),
('MM1K', 'Mix Chili Powder', 1, 570, 23, 15),
('KA2K', 'test item', 2, 260, 12, 50),
('SS500', 'Seasme seed', 500, 300, 5.3, 42),
('BB1K', 'test 3', 1, 50, 20, 12),
('SSD12', 'Test34', 12, 23, 52, 2),
('NEW1', 'new item', 2, 93, 10, 99),
('MM2K', 'Mix Chili Powder', 2, 513.32, 12.5, 15);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `ItemID` varchar(10) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `uploaded_on` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`ItemID`, `file_name`, `uploaded_on`) VALUES
('AA50', '122325697_205849697571949_1430817279652324113_n.jpg', ''),
('AA50', 'realhack lk.png', '2021-09-10 09:15:31'),
('AA500', 'WhatsApp Image 2021-08-07 at 5.26.38 PM.jpeg', '2021-09-10 09:20:03'),
('MM250', '2.jpg', '2021-09-10 09:21:26');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
