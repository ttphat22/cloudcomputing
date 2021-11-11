-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2021 at 05:12 PM
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
-- Database: `asm`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Cat_ID` varchar(10) NOT NULL,
  `Cat_Name` varchar(50) NOT NULL,
  `Cat_Des` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cat_ID`, `Cat_Name`, `Cat_Des`) VALUES
('A1', 'Xe Tăng', 'Xe Tăng là đồ chơi mà mọi người đều yêu thích ....'),
('A2', 'Xe Hơi', 'Xe Tăng là đồ chơi mà mọi người đều yêu thích ...'),
('B1', 'One Pie', 'One Pie là đồ chơi mà mọi người đều yêu thích'),
('B2', 'Naruto', 'Naruto là đồ chơi mà mọi người đều yêu thích'),
('B3', 'Dragon Ball', 'Xe Tăng là đồ chơi mà mọi người đều yêu thích'),
('C1', 'Vòng Tay', 'Vòng Tay là đồ chơi mà mọi người đều yêu thích'),
('C2', 'Nhẫn', 'Nhẫn là đồ chơi mà mọi người đều yêu thích'),
('C3', 'Móc Khóa', 'Móc Khóa là đồ chơi mà mọi người đều yêu thích'),
('D1', 'Áo Ironman', 'Áo Ironman là đồ chơi mà mọi người đều yêu thích'),
('D2', 'Áo Marvel', 'Áo Marvel là đồ chơi mà mọi người đều yêu thích'),
('D3', 'Áo Spiderman', 'Áo Spiderman là đồ chơi mà mọi người đều yêu thích');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tel` varchar(12) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `state` int(1) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`email`, `password`, `tel`, `address`, `state`, `firstname`, `lastname`) VALUES
('kienle@gamil.com', 'e10adc3949ba59abbe56e057f20f883e', '0919282736', 'shbhsjdbhjsdbvdbs mvnsd', 1, 'Kien', 'Le');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Pro_ID` int(11) NOT NULL,
  `Pro_Name` varchar(10) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Price` bigint(20) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Cat_ID` varchar(10) NOT NULL,
  `storeid` varchar(10) NOT NULL,
  `Image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Pro_ID`, `Pro_Name`, `Qty`, `Price`, `Description`, `Cat_ID`, `storeid`, `Image`) VALUES
(1, 'Xe Tăng Đạ', 12, 1000000, 'Model Monkey D Luffy Gear 2 Fire Boxing One Piece Genuine with beautiful size of 20 cm. Products are made of high-quality materials, meticulous lines are sure. Similar stand with beautiful luminous si', 'A1', 'Store001', 'tank5.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `storeid` varchar(10) NOT NULL,
  `storename` varchar(50) NOT NULL,
  `storedes` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`storeid`, `storename`, `storedes`) VALUES
('Store001', 'ATN SAI GON', 'ATN Sai Gon is one of the branches of ATN company'),
('Store002', 'ATN Can Tho', 'ATN Can Tho is one of the branches of ATN company'),
('Store003', 'ATN Ha Noi', 'ATN Ha Noi is one of the branches of ATN company');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Cat_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Pro_ID`),
  ADD KEY `product_PK2` (`storeid`),
  ADD KEY `product_PK1` (`Cat_ID`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`storeid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_PK1` FOREIGN KEY (`Cat_ID`) REFERENCES `category` (`Cat_ID`),
  ADD CONSTRAINT `product_PK2` FOREIGN KEY (`storeid`) REFERENCES `store` (`storeid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
