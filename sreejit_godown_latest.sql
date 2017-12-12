-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2017 at 12:40 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sreejit_godown_latest`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary`
--

CREATE TABLE `employee_salary` (
  `emp_sal_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `present_sal` float NOT NULL,
  `prev_sal` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_salary`
--

INSERT INTO `employee_salary` (`emp_sal_id`, `emp_id`, `present_sal`, `prev_sal`) VALUES
(1, 1, 10000, 0),
(2, 1, 6000, 10000),
(3, 2, 7000, 0),
(4, 3, 7000, 0),
(5, 4, 7000, 0),
(6, 5, 7000, 0),
(7, 6, 7000, 0),
(8, 7, 7000, 0),
(9, 8, 7000, 0),
(10, 9, 7000, 0),
(11, 10, 7000, 0),
(12, 11, 7000, 0),
(13, 12, 7000, 0),
(14, 13, 7000, 0),
(15, 14, 8000, 0),
(16, 15, 10000, 0),
(17, 16, 13000, 0),
(18, 17, 7000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `salary_detail`
--

CREATE TABLE `salary_detail` (
  `salary_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `salary_date` varchar(250) NOT NULL,
  `salary_amt` float NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salary_detail`
--

INSERT INTO `salary_detail` (`salary_id`, `emp_id`, `salary_date`, `salary_amt`, `status`) VALUES
(1, 1, '2017-04-21', 10000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `td_assign_route`
--

CREATE TABLE `td_assign_route` (
  `asign_id` int(11) NOT NULL,
  `empname` varchar(100) NOT NULL,
  `rname` varchar(100) NOT NULL,
  `rdate` varchar(100) NOT NULL,
  `addate` varchar(100) NOT NULL,
  `adby` varchar(150) NOT NULL,
  `active` int(11) NOT NULL,
  `active_date` varchar(200) NOT NULL,
  `inactive_date` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_assign_route`
--

INSERT INTO `td_assign_route` (`asign_id`, `empname`, `rname`, `rdate`, `addate`, `adby`, `active`, `active_date`, `inactive_date`) VALUES
(1, '1', '1', '2017-04-21', '2017-04-21', 'superadmin', 0, '2017-04-21', '0'),
(2, '2', '1', '2017-04-01', '2017-04-22', 'superadmin', 1, '2017-04-22', '0');

-- --------------------------------------------------------

--
-- Table structure for table `td_bank`
--

CREATE TABLE `td_bank` (
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `acc_no` varchar(255) NOT NULL,
  `ifsc_no` varchar(100) NOT NULL,
  `micr_no` varchar(100) NOT NULL,
  `addate` varchar(255) NOT NULL,
  `adby` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_bank`
--

INSERT INTO `td_bank` (`bank_id`, `bank_name`, `branch_name`, `acc_no`, `ifsc_no`, `micr_no`, `addate`, `adby`) VALUES
(1, 'Bank Of Maharashtra ', 'Ruby park', '45236113', '1252216', '652124', '2017-05-05', 'superadmin'),
(2, 'Bank Of India', 'Kalikapur', '45561131', '122336141', '546211', '2017-05-05', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `td_client`
--

CREATE TABLE `td_client` (
  `cl_id` int(11) NOT NULL,
  `clname` varchar(255) NOT NULL,
  `clemail` varchar(255) NOT NULL,
  `clphn` varchar(255) NOT NULL,
  `clpan` varchar(255) NOT NULL,
  `cladd` text NOT NULL,
  `addate` varchar(255) NOT NULL,
  `adby` varchar(255) NOT NULL,
  `cgst` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_client`
--

INSERT INTO `td_client` (`cl_id`, `clname`, `clemail`, `clphn`, `clpan`, `cladd`, `addate`, `adby`, `cgst`) VALUES
(1, 'Somenath Stores ', 'ss@mail.com', '9831273230', 'A1889052', '                                                                                               40 Boisnab Ghata Road, Kol- 47\r\n \r\n                                                                                               ', '2017-04-21', 'superadmin', '7288803'),
(2, 'Matri Bhandar ', 'mb@mail.com', '9903661439', 'A80008943', 'B 35, Laxmi Narayan Colony, Kol- 47\r\n\r\n', '2017-04-21', 'superadmin', '859302589'),
(3, 'The Diffrent', 'td@mail.com', '8017897324', 'AJ8005932S', 'B/C Laxmi Narayan Colony, Kol-47\r\n', '2017-04-21', 'superadmin', '98648721'),
(4, 'Laxmi Narayan Bhandar ', 'ln@mail.com', '9903690172', 'CA872968J', 'C/1, Laxmi Narayan Bhandar , Kol- 47\r\n', '2017-04-21', 'superadmin', '9826728'),
(5, 'Narayan Bhandar ', 'nb@mail.com', '9831551867', 'AJ5948027', '400,/ A.1B. N.S.C.Bose Road, Kol-47', '2017-04-21', 'superadmin', '76982406'),
(6, 'Bhagne Stores ', 'bs@mail.com', '9432434026', 'AJ895697C', '400/A.B. N.S.C.Bose Road, Kol-47', '2017-04-21', 'superadmin', '89547809'),
(7, 'Basic Need', 'bn@mail.com', '8981651527', 'Aj20C894D', 'A/18, Laxmi Narayan Colony, Kol- 47', '2017-04-21', 'superadmin', '7894367'),
(8, 'Joy Guru Bhandar', 'jg@mail.com', '9874720226', 'CJ8794432D', '5A, Boisnab Ghata By-Lane, Kol-47', '2017-04-21', 'superadmin', '78958067'),
(9, 'Basant Stores', 'bs@mail.com', '9831885131', 'CD897540A', '5/A, Boisnab Ghata By-Lane, Kol-47', '2017-04-21', 'superadmin', '89456320'),
(10, 'Mitra Variety ', 'mv@mail.com', '9830329016', 'DC89560167', '348/6411, N.S.C. Bose Road, 1/269,Naktala, Kol-47', '2017-04-21', 'superadmin', '598743210Q'),
(11, 'Anamika Stores ', 'as@mail.com', '7278965000', 'AJ78725689C', 'N.S.C.Bose Road, Kol-47', '2017-04-21', 'superadmin', '78729560'),
(12, 'Ajoy Stores', 'as@mail.com', '9038733648', 'CJ78794580', '124, Usha Park, Kol- 84', '2017-04-21', 'superadmin', '7856982'),
(13, 'Matri Bhandar 2', 'mbi@gmail.com', '8981064452', 'DJ587603C8', 'No.14, Roy Nagar, Naskarpara, Kol- 70', '2017-04-21', 'superadmin', '78985601'),
(14, 'Avishek Stores ', 'av@mail.com', '787295610', 'CG781950', 'Roy Nagar , Kol-70', '2017-04-21', 'superadmin', '78789642'),
(15, 'D.Pandit', 'dp@mail.com', '8478964532', 'DJ7895601C', 'Roy Nagar, Madhupara, Kol-70', '2017-04-21', 'superadmin', '56789340'),
(16, 'Rashi Stores', 'rs@mail.com', '91638318', 'CC7890259A', 'P/125,Suvada Apartment, Kol- 84', '2017-04-21', 'superadmin', '967483201'),
(17, 'Kalpana Stores', 'ks@mail.com', '9163826313', 'AJ78956013', 'P/61Bramhapur,Hari Sabhar math, Kol-84', '2017-04-21', 'superadmin', '72789546'),
(18, 'Mrittunjoy Stores', 'ms@mail.com', '9748448714', 'KJ8975607', 'P/43,Ram Krishna pally', '2017-04-21', 'superadmin', '89745601'),
(19, 'Mintu Stores ', 'ms@mail.com', '8013924153', 'MJ8956703', 'No.4, Vivekananda Sarani, Natun Bazar, Kol-70', '2017-04-21', 'superadmin', '7820146'),
(20, 'Naag Stores ', 'ns@mail.com', '9230491150', 'AJ7803215', 'South Roy Nagar, Natun Bazar, Kol-70', '2017-04-21', 'superadmin', '18750359'),
(21, 'Neelas ', 'ns@mail.com', '7828950365', 'AA58970214', 'South Roy nagar, Ram Krishna pally', '2017-04-21', 'superadmin', '72859630'),
(22, 'Maa Kali Stores ', 'mk@mail.com', '787095602', 'Dj786905', 'South Roy Nagar Natun Bazar', '2017-04-21', 'superadmin', '78560234'),
(23, 'Ravi Stores ', 'rfs@mail.com', '9038919248', 'CJ78906352', '974, South Roy Nagar, Kol-70', '2017-04-21', 'superadmin', '78906657'),
(24, 'Pintu Stores', 'ps@mail.com', '3328270292', 'GJ8790265', 'Roy nagar,177 postal park', '2017-04-21', 'superadmin', '782546019'),
(25, 'J.K. Stores', 'jk@mail.com', '7878569045', 'AA56012489', 'Roy nagar', '2017-04-21', 'superadmin', '0216789'),
(26, 'Sree Durga Bhandar ', 'sd@mail.com', '9836770330', 'DJ785602', 'Boral Main Road, Ata Bagan, Kol-84', '2017-04-21', 'superadmin', '78560423'),
(27, 'Joy Durga Bhandar', 'jd@mail.com', '3324351419', 'AC785601', 'Naskarpur, Kali tala, Kol-155', '2017-04-21', 'superadmin', '0189201'),
(28, 'Deep Stores ', 'ds@mail.com', '9874153789', 'CJ85690246', 'North Sreepur Charak tala, Kol154', '2017-04-21', 'superadmin', '21059643'),
(29, 'Sree Gobindo Bhandar', 'sg@mail.com', '9830938337', 'ED56780164', 'Boral, Rong Coll, Kol-154\r\n', '2017-04-21', 'superadmin', '78245690'),
(30, 'Laxmi Bhandar 2', 'lb@mail.com', '8276895514', 'FJ89054689', 'Bramhapur, Nath Para, Kol-84', '2017-04-21', 'superadmin', '7895642'),
(31, 'Suresh Stores', 'ss@mail.com', '9831322078', 'FD89720561', '193 A, Bidhanpally', '2017-04-21', 'superadmin', '89630125'),
(32, 'Debanjali Stores', 'dj@mail.com', '9874128925', 'JC78956023', '214, Bidhanpally, Goria, Kol-84\r\n', '2017-04-21', 'superadmin', '956013678'),
(33, 'Das Bhandar ', 'db@mail.com', '9874786762', 'FJ28569016', '117, Bidhanpally, Kol-', '2017-04-21', 'superadmin', '89635201'),
(34, 'Matri Bhandar 3', 'mb3@mail.com', '9163231175', 'CE956013578', 'A-25, Kamda hari narkel bagan, Kol-', '2017-04-21', 'superadmin', '96745803'),
(35, 'Ram Thakur Stores ', 'rt@mail.com', '9831249027', 'EF78956013', 'A-25, Kamda hari narkel bagan, Kol-84', '2017-04-21', 'superadmin', '789560345'),
(36, 'Narayan Sriti', 'ns@mail.com', '9239226212', 'YZ89720681', 'Goria, hat bazar', '2017-04-21', 'superadmin', '98360542'),
(37, 'Goutam Halder', 'gh@mail.com', '9593127289', 'ER89456230', 'Goria hat bazar', '2017-04-21', 'superadmin', '2613654'),
(38, 'Roy Stores', 'rs@mail.com', '8981110667', 'EW78902364', 'A/38, Kamda hari santi sarani, Kol-84', '2017-04-21', 'superadmin', '6985012'),
(39, 'Nemai Saha', 'ns@mail.com', '9831343918', 'WE98056432', 'Goria, hat bazar', '2017-04-21', 'superadmin', '2586014'),
(40, 'Bhumi Stores', 'bs@mail.com', '9830233280', 'BJ89602789', 'Fartabad, Chal pally', '2017-04-21', 'superadmin', '986035523'),
(41, 'Joy Santoshi Maa Bhandar', 'js@mail.com', '9748491173', 'QE8906523', '62,Boral main road', '2017-04-21', 'superadmin', '89560125'),
(42, 'Ram Stores ', 'rs@mail.com', '8420222729', 'RT56983201', '78, Boral main road, Kol-84', '2017-04-21', 'superadmin', '986530125'),
(43, 'Gopal Bhandar', 'gb@mail.com', '89637056', 'UT0256973', 'Boral T.S. Road', '2017-04-21', 'superadmin', '74725603'),
(44, 'Pankaj Stores', 'pj@mail.com', '9038313302', 'YG89740624', 'Boral main road, Beltala bazar, ', '2017-04-21', 'superadmin', '9634857'),
(45, 'Poltu Shop', 'ps@mail.com', '9831984416', 'CJ18967502', 'Gasgodown, P.D. Road. Kol-47', '2017-04-22', 'superadmin', '98746351'),
(46, 'Babu Stores', 'bs@mail.com', '8620802339', 'CK789650', '20, R.R.M Road, Maity Para, Kol-41', '2017-04-22', 'superadmin', '98563021'),
(47, 'Tara Maa Stores ', 'tm@mail.com', '9051345347', 'CH7895608', 'P/39/411, R.R.M. Road, Maity Para, Kol-41\r\n', '2017-04-22', 'superadmin', '986546'),
(48, 'Sita Ram Agarwal', 'sr@mail.com', '9748362554', 'CJK8967850', '96/2,R.R.M. Road, Kol- 41', '2017-04-22', 'superadmin', '98675223'),
(49, 'Asha Tea', 'at@mail.com', '9051471925', 'FJ89756025', '82L, R.R.M.Road, Kol-82', '2017-04-22', 'superadmin', '9867568'),
(50, 'Dinesh Stores', 'ds@mail.com', '9674248441', 'DK8975607', 'R.R.M Road, Muchipara Bazar,Kol-106', '2017-04-22', 'superadmin', '896570123'),
(51, 'Maa Tara Variety Stores', 'mtv@mail.com', '9748649554', 'RT8963782', '232/1, R.R.M Road, Kol-8', '2017-04-22', 'superadmin', '9863567'),
(52, 'Rajesh Stores', 'rs@mail.com', '8013714763', 'FG89756075', '82/3,R.R.M. Road,Kol-8', '2017-04-22', 'superadmin', '89745602'),
(53, 'Tushar Stores ', 'ts@mail.com', '9674949311', 'RJ89756085', 'Madan Mohon Tala, R.R.M. Road, Kol-8', '2017-04-22', 'superadmin', '89756023'),
(54, 'Ganesh Stores ', 'gs@mail.com', '9674098747', 'GS98560714', 'Madan Mohon Tala, R.R.M. Road, Kol-8', '2017-04-22', 'superadmin', '56982301'),
(55, 'Pappu Stores ', 'ps@mail.com', '9830969667', 'CJ8967530', '27/6,R.R.M Road,Mondalpara,Kol-8', '2017-04-22', 'superadmin', '98763014'),
(56, 'Banerjee Brothers', 'bb@mail.com', '9804175500', 'CD15478607', 'No. 8,Mondalpara Road, Behala, Kol-38', '2017-04-22', 'superadmin', '98756130'),
(57, 'Naresh Stores ', 'ns@mail.com', '9038747145', 'DX5489760', 'R.R.M. Road, Kol-8\r\n', '2017-04-22', 'superadmin', '589610'),
(58, 'Rinku Stores ', 'rs@mail.com', '7895642602', 'GH78925256', 'R.R.M. Road, Pachanan tala', '2017-04-22', 'superadmin', '89743630'),
(59, 'Variety Stores ', 'vs@mail.com', '8820299820', 'CJ89745602', '37/3, R.R.M. Road, Kol-8', '2017-04-22', 'superadmin', '897623010'),
(60, 'M.P. Enetprise', 'mp@mail.com', '8981850764', 'GH78960546', '3/5,K.P. Mukherjee Road, Kol-8', '2017-04-22', 'superadmin', '7892030'),
(61, 'Manjusree', 'mn@mail.com', '789263014', 'GB789601536', '3/6, K.P. Mukherjee Road, Kol-8', '2017-04-22', 'superadmin', '789250'),
(62, 'A.K. Gupta', 'ak@mail.com', '9804666750', 'CD78956201', '117/6, K.P. Mukherjee Road, Kol-8', '2017-04-22', 'superadmin', '78952100'),
(63, 'Rajender Stores ', 'rs@mail.com', '9088556860', 'DH7895000', '31/2A, K.P. Mukerjee Road (East), Kol-8', '2017-04-22', 'superadmin', '12893675'),
(64, 'Hori Om', 'hm@mail.com', '9831422639', 'SD7892500', '78/3A, K.P. Mukherjee Road, Kol-8', '2017-04-22', 'superadmin', '45698230'),
(65, 'Ghosh Stores', 'gs@mail.com', '789205637', 'KL89765014', 'Hem Chandra Mukherjee Road, Kol-8', '2017-04-22', 'superadmin', '5698701'),
(66, 'Subal Stores ', 'ss@mail.com', '78956014', 'CS89765031', 'Hem Chandra Mukherjee Road', '2017-04-22', 'superadmin', '789562014'),
(67, 'Maa Chandra Bhandar', 'mc@mail.com', '9831422639', 'DU789653210', '124,K.P. Mukherjee Road, Kol-8', '2017-04-22', 'superadmin', '45698201'),
(68, 'Indrojeet  stores ', 'is@mail.com', '8479466517', 'CH78965320', 'No.350,Nabaliya para Road, Kol-8', '2017-04-22', 'superadmin', '45789732'),
(69, 'Sree Hari Bhandar', 'sh@mail.com', '9477444953', 'CH7895660', 'No.18, Biren Roy Road, Kol-8', '2017-04-22', 'superadmin', '58963201'),
(70, 'Shiv Shakti Bhandar', 'ss@mail.com', '759612700', 'JH7896301', '27/55/1, R.R.M Road,', '2017-04-22', 'superadmin', '5698240'),
(71, 'Laxmi Narayan Stores ', 'ln@mail.com', '8017684166', 'CN789560145', '156/5/8, R.R.M Road, Saroda Pally, Kol-8', '2017-04-22', 'superadmin', '789560214'),
(72, 'Gupta Stores ', 'gs@mail.com', '988356133', 'GS45986710', '50,Biren Roy Road, Kol-8', '2017-04-22', 'superadmin', '8972563'),
(73, 'Jamunalal Bhandar', 'jb@mail.com', '8420168284', 'CS7896520', '291, Biren Roy Road Kol-8', '2017-04-22', 'superadmin', '18956321'),
(74, 'Nirupama ', 'np@mail.com', '9007772006', 'GS25896470', '54/10 Biren Roy Road, Kol-8', '2017-04-22', 'superadmin', '256549205'),
(75, 'Shree Shyam Stores', 'ss@mail.com', '9830972116', 'CH2569870', '34/1/1,Biren Roy Road, Kol-8', '2017-04-22', 'superadmin', '15469823'),
(76, 'Sankar Stores ', 'ss@mail.com', '9748208011', 'Cl78965014', '182, Biren Roy Road, Kol-8', '2017-04-22', 'superadmin', '12345689'),
(77, 'Ganguly Stores ', 'gs@mail.com', '8017595430', 'CS2597813', 'Buderhat, Kol- 99', '2017-04-22', 'superadmin', '15986401'),
(78, 'Mondal Stores ', 'ms@mail.com', '8013556202', 'CZXPM3258E', '\r\nPanchosayor Road , Kol-94', '2017-04-22', 'superadmin', '5789015'),
(79, 'Maa Tara Bhandar', 'mtb@mail.com', '9748727871', 'CH7892520', '                                Goria, Panchosayar Road,A-27,Kol-94                                ', '2017-04-22', 'superadmin', '1748920'),
(80, 'Karmokar Stores ', 'ks@mail.com', '9831436059', 'CHL98561023', 'Goria, Panchasayor Road , Kol- 94', '2017-04-22', 'superadmin', '5896470'),
(81, 'Maa Variety Stores', 'mvs@mail.com', '9836453775', 'CHIM968427', 'Goria, Nabopally, Dhalua, Kol-152', '2017-04-22', 'superadmin', '2564810'),
(82, 'D.S.Enterprise', 'ds@mail.com', '9804516397', 'CH8796301', 'Goria, Nobopally, Dhalua, Kol-152', '2017-04-22', 'superadmin', '36517208'),
(83, 'Ratan Chokroborty', 'rc@mail.com', '9051140712', 'GHI8965214', 'Goria, Nabopally, Dhalua, Kol-152', '2017-04-22', 'superadmin', '2645893'),
(84, 'Shanti Bhandar', 'sb@mail.com', '8017927767', 'CHI78965200', 'Goria, Panchpota,Bidhan Chandra School,Kol-152', '2017-04-22', 'superadmin', '15689264'),
(85, 'Naskar Stores ', 'ns@mail.com', '8017887977', 'CX78965420', 'Goria, Station, Kol-84', '2017-04-22', 'superadmin', '56987210'),
(86, 'Shiv Nath Bhandar', 'snb@mail.com', '9883664200', 'CNP5647897', 'Goria Station, Kol-84', '2017-04-22', 'superadmin', '1236544'),
(87, 'Maa Manosha Bhandar', 'mmb@gmail.com', '9836029428', 'CH2614589', 'Goria, Station Kol-84', '2017-04-22', 'superadmin', '78956104'),
(88, 'Sahodev Bhandar ', 'sb@mail.com', '7890454141', 'CHI79952300', 'Goriastation, Kol-84', '2017-04-22', 'superadmin', '78956201'),
(89, 'Shyamal Stores ', 'ss@mail.com', '7890503761', 'GH7896301', 'Goria Boyalia, Kol-84', '2017-04-22', 'superadmin', '7896566'),
(90, 'Soti Bhandar', 'sb@mail.com', '9830883215', 'FH89763021', 'Goria,Boyaliya, Kol-84', '2017-04-22', 'superadmin', '78960245'),
(91, 'Gandheswari Bhandar ', 'gb@mail.com', '9433477039', 'SE5698123', 'Goria, Boyalia, Kol-84', '2017-04-22', 'superadmin', '201054969'),
(92, 'Sidheswari Bhandar ', 'sb@mail.com', '9836931058', 'VF468923014', 'Goria, Boyalia, kol-84', '2017-04-22', 'superadmin', '97826304'),
(93, 'M.S. Enterprise', 'ms@mail.com', '33256878', 'VN78952566', 'Goria, Boyalia, Kol-84', '2017-04-22', 'superadmin', '879630125'),
(94, 'Bappa Stores ', 'bs@mail.com', '9903077213', 'GH789603257', 'Goria,boyalia, Kol- 84', '2017-04-22', 'superadmin', '45698270'),
(95, 'Sochi Mata Bhandar ', 'sm@mail.com', '9830185370', 'XY25630147', 'Goria, Bidhanpally, Kol-84', '2017-04-22', 'superadmin', '87965210'),
(96, 'Matri Stores ', 'ms@mail.com', '7278592709', 'CH89756201', 'Goria, Boyalia, Kol-84', '2017-04-22', 'superadmin', '7895620'),
(97, 'Proyojani Bhandar', 'rb@mail.com', '8116664821', 'FV897546', 'Goria,Boyalia, Kol-103', '2017-04-22', 'superadmin', '2568941'),
(98, 'Maa Shanti Bhandar', 'msb@mail.com', '9830516135', 'AQDPD7575Q', 'Goria,Boyalia, Kol-103', '2017-04-22', 'superadmin', '7896531'),
(99, 'Titu Communication', 'tc@mail.com', '77896305', 'VF7896305', 'Goria, Boyalia, Kol-103', '2017-04-22', 'superadmin', '7896530'),
(100, 'Subhra Bhandar', 'sb@mail.com', '7890920636', 'RT89756201', 'Narendropur station Road,Kol-150\r\n', '2017-04-22', 'superadmin', '789630145'),
(101, 'Maa Jagodhatri Bhandar', 'mj@mail.com', '7890733695', 'VB7896302', 'Naranndropur station Road, Kol-150', '2017-04-22', 'superadmin', '78965320'),
(102, 'Ruma Stores ', 'rs@mail.com', '8910473757', 'NB78961056', 'Narendropur Station Road, Kol-150', '2017-04-22', 'superadmin', '78963012'),
(103, 'Rabi Sankar Bhandar', 'rsb@mail.com', '7890156239', 'VBN789650', 'Narendropur Station, Kol-150', '2017-04-22', 'superadmin', '7895620'),
(104, 'Tapan Mondal', 'tm@mail.com', '33258946', 'CH2569871', 'Narendropur Station, Kol-150', '2017-04-22', 'superadmin', '2310589'),
(105, 'Kamala Bhandar', 'kb@mail.com', '9007410726', 'EG7896531', 'Narendropur, Kol-150', '2017-04-22', 'superadmin', '120368'),
(106, 'Swapan Gayen (Auto)', 'sg@mail.com', '9874843342', 'HT156987', 'Narendropur Station, Kol-150', '2017-04-22', 'superadmin', '56897'),
(107, 'Rakomari Stores ', 'rs@mail.com', '9903337110', 'TG4598230', 'Natun para, Kol-84', '2017-04-22', 'superadmin', '123698'),
(108, 'Silky Variety Stores ', 'svs@mail.com', '9836330489', 'FG9856023', 'Maha Maya Tala, Kol-84', '2017-04-22', 'superadmin', '569870'),
(109, 'Maa Manosha Bhandar ', 'mmb@mail.com', '7278254952', 'CH5698204', 'Boyalia, Dream Apt. , Kol -', '2017-04-22', 'superadmin', '78560359'),
(110, 'Bhoumik Rice', 'br@mail.com', '7003763146', 'YT7896530104', 'Kusumba, Kol-103', '2017-04-22', 'superadmin', '7895620'),
(111, 'Goutam Bhandar', 'gb@mail.com', '8479833274', 'HY879620', 'Kusumba, Kol-103', '2017-04-22', 'superadmin', '89560'),
(112, 'Debashish Stores ', 'ds@mail.com', '9062882436', 'DJ78956102', '4/38,Mukundopur, Kol-99', '2017-04-22', 'superadmin', '123659'),
(113, 'Trinath Bhandar', 'tb@mail.com', '8820221195', 'TYU897516', 'Giribala School Road, Kol-152', '2017-04-22', 'superadmin', '23659014'),
(114, 'Tapos Kumar Das', 'tk@mail.com', '9804279925', 'TY698721', 'Goria,Nabogram,Kol-152', '2017-04-22', 'superadmin', '986024'),
(115, 'Mousumi Bhandar', 'mb@mail.com', '9831427284', 'HJ5698012', 'Goria, Nabogram, Kol-152', '2017-04-24', 'superadmin', '7896502'),
(116, 'Sanchita Stores ', 'ss@mail.com', '9331239995', 'CLJ7896520', 'Goria, Shree Khanda,Kol-152', '2017-04-24', 'superadmin', '8796230'),
(117, 'Annopurna Bhandar ', 'ab@mail.com', '9804422236', 'GHJ789562', 'Shree Khanda, Kol-152', '2017-04-24', 'superadmin', '23169058'),
(118, 'Mitro Stores ', 'ms@mail.com', '8697136291', 'CLA78965201', 'Kamrabad Bhowmik Para, Kol-150', '2017-04-24', 'superadmin', '56987412'),
(119, 'Gandheswari Bhandar ', 'gb@mail.com', '8013819123', 'AJ56237024', 'Goria, Jheel Road, Kol-152', '2017-04-24', 'superadmin', '89756230'),
(120, 'Hore Krishna Stores ', 'hk@mail.com', '9883305776', 'CJH7896531', 'Jheel Road, Nabogram', '2017-04-24', 'superadmin', '87956063'),
(121, 'Joy Guru Bhandar', 'jg@mail.com', '7278638376', 'RTJ78965601', 'Nabogram, Kol-152', '2017-04-24', 'superadmin', '78936631'),
(122, 'Basudev Bhandar ', 'bb@mail.com', '9143536581', 'SJK7789653', 'Naboshree Bazar, Kol-152', '2017-04-24', 'superadmin', '78965302'),
(123, 'Ador Stores ', 'as@mail.com', '9903971706', 'SRT78956201', 'Naboshree Bbazar, Kol-152', '2017-04-24', 'superadmin', '78596302'),
(124, 'Taroknath Bhandar ', 'tb@mail.com', '8697075233', 'ANIPP5362K', 'Narendropur, Vivekanando Nagar, Sec-3,Kol-150\r\n', '2017-04-24', 'superadmin', '78956213'),
(125, 'Bapi Stores ', 'bs@mail.com', '9831889388', 'CH18795660K', 'Kamrabad, Bhowmik Para, Kol-150', '2017-04-24', 'superadmin', '7895620'),
(126, 'Rohit Stores ', 'rs@mail.com', '8961742237', 'DF127893279L', 'Gasgodown, no.19, D.P.D Road, Kol-47', '2017-04-24', 'superadmin', '78956003'),
(127, 'Saha Stores ', 'ss@mail.com', '9804697585', 'GJ8967164K', 'Aam Bagan, 161, Bansdroni pally, Kol-70', '2017-04-24', 'superadmin', '789623634'),
(128, 'Gupta Stores ', 'gs@mail.com', '8961872552', 'AL7896782J', 'Aam Bagan, 133, Bansdroni,Swastika Appertment, Kol-70', '2017-04-24', 'superadmin', '25894610'),
(129, 'Aritra Stores ', 'as@mail.com', '9874655434', 'MJ78956136L', '168,Kalitala, Bansdroni,Kol-70', '2017-04-24', 'superadmin', '4569872'),
(130, 'Shree Guru Bhandar (1)', 'sgb@mail.com', '9831885947', 'THJ7896521K', 'Bansdroni, Kalitala, Near Netaji Sangho, Kol-70', '2017-04-24', 'superadmin', '7895612'),
(131, 'Pappu Stores ', 'ps@mail.com', '9231657998', 'CJL7895603J', 'Bansdroni, C/2, Congress Nagar', '2017-04-24', 'superadmin', '78965201'),
(132, 'Prity Stores', 'ps@mail.com', '8013438720', 'CK78965204L', 'Bansdroni, Niranjan pally, Kol-70', '2017-04-24', 'superadmin', '7896530'),
(133, 'Shree Guru Bhandar (2)', 'sgb@mail.com', '9051802363', 'TH45698JL', 'Bansdroni, Niranjan pally, Kol-70', '2017-04-24', 'superadmin', '7896531'),
(134, 'Bela Bhandar ', 'bb@mail.com', '9836147998', 'GH78963501L', 'B27,Sonali park, Kol-70 ', '2017-04-24', 'superadmin', '564987021'),
(135, 'Bijoy Show', 'bs@mail.com', '8481012833', 'GJ7896207J', 'B/75, Sonali park, Kol-70', '2017-04-24', 'superadmin', '789560324'),
(136, 'Sona Dhar', 'sd@mail.com', '8013949962', 'BN7896531K', 'A-141, Soanli Park,Kol-70', '2017-04-24', 'superadmin', '78965310'),
(137, 'Monindro Stores ', 'ms@mail.com', '8981812768', 'DJ78965203L', 'Sonali park,Kol-70', '2017-04-24', 'superadmin', '789652401'),
(138, 'Rajesh Shaw ', 'rs@mail.com', '8961388858', 'HJ54879321L', 'Free School, Dinesh Nagar, Kol-93', '2017-04-24', 'superadmin', '78965214'),
(139, 'Shiv Sankar Stores', 'sss@mail.com', '8961434369', 'TY4598312K', 'Anandapally (South),Kol-93', '2017-04-24', 'superadmin', '789652002'),
(140, 'Barick Stores ', 'bs@mail.com', '9874405724', 'TS78965301L', 'Bansdroni, Dineshnagar, Kol-70', '2017-04-24', 'superadmin', '78956120'),
(141, 'Rajesh Kr. Shaw', 'rks@mail.com', '8100779626', 'KL789562J', 'Bansdroni, Dineshnagar,Kol-70', '2017-04-24', 'superadmin', '4589602'),
(142, 'Panchu Stores ', 'ps@mail.com', '9903000414', 'GH7895661K', 'No.14,Dineshnagar, Free School, Kol-70', '2017-04-24', 'superadmin', '7895610'),
(143, 'Talukder Bhandar ', 'tb@mail.com', '9903430883', 'NV78956132H', '51/A, No. 18,Joyshree Market, Kol-70', '2017-04-24', 'superadmin', '789564203'),
(144, 'B.Das', 'bd@mail.com', '9007305292', 'TC78956321A', 'H.L. Sarkar Road, Kol-70', '2017-04-24', 'superadmin', '78956123'),
(145, 'D.K. Stores', 'dks@mail.com', '9163721778', 'ER7895612L', '47, H.L.Sarkar Road,Kol-70', '2017-04-24', 'superadmin', '7896321'),
(146, 'Proyojani Bhandar ', 'pb@mail.com', '9433954979', 'TG78956101K', '48,Bansdroni, Govt. Collony, Kol-70', '2017-04-24', 'superadmin', '78956412'),
(147, 'Joy Baba Loknath', 'jbl@mail.com', '9903352077', 'HJ78965301G', 'Bansdroni, Niranjonpally,Kol-70', '2017-04-24', 'superadmin', '789652014'),
(148, 'Ram Thakur Bhandar ', 'rtb@mail.com', '9038216649', 'JK789561D', '13/1,Vivekanando park, Kol-70', '2017-04-24', 'superadmin', '78954606'),
(149, 'Maa Tara Bhandar', 'mtb@mail.com', '9062106902', 'VC78963021M', 'Sonali Park,Kol-70', '2017-04-24', 'superadmin', '45698721'),
(150, 'Loknath Stores ', 'ls@mail.com', '9830551985', 'CB7895460N', 'Dinesh Nagar, Sonali park, Kol-70', '2017-04-24', 'superadmin', '78952601'),
(151, 'Maa Durga Bhandar (2)', 'mdb@mail.com', '9163863206', 'BN7896502C', 'Dakshin Ananda pally, Kol-93', '2017-04-24', 'superadmin', '78965214'),
(152, 'Hazari Stores ', 'hs@mail.com', '9830610889', 'FG7896501M', 'Anandapally(south), Kol-93', '2017-04-24', 'superadmin', '78965014'),
(153, 'Annukul Bhandar ', 'ab@mail.com', '8981285195', 'BN78965021H', 'Anandapally (south)', '2017-04-24', 'superadmin', '56984712'),
(154, 'Maa Durga Bhandar (1)', 'mbb@mail.com', '9836030139', 'KL7895643R', 'Ananadapally (south), Kol-93', '2017-04-24', 'superadmin', '7896532'),
(155, 'Bimola Bhandar ', 'bb@mail.com', '9143876648', 'SJ7896512Y', 'F19/4, Sonali park, Bansdroni, Kol-70', '2017-04-24', 'superadmin', '78956412'),
(156, 'Gouri Sankar Bhandar', 'gsb@mail.com', '3325698', 'KJ789564M', 'E/25, Sonali park,Kol-70', '2017-04-24', 'superadmin', '569847'),
(157, 'Kabita Pan Shop', 'kps@mail.com', '709836605176', 'CL77895641J', '7-A, Lane, Bansdroni, Vidyasagar Park, Kol- 70', '2017-04-24', 'superadmin', '789561'),
(158, 'Sunil Shaw', 'ss@mail.com', '8240261107', 'VG7896512H', 'D/70,Sonali Park,Kol-70', '2017-04-24', 'superadmin', '7896521'),
(159, 'Ram Bhandar', 'rb@mail.com', '7278129370', 'RF789561N', '17/1, Vivekanando Park, Kol-70', '2017-04-24', 'superadmin', '7895614'),
(160, 'S.K.Gupta', 'skg@mail.com', '9748542220', 'NJ7895642L', 'Congress pally, Kol-70', '2017-04-24', 'superadmin', '7896541'),
(161, 'Dilip Gupta', 'dg@mail.com', '8910887351', 'CN7896542N', 'Congrassnagar, Kol-70', '2017-04-24', 'superadmin', '7895641'),
(162, 'Shree Ram Stores', 'srs@mail.com', '9748273907', 'CN78956132N', 'Rania 30 feet, Kol', '2017-04-24', 'superadmin', '7895463'),
(163, 'Santosh Shaw ', 'ss@mail.com', '7890663316', 'DJ7896023S', 'Rania, 30 feet,Kol-', '2017-04-24', 'superadmin', '7895026'),
(164, 'Deepak Stores ', 'ds@mail.com', '9062706095', 'Gh785607V', 'Rania, 2nd 30feet,Buria para, Kol-', '2017-04-24', 'superadmin', '7896510'),
(165, 'Shitala Stores ', 'ss@mail.com', '9088911551', 'ER7895610A', 'Rania, 2nd feet, Buria para, Kol-', '2017-04-24', 'superadmin', '7895602'),
(166, 'Raju Shaw', 'rs@mail.com', '8420541895', 'SD789561201V', ' Rania, 2nd, 30feet,Buria para, Kol-', '2017-04-24', 'superadmin', '7895621'),
(167, 'Pritam Stores', 'ps@mail.com', '3545689', 'SC78955612N', 'Rania, 2nd, 30feet, Buria para, Kol-', '2017-04-24', 'superadmin', '564892'),
(168, 'Sasi Stores ', 'ss@mail.com', '3365482', 'mn4697802c', 'Rania, 30 feet, Buria para,Kol-', '2017-04-24', 'superadmin', '7895612'),
(169, 'Shaw Stores ', 'ss@mail.com', '7278399924', 'CF7896389N', 'Rania, 30 feet, Buria para, Kol-', '2017-04-24', 'superadmin', '7896502'),
(170, 'Sandeep Mondal', 'sm@mail.com', '33256974', 'VV78954613L', 'Gitanagar, Hogla Bon,Kol-', '2017-04-24', 'superadmin', '2549464'),
(171, 'Sajol Stores ', 'ss@mail.com', '33889621', 'SD456987C', 'Gitanagar, Kol-', '2017-04-24', 'superadmin', '9874563'),
(172, 'Maya Stores ', 'ms@mail.com', '8013473496', 'EF256987SD', 'Gitanagar, Kol-', '2017-04-24', 'superadmin', '2154698'),
(173, 'M.P. Shaw', 'mps@mail.com', '9230448436', 'SZ7895601G', 'Gitanagar, Kol-', '2017-04-24', 'superadmin', '7896325'),
(174, 'Annesha Stores ', 'as@mail.com', '9748716113', 'VN78963014S', 'Gitanagar, Kol-', '2017-04-24', 'superadmin', '7896324'),
(175, 'Dhanraj Stores ', 'ds@mail.com', '9143104171', 'CC5897416S', 'Rania,30 feet Bazar, Kol-', '2017-04-24', 'superadmin', '7896021'),
(176, 'Prodip Mondal', 'pm@mail.com', '84020566774', 'AS78965340', 'Rania, 30 feet Bazar, Kol-', '2017-04-25', 'superadmin', '8976324'),
(177, 'Suresh Shaw', 'ss@mail.com', '8274015033', 'SD895612G', 'No.2, Vibekanando Sarani, Kol-', '2017-04-25', 'superadmin', '789630214'),
(178, 'Sangita Stores ', 'ss@mail.com', '9800606079', 'SZ5698021F', 'Rania 30 feet, Udesh Park, Kol-', '2017-04-25', 'superadmin', '7896521'),
(179, 'Biki Stores ', 'bs@mail.com', '916352973', 'SG7896201V', 'Rania, 30 feet, Udesh Park, Kol-', '2017-04-25', 'superadmin', '7896531'),
(180, 'Mohabir Stores ', 'ms@mail.com', '9088660447', 'SD457869810D', 'Rania, 30 feet.', '2017-04-25', 'superadmin', '78896502'),
(181, 'Jugnu Stores ', 'js@mail.com', '9836476532', 'FG5698201S', 'Rania, 30 feet', '2017-04-25', 'superadmin', '265489'),
(182, 'Sandip Kumar Shaw', 'sks@mail.com', '236559', 'CB1456874S', 'Rania, Udesh Park, Kol-', '2017-04-25', 'superadmin', '2569874'),
(183, 'Koushlya Stores ', 'ks@mail.com', '2336548', 'SC2569845B', 'Rania, Udesh Park, Kol-', '2017-04-25', 'superadmin', '456987'),
(184, 'Dayanand Shaw', 'ds@mail.com', '2659876', 'SS2569874B', 'Rania, Udesh Park, Kol-', '2017-04-25', 'superadmin', '26549364'),
(185, 'Laxmi Ganesh Bhandar', 'lgb@mail.com', '26595864', 'SV256987B', 'Rania, Udesh park, Kol-', '2017-04-25', 'superadmin', '7896541'),
(186, 'Maa Kali Bhandar', 'mkb@mail.com', '8420413875', 'SD2564987C', 'Rania,Udesh pally, Kol-', '2017-04-25', 'superadmin', '2569874'),
(187, 'Ashis Bag', 'ab@mail.com', '7278851993', 'CD7896321V', 'Rania, 2nd 30 feet, Buria para, Kol-', '2017-04-25', 'superadmin', '56978021'),
(188, 'K.B.Stores', 'kbs@mail.com', '8420234437', 'SE25748961S', 'Rania, Udesh pally, Kol-', '2017-04-25', 'superadmin', '256971'),
(189, 'Samar Stores', 'ss@mail.com', '233654', 'SD2365498V', 'Rania,Gita Nagar, Naktala, Kol-', '2017-04-25', 'superadmin', '2569784'),
(190, 'Amar Stores', 'as@mail.com', '9874896880', 'CD456987V', 'Rania,Gitanagar, Naktala', '2017-04-25', 'superadmin', '2365489'),
(191, 'Rohit Shaw', 'rs@mail.com', '23654978', 'ZV265493A', 'Rania, Udesh park, Kol-', '2017-04-25', 'superadmin', '6549321'),
(192, 'Baba Maar Ashirbad', 'bma@mail.com', '8017874969', 'CN2564987B', 'Gitanagar, Kol-', '2017-04-25', 'superadmin', '2654987'),
(193, 'Munnalal Gupta', 'mg@mail.com', '9748787252', 'CH265498S', 'Rania, 30 feet, Kol-', '2017-04-25', 'superadmin', '26549'),
(194, 'Ganesh Stores ', 'gs@mail.com', '2564986', 'MN56987421C', 'Rania, 2nd 30 feet, Buria para, Kol-', '2017-04-25', 'superadmin', '2659874'),
(195, 'Kamala Bhandar', 'kb@mail.com', '9903200478', 'CN2564978C', 'Rania, Buria para, Kol-', '2017-04-25', 'superadmin', '26596978'),
(196, 'Renuka Stores ', 'rs@mail.com', '9830458782', 'CN456987V', 'Ganga Jayara, Kol-', '2017-04-25', 'superadmin', '265498'),
(197, 'Austom Naskar', 'an@mail.com', '236545', 'CN456982J', 'Ganga Jayara, Kol-', '2017-04-25', 'superadmin', '2654978'),
(198, 'Preety Stores ', 'ps@mail.com', '9831481799', 'CS4546987N', 'Ganga Jayara, Kol-', '2017-04-25', 'superadmin', '569874'),
(199, 'Maa Laxmi Bhandar', 'mlb@mail.com', '9748688133', 'CN2564978S', 'Ganga Jayara Bazar, Kol-', '2017-04-25', 'superadmin', '265449'),
(200, 'Prodip Stores ', 'ps@mail.com', '9163988955', 'CS15649866S', 'Ganga Jayara Bazar, Kol-', '2017-04-25', 'superadmin', '25698'),
(201, 'Arobindo Biswas', ' ab@mail.com', '9874277463', 'AX45698712', 'Ganga Joyara,Kol-', '2017-04-25', 'superadmin', '2654980'),
(202, 'Sindhu Stores ', 'ss@mail.com', '8100310410', 'SS4598252C', 'Ganga Jayara Bazar, Kol-', '2017-04-25', 'superadmin', '7896521'),
(203, 'Maa Kali Bhandar', 'mkb@mail.com', '8013470124', 'SW456978C', 'Ganga Jayara Bazar, Kol-', '2017-04-25', 'superadmin', '4595698'),
(204, 'New Biswas ', 'nb@mail.com', '9830345174', 'CN789642N', 'Ganga Jayara Bazar, Kol-', '2017-04-25', 'superadmin', '456987'),
(205, 'New Debaloy', 'nd@mail.com', '7686965763', 'CH1264879S', 'Ganga Jayara, Kol-', '2017-04-25', 'superadmin', '45690'),
(206, 'Ganapati Stores ', 'gs@mail.com', '4278665420', 'CN4569725C', 'Khurigachi,Kol-', '2017-04-25', 'superadmin', '1254498'),
(207, 'Shree Hori Bhandar', 'shb@mail.com', '8981787320', 'CN4598632S', 'Khurigachi, Kol-', '2017-04-25', 'superadmin', '165593'),
(208, 'Shyam Stores ', 'ss@mail.com', '9674352434', 'SS264962S', 'Khurigachi, Kol-', '2017-04-25', 'superadmin', '7896302'),
(209, 'Pawan Stores ', 'ps@mail.com', '3326549', 'VN1245789S', 'Khurigachi, Kol-', '2017-04-25', 'superadmin', '1235654'),
(210, 'Kishori Bhandar', 'kb@mail.com', '23655499', 'TR12664823S', 'Khurigachi, Kol-', '2017-04-25', 'superadmin', '1564896'),
(211, 'Maa Laxmi Bhandar', 'mlb@mail.com', '9062846195', 'CN1546988S', 'Khurigachi, Kol-', '2017-04-25', 'superadmin', '125468'),
(212, 'Gouri Bhandar', 'gb@mail.com', '8013049029', 'SV15468314C', 'Khurigachi, Kol-', '2017-04-25', 'superadmin', '7896542'),
(213, 'Radha Krishna Bhandar', 'rkb@mail.com', '23165498', 'SC12468963W', 'Khurigachi, Kol-', '2017-04-25', 'superadmin', '125649'),
(214, 'Appu Stores', 'as@mail.com', '9874590737', 'TR1254566C', 'Khurigachi, Kol-', '2017-04-25', 'superadmin', '2564984'),
(215, 'Suvam Stores ', 'ss@mail.com', '2367946', 'VD45026780C', 'Malir Bagan', '2017-04-25', 'superadmin', '654897'),
(216, 'Loknath Bhandar', 'lb@mail.com', '25636147', 'DC4578836S', 'Sonarpur, Netaji Sishu Vidyaloy, Kol-', '2017-04-25', 'superadmin', '452549'),
(217, 'Radha Krishna Bhandar', 'rkb@mail.com', '8013467894', 'CZ45698121S', 'Sonarpur, Netaji Sishu Vidyaloy,Kol-', '2017-04-25', 'superadmin', '48516021'),
(218, 'Raju Enterprise', 're@mail.com', '2536364', 'SN4598722J', 'Sonarpur, Kol-', '2017-04-25', 'superadmin', '459721'),
(219, 'Rajib Stores', 'rs@mail.com', '9831460782', 'SJ459710S', 'Sonarpur, Kol-', '2017-04-25', 'superadmin', '789654'),
(220, 'Maa Kali Bhandar', 'mkb@mail.com', '2563448', 'SZ458136S', 'Sonarpur Bazar, Kol-150', '2017-04-25', 'superadmin', '15468'),
(221, 'Joy Maa Bhandar', 'jmb@mail.com', '8013999717', 'SX4581136S', 'Sonarpur Bazar', '2017-04-25', 'superadmin', '4565982'),
(222, 'Maa Chandi Bhandar', 'mc@mail.com', '25463447', '156812', 'Sonarpur Bazar\r\n', '2017-04-25', 'superadmin', '15831'),
(223, 'Riya Hotel', 'rh@mail.com', '9836869304', 'RF48114582C', 'Sonar Pur Bazar, Kol-70', '2017-04-25', 'superadmin', '145792102'),
(224, 'Maa Krisna ', 'mk@mail.com', '9933651122', 'CN7895302V', 'Khurigachi, Kol-150', '2017-04-25', 'superadmin', '4583602'),
(225, 'Sourav Stores', 'ss@mail.com', '9748378423', 'CH14882113S', 'Ganga Jayara, Dihi Road, Kol-150', '2017-04-25', 'superadmin', '15789320'),
(226, 'Rajesree Stores ', 'rs@mail.com', '25314812', 'CN148913145S', 'Ganga Joyara, Dihi Road, Kol-150', '2017-04-25', 'superadmin', '482612'),
(227, 'Manash Mondal', 'mm@mail.com', '9007568357', 'CN12574313S', 'Ghasiara, Madhyam para, Kol-150', '2017-04-25', 'superadmin', '4589121'),
(228, 'Sabitri Bhandar ', 'sb@mail.com', '7059723523', 'SD15789625A', 'Ganga Joyara, Dihi Road, Khaa para, Kol-150', '2017-04-25', 'superadmin', '1257483'),
(229, 'Annopurna Bhandar', 'ab@mail.com', '2536811', 'GH1578632S', 'Radhanagar, Auto Stand, Kol-150', '2017-04-25', 'superadmin', '15682'),
(230, 'R.K.Gupta', 'rkg@mail.com', '9038737689', 'NS759980S', 'M.L.G Road, Kol-', '2017-04-25', 'superadmin', '8974561'),
(231, 'Abhijit Stores ', 'as@mail.com', '7686829329', 'VN1586125S', 'M.L.G. Road, Kol-', '2017-04-25', 'superadmin', '157621'),
(232, 'Goutam Stores ', 'gs@mail.com', '9804364442', 'CN1546315V', 'M.L.G. Road, Kol-', '2017-04-25', 'superadmin', '157581'),
(233, 'Sonu Stoes ', 'ss@mail.com', '8276048150', 'CD157453S', 'M.L.G. Road, Kol-', '2017-04-25', 'superadmin', '15563'),
(234, 'Piyali Stores ', 'ps@mail.com', '9883320498', 'SS152333C', 'M.L.G.Road, Kol-', '2017-04-25', 'superadmin', '891432'),
(235, 'Ram Krishna Bhandar', 'rkb@mail.com', '2368141', '158123', 'M.L.G.Road, Kol-', '2017-04-25', 'superadmin', '896140'),
(236, 'Taraklal Show', 'rs@mail.com', '8450892072', 'DN1789313S', 'M.L.G. Road, Kol-', '2017-04-25', 'superadmin', '186250'),
(237, 'Tara Maa Stores ', 'tms@mail.com', '25368146', 'SC1257933G', 'Koilash Ghosh Road, Kol-', '2017-04-25', 'superadmin', '789626'),
(238, 'Chandan Stores ', 'cs@mail.com', '256486', 'CN158632L', 'Koilash Ghosh Road, Kol-', '2017-04-25', 'superadmin', '78922'),
(239, 'Abha Chatterjee', 'ac@mail.com', '9051327802', 'CN157931C', 'Koilash Ghosh Road, Kol-', '2017-04-25', 'superadmin', '798921'),
(240, 'Jana Stores', 'js@mail.com', '2568769', 'CJ1793257V', 'Koilash Ghosh Road, Kol-', '2017-04-25', 'superadmin', '789110'),
(241, 'A.K. Gupta', 'akg@mail.com', '2563479', 'ER15878332A', 'B.M. Roy Road, Kol-', '2017-04-25', 'superadmin', '12574586'),
(242, 'Saroda Bhandar', 'sb@mail.com', '9831929207', 'CN78932567S', 'B.M.Roy Road, Kol-', '2017-04-25', 'superadmin', '145364'),
(243, 'Daily Need', 'dn@mail.com', '2564792', 'CN782161A', 'B.M.Roy Road,  Kol-', '2017-04-25', 'superadmin', '789602'),
(244, 'D.K. Stores', 'bks@mail.com', '25645896', 'QE7816233A', 'B.M.Roy Road, Kol-', '2017-04-25', 'superadmin', '7895410'),
(245, 'Promod Shaw', 'ps@mail.com', '2569814', 'NS7989613S', 'B.M.Roy Road, Kol-', '2017-04-25', 'superadmin', '48620'),
(246, 'Laxmi Stores', 'ls@mail.com', '256987', 'EM1487822S', 'B.M.Roy Road, Kol-', '2017-04-25', 'superadmin', '789612'),
(247, 'Rani Stores ', 'rs@mail.com', '9874627090', 'DN789143S', 'B.M.Roy, Road, Kol-', '2017-04-25', 'superadmin', '789650'),
(248, 'Ranjeet Stores ', 'rs@mail.com', '256478', 'EL894336S', 'B.M. Road, Kol-', '2017-04-25', 'superadmin', '698541'),
(249, 'Urmila Stores ', 'us@mial.com', '8420089288', 'SD4526783F', 'Ishan Ghosh Road, Kol-', '2017-04-25', 'superadmin', '158102'),
(250, 'Binod Gupta', 'bg@mail.com', '9038698694', 'SR1458783S', 'Ishan Ghosh Road, Kol-', '2017-04-25', 'superadmin', '157936'),
(251, 'Arun Debnath', 'ad@mail.com', '9836865250', 'CA157911364D', 'Ishan Ghosh Road, Kol-', '2017-04-25', 'superadmin', '458131'),
(252, 'Monu Stores', 'ms@mail.com', '8013177794', 'EF4896131C', 'Ishan Ghosh Road, Kol-', '2017-04-25', 'superadmin', '489210'),
(253, 'Rukmani Stores ', 'rs@mail.com', '9903546205', 'CF1258961B', 'Ishan Ghosh Road, Kol-', '2017-04-25', 'superadmin', '789651'),
(254, 'Bhola Bhandar', 'bb@mail.com', '8697105218', 'AR789156C', 'Ishan Ghosh Road, Kol-', '2017-04-25', 'superadmin', '787965123'),
(255, 'Sourshee', 'so@mail.com', '9831196026', 'CR45861S', 'M.L.G. Road, Kol-', '2017-04-25', 'superadmin', '489103'),
(256, 'Mondal Stores ', 'ms@mail.com', '9804434409', 'RE7894136S', 'Ishan Ghosh Road,Kol-', '2017-04-25', 'superadmin', '78966542'),
(257, 'Ujjal Stores', 'us@mail.com', '9874562495', 'QE78965310V', 'No.2, Vidyasagar Road, Kol-', '2017-04-25', 'superadmin', '7896452'),
(258, 'Atithi ', 'at@mail.com', '9830553628', 'AQ789461C', '23, Bagha Jatin Station, Kol-32', '2017-04-25', 'superadmin', '789632'),
(259, 'Maa Janaki Stores ', 'mjs@mail.com', '9038373381', 'WE7896130C', '6/8, Bagha Jatin Station, Kol-86', '2017-04-25', 'superadmin', '789654'),
(260, 'Lila Stores', 'ls@mail.com', '8017283729', 'AF7898613C', 'D/69, Bagha Jatin, Kol-82', '2017-04-25', 'superadmin', '778623'),
(261, 'Abosar Stores ', 'as@mail.com', '9433421149', 'EJ78965321C', '6/58, Bagha Jatin, Kol-86', '2017-04-25', 'superadmin', '789463'),
(262, 'Sankar Variety', 'sv@mail.com', '8981320726', 'TN7789652C', '6/58, Bagha Jatin, Kol-86', '2017-04-25', 'superadmin', '789651'),
(263, 'Ameo Bhandar ', 'ab@mail.com', '9239121922', '47891136', 'B/41, Bagha Jatin, Kol-32', '2017-04-25', 'superadmin', '489523'),
(264, 'Shree Guru Stores ', 'sgs@mail.com', '9903638579', '7991452', 'Bagha Jatin, K.M.C Market,Kol-86', '2017-04-25', 'superadmin', '78951'),
(265, 'Gupta Stores ', 'gs@mail.com', '9804210483', '79896143', '687, S.P.D Block, Bagha Jatin, Kol-86', '2017-04-25', 'superadmin', '789621'),
(266, 'Joy Guru Stores ', 'jgs@mil.com', '3324250145', '7954321', '6/397, Bagha Jatin, Kol-86', '2017-04-25', 'superadmin', '975132'),
(267, 'Loknath Bhandar', 'lb@mail.com', '9831414699', '799543', '6/617, Bagha Jatin, Kol-86', '2017-04-25', 'superadmin', '78921'),
(268, 'Sneha Bhandar ', 'sb@mail.com', '8697615217', '7945621', 'G/95, Bagha Jatin, Kol-86', '2017-04-25', 'superadmin', '4589361'),
(269, 'Loknath Bhandar ', 'lb@mail.com', '9878086296', '7943526', 'G/54, Bagha Jatin, Kol-86', '2017-04-25', 'superadmin', '78956102'),
(270, 'Shree Hori Stores ', 'shs@mail.com', '9830924575', '7983132', 'G/22, Bagha Jatin, Kol-84', '2017-04-25', 'superadmin', '78913'),
(271, 'Chakroborty Stores ', 'cs@mail.com', '9836308751', '798923', '49,Phool bagan, Kol-86', '2017-04-25', 'superadmin', '569421'),
(272, 'Radha Rani Bhandar', 'rrb@mail.com', '9231856083', '78965142', '46, Phool Bagan more, Kol-86', '2017-04-25', 'superadmin', '7896251'),
(273, 'Laxmi Bhandar ', 'lb@mail.com', '9933019708', '789652', 'B64/1, Rabindro pally, Kol- 86', '2017-04-25', 'superadmin', '780894'),
(274, 'Sneha Stores ', 'ss@mail.com', '9230436663', '56981402', 'D9, Rabindropally, Kol-86', '2017-04-25', 'superadmin', '8946236'),
(275, 'Proyojani Bhandar ', 'pb@mail.com', '9051840446', '7991231', 'A19/2, Rabindropally, Kol-86', '2017-04-25', 'superadmin', '569810'),
(276, 'Chandra Stores ', 'cs@mail.com', '9674861706', '8695014', '35, Desh Bandhu Road, Kol-86', '2017-04-25', 'superadmin', '876542'),
(277, 'Parboti Stores ', 'ps@mail.com', '9878701921', '7896540', 'J104, Bagha Jatin, Kol-32', '2017-04-25', 'superadmin', '789251'),
(278, 'Krishno Kali Bhandar ', 'kkb@mail.com', '3324253070', '78989651', '526, Bagha Jatin, Kol- 86', '2017-04-25', 'superadmin', '78962'),
(279, 'Roy Stores ', 'rs@mail.com', '9432075481', '8965421', '7/80A, Bijoy Garh, Kol-32', '2017-04-25', 'superadmin', '96354'),
(280, 'Loknath Stores ', 'ls@mail.com', '8961671142', '986521', '1/47A, Arobindonagar, Kol-32', '2017-04-25', 'superadmin', '21358'),
(281, 'Gopal Stores ', 'gs@mail.com', '9831795503', '698521', '7/38, Bijoy Garh, Kol-32', '2017-04-25', 'superadmin', '236845'),
(282, 'Soilesh Stores ', 'ss@mail.com', '9903610838', '5469823', '7/38, Bijoy Garh, Kol- 32', '2017-04-25', 'superadmin', '896417'),
(283, 'Bubai Stores ', 'bs@mail.com', '9874523205', '8975621', '1/116, Azad Garh, Kol-40', '2017-04-25', 'superadmin', '9875623'),
(284, 'Natto Gopal Stores ', 'ngs@mail.com', '3365896', '8975412', '2/77, Azad Garh, Kol-40', '2017-04-25', 'superadmin', '8965712'),
(285, 'Brendar Stores ', 'bs@mail.com', '8443955974', '7896512', '3/155, Azad Garh, Kol-40', '2017-04-25', 'superadmin', '69874'),
(286, 'Monika Stores', 'ms@mail.com', '9831200931', '896541', '3/155, Azad Garh, Kol-40', '2017-04-25', 'superadmin', '25698'),
(287, 'A.K. Mukherjee ', 'akm@mail.com', '7890909408', '8975461', '58, Regent Collony, Kol-40', '2017-04-25', 'superadmin', '8975446'),
(288, 'G.K. Gupta', 'gkg@mail.com', '9903811535', '879642', '1/44,Ashoknagar, Kol-40', '2017-04-25', 'superadmin', '879654'),
(289, 'Laxmi Stores ', 'ls@mail.com', '9836387661', '897546', '19, Grahms Road, Kol-40', '2017-04-25', 'superadmin', '896301'),
(290, 'Niranjon Stores ', 'ns@mail.com', '9681483381', '513269', '57/1 Grahms Road, Kol-40', '2017-04-25', 'superadmin', '87951'),
(291, 'Badal Stores ', 'bs@mail.com', '9831416471', '8974012', '21, Golf Club Road, Kol- 33', '2017-04-25', 'superadmin', '986746'),
(292, 'Rajesh Bhandar ', 'rb@mail.com', '9903366167', '78951302', 'Chitto Ranjon Colony, Kol-92', '2017-04-26', 'superadmin', '698512'),
(293, 'Chowdhury Stores ', 'cs@mail.com', '9831086196', '5987461', 'No.6,Ram Thakur Park,Kol-86 ', '2017-04-26', 'superadmin', '169543'),
(294, 'Krishna Stores ', 'ks@mail.com', '8017273354', '896524721', 'Vidya Sagar Colony, Kol-87', '2017-04-26', 'superadmin', '789651'),
(295, 'Monmohan Bhandar', 'mmb@mail.com', '3324297816', '7886521', 'Vidya sagar collony,Kol-47', '2017-04-26', 'superadmin', '236548'),
(296, 'Joyento Stores ', 'js@mail.com', '9674590141', '45695281', 'Vidya Sagar  Collony, Kol-47\r\n', '2017-04-26', 'superadmin', '5684133'),
(297, 'Agarwal Stores ', '  as@mail.com', '7059321905', '7895621', 'Vidya Sagar Collony, Kol-47', '2017-04-26', 'superadmin', '256984'),
(298, 'Ashirbad Vareity ', 'av@mail.com', '9748683787', '7895621', 'I/61/C/2, Hospital Road, Kol-92', '2017-04-26', 'superadmin', '12564'),
(299, 'Protidin Stores', 'ps@mail.com', '9903036076', '778956214', '1/38, Bagha Jatin, Hospital, Kol-92', '2017-04-26', 'superadmin', '897450'),
(300, 'Maa Sakuntala Stores ', 'mss@mail.com', '9088884098', '7895612', 'A/126,Bagha Jatin collony, Kol-92', '2017-04-26', 'superadmin', '98456'),
(301, 'Proyojani Bhandar ', 'pb@mail.com', '9830748537', '7896521', 'A/34, Bagha Jatin, Kol-92', '2017-04-26', 'superadmin', '789651'),
(302, 'Sevadashi Bhandar ', 'sv@mail.com', '9748259407', '78965210', '2/180/1, Sree Collony, Kol-92', '2017-04-26', 'superadmin', '986542'),
(303, 'Prabhu Jagat Bandhu', 'pjb@mail.com', '9774258799', '9875426', '2/134, Sree Collony, Kol-92', '2017-04-26', 'superadmin', '569824'),
(304, 'Annapurna Stores ', 'as@mail.com', '9874650735', '7896524', '1/158, Sree Collony, Kol-92', '2017-04-26', 'superadmin', '896201'),
(305, 'Loknath Bhandar', 'lb@mail.com', '9883041177', '89657120', '2/127, Sree Collony, Kol-92', '2017-04-26', 'superadmin', '897516'),
(306, 'Maa Tara Stores ', 'mts@mail.com', '9163440813', '8963214', '1/128, Sree Collony, Kol-92', '2017-04-26', 'superadmin', '89745'),
(307, 'Joy Guru Bhandar', 'jgb@mail.com', '9903638755', '78965423', '56,Sree Collony, Kol-92', '2017-04-26', 'superadmin', '897452'),
(308, 'Gandheshri Bhandar', 'gb@mail.com', '990384750', '8975463', '61, Sree Collony, Kol-92', '2017-04-26', 'superadmin', '789651'),
(309, 'Suresh Variety', 'sv@mail.com', '9836742108', '87962457', '27, Sree Collony, Kol-92', '2017-04-26', 'superadmin', '89745'),
(310, 'Joy Mohaprobhu Bhandar ', 'jmb@mail.com', '9748719917', '7896015', '38,Sree Collony, Kol-92', '2017-04-26', 'superadmin', '879652'),
(311, 'Sonali Stores', 'ss@mail.com', '9051727212', '9874562', 'I Block, Bagha Jatin, Kol-92', '2017-04-26', 'superadmin', '98752'),
(312, 'Shiv Shakti Stores ', 'sss@mail.com', '8444089325', '78965421', '661, M.G. Road, Kol-82', '2017-04-26', 'superadmin', '87965'),
(313, 'Dilip Prashad ', 'dp@mail.com', '7278829529', '8956412', '13/11, Banomali Bhattacherjee Road, Kol-82', '2017-04-26', 'superadmin', '7896'),
(314, 'Sanjoy Shaw', 'ss@mail.com', '8420545650', '89745612', '56, Banomali Banerjee Road, Kol-82', '2017-04-26', 'superadmin', '89745'),
(315, 'Suresh Shaw ', 'ss@mail.com', '9007176675', '87965412', 'No. 1, Banomali Banerjee Road,Subhash Park, Kol-82', '2017-04-26', 'superadmin', '59876'),
(316, 'New Joty Bhandar', 'njb@mail.com', '8961427334', '89647534', '413/52/4, Kalipur Kancha Road, Kol-82', '2017-04-26', 'superadmin', '89763'),
(317, 'Kamala Variety Stores', 'kvs@mail.com', '9163543428', '87964251', '1160, Ostad Amir Khan Sarani, Kol-82', '2017-04-26', 'superadmin', '9861475'),
(318, 'M.K. Gupta', 'mkg@mail.com', '9674597544', '98546231', '7413,K.K. Road,Sodepur, Kol-82', '2017-04-26', 'superadmin', '874561'),
(319, 'Kamal Bhandar ', 'kb@mail.com', '8583994983', '78965413', '16, K.K. Road, Kol-82', '2017-04-26', 'superadmin', '596421'),
(320, 'Robi Naskar', 'rn@mail.com', '9748970498', '87962140', '                   89,Haridevpur,Nona Math, Kol-82                                         ', '2017-04-26', 'superadmin', '897461'),
(321, 'Maa Kali Stores ', 'mks@mail.com', '8820648864', '89746125', '411, Sodepur, K.K. Road,Kol-82', '2017-04-26', 'superadmin', '87954'),
(322, 'Santosh  Stores', 'ss@mail.com', '9007657090', '87954621', 'No.9, K.K. Road, Kol- 82', '2017-04-26', 'superadmin', '87956'),
(323, 'Chakroborty Variety Stoes ', 'cvs@mail.com', '9831189554', '879654413', 'No, 9, Sodepur,K.K. Road, Kol-82', '2017-04-26', 'superadmin', '987456'),
(324, 'Surojit Ghosh', 'sg@mail.com', '9007579223', '78965412', 'K.K. Road, Sodepur,Dolly Villa More, Kol-82', '2017-04-26', 'superadmin', '745632'),
(325, 'Ganesh Bhandar', 'gb@mail.com', '9874725964', '9876417', 'sodepur, Ramkrishna nagar, K.K.Road, Kol-82', '2017-04-26', 'superadmin', '896021'),
(326, 'Piklu Stores ', 'ps@mail.com', '8582940383', '89746132', '109,Kalikapur Road, Ram Krishna nagar, Dollyvilla, Kol-82', '2017-04-26', 'superadmin', '74569'),
(327, 'Protima Stores', 'ps@mail.com', '8981120192', '7896542', '258, Kalipur EXTN Road, Sodepur, Kol-82', '2017-04-26', 'superadmin', '69845'),
(328, 'Hena Stores ', 'hs@mail.com', '9038007289', '789654', '119/A, Ustad Amir Khan Sarani, Kol- 82', '2017-04-26', 'superadmin', '25641'),
(329, 'Biki Stores ', 'bs@mail.com', '8017841425', '7896301', '996/A,Ustad Amir Khan Sarani, Kol-82', '2017-04-26', 'superadmin', '7896521'),
(330, 'Shiv Stores ', 'ss@mail.com', '7003566168', '78964510', '995,Ustad Amir Khan Sarani, Kol-82', '2017-04-26', 'superadmin', '562145'),
(331, 'Bijoy Show', 'bs@mail.com', '9903088134', '78962436', '1101/T, Ustad Amir Khan Sarani , Kol-82', '2017-04-26', 'superadmin', '98765'),
(332, 'Ranjit Shaw ', 'rs@mail.com', '8820538303', '8964753205', '421,Ram Krishna nagar, Dolly Villa, Kol-82', '2017-04-26', 'superadmin', '789654'),
(333, 'Manoj Shaw ', 'ms@mail.com', '8481043785', '7896304', '724/B Ram Krishna nagar, Dolly Villa, Kol-82', '2017-04-26', 'superadmin', '213264'),
(334, 'Jaganath Bhandar ', 'jb@mail.com', '8420589331', '789654321', 'Sodepur, Ramkrishna nagar, Kol-82', '2017-04-26', 'superadmin', '963145'),
(335, 'Bimal Dey ', 'bd@mail.com', '9748226418', '87792536', '213, Sodepur, Near Ram Kamal School, Kol- 82', '2017-04-26', 'superadmin', '65214'),
(336, 'Dayaler Dorber', 'dd@mail.com', '8961404074', '56132276', '618, Sodepur Road, Ram Kamal, Khaler Math, Kol-82', '2017-04-26', 'superadmin', '8974561'),
(337, 'Mahesh Bhandar', 'mb@mail.com', '9339224828', '8964712', '282, Sodepur Road, Kol- 82', '2017-04-26', 'superadmin', '987456'),
(338, 'Maa Kali Bhandar', 'mkb@mail.com', '9903260745', '897456310', '60,Sodepur Road, Kol-82', '2017-04-26', 'superadmin', '987456'),
(339, 'Swastik Bhandar ', 'sb@mail.com', '9007608708', '7896541', 'No.4, Haridevpur New Road, Kol-82', '2017-04-26', 'superadmin', '546218'),
(340, 'Sansar Stores ', 'ss@mail.com', '9830124902', '87456213', '36-A,Sodepur, Brick Field Road, Kol-82', '2017-04-26', 'superadmin', '69842'),
(341, 'Happy General Stores ', 'hgs@mail.com', '7278254233', '897456312', '313/ 47/A, Banomali Banerjee Road, Kol-82', '2017-04-26', 'superadmin', '897456'),
(342, 'Husen Enterprise', 'he@mail.com', '8902567631', '96475310', '1/3, K.K. Road, Kol-82', '2017-04-26', 'superadmin', '89647'),
(343, 'New Swastik Bhandar ', 'nsb@mail.com', '8100302833', '78965214', 'No.20,Ustad Amir Khan Sarani, Kol-82', '2017-04-26', 'superadmin', '568921'),
(344, 'Trinath Stores ', 'ts@mail.com', '9836684582', '8796314', '131, Sodepur, S.S.Dharma Collony, Kol-82', '2017-04-26', 'superadmin', '84569'),
(345, 'Dipa Bhandar', 'db@mail.com', '9830043614', '9857461', '110, Sodepur, S.S. Dhaman Collony, Kol-', '2017-04-26', 'superadmin', '256314'),
(346, 'Prakash Shaw ', 'ps@mail.com', '7896521', '256314023', 'No.83, S.S. Dhaman Collony, Sodepur, Brick Field Road, Kol-82', '2017-04-26', 'superadmin', '9456317'),
(347, 'Tara Maa Stores ', 'tms@mail.com', '8961013942', '89745621', '8/9,Brick Field Road, Kol-82', '2017-04-26', 'superadmin', '7890214'),
(348, 'Laxmi Stores ', 'ls@mail.com', '9051684136', '78963401', '5/29, Azad Garh, Kol-40', '2017-04-26', 'superadmin', '897456'),
(349, 'Ranjit Shaw ', 'rs@mail.com', '7890343871', '6974215', '5/1, Azad Garh, Kol-40', '2017-04-26', 'superadmin', '9630147'),
(350, 'New Shree Guru Bhandar', 'nsgb@mail.com', '9903216824', '78963245', '2/209,Azadgarh, Kol- 40', '2017-04-26', 'superadmin', '786534'),
(351, 'Madhusudhan Bhandar', 'msb@mail.com', '8017859049', '4569872', '2/23,Azad Garh, Kol-40', '2017-04-26', 'superadmin', '2156984'),
(352, 'Maa Kali Variety', 'mkv@mail.com', '3358942', '7896421', '1/108/3, Azad Garh, Kol-40', '2017-04-26', 'superadmin', '231146'),
(353, 'Aman Gupta', 'ag@mail.com', '9163805473', '789653124', '2/69, Azad Garh, Kol-40', '2017-04-26', 'superadmin', '7896521'),
(354, 'New Matri Bhandar', 'nmb@mail.com', '9831218275', '78960364', '2/46A, Azad Garh, Kol-40', '2017-04-26', 'superadmin', '7896521'),
(355, 'Saha Stores ', 'ss@mail.com', '3336458', '5649681032', '2/46/A, Azad Garh Kol-40', '2017-04-26', 'superadmin', '213654'),
(356, 'M/s. Jupiter', 'ju@mail.com', '9831552054', '56314876', '140/32/1,N.S.C.Bose Road, Kol-40', '2017-04-26', 'superadmin', '123658'),
(357, 'Munna Stores ', 'ms@mail.com', '8017242156', '789632014', '3/10/A Azad Garh, Kol-40', '2017-04-26', 'superadmin', '7896213'),
(358, 'Maa Kali Bhandar', 'mkb@mail.com', '9432340400', '45698721', '3/21, Azad Garh, Kol-40', '2017-04-26', 'superadmin', '56391'),
(359, 'Puspa Bhandar', 'pb@mail.com', '9830190391', '156987423', '81/14/A,Regent Collony, Kol-40', '2017-04-26', 'superadmin', '789561'),
(360, 'Rakhi Variety Stores ', 'rvs@mail.com', '9831612255', '456987123', '42/1/3 Grahms Road, Kol - 40', '2017-04-26', 'superadmin', '7896310'),
(361, 'Sanjoy Stores ', 'ss@mail.com', '9088166812', '7896541032', '42, Grahms Road, Kol-40', '2017-04-27', 'superadmin', '9874566'),
(362, 'Proshanto Bhandar', 'pb@mail.com', '9903811439', '7896412623', '2/86/A, Regent Collony, Kol-40', '2017-04-27', 'superadmin', '789542'),
(363, 'Maa Laxmi Bhandar', 'mlb@mail.com', '7890887001', '78965241', '2/68, Regent collony, Kol-40', '2017-04-27', 'superadmin', '0123654'),
(364, 'Sanjoy Stores (2)', 'ss@mail.com', '987429053', '78965241', '70, Regent Collony, Kol-40', '2017-04-27', 'superadmin', '69845'),
(365, 'Rajendra Shaw ', 'rs@mail.com', '9339840691', '5469872', '186,Regent Collony, Kol-40', '2017-04-27', 'superadmin', '469782');
INSERT INTO `td_client` (`cl_id`, `clname`, `clemail`, `clphn`, `clpan`, `cladd`, `addate`, `adby`, `cgst`) VALUES
(366, 'Laxmi Stores ', 'ls@mail.com', '9231989632', '78864310', '41/126, N.S.C.Bose Road,Kol-40', '2017-04-27', 'superadmin', '789652'),
(367, 'Kundu Traders ', 'kt@mail.com', '9831315804', '6549821302', '                                185, Regent Collony Kol-40                               ', '2017-04-27', 'superadmin', '789641'),
(368, 'Shankar Stores', 'ss@mail.com', '8334024059', '78954621', '22, Jodhpur Gardens Kol-45', '2017-04-27', 'superadmin', '782156'),
(369, 'Gupta Stores (Chakki) ', 'gs@mail.com', '8961385587', '78965413', '244,Jodhpur Park,Kol-68', '2017-04-27', 'superadmin', '789543'),
(370, 'Ganesh Bhandar ', 'Gb@mail.com', '9933547419', '789522532', '530/A, Jodhpur Park Market, Kol-68', '2017-04-27', 'superadmin', '25461'),
(371, 'Sunil Stores (Chakki)', 'sc@mail.com', '8820531940', '789563212', '530/A, Jodhpur Park Market, Kol-68', '2017-04-27', 'superadmin', '895462'),
(372, 'Prasasta Saha', 'ps@mail.com', '9836955069', '78964253', '530/A, Jodhpur Park Market, Kol-68', '2017-04-27', 'superadmin', '789463'),
(373, 'Trinath Dasokarma', 'td@mail.com', '9903734903', '778895631', '530/A, Jodhpur Park Market, Kol-68', '2017-04-27', 'superadmin', '325649'),
(374, 'Radha Rani Stores ', 'rrs@mail.com', '9831913415', '789652413', '530/A, Jodhpur Park Market, Kol-68', '2017-04-27', 'superadmin', '78945'),
(375, 'Loknath Bhandar', 'lb@mail.com', '8820657873', '789652140', '530/A, Jodhpur Park Market,Kol-68', '2017-04-27', 'superadmin', '78965'),
(376, 'Shankar Stores ', 'ss@mail.com', '9331871704', '6548689', '530/A, Jodhpur Park Market, Kol-68', '2017-04-27', 'superadmin', '45685'),
(377, 'Bolai Biswas ', 'bb@mail.com', '9007172193', '89456213', 'No. 31, Rahim Ostaga Lane, Kol- 45\r\n', '2017-04-27', 'superadmin', '7895614'),
(378, 'M. Lal Stores ', 'ml@mail.com', '9038313074', '4595611474', '8/x Rohim Ostaga, Kol-45\r\n', '2017-04-27', 'superadmin', '45658721'),
(379, 'Lokenath Bhandar ', 'lb@mail.com', '9038490530', '789965462', 'No. 48, Gobindo pur Road, Kol-45', '2017-04-27', 'superadmin', '789512'),
(380, 'R.K. Gupta', 'rk@mail.com', '7003690718', '7896546', '62/2, Gobindopur Road, kol-45', '2017-04-27', 'superadmin', '263541'),
(381, 'Narayan Bhandar', 'nb@mail.com', '9007578201', '78965612', '43, Dasnagar, Kol-', '2017-04-27', 'superadmin', '654825'),
(382, 'Ram Krishna Bhandar', 'rk@mail.com', '9831741330', '7896524', '164/C/1,Prince Anwar Shah Road, Lake Gardens, Kol-45', '2017-04-27', 'superadmin', '89715'),
(383, 'Quick querier Service', 'qqs@mail.com', '9831553231', '78956412', '5/1, Jodhpur Garden, Kol-45', '2017-04-27', 'superadmin', '894546'),
(384, 'Sayan Stores', 'ss@mail.com', '9831566179', '5647799', '218/A, Prince Anwar Shah Road, Kol- 45', '2017-04-27', 'superadmin', '632104'),
(385, 'Shree Guru Bhandar ', 'sg@mail.com', '9051834270', '56489110', '188/23/A, Prince Anwar Shah Road, Kol-45', '2017-04-27', 'superadmin', '56974'),
(386, 'Basudev Bhandar', 'bb@mail.com', '99039800151', '564897325', '162/17, Lake Gardens , Kol-', '2017-04-27', 'superadmin', '365478'),
(387, 'Arjun Shaw ', 'as@mail.com', '9007190339', '789546123', '14/16, Doctor Debdhar Road, Kol- 33', '2017-04-27', 'superadmin', '2564314'),
(388, 'Bhola Shaw', 'bs@mail.com', '7044299901', '45669712', 'C/23, Charu Chandra Place, Kol-33', '2017-04-27', 'superadmin', '21564'),
(389, 'Maa Kali Bhandar', 'mkb@mail.com', '7044336585', '78954625', '299, Jodhpur Garden, Kol-45', '2017-04-27', 'superadmin', '78945'),
(390, 'Shree Bishnu Bhandar', 'sbb@mail.com', '9038336448', '78965142', '58/122, P.A.Road, Kol-45', '2017-04-27', 'superadmin', '69875'),
(391, 'Joy Maa Kali Bhandar', 'jmb@mail.com', '9674416305', '1224547', 'B/205,Lake Gardens, Kol-45', '2017-04-27', 'superadmin', '9684'),
(392, 'Dashokarma Bhandar ', 'db@mail.com', '9477430318', '78965142', '99, Charu Chandra Place, East,Kol-33', '2017-04-27', 'superadmin', '631452'),
(393, 'R.C. Shaw ', 'rcs@mail.com', '9163723865', '7895214', 'No.1,Lake Garden, Kol-45', '2017-04-27', 'superadmin', '56214'),
(394, 'S.D. Enterprise', 'sde@mail.com', '9831094669', '56318984', 'C/42, K.M.D. Quater, Kol-33', '2017-04-27', 'superadmin', '213564'),
(395, 'Fresh & Foods ', 'ff@mail.com', '8017089801', '78952410', '162,A Lake Gardens, Kol-45', '2017-04-27', 'superadmin', '36452'),
(396, 'Sree Krishna Bhandar', 'skb@mail.com', '8961002746', '78956421', '                                114/A, Lake Gardens, Super Market, Kol- 45                               ', '2017-04-27', 'superadmin', '361254'),
(397, 'Trinath Bhandar', 'tb@mail.com', '33241710601', '78965241', '114/A, Lake Gardens,Super market, Kol-45', '2017-04-27', 'superadmin', '726541'),
(398, 'Mehetab Stores ', 'ms@mail.com', '9804964768', '78956116', 'No. 1, Chandan Village Road, Kol-82', '2017-04-27', 'superadmin', '23146'),
(399, 'Maa Manosha Bhandar ', 'mmb@mail.com', '9681905192', '5698427', '18/1/2,Chandan Village Road, Kol-82', '2017-04-27', 'superadmin', '23657'),
(400, 'Joty Bhandar ', 'jb@mail.com', '8981833628', '89641251', 'No.71, Chandan Village Road, Kol-82', '2017-04-27', 'superadmin', '778902'),
(401, 'Sree Durga Bhandar ', 'sdb@mail.com', '8282983009', '7869543', '43/A,H.M.I. Road, Kol-82', '2017-04-27', 'superadmin', '46324'),
(402, 'Tara Maa Variety Stores ', '  tmv@mail.com', '9831987834', '45698723', '127, H.M.I. Road, Kol-82', '2017-04-27', 'superadmin', '13635'),
(403, 'Sumon Variety Stores ', 'svs@mail.com', '9007359649', '78954612', 'No.27,HMI Road, Kol-82', '2017-04-27', 'superadmin', '61303'),
(404, 'Bina Pani Stores ', 'bb@mail.com', '8272904171', '1569834', '25/25m Sodepur Fast Lane, Kol-82', '2017-04-27', 'superadmin', '4569827'),
(405, 'Netai Mondal', 'nm@Mail.com', '3325648', '77895642', 'Sodepur, 2nd lane, Kol-', '2017-04-27', 'superadmin', '658420'),
(406, 'Saha Stores ', 'ss@mail.com', '9674216558', '78946113', 'Sodepur, 2nd lane, Kol-', '2017-04-27', 'superadmin', '123658'),
(407, 'Dipankar Stores ', 'ds@mail.com', '9051729253', '78945613', '85, Karunamoyee Ghat Road, Kol-82', '2017-04-27', 'superadmin', '123466'),
(408, 'Santohsi Bhandar ', 'sb@mail.com', '9748660302', '78945620', '20 N, Karunamoyee Ghat Road, Kol-82', '2017-04-27', 'superadmin', '123456'),
(409, 'Rakesh Stores', 'rs@mail.com', '9831625650', '69874521', '18/N, Najur Ostaga Lane, Kol-41', '2017-04-27', 'superadmin', '213654'),
(410, 'Gupta Stores ', 'gs@mail.com', '8013040165', '78945621', '6/2, Najur Ostaga Lane, Kol- 41 ', '2017-04-27', 'superadmin', '32165'),
(411, 'Sadhuka Bhandar', 'sb@mail.com', '8013179873', 'A2CPS8039C', 'P-41, Maglish Ara Road,Kol- 41', '2017-04-27', 'superadmin', '1236587'),
(412, 'Bachu Adhikary ', 'ba@mail.com', '9163582575', '78954625', '6012, P.B. Road, Kol-41', '2017-04-27', 'superadmin', '215464'),
(413, 'Gita Stores', 'gs@mail.com', '9339956970', '789546210', '23/25, P.B. Road, Kol-41', '2017-04-27', 'superadmin', '63475'),
(414, 'Bijoy Stores ', 'bs@mail.com', '8420576087', '98756314', 'P.307.P.B. Road, Kol-41', '2017-04-27', 'superadmin', '32456'),
(415, 'Maa Kali Bhandar ', 'mkb@mail.com', '8582918563', '789213647', '56, P. B. Road, Kol-41', '2017-04-27', 'superadmin', '102354'),
(416, 'Gulsan Stores ', 'gs@mail.com', '9007876481', '78964513', '95/2,M.L.G. Road, Kol-82', '2017-04-27', 'superadmin', '32566'),
(417, 'Ratnadeep Stores ', 'rs@mail.com', '9339018758', '789541232', '608, M.L.G. Road, Kol-82', '2017-04-27', 'superadmin', '789564'),
(418, 'K.L. Sharma', 'kls@mail.com', '9836392106', '7898620145', '252,M.L.G. Road, Sodepur Bazar,Kol-82', '2017-04-27', 'superadmin', '789654'),
(419, 'Maity  Stores ', 'ms@mail.com', '9038966621', '7896546321', 'Sodepur bazar, M.L.G. Road, Kol-82', '2017-04-27', 'superadmin', '56247'),
(420, 'New Laxmi Stores ', 'nls@mail.com', '9239742591', '7896521', '87, R.R.M. Road, Kol-8', '2017-04-27', 'superadmin', '89641'),
(421, 'Amit Stores ', 'as@mail.com', '7890353762', '789635412', '467-A, R.R.M Road, Kol-8', '2017-04-27', 'superadmin', '35412'),
(422, 'Joy Ambe Stores', 'jas@mail.com', '7278432803', '78963125', '85, B.R. Road, Kol-8', '2017-04-27', 'superadmin', '47896'),
(423, 'Sarothi Bhandar ', 'sb@mail.com', '9830087514', '89654213', '127, R.R.M Road, Kol-8', '2017-04-27', 'superadmin', '7895421'),
(424, 'Raju Stores ', 'rs@mail.com', '7278099969', '78963245', '637,madanmohan,Kol-8', '2017-04-27', 'superadmin', '564213'),
(425, 'Santu Stores ', 'ss@mail.com', '9051882443', '789653487', '                                Purba Patwari Bazar, Kudghat, Kol- 93                            ', '2017-04-27', 'superadmin', '789652'),
(426, 'Laxmi Narayan Bhandar ', 'lnb@mail.com', '7044390032', '2564981', 'Purbo Patwari Bazar, Kudghat, Kol- 93', '2017-04-27', 'superadmin', '36814'),
(427, 'Shree Guru Bhandar ', 'sgb@mail.com', '8599955208', '789654313', 'No.1, Gangapuri, Purba Patwari Bazar, Kudghat, Kol-93', '2017-04-27', 'superadmin', '54632'),
(428, 'Asmit Vareity ', 'av@mail.com', '9836692953', '78901265', '29/A,Gangapuri, Kol-93', '2017-04-27', 'superadmin', '89746'),
(429, 'Maa Manosha Bhandar', 'mmb@mail.com', '9051553765', '6987542123', '6, New Tallygange, Kol-93', '2017-04-27', 'superadmin', '89546'),
(430, 'Sunil Shaw ', 'ss@mail.com', '7890354430', '156183133', '14, Busdroni, G.Collony, Kol-', '2017-04-27', 'superadmin', '12548'),
(431, 'Moha Kali Stores ', 'mks@mail.com', '7605825164', '569783245', '99, New Tollygange, Kol-93', '2017-04-27', 'superadmin', '78961'),
(432, 'Ram Bhandar ', 'rb@mail.com', '8420569022', '74695321', '275, Samaprasad Pally, Kol-93', '2017-04-27', 'superadmin', '231564'),
(433, 'Gopal Saha', 'gs@mail.com', '7449580260', '7896524', '25, Bishnu Pally, Kol-93', '2017-04-27', 'superadmin', '45621'),
(434, 'Jagonath Bhandar', 'jb@mail.com', '9038026406', '89635147', 'P.52, Bishnupally, Kol- 93', '2017-04-27', 'superadmin', '325647'),
(435, 'Shankar Da', 'sd@mail.com', '8017936982', '8946351232', '61,Bishnu pally, Kol-93', '2017-04-27', 'superadmin', '79786321'),
(436, 'Shuvo Stores ', 'ss@mail.com', '8420283799', '778963052', '6/1,Basdroni , Aam bagan, Kol- 70', '2017-04-27', 'superadmin', '789653'),
(437, 'Paul Brothers ', 'pb@mail.com', '9331874231', '789564521', 'Basdroni, Bondipur Road, Kol-70', '2017-04-27', 'superadmin', '12350'),
(438, 'Kanailal Shaw', 'ks@mail.com', '9903388626', '154663045', 'G.G. Collony, Kol-70', '2017-04-27', 'superadmin', '45690'),
(439, 'Anup Stores ', 'as@mail.com', '9163712803', '789632051', '206, Nandipara, Kol-70', '2017-04-27', 'superadmin', '163981'),
(440, 'Sankar Stores ', 'ss@mail.com', '7890551423', '012398745', 'Chakdah, Loknath Pally, Purbo patwari , Kol-93', '2017-04-27', 'superadmin', '56321'),
(441, 'Joy Guru Stores ', 'jgs@mail.com', '9903938946', '456230153', '157/B,Chakdah, Kol-93', '2017-04-27', 'superadmin', '56314'),
(442, 'Dipak Stores ', 'ds@mail.com', '3356984', '45631236', 'Chakdah, Anandopally, Kol-', '2017-04-27', 'superadmin', '879365'),
(443, 'Joy Maa Kali Bhandar', 'jmkb@mail.com', '9903185639', '4569872103', 'A143,Anadopally, East,Kol-93', '2017-04-27', 'superadmin', '89456210'),
(444, 'Joy Guru Bhandar', 'jgb@mail.com', '9874093891', '89456123', '143/B, Purbo Anandopally, Kol-93', '2017-04-27', 'superadmin', '12367'),
(445, 'Joy Maa Kali Bhandar', 'jmkb@mail.com', '9339241403', '12305689', 'Dhakshin Anandopally, Kol-93', '2017-04-27', 'superadmin', '896325'),
(446, 'Mondal Bhandar', 'mb@mail.com', '7278727469', '789635321', 'Chakdah, Panchanno Tala, Kol-93\r\n\r\n', '2017-04-27', 'superadmin', '123546'),
(447, 'Joy Maa Kali Bhandar', 'jmk@mail.com', '8013415685', '78963150', 'Anandopally Bazar, Purbo Patwari, Kol-93', '2017-04-27', 'superadmin', '7893214'),
(448, 'Karunamoyee Bhandar', 'kb@mail.com', '9007440473', '156498736', 'Anandopally, Purbo Patwari Bazar, Kol-93', '2017-04-27', 'superadmin', '789654'),
(449, 'Pappu Stores ', 'ps@mail.com', '9804334244', '789632541', '13, Anandopally(west), Purbo Patwari, Kol-93', '2017-04-27', 'superadmin', '456312'),
(450, 'Radha Krishna Bhandar ', 'rkb@mail.com', '9007070572', '7789421056', 'Chakdah, Dhalipara, (near DPS), Kol-93', '2017-04-27', 'superadmin', '896521'),
(451, 'Sumon Variety Stores ', 'svs@mail.com', '9831650055', '145698235', 'Chakdah, Dhali para, Purbo Patwari,Kol-93', '2017-04-27', 'superadmin', '89654'),
(452, 'Bapi Stores ', 'bs@mail.com', '9674868357', '789623014', '48B, Bishnupally, Kol-93', '2017-04-27', 'superadmin', '8963541'),
(453, 'Ananya Stores ', 'as@mail.com', '8981567422', '789652104', '1/51, paschim patwari, No.1, Collony, Kol-41', '2017-04-27', 'superadmin', '9631547'),
(454, 'Krishna Stores ', 'ks@mail.com', '9088264144', '78965214', '20, Banerjee para Road, Kol-41', '2017-04-27', 'superadmin', '56234'),
(455, 'Umesh Shaw ', 'us@mail.com', '9433433506', '789632403', '196,Banerjee Para Road, Kol-41', '2017-04-27', 'superadmin', '789632'),
(456, 'Sumon Variety Stores ', 'svs@mail.com', '9231627494', '789689746', 'No.19,Banerjee Road, Kol-41', '2017-04-27', 'superadmin', '78956'),
(457, 'Litu Da', 'ld@mail.com', '9233196187', '56984210', '11/ Banerjee para, Kol -41', '2017-04-28', 'superadmin', '89641'),
(458, 'Ramdev Shaw', 'rs@mail.com', '9831610889', '456213978', '19, Banerjee para, Kol-41', '2017-04-28', 'superadmin', '789450'),
(459, 'A. Mondal', 'am@mail.com', '9874673297', '7895146', '31/ M.G.Road, Kol-83', '2017-04-28', 'superadmin', '2136454'),
(460, 'Narayan Bhandar ', 'nb@mail.com', '9830134384', '12654802', '140, Panchanno tala, Kol- 41', '2017-04-28', 'superadmin', '7896542'),
(461, 'Aparna Stores', 'as@mail.com', '9051201044', '456213015', '246, Panchannotala Road, Kol-41', '2017-04-28', 'superadmin', '962314'),
(462, 'Anup Stores ', 'as@mail.com', '9062749573', '78954120', '145(40) Panchannotala Road, Kol-41', '2017-04-28', 'superadmin', '89456'),
(463, 'Satyander Stores ', 'ss@mail.com', '9836098525', '56412147', '358/c,Panchannotala, Road, Kol-41', '2017-04-28', 'superadmin', '895461'),
(464, 'Shankar Stores ', 'ss@mail.com', '9830243175', '45632104', '29/13, Naskar para Road, Kol-41', '2017-04-28', 'superadmin', '456982'),
(465, 'Koushal Stores ', 'ks@mail.com', '9804387174', '45698210', '78/3, Naskar Para Road, Kol-41', '2017-04-28', 'superadmin', '8965412'),
(466, 'Amla Variety Stores ', 'avs@mail.com', '9748712494', '7896501', '29,Naskarpara Road, Kol-41', '2017-04-28', 'superadmin', '650125'),
(467, 'Maa Manosha Bhandar', 'mmb@mail.com', '23358974', '789654120', '69/1, M.G.Road Kol-82 ', '2017-04-28', 'superadmin', '756842'),
(468, 'Laxman Variety Stores ', 'lvs@mail.com', '9831652745', '6325410', '408/250, Banerjee para Road, Kol-41', '2017-04-28', 'superadmin', '631548'),
(469, 'New Gour Bhandar ', 'ngb@mail.com', '9230714309', '7896240', '                                32/2, Banerjee para  Road, Kol-41                                ', '2017-04-28', 'superadmin', '864984'),
(470, 'Banik Stores ', 'bs@mail.com', '8981200927', '256981', '1/3 Taramoni Ghat Road, Kol-41', '2017-04-28', 'superadmin', '2563104'),
(471, 'Paul Variety Stores', 'pvs@mail.com', '9038419590', '7895461', '11/A, Banerjee para Road, Kol-41', '2017-04-28', 'superadmin', '896201'),
(472, 'Swapan Gayen', 'sg@mail.com', '3356864', '695489321', '124, Koura pukur Bazar, Kol-82', '2017-04-28', 'superadmin', '895421'),
(473, 'Radha Gobindo Bhandar ', 'rgb@mail.com', '9836388935', '78965421', '155/1,M.G. Road, Kol-82', '2017-04-28', 'superadmin', '965412'),
(474, 'Maa Kali Bhandar ', 'mkb@mail.com', '8017405167', '78961520', '192,Taramoni Ghat Road, Kol -41\r\n', '2017-04-28', 'superadmin', '569814'),
(475, 'Adhikary Bhandar', 'ab@mail.com', '9831420139', '78956412', '192, Taramoni Ghat Road, Kol-41', '2017-04-28', 'superadmin', '68592'),
(476, 'Maa Sitala Stores ', 'mss@mailI.com', '8478833791', '789545', 'M.G.Road,Kol-82', '2017-04-28', 'superadmin', '58642'),
(477, 'Maa Kali Stores  (patato)', 'mks@mail.com', '9830311976', '8965421', '15/3 M.G.Road, Kol-82', '2017-04-28', 'superadmin', '562981'),
(478, 'Samparko ', 'sm@mail.com', '9831071711', '63254122', 'Purbo  Patwary, Nakkar, Kol-93,', '2017-04-28', 'superadmin', '84650'),
(479, 'Gita Stores ', 'gs@mail.com', '987489188', '789564', '                                Purbo Pawtary para, Natun Pally Kol-93\r\n\r\n\r\n                                ', '2017-04-28', 'superadmin', '658210'),
(480, 'Balaji', 'bs@mail.com', '9831971801', '4789621', '                                26, S.R.Das Road,Kol-26                                ', '2017-04-28', 'superadmin', '3265891'),
(481, 'Ram Krishna Bhandar ', 'rkb@mail.com', '9836153432', '56984213', '                                P/46, Nepal Bhattacherjee  1st lane, Kol- 26                               ', '2017-04-28', 'superadmin', '896513'),
(482, 'Rambabu Stores ', 'rbs@mail.com', '9038007047', '8965234', '                                40/1, Tallygange Road, Kol- 26                               ', '2017-04-28', 'superadmin', '569821'),
(483, 'Joy Prakash Stores ', 'jps@mail.com', '8961636886', '5612341023', '                                102, Tallygange Road, Kol- 26                               ', '2017-04-28', 'superadmin', '568754'),
(484, 'Maa Kali Stores', 'mks@mail.com', '7890620794', '78963542', '                                44A, Tallygange Road,Kol-  26                              ', '2017-04-28', 'superadmin', '98456'),
(485, 'Ajit Kr. Sadhukha', 'aks@mail.com', '8017438840', '568792105', '                                47, Tallygange Road, Kol- 26                               ', '2017-04-28', 'superadmin', '456982'),
(486, 'Biswanath Bhandar ', 'bsb@mail.com', '9831766013', '15624378', '                                107,Tallygange Road, Kol-  26                              ', '2017-04-28', 'superadmin', '5862421'),
(487, 'Bhola Prasad Saha', 'bps@mail.com', '9163040190', '7895456', '                                27, Tallygange Road, Kol- 26                               ', '2017-04-28', 'superadmin', '8946143'),
(488, 'Sushila Bhandar ', 'sb@mail.com', '8620948408', '789654312', '                                2/C, Tallygange Road,Kol- 26                               ', '2017-04-28', 'superadmin', '569123'),
(489, 'M. Paul', 'mp@mail.com', '9804085254', '7896325', '275,Kalighat Road, Kol-', '2017-04-28', 'superadmin', '789564'),
(490, 'Ajil Kr. Sadhukha', 'aks@mail.com', '9836235702', '78693210', '17M, Mohim Halder Street', '2017-04-28', 'superadmin', '778632'),
(491, 'Mamoni  Storers', 'ms@mail.com', '8100739017', '75263540', '22, Sadanand Road, Kol-', '2017-04-28', 'superadmin', '5698210'),
(492, 'Gouri Variety Stores', 'gvs@mail.com', '9062757363', '459698', '12/1,Halder Para Road, Kol-', '2017-04-28', 'superadmin', '78955'),
(493, 'Dilip Gouri Bhandar', 'dgb@mail.com', '8820831475', '78964215', '58,Iswar Ganguli Street,Kol-', '2017-04-28', 'superadmin', '78952'),
(494, 'Guin Enterprise', 'ge@mail.com', '9830838318', '781456612', '51, Iswar Ganguli Street, Kol-', '2017-04-28', 'superadmin', '456174'),
(495, 'Laxmi Bhandar ', 'lm@mail.com', '9007787746', '789546321', '31/6, Sadanand Road, Kol-', '2017-04-28', 'superadmin', '963214'),
(496, 'Lal Babu', 'lb@mail.com', '7044725740', '1575332514', '49A, Sadanand Road, Kol-', '2017-04-28', 'superadmin', '7894'),
(497, 'Joy Hind', 'jh@mail.com', '9903493010', '4589433', '49A,Sadanand Road, Kol-', '2017-04-28', 'superadmin', '125736'),
(498, 'Nandy Stores ', 'ns@mail.com', '9433479891', '5498431', '70A, Nepal Bhattacherjee Street, Kol-', '2017-04-28', 'superadmin', '489813'),
(499, 'Ajoy & Bijoy ', 'ab@mail.com', '9231666138', '45669811', '8B,Nepal Bhattacherjee Street, Kol-', '2017-04-28', 'superadmin', '78946'),
(500, 'Om Prakash Agarwal', 'opa@mail.com', '9830711527', '45789522', 'Gobinda  Roy Road, Chetla, Kol-', '2017-04-28', 'superadmin', '78946'),
(501, 'S.L. Chowdhury', 'slc@mail.com', '8697626123', '8945621', '28 , P.M.Road, Kol-', '2017-04-28', 'superadmin', '163570'),
(502, 'Pannalal', 'pa@mail.com', '7890672697', '78986412', '42A, J.M. Lane, Kol-', '2017-04-28', 'superadmin', '789631'),
(503, 'Adhikari Stores ', 'as@mail.com', '9874164412', '78954621', 'Shop.153, Chetla, C.I.T. Market, Kol-', '2017-04-28', 'superadmin', '789546'),
(504, 'Beena Pani Stores ', 'bps@mail.com', '335583', '78995251', 'Shop.134,Chetla, C.I.T. Market, Kol-', '2017-04-28', 'superadmin', '982113'),
(505, 'H.L. Agarwal', 'hl@mail.com', '9331192783', '89451123', '1,Debnarayan Banerjee Road, Kol-', '2017-04-28', 'superadmin', '8974521'),
(506, 'New Samanto', 'ns@mail.com', '9748911228', '459763611', '180, Kalighat Market, Kol-', '2017-04-28', 'superadmin', '789431'),
(507, 'Ashok Shaw', 'as@mail.com', '9804407440', '789655412', '180, Kalighat Market, Kol-', '2017-04-28', 'superadmin', '7156631'),
(508, 'Das Brothes ', 'db@mail.com', '8961690923', '789665413', '180, Kalighat Market, Kol-', '2017-04-28', 'superadmin', '4569821'),
(509, 'Maa Shitala Bhandar ', 'msb@mail.com', '9874148964', '45969871', '114/3A, Tallygange Road, Kol-', '2017-04-28', 'superadmin', '7895612'),
(510, 'Samonto Corner', 'sc@mail.com', '9231685354', '78965524', '180, Kalighat Math, Kol-', '2017-04-28', 'superadmin', '568413'),
(511, 'Firdous', 'fir@mail.com', '9163619692', '789463611', '1m, Sapgachi, 1st Lane, Kol-', '2017-04-28', 'superadmin', '256461'),
(512, 'Brinda (Kundan Shaw)', 'bri@mail.com', '9163310583', '1555653', '16A, C.N.Roy Road, Kol-', '2017-04-28', 'superadmin', '89946'),
(513, 'Ashok Shaw', 'as@mail.com', '9836184576', '44696987', 'No.3,Sapgachi 1st Lane, Kol-', '2017-04-28', 'superadmin', '456321'),
(514, 'Bidyanath', 'bn@mail.com', '9163501930', '78965421', '6B/1, Sapgachi 1st Lane', '2017-04-28', 'superadmin', '456982'),
(515, 'S.K. Motilal', 'sk@mail.com', '7278541008', '45669423', '7G. Sapgachi 1st, Lane, Kol-', '2017-04-28', 'superadmin', '789461'),
(516, 'Uday Shaw', 'us@mail.com', '8981803458', '7896541', '62H, Topsia Road, Kol-', '2017-04-28', 'superadmin', '456151'),
(517, 'Dharmender Shaw', 'ds@mail.com', '9062334854', '789546121', '5C/1 Topsia 2nd Lane, Kol-', '2017-04-28', 'superadmin', '1236458'),
(518, 'Mishri Shaw ', 'ms@mail.com', '7059765457', '456978842', '5C/1 Topsia, 2nd Lane,Kol- ', '2017-04-28', 'superadmin', '158321'),
(519, 'Amday Stores ', 'as@mail.com', '7059765457', '4569821', '9D, Topsia, 2nd lane, Kol-', '2017-04-28', 'superadmin', '321466'),
(520, 'Raj Kumar Gupta', 'rkg@mail.com', '8230852077', '78945661', '8/U, Topsia 2nd Lane, Kol-', '2017-04-28', 'superadmin', '7896511'),
(521, 'Ajoy Gupta', 'ag@mail.com', '8820312032', '78146136', '11/N, Topsia, 2nd Lane,Kol-', '2017-04-28', 'superadmin', '889554'),
(522, 'M.D. Irfan', 'md@mail.com', '8100136626', '45698133', '11C/1, Topsia 2nd Lane, Kol-', '2017-04-28', 'superadmin', '4569822'),
(523, 'Pappu Stores ', 'pa@mail.com', '8981230999', '45698213', '61/1RL, Topsia Road, Kol', '2017-04-28', 'superadmin', '4563181'),
(524, 'Gulsan Stores ', 'gs@mail.com', '8420615917', '18964232', '24G, G.J.Khan Road, Kol-', '2017-04-28', 'superadmin', '489561'),
(525, 'Dilip Shjaw', 'ds@mail.com', '9748507221', '87954613', '20/1A, Topsia 2nd Lane, Kol', '2017-04-28', 'superadmin', '564239'),
(526, 'Aslam Deb', 'ad@mail.com', '9748425122', '48976321', '59,G.J.Khan Road, Kol', '2017-04-28', 'superadmin', '2456315'),
(527, 'Janta Stores', 'js@mail.com', '9051029673', '7796321', '79A/2, G.J. Khan Road, Kol-', '2017-04-28', 'superadmin', '789464'),
(528, 'Binod Shaw', 'bs@mail.com', '9841288254', '56489221', '43/A, G.J. Khan Road, Kol-', '2017-04-28', 'superadmin', '7895461'),
(529, 'J. Bismillah', 'jb@mail.com', '8961169219', '789653412', '63/1, G.J. Khan Road, Kol-', '2017-04-28', 'superadmin', '1236549'),
(530, 'Samsher Stores ', 'ss@mail.com', '9143466711', '7896564', '47L/1C/1, G.J.Khan Road,Kol-', '2017-04-28', 'superadmin', '456321'),
(531, 'Bhola Shaw', 'bs@mail.com', '8582865963', '15698745', '42/J,G.J.Khan Road, Kol-', '2017-04-28', 'superadmin', '4569876'),
(532, 'M.D. Selim', 'md@mail.com', '7044377454', '7896542103', '42/1, Topsia Road, Kol-', '2017-04-28', 'superadmin', '123654'),
(533, 'Suleman Stores ', 'ss@mail.com', '9143568437', '569841123', '35/3/6A Topsia Road, Kol-', '2017-04-28', 'superadmin', '8945632'),
(534, 'Jahar Lal', 'jl@mail.com', '8981846972', '2365494', '4D, Sapgachi 2nd Lane,Kol-', '2017-04-28', 'superadmin', '89564'),
(535, 'Sitala Bhandar ', 'sb@mail.com', '7044602116', '2356489', '4, Sapgachi 2nd Lane, Kol-', '2017-04-28', 'superadmin', '489761'),
(536, 'Rinky Devi', 'rd@mail.com', '8420441304', '7896547', '14/B,Sapgachi 1st Lane', '2017-04-28', 'superadmin', '7894611'),
(537, 'Radha Electirc', 're@mail.com', '9903090192', '789621546', '49B, G.J. Khan Road, Kol-39', '2017-04-28', 'superadmin', '6354789'),
(538, 'B.L.Shaw', 'bl@mail.com', '9038787665', '45632148', '190A, R.B. Avinue, Kol-29', '2017-04-28', 'superadmin', '475638'),
(539, 'R.N. Shaw', 'rn@mail.com', '8017046781', '789635412', '190A,R.B.Avinue, Kol-29', '2017-04-28', 'superadmin', '563841'),
(540, 'Nabin Stores ', 'ns@mail.com', '9433094163', '456312', 'P594, Purna Das Road, Kol-29', '2017-04-28', 'superadmin', '78961'),
(541, 'Shree Guru Bhandar ', 'sg@mail.com', '9831394812', '4569821', 'No.7, Lake camp, Jatin Bagchi Road,Kol-29', '2017-04-28', 'superadmin', '789456'),
(542, 'Upadhay Stores ', 'us@mail.com', '9831553347', '7896310', 'Jatin Bagchi Road, Kol-29', '2017-04-28', 'superadmin', '125468'),
(543, 'Fula Stores ', 'fs@mail.com', '9831553351', '45697310', '20/1A, Lake View Road, Kol-29', '2017-04-28', 'superadmin', '123971'),
(544, 'New Krishna Stores ', 'nks@mail.com', '9831588186', '789652135', '20/1A, Lake View Road, Kol-29', '2017-04-28', 'superadmin', '789426'),
(545, 'Tulsi Bhandar', 'ts@mail.com', '9874238014', '45698231', '20A, Lake View Road, Kol-29', '2017-04-28', 'superadmin', '7468714'),
(546, 'Laxmi Stores ', 'ls@mail.com', '9733678818', '56982134', '16/2, Lake View Road, Kol-29', '2017-04-28', 'superadmin', '7896531'),
(547, 'Kuber Bhandar', 'kb@mail.com', '9433384930', '778946614', '11A,Lake Road, Kol-29', '2017-04-28', 'superadmin', '454692'),
(548, 'Sentu Stores ', 'ss@mail.com', '9432361009', '5698742', '34A, Bipin Paul Road, Kol-26', '2017-04-28', 'superadmin', '456321'),
(549, 'Anurup Stores ', 'as@mail.com', '9038971161', '8945663', '118/2D, M.P.Road,Kol-26', '2017-04-28', 'superadmin', '546814'),
(550, 'Baba Bholanath ', 'bb@mail.com', '9330078868', '894463212', '118/2D, M.P. Road, Kol-26', '2017-04-28', 'superadmin', '7894136'),
(551, 'Indra Dey', 'id@mail.com', '9038961146', '56149631', '17A, M.P. Road, Kol-26', '2017-04-28', 'superadmin', '456813'),
(552, 'Bardwan Rice', 'br@mail.com', '7686907658', '78994564', '19,G.J.Khan Road, Kol-39', '2017-04-28', 'superadmin', '456811'),
(553, 'Agarwal Enterprise', 'ae@mail.com', '9836560311', '78965412', 'No. 450, Kalighat Road-26', '2017-04-28', 'superadmin', '123654'),
(554, 'Mondal Stores ', 'ms@mail.com', '8013825574', '79524613', '19/C, Iswar Ganguli Street,Kol-26', '2017-04-28', 'superadmin', '9861021'),
(555, 'Biswanath Bhandar ', 'bb@mail.com', '9903307610', '789564561', '16/2, M.P.Road, Kol-26', '2017-04-28', 'superadmin', '9645132'),
(556, 'A.Shaw', 'as@mail.com', '9230461466', '456978321', '12/G, Nandalal Jew Road, Kol-26', '2017-04-28', 'superadmin', '789436'),
(557, 'S.M. Stores', 'ss@mail.com', '9830868712', '78945663', '124, A.M.D, Road, Kol-26 (opp. Cambrises School)', '2017-04-28', 'superadmin', '546621'),
(558, 'Maity Stores ', 'ms@mail.com', '9038929674', '78963154', '21, M.P. Road, Kol-26', '2017-04-28', 'superadmin', '751492'),
(559, 'New Gandheswari Bhandar ', 'ngb@mail.com', '9433443594', '5986412', 'Lake Market, Stole No. A9, Kol-29', '2017-04-28', 'superadmin', '63541'),
(560, 'Paul Babur Dokan', 'pb@mail.com', '3364666', '7856314', 'Lake market, Stole No.10, Kol-29', '2017-04-28', 'superadmin', '464982'),
(561, 'Krishi Bhandar ', 'kb@mail.com', '9831290123', '4568131', 'No.17,Parasar Road, Kol-29', '2017-04-28', 'superadmin', '7989414'),
(562, 'Chandrika Stores ', 'ch@mail.com', '9831414200', '4567851', 'No.7, Bompass Road, Kol-29', '2017-04-28', 'superadmin', '781313'),
(563, 'Swadhikar', 'swa@mail.com', '9830062479', '78965233', '5A, Bompass Road, Kol-29', '2017-04-28', 'superadmin', '96452736'),
(564, 'Krishna Stores ', 'ks@mail.com', '9831395308', '78962531', '12A, Lake Range Road, Kol-26', '2017-04-28', 'superadmin', '156123'),
(565, 'Maa Annapurna Bhandar ', 'mab@maila.com', '9903030972', '56984121', '7/98, Mukundopur, Kol-99', '2017-04-29', 'superadmin', '7899446'),
(566, 'Sourav Stores ', 'ss@malil.com', '7059583722', '78956413', '6/C, Mukundopur, Kol-99', '2017-04-29', 'superadmin', '8946612'),
(567, 'Joydev Stores ', 'js@mail.com', '9874448836', '478861231', '6/C, Mukundopur,Kol-99', '2017-04-29', 'superadmin', '7894322'),
(568, 'Madhu Stores ', 'ms@mail.com', '8479088540', '896451320', '25, Dinesh Nagar, Mukundopur, Kol-99', '2017-04-29', 'superadmin', '78936514'),
(569, 'Santosh Bala', 'sb@mail.com', '9830149152', '789546123', '185/A, Dinesh Nagar, Mukundopur, Kol-99', '2017-04-29', 'superadmin', '759641'),
(570, 'New Variety Stores ', 'nvs@mail.com', '8961374758', '78914336', 'No.2, Middle Block, Kol- 152', '2017-04-29', 'superadmin', '4569821'),
(571, 'Deepak Stores ', 'ds@mail.com', '9062092780', '45975361', 'Nabogram, No.2, Middle Block,Kol-152', '2017-04-29', 'superadmin', '7889413'),
(572, 'Pradip Bhandar ', 'pb@mail.com', '9051524541', '78113646', 'Nabogram, No. 2, Middle Block, Kol-152', '2017-04-29', 'superadmin', '1231456'),
(573, 'Sankar Stores ', 'ss@mail.com', '9163080776', '4569785', 'Nabogram, Nabosree Bazar,Shiv Mandir, Kol-152', '2017-04-29', 'superadmin', '4563121'),
(574, 'Laxmomia', 'lax@mail.com', '9674542065', '8945661', 'Nabogram, Nabosree Bazar, Near Shiv Mandir, Kol-152', '2017-04-29', 'superadmin', '798946'),
(575, 'Tara Maa Bhandar ', 'tmb@mail.com', '9681245021', '45698712', 'Arya Nagar, Nabosree Bazar, Kol-152', '2017-04-29', 'superadmin', '45698210'),
(576, 'Maa Annapurna Bhandar', 'mab@mail.com', '8017352699', '78965421', 'Nabogram, Purbaplly Panchpota, Kol- 152', '2017-04-29', 'superadmin', '698745'),
(577, 'Anjali Stores ', 'as@mail.com', '9830167388', '78954612', 'Nabogram, NO.2, Middle Block, Nobosree Bazar,Near Sitala Mandir, Kol-152', '2017-04-29', 'superadmin', '565427'),
(578, 'Biswanath Bhandar`', 'bb@mail.com', '8697335693', '78963154', 'Nabogram, Panch pota, Shachindrapally, Kol-152', '2017-04-29', 'superadmin', '5698742'),
(579, 'Laxmi Bhandar', 'lb@mail.com', '7685944503', '7895546', 'Goria, Nabogram,NO.2, Middle Block, Kol-152', '2017-04-29', 'superadmin', '456184'),
(580, 'Ganesh Bhandar', 'gb@mail.com', '8697560236', '56987421', 'Nabogram, No.2, Middle Block, Kol-152', '2017-04-29', 'superadmin', '698241'),
(581, 'Raju Stores ', 'rs@mail.com', '8100035885', '45697863', 'Goria, Nabogram, No.2, Middle Block, Kol-152', '2017-04-29', 'superadmin', '8965412'),
(582, 'Atanu Stores ', 'as@mail.com', '9836850349', '456981237', 'Panchpota, Rabindra Sarani, Kol-152', '2017-04-29', 'superadmin', '45461498'),
(583, 'Bapi Stores ', 'bs@mail.com', '23364886', '45967842', 'Dhalua Naba pally, Pump House, Kol-152', '2017-04-29', 'superadmin', '788143'),
(584, 'Sree Krishna Stores ', 'sks@mail.com', '8420211401', '879446', 'Goria, Panch pota, Shanti nagar, (Near Youth Club)', '2017-04-29', 'superadmin', '65544'),
(585, 'Ganapati', 'Ga@mail.com', '9432187198', '56315884', '                                Goria, Panchpota, Santi nagar, Near Youth Club, Kol-152                                ', '2017-04-29', 'superadmin', '789130'),
(586, 'Maa Lamxi Bhandar', 'mlb@mail.com', '8348449230', '7856621', 'Goria, Shivtala, Kol-152', '2017-04-29', 'superadmin', '96432'),
(587, 'Promila Stores ', 'ps@mail.com', '9088757084', '45456781', 'Goria, Shivtala, Kol-152', '2017-04-29', 'superadmin', '896542'),
(588, 'Kamal Das', 'kd@mail.com', '9674866596', '89645213', 'Goria,Shivtala, Kol-152', '2017-04-29', 'superadmin', '789436'),
(589, 'Bijoy Gupta', 'bg@mail.com', '8820684075', '715123', 'Goria, Shivtala, Kol-152', '2017-04-29', 'superadmin', '6325110'),
(590, 'Riya Stores ', 'rs@mail.com', '9836460501', '984546132', 'Uttar Panchpota, Desbandhu nagar,Sabuj Sangha, D-Block, Kol-152', '2017-04-29', 'superadmin', '7896614'),
(591, 'Santosh Lal', 'sl@mail.com', '9681260758', '96431584', 'Sabuj Sangha, Deshbondhu Nagar, Kol- 152', '2017-04-29', 'superadmin', '845641'),
(592, 'Rajesh Stores ', 'rs@mail.com', '8820119193', '45698213', 'Panchpota, Sabuj Sangha, Kol- 152', '2017-04-29', 'superadmin', '9865412'),
(593, 'Biswakarma', 'bis@mail.com', '7602409864', '4568823', 'Panchpota,Sabuj Sangha, Kol-152', '2017-04-29', 'superadmin', '89461'),
(594, 'Chandra Stores ', 'cs@mail.com', '9674735256', '78966354', 'Sabuj sangha, Milan sangha, Ganga Jawara, Main Road, Kol-152', '2017-04-29', 'superadmin', '7894320'),
(595, 'Loknath Bhandar', 'lb@mail.com', '9830337695', '45698213', 'Sabuj Sangha, Milan Samiti Bazar, Ganga Jawara Main Road, Kol-152', '2017-04-29', 'superadmin', '788491'),
(596, 'Ganesh Bhandar ', 'gb@mail.com', '8420955417', '8945612', 'Sabuj Sangha, Milansanti Bazar, Ganga Jawara Main Road, Kol-152', '2017-04-29', 'superadmin', '45622'),
(597, 'Gandheswari ', 'gan@mail.com', '8697923074', '56984213', 'Sabuj Sanga, Milan Santi Bazar, Ganga Jawara Main Road, Kol-152', '2017-04-29', 'superadmin', '5964311'),
(598, 'Maa Laxmi Bhandar', 'mlb@mail.com', '9836953255', '789654611', '                                Ganga Jawara Main Road,Sabuj sangha, Kol-152                                ', '2017-04-29', 'superadmin', '63987451'),
(599, 'Maa Kali Bhandar ', 'mkb@mail.com', '9903953431', '87456133', 'Ganga Jawara Main Road, Panchpota, Sarada Pally, Kol-152', '2017-04-29', 'superadmin', '635421'),
(600, 'Maa Laxmi Bhandar', 'mlb@mail.com', '7596987328', '698541133', 'Ganga Jawara Main Road, Kol-152', '2017-04-29', 'superadmin', '9642147'),
(601, 'Bhutnath ', 'bh@mail.com', '9831794819', '563121449', 'Natun Diyara, Ganga Jawara Main Road, Kol-152', '2017-04-29', 'superadmin', '963155'),
(602, 'Raju Stores ', 'rs@mail.com', '8961300520', '45697213', 'Natun Diyara, Kol-150', '2017-04-29', 'superadmin', '96143'),
(603, 'Joy Sree Bhandar ', 'jsb@mail.com', '9748730183', '6354210', 'Natun Diyara, Holy Bord K.G. School, Kol-150', '2017-04-29', 'superadmin', '96324'),
(604, 'Sree Krishna Stores ', 'sks@mail.com', '9874880070', '5693421', 'Dhalua, Panchpota, Kol-152', '2017-04-29', 'superadmin', '132505'),
(605, 'Kolkata Bhandar ', 'kb@mail.com', '9903446618', '6935421', '98/A, Aholla Nagar, Kol-99', '2017-04-29', 'superadmin', '894561'),
(606, 'Gobinda Bhandar', 'gb@mail.com', '9831484207', '6321458', '7/102A, Mukundopur, Kol-99', '2017-04-29', 'superadmin', '569821'),
(607, 'Anju Stores', 'as@mail.com', '9051020191', '78965321', '7/101, Mukundopur, Kol-99', '2017-04-29', 'superadmin', '961243'),
(608, 'Mondal Stores ', 'ms@mail.com', '9735280869', '456987231', 'Ganga Jawara Main Road, Goria Lock Gate, Kol-152', '2017-04-29', 'superadmin', '9635624'),
(609, 'Maa Tara Stores', 'mts@mail.com', '9830194537', '45675613', 'Nabogram, No.2, Middle Block, Kol-152', '2017-04-29', 'superadmin', '125643'),
(610, 'Halder Stores ', 'hs@mail.com', '8013528471', '6315598', 'Ganga Jawara Main Road, Natun Diyara, Kol- 150', '2017-04-29', 'superadmin', '456131'),
(611, 'Maa Laxmi Bhandar', 'mlb@mail.com', '9674216752', '89654213', 'Uchepota, Kol-150', '2017-04-29', 'superadmin', '632015'),
(612, 'Laxmi Bhandar ', 'lb@mail.com', '9239134534', '632541', 'Chowbaga Main Road, Kol- 105', '2017-04-29', 'superadmin', '965984'),
(613, 'Mondal Stores ', 'ms@mail.com', '9088741646', '45613981', 'Chowbaga Main Road, Kol- 150', '2017-04-29', 'superadmin', '9846331'),
(614, 'Minoti Stores ', 'ms@mail.com', '72788866556', '789654123', 'Chowbaga Main Road, Kol-150', '2017-04-29', 'superadmin', '631541'),
(615, 'Maa Laxmi Bhandar', 'mlb@mail.com', '8481880820', '13645685', 'Chowbaga, Kalarite, Kol-150', '2017-04-29', 'superadmin', '975131'),
(616, 'Joy Guru Bhandar ', 'jgb@mail.com', '9748648714', '15643732', 'Chowbaga Main Road, Kalikapur Road, Kol-105', '2017-04-29', 'superadmin', '9678143'),
(617, 'Sahuddin', 'sh@mail.com', '9163742986', '456993210', 'Chowbaga Main Road, Kol-105', '2017-04-29', 'superadmin', '963142'),
(618, 'Biswanath Bhandar', 'bb@mail.com', '9007595123', '563619678', 'Chowbaga School Road, Kol-105', '2017-04-29', 'superadmin', '891413'),
(619, 'Ganesh Bhandar', 'gb@mail.com', '9748108916', '41267833', 'Paschim Chowbaga, Kol-105', '2017-04-29', 'superadmin', '884253'),
(620, 'Sree Maa Kali Bhandar', 'smkb@mail.com', '7278098573', '25613453', '259, Pachim Chowbaga, Kol-105', '2017-04-29', 'superadmin', '3414613'),
(621, 'Laxmi Stores', 'ls@mail.com', '9831544245', '2563451', '6, Deb Banerjee Road, Amoraboti, Kol-39', '2017-04-29', 'superadmin', '564313'),
(622, 'Mamota Stores ', 'ms@mail.com', '9874024810', '63125451', '28,Vivekanandopur, Amoraboti, Kol-39', '2017-04-29', 'superadmin', '631224'),
(623, 'Sree Sainath Bhandar', 'ssb@mail.com', '9038014076', '125564311', '80,Naskarhat, Madhya para, Kol-39', '2017-04-29', 'superadmin', '5643736'),
(624, 'Anil Bhandar ', 'ab@mail.com', '9153184114', '63154732', '80, Naskarhat, Madhyapara, Kol-39', '2017-04-29', 'superadmin', '89463'),
(625, 'Amit stores ', 'as@mail.com', '9163597915', '63221533', 'F/3/D, Trangular Park, Kol-39', '2017-04-29', 'superadmin', '6945224'),
(626, 'Pradip Bhandar ', 'pb@mail.com', '9748973992', '457891231', 'Naskarhat, Madhyapara, Kol-39', '2017-04-29', 'superadmin', '456210'),
(627, 'Kartick Stores ', 'ks@mail.com', '7605852296', '45896123', 'Naskarhat, Rabindrapally, Kol-39', '2017-04-29', 'superadmin', '962242'),
(628, 'Madhu Stores ', 'ms@mail.com', '8013315620', '695213247', 'Naskarhat, Robindrapally, Kol-39', '2017-04-29', 'superadmin', '563149'),
(629, 'Biki Stores', 'bs@mail.com', '8442866306', '789621356', 'Naskarhat, Madhyapara, Kol-39', '2017-04-29', 'superadmin', '6312540'),
(630, 'Shruti Stores ', 'ss@mail.com', '9748745980', '145632048', 'Naskarhat, Dhakshin para, Kol-39', '2017-04-29', 'superadmin', '632544'),
(631, 'Loknath Bhandar', 'lb@mail.com', '9007591689', '563121498', 'Naskarhat, Dhakshin Para, Kol-39', '2017-04-29', 'superadmin', '632435'),
(632, 'Subodh Stores', 'sub@mail.com', '9883551838', '15639894', 'Naskarhat, Dhakshin Para, Kol-39', '2017-04-29', 'superadmin', '63155411'),
(633, 'Joy Maa ', 'jm@mail.com', '7059511839', '15634982', 'Rajdanga Sharat Park, Shanti Pally, Kol-107', '2017-04-29', 'superadmin', '5616674'),
(634, 'Ration Shop', 'rs@mail.com', '9432209143', '4526313', '728,Naskarhat, Madhyapara, Kol-39', '2017-04-29', 'superadmin', '156347'),
(635, 'Tanman Stores ', 'ts@mail.com', '9874156051', '156354631', 'B.P. Township,Patuli, Block-R-3, Kol-94', '2017-04-29', 'superadmin', '46315'),
(636, 'Laxmi Stores', 'ls@mail.com', '9748447377', '15456831', 'B.P. Township, Patuli, Block- R, Kol- 94', '2017-04-29', 'superadmin', '495131'),
(637, 'Tarok Stores ', 'ts@mail.com', '9804284262', '151413', 'B.P. Township, Patuli, Block- C,P&T Quater, Kol-94', '2017-04-29', 'superadmin', '84313'),
(638, 'Bornali', 'bor@mail.com', '8274025673', '4513613', 'B.P.Township, Patuli, Block- S, Kol-94', '2017-04-29', 'superadmin', '9433314'),
(639, 'Nemai Bhattacherjee', 'nb@mail.com', '9038607543', '14363253', 'B.P.Township, Patuli, Kol-94', '2017-04-29', 'superadmin', '15634'),
(640, 'Joy Shankar Prasad', 'jsp@mail.com', '33655696', '4252646', 'T-46, Patuli, Kol-94', '2017-04-29', 'superadmin', '891431'),
(641, 'Ganapati ', 'ga@mail.com', '9831890757', '1546335', 'Patuli, S-372, Kol-94', '2017-04-29', 'superadmin', '63154'),
(642, 'Swapan Stores ', 'ss@mail.com', '8981223113', '45362242', 'M-211, Patuli, Kol-94', '2017-04-29', 'superadmin', '4625613'),
(643, 'P.C. Kundu', 'pck@mail.com', '7039322423', '1565636', 'M-171, Patuli, Kol-94', '2017-04-29', 'superadmin', '76532'),
(644, 'Durga Bhandar', 'db@mail.com', '9433616855', '45361336', '356, Patuli, Kol-94', '2017-04-29', 'superadmin', '456361'),
(645, 'Joy Stores', 'js@mail.com', '9748726140', '4561235', 'Patuli, Block- S, C.M.D.A Market, Kol-94', '2017-04-29', 'superadmin', '455632'),
(646, 'Needs ', 'ne@mail.com', '9051218555', '43613212', 'Patuli, H/9, B.P.Township, Kol-94', '2017-04-29', 'superadmin', '46533'),
(647, 'Joy Ram Bhandar', 'jrb@mail.com', '9831552010', '15463356', 'Patuli, Kol-94', '2017-04-29', 'superadmin', '752236'),
(648, 'Prathick Stores ', 'ps@mail.com', '9831949710', '45669621', 'H-81, Patuli, Kol-94', '2017-04-29', 'superadmin', '789423'),
(649, 'Loknath Bhandar', 'lb@mail.com', '9051888449', '45631921', 'J-218,B.P.Township,Near K.M.D.A Market, Kol-94', '2017-04-29', 'superadmin', '9143462'),
(650, 'Bhadra', 'bha@mail.com', '9231852243', '56225746', 'Patuli, Block-K, K.M.D.A. Market, Shop- 11, Kol-94', '2017-04-29', 'superadmin', '89433'),
(651, 'Maa Durga Bhandar ', 'mdb@mail.com', '8697617962', '456631811', 'Patuli, K.M.D.A Market, Kol-94', '2017-04-29', 'superadmin', '485635'),
(652, 'Manik Stores ', 'ms@mail.com', '8981119685', '456132336', 'K.M.D.A Market, D-101, Patuli, Kol-94', '2017-04-29', 'superadmin', '45531'),
(653, 'Ganesh Bhandar ', 'gb@mail.com', '9051603128', '45136696', 'Patuli, K.M.D.A Market, D-73, Kol-94', '2017-04-29', 'superadmin', '125453'),
(654, 'Shree Guru Variety ', 'sgv@mail.com', '8691970983', '455363546', 'Patuli,B-392,Kol-94', '2017-04-29', 'superadmin', '452532'),
(655, 'Sree Laxmi Stores', 'sls@mail.com', '9831531200', '45663215', 'B.P.Township, Kol-94', '2017-04-29', 'superadmin', '45366'),
(656, 'Karma Stores', 'ks@mail.com', '8981290912', '45223361', 'Patuli, K-35C, Kol-94', '2017-04-29', 'superadmin', '456233'),
(657, 'Noor Stores ', 'ns@mail.com', '9432139642', '456612613', 'B.P.Township, 663,Kol-94', '2017-04-29', 'superadmin', '4582531'),
(658, 'Panalal Shaw', 'ps@mai.com', '9836020019', '45632163', '64/2,B.P. Patuli, Kol-94', '2017-04-29', 'superadmin', '45610'),
(659, 'Maa Laxmi Bhandar', 'mlb@mail.com', '8622084153', '45323696', 'D/59, Rabindropally, Near Joy Baba Loknath, Kol-86', '2017-04-29', 'superadmin', '455631'),
(660, 'Kiran Stores ', 'ks@mail.com', '9088043439', '15638561', 'S/AFB, Patuli Main Road, Kol-84', '2017-04-29', 'superadmin', '466302'),
(661, 'Rajib Stores', 'rs@mail.com', '9051084579', '45633356', '68, Kendua Main Road, Kol-84', '2017-04-29', 'superadmin', '914331'),
(662, 'Maa Laxmi Bhandar', 'mlb@mail.com', '3316554', '46623366', 'Purba Bridge, Kol-', '2017-04-29', 'superadmin', '4562635'),
(663, 'Jamai Stores ', 'js@mail.com', '8250063537', '45535461', 'Birge west Kadamtala,Goria,Sree Ram Pur Main Road,Kol-84,', '2017-04-29', 'superadmin', '425564'),
(664, 'Khukumani', 'khuku@mail.com', '8013547068', '4566985', 'Goria,Brige,Pachim Para, Kol-84', '2017-04-29', 'superadmin', '4563695'),
(665, 'Maa Laxmi Bhandar', 'mln@mail.com', '9836096103', '4563136', '104/B,Sree Rampur Main Road, Goria, Kol-84 ', '2017-04-29', 'superadmin', '455362'),
(666, 'Shebolee ', 'sh@mail.com', '9831873739', '4563133', '108/1,Sree Ram Pur Main Road, Kol-84', '2017-04-29', 'superadmin', '145656'),
(667, 'Loknath Bhandar', 'lb@mail.com', '9143487430', '4566331', '129, Sree Ram Pur Main Road, Kol-84', '2017-04-29', 'superadmin', '4563028'),
(668, 'Matri Bhandar', 'mb@mail.com', '9874667964', '4556631', '108/5,Sree Ram Pur (North), Kol-84', '2017-04-29', 'superadmin', '455331'),
(669, 'Basanti Variety Stores', 'bvs@mail.com', '9804441924', '126354251', 'No. 5, Netaji Nagar Green Park, Kol-99', '2017-04-29', 'superadmin', '6426136'),
(670, 'Saidul Stores ', 'ss@mail.com', '9038577035', '42136324', '122, Goria, Sree Ram Pur Road, Kol-84', '2017-04-29', 'superadmin', '4686221'),
(671, 'Yeasin Stores ', 'ys@mail.com', '9038313109', '45669636', 'Brahmapur, Hari Sava, Kol-84', '2017-04-29', 'superadmin', '455636'),
(672, 'Shoaib Stores', 'ss@mail.com', '9836486351', '45236141', 'P-41,Usha Park,Bramhapur, Kol-84', '2017-04-29', 'superadmin', '456123'),
(673, 'Shakir Stores ', 'ss@mail.com', '8017067412', '455331236', 'Bramhapur, Bottala, Kol-96', '2017-04-29', 'superadmin', '4546313'),
(674, 'Laxmi Narayan Stores', 'lns@mail.com', '9051576416', '45632121', 'Bramhapur, Bottala, Kol-96', '2017-04-29', 'superadmin', '466234'),
(675, 'Amit Stores ', 'as@mail.com', '8697660796', '456563', 'Bramhapur, Bottala, Kol-96', '2017-04-29', 'superadmin', '45862'),
(676, 'M.Mondal', 'mm@mail.com', '9830041409', '9642164', 'Bramha, Bottala, Kol-96', '2017-04-29', 'superadmin', '4576631'),
(677, 'Roy Brothers', 'rb@mail.com', '33166413', '8946611', '195/C, Bramhapur Bottala,Kol-96', '2017-04-29', 'superadmin', '453696'),
(678, 'Sonu Stores ', 'ss@mail.com', '9007431220', '4569213611', '195/c, Bramhapur, Bottala, Kol- 96', '2017-04-29', 'superadmin', '4563636'),
(679, 'D.Pandit', 'dp@mail.com', '33156436', '4822263', 'Brahmapur, Bottala, Kol-96', '2017-04-29', 'superadmin', '789213'),
(680, 'Zahir Stores', 'zs@mail.com', '9674125270', '455631257', 'Brahmapur, Badamtala, Kol-96', '2017-04-29', 'superadmin', '4560231'),
(681, 'Bhagat Bhandar', 'bb@mail.com', '8017440535', '45631296', 'Niva, Phase - II, Badamtala,Brahmapur, Kol-96', '2017-04-29', 'superadmin', '4566641'),
(682, 'Manna Stores ', 'ms@mail.com', '9804101538', '455631582', 'Brahmapur, Balok Sangho,Kol-96', '2017-04-29', 'superadmin', '4556342'),
(683, 'Mahamaya Bhandar', 'mb@mail.com', '8420923493', '631255454', 'Boral, Uttorpara, Kol-154', '2017-04-29', 'superadmin', '8922361'),
(684, 'Sonali Stores ', 'ss@mail.com', '9143240830', '4520368', 'Boral, Natunhat, Kol-154', '2017-04-29', 'superadmin', '1546963'),
(685, 'Gaji Stores', 'gs@mail.com', '7890317702', '469812331', 'Boral,Natunhat, Kol-152', '2017-04-29', 'superadmin', '1246633'),
(686, 'Mondal Stores', 'ms@mail.com', '9831414885', '456982113', 'Boral, Natunhat, Kol-154', '2017-04-29', 'superadmin', '4588931'),
(687, 'Ruzur Rohim', 'rr@mail.com', '9748275860', '45656132', 'Boral, Natunhat,Kol-154', '2017-04-29', 'superadmin', '455632'),
(688, 'Maheboob Stores', 'ms@mail.com', '9038135733', '45635831', 'Boral, Natunhat, Kol-154', '2017-04-29', 'superadmin', '456638'),
(689, 'Maya Stores ', 'ms@mail.com', '8981196411', '7899621', 'Boral,Majher Para, Kol-154', '2017-04-29', 'superadmin', '456921'),
(690, 'Narayani Stores', 'ns@mail.com', '8902427277', '46522654', 'Boral,Majher para, Kol-154', '2017-04-29', 'superadmin', '4502583'),
(691, 'Uttam Stores', 'us@mail.com', '8013736684', '456197823', 'Boral, Malipara, Kol-154', '2017-04-29', 'superadmin', '4563314'),
(692, 'Jugal Stores ', 'js@mail.com', '9007765884', '45636324', 'Boral, Malipara,Kol-154', '2017-04-29', 'superadmin', '452366'),
(693, 'Pradip Veriety Stores', 'pvs@mail.com', '33616543', '462624736', 'Boral,Malipara, Kol- 154', '2017-04-29', 'superadmin', '78925321'),
(694, 'Tarok Stores ', 'ts@mail.com', '9748882913', '45694311', 'Boral, Malipara, Kol-154', '2017-04-29', 'superadmin', '47623231'),
(695, 'Laskar Stores', 'ls@mail.com', '9674313411', '78963113', 'Boral, Malipara, Kol-154', '2017-04-29', 'superadmin', '4569113'),
(696, 'Chandan Bhandar', 'cb@mail.com', '9831497976', '45632691', 'Sardar, Rania Road, Kol-154', '2017-04-29', 'superadmin', '4523651'),
(697, 'Dutta Stores ', 'ds@mail.com', '9831208745', '789654142', 'Sukanto Kanan, Rania, Kol-154', '2017-04-29', 'superadmin', '4863311'),
(698, 'Sneha Stores', 'ss@mail.com', '8100851544', '456698121', 'Sukanto Kanan,Rania, Kol-154', '2017-04-29', 'superadmin', '4602914'),
(699, 'Chowrasia Stores', 'cs@mail.com', '8017171285', '45623431', 'Vidya Sagar Sarani, Part- II, Kol154', '2017-04-29', 'superadmin', '789912'),
(700, 'Hemlal Shaw ', 'hs@mail.com', '23136644', '4862222', 'VidyaSagar Collony, Kol-154', '2017-04-29', 'superadmin', '786213'),
(701, 'Loknath Bhandar', 'lb@mail.com', '9051724961', '1456963', 'Vidyasagar sarani, Kol-154', '2017-04-29', 'superadmin', '1991332'),
(702, 'Raja Stores', 'rs@mail.com', '9903445318', '78965214', 'VidyaSagar sarani, Kol-154', '2017-04-29', 'superadmin', '4569814'),
(703, 'Swapan Stores ', 'ss@mail.com', '8017574659', '78963254', 'Vidyasagar Sarani, Kol-154', '2017-04-29', 'superadmin', '7895611'),
(704, 'Gupta Stores ', 'gs@mail.com', '9007989668', '79894321', 'Vidyasagar sarani, Kol-154', '2017-04-29', 'superadmin', '694311'),
(705, 'Tareswar Stores ', 'ts@mail.com', '23615464', '78941133', 'Brahmapur, Seikhpara, Kol-96', '2017-04-29', 'superadmin', '8941134'),
(706, 'P.K.Stores ', 'pk@mail.com', '9831364329', '45166136', 'Brahmapur, Badamtala, Kol-96', '2017-04-29', 'superadmin', '4518423'),
(707, 'Roni Stores ', 'rs@mail.com', '8013085793', '78951331', 'Brahmapur, Botala, Kol-96', '2017-04-29', 'superadmin', '96124112'),
(708, 'Balai Stores', 'bs@mail.com', '2365945', '78996543', 'Bramhapur, Malikpara, Near Ruchi Gura Masala, Kol-96', '2017-04-29', 'superadmin', '11546369'),
(709, 'Sunil Shaw', 'ss@mail.com', '9007484135', '89621313', 'Boral, Sardar para, Kol-154', '2017-04-29', 'superadmin', '1456231'),
(710, 'S.Stores', 'ss@mail.com', '1233664', '78914316', 'Rania, Kol-154', '2017-04-29', 'superadmin', '894312'),
(711, 'Manjusree Stores ', 'ms@mail.com', '6542211', '7899614133', 'Vidyasagar Sarani, Kol-154', '2017-04-29', 'superadmin', '4566961'),
(712, 'Sandha Bhandar ', 'sb@mail.com', '8013464745', '78941323', 'Satabdi park, Block- B, Daspara, Kol-99', '2017-04-29', 'superadmin', '7891310'),
(713, 'Kartick Stores ', 'ks@mail.com', '8334087548', '78951310', 'Daspara Main Road, Atghara, Kol-152', '2017-04-29', 'superadmin', '4586321'),
(714, 'Prodhan Consumar', 'pc@mail.com', '9051328838', '789611310', 'Daspara, Atghara,Kol-152', '2017-04-29', 'superadmin', '7996312'),
(715, 'Anandom ', 'ana@mail.com', '9831830718', '798965432', 'Daspara Main Road, Kol-152', '2017-04-29', 'superadmin', '799431'),
(716, 'Loknath Bhandar', 'lb@mail.com', '9830685813', '78961231', 'Daspara, Busstand, Atghara, Kol-152', '2017-04-29', 'superadmin', '1496211'),
(717, 'Mamoni Stores ', 'ms@mail.com', '7278866864', '789542123', 'Daspara, Atghara, Kol-152', '2017-04-29', 'superadmin', '79814321'),
(718, 'Anju Stores', 'as@mail.com', '9903884086', '14252364', 'Daspara, Atghara, Kol-152', '2017-04-29', 'superadmin', '455823'),
(719, 'Nigam Bhandar', 'nb@mail.com', '9051678333', '89143231', '2230,Nayabad,Mukundopur, Kol-99', '2017-04-29', 'superadmin', '7811232'),
(720, 'Kohili Stores', 'ks@mail.com', '9874043514', '78943113', 'Nayabda,Mukundopur Mini Bus stand, Kol-99', '2017-04-29', 'superadmin', '9851331'),
(721, 'Roy Matri Bhandar', 'rmb@mail.com', '9051575853', '45684213', 'Atghara, Ranapara, Kol-152', '2017-04-29', 'superadmin', '9725132');
INSERT INTO `td_client` (`cl_id`, `clname`, `clemail`, `clphn`, `clpan`, `cladd`, `addate`, `adby`, `cgst`) VALUES
(722, 'Joy Bhandar', 'jb@mail.com', '9804482610', '7894133', 'No.145,B.Collony, Nayabad,Kol-94', '2017-04-29', 'superadmin', '961314'),
(723, 'Shibu Stores', 'ss@mail.com', '9874224536', '79965421', 'Sreenagar Purbo para, Kol-94', '2017-04-29', 'superadmin', '1255642'),
(724, 'P.N.Stores ', 'pns@mail.com', '8820449060', '8946213', 'Sreenagar,Main Road, Kol-94', '2017-04-29', 'superadmin', '9631211'),
(725, 'Ggobindo Stores ', 'gs@mail.com', '8013301757', '789565113', 'Sree nagar, Main road, Kol-94', '2017-04-29', 'superadmin', '9721312'),
(726, 'Annopurna Bhandar', 'ab@mail.com', '9163786383', '78951431', 'Sreenagar Telephone Exchange, Madhya Dhalua, Kol-152', '2017-04-29', 'superadmin', '9646113'),
(727, 'Gayen Stores ', 'gs@mail.com', '9748336112', '4613213', 'New Goria, Super Market,SBI,Kol-94', '2017-04-29', 'superadmin', '9863231'),
(728, 'Maa Sarada Stores ', 'mss@mail.com', '9836993715', '986413123', 'Sreenagar Main Road, Kol -94', '2017-04-29', 'superadmin', '9841323'),
(729, 'Monjala Stores ', 'ms@mail.com', '9674491863', '631544914', 'Sreenagar Market, Kol-94', '2017-04-29', 'superadmin', '9811363'),
(730, 'New P.N.Stores', 'pn@mail.com', '8017218843', '963115433', 'Nayabad, Border Road, Dhalua, Kol-152', '2017-04-29', 'superadmin', '991131'),
(731, 'Giri Bhandar', 'gb@mail.com', '33264315', '89143114', 'Chit, Nayabad, Kol-94', '2017-05-01', 'superadmin', '9864612'),
(732, 'Gupta Stores', 'gs@mail.com', '9831262059', '78145661', 'Dhalua, Police Para, Kol-152', '2017-05-01', 'superadmin', '145643202'),
(733, 'Tapos Saha', 'ts@mail.com', '9593597705', '78954312', 'Police para, Dhalua, Kol-152', '2017-05-01', 'superadmin', '96311564'),
(734, 'Sree Guru Bhandar', 'sgb@mail.com', '9051377923', '456243114', 'Police para, NGG, Colony, Kol-152', '2017-05-01', 'superadmin', '7891431'),
(735, 'Blue Birds Variety', 'bbv@mail.com', '9836848323', '561458536', 'Panchpota, Friends Club, Goria, Kol-152', '2017-05-01', 'superadmin', '9521314'),
(736, 'Majumder Stores ', 'ms@mail.com', '9088402100', '89456131', 'Panchpota, Friends Club, Goria, Kol-152', '2017-05-01', 'superadmin', '693135'),
(737, 'Ratan Chowdhury', 'rc@mail.com', '7980282522', '45689143', 'Bhalua, Nabopally, Gora, Kol-152', '2017-05-01', 'superadmin', '89411231'),
(738, 'Matri Bhandar (Shyamal Da)', 'mbs@mail.com', '9748960418', '54616814', 'Dhalua, Nabopally, Goria, Kol-152', '2017-05-01', 'superadmin', '45669782'),
(739, 'Maa Padma Bhandar', 'mpb@mial.com', '9883077586', '789611311', 'Purba Tatul Beria, Madhya Para, Goria, Kol-152', '2017-05-01', 'superadmin', '8943221'),
(740, 'Variety Stores', 'vs@mail.com', '9748686371', '8964513231', 'Deshbandhu Nagar, Uttar Panchpota, Kol-152', '2017-05-01', 'superadmin', '5613812'),
(741, 'Radheshyam  Stores ', 'rss@mial.com', '9331723943', '469743113', 'Dehsbandhu Nagar , Uttar Panchpota,Kol-152', '2017-05-01', 'superadmin', '7858961'),
(742, 'Dey Bhandar', 'db@mail.com', '8583913485', '7166313', '                                Police para, Near Netaji Subhas Chandra Bose, Engineering. Collage, Kol-152                                ', '2017-05-01', 'superadmin', '7813313'),
(743, 'Gita Stores ', 'ts@mail.com', '9477043043', '789146112', 'Nayabat, Rail Math,1 B, Bus Stand, Kol-94', '2017-05-01', 'superadmin', '4569113'),
(744, 'Prodeep Variety Stores ', 'pvs@mail.com', '8017256978', '789654121', 'Police Para,Near N.S.C.B Engineering  Collage, Kol-152', '2017-05-01', 'superadmin', '63254120'),
(745, 'Adi Loknath Bhandar', 'alb@mail.com', '9007028558', '458914331', '20,Bhagat Sing, Majer Collony, Kol-94', '2017-05-01', 'superadmin', '7822561'),
(746, 'Loknath Bhandar ', 'lb@mail.com', '7278612571', '789456133', '60/1,Bhagat Singh, Nayabat, Kol-94\r\n', '2017-05-01', 'superadmin', '1564362'),
(747, 'Loknath Bhandar', 'lb@mail.com', '9903835630', '789541223', 'Nayabad Bhandar Road, Dhalua, Kol-152', '2017-05-01', 'superadmin', '7825226'),
(748, 'Prabin Stores ', 'ps@mail.com', '8961023158', '78941636', 'Natun Diyara, Buspool,  Kol-152', '2017-05-01', 'superadmin', '45412366'),
(749, 'Krishna Bhandar', 'kb@mail.com', '8697642199', '7895436361', 'Manjil Appertment, Tatul beria, Goria, Kol-84', '2017-05-01', 'superadmin', '45261458'),
(750, 'New Communication Centre', 'ncc@mail.com', '7044659319', '7984563', 'Tatulbaria, Eye Hospital, Goria,Kol-84', '2017-05-01', 'superadmin', '451623'),
(751, 'Ashirbad Stores ', 'as@mail.com', '9748152296', '45613684', 'Goria, Kol- 84', '2017-05-01', 'superadmin', '45891431'),
(752, 'Mohender Stores ', 'ms@mail.com', '7998073404', '478846213', 'Naskarpara, Tatul baria, Goria, Kol-84', '2017-05-01', 'superadmin', '45613843'),
(753, 'Mondal Stores ', 'ms@mail.com', '9830040827', '45697815', 'East Balia, Napur Chandra Naskar Road, Kol-84', '2017-05-01', 'superadmin', '697874521'),
(754, 'Joy Maa Kali Bhandar', 'jmk@mail.com', '9007901248', '451613', 'West Balia, Goria Station Road, Kol-84', '2017-05-01', 'superadmin', '9613412'),
(755, 'Biki Stores ', 'bs@mail.com', '7278244657', '5552921', 'Balia Main Road, Goria, Kol-84', '2017-05-01', 'superadmin', '9846212'),
(756, 'Pappu Stores ', 'ps@mail.com', '8697615213', '456961', 'Balia Main Road,Goria,Kol-84', '2017-05-01', 'superadmin', '631512'),
(757, 'Subasunam Stores ', 'sbs@mail.com', '9831460789', '7865123', 'Balia Main Road, Goria, Kol-84', '2017-05-01', 'superadmin', '9751331'),
(758, 'Raima Stores', 'rs@mail.com', '8420991515', '84466143', 'Balia Main Road, Goria,Kol-84', '2017-05-01', 'superadmin', '631244'),
(759, 'Safui Stores', 'ss@mail.com', '9609363296', '8965412', 'Balia Main Road, Goria, Kol-84', '2017-05-01', 'superadmin', '554671'),
(760, 'Biki Stores 2', 'bs@mail.com', '8961887815', '854613123', 'Goria,Kol-84\r\n\r\n', '2017-05-01', 'superadmin', '8546143'),
(761, 'Upender Bhandar ', 'ub@mail.com', '9083160089', '85461231', 'Fortabad, Sahapara, Goria, Kol-84', '2017-05-01', 'superadmin', '546135'),
(762, 'Laxmi Narayan Bhandar', 'lnb@mail.com', '9830835857', '8953211', 'Fortabad, Sahapara, Goria, Kol-84', '2017-05-01', 'superadmin', '9643611'),
(763, 'Mondal Stores', 'ms@mail.com', '8902377477', '48912313', 'Fortaba, Saha para, Goria, Kol-84', '2017-05-01', 'superadmin', '4861311'),
(764, 'Sayan Stores ', 'ss@mail.com', '9007143016', '456136911', 'Fortabad,Aamtala, Goria, Kol-84', '2017-05-01', 'superadmin', '9741621'),
(765, 'Ganguly Bhandar', 'gb@mail.com', '9831940660', '456332814', 'Fortabad, Aamtala, Goria, Kol-84', '2017-05-01', 'superadmin', '8941311'),
(766, 'Badal Stores ', 'bs@mail.com', '9804647259', '4562396', 'Fortabad, Aamtala, Goria, Kol-84', '2017-05-01', 'superadmin', '946361'),
(767, 'Maa Manosha Bhandar', 'mmb@mail.com', '9748953452', '554631234', 'Fortabad, Harisava More, Goria,Kol-84', '2017-05-01', 'superadmin', '8462523'),
(768, 'Uma Bhandr', 'ub@mail.com', '9836771004', '2156492', 'Mahamayapur, Mondal para, Goria, Kol-84', '2017-05-01', 'superadmin', '631514'),
(769, 'Kanchan Variety Stores ', 'kvs@mail.com', '9831043038', '45823103', 'Mahamaya pur, Mondalpara, Goria, Kol-84', '2017-05-01', 'superadmin', '6312561'),
(770, 'Maa Annopurna Bhandar', 'mab@mail.com', '9883341372', '45689143', '1113, Rabindranagar, Goria, Kol-153', '2017-05-01', 'superadmin', '8914361'),
(771, 'Maa Kali Bhanar', 'mkb@mail.com', '9831463596', '5614786', 'Mohamaya Tala, Goria, Kol-103', '2017-05-01', 'superadmin', '789436'),
(772, 'Saha Stores ', 'ss@mail.com', '9836594146', '45622312', 'Mohamaya tala, Goria, Kol-84', '2017-05-01', 'superadmin', '46131'),
(773, 'Sutapa Stores ', 'ss@mail.com', '9831719721', '78956121', 'Fortabad Charaktala, Goria, Kol-84', '2017-05-01', 'superadmin', '56129810'),
(774, 'Kalpana Stores ', 'ks@mail.com', '9051854708', '48561312', 'Balia, Middle Town Road, Goria, Kol-84', '2017-05-01', 'superadmin', '5498612'),
(775, 'Dilip Stores ', 'ds@mail.com', '8583958359', '47562231', 'Balia, Middle Town Road, Goria,Kol-84', '2017-05-01', 'superadmin', '6933151'),
(776, 'Subhankar Stores ', 'sus@mail.com', '8820554833', '45698321', 'Tatul Beria, Goria, Kol-84', '2017-05-01', 'superadmin', '4569213'),
(777, 'Santinikatan Stores', 'ss@mail.com', '9088119929', '8546136', 'Goria Station Road, Eye Hospital, Kol-84', '2017-05-01', 'superadmin', '5698421'),
(778, 'Loknath Bhandar', 'lb@mail.com', '9836217062', '45692131', 'Panchasayar Road, Goria, Kol-94', '2017-05-01', 'superadmin', '456324'),
(779, 'Proyojani Bhandar ', 'pb@mail.com', '9433027048', '7891311', 'New Goria, Co-opparative Mangolik Marriage Hall Jalpot, Kol-94', '2017-05-01', 'superadmin', '54568411'),
(780, 'Mohaprabhu Bhandar ', 'mhb@mail.com', '9831652448', '485610013', 'Buderhat, Kol-99', '2017-05-01', 'superadmin', '781462123'),
(781, 'Ganguli Stores ', 'gs@mail.com', '9163680315', '56421891', 'Chak Goria, Kol-99', '2017-05-01', 'superadmin', '69547121'),
(782, 'Roy Bhandar', 'rb@mail.com', '9674383661', '54466931', 'Nabodiganto, Kol-99', '2017-05-01', 'superadmin', '8754612'),
(783, 'Manoda Stores', 'ms@mail.com', '9874918241', '45631586', 'Mahamaya tala, Goria, Kol-84', '2017-05-01', 'superadmin', '78463251'),
(784, 'Sukdev Bhandar ', 'sb@mail.com', '9477179916', '456982131', 'East Balia, Napar Chandra Naskar Road, Kol-84', '2017-05-01', 'superadmin', '4861131'),
(785, 'Roy Variety ', 'rv@mail.com', '9836519823', '54549613', 'Survey Park Bazar, Kol-75', '2017-05-02', 'superadmin', '945661'),
(786, 'Govind Bhandar', 'gb@mail.com', '9903198619', '45616914', 'Survey Park Bazar, Kol-75', '2017-05-02', 'superadmin', '4536198'),
(787, 'Jyotish Stores ', 'js@mail.com', '9748253899', '4566234', 'Survey Park Bazar, Kol-75', '2017-05-02', 'superadmin', '456628'),
(788, 'Palash Stores ', 'ps@mail.com', '9836597908', '8946131', 'Survey Park Bazar, Kol-75', '2017-05-02', 'superadmin', '9413321'),
(789, 'Bilash Stores ', 'bs@mail.com', '8017961408', '54691312', 'Survey Park Bazar, Kol-75', '2017-05-02', 'superadmin', '4798525'),
(790, 'Arun Adhikary', 'aa@mail.com', '9681968617', '78941361', 'Survey Park Bazar,Kol-75', '2017-05-02', 'superadmin', '655421'),
(791, 'Apanjon Stores', 'as@mail.com', '9748032890', '45622691', 'Survey Park Bazar, Kol-75', '2017-05-02', 'superadmin', '483223'),
(792, 'Bapi Stores', 'bs@mail.com', '9830473171', '62115414', 'Survey Park Bazar, Kol-75', '2017-05-02', 'superadmin', '6511411'),
(793, 'Ranjan Stores ', 'rs@mail.com', '9831287447', '4561982', 'Survey Park Bazar, Kol-75', '2017-05-02', 'superadmin', '8462221'),
(794, 'Debu Stores ', 'Ds@mail.com', '9903220084', '879643621', 'Lake East 6th Road, Kol-75', '2017-05-02', 'superadmin', '8561133'),
(795, 'Maa Tara Stores', 'mts@mail.com', '9036519823', '94213545', 'P/10, 2nd St. Modern Park, Kol-75', '2017-05-02', 'superadmin', '4521361'),
(796, 'Lake View Stores ', 'lvs@mail.com', '9233353541', '45451264', ' 126,South Avenue, Kol-75', '2017-05-02', 'superadmin', '456135'),
(797, 'Das Variety Stores ', 'dvs@mail.com', '9836284774', '45162254', '6/161,Arobindo Block, Santoshpu, Kol-75', '2017-05-02', 'superadmin', '4521685'),
(798, 'Tara Maa Stores ', 'tms@mail.com', '9831355198', '4561352', 'C/80, Ram Krishna Upanibesh, Block-A, Kol-92', '2017-05-02', 'superadmin', '8145631'),
(799, 'Alapana Bhandar', 'ab@mail.com', '8017292530', '89436133', 'Ram Kriashna Upanibesh, Block- A, Kol-92', '2017-05-02', 'superadmin', '85613'),
(800, 'Sree Joy Guru Bhandar', 'sjgb@mail.com', '9874374295', '45632148', 'Ram Krishna Upnibesh, Kol-92', '2017-05-02', 'superadmin', '461391'),
(801, 'Cheaf Corner', 'cc@mail.com', '9874971517', '45631218', 'B/26, Ram Krishna Upnibesh, Kol-92', '2017-05-02', 'superadmin', '145625'),
(802, 'New S.Paul Stores', 'nsp@mail.com', '9903649215', '45613510', '16/14, Central Park, Kol-32', '2017-05-02', 'superadmin', '456131'),
(803, 'Kabita Stores ', 'ks@mail.com', '3661542', '4556612', 'Desh Bandhu Road, Kol-32', '2017-05-02', 'superadmin', '8545321'),
(804, 'Maa Laxmi Bhandar', 'mlb@mail.com', '9963377250', '54613546', '14, Desh Bandhu Road, Kol-32', '2017-05-02', 'superadmin', '8742313'),
(805, 'Laxmi Narayan Bhandar', 'lnb@mail.com', '8017131892', '456361', '5, Desh Bandhu Road, Kol-32', '2017-05-02', 'superadmin', '458613'),
(806, 'Swarna Mally Stores ', 'sms@mail.com', '900735603', '8461413', '5/A, Desh Bandhu Road, Kol-32', '2017-05-02', 'superadmin', '458981'),
(807, 'New Loknath Stores', 'nls@mail.com', '9831277254', '7825623', '6/11, Chittoranjon  Collony, Kol-32', '2017-05-02', 'superadmin', '456211'),
(808, 'S.Telicom', 'st@mail.com', '9874072547', '4523163', '4/62 Chittorangan Collony, Kol-32', '2017-05-02', 'superadmin', '151431'),
(809, 'Grouranga Bhandar', 'Gb@mail.com', '30332443', '455133101', '4/20 Chittoranjan Collony,Kol-32', '2017-05-02', 'superadmin', '654121010'),
(810, 'Hari Narayan Bhandar', 'hnb@mail.com', '9831563121', '8984312', ' 78, Panchanan Das Road, Kol-52', '2017-05-02', 'superadmin', '653211'),
(811, 'Sree Hari Bhandar', 'shb@mail.com', '9836557013', '45231656', '80, Panchanan Dey Road,Kol-32', '2017-05-02', 'superadmin', '124561'),
(812, 'Toton Stores ', 'ts@mail.com', '9831623652', '4561341', '55,Panchanan Dey Road, West Raja Pur, Kol-32', '2017-05-02', 'superadmin', '741462113'),
(813, 'Sradhyanjali Storres ', 'ss@mail.com', '9830183205', '45136414', '1/8,Chittoranjon Collony,Kol-32', '2017-05-02', 'superadmin', '154214'),
(814, 'A.B  Stores ', 'ab@mail.com', '8981741224', '4513113', '51, Chittoranjan Collony, Kol-32', '2017-05-02', 'superadmin', '125133'),
(815, 'Guria Stores ', 'gs@mail.com', '9831758574', '4562364', '26/1/1, Raja S.C.M Road, Kol-32', '2017-05-02', 'superadmin', '4536136'),
(816, 'Joy Maa Kali Bhandar', 'jmkb@mail.com', '9051208339', '452362', 'A6/L, Jadovkpur, CIT Market, Kol-32', '2017-05-02', 'superadmin', '456122'),
(817, 'Maa Durga Bhandar', 'mdb@mail.com', '9674334301', '4561232', 'A/10,Jadavpur, CIT Market, Kol-32', '2017-05-02', 'superadmin', '89421'),
(818, 'Megha Stores ', 'ms@mail.com', '9477063857', '4522359', 'A/11, Jadovpur, CIT Market, Kol-32', '2017-05-02', 'superadmin', '4562812'),
(819, 'Joy Guru Bhandar', 'jgb@mail.com', '9831257011', '456133', 'A/15 Jadovpur, CIT Market Kol-32', '2017-05-02', 'superadmin', '145232'),
(820, 'Partho Roy', 'pr@mail.com', '7044315539', '45136321', '185, Jadovpur CIT Market, Kol-', '2017-05-02', 'superadmin', '4566312'),
(821, 'Kali Ganga Stores ', 'kgs@mail.com', '9473440490', '4566213', 'A/3, Jadovpur CIT Market, Kol-32', '2017-05-02', 'superadmin', '456213'),
(822, 'Kali Krishna Bhandar', 'kkb@mail.com', '8981315453', '454251612', 'A/4,Jadovpur CIT Market, Kol-32', '2017-05-02', 'superadmin', '48251312'),
(823, 'Saha Brothers', 'sb@mail.com', '3324125745', '5421621', '55A/1,Ram Thakur Road, (Central Road),Kol-32', '2017-05-02', 'superadmin', '563115'),
(824, 'Loknath Stores ', 'Ls@mail.com', '9830629258', '45623961', '3B, East Road, Jadovpur, Kol-32', '2017-05-02', 'superadmin', '2513621'),
(825, 'B.L. Agarwal ', 'bla@mail.com', '9862925830', '45613114', 'Central Road, Jadovpur, Kol-32', '2017-05-02', 'superadmin', '456211'),
(826, 'Raju Stores', 'rs@mail.com', '9830754778', '4512364', 'C/15, Katjunagar, Kol-32', '2017-05-02', 'superadmin', '63251'),
(827, 'Shreya Stores', 'ss@mail.com', '9062882255', '4526121', 'Katju Nagar, Kol-32', '2017-05-02', 'superadmin', '45621'),
(828, 'M/S. Subham Stores ', 'mss@mail.com', '9748615476', '45625412', 'Katjunagar, Kol-32', '2017-05-02', 'superadmin', '565113'),
(829, 'M/s. Maa Bhagobati Stores ', 'mbs@mail.com', '9831628529', '4520613', '                                D/15, Katjunagar Kol-32                                ', '2017-05-02', 'superadmin', '45223'),
(830, 'M/s. Kamala Bhandar', 'kb@mail.com', '9748039772', '45123621', '1, Podder Nagar, Kol-68', '2017-05-02', 'superadmin', '454555'),
(831, 'Kitchen Variety Stores ', 'kvs@mail.com', '9674426612', '12546216', '5/5/14, Podder Nagar, Kol-68', '2017-05-02', 'superadmin', '45621'),
(832, 'Nityanando Bhandar', 'nb@mail.com', '7439048543', '4563211', '4/10, Podder Nagar, Kol-68', '2017-05-02', 'superadmin', '454613'),
(833, 'Sayon Stores', 'ss@mail.com', '8420463405', '455261023', '3/17,Podder Nagar, Kol-68', '2017-05-02', 'superadmin', '45685131'),
(834, 'Shree Guru Bhandar', 'sgb@mail.com', '9051324385', '45632158', '69, Bikram Garh, Kol-32', '2017-05-02', 'superadmin', '456251'),
(835, 'Variety Stores ', 'vs@mail.com', '3356461', '785146213', '58/A/3, P.G.H Road, Bikramgarh, Kol-32', '2017-05-02', 'superadmin', '8695131'),
(836, 'Ghosh Bhandar', 'gb@mail.com', '9836689392', '45632112', 'Bikram Garh,Kol-32', '2017-05-02', 'superadmin', '4563211'),
(837, 'Saraswati Stores ', 'ss@mail.com', '9903491253', '45856131', 'Bikramgarh, Kol-32', '2017-05-02', 'superadmin', '96431232'),
(838, 'New Annapurna Stores', 'nas@mail.com', '8981741224', '58946213', '23, Bikramgarh,Kol-32', '2017-05-02', 'superadmin', '964314'),
(839, 'Tara Maa Stores', 'tms@mail.com', '8013467567', '78944210', '18, Bikramgarh,Kol-32', '2017-05-02', 'superadmin', '4523614'),
(840, 'Sree Guru Stores ', 'sgs@mail.com', '9804884806', '964325112', '4A,New Bikram Garh, Kol-32', '2017-05-02', 'superadmin', '456010'),
(841, 'Santu Stores ', 'ss@mail.com', '8017437084', '5618122', '3714, P.G.H. Shah Road, Kol-32', '2017-05-02', 'superadmin', '4523025'),
(842, 'Mohaprobhu Stores', 'ms@mail.com', '9432606955', '4521051', '48, P.G.H Shah Road, Kol-32', '2017-05-02', 'superadmin', '456113'),
(843, 'Biswas Stores', 'bs@mail.com', '8697672523', '78512103', 'E/27 Podder Nagar 2, Kol-32', '2017-05-02', 'superadmin', '6325104'),
(844, 'Gupta Stores ', 'gs@mail.com', '9831566672', '458632135', 'P.G.H. Shah Road, Kol-32', '2017-05-02', 'superadmin', '4562158'),
(845, 'Khublal Stores ', 'ks@mail.com', '8282846804', '65812315', '156, P.G.H. Shah Road, Kol-32', '2017-05-02', 'superadmin', '65842213'),
(846, 'Anjana Paul', 'ap@mail.com', '9831741222', '51625430', '                                157/M, P.G.H Shah Road, Kol-32                                ', '2017-05-02', 'superadmin', '89561302'),
(847, 'B.Mondal', 'bm@mail.com', '8420403712', '4563131', 'Sree VivekanandoSarani,Kol-73', '2017-05-03', 'superadmin', '8984561'),
(848, 'Sikka Stores ', 'ss@mail.com', '9903317749', '451236221', '43/1, Middle Road, Kol-75', '2017-05-03', 'superadmin', '5891432'),
(849, 'Kartick Stores ', 'ks@mail.com', '9073589092', '4523621', '3/99,Vivek Nagar, Kol-75', '2017-05-03', 'superadmin', '4521986'),
(850, 'Khusi Stores', 'ks@mail.com', '9681576389', '4522516', 'Garfa Main Road, Kol-75', '2017-05-03', 'superadmin', '54216556'),
(851, 'New Laxmi Bhandar', 'nlb@mail.com', '9831765569', '456224131', 'Bapuji Nagar, Kol-92', '2017-05-03', 'superadmin', '456212'),
(852, 'Sree Guru Bhandar', 'sgb@mail.com', '9831006238', '45632151', 'Bapuji Nagar, Kol-92', '2017-05-03', 'superadmin', '45623210'),
(853, 'Maa Sitala Bhandr', 'msb@mail.com', '9831846959', '4610321', 'Bapuji Nagar, Kol-92', '2017-05-03', 'superadmin', '461221'),
(854, 'S.Das Gupta', 'sdg@mail.com', '9830994502', '45621131', 'A/97, Bagha Jatin , Kol-92', '2017-05-03', 'superadmin', '4563214'),
(855, 'Jhunu St ores ', 'js@mail.com', '9239459596', '45632101', 'F/49, Bapuji Nagar, Kol-92', '2017-05-03', 'superadmin', '451612'),
(856, 'Shree Ganesh Bhnadar', 'sgb@mail.com', '9748626428', '45611131', 'Bapuji Nagar, Kol-92', '2017-05-03', 'superadmin', '456126'),
(857, 'S.J. Enterprise', 'sje@mail.com', '8584054837', '456131321', 'G/5, Bapuji Nagar, Kol-92', '2017-05-03', 'superadmin', '8943621'),
(858, 'Mahaprobhu Bhandar', 'mb@mail.com', '9903678068', '486613133', 'Bapuji Nagar, Kol-92', '2017-05-03', 'superadmin', '486213'),
(859, 'Joy Guru Bhandar', 'jgb@mail.com', '9804613432', '45624581', '23/118,Amropali, Kol-32', '2017-05-03', 'superadmin', '4856212'),
(860, 'Maa Tara Trading', 'mtt@mail.com', '9830128044', '44156611', 'Anandopally ', '2017-05-03', 'superadmin', '8514112'),
(861, 'Lokjnath Bhadnar', 'lb@mail.com', '9830250628', '4562131', '74.A Bapauji Nagar, Kol-92', '2017-05-03', 'superadmin', '463615'),
(862, 'R.B. Stores ', 'rbs@mail.com', '9836421684', '45625412', '102, Nabnagar, Jadovpur, Kol-32', '2017-05-03', 'superadmin', '78951422'),
(863, 'Tapan Stores', 'ts@mail.com', '9163139492', '742512311', '59, Nabnagar Jadovpur, Kol-32', '2017-05-03', 'superadmin', '9421212'),
(864, 'Gandheswari Bhandar', 'gb@mail.com', '9874634011', '456985113', '55,Narkel Bagan Jadovpur, Kol-32', '2017-05-03', 'superadmin', '4789625'),
(865, 'Maa Laxmi Bhandar', 'mlb@mail.com', '8902039108', '561256143', '1/31/A, Bijoygarh, Jadovpur, Kol-32', '2017-05-03', 'superadmin', '451231'),
(866, 'Maa Tara Bhandar', 'mtb@mail.com', '8902039108', '45123131', '2/88,Bijoy Garh, Jadovpur, Kol-32', '2017-05-03', 'superadmin', '5612123'),
(867, 'M/s. Ganapati Variety', 'gv@mail.com', '9674149394', '89456121', '10/100, Bijoygarh, Kol-32', '2017-05-03', 'superadmin', '956431'),
(868, 'Paul Bhandar', 'pb@mail.com', '9831703468', '45621321', '10,Bijoygarh, Kol-32', '2017-05-03', 'superadmin', '632514'),
(869, 'Sudeep Stores ', 'ss@mail.com', '8335882378', '45598611', '2/70,Bijoygarh,Kol-32', '2017-05-03', 'superadmin', '452241'),
(870, 'M.K.Dhar', 'mkd@mail.com', '9062567155', '45422548', 'Bijoygarh, Kol-32', '2017-05-03', 'superadmin', '452101'),
(871, 'Uma Stores ', 'us@mail.com', '9007051031', '4565464', '2/9, Bijoy Garh, Kol-32', '2017-05-03', 'superadmin', '456322'),
(872, 'Baishalli Stores ', 'bs@mail.com', '9038178778', '1454521', '1/3,Bijoy Garh, Kol-32', '2017-05-03', 'superadmin', '255146'),
(873, 'Piku Stores ', 'ps@mail.com', '9874267710', '56143221', '1/20,Bijoy Garh, Kol-32', '2017-05-03', 'superadmin', '4556612'),
(874, 'Babul Stores ', 'bs@mail.com', '9831415970', '45136210', '1/20,Bijoy Garh, Kol-32', '2017-05-03', 'superadmin', '412522'),
(875, 'Modern Stores', 'ms@mail.com', '9748756486', '452551132', '8/96,Bijoy Garh, Koil-32', '2017-05-03', 'superadmin', '55213614'),
(876, 'Ghosh Bhandar', 'gb@mail.com', '7278765454', '452221232', 'Bijoy Garh, Kol-32', '2017-05-03', 'superadmin', '4522112'),
(877, 'Saha Stores', 'ss@mail.com', '9831054595', '45223', 'Bijoygarh Bazar, Kol-32', '2017-05-03', 'superadmin', '562121'),
(878, 'Krishna Stores', 'kb@mail.com', '9038197775', '451621', 'Bijoy Garh Bazar, Kol-32', '2017-05-03', 'superadmin', '456121'),
(879, 'Basudev Bhandar', 'bb@mail.com', '8013457496', '456213212', 'Bijoygarh Bazar, Kol-32', '2017-05-03', 'superadmin', '456212'),
(880, 'Sadhona Stores ', 'ss@mail.com', '9681354411', '45621891', '41, Bijoygarh Bazar, Kol-32', '2017-05-03', 'superadmin', '4562121'),
(881, 'Souvik Stores ', 'ss@mail.com', '9836191346', '89451541', '3/1/D, Bijoygarh, Kol-32', '2017-05-03', 'superadmin', '5618412'),
(882, 'Gupta Stores ', 'gs@mail.com', '9861216549', '45662122', '4/55/A, Bijoygarh, Kol-32', '2017-05-03', 'superadmin', '45621'),
(883, 'Ranas Provission', 'rp@mail.com', '9836074850', '4562142', '19, Pallysree, Kol-92', '2017-05-03', 'superadmin', '4562541'),
(884, 'Ram Thakur Enterprise', 'rte@mail.com', '9433900722', '45536221', '19/Pallysree, Kol-92', '2017-05-03', 'superadmin', '4563221'),
(885, 'Joy Ram Bhandar', 'jrb@mail.com', '9433313071', '4521236', '58/9A, Pallysree, Kol-92', '2017-05-03', 'superadmin', '486251'),
(886, 'Galaxy Stores ', 'gs@mail.com', '8334927976', '65114321', '82A,Pallysree, Kol-92', '2017-05-03', 'superadmin', '6946141'),
(887, 'Sree Devlok Bhandar', 'sdb@mail.ocm', '9883844142', '456582531', '2/2B, Adorshopally, Kol-92', '2017-05-03', 'superadmin', '456312'),
(888, 'Laxmi Narayan Bhandar', 'ln@mail.com', '9836784547', '7851361', '7/41, Netaji Nagar, kol-92', '2017-05-03', 'superadmin', '4786311'),
(889, 'Ganapati Variety Stores ', 'gvs@mail.com', '9804178561', '45621302', '29/1/2 Raja S.C.M.Road,Kol-32', '2017-05-03', 'superadmin', '12553231'),
(890, 'Maa Kali Bhandar', 'mk@mail.com', '9903312887', '4542521', 'N.C. Bose Road, (Ply Wood), Kol-', '2017-05-03', 'superadmin', '452511'),
(891, 'Palit Stores ', 'ps@mail.com', '9836693476', '4563124', 'Santi Park, More Avenue, Kol-', '2017-05-03', 'superadmin', '4562112'),
(892, 'Matri Bhandar', 'mb@mail.com', '8013351332', '4562113', 'Santi Nagar, More Avenue, Kol-', '2017-05-03', 'superadmin', '456321'),
(893, 'Dinesh  Saha', 'ds@mail.com', '9433026520', '45621201', 'More Avenue, Kol-', '2017-05-03', 'superadmin', '65144122'),
(894, 'Puja Stores', 'ps@mail.com', '9903670441', '4562132', 'More Avenue, Kol-', '2017-05-03', 'superadmin', '45621'),
(895, 'Podda Stores', 'ps@mail.com', '9433824466', '456121', 'More Avenue, Kol-', '2017-05-03', 'superadmin', '56321'),
(896, 'Renu Stores ', 'rs@mail.com', '9831976304', '4563214', 'More Avenue, Kol-', '2017-05-03', 'superadmin', '456214'),
(897, 'Suprovat', 'sup@mail.com', '7278042205', '45632140', 'Maloncho, Cinemahall, Kol-', '2017-05-03', 'superadmin', '4525814'),
(898, 'Sanjana Stores ', 'ss@mail.com', '8481079770', '456241', 'Regent Collony, Kol-', '2017-05-03', 'superadmin', '635411'),
(899, 'Laxmi Stores ', 'ls@mail.com', '8961738379', '48954611', 'Regent Collony, Kol-', '2017-05-03', 'superadmin', '48925141'),
(900, 'Chakroborty Stores ', 'cs@mail.com', '9038140357', '56147456', 'Chanditala Lane, Kol-', '2017-05-03', 'superadmin', '458921'),
(901, 'Krishna Stores ', 'ks@mail.com', '9831886030', '8652412', 'Chandi Ghosh Lane, Kol-', '2017-05-03', 'superadmin', '8602110'),
(902, 'Radha Gobindo Bhandar', 'rgb@mail.com', '9433229875', '8465214', 'Chandighosh Road, Kol-', '2017-05-03', 'superadmin', '7851321'),
(903, 'Santosh Stores ', 'ss@mail.com', '9804134446', '4566136', 'Nanubabur Bazar, Kol-', '2017-05-03', 'superadmin', '4563225'),
(904, 'Gopal Stores ', 'gs@mail.com', '7059505659', '48912121', 'Nanubabur Bazar, Kol-', '2017-05-03', 'superadmin', '4526122'),
(905, 'Biswas Stores ', 'bs@mail.com', '7685844306', '45621311', 'Jadov Garh, Kol-', '2017-05-03', 'superadmin', '148621'),
(906, 'Loknath Stores ', 'ls@mail.com', '9831905523', '4561312', 'Jadov Garh, Kol-', '2017-05-03', 'superadmin', '4563211'),
(907, 'Maa Yasoda Bhandar', 'my@mail.com', '9831633511', '65114213', 'Jadav Garh, Kol-', '2017-05-03', 'superadmin', '652143'),
(908, 'Prasanto Stores ', 'ps@mail.com', '9143289248', '8841251', 'Jadov Garh, Kol-', '2017-05-03', 'superadmin', '189141'),
(909, 'Devnath Stores', 'ds@mail.com', '8420154003', '6521441', 'Jadov Garh, Kol-', '2017-05-03', 'superadmin', '652431'),
(910, 'Arnab Variety Stores ', 'avs@mail.com', '9831471223', '84622123', 'Daspara, (Dhaka)', '2017-05-03', 'superadmin', '6542514'),
(911, 'B.Bhowmik', 'bb@mail.com', '9073062378', '4562423', 'Daspara, (Dhakuria)', '2017-05-03', 'superadmin', '9813211'),
(912, 'Antorik Stores', 'as@mail.com', '9038108178', '685122', 'Tan Pukur Road, Kol-', '2017-05-03', 'superadmin', '6354211'),
(913, 'Boishnabi Bhandar', 'bb@mail.com', '9051486946', '965413', 'Daspara, (Dhakuria), Kol-', '2017-05-03', 'superadmin', '635142'),
(914, 'Manna Stores ', 'ms@mail.com', '7278326984', '9654131', 'S.G.G. Road, Kol-', '2017-05-03', 'superadmin', '9544361'),
(915, 'Maa Manosha Bhandar', 'mmb@mail.com', '9038735507', '475562361', 'S.G.G. Road, Kol-', '2017-05-03', 'superadmin', '462524'),
(916, 'Shiv Narayan Shaw', 'sns@mail.com', '9836169167', '87546121', 'S.G.G. Road, Kol-', '2017-05-03', 'superadmin', '485132'),
(917, 'Sitala Bhandar', 'sb@mail.com', '9007430233', '4585312', 'S.G.G. Road, Kol-', '2017-05-03', 'superadmin', '56651214'),
(918, 'G.C. Das', 'gcd@mail.com', '8697089711', '89545132', 'S.G.G. Road, Kol-', '2017-05-03', 'superadmin', '6521411'),
(919, 'Nandy Stores ', 'ns@mail.com', '7003348120', '4851331', 'S.G.G. Road, Kol-', '2017-05-03', 'superadmin', '864361'),
(920, 'Koustab Stores', 'ks@mail.com', '9748360678', '8941311', 'Lake Gardens, Kol-', '2017-05-03', 'superadmin', '9653241'),
(921, 'Robi Shaw ', 'rs@mail.com', '9007952484', '854611210', 'K.M.D.A. Quater, Kol-', '2017-05-03', 'superadmin', '5851310'),
(922, 'Indrani Stores', 'is@mail.com', '8647889597', '452116474', 'Swiss Park,Kol-', '2017-05-03', 'superadmin', '984451'),
(923, 'Amit Bhattacharya', 'ab@mail.com', '33652541', '5462141', 'Swiss Park,Kol-', '2017-05-03', 'superadmin', '685121'),
(924, 'Tapan Da', 'td@mail.com', '8013152051', '586431110', 'Ghoshal Para, Kol-', '2017-05-03', 'superadmin', '89652141'),
(925, 'Laxmi Stores ', 'ls@mail.com', '9874123179', '6865141', 'Kakulia, Rail Gate, Kol-', '2017-05-03', 'superadmin', '874613'),
(926, 'Gopal Das, Agarwal', 'gda@mail.com', '9831569760', '84561132', 'Dhakuria Rail Gate, Kol-', '2017-05-03', 'superadmin', '845613'),
(927, 'Ram Avtar Agarwal', 'raa@mail.com', '9007834478', '58946121', 'S.G.G. Road, Kol-', '2017-05-03', 'superadmin', '5468141'),
(928, 'Shaw Stores ', 'ss@mail.com', '8697928194', '69584123', 'Jadov Garh, Kol-', '2017-05-03', 'superadmin', '5486123'),
(929, 'Purnima Education ', 'pe@mail.com', '2336421', '54654981', 'No.3, Pankaj Road, Kol-', '2017-05-03', 'superadmin', '8121232'),
(930, 'Sanjoy Stores', 'ss@mail.com', '9038906434', '5462412', 'Pankajin Road, Kol-', '2017-05-03', 'superadmin', '5861420'),
(931, 'Beauti Stores ', 'bs@mail.com', '9674138994', '58964123', 'Tallygange, C.I.T Market, Kol-', '2017-05-03', 'superadmin', '958421'),
(932, 'Sadhana Stores ', 'ss@mail.com', '9874225767', '5624131', 'Ghori Ghar, Kol-', '2017-05-03', 'superadmin', '5462142'),
(933, 'Geeta Stores ', 'gs@mail.com', '9007190093', '7791411', 'Ghori Ghar, Kol-', '2017-05-03', 'superadmin', '6631541'),
(934, 'Durga Stores ', 'ds@mail.com', '9831369586', '5584621', 'Southern Market, Kol-', '2017-05-03', 'superadmin', '6854425'),
(935, 'Matri Bhandar', 'mb@mail.com', '9330986922', '5562411', 'Southern Market, Kol-', '2017-05-03', 'superadmin', '895411'),
(936, 'Manoj Shaw', 'ms@mail.com', '9804809968', '55641281', 'Chandra Mondal Lane, Kol-', '2017-05-03', 'superadmin', '6581214'),
(937, 'Bishnudeb Prasad', 'bp@mail.com', '9831321787', '8751412', 'Tallygange, Kol-', '2017-05-03', 'superadmin', '9425112'),
(938, 'Tranun Kr. Shaw', 'tks@mail.com', '9230026360', '8461212', 'Tallygange, Kol-', '2017-05-03', 'superadmin', '8942111'),
(939, 'P.K. Nandy ', 'pkn@mail.com', '80174400215', '5496213', 'Charu Market, Kol-', '2017-05-03', 'superadmin', '985212'),
(940, 'Basanti Stores ', 'bs@mail.com', '8981455131', '4526123', 'Goria Station Road, Kol-84', '2017-05-05', 'superadmin', '458121'),
(941, 'Prity Stores ', 'ps@mail.com', '8013427330', '45813136', 'Goria Station Road, Kol-84', '2017-05-05', 'superadmin', '456212'),
(942, 'Puran Stores ', 'ps@mail.com', '8296853155', '148512', 'Goria Statoin Road, Kol-84', '2017-05-05', 'superadmin', '15231'),
(943, 'Soma Stores ', 'ss@mail.com', '9836533187', '1565462', 'Goria Station Road, Kol -84', '2017-05-05', 'superadmin', '1546113'),
(944, 'Chowdhury Stores', 'cs@mail.com', '9831090624', '4561332', '152, Goria Bazar, Kol-84', '2017-05-05', 'superadmin', '451312'),
(945, 'Samadder Stores ', 'ss@mail.com', '9674239745', '1555612', 'S.45,Kandari Mitali Sangher Math, Kol-84', '2017-05-05', 'superadmin', '5421321'),
(946, 'Aghora Stores', 'as@mail.com', '9062699451', '5862331', 'Khandari More , Kol-84', '2017-05-05', 'superadmin', '1212102'),
(947, 'Matri Bhandar ', 'mb@mail.com', '9432144679', '4525123', 'L/38 bose para, Kandahari, Kol-84', '2017-05-05', 'superadmin', '25554463'),
(948, 'Mousumi Stores ', 'ms@mail.com', '8420619334', '4525261', 'Goria, Brahmapur, Kajoler More, Kol- 84', '2017-05-05', 'superadmin', '456144'),
(949, 'Abhisek Stores ', 'as@mail.com', '9433886493', '45562321', 'Goria, Bramhapur More, Kol-96', '2017-05-05', 'superadmin', '122221'),
(950, 'Mondal Stores ', 'ms@mail.com', '8013161430', '4562123', 'Brahmapur More, Kol-96', '2017-05-05', 'superadmin', '45612'),
(951, 'Arati Stores ', 'as@mail.com', '8479069580', '458131', 'Brahmapur, Londri More, Kol -96', '2017-05-05', 'superadmin', '125241'),
(952, 'Maa Kali Bhandar ', 'mkb@mail.com', '9051021139', '4562541', 'Brahmapur Londri More, Kol-96', '2017-05-05', 'superadmin', '4562132'),
(953, 'Annapurna Bhandar', 'ab@mail.com', '9804138356', '4562123', 'Brahmapur, Londri More, Kol-96', '2017-05-05', 'superadmin', '1545461'),
(954, 'Minoti Stores ', 'ms@mail.com', '9007092371', '4521313', 'Brahmapur Rabindra Pally, Kol-96', '2017-05-05', 'superadmin', '483631'),
(955, 'Anik Stores ', 'as@mail.com', '8981670664', '425202412', 'V-25/16, Brahmapur, Vivekanando  Park, Kol-84', '2017-05-05', 'superadmin', '456522'),
(956, 'Shree Durga Stores', 'sds@mail.com', '9830814290', '45126212', 'Brahmapur, Vivekanando Park, Kol-84', '2017-05-05', 'superadmin', '456211'),
(957, 'Puja Stores ', 'ps@mail.com', '9681032800', '4513652', 'Gostotala, Vivekanando Sarani, Kol-84', '2017-05-05', 'superadmin', '48513'),
(958, 'Ganopati Stores ', 'gs@mail.com', '9903808239', '44589621', 'Goria Station Road, Kol-84', '2017-05-05', 'superadmin', '488612'),
(959, 'Matir Bhandar', 'mb@mail.com', '7685024324', '1323001', 'Goria Station Road, Khudiram Metro, Kol-84', '2017-05-05', 'superadmin', '3512110'),
(960, 'Saha Store', 'ss@mail.com', '45261342', '5421621', 'Goria, Kayal Para, Ram Thakur Bari,Kol-84', '2017-05-05', 'superadmin', '654312'),
(961, 'Need Stores', 'ns@mail.com', '9163680227', '45262112', 'Goria, Majumdar Para, Kol-84', '2017-05-05', 'superadmin', '4523621'),
(962, 'Kartick Stores ', 'ks@mail.com', '9433460022', '456321', 'Fortabad Beltala, Kol-84', '2017-05-05', 'superadmin', '11552'),
(963, 'Maa Kali Stores ', 'mks@mail.com', '9748655196', '45621321', 'Fortabad, Beltala, Kol-84', '2017-05-05', 'superadmin', '45621'),
(964, 'K.S.P Stores', 'ksp@mail.com', '8420472037', '45621', '41, Goira Place, Kol-84', '2017-05-05', 'superadmin', '14252'),
(965, 'Saha Stores  ', 'ss@mail.com', '9831787393', '4562112', '226,Goria Garden, BSF Camp, Kol-84', '2017-05-05', 'superadmin', '45621'),
(966, 'Tara Maa Stores ', 'tms@mail.com', '9874936715', '4546131', 'Goria, Ram Krishna Nagar, Kol-84', '2017-05-05', 'superadmin', '45461'),
(967, 'Paddma Stores ', 'ps@mail.com', '9051656980', '458121', 'Goria, Ram Krishna Nagar, Kol-153', '2017-05-05', 'superadmin', '456132'),
(968, 'Suman Stores ', 'ss@mail.com', '9163985355', '4561313', 'Goria, laskar para, Badamtala, Kol-153', '2017-05-05', 'superadmin', '456213'),
(969, 'Majumder Stores ', 'ms@mail.com', '9007972888', '456613', 'Goria, Ramkrishna Nagar, Kol-84', '2017-05-05', 'superadmin', '456113'),
(970, 'Maa Durga Bhandar ', 'mdb@mail.com', '9830363418', '45202251', 'Goria, Main Road, Kol-84', '2017-05-05', 'superadmin', '4582531'),
(971, 'Maa Kali Stores ', 'mks@mail.com', '9331874429', '4563212', 'Goria Station Road, Kol-84', '2017-05-05', 'superadmin', '456131'),
(972, 'Trishul Stores ', 'ts@mail.com', '9433561007', '456212', 'Husenpur, Kol-107', '2017-05-05', 'superadmin', '12123'),
(973, 'Mamoni Stores ', 'ms@mail.com', '9088586436', '2124512', 'Anandopur, Main Road, Kol-107', '2017-05-05', 'superadmin', '452321'),
(974, 'Raju Stores ', 'rs@mail.com', '9748856650', '45231323', 'Anandopur Main Road, Kol-107', '2017-05-05', 'superadmin', '456212'),
(975, 'Nabin Stores ', 'ns@mail.com', '9674663206', '456312', 'R.R.Plot, Anandopur, Kol-107', '2017-05-05', 'superadmin', '456213'),
(976, 'B.N.Stores ', 'bns@mail.com', '7044204836', '456212', '400, R.R. Plot, Anandopur, Kol-107', '2017-05-05', 'superadmin', '45621'),
(977, 'Priyanka Stores ', 'ps@mail.com', '9062386163', '4562151', '349,R.R.Plot, Anandopur, Kol-107', '2017-05-05', 'superadmin', '452136'),
(978, 'Shree Gobindo Bhandar ', 'sgb@mail.com', '9903552444', '4561231', 'R.R.Plot, Anandopur, Kol-107', '2017-05-05', 'superadmin', '541621'),
(979, 'Manik Stores ', 'ms@mail.com', '8697518462', '453213', 'R.R.Plot,Anandopur, Kol-107', '2017-05-05', 'superadmin', '11321'),
(980, 'Choto Stores', 'cs@mail.com', '8420528850', '4562131', 'Anandopur, Munda para, Kol -107', '2017-05-05', 'superadmin', '4562513'),
(981, 'Modern Stores', 'ms@mail.com', '7003911244', '45562132', 'Anandopur, Munda para, Kol-107\r\n', '2017-05-05', 'superadmin', '1212132'),
(982, 'Kabita Stores ', 'ks@mail.com', '8017711486', '45621321', 'China Mandir Bazar, Kol-105', '2017-05-05', 'superadmin', '1212101'),
(983, 'Raju Kumar Stores', 'rks@mail.com', '9732633460', '4562131', 'China Mandir Bazar, Kol-105', '2017-05-05', 'superadmin', '122310'),
(984, 'Ashibad Bhandar', 'ab@mail.com', '9831905901', '4523613', 'Nonadanga, China Mandir, Kol-105', '2017-05-05', 'superadmin', '456131'),
(985, 'Sonali Stores ', 'ss@mail.com', '9903144197', '4562141', '24/Adarsha Nagar, China Mandir, Kol-105', '2017-05-05', 'superadmin', '456131'),
(986, 'Ranjit Stores ', 'rs@mail.com', '9748682860', '4561321', '26/ Adarsha Nagar, Kol-105', '2017-05-05', 'superadmin', '455121'),
(987, 'Shree Guru Bhandar', 'sgb@mail.com', '9007593432', '45613211', '93/ Adarsha Nagar, China Mandir, Kol-105', '2017-05-05', 'superadmin', '123311'),
(988, 'Harshit Mondal', 'hm@mail.com', '8910572394', '4561213', 'Nona Danga, China Mandir, Kol-', '2017-05-05', 'superadmin', '125513'),
(989, 'Santosh Mal', 'sm@mail.com', '9748623873', '456311', '                                Nonadanga, China Mandir, Kol-105                                ', '2017-05-05', 'superadmin', '122231'),
(990, 'Avi Stores', 'avs@mail.com', '9830813837', '45362122', 'Nonadanga, China Mandir, Block- E, Kol-105', '2017-05-05', 'superadmin', '12131521'),
(991, 'Pankaj Gupta', 'pg@mail.com', '9903124065', '1122310', 'Nonadanga, China Mandir, Block- E4, Kol-105', '2017-05-05', 'superadmin', '596252'),
(992, 'Mallik Stores', 'ms@mail.com', '98366838256', '451231', 'Nonadanga, China Mandir, Block-E3, Kol-105', '2017-05-05', 'superadmin', '12231'),
(993, 'Swapan Stores ', 'ss@mail.com', '9831535114', '45512312', 'Nonadanga, China Mandir, Block-E2, 006, Kol-105', '2017-05-05', 'superadmin', '1232251'),
(994, 'Mahesh Stores ', 'ms@mail.com', '8334041215', '456213', 'Nonadanga, China Mandir, Block-F10, Kol-105', '2017-05-05', 'superadmin', '12251'),
(995, 'Manoj Stores ', 'ms@mail.com', '8100985185', '4562131', 'Nonadanga, China Mandir, Kol-105', '2017-05-05', 'superadmin', '455231'),
(996, 'Loknath Bhandar', 'lb@mail.com', '9563450916', '4551361', 'Nonadanga, China Mandir, Rail Collony, C/3/008, Kol-', '2017-05-05', 'superadmin', '115321'),
(997, 'Tushar Stores ', 'ts@mail.com', '9836805297', '456223', 'Anandopur, Ruby, Kol-167', '2017-05-05', 'superadmin', '5432211'),
(998, 'Bashanti Stores ', 'bs@mail.com', '9830770064', '45525361', 'Anandopur, Ruby, Kol-107', '2017-05-05', 'superadmin', '132311'),
(999, 'Bappa Bread', 'bb@mail.com', '9432937009', '4562212', 'Anandopur, Ruby, Stole no. 79, Kol-107', '2017-05-05', 'superadmin', '1546211'),
(1000, 'Need Stores ', 'ns@mail.com', '9830326666', '45561322', '279/ Husenpur, Kol-107', '2017-05-05', 'superadmin', '11112000'),
(1001, 'Damyanti Stores ', 'ds@mail.com', '9830070727', '45621232', 'Husenpur, Kol-107', '2017-05-05', 'superadmin', '1325632'),
(1002, 'Shree Krishna Bhandar', 'skb@mail.com', '9830590524', '4561312', 'Brahmapur, Shek Para, Nibedita Park, Kol-96', '2017-05-05', 'superadmin', '4561311'),
(1003, 'Abbas Stores', 'as@mail.com', '9836098189', '4562421', 'Brahmapur, Shek Para, Kol-96', '2017-05-05', 'superadmin', '1252113'),
(1004, 'Rakimari Stores ', 'rs@mail.com', '9830810599', '4562131', 'Brahmapur, Shek Para, Kol-96', '2017-05-05', 'superadmin', '1223212'),
(1005, 'Shek Stores ', 'ss@mail.com', '8583993141', '45612361', 'Brahmapur, Shek Para, Kol-96', '2017-05-05', 'superadmin', '6321323'),
(1006, 'Atif Stores ', 'as@mail.com', '9748111506', '45561361', '54,Shek Para, Kol-96', '2017-05-05', 'superadmin', '123221'),
(1007, 'Tina Stores ', 'ts@mail.com', '9903693669', '4562131', 'Brahmapur, Shek Para, Kol-96', '2017-05-05', 'superadmin', '45621'),
(1008, 'A. Stores ', 'as@mail.com', '8920402110', '4562131', 'Brahmapur, Shek para, Kol-96', '2017-05-05', 'superadmin', '1222321'),
(1009, 'Shankar Stores', 'ss@mail.com', '8013467939', '45563613', '3.87, Brahmapur, Shiv Mandir Road, Kol-96', '2017-05-05', 'superadmin', '123311'),
(1010, 'Sneha Stores ', 'ss@mail.com', '8697027405', '4563213', 'Brahmapur, Nardan Park, Kol-70', '2017-05-05', 'superadmin', '1256312'),
(1011, 'Paul Brothers', 'pb@mail.com', '9874024822', '4556131', 'Roy Nagar Place, Kol-70', '2017-05-05', 'superadmin', '145123'),
(1012, 'Rahul Stores ', 'rh@mail.com', '983497601', '14202321', 'Roy Nagar, Natun Bazar, P-127, Kol-70', '2017-05-05', 'superadmin', '122221'),
(1013, 'Raju Stores ', 'rs@mail.com', '7890918770', '4566131', 'Roy Nagar, Natun Bazar, Kol-70', '2017-05-05', 'superadmin', '155313'),
(1014, 'khokon Sardar', 'ks@mail.com', '8296665454', '45521112', 'Roy Nagar, Natun Bazar, Kol-70', '2017-05-05', 'superadmin', '12211'),
(1015, 'Promod Shaw ', 'ps@mail.com', '9088262887', '45561236', '3, Congress pally, Kol-70', '2017-05-05', 'superadmin', '230212'),
(1016, 'Manoj Kumar Yadav ', 'mky@mail.com', '9163219308', '1546121', 'Roy Nagar, Natun Bazar, Kol-70', '2017-05-05', 'superadmin', '13230210'),
(1017, 'Krishna Stores', 'ks@mail.com', '9903854232', '456213', 'Roy Nagar,56/ Purbasa Park, Kol-70', '2017-05-05', 'superadmin', '463621'),
(1018, 'Jibon Joty Stores ', 'jjs@mail.com', '9088150920', '652141021', 'Roy Nagar, No. 5/ Purbasa park, Kol-154', '2017-05-05', 'superadmin', '62421'),
(1019, 'Maha Laxmi Bhandar ', 'mlb@mail.com', '9163141518', '4563211', 'Roy Nagar, Purbasa Park, Kol-70', '2017-05-05', 'superadmin', '45621'),
(1020, 'Anandi Stores ', 'as@mail.com', '8334028267', '4852361', 'Roy Nagar, Purbasa Park, Kol- 70', '2017-05-05', 'superadmin', '456211'),
(1021, 'Surendar Shaw ', 'ss@mail.com', '9834123516', '4562131', '1/1,Ram Krishna Sarani, Kol-154 ', '2017-05-05', 'superadmin', '15531'),
(1022, 'Anil Stores', 'as@mail.com', '9831377334', '4562133', 'Ram Krishna Sarani, Kol-154', '2017-05-05', 'superadmin', '114621'),
(1023, 'Pritam Stores ', 'ps@mail.com', '8013390712', '45652141', 'Ram Krishna Sarani, Kol-154', '2017-05-05', 'superadmin', '1145321'),
(1024, 'Laxmi Stores ', 'ls@mail.com', '9163939565', '4563123', 'Ram Krishna Sarani, Kol-154', '2017-05-05', 'superadmin', '456131'),
(1025, 'Pawan Stores ', 'ps@mail.com', '8981971648', '4562131', 'Ram Krishna Sarani, Kol-154', '2017-05-05', 'superadmin', '4545213'),
(1026, 'R.S. Stores ', 'rs@mail.com', '9830442447', '4551231', 'Ram Krishna Sarani, Kol-154', '2017-05-05', 'superadmin', '4562123'),
(1027, 'Bijali Stores', 'bs@mail.com', '9804783979', '4562131', 'Ram Krishna Sarani (1), Kol-154', '2017-05-05', 'superadmin', '122531'),
(1028, 'Maa Kali Stores ', 'mks@mail.com', '9804783979', '4563613', 'Ram Krishna Sarani, Kol-154', '2017-05-05', 'superadmin', '1563113'),
(1029, 'Shiv Shakti Bhandar', 'ssb@mail.com', '9088598480', '45613331', 'Rania, Udyanpally, Kol-154', '2017-05-05', 'superadmin', '569523'),
(1030, 'Swapan Mondal', 'sm@mail.com', '9830732982', '456324154', 'Rania, 30 feet, Kol-154', '2017-05-05', 'superadmin', '456613'),
(1031, 'Baidyanath Shaw', 'bs@mail.com', '9007113140', '48143621', 'Rania, 30 feet, Kol-154', '2017-05-05', 'superadmin', '4456311'),
(1032, 'Sree Ram Enterprise', 'sre@mail.com', '9330355511', '4563211', '125/4,Roy Nagar, Kol-70', '2017-05-05', 'superadmin', '45521'),
(1033, 'Tulsi Bhandar', 'tb@mail.com', '9830948720', '4545132', 'Bagha Jatin Bazar, Kol-', '2017-05-05', 'superadmin', '125322'),
(1034, 'Santosh Stores ', 'ss@mail.com', '9874703959', '4561321', 'Bijoy Garh, Kol-', '2017-05-05', 'superadmin', '5464121'),
(1035, 'Daya Ram Stores', 'drs@mail.com', '9830129570', '4566311', 'Bijoy Garh, Kol-', '2017-05-05', 'superadmin', '1456122'),
(1036, 'Ashok Shaw', 'as@mail.com', '9804809745', '45623412', 'Bijoy Garh, Kol-', '2017-05-05', 'superadmin', '45252'),
(1037, 'Munna Shaw ', 'ms@mail.com', '9032556067', '4546213', 'Bijoygarh, Kol-', '2017-05-05', 'superadmin', '454612'),
(1038, 'Maa Laxmi Bhandar ', 'mlb@mail.com', '9883391411', '614613262', 'Pollysree, Kol-', '2017-05-05', 'superadmin', '1253210'),
(1039, 'Jitender Stores ', 'js@mail.com', '9679038208', '4561313', 'Netaji Nagar, Kol-', '2017-05-05', 'superadmin', '45613'),
(1040, 'Manik Stores', 'ms@mail.com', '9830863631', '456631', 'Netajinagar, Kol-', '2017-05-05', 'superadmin', '145213'),
(1041, 'Mahesh Stores ', 'ms@mail.com', '9836494181', '4561131', 'Netajinagar, Kol-', '2017-05-05', 'superadmin', '413213'),
(1042, 'S.Paul Bhandar ', 'spb@mail.com', '3324819947', '4562131', 'Netajinagar, Kol-', '2017-05-05', 'superadmin', '4553613'),
(1043, 'Sampa Stores ', 'ss@mail.com', '9007379444', '4562131', 'Netajinagar, Kol-', '2017-05-05', 'superadmin', '45561123'),
(1044, 'Matri Bhadar', 'mb@mail.com', '9874453385', '456231', 'Netajinaga, Kol-', '2017-05-05', 'superadmin', '4521'),
(1045, 'Roy Stores ', 'rs@mail.com', '331513212', '456213', 'Netaji Nagar, Kol-', '2017-05-05', 'superadmin', '45122'),
(1046, 'Shankar Stores ', 'ss@mail.com', '7890783124', '4562131', 'Netaji Nagar, Kol-', '2017-05-05', 'superadmin', '456321'),
(1047, 'Matri Asha', 'ma@mail.com', '9831176297', '455611', 'Netaji Nagar, Kol-', '2017-05-06', 'superadmin', '4525123'),
(1048, 'Tara Maa Bhandar ', 'tmb@mail.com', '8017464527', '456223', 'Netaji Nagar, Kol-', '2017-05-06', 'superadmin', '445621'),
(1049, 'Romen Stores ', 'rs@mail.com', '9163322628', '454161', 'Netaji Nagar, Kol-', '2017-05-06', 'superadmin', '45121'),
(1050, 'Ankita Stores ', 'as@mail.com', '9831794943', '455221', 'Gandhi Collony, Kol-', '2017-05-06', 'superadmin', '45212'),
(1051, 'Roy Brothers ', 'rb@mail.com', '9051960425', '452211', 'Gandhi Collony, Kol-', '2017-05-06', 'superadmin', '45613'),
(1052, 'Sreema Storres', 'ss@mail.com', '9830518985', '453611', 'Gandhi  Collany,Kol-', '2017-05-06', 'superadmin', '4556121'),
(1053, 'Stepim  Stores', 'ss@mail.com', '3324210216', '4556133', 'Gandhi Collony School', '2017-05-06', 'superadmin', '455613'),
(1054, 'Dipshikha Stores ', 'ds@mail.com', '9748442889', '4556123', 'Netaji Nagar, Kol-', '2017-05-06', 'superadmin', '458251'),
(1055, 'Apurba Stores ', 'as@mail.com', '9163870232', '456211', 'Netaji Nagar, Kol-', '2017-05-06', 'superadmin', '456131'),
(1056, 'Shree Krishna Bhandar', 'skb@mail.com', '9831510597', '456212', 'Netaji Nagar, Kol-', '2017-05-06', 'superadmin', '123221'),
(1057, 'Shree Maa Stores ', 'sms@mail.com', '8697611947', '45652121', 'Netaji Nagar, Kol-', '2017-05-06', 'superadmin', '45621'),
(1058, 'Paul Bhandar ', 'pb@mail.com', '33456132', '84651136', 'Netaji Nagar, Kol-', '2017-05-06', 'superadmin', '9846125'),
(1059, 'Joy Netai Bhandar', 'jnb@mail.com', '8013442938', '45562581', 'Netaji Nagar, Kol-', '2017-05-06', 'superadmin', '458522'),
(1060, 'Dailly Need ', 'dn@mail.com', '9830968486', '455121', 'Netaji Nagar, Kol-', '2017-05-06', 'superadmin', '12221'),
(1061, 'Noniprova ', 'noni@mail.com', '8479824588', '485213', 'Netaji Nagar, Kol-', '2017-05-06', 'superadmin', '481121'),
(1062, 'Ajit Memorial Stores ', 'ajit@mail.com', '9007925291', '8141251', 'Netaji Nagar, Kol-', '2017-05-06', 'superadmin', '212121'),
(1063, 'Ujjal Bera ', 'ujjal@mail.com', '9674347837', '8461252', 'By-pass Market, Kol-', '2017-05-06', 'superadmin', '4851132'),
(1064, 'Sunil Das', 'sunil@mail.com', '9748158833', '4566121', 'Purbo Panchanno Gram, Kol-', '2017-05-06', 'superadmin', '455611'),
(1065, 'Gopal Bhandar', 'gopal@mail.com', '8420871969', '455121', 'Purbo Panchanno Gram, Kol-', '2017-05-06', 'superadmin', '112521'),
(1066, 'Prodip Shaw', 'prodip@mail.com', '9007764142', '8461542', 'Purbo panchanno Gram, Kol-', '2017-05-06', 'superadmin', '842113'),
(1067, 'Koilash Stores ', 'koilash@mail.com', '9831623096', '846253212', 'Koilash Shaw, Kol-', '2017-05-06', 'superadmin', '1220221'),
(1068, 'Nabo Durga Bhandar', 'nabodurga@mail.com', '8443076502', '84614321', 'Purbo panchanno Gram, Kol-', '2017-05-06', 'superadmin', '1452121'),
(1069, 'Om Bhandar ', 'om@mail.com', '9605857529', '488143', 'Panchanno Gram, Kol-', '2017-05-06', 'superadmin', '148521'),
(1070, 'Maa Yasoda Bhandar ', 'my@mail.com', '9903233950', '4855113', 'Panchanno Gram, Kol-', '2017-05-06', 'superadmin', '8425121'),
(1071, 'Satish Kumar Gupta', 'satish@mail.com', '8017818494', '84513112', 'Panchanno Gram, Kol-', '2017-05-06', 'superadmin', '8142512'),
(1072, 'Ariyan Stores ', 'ariyan@mail.com', '9163622512', '854142212', 'Martine para,Kol-100', '2017-05-06', 'superadmin', '8451221'),
(1073, 'Arbindo Grneral Stores ', 'arbindo@mail.com', '9163828579', '4825132', 'Martine para, Kol-', '2017-05-06', 'superadmin', '45821'),
(1074, 'Munnilal Shaw ', 'munnilal@mail.com', '9903907739', '78562213', 'Martine para, Kol-', '2017-05-06', 'superadmin', '1484511'),
(1075, 'Bhola Shaw ', 'bhola@mail.com', '9748687214', '4851221', 'Martine para, Kol-', '2017-05-06', 'superadmin', '4524102'),
(1076, 'Narshing General Stores ', 'narshing@mail.com', '9831829173', '78451413', 'Martine para, Kol-', '2017-05-06', 'superadmin', '785132'),
(1077, 'Kishor Prosad ', 'kishor@mail.ocm', '7890111411', '8451212', 'VIP Nagar, Kol-', '2017-05-06', 'superadmin', '875141'),
(1078, 'Kalaboti Stores ', 'kalaboti@mail.com', '9007005574', '485121', 'VIP Nagar, Kol-100', '2017-05-06', 'superadmin', '845221'),
(1079, 'Megha Stores ', 'megha@mail.com', '8621979169', '8451121', 'VIP Nagar, Kol-100', '2017-05-06', 'superadmin', '125121'),
(1080, 'Rakhal Stores ', 'rakhal@mail.com', '7890838', '8461223', 'Netaji Nagar, Kol-', '2017-05-06', 'superadmin', '84251'),
(1081, 'Bormon Stores ', 'bormon@mail.com', '9831221693', '84556612', 'Netaji Nagar, Kol-', '2017-05-06', 'superadmin', '15221'),
(1082, 'Ramk Sagar Stores ', 'ram@mail.com', '9804671499', '78451121', '172/ Netaji Nagar, Kol-', '2017-05-06', 'superadmin', '8451212'),
(1083, 'Uttam Stores', 'uttam@mail.com', '8961926607', '8954131', 'Netaji Nagar, Kol-', '2017-05-06', 'superadmin', '785212'),
(1084, 'Bikash Stores ', 'bikash@mail.com', '2261213', '8454612', 'Martine Para, Kol-', '2017-05-06', 'superadmin', '8565121'),
(1085, 'Anita Stores ', 'anita@mail.com', '7890679514', '8514212', 'Martine Para,l Kol-', '2017-05-06', 'superadmin', '753613'),
(1086, 'Shankar Stores ', 'shankar@mail.com', '9748621866', '5846143', 'Panchanno Gram,Kol-', '2017-05-06', 'superadmin', '7885142'),
(1087, 'Ajoy Stores ', 'ajoy@mail.com', '3325614', '54514132', 'Panchanno Gram,Kol-', '2017-05-06', 'superadmin', '452112'),
(1088, 'Bijoy Shaw', 'bijoy@mail.com', '8961637754', '45512885', 'Panchanno Gram, Kol-', '2017-05-06', 'superadmin', '45613'),
(1089, 'Mamoni Bhandar', 'mamoni@mail.com', '8961304431', '78895132', '358/ R.K. Polly, Sonarpur, Kol-150', '2017-05-06', 'superadmin', '455661'),
(1090, 'Maa Mano Kamona Bhandar ', 'mmk@mail.com', '9748126312', '845621', '383/R.K. Pally, Sonapur,Kol-', '2017-05-06', 'superadmin', '965411');
INSERT INTO `td_client` (`cl_id`, `clname`, `clemail`, `clphn`, `clpan`, `cladd`, `addate`, `adby`, `cgst`) VALUES
(1091, 'Ghosh Variety Stores ', 'ghosh@mail.com', '9830565475', '87954121', 'Sonarpur, Baidya Para, Kol-', '2017-05-06', 'superadmin', '964321'),
(1092, 'New Santoshi Bhandar', 'newsantoshi@mail.com', '9836419162', '894611', 'Kamrabad Rail Gate, Ko;-', '2017-05-06', 'superadmin', '89431'),
(1093, 'Sushila Bhandar', 'sushila@mail.com', '9874385514', '8945121', 'Kamrabad Rail Gate, Kol-', '2017-05-06', 'superadmin', '941421'),
(1094, 'Kushbrid ', 'kushbrid@mail.com', '8017625829', '89641', 'Kamrabad Rail Gate, Kol-', '2017-05-06', 'superadmin', '84251'),
(1095, 'Matri Bhandar', 'matri@mail.com', '8697231912', '482521', 'Kamrabad Rail Gate, Kol-150', '2017-05-06', 'superadmin', '858112'),
(1096, 'Podder Stores ', 'podder@mail.com', '9330647459', '841451', 'Kamrabad Rail Gate, Kol-', '2017-05-06', 'superadmin', '895131'),
(1097, 'Purkait Stores', 'purkait@mail.com', '9733595513', '789965514', 'Kamrabad, Kol-', '2017-05-06', 'superadmin', '4856621'),
(1098, 'P.Naskar', 'p@mail.com', '9748192545', '7858522', 'Kamrabad, Kol-', '2017-05-06', 'superadmin', '148521'),
(1099, 'Joy Santoshi Stores', 'joy@mail.com', '9007205936', '785812', 'Kamrabad, Kol-', '2017-05-06', 'superadmin', '951232'),
(1100, 'Bikram Shaw', 'bikram@mail.com', '9831552107', '8142211', 'Phooler Hat, Kol-', '2017-05-06', 'superadmin', '842212'),
(1101, 'Loknath Bhandar', 'loknath@mail.com', '8420444483', '1453621', 'Phooler Hat, Kol-', '2017-05-06', 'superadmin', '651421'),
(1102, 'Gopal Bhandar', 'gopal@mail.com', '8017024484', '85656641', 'Noyapara, Kol-', '2017-05-06', 'superadmin', '856251'),
(1103, 'Raj Stores ', 'raj@mail.com', '9038195394', '45622112', 'Noya para, Kol-', '2017-05-06', 'superadmin', '546131'),
(1104, 'Maa Bhabani Stores ', 'maabhabani@mail.com', '9903610136', '456224102', 'Noya Para, Kol-', '2017-05-06', 'superadmin', '851414'),
(1105, 'Loknath Bhandar 2', 'loaknath@mail.com', '9836139022', '7552132', 'Noya Para, Kol-', '2017-05-06', 'superadmin', '654121'),
(1106, 'Loknath Enterprise', 'loknath@mail.com', '9163761284', '7852132', 'Noyapara, Kol-', '2017-05-06', 'superadmin', '8451212'),
(1107, 'Satyanarayan Bhandar', 'satyanarayan@mail.com', '9830709389', '4561512', 'Noyapara, Kol-', '2017-05-06', 'superadmin', '86131'),
(1108, 'Shankar Stores ', 'shankar@mail.com', '9163948151', '47895132', 'Sonarpur, Bus Stand, Kol-', '2017-05-06', 'superadmin', '861122'),
(1109, 'New Gandheswari Bhandar ', 'newgandheswari@mail.com', '33315521', '789843', 'Sonarpur, Desh Bandhu Park, Kol-', '2017-05-06', 'superadmin', '986141'),
(1110, 'Biswakarma Bhandar', 'biswakarma@mail.com', '8420930658', '75621321', 'Desh Bandhu Park, Kol-', '2017-05-06', 'superadmin', '455861'),
(1111, 'S. Bhandar', 's@mail.com', '9869792191', '215464', 'Dehs Bandhu Park, Kol-', '2017-05-06', 'superadmin', '15361'),
(1112, 'Loknath Bhandar ', 'loknath@mail.com', '9163623511', '7858313', 'Boikantho Pur More, Kol-', '2017-05-06', 'superadmin', '9855321'),
(1113, 'Gopal Stores', 'gopal@mail.com', '9836087792', '5464941', 'Dehs Bandhu Park, Kol-', '2017-05-06', 'superadmin', '3651121'),
(1114, 'Maa Kali Bhandar', 'maakali@mail.com', '8017156323', '56427451', 'Sonarpur, Rajpur Road, Kol-', '2017-05-06', 'superadmin', '6961321'),
(1115, 'Das Rakomari Stores ', 'das@mail.com', '33625456', '84514331', 'Desh Bandhu Park, Kol-', '2017-05-06', 'superadmin', '46431'),
(1116, 'Sujit Da', 'sujit@mail.com', '3356614', '561312', 'Desh Bandhu Park, Kol-', '2017-05-06', 'superadmin', '65831'),
(1117, 'Sunny Variety', 'sv@mail.com', '9433309018', '452521', 'New Phool Bagan, Near Abhijan Club, Kol- 86\r\n', '2017-05-08', 'superadmin', '482512'),
(1118, 'Loknath Bhandar', 'lb@mail.com', '3324627800', '45251216', 'D-83, Rabindro pally, Ashok Road, Kol-86', '2017-05-08', 'superadmin', '478981'),
(1119, 'Shree Guru Bhandar', 'shreeguru@mail.com', '9874019578', '7825142', '35/1, New Roypur, Near Roypur Club, Kol-84', '2017-05-08', 'superadmin', '875121'),
(1120, 'Roypur Co-oprative', 'roypur@mail.com', '9088703601', '5513112', 'P-25, Roypur, Ramgarh Bus stand, Near, Roypur  Club, Kol-', '2017-05-08', 'superadmin', '5468141'),
(1121, 'M.M. Bhandar', 'mm@mail.com', '8620949930', '814311', 'P-11, Roypur, (Ramgarh Bus stand, near Ram, Near Ram Krishna Francy.', '2017-05-08', 'superadmin', '8545612'),
(1122, 'Maa Laxmi Bhandar ', 'maalaxmi@mail.com', '9903221026', '5451121', '21/1, Ganguly Bagan,Near Ramgarh Crosing, Kol-47', '2017-05-08', 'superadmin', '221112'),
(1123, 'Maa Kali Stores ', ' maakali@mail.com', '9674645925', '545313', 'D-1, Ramgarh, Luna Becari, Kol-47', '2017-05-08', 'superadmin', '1212541'),
(1124, 'Laxmi Narayan Bhandar', 'laxminarayan@mail.com', '8336836430', '4825132', '                                C-12, Ramgarh, Vidya Sagar Colony, Near Ram Krishna Sheba Ashram, Kol-47                                ', '2017-05-08', 'superadmin', '89431'),
(1125, 'Laltu Stores ', 'laltu@mail.com', '7044222025', '456211', '                                4/33A, Vidya Sagar Colony, Near Milani Club, Kol-47                                ', '2017-05-08', 'superadmin', '484212'),
(1126, 'Biva Stores ', 'biva@mail.com', '9831584697', '8451422', '                                4/19B, Vidya Sagar Colony, Near Milani Club,Kol-47                                ', '2017-05-08', 'superadmin', '154213'),
(1127, 'Anima Stores ', 'anima@mail.com', '9830253236', '1478841', '                                4/2A, Vidya Sagar Colony, Near Yubak Bindo Club, Kol-47                                ', '2017-05-08', 'superadmin', '485221'),
(1128, 'Biswas Stores ', 'biswas@mail.com', '8334933954', '4875112', '                                4,Vidya Sagar Colony, Near Ram Krishna Ashram,Kol-47                                ', '2017-05-08', 'superadmin', '89222'),
(1129, 'Kar Bhandar ', 'kar@mail.com', '9830790484', '78851212', 'No.3, Vidya Sagar Colony, Near Colony Committee Office, Kol-47', '2017-05-08', 'superadmin', '121221'),
(1130, 'Maa Laxmi Bhandar', 'maalaxmi@mail.com', '9874667199', '45122514', '3/200, A/J,Vidya Sagar Colony, Kol-47', '2017-05-08', 'superadmin', '45211'),
(1131, 'Satyam Shivam Sundaram', 'satyam@mail.com', '9748800301', '8462132', '61/2, Jorabagan Road, Near Post Office, Kol -47', '2017-05-08', 'superadmin', '89541'),
(1132, 'A.K. Naskar', 'ak@mail.com', '9748048442', '845132', '24, Jodabagan Road, Joda Manosha Mandir, Kol-47', '2017-05-08', 'superadmin', '95212'),
(1133, 'Sonum General Stores ', 'sgs@mail.com', '9681514279', '7852132', '121, Roypur Road, Near Netaji Vidya Mandir,Kol-47', '2017-05-08', 'superadmin', '45961'),
(1134, 'Surama Stores ', 'surama@mail.com', '9830872398', '4821212', '14D/1F, Naktala Road, Near Naktala Sammilony Club, Kol-47', '2017-05-08', 'superadmin', '846251'),
(1135, 'Ram Krishna Stores ', 'rks@mail.com', '9330520218', '87514212', '190A/1,Roypur Road, Near Bhatri Milan Sangha Club, Kol-47', '2017-05-08', 'superadmin', '458212'),
(1136, 'Mou Stores ', 'mou@mail.com', '9674084651', '14525851', '34, Khanpur, Sahid Nagar,Near Chitro Saha Ganji Factory, Kol-47', '2017-05-08', 'superadmin', '211212'),
(1137, 'Taposi Kundu', 'taposi@mail.com', '8981371300', '4862521', 'Khanpur Road, Sahid Nagar, Near Chitro Saha Ganji Factory, Kol-47', '2017-05-08', 'superadmin', '589411'),
(1138, 'Bose Enterprise', 'bose@mail.com', '9433826479', '875122', '12/4/4, Khanpur Road, Near Prabhat Sangha Club, Kol-47', '2017-05-08', 'superadmin', '651112'),
(1139, 'Banti Stores ', 'banti@mail.com', '9903121248', '4862132', '1/12, Naktala, Near Arbindo Nagar Park, Kol-47', '2017-05-08', 'superadmin', '45621'),
(1140, 'Ava Stores ', 'ava@mail.com', '8276946335', '84512212', '22, Naktala Road, Near Jal Tanki, Kol-47', '2017-05-08', 'superadmin', '9421112'),
(1141, 'B.B. Stores ', 'bb@mail.com', '9874691261', '8451321', '15, Arvindo Nagar,Naktala, Near Jal Tanki, Kol-47', '2017-05-08', 'superadmin', '542117'),
(1142, 'Sandhya Stores ', 'sandhya@mail.com', '8697642574', '482112', '4/73, Vidya Sagar Colony, Near Beltala, Mukto Pukur, Kol-47', '2017-05-08', 'superadmin', '452213'),
(1143, 'Kalyan Dey', 'kalyan@mail.com', '9874423260', '4587561', '4/72,Vidya Sagar Colony,Near Beltala, Mukto Pukur, Kol-47', '2017-05-08', 'superadmin', '452521'),
(1144, 'Saha Variety', 'saha@mail.com', '9051450299', '87455232', '4/86, Vidya Sagar Colony, Near Beltala Mukto Pukur, Kol-47', '2017-05-08', 'superadmin', '845651'),
(1145, 'Anjali Stores ', 'anjali@mail.com', '9830801056', '4561312', 'C57,Ramgarh, Near Pragati Sangha Club, Kol-47', '2017-05-08', 'superadmin', '452511'),
(1146, 'Sankar Bhandar ', 'sankar@mail.com', '9903248011', '115231', 'Ramgarh Bazar, Shop- 247, Kol-84', '2017-05-08', 'superadmin', '843221'),
(1147, 'Bimala Tea Centre', 'bimala@mail.com', '7044571685', '84521112', 'Shop- 246, Ramgarh Bazar, Kol-84', '2017-05-08', 'superadmin', '8511210'),
(1148, 'Bimal Stores ', 'bimal@mail.com', '8697034078', '78552142', 'Shop- 240, Ramgarh Bazar, Kol-84', '2017-05-08', 'superadmin', '452521'),
(1149, 'Bholanath Bhandar', 'bholanath@mail.com', '9330982633', '45632113', 'Shop-   , Ramgarh Bazar, Kol-84', '2017-05-08', 'superadmin', '4561321'),
(1150, 'Meera Stores ', 'meera@mail.com', '335621', '8945614', 'Ramgarh Bazar, Kol-84', '2017-05-08', 'superadmin', '6354124'),
(1151, 'Kamala Bhandar', 'kamala@mail.com', '9038858166', '45304361', 'S-38, Ramgarh Bazar, Kol-84', '2017-05-08', 'superadmin', '4811221'),
(1152, 'Saha Stores ', 'saha@mail.com', '9674233045', '45202241', 'Ramgarh Bazar, Kol-84', '2017-05-08', 'superadmin', '845621'),
(1153, 'Shree Ram Thakur Bhandar', 'shreeram@mail.com', '9831551924', '48252121', 'S-241,Ramgarh Bazar,Kol-84', '2017-05-08', 'superadmin', '4521211'),
(1154, 'Sankar Stores (Anjali Bhandar)', 'sankar@mail.com', '9038485336', '45562131', '292, Ramgarh, Near 47 Pally Club, Kol-47', '2017-05-08', 'superadmin', '511322'),
(1155, 'Rabi Chowdhury ', 'rabi@mail.com', '9163636310', '8451212', 'E-2, Ramgarh, Near Kalyan Sangha Club, Kol-47', '2017-05-08', 'superadmin', '6514121'),
(1156, 'Maa Bagala Bhandar', 'maabagala@mail.com', '9883508082', '7852512', '1/272,Naktala, Near Shiv Mandir, Athletic Club, Kol-47', '2017-05-08', 'superadmin', '55432112'),
(1157, 'Urmila Stores', 'urmila@mail.com', '9836061043', '845142112', '1/2426, Naktala, Uday Sangha Club, Kol-47', '2017-05-08', 'superadmin', '8546122'),
(1158, 'Maa Durga Stores ', 'maadurga@mail.com', '9830515322', '56556421', '1/2426, Naktala, Udyan Sanga Club, Kol-47', '2017-05-08', 'superadmin', '686211'),
(1159, 'Sabhanaloy ', 'shabhanaloy@mail.com', '9830484979', '5543612', 'P-40, Roypur, Near Ramgarh Bus Stand, Kol-', '2017-05-08', 'superadmin', '453613'),
(1160, 'Delta Stores ', 'delta@mail.com', '9051392605', '98512221', '34A, Naktala Road,Ramgarh, Near Prograsive Club,Kol-47', '2017-05-08', 'superadmin', '11121032'),
(1161, 'Sadyapati', 'sadyapati@mail.com', '7685921136', '5551432', '19C, Boisnab Ghata By Lane, Kol-47', '2017-05-08', 'superadmin', '65211'),
(1162, 'Jaganath Stores ', 'jaganath@mail.com', '9836029359', '985142121', '255/7/1,Naktala, N.S.C.Bose Road, Opp. Post office, Kol-47', '2017-05-08', 'superadmin', '811210'),
(1163, 'Rakomari Stores ', 'rakomari@mail.com', '7278951756', '5421221', '3/76,Vidya Sagar Colony, Near Anirban Sangha Club, Kol-47', '2017-05-08', 'superadmin', '652141'),
(1164, 'Aditi Stores ', 'aditi@mail.com', '8481009681', '8955412', 'Kalikapur, Kol-99', '2017-05-09', 'superadmin', '845251'),
(1165, 'Shree Guru Bhandar', 'shree@mail.com', '9681092670', '414322', 'Kalikapur Bazar, Kol-99', '2017-05-09', 'superadmin', '54621'),
(1166, 'Sova Stores', 'sova@mail.com', '9874452997', '459851', 'Kalikapur Bazar, Kol-99', '2017-05-09', 'superadmin', '894311'),
(1167, 'Biswajit Stores ', 'biswajit@mail.com', '9681591702', '755421', 'Kalikapur Bazar, Kol-99', '2017-05-09', 'superadmin', '45221'),
(1168, 'Priya Stores ', 'priya@mail.com', '7890430747', '894112', 'Kalikapur Bazar, Kol-99', '2017-05-09', 'superadmin', '895112'),
(1169, 'Jamuna Bhandar', 'jamuna@mail.com', '9831813480', '78556541', 'Kalikapur, Kol-99', '2017-05-09', 'superadmin', '4874521'),
(1170, 'Chandra Stores ', 'chandra@mail.com', '8240379816', '811131', 'Kalikapur Bazar,Kol-99 ', '2017-05-09', 'superadmin', '95211'),
(1171, 'Gupta Stores ', 'gupta@mail.com', '9007207241', '7582253', 'Kalikapur Bazar, Kol-99 ', '2017-05-09', 'superadmin', '453621'),
(1172, 'Basumati Bhandar', 'basumati@mail.com', '9163193690', '785211', 'Kalikapur, Near Anando Sangho Club,Kol-99', '2017-05-09', 'superadmin', '9856121'),
(1173, 'Maa Karunamayee ', 'karunamayee@mail.com', '9831108277', '7852112', '18/1,Kalikapur, Khalpar, Kol-99', '2017-05-09', 'superadmin', '45821'),
(1174, 'Mousumi Rice Shop', 'mousumi@mail.com', '9903711276', '545621', '18/1,Kalikapur, Khalpar, Kol-99', '2017-05-09', 'superadmin', '652141'),
(1175, 'Rajit Stores ', 'ranjit@mail.com', '7044170707', '8525132', '18/3, Kalikapur, Kol-99', '2017-05-09', 'superadmin', '458511'),
(1176, 'Sukla Karmakar', 'sukla@mail.com', '9903033053', '842521', '18/3,Kalikapur, Kol-99', '2017-05-09', 'superadmin', '45121'),
(1177, 'Manoj Shaw ', 'manoj@mail.com', '9831906773', '7825221', '18/3, Kalikapur, Kol-99', '2017-05-09', 'superadmin', '458212'),
(1178, 'Mondal Stores ', 'mondal@mail.com', '9163302989', '482221', '18/3,Kalikapur, Kol-99', '2017-05-09', 'superadmin', '546213'),
(1179, 'Chaya Stores ', 'chaya@mail.com', '9163225632', '785212', 'Kalikapur, Kol-99', '2017-05-09', 'superadmin', '548541'),
(1180, 'Rakesh Stores ', 'rakesh@mail.com', '8017252291', '78523132', '53,Sire Road, Kol-75', '2017-05-09', 'superadmin', '852211'),
(1181, 'Chowdhury Stores ', 'chowdhury@mail.com', '7980907728', '758521', 'Nandankanan, Kol-75', '2017-05-09', 'superadmin', '7852221'),
(1182, 'Madhav Bhandar', 'Madhav@mail.com', '8017150938', '856421312', 'Jodabrige, Kol-75', '2017-05-09', 'superadmin', '785212'),
(1183, 'Shree Krishna Stores ', 'krishna@mail.com', '9163897383', '7852112', '184,Santoshpur, Near Mini Bus Stand,Kol-75', '2017-05-09', 'superadmin', '452102'),
(1184, 'Arup Stores ', 'arup@mail.com', '8906525717', '5542122', 'New Santoshpur, 25 East Road, Kol-75', '2017-05-09', 'superadmin', '96125421'),
(1185, 'Tanmoy Stores ', 'tanmoy@mail.com', '8820891381', '452223', 'East Road, Kol-75', '2017-05-09', 'superadmin', '455225'),
(1186, 'Loknath Variety Stores', 'loknath@mail.com', '9830656252', '8545622', 'New Santoshpur, Kol-75', '2017-05-09', 'superadmin', '425582'),
(1187, 'Nupur Stores ', 'nupur@mail.com', '8017229156', '7852142', '70, New Santoshpur,Kol-75', '2017-05-09', 'superadmin', '586112'),
(1188, 'Bhai Variety', 'bhai@mail.com', '9051213464', '7852112', '34/B, Ajanta Road, New Santoshpur, Near Milani Club, Kol-', '2017-05-09', 'superadmin', '45621'),
(1189, 'Sujata Stores ', 'sujata@mail.com', '9331637566', '7582521', '15, New Santoshpur, Kol-75', '2017-05-09', 'superadmin', '78252'),
(1190, 'Anima Stores ', 'anima@mail.com', '9830219837', '4585421', 'New Santoshpur, Kol-75', '2017-05-09', 'superadmin', '452121'),
(1191, 'Rani Rasmani  Bhandar', 'ranirasmani@mail.com', '9836963328', '78521312', '72, K.K. Majumdar Road, Kol-75', '2017-05-09', 'superadmin', '482512'),
(1192, 'Sankari ', 'sankari@mail.com', '9681108286', '7852141', '31/4, Midile Road,Beside Kali Temple, Kol-75', '2017-05-09', 'superadmin', '4812541'),
(1193, 'New Park Stores ', 'newpark@mail.com', '9051762699', '77852122', '12/A, Santosh Pur, Kol-75', '2017-05-09', 'superadmin', '45212'),
(1194, 'Sweety Stores ', 'sweety@mail.com', '9748848082', '785212', '2/1, South Road, Santoshpur,Trikon Park, Kol-', '2017-05-09', 'superadmin', '452221'),
(1195, 'Badtala Stores ', 'badtala@mail.com', '9433616984', '845212', 'Badtala Bazar, Kol-75', '2017-05-09', 'superadmin', '546121'),
(1196, 'Vivekanando Stores', 'vivekanando@mail.com', '9804470836', '7852122', 'Badtala Bazar, Kol-75', '2017-05-09', 'superadmin', '8751121'),
(1197, 'Mintu Stores', 'mintu@mail.com', '9051241110', '8514212', 'Badtala Bazar, Kol-75', '2017-05-09', 'superadmin', '5451223'),
(1198, 'Sova Stores ', 'sova@mail.com', '9903261049', '85421323', 'Sandhya Bazar, Kol-75', '2017-05-09', 'superadmin', '4521220'),
(1199, 'Shidheswari Bhandar', 'shidheswari@mail.com', '8017303754', '87545113', 'Sandhya Bazar, Kol-75', '2017-05-09', 'superadmin', '84251213'),
(1200, 'Loknath Bhandar', 'loknath@mail.com', '9883781589', '451221', 'Sandhya Bazar, Kol-75', '2017-05-09', 'superadmin', '45225'),
(1201, 'Shyamal Stores ', 'shyamal@mail.com', '9163410037', '7522132', 'Sandhya Bazar, Kol-125', '2017-05-09', 'superadmin', '632541'),
(1202, 'Hari Prati Bhandar', 'hariprati@mail.com', '9231828658', '758252132', 'Sandhya Bazar, Kol-75', '2017-05-09', 'superadmin', '4523210'),
(1203, 'Dipak Mishtri', 'dipak@mail.com', '8961269326', '7522132', 'Sandhya Bazar, Kol-75', '2017-05-09', 'superadmin', '814221'),
(1204, 'Mohamaya Bhandar', 'mohamaya@mail.com', '9836533621', '84521210', '12/1,Naskar Para Road, Sandhya Bazar, Kol-75', '2017-05-09', 'superadmin', '696121'),
(1205, 'Ration Shop (Dulal Modak)', 'dulal@mail.com', '7687840440', '8641221', 'Banerjee Para Lane, Kol-31', '2017-05-09', 'superadmin', '65242'),
(1206, 'Subhodip Stores', 'subhodip@mail.com', '8013706306', '8754331', '37, Naskar Para Lane,Kol-31', '2017-05-09', 'superadmin', '846212'),
(1207, 'Harek Rakom', 'harek@mail.com', '9674011103', '785212', 'Naskar Para Lane, Salimpur, Kol-31', '2017-05-09', 'superadmin', '585412'),
(1208, 'Smriti Stores ', 'smriti@mail.com', '8017225601', '87514213', '52/A, P.G.M.Shah Road, Kol-45', '2017-05-09', 'superadmin', '485212'),
(1209, 'Madhuri Stores ', 'madhuri@mail.com', '9830909380', '851212', '5/1, P.G.M. Shah Road, Kol-45', '2017-05-09', 'superadmin', '9656121'),
(1210, 'C.L. Shaw', 'shaw@mail.com', '7278430360', '451243212', '5/17,P.G.M. Shah Road, Kol-45', '2017-05-09', 'superadmin', '652102'),
(1211, 'Loknath Bhandar ', 'loknath@mail.com', '9330403745', '871442512', '5/18, P.G.M Shah Road, Kol-45', '2017-05-11', 'superadmin', '54121211'),
(1212, 'Sanjana Stores ', 'sanjana@mail.com', '9339112213', '45246321', '1/87, Rajender Prasad Colony, Kol-33', '2017-05-11', 'superadmin', '453621'),
(1213, 'Maheswar Shaw ', 'maheswar@mail.com', '9748686944', '4525321', 'R.P. Colony, Kol-33', '2017-05-11', 'superadmin', '452158'),
(1214, 'Chotelal Shaw', 'chotelal@mail.com', '9748542992', '4522133', '1/25, R.P.Colony, Kol-33', '2017-05-11', 'superadmin', '551414'),
(1215, 'Ram Bhandar', 'ram@mail.com', '9007441010', '4585212', '2/35, R.P. Colony, Kol-33', '2017-05-11', 'superadmin', '652421'),
(1216, 'Gurudev Stores ', 'gurudev@mail.com', '9681395301', '54251221', '2/4, R.P.Colony, Kol-33', '2017-05-11', 'superadmin', '542122'),
(1217, 'Devi Lal Shaw ', 'devi@mail.com', '9681796557', '7855142', '62/54 H.P. Dutta Lane, Kol-33', '2017-05-11', 'superadmin', '1545561'),
(1218, 'Matri Bhandar', 'matir@mail.com', '9963558879', '4554211', '62/73, H.P. Dutta Lane, Kol-33', '2017-05-11', 'superadmin', '632211'),
(1219, 'Papai Stores ', 'papai@mail.com', '65555619', '81425123', '7/6, H.P. Dutta Lane, Kol-33', '2017-05-11', 'superadmin', '5695414'),
(1220, 'Meera Stores', 'meera@mail.com', '9831751072', '452131', '60/1, H.P. Dutta Lane, Kol-33', '2017-05-11', 'superadmin', '362112'),
(1221, 'Babai Stores ', 'babai@mail.com', '9432151739', '452521', '60/1, H.P. Dutta Lane, Kol-33', '2017-05-11', 'superadmin', '111113'),
(1222, 'Suresh Stores ', 'suresh@mail.com', '8443095435', '54252132', '4/63, H.P. Dutta lane, Kol-33', '2017-05-11', 'superadmin', '422123'),
(1223, 'Mahabir Stores ', 'mahabir@mail.com', '9874823225', '564211', '7 H.P.Dutta Lane, Kol-33', '2017-05-11', 'superadmin', '5841322'),
(1224, 'Bishal Stores ', 'bishal@mail.com', '8697080227', '452122', '36/2, P.M.Shah Road, Near New Better High School,Kol-33', '2017-05-11', 'superadmin', '564251'),
(1225, 'Manju Stores ', 'manju@mail.com', '9874411252', '452121', '113/1, Prince Anwar Shah Road, Kol-33', '2017-05-11', 'superadmin', '654124'),
(1226, 'Arjunlal Gupta', 'arjunlal@mail.com', '9903422834', '87582541', 'Anwar Shah Market, Kol-33', '2017-05-11', 'superadmin', '9212221'),
(1227, 'Jitendar Prasad (jitu)', 'jitender@mail.com', '7044106323', '458251', '33, Anwar Shah Market, Kol-33', '2017-05-11', 'superadmin', '653211'),
(1228, 'Dashokarma Bhandar', 'dashokarma@mail.com', '9830218858', '4552132', 'Anwar Shah Market, Kol-33', '2017-05-11', 'superadmin', '452122'),
(1229, 'Kali Bhandar', 'kali@mail.com', '9330943260', '4561321', 'Anwar Shah Market, Kol-33', '2017-05-11', 'superadmin', '452212'),
(1230, 'Gupta Stores ', 'gupta@mail.com', '9831236583', '4521331', '26, Russa Road, Kol-33', '2017-05-11', 'superadmin', '452521'),
(1231, 'Maa Kali Bhandar', 'maakali@mail.com', '9836625405', '455213', '247, Bangur CIT Market,Kol-33', '2017-05-11', 'superadmin', '452212'),
(1232, 'Surender Bhanar', 'surender@mail.com', '9748453667', '5487414', '247, Bangur CIT Market, Kol-33', '2017-05-11', 'superadmin', '862511'),
(1233, 'Laxmi Stores ', 'laxmi@mail.com', '9674290919', '4552247', '247, Bhangur,CIT Market, D.P.S. Road, Kol-33', '2017-05-11', 'superadmin', '4536212'),
(1234, 'Maa Laxmi Bhandar', 'maalaxmi@mail.com', '9831249589', '48143221', '247, D.P.S Bhangur CIT Market, Kol-47', '2017-05-11', 'superadmin', '1211323'),
(1235, 'Dev Gouri Stores ', 'devgouri@mail.com', '9831941353', '452531', '36C, Uday Shankar Sarani, Near Golf Club, Kol-33', '2017-05-11', 'superadmin', '4522121'),
(1236, 'New Golf Club Stores', 'golfclub@mail.com', '9883268502', '485121', '42, Vidya Sagar Sarani, Near Golf Club, Kol-33', '2017-05-11', 'superadmin', '652121'),
(1237, 'Subhas Shaw ', 'subhas@mail.com', '9804942241', '5453613', '39/3,Jubli Park, Opp. Child  Play House, Kol-33', '2017-05-11', 'superadmin', '652121'),
(1238, 'Bholanath Bhandar', 'bholanath@mail.com', '9830019628', '4521421', '1/21, Santi Ghosh, Near Nabo Juba Sangho Club,Kol-40', '2017-05-11', 'superadmin', '8142121'),
(1239, 'A.D. Enterprise', 'adenterpirse@mail.com', '9903514531', '4521311', '34/4,N.S.C. Bose Road, Ashok Nagar, Kol-40', '2017-05-11', 'superadmin', '456712'),
(1240, 'Maa Janaki Stores ', 'janaki@mail.com', '8981785475', '4595621', '1/5, Ashok Nagar, N.S.C. Bose Road, Kol-40', '2017-05-11', 'superadmin', '452121'),
(1241, 'New Joy Maa Kali Stores', 'joymaakali@mail.com', '9874604511', '487562514', '15, N.S.C.Bose Road, Ashok Nagar Market, Kol-40', '2017-05-11', 'superadmin', '4552211'),
(1242, 'Gupta Stores ', 'gupta@mail.com', '7890989812', '4582121', '2/16A, Ashok Nagar Market, Kol-40', '2017-05-11', 'superadmin', '122121'),
(1243, 'Babu Sona', 'babusona@mail.com', '8017278077', '45212531', 'Ashok Nagar Bazar, Kol-40', '2017-05-11', 'superadmin', '45422113'),
(1244, 'Baby Enterprise', 'baby@mail.com', '9831771105', '4854312', '15, Ashok Nagar Road, N.S.C. Bose Road, Kol-40', '2017-05-11', 'superadmin', '4522132'),
(1245, 'Bela Stores ', 'bela@mail.com', '8420255431', '4521212', '2/9, Ashok Nagar, N.S.C.Bose Road, Kol-40', '2017-05-11', 'superadmin', '452121'),
(1246, ' New Matri Stores ', 'matri@mail.com', '7278886556', '48612321', '17/28,N.S.C. Bose Road, Ashok Nagar,Kol-40', '2017-05-11', 'superadmin', '4522112'),
(1247, 'Binod Stores ', 'binod@mail.com', '9883396288', '452121123', '57/1A, N.S.C. Bose Road, Kol-40', '2017-05-11', 'superadmin', '8425221'),
(1248, 'Maa Manosha Stores ', 'maamanosha@mail.com', '9007632456', '5452221', 'Chaliya, N.S.C. Bose  Road, Kol- 40', '2017-05-11', 'superadmin', '643221'),
(1249, 'Tista', 'tista@mail.com', '7278098883', '45821', 'Bijoy Garh, Kol- 92\r\n', '2017-05-11', 'superadmin', '62511'),
(1250, 'Maa Janaki Stores ', 'maajanaki@mail.com', '8961574891', '4521110', 'Lalka, Jal Tanki, Kol-92', '2017-05-11', 'superadmin', '482512'),
(1251, 'Bipad Tarini ', 'bipadtarini@mail.com', '9836007997', '4521232', '21/1, Raja Subodh Chandra Mallik Road, Sulekha, Kol-', '2017-05-11', 'superadmin', '5454213'),
(1252, 'Shyam Trading ', 'shaym@mail.com', '9831014471', '452122', 'Jadovpur, Kol-', '2017-05-11', 'superadmin', '2121122'),
(1253, 'Ration Rishi ', 'rationrishi@mail.com', '9836837936', '48213122', 'Jadovpur, Kol-32', '2017-05-11', 'superadmin', '5812121'),
(1254, 'Laxmi Stores ', 'laxmi@mail.com', '9007993675', '4521322', '47, Jamuna Nagar, Kol-99', '2017-05-12', 'superadmin', '452512'),
(1255, 'Roy Stores ', 'roy@mail.com', '9903492349', '4525121', '774, Purbalok, Kol-99', '2017-05-12', 'superadmin', '542512'),
(1256, 'Joy Hari Stores ', 'joyhori@mail.com', '9748292109', '455612', '584/1, Purbalok, Near Kali Mandir,Kol-99', '2017-05-12', 'superadmin', '456121'),
(1257, 'Ava Bhandar', 'ava@mail.com', '9088234687', '4521421', '                                2,Nitai Nagar, Kol-99                                ', '2017-05-12', 'superadmin', '45212'),
(1258, 'Shiba Stores (Bapi) ', 'shiba@mail.com', '9051110669', '45564321', '2, Netai Nagar, Near Chitto Bandhu Club, Kol-99', '2017-05-12', 'superadmin', '481122'),
(1259, 'Sima Stores ', 'sima@mail.com', '8013208583', '45561321', '2, Netai Nagar, Kol-99', '2017-05-12', 'superadmin', '458122'),
(1260, 'Sneha Variety ', 'sneha@mail.com', '9007490954', '55461221', '54A, Purbalok, Kol-99', '2017-05-12', 'superadmin', '152121'),
(1261, 'Swad (Proyojani Food Products)', 'swad@mail.com', '9433676758', '45521225', '54A, Purbalok, Kol-99', '2017-05-12', 'superadmin', '14255121'),
(1262, 'Haldar Stores ', 'haldar@mail.com', '8981566639', '4524212', '584/1, Purbalok, Near Kali Mandir,Kol-99', '2017-05-12', 'superadmin', '482122'),
(1263, 'Purbalok Stores ', 'purbalok@mail.com', '9163863383', '455121', '205, Purbalok,Kol-99', '2017-05-12', 'superadmin', '458212'),
(1264, 'Joy Maa Tara Stores ', 'joymaatara@mail.com', '9903760656', '56542514', '23, Netai Nagar, Kol-99', '2017-05-12', 'superadmin', '158421'),
(1265, 'Jogomaya Bhandar', 'jogomaya@mail.com', '9903521029', '5521421', '1/6, Netai Nagar, Kol-99', '2017-05-12', 'superadmin', '1521421'),
(1266, 'Suresh Tea House', 'suresh@mail.com', '9836029397', '8545321', '142/1, Santoshpur, Near Mini Bus Stand, Kol-75', '2017-05-12', 'superadmin', '1258512'),
(1267, 'Ram Krishna Bhandar', 'ramkrishna@mail.com', '3324167232', '452512210', '9 - 3rd Road, Santoshpur, Kol-75', '2017-05-12', 'superadmin', '4825121'),
(1268, 'Prabhashi Stores', 'prabhashi@mail.com', '9836533507', '45662321', 'Santoshpur, Kol-75', '2017-05-12', 'superadmin', '482121'),
(1269, 'S.Naskar', 'snaskar@mail.com', '9831848484', '87514214', 'Modern Park Avenue, Kol-75', '2017-05-12', 'superadmin', '475814'),
(1270, 'Pinku Stores ', 'pinku@mail.com', '9830282859', '45251321', '37/2, Modern Park Avenue, Kol-75', '2017-05-12', 'superadmin', '125121'),
(1271, 'Bubai Stores ', 'bubai@mail.com', '9836043229', '48521321', 'B/1, East Rajapur, Near Pump House, Kol-75', '2017-05-12', 'superadmin', '452121'),
(1272, 'Venus Construction ', 'venus@mail.com', '9088975214', '1452121', 'B-3, East Raja Pur, Kol-75', '2017-05-12', 'superadmin', '5456321'),
(1273, 'Khokan Stoers ', 'khokan@mail.com', '8981529411', '45212554', 'East Raja Pur, Kol-75', '2017-05-12', 'superadmin', '482202'),
(1274, 'Maa Sarada Bhandar ', 'maasarada@mail.com', '9163181252', '5451421', '6/6, S.S.Colony, Kol-94', '2017-05-12', 'superadmin', '1514021'),
(1275, 'Anando Stores ', 'anando@mail.com', '8820674054', '7855425', 'S.S.Colony, Kol-94', '2017-05-12', 'superadmin', '485121'),
(1276, 'Jiten Mishtri ', 'jiten@mail.com', '9674593217', '8456121', 'D-23, S.S.Colony, Kol-94', '2017-05-12', 'superadmin', '152121'),
(1277, 'Loknath Bhandar', 'loknath@mail.com', '9830132967', '485412122', 'M-9, S.S.Colony, Kol-94', '2017-05-12', 'superadmin', '48212212'),
(1278, 'Ruma Malick', 'ruma@mail.com', '312215125', '4521212', 'N-6,S.S.Colony, Kol-94', '2017-05-12', 'superadmin', '148112'),
(1279, 'Raboti Stores ', 'raboti@mail.com', '9674437476', '14851221', 'S.S. Collony, Kol-94', '2017-05-12', 'superadmin', '58511'),
(1280, 'Paul Stores ', 'paul@mail.com', '9836975232', '4551211', 'M-7, S.S. Colony, Kol-94', '2017-05-12', 'superadmin', '485122'),
(1281, 'Debroto Bhandar ', 'debroto@mail.com', '9239030966', '1452120', 'L-7, S.S.Colony,B-Block, Kol-94', '2017-05-12', 'superadmin', '145521'),
(1282, 'Dipa Rice Centre', 'diparicecentre@mail.com', '9674292340', '4521211', 'P-30, S.S. collony, Kol-94', '2017-05-12', 'superadmin', '552512'),
(1283, 'Nano Stores ', 'nabo@mail.com', '9051013041', '4825122', 'J/8,S.S. Colony,Kol-94', '2017-05-12', 'superadmin', '5582112'),
(1284, 'Nilu Stores ', 'nilu@mail.com', '8981129489', '752123', '0-9, S.S.Colony, Kol-94', '2017-05-12', 'superadmin', '158122'),
(1285, 'Bishaka Bhandar', 'bishaka@mail.com', '8282943154', '4512154', 'G-2, S.S. Colony,Kol-94', '2017-05-12', 'superadmin', '151201'),
(1286, 'Susanto Stores ', 'susanto@mail.com', '7890757808', '482121', 'B-14, S.S.Colony, Kol-94', '2017-05-12', 'superadmin', '1251021'),
(1287, 'Geeta Stores ', 'geeta@mail.com', '9339517366', '452122', 'D-25, East Rajapur, Hiland Park, Kol-75', '2017-05-12', 'superadmin', '482121'),
(1288, 'S.B. Atta Chaki', 'sb@mail.com', '9830437793', '451211', 'Bijoygarh, Kol-92', '2017-05-12', 'superadmin', '4252121'),
(1289, 'Biva Stores ', 'biva@mail.com', '9830313284', '482121', '99, Vishnu Pally, Kol-93', '2017-05-12', 'superadmin', '574121'),
(1290, 'Jitu Stores ', 'jitu@mail.com', '9903311290', '482511', '321, Banerjee Para Road, Kol-41', '2017-05-12', 'superadmin', '1521254'),
(1291, 'Kamala Veriety Stores ', 'kamala@mail.com', '8621873303', '482121', '65/4, Banerjee Para Road, Kol-41', '2017-05-12', 'superadmin', '542112'),
(1292, 'Pusposree  Bhandar', 'pusposree@mail.com', '9038633695', '4843211', '73,Banerjee Para Road, Kol-41', '2017-05-12', 'superadmin', '1251021'),
(1293, 'Arjun Shaw ', 'arjun@mail.com', '9339749877', '14587251', '13/A, Taramoni Ghat Road, Kol-41', '2017-05-12', 'superadmin', '157851'),
(1294, 'Laxmi Bhandar', 'laxmi@mail.com', '9062408006', '4258212', '431-N,Banerjee Para Road, Kol-41', '2017-05-12', 'superadmin', '157421'),
(1295, 'Tamal Da ', 'tamal@mail.com', '9433034423', '452551', '12, Baroda Sarani, Kol-82', '2017-05-12', 'superadmin', '125121'),
(1296, 'Ekanto Apan', 'ekantoapan@mail.com', '9830079043', '785211', '26, Broda Sarani, Kol-82', '2017-05-12', 'superadmin', '12101'),
(1297, 'Shree Krishna Variety ', 'shreekrishna@mail.com', '9830704843', '452213202', '35, Baroda Sarani, Kol-82', '2017-05-12', 'superadmin', '151211'),
(1298, 'Joy Guru Bhandar ', 'joyguru@mail.com', '9339199394', '4585121', '332B, Ustad Amir Khan, Near Baroda Sarani,Kol-82', '2017-05-12', 'superadmin', '125121'),
(1299, 'Loknath Bhandar ', 'loknath@mail.com', '9163111382', '1578251', '163, M.G. Road, Keora Pukur Bazar, Kol-82', '2017-05-12', 'superadmin', '1551102'),
(1300, 'Ranjit Stores (Chaki)', 'ranjit@mail.com', '9088342692', '48521122', 'Purbopatwari, Keora Pukur Bazar, Kol-93', '2017-05-12', 'superadmin', '1542121'),
(1301, 'Joy Maa Kali Bhandar ', 'joymaakali@mail.com', '7685951986', '48124212', 'N-58, Purbopatwari, Natun Pally, Kol-93', '2017-05-12', 'superadmin', '1251021'),
(1302, 'Laxmi Bhandar', 'laxmi@mail.com', '9831317459', '8545141', 'Dinesh pally, Kol-93', '2017-05-12', 'superadmin', '124211'),
(1303, 'Subol Stores ', 'subol@mail.com', '9748602515', '15421221', 'Dinesh Pally, Tal Bagan,Kol-93', '2017-05-12', 'superadmin', '1251212'),
(1304, 'Rajlaxmi Bhandar', 'rajlaxmi@mail.com', '9903260756', '74522121', '1725, Purbopatwari (Dhakuri para), Dinesh Pally, Kol-93', '2017-05-12', 'superadmin', '698111'),
(1305, 'Sukhen Das ', 'sukhen@mail.com', '9903388704', '842514214', 'Anandopally, Paschim, Kol-93', '2017-05-12', 'superadmin', '4581421'),
(1306, 'Banik Brothers ', 'banik@mail.com', '9804568966', '4842142', 'Anandopally Paschim, Kol-93', '2017-05-12', 'superadmin', '12511201'),
(1307, 'Maa Tara Stores (Tapu Da Dokan)', 'maatara@mail.com', '9836756212', '78542141', 'Anandopally, Paschim, Kol-93', '2017-05-12', 'superadmin', '4542112'),
(1308, 'Sunil Shaw', 'sunil@mail.com', '8282832153', '15845651', 'Natun Pally, Near Rishka Stand, Kol-93', '2017-05-12', 'superadmin', '12512113'),
(1309, 'Das Variety Stores ', 'dasvariety@mail.com', '7278416263', '4821212', 'Saat Bigha, Natun Pally,Kol- 93', '2017-05-12', 'superadmin', '125121'),
(1310, 'Annapurna Stores ', 'annapurna@mail.com', '8697308982', '7514212', 'M.G. Road, Near Bank Of Baroda, Kol-93', '2017-05-12', 'superadmin', '451421'),
(1311, 'Tara Maa Stores ', 'taramaa@mail.com', '8336818834', '4822121', 'Kabar Danga More, Kol-93', '2017-05-12', 'superadmin', '2512102'),
(1312, 'Shree Krishna Stores ', 'shreekrishna@mail.com', '9804512219', '4212212', 'Kabardanga, Opp. Blind School, Kol-93', '2017-05-12', 'superadmin', '212122'),
(1313, 'Anandomoyee Stores (Chakki)', 'anandomoyee@mail.com', '9007176317', '145121', 'M.G. Road, Kol-93', '2017-05-15', 'superadmin', '4825132'),
(1314, 'Vishnu Stores', 'vishnu@mail.com', '8981404726', '452132', '138/19, Keora Pukur Bazar, M.G. Road, Kol-93', '2017-05-15', 'superadmin', '482123'),
(1315, 'S.K. Stores ', 'sk@mail.com', '9874321274', '4223121', 'M.G.Road, Kol-82', '2017-05-15', 'superadmin', '182512'),
(1316, 'Saha Variety ', 'sahavariety@mail.com', '9038642224', '4521212', 'Jivan Mohini Road, Kol-82', '2017-05-15', 'superadmin', '481121'),
(1317, 'Chandan Stores ', 'chandan@mail.com', '9038447655', '25451421', 'Jivan Mohini Road, Kol-82', '2017-05-15', 'superadmin', '151211'),
(1318, 'Happy Stores ', 'happy@mail.com', '9330065297', '845411', 'Jivan Mohini Park, Kol-82', '2017-05-15', 'superadmin', '45251'),
(1319, 'Manoranjan Bhandar (Ratan Ghosh)', 'maniranjan@mail.com', '9836687034', '87584254', 'Jivan Mohini Market, Kol-82', '2017-05-15', 'superadmin', '842141'),
(1320, 'Shree Ganesh Bhandar ', 'Shreeganesh@mail.com', '9432352703', '45842541', 'Jivan Mohini Market, Kol-82', '2017-05-15', 'superadmin', '145421'),
(1321, 'Das Stores ', 'das@mail.com', '8902434365', '4362534', 'Jivan Mohini Market, Kol-82', '2017-05-15', 'superadmin', '52123'),
(1322, 'B.K. Stores', 'bk@mail.com', '9038096409', '4524211', 'M.G.Road , Kol-82\r\n', '2017-05-15', 'superadmin', '1514211'),
(1323, 'Khokan Stores ', 'khokan@mail.com', '9831820137', '4582512', '64, Kalikapur, Kol-99', '2017-05-15', 'superadmin', '558421'),
(1324, 'Tara Maa Stores', 'taramaa@mail.com', '8017588705', '4784213', '                                78B, Hospital Link Road,Eastarn Park, Kalikapur, Santoshpur, Kol-75                                ', '2017-05-15', 'superadmin', '4853121'),
(1325, 'Subho Stores ', 'subho@mail.com', '8013914581', '451221', '33, Eastern Park, Santoshpur, Kol-75', '2017-05-15', 'superadmin', '154321'),
(1326, 'Bholanath Stores ', 'bholanath@mail.com', '9831236288', '452121', '196, Kalikapur Road, Kol-78', '2017-05-15', 'superadmin', '458251'),
(1327, 'Shanti Stores ', 'shanti@mail.com', '33564211', '8641321', '252, Kalikapur Road, Kol-99', '2017-05-15', 'superadmin', '485612'),
(1328, 'Raju Stores ', 'raju@mail.com', '9433488064', '4821121', 'Garfa, Patwari Para, Kol-78', '2017-05-15', 'superadmin', '458211'),
(1329, 'Anil Stores ', 'anil@mail.com', '9883305752', '4532121', '80, Vivekanando Sarani, Jadovpur, Kol-78', '2017-05-15', 'superadmin', '512132'),
(1330, 'Naborupam ', 'naborupam@mail.com', '9239782095', '85421212', '68, Vivekanando Sarani, Jadavpur, Near Garfa Thana, Kol-78', '2017-05-15', 'superadmin', '1512132'),
(1331, 'Swastik Bhandar', 'swastik@mail.com', '3322111', '65454154', '41, Vivekanando Sarani, Jadovpur, Garrfa Dr. Bagan, Kol-78', '2017-05-15', 'superadmin', '5485121'),
(1332, 'Variety Stores ', 'Variety@mail.com', '9681816925', '45211212', '13/B, Vivekanando Sarani, Garfa Dr. Bagan, Kol-78', '2017-05-15', 'superadmin', '5445612'),
(1333, 'Kamala Stores ', 'kamala@mail.com', '9874523348', '554212', '11/A, Viveknando Sarani, Garfa Dr. Bagan,Kol-78', '2017-05-15', 'superadmin', '61511212'),
(1334, 'Swasti Stores ', 'swasti@mail.com', '7278864293', '4585112', '12, Vivekanando Sarani, Garfa Dr. Bagan, Kol-78', '2017-05-15', 'superadmin', '1251021'),
(1335, 'Kundu Stores ', 'kundu@mail.com', '8017072978', '15422123', '8/41, Sahid Nagar, Kol-78', '2017-05-15', 'superadmin', '42123'),
(1336, 'S.K. Stores ', 'sk@mail.com', '9163493849', '75251421', '37, Sahid Nagar, Ganguli Pukur, Kol-78', '2017-05-15', 'superadmin', '1251201'),
(1337, 'Bapi Stores ', 'bapi@mail.com', '8697077367', '4512132', '7, Sahid Nagar, Kol- 78', '2017-05-15', 'superadmin', '121021'),
(1338, 'Vijaya Stores ', 'vijaya@mail.com', '9433617229', '4523112', '7, K.P.Roy Lane, Kol-78', '2017-05-15', 'superadmin', '1251212'),
(1339, 'Dilip Hazra ', 'dilip@mail.com', '9830612526', '452132', '7 K.P. Roy Lane, Kol-78', '2017-05-15', 'superadmin', '125132'),
(1340, 'R.Shaw ', 'r@mail.com', '9062070435', '4524213', '66/2, Selimpur Road, Kol-31', '2017-05-15', 'superadmin', '456362'),
(1341, 'Dharamvir Prasad', 'dharamvir@mail.com', '3324158296', '56321', '105, Selimpur Road, Kol-31', '2017-05-15', 'superadmin', '461321'),
(1342, 'Shree Ram Stores ', 'shreeram@mail.com', '9831992120', '451221', '106/D, Selimpur Road, Kol-31', '2017-05-15', 'superadmin', '45212'),
(1343, 'Nirmal Tea House', 'nirmaltea@mail.com', '9883059604', '456121', '19 R, Selimpur Road, Kol-31', '2017-05-15', 'superadmin', '5421212'),
(1344, 'Silver Ock', 'silver@mail.com', '3340086166', '456121', '12/3, Selimpur Road, Kol-31', '2017-05-15', 'superadmin', '155322'),
(1345, 'New Dutta Brothers', 'newduttabrothers@mail.com', '8697316124', '4536123', 'Goria Hat Road, Kol-31', '2017-05-15', 'superadmin', '456121'),
(1346, 'Dutta Stores ', 'dutta@mail.com', '9831613559', '45362321', 'Goria Hat Road, Kol-31', '2017-05-15', 'superadmin', '12512013'),
(1347, 'S.Kumar', 'skumar@mail.com', '9681091917', '8652514', '118, Selimpur Road, Kol-31', '2017-05-15', 'superadmin', '5461321'),
(1348, 'Manoj Veriety Stores ', 'manojvareity@mail.com', '9831199803', '4251221', '18A, Babubagan Lane, Kol-31', '2017-05-15', 'superadmin', '4561232'),
(1349, 'Das Bhandar', 'das@mail.com', '9874442426', '8425121', '43, Dhakuria Station Road, Kol-31', '2017-05-15', 'superadmin', '5456361'),
(1350, 'Lalit Mohan Das (Bapi)', 'lalitmohan@mail.com', '8420799779', '14531221', '177, Sarat Ghosh Garden Road, Dhakuria, Kol-31', '2017-05-15', 'superadmin', '154212'),
(1351, 'Chakroborty Stores ', 'chakroborty@mail.com', '9674589719', '451321', '26A/1A/2, Jheel Road, Kol-31', '2017-05-15', 'superadmin', '455612'),
(1352, 'Bizon Stores ', 'bizon@mail.com', '9051700840', '4521212', '12/25E, Jheel Road, Kol-75', '2017-05-15', 'superadmin', '8141121'),
(1353, 'Krishna Bhandar ', 'krishna@mail.com', '9836611611', '45212132', '40 Garfa Road, Kol-75', '2017-05-15', 'superadmin', '1251421'),
(1354, 'Shaw Stores ', 'shaw@mail.com', '32214562', '5814212', 'P.G. Road, Kol-', '2017-05-17', 'superadmin', '452512'),
(1355, 'Naskar Bhandar', 'naskar@mail.com', '33225161', '8513313', 'P.G. Road, Kol-', '2017-05-17', 'superadmin', '564421'),
(1356, 'Shaw Stores ', 'shawstores@mail.com', '32321365', '45442255', 'Dharmotala Road, Kol-', '2017-05-17', 'superadmin', '5311312'),
(1357, 'Gupta Stores', 'guptastores@mail.com', '2322020', '5142133', 'Ramtegari,Kol-', '2017-05-17', 'superadmin', '513621'),
(1358, 'Dilip Gupta ', 'dilip@mail.com', '231523', '48312312', 'Ramtegari, Kol-', '2017-05-17', 'superadmin', '1502132'),
(1359, 'Sonu Stores ', 'sonustores@mail.com', '221254213', '5131223', 'Ram  tegari , Kol-', '2017-05-17', 'superadmin', '544213'),
(1360, 'Babli Stores ', 'babli@mail.com', '231210', '465512', 'Ram  Tegari, Kol-', '2017-05-17', 'superadmin', '5621321'),
(1361, 'Ashish Storres', 'ashish@mail.com', '33561211', '152221', 'Ram Tegari , Kol-', '2017-05-17', 'superadmin', '48132112'),
(1362, 'Shiv Shakti', 'shiv@mial.com', '23326521', '541421', 'Ram Tegari, Kol-', '2017-05-17', 'superadmin', '12222'),
(1363, 'Joy Hanuman Stores ', 'jh@mail.com', '2364512', '4561323', 'P.G. Road, Kol-', '2017-05-17', 'superadmin', '425251'),
(1364, 'Loknath Stores ', 'loknath@mail.com', '32545361', '4521002', 'P.G. Road, Kol-', '2017-05-17', 'superadmin', '5213546'),
(1365, 'Madan Shaw', ' madan@mail.com', '545212', '122122', 'P.G.Road, Kol-', '2017-05-17', 'superadmin', '65542'),
(1366, 'Das Brothres', 'das@mail.com', '23125122', '1212252', 'C.N.Roy Road,Kol-', '2017-05-17', 'superadmin', '121223'),
(1367, 'Ayush Stores ', 'ayush@mail.com', '231542', '212133', 'Dr. G.S. Basu Road, Kol-', '2017-05-17', 'superadmin', '2112132'),
(1368, 'M.D. Stores ', 'md@mail.com', '33265251', '4521361', 'Kustia Road, Kol-', '2017-05-17', 'superadmin', '45361'),
(1369, 'C. Chowdhury', 'c@mail.com', '45212122', '452521', 'Kustia Road. Kol-', '2017-05-17', 'superadmin', '452122'),
(1370, 'Barun Stores ', 'barun@mail.com', '33126451', '5545621', 'Kustia Road, Kol-', '2017-05-17', 'superadmin', '154321'),
(1371, 'Sunil Shaw ', 'sunil@mail.com', '2152331', '1121312', 'Kustia Road, Kol-', '2017-05-17', 'superadmin', '12131'),
(1372, 'Mohan Lal Bhandar', 'mohanlal@mail.com', '33156252', '4561321', 'Kustia Road, Kol-', '2017-05-17', 'superadmin', '456212'),
(1373, 'A.K. Gupta', 'ak@mail.com', '452122', '45251132', 'Shridhan Roy Road, Kol-', '2017-05-17', 'superadmin', '986132'),
(1374, 'Pappu Home', 'pappu@mail.com', '33153222', '452123', 'Shridhan Roy Road, Kol-', '2017-05-17', 'superadmin', '453631'),
(1375, 'Sonu Shaw ', 'sonu@mail.com', '32231441', '245121', 'Near No. 4, Bridge, Kol-', '2017-05-17', 'superadmin', '5436312'),
(1376, 'Pappu Hotel', 'pappu@mail.com', '23125421', '1541122', 'Near No.4, Bridge, Kol-', '2017-05-17', 'superadmin', '121231'),
(1377, 'Neha Stores ', 'neha@mail.com', '355452', '452512', 'Tiljala, Kol-', '2017-05-17', 'superadmin', '541253'),
(1378, 'Ganesh Stores ', 'ganesh@mail.com', '33154321', '12521', 'Bondel Market, Kol-', '2017-05-17', 'superadmin', '2125221'),
(1379, 'D.S. Gupta', 'ds@mail.com', '3561214', '452121', 'Bondel Market, Kol-', '2017-05-17', 'superadmin', '5461421'),
(1380, 'Singh Enterprise', 'singh@mail.com', '2222551', '4552132', 'Bondel Market,Kol-', '2017-05-17', 'superadmin', '482132'),
(1381, 'Raj Kumar Gupta', 'rajkumar@mail.com', '33136142', '4532121', 'Rifel Range Road, Kol-', '2017-05-17', 'superadmin', '1251023'),
(1382, 'Kapildev Shaw ', 'kapildev@mail.com', '22232142', '12332122', 'Rifel Range Road, Kol-', '2017-05-17', 'superadmin', '45221'),
(1383, 'Gopal Stores ', 'gopal@mail.com', '455321', '1254222', 'Bondel Road, Kol -', '2017-05-17', 'superadmin', '151421'),
(1384, 'Sushanto Stores ', 'sushanto@mail.com', '2542531', '452212', 'Brod Street Market, Kol-', '2017-05-17', 'superadmin', '4582132'),
(1385, 'Subola Stores ', 'subola@mail.com', '33555421', '151212', '2 G, Ballygange Palace, Kol-', '2017-05-17', 'superadmin', '2143121'),
(1386, 'Narayan Stores ', 'narayan@mail.com', '03354545', '582521', 'Ballygange, Kol-', '2017-05-17', 'superadmin', '6445211'),
(1387, 'Laxmi Narayan Stores ', 'laxminarayan@mail.com', '3315121', '452142', 'Zamir Lane, Kol-', '2017-05-17', 'superadmin', '142521'),
(1388, 'Annapurna Bhandar', 'annapurna@mail.com', '4521232', '4521422', 'Zamir Lane, Kol-', '2017-05-17', 'superadmin', '45212'),
(1389, 'New Kiran Stores ', 'newkiran@mail.com', '5464232', '452312', 'Confield Road, Kol-', '2017-05-17', 'superadmin', '452150'),
(1390, 'Grihastti ', 'grihastti@mail.com', '456121', '1420221', 'Confield Road, Kol-', '2017-05-17', 'superadmin', '13121'),
(1391, 'Baidhnath Shaw ', 'baidhnath@mail.com', '556422', '1133', 'Bondel Road, Kol-', '2017-05-17', 'superadmin', '1232531'),
(1392, 'Ganehs Stores ', 'ganesh@mail.com', '33252512', '151422', 'Bondel Road, Kol-', '2017-05-17', 'superadmin', '45212'),
(1393, 'Ganesh Stores ', 'ganesh@mail.com', '334542124', '1452121', 'Bondel Road, Kol-', '2017-05-17', 'superadmin', '1514511'),
(1394, 'Bondel Stores ', 'bondel@mail.com', '33256451', '1251323', 'Bondel Road, Kol-', '2017-05-17', 'superadmin', '121202'),
(1395, 'Lal Chand', 'lalchand@mail.com', '8454121', '1252113', 'Brod Street, Kol-', '2017-05-17', 'superadmin', '5614221'),
(1396, 'B.K. Stores ', 'bk@mail.com', '555412', '4825102', 'Brod Street, Kol-', '2017-05-17', 'superadmin', '456312'),
(1397, 'Subhas Stores ', 'subhas@mail.com', '8451232', '5943212', 'Tiljala,Kol-', '2017-05-17', 'superadmin', '45412'),
(1398, 'Ismail Stores ', 'ismail@mail.com', '4582211', '12122311', 'Tiljala, Kol-', '2017-05-17', 'superadmin', '225122'),
(1399, 'Kamala Stores', 'kamala@mail.com', '456561', '4536542', 'Park Street, Kol-', '2017-05-17', 'superadmin', '452214'),
(1400, 'Saha Stores ', 'saha@mail.com', '48121212', '121221', 'Bright Street, Kol-', '2017-05-17', 'superadmin', '151111'),
(1401, 'Shankar Shaw ', 'shankar@mail.com', '45215121', '4521231', 'Jhowtala Road, Kol-', '2017-05-17', 'superadmin', '452521'),
(1402, 'Shambhu Store ', 'sambhu@mail.com', '4522561', '121221', 'Bright Street, Kol-', '2017-05-17', 'superadmin', '125142'),
(1403, 'Copy Cat', 'copycat@mail.com', '4546121', '14512321', 'Confield Road, Kol-', '2017-05-17', 'superadmin', '8751432'),
(1404, 'Durga Stores ', 'durga@mail.com', '484251', '4582132', 'Confield Road, Kol-', '2017-05-17', 'superadmin', '45212'),
(1405, 'Ganesh Stores ', 'ganesh@mail.com', '4851425', '485212', 'South Point, Mandavila Gurd, Kol-', '2017-05-17', 'superadmin', '456321'),
(1406, 'Kalyani ', 'kalyani@mail.com', '33256411', '48551421', '11B,Rajdanga Main Road, Kol-107', '2017-05-17', 'superadmin', '456212'),
(1407, 'Daily Need', 'dailyneed@mail.com', '332564564', '48432123', 'A-34, Rajdanga, Nabopally, Kol-107', '2017-05-17', 'superadmin', '4542216'),
(1408, 'Basudev Bhandar', 'basudev@mail.com', '3325646', '7525231', 'A-32, Rajdanga, Nabopally,Kol-107', '2017-05-17', 'superadmin', '455221'),
(1409, 'Sanjeet Bhuiyasa', 'sanjeet@mail.com', '87954321', '482513', 'Rajdanga, Nabopally, Kol-107', '2017-05-17', 'superadmin', '216121'),
(1410, 'Ghosh', 'ghosh@mail.com', '332564614', '4523112', 'Rajdanga, Nabopally, Kol-107', '2017-05-17', 'superadmin', '125122'),
(1411, 'Adi Annapurna ', 'adiannapurna@mail.com', '3325421', '4665213', 'B-5, Rajdanga Nabopally, Kol-107', '2017-05-17', 'superadmin', '451231'),
(1412, 'Snow Flowar', 'snowflowar@mail.com', '33254212', '45542116', '15/7A,Bosepukur, Kol-39', '2017-05-17', 'superadmin', '4561212'),
(1413, 'Amit Dey (Ration Shop)', 'amitdey@mail.com', '33256546', '85451436', 'New Ballygange, Kol-', '2017-05-17', 'superadmin', '7854625'),
(1414, 'Titly Variety ', 'titly@mail.com', '33225132', '4521331', 'Bose Pukur,Kol-', '2017-05-17', 'superadmin', '4554981'),
(1415, 'Roy Stores ', 'roystores@mail.com', '33255432', '45812232', 'Bose Pukur,Kol-', '2017-05-17', 'superadmin', '4565462'),
(1416, 'Mira Stores ', 'mira@mail.com', '3325642', '456213', '4/2B, Dharmotala Road, Kol-42', '2017-05-17', 'superadmin', '452125'),
(1417, 'Prashadi Stores ', 'prashadi@mail.com', '33256451', '4521363', '115/23, Kusum Kumar Road, Kol-39', '2017-05-17', 'superadmin', '45221'),
(1418, 'Shantosh Shaw ', 'santosh@mail.com', '33264251', '455621', '115/20/1 B.P.Dr. G.S. Basu Road, Kol-39', '2017-05-17', 'superadmin', '695421'),
(1419, 'Rakomari ', 'rakomari@mail.com', '332641245', '45256142', '93,Dr. G.S. Bose Road, Kol-39', '2017-05-17', 'superadmin', '15612321'),
(1420, 'Kuntal', 'kuntal@mail.com', '33256421', '45212232', 'Dr. G.S. Bose Road,Kol-', '2017-05-17', 'superadmin', '4556142'),
(1421, 'Jai Maa Ta Di ', 'jaimatadi@mail.com', '33251421', '164221', 'Dr. G.S.Bose Road, Kol-', '2017-05-17', 'superadmin', '364251'),
(1422, 'Das Stores ', 'das@mail.com', '331256142', '548513', 'No. 19, Dr. G.S. Bose Road, Kol-39', '2017-05-17', 'superadmin', '6954251'),
(1423, 'Shambhu Stores ', 'shambhu@mail.com', '3325145', '452121322', 'No.104,Dr. G.S. Bose Road, Kol-39 ', '2017-05-17', 'superadmin', '5963614'),
(1424, 'Om Namah Shivay ', 'omnamahshivay@mail.com', '3325141465', '5581421', '42/16, Baliadanga, Baliadanga 2nd lane, Kol-39', '2017-05-17', 'superadmin', '36121'),
(1425, 'Deepak Stores ', 'deepak@mail.com', '3325152122', '63512112', '11/L, Dr. G.S. Bose Road, Kol-39', '2017-05-17', 'superadmin', '4521361'),
(1426, 'Shima Stores ', 'shima@mail.com', '33565642', '84564361', '26/A, Baliadanga 2nd Lane,Kol-39', '2017-05-17', 'superadmin', '456132'),
(1427, 'D.D. Gupta', 'dd@mail.com', '33256421', '45213602', 'Baliadanga, Rail Gate, Kol-', '2017-05-17', 'superadmin', '4874521'),
(1428, 'Maa Kali Stores ', 'maakali@mail.com', '5612423', '45232132', '211,P.G.Road, Kol-39', '2017-05-17', 'superadmin', '45212'),
(1429, 'Paul Stores ', 'paulstore@mail.com', '895436132', '4521325', 'Bondel Road, Kol-', '2017-05-17', 'superadmin', '561421'),
(1430, 'Gulam Anwar', 'gulam@mail.com', '45258251', '15122251', '50,B.Ballygange Circular Road, Kol-', '2017-05-17', 'superadmin', '5646121'),
(1431, 'Laxmi Narayan ', 'laxminarayan@mail.com', '2512312', '45932131', 'Lansdown, Opp. Amantron,Kol-', '2017-05-17', 'superadmin', '4821131'),
(1432, 'Koilash', 'koilash@mail.com', '25425336', '4525312', 'Bottala, Kol-', '2017-05-17', 'superadmin', '45313121'),
(1433, 'Shiv Bhandar', 'shiv@mail.com', '49821321', '1522132', 'Motilal Nehru Road, Kol-', '2017-05-17', 'superadmin', '6542524'),
(1434, 'H.L. Nando Kishore', 'hlnandokishore@mail.com', '3315612', '4551322', 'Ritchi Road,Kol-', '2017-05-17', 'superadmin', '4566121'),
(1435, 'Ashok Shaw ', 'ashok@mail.com', '5614324', '1251421', 'Panditiya,Kol-', '2017-05-17', 'superadmin', '5465421'),
(1436, 'Shivaji ', 'shivaji@mail.com', '65451213', '65984212', 'Hazra Road, Kol-', '2017-05-17', 'superadmin', '654582122'),
(1437, 'Shankar Stores ', 'shankar@mail.com', '984512', '452133', 'Dover place, Kol-', '2017-05-17', 'superadmin', '5525552'),
(1438, 'Shree Hari Bhandar', 'shreehari@mail.com', '99665513', '453213', 'Dover Palce, Kol-', '2017-05-17', 'superadmin', '645142'),
(1439, 'S.C.Maity ', 'scmaity@mail.com', '335612122', '48212122', 'Dover Place, Kol-', '2017-05-17', 'superadmin', '6851421'),
(1440, 'Samanto ', 'samanto@mail.com', '3356452456', '45282512', 'Doverplace, Kol-', '2017-05-17', 'superadmin', '61451421'),
(1441, 'Das Stores ', 'das@mail.com', '332564251', '4578512', 'Dover place,Kol-', '2017-05-17', 'superadmin', '254215658'),
(1442, 'Kiran Stores ', 'kiran@mail.com', '3325645412', '4842321', 'M.P. Road, Kol-', '2017-05-17', 'superadmin', '4521212'),
(1443, 'Shekhar Shaw ', 'shekhar@mail.com', '033264321', '48363121', 'M.P. Road, Kol-', '2017-05-17', 'superadmin', '14582132'),
(1444, 'Om Prakash Shaw ', 'omprakash@mail.com', '452143321', '482122', 'Panditiya, Kol-', '2017-05-17', 'superadmin', '3652512');
INSERT INTO `td_client` (`cl_id`, `clname`, `clemail`, `clphn`, `clpan`, `cladd`, `addate`, `adby`, `cgst`) VALUES
(1445, 'Bose Brothers ', 'bose@mail.com', '33264254', '48212322', 'M.P. Road, Kol-', '2017-05-17', 'superadmin', '685612'),
(1446, 'Nath Stores', 'nath@mail.com', '33256426', '49846465', 'M.P. Road, Kol-', '2017-05-17', 'superadmin', '15425143'),
(1447, 'Sudhamay  Bhandar', 'sudhamay@mail.com', '331542121', '4589431', 'Panditiya,Kol-', '2017-05-17', 'superadmin', '4821312'),
(1448, 'Rana Stores ', 'rana@mail.com', '33255454', '48223123', 'M.P. Road,Kol-', '2017-05-17', 'superadmin', '482132'),
(1449, 'Haripado Maity ', 'haripadomaity@mail.com', '5564213', '48421231', 'Doverplace, Kol-', '2017-05-17', 'superadmin', '4821121'),
(1450, 'Bhola Shaw ', 'bholashaw@mail.com', '48756541', '45212122', '8/A, Goria Hat Road, Kol-', '2017-05-17', 'superadmin', '975214221'),
(1451, 'Shashi General Stores ', 'shashigeneral@mail.com', '331256421', '851431', 'Panditiya, Kol-', '2017-05-17', 'superadmin', '221233'),
(1452, 'Sarkar Brother', 'sarkar@mail.com', '33256464', '4543232', 'Panditiya, Kol-', '2017-05-17', 'superadmin', '1254212'),
(1453, 'S.K. Hazra', 'skhazra@mail.com', '33264212', '4846143', 'Panditiya, Kol-', '2017-05-17', 'superadmin', '68542142'),
(1454, 'Sanchita ', 'sanchita@mail.com', '33264564', '78212322', 'M.P. Road, Kol-', '2017-05-17', 'superadmin', '642124'),
(1455, 'Laxmi Prasad ', 'laxmiprasad@mail.com', '335421213', '48251231', 'Lansdown Market, Kol-', '2017-05-17', 'superadmin', '4852131'),
(1456, 'S.N. Roy', 'snroy@mail.com', '331642122', '48213231', 'Lansdown Market, Kol-', '2017-05-17', 'superadmin', '685123'),
(1457, 'Annapurna Bhandar ', 'annapurna@mail.com', '3315142654', '145201212', 'Lansdown Market, Kol-', '2017-05-17', 'superadmin', '6851421'),
(1458, 'Saran Stores ', 'saran@mail.com', '335542426', '484323', 'Lansdown, Kol-', '2017-05-17', 'superadmin', '12513213'),
(1459, 'M.M.Stores ', 'mm@mail.com', '33568424', '69441431', 'Lansdown, Kol-', '2017-05-17', 'superadmin', '698564'),
(1460, 'Bhawani Stores ', 'bhawani@mail.com', '5564314251', '022412521', 'Ritchi Road, Kol-', '2017-05-17', 'superadmin', '942121'),
(1461, 'S.N. Stores ', 'snstores@mail.com', '33251441122', '45458212', 'Ritchi Road, Kol-', '2017-05-17', 'superadmin', '61512143'),
(1462, 'Satinath Stores ', 'satinath@mail.com', '6352122', '45201310', 'Rajdanga, Kol-', '2017-05-17', 'superadmin', '9654321'),
(1463, 'Arjun Shaw ', 'arjunshaw@mail.com', '03323223', '45212132', 'Naskarhat, Dakshinpara,Kol-', '2017-05-18', 'superadmin', '4522321'),
(1464, 'Shree  Chandi Bhandar', 'shreechandi@mail.com', '332525421', '45583212', 'Goria Hat Market, Kol-', '2017-05-18', 'superadmin', '452123'),
(1465, 'Megha Rani', 'megharani@mail.com', '33564214', '4222214', 'Goria Hat Market, Kol-', '2017-05-18', 'superadmin', '5462132'),
(1466, 'Ganesh Bhandar ', 'ganesh@mail.com', '33551242', '452132', 'Goria Hat Market, Kol-', '2017-05-18', 'superadmin', '15525132'),
(1467, 'Yashin Mondal', 'yashin@mail.com', '33264321', '4522132', 'Goria Hat Market, Kol-', '2017-05-18', 'superadmin', '452131'),
(1468, 'Tarok Bhandar', 'tarok@mail.com', '31235251', '1451213', 'Goria Hat Market, Kol-', '2017-05-18', 'superadmin', '12112131'),
(1469, 'New D.K. Bhandar', 'dk@mail.com', '31252132', '4525211', 'Goria Hat Market, Kol-', '2017-05-18', 'superadmin', '5456321'),
(1470, 'Sabitree ', 'sabitree@mail.com', '54262513', '45251645', 'Goria Hat Market, Kol-', '2017-05-18', 'superadmin', '452132'),
(1471, 'Kali Bhandar', 'kali@mail.com', '4561323', '4522133', 'Goria Hat Market,Kol-', '2017-05-18', 'superadmin', '4522123'),
(1472, 'Laxmi Narayan ', 'laxminarayan@mail.com', '22155322', '45212361', 'Goria Hat Market, Kol-', '2017-05-18', 'superadmin', '8565113'),
(1473, 'Gourango Bhandar ', 'gourango@mail.com', '0332546121', '89436121', 'Goria Hat Market, Kol-', '2017-05-18', 'superadmin', '4563213'),
(1474, 'Dashokarma Bhandar', 'dashokarma@mail.com', '3325542136', '456113133', 'Goria Hat Market, Kol-', '2017-05-18', 'superadmin', '45613132'),
(1475, 'Lakhi Annapurna Bhandar', 'lakhiannapurna@mail.com', '331256142', '452212', 'Goria Hat Market, Kol-', '2017-05-18', 'superadmin', '312121'),
(1476, 'Maa Laxmi Bhandar ', 'maalaxmi@mail.com', '3358511312', '4561333564', 'Goria Hat Market, Kol-', '2017-05-18', 'superadmin', '455213112'),
(1477, 'Gita Bhadnar ', 'gita@mail.com', '332512156', '456212312', 'Kankulia, Kol-', '2017-05-18', 'superadmin', '4853132'),
(1478, 'Agarwal', 'agarwal@mail.com', '2536214', '45213223', 'Kakulia, Kol-', '2017-05-18', 'superadmin', '482123'),
(1479, 'Gobindo Bhandar', 'gobindo@mail.com', '334515612', '452352155', 'Kakulia,Kol-', '2017-05-18', 'superadmin', '15432232'),
(1480, 'Mahamaya ', 'mahamaya@mail.com', '23365442', '452130212', 'Kankulia,Kol-\r\n', '2017-05-18', 'superadmin', '4821233'),
(1481, 'Kanaiya', 'kanaiya@mail.com', '331513142', '4522133', 'Kakuliya, Kol-', '2017-05-18', 'superadmin', '452213'),
(1482, 'Basant Shaw ', 'basant@mail.com', '334643213', '48223133', 'Kankuliya,Kol-', '2017-05-18', 'superadmin', '1514223'),
(1483, 'Laxmi Stores ', 'laxmi@mail.com', '45322133', '482132312', 'Dhakuria, Kol-', '2017-05-18', 'superadmin', '45922132'),
(1484, 'Ratan Stores ', 'ratan@mail.com', '33456861', '4589216', 'Panchanantala, Kol-', '2017-05-18', 'superadmin', '4821313'),
(1485, 'Chirosathi', 'chirosathi@mail.com', '33456432', '4821312', 'Dhakuria, Kol-', '2017-05-18', 'superadmin', '68512123'),
(1486, 'Mona Variety ', 'mona@mail.com', '55142362', '482132', 'Dhakuria, Kol-', '2017-05-18', 'superadmin', '694313'),
(1487, 'Asha Stores ', 'asha@mail.com', '45822213', '1452212', 'Keyatala, Kol-', '2017-05-18', 'superadmin', '36421612'),
(1488, 'S.Stores ', 'sstores@mail.com', '45223213', '4521362', 'Keyatala, Kol-', '2017-05-18', 'superadmin', '456213'),
(1489, 'Majumder Stores ', 'majumder@mail.com', '4525212', '455813', 'Keyatala, Kol-', '2017-05-18', 'superadmin', '452213'),
(1490, 'J.K. Stores ', 'jk@mail.com', '45236132', '1560213', 'Keyatala, Kol-', '2017-05-18', 'superadmin', '846143'),
(1491, 'Santosh Stores ', 'santosh@mail.com', '331256132', '45222312', 'Keyatala, Kol-', '2017-05-18', 'superadmin', '4821233'),
(1492, 'Ram Krishna ', 'ramkrishna@mail.com', '33554282', '455213', 'Keyatala,Kol-', '2017-05-18', 'superadmin', '485221'),
(1493, 'Bajrangballi', 'bajrangballi@mail.com', '54525613', '4582223', 'Khitro Ghosh Market, Kol-', '2017-05-18', 'superadmin', '483213'),
(1494, 'Radha Gobindo ', 'radhagobindo@mail.com', '4523221', '45213123', 'Khitro Ghosh Market, Kol-', '2017-05-18', 'superadmin', '8142521'),
(1495, 'Maa Santoshi ', 'maasantoshi@mail.com', '31254321', '4526132', 'Khitro Ghosh Market, Kol-', '2017-05-18', 'superadmin', '5313123'),
(1496, 'Shambhu ', 'sambhu@mail.com', '45621313', '45133133', 'Bhawanipur,Kol-', '2017-05-18', 'superadmin', '4582133'),
(1497, 'Ganesh Bhandar', 'ganesh@mail.com', '4854212', '4821333', 'Ladies park, Kol-', '2017-05-18', 'superadmin', '4582221'),
(1498, 'Birendar ', 'birendar@mail.com', '33162556', '458213', 'Ladies park, Kol-', '2017-05-18', 'superadmin', '635451'),
(1499, 'Ambey Stores ', 'ambey@mail.com', '45213633', '4521332', 'Girish Mukherjee Road, Kol-', '2017-05-18', 'superadmin', '485213'),
(1500, 'K.C. Bhandar ', 'kcbhandar@mail.com', '63154213', '45025436', 'Jagu Bazar, Kol-', '2017-05-18', 'superadmin', '85142323'),
(1501, 'Santosh Stores ', 'santosh@mail.com', '33457825', '4536213', 'Chakrobaria, Kol-', '2017-05-18', 'superadmin', '4825321'),
(1502, 'Binod  Stores ', 'binod@mail.com', '33256464', '422241361', 'Chakroberia, Kol-', '2017-05-18', 'superadmin', '9851431'),
(1503, 'D. Mondal', 'dmondal@mail.com', '55161323', '5811253123', 'Paddopukur, Kol-', '2017-05-18', 'superadmin', '81425231'),
(1504, 'Brojnanda  Stores', 'brojnanda@mail.com', '9831998050', '8943122', '239, Bidhan Nagar, P.G. Road, Kol-39', '2017-05-18', 'superadmin', '456213'),
(1505, 'Bishnu Das', 'bishnu@mail.com', '9239772403', '45221123', 'VIP Bazar, P.G. Road, Kol-39', '2017-05-18', 'superadmin', '752521'),
(1506, 'Maa Laxmi Bhandar ', 'maalaxmi@mail.com', '9831546727', '75222312', '12/1A/42, Chowbaga Road, P.S & P.O. Tiljala, Kol-39', '2017-05-18', 'superadmin', '452013'),
(1507, 'Anmol', 'anmol@mailc.com', '033255521', '8514322', 'VIP By-Pass, Chowbaga, 357, Panchannogram, Kol-39', '2017-05-18', 'superadmin', '2512522'),
(1508, 'Kiran Shaw ', 'kiran@mail.com', '33246564', '4521233', '247, Panchannogram, Chowbaga,Kol-39', '2017-05-18', 'superadmin', '4522112'),
(1509, 'Ranjit Stores ', 'ranjit@mail.com', '9748490774', '452123212', '8/2A/1B, Chowbaga Road, Kol-39', '2017-05-18', 'superadmin', '458212'),
(1510, 'Shambhu Stores ', 'sambhu@mail.com', '3354251451', '845613', '15A/12, Chowbaga Road, Kol-39', '2017-05-18', 'superadmin', '15142'),
(1511, 'Shasti Karmaokar', 'shasti@mail.com', '33151421', '8143221', 'Shiv Mandir Bazar, 111, C.N. Roy Road, Kol- 39', '2017-05-18', 'superadmin', '6421313'),
(1512, 'Krishan Lal Shaw', 'krishanlal@mail.com', '331514521', '42021323', '111, C.N.Roy Road, Opp. Shiv Mandir Bazar, Kol-39', '2017-05-18', 'superadmin', '4252112'),
(1513, 'Shankar Stores ', 'shankar@mail.com', '33146432', '4521331', '111, C.N. Roy Road, Shiv Mandir Bazar, Kol-39', '2017-05-18', 'superadmin', '8420213'),
(1514, 'Bhola Shaw ', 'bhola@mail.com', '331251422', '845123212', 'Topsia, Kol-', '2017-05-18', 'superadmin', '942522'),
(1515, 'S.K. Stores ', 'sk@mail.com', '33151211', '4522213', 'P.G. Road, Kol-', '2017-05-18', 'superadmin', '625511'),
(1516, 'Sweety Stores ', 'sweety@mail.com', '3125213', '4821223', 'P.G. Road, Kol-', '2017-05-18', 'superadmin', '9131231'),
(1517, 'Kumod Stores ', 'kumod@mail.com', '36151321', '8451323', 'P.G. Road, 3rd Lane, Kol-', '2017-05-18', 'superadmin', '4825231'),
(1518, 'Joy Mata Di', 'joymatadi@mail.com', '33150242', '455613361', 'C.N. Roy Road, Kol- 39', '2017-05-18', 'superadmin', '455661'),
(1519, 'Basudev Bhandar ', 'basudev@mail.com', '331541642', '5452212', '10/4, C.N. Roy Road, Kol-39', '2017-05-18', 'superadmin', '4523133'),
(1520, 'Shiv Bhandar ', 'shiv@mail.com', '23154333', '4562231', '3/30F, Sapgachi, 2nd Lane, Kol-39', '2017-05-18', 'superadmin', '35452132'),
(1521, 'Keya Variety', 'keyavariety@mail.com', '384121321', '84622131', '37/1, C.N. Roy Pur,Kol -39', '2017-05-18', 'superadmin', '6325421'),
(1522, 'Raja Stores ', 'raja@mail.com', '331514561', '7854312', '44, C.N.Roy Road, Near Tiljala PS, Kol-39', '2017-05-18', 'superadmin', '452321'),
(1523, 'Ganesh Stores ', 'ganesh@mail.com', '33456131', '7832213', '44/4A/12, C.N.Roy, Tiljala P.S. Kol-39', '2017-05-18', 'superadmin', '4561322'),
(1524, 'K.P. Gupta', 'kp@mail.com', '45621312', '4532221', '3 A-C-C.N.Roy Road, Kol-39', '2017-05-18', 'superadmin', '4520223'),
(1525, 'Anil Kr. Shaw ', 'anil@mail.com', '3856231', '45252323', '3A-C-C.N.Roy Road, Kol-39', '2017-05-18', 'superadmin', '6925131'),
(1526, 'Chirag ', 'chirag@mail.com', '5561311', '4521323', 'Colony Market, P.G. Road, Kol-39', '2017-05-18', 'superadmin', '4523123'),
(1527, 'Ambey Stores ', 'ambey@mail.com', '33125642', '4522123', 'Colony Market, P.G.Road, Kol-39', '2017-05-18', 'superadmin', '4533112'),
(1528, 'Jagadish ', 'jagadish@mail.com', '331521312', '45362123', 'Colony Market, P.G. Road, Kol-39', '2017-05-18', 'superadmin', '4523613'),
(1529, 'Annapurna Bhadnar', 'annapurna@mail.com', '33154138', '4522313', '143/86, P.G.Road, Colony Market, Kol-39', '2017-05-18', 'superadmin', '9313132'),
(1530, 'Ranjit Stores', 'ranjit@mail.com', '33521214', '45213123', '143/86, P.G. Road, Colony Market,Kol-39', '2017-05-18', 'superadmin', '8554321'),
(1531, 'Saha Sweets ', 'sahasweets@mail.com', '452231213', '4521322', 'South Purbachal, Near Mondal Para Bazar, By-Pass Connector, Janopriyo, Kol-', '2017-05-18', 'superadmin', '814231'),
(1532, 'Shjankar Stores ', 'shankar@mail.com', '3325613142', '75133212', 'Janopriyo, By-pass Connector, Near Shitala Mandir, Dakshin Purbachal, Kol-', '2017-05-18', 'superadmin', '98531321'),
(1533, 'Roy Stores ', 'roystores@mail.com', '45022310', '78222131', 'Janopriyo Bazar, By-Pass Connector, Near Shitala Mandir, Dakshin Purbachal, Kol-', '2017-05-18', 'superadmin', '744231232'),
(1534, 'Ram Thakur', 'ramthakur@mail.com', '33456243', '45222312', 'Janopriyo Bazar, By-Pass Connector, Near Shitala Mandir, Dakshin Purbachl, Kol-', '2017-05-18', 'superadmin', '4522321'),
(1535, 'Sachin Stores', 'sachin@mail.com', '33151211', '4501323', 'Janopriyo Bazar, By-Pass Connector, Near Shitala Mandir, Dakshin Purbachal,Kol-', '2017-05-18', 'superadmin', '482132'),
(1536, 'Annapurna Bhandar', 'annapurna@mail.com', '45214532', '152213', 'Near Avishikta, Kol-', '2017-05-18', 'superadmin', '961323'),
(1537, 'Balaka ', 'balaka@mail.com', '4822133', '14522133', 'P.Majumder Road.Kol-', '2017-05-18', 'superadmin', '1451231'),
(1538, 'Ocean Mart ', 'oceanmart@mail.com', '33152122', '7522531', 'P.Majumder Road, Kol-', '2017-05-18', 'superadmin', '1543623'),
(1539, 'Maloti Stores', 'maloti@mail.com', '3315213', '452132', 'P.Majumde Road, Kol-', '2017-05-18', 'superadmin', '4523231'),
(1540, 'Bapi Enterprise', 'bapi@mail.com', '48213232', '1481331', 'P.Majumder Road, Kol-', '2017-05-18', 'superadmin', '56213'),
(1541, 'Subaol Stores', 'subol@mail.com', '45213325', '4522133', 'P.Majumder Road, Kol-', '2017-05-18', 'superadmin', '45123123'),
(1542, 'Kanak Stores ', 'kanak@mail.com', '4521232', '456223', 'P.Majumder Road, Kol-', '2017-05-18', 'superadmin', '452133'),
(1543, 'Santoshi Bhandar', 'santohi@mail.com', '4521313', '45232123', 'Ramlal Bazar, Kol-', '2017-05-18', 'superadmin', '45313332'),
(1544, 'Manju Stores ', 'manju@mail.com', '4582123', '1013103', 'Ramlal Bazar', '2017-05-18', 'superadmin', '813232'),
(1545, 'Subash Da', 'subash@mail.com', '4562212', '4522322', 'Ramlal Bazar, Kol-', '2017-05-18', 'superadmin', '81221313'),
(1546, 'Shree Hari Bhandar ', 'shreehari@mail.com', '45223323', '85456233', 'Ramlal Bazar, Kol-', '2017-05-18', 'superadmin', '92132331'),
(1547, 'Ganesh Stores ', 'ganesh@mail.com', '4525213', '81212333', 'Ramlal Bazar, Kol-', '2017-05-18', 'superadmin', '612221'),
(1548, 'Shree Durga Bhandar', 'shreedurga@mail.com', '4563613', '5425323', 'Near Ramlal Bazar, Kol-', '2017-05-18', 'superadmin', '4522312'),
(1549, 'B.D.Enterprise', 'bdenterprise@mail.com', '52132313', '45463235', 'Purbachal, Kol-', '2017-05-18', 'superadmin', '82514332'),
(1550, 'Loknath Enterprise', 'loknath@mail.com', '56132312', '4452123', '229, Purbachal Main Road, Kol-', '2017-05-18', 'superadmin', '6143102'),
(1551, 'Annapurna Bhandar', 'annapurna@mail.com', '4522233', '7532132', 'Purbachal, Kol-', '2017-05-18', 'superadmin', '452133'),
(1552, 'Anjali Variety', 'anjalivariety@mail.com', '45223213', '4523133', 'Purbachal, Kol-', '2017-05-18', 'superadmin', '452231'),
(1553, 'Sanjog ', 'sanjog@mail.com', '45522323', '5461302', 'Purbachal, Kol-', '2017-05-18', 'superadmin', '8425232'),
(1554, 'Ram Thakur', 'ramthakur@mail.com', '4562231', '8943123', 'Purbachal, Kol-', '2017-05-18', 'superadmin', '6463233'),
(1555, 'Shree Dev Bhandar', 'shreedev@mail.com', '4812133', '8213333', 'Mohan Bridge, Kol-', '2017-05-18', 'superadmin', '5456612'),
(1556, 'Tanay Stores ', 'tanay@mail.com', '58213133', '8545313', 'Kalikapur, Kol-', '2017-05-18', 'superadmin', '646323'),
(1557, 'Sasthi', 'sasthi@mail.com', '85545313', '64313', 'Kalikapur, Mohan Bridge, Kol-', '2017-05-18', 'superadmin', '64314562'),
(1558, 'Umesh Shaw ', 'umesh@mail.com', '85425213', '6314513', 'Kalikapur, Mohan Bridge, Kol-', '2017-05-18', 'superadmin', '74512322'),
(1559, 'Nandy Stores ', 'nandy@mail.com', '78514312', '48223', 'Narkelbagan,Kol-', '2017-05-18', 'superadmin', '5143233'),
(1560, 'R N R', 'rnr@mail.com', '033125614', '8451213', 'Kalitala Road, Kol-', '2017-05-19', 'superadmin', '4513212'),
(1561, 'Maa Kali ', 'maakali@mail.com', '33154613', '84514313', 'Kalitala Road, Kol-', '2017-05-19', 'superadmin', '9142132'),
(1562, 'Das Rice & Sons', 'dasrice@mail.com', '2312363', '5463623', 'Kalitala Road, Kol- ', '2017-05-19', 'superadmin', '8133312'),
(1563, 'Devi Stores ', 'devi@mail.com', '331513232', '7454133', 'Purbachal, Kol-', '2017-05-19', 'superadmin', '936131'),
(1564, 'New Dey Variety ', 'newdeyvariety@mail.com', '331521433', '452132', 'Pagli Math, Kol-', '2017-05-19', 'superadmin', '983132'),
(1565, 'Shree Krishna Stores ', 'shreekrishna@mail.com', '33152132', '458123212', 'Paglimath, Kol-', '2017-05-19', 'superadmin', '943133211'),
(1566, 'Anandam ', 'anandam@mail.com', '23355132', '456132', 'Kayosto Para,Kol-', '2017-05-19', 'superadmin', '843613'),
(1567, 'Durga Stores ', 'durga@mail.com', '331261432', '4513233', 'Kayostopara,Kol-', '2017-05-19', 'superadmin', '4561232'),
(1568, 'Sanjivan Bhandar ', 'sanjivan@mail.com', '23355132', '45323213', 'Kayostopara, Kol-', '2017-05-19', 'superadmin', '455823'),
(1569, 'Chowdhury Stores ', 'chowdhury@mail.com', '45122323', '1512333', 'Ruby park, Opp. D.P.S Haltu, Kol-', '2017-05-19', 'superadmin', '452133'),
(1570, 'Radha Stores ', 'radha@mail.com', '23352546', '456623', 'School Road, Kol-', '2017-05-19', 'superadmin', '541333'),
(1571, 'Shree Krishna Stores ', 'shreekrishna@mail.com', '33161432', '44563231', 'School Road, Kol-', '2017-05-19', 'superadmin', '453613'),
(1572, 'Rohit Variety ', 'rohitvariety@mail.com', '335616221', '4532133', 'School Road, Kol-', '2017-05-19', 'superadmin', '1453133'),
(1573, 'Chobi Stores ', 'chobi@mail.com', '23211463', '4542213', 'School Road, Kol-', '2017-05-19', 'superadmin', '456323'),
(1574, 'Goswami Bhandar', 'goswami@mail.com', '3326463231', '45132362', 'Garfa Main Road, Kol-', '2017-05-19', 'superadmin', '455133321'),
(1575, 'Mukherjee Stores ', 'Mukherjee@mail.com', '33155312', '4521222214', 'Mondal para , Kol-', '2017-05-19', 'superadmin', '4533253212'),
(1576, 'Bahini Stores ', 'bahini@mail.com', '152212213', '452213623', 'Mondalpara, Kol-', '2017-05-19', 'superadmin', '936125132'),
(1577, 'Nilu Stores ', 'nilu@mail.com', '3325614312', '442131233', ' Mondal Para,Kol', '2017-05-19', 'superadmin', '14331313'),
(1578, 'Bharat  Pual', 'bharat@mail.com', '222324362', '4563623', 'Mondal Para, hospital Roa,Kol-', '2017-05-19', 'superadmin', '4522312'),
(1579, 'Tinku ', 'tinku@mail.com', '33154366', '452133525', 'Mondalpara, Kol-', '2017-05-19', 'superadmin', '452133132'),
(1580, 'Pratidin ', 'pratidin@mail.com', '4536123', '48221333', 'Mondalpara, Kol-', '2017-05-19', 'superadmin', '4852331'),
(1581, 'R.Stores ', 'rstores@mail.com', '45566123', '15135333', 'Mondalpara,Kol-', '2017-05-19', 'superadmin', '5143221'),
(1582, 'Classic Stores', 'classic@mail.com', '45213362', '455212', 'Purbachal, Kol-', '2017-05-19', 'superadmin', '4821331'),
(1583, 'Robin Stores ', 'robin@mail.com', '223462533', '45223123', 'Kalitala,Kol-', '2017-05-19', 'superadmin', '4123231'),
(1584, 'Prem Prajapati', 'premprajapati@mail.com', '33264364', '45252213', 'Jagatipota, Kol-', '2017-05-20', 'superadmin', '45213331'),
(1585, 'S.N. Yadav', 'snyadav@mail.com', '9883136461', '452513232', '5/4, Jagatipota, P.S. Sonarpur, Kol-152', '2017-05-20', 'superadmin', '4521312'),
(1586, 'Das Bhandar (Anil Das)', 'das@mail.com', '9831388002', '45563122', '                                Jagatipota, Udayan Pally, P.S. Sonarpur, Kol-                                ', '2017-05-20', 'superadmin', '452132'),
(1587, 'Santu Debnath', 'santudebnath@mail.com', '9163046230', '42525313', '330, Bhagwanpur Main Road, P.S. Sonarpur, Kol-152', '2017-05-20', 'superadmin', '4825231'),
(1588, 'Chandan Stores ', 'chandan@mail.com', '9831095288', '4521361', '330,Bhagwanpur Road, Sonarpur, Kol-152', '2017-05-20', 'superadmin', '1452212'),
(1589, 'Mahato Stores ', 'mahato@mail.com', '8420757692', '485223123', 'Jagatipota, P.S. Sonarpur,Kol-152', '2017-05-20', 'superadmin', '7522358232'),
(1590, 'Sabita Bhandar', 'sabita@mail.com', '9831277210', '4523216133', '75, A.Ahallya Nagar, P.S.Purba Jadovpur, Kol-', '2017-05-20', 'superadmin', '48143112'),
(1591, 'Das Stores', 'das@mail.com', '9831636656', '458222321', 'Jagatipota, P.S. Sonarpur, Kol-152', '2017-05-20', 'superadmin', '45821311'),
(1592, 'Majhi Stores ', 'majhi@mail.com', '9051135993', '452325312', 'Jagatipota, P.S. Sonarpur, Kol-152', '2017-05-20', 'superadmin', '45213112'),
(1593, 'Haripada Stores ', 'haripada@mail.com', '7605878306', '785625132', 'Jagatipota,P.S. Sonapur, Kol-152', '2017-05-20', 'superadmin', '48122213'),
(1594, 'Koyel Stores ', 'koyel@mail.com', '9836963480', '75825133', 'Jagatipota,P.S. Sonarpur, Kol-152', '2017-05-20', 'superadmin', '151323132'),
(1595, 'Kamal Stores ', 'kamal@mail.com', '7890384630', '45225212', '6B/18, Mukundopur,Kol-99', '2017-05-20', 'superadmin', '463133'),
(1596, 'Ishika Stores ', 'ishika@mail.com', '9903468310', '452531321', '6/B/67,Mukundopur, Kol-99', '2017-05-20', 'superadmin', '452312'),
(1597, 'Sathi Stores ', 'sathi@mail.com', '9903849896', '458223103', '6/6, 23 Mukundopur, Kol-99', '2017-05-20', 'superadmin', '4522131'),
(1598, 'Dutta Vareity Stores ', 'duttavareity@mail.com', '8420408353', '45621145', '260, Rumjum Math, Atth Ghara, New Market, P.S. Sonarpur, Kol-51', '2017-05-20', 'superadmin', '4525313'),
(1599, 'Rakomari Stores ', 'rakomari@mail.com', '9748488199', '452322132', 'Atth Ghara,Sukando Park, P.S.Sonarpur, Rumjum Math, Kol-51', '2017-05-20', 'superadmin', '453312'),
(1600, 'Ram Krishna Bhandar', 'ramkrishna@mail.com', '9831487180', '48221331', '121, Rumjum Park,Kol-51', '2017-05-20', 'superadmin', '1452651'),
(1601, 'Sova Rani Stores ', 'sovarani@mail.com', '9830950858', '45521212', '3A Rumjum Park,Kol-51', '2017-05-20', 'superadmin', '4582132'),
(1602, 'Ranjan Maitra', 'ranjan@mail.com', '8232059255', '4563161', 'Atth Ghara, Surya Sen Park, Kol-51', '2017-05-20', 'superadmin', '4821321'),
(1603, 'Ram Stores ', 'ram@mail.com', '8583055019', '453233231', 'Kishan Market, Jagatipota, Kol-152', '2017-05-20', 'superadmin', '4852133'),
(1604, 'Laxmi Bhandar', 'laxmi@mail.com', '9163875741', '78525213', 'Kishan Market, Shop no. 21, 22 Jagatipota, Kol-152', '2017-05-20', 'superadmin', '45321312'),
(1605, 'Biswas Variety ', 'biswasvariety@mail.com', '9836560218', '78533121', '5/50, Jagatipota, Kishan Market, Kol-152', '2017-05-20', 'superadmin', '6856132'),
(1606, 'Kamala Bhandar', 'kamala@mail.com', '9831925080', '841312312', '5/58, Jagatipota Road, Kishan Market, Kol-152', '2017-05-20', 'superadmin', '458232123'),
(1607, 'Geeta Bhandar', 'geeta@mail.com', '9804311272', '48212122', '30 A, Jamuna Nagar, Kol-99', '2017-05-20', 'superadmin', '1451221'),
(1608, 'Biswajit Variety Stores ', 'biswajitvariety@mail.com', '8697481704', '45213133', '43, Ahallya Nagar, Kol-99', '2017-05-20', 'superadmin', '45332321'),
(1609, 'Ajoy Bhandar', 'ajoy@mail.com', '8420258066', '854631231', '42, Ahallya Nagar, Kol-99', '2017-05-20', 'superadmin', '1562133'),
(1610, 'Loknath Bhandar', 'loknath@mail.com', '7890368399', '85412312', 'D/65, Jamuna Nagar, Kol-99', '2017-05-20', 'superadmin', '45252321'),
(1611, 'Bhola Shaw ', 'bholashaw@mail.com', '8479872609', '45312312', 'B/6, A Ganganagar, Kol-', '2017-05-20', 'superadmin', '151333112'),
(1612, 'New Satadal Bhandar', 'newsatadal@mail.com', '9007619197', '758233131', '7/42, Mukundopur, Kol-', '2017-05-20', 'superadmin', '12523310'),
(1613, 'S.Das', 'sdas@mail.com', '9831457664', '84333131', 'No. 1, Mukundopur, Kol-99', '2017-05-20', 'superadmin', '9613121'),
(1614, 'Paul Bhandar', 'paul@mail.com', '9903325539', '452563133', '1/78, Mukundopur, Kol-99', '2017-05-20', 'superadmin', '152331021'),
(1615, 'Mrittunjoy Stores ', 'mrittunjoy@mail.com', '7001580598', '85425132', '116, Vivekanando Park, Kol-99', '2017-05-20', 'superadmin', '65312541'),
(1616, 'Sova Stores ', 'sova@mail.com', '9051954328', '4521231', '21,Vivekanando Park, Kol-', '2017-05-20', 'superadmin', '8614311'),
(1617, 'Pappu Variety Stores ', 'pappuvariety@mail.com', '3325116312', '85423121', 'P-219/A, Ajoy Nagar, Kol-75', '2017-05-20', 'superadmin', '65311112'),
(1618, 'Annupam Bhandar', 'annupam@mail.com', '9804015166', '45363223', '148 A, Ajoy Nagar, Kol-', '2017-05-20', 'superadmin', '4523152'),
(1619, 'Khokan Ghosh', 'khokan@mail.com', '8017575474', '546211311', '52, Natunpally Boderhat, Kol-', '2017-05-20', 'superadmin', '6121213'),
(1620, 'Rohit Variety Stores ', 'rohitvariety@mail.com', '9831608866', '45232313', 'Mukundopur Bazar, Kol-', '2017-05-20', 'superadmin', '45636311'),
(1621, 'Loknath Bhandar', 'loknath@mail.com', '8334923411', '45321323', 'C/7, Mukundopur Bazar, Kol-', '2017-05-20', 'superadmin', '4825321'),
(1622, 'Fancy Stores ', 'fancy@mail.com', '3351242123', '452262132', 'Mukundopur Bazar, Kol-', '2017-05-20', 'superadmin', '63211532'),
(1623, 'Amio Bhandar', 'amio@mail.com', '9874452953', '56432212', 'B/19, Mukundopur Bazar, Kol-99', '2017-05-20', 'superadmin', '631242'),
(1624, 'Sanjoy Bhandar', 'sanjoy@mail.com', '9831812814', '4523131321', 'D/87, Dinesh Nagar, Mukundopur, Kol-99', '2017-05-20', 'superadmin', '45363121'),
(1625, 'Loknath Bhandar', 'loknath@mail.com', '9163097132', '45232121', '21,Dinesh Nagar, Kol-99', '2017-05-20', 'superadmin', '45633121'),
(1626, 'Bimal Sarkar', 'bimal@mail.com', '9836437407', '7452232', '4/16, Mukundopur, Kol-99', '2017-05-20', 'superadmin', '453123'),
(1627, 'Geeta Variety Stores ', 'geetavariety@mail.com', '9681576661', '582122315', '8/52/1, Mukundopur, Kol-99', '2017-05-20', 'superadmin', '42558123'),
(1628, 'Maa Kali Stores ', 'maakali@mail.com', '7685879836', '45825231', '4/46, Mukundopur, Kol-99', '2017-05-20', 'superadmin', '6943121'),
(1629, 'Ram Thakur Stores', 'ramthakur@mail.com', '8296268456', '82543221', '7/38, Mukundopur, Kol-99', '2017-05-20', 'superadmin', '3115432'),
(1630, 'Ayojon ', 'ayojon@mail.com', '9932819337', '4532131', '7/4, Mukundopur, Kol-99', '2017-05-20', 'superadmin', '231643'),
(1631, 'Maa Kali Bhandar', 'maakali@mail.com', '9674449972', '8542513', '1/A, Jamuna Nagar, P.S. Purba Jadovpur, Kol-99', '2017-05-20', 'superadmin', '4421213'),
(1632, 'Deb Stores ', 'deb@mail.com', '7044192691', '812223212', 'R.R.Plot, Ananda Market, Kol-107', '2017-05-20', 'superadmin', '65251411'),
(1633, 'Babu Stores ', 'babu@mail.com', '7044275047', '874252132', 'Ruby,Stall no. 75, Kol-108', '2017-05-20', 'superadmin', '56142121'),
(1634, 'Pradeep Stores ', 'pradeep@mail.com', '8335016422', '851423132', '60, South Cannel Road,P.S. Garfa, Kol-78', '2017-05-20', 'superadmin', '45363121'),
(1635, 'Preet Stores', 'preet@mail.com', '9007545808', '53210221', 'South Cannel Road,Narkel Bagan, Kol-', '2017-05-20', 'superadmin', '6341212'),
(1636, 'Namita Variety Stores ', 'namitavariety@mail.com', '8902515871', '425122141', '185, Kalitala Link Road, Kol-78', '2017-05-20', 'superadmin', '4562131'),
(1637, 'Sajal Stores ', 'sajal@mail.com', '8017149981', '482135125', '8/6C, Kalitala Link Road, Kol-78', '2017-05-20', 'superadmin', '4582212'),
(1638, 'Nirmal Variety Stores ', 'nirmalvariety@mail.com', '9674009091', '8523122', '19, Purbachal Road,North Kalital, Kol-78', '2017-05-20', 'superadmin', '45213313'),
(1639, 'Bula Stores ', 'bula@mail.com', '9830877066', '785123210', 'Kalikapur By-pass, Kol-', '2017-05-20', 'superadmin', '6854321'),
(1640, 'Mousumi Rice Shop', 'mousumirice@mail.com', '9903711276', '7582513', '18/3, Kalikapur Lohar Poll, Kol-', '2017-05-20', 'superadmin', '6534121'),
(1641, 'Ranjit Stores ', 'ranjit@mail.com', '7044170707', '85121312', '18/3, Kalikapur, Lohar Poll, Kol-', '2017-05-20', 'superadmin', '64523211'),
(1642, 'Basumati Bhandar', 'basumati@mail.com', '9163193690', '854232123', '18/1, Gitanjali Park, Kol-', '2017-05-20', 'superadmin', '81423212'),
(1643, 'Krishana Stores ', 'krishna@mail.com', '9831451432', '45821321', '88, Kayesto Para Main Road, Kol-', '2017-05-20', 'superadmin', '86143212'),
(1644, 'B.D. Enterprises', 'bdenterprise@mail.com', '9836567542', '78521312', '67, Nandi Bagan, Kol-', '2017-05-20', 'superadmin', '15122322'),
(1645, 'R. Stores ', 'rstores@mail.com', '9163319520', '896143212', '39,South Purbachal, Kol-', '2017-05-20', 'superadmin', '1512212'),
(1646, 'Joy Guru Stores ', 'joyguru@mial.com', '8620905015', '825131313', '31/A, South Purbachal, Kol-', '2017-05-20', 'superadmin', '6251421'),
(1647, 'Bharat Paul', 'bharat@mail.com', '9748565690', '845213132', '25/6, B.P.M Sarani, Kol-78', '2017-05-22', 'superadmin', '64121323'),
(1648, 'Bahini Stores ', 'bahinistores@mail.com', '8583047510', '7521322', '5 B.L. Mondal Road, Kol-78', '2017-05-22', 'superadmin', '55613211'),
(1649, 'Naborupam Stores', 'naborupam@mail.com', '9239782095', '48223212', '67/ B, Vivekanando Sarani, Kol-78', '2017-05-22', 'superadmin', '45023210'),
(1650, 'Raju Stores ', 'raju@mail.com', '9433488064', '751422225', 'Garfa Patwari Para, Kol-', '2017-05-22', 'superadmin', '4522122'),
(1651, 'Bholanath Stores ', 'bholanath@mail.com', '9831226288', '482532123', '196, Garfa, Kalikapur Road, Kol-78', '2017-05-22', 'superadmin', '455231323'),
(1652, 'Khokan Stores ', 'khokan@mail.com', '9831820137', '7856252', '64, Kalikapur Main Road, Kol-99', '2017-05-22', 'superadmin', '5542122'),
(1653, 'Chaya Stores ', 'chaya@mail.com', '331261313', '822133114', 'Kalikapur Main Road ', '2017-05-22', 'superadmin', '485113110'),
(1654, 'Mondal Stores ', 'mondal@mail.com', '9163302989', '4221312432', '18/3Kalikapur, Kol-99', '2017-05-22', 'superadmin', '966631241'),
(1655, 'Manoj Shaw', 'manojshaw@mail.com', '9831906773', '55644212', '18/3, Kalikapur, Kol-99', '2017-05-22', 'superadmin', '82130212'),
(1656, 'Annapurna Bhandar', 'annapurna@mail.com', '9836438201', '584251312', '18/2, Kalikapur, Kol-99', '2017-05-22', 'superadmin', '4545131'),
(1657, 'Rakesh Stores ', 'rakesh@mail.com', '8017252291', '9764643636', '53, Lake East 6th Road, Santoshpur, Kol-75', '2017-05-22', 'superadmin', '452231'),
(1658, 'Laltu Stores', 'laltu@mail.com', '9674045276', '894541212', 'No. 5, Bidhan Colony, Santoshpur, Kol-75', '2017-05-22', 'superadmin', '5463221'),
(1659, 'Das Variety Stores ', 'dasvariety@mail.com', '9836284774', '861413212', '6/161, Bidhan Colony,Santoshpur, Kol-75', '2017-05-22', 'superadmin', '45231331'),
(1660, 'Khokan Stores ', 'khokan@mail.com', '3345661231', '5814232', 'Santoshpur, Kol-', '2017-05-22', 'superadmin', '312561'),
(1661, 'Pakhi Stores ', 'pakhi@mail.com', '8282972794', '851332321', 'A/3, East Rajapur, Kol-', '2017-05-22', 'superadmin', '4822131'),
(1662, 'Ram Stores ', 'ram@mail.com', '9883055019', '89565331', 'Jagatipota,Kishan Market, Kol-', '2017-05-22', 'superadmin', '64213121'),
(1663, 'Matri Bhandar', 'matribhandar@mail.com', '9903512702', '7513121', '7/A, Jamunanagar, Kol-', '2017-05-22', 'superadmin', '651421'),
(1664, 'Bappa Bread ', 'bappa@mail.com', '9163069447', '7521323', 'Ruby Main Road, Kol-', '2017-05-22', 'superadmin', '4582131'),
(1665, 'Chandan  Stores ', 'chanadan@mail.com', '9831095288', '89513122', 'Jagatipota, Kol-', '2017-05-22', 'superadmin', '4362222'),
(1666, 'Bablu Stores ', 'bablu@mail.com', '7044275047', '7585612', 'Ruby Main Road, Kol-', '2017-05-22', 'superadmin', '453212'),
(1667, 'Santu Dabnath', 'santudebnath@mail.com', '33251213', '8654533231', 'Ruby', '2017-05-22', 'superadmin', '4563311'),
(1668, 'Basonti Stores ', 'basonti@mail.com', '7044274600', '4562213', 'Ruby Main Road, Kol-', '2017-05-22', 'superadmin', '6830210'),
(1669, 'Raj Kumar Stores ', 'rajkumar@mail.com', '9732653460', '45362121', 'China Mandir Bazar, Kol-', '2017-05-22', 'superadmin', '6251221'),
(1670, 'Nilkantho Stores ', 'nilkantho@mail.com', '9007999791', '75861332', 'Anandopur, Mondalpara, Kol-107', '2017-05-22', 'superadmin', '4563132'),
(1671, 'Modern Stores ', 'modern@mail.com', '7003911244', '56461251', 'Anandopur, Mondalpara, Kol-107', '2017-05-22', 'superadmin', '63445112'),
(1672, 'Putul Stores ', 'putul@mail.com', '9007671884', '84125212', 'Anandopur, Purbopara, Kol-107', '2017-05-22', 'superadmin', '62511321'),
(1673, 'Raju Stores ', 'raju@mail.com', '9748856650', '854661231', 'Anandopur Purbo para, Kol-107', '2017-05-22', 'superadmin', '63151321'),
(1674, 'Mamoni Stores ', 'mamoni@mail.com', '9088586436', '9861422', 'Anandopur, Purbopara Main Road, Kol-', '2017-05-22', 'superadmin', '4563121'),
(1675, 'Saraswati Stores ', 'saraswati@mail.com', '9874522707', '56143121', 'Jamuna Nagar, Kol-', '2017-05-22', 'superadmin', '4556311'),
(1676, 'Dilip Stores ', 'dilip@mail.com', '331561361', '86436121', 'Jamuna Nagar, Kol-', '2017-05-22', 'superadmin', '54621312'),
(1677, 'Shyamal Stores ', 'shyamal@mail.com', '33164121', '5861113', 'Jamuna Nagar, Kol-', '2017-05-22', 'superadmin', '646211'),
(1678, 'Maa Eaducation ', 'maaeducation@mail.com', '9830950858', '46251132', 'Khudirabad Main Road, Kol-', '2017-05-22', 'superadmin', '4562213'),
(1679, 'Ram Krishna Bhandar', 'ramkrishna@mail.com', '9831487180', '8211321', 'Rum Jhum Park, Kol-51', '2017-05-22', 'superadmin', '4522112'),
(1680, 'Dutta Variety Stores ', 'duttavariety@mail.com', '8420408353', '87565212', '260,Atth Ghara New Market, Kol-152 ', '2017-05-22', 'superadmin', '6852122'),
(1681, 'Satota Enterprise ', 'satotaenterprises@mail.com', '9007695210', '4563231102', 'P-62, Rum Jhum Park, Kol-152', '2017-05-22', 'superadmin', '364136211'),
(1682, 'Kamal Stores ', 'kamal@mail.com', '7890384630', '5461312', '6-B- Mukundopur, Kol-', '2017-05-22', 'superadmin', '851321'),
(1683, 'Kalpana Stores ', 'kalpana@mail.com', '33154625', '852131212', 'Mukundopur.', '2017-05-22', 'superadmin', '6547821'),
(1684, 'Anando Stores ', 'anadostores@mail.com', '335454425', '8642133', 'Mukundopur', '2017-05-22', 'superadmin', '645713'),
(1685, 'Susanto Stores ', 'susanto@mail.com', '7890757808', '54622112', 'Shahid Smirity Colony, Kol -', '2017-05-22', 'superadmin', '6324112'),
(1686, 'Tara Maa Bhandar', 'taramaa@mail.com', '9830280971', '45613123', 'S.S.Colony F/10, Kol-', '2017-05-22', 'superadmin', '4522132'),
(1687, 'Davi Maa Tara Bhandar ', 'devimaatara@mail.com', '8584922945', '65461432', 'J/10, S.S. Colony, Kol-', '2017-05-22', 'superadmin', '635122'),
(1688, 'Bishaka  Stores ', 'bishaka@mail.com', '8282943154', '7453213', 'J/2, S.S. Colony, Kol-94', '2017-05-22', 'superadmin', '635211'),
(1689, 'Paul Stores ', 'paulstores@mail.com', '9836975732', '8655442', 'M/7, S.S. Colony, Kol-', '2017-05-22', 'superadmin', '63212121'),
(1690, 'Ranu Stores ', 'ramstores@mail.com', '33251132', '854436133', 'N/6/S.S. Colony, Kol-', '2017-05-22', 'superadmin', '6351411'),
(1691, 'Raboti Stores', 'rabotistores@mail.com', '9748032606', '865455421', 'S-25, S.S. Colony, Kol-', '2017-05-22', 'superadmin', '6852251'),
(1692, 'Subho Stores ', 'subhostores@mail.com', '9836232275', '89522132', '5-20, S.S.Colony, Kol-', '2017-05-22', 'superadmin', '63542121'),
(1693, 'Nilu Shaw ', 'nilushaw@mail.com', '8981129489', '85543131', '0-9, S.S.Colony, Kol-', '2017-05-22', 'superadmin', '66354121'),
(1694, 'Shree Bhadar', 'shree@mail.com', '9163602944', '85631131', '71,Raja Subodh Chandra Mallick Road, Kol-\r\n.', '2017-05-22', 'superadmin', '6351213'),
(1695, 'Yenshrelal', 'yeshrelal@mail.com', '8336815220', '45636121', '2/81 Naktala, Kol-', '2017-05-22', 'superadmin', '65625111'),
(1696, 'Das Chowdhuri & Sons ', 'daschowdhuri&sons@mail.com', '9836397040', '854622132', 'N.S.C. Bose Road,Kol-', '2017-05-22', 'superadmin', '6314122'),
(1697, 'Sanjoy Stores ', 'sanjoystores@mail.com', '9088413264', '854521213', 'H.L.Sarkar Road, Kol-', '2017-05-22', 'superadmin', '6351211'),
(1698, 'Bijoy Stores ', 'bijoystores@mail.com', '9163112136', '8546232132', 'H.L. Sarkar Road,Kol-', '2017-05-22', 'superadmin', '864113321'),
(1699, 'Sona Stores ', 'sona@mail.com', '9903342396', '8544322', 'P/14, H.L. Sarkar Road, Kol-', '2017-05-22', 'superadmin', '6312512'),
(1700, 'Gopal Stores', 'gopal@mail.com', '9038592419', '87542122', 'P-12, Pir Pukur Road,(Jora Pukur),Kol-', '2017-05-22', 'superadmin', '9656143'),
(1701, 'Krishna Bhandar', 'krishna@mail.com', '8274811210', '845102122', 'P-42, Pir Pukur Road, Kol-', '2017-05-22', 'superadmin', '6354211'),
(1702, 'Manu Stores ', 'monustroes@mail.com', '9874124265', '895451421', 'B/24,Niranjonpally, Kol-', '2017-05-22', 'superadmin', '9654312'),
(1703, 'Pappu Stores', 'pappustores@mail.com', '8481892658', '54613131', '7/3, Vivekanando Park,Kol-', '2017-05-22', 'superadmin', '6354214'),
(1704, 'Sarwan Stores', 'sarwan@mail.com', '9748404982', '89511122', '11/3-B, Vivekanando Park, Kol-', '2017-05-22', 'superadmin', '96582101'),
(1705, 'Mama Stores ', 'mamastores@mail.com', '9073656502', '8546311', '1/25, Vivekanando Park, Kol-', '2017-05-22', 'superadmin', '36963421'),
(1706, 'D.N. Gupta', 'dngupta@mail.com', '9831667758', '875412233', '7-B, Vidyasagar park, Kol-', '2017-05-22', 'superadmin', '9632411'),
(1707, 'Mohendar Stores ', 'mohendar@mail.com', '7890557504', '854632211', 'Paul Para Bazar, Kol-', '2017-05-22', 'superadmin', '96545431'),
(1708, 'Chandan Stores ', 'chandan@mail.com', '9038916604', '854622336', '404, Paulpara Road, Kol-', '2017-05-22', 'superadmin', '8451321'),
(1709, 'Mahesh Shaw ', 'maheshshaw@mail.com', '9681913063', '89451221', 'Pirpukur Road, Kol-', '2017-05-22', 'superadmin', '9633511'),
(1710, 'Prodip Chakraborty', 'pradip@mail.com', '8981186599', '78542132', '2/6, Sarodamoni Park, Kol-', '2017-05-22', 'superadmin', '9854121'),
(1711, 'Loknath Bhandar', 'loknath@mail.com', '8272940242', '854621322', 'No.14, Saradamoni park, Kol-', '2017-05-22', 'superadmin', '98643132'),
(1712, 'Jago Shaw ', 'jagoshaw@mail.com', '9831644773', '7879646312', 'No.21, Pirpukur Road, Kol-70', '2017-05-22', 'superadmin', '9646131'),
(1713, 'Sandha Stores ', 'sandhastores@mail.com', '332542521', '456975214', 'Paul Para, Pir Pukur Road, Kol-', '2017-05-22', 'superadmin', '6945123'),
(1714, 'Sarma Stores ', 'sarma@mail.com', '9038657628', '876412232', 'No.7, Saradamoni park, Kol-', '2017-05-22', 'superadmin', '9635421'),
(1715, 'Biswanath Stores ', 'biswanath@mail.com', '8296203209', '8758541212', '25/A, Saradamoni park,4F Lane, Kol- ', '2017-05-22', 'superadmin', '36943212'),
(1716, 'Mohendar Stores 2', 'mohendarstores@mail.com', '7278315352', '875142132', '7 lane, Saradamoni Park, (Suryasen Club), Kol-70', '2017-05-22', 'superadmin', '69345121'),
(1717, 'Sree Krishna Bhandar', 'sreekrishna@mail.com', '9239626404', '85461233', '21/A, Vidyasagar Park, Kol-', '2017-05-22', 'superadmin', '9646321'),
(1718, 'Niranjon Prasad Bhandar', 'niranjonprasad@mail.com', '8981379598', '985451321', 'Saradamoni Park, Pirpukur Road, Kol-70', '2017-05-22', 'superadmin', '9654212'),
(1719, 'Ganesh Bhandar', 'ganesh@mail.com', '9088264397', '7898633', '345, Pir Pukur Road, Kol-70', '2017-05-22', 'superadmin', '69634312'),
(1720, 'Pappu Stores ', 'pappu@mail.com', '9836029615', '84313313', 'Paulpara, Pirpukur Road, Kol-', '2017-05-22', 'superadmin', '63542122'),
(1721, 'Pramodh Shaw ', 'pramodh@mail.com', '8981233513', '874612123', 'Paulpara, Pirpukur Road, Kol-', '2017-05-22', 'superadmin', '9851432'),
(1722, 'Sonu Stores ', 'sonustores@mail.com', '8443093265', '7825131', 'Kandoppur, Goria, Kol-84', '2017-05-22', 'superadmin', '9123211'),
(1723, 'Noor Stores ', 'noorstores@mail.com', '9681970505', '84612323', 'Kusumba, Mondalpara, Kol-103', '2017-05-22', 'superadmin', '3654121'),
(1724, 'Arman Stores ', 'arman@mail.com', '9836213352', '8146133', 'South Kumrokhali, Kol-', '2017-05-22', 'superadmin', '96231132'),
(1725, 'S.B. Stores ', 'sbstores@mail.com', '9038181218', '564312322', 'South Kumrokhali, Kol-', '2017-05-22', 'superadmin', '63541212'),
(1726, 'Tumpa Stores ', 'tumpastores@mail.com', '8697120624', '8452513102', 'South Kumrokhali, Kol-103', '2017-05-22', 'superadmin', '6352521'),
(1727, 'Haldar Mudi Bhandar', 'haldarmudi@mail.com', '9748106366', '89321313', 'North Kumrokhali, Kol-', '2017-05-22', 'superadmin', '63552113'),
(1728, 'Alkhair Enterprises', 'alkhairenterprises@mail.com', '8013470743', '4882133', 'Sonarpur Station Road, Kol-', '2017-05-22', 'superadmin', '6315641'),
(1729, 'Mondal Stores', 'mondal@mail.com', '9038906640', '685614213', 'Sonarpur, Green park, Kol-', '2017-05-22', 'superadmin', '548198513'),
(1730, 'Nando Stores ', 'nando@mail.com', '9804245063', '89531232', 'Karbala,Sonarpur Stores Road, Kol-', '2017-05-22', 'superadmin', '45513363'),
(1731, 'Halder Stores ', 'halderstore@mail.com', '8820645033', '845613312', 'Sonarpur, Simultala,Kol-', '2017-05-22', 'superadmin', '6354421'),
(1732, 'New Halder Stores ', 'newhalder@mail.com', '9007808535', '654561332', 'Sonarpur, Simultala, Kol-', '2017-05-22', 'superadmin', '631511'),
(1733, 'Need ', 'need@mail.com', '9748143884', '85461233', 'Sonarpur, Tagoria, Kol-', '2017-05-22', 'superadmin', '63431122'),
(1734, 'Mrittunjoy Stores', 'mrittunjoy@mail.com', '9883325956', '84251332', 'Ram Krishna Pally, Kol-', '2017-05-23', 'superadmin', '93613122'),
(1735, 'Shree Krishna Bhandar', 'shreekrishna@mail.com', '9883660279', '85413312', 'Mishan pallyl,(Natun Bazar),Kol-', '2017-05-23', 'superadmin', '4546133'),
(1736, 'Bimal Ghosh', 'bimal@mail.com', '844949969', '8451321', 'Sonarpur, Bose Pukur, Kol-', '2017-05-23', 'superadmin', '1251423'),
(1737, 'Samar Stores ', 'samar@mail.com', '9831908274', '8456133', '\r\nSonarpur, Bose pukur, B.D.O. Office, Kol-', '2017-05-23', 'superadmin', '6431325'),
(1738, 'Tablu & Gublu', 'tablugublu@mail.com', '8481032434', '844553133', 'Sonarpur, Bose Pukur, B.D.O office, Kol-', '2017-05-23', 'superadmin', '63512132'),
(1739, 'Promila Bhandar', 'promila@mail.com', '9681440750', '5643213', 'Sonarpur, U.B.I. Bank, Kol-', '2017-05-23', 'superadmin', '6351213'),
(1740, 'Majumder Stores ', 'majumder@mail.com', '8100706154', '56312123', 'Sonarpur, Power House, Kol-', '2017-05-23', 'superadmin', '635121'),
(1741, 'Swarajani Bhandar', 'swarajani@mail.com', '9681309198', '85451323', 'Sonarpur,Power House, Kol-150', '2017-05-23', 'superadmin', '6351421'),
(1742, 'Rick Stores ', 'rick@mail.com', '7003652577', '48213312', 'Narendropur Station Road, Kol-', '2017-05-23', 'superadmin', '4582321'),
(1743, 'Rice House & Gossary', 'ricehousegrossary@mail.com', '8599981152', '8542513', '                                Tegoria, Sonargaon, Kol-150                                ', '2017-05-23', 'superadmin', '6314122'),
(1744, 'Mohan Stores ', 'mohan@mail.com', '8013149968', '85143213', 'Sonarpur, Tegaria, Narendropur Station Road, Kol-150', '2017-05-23', 'superadmin', '635112'),
(1745, 'Shibani Bhandar', 'shibani@mail.com', '9681020203', '56131433', 'Khatapat Buro Shiv Tala Road, Kol-', '2017-05-23', 'superadmin', '654222'),
(1746, 'Maa Manosha Bhandar', 'maamanosha@mail.com', '9038195043', '74251231', 'Sonarpur, Power House Line Road, Kol-', '2017-05-23', 'superadmin', '54242331'),
(1747, 'Bindu Stores ', 'bindu@mail.com', '9007416361', '84532133', 'Narendropur, Kol-', '2017-05-23', 'superadmin', '63525121'),
(1748, 'Pram Stores ', 'pram@mail.com', '9038405460', '564312112', '                                152, B.L.Shah Road, Kol-                                ', '2017-05-23', 'superadmin', '6352513'),
(1749, 'Mithlesh Shaw ', 'mithlesh@mail.com', '9804287433', '84521312', '97/31,B.L. Shah Road, Kol- 53', '2017-05-23', 'superadmin', '63422133'),
(1750, 'Haru Datto', 'haru@mail.com', '9831673467', '896413613', 'B.L. Shah Road, Kol-53', '2017-05-23', 'superadmin', '63545121'),
(1751, 'Binod Stoers ', 'binod@mail.com', '7059708233', '653614251', 'B.L. Shah Road, Kol-53', '2017-05-23', 'superadmin', '634612'),
(1752, 'Laxmi Bhandar ', 'laxmi@mail.com', '7278922043', '97514312', '174/28,B.L. Shah Road, Kol-', '2017-05-23', 'superadmin', '63112'),
(1753, 'Banomali Karmokar', 'banomali@mail.com', '9748096716', '854256123', '147, B.L. Shah Road, Kol-53', '2017-05-23', 'superadmin', '451231'),
(1754, 'Goutam Stores ', 'goutam@mail.com', '8013884722', '85143213', '356/A, B.L.Shah Road, Kol-', '2017-05-23', 'superadmin', '654213'),
(1755, 'Roy Stores ', 'roy@mail.com', '7278438598', '81425132', '91/24, B.L. Shah Road, Kol-', '2017-05-23', 'superadmin', '642512'),
(1756, 'Udesh Prasad ', 'udeshprasad@mail.com', '33552512', '8545133', '788/B, Pashupati Bhattecharya Road, Kol-41', '2017-05-23', 'superadmin', '63553323'),
(1757, 'Mantu Stores ', 'mantustores@mail.com', '9831876159', '75851432', '97/N, Pashupati Bhattecharya Road, Kol-41', '2017-05-23', 'superadmin', '4825321'),
(1758, 'M/S. Shaw ', 'shaw@mail.com', '8420516139', '9414321', 'No. 12, M.A. Road, Kol-', '2017-05-23', 'superadmin', '63521254'),
(1759, 'Shankar Stores', 'sankar@mail.com', '9748264428', '85451422', 'P-43, M.A. Road,Kol-41', '2017-05-23', 'superadmin', '5452133'),
(1760, 'Sabnam Stores ', 'sabnam@mail.com', '9831900924', '4821032', '1/1, Chanditala Main Road, Kol-', '2017-05-23', 'superadmin', '635421'),
(1761, 'Rajendar Stores ', 'rejendar@mail.com', '7059329524', '48251232', '33/1, Chanditala Main Road, Kol-', '2017-05-23', 'superadmin', '1251312'),
(1762, 'Dulal Stores ', 'dulal@mail.com', '9331265726', '8212133', '30, Chanditala Main Road, Kol-', '2017-05-23', 'superadmin', '125133'),
(1763, 'Ramballi Stores ', 'ramballi@mail.com', '03328683385', '8452133', '29/C.M, Chanditala Main Road, Kol-', '2017-05-23', 'superadmin', '63452321'),
(1764, 'Maity Stores ', 'maity@mail.com', '9748871101', '75841422', '74/A, Chanditala Main Road, Kol-53', '2017-05-23', 'superadmin', '64361313'),
(1765, 'Gobindo Shop', 'gobindo@mail.com', '9681221024', '854251231', 'No.1, Chanditala Main Road, Kalitala More, Kol-41', '2017-05-23', 'superadmin', '4551432'),
(1766, 'Puija Stores ', 'puja@mail.com', '9836356514', '85425613', '30/1, P.B. Road, Kol-', '2017-05-23', 'superadmin', '4523133'),
(1767, 'Ashok Stores ', 'ashok@mail.com', '331256252', '85413323', 'Bhasa para, Kol-', '2017-05-23', 'superadmin', '6355222'),
(1768, 'N.K. Stores ', 'nkstores@mail.com', '9831758617', '75133333', '97/1, Raja Ram Mohan Roy Road,Kol-', '2017-05-23', 'superadmin', '545431'),
(1769, 'Rajesh  Stores ', 'rajeshstoers@mail.com', '9903245601', '75825132', 'P-24, Raja Ram Mohan Roay Road, Kol-', '2017-05-23', 'superadmin', '482245522'),
(1770, 'Abhisek Stores ', 'abhisek@mail.com', '8017029708', '8996653', '63/40/1A, Bama Charan Roy Road, Kol-34', '2017-05-24', 'superadmin', '6431232'),
(1771, 'Mayer Ashirbad', 'mayerashirbad@mail.com', '8420645664', '86311312', '25/A, Bama Charan Roy Road, Kol-34', '2017-05-24', 'superadmin', '52221431'),
(1772, 'Daya Sankar', 'dayasankar@mail.com', '9831996430', '4525125', ' 235 Salandama Roy Road, Kol-34\r\n', '2017-05-24', 'superadmin', '46545133'),
(1773, 'Monu Stores ', 'monustores@mail.com', '9433622217', '854523123', 'P-15, Santi Colony, Bama Charan Roy Road, Kol-', '2017-05-24', 'superadmin', '63551421'),
(1774, 'Ratna Stores', 'ratnastores@mail.com', '9062233195', '654322312', '18/18, Chanditala Branch Road, Kol-53\r\n', '2017-05-24', 'superadmin', '362131323'),
(1775, 'Nimai Santra', 'nimai@mail.com', '9748506506', '4532312', 'No.12, Chanditala Branch Road, Kol-', '2017-05-24', 'superadmin', '635421'),
(1776, 'Punno Bhandar ', 'punno@mail.com', '9836966874', '7813323', 'No.12, Chanditala Branch Road, Kol-', '2017-05-24', 'superadmin', '6354251'),
(1777, 'Krishna Stores ', 'krishnastores@mail.com', '8013554536', '452585613', '2/3, Chanditala Branch Road, Kol-53', '2017-05-24', 'superadmin', '9614321'),
(1778, 'Babu Chowdhury', 'babu@mail.com', '335215646', '861412331', '66-B, Chanditala Branch Road, Kol-53', '2017-05-24', 'superadmin', '2311514');

-- --------------------------------------------------------

--
-- Table structure for table `td_company`
--

CREATE TABLE `td_company` (
  `cid` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `cemail` varchar(255) NOT NULL,
  `cphn` varchar(255) NOT NULL,
  `cpan` varchar(255) NOT NULL,
  `cgst` varchar(255) NOT NULL,
  `cadd` text NOT NULL,
  `pic` varchar(255) NOT NULL,
  `addate` varchar(255) NOT NULL,
  `adby` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_company`
--

INSERT INTO `td_company` (`cid`, `cname`, `cemail`, `cphn`, `cpan`, `cgst`, `cadd`, `pic`, `addate`, `adby`) VALUES
(1, 'M/S.Mishra Brothers', 'mishrabrotherskolkata@gmail.com', '9831097777', '45212613', '455126', '48/U, Jagatipota, Anandopur, Kol-152', 'Tulips.jpg', '2017-05-05', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `td_employee`
--

CREATE TABLE `td_employee` (
  `emp_id` int(11) NOT NULL,
  `emptype` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phn` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `empdesig` varchar(255) NOT NULL,
  `addrs` text NOT NULL,
  `pic` varchar(255) NOT NULL,
  `addate` varchar(255) NOT NULL,
  `adby` varchar(255) NOT NULL,
  `emp_sal` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_employee`
--

INSERT INTO `td_employee` (`emp_id`, `emptype`, `name`, `phn`, `email`, `empdesig`, `addrs`, `pic`, `addate`, `adby`, `emp_sal`) VALUES
(1, 'Sales', 'Subhra Bhattacharjee', '783478973873', 'sb@mail.com', 'Sales Man', '                                                                        Subhasgram                                                                                                                       ', 'Chrysanthemum.jpg', '2017-04-21', 'superadmin', 6000),
(2, 'Sales', 'Samrat Mondal', '7278986052', 'sm@mail.com', 'Sales man', '                                                                Khudirabad                                                                ', '', '2017-04-21', 'superadmin', 7000),
(3, 'Sales', 'Robin Biswas', '9865412', 'rb@mail.com', 'Sales man', 'Kalikapur', 'Desert.jpg', '2017-04-26', 'superadmin', 7000),
(4, 'Sales', 'Palash Mondal', '8946120', 'pm@mail.com', 'Sales man', 'Kalikapur', 'Jellyfish.jpg', '2017-04-26', 'superadmin', 7000),
(5, 'Sales', 'Avijit Saha', '98546223', 'as@mail.com', 'Sales Man', 'Khudirabad', 'Lighthouse.jpg', '2017-04-26', 'superadmin', 7000),
(6, 'Sales', 'Swapan Sardar', '78965426', 'ss@mail.com', 'Sales man', 'Khudirabad, Das para, Kol.', 'Jellyfish.jpg', '2017-04-27', 'superadmin', 7000),
(7, 'Sales', 'Debashish Mondal', '77884911', 'dm@mail.com', 'Sales Man', 'Khudirabad', 'Lighthouse.jpg', '2017-04-28', 'superadmin', 7000),
(8, 'Sales', 'Prodeep Baidya', '33649846', 'pb@mail.com', 'Sales Man', 'Sapuipara ', 'Penguins.jpg', '2017-04-29', 'superadmin', 7000),
(9, 'Sales', 'Somnath Mondal', '33166413', 'sm@mail.com', 'Sales Man', 'Goria, Police para.', 'Lighthouse.jpg', '2017-04-29', 'superadmin', 7000),
(10, 'Sales', 'Amresh Kr. Jha', '3364984', 'akj@mail.com', 'Sales Man', 'Naskarhat', 'Penguins.jpg', '2017-05-01', 'superadmin', 7000),
(11, 'Sales', 'Shyamol Roy', '3612451', 'sr@mail.com', 'Sales Man', 'Mukundopur', 'Koala.jpg', '2017-05-03', 'superadmin', 7000),
(12, 'Sales', 'Biplob Maridha', '23641541', 'bm@mail.com', 'Sales Man', 'Mukundopur', 'Penguins.jpg', '2017-05-04', 'superadmin', 7000),
(13, 'Sales', 'Satyajit Mondal', '4562133', 'sn@mail.com', 'Sales Man', 'Mukundopur', 'Penguins.jpg', '2017-05-05', 'superadmin', 7000),
(14, 'Sales', 'Shudist Jha', '33562554', 'sj@Mail.com', 'Sales Man', 'Kalikapur, Jamuna Nagar, Kol-', 'Penguins.jpg', '2017-05-08', 'superadmin', 8000),
(15, 'Sales', 'Uday Mishra ', '33665321', 'uday@mail.com', 'Sales Man', 'Naskar hat, Kol-', 'Penguins.jpg', '2017-05-17', 'superadmin', 10000),
(16, 'Sales', 'Santosh Jha', '3314631325', 'santohs@mail.com', 'Sales Man Incharge', 'Naskarhat, Rajdanga, Kol-', 'Tulips.jpg', '2017-05-20', 'superadmin', 13000),
(17, 'Sales', 'Ayon Mondal', '33251125436', 'ayon@mail.com', 'Sales Man', 'Narendropur, Kol-', 'Jellyfish.jpg', '2017-05-20', 'superadmin', 7000);

-- --------------------------------------------------------

--
-- Table structure for table `td_expense`
--

CREATE TABLE `td_expense` (
  `exp_id` int(11) NOT NULL,
  `expname` varchar(255) NOT NULL,
  `expdate` varchar(255) NOT NULL,
  `expamnt` varchar(255) NOT NULL,
  `addate` varchar(255) NOT NULL,
  `adby` varchar(255) NOT NULL,
  `advance` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_expense`
--

INSERT INTO `td_expense` (`exp_id`, `expname`, `expdate`, `expamnt`, `addate`, `adby`, `advance`) VALUES
(1, 'Dinner', '2017-04-03', '400', '2017-04-21', 'superadmin', '0'),
(2, 'Lunch', '2017-04-19', '1000', '2017-04-21', 'superadmin', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `td_finance`
--

CREATE TABLE `td_finance` (
  `finance_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `bill_no` varchar(250) NOT NULL,
  `cb_no` varchar(250) NOT NULL,
  `lf_no` varchar(250) NOT NULL,
  `finance_type` varchar(250) NOT NULL,
  `transaction_type` varchar(250) NOT NULL,
  `amount` float NOT NULL,
  `entry_date` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_finance`
--

INSERT INTO `td_finance` (`finance_id`, `bill_id`, `bill_no`, `cb_no`, `lf_no`, `finance_type`, `transaction_type`, `amount`, `entry_date`) VALUES
(1, 1, '012345', 'CB/P/12104', 'LF/P/12104', 'Purchase', 'Debit', 12000, '2017-04-21'),
(2, 2, '012375', 'CB/P/22104', 'LF/P/22104', 'Purchase', 'Debit', 2750, '2017-04-21'),
(3, 1, '012345', 'CB/PR/12104', 'LF/PR/12104', 'Purchase Return', 'Credit', 1000, '2017-04-21'),
(4, 1, '012345', 'CB/PR/12104', 'LF/PR/12104', 'Purchase Return', 'Credit', 700, '2017-04-21'),
(5, 1, '00000001', 'CB/S/12104', 'LF/S/12104', 'Sale', 'Credit', 3170, '2017-04-21'),
(6, 1, 'NA', 'CB/I/12104', 'LF/I/12104', 'Incentive', 'Debit', 4.84, '2017-04-21'),
(7, 1, '00000001', 'CB/SR/12104', 'LF/SR/12104', 'Sale Return', 'Debit', 550, '2017-04-21'),
(8, 1, '00000001', 'CB/SR/12104', 'LF/SR/12104', 'Sale Return', 'Debit', 150, '2017-04-21'),
(9, 1, 'NA', 'CB/E/12104', 'LF/E/12104', 'Expense', 'Debit', 400, '2017-04-03'),
(10, 2, 'NA', 'CB/E/22104', 'LF/E/22104', 'Expense', 'Debit', 1000, '2017-04-19'),
(11, 0, 'NA', 'CB/E/ADV2104', 'CB/E/ADV2104', 'Advance Expense', 'Credit', 5000, '2017-04-19'),
(12, 1, 'NA', 'CB/SL/12104', 'LF/SL/12104', 'Salary', 'Debit', 10000, '2017-04-21'),
(13, 1, '00000001', 'CB/CB/2104', 'LF/CB/2104', 'Bill Cancel', 'Debit', 3170, '2017-04-21'),
(14, 2, '00000002', 'CB/S/22204', 'LF/S/22204', 'Sale', 'Credit', 1750, '2017-04-22'),
(15, 3, 'pur/1760', 'CB/P/32204', 'LF/P/32204', 'Purchase', 'Debit', 6200, '2017-04-22'),
(16, 3, '00000003', 'CB/S/32204', 'LF/S/32204', 'Sale', 'Credit', 1500, '2017-04-22'),
(17, 4, '00000004', 'CB/S/42204', 'LF/S/42204', 'Sale', 'Credit', 0, '2017-04-22'),
(18, 5, '00000005', 'CB/S/52204', 'LF/S/52204', 'Sale', 'Credit', 750, '2017-04-22'),
(19, 6, '00000006', 'CB/S/62204', 'LF/S/62204', 'Sale', 'Credit', 1875, '2017-04-22'),
(20, 7, '00000007', 'CB/S/71606', 'LF/S/71606', 'Sale', 'Credit', 87, '2017-06-16'),
(21, 8, '00000008', 'CB/S/82808', 'LF/S/82808', 'Sale', 'Credit', 20.16, '2017-08-28'),
(22, 9, '00000009', 'CB/S/92808', 'LF/S/92808', 'Sale', 'Credit', 20.16, '2017-08-28');

-- --------------------------------------------------------

--
-- Table structure for table `td_incentives`
--

CREATE TABLE `td_incentives` (
  `inc_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `inc_range` varchar(255) DEFAULT NULL,
  `extra_price_unit` varchar(255) DEFAULT NULL,
  `incentives_unit` varchar(255) DEFAULT NULL,
  `incentive_item_total` varchar(255) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `bill_no` varchar(255) DEFAULT NULL,
  `earn_date` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_incentives`
--

INSERT INTO `td_incentives` (`inc_id`, `emp_id`, `inc_range`, `extra_price_unit`, `incentives_unit`, `incentive_item_total`, `item_name`, `bill_no`, `earn_date`, `status`) VALUES
(1, 1, '0.2', '5.5', '0.2', '4.84', 'Rice', '1', '2017-04-21', 1),
(2, 2, '0.5', '74.25', '0.5', '7.5', 'Moong dal', '3', '2017-04-22', 0),
(3, 2, '0.5', '74.25', '0.5', '3.75', 'Moong dal', '5', '2017-04-22', 0),
(4, 2, '0.5', '74.25', '0.5', '9.375', 'Moong dal', '6', '2017-04-22', 0),
(5, 5, NULL, '0.09', NULL, '0', 'Moong dal', '9', '2017-08-28', 0),
(6, 5, NULL, '0.09', NULL, '0', 'Moong dal', '9', '2017-08-28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `td_inc_settings`
--

CREATE TABLE `td_inc_settings` (
  `incset_id` int(11) NOT NULL,
  `p_range` varchar(255) NOT NULL,
  `inc_per` float NOT NULL,
  `min_range` int(11) NOT NULL,
  `max_range` int(11) NOT NULL,
  `addate` varchar(255) NOT NULL,
  `adby` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_inc_settings`
--

INSERT INTO `td_inc_settings` (`incset_id`, `p_range`, `inc_per`, `min_range`, `max_range`, `addate`, `adby`) VALUES
(1, '50-60', 0.01, 50, 60, '2017-04-21', 'superadmin'),
(2, '60-70', 0.2, 60, 70, '2017-04-21', 'superadmin'),
(3, '70-80', 0.5, 70, 80, '2017-04-22', 'superadmin'),
(4, '75-90', 0.25, 75, 90, '2017-04-22', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `td_purchase_bill`
--

CREATE TABLE `td_purchase_bill` (
  `p_bill_id` int(11) NOT NULL,
  `p_bill_no` varchar(255) NOT NULL,
  `purchase_total` float NOT NULL,
  `p_bill_total` varchar(255) NOT NULL,
  `p_bill_date` varchar(255) NOT NULL,
  `p_bill_creator` varchar(255) NOT NULL,
  `p_bill_creation_date` varchar(255) NOT NULL,
  `sl_no` varchar(200) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `returnstat` int(11) NOT NULL,
  `returnAmt` varchar(255) DEFAULT NULL,
  `due_amt` varchar(255) NOT NULL,
  `notify` int(11) NOT NULL,
  `p_bill_total_sale` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_purchase_bill`
--

INSERT INTO `td_purchase_bill` (`p_bill_id`, `p_bill_no`, `purchase_total`, `p_bill_total`, `p_bill_date`, `p_bill_creator`, `p_bill_creation_date`, `sl_no`, `supplier_name`, `returnstat`, `returnAmt`, `due_amt`, `notify`, `p_bill_total_sale`) VALUES
(3, 'pur/1760', 6200, '6200', '2017-04-15', 'superadmin', '2017-04-22 07:42:09', '1', '2', 0, NULL, '', 0, '75');

-- --------------------------------------------------------

--
-- Table structure for table `td_purchase_item`
--

CREATE TABLE `td_purchase_item` (
  `item_name` text NOT NULL,
  `item_unit_p_price` varchar(255) NOT NULL,
  `item_p_qty` int(11) NOT NULL,
  `item_p_total_amt` varchar(255) NOT NULL,
  `item_s_price` varchar(255) NOT NULL,
  `item_s_gst` varchar(255) NOT NULL,
  `item_p_unit` varchar(255) NOT NULL,
  `item_s_total` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `item_single_sale_wgst` varchar(255) NOT NULL,
  `item_single_sale_wogst` varchar(255) NOT NULL,
  `ret_date` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `return_unit` varchar(255) DEFAULT NULL,
  `return_price` varchar(255) DEFAULT NULL,
  `itempqtyorig` varchar(255) NOT NULL,
  `itempamtorig` varchar(255) NOT NULL,
  `return_type` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_purchase_item`
--

INSERT INTO `td_purchase_item` (`item_name`, `item_unit_p_price`, `item_p_qty`, `item_p_total_amt`, `item_s_price`, `item_s_gst`, `item_p_unit`, `item_s_total`, `item_id`, `pid`, `item_single_sale_wgst`, `item_single_sale_wogst`, `ret_date`, `remark`, `return_unit`, `return_price`, `itempqtyorig`, `itempamtorig`, `return_type`) VALUES
('Moong dal', '62', 100, '6200', '75', '0', '1', '75', 4, 3, '0.75', '0.75', NULL, NULL, NULL, NULL, '100', '6200', '');

-- --------------------------------------------------------

--
-- Table structure for table `td_purchase_payment`
--

CREATE TABLE `td_purchase_payment` (
  `sp_id` int(11) NOT NULL,
  `bill_no` varchar(200) NOT NULL,
  `payable_amt` float NOT NULL,
  `paid_amt` float NOT NULL,
  `pay_date` varchar(255) NOT NULL,
  `notify` int(11) NOT NULL,
  `amt_due` float NOT NULL,
  `particular` text NOT NULL,
  `next_pay_date` varchar(255) DEFAULT NULL,
  `pay_through` varchar(255) NOT NULL,
  `trans_no` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_purchase_payment`
--

INSERT INTO `td_purchase_payment` (`sp_id`, `bill_no`, `payable_amt`, `paid_amt`, `pay_date`, `notify`, `amt_due`, `particular`, `next_pay_date`, `pay_through`, `trans_no`) VALUES
(1, '012345', 10300, 5000, '2017-04-05', 0, 5300, 'Payment Day of #012345', '2017-04-21', 'NEFT', '12354565400'),
(2, '012345', 10300, 4000, '2017-04-21', 1, 1300, 'Payment Day of #012345', '2017-04-21', 'CHEQUE', '012589');

-- --------------------------------------------------------

--
-- Table structure for table `td_return_details`
--

CREATE TABLE `td_return_details` (
  `retdtl_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `ret_date` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `return_unit` varchar(255) NOT NULL,
  `return_price` varchar(255) NOT NULL,
  `return_type` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_return_details`
--

INSERT INTO `td_return_details` (`retdtl_id`, `item_id`, `ret_date`, `remark`, `return_unit`, `return_price`, `return_type`) VALUES
(1, 1, '2017-04-21', 'No Need', '20', '1000', 'Purchase'),
(2, 2, '2017-04-21', 'No Need', '10', '700', 'Purchase'),
(3, 1, '2017-04-21', 'Return', '10', '550', 'Sales'),
(4, 2, '2017-04-21', 'Return', '2', '150', 'Sales');

-- --------------------------------------------------------

--
-- Table structure for table `td_route`
--

CREATE TABLE `td_route` (
  `rid` int(11) NOT NULL,
  `rname` varchar(255) NOT NULL,
  `rno` varchar(200) NOT NULL,
  `rdtl` text NOT NULL,
  `addate` varchar(255) NOT NULL,
  `adby` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_route`
--

INSERT INTO `td_route` (`rid`, `rname`, `rno`, `rdtl`, `addate`, `adby`) VALUES
(1, 'Monday/ Thusday', 'Route no. 1', 'Boisnab Ghata to Natun Bazar', '2017-04-21', 'superadmin'),
(2, 'Tuesday/Friday', 'Route no. 2', 'Boral to Bidhanpally', '2017-04-21', 'superadmin'),
(3, 'Wednesday/Satarday', 'Route no. 3', 'Behala, R.R.M Road to K.P. Mukherjee Road', '2017-04-22', 'superadmin'),
(4, 'Wednesday/Satarday', 'Route no.4', 'Goria to Narandropur, Kandoppur', '2017-04-22', 'superadmin'),
(5, 'Tuesday/Friday', 'Route no. 5', 'Goria jheel road to Narandropur, Sonarpur', '2017-04-22', 'superadmin'),
(6, 'Monday/ Thusday', 'Route no. 6', 'Patuli to Bansdroni', '2017-04-22', 'superadmin'),
(7, 'Monday/ Thusday', 'Route no. 7', 'Rania to Gitanagar', '2017-04-26', 'superadmin'),
(8, 'Tuesday/ Friday', 'Route no. 8', 'Ganga Joyara to Sonarpur Bazar', '2017-04-26', 'superadmin'),
(9, 'Wednesday/Satarday', 'Route no.9', 'M.L.G Road to Ishan Ghosh Road', '2017-04-26', 'superadmin'),
(10, 'Monday/ Thusday', 'Route no. 10', 'Bagha Jatin', '2017-04-26', 'superadmin'),
(11, 'Tuesday/ Friday', 'Route no.11', 'Bijoy Garh to Golf Club Road', '2017-04-26', 'superadmin'),
(12, 'Wednesday/ Satarday', 'Route no.12', 'Chitto Ranjon Collony', '2017-04-26', 'superadmin'),
(13, 'Wednesday /Satarday', 'Route no.13', 'Haridevpur to Brick Field Road', '2017-04-26', 'superadmin'),
(14, 'Monday/ Thusday', 'Route no. 14', 'Azad Garh to Regent Collony', '2017-04-26', 'superadmin'),
(15, 'Tuesday/ Friday', 'Route no. 15', 'Jodhpur to Lake garden', '2017-04-26', 'superadmin'),
(16, 'Wednesday /Satarday', 'Route no. 16', 'Hairdevpur to R.R.M Road', '2017-04-27', 'superadmin'),
(17, 'Monday/ Thusday', 'Route no. 17', 'Kudghat to Bishnu pally', '2017-04-27', 'superadmin'),
(18, 'Tuesday/ Friday', 'Route no. 18', 'Paschim Patwari para to M.G. Road', '2017-04-27', 'superadmin'),
(19, 'Wednesday /Satarday', 'Route no. 19', 'Kalighat to Chetla', '2017-04-28', 'superadmin'),
(20, 'Monday/ Thusday', 'Route no. 20', 'Topsia', '2017-04-28', 'superadmin'),
(21, 'Tuesday/ Friday', 'Route no. 22', 'R.B.Avenue to M.P Road, Lake Market, Lake View Road', '2017-04-28', 'superadmin'),
(22, 'Wednesday /Satarday', 'Route no. 22', 'Patuli', '2017-04-29', 'superadmin'),
(23, 'Monday/ Thusday', 'Route no. 23', 'Chowbaga to Naskarhat', '2017-04-29', 'superadmin'),
(24, 'Tuesday/ Friday', 'Route no. 24', 'Mukundopur to Nabogram', '2017-04-29', 'superadmin'),
(25, 'Monday/Thusday', 'Route no. 25', 'Brahmapur', '2017-04-29', 'superadmin'),
(26, 'Tuesday/ Friday', 'Route no. 26', 'Daspara', '2017-04-29', 'superadmin'),
(27, 'Wednesday /Satarday', 'Route no. 27', 'Boyalia', '2017-04-29', 'superadmin'),
(28, 'Monday/ Thusday', 'Route no.28', 'Santoshpur,Survey park to Jadovpur,Chittoranjon Collony', '2017-05-01', 'superadmin'),
(29, 'Tuesday/Friday', 'Route no. 29', 'Jadovpur CIT Market,Katju Nagar to Bikramgar to P.G.H. Shah Road', '2017-05-01', 'superadmin'),
(30, 'Wednesday /Satarday', 'Route no. 30', 'Garfa Main Road,Sree Vivekanando Sarani to  Jadovpur,Bapuji Nagar,Bijoy Garh,Netaji Nagar', '2017-05-01', 'superadmin'),
(31, 'Monday/Thusday', 'Route no.31', 'More Avenue to Chandi Ghosh Road', '2017-05-03', 'superadmin'),
(32, 'Tuesday/Friday', 'Route no.32', 'Haltu', '2017-05-03', 'superadmin'),
(33, 'Wednesday /Satarday', 'Route no. 33', 'Lake Garden to Tallygange', '2017-05-03', 'superadmin'),
(34, 'Wednesday /Satarday', 'Route no. 34', 'Anandopur to China Mandir', '2017-05-04', 'superadmin'),
(35, 'Mondaday/ Thusday', 'Route no. 35', 'Rania', '2017-05-04', 'superadmin'),
(36, 'Tuesday/ Friday', 'Route no. 36', 'Goria to Brahmapur', '2017-05-04', 'superadmin'),
(37, 'Monday/Thusday', 'Route no. 37', 'Bagha Jatin Bazar to Netaji Nagar', '2017-05-06', 'superadmin'),
(38, 'Wednesday /Satarday', 'Route no. 38', 'Panchanno Gram to Netaji Nagar', '2017-05-06', 'superadmin'),
(39, 'Tuesday/Friday', 'Route no. 39', 'Sonarpur', '2017-05-06', 'superadmin'),
(40, 'Wednesday /Satarday', 'Route no. 40', 'Ramgarh', '2017-05-08', 'superadmin'),
(41, 'Wednesday /Satarday (Night)', 'Route no. 41', 'Kalikapur', '2017-05-08', 'superadmin'),
(42, 'Monday/ Thusday', 'Route no. 42', 'Golf Club to Tallygange ', '2017-05-08', 'superadmin'),
(43, 'Monday/Thusday (Night)', 'Route no. 43', 'S.S. Collony', '2017-05-08', 'superadmin'),
(44, 'Tuesday/ Friday', 'Route no. 43', 'Keorapuku ', '2017-05-08', 'superadmin'),
(45, 'Tuesday/ Friday (Night)', 'Route no. 63', 'Garfa', '2017-05-08', 'superadmin'),
(46, 'Mondaly/ Thusday', 'Route no.46', 'P.G. Road to South Point', '2017-05-17', 'superadmin'),
(47, 'Tuesday/Friday', 'Route no. 47', 'Rajdanga to Ritchi Road', '2017-05-17', 'superadmin'),
(48, 'Wednesday /Satarday', 'Route no.47', 'Naskarhat to Paddo Pukur', '2017-05-17', 'superadmin'),
(49, 'Monday/ Tuesday (Night)', 'Route no.49', 'P.G. Road, Bidhan Nagar to C.N. Road,P.G. Road, Colony Market', '2017-05-17', 'superadmin'),
(50, 'Tuesday/ Friday (Night)', 'Route no. 50', 'Mondal para Bazar to Ramlal Bazar, Kalikapur Bazar', '2017-05-17', 'superadmin'),
(51, 'Wednesday /Satarday (Night)', 'Route no. 51', 'Kalitala Road to Mondal Para, Kalitala', '2017-05-17', 'superadmin'),
(52, 'Wednesday /Satarday', 'Route no. 52', 'Jagatipota to Khudirabad', '2017-05-20', 'superadmin'),
(53, 'Monday /Thusday', 'Route no. 53', 'Kishan Market to Mukundopur', '2017-05-20', 'superadmin'),
(54, 'Tuesday/ Friday', 'Route no. 54', 'Jamunanagar to Rajdanga, R.R.Plot, Kasba ', '2017-05-20', 'superadmin'),
(55, 'Monday/ Thusday (Night)', 'Route no. 55', 'Kalikapur By-pass to East Rajapur', '2017-05-20', 'superadmin'),
(56, 'Tuesday/Friday (Night)', 'Route no.56', 'Jagatipota,Kishan Market to Anandopur, Martine Para', '2017-05-20', 'superadmin'),
(57, 'Wednesday /Satarday (Night)', 'Route no. 57', 'Jamunja Nagar to S.S. Colony', '2017-05-20', 'superadmin'),
(58, 'Monday/ Thusday', 'Route no.58', '71, Raja Subodh Chandra Mallick Road to Paul Para, Pirpukur Road ', '2017-05-20', 'superadmin'),
(59, 'Tusday/ Friday', 'Route no. 59', 'Kandop pur, Goria to Narendropur, ', '2017-05-20', 'superadmin'),
(60, 'Wednesday /Satarday', 'Route no. 60', 'B.L.Shah Road to Chanditala Branch Road', '2017-05-20', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `td_sales_bill`
--

CREATE TABLE `td_sales_bill` (
  `p_bill_id` int(11) NOT NULL,
  `p_bill_no` varchar(255) NOT NULL,
  `discount_amt` float NOT NULL,
  `real_amt` float NOT NULL,
  `p_bill_total` varchar(255) NOT NULL,
  `p_bill_date` varchar(255) NOT NULL,
  `p_bill_creator` varchar(255) NOT NULL,
  `p_bill_creation_date` varchar(255) NOT NULL,
  `sl_no` varchar(200) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `returnstat` int(11) NOT NULL,
  `returnAmt` varchar(255) DEFAULT NULL,
  `emp_name` varchar(255) NOT NULL,
  `due_amt` int(11) NOT NULL,
  `notify` int(11) NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_sales_bill`
--

INSERT INTO `td_sales_bill` (`p_bill_id`, `p_bill_no`, `discount_amt`, `real_amt`, `p_bill_total`, `p_bill_date`, `p_bill_creator`, `p_bill_creation_date`, `sl_no`, `customer_name`, `returnstat`, `returnAmt`, `emp_name`, `due_amt`, `notify`, `stat`) VALUES
(1, '00000001', 0, 3170, '2470', '2017-04-10', 'superadmin', '2017-04-21 07:13:25', '1', '1', 1, '150', '1', 370, 1, 1),
(2, '00000002', 0, 1750, '1750', '2017-04-21', 'superadmin', '2017-04-22 07:33:52', '2', '11', 0, NULL, '2', 0, 0, 0),
(3, '00000003', 0, 1500, '1500', '2017-04-21', 'superadmin', '2017-04-22 07:44:19', '3', '9', 0, NULL, '2', 0, 0, 0),
(4, '00000004', 0, 0, '0', '2017-04-20', 'superadmin', '2017-04-22 07:55:23', '4', '45', 0, NULL, '1', 0, 0, 0),
(5, '00000005', 0, 750, '750', '2017-04-22', 'superadmin', '2017-04-22 08:01:54', '5', '7', 0, NULL, '2', 0, 0, 0),
(6, '00000006', 0, 1875, '1875', '2017-04-20', 'superadmin', '2017-04-22 08:19:48', '6', '15', 0, NULL, '2', 0, 0, 0),
(7, '00000007', 0, 87, '87', '2017-06-16', 'superadmin', '2017-06-16 08:11:13', '7', '287', 0, NULL, '2', 0, 0, 0),
(8, '00000008', 0, 20.16, '20.16', '2017-08-28', 'superadmin', '2017-08-28 07:51:30', '8', '459', 0, NULL, '5', 0, 0, 0),
(9, '00000009', 0, 20.16, '20.16', '2017-08-28', 'superadmin', '2017-08-28 07:52:59', '9', '459', 0, NULL, '5', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `td_sales_item`
--

CREATE TABLE `td_sales_item` (
  `item_name` text NOT NULL,
  `item_unit_p_price` varchar(255) NOT NULL,
  `item_p_qty` int(11) NOT NULL,
  `item_p_total_amt` varchar(255) NOT NULL,
  `item_s_price` varchar(255) NOT NULL,
  `item_s_gst` varchar(255) NOT NULL,
  `item_s_gst_amt` varchar(255) NOT NULL,
  `item_s_cgst` varchar(255) NOT NULL,
  `item_s_cgst_amt` varchar(255) NOT NULL,
  `item_p_unit` varchar(255) NOT NULL,
  `item_s_total` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `item_single_sale_wgst` varchar(255) NOT NULL,
  `item_single_sale_wogst` varchar(255) NOT NULL,
  `ret_date` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `return_unit` varchar(255) DEFAULT NULL,
  `return_price` varchar(255) DEFAULT NULL,
  `itempqtyorig` varchar(255) NOT NULL,
  `itempamtorig` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_sales_item`
--

INSERT INTO `td_sales_item` (`item_name`, `item_unit_p_price`, `item_p_qty`, `item_p_total_amt`, `item_s_price`, `item_s_gst`, `item_s_gst_amt`, `item_s_cgst`, `item_s_cgst_amt`, `item_p_unit`, `item_s_total`, `item_id`, `pid`, `item_single_sale_wgst`, `item_single_sale_wogst`, `ret_date`, `remark`, `return_unit`, `return_price`, `itempqtyorig`, `itempamtorig`) VALUES
('Rice', '55', 30, '1870', '0', '10', '', '', '', '1', '1870', 1, 1, '60.5', '0', '2017-04-21', 'Return', '10', '550', '40', '2420'),
('Mung Daal', '75', 8, '600', '0', '0', '', '', '', '1', '600', 2, 1, '75', '0', '2017-04-21', 'Return', '2', '150', '10', '750'),
('mugdal', '70', 25, '1750', '0', '0', '', '', '', '1', '1750', 3, 2, '70', '0', NULL, NULL, NULL, NULL, '25', '1750'),
('Moong dal', '75', 20, '1500', '0', '0', '', '', '', '1', '1500', 4, 3, '75', '0', NULL, NULL, NULL, NULL, '20', '1500'),
('Moong dal', '0.75', 20, '0', '0', '0', '', '', '', '1', '0', 5, 4, '0', '0', NULL, NULL, NULL, NULL, '20', '0'),
('Moong dal', '75', 10, '750', '0', '0', '', '', '', '1', '750', 6, 5, '75', '0', NULL, NULL, NULL, NULL, '10', '750'),
('Moong dal', '75', 25, '1875', '0', '0', '', '', '', '1', '1875', 7, 6, '75', '0', NULL, NULL, NULL, NULL, '25', '1875'),
('Moong dal', '0.75', 20, '87', '0', '', '', '', '', '1', '87', 8, 7, '4.35', '0', NULL, NULL, NULL, NULL, '20', '87'),
('Moong dal', '0.75', 6, '5.04', '0', '6', '0.27', '6', '0.27', '1', '5.04', 10, 9, '0.84', '0', NULL, NULL, NULL, NULL, '6', '5.04'),
('Moong dal', '0.75', 18, '15.12', '0', '6', '0.81', '6', '0.81', '1', '15.12', 11, 9, '0.84', '0', NULL, NULL, NULL, NULL, '18', '15.12');

-- --------------------------------------------------------

--
-- Table structure for table `td_sales_payment`
--

CREATE TABLE `td_sales_payment` (
  `sp_id` int(11) NOT NULL,
  `bill_no` varchar(200) NOT NULL,
  `payable_amt` float NOT NULL,
  `paid_amt` float NOT NULL,
  `pay_date` varchar(255) NOT NULL,
  `notify` int(11) NOT NULL,
  `amt_due` float NOT NULL,
  `particular` text NOT NULL,
  `next_pay_date` varchar(255) DEFAULT NULL,
  `pay_through` varchar(255) NOT NULL,
  `trans_no` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_sales_payment`
--

INSERT INTO `td_sales_payment` (`sp_id`, `bill_no`, `payable_amt`, `paid_amt`, `pay_date`, `notify`, `amt_due`, `particular`, `next_pay_date`, `pay_through`, `trans_no`) VALUES
(1, '00000001', 2470, 1500, '2017-04-19', 0, 970, 'Payment Collection Day of #00000001', '2017-04-21', 'CHEQUE', '454689'),
(2, '00000001', 2470, 100, '2017-04-19', 0, 870, 'Payment Collection Day of #00000001', '2017-04-21', 'NEFT', '121514515'),
(3, '00000001', 2470, 500, '2017-04-19', 1, 370, 'Payment Collection Day of #00000001', '2017-04-21', 'CHEQUE', '789012');

-- --------------------------------------------------------

--
-- Table structure for table `td_site_settings`
--

CREATE TABLE `td_site_settings` (
  `site_id` int(11) NOT NULL,
  `site_name` longtext NOT NULL,
  `site_logo` varchar(250) NOT NULL,
  `site_admin_logo` varchar(255) NOT NULL,
  `site_email_address` varchar(250) NOT NULL,
  `site_address` text NOT NULL,
  `site_phone` varchar(250) NOT NULL,
  `site_meta` varchar(255) NOT NULL,
  `site_desc` varchar(255) NOT NULL,
  `site_fblink` varchar(255) NOT NULL,
  `site_twtlink` varchar(255) NOT NULL,
  `google_plus_link` varchar(250) NOT NULL,
  `instragram_link` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_stock`
--

CREATE TABLE `td_stock` (
  `stock_id` int(11) NOT NULL,
  `stock_item` varchar(255) NOT NULL,
  `stock_qty` varchar(255) NOT NULL,
  `stock_unit` varchar(200) NOT NULL,
  `store_name` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_stock`
--

INSERT INTO `td_stock` (`stock_id`, `stock_item`, `stock_qty`, `stock_unit`, `store_name`) VALUES
(1, 'Rice', '130', '1', 0),
(2, 'Mung Daal', '90', '1', 0),
(3, 'Moong dal', '-25', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `td_store`
--

CREATE TABLE `td_store` (
  `st_id` int(11) NOT NULL,
  `stname` varchar(255) NOT NULL,
  `stno` varchar(255) NOT NULL,
  `stkeep` varchar(200) NOT NULL,
  `addate` varchar(255) NOT NULL,
  `adby` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `td_store_allocate`
--

CREATE TABLE `td_store_allocate` (
  `st_al_id` int(11) NOT NULL,
  `stname` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `addate` varchar(255) NOT NULL,
  `adby` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `td_supplier`
--

CREATE TABLE `td_supplier` (
  `cl_id` int(11) NOT NULL,
  `clname` varchar(255) NOT NULL,
  `clemail` varchar(255) NOT NULL,
  `clphn` varchar(255) NOT NULL,
  `clpan` varchar(255) NOT NULL,
  `cgst` varchar(255) NOT NULL,
  `cladd` text NOT NULL,
  `adby` varchar(255) NOT NULL,
  `addate` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_supplier`
--

INSERT INTO `td_supplier` (`cl_id`, `clname`, `clemail`, `clphn`, `clpan`, `cgst`, `cladd`, `adby`, `addate`) VALUES
(1, 'Kishan Enterprises ', 'ke@mail.com', '9883015900', '54514151', '456411456', '11/H/2, Gora Pada Sarkar Lane, Kolkata-700067', 'superadmin', '2017-04-21'),
(2, 'Shree Ghanshyam Dall Mill', 'sg@mail.com', '7896005897', 'SJ78965042', '7895601', 'Das Para', 'superadmin', '2017-04-22'),
(3, 'Satyanarayan Trading Co.', 'st@mail.co', '9330938721', '458513321', '64561311', '2/3, Canal East Road (Daspara), Kolkata-700067', 'superadmin', '2017-06-17'),
(4, 'Kuber Pulses', 'kp@mail.com', '322151310', '453631', '6563133', '2/5, Canel East Road, (Daspara), Kolkata- 700067\r\n', 'superadmin', '2017-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `td_unit`
--

CREATE TABLE `td_unit` (
  `uid` int(11) NOT NULL,
  `stname` varchar(200) NOT NULL,
  `addate` varchar(255) NOT NULL,
  `adby` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_unit`
--

INSERT INTO `td_unit` (`uid`, `stname`, `addate`, `adby`) VALUES
(1, 'KG', '2017-04-11', 'superadmin'),
(2, 'Piece', '2017-04-11', 'superadmin'),
(3, 'gm', '2017-04-11', 'superadmin'),
(4, 'ltr', '2017-04-11', 'superadmin'),
(5, 'ft', '2017-04-11', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `td_users`
--

CREATE TABLE `td_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_original` varchar(250) NOT NULL,
  `ip_address` varchar(250) NOT NULL,
  `last_login` varchar(250) NOT NULL,
  `last_browser_used` varchar(250) NOT NULL,
  `published` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `td_users`
--

INSERT INTO `td_users` (`id`, `username`, `password`, `password_original`, `ip_address`, `last_login`, `last_browser_used`, `published`) VALUES
(1, 'subadmin1', '21232f297a57a5a743894a0e4a801fc3', 'admin', '::1', '2017-03-16 06:59:29am', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 1),
(2, 'subadmin2', '21232f297a57a5a743894a0e4a801fc3', 'admin', '', '', '', 1),
(3, 'superadmin', 'fd80b4bd63457b0dbee2e3c90eb6de52', 'mishrabrothers', '', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_salary`
--
ALTER TABLE `employee_salary`
  ADD PRIMARY KEY (`emp_sal_id`);

--
-- Indexes for table `salary_detail`
--
ALTER TABLE `salary_detail`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `td_assign_route`
--
ALTER TABLE `td_assign_route`
  ADD PRIMARY KEY (`asign_id`);

--
-- Indexes for table `td_bank`
--
ALTER TABLE `td_bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `td_client`
--
ALTER TABLE `td_client`
  ADD PRIMARY KEY (`cl_id`);

--
-- Indexes for table `td_company`
--
ALTER TABLE `td_company`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `td_employee`
--
ALTER TABLE `td_employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `td_expense`
--
ALTER TABLE `td_expense`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `td_finance`
--
ALTER TABLE `td_finance`
  ADD PRIMARY KEY (`finance_id`);

--
-- Indexes for table `td_incentives`
--
ALTER TABLE `td_incentives`
  ADD PRIMARY KEY (`inc_id`);

--
-- Indexes for table `td_inc_settings`
--
ALTER TABLE `td_inc_settings`
  ADD PRIMARY KEY (`incset_id`);

--
-- Indexes for table `td_purchase_bill`
--
ALTER TABLE `td_purchase_bill`
  ADD PRIMARY KEY (`p_bill_id`);

--
-- Indexes for table `td_purchase_item`
--
ALTER TABLE `td_purchase_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `td_purchase_payment`
--
ALTER TABLE `td_purchase_payment`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `td_return_details`
--
ALTER TABLE `td_return_details`
  ADD PRIMARY KEY (`retdtl_id`);

--
-- Indexes for table `td_route`
--
ALTER TABLE `td_route`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `td_sales_bill`
--
ALTER TABLE `td_sales_bill`
  ADD PRIMARY KEY (`p_bill_id`);

--
-- Indexes for table `td_sales_item`
--
ALTER TABLE `td_sales_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `td_sales_payment`
--
ALTER TABLE `td_sales_payment`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `td_site_settings`
--
ALTER TABLE `td_site_settings`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `td_stock`
--
ALTER TABLE `td_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `td_store`
--
ALTER TABLE `td_store`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `td_store_allocate`
--
ALTER TABLE `td_store_allocate`
  ADD PRIMARY KEY (`st_al_id`);

--
-- Indexes for table `td_supplier`
--
ALTER TABLE `td_supplier`
  ADD PRIMARY KEY (`cl_id`);

--
-- Indexes for table `td_unit`
--
ALTER TABLE `td_unit`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `td_users`
--
ALTER TABLE `td_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_salary`
--
ALTER TABLE `employee_salary`
  MODIFY `emp_sal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `salary_detail`
--
ALTER TABLE `salary_detail`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `td_assign_route`
--
ALTER TABLE `td_assign_route`
  MODIFY `asign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `td_bank`
--
ALTER TABLE `td_bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `td_client`
--
ALTER TABLE `td_client`
  MODIFY `cl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1779;
--
-- AUTO_INCREMENT for table `td_company`
--
ALTER TABLE `td_company`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `td_employee`
--
ALTER TABLE `td_employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `td_expense`
--
ALTER TABLE `td_expense`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `td_finance`
--
ALTER TABLE `td_finance`
  MODIFY `finance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `td_incentives`
--
ALTER TABLE `td_incentives`
  MODIFY `inc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `td_inc_settings`
--
ALTER TABLE `td_inc_settings`
  MODIFY `incset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `td_purchase_bill`
--
ALTER TABLE `td_purchase_bill`
  MODIFY `p_bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `td_purchase_item`
--
ALTER TABLE `td_purchase_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `td_purchase_payment`
--
ALTER TABLE `td_purchase_payment`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `td_return_details`
--
ALTER TABLE `td_return_details`
  MODIFY `retdtl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `td_route`
--
ALTER TABLE `td_route`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `td_sales_bill`
--
ALTER TABLE `td_sales_bill`
  MODIFY `p_bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `td_sales_item`
--
ALTER TABLE `td_sales_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `td_sales_payment`
--
ALTER TABLE `td_sales_payment`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `td_site_settings`
--
ALTER TABLE `td_site_settings`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `td_stock`
--
ALTER TABLE `td_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `td_store`
--
ALTER TABLE `td_store`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `td_store_allocate`
--
ALTER TABLE `td_store_allocate`
  MODIFY `st_al_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `td_supplier`
--
ALTER TABLE `td_supplier`
  MODIFY `cl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `td_unit`
--
ALTER TABLE `td_unit`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `td_users`
--
ALTER TABLE `td_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
