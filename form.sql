-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 17, 2024 at 11:43 AM
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
-- Database: `newform`
--

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `F_name` varchar(255) NOT NULL,
  `L_name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `time`, `F_name`, `L_name`, `Email`, `Password`, `City`, `Gender`, `Phone`) VALUES
(1, '2024-07-17 11:16:27', 'tamimu', 'rashid', 'rashidytamimu@gmail.com', '$2y$10$ocogsbf.S8EmJF1bRjNq3uAAJ40.0UFvoigczGkhl8M/BXox13oK6', 'Arusha', 'male', '0767938152'),
(2, '2024-07-17 11:20:13', 'tamimu', 'rashid', 'rashidytamimu@gmail.com', '$2y$10$BqX8rq/goD4i8oOBWWYANO6vosXG2jvcFNWW7.I90En7eZ5gcaJZO', 'Arusha', 'male', '0767938152'),
(3, '2024-07-17 11:20:59', 'tamimu', 'rashidy', 'rashidytamimu@gmail.com', '$2y$10$CWBFapfqepKImvOrrO.NPOtRedm8dGSMJ9pIaxP5kW4YYh5ftWI1O', 'arusha', 'male', '0567938152'),
(4, '2024-07-17 11:21:52', '2323123', '1213123', 'rashidytamimu@gmail.com', '$2y$10$J8wW8RmPD9IHhcMX9TTwbugmWFe0lO/M4SOaJR1BPSmVN6a/jVK/G', 'arsuha ', 'male', '0567938152'),
(5, '2024-07-17 11:36:08', 'tamimu', 'rashid', 'rashidytamimu@gmail.com', '$2y$10$aFjdlZflVva.4ULo6Yf2aejoIBlb/IFQfSYxm//3N/QX8v4TkZTqa', 'arusha', 'male', '0767938152'),
(6, '2024-07-17 11:38:28', 'tamimu', 'rashid', 'rashidytamimu@gmail.com', '$2y$10$Hc.SE/3FSx2K/31NkRd1cew.AoyIPDaVP4dGbYtHdklzLBqT4aZrW', 'arusha', 'male', '0767938152'),
(7, '2024-07-17 11:39:20', 'tamimu', 'rashid', 'rashidytamimu@gmail.com', '$2y$10$9OgnGQ.3jbu7BhRdo.0HOe.s.vhywmcIOXpIFjLWBs1aAgm6fd.SW', 'arusha', 'male', '0767938152'),
(8, '2024-07-17 11:39:22', 'tamimu', 'rashid', 'rashidytamimu@gmail.com', '$2y$10$CsmVmoltmME5z2uHC.H.sOCRJKlHgDZsUjHcffwQawx82COuhc1OS', 'arusha', 'male', '0767938152'),
(9, '2024-07-17 11:40:06', 'tamimu', 'rashid', 'rashidytamimu@gmail.com', '$2y$10$AjwiEqJ6Q9pC0ZAO8Ymgs.rNyyyFRUc.1oFz845f9.OyZF/cj3sGa', 'arusha', 'male', '0767938152'),
(10, '2024-07-17 11:40:47', 'tamimu', 'rashid', 'rashidytamimu@gmail.com', '$2y$10$hFHKH8N09oaCo9N/6Tww5O5KrJqQLfQol5EfFoWf43lF1iIB2C.t.', 'Arusha', 'male', '0767938152'),
(11, '2024-07-17 11:42:53', 'tamimu ', 'rashid', 'rashidytamimu@gmail.com', '$2y$10$sCG8W6C5k//CnH32.UPWeeO8jMJ/DBaLbv37W7Az89zZCRtaUO.ry', 'Arusha', 'male', '0767938152');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
