-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.17-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table db_roomit.catalogs
DROP TABLE IF EXISTS `catalogs`;
CREATE TABLE IF NOT EXISTS `catalogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kata_kunci` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` date NOT NULL,
  `bahasa` enum('Indonesia','Inggris','Arab') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Indonesia',
  `jenis` enum('buku','jurnal','skripsi','tesis') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'buku',
  `halaman` int(11) NOT NULL,
  `hak_cipta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hak_akses` enum('open-akses','private-akses') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'private-akses',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_roomit.catalogs: ~3 rows (approximately)
/*!40000 ALTER TABLE `catalogs` DISABLE KEYS */;
INSERT INTO `catalogs` (`id`, `judul`, `penulis`, `kategori`, `kata_kunci`, `penerbit`, `tahun`, `bahasa`, `jenis`, `halaman`, `hak_cipta`, `isbn`, `hak_akses`, `created_at`, `updated_at`) VALUES
	(1, 'THE IMPERIAL UNDERBELLY : WORKERS, CONTRACTORS, AND ENTREPRENEURS IN COLONIAL INDIA AND SCANDINAVIA', 'Gunnel Cederlöf.', 'manajemen', 'contractors', 'Routledge', '2023-03-16', 'Inggris', 'buku', 239, 'undang-undang', NULL, 'open-akses', '2023-06-16 09:16:25', '2023-06-16 09:16:25'),
	(2, 'THE IMPOSSIBILITIES OF THE CIRCULAR ECONOMY SEPARATING ASPIRATIONS FROM REALITY', 'Harry Lehmann, Christoph Hinske, Victoire de Margerie, and Aneta Slaveikova Nikolova', 'manajemen', NULL, 'Routledge', '2023-03-28', 'Inggris', 'buku', 333, 'undang-undang', NULL, 'open-akses', '2023-06-16 09:20:43', '2023-06-16 09:20:43'),
	(4, 'LAUT BERCERITA', 'Leila S. Chudori', 'umum', 'novel', 'Kepustakaan Populer Gramedia', '2022-10-15', 'Indonesia', 'buku', 387, 'Kepustakaan Populer Gramedia', '978-602-424-694-5', 'open-akses', '2023-06-16 10:48:50', '2023-06-16 10:48:50');
/*!40000 ALTER TABLE `catalogs` ENABLE KEYS */;

-- Dumping structure for table db_roomit.collections
DROP TABLE IF EXISTS `collections`;
CREATE TABLE IF NOT EXISTS `collections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_roomit.collections: ~4 rows (approximately)
/*!40000 ALTER TABLE `collections` DISABLE KEYS */;
INSERT INTO `collections` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
	(1, 'Buku', 'icon-1', NULL, NULL),
	(2, 'Jurnal', 'icon-2', NULL, NULL),
	(4, 'Skripsi', 'icon-3', NULL, NULL),
	(5, 'Tesis', 'icon-4', NULL, NULL);
/*!40000 ALTER TABLE `collections` ENABLE KEYS */;

-- Dumping structure for table db_roomit.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_roomit.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table db_roomit.hak_akses
DROP TABLE IF EXISTS `hak_akses`;
CREATE TABLE IF NOT EXISTS `hak_akses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hak_akses` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_roomit.hak_akses: ~3 rows (approximately)
/*!40000 ALTER TABLE `hak_akses` DISABLE KEYS */;
INSERT INTO `hak_akses` (`id`, `hak_akses`, `keterangan`, `created_at`, `updated_at`) VALUES
	(1, 'Open-Akses', 'Public can read the books', '2023-06-16 04:40:18', '2023-06-16 04:40:18'),
	(2, 'Private-Akses', 'Only member can read the books', '2023-06-16 04:41:12', '2023-06-16 04:41:12'),
	(3, 'Special-Akses', 'Specific person can access and read the books', '2023-06-16 04:41:38', '2023-06-16 04:41:38');
/*!40000 ALTER TABLE `hak_akses` ENABLE KEYS */;

-- Dumping structure for table db_roomit.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_roomit.migrations: ~8 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_06_15_074624_create_collections_table', 2),
	(6, '2023_06_16_040423_create_hak_akses_table', 3),
	(7, '2023_06_16_060524_create_catalogs_table', 4),
	(8, '2023_06_16_105452_create_permission_tables', 5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table db_roomit.model_has_permissions
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_roomit.model_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Dumping structure for table db_roomit.model_has_roles
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_roomit.model_has_roles: ~0 rows (approximately)
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Dumping structure for table db_roomit.password_reset_tokens
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_roomit.password_reset_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;

-- Dumping structure for table db_roomit.permissions
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_roomit.permissions: ~10 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
	(1, 'collection.menu', 'web', 'collection', '2023-06-17 09:24:09', '2023-06-17 09:24:09'),
	(2, 'all.collection', 'web', 'collection', '2023-06-17 09:24:26', '2023-06-17 09:39:27'),
	(3, 'add.collection', 'web', 'collection', '2023-06-17 09:24:38', '2023-06-17 09:39:47'),
	(4, 'edit.collection', 'web', 'collection', '2023-06-17 09:24:57', '2023-06-17 09:40:00'),
	(5, 'delete.collection', 'web', 'collection', '2023-06-17 09:25:09', '2023-06-17 09:40:13'),
	(6, 'catalog.menu', 'web', 'catalog', '2023-06-17 09:25:22', '2023-06-17 09:25:22'),
	(7, 'all.catalog', 'web', 'catalog', '2023-06-17 09:25:34', '2023-06-17 09:40:26'),
	(8, 'add.catalog', 'web', 'catalog', '2023-06-17 09:25:44', '2023-06-17 09:40:36'),
	(9, 'edit.catalog', 'web', 'catalog', '2023-06-17 09:25:55', '2023-06-17 09:40:57'),
	(10, 'delete.catalog', 'web', 'catalog', '2023-06-17 09:26:04', '2023-06-17 09:41:06');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table db_roomit.personal_access_tokens
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_roomit.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table db_roomit.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_roomit.roles: ~3 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'SuperAdmin', 'web', '2023-06-23 03:24:17', '2023-06-23 03:24:17'),
	(2, 'Admin', 'web', '2023-06-23 03:24:36', '2023-06-23 03:32:41'),
	(3, 'Anggota', 'web', '2023-06-23 03:24:44', '2023-06-23 03:24:44');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table db_roomit.role_has_permissions
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_roomit.role_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Dumping structure for table db_roomit.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','anggota') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'anggota',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_roomit.users: ~7 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `address`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', 'admin', 'admin@fkkumj.ac.id', NULL, '$2y$10$dnsXEFVAnj7A9A.Lla9BaO4hSbK0Uzpq8GvlX4HJZWrN633f6CtPC', '202306150856WhatsApp Image 2021-09-21 at 11.12.44 AM.jpeg', '081122334455', 'Jl. K. H. Ahmad Dahlan Cirendeu, Ciputat Tangerang Selatan', 'admin', 'active', NULL, NULL, '2023-06-15 08:56:35'),
	(2, 'Agung', 'radeck', 'tbasah@gmail.com', NULL, '$2y$10$.W2Lqe3qHKbngLVW/XbQVug6/Uts8qlJTe3NV0VYfHCjuP6e1VjfS', NULL, '08561892608', NULL, 'anggota', 'active', NULL, NULL, NULL),
	(3, 'Anahi Hodkiewicz DVM', 'ronny19', 'irunolfsdottir@example.org', '2023-06-13 10:49:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x480.png/004400?text=in', '1-602-562-9643', '307 Nicklaus Station', 'anggota', 'inactive', '1hJklpwi4x', '2023-06-13 10:49:22', '2023-06-13 10:49:22'),
	(4, 'Prof. Shanna Johns', 'mia.kunze', 'valentine27@example.net', '2023-06-13 10:49:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x480.png/003355?text=aliquid', '906.824.2063', '17419 Bahringer Station Suite 386', 'anggota', 'inactive', 'qU31RXvNH3', '2023-06-13 10:49:22', '2023-06-13 10:49:22'),
	(5, 'Kari Lynch', 'mcdermott.marquise', 'lisette61@example.com', '2023-06-13 10:49:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x480.png/00cc33?text=eligendi', '845-488-2685', '15394 Sandrine Stravenue Apt. 968', 'admin', 'inactive', 'te8jRC4XiA', '2023-06-13 10:49:22', '2023-06-13 10:49:22'),
	(6, 'Juana Fisher Jr.', 'goyette.mathias', 'adela92@example.com', '2023-06-13 10:49:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x480.png/00aa99?text=molestiae', '+1-870-503-4651', '6024 Rohan Ramp Apt. 270', 'admin', 'inactive', 'jUgNACyoDA', '2023-06-13 10:49:22', '2023-06-13 10:49:22'),
	(7, 'Harley Windler', 'west.izaiah', 'khilpert@example.net', '2023-06-13 10:49:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x480.png/00aa22?text=rerum', '978.817.3881', '31509 Lynch Ville Apt. 301', 'admin', 'inactive', 'FtSOURzFMa', '2023-06-13 10:49:22', '2023-06-13 10:49:22');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
