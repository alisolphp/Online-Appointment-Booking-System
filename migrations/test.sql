-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2024 at 06:16 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `prf_reservations`
--

CREATE TABLE `prf_reservations` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `datetime` varchar(65) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prf_reservations`
--

INSERT INTO `prf_reservations` (`id`, `user_id`, `datetime`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 1, '1402-12-22-7', '2024-03-09 21:46:37', '2024-03-09 21:46:39', '2024-03-09 21:46:39'),
(7, 1, '1402-12-24-7', '2024-03-09 21:46:41', '2024-03-10 04:07:25', '2024-03-10 04:07:25'),
(8, 1, '1402-12-22-7.5', '2024-03-09 22:00:32', '2024-03-09 22:00:34', '2024-03-09 22:00:34'),
(9, 1, '1402-12-21-7', '2024-03-09 22:00:40', '2024-03-10 04:40:34', '2024-03-10 04:40:34'),
(10, 1, '1402-12-22-8.5', '2024-03-09 22:00:44', '2024-03-09 22:00:45', '2024-03-09 22:00:45'),
(11, 1, '1402-12-21-7', '2024-03-09 22:03:32', '2024-03-10 04:40:34', '2024-03-10 04:40:34'),
(12, 1, '1402-12-24-7', '2024-03-09 22:08:53', '2024-03-10 04:07:25', '2024-03-10 04:07:25'),
(13, 1, '1402-12-21-7', '2024-03-09 22:08:57', '2024-03-10 04:40:34', '2024-03-10 04:40:34'),
(14, 1, '1402-12-21-7', '2024-03-10 04:07:12', '2024-03-10 04:40:34', '2024-03-10 04:40:34'),
(15, 1, '1402-12-24-7', '2024-03-10 04:07:22', '2024-03-10 04:07:25', '2024-03-10 04:07:25'),
(16, 1, '1402-12-21-7', '2024-03-10 04:14:56', '2024-03-10 04:40:34', '2024-03-10 04:40:34'),
(17, 1, '1402-12-21-7', '2024-03-10 04:37:02', '2024-03-10 04:40:34', '2024-03-10 04:40:34'),
(18, 1, '1402-12-21-7', '2024-03-10 04:40:33', '2024-03-10 04:40:34', '2024-03-10 04:40:34'),
(19, 1, '1402-12-20-8', '2024-03-10 04:40:43', '2024-03-10 04:40:57', '2024-03-10 04:40:57'),
(20, 1, '1402-12-24-7', '2024-03-10 04:40:48', NULL, NULL),
(21, 1, '1402-12-23-8', '2024-03-10 04:40:52', '2024-03-10 04:40:56', '2024-03-10 04:40:56'),
(22, 1, '1402-12-24-7.5', '2024-03-10 04:40:54', NULL, NULL),
(23, 2, '1402-12-23-9', '2024-03-10 04:41:06', '2024-03-10 04:42:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prf_users`
--

CREATE TABLE `prf_users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prf_users`
--

INSERT INTO `prf_users` (`id`, `username`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'demo1', 'cb062ea4bb3633334c4227da2ec7cd7e', '2024-03-09 19:52:19', NULL, NULL),
(2, 'demo2', '3b598faee040c55689011aa48a267734', '2024-03-09 19:52:24', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prf_reservations`
--
ALTER TABLE `prf_reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prf_users`
--
ALTER TABLE `prf_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prf_reservations`
--
ALTER TABLE `prf_reservations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `prf_users`
--
ALTER TABLE `prf_users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
