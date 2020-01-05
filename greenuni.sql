-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 15, 2019 at 03:21 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greenuni`
--

-- --------------------------------------------------------

--
-- Table structure for table `gu_admin`
--

DROP TABLE IF EXISTS `gu_admin`;
CREATE TABLE IF NOT EXISTS `gu_admin` (
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gu_admin`
--

INSERT INTO `gu_admin` (`Email`, `Name`, `Password`) VALUES
('nguyenquoctai@gmail.com', 'Nguyen Quoc Tai', 'nguyenquoctai');

-- --------------------------------------------------------

--
-- Table structure for table `gu_category`
--

DROP TABLE IF EXISTS `gu_category`;
CREATE TABLE IF NOT EXISTS `gu_category` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gu_category`
--

INSERT INTO `gu_category` (`CategoryID`, `CategoryName`, `Description`) VALUES
(1, 'Soft Skills', 'This subject helps student improving soft skills such as Time Management'),
(2, 'Cloud Computing', 'Learn about cloud computingg');

-- --------------------------------------------------------

--
-- Table structure for table `gu_course`
--

DROP TABLE IF EXISTS `gu_course`;
CREATE TABLE IF NOT EXISTS `gu_course` (
  `CourseID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryID` int(11) NOT NULL,
  `CourseName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`CourseID`),
  KEY `CategoryID` (`CategoryID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gu_course`
--

INSERT INTO `gu_course` (`CourseID`, `CategoryID`, `CourseName`) VALUES
(1, 1, 'Time Management'),
(2, 1, 'Business Communication'),
(3, 2, 'Cloud Computing'),
(4, 2, 'Security'),
(5, 1, 'Negotiation');

-- --------------------------------------------------------

--
-- Table structure for table `gu_enrollment`
--

DROP TABLE IF EXISTS `gu_enrollment`;
CREATE TABLE IF NOT EXISTS `gu_enrollment` (
  `TraineeID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `EnrollmentDate` date DEFAULT NULL,
  PRIMARY KEY (`TraineeID`,`CourseID`),
  KEY `CourseID` (`CourseID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gu_enrollment`
--

INSERT INTO `gu_enrollment` (`TraineeID`, `CourseID`, `EnrollmentDate`) VALUES
(1, 1, NULL),
(1, 4, NULL),
(2, 4, NULL),
(3, 1, NULL),
(3, 3, NULL),
(1, 2, NULL),
(1, 5, NULL),
(1, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gu_staff`
--

DROP TABLE IF EXISTS `gu_staff`;
CREATE TABLE IF NOT EXISTS `gu_staff` (
  `StaffID` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`StaffID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gu_staff`
--

INSERT INTO `gu_staff` (`StaffID`, `Email`, `Name`, `Password`) VALUES
(1, 'phambangtrinh@gmail.com', 'Pham Bang Trinh', 'phambangtrinh'),
(2, 'hothinga@gmail.com', 'Ho Thi Nga', 'hothinga'),
(3, 'nguyenduynghiem@gmail.com', 'Nguyen Duy Nghiem', 'nguyenduynghiem');

-- --------------------------------------------------------

--
-- Table structure for table `gu_topic`
--

DROP TABLE IF EXISTS `gu_topic`;
CREATE TABLE IF NOT EXISTS `gu_topic` (
  `TopicID` int(11) NOT NULL AUTO_INCREMENT,
  `TrainerID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `TopicName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`TopicID`),
  KEY `TrainerID` (`TrainerID`),
  KEY `CourseID` (`CourseID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gu_topic`
--

INSERT INTO `gu_topic` (`TopicID`, `TrainerID`, `CourseID`, `TopicName`) VALUES
(1, 1, 1, 'How to make a schedule'),
(2, 1, 2, 'How to write recommendation letters'),
(3, 2, 3, 'Types of Cloud Computing and Practice'),
(4, 2, 4, 'Keep your account safe from Internet');

-- --------------------------------------------------------

--
-- Table structure for table `gu_trainee`
--

DROP TABLE IF EXISTS `gu_trainee`;
CREATE TABLE IF NOT EXISTS `gu_trainee` (
  `TraineeID` int(11) NOT NULL AUTO_INCREMENT,
  `TraineeName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DOB` date DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TOEICScore` float DEFAULT NULL,
  `Password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`TraineeID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gu_trainee`
--

INSERT INTO `gu_trainee` (`TraineeID`, `TraineeName`, `DOB`, `Email`, `Address`, `TOEICScore`, `Password`) VALUES
(1, 'Tran Cong Hung', '1999-05-19', 'tranconghung@gmail.com', '', 0, 'tranconghung'),
(2, 'Nguyen Quoc Tai', NULL, 'nguyenquoctai@gmail.com', NULL, NULL, 'nguyenquoctai'),
(3, 'Vo Pham Thai Tuan', NULL, 'vophamthaituan@gmail.com', NULL, NULL, 'vophamthaituan');

-- --------------------------------------------------------

--
-- Table structure for table `gu_trainer`
--

DROP TABLE IF EXISTS `gu_trainer`;
CREATE TABLE IF NOT EXISTS `gu_trainer` (
  `TrainerID` int(11) NOT NULL AUTO_INCREMENT,
  `TrainerName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Telephone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`TrainerID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gu_trainer`
--

INSERT INTO `gu_trainer` (`TrainerID`, `TrainerName`, `Email`, `Telephone`, `Password`) VALUES
(1, 'Nguyen Huu Duc', 'nguyenhuuduc@gmail.com', '0123456788', 'nguyenhuuduc'),
(2, 'Hoang Nhu Vinh', 'hoangnhuvinh@gmail.com', '0123456789', 'hoangnhuvinh'),
(4, 'Nguyen Duy Nghiem', 'nguyenduynghiem@gmail.com', '0123456786', 'nguyenduynghiem');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
