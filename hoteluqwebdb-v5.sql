-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 01, 2018 at 02:43 AM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hoteluqwebdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `Branch`
--

CREATE TABLE `Branch` (
  `BranchName` varchar(15) NOT NULL,
  `HStreetNo` int(11) DEFAULT NULL,
  `HStreetName` varchar(255) DEFAULT NULL,
  `HCity` varchar(255) DEFAULT NULL,
  `HState` varchar(255) DEFAULT NULL,
  `HPostCode` int(11) DEFAULT NULL,
  `HEmail` varchar(255) DEFAULT NULL,
  `HPhoneNo` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Branch`
--

INSERT INTO `Branch` (`BranchName`, `HStreetNo`, `HStreetName`, `HCity`, `HState`, `HPostCode`, `HEmail`, `HPhoneNo`) VALUES
('BrisbaneCBD', 123, 'Elizabeth Street', 'BRISBANE', 'QLD', 4000, 'info.brisbanecbd@hoteluq.com.au', '07 2559 2000'),
('GoldCoast', 314, 'Philip Avenue', 'BROADBEACH', 'QLD', 4218, 'info.goldcoast@hoteluq.com.au', '07 5525 8000'),
('Noosa', 205, 'Hasting Street', 'NOOSA HEADS', 'QLD', 4567, 'info.noosa@hoteluq.com.au', '07 5253 9800'),
('StLucia', 35, 'Bryce Street', 'ST LUCIA', 'QLD', 4067, 'info.stlucia@hoteluq.com.au', '07 2562 7100'),
('SydneyCBD', 12, 'Kent Street', 'SYDNEY', 'NSW', 2000, 'info.sydneycbd@hoteluq.com.au', '02 7362 5000');

-- --------------------------------------------------------

--
-- Table structure for table `BranchManager`
--

CREATE TABLE `BranchManager` (
  `BranchName` varchar(15) NOT NULL,
  `ManagerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `BranchManager`
--

INSERT INTO `BranchManager` (`BranchName`, `ManagerID`) VALUES
('Noosa', 15961),
('BrisbaneCBD', 32581),
('GoldCoast', 45411),
('StLucia', 77505),
('SydneyCBD', 79025);

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `CustomerID` int(11) NOT NULL,
  `CFirstName` varchar(255) NOT NULL,
  `CLastName` varchar(255) NOT NULL,
  `CDOB` date DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `CEmail` varchar(255) DEFAULT NULL,
  `CStreetNo` int(11) DEFAULT NULL,
  `CStreetName` varchar(255) DEFAULT NULL,
  `CCity` varchar(255) DEFAULT NULL,
  `CState` varchar(255) DEFAULT NULL,
  `CPhoneNo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`CustomerID`, `CFirstName`, `CLastName`, `CDOB`, `Title`, `CEmail`, `CStreetNo`, `CStreetName`, `CCity`, `CState`, `CPhoneNo`) VALUES
(1, 'John', 'Smith', '1937-12-21', 'Mr', 'john.smith@datamail.com.au', 99, ' ', 'HOLGATE', 'NSW', '0440 128 675'),
(2, 'Ava', 'Roydon', '1998-09-10', 'Miss', 'ava.m.r@datamai.com', 21, ' ', 'IMAGE PLAINS', 'QLD', '0489 616 572'),
(3, 'Maya', 'Boon', '1939-09-18', 'Mrs', 'm.m.boon@infsmail.com', 24, 'Watson Street', 'TIMMERING', 'VIC', '0491 187 015'),
(4, 'Regina', 'Jain', '1939-09-24', 'Ms', 'regina.jain@datamail.com', 58, 'Cherry Grove', 'WEST MONTAGU', 'TAS', '0490 630 889'),
(5, 'Frances', 'Peck', '1940-12-04', 'Mr', 'frances.j.peck001@infsmail.com', 15, 'Cedar Street', 'GATTON', 'QLD', '0491 747 441'),
(6, 'Zenovia', 'Short', '1941-08-31', 'Mrs', 'z.short12@datamail.com', 187, 'Creek Terrace', 'TOOWOOMBA', 'QLD', '0453 596 826'),
(7, 'Shirlee', 'Amjad', '1949-02-03', 'Mrs', 'shirlee.amjad@infsmail.com', 60, 'Greenslope Avenue', 'ST LUCIA', 'QLD', '0467 405 435'),
(8, 'Kayden', 'Howse', '1957-07-11', 'Mr', 'howse.k1@infsmail.com', 2, 'Hodgson St', 'LESLIE', 'QLD', '0453 494 245'),
(9, 'Pamella', 'Shelton', '1969-07-26', 'Ms', 'sheltompamella26@datamail.com', 58, 'Whitehaven Crescent', 'ROCKHAMPTON', 'QLD', '0440 659 663'),
(10, 'Peter', 'Thompson', '1972-04-11', 'Mr', 'peter.d.thompson72@data.net', 86, 'Armstrong Street', 'FISH POINT', 'VIC', '0467 156 957'),
(11, 'Harrison', 'Cornwell', '1974-08-04', 'Mr', 'cornwell1harrison@infsmail.com', 83, 'Bellion Drive', 'ANKETELL', 'WA', '0453 329 233'),
(12, 'Christopher', 'Wallace', '1977-06-13', 'Mr', 'chris00wallace@data.net', 24, 'Ashton Road', 'WEST HOLLETON', 'WA', '0436 519 177'),
(13, 'Paige', 'Runner', '1992-04-29', 'Miss', 'thepaige@data.net', 51, 'Bayview Close', 'ST LUCIA', 'QLD', '0453 389 981'),
(14, 'Toby', 'Warwick', '1992-09-10', 'Mr', 'tobyy92@datamail.com', 54, 'Boughtman Street', 'BENTLEIGH EAST', 'VIC', '0445 187 379'),
(15, 'Cornor', 'Wyman', '2001-05-26', 'Mr', 'cornorw01@datamail.com', 9, 'Faulkner Street', 'EAST ARMIDALE', 'NSW', '0467 608 506');

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
  `EmployeeID` int(11) NOT NULL,
  `BranchName` varchar(15) NOT NULL,
  `EFirstName` varchar(255) NOT NULL,
  `ELastName` varchar(255) NOT NULL,
  `EEmail` varchar(255) DEFAULT NULL,
  `EDOB` date DEFAULT NULL,
  `EStreetNo` int(11) DEFAULT NULL,
  `EStreetName` varchar(255) DEFAULT NULL,
  `ECity` varchar(255) DEFAULT NULL,
  `EState` varchar(255) DEFAULT NULL,
  `EPhoneNo` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`EmployeeID`, `BranchName`, `EFirstName`, `ELastName`, `EEmail`, `EDOB`, `EStreetNo`, `EStreetName`, `ECity`, `EState`, `EPhoneNo`) VALUES
(15961, 'Noosa', 'Sandra', 'James', 'sandra.james@hoteluq.com.au', '1983-02-23', 20, 'Jacabina Court', 'NAMBOUR', 'QLD', '0480 557 500'),
(17714, 'StLucia', 'Alannah', 'Boulos', 'alannah.boulos@hoteluq.com.au', '1975-11-07', 6, 'Mandible Street', 'DAISY HILL', 'QLD', '0472 691 032'),
(21135, 'BrisbaneCBD', 'David', 'Tran', 'david.tran@hoteluq.com.au', '1991-05-05', 3, 'Plug Street', 'EAST BRISBANE', 'QLD', '0456 172 824'),
(23601, 'BrisbaneCBD', 'Emily', 'Wong', 'emily.wong@hoteluq.com.au', '1993-02-15', 66, 'Main Street', 'COOPERS PLAINS', 'QLD', '0487 879 552'),
(32581, 'BrisbaneCBD', 'Claudia', 'Peterson', 'claudia.peterson@hoteluq.com.au', '1969-03-01', 12, 'Thule Drive', 'ST LUCIA', 'QLD', '0482 750 450'),
(45411, 'GoldCoast', 'Tracey', 'Ma', 'tracey.ma@hoteluq.com.au', '1966-04-29', 27, 'Shell Road', 'BROAD BEACH', 'QLD', '0499 545 743'),
(58094, 'StLucia', 'Vera', 'Travors', 'vera.travors@hoteluq.com.au', '1995-02-05', 91, 'Creedon Street', 'YERONGA', 'QLD', '0415 351 202'),
(59049, 'Noosa', 'Clint', 'Paget', 'clint.paget@hoteluq.com.au', '1981-08-21', 25, 'Marlin Avenue', 'BUDDINA', 'QLD', '0496 201 377'),
(61741, 'Noosa', 'Lina', 'Simpkin', 'lina.simpkin@hoteluq.com.au', '1977-11-16', 76, 'Daly Terrace', 'GREENSLOPE', 'QLD', '0435 384 009'),
(77505, 'StLucia', 'Roland', 'Hambleton', 'roland.hambleton@hoteluq.com.au', '1979-11-01', 35, 'McKillop Street', 'SPRING HILL', 'QLD', '0427 304 846'),
(79025, 'SydneyCBD', 'Vincent', 'Flinders', 'vincent.flinders@hoteluq.com.au', '1973-09-17', 21, 'Tapleys Hill Road', 'PYMBLE', 'NSW', '0487 914 633'),
(82195, 'Noosa', 'Katherine', 'Wyatt', 'katherine.wyatt@hoteluq.com.au', '1962-11-30', 85, 'Maintongoon Road', 'YAROOMBA', 'QLD', '0483 963 462'),
(93254, 'SydneyCBD', 'Bryce', 'Waters', 'bryce.waters@hoteluq.com.au', '1980-02-22', 14, 'Hummocky Road', 'STRATHFIELD', 'NSW', '0412 502 231'),
(94998, 'GoldCoast', 'James', 'Lockwood', 'james.lockwood@hoteluq.com.au', '1977-09-13', 76, 'Rose Street', 'MERMAID BEACH', 'QLD', '0448 936 587');

-- --------------------------------------------------------

--
-- Table structure for table `Invoice`
--

CREATE TABLE `Invoice` (
  `InvoiceID` int(11) NOT NULL,
  `InvoiceStatus` enum('Paid','Unpaid') DEFAULT NULL,
  `InvoiceDesc` varchar(255) DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `PaidDate` date DEFAULT NULL,
  `IssueDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Invoice`
--

INSERT INTO `Invoice` (`InvoiceID`, `InvoiceStatus`, `InvoiceDesc`, `Amount`, `PaidDate`, `IssueDate`) VALUES
(101, 'Paid', 'Accommodation', '170.00', '2017-12-09', '2017-12-09'),
(102, 'Paid', 'Accommodation', '1020.00', '2017-12-26', '2017-12-26'),
(103, 'Paid', 'Accommodation', '450.00', '2017-12-26', '2017-12-26'),
(104, 'Paid', 'Accommodation', '1600.00', '2018-01-02', '2018-01-02'),
(105, 'Paid', 'Accommodation', '750.00', '2018-01-03', '2018-01-01'),
(106, 'Paid', 'Accommodation', '450.00', '2018-01-02', '2018-01-02'),
(107, 'Paid', 'Accommodation', '200.00', '2018-01-12', '2018-01-11'),
(108, 'Paid', 'Accommodation', '120.00', '2018-01-28', '2018-01-28'),
(109, 'Paid', 'Accommodation', '225.00', '2018-02-17', '2018-02-15'),
(110, 'Paid', 'Accommodation', '700.00', '2018-02-21', '2018-02-18'),
(111, 'Paid', 'Accommodation', '400.00', '2018-03-04', '2018-03-04'),
(112, 'Paid', 'Accommodation', '510.00', '2018-03-25', '2018-03-25'),
(113, 'Paid', 'Accommodation', '170.00', '2018-03-28', '2018-03-27'),
(114, 'Paid', 'Accommodation', '900.00', '2018-04-03', '2018-04-02'),
(115, 'Paid', 'Accommodation', '510.00', '2018-04-04', '2018-04-02'),
(116, 'Paid', 'Accommodation', '900.00', '2018-04-03', '2018-04-03'),
(117, 'Paid', 'Accommodation', '340.00', '2018-04-04', '2018-04-02'),
(118, 'Paid', 'Accommodation', '200.00', NULL, NULL),
(119, 'Unpaid', 'Accommodation', '1000.00', NULL, NULL),
(120, 'Unpaid', 'Accommodation', '340.00', NULL, NULL),
(121, 'Paid', 'Accommodation', '500.00', '2017-05-11', '2017-05-12'),
(122, 'Paid', 'Accommodation', '500.00', '2017-07-11', '2017-07-12'),
(123, 'Paid', 'Accommodation', '500.00', '2017-09-11', '2017-09-12'),
(124, 'Paid', 'Accommodation', '500.00', '2017-10-11', '2017-10-12'),
(125, 'Paid', 'Accommodation', '500.00', '2017-11-11', '2017-11-12'),
(126, 'Unpaid', 'Accommodation', '340.00', NULL, '2018-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `InvoiceReservation`
--

CREATE TABLE `InvoiceReservation` (
  `InvoiceID` int(11) NOT NULL,
  `ReservationNum` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `InvoiceReservation`
--

INSERT INTO `InvoiceReservation` (`InvoiceID`, `ReservationNum`) VALUES
(1021, 121),
(1022, 122),
(1023, 123),
(1024, 124),
(1025, 125),
(101, 1001),
(102, 1002),
(103, 1003),
(104, 1004),
(105, 1005),
(106, 1006),
(107, 1007),
(108, 1008),
(109, 1009),
(110, 1010),
(111, 1011),
(112, 1012),
(113, 1013),
(114, 1014),
(115, 1015),
(116, 1016),
(117, 1017),
(118, 1018),
(119, 1019),
(120, 1020),
(126, 1026);

-- --------------------------------------------------------

--
-- Table structure for table `mp_pages`
--

CREATE TABLE `mp_pages` (
  `page_id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_desc` text,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_desc` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `parent` varchar(255) NOT NULL DEFAULT '0',
  `status` enum('A','I') NOT NULL DEFAULT 'A',
  `page_alias` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mp_pages`
--

INSERT INTO `mp_pages` (`page_id`, `page_title`, `page_desc`, `meta_keywords`, `meta_desc`, `sort_order`, `parent`, `status`, `page_alias`) VALUES
(1, 'Welcome to Hotel UQ', 'This web site has been prepared as a deliverable for&nbsp; a post graduate \r\nstudy project work. The selected domain for this project is the \r\nmanagement records for an imaginary hotel called “Hotel UQ”. <br>Hotel UQ owns and operates several branches that are located in different cities. <br>The\r\n scope of the project is to model the customer and employee information,\r\n room reservation and invoice records at branches of Hotel UQ using PHP \r\nand MySQL.\r\n<br>There will be two classes of users of the system: the hotel \r\ncustomers, and the hotel employees, but for simplicity, both customers \r\nand hotel employees will be able to perform the same tasks associated \r\nwith the functional use of the web site, such as viewing and updating \r\nthe records, checking the reservations, exploring popular hotel rooms \r\nand branches in addition to viewing reservation records of all customers\r\n and updating both hotel customer and employee information.<br>', 'tags', 'description goes here', 0, '-1', 'A', 'index'),
(2, 'About Us', '<br>HotelUQ is conveniently located in St Lucia, Brisbane within very \r\nshort distance from most of the point of interests and an ideal spot for\r\n exploring the best of Brisbane city. With spacious, stylish rooms and \r\nmany facilities, HotelUQ is providing a quality service for everyone.<br>A great place to stay for holidays and business trips with a great value for money.<br><br><br><span style=\\\"font-weight: bold;\\\">Main Facilities</span><br><ul><li>Restaurant and bar/lounge</li><li>Outdoor/Indoor heated pool</li><li>Breakfast</li><li>Fitness center and Spa</li><li>Business meeting venues and functions</li><li>24x7 Reception</li><li>Air conditioning</li><li>Daily room services</li><li>Free WiFi</li></ul><br><div>We look forward to see you at HotelUQ...</div><br>', 'tags', 'description goes here', 1, '-1', 'A', 'about-us'),
(3, 'Rooms', '', 'tags', 'description goes here', 2, '-1', 'A', 'Rooms'),
(4, 'Contact Us', '</span> Hotel UQ Customer Services<br><span style=\\\"font-weight: bold;\\\">Website:</span> http://www.hoteluq.com.au<br><span style=\\\"font-weight: bold;\\\">Facebook:</span> https://www.facebook.com/hoteluq<br><span style=\\\"font-weight: bold;\\\">Twitter:</span> https://twitter.com/hoteluq<br>', 'tags', 'description goes here', 6, '-1', 'A', 'contact-us'),
(5, 'Reservations', '', 'tags', 'description goes here', 3, '-1', 'A', 'Reservations'),
(6, 'Select A Menu Option', '<br>', 'tags', 'Description goes here', 4, '-1', 'A', 'Inquiries'),
(7, 'Admin', '<br>', 'tags', '', 5, '-1', 'A', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `mp_tagline`
--

CREATE TABLE `mp_tagline` (
  `id` int(11) NOT NULL,
  `tagline1` varchar(255) DEFAULT NULL,
  `tagline2` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mp_tagline`
--

INSERT INTO `mp_tagline` (`id`, `tagline1`, `tagline2`) VALUES
(1, 'www.hoteluq.com.au', '');

-- --------------------------------------------------------

--
-- Table structure for table `PremiumRoom`
--

CREATE TABLE `PremiumRoom` (
  `RoomType` varchar(15) NOT NULL,
  `RoomService` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PremiumRoom`
--

INSERT INTO `PremiumRoom` (`RoomType`, `RoomService`) VALUES
('Premium', 1),
('Standard', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Reservation`
--

CREATE TABLE `Reservation` (
  `ReservationNum` int(11) NOT NULL,
  `Checkin_Date` date DEFAULT NULL,
  `Checkout_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Reservation`
--

INSERT INTO `Reservation` (`ReservationNum`, `Checkin_Date`, `Checkout_Date`) VALUES
(1001, '2017-12-08', '2017-12-09'),
(1002, '2017-12-20', '2017-12-26'),
(1003, '2017-12-24', '2017-12-26'),
(1004, '2017-12-25', '2018-01-02'),
(1005, '2017-12-27', '2018-01-01'),
(1006, '2017-12-30', '2018-01-02'),
(1007, '2018-01-10', '2018-01-11'),
(1008, '2018-01-27', '2018-01-28'),
(1009, '2018-02-14', '2018-02-15'),
(1010, '2018-02-14', '2018-02-18'),
(1011, '2018-03-02', '2018-03-04'),
(1012, '2018-03-22', '2018-03-25'),
(1013, '2018-03-26', '2018-03-27'),
(1014, '2018-03-27', '2018-04-02'),
(1015, '2018-03-30', '2018-04-02'),
(1016, '2018-03-30', '2018-04-03'),
(1017, '2018-03-31', '2018-04-02'),
(1018, '2018-04-26', '2018-04-27'),
(1019, '2018-06-06', '2018-06-11'),
(1020, '2018-08-07', '2018-08-09'),
(1021, '2017-05-01', '2017-05-10'),
(1022, '2017-07-01', '2017-07-10'),
(1023, '2017-09-01', '2017-09-10'),
(1024, '2017-10-01', '2017-10-10'),
(1025, '2017-11-01', '2017-11-10'),
(1026, '2018-10-10', '2018-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `ReservationCustomer`
--

CREATE TABLE `ReservationCustomer` (
  `ReservationNum` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `Checkin_Date` date DEFAULT NULL,
  `Checkout_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ReservationCustomer`
--

INSERT INTO `ReservationCustomer` (`ReservationNum`, `CustomerID`, `Checkin_Date`, `Checkout_Date`) VALUES
(1001, 1, '2017-12-08', '2017-12-09'),
(1002, 2, '2017-12-20', '2017-12-26'),
(1003, 3, '2017-12-24', '2017-12-26'),
(1004, 10, '2017-12-25', '2018-01-02'),
(1005, 1, '2017-12-27', '2018-01-01'),
(1006, 5, '2017-12-30', '2018-01-02'),
(1007, 6, '2018-01-10', '2018-01-11'),
(1008, 8, '2018-01-27', '2018-01-28'),
(1009, 15, '2018-02-14', '2018-02-15'),
(1010, 11, '2018-02-14', '2018-02-18'),
(1011, 6, '2018-03-02', '2018-03-04'),
(1012, 5, '2018-03-22', '2018-03-25'),
(1013, 13, '2018-03-26', '2018-03-27'),
(1014, 14, '2018-03-27', '2018-04-02'),
(1015, 12, '2018-03-30', '2018-04-02'),
(1016, 10, '2018-03-30', '2018-04-03'),
(1017, 4, '2018-03-31', '2018-04-02'),
(1018, 5, '2018-04-26', '2018-04-27'),
(1019, 6, '2018-06-06', '2018-06-11'),
(1020, 7, '2018-08-07', '2018-08-09'),
(1021, 7, '2017-05-01', '2017-05-10'),
(1022, 7, '2017-07-01', '2017-07-10'),
(1023, 7, '2017-09-01', '2017-09-10'),
(1024, 7, '2017-10-01', '2017-10-10'),
(1025, 7, '2017-11-01', '2017-11-10'),
(1026, 2, '2018-10-10', '2018-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `ReservationInvoice`
--

CREATE TABLE `ReservationInvoice` (
  `ReservationNum` int(11) NOT NULL,
  `InvoiceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ReservationInvoice`
--

INSERT INTO `ReservationInvoice` (`ReservationNum`, `InvoiceID`) VALUES
(1001, 101),
(1002, 102),
(1003, 103),
(1004, 104),
(1005, 105),
(1006, 106),
(1007, 107),
(1008, 108),
(1009, 109),
(1010, 110),
(1011, 111),
(1012, 112),
(1013, 113),
(1014, 114),
(1015, 115),
(1016, 116),
(1017, 117),
(1018, 118),
(1019, 119),
(1020, 120),
(1021, 121),
(1022, 122),
(1023, 123),
(1024, 124),
(1025, 125),
(1026, 126);

-- --------------------------------------------------------

--
-- Table structure for table `ReservationRoom`
--

CREATE TABLE `ReservationRoom` (
  `ReservationNum` int(11) NOT NULL,
  `Checkin_Date` date DEFAULT NULL,
  `Checkout_Date` date DEFAULT NULL,
  `RoomNum` int(11) DEFAULT NULL,
  `BranchName` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ReservationRoom`
--

INSERT INTO `ReservationRoom` (`ReservationNum`, `Checkin_Date`, `Checkout_Date`, `RoomNum`, `BranchName`) VALUES
(1001, '2017-12-08', '2017-12-09', 3, 'BrisbaneCBD'),
(1002, '2017-12-20', '2017-12-26', 3, 'Noosa'),
(1003, '2017-12-24', '2017-12-26', 5, 'SydneyCBD'),
(1004, '2017-12-25', '2018-01-02', 4, 'Noosa'),
(1005, '2017-12-27', '2018-01-01', 2, 'BrisbaneCBD'),
(1006, '2017-12-30', '2018-01-02', 1, 'Noosa'),
(1007, '2018-01-10', '2018-01-11', 4, 'SydneyCBD'),
(1008, '2018-01-27', '2018-01-28', 3, 'StLucia'),
(1009, '2018-02-14', '2018-02-15', 4, 'GoldCoast'),
(1010, '2018-02-14', '2018-02-18', 3, 'SydneyCBD'),
(1011, '2018-03-02', '2018-03-04', 5, 'Noosa'),
(1012, '2018-03-22', '2018-03-25', 2, 'GoldCoast'),
(1013, '2018-03-26', '2018-03-27', 3, 'GoldCoast'),
(1014, '2018-03-27', '2018-04-02', 1, 'GoldCoast'),
(1015, '2018-03-30', '2018-04-02', 3, 'Noosa'),
(1016, '2018-03-30', '2018-04-03', 5, 'GoldCoast'),
(1017, '2018-03-31', '2018-04-02', 3, 'BrisbaneCBD'),
(1018, '2018-04-26', '2018-04-27', 4, 'SydneyCBD'),
(1019, '2018-06-06', '2018-06-11', 4, 'SydneyCBD'),
(1020, '2018-08-07', '2018-08-09', 5, 'StLucia'),
(1021, '2017-05-01', '2017-05-10', 5, 'StLucia'),
(1022, '2017-07-01', '2017-07-10', 5, 'StLucia'),
(1023, '2017-09-01', '2017-09-10', 5, 'StLucia'),
(1024, '2017-10-01', '2017-10-10', 5, 'StLucia'),
(1025, '2017-11-01', '2017-11-10', 5, 'StLucia'),
(1026, '2018-10-10', '2018-10-12', 3, 'BrisbaneCBD');

-- --------------------------------------------------------

--
-- Table structure for table `RoomBranchCapacity`
--

CREATE TABLE `RoomBranchCapacity` (
  `RoomNum` int(11) NOT NULL,
  `BranchName` varchar(15) NOT NULL,
  `Capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RoomBranchCapacity`
--

INSERT INTO `RoomBranchCapacity` (`RoomNum`, `BranchName`, `Capacity`) VALUES
(1, 'BrisbaneCBD', 2),
(1, 'GoldCoast', 2),
(1, 'Noosa', 2),
(1, 'StLucia', 1),
(1, 'SydneyCBD', 2),
(2, 'BrisbaneCBD', 2),
(2, 'GoldCoast', 2),
(2, 'Noosa', 2),
(2, 'StLucia', 1),
(2, 'SydneyCBD', 2),
(3, 'BrisbaneCBD', 2),
(3, 'GoldCoast', 2),
(3, 'Noosa', 2),
(3, 'StLucia', 1),
(3, 'SydneyCBD', 3),
(4, 'BrisbaneCBD', 4),
(4, 'GoldCoast', 4),
(4, 'Noosa', 3),
(4, 'StLucia', 2),
(4, 'SydneyCBD', 4),
(5, 'BrisbaneCBD', 4),
(5, 'GoldCoast', 4),
(5, 'Noosa', 3),
(5, 'StLucia', 2),
(5, 'SydneyCBD', 4);

-- --------------------------------------------------------

--
-- Table structure for table `RoomBranchPrice`
--

CREATE TABLE `RoomBranchPrice` (
  `RoomNum` int(11) NOT NULL,
  `BranchName` varchar(15) NOT NULL,
  `Price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RoomBranchPrice`
--

INSERT INTO `RoomBranchPrice` (`RoomNum`, `BranchName`, `Price`) VALUES
(1, 'BrisbaneCBD', 150),
(1, 'GoldCoast', 150),
(1, 'Noosa', 150),
(1, 'StLucia', 100),
(1, 'SydneyCBD', 150),
(2, 'BrisbaneCBD', 150),
(2, 'GoldCoast', 170),
(2, 'Noosa', 150),
(2, 'StLucia', 100),
(2, 'SydneyCBD', 150),
(3, 'BrisbaneCBD', 170),
(3, 'GoldCoast', 170),
(3, 'Noosa', 170),
(3, 'StLucia', 120),
(3, 'SydneyCBD', 175),
(4, 'BrisbaneCBD', 225),
(4, 'GoldCoast', 225),
(4, 'Noosa', 175),
(4, 'StLucia', 150),
(4, 'SydneyCBD', 200),
(5, 'BrisbaneCBD', 225),
(5, 'GoldCoast', 225),
(5, 'Noosa', 200),
(5, 'StLucia', 170),
(5, 'SydneyCBD', 225);

-- --------------------------------------------------------

--
-- Table structure for table `RoomBranchType`
--

CREATE TABLE `RoomBranchType` (
  `RoomNum` int(11) NOT NULL,
  `BranchName` varchar(15) NOT NULL,
  `RoomType` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RoomBranchType`
--

INSERT INTO `RoomBranchType` (`RoomNum`, `BranchName`, `RoomType`) VALUES
(1, 'BrisbaneCBD', 'Standard'),
(1, 'GoldCoast', 'Standard'),
(1, 'Noosa', 'Standard'),
(1, 'StLucia', 'Standard'),
(1, 'SydneyCBD', 'Standard'),
(2, 'BrisbaneCBD', 'Standard'),
(2, 'GoldCoast', 'Premium'),
(2, 'Noosa', 'Standard'),
(2, 'StLucia', 'Standard'),
(2, 'SydneyCBD', 'Standard'),
(3, 'BrisbaneCBD', 'Premium'),
(3, 'GoldCoast', 'Premium'),
(3, 'Noosa', 'Premium'),
(3, 'StLucia', 'Premium'),
(3, 'SydneyCBD', 'Standard'),
(4, 'BrisbaneCBD', 'Premium'),
(4, 'GoldCoast', 'Premium'),
(4, 'Noosa', 'Premium'),
(4, 'StLucia', 'Standard'),
(4, 'SydneyCBD', 'Standard'),
(5, 'BrisbaneCBD', 'Premium'),
(5, 'GoldCoast', 'Premium'),
(5, 'Noosa', 'Premium'),
(5, 'StLucia', 'Premium'),
(5, 'SydneyCBD', 'Premium');

-- --------------------------------------------------------

--
-- Table structure for table `StandardRoom`
--

CREATE TABLE `StandardRoom` (
  `RoomType` varchar(15) NOT NULL,
  `Kitchenette` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `StandardRoom`
--

INSERT INTO `StandardRoom` (`RoomType`, `Kitchenette`) VALUES
('Premium', 0),
('Standard', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Branch`
--
ALTER TABLE `Branch`
  ADD PRIMARY KEY (`BranchName`);

--
-- Indexes for table `BranchManager`
--
ALTER TABLE `BranchManager`
  ADD PRIMARY KEY (`BranchName`),
  ADD KEY `ManagerID` (`ManagerID`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `Invoice`
--
ALTER TABLE `Invoice`
  ADD PRIMARY KEY (`InvoiceID`);

--
-- Indexes for table `InvoiceReservation`
--
ALTER TABLE `InvoiceReservation`
  ADD PRIMARY KEY (`InvoiceID`),
  ADD KEY `ReservationNum` (`ReservationNum`);

--
-- Indexes for table `mp_pages`
--
ALTER TABLE `mp_pages`
  ADD PRIMARY KEY (`page_id`),
  ADD UNIQUE KEY `page_name` (`page_alias`);

--
-- Indexes for table `mp_tagline`
--
ALTER TABLE `mp_tagline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `PremiumRoom`
--
ALTER TABLE `PremiumRoom`
  ADD PRIMARY KEY (`RoomType`);

--
-- Indexes for table `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`ReservationNum`);

--
-- Indexes for table `ReservationCustomer`
--
ALTER TABLE `ReservationCustomer`
  ADD PRIMARY KEY (`ReservationNum`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `ReservationInvoice`
--
ALTER TABLE `ReservationInvoice`
  ADD PRIMARY KEY (`ReservationNum`),
  ADD KEY `InvoiceID` (`InvoiceID`);

--
-- Indexes for table `ReservationRoom`
--
ALTER TABLE `ReservationRoom`
  ADD PRIMARY KEY (`ReservationNum`),
  ADD KEY `RoomNum` (`RoomNum`),
  ADD KEY `BranchName` (`BranchName`);

--
-- Indexes for table `RoomBranchCapacity`
--
ALTER TABLE `RoomBranchCapacity`
  ADD PRIMARY KEY (`RoomNum`,`BranchName`),
  ADD KEY `BranchName` (`BranchName`);

--
-- Indexes for table `RoomBranchPrice`
--
ALTER TABLE `RoomBranchPrice`
  ADD PRIMARY KEY (`RoomNum`,`BranchName`),
  ADD KEY `BranchName` (`BranchName`);

--
-- Indexes for table `RoomBranchType`
--
ALTER TABLE `RoomBranchType`
  ADD PRIMARY KEY (`RoomNum`,`BranchName`),
  ADD KEY `BranchName` (`BranchName`);

--
-- Indexes for table `StandardRoom`
--
ALTER TABLE `StandardRoom`
  ADD PRIMARY KEY (`RoomType`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mp_pages`
--
ALTER TABLE `mp_pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `mp_tagline`
--
ALTER TABLE `mp_tagline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `BranchManager`
--
ALTER TABLE `BranchManager`
  ADD CONSTRAINT `BranchManager_ibfk_1` FOREIGN KEY (`BranchName`) REFERENCES `Branch` (`BranchName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `BranchManager_ibfk_2` FOREIGN KEY (`ManagerID`) REFERENCES `Employee` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `InvoiceReservation`
--
ALTER TABLE `InvoiceReservation`
  ADD CONSTRAINT `InvoiceReservation_ibfk_1` FOREIGN KEY (`InvoiceID`) REFERENCES `Invoice` (`InvoiceID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `InvoiceReservation_ibfk_2` FOREIGN KEY (`ReservationNum`) REFERENCES `Reservation` (`ReservationNum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ReservationCustomer`
--
ALTER TABLE `ReservationCustomer`
  ADD CONSTRAINT `ReservationCustomer_ibfk_1` FOREIGN KEY (`ReservationNum`) REFERENCES `Reservation` (`ReservationNum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ReservationCustomer_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `Customer` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ReservationInvoice`
--
ALTER TABLE `ReservationInvoice`
  ADD CONSTRAINT `ReservationInvoice_ibfk_1` FOREIGN KEY (`ReservationNum`) REFERENCES `Reservation` (`ReservationNum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ReservationInvoice_ibfk_2` FOREIGN KEY (`InvoiceID`) REFERENCES `Invoice` (`InvoiceID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ReservationRoom`
--
ALTER TABLE `ReservationRoom`
  ADD CONSTRAINT `ReservationRoom_ibfk_1` FOREIGN KEY (`ReservationNum`) REFERENCES `Reservation` (`ReservationNum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ReservationRoom_ibfk_2` FOREIGN KEY (`RoomNum`) REFERENCES `RoomBranchCapacity` (`RoomNum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ReservationRoom_ibfk_3` FOREIGN KEY (`BranchName`) REFERENCES `Branch` (`BranchName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `RoomBranchCapacity`
--
ALTER TABLE `RoomBranchCapacity`
  ADD CONSTRAINT `RoomBranchCapacity_ibfk_1` FOREIGN KEY (`BranchName`) REFERENCES `Branch` (`BranchName`) ON DELETE CASCADE;

--
-- Constraints for table `RoomBranchPrice`
--
ALTER TABLE `RoomBranchPrice`
  ADD CONSTRAINT `RoomBranchPrice_ibfk_1` FOREIGN KEY (`BranchName`) REFERENCES `Branch` (`BranchName`) ON DELETE CASCADE;

--
-- Constraints for table `RoomBranchType`
--
ALTER TABLE `RoomBranchType`
  ADD CONSTRAINT `RoomBranchType_ibfk_1` FOREIGN KEY (`BranchName`) REFERENCES `Branch` (`BranchName`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
