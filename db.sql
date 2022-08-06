-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2022 at 08:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urlshortner`
--
CREATE DATABASE IF NOT EXISTS `urlshortner` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `urlshortner`;

-- --------------------------------------------------------

--
-- Table structure for table `url_short`
--

CREATE TABLE `url_short` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL,
  `short_url` varchar(50) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `url_short`
--

INSERT INTO `url_short` (`id`, `url`, `short_url`, `added_date`) VALUES
(1, 'https://www.manoramaonline.com/global-malayali/gulf/2022/08/06/uae-floods-fujairah-expats-appeal-for-support-from-diplomatic-missions-for-damaged-passports-documents.html', '62eeb0805ce93', '2022-08-06 18:18:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `url_short`
--
ALTER TABLE `url_short`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `url_short`
--
ALTER TABLE `url_short`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
