-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2020 at 07:13 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `findworker`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `CompanyID` int(5) NOT NULL,
  `password` varchar(8) NOT NULL,
  `Name` text NOT NULL,
  `Address` varchar(100) NOT NULL,
  `ContactNo` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`CompanyID`, `password`, `Name`, `Address`, `ContactNo`) VALUES
(101, '159', 'sannibh', 'adfdg', 9785641230),
(102, '159', 'sannibh', 'adfdg', 9785641230),
(103, '4622132', 'fdg', 'sdfa', 1236547890),
(104, 'sdad', 'sddf', 'asdfdfda', 9874563210),
(105, '123', 'Abhi', 'kfjjdsfh', 3126547896),
(106, '123', 'd2', 'asdf', 1234567890),
(107, '666', 'qwe', 'qwer', 1234456789);

-- --------------------------------------------------------

--
-- Table structure for table `companyworker`
--

CREATE TABLE `companyworker` (
  `CompanyID` bigint(5) NOT NULL,
  `WorkerID` bigint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companyworker`
--

INSERT INTO `companyworker` (`CompanyID`, `WorkerID`) VALUES
(103, 9001),
(103, 9002),
(103, 9003),
(103, 9001),
(103, 9002),
(101, 9001),
(101, 9003),
(101, 9003),
(101, 9001),
(101, 9001),
(101, 9001),
(101, 9001),
(0, 9002),
(0, 9002),
(0, 9001),
(0, 9001),
(101, 9001),
(101, 9001),
(101, 9002),
(101, 9002),
(101, 9003),
(101, 9003),
(102, 9001),
(102, 9001),
(102, 9002),
(102, 9002),
(102, 9003),
(102, 9003),
(101, 9001),
(101, 9001),
(103, 9001),
(103, 9001),
(0, 9001),
(0, 9001),
(103, 9003),
(103, 9003),
(101, 9002),
(101, 9002),
(105, 9004),
(105, 9004),
(101, 9001);

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `WorkerID` int(5) NOT NULL,
  `Name` text NOT NULL,
  `Gender` text NOT NULL,
  `Age` int(3) NOT NULL,
  `WorkerType` text NOT NULL,
  `StreetAdd` varchar(150) NOT NULL,
  `City` text NOT NULL,
  `ContactNo` bigint(10) NOT NULL,
  `Password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`WorkerID`, `Name`, `Gender`, `Age`, `WorkerType`, `StreetAdd`, `City`, `ContactNo`, `Password`) VALUES
(9001, 'dixit', 'Male', 19, 'Farmer', 'sdfsdgfg', 'Rajkot', 9784561235, '123'),
(9002, 'ytry', 'male', 20, 'tailot', 'dfdfh', 'Anand', 3124567896, '123'),
(9003, 'jay', 'Male', 25, 'Farmer', 'fdgfdg', 'Surat', 3214569875, '456'),
(9004, 'Kanani Jay', 'Male', 18, 'Securityguard', 'jamanagar ', 'Jamnagar', 9712311653, '123'),
(9005, 'fsdfas', 'Male', 23, 'Clothier', '3rdfasdfd', 'Vapi', 9784561230, '234'),
(9006, 'rrr', 'Male', 19, 'Barber', '23', 'Anand', 3245678900, '111');

-- --------------------------------------------------------

--
-- Table structure for table `workertype`
--

CREATE TABLE `workertype` (
  `WorkerID` int(5) NOT NULL,
  `Mason` char(1) DEFAULT 'N',
  `Carpenter` char(1) DEFAULT 'N',
  `BlackSmith` char(1) DEFAULT 'N',
  `Tailor` char(1) DEFAULT 'N',
  `Barber` char(1) DEFAULT 'N',
  `Cleaner` char(1) DEFAULT 'N',
  `Farmer` char(1) DEFAULT 'N',
  `Painter` char(1) DEFAULT 'N',
  `Shoesmaker` char(1) DEFAULT 'N',
  `Clothier` char(1) DEFAULT 'N',
  `Salesman` char(1) DEFAULT 'N',
  `Accountant` char(1) DEFAULT 'N',
  `Securityguard` char(1) DEFAULT 'N',
  `Other` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workertype`
--

INSERT INTO `workertype` (`WorkerID`, `Mason`, `Carpenter`, `BlackSmith`, `Tailor`, `Barber`, `Cleaner`, `Farmer`, `Painter`, `Shoesmaker`, `Clothier`, `Salesman`, `Accountant`, `Securityguard`, `Other`) VALUES
(0, 'N', 'N', 'N', 'N', 'N', 'N', NULL, 'N', 'N', 'N', 'N', 'N', 'N', NULL),
(9001, 'Y', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', NULL),
(9002, 'Y', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', NULL),
(9003, 'N', 'Y', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', NULL),
(9004, 'N', 'N', 'Y', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', NULL),
(9005, 'N', 'N', 'Y', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', NULL),
(9006, 'N', 'N', 'N', 'N', 'Y', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', NULL),
(9007, 'N', 'N', 'N', 'Y', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', NULL),
(9008, 'Y', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', NULL),
(9009, 'N', 'N', 'N', 'N', 'N', 'N', 'Y', 'N', 'N', 'N', 'N', 'N', 'N', NULL),
(9010, 'N', 'N', 'N', 'N', 'N', 'N', 'Y', 'N', 'N', 'N', 'N', 'N', 'N', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`CompanyID`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`WorkerID`);

--
-- Indexes for table `workertype`
--
ALTER TABLE `workertype`
  ADD PRIMARY KEY (`WorkerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
