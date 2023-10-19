-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2022 at 09:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlclassroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Aid` varchar(35) NOT NULL,
  `Apass` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Aid`, `Apass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `examans`
--

CREATE TABLE `examans` (
  `EAnsID` int(50) NOT NULL,
  `ExamID` int(10) NOT NULL,
  `Senrl` varchar(50) NOT NULL,
  `Sname` varchar(50) NOT NULL,
  `Ans1` mediumtext NOT NULL,
  `Ans2` mediumtext NOT NULL,
  `Ans3` mediumtext NOT NULL,
  `Ans4` mediumtext NOT NULL,
  `Ans5` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examans`
--

-- --------------------------------------------------------

--
-- Table structure for table `examdetails`
--

CREATE TABLE `examdetails` (
  `ExamID` int(50) NOT NULL,
  `ExamName` varchar(50) NOT NULL,
  `Q1` varchar(10000) NOT NULL,
  `Q2` varchar(10000) NOT NULL,
  `Q3` varchar(10000) NOT NULL,
  `Q4` varchar(10000) NOT NULL,
  `Q5` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examdetails`
--

-- --------------------------------------------------------

--
-- Table structure for table `facutlytable`
--

CREATE TABLE `facutlytable` (
  `FID` int(10) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `FaName` varchar(30) NOT NULL,
  `Addrs` text NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `JDate` date NOT NULL,
  `City` varchar(10) NOT NULL,
  `Pass` varchar(10) NOT NULL,
  `PhNo` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facutlytable`
--


-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `GuEid` varchar(35) NOT NULL,
  `Gname` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--


-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `Query` text NOT NULL,
  `Ans` text NOT NULL,
  `Eid` varchar(35) NOT NULL,
  `Qid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `query`
--


-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `RsID` bigint(20) NOT NULL,
  `Eno` varchar(20) NOT NULL,
  `Ex_ID` int(10) NOT NULL,
  `Marks` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--


-- --------------------------------------------------------

--
-- Table structure for table `studenttable`
--

CREATE TABLE `studenttable` (
  `Eno` bigint(20) NOT NULL,
  `FName` varchar(30) NOT NULL,
  `LName` varchar(30) NOT NULL,
  `FaName` varchar(30) NOT NULL,
  `Addrs` text NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Course` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `PhNo` bigint(10) NOT NULL,
  `Pass` varchar(20) NOT NULL,
  `Eid` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studenttable`
--


-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--


-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `V_id` int(10) NOT NULL,
  `V_Title` varchar(50) NOT NULL,
  `V_Url` longtext NOT NULL,
  `V_Remarks` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table is used to store videos info.';

--
-- Dumping data for table `video`
--
--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Aid`);

--
-- Indexes for table `examans`
--
ALTER TABLE `examans`
  ADD PRIMARY KEY (`EAnsID`);

--
-- Indexes for table `examdetails`
--
ALTER TABLE `examdetails`
  ADD PRIMARY KEY (`ExamID`),
  ADD UNIQUE KEY `ExamName` (`ExamName`);

--
-- Indexes for table `facutlytable`
--
ALTER TABLE `facutlytable`
  ADD PRIMARY KEY (`FID`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`Gname`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`Qid`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`RsID`);

--
-- Indexes for table `studenttable`
--
ALTER TABLE `studenttable`
  ADD PRIMARY KEY (`Eno`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`V_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `examans`
--
ALTER TABLE `examans`
  MODIFY `EAnsID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `examdetails`
--
ALTER TABLE `examdetails`
  MODIFY `ExamID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `facutlytable`
--
ALTER TABLE `facutlytable`
  MODIFY `FID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `Qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `RsID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2394;

--
-- AUTO_INCREMENT for table `studenttable`
--
ALTER TABLE `studenttable`
  MODIFY `Eno` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146891705;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `V_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
