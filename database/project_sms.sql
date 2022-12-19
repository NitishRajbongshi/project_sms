-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 12:23 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` char(6) NOT NULL,
  `admin_email` varchar(90) NOT NULL,
  `admin_phone` char(10) NOT NULL,
  `admin_name` varchar(35) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `admin_email`, `admin_phone`, `admin_name`, `admin_password`) VALUES
('admin1', 'nitishrajbongshi@gmail.com', '6001020913', 'Admin', '$2y$10$DU624gJkOvC/9CpD9FpHKOvSP4A1rPXIow3v5xnzfdlcLCdTANzp2');

-- --------------------------------------------------------

--
-- Table structure for table `group_meeting`
--

CREATE TABLE `group_meeting` (
  `meeting_code` varchar(8) NOT NULL,
  `mentor_id` char(6) NOT NULL,
  `rollno` char(8) NOT NULL,
  `meeting_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `student_remarks` varchar(100) DEFAULT NULL,
  `mentor_remarks` varchar(100) DEFAULT NULL,
  `mark_read` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_meeting`
--

INSERT INTO `group_meeting` (`meeting_code`, `mentor_id`, `rollno`, `meeting_id`, `title`, `description`, `date_time`, `student_remarks`, `mentor_remarks`, `mark_read`) VALUES
('exYpM1X4', 'CSE01', 'CSM21011', 55, 'title', 'DESCRIPTION', '2022-11-13 18:48:28', '0', '0', 0),
('exYpM1X4', 'CSE01', 'CSM21017', 56, 'title', 'DESCRIPTION', '2022-11-13 18:48:28', '0', '0', 0),
('exYpM1X4', 'CSE01', 'CSM21019', 57, 'title', 'DESCRIPTION', '2022-11-13 18:48:45', '0', '0', 1),
('exYpM1X4', 'CSE01', 'CSM21033', 58, 'title', 'DESCRIPTION', '2022-11-14 05:18:51', '0', '0', 1),
('KiNLuBmT', 'CSE01', 'CSM21011', 59, 'Hello', 'This is a general meeting for all the students associated with me. Meet me today at 12.30 pm.', '2022-11-14 05:25:24', '0', '0', 0),
('KiNLuBmT', 'CSE01', 'CSM21017', 60, 'Hello', 'This is a general meeting for all the students associated with me. Meet me today at 12.30 pm.', '2022-11-14 05:25:24', '0', '0', 0),
('KiNLuBmT', 'CSE01', 'CSM21019', 61, 'Hello', 'This is a general meeting for all the students associated with me. Meet me today at 12.30 pm.', '2022-11-28 05:55:37', '0', '0', 1),
('KiNLuBmT', 'CSE01', 'CSM21033', 62, 'Hello', 'This is a general meeting for all the students associated with me. Meet me today at 12.30 pm.', '2022-11-14 05:27:55', '0', '0', 1),
('NXxnHBRb', 'CSE01', 'CSM21011', 63, 'fdfdfss', 'fsdfsdfs', '2022-11-14 05:28:11', '0', '0', 0),
('NXxnHBRb', 'CSE01', 'CSM21017', 64, 'fdfdfss', 'fsdfsdfs', '2022-11-14 05:28:11', '0', '0', 0),
('NXxnHBRb', 'CSE01', 'CSM21019', 65, 'fdfdfss', 'fsdfsdfs', '2022-11-28 05:55:34', '0', '0', 1),
('NXxnHBRb', 'CSE01', 'CSM21033', 66, 'fdfdfss', 'fsdfsdfs', '2022-11-14 05:28:39', '0', '0', 1),
('OtDGSw7m', 'CSE01', 'CSM21011', 67, 'title', 'desccc', '2022-11-18 06:40:08', '0', '0', 0),
('OtDGSw7m', 'CSE01', 'CSM21017', 68, 'title', 'desccc', '2022-11-18 06:40:08', '0', '0', 0),
('OtDGSw7m', 'CSE01', 'CSM21019', 69, 'title', 'desccc', '2022-11-28 05:55:31', '0', '0', 1),
('eUs02LG3', 'CSE01', 'CSM21011', 70, 'It is a title', 'This is a description', '2022-11-28 05:53:25', '0', '0', 0),
('eUs02LG3', 'CSE01', 'CSM21017', 71, 'It is a title', 'This is a description', '2022-11-28 05:53:25', '0', '0', 0),
('eUs02LG3', 'CSE01', 'CSM21019', 72, 'It is a title', 'This is a description', '2022-11-28 05:55:28', '0', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `individual_meeting`
--

CREATE TABLE `individual_meeting` (
  `mentor_id` char(6) NOT NULL,
  `rollno` char(8) NOT NULL,
  `individual_meeting_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `student_remarks` varchar(100) DEFAULT NULL,
  `mentor_remarks` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

CREATE TABLE `mentor` (
  `mentor_id` char(6) NOT NULL,
  `mentor_email` varchar(90) NOT NULL,
  `mentor_phone` char(10) NOT NULL,
  `mentor_firstname` varchar(35) NOT NULL,
  `mentor_lastname` varchar(35) NOT NULL,
  `mentor_department` varchar(100) NOT NULL,
  `mentor_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mentor`
--

INSERT INTO `mentor` (`mentor_id`, `mentor_email`, `mentor_phone`, `mentor_firstname`, `mentor_lastname`, `mentor_department`, `mentor_password`) VALUES
('CSE01', 'saratsahariah@gmail.com', '7634256459', 'Sarat', 'Sahariah', 'Computer Science & Engineering', '$2y$10$eWWkqd8iy/Qr30hOlf6/Du7Fa75eG9EN8f4kGpVs6/7NyCP832Vsu'),
('CSE02', 'nabajyotimedhi@gmail.com', '3457623489', 'Nabajyoti', 'Medhi', 'Computer Science & Engineering', '$2y$10$eWWkqd8iy/Qr30hOlf6/Du7Fa75eG9EN8f4kGpVs6/7NyCP832Vsu'),
('CSE03', 'rcbmail@gmail.com', '3452367890', 'Ramcharan', 'Bashya', 'Computer Science & Engineering', '$2y$10$eWWkqd8iy/Qr30hOlf6/Du7Fa75eG9EN8f4kGpVs6/7NyCP832Vsu');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `rollno` char(8) NOT NULL,
  `mentor_id` char(6) NOT NULL,
  `title` char(200) NOT NULL,
  `pdf` varchar(300) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `flag` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `rollno`, `mentor_id`, `title`, `pdf`, `date_time`, `flag`) VALUES
(22, 'CSM21019', 'CSE02', 'Project Report', 'pdf-63a04485052f57.03868611.pdf', '2022-12-19 11:01:25', 0),
(23, 'CSM21019', 'CSE02', 'Printing file', 'pdf-63a044ce707b11.47143533.pdf', '2022-12-19 11:03:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `rollno` char(8) NOT NULL,
  `student_email` varchar(80) NOT NULL,
  `student_phone` char(10) NOT NULL,
  `student_firstname` varchar(35) NOT NULL,
  `student_lastname` varchar(35) NOT NULL,
  `academic_year` int(4) NOT NULL,
  `student_depertment` varchar(100) NOT NULL,
  `student_program` varchar(100) NOT NULL,
  `student_semester` varchar(20) NOT NULL,
  `student_password` varchar(255) NOT NULL,
  `assign_mentor` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`rollno`, `student_email`, `student_phone`, `student_firstname`, `student_lastname`, `academic_year`, `student_depertment`, `student_program`, `student_semester`, `student_password`, `assign_mentor`) VALUES
('CSM21011', 'arnabbishwas@gmail.com', '7645342890', 'Arnab', 'Bishwas', 2021, 'Computer Science & Engineering', 'MCA', '3rd', '$2y$10$Dlj08D9iPmoVR/UrmjGz/uyYb.B/vGkfARebQCb/8GkwX88/6/RTa', 'CSE01'),
('CSM21017', 'uddiptogogoi@gmail.com', '7856239022', 'Uddipto', 'Gogoi', 2021, 'Computer Science & Engineering', 'MCA', '3rd', '$2y$10$Dlj08D9iPmoVR/UrmjGz/uyYb.B/vGkfARebQCb/8GkwX88/6/RTa', 'CSE01'),
('CSM21019', 'manjitbarman@gmail.com', '8735421357', 'Manjit', 'Barman', 2021, 'Computer Science & Engineering', 'MCA', '3rd', '$2y$10$Dlj08D9iPmoVR/UrmjGz/uyYb.B/vGkfARebQCb/8GkwX88/6/RTa', 'CSE02'),
('CSM21020', 'dhanjittamuli@gmail.com', '3456234789', 'Dhanjit', 'Tamuli', 2021, 'Computer Science & Engineering', 'MCA', '3rd', '$2y$10$Dlj08D9iPmoVR/UrmjGz/uyYb.B/vGkfARebQCb/8GkwX88/6/RTa', 'CSE02'),
('CSM21033', 'nitishrajbongshi@gmail.com', '6001020913', 'Nitish', 'Rajbongshi', 2021, 'Computer Science & Engineering', 'MCA', '3rd', '$2y$10$NHK2pJhOaoVfJcfpHRahU.WDdPlGylx85n1C9o77bUam86aETeoTC', 'CSE03'),
('CSM21043', 'saptarshidas@gmail.com', '7845623456', 'Saptarshi', 'Das', 2021, 'Computer Science & Engineering', 'MCA', '3rd', '$2y$10$Dlj08D9iPmoVR/UrmjGz/uyYb.B/vGkfARebQCb/8GkwX88/6/RTa', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`),
  ADD UNIQUE KEY `admin_phone` (`admin_phone`);

--
-- Indexes for table `group_meeting`
--
ALTER TABLE `group_meeting`
  ADD PRIMARY KEY (`meeting_id`,`rollno`,`mentor_id`);

--
-- Indexes for table `individual_meeting`
--
ALTER TABLE `individual_meeting`
  ADD PRIMARY KEY (`mentor_id`,`rollno`),
  ADD UNIQUE KEY `individual_meeting_id` (`individual_meeting_id`);

--
-- Indexes for table `mentor`
--
ALTER TABLE `mentor`
  ADD PRIMARY KEY (`mentor_id`),
  ADD UNIQUE KEY `mentor_email` (`mentor_email`),
  ADD UNIQUE KEY `mentor_phone` (`mentor_phone`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`,`rollno`,`mentor_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`rollno`),
  ADD UNIQUE KEY `student_email` (`student_email`),
  ADD UNIQUE KEY `student_phone` (`student_phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `group_meeting`
--
ALTER TABLE `group_meeting`
  MODIFY `meeting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `individual_meeting`
--
ALTER TABLE `individual_meeting`
  MODIFY `individual_meeting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
