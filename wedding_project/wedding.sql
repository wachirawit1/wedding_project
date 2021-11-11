-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2021 at 02:31 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedding`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `a_id` varchar(6) NOT NULL,
  `a_name` varchar(100) NOT NULL,
  `a_detail` varchar(500) NOT NULL,
  `t_id` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`a_id`, `a_name`, `a_detail`, `t_id`) VALUES
('a00001', 'พิธีสงฆ์', 'ทำอะไรก็ได้โตแล้ว', '1'),
('a00002', 'พิธีแห่ขันหมาก', 'ยังไม่มีคำบรรยาย', '1'),
('a00003', 'พิธีสู่ขอ เปิดขันหมาก นับสินสอด พิธีหมั้น สวมแหวน', 'ยังไม่มีคำบรรยาย', '1'),
('a00004', 'พิธีไหว้ผู้ใหญ่ หรือ ผูกข้อมือ หรือ ยกน้ำชา', 'ยังไม่มีอะไร', '1'),
('a00005', 'พิธีหลั่งน้ำ', 'ยังไม่มีคำบรรยาย', '1'),
('a00006', 'พิธีปูเตียงเรียงหมอน', 'ยังไม่มีคำบรรยยาย', '1'),
('a00007', 'test', 'dsfsdf', ''),
('a00008', '', '', '5'),
('a00010', 'ทดสอบ2', 'จ้ำข้าวเหนียว', '3'),
('a00011', 'ชิ่งชารา1', 'จ้ำข้าวเจ้า', '3'),
('a00012', 'ชิ่งชารา1', 'เช่าหนี่มา', '2'),
('a00013', 'พิธีทดสอบ', 'เริ่มเวลา 8.00น.-12.00น.', '1'),
('a00014', 'คว่ำบาตร', 'เริ่ม 8.00น.-12.00', '4');

-- --------------------------------------------------------

--
-- Table structure for table `activity_event`
--

CREATE TABLE `activity_event` (
  `ae_id` int(11) NOT NULL,
  `a_id` varchar(6) NOT NULL,
  `list_id` varchar(6) NOT NULL,
  `price` int(7) NOT NULL,
  `e_id` varchar(6) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity_event`
--

INSERT INTO `activity_event` (`ae_id`, `a_id`, `list_id`, `price`, `e_id`, `status`) VALUES
(1, 'a00001', 'l00001', 450, '1', 'check'),
(2, 'a00001', 'l00002', 150, '1', 'check'),
(3, 'a00001', 'l00003', 0, '1', 'uncheck'),
(4, 'a00001', 'l00004', 0, '1', 'uncheck'),
(5, 'a00001', 'l00005', 0, '1', 'uncheck'),
(6, 'a00001', 'l00006', 0, '1', 'uncheck'),
(7, 'a00001', 'l00007', 0, '1', 'uncheck'),
(8, 'a00001', 'l00008', 0, '1', 'uncheck'),
(9, 'a00001', 'l00009', 0, '1', 'uncheck'),
(10, 'a00001', 'l00010', 0, '1', 'uncheck'),
(11, 'a00001', 'l00011', 0, '1', 'uncheck'),
(12, 'a00001', 'l00012', 0, '1', 'uncheck'),
(13, 'a00001', 'l00013', 0, '1', 'uncheck'),
(14, 'a00001', 'l00014', 0, '1', 'uncheck'),
(15, 'a00001', 'l00015', 0, '1', 'uncheck'),
(16, 'a00001', 'l00016', 0, '1', 'uncheck'),
(17, 'a00001', 'l00017', 0, '1', 'uncheck'),
(18, 'a00001', 'l00018', 0, '1', 'uncheck'),
(19, 'a00001', 'l00019', 0, '1', 'uncheck'),
(20, 'a00001', 'l00020', 0, '1', 'uncheck'),
(21, 'a00001', 'l00021', 0, '1', 'uncheck'),
(22, 'a00001', 'l00022', 0, '1', 'uncheck'),
(23, 'a00001', 'l00023', 0, '1', 'uncheck'),
(24, 'a00001', 'l00024', 0, '1', 'uncheck'),
(25, 'a00001', 'l00025', 0, '1', 'uncheck'),
(26, 'a00002', 'l00025', 0, '1', 'uncheck'),
(27, 'a00002', 'l00026', 0, '1', 'uncheck'),
(28, 'a00002', 'l00027', 0, '1', 'uncheck'),
(29, 'a00002', 'l00028', 0, '1', 'uncheck'),
(30, 'a00002', 'l00029', 0, '1', 'uncheck'),
(31, 'a00002', 'l00030', 0, '1', 'uncheck'),
(32, 'a00002', 'l00031', 0, '1', 'uncheck'),
(33, 'a00002', 'l00032', 0, '1', 'uncheck'),
(34, 'a00002', 'l00033', 0, '1', 'uncheck'),
(35, 'a00002', 'l00034', 0, '1', 'uncheck'),
(36, 'a00002', 'l00035', 0, '1', 'uncheck'),
(37, 'a00002', 'l00036', 0, '1', 'uncheck'),
(38, 'a00002', 'l00037', 0, '1', 'uncheck'),
(39, 'a00003', 'l00038', 0, '1', 'uncheck'),
(40, 'a00003', 'l00039', 0, '1', 'uncheck'),
(41, 'a00003', 'l00040', 0, '1', 'uncheck'),
(42, 'a00003', 'l00041', 0, '1', 'uncheck'),
(43, 'a00003', 'l00042', 0, '1', 'uncheck'),
(44, 'a00003', 'l00043', 0, '1', 'uncheck'),
(45, 'a00003', 'l00044', 0, '1', 'uncheck'),
(46, 'a00003', 'l00045', 0, '1', 'uncheck'),
(47, 'a00003', 'l00046', 0, '1', 'uncheck'),
(48, 'a00003', 'l00047', 0, '1', 'uncheck'),
(49, 'a00004', 'l00043', 0, '1', 'uncheck'),
(50, 'a00004', 'l00044', 0, '1', 'uncheck'),
(51, 'a00004', 'l00045', 0, '1', 'uncheck'),
(52, 'a00004', 'l00046', 0, '1', 'uncheck'),
(53, 'a00004', 'l00047', 0, '1', 'uncheck'),
(54, 'a00004', 'l00048', 0, '1', 'uncheck'),
(55, 'a00004', 'l00049', 0, '1', 'uncheck'),
(56, 'a00005', 'l00050', 0, '1', 'uncheck'),
(57, 'a00005', 'l00051', 0, '1', 'uncheck'),
(58, 'a00005', 'l00052', 0, '1', 'uncheck'),
(59, 'a00005', 'l00053', 0, '1', 'uncheck'),
(60, 'a00006', 'l00055', 0, '1', 'uncheck'),
(61, 'a00006', 'l00056', 0, '1', 'uncheck'),
(62, 'a00006', 'l00057', 0, '1', 'uncheck'),
(63, 'a00006', 'l00058', 0, '1', 'uncheck'),
(64, 'a00006', 'l00059', 0, '1', 'uncheck'),
(65, 'a00006', 'l00060', 0, '1', 'uncheck'),
(66, 'a00006', 'l00061', 0, '1', 'uncheck'),
(67, 'a00006', 'l00062', 0, '1', 'uncheck'),
(68, 'a00006', 'l00063', 0, '1', 'uncheck'),
(69, 'a00013', 'l00001', 0, '1', 'uncheck'),
(70, 'a00013', 'l00003', 0, '1', 'uncheck'),
(71, 'a00013', 'l00004', 0, '1', 'uncheck'),
(72, 'a00013', 'l00005', 0, '1', 'uncheck'),
(73, 'a00013', 'l00006', 0, '1', 'uncheck'),
(74, 'a00001', 'l00001', 0, '2', 'uncheck'),
(75, 'a00001', 'l00002', 0, '2', 'uncheck'),
(76, 'a00001', 'l00003', 0, '2', 'uncheck'),
(77, 'a00001', 'l00004', 0, '2', 'uncheck'),
(78, 'a00001', 'l00005', 0, '2', 'uncheck'),
(79, 'a00001', 'l00006', 0, '2', 'uncheck'),
(80, 'a00001', 'l00007', 0, '2', 'uncheck'),
(81, 'a00001', 'l00008', 0, '2', 'uncheck'),
(82, 'a00001', 'l00009', 0, '2', 'uncheck'),
(83, 'a00001', 'l00010', 0, '2', 'uncheck'),
(84, 'a00001', 'l00011', 0, '2', 'uncheck'),
(85, 'a00001', 'l00012', 0, '2', 'uncheck'),
(86, 'a00001', 'l00013', 0, '2', 'uncheck'),
(87, 'a00001', 'l00014', 0, '2', 'uncheck'),
(88, 'a00001', 'l00015', 0, '2', 'uncheck'),
(89, 'a00001', 'l00016', 0, '2', 'uncheck'),
(90, 'a00001', 'l00017', 0, '2', 'uncheck'),
(91, 'a00001', 'l00018', 0, '2', 'uncheck'),
(92, 'a00001', 'l00019', 0, '2', 'uncheck'),
(93, 'a00001', 'l00020', 0, '2', 'uncheck'),
(94, 'a00001', 'l00021', 0, '2', 'uncheck'),
(95, 'a00001', 'l00022', 0, '2', 'uncheck'),
(96, 'a00001', 'l00023', 0, '2', 'uncheck'),
(97, 'a00001', 'l00024', 0, '2', 'uncheck'),
(98, 'a00001', 'l00025', 0, '2', 'uncheck'),
(99, 'a00002', 'l00025', 0, '2', 'uncheck'),
(100, 'a00002', 'l00026', 0, '2', 'uncheck'),
(101, 'a00002', 'l00027', 0, '2', 'uncheck'),
(102, 'a00002', 'l00028', 0, '2', 'uncheck'),
(103, 'a00002', 'l00029', 0, '2', 'uncheck'),
(104, 'a00002', 'l00030', 0, '2', 'uncheck'),
(105, 'a00002', 'l00031', 0, '2', 'uncheck'),
(106, 'a00002', 'l00032', 0, '2', 'uncheck'),
(107, 'a00002', 'l00033', 0, '2', 'uncheck'),
(108, 'a00002', 'l00034', 0, '2', 'uncheck'),
(109, 'a00002', 'l00035', 0, '2', 'uncheck'),
(110, 'a00002', 'l00036', 0, '2', 'uncheck'),
(111, 'a00002', 'l00037', 0, '2', 'uncheck'),
(112, 'a00003', 'l00038', 0, '2', 'uncheck'),
(113, 'a00003', 'l00039', 0, '2', 'uncheck'),
(114, 'a00003', 'l00040', 0, '2', 'uncheck'),
(115, 'a00003', 'l00041', 0, '2', 'uncheck'),
(116, 'a00003', 'l00042', 0, '2', 'uncheck'),
(117, 'a00003', 'l00043', 0, '2', 'uncheck'),
(118, 'a00003', 'l00044', 0, '2', 'uncheck'),
(119, 'a00003', 'l00045', 0, '2', 'uncheck'),
(120, 'a00003', 'l00046', 0, '2', 'uncheck'),
(121, 'a00003', 'l00047', 0, '2', 'uncheck'),
(122, 'a00004', 'l00043', 0, '2', 'uncheck'),
(123, 'a00004', 'l00044', 0, '2', 'uncheck'),
(124, 'a00004', 'l00045', 0, '2', 'uncheck'),
(125, 'a00004', 'l00046', 0, '2', 'uncheck'),
(126, 'a00004', 'l00047', 0, '2', 'uncheck'),
(127, 'a00004', 'l00048', 0, '2', 'uncheck'),
(128, 'a00004', 'l00049', 0, '2', 'uncheck'),
(129, 'a00005', 'l00050', 0, '2', 'uncheck'),
(130, 'a00005', 'l00051', 0, '2', 'uncheck'),
(131, 'a00005', 'l00052', 0, '2', 'uncheck'),
(132, 'a00005', 'l00053', 0, '2', 'uncheck'),
(133, 'a00006', 'l00055', 0, '2', 'uncheck'),
(134, 'a00006', 'l00056', 0, '2', 'uncheck'),
(135, 'a00006', 'l00057', 0, '2', 'uncheck'),
(136, 'a00006', 'l00058', 0, '2', 'uncheck'),
(137, 'a00006', 'l00059', 0, '2', 'uncheck'),
(138, 'a00006', 'l00060', 0, '2', 'uncheck'),
(139, 'a00006', 'l00061', 0, '2', 'uncheck'),
(140, 'a00006', 'l00062', 0, '2', 'uncheck'),
(141, 'a00006', 'l00063', 0, '2', 'uncheck'),
(142, 'a00013', 'l00001', 0, '2', 'uncheck'),
(143, 'a00013', 'l00003', 0, '2', 'uncheck'),
(144, 'a00013', 'l00004', 0, '2', 'uncheck'),
(145, 'a00013', 'l00005', 0, '2', 'uncheck'),
(146, 'a00013', 'l00006', 0, '2', 'uncheck');

-- --------------------------------------------------------

--
-- Table structure for table `activity_listitem`
--

CREATE TABLE `activity_listitem` (
  `id` int(11) NOT NULL,
  `a_id` varchar(6) NOT NULL,
  `list_id` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity_listitem`
--

INSERT INTO `activity_listitem` (`id`, `a_id`, `list_id`) VALUES
(1, 'a00001', 'l00001'),
(2, 'a00001', 'l00002'),
(3, 'a00001', 'l00003'),
(4, 'a00001', 'l00004'),
(5, 'a00001', 'l00005'),
(6, 'a00001', 'l00006'),
(7, 'a00001', 'l00007'),
(8, 'a00001', 'l00008'),
(9, 'a00001', 'l00009'),
(10, 'a00001', 'l00010'),
(11, 'a00001', 'l00011'),
(12, 'a00001', 'l00012'),
(13, 'a00001', 'l00013'),
(14, 'a00001', 'l00014'),
(15, 'a00001', 'l00015'),
(16, 'a00001', 'l00016'),
(17, 'a00001', 'l00017'),
(18, 'a00001', 'l00018'),
(19, 'a00001', 'l00019'),
(20, 'a00001', 'l00020'),
(21, 'a00001', 'l00021'),
(22, 'a00001', 'l00022'),
(23, 'a00001', 'l00023'),
(24, 'a00001', 'l00024'),
(25, 'a00001', 'l00025'),
(26, 'a00002', 'l00025'),
(27, 'a00002', 'l00026'),
(28, 'a00002', 'l00027'),
(29, 'a00002', 'l00028'),
(30, 'a00002', 'l00029'),
(31, 'a00002', 'l00030'),
(32, 'a00002', 'l00031'),
(33, 'a00002', 'l00032'),
(34, 'a00002', 'l00033'),
(35, 'a00002', 'l00034'),
(36, 'a00002', 'l00035'),
(37, 'a00002', 'l00036'),
(38, 'a00002', 'l00037'),
(51, 'a00003', 'l00038'),
(52, 'a00003', 'l00039'),
(53, 'a00003', 'l00040'),
(54, 'a00003', 'l00041'),
(55, 'a00003', 'l00042'),
(56, 'a00003', 'l00043'),
(57, 'a00003', 'l00044'),
(58, 'a00003', 'l00045'),
(59, 'a00003', 'l00046'),
(60, 'a00003', 'l00047'),
(61, 'a00004', 'l00043'),
(62, 'a00004', 'l00044'),
(63, 'a00004', 'l00045'),
(64, 'a00004', 'l00046'),
(65, 'a00004', 'l00047'),
(66, 'a00004', 'l00048'),
(67, 'a00004', 'l00049'),
(68, 'a00005', 'l00050'),
(69, 'a00005', 'l00051'),
(70, 'a00005', 'l00052'),
(71, 'a00005', 'l00053'),
(72, 'a00006', 'l00055'),
(73, 'a00006', 'l00056'),
(74, 'a00006', 'l00057'),
(75, 'a00006', 'l00058'),
(76, 'a00006', 'l00059'),
(77, 'a00006', 'l00060'),
(78, 'a00006', 'l00061'),
(79, 'a00006', 'l00062'),
(80, 'a00006', 'l00063'),
(81, 'a00008', 'l00045'),
(82, '', ''),
(84, '', ''),
(85, '', ''),
(86, '', ''),
(89, 'a00010', 'l00001'),
(90, 'a00010', 'l00013'),
(91, 'a00011', 'l00017'),
(92, 'a00011', 'l00018'),
(94, 'a00012', 'l00020'),
(95, 'a00012', 'l00056'),
(96, 'a00012', 'l00057'),
(97, 'a00012', 'l00058'),
(98, 'a00013', 'l00001'),
(99, 'a00013', 'l00003'),
(100, 'a00013', 'l00004'),
(101, 'a00013', 'l00005'),
(102, 'a00013', 'l00006'),
(103, 'a00014', 'l00012'),
(104, 'a00014', 'l00013'),
(105, 'a00014', 'l00017'),
(106, 'a00014', 'l00018');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`) VALUES
(1, 'สถานที่แต่งงาน'),
(2, 'ถ่ายภาพ&วิดิโอ'),
(3, 'ช่างแต่งหน้า'),
(4, 'ชุดแต่งงาน'),
(5, 'ตกแต่งหน้างาน'),
(6, 'แหวนแต่งงาน'),
(7, 'อาหาร&เครื่องดื่ม');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_subject` varchar(250) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_subject`, `comment_text`, `comment_status`) VALUES
(14, 'asdsd', 'fsdf', 1),
(15, 'asdsd', 'dsgfdg', 1),
(16, '???????', '555+', 1),
(17, 'wow', 'asdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `email_id` int(11) NOT NULL,
  `header` varchar(50) NOT NULL,
  `detail` varchar(1000) NOT NULL,
  `attach_file` varchar(100) NOT NULL,
  `e_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`email_id`, `header`, `detail`, `attach_file`, `e_id`) VALUES
(1, 'งานแต่งงานของคุณอักขระและคุณลูกศร', 'เนื่องจากวันที่ 6 พ.ย. 2564 เป็นฤกษ์งามยามดี เป็นวันแต่งงานของ ใบเฟิร์น และ ป๊อปปี้ จึงอยากเรียนเชิญท่านมาเข้าร่วมงานแต่งงานในครั้งนี้เพื่อเป็นสักขีพยาน ณ โรงแรมเทพนคร เวลา 8.00 น. เป็นต้นไป 555', '1109261927-20211025_231517.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `email_list`
--

CREATE TABLE `email_list` (
  `id` int(11) NOT NULL,
  `e_name` varchar(50) NOT NULL,
  `relation` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `e_status` varchar(50) NOT NULL,
  `email_id` int(11) NOT NULL,
  `replying` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_list`
--

INSERT INTO `email_list` (`id`, `e_name`, `relation`, `address`, `e_status`, `email_id`, `replying`) VALUES
(1, 'อทิตยา พันขันธ์', 'เพื่อนเจ้าอาวาส', 'athitayaph@kkumail.com', 'sent', 1, 'accept'),
(2, 'โอเว่นซัง', 'เมียพระสงฆ์', 'atsadawut_cha@kkumail.com', 'sent', 1, 'reject'),
(3, 'วชิรวิทย์ กุลสุทธิชัย', 'dasd', 'wachirawitku@kkumail.com', 'sent', 1, 'accept'),
(4, 'ภูวิศ กิจวิวัฒน์กุล', 'ภรรยาบิดาเจ้าพ่อ', 'puvit@kkumail.com', 'sent', 1, 'reject'),
(5, 'ทดสอบ', 'ทดสอบ', 'wachirawitku@kkumail.com', 'sent', 1, 'reject'),
(6, 'ืทดสอบ1', '', 'wachirawitku@kkumail.com', 'sent', 1, 'notsure'),
(7, 'drew', 'อื่นๆ', 'piano_teerapaopong@hotmail.com', 'sent', 1, ''),
(8, 'โยธกาฐ์ ธีระกระโปก', 'เพื่อนเจ้าบ่าว', 'piano_teerapaopong@hotmail.com', 'sent', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `e_id` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `t_id` int(11) NOT NULL,
  `due_date` date NOT NULL,
  `total_budget` int(7) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`e_id`, `userid`, `t_id`, `due_date`, `total_budget`, `status`) VALUES
(1, '1', 1, '2022-01-22', 600, 1),
(2, '3', 1, '0000-00-00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_event`
--

CREATE TABLE `item_event` (
  `ie_id` int(11) NOT NULL,
  `list_id` varchar(6) NOT NULL,
  `price` int(7) NOT NULL,
  `e_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `item_list`
--

CREATE TABLE `item_list` (
  `list_id` varchar(6) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `amount` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_list`
--

INSERT INTO `item_list` (`list_id`, `item_name`, `amount`) VALUES
('l00001', 'ชุดโต๊ะหมู่บูชา', 1),
('l00002', 'พระพุทธรูป', 1),
('l00003', 'โต๊ะรองมือกราบพระพุทธ 1 คู่', 1),
('l00004', 'ชุดอาสนะสงฆ์แบบพนักพิงสีขาวลายไทย', 1),
('l00005', 'ชุดอาสนะสงฆ์ลายหลุยส์', 1),
('l00006', 'พรมรองพื้นสำหรับพระสงฆ์', 1),
('l00007', 'กระโถน', 1),
('l00008', 'ที่กรวดน้ำ', 1),
('l00009', 'บาตรน้ำมนต์พร้อมที่พรมน้ำมนต์', 1),
('l00010', 'สายสินธ์ุ ธูป เทียน', 1),
('l00011', 'กระถางธูป เชิงเทียน แจกัน', 1),
('l00012', 'ดอกไม้ ธูป เทียน สำหรับถวายพรพุทธ และ พระสงฆ์', 1),
('l00013', 'ชุดน้ำชา', 1),
('l00014', 'ขันข้าวและทัพพีตักบาตร', 1),
('l00015', 'ภาชนะสำหรับถวายพระพุทธ', 1),
('l00016', 'ภาชนะสำหรับถวายพระภูมิ', 1),
('l00017', 'อาหารสำหรับบ่าวสาวตัก', 1),
('l00018', 'หมอนรองกราบสีทอง สำหรับ บ่าวสาว', 1),
('l00019', 'ผู้ดำเนินพิธีสงฆ์', 1),
('l00020', 'ภัตตาหารสำหรับพระสงฆ์ ในชุดภาชนะโตก', 1),
('l00021', 'อาหารพระพุทธ ในชุดสำหรับภาชนะโตก', 1),
('l00022', 'อาหารพระภูมิเจ้าที่', 1),
('l00023', 'ของปัจจัยถวายพระ ', 1),
('l00024', 'สังฆทาน', 1),
('l00025', 'พานขันหมากเอก', 1),
('l00026', 'พานสินสอด', 1),
('l00027', 'พานแหวนหมั้น', 1),
('l00028', 'พานธูปเทียนแพ', 1),
('l00029', 'พานเชิญขันหมาก', 1),
('l00030', 'ต้นกล้วย', 1),
('l00031', 'ต้นอ้อย', 1),
('l00032', 'มะพร้าวอ่อน', 1),
('l00033', 'กล้วย', 1),
('l00034', 'ส้มโอ', 1),
('l00035', 'พานขนมเปี๊ยะ', 1),
('l00036', 'พานขนมจันอับ', 1),
('l00037', 'ร่มภาคเหนือสีขาว สำหรับเจ้าบ่าว', 1),
('l00038', 'สายโซ่ดอกรัก สำหรับกั้นประตูเจ้าสาว', 1),
('l00039', 'พรมรองพื้นสำหรับทำพิธี', 1),
('l00040', 'พานสำหรับเรียงสินสอด', 1),
('l00041', 'มาลัยตุ้มคล้องมือ หรือช่อบูเก้', 1),
('l00042', 'ป้ายชื่อ เจ้าบ่าว - สาว', 1),
('l00043', 'หมอนสำหรับรองไหว้ผู้ใหญ่', 1),
('l00044', 'พานธูปเทียนแพ หรือชุดน้ำชา หรือ สายสิญจน์ผูกข้อมือ', 1),
('l00045', 'พานใส่ของรับไหว้', 1),
('l00046', 'ขันสีทองสำหรับใส่ของรับไหว้', 1),
('l00047', 'พรมรองพื้นสำหรับทำพิธี', 1),
('l00048', 'รคนดูแลพิธีรับไหว้', 1),
('l00049', 'ของรับไหว้', 1),
('l00050', 'ชุดหลั่งน้ำ สีครีม-ทอง', 1),
('l00051', 'อุปกรณ์สำหรับใช้ในพิธีครบชุด', 1),
('l00052', 'มงคลแฝด และ แป้งเจิม', 1),
('l00053', 'พานดอกไม้สดสำหรับน้ำสังข์', 1),
('l00054', 'ป้ายชื่อบ่าวสาว', 1),
('l00055', 'ม่านฉากหลังพิธี', 1),
('l00056', 'เสาดอกไม้ด้านข้าง ', 1),
('l00057', 'มาลัยบ่าวสาว พร้มพานวาง', 1),
('l00058', 'พรมรองพื้นสำหรับพิธีหลั่งน้ำ', 1),
('l00059', 'พานใส่ของชำร่วย', 1),
('l00060', 'ข้าวตอกดอกไม้', 1),
('l00061', 'อุปกรณ์สำหรับส่งตัว', 1),
('l00062', 'น้ำมนต์ สำหรับพรมที่นอน', 1),
('l00063', 'ห้องพิธีส่งตัว พร้อมตกแต่งสวยงาม', 1),
('l00064', 'สร้อยคอศักดิ์สิทธิ์', 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `birthday` date NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `type` varchar(2) NOT NULL,
  `img` varchar(150) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `gender` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `lastname`, `birthday`, `tel`, `email`, `type`, `img`, `username`, `password`, `date`, `gender`) VALUES
(1, 'วชิรวิทย์ ', 'กุลสุทธิชัย', '2000-02-12', '0999170023', 'wachirawitku@kkumail.com', '01', '84866696020210827_164218.png', 'user', '25f9e794323b453885f5181f1b624d0b', '2021-04-17 14:45:46', '01'),
(2, 'ว้าวๆ', 'ซ่า', '2021-04-30', '0999170023', 'Za@mail.com', '02', 'test.png', 'admin', '25f9e794323b453885f5181f1b624d0b', '2021-04-17 14:55:07', '02'),
(3, 'วชิรวิทย์ ', 'บ้าบอ', '2000-02-12', '0893223662', 'khemloveice@gmail.com', '01', '115492476320210418_232723.jpg', 'drewfc', '8dfa7fe54f7891f1011ba288a1a3fc13', '2021-04-18 16:27:23', '01'),
(8, 'test', 'testing', '2021-08-29', '0893223662', 'test@test.com', '01', '84016790320210908_024802.png', 'test', '25f9e794323b453885f5181f1b624d0b', '2021-09-07 19:48:02', '01'),
(9, 'wachirawit', 'kullasuthichai', '2000-02-12', '0999170023', 'yes@hotmail.com', '01', 'user.png', 'wachirawit', '25f9e794323b453885f5181f1b624d0b', '2021-10-16 14:11:41', '01');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `id_store` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `u_id` int(11) NOT NULL,
  `picture` text NOT NULL,
  `detail` text NOT NULL,
  `price` int(11) NOT NULL,
  `gallery1` text NOT NULL,
  `gallery2` text NOT NULL,
  `gallery3` text NOT NULL,
  `gallery4` text NOT NULL,
  `gallery5` text NOT NULL,
  `gallery6` text NOT NULL,
  `status` int(11) NOT NULL,
  `note` text NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `id_store`, `name`, `u_id`, `picture`, `detail`, `price`, `gallery1`, `gallery2`, `gallery3`, `gallery4`, `gallery5`, `gallery6`, `status`, `note`, `create_datetime`) VALUES
(3, 1, 'ทดสอบ8', 1, '1630171350preview.png', 'ddeeกกกกกกกก', 12, '', '', '', '', '', '', 1, '', '2021-09-07 14:27:01'),
(6, 1, 'test2', 1, '1630171698preview.png', 'test', 2, '', '', '', '', '', '', 1, '', '2021-09-30 14:59:07'),
(7, 1, 'gallery', 1, '1630915388i1.jpg', 'gallery', 50, 'g11630912486i1.jpg', 'g21630915315i5.jpg', 'g31630915302i5.jpg', '', '', '', 1, '', '2021-09-30 14:33:09'),
(11, 2, 'แพ็คเกจอุปกรณ์งานแต่งงาน', 2, '1636469334function1.jpg', 'สำหรับพิธีงานเช้า', 2500, 'g11636469334your_pic_name.png', 'g21636469334colored-watercolor-spiral-nebula-galaxy-background_125540-465.jpg', 'g31636469334215113041_345782823620701_8166952386019439361_n.jpg', '', '', '', 2, 'ไม่เหมาะสม', '2021-11-09 18:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `s_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `s_email` varchar(50) NOT NULL,
  `cate_id` int(10) NOT NULL,
  `s_tel` varchar(10) NOT NULL,
  `s_img` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`s_id`, `username`, `password`, `s_name`, `s_email`, `cate_id`, `s_tel`, `s_img`, `date`) VALUES
(1, 'user', '25f9e794323b453885f5181f1b624d0b', 'store', 'store@store.com', 1, '0613254595', '161632991520210827_215418.jpg', '2021-08-27'),
(2, 'store', '25f9e794323b453885f5181f1b624d0b', 'flowerest', 'store_indy@hotmail.com', 1, '0446169072', '136517684720211102_212240.png', '2021-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `traditional`
--

CREATE TABLE `traditional` (
  `t_id` int(11) NOT NULL,
  `trad_name` varchar(50) NOT NULL,
  `trad_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `traditional`
--

INSERT INTO `traditional` (`t_id`, `trad_name`, `trad_img`) VALUES
(1, 'วัฒนธรรมไทย', '41589094720210418_021445.jpg'),
(2, 'วัฒนธรรมจีน', '142000061320210418_023201.jpg'),
(3, 'วัฒนธรรมสากล', '170043857820210418_030220.jpg'),
(4, 'อิสาน', '155396974820211109_223817.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `activity_event`
--
ALTER TABLE `activity_event`
  ADD PRIMARY KEY (`ae_id`);

--
-- Indexes for table `activity_listitem`
--
ALTER TABLE `activity_listitem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `email_list`
--
ALTER TABLE `email_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `item_event`
--
ALTER TABLE `item_event`
  ADD PRIMARY KEY (`ie_id`);

--
-- Indexes for table `item_list`
--
ALTER TABLE `item_list`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `traditional`
--
ALTER TABLE `traditional`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_event`
--
ALTER TABLE `activity_event`
  MODIFY `ae_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `activity_listitem`
--
ALTER TABLE `activity_listitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_list`
--
ALTER TABLE `email_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item_event`
--
ALTER TABLE `item_event`
  MODIFY `ie_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `traditional`
--
ALTER TABLE `traditional`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
