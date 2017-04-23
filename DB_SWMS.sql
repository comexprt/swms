-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2016 at 03:52 AM
-- Server version: 5.6.28
-- PHP Version: 5.5.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DB_SWMS`
--

-- --------------------------------------------------------

--
-- Table structure for table `Bidding`
--

CREATE TABLE IF NOT EXISTS `Bidding` (
  `BId` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Venue` varchar(100) NOT NULL,
  `DceNo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Bidding_Details`
--

CREATE TABLE IF NOT EXISTS `Bidding_Details` (
  `Quatation` varchar(1000) NOT NULL,
  `WSid` int(11) NOT NULL,
  `PRId` varchar(20) NOT NULL,
  `SDceNo` varchar(20) NOT NULL,
  `BId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Delivery`
--

CREATE TABLE IF NOT EXISTS `Delivery` (
  `DId` int(11) NOT NULL,
  `Date_Delivered` date NOT NULL,
  `Received_By` varchar(20) NOT NULL,
  `Total_Amount` double NOT NULL,
  `Remarks` varchar(20) NOT NULL,
  `SDceNo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Delivery_Details`
--

CREATE TABLE IF NOT EXISTS `Delivery_Details` (
  `Qty_Delivered` int(11) NOT NULL,
  `Qty_Accepted` int(11) NOT NULL,
  `Delivery_Price` double NOT NULL,
  `WSid` int(11) NOT NULL,
  `DId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE IF NOT EXISTS `Employee` (
  `DceNo` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Fname` varchar(10) NOT NULL,
  `Mname` varchar(10) NOT NULL,
  `Lname` varchar(10) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `User_Access_Level` int(10) NOT NULL,
  `CcNo` int(10) NOT NULL,
  `Requisitioning_Section` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Fixed_Value`
--

CREATE TABLE IF NOT EXISTS `Fixed_Value` (
  `FvId` int(10) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Value` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Fixed_Value`
--

INSERT INTO `Fixed_Value` (`FvId`, `Name`, `Value`) VALUES
(1, 'Tel No.', '(063) 234-1234'),
(2, 'Fax No.', '(063) 567-5679'),
(3, 'Agus 7 PPMP Officer', 'Rolinette R. Daño'),
(4, 'Agus 6 PPMP Officer', 'Lorna L. Perez'),
(5, 'Plant Manager', 'Imman S. Pates'),
(6, 'Q.A Officer', 'Antonio Moncay'),
(7, 'VAT', '12%');

-- --------------------------------------------------------

--
-- Table structure for table `Purchase_Order`
--

CREATE TABLE IF NOT EXISTS `Purchase_Order` (
  `POId` varchar(10) NOT NULL,
  `Date_Approved` date NOT NULL,
  `Payment_method` varchar(100) NOT NULL,
  `Delivery_Period` varchar(100) NOT NULL,
  `PO_Amount` double NOT NULL,
  `SDceNo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Purchase_Order_Details`
--

CREATE TABLE IF NOT EXISTS `Purchase_Order_Details` (
  `Qty` int(11) NOT NULL,
  `PoId` int(11) NOT NULL,
  `WSid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Purchase_Request`
--

CREATE TABLE IF NOT EXISTS `Purchase_Request` (
  `PRid` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Remark` varchar(20) NOT NULL,
  `Date_Status_Changed` date NOT NULL,
  `Responsible_Person` int(11) NOT NULL,
  `DceNo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Purchase_Request_Details`
--

CREATE TABLE IF NOT EXISTS `Purchase_Request_Details` (
  `Qty` int(11) NOT NULL,
  `Estimated_Cost` int(11) NOT NULL,
  `PRId` varchar(20) NOT NULL,
  `WSid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Specifications`
--

CREATE TABLE IF NOT EXISTS `Specifications` (
  `SId` int(11) NOT NULL,
  `Specification` int(11) NOT NULL,
  `Value` int(11) NOT NULL,
  `WSid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Supplier`
--

CREATE TABLE IF NOT EXISTS `Supplier` (
  `SDceNo` varchar(10) NOT NULL,
  `Supplier_Name` varchar(150) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `Tel_No` varchar(10) NOT NULL,
  `Fax_No` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Supplier`
--

INSERT INTO `Supplier` (`SDceNo`, `Supplier_Name`, `Address`, `Tel_No`, `Fax_No`) VALUES
('0038336', 'Qualitron Contruction & Industrial Supplies', 'Purok san Miguel, Tubod Iligan City', '222-0343', '222-3434'),
('0038337', 'Ched Coco Lumber & Construction Supply', 'Tibanga, Iligan City, Lanao del Norte', 'Tibanga, I', 'none'),
('0038338', 'Trinity Blocks & Construction Supply', 'Tambo, Iligan City, Lanao del Norte', '(063) 221 ', 'None'),
('0038339', 'Loremar Construction Supply', 'Linamon Bridge, Iligan City, 9200 Lanao del Norte', '(063) 227 ', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `Warehouse_Spares`
--

CREATE TABLE IF NOT EXISTS `Warehouse_Spares` (
  `WSid` int(10) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `Spare_Name` varchar(100) NOT NULL,
  `Description` varchar(150) NOT NULL,
  `Quantity_onHand` int(11) NOT NULL,
  `Quantity_onOrder` int(11) NOT NULL,
  `ReOrdering_Pt` int(11) NOT NULL,
  `Delivery_Price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Withdrawal_Request`
--

CREATE TABLE IF NOT EXISTS `Withdrawal_Request` (
  `WRid` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Released_by` int(11) NOT NULL,
  `DceNo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Withdrawal_Request_Details`
--

CREATE TABLE IF NOT EXISTS `Withdrawal_Request_Details` (
  `Qty_Requested` int(11) NOT NULL,
  `Qty_Released` int(11) NOT NULL,
  `WSid` int(11) NOT NULL,
  `WRid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Bidding`
--
ALTER TABLE `Bidding`
  ADD PRIMARY KEY (`BId`);

--
-- Indexes for table `Delivery`
--
ALTER TABLE `Delivery`
  ADD PRIMARY KEY (`DId`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`DceNo`);

--
-- Indexes for table `Fixed_Value`
--
ALTER TABLE `Fixed_Value`
  ADD PRIMARY KEY (`FvId`);

--
-- Indexes for table `Purchase_Order`
--
ALTER TABLE `Purchase_Order`
  ADD PRIMARY KEY (`POId`);

--
-- Indexes for table `Purchase_Request`
--
ALTER TABLE `Purchase_Request`
  ADD PRIMARY KEY (`PRid`);

--
-- Indexes for table `Supplier`
--
ALTER TABLE `Supplier`
  ADD PRIMARY KEY (`SDceNo`);

--
-- Indexes for table `Warehouse_Spares`
--
ALTER TABLE `Warehouse_Spares`
  ADD PRIMARY KEY (`WSid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Bidding`
--
ALTER TABLE `Bidding`
  MODIFY `BId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Delivery`
--
ALTER TABLE `Delivery`
  MODIFY `DId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Fixed_Value`
--
ALTER TABLE `Fixed_Value`
  MODIFY `FvId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Warehouse_Spares`
--
ALTER TABLE `Warehouse_Spares`
  MODIFY `WSid` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
