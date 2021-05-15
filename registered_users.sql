-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2021 at 09:31 PM
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
-- Table structure for table `registered_users`
--

CREATE TABLE `registered_users` (
  `id` int(8) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`id`, `user_name`, `password`, `email`) VALUES
(1, 'joycel', 'a7bb660666157394a14763ed2d89015e', 'empantojoy@gmail.com'),
(2, 'joys.cel', 'a7bb660666157394a14763ed2d89015e', 'hagonoyj@gmail.com'),
(3, 'brent', 'ed0e8ead20fb1a5f0f5cf601e3ba467d', 'brent.elijah@gmail.com'),
(4, 'brei', 'f69920152d541482cdb1e779ec98d28c', 'breinna@gmail.com'),
(5, 'juvz', 'e3485397a205a4d4019cf4627099d713', 'juvz@gmail.com'),
(6, 'admin', '26dc318942685872cf79c5eb96c9bb13', 'admin@gmail.com'),
(7, 'lorie', '94dbd38dd5ca0aa18132fec953e532b6', 'lorie@gmail.com'),
(8, 'joy', 'a7bb660666157394a14763ed2d89015e', 'joy@gmail.com'),
(9, 'john', 'a948326d81e37b96fac162cbb75dc2b2', 'john@gmail.com'),
(10, 'teresita', '285f49a253309e05f9a219afa7627ebe', 'teresita@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registered_users`
--
ALTER TABLE `registered_users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
