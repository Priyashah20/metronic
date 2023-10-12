-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 12, 2023 at 03:03 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metronic`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(4, 'priya shah', 'Loreum Ipsum..', '2023-02-16 05:32:33', '2023-02-16 05:35:04'),
(5, 'hello', 'Body Here', '2023-02-16 05:41:55', '2023-02-16 05:41:55'),
(6, 'World', 'Insert Data', '2023-02-16 05:52:57', '2023-02-16 05:52:57'),
(7, 'World', 'Insert Data', '2023-02-16 05:57:51', '2023-02-16 05:57:51'),
(8, 'World234', 'New Data', '2023-02-16 05:58:30', '2023-02-16 08:16:57'),
(9, 'World12121', 'New Data', '2023-02-16 05:59:05', '2023-02-16 05:59:05');

-- --------------------------------------------------------

--
-- Table structure for table `cities_tables`
--

CREATE TABLE `cities_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0-active,1-in-active,2-delete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities_tables`
--

INSERT INTO `cities_tables` (`id`, `city`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ahmedabad', '0', '2022-11-29 00:11:46', '2022-11-29 00:54:44'),
(2, 'Surat', '0', '2022-11-29 00:11:56', '2022-11-29 01:39:20'),
(3, 'Mumbai', '0', '2022-11-29 00:12:05', '2023-02-15 04:53:36'),
(4, 'Vadodara', '2', '2022-11-29 01:02:18', '2022-11-29 05:38:00'),
(5, 'Kutch', '0', '2022-11-29 01:04:47', '2023-02-21 03:23:51'),
(6, 'Bharuch', '2', '2022-11-29 05:37:39', '2022-11-29 05:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `date_of_anniversary` date NOT NULL,
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0-active,1-in-active,2-delete',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `surname`, `email`, `mobile`, `date_of_birth`, `date_of_anniversary`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'aaaa', 'priya', 'shah', 'priya@gmail.com', '985878586', '2023-02-18', '2023-02-16', '2', NULL, '2023-02-22 04:59:16', '2023-02-22 05:06:22'),
(2, 'Priya', 'priya', 'shah', 'priya@gmail.com', '985878586', '2023-02-18', '2023-02-16', '0', NULL, '2023-02-22 04:59:16', '2023-02-22 05:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE `docs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, '1677837797.doc', '2023-03-03 04:33:17', '2023-03-03 04:33:17'),
(2, '1677838270.doc', '2023-03-03 04:41:10', '2023-03-03 04:41:10'),
(3, '1677838316.doc', '2023-03-03 04:41:56', '2023-03-03 04:41:56'),
(4, '1677840405.doc', '2023-03-03 05:16:45', '2023-03-03 05:16:45'),
(5, '1677841272.doc', '2023-03-03 05:31:12', '2023-03-03 05:31:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(61, '2022_11_14_074151_add_image_signup_table', 1),
(119, '2014_10_12_000000_create_users_table', 2),
(120, '2014_10_12_100000_create_password_resets_table', 2),
(121, '2019_08_19_000000_create_failed_jobs_table', 2),
(122, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(123, '2022_11_01_084638_create_signup_table', 2),
(124, '2022_11_18_105857_add_username_to_users_table', 2),
(125, '2022_11_21_064640_add_login_counter_signup_table', 2),
(127, '2022_11_28_090326_create_cities_tables', 3),
(130, '2022_11_30_092457_create_user_role_type_table', 4),
(132, '2022_11_30_093731_add_foreign_key_users_table', 5),
(133, '2022_12_27_095917_create_usertest_table', 6),
(134, '2022_12_29_110735_create_categories_table', 7),
(135, '2023_01_18_064505_create_blogs_table', 8),
(139, '2023_02_22_054829_create_customers_table', 9),
(140, '2023_03_03_061945_create_docs_table', 10),
(141, '2023_03_09_071959_create_events_table', 11),
(142, '2023_07_24_074506_create_products_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `category`, `price`, `color`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sd', 'd', '12', 'pink', '4', 'Active', '2023-07-24 03:30:54', '2023-07-24 04:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `logincounter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `name`, `email`, `phone`, `password`, `image`, `token`, `created_at`, `updated_at`, `logincounter`) VALUES
(1, 'Priya', 'priya@gmail.com', '7809998675', '$2y$10$UxiijP/H7KFh9p2aJ820v.l4Bl7THQc3C4.gy4y69dTiZ8X/vWfPS', 'temple-6929982__340.jpg', 'AVGB2H', '2022-11-23 03:04:00', '2023-10-12 06:03:57', '108');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hobbies` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('0','1','2') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '0-Male,1-Female,2-Other',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0-active,1-in-active,2-delete',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `email_verified_at`, `phone`, `hobbies`, `gender`, `address`, `password`, `city`, `image`, `status`, `remember_token`, `deleted_at`, `created_at`, `updated_at`, `username`, `user_type`) VALUES
(1, 'shah', 'priya', 'priya55@gmail.com', NULL, '985878586', 'singing', '1', 'ranip2eewreassww', '$2y$10$VgJLmN6dTSX3DSbcFb/q9.mlh89aVfn5gBc59z2YtGGw6WhhTo.HO', NULL, 'Screenshot from 2022-02-22 18-17-24.png', '0', NULL, NULL, '2022-11-23 03:04:25', '2023-02-24 05:43:00', 'shah_priya', ''),
(2, 'Riddhi', 'shah', 'riddhi@gmail.com', NULL, '985878586', 'singing,playing', '1', 'Sab2', '$2y$10$2mendtU.JASf1SsAPO1gROvvbaPDLuU0tyqtsAVTIOH5AdHaEGRKy', 'Surat', 'Screenshot from 2022-01-05 15-59-14.png', '0', NULL, NULL, '2022-11-23 03:34:19', '2023-03-02 06:25:15', 'Riddhi_shah', NULL),
(3, 'Riya', 'shah', 'riya@gmail.com', NULL, '8888888541', 'singing,reading', '1', 'Sabarmati2', '$2y$10$e0C3XTaE8bHyZ/5oNheMAuusADrbcndMNyL54nxJpp2IUxSh0YRBq', 'Ahmedabad', 'black.jpeg', '1', NULL, NULL, '2022-11-28 01:14:52', '2023-03-02 06:24:53', 'Riya_shah', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usertest`
--

CREATE TABLE `usertest` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usertest`
--

INSERT INTO `usertest` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Priya', 'priya@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_role_type`
--

CREATE TABLE `user_role_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0-active,1-in-active,2-delete',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_role_type`
--

INSERT INTO `user_role_type` (`id`, `role`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Teacher', '0', NULL, '2022-11-30 04:34:10', '2022-11-30 04:57:50'),
(2, 'Student', '0', NULL, '2022-11-30 04:58:00', '2022-11-30 04:58:00'),
(3, 'Principle', '0', NULL, '2022-11-30 04:58:10', '2022-11-30 04:58:10'),
(4, 'Peon', '0', NULL, '2022-11-30 04:58:20', '2022-11-30 04:58:20'),
(5, 'Watchmen', '1', NULL, '2022-11-30 04:58:29', '2022-11-30 06:38:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities_tables`
--
ALTER TABLE `cities_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertest`
--
ALTER TABLE `usertest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role_type`
--
ALTER TABLE `user_role_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cities_tables`
--
ALTER TABLE `cities_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `docs`
--
ALTER TABLE `docs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `usertest`
--
ALTER TABLE `usertest`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_role_type`
--
ALTER TABLE `user_role_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
