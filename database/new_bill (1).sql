-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 20, 2017 at 01:14 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_bill`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary`
--

DROP TABLE IF EXISTS `employee_salary`;
CREATE TABLE IF NOT EXISTS `employee_salary` (
  `emp_sal_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `present_sal` float NOT NULL,
  `prev_sal` float NOT NULL,
  PRIMARY KEY (`emp_sal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `salary_detail`
--

DROP TABLE IF EXISTS `salary_detail`;
CREATE TABLE IF NOT EXISTS `salary_detail` (
  `salary_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `salary_date` varchar(250) NOT NULL,
  `salary_amt` float NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`salary_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daily_wage`
--

DROP TABLE IF EXISTS `tbl_daily_wage`;
CREATE TABLE IF NOT EXISTS `tbl_daily_wage` (
  `wage_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `emp_id` int(11) NOT NULL,
  `wage` float NOT NULL,
  `work` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `project_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`wage_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_daily_wage`
--

INSERT INTO `tbl_daily_wage` (`wage_id`, `date`, `emp_id`, `wage`, `work`, `type`, `project_id`, `company_id`) VALUES
(1, '2017-12-18', 1, 500, 'For Daily Wage', 'Advance', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deduction_history`
--

DROP TABLE IF EXISTS `tbl_deduction_history`;
CREATE TABLE IF NOT EXISTS `tbl_deduction_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `particulars` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_deduction_history`
--

INSERT INTO `tbl_deduction_history` (`id`, `project_id`, `company_id`, `amount`, `particulars`, `date`, `time`) VALUES
(1, 1, 1, 33000, 'Purchase Invoice- INVOICE123654 and deduct amount 33000', '2017-12-18', '09:37:32'),
(2, 1, 1, 250, 'Pay Employee With Id- 1 and deduct amount 250', '2017-12-18', '09:57:54'),
(5, 1, 1, 30000, 'Purchase Invoice- INVOICE123654 and deduct amount 30000', '2017-12-20', '11:54:10'),
(4, 1, 1, 100, 'Pay Employee With Id- 1 and deduct amount 100', '2017-12-18', '10:43:40'),
(6, 1, 1, 30000, 'Purchase Invoice- INVOICE123654 and deduct amount 30000', '2017-12-20', '11:58:54'),
(7, 1, 1, 10000, 'Purchase Invoice- INVOICE123654 and deduct amount 10000', '2017-12-20', '12:06:09'),
(8, 1, 1, 500, 'Purchase Invoice- INVOICE4525 and deduct amount 500', '2017-12-20', '12:09:01'),
(9, 1, 1, 20, 'Purchase Invoice- INVOICE4525 and deduct amount 20', '2017-12-20', '12:12:00'),
(10, 1, 1, 20, 'Purchase Invoice- INVOICE4525 and deduct amount 20', '2017-12-20', '12:16:11'),
(11, 1, 1, 20, 'Purchase Invoice- INVOICE4525 and deduct amount 20', '2017-12-20', '12:16:16'),
(12, 1, 1, 20, 'Purchase Invoice- INVOICE4525 and deduct amount 20', '2017-12-20', '12:16:19'),
(13, 1, 1, 20000, 'Purchase Invoice- INVOICE123654 and deduct amount 20000', '2017-12-20', '12:16:55'),
(14, 1, 1, 500, 'Purchase Invoice- INVOICE123654 and deduct amount 500', '2017-12-20', '12:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

DROP TABLE IF EXISTS `tbl_item`;
CREATE TABLE IF NOT EXISTS `tbl_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) NOT NULL,
  `cgst` int(11) NOT NULL,
  `sgst` int(11) NOT NULL,
  `igst` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_data`
--

DROP TABLE IF EXISTS `tbl_payment_data`;
CREATE TABLE IF NOT EXISTS `tbl_payment_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foregin_wage_id` int(11) NOT NULL,
  `paid_amount` float NOT NULL,
  `due_amount` float NOT NULL,
  `payment_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment_data`
--

INSERT INTO `tbl_payment_data` (`id`, `foregin_wage_id`, `paid_amount`, `due_amount`, `payment_date`) VALUES
(1, 1, 500, 0, '2017-12-18 15:27:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

DROP TABLE IF EXISTS `tbl_project`;
CREATE TABLE IF NOT EXISTS `tbl_project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) NOT NULL,
  `Project_value` float NOT NULL,
  `current_amount` float NOT NULL,
  `project_invoice` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_project`
--

INSERT INTO `tbl_project` (`project_id`, `project_name`, `Project_value`, `current_amount`, `project_invoice`, `company_id`) VALUES
(1, 'Villa-Project', 2500000, 2315570, 'dummy-invoice-template-dummy-invoice-template-printable-invoice-template-your-sourche-for-dummy-blank-pdf-fr-word-example-iafeoq-FirYnA.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `td_assign_route`
--

DROP TABLE IF EXISTS `td_assign_route`;
CREATE TABLE IF NOT EXISTS `td_assign_route` (
  `asign_id` int(11) NOT NULL AUTO_INCREMENT,
  `empname` varchar(100) NOT NULL,
  `rname` varchar(100) NOT NULL,
  `rdate` varchar(100) NOT NULL,
  `addate` varchar(100) NOT NULL,
  `adby` varchar(150) NOT NULL,
  `active` int(11) NOT NULL,
  `active_date` varchar(200) NOT NULL,
  `inactive_date` varchar(200) NOT NULL,
  PRIMARY KEY (`asign_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `td_bank`
--

DROP TABLE IF EXISTS `td_bank`;
CREATE TABLE IF NOT EXISTS `td_bank` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `acc_no` varchar(255) NOT NULL,
  `ifsc_no` varchar(100) NOT NULL,
  `micr_no` varchar(100) NOT NULL,
  `addate` varchar(255) NOT NULL,
  `adby` varchar(255) NOT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `td_client`
--

DROP TABLE IF EXISTS `td_client`;
CREATE TABLE IF NOT EXISTS `td_client` (
  `cl_id` int(11) NOT NULL AUTO_INCREMENT,
  `clname` varchar(255) NOT NULL,
  `clemail` varchar(255) NOT NULL,
  `clphn` varchar(255) NOT NULL,
  `clpan` varchar(255) NOT NULL,
  `cladd` text NOT NULL,
  `addate` varchar(255) NOT NULL,
  `adby` varchar(255) NOT NULL,
  `cgst` varchar(255) NOT NULL,
  PRIMARY KEY (`cl_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `td_company`
--

DROP TABLE IF EXISTS `td_company`;
CREATE TABLE IF NOT EXISTS `td_company` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(255) NOT NULL,
  `cemail` varchar(255) NOT NULL,
  `cphn` varchar(255) NOT NULL,
  `cpan` varchar(255) NOT NULL,
  `cgst` varchar(255) NOT NULL,
  `cadd` text NOT NULL,
  `pic` varchar(255) NOT NULL,
  `addate` varchar(255) NOT NULL,
  `adby` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `td_employee`
--

DROP TABLE IF EXISTS `td_employee`;
CREATE TABLE IF NOT EXISTS `td_employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emptype` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phn` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `empdesig` varchar(255) DEFAULT NULL,
  `addrs` text,
  `pic` varchar(255) DEFAULT NULL,
  `addate` varchar(255) DEFAULT NULL,
  `adby` varchar(255) DEFAULT NULL,
  `emp_sal` int(11) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_employee`
--

INSERT INTO `td_employee` (`emp_id`, `emptype`, `name`, `phn`, `email`, `empdesig`, `addrs`, `pic`, `addate`, `adby`, `emp_sal`, `company_id`) VALUES
(1, NULL, 'Samsul Hauk', '9547639854', 'na@na.com', 'PAN1236547896', '123 Demo Street', 'demo-image .jpg', '2017-12-18', 'geetanjali', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `td_expense`
--

DROP TABLE IF EXISTS `td_expense`;
CREATE TABLE IF NOT EXISTS `td_expense` (
  `exp_id` int(11) NOT NULL AUTO_INCREMENT,
  `expname` varchar(255) NOT NULL,
  `expdate` varchar(255) NOT NULL,
  `expamnt` varchar(255) NOT NULL,
  `addate` varchar(255) NOT NULL,
  `adby` varchar(255) NOT NULL,
  `advance` varchar(255) NOT NULL,
  PRIMARY KEY (`exp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `td_finance`
--

DROP TABLE IF EXISTS `td_finance`;
CREATE TABLE IF NOT EXISTS `td_finance` (
  `finance_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) NOT NULL,
  `bill_no` varchar(250) NOT NULL,
  `cb_no` varchar(250) NOT NULL,
  `lf_no` varchar(250) NOT NULL,
  `finance_type` varchar(250) NOT NULL,
  `transaction_type` varchar(250) NOT NULL,
  `amount` float NOT NULL,
  `entry_date` varchar(250) NOT NULL,
  PRIMARY KEY (`finance_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_finance`
--

INSERT INTO `td_finance` (`finance_id`, `bill_id`, `bill_no`, `cb_no`, `lf_no`, `finance_type`, `transaction_type`, `amount`, `entry_date`) VALUES
(1, 1, 'INVOICE123654', 'CB/P/11812', 'LF/P/11812', 'Purchase', 'Debit', 30000, '2017-12-18'),
(2, 2, 'INV09092514', 'CB/P/22012', 'LF/P/22012', 'Purchase', 'Debit', 1500, '2017-12-20'),
(3, 3, 'INVOICE4525', 'CB/P/32012', 'LF/P/32012', 'Purchase', 'Debit', 1000, '2017-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `td_incentives`
--

DROP TABLE IF EXISTS `td_incentives`;
CREATE TABLE IF NOT EXISTS `td_incentives` (
  `inc_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `inc_range` varchar(255) DEFAULT NULL,
  `extra_price_unit` varchar(255) DEFAULT NULL,
  `incentives_unit` varchar(255) DEFAULT NULL,
  `incentive_item_total` varchar(255) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `bill_no` varchar(255) DEFAULT NULL,
  `earn_date` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`inc_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `td_inc_settings`
--

DROP TABLE IF EXISTS `td_inc_settings`;
CREATE TABLE IF NOT EXISTS `td_inc_settings` (
  `incset_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_range` varchar(255) NOT NULL,
  `inc_per` float NOT NULL,
  `min_range` int(11) NOT NULL,
  `max_range` int(11) NOT NULL,
  `addate` varchar(255) NOT NULL,
  `adby` varchar(255) NOT NULL,
  PRIMARY KEY (`incset_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `td_purchase_bill`
--

DROP TABLE IF EXISTS `td_purchase_bill`;
CREATE TABLE IF NOT EXISTS `td_purchase_bill` (
  `p_bill_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `p_bill_total_sale` varchar(255) NOT NULL,
  `invoice_img` varchar(255) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `request_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`p_bill_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_purchase_bill`
--

INSERT INTO `td_purchase_bill` (`p_bill_id`, `p_bill_no`, `purchase_total`, `p_bill_total`, `p_bill_date`, `p_bill_creator`, `p_bill_creation_date`, `sl_no`, `supplier_name`, `returnstat`, `returnAmt`, `due_amt`, `notify`, `p_bill_total_sale`, `invoice_img`, `company_id`, `project_id`, `request_status`) VALUES
(1, 'INVOICE123654', 30000, '30000', '2017-12-18', 'geetanjali', '2017-12-18 09:37:32', '1', '1', 0, NULL, '9500', 0, '33000', 'dummy-invoice-template-dummy-invoice-template-printable-invoice-template-your-sourche-for-dummy-blank-pdf-fr-word-example-iafeoq-FirYnA1513589852.jpg', 1, 1, 1),
(3, 'INVOICE4525', 1000, '1000', '2017-12-20', 'geetanjali', '2017-12-20 12:04:01', '2', '1', 0, NULL, '420', 0, '1100', 'dummy-invoice-template-dummy-invoice-template-printable-invoice-template-your-sourche-for-dummy-blank-pdf-fr-word-example-iafeoq-FirYnA1513771441.jpg', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `td_purchase_item`
--

DROP TABLE IF EXISTS `td_purchase_item`;
CREATE TABLE IF NOT EXISTS `td_purchase_item` (
  `item_name` text NOT NULL,
  `item_unit_p_price` varchar(255) NOT NULL,
  `item_p_qty` int(11) NOT NULL,
  `item_p_total_amt` varchar(255) NOT NULL,
  `item_s_price` varchar(255) NOT NULL,
  `item_s_gst` varchar(255) NOT NULL,
  `item_p_unit` varchar(255) NOT NULL,
  `item_s_total` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `item_single_sale_wgst` varchar(255) NOT NULL,
  `item_single_sale_wogst` varchar(255) NOT NULL,
  `ret_date` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `return_unit` varchar(255) DEFAULT NULL,
  `return_price` varchar(255) DEFAULT NULL,
  `itempqtyorig` varchar(255) NOT NULL,
  `itempamtorig` varchar(255) NOT NULL,
  `item_s_sgst` varchar(250) NOT NULL,
  `return_type` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_purchase_item`
--

INSERT INTO `td_purchase_item` (`item_name`, `item_unit_p_price`, `item_p_qty`, `item_p_total_amt`, `item_s_price`, `item_s_gst`, `item_p_unit`, `item_s_total`, `item_id`, `pid`, `item_single_sale_wgst`, `item_single_sale_wogst`, `ret_date`, `remark`, `return_unit`, `return_price`, `itempqtyorig`, `itempamtorig`, `item_s_sgst`, `return_type`, `company_id`) VALUES
('Iron Rod', '2500', 12, '30000', '30000', '5', '2', '33000', 1, 1, '2750', '2500', NULL, NULL, NULL, NULL, '12', '30000', '5', '', 1),
('Iron Rod', '500', 2, '1000', '1000', '5', '2', '1100', 3, 3, '550', '500', NULL, NULL, NULL, NULL, '2', '1000', '5', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `td_purchase_payment`
--

DROP TABLE IF EXISTS `td_purchase_payment`;
CREATE TABLE IF NOT EXISTS `td_purchase_payment` (
  `sp_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no` varchar(200) NOT NULL,
  `payable_amt` float NOT NULL,
  `paid_amt` float NOT NULL,
  `pay_date` varchar(255) NOT NULL,
  `notify` int(11) NOT NULL,
  `amt_due` float NOT NULL,
  `particular` text NOT NULL,
  `next_pay_date` varchar(255) DEFAULT NULL,
  `pay_through` varchar(255) NOT NULL,
  `trans_no` varchar(255) NOT NULL,
  PRIMARY KEY (`sp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `td_return_details`
--

DROP TABLE IF EXISTS `td_return_details`;
CREATE TABLE IF NOT EXISTS `td_return_details` (
  `retdtl_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `ret_date` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `return_unit` varchar(255) NOT NULL,
  `return_price` varchar(255) NOT NULL,
  `return_type` varchar(255) NOT NULL,
  PRIMARY KEY (`retdtl_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `td_route`
--

DROP TABLE IF EXISTS `td_route`;
CREATE TABLE IF NOT EXISTS `td_route` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `rname` varchar(255) NOT NULL,
  `rno` varchar(200) NOT NULL,
  `rdtl` text NOT NULL,
  `addate` varchar(255) NOT NULL,
  `adby` varchar(255) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `td_sales_bill`
--

DROP TABLE IF EXISTS `td_sales_bill`;
CREATE TABLE IF NOT EXISTS `td_sales_bill` (
  `p_bill_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `stat` int(11) NOT NULL,
  PRIMARY KEY (`p_bill_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `td_sales_item`
--

DROP TABLE IF EXISTS `td_sales_item`;
CREATE TABLE IF NOT EXISTS `td_sales_item` (
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
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `item_single_sale_wgst` varchar(255) NOT NULL,
  `item_single_sale_wogst` varchar(255) NOT NULL,
  `ret_date` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `return_unit` varchar(255) DEFAULT NULL,
  `return_price` varchar(255) DEFAULT NULL,
  `itempqtyorig` varchar(255) NOT NULL,
  `itempamtorig` varchar(255) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `td_sales_payment`
--

DROP TABLE IF EXISTS `td_sales_payment`;
CREATE TABLE IF NOT EXISTS `td_sales_payment` (
  `sp_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no` varchar(200) NOT NULL,
  `payable_amt` float NOT NULL,
  `paid_amt` float NOT NULL,
  `pay_date` varchar(255) NOT NULL,
  `notify` int(11) NOT NULL,
  `amt_due` float NOT NULL,
  `particular` text NOT NULL,
  `next_pay_date` varchar(255) DEFAULT NULL,
  `pay_through` varchar(255) NOT NULL,
  `trans_no` varchar(255) NOT NULL,
  PRIMARY KEY (`sp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `td_site_settings`
--

DROP TABLE IF EXISTS `td_site_settings`;
CREATE TABLE IF NOT EXISTS `td_site_settings` (
  `site_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `instragram_link` varchar(250) NOT NULL,
  PRIMARY KEY (`site_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_stock`
--

DROP TABLE IF EXISTS `td_stock`;
CREATE TABLE IF NOT EXISTS `td_stock` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_item` varchar(255) NOT NULL,
  `stock_qty` varchar(255) NOT NULL,
  `stock_unit` varchar(200) NOT NULL,
  `store_name` int(11) NOT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_stock`
--

INSERT INTO `td_stock` (`stock_id`, `stock_item`, `stock_qty`, `stock_unit`, `store_name`) VALUES
(1, 'Iron Rod', '14', '2', 0),
(2, 'Bricks', '1', '2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `td_store`
--

DROP TABLE IF EXISTS `td_store`;
CREATE TABLE IF NOT EXISTS `td_store` (
  `st_id` int(11) NOT NULL AUTO_INCREMENT,
  `stname` varchar(255) NOT NULL,
  `stno` varchar(255) NOT NULL,
  `stkeep` varchar(200) NOT NULL,
  `addate` varchar(255) NOT NULL,
  `adby` varchar(255) NOT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `td_store_allocate`
--

DROP TABLE IF EXISTS `td_store_allocate`;
CREATE TABLE IF NOT EXISTS `td_store_allocate` (
  `st_al_id` int(11) NOT NULL AUTO_INCREMENT,
  `stname` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `addate` varchar(255) NOT NULL,
  `adby` varchar(255) NOT NULL,
  PRIMARY KEY (`st_al_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `td_supplier`
--

DROP TABLE IF EXISTS `td_supplier`;
CREATE TABLE IF NOT EXISTS `td_supplier` (
  `cl_id` int(11) NOT NULL AUTO_INCREMENT,
  `clname` varchar(255) NOT NULL,
  `clemail` varchar(255) NOT NULL,
  `clphn` varchar(255) NOT NULL,
  `clpan` varchar(255) NOT NULL,
  `cgst` varchar(255) NOT NULL,
  `cladd` text NOT NULL,
  `adby` varchar(255) NOT NULL,
  `addate` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`cl_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_supplier`
--

INSERT INTO `td_supplier` (`cl_id`, `clname`, `clemail`, `clphn`, `clpan`, `cgst`, `cladd`, `adby`, `addate`, `company_id`) VALUES
(1, 'Krishna Hardware', 'kh@gmail.com', '9547763998', 'PAN0321456987', '1236547896', '123, Demo Street', 'geetanjali', '2017-12-18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `td_unit`
--

DROP TABLE IF EXISTS `td_unit`;
CREATE TABLE IF NOT EXISTS `td_unit` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `stname` varchar(200) NOT NULL,
  `addate` varchar(255) NOT NULL,
  `adby` varchar(255) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `td_unit`
--

INSERT INTO `td_unit` (`uid`, `stname`, `addate`, `adby`) VALUES
(1, 'Pics', '2017-12-18', 'geetanjali'),
(2, 'Kg', '2017-12-18', 'geetanjali'),
(3, 'Grm', '2017-12-18', 'geetanjali');

-- --------------------------------------------------------

--
-- Table structure for table `td_users`
--

DROP TABLE IF EXISTS `td_users`;
CREATE TABLE IF NOT EXISTS `td_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_original` varchar(250) NOT NULL,
  `ip_address` varchar(250) NOT NULL,
  `last_login` varchar(250) NOT NULL,
  `last_browser_used` varchar(250) NOT NULL,
  `published` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `td_users`
--

INSERT INTO `td_users` (`id`, `company_name`, `username`, `password`, `password_original`, `ip_address`, `last_login`, `last_browser_used`, `published`) VALUES
(1, 'Geetanjali', 'geetanjali', '21232f297a57a5a743894a0e4a801fc3', 'admin', '::1', '2017-03-16 06:59:29am', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 1),
(2, 'Other', 'other', '21232f297a57a5a743894a0e4a801fc3', 'admin', '', '', '', 1),
(3, '', 'superadmin', 'fd80b4bd63457b0dbee2e3c90eb6de52', 'mishrabrothers', '', '', '', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
