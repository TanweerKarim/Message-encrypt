-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2022 at 10:27 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmb`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msg_id` bigint(50) NOT NULL,
  `sendto` varchar(50) NOT NULL,
  `fromuser` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` longtext NOT NULL,
  `msg_date` datetime NOT NULL,
  `s_key` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msg_id`, `sendto`, `fromuser`, `subject`, `message`, `msg_date`, `s_key`) VALUES
(1, 'Tahseen', 'Admin', 'Test', 'srDWbvk=', '2022-07-31 12:02:58', 'Ibwts21f'),
(2, 'Tahseen', 'Admin', 'Test', '54i5e22n', '2022-07-31 12:18:05', 'uzBf4d51'),
(3, 'Tahseen', 'Admin', 'hello there', 'dsTr1pFk+EsO7xSAcmB3v0AVvZeMSWuiECFLVWGTpM7S+rk32mL+ww==', '2022-07-31 13:37:24', 'T0HnhRJU'),
(4, 'Admin', 'Admin', 'Test', 'yjUKxg==', '2022-07-31 13:39:34', 'E7yR7og3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
