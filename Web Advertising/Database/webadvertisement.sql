-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2018 at 02:16 AM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webadvertisement`
--
CREATE DATABASE IF NOT EXISTS `webadvertisement` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `webadvertisement`;

-- --------------------------------------------------------

--
-- Table structure for table `ad`
--

DROP TABLE IF EXISTS `ad`;
CREATE TABLE `ad` (
  `AdID` int(11) NOT NULL,
  `AdvertiserID` int(11) NOT NULL,
  `SlotID` int(11) DEFAULT NULL,
  `URL` varchar(100) DEFAULT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `AdURL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad`
--

INSERT INTO `ad` (`AdID`, `AdvertiserID`, `SlotID`, `URL`, `Title`, `Description`, `AdURL`) VALUES
(201, 101, 5, 'http://www.uqunion.au', 'Miaow', 'Give the best care to your cat', 'http://www.thecat.au/products'),
(202, 102, 2, 'http://www.uqunion.au', 'What does the panda say?', 'Get gourmet pizza at home for $8', 'http://www.bigpanda.au/order_pizza'),
(203, 102, 3, 'http://www.uqunion.au', 'What does the panda say?', 'Get crunchy fried chicken at home for $10', 'http://www.bigpanda.au/order_fried_chicken'),
(204, 103, 8, 'http://www.uqunion.au', 'Express Post', 'First Delivery free', 'http://www.expresspost.au'),
(205, 104, 4, 'http://www.uqunion.au', 'Cheapest Haircut', 'In location near you', 'http://www.unisalon.au'),
(206, 105, 1, 'http://www.uqunion.au', 'Not Feeling Well?', 'First Consultation Free', 'http://www.bupa.au'),
(207, 106, 3, 'http://www.uqunion.au', 'Want Cheap textbooks?', 'Huge discounts on second hand books', 'http://www.timetoread.au'),
(208, 107, 3, 'http://www.uqunion.au', 'Worried about accomodation?', 'Browse a wide range of options from the comfort of your home', 'http://www.iglu.au'),
(209, 108, 1, 'http://www.uqunion.au', 'Craving tasty food at the comfort of your home?', 'We deliver all your favourite restaurants', 'http://www.ubereats.au'),
(210, 108, 2, 'http://www.uqunion.au', 'Missing your favourite food?', 'Dont worry! We will get it for you', 'http://www.ubereats.au'),
(211, 109, 4, 'http://www.uqunion.au', 'Want to explore Brisbane?', 'Choose from a range of tours', 'http://www.traveltour.au'),
(212, 110, 7, 'http://www.uqunion.au', 'Express meal delivery', 'Hot meal in 20 minutes', 'http://www.goldenapple.au'),
(213, 110, 5, 'http://www.uqunion.au', 'Hungry? We deliver', 'Lowest delivery charge', 'http://www.goldenapple.au'),
(214, 106, 7, 'http://www.uqunion.au', 'Want to profit from old textbooks?', 'Get back upto 70% of value', 'http://www.timetoread.au'),
(215, 101, 4, 'http://www.uqunion.au', 'Want a pet?', 'Take a rescued cat home today', 'http://www.thecat.au/adopt'),
(216, 108, 3, 'http://www.uqunion.au', 'Craving  Pizza?', 'Do not worry! We will get it for your favourite restuarant', 'http://www.ubereats.au'),
(217, 108, 4, 'http://www.uqunion.au', 'Craving  Burger?', 'Do not worry! We will get it for your favourite restuarant', 'http://www.ubereats.au'),
(218, 108, 5, 'http://www.uqunion.au', 'Craving  Fried Chicken?', 'Do not worry! We will get it for your favourite restuarant', 'http://www.ubereats.au'),
(219, 108, 6, 'http://www.uqunion.au', 'Craving  Ice cream?', 'Do not worry! We will get it for your favourite restuarant', 'http://www.ubereats.au'),
(220, 108, 7, 'http://www.uqunion.au', 'Craving  Burrito?', 'Do not worry! We will get it for your favourite restuarant', 'http://www.ubereats.au');

-- --------------------------------------------------------

--
-- Table structure for table `advertiser`
--

DROP TABLE IF EXISTS `advertiser`;
CREATE TABLE `advertiser` (
  `AdvertiserID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Domain` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertiser`
--

INSERT INTO `advertiser` (`AdvertiserID`, `Name`, `Domain`) VALUES
(101, 'The Cat', 'Pets'),
(102, 'Big Panda', 'Food Delivery'),
(103, 'Express Post', 'Shipping'),
(104, 'Uni Salon', 'Personal Services'),
(105, 'Bupa', 'Healthcare'),
(106, 'Time to read', 'Books & Stationary'),
(107, 'Iglu', 'Accomodation Services'),
(108, 'Uber Eats', 'Food Delivery'),
(109, 'Travel Tour', 'Travel & Tourism'),
(110, 'Golden apple', 'Food Delivery');

-- --------------------------------------------------------

--
-- Stand-in structure for view `advertiser_bid_slot`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `advertiser_bid_slot`;
CREATE TABLE `advertiser_bid_slot` (
`Bid_Slot` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `advertiser_count_clicks`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `advertiser_count_clicks`;
CREATE TABLE `advertiser_count_clicks` (
`Click_Count` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `advertiser_cpc`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `advertiser_cpc`;
CREATE TABLE `advertiser_cpc` (
`CPC` double(19,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `advertiser_performance_slot`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `advertiser_performance_slot`;
CREATE TABLE `advertiser_performance_slot` (
`Performing_Slot` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `advertiser_sum_revenue`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `advertiser_sum_revenue`;
CREATE TABLE `advertiser_sum_revenue` (
`Total_Cost` double(19,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `ad_count_clicks`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `ad_count_clicks`;
CREATE TABLE `ad_count_clicks` (
`Click_Count` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `ad_sum_revenue`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `ad_sum_revenue`;
CREATE TABLE `ad_sum_revenue` (
`Total_Cost` double(19,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `clicks`
--

DROP TABLE IF EXISTS `clicks`;
CREATE TABLE `clicks` (
  `URL` varchar(100) NOT NULL,
  `SessionID` int(11) NOT NULL,
  `ClickID` varchar(50) NOT NULL,
  `AdID` int(11) NOT NULL,
  `AdvertiserID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clicks`
--

INSERT INTO `clicks` (`URL`, `SessionID`, `ClickID`, `AdID`, `AdvertiserID`, `Date`, `Time`) VALUES
('http://www.uqunion.au', 2018026, '20187', 201, 101, '2018-05-07', '09:36:00'),
('http://www.uqunion.au', 2018027, '20188', 202, 102, '2018-05-07', '11:47:00'),
('http://www.uqunion.au', 2018029, '20189', 202, 102, '2018-05-07', '13:41:00'),
('http://www.uqunion.au', 2018030, '20190', 207, 106, '2018-05-07', '13:43:00'),
('http://www.uqunion.au', 2018052, '20191', 203, 102, '2018-05-07', '14:47:00'),
('http://www.uqunion.au', 2018065, '20192', 210, 108, '2018-05-07', '15:16:00'),
('http://www.uqunion.au', 2018073, '20193', 211, 109, '2018-05-07', '15:29:00'),
('http://www.uqunion.au', 2018079, '20194', 203, 102, '2018-05-07', '16:36:00'),
('http://www.uqunion.au', 2018080, '20195', 204, 103, '2018-05-07', '16:54:00'),
('http://www.uqunion.au', 2018087, '20196', 206, 105, '2018-05-07', '17:18:00'),
('http://www.uqunion.au', 2018091, '20197', 212, 110, '2018-05-07', '18:00:00'),
('http://www.uqunion.au', 2018099, '20198', 208, 107, '2018-05-07', '20:57:00'),
('http://www.uqunion.au', 2018101, '20199', 209, 108, '2018-05-07', '21:39:00'),
('http://www.uqunion.au', 2018105, '20200', 202, 102, '2018-05-07', '21:32:00'),
('http://www.uqunion.au', 2018130, '20201', 203, 102, '2018-05-07', '22:51:00'),
('http://www.uqunion.au', 2018135, '20202', 213, 110, '2018-05-08', '08:51:00'),
('http://www.uqunion.au', 2018164, '20203', 207, 106, '2018-05-08', '10:12:00'),
('http://www.uqunion.au', 2018186, '20204', 212, 110, '2018-05-08', '11:57:00'),
('http://www.uqunion.au', 2018200, '20205', 214, 106, '2018-05-08', '14:19:00'),
('http://www.uqunion.au', 2018222, '20206', 208, 107, '2018-05-08', '15:09:00'),
('http://www.uqunion.au', 2018228, '20207', 201, 101, '2018-05-08', '16:19:00'),
('http://www.uqunion.au', 2018244, '20208', 202, 102, '2018-05-08', '17:43:00'),
('http://www.uqunion.au', 2018259, '20209', 210, 108, '2018-05-08', '19:16:00'),
('http://www.uqunion.au', 2018263, '20210', 211, 109, '2018-05-08', '19:25:00'),
('http://www.uqunion.au', 2018314, '20211', 203, 102, '2018-05-08', '20:07:00'),
('http://www.uqunion.au', 2018322, '20212', 213, 110, '2018-05-08', '20:58:00'),
('http://www.uqunion.au', 2018330, '20213', 215, 101, '2018-05-08', '21:10:00'),
('http://www.uqunion.au', 2018332, '20214', 213, 110, '2018-05-08', '22:22:00'),
('http://www.uqunion.au', 2018366, '20215', 202, 102, '2018-05-09', '08:27:00'),
('http://www.uqunion.au', 2018380, '20216', 210, 108, '2018-05-09', '09:15:00'),
('http://www.uqunion.au', 2018388, '20217', 208, 107, '2018-05-09', '10:14:00'),
('http://www.uqunion.au', 2018394, '20218', 212, 110, '2018-05-09', '12:15:00'),
('http://www.uqunion.au', 2018405, '20219', 211, 109, '2018-05-09', '12:50:00'),
('http://www.uqunion.au', 2018411, '20220', 203, 102, '2018-05-09', '13:02:00'),
('http://www.uqunion.au', 2018450, '20221', 205, 104, '2018-05-09', '14:27:00'),
('http://www.uqunion.au', 2018474, '20222', 210, 108, '2018-05-09', '16:17:00'),
('http://www.uqunion.au', 2018485, '20223', 209, 108, '2018-05-09', '16:27:00'),
('http://www.uqunion.au', 2018504, '20224', 208, 107, '2018-05-09', '16:39:00'),
('http://www.uqunion.au', 2018508, '20225', 213, 110, '2018-05-09', '18:21:00'),
('http://www.uqunion.au', 2018527, '20226', 214, 106, '2018-05-09', '18:59:00'),
('http://www.uqunion.au', 2018548, '20227', 202, 102, '2018-05-09', '00:00:00'),
('http://www.uqunion.au', 2018554, '20228', 201, 101, '2018-05-09', '21:52:00'),
('http://www.uqunion.au', 2018556, '20229', 208, 107, '2018-05-10', '08:58:00'),
('http://www.uqunion.au', 2018573, '20230', 210, 108, '2018-05-10', '10:30:00'),
('http://www.uqunion.au', 2018574, '20231', 204, 103, '2018-05-10', '11:54:00'),
('http://www.uqunion.au', 2018578, '20232', 213, 110, '2018-05-10', '12:03:00'),
('http://www.uqunion.au', 2018600, '20233', 207, 106, '2018-05-10', '12:26:00'),
('http://www.uqunion.au', 2018602, '20234', 202, 102, '2018-05-10', '13:44:00'),
('http://www.uqunion.au', 2018626, '20235', 211, 109, '2018-05-10', '15:49:00'),
('http://www.uqunion.au', 2018638, '20236', 210, 108, '2018-05-10', '16:09:00'),
('http://www.uqunion.au', 2018643, '20237', 206, 105, '2018-05-10', '17:10:00'),
('http://www.uqunion.au', 2018648, '20238', 203, 102, '2018-05-10', '17:59:00'),
('http://www.uqunion.au', 2018656, '20239', 212, 110, '2018-05-10', '18:59:00'),
('http://www.uqunion.au', 2018658, '20240', 207, 106, '2018-05-11', '09:11:00'),
('http://www.uqunion.au', 2018675, '20241', 213, 110, '2018-05-11', '09:18:00'),
('http://www.uqunion.au', 2018697, '20242', 215, 101, '2018-05-11', '12:00:00'),
('http://www.uqunion.au', 2018701, '20243', 201, 101, '2018-05-11', '15:11:00'),
('http://www.uqunion.au', 2018708, '20244', 210, 108, '2018-05-11', '15:21:00'),
('http://www.uqunion.au', 2018711, '20245', 208, 107, '2018-05-11', '15:29:00'),
('http://www.uqunion.au', 2018712, '20246', 211, 109, '2018-05-11', '16:28:00'),
('http://www.uqunion.au', 2018731, '20247', 203, 102, '2018-05-11', '17:04:00'),
('http://www.uqunion.au', 2018746, '20248', 209, 108, '2018-05-11', '17:12:00'),
('http://www.uqunion.au', 2018764, '20249', 212, 110, '2018-05-11', '17:34:00'),
('http://www.uqunion.au', 2018799, '20250', 206, 105, '2018-05-11', '20:06:00'),
('http://www.uqunion.au', 2018802, '20251', 204, 103, '2018-05-11', '20:25:00'),
('http://www.uqunion.au', 2018814, '20252', 202, 102, '2018-05-11', '20:59:00'),
('http://www.uqunion.au', 2018820, '20253', 208, 107, '2018-05-12', '10:05:00'),
('http://www.uqunion.au', 2018824, '20254', 210, 108, '2018-05-12', '11:35:00'),
('http://www.uqunion.au', 2018841, '20255', 213, 110, '2018-05-12', '13:16:00'),
('http://www.uqunion.au', 2018878, '20256', 206, 105, '2018-05-12', '15:17:00'),
('http://www.uqunion.au', 2018900, '20257', 203, 102, '2018-05-12', '20:40:00'),
('http://www.uqunion.au', 2018910, '20258', 212, 110, '2018-05-12', '21:00:00'),
('http://www.uqunion.au', 2018924, '20259', 211, 109, '2018-05-12', '22:23:00'),
('http://www.uqunion.au', 2018926, '20260', 203, 102, '2018-05-13', '11:37:00'),
('http://www.uqunion.au', 2018941, '20261', 213, 110, '2018-05-13', '12:50:00'),
('http://www.uqunion.au', 2018947, '20262', 207, 106, '2018-05-13', '14:40:00'),
('http://www.uqunion.au', 2018961, '20263', 210, 108, '2018-05-13', '19:03:00'),
('http://www.uqunion.au', 2019010, '20264', 212, 110, '2018-05-13', '21:12:00'),
('http://www.uqunion.au', 2019021, '20265', 201, 101, '2018-05-13', '22:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

DROP TABLE IF EXISTS `guest`;
CREATE TABLE `guest` (
  `SessionID` int(11) NOT NULL,
  `URL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`SessionID`, `URL`) VALUES
(2018052, 'http://www.uqunion.au'),
(2018087, 'http://www.uqunion.au'),
(2018130, 'http://www.uqunion.au'),
(2018222, 'http://www.uqunion.au'),
(2018314, 'http://www.uqunion.au'),
(2018388, 'http://www.uqunion.au'),
(2018485, 'http://www.uqunion.au'),
(2018548, 'http://www.uqunion.au'),
(2018600, 'http://www.uqunion.au'),
(2018648, 'http://www.uqunion.au'),
(2018712, 'http://www.uqunion.au'),
(2018799, 'http://www.uqunion.au'),
(2018824, 'http://www.uqunion.au'),
(2018924, 'http://www.uqunion.au'),
(2018961, 'http://www.uqunion.au');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `SessionID` int(11) NOT NULL,
  `URL` varchar(100) NOT NULL,
  `Age` int(11) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Gender` char(1) DEFAULT NULL,
  `Address` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`SessionID`, `URL`, `Age`, `Email`, `Gender`, `Address`) VALUES
(2018026, 'http://www.uqunion.au', 22, 'aria.ortiz@uqconnect.edu.au', 'M', '18, Adelaide Street, Brisbane City, QLD, 4000'),
(2018027, 'http://www.uqunion.au', 20, 'marie.shelton@uqconnect.edu.au', 'F', '47, William Street, Brisbane City, QLD, 4000'),
(2018029, 'http://www.uqunion.au', 18, 'haniya.buchanan@uqconnect.edu.au', 'F', '1, Tank Street, Brisbane City, QLD, 4000'),
(2018030, 'http://www.uqunion.au', 26, 'luka.rodgers@uqconnect.edu.au', 'F', '6, Edward Street, Brisbane City, QLD, 4000'),
(2018065, 'http://www.uqunion.au', 18, 'shane.bailey@uqconnect.edu.au', 'M', '6, Creek Street, Brisbane City, QLD, 4000'),
(2018073, 'http://www.uqunion.au', 25, 'samuel.hammond@uqconnect.edu.au', 'M', '30, Quay Street, Brisbane City, QLD, 4000'),
(2018079, 'http://www.uqunion.au', 26, 'janice.bates@uqconnect.edu.au', 'F', '9, Griffin Lane, Brisbane City, QLD, 4000'),
(2018080, 'http://www.uqunion.au', 21, 'barney.fernandez@uqconnect.edu.au', 'M', '15, Hutton Street, Brisbane City, QLD, 4000'),
(2018091, 'http://www.uqunion.au', 17, 'isla.maxwell@uqconnect.edu.au', 'F', '50, Tank Street, Brisbane City, QLD, 4000'),
(2018099, 'http://www.uqunion.au', 25, 'fred.lindsay@uqconnect.edu.au', 'M', '37, Adelaide Street, Brisbane City, QLD, 4000'),
(2018101, 'http://www.uqunion.au', 26, 'ray.edwards@uqconnect.edu.au', 'F', '45, Quay Street, Brisbane City, QLD, 4000'),
(2018105, 'http://www.uqunion.au', 18, 'nicolas.drew@uqconnect.edu.au', 'M', '4, William Street, Brisbane City, QLD, 4000'),
(2018135, 'http://www.uqunion.au', 22, 'august.wagner@uqconnect.edu.au', 'F', '29, Ivory Lane, Brisbane City, QLD, 4000'),
(2018164, 'http://www.uqunion.au', 21, 'tillie.cole@uqconnect.edu.au', 'F', '33, Margaret Street, Brisbane City, QLD, 4000'),
(2018186, 'http://www.uqunion.au', 21, 'robin.rodriguez@uqconnect.edu.au', 'F', '37, Edward Street, Brisbane City, QLD, 4000'),
(2018200, 'http://www.uqunion.au', 20, 'bill.gonzales@uqconnect.edu.au', 'M', '9, Creek Street, Brisbane City, QLD, 4000'),
(2018228, 'http://www.uqunion.au', 19, 'theodore.mccarthy@uqconnect.edu.au', 'M', '19, Margaret Street, Brisbane City, QLD, 4000'),
(2018244, 'http://www.uqunion.au', 22, 'karolina.white@uqconnect.edu.au', 'F', '37, Ivory Lane, Brisbane City, QLD, 4000'),
(2018259, 'http://www.uqunion.au', 24, 'rio.phillips@uqconnect.edu.au', 'F', '11, Griffin Lane, Brisbane City, QLD, 4000'),
(2018263, 'http://www.uqunion.au', 26, 'avery.gomez@uqconnect.edu.au', 'F', '33, Hutton Street, Brisbane City, QLD, 4000'),
(2018322, 'http://www.uqunion.au', 26, 'connah.mccoy@uqconnect.edu.au', 'M', '13, Tank Street, Brisbane City, QLD, 4000'),
(2018330, 'http://www.uqunion.au', 19, 'robin.harvey@uqconnect.edu.au', 'M', '41, Adelaide Street, Brisbane City, QLD, 4000'),
(2018332, 'http://www.uqunion.au', 23, 'adele.weaver@uqconnect.edu.au', 'F', '22, Quay Street, Brisbane City, QLD, 4000'),
(2018366, 'http://www.uqunion.au', 26, 'eddie.glover@uqconnect.edu.au', 'M', '24, Margaret Street, Brisbane City, QLD, 4000'),
(2018380, 'http://www.uqunion.au', 23, 'isaiah.valencia@uqconnect.edu.au', 'M', '1, Adelaide Street, Brisbane City, QLD, 4000'),
(2018394, 'http://www.uqunion.au', 25, 'jada.young@uqconnect.edu.au', 'F', '12, William Street, Brisbane City, QLD, 4000'),
(2018405, 'http://www.uqunion.au', 25, 'umar.mccoy@uqconnect.edu.au', 'M', '33, Margaret Street, Brisbane City, QLD, 4000'),
(2018411, 'http://www.uqunion.au', 22, 'rosie.griffin@uqconnect.edu.au', 'F', '3, Ivory Lane, Brisbane City, QLD, 4000'),
(2018450, 'http://www.uqunion.au', 23, 'kelis.holt@uqconnect.edu.au', 'F', '6, Creek Street, Brisbane City, QLD, 4000'),
(2018474, 'http://www.uqunion.au', 25, 'sheldon.drew@uqconnect.edu.au', 'M', '47, Edward Street, Brisbane City, QLD, 4000'),
(2018504, 'http://www.uqunion.au', 25, 'betty.sweeney@uqconnect.edu.au', 'F', '32, Griffin Lane, Brisbane City, QLD, 4000'),
(2018508, 'http://www.uqunion.au', 22, 'levi.ford@uqconnect.edu.au', 'F', '50, Margaret Street, Brisbane City, QLD, 4000'),
(2018527, 'http://www.uqunion.au', 22, 'jake.garza@uqconnect.edu.au', 'M', '42, Tank Street, Brisbane City, QLD, 4000'),
(2018554, 'http://www.uqunion.au', 23, 'wallace.parsons@uqconnect.edu.au', 'M', '40, Hutton Street, Brisbane City, QLD, 4000'),
(2018556, 'http://www.uqunion.au', 26, 'juliana.williamson@uqconnect.edu.au', 'F', '12, Hutton Street, Brisbane City, QLD, 4000'),
(2018573, 'http://www.uqunion.au', 25, 'bentley.bird@uqconnect.edu.au', 'M', '50, Quay Street, Brisbane City, QLD, 4000'),
(2018574, 'http://www.uqunion.au', 20, 'lucille.rogers@uqconnect.edu.au', 'F', '47, Margaret Street, Brisbane City, QLD, 4000'),
(2018578, 'http://www.uqunion.au', 25, 'fintan.frazier@uqconnect.edu.au', 'M', '33, Edward Street, Brisbane City, QLD, 4000'),
(2018602, 'http://www.uqunion.au', 23, 'sana.todd@uqconnect.edu.au', 'F', '2, Creek Street, Brisbane City, QLD, 4000'),
(2018626, 'http://www.uqunion.au', 22, 'ayman.moreno@uqconnect.edu.au', 'F', '48, William Street, Brisbane City, QLD, 4000'),
(2018638, 'http://www.uqunion.au', 26, 'nyla.moss@uqconnect.edu.au', 'F', '18, Adelaide Street, Brisbane City, QLD, 4000'),
(2018643, 'http://www.uqunion.au', 17, 'harvey.santos@uqconnect.edu.au', 'M', '22, Griffin Lane, Brisbane City, QLD, 4000'),
(2018656, 'http://www.uqunion.au', 18, 'kaleb.howarth@uqconnect.edu.au', 'M', '9, Tank Street, Brisbane City, QLD, 4000'),
(2018658, 'http://www.uqunion.au', 19, 'rebekah.laing@uqconnect.edu.au', 'M', '22, Margaret Street, Brisbane City, QLD, 4000'),
(2018675, 'http://www.uqunion.au', 21, 'suzanne.berry@uqconnect.edu.au', 'F', '3, Ivory Lane, Brisbane City, QLD, 4000'),
(2018697, 'http://www.uqunion.au', 17, 'kit.graham@uqconnect.edu.au', 'M', '24, Hutton Street, Brisbane City, QLD, 4000'),
(2018701, 'http://www.uqunion.au', 26, 'roman.bauer@uqconnect.edu.au', 'M', '4, William Street, Brisbane City, QLD, 4000'),
(2018708, 'http://www.uqunion.au', 17, 'alys.watson@uqconnect.edu.au', 'F', '32, Adelaide Street, Brisbane City, QLD, 4000'),
(2018711, 'http://www.uqunion.au', 24, 'wren.blair@uqconnect.edu.au', 'M', '9, Tank Street, Brisbane City, QLD, 4000'),
(2018731, 'http://www.uqunion.au', 26, 'conner.lovell@uqconnect.edu.au', 'M', '26, Creek Street, Brisbane City, QLD, 4000'),
(2018746, 'http://www.uqunion.au', 21, 'luna.olson@uqconnect.edu.au', 'F', '13, Quay Street, Brisbane City, QLD, 4000'),
(2018764, 'http://www.uqunion.au', 21, 'earl.carrillo@uqconnect.edu.au', 'M', '45, Griffin Lane, Brisbane City, QLD, 4000'),
(2018802, 'http://www.uqunion.au', 22, 'taha.stanley@uqconnect.edu.au', 'F', '35, Edward Street, Brisbane City, QLD, 4000'),
(2018814, 'http://www.uqunion.au', 24, 'edward.mullins@uqconnect.edu.au', 'M', '11, Margaret Street, Brisbane City, QLD, 4000'),
(2018820, 'http://www.uqunion.au', 17, 'maud.scott@uqconnect.edu.au', 'F', '15, Ivory Lane, Brisbane City, QLD, 4000'),
(2018841, 'http://www.uqunion.au', 22, 'ezekiel.meyer@uqconnect.edu.au', 'M', '19, Edward Street, Brisbane City, QLD, 4000'),
(2018878, 'http://www.uqunion.au', 21, 'izabelle.mullins@uqconnect.edu.au', 'F', '2, Creek Street, Brisbane City, QLD, 4000'),
(2018900, 'http://www.uqunion.au', 26, 'nia.reid@uqconnect.edu.au', 'F', '34, Margaret Street, Brisbane City, QLD, 4000'),
(2018910, 'http://www.uqunion.au', 22, 'martyna.king@uqconnect.edu.au', 'F', '27, Griffin Lane, Brisbane City, QLD, 4000'),
(2018926, 'http://www.uqunion.au', 22, 'nevaeh.solis@uqconnect.edu.au', 'M', '10, Quay Street, Brisbane City, QLD, 4000'),
(2018941, 'http://www.uqunion.au', 19, 'tommy.rose@uqconnect.edu.au', 'M', '18, William Street, Brisbane City, QLD, 4000'),
(2018947, 'http://www.uqunion.au', 18, 'jason.bourne@uqconnect.edu.au', 'M', '39, Tank Street, Brisbane City, QLD, 4000'),
(2019010, 'http://www.uqunion.au', 18, 'colton.meyer@uqconnect.edu.au', 'M', '4, Hutton Street, Brisbane City, QLD, 4000'),
(2019021, 'http://www.uqunion.au', 18, 'alex.norris@uqconnect.edu.au', 'M', '8, Adelaide Street, Brisbane City, QLD, 4000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `SessionID` int(11) NOT NULL,
  `URL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`SessionID`, `URL`) VALUES
(2018023, 'http://www.uqunion.au'),
(2018024, 'http://www.uqunion.au'),
(2018025, 'http://www.uqunion.au'),
(2018026, 'http://www.uqunion.au'),
(2018027, 'http://www.uqunion.au'),
(2018028, 'http://www.uqunion.au'),
(2018029, 'http://www.uqunion.au'),
(2018030, 'http://www.uqunion.au'),
(2018031, 'http://www.uqunion.au'),
(2018032, 'http://www.uqunion.au'),
(2018033, 'http://www.uqunion.au'),
(2018034, 'http://www.uqunion.au'),
(2018035, 'http://www.uqunion.au'),
(2018036, 'http://www.uqunion.au'),
(2018037, 'http://www.uqunion.au'),
(2018038, 'http://www.uqunion.au'),
(2018039, 'http://www.uqunion.au'),
(2018040, 'http://www.uqunion.au'),
(2018041, 'http://www.uqunion.au'),
(2018042, 'http://www.uqunion.au'),
(2018043, 'http://www.uqunion.au'),
(2018044, 'http://www.uqunion.au'),
(2018045, 'http://www.uqunion.au'),
(2018046, 'http://www.uqunion.au'),
(2018047, 'http://www.uqunion.au'),
(2018048, 'http://www.uqunion.au'),
(2018049, 'http://www.uqunion.au'),
(2018050, 'http://www.uqunion.au'),
(2018051, 'http://www.uqunion.au'),
(2018052, 'http://www.uqunion.au'),
(2018053, 'http://www.uqunion.au'),
(2018054, 'http://www.uqunion.au'),
(2018055, 'http://www.uqunion.au'),
(2018056, 'http://www.uqunion.au'),
(2018057, 'http://www.uqunion.au'),
(2018058, 'http://www.uqunion.au'),
(2018059, 'http://www.uqunion.au'),
(2018060, 'http://www.uqunion.au'),
(2018061, 'http://www.uqunion.au'),
(2018062, 'http://www.uqunion.au'),
(2018063, 'http://www.uqunion.au'),
(2018064, 'http://www.uqunion.au'),
(2018065, 'http://www.uqunion.au'),
(2018066, 'http://www.uqunion.au'),
(2018067, 'http://www.uqunion.au'),
(2018068, 'http://www.uqunion.au'),
(2018069, 'http://www.uqunion.au'),
(2018070, 'http://www.uqunion.au'),
(2018071, 'http://www.uqunion.au'),
(2018072, 'http://www.uqunion.au'),
(2018073, 'http://www.uqunion.au'),
(2018074, 'http://www.uqunion.au'),
(2018075, 'http://www.uqunion.au'),
(2018076, 'http://www.uqunion.au'),
(2018077, 'http://www.uqunion.au'),
(2018078, 'http://www.uqunion.au'),
(2018079, 'http://www.uqunion.au'),
(2018080, 'http://www.uqunion.au'),
(2018081, 'http://www.uqunion.au'),
(2018082, 'http://www.uqunion.au'),
(2018083, 'http://www.uqunion.au'),
(2018084, 'http://www.uqunion.au'),
(2018085, 'http://www.uqunion.au'),
(2018086, 'http://www.uqunion.au'),
(2018087, 'http://www.uqunion.au'),
(2018088, 'http://www.uqunion.au'),
(2018089, 'http://www.uqunion.au'),
(2018090, 'http://www.uqunion.au'),
(2018091, 'http://www.uqunion.au'),
(2018092, 'http://www.uqunion.au'),
(2018093, 'http://www.uqunion.au'),
(2018094, 'http://www.uqunion.au'),
(2018095, 'http://www.uqunion.au'),
(2018096, 'http://www.uqunion.au'),
(2018097, 'http://www.uqunion.au'),
(2018098, 'http://www.uqunion.au'),
(2018099, 'http://www.uqunion.au'),
(2018100, 'http://www.uqunion.au'),
(2018101, 'http://www.uqunion.au'),
(2018102, 'http://www.uqunion.au'),
(2018103, 'http://www.uqunion.au'),
(2018104, 'http://www.uqunion.au'),
(2018105, 'http://www.uqunion.au'),
(2018106, 'http://www.uqunion.au'),
(2018107, 'http://www.uqunion.au'),
(2018108, 'http://www.uqunion.au'),
(2018109, 'http://www.uqunion.au'),
(2018110, 'http://www.uqunion.au'),
(2018111, 'http://www.uqunion.au'),
(2018112, 'http://www.uqunion.au'),
(2018113, 'http://www.uqunion.au'),
(2018114, 'http://www.uqunion.au'),
(2018115, 'http://www.uqunion.au'),
(2018116, 'http://www.uqunion.au'),
(2018117, 'http://www.uqunion.au'),
(2018118, 'http://www.uqunion.au'),
(2018119, 'http://www.uqunion.au'),
(2018120, 'http://www.uqunion.au'),
(2018121, 'http://www.uqunion.au'),
(2018122, 'http://www.uqunion.au'),
(2018123, 'http://www.uqunion.au'),
(2018124, 'http://www.uqunion.au'),
(2018125, 'http://www.uqunion.au'),
(2018126, 'http://www.uqunion.au'),
(2018127, 'http://www.uqunion.au'),
(2018128, 'http://www.uqunion.au'),
(2018129, 'http://www.uqunion.au'),
(2018130, 'http://www.uqunion.au'),
(2018131, 'http://www.uqunion.au'),
(2018132, 'http://www.uqunion.au'),
(2018133, 'http://www.uqunion.au'),
(2018134, 'http://www.uqunion.au'),
(2018135, 'http://www.uqunion.au'),
(2018136, 'http://www.uqunion.au'),
(2018137, 'http://www.uqunion.au'),
(2018138, 'http://www.uqunion.au'),
(2018139, 'http://www.uqunion.au'),
(2018140, 'http://www.uqunion.au'),
(2018141, 'http://www.uqunion.au'),
(2018142, 'http://www.uqunion.au'),
(2018143, 'http://www.uqunion.au'),
(2018144, 'http://www.uqunion.au'),
(2018145, 'http://www.uqunion.au'),
(2018146, 'http://www.uqunion.au'),
(2018147, 'http://www.uqunion.au'),
(2018148, 'http://www.uqunion.au'),
(2018149, 'http://www.uqunion.au'),
(2018150, 'http://www.uqunion.au'),
(2018151, 'http://www.uqunion.au'),
(2018152, 'http://www.uqunion.au'),
(2018153, 'http://www.uqunion.au'),
(2018154, 'http://www.uqunion.au'),
(2018155, 'http://www.uqunion.au'),
(2018156, 'http://www.uqunion.au'),
(2018157, 'http://www.uqunion.au'),
(2018158, 'http://www.uqunion.au'),
(2018159, 'http://www.uqunion.au'),
(2018160, 'http://www.uqunion.au'),
(2018161, 'http://www.uqunion.au'),
(2018162, 'http://www.uqunion.au'),
(2018163, 'http://www.uqunion.au'),
(2018164, 'http://www.uqunion.au'),
(2018165, 'http://www.uqunion.au'),
(2018166, 'http://www.uqunion.au'),
(2018167, 'http://www.uqunion.au'),
(2018168, 'http://www.uqunion.au'),
(2018169, 'http://www.uqunion.au'),
(2018170, 'http://www.uqunion.au'),
(2018171, 'http://www.uqunion.au'),
(2018172, 'http://www.uqunion.au'),
(2018173, 'http://www.uqunion.au'),
(2018174, 'http://www.uqunion.au'),
(2018175, 'http://www.uqunion.au'),
(2018176, 'http://www.uqunion.au'),
(2018177, 'http://www.uqunion.au'),
(2018178, 'http://www.uqunion.au'),
(2018179, 'http://www.uqunion.au'),
(2018180, 'http://www.uqunion.au'),
(2018181, 'http://www.uqunion.au'),
(2018182, 'http://www.uqunion.au'),
(2018183, 'http://www.uqunion.au'),
(2018184, 'http://www.uqunion.au'),
(2018185, 'http://www.uqunion.au'),
(2018186, 'http://www.uqunion.au'),
(2018187, 'http://www.uqunion.au'),
(2018188, 'http://www.uqunion.au'),
(2018189, 'http://www.uqunion.au'),
(2018190, 'http://www.uqunion.au'),
(2018191, 'http://www.uqunion.au'),
(2018192, 'http://www.uqunion.au'),
(2018193, 'http://www.uqunion.au'),
(2018194, 'http://www.uqunion.au'),
(2018195, 'http://www.uqunion.au'),
(2018196, 'http://www.uqunion.au'),
(2018197, 'http://www.uqunion.au'),
(2018198, 'http://www.uqunion.au'),
(2018199, 'http://www.uqunion.au'),
(2018200, 'http://www.uqunion.au'),
(2018201, 'http://www.uqunion.au'),
(2018202, 'http://www.uqunion.au'),
(2018203, 'http://www.uqunion.au'),
(2018204, 'http://www.uqunion.au'),
(2018205, 'http://www.uqunion.au'),
(2018206, 'http://www.uqunion.au'),
(2018207, 'http://www.uqunion.au'),
(2018208, 'http://www.uqunion.au'),
(2018209, 'http://www.uqunion.au'),
(2018210, 'http://www.uqunion.au'),
(2018211, 'http://www.uqunion.au'),
(2018212, 'http://www.uqunion.au'),
(2018213, 'http://www.uqunion.au'),
(2018214, 'http://www.uqunion.au'),
(2018215, 'http://www.uqunion.au'),
(2018216, 'http://www.uqunion.au'),
(2018217, 'http://www.uqunion.au'),
(2018218, 'http://www.uqunion.au'),
(2018219, 'http://www.uqunion.au'),
(2018220, 'http://www.uqunion.au'),
(2018221, 'http://www.uqunion.au'),
(2018222, 'http://www.uqunion.au'),
(2018223, 'http://www.uqunion.au'),
(2018224, 'http://www.uqunion.au'),
(2018225, 'http://www.uqunion.au'),
(2018226, 'http://www.uqunion.au'),
(2018227, 'http://www.uqunion.au'),
(2018228, 'http://www.uqunion.au'),
(2018229, 'http://www.uqunion.au'),
(2018230, 'http://www.uqunion.au'),
(2018231, 'http://www.uqunion.au'),
(2018232, 'http://www.uqunion.au'),
(2018233, 'http://www.uqunion.au'),
(2018234, 'http://www.uqunion.au'),
(2018235, 'http://www.uqunion.au'),
(2018236, 'http://www.uqunion.au'),
(2018237, 'http://www.uqunion.au'),
(2018238, 'http://www.uqunion.au'),
(2018239, 'http://www.uqunion.au'),
(2018240, 'http://www.uqunion.au'),
(2018241, 'http://www.uqunion.au'),
(2018242, 'http://www.uqunion.au'),
(2018243, 'http://www.uqunion.au'),
(2018244, 'http://www.uqunion.au'),
(2018245, 'http://www.uqunion.au'),
(2018246, 'http://www.uqunion.au'),
(2018247, 'http://www.uqunion.au'),
(2018248, 'http://www.uqunion.au'),
(2018249, 'http://www.uqunion.au'),
(2018250, 'http://www.uqunion.au'),
(2018251, 'http://www.uqunion.au'),
(2018252, 'http://www.uqunion.au'),
(2018253, 'http://www.uqunion.au'),
(2018254, 'http://www.uqunion.au'),
(2018255, 'http://www.uqunion.au'),
(2018256, 'http://www.uqunion.au'),
(2018257, 'http://www.uqunion.au'),
(2018258, 'http://www.uqunion.au'),
(2018259, 'http://www.uqunion.au'),
(2018260, 'http://www.uqunion.au'),
(2018261, 'http://www.uqunion.au'),
(2018262, 'http://www.uqunion.au'),
(2018263, 'http://www.uqunion.au'),
(2018264, 'http://www.uqunion.au'),
(2018265, 'http://www.uqunion.au'),
(2018266, 'http://www.uqunion.au'),
(2018267, 'http://www.uqunion.au'),
(2018268, 'http://www.uqunion.au'),
(2018269, 'http://www.uqunion.au'),
(2018270, 'http://www.uqunion.au'),
(2018271, 'http://www.uqunion.au'),
(2018272, 'http://www.uqunion.au'),
(2018273, 'http://www.uqunion.au'),
(2018274, 'http://www.uqunion.au'),
(2018275, 'http://www.uqunion.au'),
(2018276, 'http://www.uqunion.au'),
(2018277, 'http://www.uqunion.au'),
(2018278, 'http://www.uqunion.au'),
(2018279, 'http://www.uqunion.au'),
(2018280, 'http://www.uqunion.au'),
(2018281, 'http://www.uqunion.au'),
(2018282, 'http://www.uqunion.au'),
(2018283, 'http://www.uqunion.au'),
(2018284, 'http://www.uqunion.au'),
(2018285, 'http://www.uqunion.au'),
(2018286, 'http://www.uqunion.au'),
(2018287, 'http://www.uqunion.au'),
(2018288, 'http://www.uqunion.au'),
(2018289, 'http://www.uqunion.au'),
(2018290, 'http://www.uqunion.au'),
(2018291, 'http://www.uqunion.au'),
(2018292, 'http://www.uqunion.au'),
(2018293, 'http://www.uqunion.au'),
(2018294, 'http://www.uqunion.au'),
(2018295, 'http://www.uqunion.au'),
(2018296, 'http://www.uqunion.au'),
(2018297, 'http://www.uqunion.au'),
(2018298, 'http://www.uqunion.au'),
(2018299, 'http://www.uqunion.au'),
(2018300, 'http://www.uqunion.au'),
(2018301, 'http://www.uqunion.au'),
(2018302, 'http://www.uqunion.au'),
(2018303, 'http://www.uqunion.au'),
(2018304, 'http://www.uqunion.au'),
(2018305, 'http://www.uqunion.au'),
(2018306, 'http://www.uqunion.au'),
(2018307, 'http://www.uqunion.au'),
(2018308, 'http://www.uqunion.au'),
(2018309, 'http://www.uqunion.au'),
(2018310, 'http://www.uqunion.au'),
(2018311, 'http://www.uqunion.au'),
(2018312, 'http://www.uqunion.au'),
(2018313, 'http://www.uqunion.au'),
(2018314, 'http://www.uqunion.au'),
(2018315, 'http://www.uqunion.au'),
(2018316, 'http://www.uqunion.au'),
(2018317, 'http://www.uqunion.au'),
(2018318, 'http://www.uqunion.au'),
(2018319, 'http://www.uqunion.au'),
(2018320, 'http://www.uqunion.au'),
(2018321, 'http://www.uqunion.au'),
(2018322, 'http://www.uqunion.au'),
(2018323, 'http://www.uqunion.au'),
(2018324, 'http://www.uqunion.au'),
(2018325, 'http://www.uqunion.au'),
(2018326, 'http://www.uqunion.au'),
(2018327, 'http://www.uqunion.au'),
(2018328, 'http://www.uqunion.au'),
(2018329, 'http://www.uqunion.au'),
(2018330, 'http://www.uqunion.au'),
(2018331, 'http://www.uqunion.au'),
(2018332, 'http://www.uqunion.au'),
(2018333, 'http://www.uqunion.au'),
(2018334, 'http://www.uqunion.au'),
(2018335, 'http://www.uqunion.au'),
(2018336, 'http://www.uqunion.au'),
(2018337, 'http://www.uqunion.au'),
(2018338, 'http://www.uqunion.au'),
(2018339, 'http://www.uqunion.au'),
(2018340, 'http://www.uqunion.au'),
(2018341, 'http://www.uqunion.au'),
(2018342, 'http://www.uqunion.au'),
(2018343, 'http://www.uqunion.au'),
(2018344, 'http://www.uqunion.au'),
(2018345, 'http://www.uqunion.au'),
(2018346, 'http://www.uqunion.au'),
(2018347, 'http://www.uqunion.au'),
(2018348, 'http://www.uqunion.au'),
(2018349, 'http://www.uqunion.au'),
(2018350, 'http://www.uqunion.au'),
(2018351, 'http://www.uqunion.au'),
(2018352, 'http://www.uqunion.au'),
(2018353, 'http://www.uqunion.au'),
(2018354, 'http://www.uqunion.au'),
(2018355, 'http://www.uqunion.au'),
(2018356, 'http://www.uqunion.au'),
(2018357, 'http://www.uqunion.au'),
(2018358, 'http://www.uqunion.au'),
(2018359, 'http://www.uqunion.au'),
(2018360, 'http://www.uqunion.au'),
(2018361, 'http://www.uqunion.au'),
(2018362, 'http://www.uqunion.au'),
(2018363, 'http://www.uqunion.au'),
(2018364, 'http://www.uqunion.au'),
(2018365, 'http://www.uqunion.au'),
(2018366, 'http://www.uqunion.au'),
(2018367, 'http://www.uqunion.au'),
(2018368, 'http://www.uqunion.au'),
(2018369, 'http://www.uqunion.au'),
(2018370, 'http://www.uqunion.au'),
(2018371, 'http://www.uqunion.au'),
(2018372, 'http://www.uqunion.au'),
(2018373, 'http://www.uqunion.au'),
(2018374, 'http://www.uqunion.au'),
(2018375, 'http://www.uqunion.au'),
(2018376, 'http://www.uqunion.au'),
(2018377, 'http://www.uqunion.au'),
(2018378, 'http://www.uqunion.au'),
(2018379, 'http://www.uqunion.au'),
(2018380, 'http://www.uqunion.au'),
(2018381, 'http://www.uqunion.au'),
(2018382, 'http://www.uqunion.au'),
(2018383, 'http://www.uqunion.au'),
(2018384, 'http://www.uqunion.au'),
(2018385, 'http://www.uqunion.au'),
(2018386, 'http://www.uqunion.au'),
(2018387, 'http://www.uqunion.au'),
(2018388, 'http://www.uqunion.au'),
(2018389, 'http://www.uqunion.au'),
(2018390, 'http://www.uqunion.au'),
(2018391, 'http://www.uqunion.au'),
(2018392, 'http://www.uqunion.au'),
(2018393, 'http://www.uqunion.au'),
(2018394, 'http://www.uqunion.au'),
(2018395, 'http://www.uqunion.au'),
(2018396, 'http://www.uqunion.au'),
(2018397, 'http://www.uqunion.au'),
(2018398, 'http://www.uqunion.au'),
(2018399, 'http://www.uqunion.au'),
(2018400, 'http://www.uqunion.au'),
(2018401, 'http://www.uqunion.au'),
(2018402, 'http://www.uqunion.au'),
(2018403, 'http://www.uqunion.au'),
(2018404, 'http://www.uqunion.au'),
(2018405, 'http://www.uqunion.au'),
(2018406, 'http://www.uqunion.au'),
(2018407, 'http://www.uqunion.au'),
(2018408, 'http://www.uqunion.au'),
(2018409, 'http://www.uqunion.au'),
(2018410, 'http://www.uqunion.au'),
(2018411, 'http://www.uqunion.au'),
(2018412, 'http://www.uqunion.au'),
(2018413, 'http://www.uqunion.au'),
(2018414, 'http://www.uqunion.au'),
(2018415, 'http://www.uqunion.au'),
(2018416, 'http://www.uqunion.au'),
(2018417, 'http://www.uqunion.au'),
(2018418, 'http://www.uqunion.au'),
(2018419, 'http://www.uqunion.au'),
(2018420, 'http://www.uqunion.au'),
(2018421, 'http://www.uqunion.au'),
(2018422, 'http://www.uqunion.au'),
(2018423, 'http://www.uqunion.au'),
(2018424, 'http://www.uqunion.au'),
(2018425, 'http://www.uqunion.au'),
(2018426, 'http://www.uqunion.au'),
(2018427, 'http://www.uqunion.au'),
(2018428, 'http://www.uqunion.au'),
(2018429, 'http://www.uqunion.au'),
(2018430, 'http://www.uqunion.au'),
(2018431, 'http://www.uqunion.au'),
(2018432, 'http://www.uqunion.au'),
(2018433, 'http://www.uqunion.au'),
(2018434, 'http://www.uqunion.au'),
(2018435, 'http://www.uqunion.au'),
(2018436, 'http://www.uqunion.au'),
(2018437, 'http://www.uqunion.au'),
(2018438, 'http://www.uqunion.au'),
(2018439, 'http://www.uqunion.au'),
(2018440, 'http://www.uqunion.au'),
(2018441, 'http://www.uqunion.au'),
(2018442, 'http://www.uqunion.au'),
(2018443, 'http://www.uqunion.au'),
(2018444, 'http://www.uqunion.au'),
(2018445, 'http://www.uqunion.au'),
(2018446, 'http://www.uqunion.au'),
(2018447, 'http://www.uqunion.au'),
(2018448, 'http://www.uqunion.au'),
(2018449, 'http://www.uqunion.au'),
(2018450, 'http://www.uqunion.au'),
(2018451, 'http://www.uqunion.au'),
(2018452, 'http://www.uqunion.au'),
(2018453, 'http://www.uqunion.au'),
(2018454, 'http://www.uqunion.au'),
(2018455, 'http://www.uqunion.au'),
(2018456, 'http://www.uqunion.au'),
(2018457, 'http://www.uqunion.au'),
(2018458, 'http://www.uqunion.au'),
(2018459, 'http://www.uqunion.au'),
(2018460, 'http://www.uqunion.au'),
(2018461, 'http://www.uqunion.au'),
(2018462, 'http://www.uqunion.au'),
(2018463, 'http://www.uqunion.au'),
(2018464, 'http://www.uqunion.au'),
(2018465, 'http://www.uqunion.au'),
(2018466, 'http://www.uqunion.au'),
(2018467, 'http://www.uqunion.au'),
(2018468, 'http://www.uqunion.au'),
(2018469, 'http://www.uqunion.au'),
(2018470, 'http://www.uqunion.au'),
(2018471, 'http://www.uqunion.au'),
(2018472, 'http://www.uqunion.au'),
(2018473, 'http://www.uqunion.au'),
(2018474, 'http://www.uqunion.au'),
(2018475, 'http://www.uqunion.au'),
(2018476, 'http://www.uqunion.au'),
(2018477, 'http://www.uqunion.au'),
(2018478, 'http://www.uqunion.au'),
(2018479, 'http://www.uqunion.au'),
(2018480, 'http://www.uqunion.au'),
(2018481, 'http://www.uqunion.au'),
(2018482, 'http://www.uqunion.au'),
(2018483, 'http://www.uqunion.au'),
(2018484, 'http://www.uqunion.au'),
(2018485, 'http://www.uqunion.au'),
(2018486, 'http://www.uqunion.au'),
(2018487, 'http://www.uqunion.au'),
(2018488, 'http://www.uqunion.au'),
(2018489, 'http://www.uqunion.au'),
(2018490, 'http://www.uqunion.au'),
(2018491, 'http://www.uqunion.au'),
(2018492, 'http://www.uqunion.au'),
(2018493, 'http://www.uqunion.au'),
(2018494, 'http://www.uqunion.au'),
(2018495, 'http://www.uqunion.au'),
(2018496, 'http://www.uqunion.au'),
(2018497, 'http://www.uqunion.au'),
(2018498, 'http://www.uqunion.au'),
(2018499, 'http://www.uqunion.au'),
(2018500, 'http://www.uqunion.au'),
(2018501, 'http://www.uqunion.au'),
(2018502, 'http://www.uqunion.au'),
(2018503, 'http://www.uqunion.au'),
(2018504, 'http://www.uqunion.au'),
(2018505, 'http://www.uqunion.au'),
(2018506, 'http://www.uqunion.au'),
(2018507, 'http://www.uqunion.au'),
(2018508, 'http://www.uqunion.au'),
(2018509, 'http://www.uqunion.au'),
(2018510, 'http://www.uqunion.au'),
(2018511, 'http://www.uqunion.au'),
(2018512, 'http://www.uqunion.au'),
(2018513, 'http://www.uqunion.au'),
(2018514, 'http://www.uqunion.au'),
(2018515, 'http://www.uqunion.au'),
(2018516, 'http://www.uqunion.au'),
(2018517, 'http://www.uqunion.au'),
(2018518, 'http://www.uqunion.au'),
(2018519, 'http://www.uqunion.au'),
(2018520, 'http://www.uqunion.au'),
(2018521, 'http://www.uqunion.au'),
(2018522, 'http://www.uqunion.au'),
(2018523, 'http://www.uqunion.au'),
(2018524, 'http://www.uqunion.au'),
(2018525, 'http://www.uqunion.au'),
(2018526, 'http://www.uqunion.au'),
(2018527, 'http://www.uqunion.au'),
(2018528, 'http://www.uqunion.au'),
(2018529, 'http://www.uqunion.au'),
(2018530, 'http://www.uqunion.au'),
(2018531, 'http://www.uqunion.au'),
(2018532, 'http://www.uqunion.au'),
(2018533, 'http://www.uqunion.au'),
(2018534, 'http://www.uqunion.au'),
(2018535, 'http://www.uqunion.au'),
(2018536, 'http://www.uqunion.au'),
(2018537, 'http://www.uqunion.au'),
(2018538, 'http://www.uqunion.au'),
(2018539, 'http://www.uqunion.au'),
(2018540, 'http://www.uqunion.au'),
(2018541, 'http://www.uqunion.au'),
(2018542, 'http://www.uqunion.au'),
(2018543, 'http://www.uqunion.au'),
(2018544, 'http://www.uqunion.au'),
(2018545, 'http://www.uqunion.au'),
(2018546, 'http://www.uqunion.au'),
(2018547, 'http://www.uqunion.au'),
(2018548, 'http://www.uqunion.au'),
(2018549, 'http://www.uqunion.au'),
(2018550, 'http://www.uqunion.au'),
(2018551, 'http://www.uqunion.au'),
(2018552, 'http://www.uqunion.au'),
(2018553, 'http://www.uqunion.au'),
(2018554, 'http://www.uqunion.au'),
(2018555, 'http://www.uqunion.au'),
(2018556, 'http://www.uqunion.au'),
(2018557, 'http://www.uqunion.au'),
(2018558, 'http://www.uqunion.au'),
(2018559, 'http://www.uqunion.au'),
(2018560, 'http://www.uqunion.au'),
(2018561, 'http://www.uqunion.au'),
(2018562, 'http://www.uqunion.au'),
(2018563, 'http://www.uqunion.au'),
(2018564, 'http://www.uqunion.au'),
(2018565, 'http://www.uqunion.au'),
(2018566, 'http://www.uqunion.au'),
(2018567, 'http://www.uqunion.au'),
(2018568, 'http://www.uqunion.au'),
(2018569, 'http://www.uqunion.au'),
(2018570, 'http://www.uqunion.au'),
(2018571, 'http://www.uqunion.au'),
(2018572, 'http://www.uqunion.au'),
(2018573, 'http://www.uqunion.au'),
(2018574, 'http://www.uqunion.au'),
(2018575, 'http://www.uqunion.au'),
(2018576, 'http://www.uqunion.au'),
(2018577, 'http://www.uqunion.au'),
(2018578, 'http://www.uqunion.au'),
(2018579, 'http://www.uqunion.au'),
(2018580, 'http://www.uqunion.au'),
(2018581, 'http://www.uqunion.au'),
(2018582, 'http://www.uqunion.au'),
(2018583, 'http://www.uqunion.au'),
(2018584, 'http://www.uqunion.au'),
(2018585, 'http://www.uqunion.au'),
(2018586, 'http://www.uqunion.au'),
(2018587, 'http://www.uqunion.au'),
(2018588, 'http://www.uqunion.au'),
(2018589, 'http://www.uqunion.au'),
(2018590, 'http://www.uqunion.au'),
(2018591, 'http://www.uqunion.au'),
(2018592, 'http://www.uqunion.au'),
(2018593, 'http://www.uqunion.au'),
(2018594, 'http://www.uqunion.au'),
(2018595, 'http://www.uqunion.au'),
(2018596, 'http://www.uqunion.au'),
(2018597, 'http://www.uqunion.au'),
(2018598, 'http://www.uqunion.au'),
(2018599, 'http://www.uqunion.au'),
(2018600, 'http://www.uqunion.au'),
(2018601, 'http://www.uqunion.au'),
(2018602, 'http://www.uqunion.au'),
(2018603, 'http://www.uqunion.au'),
(2018604, 'http://www.uqunion.au'),
(2018605, 'http://www.uqunion.au'),
(2018606, 'http://www.uqunion.au'),
(2018607, 'http://www.uqunion.au'),
(2018608, 'http://www.uqunion.au'),
(2018609, 'http://www.uqunion.au'),
(2018610, 'http://www.uqunion.au'),
(2018611, 'http://www.uqunion.au'),
(2018612, 'http://www.uqunion.au'),
(2018613, 'http://www.uqunion.au'),
(2018614, 'http://www.uqunion.au'),
(2018615, 'http://www.uqunion.au'),
(2018616, 'http://www.uqunion.au'),
(2018617, 'http://www.uqunion.au'),
(2018618, 'http://www.uqunion.au'),
(2018619, 'http://www.uqunion.au'),
(2018620, 'http://www.uqunion.au'),
(2018621, 'http://www.uqunion.au'),
(2018622, 'http://www.uqunion.au'),
(2018623, 'http://www.uqunion.au'),
(2018624, 'http://www.uqunion.au'),
(2018625, 'http://www.uqunion.au'),
(2018626, 'http://www.uqunion.au'),
(2018627, 'http://www.uqunion.au'),
(2018628, 'http://www.uqunion.au'),
(2018629, 'http://www.uqunion.au'),
(2018630, 'http://www.uqunion.au'),
(2018631, 'http://www.uqunion.au'),
(2018632, 'http://www.uqunion.au'),
(2018633, 'http://www.uqunion.au'),
(2018634, 'http://www.uqunion.au'),
(2018635, 'http://www.uqunion.au'),
(2018636, 'http://www.uqunion.au'),
(2018637, 'http://www.uqunion.au'),
(2018638, 'http://www.uqunion.au'),
(2018639, 'http://www.uqunion.au'),
(2018640, 'http://www.uqunion.au'),
(2018641, 'http://www.uqunion.au'),
(2018642, 'http://www.uqunion.au'),
(2018643, 'http://www.uqunion.au'),
(2018644, 'http://www.uqunion.au'),
(2018645, 'http://www.uqunion.au'),
(2018646, 'http://www.uqunion.au'),
(2018647, 'http://www.uqunion.au'),
(2018648, 'http://www.uqunion.au'),
(2018649, 'http://www.uqunion.au'),
(2018650, 'http://www.uqunion.au'),
(2018651, 'http://www.uqunion.au'),
(2018652, 'http://www.uqunion.au'),
(2018653, 'http://www.uqunion.au'),
(2018654, 'http://www.uqunion.au'),
(2018655, 'http://www.uqunion.au'),
(2018656, 'http://www.uqunion.au'),
(2018657, 'http://www.uqunion.au'),
(2018658, 'http://www.uqunion.au'),
(2018659, 'http://www.uqunion.au'),
(2018660, 'http://www.uqunion.au'),
(2018661, 'http://www.uqunion.au'),
(2018662, 'http://www.uqunion.au'),
(2018663, 'http://www.uqunion.au'),
(2018664, 'http://www.uqunion.au'),
(2018665, 'http://www.uqunion.au'),
(2018666, 'http://www.uqunion.au'),
(2018667, 'http://www.uqunion.au'),
(2018668, 'http://www.uqunion.au'),
(2018669, 'http://www.uqunion.au'),
(2018670, 'http://www.uqunion.au'),
(2018671, 'http://www.uqunion.au'),
(2018672, 'http://www.uqunion.au'),
(2018673, 'http://www.uqunion.au'),
(2018674, 'http://www.uqunion.au'),
(2018675, 'http://www.uqunion.au'),
(2018676, 'http://www.uqunion.au'),
(2018677, 'http://www.uqunion.au'),
(2018678, 'http://www.uqunion.au'),
(2018679, 'http://www.uqunion.au'),
(2018680, 'http://www.uqunion.au'),
(2018681, 'http://www.uqunion.au'),
(2018682, 'http://www.uqunion.au'),
(2018683, 'http://www.uqunion.au'),
(2018684, 'http://www.uqunion.au'),
(2018685, 'http://www.uqunion.au'),
(2018686, 'http://www.uqunion.au'),
(2018687, 'http://www.uqunion.au'),
(2018688, 'http://www.uqunion.au'),
(2018689, 'http://www.uqunion.au'),
(2018690, 'http://www.uqunion.au'),
(2018691, 'http://www.uqunion.au'),
(2018692, 'http://www.uqunion.au'),
(2018693, 'http://www.uqunion.au'),
(2018694, 'http://www.uqunion.au'),
(2018695, 'http://www.uqunion.au'),
(2018696, 'http://www.uqunion.au'),
(2018697, 'http://www.uqunion.au'),
(2018698, 'http://www.uqunion.au'),
(2018699, 'http://www.uqunion.au'),
(2018700, 'http://www.uqunion.au'),
(2018701, 'http://www.uqunion.au'),
(2018702, 'http://www.uqunion.au'),
(2018703, 'http://www.uqunion.au'),
(2018704, 'http://www.uqunion.au'),
(2018705, 'http://www.uqunion.au'),
(2018706, 'http://www.uqunion.au'),
(2018707, 'http://www.uqunion.au'),
(2018708, 'http://www.uqunion.au'),
(2018709, 'http://www.uqunion.au'),
(2018710, 'http://www.uqunion.au'),
(2018711, 'http://www.uqunion.au'),
(2018712, 'http://www.uqunion.au'),
(2018713, 'http://www.uqunion.au'),
(2018714, 'http://www.uqunion.au'),
(2018715, 'http://www.uqunion.au'),
(2018716, 'http://www.uqunion.au'),
(2018717, 'http://www.uqunion.au'),
(2018718, 'http://www.uqunion.au'),
(2018719, 'http://www.uqunion.au'),
(2018720, 'http://www.uqunion.au'),
(2018721, 'http://www.uqunion.au'),
(2018722, 'http://www.uqunion.au'),
(2018723, 'http://www.uqunion.au'),
(2018724, 'http://www.uqunion.au'),
(2018725, 'http://www.uqunion.au'),
(2018726, 'http://www.uqunion.au'),
(2018727, 'http://www.uqunion.au'),
(2018728, 'http://www.uqunion.au'),
(2018729, 'http://www.uqunion.au'),
(2018730, 'http://www.uqunion.au'),
(2018731, 'http://www.uqunion.au'),
(2018732, 'http://www.uqunion.au'),
(2018733, 'http://www.uqunion.au'),
(2018734, 'http://www.uqunion.au'),
(2018735, 'http://www.uqunion.au'),
(2018736, 'http://www.uqunion.au'),
(2018737, 'http://www.uqunion.au'),
(2018738, 'http://www.uqunion.au'),
(2018739, 'http://www.uqunion.au'),
(2018740, 'http://www.uqunion.au'),
(2018741, 'http://www.uqunion.au'),
(2018742, 'http://www.uqunion.au'),
(2018743, 'http://www.uqunion.au'),
(2018744, 'http://www.uqunion.au'),
(2018745, 'http://www.uqunion.au'),
(2018746, 'http://www.uqunion.au'),
(2018747, 'http://www.uqunion.au'),
(2018748, 'http://www.uqunion.au'),
(2018749, 'http://www.uqunion.au'),
(2018750, 'http://www.uqunion.au'),
(2018751, 'http://www.uqunion.au'),
(2018752, 'http://www.uqunion.au'),
(2018753, 'http://www.uqunion.au'),
(2018754, 'http://www.uqunion.au'),
(2018755, 'http://www.uqunion.au'),
(2018756, 'http://www.uqunion.au'),
(2018757, 'http://www.uqunion.au'),
(2018758, 'http://www.uqunion.au'),
(2018759, 'http://www.uqunion.au'),
(2018760, 'http://www.uqunion.au'),
(2018761, 'http://www.uqunion.au'),
(2018762, 'http://www.uqunion.au'),
(2018763, 'http://www.uqunion.au'),
(2018764, 'http://www.uqunion.au'),
(2018765, 'http://www.uqunion.au'),
(2018766, 'http://www.uqunion.au'),
(2018767, 'http://www.uqunion.au'),
(2018768, 'http://www.uqunion.au'),
(2018769, 'http://www.uqunion.au'),
(2018770, 'http://www.uqunion.au'),
(2018771, 'http://www.uqunion.au'),
(2018772, 'http://www.uqunion.au'),
(2018773, 'http://www.uqunion.au'),
(2018774, 'http://www.uqunion.au'),
(2018775, 'http://www.uqunion.au'),
(2018776, 'http://www.uqunion.au'),
(2018777, 'http://www.uqunion.au'),
(2018778, 'http://www.uqunion.au'),
(2018779, 'http://www.uqunion.au'),
(2018780, 'http://www.uqunion.au'),
(2018781, 'http://www.uqunion.au'),
(2018782, 'http://www.uqunion.au'),
(2018783, 'http://www.uqunion.au'),
(2018784, 'http://www.uqunion.au'),
(2018785, 'http://www.uqunion.au'),
(2018786, 'http://www.uqunion.au'),
(2018787, 'http://www.uqunion.au'),
(2018788, 'http://www.uqunion.au'),
(2018789, 'http://www.uqunion.au'),
(2018790, 'http://www.uqunion.au'),
(2018791, 'http://www.uqunion.au'),
(2018792, 'http://www.uqunion.au'),
(2018793, 'http://www.uqunion.au'),
(2018794, 'http://www.uqunion.au'),
(2018795, 'http://www.uqunion.au'),
(2018796, 'http://www.uqunion.au'),
(2018797, 'http://www.uqunion.au'),
(2018798, 'http://www.uqunion.au'),
(2018799, 'http://www.uqunion.au'),
(2018800, 'http://www.uqunion.au'),
(2018801, 'http://www.uqunion.au'),
(2018802, 'http://www.uqunion.au'),
(2018803, 'http://www.uqunion.au'),
(2018804, 'http://www.uqunion.au'),
(2018805, 'http://www.uqunion.au'),
(2018806, 'http://www.uqunion.au'),
(2018807, 'http://www.uqunion.au'),
(2018808, 'http://www.uqunion.au'),
(2018809, 'http://www.uqunion.au'),
(2018810, 'http://www.uqunion.au'),
(2018811, 'http://www.uqunion.au'),
(2018812, 'http://www.uqunion.au'),
(2018813, 'http://www.uqunion.au'),
(2018814, 'http://www.uqunion.au'),
(2018815, 'http://www.uqunion.au'),
(2018816, 'http://www.uqunion.au'),
(2018817, 'http://www.uqunion.au'),
(2018818, 'http://www.uqunion.au'),
(2018819, 'http://www.uqunion.au'),
(2018820, 'http://www.uqunion.au'),
(2018821, 'http://www.uqunion.au'),
(2018822, 'http://www.uqunion.au'),
(2018823, 'http://www.uqunion.au'),
(2018824, 'http://www.uqunion.au'),
(2018825, 'http://www.uqunion.au'),
(2018826, 'http://www.uqunion.au'),
(2018827, 'http://www.uqunion.au'),
(2018828, 'http://www.uqunion.au'),
(2018829, 'http://www.uqunion.au'),
(2018830, 'http://www.uqunion.au'),
(2018831, 'http://www.uqunion.au'),
(2018832, 'http://www.uqunion.au'),
(2018833, 'http://www.uqunion.au'),
(2018834, 'http://www.uqunion.au'),
(2018835, 'http://www.uqunion.au'),
(2018836, 'http://www.uqunion.au'),
(2018837, 'http://www.uqunion.au'),
(2018838, 'http://www.uqunion.au'),
(2018839, 'http://www.uqunion.au'),
(2018840, 'http://www.uqunion.au'),
(2018841, 'http://www.uqunion.au'),
(2018842, 'http://www.uqunion.au'),
(2018843, 'http://www.uqunion.au'),
(2018844, 'http://www.uqunion.au'),
(2018845, 'http://www.uqunion.au'),
(2018846, 'http://www.uqunion.au'),
(2018847, 'http://www.uqunion.au'),
(2018848, 'http://www.uqunion.au'),
(2018849, 'http://www.uqunion.au'),
(2018850, 'http://www.uqunion.au'),
(2018851, 'http://www.uqunion.au'),
(2018852, 'http://www.uqunion.au'),
(2018853, 'http://www.uqunion.au'),
(2018854, 'http://www.uqunion.au'),
(2018855, 'http://www.uqunion.au'),
(2018856, 'http://www.uqunion.au'),
(2018857, 'http://www.uqunion.au'),
(2018858, 'http://www.uqunion.au'),
(2018859, 'http://www.uqunion.au'),
(2018860, 'http://www.uqunion.au'),
(2018861, 'http://www.uqunion.au'),
(2018862, 'http://www.uqunion.au'),
(2018863, 'http://www.uqunion.au'),
(2018864, 'http://www.uqunion.au'),
(2018865, 'http://www.uqunion.au'),
(2018866, 'http://www.uqunion.au'),
(2018867, 'http://www.uqunion.au'),
(2018868, 'http://www.uqunion.au'),
(2018869, 'http://www.uqunion.au'),
(2018870, 'http://www.uqunion.au'),
(2018871, 'http://www.uqunion.au'),
(2018872, 'http://www.uqunion.au'),
(2018873, 'http://www.uqunion.au'),
(2018874, 'http://www.uqunion.au'),
(2018875, 'http://www.uqunion.au'),
(2018876, 'http://www.uqunion.au'),
(2018877, 'http://www.uqunion.au'),
(2018878, 'http://www.uqunion.au'),
(2018879, 'http://www.uqunion.au'),
(2018880, 'http://www.uqunion.au'),
(2018881, 'http://www.uqunion.au'),
(2018882, 'http://www.uqunion.au'),
(2018883, 'http://www.uqunion.au'),
(2018884, 'http://www.uqunion.au'),
(2018885, 'http://www.uqunion.au'),
(2018886, 'http://www.uqunion.au'),
(2018887, 'http://www.uqunion.au'),
(2018888, 'http://www.uqunion.au'),
(2018889, 'http://www.uqunion.au'),
(2018890, 'http://www.uqunion.au'),
(2018891, 'http://www.uqunion.au'),
(2018892, 'http://www.uqunion.au'),
(2018893, 'http://www.uqunion.au'),
(2018894, 'http://www.uqunion.au'),
(2018895, 'http://www.uqunion.au'),
(2018896, 'http://www.uqunion.au'),
(2018897, 'http://www.uqunion.au'),
(2018898, 'http://www.uqunion.au'),
(2018899, 'http://www.uqunion.au'),
(2018900, 'http://www.uqunion.au'),
(2018901, 'http://www.uqunion.au'),
(2018902, 'http://www.uqunion.au'),
(2018903, 'http://www.uqunion.au'),
(2018904, 'http://www.uqunion.au'),
(2018905, 'http://www.uqunion.au'),
(2018906, 'http://www.uqunion.au'),
(2018907, 'http://www.uqunion.au'),
(2018908, 'http://www.uqunion.au'),
(2018909, 'http://www.uqunion.au'),
(2018910, 'http://www.uqunion.au'),
(2018911, 'http://www.uqunion.au'),
(2018912, 'http://www.uqunion.au'),
(2018913, 'http://www.uqunion.au'),
(2018914, 'http://www.uqunion.au'),
(2018915, 'http://www.uqunion.au'),
(2018916, 'http://www.uqunion.au'),
(2018917, 'http://www.uqunion.au'),
(2018918, 'http://www.uqunion.au'),
(2018919, 'http://www.uqunion.au'),
(2018920, 'http://www.uqunion.au'),
(2018921, 'http://www.uqunion.au'),
(2018922, 'http://www.uqunion.au'),
(2018923, 'http://www.uqunion.au'),
(2018924, 'http://www.uqunion.au'),
(2018925, 'http://www.uqunion.au'),
(2018926, 'http://www.uqunion.au'),
(2018927, 'http://www.uqunion.au'),
(2018928, 'http://www.uqunion.au'),
(2018929, 'http://www.uqunion.au'),
(2018930, 'http://www.uqunion.au'),
(2018931, 'http://www.uqunion.au'),
(2018932, 'http://www.uqunion.au'),
(2018933, 'http://www.uqunion.au'),
(2018934, 'http://www.uqunion.au'),
(2018935, 'http://www.uqunion.au'),
(2018936, 'http://www.uqunion.au'),
(2018937, 'http://www.uqunion.au'),
(2018938, 'http://www.uqunion.au'),
(2018939, 'http://www.uqunion.au'),
(2018940, 'http://www.uqunion.au'),
(2018941, 'http://www.uqunion.au'),
(2018942, 'http://www.uqunion.au'),
(2018943, 'http://www.uqunion.au'),
(2018944, 'http://www.uqunion.au'),
(2018945, 'http://www.uqunion.au'),
(2018946, 'http://www.uqunion.au'),
(2018947, 'http://www.uqunion.au'),
(2018948, 'http://www.uqunion.au'),
(2018949, 'http://www.uqunion.au'),
(2018950, 'http://www.uqunion.au'),
(2018951, 'http://www.uqunion.au'),
(2018952, 'http://www.uqunion.au'),
(2018953, 'http://www.uqunion.au'),
(2018954, 'http://www.uqunion.au'),
(2018955, 'http://www.uqunion.au'),
(2018956, 'http://www.uqunion.au'),
(2018957, 'http://www.uqunion.au'),
(2018958, 'http://www.uqunion.au'),
(2018959, 'http://www.uqunion.au'),
(2018960, 'http://www.uqunion.au'),
(2018961, 'http://www.uqunion.au'),
(2018962, 'http://www.uqunion.au'),
(2018963, 'http://www.uqunion.au'),
(2018964, 'http://www.uqunion.au'),
(2018965, 'http://www.uqunion.au'),
(2018966, 'http://www.uqunion.au'),
(2018967, 'http://www.uqunion.au'),
(2018968, 'http://www.uqunion.au'),
(2018969, 'http://www.uqunion.au'),
(2018970, 'http://www.uqunion.au'),
(2018971, 'http://www.uqunion.au'),
(2018972, 'http://www.uqunion.au'),
(2018973, 'http://www.uqunion.au'),
(2018974, 'http://www.uqunion.au'),
(2018975, 'http://www.uqunion.au'),
(2018976, 'http://www.uqunion.au'),
(2018977, 'http://www.uqunion.au'),
(2018978, 'http://www.uqunion.au'),
(2018979, 'http://www.uqunion.au'),
(2018980, 'http://www.uqunion.au'),
(2018981, 'http://www.uqunion.au'),
(2018982, 'http://www.uqunion.au'),
(2018983, 'http://www.uqunion.au'),
(2018984, 'http://www.uqunion.au'),
(2018985, 'http://www.uqunion.au'),
(2018986, 'http://www.uqunion.au'),
(2018987, 'http://www.uqunion.au'),
(2018988, 'http://www.uqunion.au'),
(2018989, 'http://www.uqunion.au'),
(2018990, 'http://www.uqunion.au'),
(2018991, 'http://www.uqunion.au'),
(2018992, 'http://www.uqunion.au'),
(2018993, 'http://www.uqunion.au'),
(2018994, 'http://www.uqunion.au'),
(2018995, 'http://www.uqunion.au'),
(2018996, 'http://www.uqunion.au'),
(2018997, 'http://www.uqunion.au'),
(2018998, 'http://www.uqunion.au'),
(2018999, 'http://www.uqunion.au'),
(2019000, 'http://www.uqunion.au'),
(2019001, 'http://www.uqunion.au'),
(2019002, 'http://www.uqunion.au'),
(2019003, 'http://www.uqunion.au'),
(2019004, 'http://www.uqunion.au'),
(2019005, 'http://www.uqunion.au'),
(2019006, 'http://www.uqunion.au'),
(2019007, 'http://www.uqunion.au'),
(2019008, 'http://www.uqunion.au'),
(2019009, 'http://www.uqunion.au'),
(2019010, 'http://www.uqunion.au'),
(2019011, 'http://www.uqunion.au'),
(2019012, 'http://www.uqunion.au'),
(2019013, 'http://www.uqunion.au'),
(2019014, 'http://www.uqunion.au'),
(2019015, 'http://www.uqunion.au'),
(2019016, 'http://www.uqunion.au'),
(2019017, 'http://www.uqunion.au'),
(2019018, 'http://www.uqunion.au'),
(2019019, 'http://www.uqunion.au'),
(2019020, 'http://www.uqunion.au'),
(2019021, 'http://www.uqunion.au'),
(2019022, 'http://www.uqunion.au');

-- --------------------------------------------------------

--
-- Table structure for table `webpage`
--

DROP TABLE IF EXISTS `webpage`;
CREATE TABLE `webpage` (
  `SlotID` int(11) NOT NULL,
  `URL` varchar(100) NOT NULL,
  `Subpage` int(11) NOT NULL,
  `SlotClickCost` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webpage`
--

INSERT INTO `webpage` (`SlotID`, `URL`, `Subpage`, `SlotClickCost`) VALUES
(1, 'http://www.uqunion.au', 1, 2.99),
(2, 'http://www.uqunion.au', 1, 2.49),
(3, 'http://www.uqunion.au', 2, 2.49),
(4, 'http://www.uqunion.au', 2, 1.99),
(5, 'http://www.uqunion.au', 3, 1.99),
(6, 'http://www.uqunion.au', 3, 1.49),
(7, 'http://www.uqunion.au', 4, 1.49),
(8, 'http://www.uqunion.au', 4, 0.99);

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

DROP TABLE IF EXISTS `website`;
CREATE TABLE `website` (
  `URL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`URL`) VALUES
('http://www.amazon.au'),
('http://www.coles.au'),
('http://www.microsoft.au'),
('http://www.uber.au'),
('http://www.uqunion.au');

--
-- Triggers `website`
--
DROP TRIGGER IF EXISTS `recordchange`;
DELIMITER $$
CREATE TRIGGER `recordchange` BEFORE DELETE ON `website` FOR EACH ROW INSERT INTO website_old(URL) 
SELECT * FROM website
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `website_old`
--

DROP TABLE IF EXISTS `website_old`;
CREATE TABLE `website_old` (
  `URL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `website_old`
--

INSERT INTO `website_old` (`URL`) VALUES
('http://www.amazon.au'),
('http://www.coles.au'),
('http://www.microsoft.au'),
('http://www.uber.au'),
('http://www.uq.au'),
('http://www.uqunion.au');

-- --------------------------------------------------------

--
-- Structure for view `advertiser_bid_slot`
--
DROP TABLE IF EXISTS `advertiser_bid_slot`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `advertiser_bid_slot`  AS  (select count(`ad`.`SlotID`) AS `Bid_Slot` from `ad` group by `ad`.`AdvertiserID`) ;

-- --------------------------------------------------------

--
-- Structure for view `advertiser_count_clicks`
--
DROP TABLE IF EXISTS `advertiser_count_clicks`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `advertiser_count_clicks`  AS  (select count(`clicks`.`ClickID`) AS `Click_Count` from `clicks` where ((`clicks`.`Date` >= '2018-05-07') and (`clicks`.`Date` <= '2018-05-13')) group by `clicks`.`AdvertiserID`) ;

-- --------------------------------------------------------

--
-- Structure for view `advertiser_cpc`
--
DROP TABLE IF EXISTS `advertiser_cpc`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `advertiser_cpc`  AS  (select round((sum(`webpage`.`SlotClickCost`) / count(`clicks`.`ClickID`)),2) AS `CPC` from ((`clicks` left join `ad` on((`clicks`.`AdID` = `ad`.`AdID`))) left join `webpage` on((`ad`.`SlotID` = `webpage`.`SlotID`))) where ((`clicks`.`Date` >= '2018-05-07') and (`clicks`.`Date` <= '2018-05-13')) group by `clicks`.`AdvertiserID`) ;

-- --------------------------------------------------------

--
-- Structure for view `advertiser_performance_slot`
--
DROP TABLE IF EXISTS `advertiser_performance_slot`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `advertiser_performance_slot`  AS  (select count(distinct `ad`.`SlotID`) AS `Performing_Slot` from ((`clicks` left join `ad` on((`clicks`.`AdID` = `ad`.`AdID`))) left join `webpage` on((`ad`.`SlotID` = `webpage`.`SlotID`))) where ((`clicks`.`Date` >= '2018-05-07') and (`clicks`.`Date` <= '2018-05-13')) group by `clicks`.`AdvertiserID`) ;

-- --------------------------------------------------------

--
-- Structure for view `advertiser_sum_revenue`
--
DROP TABLE IF EXISTS `advertiser_sum_revenue`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `advertiser_sum_revenue`  AS  (select round(sum(`webpage`.`SlotClickCost`),2) AS `Total_Cost` from ((`clicks` left join `ad` on((`clicks`.`AdID` = `ad`.`AdID`))) left join `webpage` on((`ad`.`SlotID` = `webpage`.`SlotID`))) where ((`clicks`.`Date` >= '2018-05-07') and (`clicks`.`Date` <= '2018-05-13')) group by `clicks`.`AdvertiserID`) ;

-- --------------------------------------------------------

--
-- Structure for view `ad_count_clicks`
--
DROP TABLE IF EXISTS `ad_count_clicks`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ad_count_clicks`  AS  (select count(`clicks`.`ClickID`) AS `Click_Count` from `clicks` where (`clicks`.`Date` >= '2018-05-07’ AND Date <= ‘2018-05-13') group by `clicks`.`AdID`) ;

-- --------------------------------------------------------

--
-- Structure for view `ad_sum_revenue`
--
DROP TABLE IF EXISTS `ad_sum_revenue`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ad_sum_revenue`  AS  (select round(sum(`webpage`.`SlotClickCost`),2) AS `Total_Cost` from ((`clicks` left join `ad` on((`clicks`.`AdID` = `ad`.`AdID`))) left join `webpage` on((`ad`.`SlotID` = `webpage`.`SlotID`))) where ((`clicks`.`Date` >= '2018-05-07') and (`clicks`.`Date` <= '2018-05-13')) group by `clicks`.`AdID`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`AdID`,`AdvertiserID`),
  ADD KEY `URL` (`URL`,`SlotID`),
  ADD KEY `AdvertiserID` (`AdvertiserID`);

--
-- Indexes for table `advertiser`
--
ALTER TABLE `advertiser`
  ADD PRIMARY KEY (`AdvertiserID`);

--
-- Indexes for table `clicks`
--
ALTER TABLE `clicks`
  ADD PRIMARY KEY (`URL`,`SessionID`,`ClickID`,`AdID`,`AdvertiserID`),
  ADD KEY `AdID` (`AdID`,`AdvertiserID`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`SessionID`,`URL`),
  ADD KEY `URL` (`URL`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`SessionID`,`URL`),
  ADD KEY `URL` (`URL`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`SessionID`,`URL`),
  ADD KEY `URL` (`URL`);

--
-- Indexes for table `webpage`
--
ALTER TABLE `webpage`
  ADD PRIMARY KEY (`SlotID`,`URL`),
  ADD KEY `URL` (`URL`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`URL`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ad`
--
ALTER TABLE `ad`
  ADD CONSTRAINT `ad_ibfk_1` FOREIGN KEY (`URL`,`SlotID`) REFERENCES `webpage` (`URL`, `SlotID`),
  ADD CONSTRAINT `ad_ibfk_3` FOREIGN KEY (`AdvertiserID`) REFERENCES `advertiser` (`AdvertiserID`) ON DELETE CASCADE;

--
-- Constraints for table `clicks`
--
ALTER TABLE `clicks`
  ADD CONSTRAINT `clicks_ibfk_1` FOREIGN KEY (`URL`,`SessionID`) REFERENCES `users` (`URL`, `SessionID`),
  ADD CONSTRAINT `clicks_ibfk_2` FOREIGN KEY (`AdID`,`AdvertiserID`) REFERENCES `ad` (`AdID`, `AdvertiserID`);

--
-- Constraints for table `guest`
--
ALTER TABLE `guest`
  ADD CONSTRAINT `guest_ibfk_1` FOREIGN KEY (`URL`) REFERENCES `users` (`URL`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`URL`) REFERENCES `users` (`URL`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`URL`) REFERENCES `website` (`URL`);

--
-- Constraints for table `webpage`
--
ALTER TABLE `webpage`
  ADD CONSTRAINT `webpage_ibfk_1` FOREIGN KEY (`URL`) REFERENCES `website` (`URL`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
