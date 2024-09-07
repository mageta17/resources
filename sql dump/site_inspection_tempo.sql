-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 06, 2024 at 07:16 AM
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
-- Table structure for table `site_inspection_tempo`
--

CREATE TABLE `site_inspection_tempo` (
  `id` int(11) NOT NULL,
  `site_id` varchar(255) DEFAULT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `inspector_name` varchar(255) DEFAULT NULL,
  `inspection_date` date DEFAULT NULL,
  `response1` text,
  `comment1` text,
  `action1` text,
  `response2` text,
  `comment2` text,
  `action2` text,
  `response3` text,
  `comment3` text,
  `action3` text,
  `response4` text,
  `comment4` text,
  `action4` text,
  `response5` text,
  `comment5` text,
  `action5` text,
  `response6` text,
  `comment6` text,
  `action6` text,
  `response7` text,
  `comment7` text,
  `action7` text,
  `response8` text,
  `comment8` text,
  `action8` text,
  `response9` text,
  `comment9` text,
  `action9` text,
  `response10` text,
  `comment10` text,
  `action10` text,
  `response11` text,
  `comment11` text,
  `action11` text,
  `response12` text,
  `comment12` text,
  `action12` text,
  `response13` text,
  `comment13` text,
  `action13` text,
  `response14` text,
  `comment14` text,
  `action14` text,
  `response15` text,
  `comment15` text,
  `action15` text,
  `response16` text,
  `comment16` text,
  `action16` text,
  `response17` text,
  `comment17` text,
  `action17` text,
  `response18` text,
  `comment18` text,
  `action18` text,
  `response19` text,
  `comment19` text,
  `action19` text,
  `response20` text,
  `comment20` text,
  `action20` text,
  `response21` text,
  `comment21` text,
  `action21` text,
  `response22` text,
  `comment22` text,
  `action22` text,
  `response23` text,
  `comment23` text,
  `action23` text,
  `response24` text,
  `comment24` text,
  `action24` text,
  `response25` text,
  `comment25` text,
  `action25` text,
  `response26` text,
  `comment26` text,
  `action26` text,
  `response27` text,
  `comment27` text,
  `action27` text,
  `response28` text,
  `comment28` text,
  `action28` text,
  `response29` text,
  `comment29` text,
  `action29` text,
  `data_a` text,
  `data_b` text,
  `data_c` text,
  `data_d` text,
  `data_e` text,
  `control_measure1` text,
  `control_measure2` text,
  `control_measure3` text,
  `control_measure4` text,
  `control_measure5` text,
  `status1` text,
  `status2` text,
  `status3` text,
  `status4` text,
  `status5` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `site_inspection_tempo`
--
ALTER TABLE `site_inspection_tempo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `site_inspection_tempo`
--
ALTER TABLE `site_inspection_tempo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
