-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 24, 2023 at 02:25 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims_tan`
--

-- --------------------------------------------------------

--
-- Table structure for table `catogory`
--

DROP TABLE IF EXISTS `catogory`;
CREATE TABLE IF NOT EXISTS `catogory` (
  `Cat_ID` varchar(10) NOT NULL,
  `Cat_Name` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`Cat_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `catogory`
--

INSERT INTO `catogory` (`Cat_ID`, `Cat_Name`) VALUES
('Cat_1', 'Desktop'),
('Cat_2', 'Laptop'),
('Cat_3', 'Mouse'),
('Cat_4', 'Monitor');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `Cus_ID` varchar(10) NOT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  `Address1` varchar(255) DEFAULT NULL,
  `pswd1` varchar(100) NOT NULL,
  `position` varchar(15) NOT NULL,
  `pic` mediumblob NOT NULL,
  PRIMARY KEY (`Cus_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Cus_ID`, `UserName`, `Email`, `Phone`, `Address1`, `pswd1`, `position`, `pic`) VALUES
('Cus_0', 'Online', '', '', '', '', 'User', ''),
('Cus_1', 'Shyaman', 'shyamansuresh@gmail.com', '+94719242999', 'Tissamaharama', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 0x2e2e2f496d6167652f6d2e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `EMP_ID` varchar(10) NOT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Job_Title` varchar(30) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Email` varchar(25) DEFAULT NULL,
  `pswd1` varchar(100) NOT NULL,
  `position` varchar(20) NOT NULL,
  `pic` mediumblob NOT NULL,
  PRIMARY KEY (`EMP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMP_ID`, `UserName`, `Job_Title`, `Address`, `Phone`, `Email`, `pswd1`, `position`, `pic`) VALUES
('EMP_1', 'Admin', 'Owner', 'Tissamaharama', '0719242999', 'shyamansuresh@gmail.com', 'a22efb40cdf38e42897051edd9b23724', 'Super Admin', 0x2e2e2f496d6167652f6d2e706e67),
('EMP_2', 'P.H.S.Shyaman', 'Co-founder', 'Tissamaharama', '0719242999', 'shyaman@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', 0x2e2e2f496d6167652f6d2e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `Inv_ID` varchar(10) NOT NULL,
  `Order_ID` varchar(10) DEFAULT NULL,
  `Invoice_Date` date DEFAULT NULL,
  `Total` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`Inv_ID`),
  KEY `Order_ID` (`Order_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`Inv_ID`, `Order_ID`, `Invoice_Date`, `Total`) VALUES
('Inv_1', 'Order_1', '2023-03-21', '125900.00'),
('Inv_2', 'Order_2', '2023-03-21', '371800.00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `Order_ID` varchar(10) NOT NULL,
  `Cus_ID` varchar(10) DEFAULT NULL,
  `Emp_ID` varchar(10) DEFAULT NULL,
  `Order_Date` date DEFAULT NULL,
  `Reciever` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone_No` varchar(20) NOT NULL,
  `Total` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`Order_ID`),
  KEY `Cus_ID` (`Cus_ID`),
  KEY `Emp_ID` (`Emp_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_ID`, `Cus_ID`, `Emp_ID`, `Order_Date`, `Reciever`, `address`, `Email`, `Phone_No`, `Total`) VALUES
('Order_1', 'Cus_1', 'EMP_1', '2023-03-20', 'Shyaman', 'Tissamaharama', 'shyamansuresh@gmail.com', '+94719242999', '125900.00'),
('Order_2', 'Cus_1', 'EMP_1', '2023-03-21', 'Shyaman', 'Tissamaharama', 'shyamansuresh@gmail.com', '+94719242999', '371800.00');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `Order_ID` varchar(10) NOT NULL,
  `Product_ID` varchar(10) NOT NULL,
  `Quentity` int DEFAULT NULL,
  `Unit_Price` decimal(8,2) DEFAULT NULL,
  `Discount` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`Order_ID`,`Product_ID`),
  KEY `Product_ID` (`Product_ID`),
  KEY `Product_ID_2` (`Product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`Order_ID`, `Product_ID`, `Quentity`, `Unit_Price`, `Discount`) VALUES
('Order_1', 'Prod_1', 2, '2950.00', '0.00'),
('Order_1', 'Prod_2', 1, '120000.00', '0.00'),
('Order_2', 'Prod_1', 4, '2950.00', '0.00'),
('Order_2', 'Prod_2', 3, '120000.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `Prod_ID` varchar(10) NOT NULL,
  `Prod_Name` varchar(50) DEFAULT NULL,
  `Discription` varchar(100) DEFAULT NULL,
  `Standard_Cost` decimal(10,2) DEFAULT NULL,
  `List_Price` decimal(10,2) DEFAULT NULL,
  `Cat_ID` varchar(10) DEFAULT NULL,
  `Qty_Availble` int DEFAULT NULL,
  `file_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`Prod_ID`),
  KEY `Cat_ID` (`Cat_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Prod_ID`, `Prod_Name`, `Discription`, `Standard_Cost`, `List_Price`, `Cat_ID`, `Qty_Availble`, `file_name`) VALUES
('Prod_1', 'Fantech X9 Thor Mouse', 'Fantech X9 Thor Mouse', '2700.00', '2950.00', 'Cat_3', 41, 'img_63f0af9ee032a0.02795142.png'),
('Prod_2', 'Fantech Intel i5 desktop', 'Intel i5 8th gen\nDDR4 8GB', '100000.00', '120000.00', 'Cat_1', 12, 'img_6406d8d7b59822.27892827.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_temp`
--

DROP TABLE IF EXISTS `product_temp`;
CREATE TABLE IF NOT EXISTS `product_temp` (
  `prod_ID` varchar(10) NOT NULL,
  `qenty` int NOT NULL,
  PRIMARY KEY (`prod_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_temp_online`
--

DROP TABLE IF EXISTS `product_temp_online`;
CREATE TABLE IF NOT EXISTS `product_temp_online` (
  `prod_id` varchar(20) NOT NULL,
  `Cus_Name` varchar(50) NOT NULL,
  `qty` int NOT NULL,
  PRIMARY KEY (`prod_id`,`Cus_Name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

DROP TABLE IF EXISTS `purchase_order`;
CREATE TABLE IF NOT EXISTS `purchase_order` (
  `ID` varchar(5) NOT NULL,
  `product` varchar(50) DEFAULT NULL,
  `supplier_id` varchar(10) DEFAULT NULL,
  `QTY` int DEFAULT NULL,
  `unit_cost` decimal(9,2) DEFAULT NULL,
  `submited_date` date DEFAULT NULL,
  `Date_recieved` date DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `supplier_id` (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `Sup_id` varchar(10) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Company` varchar(40) DEFAULT NULL,
  `Phone` varchar(13) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Sup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Sup_id`, `Name`, `Company`, `Phone`, `email`, `city`) VALUES
('Sup_1', 'Perera', 'Abc', '0759996966', 'perera@gmail.com', 'Tissamaharama');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`Order_ID`) REFERENCES `orders` (`Order_ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Cus_ID`) REFERENCES `customer` (`Cus_ID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`Emp_ID`) REFERENCES `employee` (`EMP_ID`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`Order_ID`) REFERENCES `orders` (`Order_ID`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`Prod_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Cat_ID`) REFERENCES `catogory` (`Cat_ID`);

--
-- Constraints for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD CONSTRAINT `purchase_order_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`Sup_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_order_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`Sup_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
