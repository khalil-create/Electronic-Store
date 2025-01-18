-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2024 at 06:53 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electronic_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'الأجهزة الذكية', 'أجهزة ذكية بجميع انواعها ( سامسونق، آيفون، وغيرها ) بجميع انواعها', '2024-11-16 23:25:15', '2024-12-04 15:19:52'),
(3, 'السماعات و ملحقاتها', 'جميع انواع السماعات السلكية واللاسلكية لجميع انواع الأجهزة الذكية', '2024-12-04 15:38:58', '2024-12-04 15:38:58'),
(4, 'الشاشات والكاميرات', 'تحتوي على جميع الشاشات والكاميرات بجميع انواعها', '2024-12-08 15:27:23', '2024-12-08 15:29:48');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `posted_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `item_id`, `content`, `posted_at`, `created_at`, `updated_at`) VALUES
(2, 1, 3, 'هذا المنتج حلو جدا', '2024-11-25 00:50:57', '2024-11-24 21:50:57', '2024-11-24 21:50:57'),
(3, 1, 3, 'هذا المنتج حلو جدا', '2024-11-25 01:55:47', '2024-11-24 22:55:47', '2024-11-24 22:55:47'),
(4, 1, 1, 'هذا المنتج حلو', '2024-12-07 17:19:14', '2024-12-07 14:19:14', '2024-12-07 14:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `item_id`, `image`, `created_at`, `updated_at`) VALUES
(4, 7, '1731808206-1.jpg', '2024-11-17 01:03:49', '2024-11-17 01:50:06'),
(5, 7, '1731808206-2.jpg', '2024-11-17 01:03:49', '2024-11-17 01:50:06'),
(6, 7, '1731808206-3.jpg', '2024-11-17 01:03:49', '2024-11-17 01:50:06'),
(7, 1, '1731970926-1.jpg', '2024-11-18 23:02:06', '2024-11-18 23:02:06'),
(8, 1, '1731970926-2.jpg', '2024-11-18 23:02:06', '2024-11-18 23:02:06'),
(9, 1, '1731970926-3.jpg', '2024-11-18 23:02:06', '2024-11-18 23:02:06'),
(10, 2, '1731970975-1.jpg', '2024-11-18 23:02:56', '2024-11-18 23:02:56'),
(11, 2, '1731970975-2.jpg', '2024-11-18 23:02:56', '2024-11-18 23:02:56'),
(12, 2, '1731970976-3.jpg', '2024-11-18 23:02:56', '2024-11-18 23:02:56'),
(13, 3, '1731971013-1.jpg', '2024-11-18 23:03:33', '2024-11-18 23:03:33'),
(14, 3, '1731971013-2.jpg', '2024-11-18 23:03:33', '2024-11-18 23:03:33'),
(15, 3, '1731971013-3.jpg', '2024-11-18 23:03:33', '2024-11-18 23:03:33'),
(16, 8, '1733325260-1.png', '2024-12-04 15:14:20', '2024-12-04 15:14:20'),
(17, 8, '1733325260-2.png', '2024-12-04 15:14:20', '2024-12-04 15:14:20'),
(18, 8, '1733325260-3.png', '2024-12-04 15:14:20', '2024-12-04 15:14:20');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `model_no` bigint(20) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `price`, `model_no`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'جهاز جلاكسي نوت 9', 'جهاز جلاكسي نوت 9 ، جديد ، غير مطبع', 200, 10, 1, '2024-11-16 23:41:17', '2024-12-06 20:37:29'),
(2, 'test', 'testtttttttttttttt', 1000, 10, 3, '2024-11-17 00:04:34', '2024-12-08 15:33:32'),
(3, 'شاشة', 'مواصفات الشاشة', 230, 10, 3, '2024-11-17 00:17:36', '2024-12-08 15:30:57'),
(7, 'كاميرا', 'مواصفات الكاميرا', 1000, 10, 4, '2024-11-17 01:03:49', '2024-12-08 15:27:45'),
(8, 'سامسونج جالكسي اس 24 الترا سعة 256 جيجا رام 12 جيجا', 'سامسونج جالكسي S24 الترا 256 جيجا، 12 جيجا رام: تجربة لا مثيل لها في عالم الهواتف الذكية\r\n\r\nإذا كنت تبحث عن هاتف يجمع بين الأداء القوي، التصميم العصري، والإمكانات التقنية المتقدمة، فإن سامسونج جالكسي S24 الترا هو الخيار الأمثل لك. صمم هذا الهاتف خصيصًا ليناسب نمط حياتك المتسارع وليتيح لك الاستفادة من أحدث تقنيات الاتصالات والتصوير.', 1500, 10, 1, '2024-12-04 15:14:20', '2024-12-04 15:14:20');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_04_08_000000_create_users_table', 1),
(4, '2023_05_08_000000_create_categories_table', 1),
(5, '2023_05_08_000000_create_items_table', 1),
(6, '2023_06_25_123118_create_images_table', 1),
(7, '2023_09_24_201351_create_comments_table', 1),
(8, '2023_04_09_024758_create_system_variables_table', 2);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_variables`
--

CREATE TABLE `system_variables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 USD, 2 YER, 3 SAR',
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tweeter_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `system_variables`
--

INSERT INTO `system_variables` (`id`, `site_name`, `site_phone`, `currency`, `facebook_url`, `tweeter_url`, `address`, `image_logo`, `created_at`, `updated_at`) VALUES
(1, 'المسعودي', '775006398', 1, '#', '#', 'صنعاء', '1733698182.png', NULL, '2024-12-08 22:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1 for active, 2 for unactive',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1 for admins, 2 for customers',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `phone_no`, `status`, `image`, `type`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'خليل (الأدمن)', 'admin', '775006398', 1, NULL, 1, 'admin@gmail.com', '$2y$10$jp1SHp2KKs8eonY6kPTWtOxKRvDa4HkqiF5Fr/aXxIC0I5PfspJ3e', NULL, '2024-11-16 17:33:48', '2024-12-15 16:33:58'),
(2, 'محمد نجيب', 'mohammed', '771234567', 1, '1731793729.png', 2, 'mohammed@gmail.com', '$2y$10$XSJd/V/.Fyn0SaHCfcGDeOSqPFBwGRjrAlDkHXMHPPwhdQRGAomSu', NULL, '2024-11-16 21:48:49', '2024-11-16 21:59:36'),
(5, 'خليل العميسي', 'khalil', '7712345677', 1, NULL, 2, 'khalil@gmail.com', '$2y$10$6.P0mVavfpyoE/0IJjnan.RlkJlY0mfrjWeusE/LHCknjeRgciLfG', NULL, '2024-12-06 09:07:55', '2024-12-06 09:07:55'),
(6, 'محمد علي', 'mohammed', '775123467', 1, NULL, 2, 'mohammed11@gmail.com', '$2y$10$gx5HptyRC5hk1/yZEupOXuEEqHqx5Jk4JGht2.NQQOgqdmIjYab5S', NULL, '2024-12-15 15:48:33', '2024-12-15 15:48:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_item_id_foreign` (`item_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_item_id_foreign` (`item_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_category_id_foreign` (`category_id`);

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
-- Indexes for table `system_variables`
--
ALTER TABLE `system_variables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_no_unique` (`phone_no`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_variables`
--
ALTER TABLE `system_variables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
