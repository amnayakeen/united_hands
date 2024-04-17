-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2024 at 07:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `community_gathering`
--

INSERT INTO `community_gathering` (`gathering_id`, `organization_id`, `name`, `start_date`, `end_date`, `address`, `start_time`, `end_time`, `description`, `status`) VALUES
(1, 13, 'Celebrate 1 year of service', '2024-04-25', '2024-04-25', '23, Community Center Road, Colombo 03', '14:00:00', '18:00:00', 'Gathering all our volunteers and staff to come together to celebrate and commemorate our experience of 1 year of service to the community.', '');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `organization_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `contact` int(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `type` varchar(15) NOT NULL,
  `registration_no` varchar(15) NOT NULL,
  `no_of_years` int(3) NOT NULL,
  `website` varchar(100) NOT NULL,
  `approval_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`organization_id`, `user_id`, `name`, `logo`, `contact`, `address`, `email`, `type`, `registration_no`, `no_of_years`, `website`, `approval_status`) VALUES
(13, 152, 'Care Community', 'logo.jpg', 114582166, 'No 44, Baseline Road, Colombo 09', 'info@carecommunity.lk', 'charity', 'NGO41862', 4, '', 'approved');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `organization_id`, `name`, `start_date`, `end_date`, `address`, `project_type`, `start_time`, `end_time`, `qualification_required`, `social_outcome`, `no_of_volunteers_required`, `objectives`, `status`) VALUES
(1, 13, 'Educating Children in underdeveloped areas', '2024-04-26', '2024-04-26', 'No 124, Sri Gangaramaya Jaela Road, Puttalam', 'One-time', '09:00:00', '14:00:00', 'OL completed', 'Educate children in underdeveloped areas so they get the education they need to thrive in this world and to reduce the education gap that is in the economy.', 10, 'Teaching', ''),
(2, 13, 'Quality time in the Old Age Home', '2024-05-08', '2024-05-08', '45A, Flower Road, Dehiwala-Mount Lavinia.', 'One-time', '10:00:00', '05:00:00', '', 'Give a sense of belonging to the elderly, spending quality time by engaging in music and games.', 15, 'Singing, Elderly care', ''),
(3, 13, 'Clean the beach', '2024-04-01', '2024-08-01', 'Dehiwala beach', 'Long-term', '08:30:00', '14:00:00', '', 'Clean the beach for a cleaner and safer environment for people and all living creatures', 20, 'Cleaning', '');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `training_id` int(10) NOT NULL,
  `organization_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`training_id`, `organization_id`, `name`, `start_date`, `end_date`, `address`, `start_time`, `end_time`, `description`, `status`) VALUES
(1, 13, 'Tutoring training', '2024-04-22', '2024-05-02', 'No 57, Temple Road, Kandy', '17:30:00', '19:30:00', 'Enhancing tutoring skills in volunteers by training them on innovative and student-centered teaching practices.', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `type`, `status`) VALUES
(100, 'admin@unitedhands.com', 'admin1234', 'admin', ''),
(125, 'david@gmail.com', '1234', 'volunteer', ''),
(151, 'tracy.venkoff@gmail.com', '1234', 'volunteer', ''),
(152, 'info@carecommunity.lk', '1234', 'organization', '');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `volunteer_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `date_of_birth` date NOT NULL,
  `image` varchar(150) NOT NULL,
  `contact` int(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `interests` varchar(300) NOT NULL,
  `abilities` varchar(300) NOT NULL,
  `talents` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`volunteer_id`, `user_id`, `fullname`, `date_of_birth`, `image`, `contact`, `email`, `gender`, `interests`, `abilities`, `talents`) VALUES
(22, 125, 'David Jones', '1990-09-29', 'david.jpg', 771462815, 'david@gmail.com', 'Male', 'Environmental causes, Animal welfare, Disaster relief and emergency', 'Fundraising, Construction', 'Crafting, Technology troubleshooting'),
(38, 151, 'Tracy Venkoff', '1998-09-16', 'tracy.jpg', 772461725, 'tracy.venkoff@gmail.com', 'Female', 'Animal welfare, Healthcare support, Elderly care, Homlessness and poverty', 'Fundraising, Gardening, Counselling', 'Public speaking, Crafting, Photography'),
(39, 153, 'dfgvhbnjkm,', '2000-12-09', 'tracy.jpg', 1234567890, 'fcgbhn@fcgh.efs', 'Female', 'Environmental causes, Education, Elderly care', 'Fundraising, Graphic designing', 'Musical performance, Technology troubleshooting');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `community_gathering`
--
ALTER TABLE `community_gathering`
  ADD PRIMARY KEY (`gathering_id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`organization_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`training_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`volunteer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `community_gathering`
--
ALTER TABLE `community_gathering`
  MODIFY `gathering_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `organization_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `training_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `volunteer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
