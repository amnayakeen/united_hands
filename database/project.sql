-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 10:22 AM
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
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(10) NOT NULL,
  `organization_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `project_type` varchar(200) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `qualification_required` varchar(100) NOT NULL,
  `social_outcome` varchar(200) NOT NULL,
  `no_of_volunteers_required` int(10) NOT NULL,
  `objectives` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `organization_id`, `name`, `start_date`, `end_date`, `address`, `project_type`, `start_time`, `end_time`, `qualification_required`, `social_outcome`, `no_of_volunteers_required`, `objectives`, `status`) VALUES
(1, 13, 'Educating Children in underdeveloped areas', '2024-04-30', '2024-04-30', 'No 124, Sri Gangaramaya Jaela Road, Puttalam', 'One-time', '09:00:00', '14:00:00', 'OL completed', 'Educate children in underdeveloped areas so they get the education they need to thrive in this world and to reduce the education gap that is in the economy.', 10, 'Teaching', ''),
(2, 15, 'Quality time in the Old Age Home', '2024-04-09', '2024-04-09', '45A, Flower Road, Dehiwala-Mount Lavinia.', 'One-time', '10:00:00', '05:00:00', '', 'Give a sense of belonging to the elderly, spending quality time by engaging in music and games.', 15, 'Singing, Elderly care', ''),
(3, 13, 'Clean the beach', '2024-04-30', '2024-08-01', 'Dehiwala beach', 'Long-term', '08:30:00', '14:00:00', 'Something', 'Clean the beach for a cleaner and safer environment for people and all living creatures', 20, 'Cleaning', ''),
(4, 15, 'New Project', '2024-04-24', '2024-04-26', 'Somewhere', 'Long term', '12:00:00', '15:00:00', '', 'Something good', 15, 'Cleaning', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
