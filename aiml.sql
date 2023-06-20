-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 20, 2023 at 03:45 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aiml`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `Course_Code` varchar(10) NOT NULL,
  `Course_Title` varchar(255) DEFAULT NULL,
  `Faculty_name` varchar(30) DEFAULT NULL,
  `Credits` int(11) DEFAULT NULL,
  `Hours` int(11) DEFAULT NULL,
  `Semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Course_Code`, `Course_Title`, `Faculty_name`, `Credits`, `Hours`, `Semester`) VALUES
('21AM305', 'Object Oriented Programming with Python', 'Mr. Sudesh Rao', 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Name` varchar(30) DEFAULT NULL,
  `Department_ID` varchar(30) NOT NULL,
  `Office` varchar(255) NOT NULL,
  `hod_id` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `Department_ID` varchar(30) NOT NULL,
  `Employee_ID` varchar(30) NOT NULL,
  `First_Name` varchar(255) DEFAULT NULL,
  `Last_Name` varchar(255) DEFAULT NULL,
  `Qualifications` varchar(255) DEFAULT NULL,
  `Phone` varchar(11) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `internships`
--

CREATE TABLE `internships` (
  `USN` varchar(11) NOT NULL,
  `Title` varchar(20) NOT NULL,
  `Company Name` text DEFAULT NULL,
  `Position` text DEFAULT NULL,
  `Advisor Name` text DEFAULT NULL,
  `Stipend` text DEFAULT NULL,
  `Started` date NOT NULL,
  `Ended` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `USN` varchar(11) NOT NULL,
  `Course_Code` varchar(10) NOT NULL,
  `SEE` int(11) DEFAULT NULL,
  `SGPA` decimal(4,2) DEFAULT NULL,
  `Semester` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mooc_course`
--

CREATE TABLE `mooc_course` (
  `USN` varchar(11) NOT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `course_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `Project_No` int(11) NOT NULL,
  `USN` varchar(11) NOT NULL,
  `Course_Code` varchar(10) DEFAULT NULL,
  `Title` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `ssid` varchar(10) NOT NULL,
  `sem` int(11) DEFAULT NULL,
  `section` varchar(1) DEFAULT NULL,
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `USN` varchar(11) NOT NULL,
  `First_Name` varchar(255) DEFAULT NULL,
  `Middle_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) DEFAULT NULL,
  `D.O.B.` date DEFAULT NULL,
  `Year_of_Admission` int(4) DEFAULT NULL,
  `Phone` varchar(11) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`USN`, `First_Name`, `Middle_Name`, `Last_Name`, `D.O.B.`, `Year_of_Admission`, `Phone`, `Email`, `Address`) VALUES
('4NM21AI022', 'Deepshika', '', 'Poojary', '2003-10-10', 2021, '9167723340', '4nm21ai022@nmamit.in', 'Shruthi Compound, Opposite Nitte Panchayat, Nitte, 574110');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_activities`
--

CREATE TABLE `teacher_activities` (
  `Employee_ID` varchar(30) DEFAULT NULL,
  `Type` text DEFAULT NULL,
  `Title` text DEFAULT NULL,
  `Started` date DEFAULT NULL,
  `Ended` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Course_Code`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Department_ID`),
  ADD KEY `dept_ind` (`hod_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`Employee_ID`),
  ADD KEY `Department_ID` (`Department_ID`);

--
-- Indexes for table `internships`
--
ALTER TABLE `internships`
  ADD PRIMARY KEY (`USN`,`Title`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`USN`,`Course_Code`),
  ADD KEY `Course_Code` (`Course_Code`),
  ADD KEY `USN` (`USN`);

--
-- Indexes for table `mooc_course`
--
ALTER TABLE `mooc_course`
  ADD KEY `USN` (`USN`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`Project_No`,`USN`),
  ADD KEY `USN` (`USN`),
  ADD KEY `Course_Code` (`Course_Code`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`ssid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`USN`);

--
-- Indexes for table `teacher_activities`
--
ALTER TABLE `teacher_activities`
  ADD KEY `Employee_ID` (`Employee_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `dept_fk` FOREIGN KEY (`hod_id`) REFERENCES `faculty` (`Employee_ID`) ON DELETE CASCADE;

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`Department_ID`) REFERENCES `department` (`Department_ID`);

--
-- Constraints for table `internships`
--
ALTER TABLE `internships`
  ADD CONSTRAINT `internships_ibfk_1` FOREIGN KEY (`USN`) REFERENCES `student` (`USN`);

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`USN`) REFERENCES `student` (`USN`),
  ADD CONSTRAINT `marks_ibfk_2` FOREIGN KEY (`Course_Code`) REFERENCES `course` (`Course_Code`);

--
-- Constraints for table `mooc_course`
--
ALTER TABLE `mooc_course`
  ADD CONSTRAINT `mooc_course_ibfk_1` FOREIGN KEY (`USN`) REFERENCES `student` (`USN`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`USN`) REFERENCES `student` (`USN`),
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`Course_Code`) REFERENCES `course` (`Course_Code`);

--
-- Constraints for table `teacher_activities`
--
ALTER TABLE `teacher_activities`
  ADD CONSTRAINT `teacher_activities_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `faculty` (`Employee_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
