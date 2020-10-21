-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2020 at 12:26 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id14543830_mocussd`
--

-- --------------------------------------------------------

--
-- Table structure for table `coursework`
--

CREATE TABLE `coursework` (
  `name` varchar(255) NOT NULL,
  `regNumber` varchar(20) NOT NULL,
  `cit 301` int(20) NOT NULL,
  `cit 302` int(20) NOT NULL,
  `cit 303` int(20) NOT NULL,
  `cit 304` int(20) NOT NULL,
  `cit 305` int(20) NOT NULL,
  `mal 336i` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coursework`
--

INSERT INTO `coursework` (`name`, `regNumber`, `cit 301`, `cit 302`, `cit 303`, `cit 304`, `cit 305`, `mal 336i`) VALUES
('Raymond Msungu', 'bscbict16517', 25, 20, 30, 35, 19, 24),
('John Lugenzi', 'bscbict18017', 10, 20, 30, 25, 20, 19),
('Christopher Tingo', 'bscbict15617', 15, 20, 19, 40, 34, 30),
('Fatmah Mirambo', 'bscbict13717', 25, 40, 32, 22, 21, 20);

-- --------------------------------------------------------

--
-- Table structure for table `fee_status`
--

CREATE TABLE `fee_status` (
  `name` varchar(20) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `regNumber` varchar(20) NOT NULL,
  `tuitionFee` decimal(19,2) NOT NULL,
  `medicalFee` decimal(19,2) NOT NULL,
  `tcuQuality` decimal(19,2) NOT NULL,
  `facultyDepreciation` decimal(19,2) NOT NULL,
  `credit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fee_status`
--

INSERT INTO `fee_status` (`name`, `phoneNumber`, `regNumber`, `tuitionFee`, `medicalFee`, `tcuQuality`, `facultyDepreciation`, `credit`) VALUES
('', '', '', '0.00', '0.00', '0.00', '0.00', ''),
('Raymond Msungu', '+255629242340', 'bscbcit16517', '900000.00', '49600.00', '20000.00', '20000.00', '200000'),
('John Lugenzi', '+255672020048', 'bscbict18017', '1100000.00', '20000.00', '20000.00', '20000.00', '80000'),
('Christopher Tingo', '+255766724110', 'bscbict15617', '1100000.00', '100000.00', '20000.00', '20000.00', '0'),
('Fatmah Mirambo', '+255787536202', 'bscbict13717', '1100000.00', '100000.00', '10000.00', '20000.00', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE `general` (
  `name` varchar(20) NOT NULL,
  `regNumber` varchar(20) NOT NULL,
  `semester1` varchar(20) NOT NULL,
  `semester2` varchar(20) NOT NULL,
  `cumulative` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general`
--

INSERT INTO `general` (`name`, `regNumber`, `semester1`, `semester2`, `cumulative`) VALUES
('Raymond Msungu', 'bscbict16517', '3', '4', '4'),
('John Lugenzi', 'bscbict18017', '3', '4', '4'),
('Fatmah Mirambo', 'bscbict13717', '2', '4', '3'),
('Christopher Tingo', 'bscbict15617', '3', '5', '4');

-- --------------------------------------------------------

--
-- Table structure for table `results_one`
--

CREATE TABLE `results_one` (
  `name` varchar(255) NOT NULL,
  `regNumber` varchar(20) NOT NULL,
  `cit 300r` varchar(20) NOT NULL,
  `cit 306` varchar(20) NOT NULL,
  `cit 307` varchar(20) NOT NULL,
  `cit 308` varchar(20) NOT NULL,
  `cit 309` varchar(20) NOT NULL,
  `cit 310` varchar(20) NOT NULL,
  `gpa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results_one`
--

INSERT INTO `results_one` (`name`, `regNumber`, `cit 300r`, `cit 306`, `cit 307`, `cit 308`, `cit 309`, `cit 310`, `gpa`) VALUES
('Raymond Msungu', 'bscbict16517', '70  B', '69  B', '79  A', '74  B+', '62  B', '61  C', '3'),
('John Lugenzi', 'bscbict18017', '50 C', '70 A', '81 A', '55 C', '60 B', '78 A', '3'),
('Christopher Tingo', 'bscbict15617', '75 A', '80 A', '60 B', '65 B+', '72 B+', '50 C', '3'),
('Fatmah Mirambo', 'bscbict13717', '60 B', '50 C', '50 C', '90 A', '60 B', '50 C', '2');

-- --------------------------------------------------------

--
-- Table structure for table `results_two`
--

CREATE TABLE `results_two` (
  `name` varchar(255) NOT NULL,
  `regNumber` varchar(20) NOT NULL,
  `cit 301` varchar(20) NOT NULL,
  `cit 302` varchar(20) NOT NULL,
  `cit 303` varchar(20) NOT NULL,
  `cit 304` varchar(20) NOT NULL,
  `cit 305` varchar(20) NOT NULL,
  `mal 336i` varchar(20) NOT NULL,
  `gpa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results_two`
--

INSERT INTO `results_two` (`name`, `regNumber`, `cit 301`, `cit 302`, `cit 303`, `cit 304`, `cit 305`, `mal 336i`, `gpa`) VALUES
('Raymond Msungu', 'bscbict16517', '85  A', '90  A', '79  B+', '65  B', '79  B+', '93  A', '4'),
('John Lugenzi', 'bscbict18017', '70 B+', '75 A', '62 B', '50 C', '79 A', '80 A', '4'),
('Christopher Tingo', 'bscbict15617', '90 A', '80 A', '75 A', '79 A', '81 A', '80 A', '5'),
('Fatmah Mirambo', 'bscbict13717', '90 A', '89 A', '72 B+', '66 B', '53 C', '81 A', '4');

-- --------------------------------------------------------

--
-- Table structure for table `session_levels`
--

CREATE TABLE `session_levels` (
  `session_id` varchar(50) DEFAULT NULL,
  `phoneNumber` varchar(40) DEFAULT NULL,
  `level` tinyint(1) DEFAULT NULL,
  `time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session_levels`
--

INSERT INTO `session_levels` (`session_id`, `phoneNumber`, `level`, `time`) VALUES
('', '', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `name` varchar(255) NOT NULL,
  `surName` varchar(255) NOT NULL,
  `dateBirth` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `program` varchar(20) NOT NULL,
  `regNumber` varchar(20) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`name`, `surName`, `dateBirth`, `sex`, `program`, `regNumber`, `phoneNumber`) VALUES
('', '', '', '', '', '', ''),
('', '', '', '', '', '', ''),
('', '', '', '', '', '', ''),
('', '', '', '', '', '', ''),
('', '', '', '', '', '', ''),
('', '', '', '', '', '', ''),
('Raymond ', 'Msungu', '1 July 1901', 'Male', 'Bsc BICT', 'bscbict16517', '+255629242340'),
('John ', 'Lugenzi', '6 June 1990', 'Male', 'BICT', 'bscbict18017', '+255672020048'),
('Christopher', 'Tingo', '1 August 1995', 'Male', 'BICT', 'bscbict15617', '+255766724110'),
('Fatmah', 'Mirambo', '10 July 1990', 'Female', 'BICT', 'bscbict13717', '+255787536202');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
