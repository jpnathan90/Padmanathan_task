-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2019 at 09:57 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `padmanathan_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `characterupdates`
--

CREATE TABLE `characterupdates` (
  `id` mediumint(9) NOT NULL,
  `name` varchar(191) NOT NULL,
  `height` smallint(6) NOT NULL,
  `mass` varchar(100) NOT NULL,
  `hair_color` varchar(191) NOT NULL,
  `skin_color` varchar(191) NOT NULL,
  `eye_color` varchar(191) NOT NULL,
  `birth_year` varchar(191) NOT NULL,
  `gender` varchar(191) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `homeworld_name` varchar(100) NOT NULL,
  `species_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `characterupdates`
--

INSERT INTO `characterupdates` (`id`, `name`, `height`, `mass`, `hair_color`, `skin_color`, `eye_color`, `birth_year`, `gender`, `created`, `homeworld_name`, `species_name`) VALUES
(2, 'C-3PO', 167, '75', 'n/a', 'gold', 'yellow', '112BBY', 'female', '2019-01-02 07:59:10', 'Pluto', 'Kangaroo'),
(3, 'R2-D2', 96, '32', 'n/a', 'white, blue', 'red', '33BBY', 'female', '2019-01-02 07:59:10', 'Venus', 'Chimpanzee'),
(13, 'Chewbacca', 228, 'testing!', 'brown', 'unknown', 'blue', '200BBY', 'male', '2019-01-02 07:59:40', 'Mars', 'Wombat'),
(19, 'Yoda', 66, '17', 'white', 'green', 'brown', '896BBY', 'male', '2019-01-02 07:59:40', 'Saturn', 'Elephant');

-- --------------------------------------------------------

--
-- Table structure for table `padmanathan_characters`
--

CREATE TABLE `padmanathan_characters` (
  `id` mediumint(9) NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `height` smallint(6) NOT NULL,
  `mass` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hair_color` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `skin_color` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `eye_color` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `birth_year` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `homeworld_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `species_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `characterupdates`
--
ALTER TABLE `characterupdates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `padmanathan_characters`
--
ALTER TABLE `padmanathan_characters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `characterupdates`
--
ALTER TABLE `characterupdates`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `padmanathan_characters`
--
ALTER TABLE `padmanathan_characters`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
