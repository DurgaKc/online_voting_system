-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2024 at 06:56 AM
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
-- Database: `onlinevoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `sno` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`sno`, `username`, `password`, `time`) VALUES
(1, 'admin', '$2y$10$S6zJaHQ3xPUozRaJnnd0b.p3fOBWS2dVKev4RrEQKbnpNVO8Cyiwy', '2024-01-19 01:30:17');

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `sno` int(10) NOT NULL,
  `party_name` varchar(30) NOT NULL,
  `description` varchar(600) NOT NULL,
  `image` varchar(200) NOT NULL,
  `total_voting` int(10) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`sno`, `party_name`, `description`, `image`, `total_voting`, `time`) VALUES
(16, 'maooBadi', 'Matrix Admin is basic yet very useful bootstrap 5 dashbaord template for your projects', '1709790856.jpg', 1, '2024-03-07 11:39:16'),
(17, 'uiiuii', 'admin template for your backend project. Matrix Admin is the right choice for you. ', '1709790877.jpg', 1, '2024-03-07 11:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `voters_data`
--

CREATE TABLE `voters_data` (
  `sno` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `citizenship` varchar(100) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `vote_count` int(4) NOT NULL,
  `party_name` varchar(50) NOT NULL,
  `party_id` varchar(10) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voters_data`
--

INSERT INTO `voters_data` (`sno`, `name`, `surname`, `address`, `citizenship`, `dob`, `vote_count`, `party_name`, `party_id`, `time`) VALUES
(43, 'Aasish ', 'basnet', 'putalisadak', '99000', '2000-02-03', 1, 'maooBadi', '16', '2024-03-07 11:37:55'),
(44, 'kisshor', 'kc', 'putalisadak', '23490', '2000-12-12', 0, '', '', '2024-03-07 11:38:16'),
(45, 'ramesh', 'rawat', 'putalisadak', '1234567', '2003-12-12', 1, 'uiiuii', '17', '2024-03-07 11:38:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `voters_data`
--
ALTER TABLE `voters_data`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `voters_data`
--
ALTER TABLE `voters_data`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
