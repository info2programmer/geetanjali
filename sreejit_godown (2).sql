-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2017 at 01:34 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sreejit_godown`
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
(2, 2, 10000, 0);

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
(1, '1', '1', '2017-04-01', '2017-04-20', 'superadmin', 1, '2017-04-20', '0'),
(2, '2', '2', '2017-04-01', '2017-04-20', 'superadmin', 1, '2017-04-20', '0');

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
(1, 'S.K. Singh', 'ss@mail.com', '784564546', '45212121', 'test address', '2017-04-19', 'superadmin', '4547545'),
(2, 'P Poddar', 'pp@mail.com', '45412321', '12541321', 'test address', '2017-04-19', 'superadmin', '45642132154');

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
(1, 'Sales', 'p 1', '12345612345', 'p1@mail.com', 'Sales Person', 'test address', 'Chrysanthemum.jpg', '2017-04-19', 'superadmin', 10000),
(2, 'Sales', 'P 2', '4564561234', 'p2@mail.com', 'Sales Person', 'test address', 'Desert.jpg', '2017-04-19', 'superadmin', 10000);

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
(1, 'Dinner', '2017-04-06', '200', '2017-04-19', 'superadmin', '10000');

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
(1, 1, '01234', 'CB/P/11904', 'LF/P/11904', 'Purchase', 'Debit', 17500, '2017-04-19'),
(2, 1, '01234', 'CB/PR/11904', 'LF/PR/11904', 'Purchase Return', 'Credit', 1000, '2017-04-19'),
(3, 1, '00000001', 'CB/S/11904', 'LF/S/11904', 'Sale', 'Credit', 2590, '2017-04-19'),
(4, 1, '00000001', 'CB/CB/1904', 'LF/CB/1904', 'Bill Cancel', 'Debit', 2590, '2017-04-19'),
(5, 2, '00000002', 'CB/S/21904', 'LF/S/21904', 'Sale', 'Credit', 2600, '2017-04-19'),
(6, 2, '00000002', 'CB/SR/21904', 'LF/SR/21904', 'Sale Return', 'Debit', 295, '2017-04-19'),
(7, 2, '00000002', 'CB/SR/21904', 'LF/SR/21904', 'Sale Return', 'Debit', 380, '2017-04-19'),
(8, 2, '00000002', 'CB/SR/21904', 'LF/SR/21904', 'Sale Return', 'Debit', 625, '2017-04-19'),
(9, 1, 'NA', 'CB/E/11904', 'LF/E/11904', 'Expense', 'Debit', 200, '2017-04-06'),
(10, 0, 'NA', 'CB/E/ADV1904', 'CB/E/ADV1904', 'Advance Expense', 'Credit', 10000, '2017-04-06'),
(11, 3, '00000003', 'CB/S/31904', 'LF/S/31904', 'Sale', 'Credit', 750, '2017-04-19'),
(12, 4, '00000004', 'CB/S/41904', 'LF/S/41904', 'Sale', 'Credit', 550, '2017-04-19'),
(13, 1, 'NA', 'CB/I/11904', 'LF/I/11904', 'Incentive', 'Debit', 17.48, '2017-04-19'),
(14, 5, '00000005', 'CB/S/51904', 'LF/S/51904', 'Sale', 'Credit', 5250, '2017-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `td_incentives`
--

CREATE TABLE `td_incentives` (
  `inc_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `inc_range` varchar(255) NOT NULL,
  `extra_price_unit` varchar(255) NOT NULL,
  `incentives_unit` varchar(255) NOT NULL,
  `incentive_item_total` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `earn_date` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_incentives`
--

INSERT INTO `td_incentives` (`inc_id`, `emp_id`, `inc_range`, `extra_price_unit`, `incentives_unit`, `incentive_item_total`, `item_name`, `bill_no`, `earn_date`, `status`) VALUES
(1, 1, '0.2', '4', '0.2', '1.18', 'RICE', '2', '2017-04-19', 1),
(2, 1, '0.5', '1', '0.5', '3.8', 'MUNG DAAL', '2', '2017-04-19', 1),
(3, 1, '1', '5', '1', '12.5', 'MUSTERED OIL', '2', '2017-04-19', 1);

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
(1, '50-55', 0.1, 50, 55, '2017-04-19', 'superadmin'),
(2, '55-60', 0.2, 55, 60, '2017-04-19', 'superadmin'),
(3, '60-65', 0.3, 60, 65, '2017-04-19', 'superadmin'),
(4, '65-78', 0.5, 65, 78, '2017-04-19', 'superadmin'),
(5, '110-150', 1, 110, 150, '2017-04-19', 'superadmin');

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
(1, '01234', 17500, '16500', '2017-04-01', 'superadmin', '2017-04-19 14:47:35', '1', '2', 1, '1000', '6500', 1, '19000');

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
('RICE', '50', 80, '4000', '5500', '0', '1', '5500', 1, 1, '55', '55', '2017-04-19', 'warm', '20', '1000', '100', '5000', 'Purchase'),
('MUNG DAAL', '70', 100, '7000', '7500', '0', '1', '7500', 2, 1, '75', '75', NULL, NULL, NULL, NULL, '100', '7000', ''),
('MUSTERED OIL', '110', 50, '5500', '6000', '0', '4', '6000', 3, 1, '120', '120', NULL, NULL, NULL, NULL, '50', '5500', '');

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
  `next_pay_date` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_purchase_payment`
--

INSERT INTO `td_purchase_payment` (`sp_id`, `bill_no`, `payable_amt`, `paid_amt`, `pay_date`, `notify`, `amt_due`, `particular`, `next_pay_date`) VALUES
(1, '01234', 16500, 10000, '2017-04-15', 1, 6500, 'Payment Day of #01234', '2017-04-20');

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
(1, 1, '2017-04-19', 'warm', '20', '1000', 'Purchase'),
(2, 2, '2017-04-19', 'No Need', '5', '295', 'Sales'),
(3, 3, '2017-04-19', 'No Need', '5', '380', 'Sales'),
(4, 4, '2017-04-19', 'No Need', '5', '625', 'Sales');

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
(1, 'Route 1', 'RT 1', 'test addrs', '2017-04-19', 'superadmin'),
(2, 'Route 2', 'RT 2', 'test address', '2017-04-19', 'superadmin');

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
(1, '00000001', 0, 2590, '2590', '2017-04-05', 'superadmin', '2017-04-19 14:56:57', '1', '2', 0, NULL, '1', 0, 0, 1),
(2, '00000002', 0, 2600, '1300', '2017-04-05', 'superadmin', '2017-04-19 15:09:09', '2', '2', 1, '625', '1', 0, 0, 0),
(3, '00000003', 0, 750, '750', '2017-04-14', 'superadmin', '2017-04-19 15:28:37', '3', '2', 0, NULL, '1', 0, 0, 0),
(4, '00000004', 0, 550, '550', '2017-04-12', 'superadmin', '2017-04-19 15:29:56', '4', '2', 0, NULL, '2', 350, 1, 0),
(5, '00000005', 0, 5250, '5250', '2017-04-19', 'superadmin', '2017-04-19 17:34:45', '5', '1', 0, NULL, '2', 0, 0, 0);

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

INSERT INTO `td_sales_item` (`item_name`, `item_unit_p_price`, `item_p_qty`, `item_p_total_amt`, `item_s_price`, `item_s_gst`, `item_p_unit`, `item_s_total`, `item_id`, `pid`, `item_single_sale_wgst`, `item_single_sale_wogst`, `ret_date`, `remark`, `return_unit`, `return_price`, `itempqtyorig`, `itempamtorig`) VALUES
('RICE', '60', 10, '600', '0', '0', '1', '600', 1, 1, '60', '0', NULL, NULL, NULL, NULL, '10', '600'),
('RICE', '59', 5, '295', '0', '0', '1', '295', 2, 2, '59', '0', '2017-04-19', 'No Need', '5', '295', '10', '590'),
('MUNG DAAL', '76', 5, '380', '0', '0', '1', '380', 3, 2, '76', '0', '2017-04-19', 'No Need', '5', '380', '10', '760'),
('MUSTERED OIL', '125', 5, '625', '0', '0', '4', '625', 4, 2, '125', '0', '2017-04-19', 'No Need', '5', '625', '10', '1250'),
('MUNG DAAL', '75', 10, '750', '0', '0', '1', '750', 5, 3, '75', '0', NULL, NULL, NULL, NULL, '10', '750'),
('RICE', '55', 10, '550', '0', '0', '1', '550', 6, 4, '55', '0', NULL, NULL, NULL, NULL, '10', '550'),
('RICE', '60', 50, '3000', '0', '0', '1', '3000', 7, 5, '60', '0', NULL, NULL, NULL, NULL, '50', '3000');

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
  `next_pay_date` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_sales_payment`
--

INSERT INTO `td_sales_payment` (`sp_id`, `bill_no`, `payable_amt`, `paid_amt`, `pay_date`, `notify`, `amt_due`, `particular`, `next_pay_date`) VALUES
(1, '00000002', 1300, 1300, '2017-04-20', 0, 0, 'Payment All Clear of #00000002', ''),
(2, '00000004', 550, 200, '2017-04-20', 1, 350, 'Payment Collection Day of #00000004', '2017-04-21');

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
(1, 'RICE', '15', '1', 0),
(2, 'MUNG DAAL', '85', '1', 0),
(3, 'MUSTERED OIL', '45', '4', 0);

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

--
-- Dumping data for table `td_store`
--

INSERT INTO `td_store` (`st_id`, `stname`, `stno`, `stkeep`, `addate`, `adby`) VALUES
(1, 'Store 1', 'st 1', '2', '2017-04-19', 'superadmin'),
(2, 'Store 2', 'st 2', '1', '2017-04-19', 'superadmin');

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

--
-- Dumping data for table `td_store_allocate`
--

INSERT INTO `td_store_allocate` (`st_al_id`, `stname`, `item_name`, `addate`, `adby`) VALUES
(1, 1, 'RICE', '2017-04-19', 'superadmin'),
(2, 1, 'MUNG DAAL', '2017-04-19', 'superadmin'),
(3, 2, 'MUSTERED OIL', '2017-04-19', 'superadmin');

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
(1, 'B.C. Sen', 'bcs@mail.com', '451221545', '78754878', '120515421', 'test address', 'superadmin', '2017-04-19'),
(2, 'D Sen', 'ds@mail.com', '785548451', '12154541', '454721151', 'test address', 'superadmin', '2017-04-19');

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
(3, 'superadmin', '81dc9bdb52d04dc20036dbd8313ed055', '1234', '', '', '', 1);

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
  MODIFY `emp_sal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `salary_detail`
--
ALTER TABLE `salary_detail`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `td_assign_route`
--
ALTER TABLE `td_assign_route`
  MODIFY `asign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `td_bank`
--
ALTER TABLE `td_bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `td_client`
--
ALTER TABLE `td_client`
  MODIFY `cl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `td_company`
--
ALTER TABLE `td_company`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `td_employee`
--
ALTER TABLE `td_employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `td_expense`
--
ALTER TABLE `td_expense`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `td_finance`
--
ALTER TABLE `td_finance`
  MODIFY `finance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `td_incentives`
--
ALTER TABLE `td_incentives`
  MODIFY `inc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `td_inc_settings`
--
ALTER TABLE `td_inc_settings`
  MODIFY `incset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `td_purchase_bill`
--
ALTER TABLE `td_purchase_bill`
  MODIFY `p_bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `td_purchase_item`
--
ALTER TABLE `td_purchase_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `td_purchase_payment`
--
ALTER TABLE `td_purchase_payment`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `td_return_details`
--
ALTER TABLE `td_return_details`
  MODIFY `retdtl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `td_route`
--
ALTER TABLE `td_route`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `td_sales_bill`
--
ALTER TABLE `td_sales_bill`
  MODIFY `p_bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `td_sales_item`
--
ALTER TABLE `td_sales_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `td_sales_payment`
--
ALTER TABLE `td_sales_payment`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `td_store_allocate`
--
ALTER TABLE `td_store_allocate`
  MODIFY `st_al_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `td_supplier`
--
ALTER TABLE `td_supplier`
  MODIFY `cl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
