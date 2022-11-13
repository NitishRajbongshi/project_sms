-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2022 at 08:32 PM
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
('admin1', 'nitishrajbongshi@gmail.com', '6001020913', 'Admin', '$2y$10$uvJmFEqESBupzs6p/9nbQO9boCXBaPwCafBhq7CIgKCWtqPKQ6pfy');

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
('exYpM1X4', 'CSE01', 'CSM21033', 58, 'title', 'DESCRIPTION', '2022-11-13 18:48:28', '0', '0', 0);

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
('CSE01', 'saratsahariah@gmail.com', '7634256459', 'Sarat', 'Sahariah', 'Computer Science & Engineering', '$2y$10$6zha.f9T/clKANHAZKehz.bOR5bpCwf9T/nKtoxBE2cJdPsFn6twS'),
('CSE02', 'nabajyotimedhi@gmail.com', '3457623489', 'Nabajyoti', 'Medhi', 'Computer Science & Engineering', '$2y$10$6zha.f9T/clKANHAZKehz.bOR5bpCwf9T/nKtoxBE2cJdPsFn6twS'),
('CSE03', 'rcbmail@gmail.com', '3452367890', 'Ramcharan', 'Bashya', 'Computer Science & Engineering', '$2y$10$6zha.f9T/clKANHAZKehz.bOR5bpCwf9T/nKtoxBE2cJdPsFn6twS');

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
('CSM21011', 'arnabbishwas@gmail.com', '7645342890', 'Arnab', 'Bishwas', 2021, 'Computer Science & Engineering', 'MCA', '3rd', '$2y$10$O9Q9s/7rDmeyuvdHUPo9MOarezKOoc/GjO/sHOPG5MeZxfiGggVJu', 'CSE01'),
('CSM21017', 'uddiptogogoi@gmail.com', '7856239022', 'Uddipto', 'Gogoi', 2021, 'Computer Science & Engineering', 'MCA', '3rd', '$2y$10$O9Q9s/7rDmeyuvdHUPo9MOarezKOoc/GjO/sHOPG5MeZxfiGggVJu', 'CSE01'),
('CSM21019', 'manjitbarman@gmail.com', '8735421357', 'Manjit', 'Barman', 2021, 'Computer Science & Engineering', 'MCA', '3rd', '$2y$10$O9Q9s/7rDmeyuvdHUPo9MOarezKOoc/GjO/sHOPG5MeZxfiGggVJu', 'CSE01'),
('CSM21020', 'dhanjittamuli@gmail.com', '3456234789', 'Dhanjit', 'Tamuli', 2021, 'Computer Science & Engineering', 'MCA', '3rd', '$2y$10$O9Q9s/7rDmeyuvdHUPo9MOarezKOoc/GjO/sHOPG5MeZxfiGggVJu', 'CSE02'),
('CSM21033', 'nitishrajbongshi@gmail.com', '6001020913', 'Nitish', 'Rajbongshi', 2021, 'Computer Science & Engineering', 'MCA', '3rd', '$2y$10$O9Q9s/7rDmeyuvdHUPo9MOarezKOoc/GjO/sHOPG5MeZxfiGggVJu', 'CSE01'),
('CSM21043', 'saptarshidas@gmail.com', '7845623456', 'Saptarshi', 'Das', 2021, 'Computer Science & Engineering', 'MCA', '3rd', '$2y$10$O9Q9s/7rDmeyuvdHUPo9MOarezKOoc/GjO/sHOPG5MeZxfiGggVJu', 'CSE02');

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
  MODIFY `meeting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `individual_meeting`
--
ALTER TABLE `individual_meeting`
  MODIFY `individual_meeting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
