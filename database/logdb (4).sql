-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 01, 2025 at 04:50 PM
-- Server version: 5.7.15-log
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` varchar(50) NOT NULL,
  `password` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `password`) VALUES
('admin', 4321),
('ram', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `cr`
--

CREATE TABLE `cr` (
  `cr_id` int(10) NOT NULL,
  `cr_name` varchar(10) NOT NULL,
  `password` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cr`
--

INSERT INTO `cr` (`cr_id`, `cr_name`, `password`) VALUES
(1, 'satwik', 1234),
(3, 'kudhan', 2345),
(4, 'omkar', 3456),
(5, 'shankar', 4567);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `st_pin` varchar(20) NOT NULL,
  `feedback` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `labs`
--

CREATE TABLE `labs` (
  `Labs` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `start` time(6) NOT NULL,
  `end` time(6) NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `labs`
--

INSERT INTO `labs` (`Labs`, `sem`, `status`, `start`, `end`, `duration`) VALUES
('DBMS', '3-1', 0, '00:00:00.000000', '00:00:00.000000', 5),
('AITT', '3-1', 0, '00:00:00.000000', '00:00:00.000000', 0),
('OPPS', '2-2', 0, '00:00:00.000000', '00:00:00.000000', 0),
('CN', '2-2', 0, '00:00:00.000000', '00:00:00.000000', 0),
('WT', '3-2', 0, '00:00:00.000000', '00:00:00.000000', 0),
('Python', '2-1', 0, '00:00:00.000000', '00:00:00.000000', 0),
('DS', '2-1', 0, '00:00:00.000000', '00:00:00.000000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `date` varchar(20) NOT NULL,
  `time` varchar(10) NOT NULL,
  `lab_name` varchar(20) NOT NULL,
  `st_year` int(10) NOT NULL,
  `st_pin` varchar(20) NOT NULL,
  `st_name` varchar(50) NOT NULL,
  `com_no` int(10) NOT NULL,
  `client_id` varchar(64) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `sem` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`date`, `time`, `lab_name`, `st_year`, `st_pin`, `st_name`, `com_no`, `client_id`, `created_at`, `sem`) VALUES
('28/12/24', '04:31:00', 'AITT', 2022, '22331A0585', 'xyz', 4, '06beb6ee5adf9f680cd62a851f8b19619999e248078e4a8554ea6616e347cf83', '2024-12-28 16:31:00', '3-1');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `st_year` int(10) NOT NULL,
  `st_name` varchar(50) NOT NULL,
  `st_pin` varchar(30) NOT NULL,
  `password` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `st_phone` double NOT NULL,
  `st_status` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`st_year`, `st_name`, `st_pin`, `password`, `gender`, `st_phone`, `st_status`) VALUES
(2022, 'xyz', '22331A0585', 1, 'Female', 999988877, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `cr`
--
ALTER TABLE `cr`
  ADD PRIMARY KEY (`cr_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`st_pin`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
