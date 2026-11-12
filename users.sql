-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2026 at 05:38 AM
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
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','candidate') DEFAULT 'candidate',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Neha maurya', 'nmaurya7839@gmail.com', '$2y$10$KlD5lPxOu.bYGxeeuHDttOyQ7MmchHDJKma7LFR7gw7Suuj5.EInu', 'candidate', '2026-10-22 06:55:41'),
(2, 'Neha maurya', 'nmaurya7679@gmail.com', '$2y$10$krboDIJNjmJE2ZpCnSonduTr6OLjZuJd3b0y/Ut6lRAeb5xF/YPau', 'candidate', '2026-10-22 06:57:37'),
(3, 'Rohu', 'rohu12@gmail.com', '$2y$10$/XDjCzV6wAMbzRtsZFZI/O6nFhb92YPTsGdDBEi7RXdajt69/n7dK', 'candidate', '2026-10-23 03:08:46'),
(4, 'radha', 'radha12@gmail.com', '$2y$10$jDDGZKcTb.aOPVD39QMWYO9EH5Qs8PN1tVYn6yCPQLSOfRxFSUYLO', 'candidate', '2026-10-23 03:10:07'),
(5, 'abc', 'abc@gmail.com', '$2y$10$TlWnfZKOsCgsp47cETdCoOBpPbRENTi949yqZhQneFGYS1fTxNETO', 'candidate', '2026-10-23 03:12:40'),
(6, 'Neha maurya', 'nm7839@gmail.com', '$2y$10$KBS/LZxtZINWb2vU3ggSzOJiVNGwRZwY3vozD9PO0svypFRk0k4oO', 'candidate', '2026-10-23 03:14:28'),
(7, 'Neha maurya', 'nma7839@gmail.com', '$2y$10$Lz2V1ISSJ7GXNbaKOLGs/.GH6ShlfY2Bu2tDsm8vMUbD7vUVVXq5K', 'candidate', '2026-10-23 03:16:37'),
(8, 'xyz', 'xyz@gmail.com', '$2y$10$qnJqRUEEcBFBV84anpL6ZOMbIDPQ6vHpOHnZGGHj8twsqlgq.H1jq', 'candidate', '2026-10-23 04:38:45'),
(9, 'sdsfsf', 'asdfsf@gmail.com', '$2y$10$JiFtl1ZizLQsVsFY.qtyqebWIPc8B6OO09YczptS1ZjsHJdtS5P4a', 'candidate', '2026-10-23 04:40:11'),
(10, 'kamal kumar', 'kamal123@gmail.com', '$2y$10$exwzUjGoGHtOBZv8I./F6ebLIU6npXNgM7v4ysqBK4uhL8lzKIR3q', 'candidate', '2026-10-23 06:40:26'),
(11, 'roma', 'roma12@gmail.com', '$2y$10$xC09f2/aIzms17feovPcTus0SEyn7VHlnQPd8p8OmtR20V9u7t4.K', 'candidate', '2026-10-24 05:47:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
