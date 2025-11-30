-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 30, 2025 at 04:16 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry_salsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Kairo', '083694521', 'Jl.batu nihil', '2025-11-28 07:45:18', NULL),
(2, 'omang', '0862145278', 'Jl. inerbang jaya', '2025-11-28 07:46:05', NULL),
(3, 'Cani', '0896214551', 'Jl.anugrah indah', '2025-11-28 07:46:05', NULL),
(4, 'fatima', '085532323', 'Jl. Plk II No.25, RT.11/RW.1, Makasar, Kec. Makasar', '2025-11-29 10:27:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2025-11-28 07:10:23', NULL),
(2, 'Operator', '2025-11-28 07:10:23', NULL),
(3, 'Pimpinan', '2025-11-30 09:27:37', '2025-11-30 15:30:31');

-- --------------------------------------------------------

--
-- Table structure for table `level_menus`
--

CREATE TABLE `level_menus` (
  `id` int NOT NULL,
  `level_id` int NOT NULL,
  `menu_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level_menus`
--

INSERT INTO `level_menus` (`id`, `level_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(63, 1, 1, '2025-11-30 15:59:33', NULL),
(64, 1, 2, '2025-11-30 15:59:33', NULL),
(65, 1, 3, '2025-11-30 15:59:33', NULL),
(66, 1, 4, '2025-11-30 15:59:33', NULL),
(67, 1, 5, '2025-11-30 15:59:33', NULL),
(68, 1, 6, '2025-11-30 15:59:33', NULL),
(69, 1, 7, '2025-11-30 15:59:33', NULL),
(70, 1, 8, '2025-11-30 15:59:33', NULL),
(71, 1, 9, '2025-11-30 15:59:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `icon` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `link` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `order` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `icon`, `link`, `order`, `created_at`, `updated_at`) VALUES
(1, 'dashboard', 'bi bi-layers', 'dashboard', 1, '2025-11-28 07:38:34', NULL),
(2, 'customer', 'bi bi-people', 'customer', 2, '2025-11-28 07:38:34', NULL),
(3, 'services', 'bi bi-gear', 'services', 3, '2025-11-28 07:38:34', '2025-11-29 09:18:05'),
(4, 'Level', 'bi bi-hourglass', 'level', 4, '2025-11-28 07:23:37', '2025-11-30 14:08:29'),
(5, 'user', 'bi bi-person', 'user', 5, '2025-11-28 07:38:34', '2025-11-29 09:13:40'),
(6, 'tax', 'bi bi-percent', 'tax', 6, '2025-11-28 07:38:34', NULL),
(7, 'menu', 'bi bi-collection', 'menu', 7, '2025-11-28 07:38:34', NULL),
(8, 'order', 'bi bi-clipboard-check', 'order', 8, '2025-11-28 07:38:34', NULL),
(9, ' order report', 'bi bi-clipboard-data', 'report', 9, '2025-11-30 14:06:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `price`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Cuma Cuci', 12000, 'sangat baik', '2025-11-28 07:47:28', '2025-11-29 10:48:58'),
(2, 'Cuci dan Gosok', 13000, 'hasil bagus', '2025-11-28 07:47:28', '2025-11-30 10:16:32'),
(3, 'Cuma Gosok', 4000, 'gosok aja ', '2025-11-28 07:47:28', '2025-11-30 10:16:05'),
(4, 'Laundry Berat', 15000, 'selimut', '2025-11-30 10:15:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taxs`
--

CREATE TABLE `taxs` (
  `id` int NOT NULL,
  `percent` int NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taxs`
--

INSERT INTO `taxs` (`id`, `percent`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 11, 1, '2025-11-28 07:47:56', '2025-11-29 15:15:06');

-- --------------------------------------------------------

--
-- Table structure for table `trans_orders`
--

CREATE TABLE `trans_orders` (
  `id` int NOT NULL,
  `customer_id` int NOT NULL,
  `order_code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `order_end_date` date NOT NULL,
  `order_status` tinyint(1) NOT NULL DEFAULT '0',
  `order_pay` int NOT NULL,
  `order_change` int NOT NULL,
  `order_tax` int NOT NULL,
  `order_total` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trans_orders`
--

INSERT INTO `trans_orders` (`id`, `customer_id`, `order_code`, `order_end_date`, `order_status`, `order_pay`, `order_change`, `order_tax`, `order_total`, `created_at`, `updated_at`) VALUES
(18, 3, 'ORD-2911251800', '2025-11-08', 1, 5000, 200, 800, 4800, '2025-11-29 15:08:13', NULL),
(19, 4, 'ORD-3011251900', '2025-11-12', 0, 20000, 4016, 1584, 15984, '2025-11-30 09:25:47', '2025-11-30 14:10:52'),
(20, 1, 'ORD-3011252000', '2025-11-26', 1, 25000, 2356, 2244, 22644, '2025-11-30 14:21:20', NULL),
(21, 1, 'ORD-3011252100', '2025-11-21', 0, 30000, 10020, 1980, 19980, '2025-11-30 15:01:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trans_order_detail`
--

CREATE TABLE `trans_order_detail` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `service_id` int NOT NULL,
  `qty` decimal(10,1) NOT NULL,
  `price` int NOT NULL,
  `subtotal` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trans_order_detail`
--

INSERT INTO `trans_order_detail` (`id`, `order_id`, `service_id`, `qty`, `price`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1.6, 12000, 19200, '2025-11-28 08:01:32', NULL),
(2, 2, 3, 1.5, 4000, 6000, '2025-11-29 09:32:13', NULL),
(3, 3, 3, 1.5, 4000, 6000, '2025-11-29 09:32:35', NULL),
(4, 4, 3, 1.5, 4000, 6000, '2025-11-29 09:35:24', NULL),
(5, 5, 2, 1.4, 13000, 18200, '2025-11-29 09:40:10', NULL),
(6, 6, 2, 1.4, 13000, 18200, '2025-11-29 09:40:10', NULL),
(7, 7, 1, 1.5, 12000, 18000, '2025-11-29 09:54:02', NULL),
(8, 8, 2, 1.4, 13000, 18200, '2025-11-29 09:56:35', NULL),
(9, 9, 3, 1.0, 4000, 4000, '2025-11-29 10:59:29', NULL),
(10, 10, 2, 1.2, 13000, 15600, '2025-11-29 11:22:00', NULL),
(11, 11, 2, 1.9, 13000, 24700, '2025-11-29 11:23:58', NULL),
(12, 12, 1, 1.7, 12000, 20400, '2025-11-29 11:39:40', NULL),
(13, 13, 1, 1.7, 12000, 20400, '2025-11-29 11:40:17', NULL),
(14, 14, 3, 4.2, 4000, 16800, '2025-11-29 11:51:43', NULL),
(15, 15, 1, 1.2, 12000, 14400, '2025-11-29 11:57:59', NULL),
(16, 16, 3, 1.0, 4000, 4000, '2025-11-29 14:26:40', NULL),
(17, 16, 2, 1.0, 13000, 13000, '2025-11-29 14:26:40', NULL),
(18, 17, 1, 1.2, 12000, 14400, '2025-11-29 14:54:39', NULL),
(19, 17, 3, 2.5, 4000, 10000, '2025-11-29 14:54:39', NULL),
(20, 18, 3, 1.0, 4000, 4000, '2025-11-29 15:08:13', NULL),
(21, 19, 1, 1.2, 12000, 14400, '2025-11-30 09:25:48', NULL),
(22, 20, 1, 1.7, 12000, 20400, '2025-11-30 14:21:20', NULL),
(23, 21, 1, 1.5, 12000, 18000, '2025-11-30 15:01:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `level_id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `level_id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'salsa@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2025-11-28 07:05:44', '2025-11-30 15:32:12'),
(2, 2, 'Operator', 'Operator@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2025-11-28 07:31:42', '2025-11-28 07:42:29'),
(3, 3, 'Pak dee', 'pimpinan@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2025-11-30 14:26:22', '2025-11-30 15:30:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_menus`
--
ALTER TABLE `level_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxs`
--
ALTER TABLE `taxs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_orders`
--
ALTER TABLE `trans_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_order_detail`
--
ALTER TABLE `trans_order_detail`
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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `level_menus`
--
ALTER TABLE `level_menus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `taxs`
--
ALTER TABLE `taxs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trans_orders`
--
ALTER TABLE `trans_orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `trans_order_detail`
--
ALTER TABLE `trans_order_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
