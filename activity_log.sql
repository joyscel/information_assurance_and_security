-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2021 at 08:53 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `activity_three`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(8) NOT NULL,
  `user_id` int(100) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `user_id`, `user_name`, `activity`, `date`) VALUES
(277, 2, 'joys.cel', 'Attempted to login.', '2021-05-15 00:39:48'),
(278, 2, 'joys.cel', 'Attempted to login.', '2021-05-15 00:41:19'),
(279, 2, 'joys.cel', 'Logged in.', '2021-05-15 00:41:37'),
(280, 2, 'joys.cel', 'Logged out.', '2021-05-15 00:42:02'),
(281, 2, 'joys.cel', 'Attempted to login.', '2021-05-15 00:42:26'),
(282, 2, 'joys.cel', 'Logged in.', '2021-05-15 00:42:33'),
(283, 2, 'joys.cel', 'Logged out.', '2021-05-15 00:43:08'),
(285, 2, 'joys.cel', 'Forgot Password.', '2021-05-15 00:52:22'),
(286, 2, 'joys.cel', 'Password changed successfully.', '2021-05-15 00:52:54'),
(287, 11, 'carmz', 'Attempted to login.', '2021-05-15 00:53:52'),
(288, 11, 'carmz', 'Logged in.', '2021-05-15 00:53:59'),
(289, 11, 'carmz', 'Logged out.', '2021-05-15 00:54:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
