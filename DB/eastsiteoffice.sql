-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2022 at 03:10 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eastsiteoffice`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contactpersons`
--

CREATE TABLE `contactpersons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_persons_salutation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_persons_first_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_persons_last_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_persons_email_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_persons_work_phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_persons_mobile` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_persons_skype_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_persons_designation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_persons_department` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_primary_contact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_first_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_last_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_company_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_display_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_mobile` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_skype_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_designation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_department` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_website` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_pan_number` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_currency` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_opening_balance` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_payment_terms` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_enable_portal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_portal_language` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_facebook_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_twitter_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_attention` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_country` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address_street_1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address_street_2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_city` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_state` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_zipcode` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_fax` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_attention` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_country` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address_street_1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address_street_2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_city` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_state` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_zipcode` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_fax` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_project`
--

CREATE TABLE `customer_project` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `settings_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(16, '2022_02_24_221201_create_projects_table', 1),
(17, '2022_02_24_221309_create_customers_table', 1),
(27, '2022_05_16_180345_create_projects_table', 3),
(30, '2022_05_18_140229_create_menus_table', 4),
(31, '2022_05_18_142406_create_menus_table', 5),
(80, '2022_05_16_180543_create_customers_table', 6),
(89, '2022_04_08_062659_create_settings_tablists_table', 7),
(90, '2022_04_08_062846_create_settings_tasklists_table', 7),
(91, '2022_04_08_062911_create_settings_subtasklists_table', 7),
(151, '2014_10_12_000000_create_users_table', 8),
(152, '2014_10_12_100000_create_password_resets_table', 8),
(153, '2019_08_19_000000_create_failed_jobs_table', 8),
(154, '2019_12_14_000001_create_personal_access_tokens_table', 8),
(155, '2022_02_24_221601_create_contactpersons_table', 8),
(156, '2022_04_27_111648_create_permission_tables', 8),
(157, '2022_05_11_124107_teamwork_setup_tables', 8),
(158, '2022_05_18_183744_create_settings_table', 8),
(159, '2022_05_23_190444_create_projects_table', 8),
(160, '2022_05_23_190900_create_customers_table', 8),
(161, '2022_05_23_191436_create_customer_project_table', 8),
(162, '2022_05_24_123831_create_settings_presales_table', 8),
(163, '2022_05_24_123950_create_settings_postsales_table', 8),
(164, '2022_05_24_124004_create_settings_executions_table', 8),
(165, '2022_05_28_111400_create_images_table', 8),
(166, '2022_05_30_081634_create_comments_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2022-06-03 09:35:25', '2022-06-03 09:35:25'),
(2, 'role-create', 'web', '2022-06-03 09:35:25', '2022-06-03 09:35:25'),
(3, 'role-edit', 'web', '2022-06-03 09:35:25', '2022-06-03 09:35:25'),
(4, 'role-delete', 'web', '2022-06-03 09:35:25', '2022-06-03 09:35:25'),
(5, 'user-list', 'web', '2022-06-03 09:35:25', '2022-06-03 09:35:25'),
(6, 'user-create', 'web', '2022-06-03 09:35:25', '2022-06-03 09:35:25'),
(7, 'user-edit', 'web', '2022-06-03 09:35:25', '2022-06-03 09:35:25'),
(8, 'user-delete', 'web', '2022-06-03 09:35:25', '2022-06-03 09:35:25'),
(9, 'project-list', 'web', '2022-06-03 09:35:25', '2022-06-03 09:35:25'),
(10, 'project-create', 'web', '2022-06-03 09:35:25', '2022-06-03 09:35:25'),
(11, 'project-edit', 'web', '2022-06-03 09:35:26', '2022-06-03 09:35:26'),
(12, 'project-delete', 'web', '2022-06-03 09:35:26', '2022-06-03 09:35:26'),
(13, 'customer-list', 'web', '2022-06-03 09:35:26', '2022-06-03 09:35:26'),
(14, 'customer-create', 'web', '2022-06-03 09:35:26', '2022-06-03 09:35:26'),
(15, 'customer-edit', 'web', '2022-06-03 09:35:26', '2022-06-03 09:35:26'),
(16, 'customer-delete', 'web', '2022-06-03 09:35:26', '2022-06-03 09:35:26');

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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `projectnumber` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `projectname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2022-06-03 09:35:38', '2022-06-03 09:35:38');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label_menu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `view` tinyint(1) NOT NULL DEFAULT 0,
  `upload` tinyint(1) NOT NULL DEFAULT 0,
  `download` tinyint(1) NOT NULL DEFAULT 0,
  `comments` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings_executions`
--

CREATE TABLE `settings_executions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `execution_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `execution_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` tinyint(1) NOT NULL DEFAULT 0,
  `upload` tinyint(1) NOT NULL DEFAULT 0,
  `download` tinyint(1) NOT NULL DEFAULT 0,
  `comments` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings_postsales`
--

CREATE TABLE `settings_postsales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `postsales_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postsales_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` tinyint(1) NOT NULL DEFAULT 0,
  `upload` tinyint(1) NOT NULL DEFAULT 0,
  `download` tinyint(1) NOT NULL DEFAULT 0,
  `comments` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings_presales`
--

CREATE TABLE `settings_presales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `presales_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `presales_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` tinyint(1) NOT NULL DEFAULT 0,
  `upload` tinyint(1) NOT NULL DEFAULT 0,
  `download` tinyint(1) NOT NULL DEFAULT 0,
  `comments` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings_presales`
--

INSERT INTO `settings_presales` (`id`, `presales_name`, `parent_id`, `description`, `presales_image`, `view`, `upload`, `download`, `comments`, `created_at`, `updated_at`) VALUES
(1, 'Requirement analysis checklistfd', 0, NULL, NULL, 0, 0, 0, 0, '2022-06-03 14:21:10', '2022-06-03 14:21:10'),
(2, 'Requirement analysis checklist', 0, NULL, NULL, 0, 0, 0, 0, '2022-06-03 14:21:10', '2022-06-03 14:21:10'),
(3, 'Requirement analysis checklist', 2, NULL, NULL, 1, 1, 1, 1, '2022-06-03 14:21:10', '2022-06-03 14:21:10'),
(4, 'Requirement analysis checklist', 0, NULL, NULL, 0, 0, 0, 0, '2022-06-03 14:21:10', '2022-06-03 14:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_invites`
--

CREATE TABLE `team_invites` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` int(10) UNSIGNED NOT NULL,
  `type` enum('invite','request') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accept_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deny_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `current_team_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `current_team_id`) VALUES
(1, 'Arya Stark', 'arya@gmail.com', NULL, '$2y$10$sLK3.SO729yiAyQSlMyFSekuWmNkbmLhdB2sEZFe0mEEu7POwUdjq', NULL, '2022-06-03 09:35:38', '2022-06-03 09:35:38', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactpersons`
--
ALTER TABLE `contactpersons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_project`
--
ALTER TABLE `customer_project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_project_customer_id_foreign` (`customer_id`),
  ADD KEY `customer_project_project_id_foreign` (`project_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings_executions`
--
ALTER TABLE `settings_executions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings_postsales`
--
ALTER TABLE `settings_postsales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings_presales`
--
ALTER TABLE `settings_presales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_invites`
--
ALTER TABLE `team_invites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_invites_team_id_foreign` (`team_id`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD KEY `team_user_user_id_foreign` (`user_id`),
  ADD KEY `team_user_team_id_foreign` (`team_id`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactpersons`
--
ALTER TABLE `contactpersons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_project`
--
ALTER TABLE `customer_project`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings_executions`
--
ALTER TABLE `settings_executions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings_postsales`
--
ALTER TABLE `settings_postsales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings_presales`
--
ALTER TABLE `settings_presales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_invites`
--
ALTER TABLE `team_invites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_project`
--
ALTER TABLE `customer_project`
  ADD CONSTRAINT `customer_project_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_project_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team_invites`
--
ALTER TABLE `team_invites`
  ADD CONSTRAINT `team_invites_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team_user`
--
ALTER TABLE `team_user`
  ADD CONSTRAINT `team_user_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `team_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
