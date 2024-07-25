-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 23, 2024 at 11:12 AM
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
-- Table structure for table `mv_checklist_360_images_rep`
--

CREATE TABLE `mv_checklist_360_images_rep` (
  `img_id` int(11) NOT NULL,
  `img_name` varchar(255) DEFAULT NULL,
  `checklistId` int(11) DEFAULT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mv_checklist_360_images_rep`
--
ALTER TABLE `mv_checklist_360_images_rep`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `mv_checklist_360_images_rep_ibfk_1` (`checklistId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mv_checklist_360_images_rep`
--
ALTER TABLE `mv_checklist_360_images_rep`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mv_checklist_360_images_rep`
--
ALTER TABLE `mv_checklist_360_images_rep`
  ADD CONSTRAINT `mv_checklist_360_images_rep_ibfk_1` FOREIGN KEY (`checklistId`) REFERENCES `mv_check_list_360` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
