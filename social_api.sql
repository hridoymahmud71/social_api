-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 12:06 PM
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
(7, '2022_06_20_140950_create_user_followers_table', 1),
(8, '2022_06_21_071853_create_page_followers_table', 2);

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
(1, 1, 'A film page', '2022-06-21 01:38:22', '2022-06-21 01:38:22'),
(2, 1, 'Another film2 three', '2022-06-21 01:38:30', '2022-06-21 01:38:30'),
(3, 1, 'User 1 business page', '2022-06-21 02:21:14', '2022-06-21 02:21:14'),
(4, 1, 'User 1 sports', '2022-06-21 02:22:51', '2022-06-21 02:22:51'),
(5, 2, 'User 2 business page', '2022-06-21 02:23:59', '2022-06-21 02:23:59');

-- --------------------------------------------------------

--
-- Table structure for table `page_followers`
--

CREATE TABLE `page_followers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `follower_id` int(10) UNSIGNED NOT NULL,
  `page_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_followers`
--

INSERT INTO `page_followers` (`id`, `follower_id`, `page_id`) VALUES
(1, 2, 1),
(2, 3, 5),
(3, 3, 3);

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
(1, 'App\\Models\\User', 1, 'API Token', 'd485bf33970b46141a3b4ceb3b3ca9e32628d41aa51ad866212fe46e55c2d8f9', '[\"*\"]', '2022-06-21 01:40:04', '2022-06-21 01:17:09', '2022-06-21 01:40:04'),
(2, 'App\\Models\\User', 2, 'API Token', 'c256b292d28d9c4cce1aaad470c8d5e7797f9f08318888aa8a0e559d9d5efe93', '[\"*\"]', '2022-06-21 02:18:20', '2022-06-21 01:38:39', '2022-06-21 02:18:20'),
(3, 'App\\Models\\User', 1, 'API Token', 'f19f9fa2090f5003431eb860fcda18af1bdc2d48a1323cec0760c96ea490247c', '[\"*\"]', '2022-06-21 02:22:51', '2022-06-21 02:18:45', '2022-06-21 02:22:51'),
(4, 'App\\Models\\User', 2, 'API Token', 'a5f65abfd805e00491c874e237cb0152e87047522fe65f5dab80d826c0b85a05', '[\"*\"]', NULL, '2022-06-21 02:20:32', '2022-06-21 02:20:32'),
(5, 'App\\Models\\User', 3, 'API Token', '596f2287afa6eee48b49a8fbf2ad4439067822c3593005070919aef71a8c8fbe', '[\"*\"]', NULL, '2022-06-21 02:21:38', '2022-06-21 02:21:38'),
(6, 'App\\Models\\User', 2, 'API Token', 'f58b6b4650e6c96c604e63db38e791081ddefb54460bb08564c9912620226750', '[\"*\"]', '2022-06-21 02:26:19', '2022-06-21 02:23:03', '2022-06-21 02:26:19'),
(7, 'App\\Models\\User', 3, 'API Token', '533a12ff9112da0f9e2d632abfeb642f8dd424d09792854fa4d1eaceaa4430c4', '[\"*\"]', '2022-06-21 04:03:24', '2022-06-21 02:26:28', '2022-06-21 04:03:24'),
(8, 'App\\Models\\User', 1, 'API Token', '965785c920c82ffa7a5263879420fa5a626a52f059dd8e089122a9f5f78b2308', '[\"*\"]', NULL, '2022-06-21 04:04:01', '2022-06-21 04:04:01'),
(9, 'App\\Models\\User', 2, 'API Token', '394f1cb211667ec6ce87819f0d3d498cf34dcdc73e6cba45e29bdea4bb9b1e43', '[\"*\"]', '2022-06-21 04:04:37', '2022-06-21 04:04:08', '2022-06-21 04:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `postable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postable_id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `postable_type`, `postable_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'hello, this is firsrt personal post', '2022-06-21 02:19:49', '2022-06-21 02:19:49'),
(2, 'App\\Models\\Page', 1, 'This is my first page post', '2022-06-21 02:19:59', '2022-06-21 02:19:59'),
(3, 'App\\Models\\User', 1, 'user 2 personal', '2022-06-21 02:20:51', '2022-06-21 02:20:51'),
(4, 'App\\Models\\Page', 5, 'Real madrid wins', '2022-06-21 02:25:35', '2022-06-21 02:25:35'),
(5, 'App\\Models\\User', 2, 'user 2 personal sadness', '2022-06-21 02:26:10', '2022-06-21 02:26:10'),
(6, 'App\\Models\\User', 2, 'user 2 personal happiness', '2022-06-21 02:26:19', '2022-06-21 02:26:19');

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
(1, 'User', 'One', 'user1@example.com', '2022-06-21 01:16:49', '$2y$10$hXSOSt0dQ87nThXfkbOhledT.sx7VARVFw5KR0jsP/7KOP11NNj8a', NULL, '2022-06-21 01:16:49', '2022-06-21 01:16:49'),
(2, 'User', 'Two', 'user2@example.com', '2022-06-21 01:16:49', '$2y$10$UpAvV53WQnVgfOS83MYZH.xB4w7enR0rjQawMTZ4amSQUh1YWOzdu', NULL, '2022-06-21 01:16:49', '2022-06-21 01:16:49'),
(3, 'User', 'three', 'user3@example.com', '2022-06-21 02:21:38', '$2y$10$sSe4sUTmIiMaL9tgA1Iu5ebQxcbdbPELB4ePVccV6O6rDu4UdhUnq', NULL, '2022-06-21 02:21:38', '2022-06-21 02:21:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_followers`
--

CREATE TABLE `user_followers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `follower_id` int(10) UNSIGNED NOT NULL,
  `following_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_followers`
--

INSERT INTO `user_followers` (`id`, `follower_id`, `following_id`) VALUES
(1, 2, 1),
(2, 3, 2),
(3, 3, 1);

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
-- Indexes for table `page_followers`
--
ALTER TABLE `page_followers`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `page_followers`
--
ALTER TABLE `page_followers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_followers`
--
ALTER TABLE `user_followers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
