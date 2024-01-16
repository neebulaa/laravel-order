-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2023 at 02:30 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `name`, `email`, `password`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Dylan Bosco II', 'hyatt.coralie@kertzmann.biz', '$2y$12$grEtReD/wW/fTMbKHoPVMOnNnHw/BZ/0F5taqzML9FngfpV.dDl5K', 1, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(2, 'Kelli Hermiston', 'river58@yahoo.com', '$2y$12$rkZUf2Ko1DwwnkF2HPMRyug6aSbXhxtzmfZvJSB720h3ubBFSEe1e', 0, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(3, 'Bethany Kiehn', 'annetta40@yost.com', '$2y$12$dwZG/9bJjvl.rxkh3E1lCuk9Ql7u8sE1dYeqZLtSE8l3j8Z0.5nkK', 0, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(4, 'Lesly Bosco V', 'vince84@blick.net', '$2y$12$.fJxApbxKY5zJSLQqIj9MuQJ0J1uk7z6Or6.IHvs4Ou6/.cGdeklq', 1, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(5, 'Gabe Rippin', 'samara.kuvalis@hotmail.com', '$2y$12$ClwMUEW7iOKE/9vohkwKreN8ZyGjDZ8uP5lNNSyu6./O9fiU5rMRC', 0, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(6, 'admin', 'admin@gmail.com', '$2y$12$6OTueVBUIHsNPnQo7ErXheNj7pPP7yfz3qBCwEHHNIO8GxsVWTCVe', 1, '2023-11-19 18:28:53', '2023-11-19 18:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('goods','service') NOT NULL,
  `price` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `type`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'Est laboriosam.', 'service', 67.78, 6, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(2, 'Hic.', 'goods', 505.28, 20, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(3, 'Excepturi sed.', 'goods', 904.80, 12, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(4, 'Ullam itaque.', 'service', 465.02, 18, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(5, 'Recusandae quasi.', 'goods', 130.61, 12, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(6, 'Eos reiciendis.', 'goods', 812.96, 20, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(7, 'Oreo', 'service', 854.77, 0, '2023-11-19 18:28:41', '2023-11-19 18:29:31'),
(8, 'Iste.', 'service', 251.24, 5, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(9, 'Rerum.', 'service', 14.52, 3, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(10, 'Eum tempora.', 'service', 111.18, 8, '2023-11-19 18:28:41', '2023-11-19 18:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_09_062340_create_orders_table', 1),
(6, '2023_11_09_062343_create_order_details_table', 1),
(7, '2023_11_09_062347_create_items_table', 1),
(8, '2023_11_09_062351_create_buyers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `buyer_id`, `created_at`, `updated_at`) VALUES
(1, 4, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(2, 1, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(3, 2, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(4, 4, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(5, 4, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(6, 2, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(7, 1, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(8, 4, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(9, 2, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(10, 2, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(11, 6, '2023-11-19 18:29:31', '2023-11-19 18:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `item_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 2, 10, 10, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(2, 10, 10, 6, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(3, 3, 4, 7, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(4, 10, 4, 6, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(5, 4, 2, 10, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(6, 9, 1, 10, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(7, 8, 6, 7, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(8, 10, 5, 3, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(9, 8, 3, 9, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(10, 7, 9, 8, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(11, 4, 9, 9, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(12, 5, 3, 4, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(13, 2, 10, 10, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(14, 10, 3, 5, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(15, 1, 2, 6, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(16, 8, 2, 7, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(17, 5, 4, 10, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(18, 3, 8, 7, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(19, 5, 6, 1, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(20, 1, 2, 7, '2023-11-19 18:28:41', '2023-11-19 18:28:41'),
(21, 11, 7, 3, '2023-11-19 18:29:31', '2023-11-19 18:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `buyers_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
