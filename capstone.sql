-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2021 at 11:43 AM
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
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_fullname` text NOT NULL,
  `booking_contact` varchar(11) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `numberPerson` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookingform`
--

INSERT INTO `bookingform` (`booking_id`, `user_id`, `booking_fullname`, `booking_contact`, `booking_date`, `booking_time`, `numberPerson`, `created_at`) VALUES
(1, 1, 'YAM ZHENG LIM', '0129747749', '2021-04-10', '17:16:15', 2, '2021-04-10 09:43:14'),
(4, 5, 'Weekly Restart', '34634563', '2021-04-22', '11:38:00', 0, '2021-04-10 09:43:14'),
(5, 5, 'Weekly Restart', '34634563', '2021-04-22', '11:38:00', 2, '2021-04-10 09:43:14'),
(6, 5, 'Weekly Restart', '34634563', '2021-04-22', '11:38:00', 2, '2021-04-10 09:43:14'),
(7, 5, 'Weekly Restart', '34634563', '2021-04-22', '11:38:00', 2, '2021-04-10 09:43:14'),
(8, 5, 'Weekly Restart', '34634563', '2021-04-22', '11:38:00', 2, '2021-04-10 09:43:14'),
(9, 5, 'Weekly Restart', '34634563', '2021-04-22', '11:38:00', 2, '2021-04-10 09:43:14'),
(10, 5, 'Weekly Restart', '34634563', '2021-04-22', '11:38:00', 2, '2021-04-10 09:43:14'),
(11, 5, 'Weekly Restart', '34634563', '2021-04-22', '11:38:00', 2, '2021-04-10 09:43:14'),
(12, 5, 'Weekly Restart', '34634563', '2021-04-22', '11:38:00', 2, '2021-04-10 09:43:14'),
(13, 5, 'Weekly Restart', '34634563', '2021-04-22', '11:38:00', 2, '2021-04-10 09:43:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `role` varchar(12) NOT NULL DEFAULT 'user',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `user_fullname`, `role`, `created_at`) VALUES
(1, 'zhenglim99', '$2y$10$DcjO5izJIxKmjYdQ3qioAeiz5EpLUU7lAUHpM0QYMfBoKJeC46vk6', '0', 'user', '2021-04-06 21:20:29'),
(3, 'Lik Wei', '$2y$10$IeleHC7AfOJ4zNz3OAJ2RuhBxGZOHcORDDVMs4hOn8sNp7F1jE4Ki', '0', 'user', '2021-04-10 09:16:21'),
(4, 'admin', '$2y$10$hZ5SbIX.jIRqqGYuVgxw3.ZCm0NNZp3MnWk3o3bl3QoanlFwIDDFu', '0', 'user', '2021-04-10 11:19:15'),
(5, 'xxx', '$2y$10$f5Df72FhdzBLzzoMuMZMbuYswKTZE0o0hGpk8F5Og6GdsYMn48tUu', '', 'user', '2021-04-10 17:24:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookingform`
--
ALTER TABLE `bookingform`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookingform`
--
ALTER TABLE `bookingform`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookingform`
--
ALTER TABLE `bookingform`
  ADD CONSTRAINT `bookingform_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
