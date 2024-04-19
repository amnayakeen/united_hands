-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 10:21 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unitedhands`
--

-- --------------------------------------------------------

--
-- Table structure for table `community_gathering`
--

CREATE TABLE `community_gathering` (
  `gathering_id` int(10) NOT NULL,
  `organization_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `community_gathering`
--

INSERT INTO `community_gathering` (`gathering_id`, `organization_id`, `name`, `start_date`, `end_date`, `address`, `start_time`, `end_time`, `description`, `status`) VALUES
(1, 13, 'Celebrate 1 year of service', '2024-04-30', '2024-04-30', '23, Community Center Road, Colombo 03', '14:00:00', '18:00:00', 'Gathering all our volunteers and staff to come together to celebrate and commemorate our experience of 1 year of service to the community.', ''),
(2, 15, 'Gathering', '2024-04-25', '2024-04-25', 'Somewhere', '17:00:00', '19:00:00', 'Something', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `community_gathering`
--
ALTER TABLE `community_gathering`
  ADD PRIMARY KEY (`gathering_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `community_gathering`
--
ALTER TABLE `community_gathering`
  MODIFY `gathering_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
