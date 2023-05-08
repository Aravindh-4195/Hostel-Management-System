-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 04, 2023 at 04:41 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `employeeid` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`employeeid`, `password`) VALUES
('Admin', 'Admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `AnnounceNo` int(100) NOT NULL,
  `AnnounceDate` date DEFAULT current_timestamp(),
  `AnnounceTime` time(6) NOT NULL DEFAULT current_timestamp(),
  `Title` varchar(100) NOT NULL,
  `Announcement` varchar(1000) NOT NULL,
  `lastDate` date NOT NULL,
  `attachment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`AnnounceNo`, `AnnounceDate`, `AnnounceTime`, `Title`, `Announcement`, `lastDate`, `attachment`) VALUES
(29, '2023-05-04', '00:08:00.000000', 'ABOUT VACATION', 'students should vacate before 6th of this month', '2023-05-10', 'Hostel Vacation Report.pdf'),
(30, '2023-05-04', '00:09:30.000000', 'New Procedure for non-local', 'nothing', '2023-05-10', 'Non-local outing secuurity.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE `block` (
  `blockno` varchar(10) NOT NULL,
  `blockName` varchar(100) NOT NULL,
  `gender` text DEFAULT 'male',
  `seater` int(6) DEFAULT NULL,
  `year` varchar(4) DEFAULT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`blockno`, `blockName`, `gender`, `seater`, `year`, `image`) VALUES
('BH01', 'VAMSADHARA', 'male', 4, 'I', 'pranahitha.png'),
('BH02', 'PRANAHITHA', 'male', 2, 'II', 'pranahitha.png'),
('BH03', 'NAGAVALLI', 'male', 2, 'II', 'pranahitha.png'),
('BH04', 'GODAVARI', 'male', 2, 'II', 'pranahitha.png'),
('BH05', 'SABARI', 'male', 2, 'III', 'pranahitha.png'),
('BH06', 'INDRAVATHI', 'male', 2, 'III', 'pranahitha.png'),
('BH07', 'PURNA', 'male', 1, 'IV', 'pranahitha.png'),
('GH01', 'KRISHNAVENI', 'female', 4, 'I', 'pranahitha.png'),
('GH02', 'BHIMA', 'female', 2, 'II', 'pranahitha.png'),
('GH03', 'TUNGABADRA', 'female', 2, 'III', 'pranahitha.png'),
('GH04', 'MUNNARU', 'female', 1, 'IV', 'pranahitha.png');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaintNo` int(6) NOT NULL,
  `regarding` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `complaintFrom` int(10) DEFAULT NULL,
  `complaintTo` varchar(10) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `blockno` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaintNo`, `regarding`, `detail`, `complaintFrom`, `complaintTo`, `date`, `blockno`) VALUES
(12, 'water is not comming in vamsadhara', 'water is not comming in vamsadhara', 9211530, 'admin', '2023-05-03', 'BH01'),
(13, 'water is not comming in pranahitha', 'water is not comming in pranahitha', 9211518, 'caretaker', '2023-05-03', 'BH02'),
(14, 'water is not comming in vamsadhara', 'nothing', 9211530, 'caretaker', '2023-05-04', 'BH01');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(10) NOT NULL,
  `phoneno` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `block` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `name`, `password`, `phoneno`, `email`, `gender`, `block`) VALUES
(1, 'employee ', 'Employee@1', '9100000006', 'employee@gmail.com', 'male', 'BH01'),
(2, 'GEmployee', 'Employee@1', '9100000008', 'Gemployee@gmail.com', 'female', 'GH01');

-- --------------------------------------------------------

--
-- Table structure for table `local_outings`
--

CREATE TABLE `local_outings` (
  `studentid` int(10) NOT NULL,
  `OutTime` time(6) NOT NULL DEFAULT current_timestamp(),
  `InTime` time(6) DEFAULT '00:00:00.000000',
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `local_outings`
--

INSERT INTO `local_outings` (`studentid`, `OutTime`, `InTime`, `Date`, `status`) VALUES
(9211518, '23:57:18.000000', '23:57:29.000000', '2023-05-03', 1),
(9211530, '23:55:19.000000', '23:55:25.000000', '2023-05-03', 1),
(9211530, '23:55:33.000000', '23:55:42.000000', '2023-05-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `non_local`
--

CREATE TABLE `non_local` (
  `Studentid` int(10) NOT NULL,
  `OutTime` time(6) NOT NULL DEFAULT current_timestamp(),
  `OutDate` date NOT NULL DEFAULT current_timestamp(),
  `InTime` time(6) NOT NULL DEFAULT '00:00:00.000000',
  `InDate` date DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `non_local`
--

INSERT INTO `non_local` (`Studentid`, `OutTime`, `OutDate`, `InTime`, `InDate`, `status`) VALUES
(9211518, '23:57:35.000000', '2023-05-03', '23:57:40.000000', '2023-05-03', 1),
(9211530, '00:12:02.000000', '2023-05-04', '00:12:26.000000', '2023-05-04', 1),
(9211530, '00:36:36.000000', '2023-05-04', '00:36:40.000000', '2023-05-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registeredusers`
--

CREATE TABLE `registeredusers` (
  `regno` int(10) NOT NULL,
  `registrationDate` date NOT NULL DEFAULT current_timestamp(),
  `year` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registeredusers`
--

INSERT INTO `registeredusers` (`regno`, `registrationDate`, `year`) VALUES
(9211518, '2023-05-03', 'II'),
(9211530, '2023-05-03', 'I');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomNo` varchar(100) NOT NULL,
  `blockno` varchar(10) NOT NULL,
  `type` varchar(100) NOT NULL,
  `noFilled` int(1) NOT NULL DEFAULT 0,
  `floor` int(2) NOT NULL,
  `blockStatus` varchar(100) NOT NULL DEFAULT 'unblock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomNo`, `blockno`, `type`, `noFilled`, `floor`, `blockStatus`) VALUES
('1', 'BH01', 'NORMAL', 1, 1, 'unblock'),
('1', 'BH01', 'PWD', 0, 2, 'unblock'),
('1', 'BH01', 'PWD', 0, 3, 'unblock'),
('1', 'BH01', 'NORMAL', 0, 4, 'unblock'),
('1', 'BH02', 'PWD', 0, 1, 'unblock'),
('1', 'BH02', 'PWD', 0, 2, 'unblock'),
('1', 'BH02', 'PWD', 0, 3, 'unblock'),
('1', 'BH02', 'NORMAL', 0, 4, 'unblock'),
('1', 'BH03', 'NORMAL', 0, 1, 'unblock'),
('1', 'BH03', 'NORMAL', 0, 2, 'unblock'),
('1', 'BH03', 'NORMAL', 0, 3, 'unblock'),
('1', 'GH01', 'PWD', 0, 1, 'unblock'),
('1', 'GH01', 'NORMAL', 0, 2, 'unblock'),
('1', 'GH01', 'NORMAL', 0, 3, 'unblock'),
('2', 'BH01', 'NORMAL', 0, 1, 'unblock'),
('2', 'BH01', 'NORMAL', 0, 2, 'unblock'),
('2', 'BH01', 'NORMAL', 0, 3, 'unblock'),
('2', 'BH01', 'NORMAL', 0, 4, 'unblock'),
('2', 'BH02', 'NORMAL', 1, 1, 'unblock'),
('2', 'BH02', 'NORMAL', 0, 2, 'unblock'),
('2', 'BH02', 'NORMAL', 0, 3, 'unblock'),
('2', 'BH02', 'NORMAL', 0, 4, 'unblock'),
('2', 'BH03', 'NORMAL', 0, 1, 'unblock'),
('2', 'BH03', 'NORMAL', 0, 2, 'unblock'),
('2', 'BH03', 'NORMAL', 0, 3, 'unblock'),
('2', 'GH01', 'NORMAL', 0, 1, 'unblock'),
('2', 'GH01', 'NORMAL', 0, 2, 'unblock'),
('2', 'GH01', 'NORMAL', 0, 3, 'unblock'),
('3', 'BH01', 'PWD', 0, 1, 'unblock'),
('3', 'BH01', 'NORMAL', 0, 2, 'unblock'),
('3', 'BH01', 'NORMAL', 0, 3, 'unblock'),
('3', 'BH01', 'NORMAL', 0, 4, 'unblock'),
('3', 'BH02', 'NORMAL', 0, 1, 'unblock'),
('3', 'BH02', 'NORMAL', 0, 2, 'unblock'),
('3', 'BH02', 'NORMAL', 0, 3, 'unblock'),
('3', 'BH02', 'NORMAL', 0, 4, 'unblock'),
('3', 'BH03', 'NORMAL', 0, 1, 'unblock'),
('3', 'BH03', 'NORMAL', 0, 2, 'unblock'),
('3', 'BH03', 'NORMAL', 0, 3, 'unblock'),
('3', 'GH01', 'NORMAL', 0, 1, 'unblock'),
('3', 'GH01', 'NORMAL', 0, 2, 'unblock'),
('4', 'BH01', 'NORMAL', 0, 1, 'unblock'),
('4', 'BH01', 'NORMAL', 0, 2, 'unblock'),
('4', 'BH01', 'NORMAL', 0, 3, 'unblock'),
('4', 'BH01', 'NORMAL', 0, 4, 'unblock'),
('4', 'BH02', 'NORMAL', 0, 1, 'unblock'),
('4', 'BH02', 'NORMAL', 0, 2, 'unblock'),
('4', 'BH02', 'NORMAL', 0, 3, 'unblock'),
('4', 'BH02', 'NORMAL', 0, 4, 'unblock'),
('4', 'BH03', 'PWD', 0, 1, 'unblock'),
('4', 'BH03', 'NORMAL', 0, 2, 'unblock'),
('4', 'BH03', 'NORMAL', 0, 3, 'unblock'),
('4', 'GH01', 'NORMAL', 0, 1, 'unblock'),
('4', 'GH01', 'NORMAL', 0, 2, 'unblock'),
('5', 'BH01', 'PWD', 0, 1, 'unblock'),
('5', 'BH01', 'NORMAL', 0, 2, 'unblock'),
('5', 'BH01', 'NORMAL', 0, 3, 'unblock'),
('5', 'BH01', 'NORMAL', 0, 4, 'unblock');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(100) NOT NULL,
  `regno` varchar(9) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneno` varchar(100) NOT NULL,
  `password` varchar(16) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `block` varchar(100) DEFAULT NULL,
  `roomno` int(10) DEFAULT 1,
  `floor` int(100) NOT NULL DEFAULT 0,
  `image` varchar(100) NOT NULL DEFAULT 'no photo uploaded'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `regno`, `email`, `phoneno`, `password`, `gender`, `block`, `roomno`, `floor`, `image`) VALUES
('VENNALA', '9211501', '9211501@student.nitandhra.ac.in', '9100000002', 'Student@123', 'female', 'NULL', 1, 0, 'avatar.jpg'),
('SIRI', '9211502', '9211502@student.nitandhra.ac.in', '9100000003', 'Student@123', 'female', 'NULL', 1, 0, 'avatar.jpg'),
('RESHMA', '9211504', '9211504@student.nitandhra.ac.in', '9100000004', 'Student@123', 'female', 'NULL', 1, 0, 'avatar.jpg'),
('MOUNIKA', '9211505', '9211505@student.nitandhra.ac.in', '9100000005', 'Student@123', 'female', 'NULL', 1, 0, 'avatar.jpg'),
('VINAY SHANKAR', '9211511', '9211511@student.nitandhra.ac.in', '8019836063', 'Student@123', 'male', 'NULL', 1, 0, 'avatar.jpg'),
('MAREEDU ARAVINDH', '9211518', '9211518@student.nitandhra.ac.in', '9392544195', 'Student@123', 'male', 'BH02', 2, 1, 'avatar.jpg'),
('YOGESHWAR', '9211524', '9211524@student.nitandhra.ac.in', '9392544197', 'Student@123', 'male', 'NULL', 1, 0, 'avatar.jpg'),
('PREM SAI', '9211530', '9211530@student.nitandhra.ac.in', '9100000001', 'Student@123', 'male', 'BH01', 1, 1, 'avatar.jpg'),
('PAVAN', '9211542', '9211542@student.nitandhra.ac.in', '9392544194', 'Student@123', 'male', 'NULL', 1, 0, 'avatar.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`employeeid`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`AnnounceNo`);

--
-- Indexes for table `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`blockno`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaintNo`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empid`),
  ADD UNIQUE KEY `phoneno` (`phoneno`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `local_outings`
--
ALTER TABLE `local_outings`
  ADD PRIMARY KEY (`studentid`,`OutTime`,`Date`);

--
-- Indexes for table `non_local`
--
ALTER TABLE `non_local`
  ADD PRIMARY KEY (`Studentid`,`OutTime`,`OutDate`);

--
-- Indexes for table `registeredusers`
--
ALTER TABLE `registeredusers`
  ADD PRIMARY KEY (`regno`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomNo`,`blockno`,`floor`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`regno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `AnnounceNo` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaintNo` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `empid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
