-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2023 at 05:57 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_leavesystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_fullname` varchar(50) DEFAULT NULL,
  `admin_email` varchar(50) DEFAULT NULL,
  `admin_tel` varchar(10) DEFAULT NULL,
  `admin_username` varchar(50) DEFAULT NULL,
  `admin_password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_fullname`, `admin_email`, `admin_tel`, `admin_username`, `admin_password`) VALUES
(1, 'Admin naja', 'naja@gmail.com', '0983527365', 'admin', '4444aas'),
(5, 'min', 'minny2345@gmail.com', '0945456567', 'minmin', '12345678'),
(6, 'มังกร', 'mangkon987@gmail.com', '0898989898', 'konkon', '987654321'),
(7, 'mom', 'sin@gmail.com', '0987643223', 'sin', '232323'),
(9, 'สิริแสน สมมาตร', 'siri212@gmail.com', '0985345435', 'siri', '44444');

-- --------------------------------------------------------

--
-- Table structure for table `tb_attendace`
--

CREATE TABLE `tb_attendace` (
  `attendace_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `attendace_date` date DEFAULT NULL,
  `attendace_timein` time DEFAULT NULL,
  `attendace_timeout` time DEFAULT NULL,
  `attendace_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_attendace`
--

INSERT INTO `tb_attendace` (`attendace_id`, `employee_id`, `attendace_date`, `attendace_timein`, `attendace_timeout`, `attendace_status`) VALUES
(1, 13, '2023-09-22', '10:49:35', '10:53:46', 1),
(2, 11, '2023-09-22', '10:51:08', '10:55:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_cardemp`
--

CREATE TABLE `tb_cardemp` (
  `cardemp_id` int(11) NOT NULL,
  `cardemp_no` varchar(50) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `cardemp_datetime` date NOT NULL,
  `cardemp_status` int(11) DEFAULT NULL COMMENT '''0''ไม่ได้ใช้งาน , ''1'' ใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_cardemp`
--

INSERT INTO `tb_cardemp` (`cardemp_id`, `cardemp_no`, `employee_id`, `cardemp_datetime`, `cardemp_status`) VALUES
(1, '76CAA26', 10, '2023-06-22', 1),
(2, 'A099219', 11, '2023-06-22', 1),
(3, '90CF5A2', 12, '2023-06-01', 1),
(4, '9289899', 13, '2023-06-23', 1),
(10, '12', 18, '2023-07-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_employee`
--

CREATE TABLE `tb_employee` (
  `employee_id` int(11) NOT NULL,
  `employee_no` varchar(13) DEFAULT NULL,
  `employee_fullname` varchar(50) DEFAULT NULL,
  `employee_position` varchar(50) DEFAULT NULL,
  `employee_tel` varchar(10) DEFAULT NULL,
  `shiff_name` varchar(20) NOT NULL,
  `employee_status` int(11) DEFAULT NULL,
  `employee_username` varchar(50) DEFAULT NULL,
  `employee_password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_employee`
--

INSERT INTO `tb_employee` (`employee_id`, `employee_no`, `employee_fullname`, `employee_position`, `employee_tel`, `shiff_name`, `employee_status`, `employee_username`, `employee_password`) VALUES
(6, 'ABD04167', 'กร', 'วิศวกร', '0999999999', 'เช้า', 1, 'konsirak', '123456'),
(8, '32', 'รจณีย์ เวชโสภา', 'พนักงานทั่วไป', '09876543', 'ค่ำ', 0, 'rara123', '23456'),
(10, 'EN10', 'สักขี พยาน', 'พนักงานฝ่ายบัญชี', '087878787', 'ปกติ', 1, 'sak123', '595993'),
(11, 'EN11', 'บุญณี อำไพ', 'พนักงานต้อนรับ', '084757653', 'ค่ำ', 1, 'bunbun', '321321'),
(12, 'EN12', 'กาน', 'พนักงาน', '0854545454', 'เช้า', 0, 'kan', '123456'),
(13, 'EN13', 'รสสุคนธ์', 'พนักงานบัญชี', '0932343242', 'ค่ำ', 1, 'ros755', 'ros755'),
(18, 'EN14', 'การัน', 'พนักงานทั่วไป', '0978787878', 'เช้า', 0, 'kaka', '434343'),
(20, '47', 'สา มารถ ', 'พนักงาน', '085633467', 'ปกติ', 1, 'sasa47', '4747');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hr`
--

CREATE TABLE `tb_hr` (
  `hr_id` int(11) NOT NULL,
  `hr_no` varchar(13) DEFAULT NULL,
  `hr_fullname` varchar(50) DEFAULT NULL,
  `hr_email` varchar(50) DEFAULT NULL,
  `hr_tel` varchar(10) DEFAULT NULL,
  `hr_username` varchar(50) DEFAULT NULL,
  `hr_password` varchar(50) DEFAULT NULL,
  `hr_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_hr`
--

INSERT INTO `tb_hr` (`hr_id`, `hr_no`, `hr_fullname`, `hr_email`, `hr_tel`, `hr_username`, `hr_password`, `hr_status`) VALUES
(5, '233', 'เมษา หน้าร้อน', 'mam1@gmail.com', '233', 'wertyhgrr5', 'dwertyyhgfd345', 1),
(6, '4', 'พฤษก ผกาสร', 'efrt12@gmail.com', '089456465', 'qazwsx324', 'werwf@1223', 1),
(8, '222', 'ดาว ประกายพฤษพ์', 'dao1234@gmail.com', '088888889', 'ddd123', '1234567', 1),
(9, '10', 'มิถุนา ยน', 'mimi6666@gmail.com', '0878463362', 'mi6', 'mimi666666', 1),
(10, '12', 'ดาว ประกาย', 'mam1@gmail.com', '0764572637', 'ddd123', '54321', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_late`
--

CREATE TABLE `tb_late` (
  `late_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `late_date` date NOT NULL,
  `late_time` time NOT NULL,
  `late_remark` int(11) NOT NULL,
  `late_status` int(11) NOT NULL,
  `late_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_leave`
--

CREATE TABLE `tb_leave` (
  `leave_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `leave_date` date DEFAULT NULL,
  `leave_starttime` time DEFAULT NULL,
  `leave_endtime` time DEFAULT NULL,
  `leave_hr` float DEFAULT NULL,
  `leave_note` text DEFAULT NULL,
  `leave_status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_leave`
--

INSERT INTO `tb_leave` (`leave_id`, `employee_id`, `leave_date`, `leave_starttime`, `leave_endtime`, `leave_hr`, `leave_note`, `leave_status`) VALUES
(21, 3, '2554-12-05', '00:00:10', '00:00:12', 6, 'ไม่สบาย', 'รอดำเนินการ'),
(22, 4, '2544-03-11', '11:01:00', '22:06:00', 6, 'ทำธุระด่วน', 'อนุมัติ'),
(24, 13, '2023-06-24', '01:00:00', '11:00:00', 8, 'ทำธุระด่วน', 'อนุมัติ'),
(27, 12, '2023-06-24', '01:42:00', '11:42:00', 0, 'เจ็บ', 'ไม่อนุมัติ'),
(28, 13, '2023-06-24', '09:57:00', '16:57:00', 6, 'ทำธุระด่วน', 'ไม่อนุมัติ'),
(33, 8, '2023-09-16', '14:37:00', '02:37:00', 0, 'ลาป่วย', 'อนุมัติ'),
(34, 8, '2023-09-15', '14:52:00', '04:52:00', 0, 'ลาป่วย', 'อนุมัติ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_log`
--

CREATE TABLE `tb_log` (
  `log_id` int(11) NOT NULL,
  `log_key` varchar(50) NOT NULL,
  `log_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_log`
--

INSERT INTO `tb_log` (`log_id`, `log_key`, `log_datetime`) VALUES
(1, '9289899', '2023-09-19 15:34:27'),
(2, '9289899', '2023-09-19 15:34:27'),
(3, '9289899', '2023-09-19 15:34:27'),
(4, '9289899', '2023-09-19 15:34:28'),
(5, 'A099219', '2023-09-19 15:37:00'),
(6, 'A099219', '2023-09-19 15:45:55'),
(7, '9289899', '2023-09-19 15:48:22'),
(8, 'A099219', '2023-09-19 15:48:48'),
(9, 'A099219', '2023-09-19 15:48:54'),
(10, 'A099219', '2023-09-19 15:53:52'),
(11, '9289899', '2023-09-19 15:56:47'),
(12, '76CAA26', '2023-09-19 16:08:49'),
(13, '90CF5A2', '2023-09-19 16:34:29'),
(14, 'A099219', '2023-09-19 16:56:27'),
(15, 'A099219', '2023-09-19 17:15:04'),
(16, 'A099219', '2023-09-19 17:15:32'),
(17, '90CF5A2', '2023-09-19 17:15:42'),
(18, '76CAA26', '2023-09-19 17:15:48'),
(19, '9289899', '2023-09-19 17:15:57'),
(20, '9289899', '2023-09-19 17:16:16'),
(21, '76CAA26', '2023-09-19 17:16:22'),
(22, '90CF5A2', '2023-09-19 17:16:26'),
(23, 'A099219', '2023-09-19 17:16:30'),
(24, 'A099219', '2023-09-19 17:17:38'),
(25, '90CF5A2', '2023-09-19 17:17:43'),
(26, '9289899', '2023-09-19 17:17:47'),
(27, '76CAA26', '2023-09-19 17:17:50'),
(28, '9289899', '2023-09-19 17:49:59'),
(29, 'A099219', '2023-09-19 17:50:06'),
(30, '90CF5A2', '2023-09-19 17:50:12'),
(31, '76CAA26', '2023-09-19 17:50:16'),
(32, '9289899', '2023-09-19 18:22:48'),
(33, 'A099219', '2023-09-19 18:22:53'),
(34, '90CF5A2', '2023-09-19 18:22:57'),
(35, '76CAA26', '2023-09-19 18:23:00'),
(36, 'A099219', '2023-09-19 18:35:14'),
(37, '76CAA26', '2023-09-19 18:35:26'),
(38, '90CF5A2', '2023-09-19 18:35:30'),
(39, 'A099219', '2023-09-19 18:35:35'),
(40, '9289899', '2023-09-19 18:38:32'),
(41, '9289899', '2023-09-19 18:39:15'),
(42, '76CAA26', '2023-09-19 18:39:56'),
(43, '90CF5A2', '2023-09-19 18:40:52'),
(44, 'A099219', '2023-09-19 18:41:22'),
(45, '9289899', '2023-09-19 18:41:39'),
(46, '90CF5A2', '2023-09-19 18:44:33'),
(47, '9289899', '2023-09-19 20:09:22'),
(48, '76CAA26', '2023-09-19 20:09:30'),
(49, '9289899', '2023-09-19 20:13:37'),
(50, '90CF5A2', '2023-09-19 20:14:51'),
(51, 'A099219', '2023-09-19 20:15:12'),
(52, 'A099219', '2023-09-19 20:15:58'),
(53, '76CAA26', '2023-09-19 20:17:49'),
(54, '9289899', '2023-09-19 20:25:38'),
(55, '76CAA26', '2023-09-19 20:26:10'),
(56, '76CAA26', '2023-09-19 20:26:14'),
(57, 'A099219', '2023-09-19 20:26:22'),
(58, '90CF5A2', '2023-09-19 20:26:27'),
(59, '76CAA26', '2023-09-19 20:34:46'),
(60, 'A099219', '2023-09-19 20:48:21'),
(61, '76CAA26', '2023-09-19 20:48:39'),
(62, '76CAA26', '2023-09-19 20:48:40'),
(63, '9289899', '2023-09-19 20:48:48'),
(64, 'A099219', '2023-09-19 20:48:55'),
(65, 'A099219', '2023-09-19 20:48:59'),
(66, '76CAA26', '2023-09-19 20:49:06'),
(67, '76CAA26', '2023-09-19 20:49:31'),
(68, '9289899', '2023-09-19 20:50:20'),
(69, 'A099219', '2023-09-19 20:51:10'),
(70, '9289899', '2023-09-19 20:52:03'),
(71, 'A099219', '2023-09-19 20:52:14'),
(72, 'A099219', '2023-09-19 20:52:18'),
(73, '76CAA26', '2023-09-19 20:52:34'),
(74, '76CAA26', '2023-09-19 20:52:44'),
(75, '9289899', '2023-09-19 20:56:23'),
(76, '76CAA26', '2023-09-19 20:56:31'),
(77, '76CAA26', '2023-09-19 20:56:33'),
(78, '90CF5A2', '2023-09-19 20:56:41'),
(79, 'A099219', '2023-09-19 20:56:47'),
(80, 'A099219', '2023-09-19 20:56:52'),
(81, '9289899', '2023-09-19 20:58:34'),
(82, 'A099219', '2023-09-19 20:58:46'),
(83, 'A099219', '2023-09-19 20:59:09'),
(84, '9289899', '2023-09-19 20:59:32'),
(85, '76CAA26', '2023-09-19 20:59:46'),
(86, 'A099219', '2023-09-19 20:59:47'),
(87, '90CF5A2', '2023-09-19 20:59:58'),
(88, '9289899', '2023-09-19 21:02:19'),
(89, '76CAA26', '2023-09-19 21:02:45'),
(90, '9289899', '2023-09-19 21:04:48'),
(91, '9289899', '2023-09-19 21:06:02'),
(92, '9289899', '2023-09-19 21:06:25'),
(93, '9289899', '2023-09-19 21:07:10'),
(94, 'A099219', '2023-09-19 21:07:25'),
(95, '90CF5A2', '2023-09-19 21:07:55'),
(96, '76CAA26', '2023-09-19 21:08:00'),
(97, '9289899', '2023-09-19 21:08:09'),
(98, '76CAA26', '2023-09-19 21:08:20'),
(99, '90CF5A2', '2023-09-19 21:08:25'),
(100, 'A099219', '2023-09-19 21:08:29'),
(101, 'A099219', '2023-09-19 21:08:33'),
(102, '9289899', '2023-09-19 21:08:49'),
(103, '76CAA26', '2023-09-19 21:08:51'),
(104, 'A099219', '2023-09-19 21:09:07'),
(105, '90CF5A2', '2023-09-19 21:09:08'),
(106, '9289899', '2023-09-20 14:32:39'),
(107, '76CAA26', '2023-09-20 14:32:47'),
(108, 'A099219', '2023-09-20 14:32:53'),
(109, '90CF5A2', '2023-09-20 14:32:58'),
(110, '76CAA26', '2023-09-20 16:02:54'),
(111, '', '2023-09-20 16:10:13'),
(112, '76CAA26', '2023-09-20 16:16:26'),
(113, '', '2023-09-20 16:16:40'),
(114, '', '2023-09-20 16:16:41'),
(115, '9289899', '2023-09-20 16:19:54'),
(116, '9289899', '2023-09-20 16:45:32'),
(117, '', '2023-09-20 16:51:52'),
(118, '', '2023-09-20 16:51:54'),
(119, '', '2023-09-20 16:51:55'),
(120, '', '2023-09-20 16:51:55'),
(121, '', '2023-09-20 16:51:55'),
(122, '', '2023-09-20 16:51:55'),
(123, '', '2023-09-20 16:51:55'),
(124, '', '2023-09-20 16:51:56'),
(126, '', '2023-09-20 16:51:56'),
(127, '', '2023-09-20 16:51:56'),
(128, '', '2023-09-20 16:51:56'),
(129, '', '2023-09-20 16:51:56'),
(130, '', '2023-09-20 16:51:57'),
(131, '', '2023-09-20 16:51:58'),
(132, '', '2023-09-20 22:57:39'),
(133, '9289899', '2023-09-20 22:58:26'),
(134, '9289899', '2023-09-21 13:13:33'),
(135, '90CF5A2', '2023-09-21 13:13:39'),
(136, '90CF5A2', '2023-09-21 14:27:48'),
(137, 'A099219', '2023-09-21 14:31:28'),
(138, 'A099219', '2023-09-21 14:35:30'),
(139, 'A099219', '2023-09-21 14:36:50'),
(140, '9289899', '2023-09-21 14:41:54'),
(141, 'A099219', '2023-09-21 14:42:41'),
(142, '', '2023-09-22 09:18:20'),
(143, '76CAA26', '2023-09-22 09:23:15'),
(144, '90CF5A2', '2023-09-22 09:24:47'),
(145, '90CF5A2', '2023-09-22 09:25:32'),
(146, '9289899', '2023-09-22 09:26:27'),
(147, '9289899', '2023-09-22 09:33:00'),
(148, '76CAA26', '2023-09-22 09:33:38'),
(149, 'A099219', '2023-09-22 09:35:24'),
(150, '90CF5A2', '2023-09-22 09:36:00'),
(151, '90CF5A2', '2023-09-22 09:36:51'),
(152, '76CAA26', '2023-09-22 10:17:40'),
(153, '76CAA26', '2023-09-22 10:20:00'),
(154, '76CAA26', '2023-09-22 10:21:50'),
(155, '76CAA26', '2023-09-22 10:25:13'),
(156, '9289899', '2023-09-22 10:29:29'),
(157, '9289899', '2023-09-22 10:30:55'),
(158, '9289899', '2023-09-22 10:31:09'),
(159, '9289899', '2023-09-22 10:32:41'),
(160, '9289899', '2023-09-22 10:35:14'),
(161, '9289899', '2023-09-22 10:36:15'),
(162, '9289899', '2023-09-22 10:36:58'),
(163, '9289899', '2023-09-22 10:37:26'),
(164, '9289899', '2023-09-22 10:38:15'),
(165, '9289899', '2023-09-22 10:39:34'),
(166, '9289899', '2023-09-22 10:40:07'),
(167, '9289899', '2023-09-22 10:40:44'),
(168, '9289899', '2023-09-22 10:40:45'),
(169, '9289899', '2023-09-22 10:41:11'),
(170, '9289899', '2023-09-22 10:41:12'),
(171, '9289899', '2023-09-22 10:43:46'),
(172, '9289899', '2023-09-22 10:44:14'),
(173, '76CAA26', '2023-09-22 10:45:54'),
(174, '9289899', '2023-09-22 10:48:14'),
(175, '9289899', '2023-09-22 10:49:35'),
(176, 'A099219', '2023-09-22 10:51:08'),
(177, '9289899', '2023-09-22 10:52:59'),
(178, '9289899', '2023-09-22 10:53:46'),
(179, 'A099219', '2023-09-22 10:55:10'),
(180, 'A099219', '2023-09-22 10:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_shiff`
--

CREATE TABLE `tb_shiff` (
  `shiff_id` int(11) NOT NULL,
  `shiff_name` varchar(50) DEFAULT NULL,
  `shiff_starttime` time DEFAULT NULL,
  `shiff_endtime` time DEFAULT NULL,
  `employee_no` varchar(13) NOT NULL,
  `employee_fullname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_shiff`
--

INSERT INTO `tb_shiff` (`shiff_id`, `shiff_name`, `shiff_starttime`, `shiff_endtime`, `employee_no`, `employee_fullname`) VALUES
(1, 'เช้า', '08:00:00', '10:45:00', 'EN10', ''),
(2, 'ค่ำ', '05:52:00', '10:54:00', 'EN11', ''),
(3, 'ปกติ', '08:00:00', '17:00:00', 'EN12', ''),
(4, 'เช้า', '06:50:00', '10:52:00', 'EN13', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_attendace`
--
ALTER TABLE `tb_attendace`
  ADD PRIMARY KEY (`attendace_id`);

--
-- Indexes for table `tb_cardemp`
--
ALTER TABLE `tb_cardemp`
  ADD PRIMARY KEY (`cardemp_id`);

--
-- Indexes for table `tb_employee`
--
ALTER TABLE `tb_employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `tb_hr`
--
ALTER TABLE `tb_hr`
  ADD PRIMARY KEY (`hr_id`);

--
-- Indexes for table `tb_late`
--
ALTER TABLE `tb_late`
  ADD PRIMARY KEY (`late_id`);

--
-- Indexes for table `tb_leave`
--
ALTER TABLE `tb_leave`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tb_shiff`
--
ALTER TABLE `tb_shiff`
  ADD PRIMARY KEY (`shiff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_attendace`
--
ALTER TABLE `tb_attendace`
  MODIFY `attendace_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_cardemp`
--
ALTER TABLE `tb_cardemp`
  MODIFY `cardemp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_employee`
--
ALTER TABLE `tb_employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_hr`
--
ALTER TABLE `tb_hr`
  MODIFY `hr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_late`
--
ALTER TABLE `tb_late`
  MODIFY `late_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_leave`
--
ALTER TABLE `tb_leave`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `tb_shiff`
--
ALTER TABLE `tb_shiff`
  MODIFY `shiff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
