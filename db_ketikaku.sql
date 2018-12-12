-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_ketikaku
CREATE DATABASE IF NOT EXISTS `db_ketikaku` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_ketikaku`;

-- Dumping structure for table db_ketikaku.d_novel
CREATE TABLE IF NOT EXISTS `d_novel` (
  `dn_id` int(11) NOT NULL AUTO_INCREMENT,
  `dn_title` text,
  `dn_description` longtext,
  `dn_cover` varchar(50) DEFAULT NULL,
  `dn_view` int(11) DEFAULT NULL,
  `dn_vote` int(11) DEFAULT NULL,
  `dn_rating` int(11) DEFAULT NULL,
  `dn_created_at` timestamp NULL DEFAULT NULL,
  `dn_created_by` int(11) DEFAULT NULL,
  `dn_updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`dn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_ketikaku.d_novel: ~1 rows (approximately)
/*!40000 ALTER TABLE `d_novel` DISABLE KEYS */;
REPLACE INTO `d_novel` (`dn_id`, `dn_title`, `dn_description`, `dn_cover`, `dn_view`, `dn_vote`, `dn_rating`, `dn_created_at`, `dn_created_by`, `dn_updated_at`) VALUES
	(1, 'Lingkaran Ilusi', '<p>Kita telah melalui jalan panjang untuk mengais secercah cahaya dari gelapnya labirin tak berujung. Kita yang tak letih berharap, walau ternyata semesta tidak pernah mengizinkan kita bahagia dengan cara sederhana.</p>\r\n<p>&nbsp;</p>\r\n<p>Ini tentang kita yang harus menapaki jalanan panjang untuk merangkai tangkai demi tangkai bahagia. Tentang kita yang harus melawan dunia, demi mewujudkan satu demi satu keinginan terpendam. Tentang kita yang terus bertahan, meski tahu masa tak akan pernah bersahabat dengan kita.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Tentang kita yang menunggu waktu menghabisi diri, seraya bertanya akankah sepucuk bahagia dapat tercipta di tengah jiwa yang hampir putus asa?</p>', 'novel/cover_1.jpeg', NULL, NULL, NULL, '2018-12-12 01:01:47', 1, NULL);
/*!40000 ALTER TABLE `d_novel` ENABLE KEYS */;

-- Dumping structure for table db_ketikaku.d_novel_category
CREATE TABLE IF NOT EXISTS `d_novel_category` (
  `dnc_id` int(11) NOT NULL AUTO_INCREMENT,
  `dnc_ref_id` int(11) DEFAULT NULL,
  `dnc_created_at` timestamp NULL DEFAULT NULL,
  `dnc_updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`dnc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_ketikaku.d_novel_category: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_novel_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_novel_category` ENABLE KEYS */;

-- Dumping structure for table db_ketikaku.d_novel_chapter
CREATE TABLE IF NOT EXISTS `d_novel_chapter` (
  `dnch_id` int(11) NOT NULL AUTO_INCREMENT,
  `dnch_ref_id` varchar(50) DEFAULT NULL,
  `dnch_title` text,
  `dnch_content` longtext,
  `dnch_created_by` int(11) DEFAULT NULL,
  `dnch_created_at` timestamp NULL DEFAULT NULL,
  `dnch_updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`dnch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_ketikaku.d_novel_chapter: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_novel_chapter` DISABLE KEYS */;
REPLACE INTO `d_novel_chapter` (`dnch_id`, `dnch_ref_id`, `dnch_title`, `dnch_content`, `dnch_created_by`, `dnch_created_at`, `dnch_updated_at`) VALUES
	(1, '1', 'bubu', '<p>alsndlasndasd</p>\r\n<p>as</p>\r\n<p>d</p>\r\n<p>as</p>\r\n<p>d</p>\r\n<p>asd</p>\r\n<p>as</p>\r\n<p>dasd</p>\r\n<p>asd</p>', 1, '2018-12-18 01:28:58', NULL);
/*!40000 ALTER TABLE `d_novel_chapter` ENABLE KEYS */;

-- Dumping structure for table db_ketikaku.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ketikaku.migrations: ~0 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table db_ketikaku.m_category
CREATE TABLE IF NOT EXISTS `m_category` (
  `mc_id` int(11) NOT NULL AUTO_INCREMENT,
  `mc_name` varchar(50) DEFAULT NULL,
  `mc_created_at` timestamp NULL DEFAULT NULL,
  `mc_updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`mc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_ketikaku.m_category: ~0 rows (approximately)
/*!40000 ALTER TABLE `m_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_category` ENABLE KEYS */;

-- Dumping structure for table db_ketikaku.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_ketikaku.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'deny', 'denyprasetyo41@gmail.com', '$2y$10$CX7hJjC7m9/opDy20DG.0.UIyUq0Zwb1mRjoysrB3i0qVej5i8b7G', 'aVJcrvDfdHIXPYr8uzymISRP3JBgcief45nwgo7j66S23ciInHLDzMzJPvFs', '2018-12-10 13:42:54', '2018-12-10 13:42:54'),
	(2, 'den', 'denypras@gmail.com', '$2y$10$oQMsiS60j4ooeVpobOWniuNCYCFA3AIOClpXN15TdcecpLvFLQxvC', 'ivX20lHSMK7Zppdd94w4GP03QwqbR9AxALtaoHfGiQwJNdhR6c6FSGYdjjAr', '2018-12-11 13:25:52', '2018-12-11 13:25:52');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
