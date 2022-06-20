-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 04:54 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_api`
--

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_20_074730_create_pages_table', 1),
(6, '2022_06_20_094447_create_posts_table', 1),
(7, '2022_06_20_140950_create_user_followers_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Another film2 page', '2022-06-20 04:06:09', '2022-06-20 04:06:09'),
(2, 1, 'A very good page name', '2022-06-20 04:06:16', '2022-06-20 04:06:16'),
(3, 1, 'A very good page name', '2022-06-20 05:07:38', '2022-06-20 05:07:38'),
(4, 1, 'A very good page name', '2022-06-20 05:08:23', '2022-06-20 05:08:23'),
(5, 1, 'A very good page name', '2022-06-20 07:59:51', '2022-06-20 07:59:51'),
(6, 1, 'User 1\'s x page', '2022-06-20 07:59:51', '2022-06-20 07:59:51'),
(7, 1, 'User 1\'s y page', '2022-06-20 07:59:51', '2022-06-20 07:59:51'),
(8, 1, 'User 1\'s dummy page', '2022-06-20 07:59:51', '2022-06-20 07:59:51'),
(9, 1, 'User 1\'s good page', '2022-06-20 07:59:51', '2022-06-20 07:59:51'),
(10, 1, 'A very good page name', '2022-06-20 08:00:57', '2022-06-20 08:00:57'),
(11, 1, 'User 1\'s x page', '2022-06-20 08:00:57', '2022-06-20 08:00:57'),
(12, 1, 'User 1\'s y page', '2022-06-20 08:00:57', '2022-06-20 08:00:57'),
(13, 1, 'User 1\'s dummy page', '2022-06-20 08:00:57', '2022-06-20 08:00:57'),
(14, 1, 'User 1\'s good page', '2022-06-20 08:00:57', '2022-06-20 08:00:57');

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'API Token', '4d40da3d81c5b57fa7d179a58191ab297355c474af15521cea5b1575da22c645', '[\"*\"]', NULL, '2022-06-20 04:03:34', '2022-06-20 04:03:34'),
(2, 'App\\Models\\User', 2, 'API Token', '3bb9ec9c61280adc7aa0723ed50ee3557137dfb2aed78aab72cace89832d7e9f', '[\"*\"]', NULL, '2022-06-20 04:03:34', '2022-06-20 04:03:34'),
(3, 'App\\Models\\User', 1, 'API Token', '990138533293c8227393dcaede0c66b49e87d7ead1b01d775800c2c222db474a', '[\"*\"]', '2022-06-20 07:16:36', '2022-06-20 04:04:23', '2022-06-20 07:16:36'),
(4, 'App\\Models\\User', 1, 'API Token', '26861fcd1e6555a54aea72d4d9eaeb2fd7019585d2e56409447001d3407ca6c5', '[\"*\"]', NULL, '2022-06-20 04:06:16', '2022-06-20 04:06:16'),
(5, 'App\\Models\\User', 3, 'API Token', '57a189b1bb13a03bd6c11272d98a78636f5e908d469a56ffc0a27db14269ab5b', '[\"*\"]', NULL, '2022-06-20 04:06:16', '2022-06-20 04:06:16'),
(6, 'App\\Models\\User', 1, 'API Token', '728826b5e4022a143c79840f69fcb40e8cdb532c5484d59d442f54892ecec997', '[\"*\"]', NULL, '2022-06-20 05:07:38', '2022-06-20 05:07:38'),
(7, 'App\\Models\\User', 4, 'API Token', 'f1a390292aba980ed1a518397ecdd256d81ef24685f14635ace62d82d43fdc73', '[\"*\"]', NULL, '2022-06-20 05:07:38', '2022-06-20 05:07:38'),
(8, 'App\\Models\\User', 1, 'API Token', '634a4d768aaf709115139063e3c5d6aef0428307e5fa2587ad156f5e5e96d555', '[\"*\"]', NULL, '2022-06-20 05:08:23', '2022-06-20 05:08:23'),
(9, 'App\\Models\\User', 5, 'API Token', 'd8a180282e7d518d2ab12ae5c0e88992f87d552f13bfaaa5ec6327add53185b5', '[\"*\"]', NULL, '2022-06-20 05:08:23', '2022-06-20 05:08:23'),
(10, 'App\\Models\\User', 6, 'API Token', 'f115d13bb71e46832d998567c462560f04b7a78e300d7402ed691e315a31953f', '[\"*\"]', NULL, '2022-06-20 06:43:06', '2022-06-20 06:43:06'),
(11, 'App\\Models\\User', 7, 'API Token', '7b6a30ef9f1931faa999ef708ca3da82dade802bca76b84d6d8011a98d07b12c', '[\"*\"]', NULL, '2022-06-20 07:14:55', '2022-06-20 07:14:55'),
(12, 'App\\Models\\User', 7, 'API Token', '2a561d83dfbdd6111c01b90f711b14ca737e1bd442f5e9d2a0c73f04463de69d', '[\"*\"]', '2022-06-20 07:26:00', '2022-06-20 07:16:47', '2022-06-20 07:26:00'),
(13, 'App\\Models\\User', 1, 'API Token', '8c2e0560eb3588b1a262e4674ce1fb5625c9fed8839b622eef1eacd91c301e1c', '[\"*\"]', '2022-06-20 08:51:01', '2022-06-20 07:30:58', '2022-06-20 08:51:01'),
(14, 'App\\Models\\User', 1, 'API Token', '626b8c8ea5e13ae646e96602be0dd54c69551ced66dd8ebbaf56e5d479062b44', '[\"*\"]', NULL, '2022-06-20 07:59:51', '2022-06-20 07:59:51'),
(15, 'App\\Models\\User', 8, 'API Token', '76e9a14d4274895b91e10e4dc43fe1ff6b5415ca9e2b2c1ac7f02504783bf3b6', '[\"*\"]', NULL, '2022-06-20 07:59:51', '2022-06-20 07:59:51'),
(16, 'App\\Models\\User', 1, 'API Token', 'f65d52e002f44fe9f89f4b945df1b8b9c1168d5ffedf9ad921df5c3b22886bc2', '[\"*\"]', NULL, '2022-06-20 08:00:57', '2022-06-20 08:00:57'),
(17, 'App\\Models\\User', 9, 'API Token', 'f17e2f6b49e72f188da060500d86b4695dadc1e3bf0f3734782d7c17b3d356c8', '[\"*\"]', NULL, '2022-06-20 08:00:57', '2022-06-20 08:00:57');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `postable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postable_id` bigint(20) UNSIGNED NOT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `postable_type`, `postable_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'hello, this is my first post', '2022-06-20 04:52:34', '2022-06-20 04:52:34'),
(2, 'App\\Models\\User', 1, 'This is a test post content', '2022-06-20 05:08:23', '2022-06-20 05:08:23'),
(3, 'App\\Models\\User', 1, 'hello, this is my second post', '2022-06-20 06:42:42', '2022-06-20 06:42:42'),
(4, 'App\\Models\\User', 1, 'This is my second page post', '2022-06-20 07:38:02', '2022-06-20 07:38:02'),
(5, 'App\\Models\\Page', 1, 'This is my third page post', '2022-06-20 07:47:58', '2022-06-20 07:47:58'),
(6, 'App\\Models\\Page', 9, 'This is a test post content', '2022-06-20 07:59:51', '2022-06-20 07:59:51'),
(7, 'App\\Models\\User', 1, 'This is a test post content', '2022-06-20 07:59:51', '2022-06-20 07:59:51'),
(8, 'App\\Models\\Page', 14, 'This is a test post content', '2022-06-20 08:00:57', '2022-06-20 08:00:57'),
(9, 'App\\Models\\User', 1, 'This is a test post content', '2022-06-20 08:00:57', '2022-06-20 08:00:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'One', 'user1@example.com', '2022-06-20 03:52:11', '$2y$10$Fl3WRC1MeH.Alpmrp9ts4.OhnajQTOnN/E0kfg.R/wj7jwggAcy2q', NULL, '2022-06-20 03:52:11', '2022-06-20 03:52:11'),
(2, 'King', 'Lockman', 'feeney.nyah@yahoo.com', '2022-06-20 04:03:34', '$2y$04$SV7RBr8ENpZu22jd2zi37usfPoFgUfSHmaIiPYjbN/2GvND1H17di', NULL, '2022-06-20 04:03:34', '2022-06-20 04:03:34'),
(3, 'Maia', 'Glover', 'tkirlin@gmail.com', '2022-06-20 04:06:16', '$2y$04$Xv3RoDBW2no0Z0WaSUHrR.wDqDlNVzJxh5rBmki/.IG9vfyIwx6gG', NULL, '2022-06-20 04:06:16', '2022-06-20 04:06:16'),
(4, 'Issac', 'White', 'angelo14@gmail.com', '2022-06-20 05:07:38', '$2y$04$WxaUnjrWkZOlEd6E2YaEduAlj7MYZWm7jFcEcogPw4DP3XxPaMchC', NULL, '2022-06-20 05:07:38', '2022-06-20 05:07:38'),
(5, 'Grace', 'Hauck', 'urempel@yahoo.com', '2022-06-20 05:08:23', '$2y$04$Snx9cyP406pUFSzLN47vZ.Vtw/TLvTfzbx/c8G7B5iZXv7cZc.yye', NULL, '2022-06-20 05:08:23', '2022-06-20 05:08:23'),
(6, 'John', 'Doe', 'john@doe.com', '2022-06-20 06:43:06', '$2y$10$tvdWpwn27ObNRUCDtECHC.yhfwRRmr8PAT4AMX7quYUYhRc3j.IPq', NULL, '2022-06-20 06:43:06', '2022-06-20 06:43:06'),
(7, 'User', 'Two', 'user2@example.com', '2022-06-20 07:14:55', '$2y$10$1ZGyhdswqDe9kRkzuSwcK.67FWOLTFi3dwQHSqXN7cUDpun4/YK2G', NULL, '2022-06-20 07:14:55', '2022-06-20 07:14:55'),
(8, 'Sonny', 'West', 'kshlerin.jayden@mohr.biz', '2022-06-20 07:59:51', '$2y$04$FrKKSu7MIBPOuLvwl5BVJ.Q.scvJyg.qYGmhUPdyK1t21DVVBssfq', NULL, '2022-06-20 07:59:51', '2022-06-20 07:59:51'),
(9, 'Terrell', 'Murray', 'yhermiston@hotmail.com', '2022-06-20 08:00:57', '$2y$04$dLuh/LcvWdEzr8hUumjwOuioB/Q/1AoK2cRpukgQuBaJYCwhfl5/K', NULL, '2022-06-20 08:00:57', '2022-06-20 08:00:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_followers`
--

CREATE TABLE `user_followers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `follower_id` int(10) UNSIGNED NOT NULL,
  `following_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `pages`
--
ALTER TABLE `pages`
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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_postable_type_postable_id_index` (`postable_type`,`postable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_followers`
--
ALTER TABLE `user_followers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_followers`
--
ALTER TABLE `user_followers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
