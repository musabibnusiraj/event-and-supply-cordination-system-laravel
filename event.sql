-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table event.events
CREATE TABLE IF NOT EXISTS `events` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_datetime` datetime DEFAULT NULL,
  `end_datetime` datetime DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint(20) unsigned NOT NULL,
  `event_publisher_id` bigint(20) unsigned NOT NULL,
  `status` enum('pending','published','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `events_user_id_foreign` (`user_id`),
  KEY `events_event_publisher_id_foreign` (`event_publisher_id`),
  CONSTRAINT `events_event_publisher_id_foreign` FOREIGN KEY (`event_publisher_id`) REFERENCES `event_publishers` (`id`),
  CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table event.events: ~5 rows (approximately)
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` (`id`, `name`, `start_datetime`, `end_datetime`, `expired_at`, `address`, `city`, `country`, `description`, `user_id`, `event_publisher_id`, `status`, `created_at`, `updated_at`) VALUES
	(6, 'Spring Music Festival', '2021-06-18 12:30:00', '2021-06-18 12:30:00', '2024-05-16 14:39:00', '116B al-hasanath road', 'Puttalam', 'Sri Lanka', 'Join us for a vibrant celebration of spring with live performances from local bands, delicious food stalls, and fun activities for the whole family. Experience the joy of music and community in the heart of our city.', 7, 9, 'published', '2024-05-14 06:13:13', '2024-05-14 11:47:42'),
	(7, 'Tech Innovations Summit', '2021-06-18 12:30:00', '2021-06-18 12:30:00', '2024-05-16 14:39:00', '116B al-hasanath road', 'Puttalam', 'Sri Lanka', 'Discover the latest trends and breakthroughs in technology at our annual Tech Innovations Summit. Join industry leaders, innovators, and enthusiasts for insightful discussions, hands-on workshops, and networking opportunities.', 7, 9, 'published', '2024-05-14 09:11:33', '2024-05-14 11:53:00'),
	(8, 'Wellness Retreat: Mind, Body, Soul', '2021-06-18 12:30:00', '2021-06-18 12:30:00', '2024-05-16 14:39:00', 'Al-hasanath Road Puttalam', 'puttalam', 'Sri Lanka', 'Embark on a journey of self-discovery and rejuvenation at our Wellness Retreat. Experience holistic wellness practices, immersive workshops, and serene surroundings to nourish your mind, body, and soul.', 7, 9, 'pending', '2024-05-14 09:12:09', '2024-05-14 09:12:09'),
	(9, 'Artisanal Food Fair: Flavors of the World', '2021-06-18 12:30:00', '2021-06-18 12:30:00', '2024-05-16 14:39:00', 'Unit 8 Westpont', 'Aldridge', 'Sri Lanka', 'Savor the rich tapestry of flavors from around the globe at our Artisanal Food Fair. Discover gourmet delicacies, culinary delights, and cultural experiences that will tantalize your taste buds and ignite your senses.', 7, 9, 'pending', '2024-05-14 09:12:44', '2024-05-14 09:12:44'),
	(10, 'Adventure Sports Weekend: Thrills & Excitement', '2021-06-18 12:30:00', '2021-06-18 12:30:00', '2024-05-16 14:39:00', 'Al-hasanath Road Puttalam', 'puttalam', 'Sri Lanka', 'Get your adrenaline pumping and unleash your adventurous spirit at our Adventure Sports Weekend. Whether you\'re a thrill-seeker or a nature lover, experience the ultimate outdoor adventure with a variety of adrenaline-fueled activities.', 7, 9, 'pending', '2024-05-14 09:13:29', '2024-05-14 09:13:29');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;

-- Dumping structure for table event.event_publishers
CREATE TABLE IF NOT EXISTS `event_publishers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `event_publishers_user_id_foreign` (`user_id`),
  CONSTRAINT `event_publishers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table event.event_publishers: ~1 rows (approximately)
/*!40000 ALTER TABLE `event_publishers` DISABLE KEYS */;
INSERT INTO `event_publishers` (`id`, `name`, `organization`, `email`, `phone`, `phone_2`, `address`, `city`, `country`, `created_at`, `updated_at`, `user_id`) VALUES
	(1, 'Musab', 'Esoft Metro Campus', 'musab.dot@gmail.com', '0755513162', NULL, '116B Al hasanath road', 'Puttalam', 'Sri Lanka', '2024-05-15 00:31:55', '2024-05-15 00:31:56', 2),
	(9, 'Musab', 'Esoft Metro Campus', 'musab.dot@gmail.com', '0755513162', NULL, '116B al-hasanath road', 'Puttalam', 'LK', '2024-05-12 14:59:45', '2024-05-12 14:59:45', 7);
/*!40000 ALTER TABLE `event_publishers` ENABLE KEYS */;

-- Dumping structure for table event.event_services
CREATE TABLE IF NOT EXISTS `event_services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` bigint(20) unsigned NOT NULL,
  `service_id` bigint(20) unsigned NOT NULL,
  `budget_range_start` decimal(10,2) DEFAULT NULL,
  `budget_range_end` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `title` text COLLATE utf8mb4_unicode_ci,
  `note` text COLLATE utf8mb4_unicode_ci,
  `document` text COLLATE utf8mb4_unicode_ci,
  `status` enum('publish','inactive','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `event_services_event_id_foreign` (`event_id`),
  KEY `event_services_service_id_foreign` (`service_id`),
  CONSTRAINT `event_services_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  CONSTRAINT `event_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table event.event_services: ~7 rows (approximately)
/*!40000 ALTER TABLE `event_services` DISABLE KEYS */;
INSERT INTO `event_services` (`id`, `event_id`, `service_id`, `budget_range_start`, `budget_range_end`, `quantity`, `title`, `note`, `document`, `status`, `created_at`, `updated_at`) VALUES
	(5, 6, 4, 1.00, 5.00, 1, 'Live Band Performance', 'Enjoy live music from talented local bands covering various genres including rock, pop, and jazz.', NULL, 'publish', '2024-05-14 09:14:47', '2024-05-14 09:19:24'),
	(6, 6, 2, 1.00, 5.00, 1, 'Food Stalls', 'Indulge in a diverse range of culinary delights, from mouthwatering street food to gourmet treats.', NULL, 'publish', '2024-05-14 09:20:38', '2024-05-14 09:20:56'),
	(7, 6, 4, 1.00, 1.00, 1, 'Kid\'s Zone', 'Keep the little ones entertained with face painting, games, and interactive activities designed just for them.', NULL, 'publish', '2024-05-14 09:21:43', '2024-05-14 09:22:10'),
	(8, 7, 1, 1.00, 1.00, 1, 'Keynote Presentations', 'Gain valuable insights from keynote speakers at the forefront of technological innovation.', NULL, 'publish', '2024-05-14 11:49:53', '2024-05-14 11:50:06'),
	(9, 7, 1, 1.00, 1.00, 1, 'Workshops & Demos', 'Dive deep into emerging technologies with interactive workshops and live demonstrations.', NULL, 'inactive', '2024-05-14 11:50:57', '2024-05-14 11:50:57'),
	(10, 7, 1, 1.00, 1.00, 1, 'Startup Showcase', 'Discover promising startups and their cutting-edge solutions reshaping the tech landscape.', NULL, 'completed', '2024-05-14 11:51:40', '2024-05-14 22:19:50'),
	(11, 7, 1, 1.00, 1.00, 1, 'Networking Sessions', 'Connect with like-minded professionals, potential collaborators, and investors during dedicated networking sessions.', NULL, 'publish', '2024-05-14 11:52:19', '2024-05-14 11:52:19'),
	(12, 7, 1, 1.00, 1.00, 1, 'Tech Exhibition', 'Explore a curated exhibition featuring the latest gadgets, software solutions, and tech innovations from leading companies.', NULL, 'publish', '2024-05-14 11:52:42', '2024-05-14 11:52:42');
/*!40000 ALTER TABLE `event_services` ENABLE KEYS */;

-- Dumping structure for table event.event_service_supplier_quotes
CREATE TABLE IF NOT EXISTS `event_service_supplier_quotes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `event_service_id` bigint(20) unsigned NOT NULL,
  `supplier_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `event_id` bigint(20) unsigned NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `budget_range_start` decimal(10,2) DEFAULT NULL,
  `budget_range_end` decimal(10,2) DEFAULT NULL,
  `quantity` int(10) unsigned DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `awarded` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `event_service_supplier_quotes_event_service_id_foreign` (`event_service_id`),
  KEY `event_service_supplier_quotes_supplier_id_foreign` (`supplier_id`),
  KEY `event_service_supplier_quotes_user_id_foreign` (`user_id`),
  KEY `event_service_supplier_quotes_event_id_foreign` (`event_id`),
  CONSTRAINT `event_service_supplier_quotes_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  CONSTRAINT `event_service_supplier_quotes_event_service_id_foreign` FOREIGN KEY (`event_service_id`) REFERENCES `event_services` (`id`) ON DELETE CASCADE,
  CONSTRAINT `event_service_supplier_quotes_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `event_service_supplier_quotes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table event.event_service_supplier_quotes: ~4 rows (approximately)
/*!40000 ALTER TABLE `event_service_supplier_quotes` DISABLE KEYS */;
INSERT INTO `event_service_supplier_quotes` (`id`, `event_service_id`, `supplier_id`, `user_id`, `event_id`, `document`, `budget_range_start`, `budget_range_end`, `quantity`, `note`, `awarded`, `created_at`, `updated_at`) VALUES
	(3, 8, 3, 10, 7, NULL, 1.00, 10.00, 1, 'I can', 1, NULL, NULL),
	(4, 8, 1, 8, 7, NULL, 1.00, 10.00, 1, 'I can', 0, '2024-05-14 21:28:21', '2024-05-14 22:00:40'),
	(5, 10, 1, 8, 7, NULL, 1.00, 10.00, 1, 'I will do', 3, '2024-05-14 22:17:16', '2024-05-14 22:19:50'),
	(6, 10, 3, 10, 7, NULL, 1.00, 12.00, 1, 'I do', 0, '2024-05-14 22:17:16', '2024-05-14 22:19:50');
/*!40000 ALTER TABLE `event_service_supplier_quotes` ENABLE KEYS */;

-- Dumping structure for table event.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table event.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table event.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table event.migrations: ~11 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2014_10_12_000000_create_users_table', 2),
	(6, '2014_10_12_100000_create_password_resets_table', 3),
	(7, '2024_02_20_185241_create_event_publishers_table', 4),
	(8, '2024_02_20_200600_create_suppliers_table', 4),
	(9, '2024_02_20_203052_create_services_table', 4),
	(13, '2024_03_23_201614_create_permission_tables', 5),
	(14, '2024_02_20_204803_create_events_table', 6),
	(16, '2024_02_20_210642_create_event_services_table', 8),
	(18, '2024_02_20_214141_create_event_service_supplier_quotes_table', 9);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table event.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table event.model_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Dumping structure for table event.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table event.model_has_roles: ~6 rows (approximately)
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(3, 'App\\Models\\User', 2),
	(2, 'App\\Models\\User', 4),
	(2, 'App\\Models\\User', 6),
	(3, 'App\\Models\\User', 7),
	(2, 'App\\Models\\User', 8),
	(2, 'App\\Models\\User', 9),
	(2, 'App\\Models\\User', 10);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Dumping structure for table event.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table event.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table event.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table event.password_reset_tokens: ~1 rows (approximately)
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
	('musab.dot@gmail.com', '$2y$10$4ByVB11sKY9DcyWABL5zgOOMs5BFIgG4nYTHb9/KHBC7JJfZbxmhi', '2024-05-13 18:45:16');
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;

-- Dumping structure for table event.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table event.permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table event.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table event.personal_access_tokens: ~35 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
	(1, 'App\\Models\\User', 1, 'authToken', '4a01db8f2a2c768958890f9f70304c84f2f87bbd41d8e1d851366dc2ae0ae646', '["*"]', NULL, NULL, '2023-08-29 08:16:57', '2023-08-29 08:16:57'),
	(2, 'App\\Models\\User', 2, 'authToken', '2dc4d0ec94cea9e425bdd202c1e5b26ee83d414fd81ec939fa02d22edc2f1063', '["*"]', NULL, NULL, '2023-08-29 08:21:25', '2023-08-29 08:21:25'),
	(3, 'App\\Models\\User', 3, 'authToken', 'b1b1c1cf2c953810b62634b2741297202113770a230825b6cdb24eff7027cf59', '["*"]', NULL, NULL, '2023-08-29 08:23:44', '2023-08-29 08:23:44'),
	(4, 'App\\Models\\User', 3, 'authToken', '598c0eb0f1e97d2151ef60db509b03ad9262bd25fd438a33b73407d6f976687b', '["*"]', NULL, NULL, '2023-08-29 08:26:18', '2023-08-29 08:26:18'),
	(5, 'App\\Models\\User', 3, 'authToken', 'a9a4b74e8fb887a43d7324635287df29a2909ee23f8d5c6e5432e61c34e7921d', '["*"]', NULL, NULL, '2023-08-29 08:26:27', '2023-08-29 08:26:27'),
	(6, 'App\\Models\\User', 3, 'authToken', 'c62ba0914abbc3fe4c9e2637d5193e1e70e49208a762098faf5d64b2792bcdc3', '["*"]', NULL, NULL, '2023-08-29 08:26:28', '2023-08-29 08:26:28'),
	(7, 'App\\Models\\User', 3, 'authToken', '02c8800d92f3c601bc485fe45bd6dc05e9eae61e0b6dd496df916c44a971a016', '["*"]', NULL, NULL, '2023-08-29 08:26:30', '2023-08-29 08:26:30'),
	(8, 'App\\Models\\User', 1, 'authToken', '331eb53c430a5537c5477718821a2c48000a3eb75511e77acc0f2464d00f1397', '["*"]', NULL, NULL, '2023-08-29 08:26:36', '2023-08-29 08:26:36'),
	(9, 'App\\Models\\User', 1, 'authToken', '8a77cf7031dfb3b84ce5632c82c4c7a4de25dd9ef8f7608a0fbec360428e3a59', '["*"]', NULL, NULL, '2023-08-29 08:26:38', '2023-08-29 08:26:38'),
	(10, 'App\\Models\\User', 1, 'authToken', 'd424014dc53b9689d7707ea5e4a82154ae2098e911265275b3da0984274095c6', '["*"]', NULL, NULL, '2023-08-29 08:26:40', '2023-08-29 08:26:40'),
	(11, 'App\\Models\\User', 1, 'authToken', '4968c2e0e6c9be171ae8b7e220fb239c00588cd94e3bbbda0467b1390a28fc7e', '["*"]', NULL, NULL, '2023-08-29 08:26:41', '2023-08-29 08:26:41'),
	(12, 'App\\Models\\User', 1, 'authToken', 'd90a3a39c05cbdf527e138e249717fb35d26496bfce28aa52d57f07a5af5d514', '["*"]', NULL, NULL, '2023-08-29 08:26:42', '2023-08-29 08:26:42'),
	(13, 'App\\Models\\User', 1, 'authToken', '0cf7b384c340cba7a2ba80691764a460e5d91f9a5e7a4016c7abaff06301bc8d', '["*"]', NULL, NULL, '2023-08-29 08:26:44', '2023-08-29 08:26:44'),
	(14, 'App\\Models\\User', 1, 'authToken', 'd4429b1cd43603c1b61f2d88c2dbc87dd6598fdd7e2dbf77b83882eb0565d039', '["*"]', NULL, NULL, '2023-08-29 08:26:45', '2023-08-29 08:26:45'),
	(15, 'App\\Models\\User', 4, 'authToken', 'b11dec04c32a5cd249f38e2b9b971af1b7c35227e775b5010229e3ebe01b7769', '["*"]', NULL, NULL, '2023-08-29 08:27:11', '2023-08-29 08:27:11'),
	(16, 'App\\Models\\User', 1, 'authToken', '1e68b3ca483b268a8b64b9e645a770a32f02e59cc322a6625fc320d15c3ad60f', '["*"]', NULL, NULL, '2023-08-29 08:27:46', '2023-08-29 08:27:46'),
	(17, 'App\\Models\\User', 1, 'authToken', '62d5cc1d0ca818f0abc64747c291a272724c4a144769a99ebb1c0a8abed9987e', '["*"]', NULL, NULL, '2023-08-29 08:27:51', '2023-08-29 08:27:51'),
	(18, 'App\\Models\\User', 1, 'authToken', 'f279e5e299beac4020190942f8ca27a3389ab3f1e0066c0e02562cdb52a9d7db', '["*"]', NULL, NULL, '2023-08-29 08:27:54', '2023-08-29 08:27:54'),
	(19, 'App\\Models\\User', 1, 'authToken', '6057e87267467cf5b2d5dc51e33a2a5aecdae502a8f188638faf46ada862b6aa', '["*"]', NULL, NULL, '2023-08-29 08:28:00', '2023-08-29 08:28:00'),
	(20, 'App\\Models\\User', 1, 'authToken', '1831355b980a8b66c25323a364201ce0d2f28fda41c0087c1bcdda9b9aafabe9', '["*"]', NULL, NULL, '2023-08-29 08:28:04', '2023-08-29 08:28:04'),
	(21, 'App\\Models\\User', 1, 'authToken', 'bdd9e6aa93ad2792ac44c34ece3beb879db0f65c4e43d8f7297a203f7c1f4e51', '["*"]', '2023-08-29 08:32:57', NULL, '2023-08-29 08:28:23', '2023-08-29 08:32:57'),
	(22, 'App\\Models\\User', 1, 'authToken', '982ce0e115e6383e1a9176e9c1ab49ca9982537c22004b385a0f9b4e276d4f72', '["*"]', NULL, NULL, '2023-08-29 08:46:10', '2023-08-29 08:46:10'),
	(23, 'App\\Models\\User', 5, 'Sanctom+Socialite', '1c1b2879b1648a22a13a33f63b0178b3eab8be0cf704695b37acf5707913b2e9', '["*"]', NULL, NULL, '2023-08-29 11:11:57', '2023-08-29 11:11:57'),
	(24, 'App\\Models\\User', 5, 'Sanctom+Socialite', '849c7be415684b907be92f24d403f10dce9904950a3d48ef4448bb0d808a9491', '["*"]', NULL, NULL, '2023-08-29 11:16:25', '2023-08-29 11:16:25'),
	(25, 'App\\Models\\User', 5, 'Sanctom+Socialite', '03fd47a50f966a5287753d9a6b3b1288166a903b5699f8f31da321d395e3e593', '["*"]', '2023-08-29 11:28:01', NULL, '2023-08-29 11:17:18', '2023-08-29 11:28:01'),
	(26, 'App\\Models\\User', 5, 'Sanctom+Socialite', '8ce303accfe6a839325e3215a7aebe68fc8d0bec996d644aae3d7aa2d7c7f461', '["*"]', NULL, NULL, '2023-08-29 11:24:08', '2023-08-29 11:24:08'),
	(27, 'App\\Models\\User', 5, 'Sanctom+Socialite', '2bae56fc658fc5ae5020f08ecdb480f907543ab84fa8050894c570ff6b6cbd9c', '["*"]', NULL, NULL, '2023-08-29 11:24:11', '2023-08-29 11:24:11'),
	(28, 'App\\Models\\User', 5, 'Sanctom+Socialite', 'c71b1f18d11dae66b045e2494ab7b5d43a74ec32bdda023f0b1d8486ce1d2f96', '["*"]', NULL, NULL, '2023-08-29 11:25:11', '2023-08-29 11:25:11'),
	(29, 'App\\Models\\User', 5, 'Sanctom+Socialite', 'd23399b4b191d48d4c9b84055564361f8317dfa64217aa05e14061a113c2a8de', '["*"]', NULL, NULL, '2023-08-29 11:25:31', '2023-08-29 11:25:31'),
	(30, 'App\\Models\\User', 5, 'Sanctom+Socialite', '96bd95a819d544d5988e5d533ae62bd388eb1c8e4357888739b2b03889240364', '["*"]', NULL, NULL, '2023-08-29 11:25:49', '2023-08-29 11:25:49'),
	(31, 'App\\Models\\User', 5, 'Sanctom+Socialite', '7acfcf8456c6730514f94a2e3d0af9067348b35e75eb78b11041c71d98fdff66', '["*"]', NULL, NULL, '2023-08-29 11:25:52', '2023-08-29 11:25:52'),
	(32, 'App\\Models\\User', 5, 'Sanctom+Socialite', 'c274759458c40955f0aa2944714f7ee1d3a24948dcce8112a6e84121beda9e67', '["*"]', NULL, NULL, '2023-08-29 11:25:59', '2023-08-29 11:25:59'),
	(33, 'App\\Models\\User', 5, 'Sanctom+Socialite', '20f0f26e97fbfc7155556ce6993817d7aa7c7174b39b726ebee745380a1c6246', '["*"]', NULL, NULL, '2023-08-29 11:26:09', '2023-08-29 11:26:09'),
	(34, 'App\\Models\\User', 5, 'Sanctom+Socialite', 'e277493af88d2901088a578c3cd857caae041fd3dd52b2587522f6ff09f301ce', '["*"]', NULL, NULL, '2023-08-29 11:27:57', '2023-08-29 11:27:57'),
	(35, 'App\\Models\\User', 1, 'Sanctom+Socialite', 'c01785952ecf1e97e75e73b0680a539dad6b4ef5202fb8c55d22b51b5f9c6b59', '["*"]', NULL, NULL, '2023-08-29 12:09:10', '2023-08-29 12:09:10');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table event.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table event.roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'SuperAdmin', 'web', '2024-03-24 01:32:43', '2024-03-24 01:32:43'),
	(2, 'Supplier', 'web', '2024-03-24 01:32:43', '2024-03-24 01:32:43'),
	(3, 'Publisher', 'web', '2024-03-24 01:32:43', '2024-03-24 01:32:43');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table event.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table event.role_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Dumping structure for table event.services
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table event.services: ~8 rows (approximately)
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Venue Rental', 'Provides spaces for hosting events, including banquet halls, conference centers, hotels, and outdoor venues.', NULL, NULL),
	(2, 'Catering', 'Offers food and beverage services for events, ranging from simple refreshments to multi-course meals, with options for various cuisines and dietary preferences.', NULL, NULL),
	(3, 'Decor and Design', ' Provides decor elements such as floral arrangements, lighting, furniture, and thematic designs to enhance the aesthetic appeal and ambiance of events.', NULL, NULL),
	(4, 'Entertainment', 'Provides entertainment options such as live music, DJs, performers, magicians, and other acts to engage and entertain event attendees.', NULL, NULL),
	(5, 'Photography and Videography', 'Captures moments and memories of events through professional photography and videography services, including coverage of ceremonies, portraits, and candid shots.', NULL, NULL),
	(6, 'Event Rentals', 'Offers rental of event equipment and accessories, including tables, chairs, linens, tents, stages, and audiovisual gear, to meet various event needs.', NULL, NULL),
	(7, 'Transportation and Logistics', 'Coordinates transportation services for event attendees, including shuttle buses, limousines, and car rentals, as well as logistical support for event setup and teardown.', NULL, NULL),
	(8, 'Event Staffing', 'Provides trained personnel such as event coordinators, ushers, security guards, bartenders, and waitstaff to assist with event management and guest services.', NULL, NULL);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;

-- Dumping structure for table event.suppliers
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `status` enum('private','public','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'private',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `suppliers_user_id_foreign` (`user_id`),
  CONSTRAINT `suppliers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table event.suppliers: ~3 rows (approximately)
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` (`id`, `name`, `about`, `organization`, `email`, `phone`, `phone_2`, `address`, `city`, `country`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Sarah Smith', ' Event Solutions Inc. is a full-service event management company specializing in organizing corporate events, conferences, and product launches. With a team of experienced planners and coordinators, we offer end-to-end event solutions tailored to meet the unique needs of our clients. From venue selection and logistics management to catering and entertainment, we ensure flawless execution and memorable experiences.', 'Event Solutions Inc.', 'one@two.com', '0981123', NULL, 'main street', 'colombo', 'AW', 8, 'public', '2024-05-12 19:12:42', '2024-05-12 19:12:42'),
	(2, 'James Johnson', 'Elegant Events Management specializes in planning and executing elegant and memorable events, ranging from weddings and galas to corporate functions. With a keen eye for detail and a passion for creativity, Sarah Smith and her team ensure that every aspect of your event is flawlessly executed, leaving you free to enjoy the occasion stress-free.', ' Elegant Events Management', 'musab.dot@gmail.com', '0755513162', NULL, '116B al-hasanath road', 'Puttalam', 'LK', 7, 'public', '2024-05-13 08:02:59', '2024-05-13 08:02:59'),
	(3, 'Emily Roberts', 'Emily Roberts heads SoundWave Productions, a leading audiovisual and event production company known for its innovative approach to sound, lighting, and visual effects. With a passion for technology and a commitment to excellence, Emily and her team work tirelessly to create immersive and memorable experiences for clients across a wide range of events.', 'SoundWave Productions', 'supplier2@gmail.com', '0755513162', NULL, '116B al-hasanath road', 'Puttalam', 'LK', 10, 'public', '2024-05-13 19:13:36', '2024-05-13 19:13:36');
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;

-- Dumping structure for table event.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table event.users: ~8 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `google_id`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'M Seven', 'm7.ms075@gmail.com', NULL, '$2y$10$e6GWUTGKJ/CUUS2wdvccrud8m8thJWVvoIb.TBbuJo66qU/WW6hea', '103829224486172556230', NULL, '2023-08-29 12:07:08', '2023-08-29 12:07:08'),
	(2, 'Musab', 'musab.dot@gmail.com', NULL, '$2y$10$e6GWUTGKJ/CUUS2wdvccrud8m8thJWVvoIb.TBbuJo66qU/WW6hea', NULL, 'LumxHvUdhsqWHD1fc3CfXKPyW674589otsX3z2WshdYrOloSDy49G6ykOadi', '2023-09-21 12:31:40', '2023-09-21 12:31:40'),
	(4, 'Admin', 'admin@gmail.com', NULL, '$2y$10$e6GWUTGKJ/CUUS2wdvccrud8m8thJWVvoIb.TBbuJo66qU/WW6hea', NULL, NULL, '2023-09-21 18:01:09', '2023-09-21 18:01:09'),
	(5, 'Soloman Vandy', 'solomanv@test.com', NULL, '$2y$10$WtMNetbH5e7fj9MtZ2.yfOZXXNIu78/q2k/2s0yanXwv36JdABKnG', NULL, NULL, '2024-04-05 09:35:47', '2024-04-05 09:35:47'),
	(6, 'Musab Ibn Siraj', 'musab.dot@gmail.coms', NULL, '$2y$10$0BC6KRk9nJJXhMF33h6JPelTtkTKDMwK7cDGSuXpT1zimy1XwlkSS', NULL, NULL, '2024-05-11 19:11:11', '2024-05-11 19:11:11'),
	(7, 'Publisher', 'publisher@gmail.com', NULL, '$2y$10$qqjKDZTphjHtDGW6zUQImeqWzaCRI.XCjp7pX1m24P0THVJ4wDOvi', NULL, 'MVZNbI3wodxIdx9fDxrJ5w01HPJzkIq0vjyMxWXtkpuymShtcQdZjiQ4kbqk', '2024-05-12 09:31:15', '2024-05-12 09:31:15'),
	(8, 'Supplier', 'supplier@gmail.com', NULL, '$2y$10$gCgu7LjFTZ0joECrOBo5uOQBURg8upWPqON5uyzCjaeGuicYp/bS2', NULL, 'g2IqCeDQwp2zfLsdCNu22t5eZ7JjMPiSlJFdiESpY2Q8jH6Xe6PnEGObeWVj', '2024-05-12 09:38:04', '2024-05-12 09:38:04'),
	(9, 'asd', 'musab.dot@gmail.comasd', NULL, '$2y$10$TgZ2M.mcPyBtRyqoozsO1uiFenKl8iJFg5EPULhoOnPo1bT0.66t2', NULL, NULL, '2024-05-12 09:39:21', '2024-05-12 09:39:21'),
	(10, 'Supplier 2', 'supplier2@gmail.com', NULL, '$2y$10$w1KNv6UQ9pm6tP15bXNiYuo5eVD0IK/lffkbpSH5909uQWB4l0V4a', NULL, NULL, '2024-05-13 19:12:24', '2024-05-13 19:12:24');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
