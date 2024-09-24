-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 24, 2024 at 12:02 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `requisition_form`
--

CREATE TABLE `requisition_form` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `project_name` varchar(255) DEFAULT NULL,
  `amountInwords` varchar(255) DEFAULT NULL,
  `description1` varchar(255) DEFAULT NULL,
  `quantity1` int(11) DEFAULT NULL,
  `unitPrice1` decimal(10,2) DEFAULT NULL,
  `amount1` decimal(10,2) DEFAULT NULL,
  `description2` varchar(255) DEFAULT NULL,
  `quantity2` int(11) DEFAULT NULL,
  `unitPrice2` decimal(10,2) DEFAULT NULL,
  `amount2` decimal(10,2) DEFAULT NULL,
  `description3` varchar(255) DEFAULT NULL,
  `quantity3` int(11) DEFAULT NULL,
  `unitPrice3` decimal(10,2) DEFAULT NULL,
  `amount3` decimal(10,2) DEFAULT NULL,
  `description4` varchar(255) DEFAULT NULL,
  `quantity4` int(11) DEFAULT NULL,
  `unitPrice4` decimal(10,2) DEFAULT NULL,
  `amount4` decimal(10,2) DEFAULT NULL,
  `description5` varchar(255) DEFAULT NULL,
  `quantity5` int(11) DEFAULT NULL,
  `unitPrice5` decimal(10,2) DEFAULT NULL,
  `amount5` decimal(10,2) DEFAULT NULL,
  `description6` varchar(255) DEFAULT NULL,
  `quantity6` int(11) DEFAULT NULL,
  `unitPrice6` decimal(10,2) DEFAULT NULL,
  `amount6` decimal(10,2) DEFAULT NULL,
  `description7` varchar(255) DEFAULT NULL,
  `quantity7` int(11) DEFAULT NULL,
  `unitPrice7` decimal(10,2) DEFAULT NULL,
  `amount7` decimal(10,2) DEFAULT NULL,
  `description8` varchar(255) DEFAULT NULL,
  `quantity8` int(11) DEFAULT NULL,
  `unitPrice8` decimal(10,2) DEFAULT NULL,
  `amount8` decimal(10,2) DEFAULT NULL,
  `description9` varchar(255) DEFAULT NULL,
  `quantity9` int(11) DEFAULT NULL,
  `unitPrice9` decimal(10,2) DEFAULT NULL,
  `amount9` decimal(10,2) DEFAULT NULL,
  `description10` varchar(255) DEFAULT NULL,
  `quantity10` int(11) DEFAULT NULL,
  `unitPrice10` decimal(10,2) DEFAULT NULL,
  `amount10` decimal(10,2) DEFAULT NULL,
  `description11` varchar(255) DEFAULT NULL,
  `quantity11` int(11) DEFAULT NULL,
  `unitPrice11` decimal(10,2) DEFAULT NULL,
  `amount11` decimal(10,2) DEFAULT NULL,
  `description12` varchar(255) DEFAULT NULL,
  `quantity12` int(11) DEFAULT NULL,
  `unitPrice12` decimal(10,2) DEFAULT NULL,
  `amount12` decimal(10,2) DEFAULT NULL,
  `description13` varchar(255) DEFAULT NULL,
  `quantity13` int(11) DEFAULT NULL,
  `unitPrice13` decimal(10,2) DEFAULT NULL,
  `amount13` decimal(10,2) DEFAULT NULL,
  `description14` varchar(255) DEFAULT NULL,
  `quantity14` int(11) DEFAULT NULL,
  `unitPrice14` decimal(10,2) DEFAULT NULL,
  `amount14` decimal(10,2) DEFAULT NULL,
  `description15` varchar(255) DEFAULT NULL,
  `quantity15` int(11) DEFAULT NULL,
  `unitPrice15` decimal(10,2) DEFAULT NULL,
  `amount15` decimal(10,2) DEFAULT NULL,
  `description16` varchar(255) DEFAULT NULL,
  `quantity16` int(11) DEFAULT NULL,
  `unitPrice16` decimal(10,2) DEFAULT NULL,
  `amount16` decimal(10,2) DEFAULT NULL,
  `description17` varchar(255) DEFAULT NULL,
  `quantity17` int(11) DEFAULT NULL,
  `unitPrice17` decimal(10,2) DEFAULT NULL,
  `amount17` decimal(10,2) DEFAULT NULL,
  `description18` varchar(255) DEFAULT NULL,
  `quantity18` int(11) DEFAULT NULL,
  `unitPrice18` decimal(10,2) DEFAULT NULL,
  `amount18` decimal(10,2) DEFAULT NULL,
  `description19` varchar(255) DEFAULT NULL,
  `quantity19` int(11) DEFAULT NULL,
  `unitPrice19` decimal(10,2) DEFAULT NULL,
  `amount19` decimal(10,2) DEFAULT NULL,
  `description20` varchar(255) DEFAULT NULL,
  `quantity20` int(11) DEFAULT NULL,
  `unitPrice20` decimal(10,2) DEFAULT NULL,
  `amount20` decimal(10,2) DEFAULT NULL,
  `submitted_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `requisition_form`
--
ALTER TABLE `requisition_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `requisition_form`
--
ALTER TABLE `requisition_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
