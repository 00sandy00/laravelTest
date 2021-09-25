/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.4.16-MariaDB : Database - laraveltest
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
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

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (7,'2014_10_12_000000_create_users_table',1),(8,'2014_10_12_100000_create_password_resets_table',1),(9,'2019_08_19_000000_create_failed_jobs_table',1),(10,'2019_12_14_000001_create_personal_access_tokens_table',1),(11,'2021_09_22_082928_create_questions_table',1),(12,'2021_09_22_082955_create_options_table',1);

/*Table structure for table `options` */

DROP TABLE IF EXISTS `options`;

CREATE TABLE `options` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` bigint(20) unsigned NOT NULL,
  `option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_correct` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `options_question_id_foreign` (`question_id`),
  CONSTRAINT `options_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `options` */

insert  into `options`(`id`,`question_id`,`option`,`is_correct`,`created_at`,`updated_at`) values (1,1,'programming lang.','Y','2021-09-24 08:14:42','2021-09-24 08:14:42'),(2,1,'roman lang.','N','2021-09-24 08:14:42','2021-09-24 08:14:42'),(3,1,'itiliyan lan.','N','2021-09-24 08:14:42','2021-09-24 08:14:42'),(4,1,'none of the avobe','N','2021-09-24 08:14:42','2021-09-24 08:14:42'),(5,2,'center pull unit','N','2021-09-24 08:16:23','2021-09-24 08:16:23'),(6,2,'center processing unit','Y','2021-09-24 08:16:23','2021-09-24 08:16:23'),(7,2,'circle pipe unit','N','2021-09-24 08:16:23','2021-09-24 08:16:23'),(8,2,'core process unified','N','2021-09-24 08:16:23','2021-09-24 08:16:23'),(9,3,'! (Exclamation)','N','2021-09-24 01:36:01','2021-09-24 01:36:01'),(10,3,'$ (Dollar)','Y','2021-09-24 01:36:01','2021-09-24 01:36:01'),(11,3,'& (Ampersand)','N','2021-09-24 01:36:01','2021-09-24 01:36:01'),(12,3,'# (Hash)','N','2021-09-24 01:36:01','2021-09-24 01:36:01'),(13,4,'.php','Y','2021-09-24 01:36:57','2021-09-24 01:36:57'),(14,4,'.hphp','N','2021-09-24 01:36:58','2021-09-24 01:36:58'),(15,4,'.xml','N','2021-09-24 01:36:58','2021-09-24 01:36:58'),(16,4,'.html','N','2021-09-24 01:36:58','2021-09-24 01:36:58'),(21,5,'Local','N','2021-09-24 01:38:02','2021-09-24 01:38:02'),(22,5,'Extern','Y','2021-09-24 01:38:02','2021-09-24 01:38:02'),(23,5,'Static','N','2021-09-24 01:38:03','2021-09-24 01:38:03'),(24,5,'Global','N','2021-09-24 01:38:03','2021-09-24 01:38:03'),(25,6,'Create myFunction()','N','2021-09-24 01:39:43','2021-09-24 01:39:43'),(26,6,'New_function myFunction()','N','2021-09-24 01:39:43','2021-09-24 01:39:43'),(27,6,'function myFunction()','Y','2021-09-24 01:39:43','2021-09-24 01:39:43'),(28,6,'None of the above','N','2021-09-24 01:39:43','2021-09-24 01:39:43');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `questions` */

DROP TABLE IF EXISTS `questions`;

CREATE TABLE `questions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `questions` */

insert  into `questions`(`id`,`question`,`created_at`,`updated_at`) values (1,'Php is a -','2021-09-24 08:14:42','2021-09-24 08:14:42'),(2,'CPU ?','2021-09-24 08:16:23','2021-09-24 08:16:23'),(3,'Variable name in PHP starts with -','2021-09-24 01:36:01','2021-09-24 01:36:01'),(4,'Which of the following is the default file extension of PHP?','2021-09-24 01:36:57','2021-09-24 01:36:57'),(5,'Which of the following is not a variable scope in PHP?.','2021-09-24 01:37:45','2021-09-24 01:38:02'),(6,'Which of the following is the correct way to create a function in PHP?','2021-09-24 01:39:43','2021-09-24 01:39:43');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
