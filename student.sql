-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2019 at 09:37 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Admin_ID` varchar(200) NOT NULL,
  `auth` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Name`, `Admin_ID`, `auth`) VALUES
(1, 'Shakil Anwar', '172-35-2142', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `sl` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `att_date` varchar(100) NOT NULL,
  `attendance` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`sl`, `class`, `student_id`, `att_date`, `attendance`) VALUES
(1, 6, '172-35-2102', '13/03/2019', 'a'),
(2, 6, '171-35-2062', '13/03/2019', 'p'),
(3, 6, '172-35-2142', '13/03/2019', 'p'),
(4, 6, '172-35-2131', '13/03/2019', 'p'),
(5, 6, '172-35-2102', '14/03/2019', 'p'),
(6, 6, '171-35-2062', '14/03/2019', 'p'),
(7, 6, '172-35-2142', '14/03/2019', 'a'),
(8, 6, '172-35-2131', '14/03/2019', 'p'),
(9, 6, '172-35-2102', '15/03/2019', 'p'),
(10, 6, '171-35-2062', '15/03/2019', 'a'),
(11, 6, '172-35-2142', '15/03/2019', 'p'),
(12, 6, '172-35-2131', '15/03/2019', 'a'),
(13, 6, '172-35-2102', '16/03/2019', 'a'),
(14, 6, '171-35-2062', '16/03/2019', 'p'),
(15, 6, '172-35-2142', '16/03/2019', 'a'),
(16, 6, '172-35-2131', '16/03/2019', 'p');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class`, `class_name`) VALUES
(1, 'One'),
(2, 'Two'),
(3, 'Three'),
(4, 'Four'),
(5, 'Five'),
(6, 'Six'),
(7, 'Seven'),
(8, 'Eight'),
(9, 'Nine'),
(10, 'Ten');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `sl` int(11) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `class` varchar(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `mid_term` float DEFAULT NULL,
  `quiz1` float DEFAULT NULL,
  `quiz2` float DEFAULT NULL,
  `quiz3` float DEFAULT NULL,
  `final` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`sl`, `student_id`, `class`, `subject`, `mid_term`, `quiz1`, `quiz2`, `quiz3`, `final`) VALUES
(44, '172-35-2102', '6', '601', 40, 12, 12, 13, 70),
(45, '171-35-2062', '6', '601', 80, 13, 14, 15, 60),
(46, '172-35-2142', '6', '601', 70, 80, 10, 10, 60),
(47, '172-35-2131', '6', '601', 90, 12, 14, 15, 80),
(48, '172-35-2102', '6', '602', 80, 13, 12, 12, 60),
(49, '171-35-2062', '6', '602', 70, 12, 10, 12, 60),
(50, '172-35-2142', '6', '602', 70, 13, 14, 10, 80),
(51, '172-35-2131', '6', '602', 80, 12, 13, 14, 90),
(52, '172-35-2102', '6', '603', 60, 13, 12, 12, 73),
(53, '171-35-2062', '6', '603', 80, 11, 15, 10, 71),
(54, '172-35-2142', '6', '603', 90, 12, 13, 11, 72),
(55, '172-35-2131', '6', '603', 70, 10, 14, 9, 70),
(56, '172-35-2102', '6', '604', 80, 13, 10, 11, 63),
(57, '171-35-2062', '6', '604', 60, 11, 13, 9, 71),
(58, '172-35-2142', '6', '604', 70, 12, 11, 10, 72),
(59, '172-35-2131', '6', '604', 50, 10, 12, 8, 70),
(60, '172-35-2142', '7', '701', NULL, NULL, NULL, NULL, NULL),
(61, '172-35-2131', '7', '701', NULL, NULL, NULL, NULL, NULL),
(62, '172-35-2102', '7', '701', NULL, NULL, NULL, NULL, NULL),
(63, '171-35-2062', '7', '701', NULL, NULL, NULL, NULL, NULL),
(64, '172-35-2142', '7', '702', NULL, NULL, NULL, NULL, NULL),
(65, '172-35-2131', '7', '702', NULL, NULL, NULL, NULL, NULL),
(66, '172-35-2102', '7', '702', NULL, NULL, NULL, NULL, NULL),
(67, '171-35-2062', '7', '702', NULL, NULL, NULL, NULL, NULL),
(68, '172-35-2142', '6', '605', NULL, NULL, NULL, NULL, NULL),
(69, '172-35-2131', '6', '605', NULL, NULL, NULL, NULL, NULL),
(70, '172-35-2102', '6', '605', NULL, NULL, NULL, NULL, NULL),
(71, '171-35-2062', '6', '605', NULL, NULL, NULL, NULL, NULL),
(72, '172-35-2142', '6', '606', NULL, NULL, NULL, NULL, NULL),
(73, '172-35-2131', '6', '606', NULL, NULL, NULL, NULL, NULL),
(74, '172-35-2102', '6', '606', NULL, NULL, NULL, NULL, NULL),
(75, '171-35-2062', '6', '606', NULL, NULL, NULL, NULL, NULL),
(76, '172-35-2142', '6', '607', NULL, NULL, NULL, NULL, NULL),
(77, '172-35-2131', '6', '607', NULL, NULL, NULL, NULL, NULL),
(78, '172-35-2102', '6', '607', NULL, NULL, NULL, NULL, NULL),
(79, '171-35-2062', '6', '607', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `sl` int(11) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `mark` float NOT NULL,
  `grade` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resultsheet`
--

CREATE TABLE `resultsheet` (
  `sl` int(11) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `total_mark` float NOT NULL,
  `GPA` float NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `class` varchar(11) NOT NULL,
  `student_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `roll`, `class`, `student_id`) VALUES
(7, 1, '6', '172-35-2142'),
(8, 2, '6', '172-35-2131'),
(9, 4, '6', '172-35-2102'),
(10, 3, '6', '171-35-2062');

-- --------------------------------------------------------

--
-- Table structure for table `student_auth`
--

CREATE TABLE `student_auth` (
  `id` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Student_ID` varchar(200) NOT NULL,
  `father` varchar(100) NOT NULL,
  `mother` varchar(100) NOT NULL,
  `Phone` varchar(200) NOT NULL,
  `Nationality` varchar(200) NOT NULL,
  `Birthdate` varchar(200) NOT NULL,
  `auth` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_auth`
--

INSERT INTO `student_auth` (`id`, `Name`, `Student_ID`, `father`, `mother`, `Phone`, `Nationality`, `Birthdate`, `auth`) VALUES
(1, 'Niloy Gazi', '171-35-2062', 'No Need', 'No need', '01738362296', 'Bangladesh', '1998-01-01', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'Shakil Anwar', '172-35-2142', 'No need', 'No need', '01738362296', 'Bangladesh', '1998-09-09', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'Enam Kobir', '172-35-2131', 'No need', 'No need', '01738362296', 'Bangladesh', '1998-09-09', '81dc9bdb52d04dc20036dbd8313ed055'),
(9, 'Dilara Khanom Nitu', '172-35-2102', 'dwfwkcdwhc', 'egergerger', '01738362296', 'weffwfew', 'wefewewfew', 'wfewfewfewf');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` varchar(100) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `full_marks` int(11) NOT NULL,
  `teacher` varchar(100) NOT NULL,
  `class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `full_marks`, `teacher`, `class`) VALUES
('1001', 'Bangla', 100, '172-35-2142', 10),
('1002', 'English', 100, '172-35-2142', 10),
('1003', 'Mathematics', 100, '172-35-2142', 10),
('1004', 'General Science', 100, '172-35-2142', 10),
('1005', 'Social science', 100, '172-35-2142', 10),
('1006', 'Religious', 100, '172-35-2142', 10),
('1007', 'Computer', 100, '172-35-2142', 10),
('101', 'Bangla', 100, '172-35-2142', 1),
('102', 'English', 100, '172-35-2142', 1),
('103', 'Mathematics', 100, '172-35-2142', 1),
('104', 'Social Science', 100, '172-35-2142', 1),
('105', 'General Science', 100, '172-35-2142', 1),
('106', 'Religious', 100, '172-35-2142', 1),
('107', 'Computer', 100, '172-35-2142', 1),
('201', 'Bangla', 100, '172-35-2142', 2),
('202', 'English', 100, '172-35-2142', 2),
('203', 'Mathematics', 100, '172-35-2142', 2),
('204', 'Social Science', 100, '172-35-2142', 2),
('205', 'General Science', 100, '172-35-2142', 2),
('206', 'Religious', 100, '172-35-2142', 2),
('207', 'Computer', 100, '172-35-2142', 2),
('301', 'Bangla', 100, '172-35-2142', 3),
('302', 'English', 100, '172-35-2142', 3),
('303', 'Mathematics', 100, '172-35-2142', 3),
('304', 'General Science', 100, '172-35-2142', 3),
('305', 'Social science', 100, '172-35-2142', 3),
('306', 'Religious', 100, '172-35-2142', 3),
('307', 'Computer', 100, '172-35-2142', 3),
('401', 'Bangla', 100, '172-35-2142', 4),
('402', 'English', 100, '172-35-2142', 4),
('403', 'Mathematics', 100, '172-35-2142', 4),
('404', 'General Science', 100, '172-35-2142', 4),
('405', 'Social science', 100, '172-35-2142', 4),
('406', 'Religious', 100, '172-35-2142', 4),
('407', 'Computer', 100, '172-35-2142', 4),
('501', 'Bangla', 100, '172-35-2142', 5),
('502', 'English', 100, '172-35-2142', 5),
('503', 'Mathematics', 100, '172-35-2142', 5),
('504', 'General Science', 100, '172-35-2142', 5),
('505', 'Social science', 100, '172-35-2142', 5),
('506', 'Religious', 100, '172-35-2142', 5),
('507', 'Computer', 100, '172-35-2142', 5),
('601', 'Bangla', 100, '172-35-2142', 6),
('602', 'English', 100, '172-35-2142', 6),
('603', 'Mathematics', 100, '172-35-2142', 6),
('604', 'General Science', 100, '172-35-2142', 6),
('605', 'Social science', 100, '172-35-2142', 6),
('606', 'Religious', 100, '172-35-2142', 6),
('607', 'Computer', 100, '172-35-2142', 6),
('701', 'Bangla', 100, '172-35-2142', 7),
('702', 'English', 100, '172-35-2142', 7),
('703', 'Mathematics', 100, '172-35-2142', 7),
('704', 'General Science', 100, '172-35-2142', 7),
('705', 'Social science', 100, '172-35-2142', 7),
('706', 'Religious', 100, '172-35-2142', 7),
('707', 'Computer', 100, '172-35-2142', 7),
('801', 'Bangla', 100, '172-35-2142', 8),
('802', 'English', 100, '172-35-2142', 8),
('803', 'Mathematics', 100, '172-35-2142', 8),
('804', 'General Science', 100, '172-35-2142', 8),
('805', 'Social science', 100, '172-35-2142', 8),
('806', 'Religious', 100, '172-35-2142', 8),
('807', 'Computer', 100, '172-35-2142', 8),
('901', 'Bangla', 100, '172-35-2142', 9),
('902', 'English', 100, '172-35-2142', 9),
('904', 'General Science', 100, '172-35-2142', 9),
('905', 'Social science', 100, '172-35-2142', 9),
('906', 'Religious', 100, '172-35-2142', 9),
('907', 'Computer', 100, '172-35-2142', 9);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `teacher_name` varchar(100) NOT NULL,
  `Teacher_ID` varchar(100) NOT NULL,
  `auth` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `teacher_name`, `Teacher_ID`, `auth`) VALUES
(1, 'Shakil Anwar', '172-35-2142', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`sl`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `resultsheet`
--
ALTER TABLE `resultsheet`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`roll`,`class`),
  ADD KEY `class` (`class`);

--
-- Indexes for table `student_auth`
--
ALTER TABLE `student_auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD UNIQUE KEY `subject_id` (`subject_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `resultsheet`
--
ALTER TABLE `resultsheet`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_auth`
--
ALTER TABLE `student_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
