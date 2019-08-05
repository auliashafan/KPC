-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2019 at 06:34 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbkpc`
--

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
(3, '2019_07_11_064638_create_requests_table', 1);

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
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicationtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `costcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorizedby` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acceptedby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `daterequest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateexpected` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requester_id` bigint(20) UNSIGNED NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `batch_number`, `applicationtitle`, `request_text`, `costcode`, `authorizedby`, `acceptedby`, `daterequest`, `dateexpected`, `status`, `requester_id`, `approved`, `created_at`, `updated_at`) VALUES
(8, '1291', 'Request Aplikasi X', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam enim tellus, eleifend id risus id, fermentum faucibus erat. Curabitur dictum mi quam, ut rutrum ex ornare vel. Aenean quis arcu eu quam vulputate finibus. Curabitur a sem sagittis, mollis est ac, ultricies lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque et volutpat velit. In dictum, dui non gravida gravida, sapien velit convallis magna, non sagittis augue magna eget nibh. Nullam at ante neque. Duis iaculis non velit quis euismod. Nulla sodales sed orci non malesuada. Aenean at velit velit. Quisque lacinia blandit congue.</p>', '15315A', '11', NULL, '08/07/2019', '09/19/2019', 'Request', 5, 0, '2019-08-04 09:31:50', '2019-08-04 09:31:50');

-- --------------------------------------------------------

--
-- Table structure for table `revision`
--

CREATE TABLE `revision` (
  `id` int(11) NOT NULL,
  `request_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `requester_id` int(10) NOT NULL,
  `revision` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `division`, `department`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aulia Shafa', 'Information Technology', 'System Compliance', 'User', 'aulia@test.com', NULL, '$2y$10$b5o4FmoHajPwHusOp/qdJ.r9nFsIfkJMHw8VaKUlI.TnuBi4xT22i', NULL, '2019-07-11 02:03:16', '2019-07-11 02:03:16'),
(5, 'User1', 'Human Resources', 'CPP Maintenance', 'User', 'user1@test.com', NULL, '$2y$10$o4vfPRqDQMIhl69QgjQ5bOO4l3mELRM31OZyFzitF3hFWC0ZXkj9K', NULL, '2019-07-19 23:43:15', '2019-07-19 23:43:15'),
(6, 'User2', 'Human Resources', 'CPP Maintenance', 'User', 'user2@test.com', NULL, '$2y$10$Ft.U6abXqFvJKlMYFHcjsO2Bh0UqRusHTZfHyvyUX5mKX4UoIXQvG', NULL, '2019-07-19 23:43:29', '2019-07-19 23:43:29'),
(7, 'User3', 'Human Resources', 'Infrastructure', 'User', 'user3@test.com', NULL, '$2y$10$Vrh8LL.9xl4uehtPi5FZh.XiWwWSMTjjlAPvb33GWZg8wSSe6Pq4q', NULL, '2019-07-19 23:43:47', '2019-07-19 23:43:47'),
(8, 'Admin1', 'Coal Processing and Handling', 'CPP Maintenance', 'Admin', 'admin1@test.com', NULL, '$2y$10$vgm7Xmf4g9gQgPjWpt9aRejrqEZTY4guMlRZsz4eoyAcuwzneX/sO', NULL, '2019-07-19 23:44:10', '2019-07-19 23:44:10'),
(9, 'Admin2', 'Coal Processing and Handling', 'Infrastructure', 'Admin', 'admin2@test.com', NULL, '$2y$10$qZfZU5sTP/d9D0IAmVVn4e6bkMwpVp2r1fdZjbTdFvejxfWSTfcAm', NULL, '2019-07-19 23:44:29', '2019-07-19 23:44:29'),
(10, 'Admin3', 'Health Safety', 'CPP Maintenance', 'Admin', 'admin3@test.com', NULL, '$2y$10$yjH2pU.rzkxes9nXy3itxe8N87nVvam83In7wA3X6bluZEY.DSMfC', NULL, '2019-07-19 23:44:44', '2019-07-19 23:44:44'),
(11, 'Manager1', 'Coal Processing and Handling', 'CPP Maintenance', 'Manager', 'manager1@test.com', NULL, '$2y$10$XXFHeHFZyDFfI9ZyvuuZ5eVEQ5NL1K9O7mMryjqrya3Cc.Cf//J7a', NULL, '2019-07-19 23:46:11', '2019-07-19 23:46:11'),
(12, 'Generalmanager1', 'Coal Processing and Handling', 'Infrastructure', 'General Manager', 'generalmanager1@test.com', NULL, '$2y$10$39djcyIt6Gx.2aYj.ifdlODJw1i6phH5tfx52LkSRlPvTOWwWtE/S', NULL, '2019-07-19 23:46:36', '2019-07-19 23:46:36');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requests_requester_id_foreign` (`requester_id`);

--
-- Indexes for table `revision`
--
ALTER TABLE `revision`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `revision`
--
ALTER TABLE `revision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_requester_id_foreign` FOREIGN KEY (`requester_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
