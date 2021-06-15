-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2021 at 08:36 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faculty`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `A_id` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`A_id`, `Username`, `Password`) VALUES
(1, 'paokue', 'paokue123'),
(2, 'apao', '1234'),
(3, 'suav', '123');

-- --------------------------------------------------------

--
-- Table structure for table `class1`
--

CREATE TABLE `class1` (
  `C_id` int(11) NOT NULL,
  `C_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class1`
--

INSERT INTO `class1` (`C_id`, `C_name`) VALUES
(61, 'ຫ້ອງ2IT8'),
(62, 'ຫ້ອງ2IT2');

-- --------------------------------------------------------

--
-- Table structure for table `gpa_table`
--

CREATE TABLE `gpa_table` (
  `id` int(11) NOT NULL,
  `g_st_no` varchar(100) NOT NULL,
  `term` int(10) NOT NULL,
  `unit_total` varchar(15) NOT NULL,
  `total` varchar(50) NOT NULL,
  `gpa` varchar(50) NOT NULL,
  `gps` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gpa_table`
--

INSERT INTO `gpa_table` (`id`, `g_st_no`, `term`, `unit_total`, `total`, `gpa`, `gps`) VALUES
(28, 'QFEN-001', 1, '', '', 'NAN', '0'),
(29, 'QFEN-001', 2, '', '19', '3.8', '3.65'),
(30, 'QFEN-001', 3, '', '19', '3.8', '3.6999999999999997');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `g_id` int(10) NOT NULL,
  `grade` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`g_id`, `grade`) VALUES
(1, 1),
(2, 2),
(6, 3),
(7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `M_id` int(11) NOT NULL,
  `M_no` varchar(30) NOT NULL,
  `M_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`M_id`, `M_no`, `M_name`) VALUES
(63, 'IT-0000009', 'ຂົວທາງ - ຂົນສົ່ງ.'),
(64, 'IT-0000010', 'ວິສະວະກໍາຄອມພິວເຕີ ແລະ ໄອທີ.'),
(65, 'IT-0000011', 'ວິສະວະກໍາກົນຈັກ'),
(67, 'IT-0000012', 'ວິສະວະກໍາໄຟຟ້າ'),
(68, 'IT-0000013', 'ວິສະວະກໍາສິ່ງແວດລ້ອມ'),
(69, 'IT-0000014', 'ວິສະວະກໍາບໍ່ແຮ່'),
(70, 'IT-0000015', 'ວິສະວະກໍາໂທລະຄົມມະນາຄົມ.');

-- --------------------------------------------------------

--
-- Table structure for table `object`
--

CREATE TABLE `object` (
  `o_id` int(11) NOT NULL,
  `o_no` varchar(50) NOT NULL,
  `o_name` varchar(50) NOT NULL,
  `unit` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `object`
--

INSERT INTO `object` (`o_id`, `o_no`, `o_name`, `unit`) VALUES
(11, 'ddee4455', 'ເຄມີສາດ', 3),
(12, 'dede5566', 'ຟີຊິກສາດ', 2),
(14, 'ens12215', 'english', 3),
(20, 'ABCD1234', 'java', 3);

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `S_id` int(11) NOT NULL,
  `st_no` varchar(50) NOT NULL,
  `o_id` int(50) NOT NULL,
  `term` int(10) NOT NULL,
  `level_no` varchar(20) NOT NULL,
  `level` varchar(50) NOT NULL,
  `score` varchar(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`S_id`, `st_no`, `o_id`, `term`, `level_no`, `level`, `score`, `date`) VALUES
(105, 'QFEN-001', 9, 1, '3.5', 'B+', '85', '2021-01-27 10:36:49'),
(107, 'QFEN-001', 11, 1, '4', 'A', '99', '2021-01-27 10:37:44'),
(108, 'QFEN-001', 14, 2, '4', 'A', '99', '2021-01-27 10:40:20'),
(109, 'QFEN-001', 12, 2, '3.5', 'B+', '85', '2021-01-27 10:40:32'),
(110, 'QFEN-001', 9, 3, '3.5', 'B+', '85', '2021-01-27 10:41:21'),
(111, 'QFEN-001', 11, 3, '4', 'A', '99', '2021-01-27 10:41:30'),
(112, 'QFEN-001', 10, 1, '0', 'F', '10', '2021-01-28 09:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `St_id` int(11) NOT NULL,
  `St_no` varchar(50) NOT NULL,
  `year` int(4) NOT NULL,
  `St_name` varchar(50) NOT NULL,
  `St_sex` varchar(10) NOT NULL,
  `St_date` date NOT NULL,
  `St_address` varchar(200) NOT NULL,
  `m_id` int(11) NOT NULL,
  `C_id` int(200) NOT NULL,
  `G_id` int(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`St_id`, `St_no`, `year`, `St_name`, `St_sex`, `St_date`, `St_address`, `m_id`, `C_id`, `G_id`, `date`) VALUES
(60, 'QFEN-001', 21, 'thongphet', 'ຊາຍ', '2021-05-30', 'Vientiane', 64, 62, 6, '2021-06-06 11:54:35');

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `id` int(11) NOT NULL,
  `term` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`id`, `term`) VALUES
(3, 1),
(4, 2),
(5, 3),
(6, 4),
(7, 5),
(8, 6),
(9, 7),
(10, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`A_id`);

--
-- Indexes for table `class1`
--
ALTER TABLE `class1`
  ADD PRIMARY KEY (`C_id`);

--
-- Indexes for table `gpa_table`
--
ALTER TABLE `gpa_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`M_id`);

--
-- Indexes for table `object`
--
ALTER TABLE `object`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`S_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`St_id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `A_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class1`
--
ALTER TABLE `class1`
  MODIFY `C_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `gpa_table`
--
ALTER TABLE `gpa_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `g_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `M_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `object`
--
ALTER TABLE `object`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `S_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `St_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
