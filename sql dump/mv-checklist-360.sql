-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 23, 2024 at 08:34 AM
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
-- Table structure for table `mv_check_list_360`
--

CREATE TABLE `mv_check_list_360` (
  `id` int(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `front_view` varchar(255) NOT NULL,
  `rear_view` varchar(255) NOT NULL,
  `left_side_view` varchar(255) NOT NULL,
  `right_side_view` varchar(255) NOT NULL,
  `loadbin_view` varchar(255) NOT NULL,
  `windscreen_view` varchar(255) NOT NULL,
  `license_disk` varchar(255) NOT NULL,
  `towbar` varchar(255) NOT NULL,
  `lf_tyre_age` varchar(255) NOT NULL,
  `lf_tyre_treat` varchar(255) NOT NULL,
  `rf_tyre_age` varchar(255) NOT NULL,
  `rf_tyre_treat` varchar(255) NOT NULL,
  `lr_tyre_age` varchar(255) NOT NULL,
  `lr_tyre_treat` varchar(255) NOT NULL,
  `rr_tyre_age` varchar(255) NOT NULL,
  `rr_tyre_treat` varchar(255) NOT NULL,
  `rear_3pt_seatbelts` varchar(255) NOT NULL,
  `driver_3pt_seatbelt` varchar(255) NOT NULL,
  `co_driver_3p_belt` varchar(255) NOT NULL,
  `bluetooth` varchar(255) NOT NULL,
  `odometer` varchar(255) NOT NULL,
  `service_book` varchar(255) NOT NULL,
  `emergence_triangle` varchar(255) NOT NULL,
  `first_aid_kit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mv_check_list_360`
--
ALTER TABLE `mv_check_list_360`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mv_check_list_360`
--
ALTER TABLE `mv_check_list_360`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
