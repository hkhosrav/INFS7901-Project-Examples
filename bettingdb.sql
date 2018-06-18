-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2018 at 02:06 AM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bettingdb`
--
CREATE DATABASE IF NOT EXISTS `bettingdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bettingdb`;

-- --------------------------------------------------------

--
-- Table structure for table `Bet_Odds`
--

DROP TABLE IF EXISTS `Bet_Odds`;
CREATE TABLE `Bet_Odds` (
  `Bet_Selection` varchar(50) NOT NULL,
  `Bet_Time` datetime NOT NULL,
  `Event_ID` varchar(10) NOT NULL,
  `Market_Type` varchar(50) NOT NULL,
  `Bet_Odds` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Bet_Odds`
--

INSERT INTO `Bet_Odds` (`Bet_Selection`, `Bet_Time`, `Event_ID`, `Market_Type`, `Bet_Odds`) VALUES
('Broncos', '2000-09-24 08:05:05', '1', 'Win', '2.05'),
('Darren Lockyer', '2000-09-24 08:06:05', '1', 'First Try Scorer', '10.50'),
('Jen Jonstone', '2017-04-24 08:05:05', '16', 'Win', '5.50'),
('Liberal', '2000-08-15 11:00:00', '6', 'Win', '1.75'),
('Winx', '2000-10-15 11:00:00', '15', 'Place', '1.01');

-- --------------------------------------------------------

--
-- Table structure for table `Bet_Placed`
--

DROP TABLE IF EXISTS `Bet_Placed`;
CREATE TABLE `Bet_Placed` (
  `Bet_ID` varchar(12) NOT NULL,
  `User_ID` varchar(8) NOT NULL,
  `Bet_Selection` varchar(50) NOT NULL,
  `Bet_Time` datetime NOT NULL,
  `Event_ID` varchar(10) NOT NULL,
  `Market_Type` varchar(50) NOT NULL,
  `Bet_Amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Bet_Placed`
--

INSERT INTO `Bet_Placed` (`Bet_ID`, `User_ID`, `Bet_Selection`, `Bet_Time`, `Event_ID`, `Market_Type`, `Bet_Amount`) VALUES
('1', '1', 'Broncos', '2000-09-24 08:05:05', '1', 'Win', '100.50'),
('2', '1', 'Darren Lockyer', '2000-09-24 08:06:05', '1', 'First Try Scorer', '25.00'),
('3', '2', 'Broncos', '2000-09-24 08:05:05', '1', 'Win', '25.00'),
('4', '2', 'Jen Jonstone', '2017-04-24 08:05:05', '16', 'Win', '5.00'),
('5', '3', 'Winx', '2000-10-15 11:00:00', '15', 'Place', '10000.00'),
('6', '4', 'Liberal', '2000-08-15 11:00:00', '6', 'Win', '225.00');

-- --------------------------------------------------------

--
-- Table structure for table `Election`
--

DROP TABLE IF EXISTS `Election`;
CREATE TABLE `Election` (
  `Event_ID` varchar(10) NOT NULL,
  `Classification` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Election`
--

INSERT INTO `Election` (`Event_ID`, `Classification`) VALUES
('10', 'State'),
('6', 'Federal'),
('7', 'State'),
('8', 'State'),
('9', 'State');

-- --------------------------------------------------------

--
-- Table structure for table `Event_t`
--

DROP TABLE IF EXISTS `Event_t`;
CREATE TABLE `Event_t` (
  `Event_ID` varchar(10) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Country` varchar(3) NOT NULL,
  `Event_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Event_t`
--

INSERT INTO `Event_t` (`Event_ID`, `Description`, `Country`, `Event_Date`) VALUES
('1', 'NRL GRAND FINAL', 'AUS', '2000-09-24'),
('10', '2000 VIC State Election', 'AUS', '2000-10-15'),
('11', 'Flemington 24/9/2000', 'AUS', '2000-09-24'),
('12', 'Doomben 12/9/2000', 'AUS', '2000-09-12'),
('13', 'Flemington 15/10/2000', 'AUS', '2000-10-15'),
('14', 'Royal Ascot 15/10/2000', 'ENG', '2000-10-15'),
('15', 'Mooney Valley 15/10/2000', 'AUS', '2000-10-15'),
('16', 'The Bachelor 2017', 'AUS', '2017-04-06'),
('2', 'AFL GRAND FINAL', 'AUS', '2000-09-12'),
('3', 'SUPER LEAGUE GRAND FINAL', 'ENG', '2010-10-15'),
('4', 'NRL ROUND 1 - Broncos vs. Storm', 'AUS', '2012-10-15'),
('5', 'Soccer International Aus vs. Eng', 'AUS', '2013-10-15'),
('6', '2000 Federal Election', 'AUS', '2000-09-24'),
('7', '2000 QLD State Election', 'AUS', '2000-09-12'),
('8', '2000 NSW State Election', 'AUS', '2000-10-15'),
('9', '2000 SA State Election', 'AUS', '2000-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `Has_Market`
--

DROP TABLE IF EXISTS `Has_Market`;
CREATE TABLE `Has_Market` (
  `Event_ID` varchar(10) NOT NULL,
  `Market_Type` varchar(50) NOT NULL,
  `Market_Status` char(1) NOT NULL,
  `Market_Result` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Has_Market`
--

INSERT INTO `Has_Market` (`Event_ID`, `Market_Type`, `Market_Status`, `Market_Result`) VALUES
('1', 'First Try Scorer', 'C', 'Darren Lockyer'),
('1', 'Win', 'C', 'Broncos'),
('15', 'Place', 'O', NULL),
('16', 'Win', 'C', 'Sarah Jacobs'),
('6', 'Win', 'C', 'Liberal');

-- --------------------------------------------------------

--
-- Table structure for table `Horse_Racing`
--

DROP TABLE IF EXISTS `Horse_Racing`;
CREATE TABLE `Horse_Racing` (
  `Event_ID` varchar(10) NOT NULL,
  `Racecourse` varchar(50) NOT NULL,
  `Race_Number` int(11) NOT NULL,
  `Grade` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Horse_Racing`
--

INSERT INTO `Horse_Racing` (`Event_ID`, `Racecourse`, `Race_Number`, `Grade`) VALUES
('11', 'Flemington', 1, 'Benchmark 64'),
('12', 'Doomben', 10, 'Benchmark 68'),
('13', 'Flemington', 8, 'Class 1'),
('14', 'Royal Ascot', 2, 'Maiden'),
('15', 'Mooney Valley', 3, 'Open Handicap');

-- --------------------------------------------------------

--
-- Table structure for table `Sport`
--

DROP TABLE IF EXISTS `Sport`;
CREATE TABLE `Sport` (
  `Event_ID` varchar(10) NOT NULL,
  `Home_Team` varchar(50) NOT NULL,
  `Away_Team` varchar(50) NOT NULL,
  `League` varchar(50) NOT NULL,
  `Stadium` varchar(50) NOT NULL,
  `Round_Number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Sport`
--

INSERT INTO `Sport` (`Event_ID`, `Home_Team`, `Away_Team`, `League`, `Stadium`, `Round_Number`) VALUES
('1', 'Broncos', 'Storm', 'NRL', 'ANZ Stadium', 27),
('2', 'Lions', 'Hawks', 'AFL', 'Melbourne Cricket Ground', 27),
('3', 'United', 'Storm', 'NRL', 'London Town', 20),
('4', 'Broncos', 'Storm', 'NRL', 'Suncorp Stadium', 1),
('5', 'Australia', 'Englang', 'Soccer', 'ANZ Stadium', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Transactions`
--

DROP TABLE IF EXISTS `Transactions`;
CREATE TABLE `Transactions` (
  `Trans_ID` int(11) NOT NULL,
  `Trans_Amount` decimal(10,2) NOT NULL,
  `Trans_Date` date NOT NULL,
  `Trans_Type` char(1) NOT NULL,
  `Account_Number` char(14) NOT NULL,
  `User_ID` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Transactions`
--

INSERT INTO `Transactions` (`Trans_ID`, `Trans_Amount`, `Trans_Date`, `Trans_Type`, `Account_Number`, `User_ID`) VALUES
(1, '100.50', '1994-01-01', 'D', '12345677874564', '1'),
(2, '300.50', '2000-01-01', 'W', '12345677874564', '1'),
(3, '1000.50', '2018-02-26', 'D', '12342168745489', '4'),
(4, '10.50', '2016-04-01', 'W', '12345677342342', '5'),
(5, '250.00', '1994-01-01', 'D', '12345677874564', '2');

--
-- Triggers `Transactions`
--
DROP TRIGGER IF EXISTS `update_balance_deposit`;
DELIMITER $$
CREATE TRIGGER `update_balance_deposit` BEFORE INSERT ON `Transactions` FOR EACH ROW UPDATE Users 
SET Users.Account_Balance = Users.Account_Balance + NEW.Trans_Amount WHERE Users.User_ID =  NEW.User_ID AND NEW.Trans_Type = "D"
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `update_balance_withdrawal`;
DELIMITER $$
CREATE TRIGGER `update_balance_withdrawal` BEFORE INSERT ON `Transactions` FOR EACH ROW UPDATE Users 
SET Users.Account_Balance = Users.Account_Balance - NEW.Trans_Amount WHERE Users.User_ID =  NEW.User_ID AND NEW.Trans_Type = "W"
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
  `User_ID` varchar(8) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `First_Name` varchar(25) NOT NULL,
  `Last_Name` varchar(25) NOT NULL,
  `Date_Of_Birth` date NOT NULL,
  `Account_Balance` decimal(10,2) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Home_State` varchar(3) NOT NULL,
  `Email_Address` varchar(50) NOT NULL,
  `Date_Joined` date NOT NULL,
  `Gender` enum('M','F','O') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`User_ID`, `Username`, `First_Name`, `Last_Name`, `Date_Of_Birth`, `Account_Balance`, `Password`, `Home_State`, `Email_Address`, `Date_Joined`, `Gender`) VALUES
('1', 'jsmith', 'John', 'Smith', '1994-01-01', '100.50', 'footy123', 'QLD', 'jsmith@hotmail.com', '2010-01-01', 'M'),
('2', 'ts', 'Taylor', 'Swift', '1975-01-10', '0.50', 'taytay3', 'VIC', 'tswizzle@gmail.com', '2000-01-01', 'F'),
('3', 'frankyboi', 'Frank', 'Richards', '1992-01-01', '25.50', 'footy123', 'QLD', 'frank.r@hotmail.com', '2017-08-21', 'M'),
('4', 'johnsmith', 'John', 'Smith', '1994-01-01', '700.50', 'surfing123', 'NSW', 'john.smith@hotmail.com', '2018-01-12', 'M'),
('5', 'esmith', 'Emma', 'Smith', '2000-01-01', '1000.50', 'emmascool123', 'VIC', 'esmith@hotmail.com', '2018-02-01', 'F');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Bet_Odds`
--
ALTER TABLE `Bet_Odds`
  ADD PRIMARY KEY (`Bet_Selection`,`Bet_Time`,`Event_ID`,`Market_Type`),
  ADD KEY `Event_ID` (`Event_ID`,`Market_Type`);

--
-- Indexes for table `Bet_Placed`
--
ALTER TABLE `Bet_Placed`
  ADD PRIMARY KEY (`Bet_ID`),
  ADD KEY `Bet_Selection` (`Bet_Selection`,`Bet_Time`,`Event_ID`,`Market_Type`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `Election`
--
ALTER TABLE `Election`
  ADD PRIMARY KEY (`Event_ID`);

--
-- Indexes for table `Event_t`
--
ALTER TABLE `Event_t`
  ADD PRIMARY KEY (`Event_ID`);

--
-- Indexes for table `Has_Market`
--
ALTER TABLE `Has_Market`
  ADD PRIMARY KEY (`Event_ID`,`Market_Type`);

--
-- Indexes for table `Horse_Racing`
--
ALTER TABLE `Horse_Racing`
  ADD PRIMARY KEY (`Event_ID`);

--
-- Indexes for table `Sport`
--
ALTER TABLE `Sport`
  ADD PRIMARY KEY (`Event_ID`);

--
-- Indexes for table `Transactions`
--
ALTER TABLE `Transactions`
  ADD PRIMARY KEY (`Trans_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email_Address` (`Email_Address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Transactions`
--
ALTER TABLE `Transactions`
  MODIFY `Trans_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Bet_Odds`
--
ALTER TABLE `Bet_Odds`
  ADD CONSTRAINT `Bet_Odds_ibfk_1` FOREIGN KEY (`Event_ID`,`Market_Type`) REFERENCES `Has_Market` (`Event_ID`, `Market_Type`) ON DELETE CASCADE;

--
-- Constraints for table `Bet_Placed`
--
ALTER TABLE `Bet_Placed`
  ADD CONSTRAINT `Bet_Placed_ibfk_1` FOREIGN KEY (`Bet_Selection`,`Bet_Time`,`Event_ID`,`Market_Type`) REFERENCES `Bet_Odds` (`Bet_Selection`, `Bet_Time`, `Event_ID`, `Market_Type`),
  ADD CONSTRAINT `Bet_Placed_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `Users` (`User_ID`);

--
-- Constraints for table `Election`
--
ALTER TABLE `Election`
  ADD CONSTRAINT `Election_ibfk_1` FOREIGN KEY (`Event_ID`) REFERENCES `Event_t` (`Event_ID`) ON DELETE CASCADE;

--
-- Constraints for table `Has_Market`
--
ALTER TABLE `Has_Market`
  ADD CONSTRAINT `Has_Market_ibfk_1` FOREIGN KEY (`Event_ID`) REFERENCES `Event_t` (`Event_ID`) ON DELETE CASCADE;

--
-- Constraints for table `Horse_Racing`
--
ALTER TABLE `Horse_Racing`
  ADD CONSTRAINT `Horse_Racing_ibfk_1` FOREIGN KEY (`Event_ID`) REFERENCES `Event_t` (`Event_ID`) ON DELETE CASCADE;

--
-- Constraints for table `Sport`
--
ALTER TABLE `Sport`
  ADD CONSTRAINT `Sport_ibfk_1` FOREIGN KEY (`Event_ID`) REFERENCES `Event_t` (`Event_ID`) ON DELETE CASCADE;

--
-- Constraints for table `Transactions`
--
ALTER TABLE `Transactions`
  ADD CONSTRAINT `Transactions_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `Users` (`User_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
