-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2021 at 11:59 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

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
  `numberPerson` int(11) DEFAULT NULL,
  `booking_status` varchar(15) NOT NULL DEFAULT 'pending',
  `booking_create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookingform`
--

INSERT INTO `bookingform` (`booking_id`, `user_id`, `booking_fullname`, `booking_contact`, `booking_date`, `booking_time`, `numberPerson`, `booking_status`, `booking_create_at`) VALUES
(1, 1, 'YAM ZHENG LIM', '0129747749', '2021-04-10', '17:16:15', 2, 'approved', '2021-04-10 18:19:18'),
(2, 1, 'YAM ZHENG LIM', '0129747749', '2021-04-16', '18:12:00', 3, 'cancelled', '2021-04-10 18:19:18'),
(3, 1, 'Zheng lim yam', '0129999999', '1213-01-11', '15:12:00', 3, 'pending', '2021-04-10 18:20:03'),
(4, 8, 'yam zheng lim', '0129747749', '2021-04-15', '00:00:00', 0, 'pending', '2021-04-10 21:26:54'),
(5, 8, 'yam zheng lim', 'ewqe', '0000-00-00', '00:00:00', 0, 'pending', '2021-04-10 21:27:16'),
(6, 8, 'yam zheng lim', '', '0000-00-00', '00:00:00', 0, 'pending', '2021-04-10 21:41:18'),
(7, 8, 'yam zheng lim', '', '0000-00-00', '00:00:00', 0, 'pending', '2021-04-10 21:45:50'),
(8, 8, 'yam zheng lim', '', '0000-00-00', '00:00:00', 0, 'pending', '2021-04-10 21:57:09'),
(9, 8, 'yam zheng lim', '', '0000-00-00', '00:00:00', 0, 'pending', '2021-04-10 21:58:45'),
(10, 8, 'yam zheng lim', 'da', '0000-00-00', '00:00:00', 0, 'pending', '2021-04-10 22:00:43'),
(11, 8, 'yam zheng lim', '', '0000-00-00', '00:00:00', 0, 'pending', '2021-04-10 22:02:26'),
(12, 8, 'yam zheng lim', '', '0000-00-00', '00:00:00', 1, 'pending', '2021-04-10 22:02:39'),
(13, 8, 'yam zheng lim', '', '0000-00-00', '00:00:00', 0, 'pending', '2021-04-10 22:03:06'),
(14, 8, 'yam zheng lim', '', '0000-00-00', '00:00:00', 0, 'pending', '2021-04-10 22:03:52'),
(15, 8, 'yam zheng lim', '', '0000-00-00', '00:00:00', 0, 'pending', '2021-04-10 22:03:59'),
(16, 8, 'yam zheng lim', '', '0000-00-00', '00:00:00', 0, 'pending', '2021-04-10 22:04:07'),
(17, 8, 'yam zheng lim', '', '0000-00-00', '00:00:00', 0, 'approved', '2021-04-10 22:05:05'),
(18, 8, 'yam zheng lim', '12312312', '2021-04-13', '10:26:00', 3, 'approved', '2021-04-10 22:26:40'),
(19, 8, 'yam zheng lim', 'eqw13', '2021-04-01', '12:28:00', 2, 'approved', '2021-04-10 22:28:32'),
(20, 8, 'yam zheng lim', '312eqdadas', '2021-04-14', '13:28:00', 4, 'cancelled', '2021-04-10 22:28:44'),
(21, 8, 'yam zheng lim', 'fadadqwe', '2021-04-14', '10:29:00', 3, 'approved', '2021-04-10 22:29:04'),
(22, 8, 'yam zheng lim', 'dad21e', '2021-04-03', '10:29:00', 1, 'approved', '2021-04-10 22:29:18'),
(23, 8, 'yam zheng lim', 'eq', '2021-04-20', '13:29:00', 2, 'cancelled', '2021-04-10 22:29:36'),
(24, 8, 'yam zheng lim', 'd123123', '2021-04-15', '12:37:00', 2, 'cancelled', '2021-04-10 22:37:23'),
(25, 8, 'yam zheng lim', 'dasdada', '2021-04-02', '10:50:00', 3, 'cancelled', '2021-04-10 22:47:04'),
(26, 8, 'yam zheng lim', 'ewqeqeasdas', '2021-04-22', '13:47:00', 5, 'cancelled', '2021-04-10 22:47:17'),
(27, 8, 'yam zheng lim', 'eqweqw', '2021-05-06', '10:54:00', 3, 'approved', '2021-04-10 22:51:52'),
(28, 4, 'yam', '1233', '2021-04-23', '12:20:00', 4, 'approved', '2021-04-13 00:17:15'),
(29, 1, 'YAM ZHENG LIM', '012-9747749', '2021-04-20', '14:34:00', 5, 'cancelled', '2021-04-13 23:34:08'),
(30, 4, '2131312312', '123123', '2021-05-21', '12:11:00', 3, 'cancelled', '2021-04-14 00:11:38'),
(31, 4, 'yam', 'dwda', '2021-04-20', '12:35:00', 3, 'approved', '2021-04-14 00:35:24'),
(32, 4, 'yam', '11111', '2021-04-02', '10:02:00', 2, 'cancelled', '2021-04-14 10:02:33'),
(33, 4, 'aaaaa', 'sASDA', '2021-04-22', '11:24:00', 2, 'cancelled', '2021-04-14 10:24:28'),
(34, 9, 'yam', '0129747749', '2021-04-15', '20:54:00', 5, 'cancelled', '2021-04-14 13:55:17'),
(35, 9, 'yam', '1234567', '2021-04-15', '14:55:00', 3, 'approved', '2021-04-14 13:55:36'),
(36, 4, 'dasdsa', '431432', '2021-05-19', '13:58:00', 2, 'approved', '2021-04-14 13:58:39'),
(37, 4, 'dsadasdsa', 'dadas', '2021-04-14', '11:41:00', 3, 'cancelled', '2021-04-14 23:41:39'),
(38, 4, 'dasd', '342', '2021-04-15', '14:12:00', 3, 'cancelled', '2021-04-15 02:12:51'),
(39, 4, 'abc', '3131312312', '2021-04-17', '18:16:00', 2, 'approved', '2021-04-17 17:16:15'),
(40, 4, 'dad', 'dsad', '2021-04-17', '18:18:00', 2, 'cancelled', '2021-04-17 17:18:26');

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
(1, 'zhenglim99', '$2y$10$DcjO5izJIxKmjYdQ3qioAeiz5EpLUU7lAUHpM0QYMfBoKJeC46vk6', 'zhenglim', 'user', '2021-04-06 21:20:29'),
(3, 'Lik Wei', '$2y$10$IeleHC7AfOJ4zNz3OAJ2RuhBxGZOHcORDDVMs4hOn8sNp7F1jE4Ki', '0', 'user', '2021-04-10 09:16:21'),
(4, 'admin', '$2y$10$hZ5SbIX.jIRqqGYuVgxw3.ZCm0NNZp3MnWk3o3bl3QoanlFwIDDFu', '0', 'admin', '2021-04-10 11:19:15'),
(5, '', '$2y$10$QyB1bcK66m1m4upoQkt7UOypoVsoQSEWg3ccSd5z9zoj1PIXvhRXm', '', 'user', '2021-04-10 17:26:34'),
(6, 'zhenglim123', '$2y$10$T6YfynkhMh8OHt6xqK8cl.2/FyPohvTAhOrmDcvjzzfFa5HG/m02O', '', 'user', '2021-04-10 17:29:44'),
(7, 'ZHENGLIM111111', '$2y$10$6AaFSt.gGaIjpfiAco.pcObofyHjQ6ojTOT6tUT1dRGFqsWB2F8oG', 'aassv cc', 'user', '2021-04-10 18:16:33'),
(8, 'yamzhenglim', '$2y$10$AxNdqwnLvnB3cpo5clpsk.eDd5/nD95IK70IxWb7LB02Mby7KmUFq', 'yam zheng lim', 'user', '2021-04-10 21:26:26'),
(9, 'zhenglim1234', '$2y$10$OtqaAYFvQwQDL06B4DPDQe.gC7.Zx0uL8LDsfNo.bo.abdDU.iWh2', 'yam', 'user', '2021-04-14 13:53:59');

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
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
