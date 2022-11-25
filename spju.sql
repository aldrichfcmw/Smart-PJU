-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2022 at 10:05 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spju`
--

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `id` int(10) NOT NULL,
  `typedev` varchar(11) NOT NULL,
  `devname` varchar(30) NOT NULL,
  `devui` varchar(30) NOT NULL,
  `latitude` varchar(30) NOT NULL,
  `longitude` varchar(30) NOT NULL,
  `status` int(10) NOT NULL,
  `sensitivitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`id`, `typedev`, `devname`, `devui`, `latitude`, `longitude`, `status`, `sensitivitas`) VALUES
(11, 'ESP-32', 'DevKit', '7H5tFdSRamOUp6TF9NGO', '-7.27603', '112.79311', 1, 5),
(12, 'ESP-32', 'board 2', 'ueT6yepcNTQsmg9QAXEX', '-7.27603', '112.79319', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `electricity`
--

CREATE TABLE `electricity` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `devui` varchar(30) NOT NULL,
  `energi` double NOT NULL,
  `type` varchar(10) NOT NULL,
  `biaya` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `electricity`
--

INSERT INTO `electricity` (`id`, `date`, `devui`, `energi`, `type`, `biaya`) VALUES
(1, '2022-11-26', '7H5tFdSRamOUp6TF9NGO', 283, 'daily', 0),
(2, '2022-11-26', 'ueT6yepcNTQsmg9QAXEX', 121, 'daily', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

CREATE TABLE `sensor` (
  `id` int(10) NOT NULL,
  `cahaya` int(10) NOT NULL,
  `tegangan` int(10) NOT NULL,
  `arus` int(10) NOT NULL,
  `watt` int(10) NOT NULL,
  `energi` int(10) NOT NULL,
  `suhu` int(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `devui` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sensor`
--

INSERT INTO `sensor` (`id`, `cahaya`, `tegangan`, `arus`, `watt`, `energi`, `suhu`, `date`, `time`, `devui`) VALUES
(1, 60, 12, 5, 50, 70, 30, '2022-11-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(2, 174, 11, 3, 50, 60, 29, '2022-11-26', '00:00:00', 'ueT6yepcNTQsmg9QAXEX'),
(3, 223, 11, 3, 0, 0, 28, '2022-10-24', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(4, 166, 2, 3, 0, 61, 28, '2022-11-26', '00:00:00', 'ueT6yepcNTQsmg9QAXEX'),
(5, 12, 8, 0, 0, 71, 29, '2022-11-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(6, 210, 5, 2, 0, 70, 30, '2022-11-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(7, 203, 6, 4, 0, 72, 31, '2022-11-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(8, 88, 3, 3, 0, 0, 28, '2022-10-24', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(9, 86, 2, 4, 0, 0, 30, '2022-10-24', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(10, 36, 8, 1, 0, 0, 30, '2022-10-24', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(11, 104, 10, 3, 0, 70, 31, '2022-10-24', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(12, 197, 6, 1, 0, 0, 29, '2022-10-24', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(13, 158, 10, 3, 0, 0, 31, '2022-10-24', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(14, 121, 10, 3, 0, 0, 31, '2022-10-24', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(15, 29, 4, 1, 0, 0, 29, '2022-10-24', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(16, 102, 3, 4, 0, 0, 31, '2022-10-24', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(17, 193, 11, 3, 0, 0, 29, '2022-10-24', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(18, 210, 11, 2, 0, 0, 28, '2022-10-24', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(19, 181, 7, 0, 0, 0, 29, '2022-10-24', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(20, 141, 10, 3, 0, 0, 31, '2022-10-24', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(21, 56, 3, 3, 0, 0, 31, '2022-10-24', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(22, 16, 9, 0, 0, 0, 30, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(23, 99, 7, 2, 0, 0, 29, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(24, 58, 4, 2, 0, 0, 29, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(25, 105, 10, 2, 0, 0, 30, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(26, 62, 11, 0, 0, 0, 31, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(27, 140, 8, 0, 0, 0, 29, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(28, 45, 2, 4, 0, 0, 28, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(29, 36, 6, 3, 0, 0, 28, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(30, 1, 10, 4, 0, 0, 29, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(31, 104, 6, 1, 0, 0, 29, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(32, 209, 9, 1, 0, 0, 29, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(33, 129, 1, 4, 0, 0, 31, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(34, 68, 9, 4, 0, 0, 29, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(35, 205, 5, 1, 0, 0, 28, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(36, 33, 11, 0, 0, 0, 31, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(37, 102, 10, 2, 0, 0, 29, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(38, 160, 9, 0, 0, 0, 31, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(39, 3, 1, 0, 0, 0, 30, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(40, 87, 0, 2, 0, 0, 30, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(41, 204, 9, 0, 0, 0, 31, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(42, 87, 6, 0, 0, 0, 28, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(43, 132, 1, 4, 0, 0, 29, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(44, 187, 7, 2, 0, 0, 28, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(45, 53, 2, 2, 0, 0, 29, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(46, 67, 10, 3, 0, 0, 28, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(47, 78, 5, 3, 0, 0, 30, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(48, 38, 8, 2, 0, 0, 28, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(49, 108, 9, 4, 0, 0, 31, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(50, 70, 7, 4, 0, 0, 30, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(51, 62, 3, 2, 0, 0, 29, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(52, 69, 8, 1, 0, 0, 29, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(53, 117, 11, 4, 0, 0, 28, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(54, 100, 3, 4, 0, 0, 30, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(55, 138, 7, 4, 0, 0, 30, '2022-10-26', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(56, 138, 1, 4, 0, 0, 29, '2022-10-28', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(57, 179, 1, 0, 0, 0, 29, '2022-10-28', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(58, 66, 0, 4, 0, 0, 29, '2022-10-28', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(59, 80, 3, 2, 0, 0, 28, '2022-10-28', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(60, 58, 5, 1, 0, 0, 30, '2022-10-28', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(61, 181, 11, 0, 0, 0, 30, '2022-10-28', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(62, 172, 6, 1, 0, 0, 28, '2022-10-28', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(63, 131, 5, 0, 0, 0, 29, '2022-10-28', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(64, 116, 11, 0, 0, 0, 31, '2022-10-28', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(65, 32, 11, 4, 0, 0, 28, '2022-10-28', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(66, 71, 10, 1, 0, 0, 28, '2022-10-28', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(67, 1, 0, 0, 0, 0, 28, '2022-10-28', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(68, 134, 2, 4, 0, 0, 31, '2022-10-28', '00:00:00', '7H5tFdSRamOUp6TF9NGO'),
(69, 168, 9, 2, 0, 0, 29, '2022-10-28', '00:00:00', '7H5tFdSRamOUp6TF9NGO');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`) VALUES
(1, 'Aldrich FCMW', 'aldrichfcmw@drik.my.id', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `electricity`
--
ALTER TABLE `electricity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `electricity`
--
ALTER TABLE `electricity`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sensor`
--
ALTER TABLE `sensor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=379;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
