-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2021 at 05:33 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookingform`
--

CREATE TABLE `bookingform` (
  `id` int(11) NOT NULL,
  `customer_name` text NOT NULL,
  `contact` int(11) NOT NULL,
  `datentime` datetime NOT NULL,
  `people` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookingform`
--

INSERT INTO `bookingform` (`id`, `customer_name`, `contact`, `datentime`, `people`) VALUES
(1, '', 0, '0000-00-00 00:00:00', 0),
(2, '', 0, '0000-00-00 00:00:00', 0),
(3, '', 0, '0000-00-00 00:00:00', 0),
(4, '', 0, '0000-00-00 00:00:00', 0),
(5, '', 0, '0000-00-00 00:00:00', 0),
(6, '', 0, '0000-00-00 00:00:00', 0),
(7, '', 0, '0000-00-00 00:00:00', 0),
(8, '', 0, '0000-00-00 00:00:00', 0),
(9, 'dad', 0, '1999-03-12 00:00:00', 0),
(10, 'dad', 0, '1999-03-12 00:00:00', 0),
(11, 'dad', 0, '1999-03-12 00:00:00', 0),
(12, '', 0, '0000-00-00 00:00:00', 1),
(13, 'dsad', 0, '1111-01-11 00:00:00', 1),
(14, 'das', 0, '1223-02-11 00:00:00', 0),
(15, 'das', 0, '1223-02-11 00:00:00', 0),
(16, 'dad', 0, '3131-02-11 00:00:00', 2),
(17, 'dad', 0, '3131-02-11 00:00:00', 2),
(18, 'dsa', 0, '0000-00-00 00:00:00', 2),
(19, 'dsa', 0, '0000-00-00 00:00:00', 2),
(20, 'dsa', 0, '0000-00-00 00:00:00', 2),
(21, 'dsa', 0, '0000-00-00 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(12) NOT NULL DEFAULT 'user',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'zhenglim99', '$2y$10$DcjO5izJIxKmjYdQ3qioAeiz5EpLUU7lAUHpM0QYMfBoKJeC46vk6', 'user', '2021-04-06 21:20:29'),
(3, 'Lik Wei', '$2y$10$IeleHC7AfOJ4zNz3OAJ2RuhBxGZOHcORDDVMs4hOn8sNp7F1jE4Ki', 'user', '2021-04-10 09:16:21'),
(4, 'admin', '$2y$10$hZ5SbIX.jIRqqGYuVgxw3.ZCm0NNZp3MnWk3o3bl3QoanlFwIDDFu', 'user', '2021-04-10 11:19:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookingform`
--
ALTER TABLE `bookingform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookingform`
--
ALTER TABLE `bookingform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
