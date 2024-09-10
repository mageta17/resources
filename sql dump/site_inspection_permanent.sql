-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 09, 2024 at 06:36 PM
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
-- Table structure for table `site_inspection_permanent`
--

CREATE TABLE `site_inspection_permanent` (
  `id` int(11) NOT NULL,
  `site_id` varchar(255) DEFAULT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `inspector_name` varchar(255) DEFAULT NULL,
  `inspection_date` date DEFAULT NULL,
  `response1` text,
  `comment1` longtext,
  `action1` longtext,
  `response2` text,
  `comment2` longtext,
  `action2` longtext,
  `response3` text,
  `comment3` longtext,
  `action3` longtext,
  `response4` text,
  `comment4` longtext,
  `action4` longtext,
  `response5` text,
  `comment5` longtext,
  `action5` longtext,
  `response6` text,
  `comment6` longtext,
  `action6` longtext,
  `response7` text,
  `comment7` longtext,
  `action7` longtext,
  `response8` text,
  `comment8` longtext,
  `action8` longtext,
  `response9` text,
  `comment9` longtext,
  `action9` longtext,
  `response10` text,
  `comment10` longtext,
  `action10` longtext,
  `response11` text,
  `comment11` longtext,
  `action11` longtext,
  `response12` text,
  `comment12` longtext,
  `action12` longtext,
  `response13` text,
  `comment13` longtext,
  `action13` longtext,
  `response14` text,
  `comment14` longtext,
  `action14` longtext,
  `response15` text,
  `comment15` longtext,
  `action15` longtext,
  `response16` text,
  `comment16` longtext,
  `action16` longtext,
  `response17` text,
  `comment17` longtext,
  `action17` longtext,
  `response18` text,
  `comment18` longtext,
  `action18` longtext,
  `response19` text,
  `comment19` longtext,
  `action19` longtext,
  `response20` text,
  `comment20` longtext,
  `action20` longtext,
  `response21` text,
  `comment21` longtext,
  `action21` longtext,
  `response22` text,
  `comment22` longtext,
  `action22` longtext,
  `response23` text,
  `comment23` longtext,
  `action23` longtext,
  `response24` text,
  `comment24` longtext,
  `action24` longtext,
  `response25` text,
  `comment25` longtext,
  `action25` longtext,
  `response26` text,
  `comment26` longtext,
  `action26` longtext,
  `response27` text,
  `comment27` longtext,
  `action27` longtext,
  `response28` text,
  `comment28` longtext,
  `action28` longtext,
  `response29` text,
  `comment29` longtext,
  `action29` longtext,
  `data_a` longtext,
  `data_b` longtext,
  `data_c` longtext,
  `data_d` longtext,
  `data_e` longtext,
  `control_measure1` longtext,
  `control_measure2` longtext,
  `control_measure3` longtext,
  `control_measure4` longtext,
  `control_measure5` longtext,
  `status1` longtext,
  `status2` longtext,
  `status3` longtext,
  `status4` longtext,
  `status5` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
