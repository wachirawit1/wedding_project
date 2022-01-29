-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2022 at 04:59 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

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
  `a_detail` text NOT NULL,
  `t_id` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`a_id`, `a_name`, `a_detail`, `t_id`) VALUES
('a0000', 'การเตรียมตัวก่อนวันแต่ง', 'เป็นการเตรียมอุปกรณ์ก่อนวันแต่ง', '1'),
('a0001', 'พิธีแห่ขันหมาก', '- ตั้งขบวนขันหมาก เรียงลำดับ ดังนี้ พานขันหมากเอก (นิยมให้ญาติผู้ใหญ่ฝ่ายชายเป็นผู้ถือ) พานสินสอดทองหมั้น (นิยมให้พ่อและแม่เจ้าบ่าวเป็นผู้ถือ) พานแหวนหมั้น (นิยมให้ญาติผู้พี่หรือน้องเจ้าบ่าวเป็นผู้ถือ) พานธูปเทียนแพ (นิยมให้เจ้าบ่าวเป็นผู้ถือ) พานต้นกล้วย ต้นอ้อย (นิยมให้เพื่อนเจ้าบ่าวเป็นผู้ถือ) และพานขันหมากโท เช่น พานไก่ต้ม พานหมูต้ม พานวุ้นเส้น พานขนมจันอับ พานขนมมงคล เป็นต้น \n\n- เมื่อขบวนขันหมากเคลื่อนเข้ามาสู่เขตบริเวณบ้านเจ้าสาว จะเจอกับการกั้นประตูขวางขบวนขันหมากไม่ให้เข้าไปในเรือนเจ้าสาว โดยส่วนใหญ่การกั้นประตูมักจะทำกัน 3 ครั้ง ครั้งแรกใช้ผ้ากางกั้นไว้เรียกว่า “ประตูชัย”  ประตูที่สองใช้ผืนแพรเรียกว่า “ประตูเงิน” สุดท้ายกั้นด้วยสายสร้อยทองเรียกว่า “ประตูทอง” ในปัจจุบันเพื่อความสะดวก นิยมใช้เป็นเข็มขัดนาค เงิน ทอง สายสร้อยทอง ลูกปัด มุก พวงมาลัยดอกไม้ เป็นต้น \n\n- ในแต่ละประตู เถ้าแก่ของเจ้าบ่าวจะต้องเจรจาเพื่อมอบของขวัญ (ส่วนมากนิยมใช้ซองใส่เงิน) ก่อนจะผ่านประตูไปได้ ซึ่งมูลค่าของขวัญมักจะต้องสูงขึ้นตามลำดับด้วย เมื่อขบวนขันหมากผ่านเข้ามาจนถึงตัวบ้านแล้ว ฝ่ายเจ้าสาวจะต้องส่งเด็กผู้หญิงหรือหญิงสาวที่ยังไม่ได้แต่งงานถือพานเชิญขันหมาก ออกมาต้อนรับเถ้าแก่ฝ่ายเจ้าบ่าวเพื่อเป็นการรับขันหมาก และเชิญให้เข้าไปข้างใน', '1'),
('a0002', 'พิธีสงฆ์', '- เมื่อพระสงฆ์มาถึงและนั่งที่อาสนะเรียบร้อยแล้ว คู่บ่าวสาวจะจุดธูปเทียนบูชาพระรัตนตรัย (เจ้าบ่าวนั่งทางฝั่งขวามือของเจ้าสาว) อาราธนาศีล และรับศีล 5 รวมไปจนถึงการถวายขันและเทียนเพื่อให้พระสงฆ์ทำน้ำพระพุทธมนต์ \r\n\r\n- จากนั้นพระสงฆ์จะเจริญพระพุทธมนต์ เมื่อพระสงฆ์เจริญพระพุทธมนต์ไปจนถึงบทมงคลสูตร เจ้าพิธีจะจุดเทียนชนวนเพื่อเป็นการขอให้พระสงฆ์ทำน้ำพระพุทธมนต์สำหรับใช้ในพิธีรดน้ำสังข์ \r\n\r\n- ลำดับถัดไป จะเป็นการทำบุญร่วมชาติ ตักบาตรร่วมขัน ชาติหน้าจะได้เกิดมาคู่กันอีก โดยให้คู่บ่าวสาวให้ใช้ทัพพีเดียวกัน ตักบาตรพร้อมกันค่ะ โดยในการตักบาตรนี้ มีความเชื่อว่า ถ้าใครจับที่คอทัพพี คนนั้นจะได้เป็นใหญ่เหนือคู่ของตน หรือได้เป็นผู้นำครอบครัว แต่เพื่อความเสมอภาค ไม่ให้ใครใหญ่เหนือกว่าใคร คู่บ่าวสาวอาจแก้เคล็ดโดยการการผลัดกันจับที่คอทัพพีได้ค่ะ \r\n\r\n- เมื่อตักบาตรเสร็จแล้ว จะเป็นการถวายภัตตาหารเช้า / เพล โดยเริ่มจากถวายอาหารแด่พระพุทธ แล้วจึงประเคนอาหารคาวหวานถวายแด่พระสงฆ์ \r\n\r\n- พระสงฆ์อนุโมทนา และขึ้นบทสวด “ยะถา.. สัพพี..” ในระหว่างนี้ คู่บ่าวสาวจะกรวดน้ำอุทิศส่วนบุญส่วนกุศลให้กับเทพยดา เจ้ากรรมนายเวร บรรพบุรุษผู้ล่วงลับ \r\n\r\n- จากนั้นจะถึงพิธีในขั้นตอนสุดท้าย พระสงฆ์จะเจริญชัยมงคลคาถา พร้อมประพรมน้ำมนต์และเจิมหน้าผากให้แก่คู่บ่าวสาวเป็นอันเสร็จพิธี', '1'),
('a0003', 'พิธีสู่ขอและตรวจนับสินสอด', '- ให้เถ้าแก่ หรือคุณพ่อคุณแม่ฝ่ายชายกล่าวแนะนำตนเอง และกล่าวสู่ขอเจ้าสาวให้กับเจ้าบ่าว โดยได้นำสินสอดทองหมั้นมาสู่ขอตรงตามจำนวนที่ตกลงกันไว้ และเชิญคุณแม่เจ้าสาวตรวจนับสินสอด ทางด้านเถ้าแก่ฝ่ายหญิงและคุณแม่เจ้าสาวก็จะพิจารณาดูสินสอดทองหมั้นพอเป็นพิธี \n\r\n- เสร็จแล้วคุณแม่เจ้าสาวจะอนุญาตให้เจ้าบ่าวไปรับเจ้าสาวมายังพิธีการ  \n\r\n- จากนั้นเจ้าสาวเดินเข่าขึ้นเวที โดยให้ขึ้นเวทีทางด้านพ่อแม่เจ้าบ่าว แล้วกราบพ่อแม่เจ้าบ่าว 3 ครั้ง แล้วคลานเข่าไปยังพ่อแม่เจ้าสาว กราบพ่อแม่เจ้าสาวแล้วหันหน้าออกมาด้านหน้าเวที \n\r\n- เรียนเชิญแม่เจ้าสาวมาตรวจนับสินสอดอีกครั้ง โดยนิยมให้เพื่อนเจ้าสาวมาช่วยแก้ผ้าห่อสินสอด และรวบรวมใส่พานให้แม่เจ้าสาว โดยนำใบพลู ใบหมาก ใบเงิน ใบทอง ใบรัก มาจัดเรียงในพาน วางอยู่บนผ้าแดงหรือผ้าเงินผ้าทอง และนำสินสอด เงิน ทองมาวางจัดเรียงรวมกันในพานให้สวยงาม \n\r\n- จากนั้นจะให้แม่เจ้าสาวนำถั่วงา ข้าวตอก ดอกไม้จากพานสินสอดมาโรยในพานวางสินสอด พร้อมให้พร ปัจจุบันนิยมให้ญาติผู้ใหญ่บนเวที ช่วยกันโปรยที่ละท่านเพื่อเป็นสิริมงคลด้วย \n\r\n- หลังจากนั้นก็จะให้แม่เจ้าสาว ทำการมัดสินสอดทองหมั้นทั้งหมด แล้วแบกขึ้นบ่า พร้อมกับทำท่าว่ามันหนักมาก เดินบนเวที ก่อนที่จะส่งให้เพื่อนเจ้าสาวไปเก็บ เป็นอันจบพิธีสู่ขอ', '1'),
('a0004', 'พิธีหมั้น', '- เจ้าสาวกราบเจ้าบ่าวหนึ่งครั้ง ที่ตักหรือระดับอก โดยเจ้าบ่าวจะต้องยกมือพนมรับไหว้เจ้าสาวด้วย \r\n\r\n- จากนั้นเจ้าบ่าวจะสวมแหวนให้เจ้าสาวที่นิ้วนางข้างซ้าย \r\n\r\n- เจ้าสาวกราบเจ้าบ่าวอีกครั้ง เพื่อเป็นการขอบคุณ \r\n\r\n- หลังจากนั้นเจ้าสาวจะสวมแหวนให้เจ้าบ่าวที่นิ้วนางข้างซ้ายเช่นกัน\r\n', '1'),
('a0005', 'พิธีรับไหว้หรือผูกข้อมือ', '- คู่บ่าวสาวจะยกพานธูปเทียนแพคลานเข้าไปกราบคุณพ่อ คุณแม่ ซึ่งผู้ใหญ่จะรับไหว้คู่บ่าวสาวพร้อมทั้งกล่าวให้ศีลให้พร แล้วจึงหยิบด้ายมงคลหรือสายสิญจน์มาผูกข้อมือให้คู่บ่าวสาวเป็นการรับขวัญ \n\r\n- จากนั้นคู่บ่าวสาวจะยกพานธูปเทียนแพให้ผู้ใหญ่ \n\r\n- หลังจากผู้ใหญ่รับพานแล้ว ก็จะวางเงินในพานให้คู่บ่าวสาวเพื่อเป็นเงินทุน  \n\r\n- ทั้งนี้ ญาติผู้ใหญ่จะผลัดเปลี่ยนกันไปทำพิธีรับไหว้อย่างต่อเนื่อง โดยจะไล่เรียงไปตามลำดับความอาวุโส เช่น ปู่ ย่า ตา ยาย ลุง ป้า นา อา เป็นต้น ส่วนใหญ่ พ่อแม่ของฝ่ายหญิงจะให้เกียรติทางฝ่ายชายทำพิธีรับไหว้ก่อน', '1'),
('a0006', 'พิธีรดน้ำสังข์ หรือ พิธีหลั่งน้ำพระพุทธมนต์และประสาทพร', '- คู่บ่าวสาวนั่งที่ตั่งรดน้ำสังข์ เจ้าบ่าวจะนั่งด้านขวามือของเจ้าสาว ซึ่งจะมีหมอนสำหรับรองมือ และพานรองรับน้ำสังข์ \n\r\n- ประธานในพิธี จะทำการคล้องพวงมาลัย และสวมมงคลแฝดที่ได้ผ่านพิธีมงคลมาเรียบร้อยลงบนศีรษะของบ่าวสาว แล้วจึงจะหลั่งน้ำอวยพรให้บ่าวสาว ตามด้วยพ่อแม่ ญาติผู้ใหญ่ ผู้ร่วมงานที่เป็นผู้ใหญ่ หรือแขกอื่นๆ เข้ารดน้ำตามลำดับความอาวุโส \n\r\n- หลังจากเสร็จพิธีรดน้ำสังข์ จึงทำการปลดสายมงคลออกจากศีรษะของคู่บ่าวสาว จากนั้นรวบมือคู่บ่าวสาวให้ลุกขึ้นพร้อมกัน เป็นอันเสร็จพิธี ', '1'),
('a0007', 'พิธีปูที่นอนและพิธีส่งตัวเข้าหอ (พิธีร่วมเรียงเคียงหมอน) ขั้นตอนพิธีปูที่นอน', '- พ่อแม่ฝ่ายเจ้าสาวจะเชิญคู่สามี-ภรรยาที่เคารพนับถือ มีชีวิตครอบครัวที่ราบรื่น อบอุ่นสมบูรณ์ อยู่กินกันมาจนแก่เฒ่า และมีลูกหลานสืบสกุล มาทำหน้าที่ปูที่นอนในเรือนหอให้กับคู่บ่าวสาวเพื่อความเป็นสิริมงคล \r\n\r\n- โดยผู้ใหญ่ที่ทำพิธีปูที่นอนนี้จะเป็นผู้จัดเรียงหมอน 2 ใบ แล้วปัดที่นอนพอเป็นพิธี จากนั้นจัดวางข้าวของประกอบพิธีลงบนที่นอน อันได้แก่ หินบดยา (หมายถึงความหนักแน่น) ไม้เท้า (หมายถึงอายุยืนยาว) ฟักเขียว (หมายถึงความอยู่เย็นเป็นสุข) แมวคราว (หมายถึงการอยู่กับเหย้าเฝ้ากับเรือน) พานใส่ถุงข้าวเปลือก งา ถั่วทองหรือถั่วเขียว (หมายถึงความเจริญงอกงาม) ขันใส่น้ำฝน (หมายถึงความเย็น สดชื่น ชุ่มฉ่ำ และสามัคคีรักไคร่กลมเกลียว) ไก่ขาว (หมายถึงขยันหมั่นเพียร) ขันน้ำมนต์ พร้อมที่พรมน้ำมนต์ ขันบรรจุข้าวตอกดอกไม้ ดอกรัก มะลิ กุหลาบ หรือบางแห่งอาจเพิ่มถุงใส่เงินทองด้วย \r\n\r\n- ในระหว่างจัดวางของ ผู้ใหญ่ทั้งสองจะให้ศีลให้พร เพื่อเป็นสิริมงคล และโปรยข้าวตอกดอกไม้ลงบนที่นอน \r\n\r\n- จากนั้นจึงให้ผู้ใหญ่ทั้งคู่นอนลงบนเตียงนั้น ฝ่ายหญิงจะนอนทางซ้าย ฝ่ายชายนอนลงทางขวา และกล่าวถ้อยคำอวยพรที่ เป็นมงคลต่อชีวิตคู่ แล้วจึงลุกจากเตียงเป็นอันเสร็จพิธี\n\r\nขั้นตอนส่งตัวพิธีส่งตัวคู่บ่าวสาวเข้าหอ \n\r\n- ก่อนที่เจ้าสาวจะเข้าห้องหอ เจ้าสาวต้องกราบลาพ่อแม่และญาติผู้ใหญ่ฝ่ายของตัวเอง เพื่อเป็นการขอพร \n\r\n- เมื่อได้ฤกษ์แล้ว แม่เจ้าสาวจะเป็นคนพาเจ้าสาวมามอบให้กับเจ้าบ่าว พร้อมพูดจาฝากฝังให้ช่วยดูแล \n\r\n- จากนั้นญาติผู้ใหญ่ รวมทั้งผู้ใหญ่ที่ทำพิธีปูที่นอน จะกล่าวให้โอวาทเกี่ยวกับการใช้ชีวิตคู่ เพื่อความเป็นสิริมงคล และอาจอบรมให้รู้จักหน้าที่ของสามี-ภรรยาที่ดี ที่ต้องพึ่งพาอาศัยกัน \n\r\n- ปิดท้ายพิธีด้วยการให้คู่บ่าว-สาวนอนลงบนที่นอน\r\n\r\n\r\n', '1');

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
  `ae_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity_event`
--

INSERT INTO `activity_event` (`ae_id`, `a_id`, `list_id`, `price`, `e_id`, `ae_status`) VALUES
(1, 'a0001', 'l0001', 200, '1', 'check'),
(2, 'a0001', 'l0002', 0, '1', 'uncheck'),
(3, 'a0001', 'l0003', 0, '1', 'uncheck'),
(4, 'a0001', 'l0004', 0, '1', 'uncheck'),
(5, 'a0001', 'l0005', 0, '1', 'uncheck'),
(6, 'a0001', 'l0006', 0, '1', 'uncheck'),
(7, 'a0001', 'l0007', 0, '1', 'uncheck'),
(8, 'a0001', 'l0008', 0, '1', 'uncheck'),
(9, 'a0002', 'l0009', 0, '1', 'uncheck'),
(10, 'a0002', 'l0010', 0, '1', 'uncheck'),
(11, 'a0002', 'l0011', 0, '1', 'uncheck'),
(12, 'a0002', 'l0012', 0, '1', 'uncheck'),
(13, 'a0002', 'l0013', 0, '1', 'uncheck'),
(14, 'a0002', 'l0014', 0, '1', 'uncheck'),
(15, 'a0002', 'l0015', 0, '1', 'uncheck'),
(16, 'a0002', 'l0016', 0, '1', 'uncheck'),
(17, 'a0002', 'l0017', 0, '1', 'uncheck'),
(18, 'a0002', 'l0018', 0, '1', 'uncheck'),
(19, 'a0002', 'l0019', 0, '1', 'uncheck'),
(20, 'a0002', 'l0020', 0, '1', 'uncheck'),
(21, 'a0002', 'l0021', 0, '1', 'uncheck'),
(22, 'a0002', 'l0022', 0, '1', 'uncheck'),
(23, 'a0002', 'l0023', 0, '1', 'uncheck'),
(24, 'a0002', 'l0024', 0, '1', 'uncheck');

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
(3, 'a0001', 'l0001'),
(4, 'a0001', 'l0002'),
(5, 'a0001', 'l0003'),
(6, 'a0001', 'l0004'),
(7, 'a0001', 'l0005'),
(8, 'a0001', 'l0006'),
(9, 'a0001', 'l0007'),
(10, 'a0001', 'l0008'),
(11, 'a0002', 'l0009'),
(12, 'a0002', 'l0010'),
(13, 'a0002', 'l0011'),
(14, 'a0002', 'l0012'),
(15, 'a0002', 'l0013'),
(16, 'a0002', 'l0014'),
(17, 'a0002', 'l0015'),
(18, 'a0002', 'l0016'),
(19, 'a0002', 'l0017'),
(20, 'a0002', 'l0018'),
(21, 'a0002', 'l0019'),
(22, 'a0002', 'l0020'),
(23, 'a0002', 'l0021'),
(24, 'a0002', 'l0022'),
(25, 'a0002', 'l0023'),
(26, 'a0002', 'l0024');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(50) NOT NULL,
  `cate_pic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`, `cate_pic`) VALUES
(1, 'สถานที่แต่งงาน', 'weddingplace.png'),
(2, 'ถ่ายภาพ&วิดิโอ', 'photo&video.png'),
(3, 'ช่างแต่งหน้า', 'makeup.png'),
(4, 'ชุดแต่งงาน', 'dress.png'),
(5, 'ตกแต่งหน้างาน', 'decorate.png'),
(6, 'แหวนแต่งงาน', 'ring.png'),
(7, 'อาหาร', 'food.png');

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
(15, 'asdsd', 'dsgfdg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `email_id` int(11) NOT NULL,
  `header` varchar(50) NOT NULL,
  `detail` text NOT NULL,
  `e_id` int(11) NOT NULL,
  `attach_file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`email_id`, `header`, `detail`, `e_id`, `attach_file`) VALUES
(1, 'ทดสอบส่งอีเมลกับไฟล์แนบ', 'cvxv', 1, '1003781502-20220128_223055.png');

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
  `replying` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_list`
--

INSERT INTO `email_list` (`id`, `e_name`, `relation`, `address`, `e_status`, `email_id`, `replying`) VALUES
(1, 'วชิรวิทย์ กุลสุทธิชัย', 'พ่อเจ้าสาว', 'wachirawitku@kkumail.com', '', 1, ''),
(2, 'สิงโต ทองคำ', '-', 'goldenlion@gmail.com', '', 1, ''),
(3, 'โอ๋เอ๋ ดุ๊กดิ๊ก', 'เพื่อนเจ้าบ่าว', 'oadukdig@hotmail.com', '', 1, ''),
(4, 'บิลลี่ อินทร์', '-', 'billy_intr@outlook.com', '', 1, ''),
(5, 'ดริว ดริว', '-', 'wachirawitzy@gmail.com', '', 1, '');

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
(1, '1', 1, '2022-03-12', 200, 1);

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
  `amount` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_list`
--

INSERT INTO `item_list` (`list_id`, `item_name`, `amount`) VALUES
('l0001', 'พานขันหมาก', '1'),
('l0002', 'พานสิดสอดทองหมั้น', '1'),
('l0003', 'พานแหวนหมั้น', '1'),
('l0004', 'พานธูปเทียนแพ', '1'),
('l0005', 'พานต้นกล้วย', '1 คู่'),
('l0006', 'พานต้นอ้อย', '1 คู่'),
('l0007', 'พานขันหมากโท', '1'),
('l0008', 'พานเชิญขันหมาก', '1'),
('l0009', 'ชุดโต๊ะหมู่บูชา', '1'),
('l0010', 'แจกันดอกไม้', '2 ชุด'),
('l0011', 'ธูป', '3 ดอก'),
('l0012', 'เทียนสีเหลือง', '2'),
('l0013', 'เทียนต่อ', '1'),
('l0014', 'เชิงเทียนและกระถางธูป', '1'),
('l0015', 'อาสนะ', '9 ที่'),
('l0016', 'ที่กรวดน้ำ กระโถน แก้วน้ำ ทิชชู่', '1 ชุด'),
('l0017', 'ขันน้ำมนต์และที่สำหรับประพรมน้ำมนต์', '1 ชุด'),
('l0018', 'แป้งเจิม', '1'),
('l0019', 'ชุดเครื่องเซ่นสำหรับพระพุทธและพระภูมิเจ้าที่', '1'),
('l0020', 'อาหารสำหรับตักบาตร ขันข้าว ทัพพี', '1 ชุด'),
('l0021', 'ดอกไม้ธูปเทียน ถวายพระ', '9 ชุด'),
('l0022', 'พานใส่ของถวายพระ', '1'),
('l0023', 'ด้ายสายสิญจน์สำหรับทำพิธี', '1'),
('l0024', 'สายสิญจน์ที่ทำเป็นมงคลคู่ หรือมงคลแฝด', '1');

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
(7, 1, 'gallery', 1, '1630915388i1.jpg', 'gallery', 50, 'g11630912486i1.jpg', 'g21630915315i5.jpg', 'g31630915302i5.jpg', '', '', '', 1, '', '2021-09-30 14:33:09');

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
(1, 'user', '25f9e794323b453885f5181f1b624d0b', 'store', 'store@store.com', 1, '0613254595', '161632991520210827_215418.jpg', '2021-08-27');

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
(3, 'วัฒนธรรมสากล', '170043857820210418_030220.jpg');

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
  MODIFY `ae_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `activity_listitem`
--
ALTER TABLE `activity_listitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_list`
--
ALTER TABLE `email_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `traditional`
--
ALTER TABLE `traditional`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
