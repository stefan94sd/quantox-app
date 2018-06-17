-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2018 at 03:03 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quantox_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `gods`
--

CREATE TABLE `gods` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `faith` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gods`
--

INSERT INTO `gods` (`id`, `name`, `faith`) VALUES
(1, 'one_above_all', 'all'),
(2, 'jesus_christ', 'christianity'),
(3, 'alah', 'islam');

-- --------------------------------------------------------

--
-- Table structure for table `humans`
--

CREATE TABLE `humans` (
  `id` int(11) NOT NULL,
  `gender` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `body_type` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nationality` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `skin_color` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `faith` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `first_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gods_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `humans`
--

INSERT INTO `humans` (`id`, `gender`, `body_type`, `nationality`, `skin_color`, `faith`, `age`, `first_name`, `last_name`, `gods_id`) VALUES
(5, 'female', 'mesomorph', 'sdsadas', 'black', 'islam', 34, 'sdasda', 'sdasdsad', 3),
(6, 'female', 'mesomorph', 'sdsadas', 'black', 'islam', 34, 'sdasda', 'sdasdsad', 3),
(7, 'male', 'mesomorph', 'sdasdada', 'black', 'christianity', 231231, 'sdadad', 'sdad', 1),
(8, 'male', 'mesomorph', 'sdasda', 'black', 'islam', 23131, 'sdasda', 'sdada', 3),
(9, 'male', 'mesomorph', 'sdasda', 'black', 'islam', 23131, 'sdasda', 'sdada', 3),
(10, 'male', 'mesomorph', 'sdadad', 'black', 'islam', 322131, 'sdadsa', 'sdada', 3),
(11, 'male', 'mesomorph', 'sdadad', 'black', 'islam', 322131, 'sdadsa', 'sdada', 3),
(12, 'male', 'mesomorph', 'sdadad', 'black', 'islam', 322131, 'sdadsa', 'sdada', 3),
(13, 'male', 'mesomorph', 'erewrwerw', 'black', 'christianity', 56, 'stefan', 'ssdsada', 1),
(14, 'male', 'mesomorph', 'erewrwerw', 'black', 'christianity', 56, 'stefan23', 'ssdsada', 1),
(15, 'male', 'mesomorph', 'erewrwerw', 'black', 'christianity', 56, 'stefan23567', 'ssdsada', 1),
(17, 'male', 'mesomorph', 'sdadad', 'black', 'christianity', 231231, 'dsadad', 'sdad', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gods`
--
ALTER TABLE `gods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `humans`
--
ALTER TABLE `humans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gods`
--
ALTER TABLE `gods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `humans`
--
ALTER TABLE `humans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
