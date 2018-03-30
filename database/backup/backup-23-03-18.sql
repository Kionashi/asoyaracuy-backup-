-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: asoyaracuy
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `carousel_images`
--

DROP TABLE IF EXISTS `carousel_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carousel_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('ENABLED','DISABLED') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carousel_images`
--

LOCK TABLES `carousel_images` WRITE;
/*!40000 ALTER TABLE `carousel_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `carousel_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fees`
--

DROP TABLE IF EXISTS `fees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('ENABLED','DISABLED') COLLATE utf8_unicode_ci NOT NULL,
  `last_collection` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fees`
--

LOCK TABLES `fees` WRITE;
/*!40000 ALTER TABLE `fees` DISABLE KEYS */;
INSERT INTO `fees` VALUES (1,'500','DISABLED','0000-00-00','2017-03-30 02:54:36','2017-03-30 02:55:12'),(2,'600','DISABLED','0000-00-00','2017-03-30 02:55:12','2017-03-30 03:23:37'),(3,'9520','DISABLED','2017-03-29','2017-03-30 03:23:37','2017-03-30 03:59:09'),(4,'500','DISABLED','2017-03-29','2017-03-30 03:59:09','2017-03-30 04:00:41'),(5,'9500','DISABLED','0000-00-00','2017-03-30 04:00:41','2018-01-14 03:27:53'),(6,'500','DISABLED','2018-01-13','2018-01-14 03:27:54','2018-02-01 04:52:18'),(7,'500','DISABLED',NULL,'2018-02-05 16:53:09','2018-02-05 16:53:18'),(8,'600','ENABLED','2018-02-05','2018-02-05 16:53:18','2018-02-05 16:53:30');
/*!40000 ALTER TABLE `fees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2015_11_05_175811_create_payments_table',1),('2015_11_06_171925_create_carousel_images_table',1),('2015_11_06_171925_create_special_fees_table',1),('2016_04_10_195849_create_fees_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `amount` decimal(15,2) NOT NULL,
  `bank` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('DEPOSIT','TRANSFERENCE','CASH') COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('APPROVED','PENDING','REJECTED') COLLATE utf8_unicode_ci NOT NULL,
  `user_status` enum('ENABLED','DISABLED') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ENABLED',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_user_id_foreign` (`user_id`),
  CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (1,150.00,'sadasdas','asdasd','','','sadas','DEPOSIT','APPROVED','ENABLED','2016-04-25 05:37:02','2016-04-25 05:39:21',1),(2,122.00,'asddsa','asdsd','2016-04-25 01:15:41','','','DEPOSIT','APPROVED','ENABLED','2016-04-25 05:45:41','2016-04-25 05:49:20',1),(3,50.00,'Banesco','asdasd213123','2016-04-25 01:35:18','','Choque del portón :v','TRANSFERENCE','APPROVED','ENABLED','2016-04-25 06:05:18','2016-04-25 06:07:23',1),(4,123.00,'dsa','132','2016-07-01 03:13:32','','sadsa','DEPOSIT','REJECTED','ENABLED','2016-07-01 07:13:32','2018-01-31 07:23:42',1),(5,322.00,'MEGABANK','5555555','15/06/1990','','por lordaeron!','TRANSFERENCE','APPROVED','ENABLED','2017-03-10 00:21:45','2017-03-10 00:24:34',1),(6,-644.00,'PARTYYYY','1234','12/12/2012','','crashh this paaaaarty','DEPOSIT','APPROVED','ENABLED','2017-03-10 00:25:55','2017-03-10 00:26:21',1),(8,600.00,'No aplica','Cuota: 29-03-2017','','','Cuota mensual Asoyaracuy','','APPROVED','ENABLED','2017-03-30 03:18:42','2017-03-30 03:18:42',1),(9,600.00,'No aplica','Cuota: 29-03-2017','','','Cuota mensual Asoyaracuy','','APPROVED','ENABLED','2017-03-30 03:18:42','2017-03-30 03:18:42',8),(10,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:23:44','2017-03-30 03:23:44',1),(11,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:23:44','2017-03-30 03:23:44',8),(12,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:23:44','2017-03-30 03:23:44',11),(13,9500.00,'Pedrobank','123','15-06-1990','','oreos','DEPOSIT','APPROVED','ENABLED','2017-03-30 03:25:11','2017-03-30 03:25:40',11),(14,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:27:43','2017-03-30 03:27:43',1),(15,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:27:44','2017-03-30 03:27:44',8),(16,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:27:44','2017-03-30 03:27:44',11),(17,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:28:29','2017-03-30 03:28:29',1),(18,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:28:29','2017-03-30 03:28:29',8),(19,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:28:29','2017-03-30 03:28:29',11),(20,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:28:55','2017-03-30 03:28:55',1),(21,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:28:55','2017-03-30 03:28:55',8),(22,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:28:55','2017-03-30 03:28:55',11),(23,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:30:29','2017-03-30 03:30:29',1),(24,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:30:30','2017-03-30 03:30:30',8),(25,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:30:30','2017-03-30 03:30:30',11),(26,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:30:47','2017-03-30 03:30:47',1),(27,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:30:47','2017-03-30 03:30:47',8),(28,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:30:47','2017-03-30 03:30:47',11),(29,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:31:47','2017-03-30 03:31:47',1),(30,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:31:47','2017-03-30 03:31:47',8),(31,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:31:47','2017-03-30 03:31:47',11),(32,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:33:27','2017-03-30 03:33:27',1),(33,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:33:27','2017-03-30 03:33:27',8),(34,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:33:27','2017-03-30 03:33:27',11),(35,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:34:58','2017-03-30 03:34:58',1),(36,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:34:59','2017-03-30 03:34:59',8),(37,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:34:59','2017-03-30 03:34:59',11),(38,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:35:57','2017-03-30 03:35:57',1),(39,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:35:57','2017-03-30 03:35:57',8),(40,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:35:57','2017-03-30 03:35:57',11),(41,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:36:34','2017-03-30 03:36:34',1),(42,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:36:34','2017-03-30 03:36:34',8),(43,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:36:34','2017-03-30 03:36:34',11),(44,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:37:08','2017-03-30 03:37:08',1),(45,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:37:08','2017-03-30 03:37:08',8),(46,9500.00,'No aplica','Cuota: 29-03-2017','29-03-2017','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:37:08','2017-03-30 03:37:08',11),(47,9510.00,'No aplica','Cuota: 2017-03-29','2017-03-29','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:37:39','2017-03-30 03:37:39',1),(48,9510.00,'No aplica','Cuota: 2017-03-29','2017-03-29','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:37:39','2017-03-30 03:37:39',8),(49,9510.00,'No aplica','Cuota: 2017-03-29','2017-03-29','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:37:39','2017-03-30 03:37:39',11),(50,9520.00,'No aplica','Cuota: 2017-03-29','2017-03-29','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:38:39','2017-03-30 03:38:39',1),(51,9520.00,'No aplica','Cuota: 2017-03-29','2017-03-29','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:38:39','2017-03-30 03:38:39',8),(52,9520.00,'No aplica','Cuota: 2017-03-29','2017-03-29','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:38:39','2017-03-30 03:38:39',11),(53,9520.00,'No aplica','Cuota: 2017-03-29','2017-03-29','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:39:55','2017-03-30 03:39:55',1),(54,9520.00,'No aplica','Cuota: 2017-03-29','2017-03-29','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:39:55','2017-03-30 03:39:55',8),(55,9520.00,'No aplica','Cuota: 2017-03-29','2017-03-29','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:39:55','2017-03-30 03:39:55',11),(56,9520.00,'No aplica','Cuota: 2017-03-29','2017-03-29','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:41:33','2017-03-30 03:41:33',1),(57,9520.00,'No aplica','Cuota: 2017-03-29','2017-03-29','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:41:33','2017-03-30 03:41:33',8),(58,9520.00,'No aplica','Cuota: 2017-03-29','2017-03-29','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:41:33','2017-03-30 03:41:33',11),(59,-9520.00,'No aplica','Cuota: 2017-03-29','2017-03-29','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:49:17','2017-03-30 03:49:17',1),(60,-9520.00,'No aplica','Cuota: 2017-03-29','2017-03-29','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:49:17','2017-03-30 03:49:17',8),(61,-9520.00,'No aplica','Cuota: 2017-03-29','2017-03-29','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:49:17','2017-03-30 03:49:17',11),(62,152090.00,'Pedrobank','321','15-06-1991','','cof cof cof','DEPOSIT','APPROVED','ENABLED','2017-03-30 03:51:28','2017-03-30 03:51:46',11),(63,-500.00,'No aplica','Cuota: 2017-03-29','2017-03-29','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:59:19','2017-03-30 03:59:19',1),(64,-500.00,'No aplica','Cuota: 2017-03-29','2017-03-29','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:59:20','2017-03-30 03:59:20',8),(65,-500.00,'No aplica','Cuota: 2017-03-29','2017-03-29','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2017-03-30 03:59:20','2017-03-30 03:59:20',11),(66,-500.00,'No aplica','Cuota: 2018-01-13','2018-01-13','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2018-01-14 03:28:01','2018-01-14 03:28:01',1),(67,-500.00,'No aplica','Cuota: 2018-01-13','2018-01-13','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2018-01-14 03:28:01','2018-01-14 03:28:01',8),(68,-500.00,'No aplica','Cuota: 2018-01-13','2018-01-13','','Cuota mensual Asoyaracuy','TRANSFERENCE','APPROVED','ENABLED','2018-01-14 03:28:01','2018-01-14 03:28:01',11),(69,550.00,'Bancolchon','548681291','19/01/2018','public/comprobantes/vMD6ki41euNtQw5NmYY2dZHXZwli67loFfaQGE43.jpeg','ACCA13','DEPOSIT','PENDING','ENABLED','2018-01-30 05:34:43','2018-01-30 05:34:43',1),(70,200.00,'Bancolchon','65415251','09/03/2018','public/comprobantes/zBQHhnj3IQNUa1DgcAgJkcwtrX0CC505KpzHh8cG.jpeg','Pagos del mes','DEPOSIT','PENDING','ENABLED','2018-01-30 07:40:06','2018-01-30 07:40:06',1),(71,14999996.00,'Bancomercial','4154515515','09/01/2018',NULL,'JOJOOOOOOOOOS','TRANSFERENCE','PENDING','ENABLED','2018-01-30 08:08:06','2018-01-30 08:08:06',1),(72,11111111111.00,'Bancolchon','222','25/01/2018',NULL,'JOJOOOOOOOOOS','DEPOSIT','PENDING','ENABLED','2018-01-30 08:18:35','2018-01-30 08:18:35',1),(73,222220.00,'Bancomercial','223saz','18/01/2018',NULL,'test2','DEPOSIT','PENDING','ENABLED','2018-01-30 08:20:58','2018-01-30 08:20:58',1),(74,222220.00,'Bancomercial','223saz','18/01/2018',NULL,'test2','DEPOSIT','APPROVED','ENABLED','2018-01-30 08:21:17','2018-02-05 16:49:59',1),(75,222220.00,'Bancomercial','223saz','18/01/2018',NULL,'test2','DEPOSIT','PENDING','ENABLED','2018-01-30 08:22:43','2018-01-30 08:22:43',1),(76,222220.00,'Bancomercial','223saz','18/01/2018',NULL,'test2','DEPOSIT','PENDING','ENABLED','2018-01-30 08:25:02','2018-01-30 08:25:02',1),(77,222220.00,'Bancomercial','223saz','18/01/2018',NULL,'test2','DEPOSIT','PENDING','ENABLED','2018-01-30 08:25:52','2018-01-30 08:25:52',1),(78,222220.00,'Bancomercial','223saz','18/01/2018',NULL,'test2','DEPOSIT','PENDING','ENABLED','2018-01-30 08:26:12','2018-01-30 08:26:12',1),(79,222220.00,'Bancomercial','223saz','18/01/2018','payments/79-voucher.png','test3','DEPOSIT','APPROVED','ENABLED','2018-01-30 08:31:15','2018-01-31 07:15:07',1),(80,4997.00,'bancochera','222222222','19/12/2017',NULL,'test4','DEPOSIT','PENDING','ENABLED','2018-01-30 08:34:46','2018-01-30 08:34:46',1),(81,1500000.00,'Pedro Bank','510878200080014089','09/01/2018',NULL,'Pagos pagables','DEPOSIT','PENDING','ENABLED','2018-01-30 17:57:32','2018-01-30 17:57:32',1),(82,1500000.00,'Pedro Bank','510878200080014089','09/01/2018',NULL,'Pagos pagables','DEPOSIT','PENDING','ENABLED','2018-01-30 17:59:54','2018-01-30 17:59:54',1),(83,1500000.00,'Pedro Bank','510878200080014089','09/01/2018',NULL,'Pagos pagables','DEPOSIT','PENDING','ENABLED','2018-01-30 18:00:12','2018-01-30 18:00:12',1),(84,1500000.00,'Pedro Bank','510878200080014089','09/01/2018',NULL,'Pagos pagables','DEPOSIT','REJECTED','ENABLED','2018-01-30 18:02:49','2018-01-31 07:15:19',1),(85,1500000.00,'Pedro Bank','510878200080014089','09/01/2018',NULL,'Pagos pagables','DEPOSIT','PENDING','ENABLED','2018-01-30 18:03:33','2018-01-30 18:03:33',1),(86,1500000.00,'Pedro Bank','510878200080014089','09/01/2018',NULL,'Pagos pagables','DEPOSIT','PENDING','ENABLED','2018-01-30 18:03:53','2018-01-30 18:03:53',1),(87,1500000.00,'Pedro Bank','510878200080014089','09/01/2018',NULL,'Pagos pagables','DEPOSIT','PENDING','ENABLED','2018-01-30 18:04:02','2018-01-30 18:04:02',1),(88,1500000.00,'Pedro Bank','510878200080014089','09/01/2018',NULL,'Pagos pagables','DEPOSIT','PENDING','ENABLED','2018-01-30 18:05:17','2018-01-30 18:05:17',1),(89,150898735.00,'Patria Bank','510878200080014089','09/01/2018','uploads/payments/89-voucher.png','Pagos pagables','DEPOSIT','PENDING','ENABLED','2018-01-30 18:06:38','2018-01-30 18:06:38',1),(90,50500.00,'Bancomercial','510878200080014089','10/02/2018',NULL,'JOJOOOOOOOOOS','DEPOSIT','PENDING','ENABLED','2018-02-01 17:41:59','2018-02-01 17:41:59',1),(91,496.00,'Mercantil','510878200080014089','13/02/2018',NULL,'Pagos del mes','DEPOSIT','PENDING','ENABLED','2018-02-05 09:06:21','2018-02-05 09:06:21',1),(92,496.00,'Mercantil','510878200080014089','13/02/2018','uploads/payments/92-voucher.png','Pagos del mes','DEPOSIT','REJECTED','ENABLED','2018-02-05 09:06:42','2018-02-06 02:56:49',1),(93,200.00,'Mercantil','4154515515','27/02/2018','uploads/payments/93-voucher.png','Pagos del mes','DEPOSIT','PENDING','ENABLED','2018-02-06 02:55:31','2018-02-06 02:55:31',1),(94,200.00,'asdf','1111','15/02/2018','uploads/payments/94-voucher.png','pago 1','DEPOSIT','PENDING','ENABLED','2018-02-15 22:00:00','2018-02-15 22:00:00',1);
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `special_fees`
--

DROP TABLE IF EXISTS `special_fees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_fees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('ENABLED','DISABLED') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ENABLED',
  `user_status` enum('ENABLED','DISABLED') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ENABLED',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `special_fees_user_id_foreign` (`user_id`),
  CONSTRAINT `special_fees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `special_fees`
--

LOCK TABLES `special_fees` WRITE;
/*!40000 ALTER TABLE `special_fees` DISABLE KEYS */;
INSERT INTO `special_fees` VALUES (1,1,'100','DISABLED','ENABLED','2016-04-25 03:50:37','2016-04-25 04:42:07'),(4,1,'0','ENABLED','ENABLED','2017-03-30 04:01:44','2017-03-30 04:01:44');
/*!40000 ALTER TABLE `special_fees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `balance` decimal(15,2) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `house` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('ENABLED','DISABLED') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ENABLED',
  `role` enum('USER','ADMIN','DIRECTIVE','COLLECTOR') COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_house_unique` (`house`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,-104.00,'choroni@mail.com','Choroni','$2y$10$.o6X/hpNPbvBj1rNwE2lAuUAVwEU0EbwAP3ZGrJSeaZ0ZrInuDwTG','0212-235-1434','ENABLED','USER','fz1ajWzVoXFUtQVCOSKU72giRhjbMbPugOw4ZFOHyrRLAFVq81S73lQmE8cr','2016-04-14 04:36:11','2018-02-06 20:53:04'),(2,-1200.00,'mispadres@mail.com','Mis Padres','$2y$10$8ayHgM6EU1NB80AWUCsabughJwApQ5A6dwhpIyVFb8IxG9nBkPy66','123456','ENABLED','USER',NULL,'2016-04-25 00:50:52','2018-02-06 03:01:00'),(3,0.00,'xxx@xxx.com','xxx','$2y$10$6QmCUoTkuEMFZIFaddxzoeK5TPZSuSRjOrGwhEdwAlOdK/n4e6Rpu','123456','ENABLED','',NULL,'2016-04-25 00:55:01','2016-04-25 00:55:01'),(4,-1200.00,'xxx@xxxx.com','Pedro perez','$2y$10$3B4hJ3QamhuM/VzC0mn3NedoDAE5hl.geamGend.cEAeN8cE6Ru6m','123456','ENABLED','USER',NULL,'2016-04-25 00:55:44','2018-02-06 03:01:00'),(5,0.00,'xxx@xxxx.comx','xxxxx','$2y$10$IArv5CXIYfcAqD.6lvHgIOiouVxJIaArLYD/Czo89y07c6wgs6Axu','23121231','ENABLED','',NULL,'2016-04-25 00:58:15','2016-04-25 00:58:15'),(6,0.00,'aaa@aaa.cpm','aaaaaa','$2y$10$Uo5ThaRFGLgIk9gf9llHP.6tu9KlCohD2a4/hCOuKTSJch7wGAa/2','asdsadasa','ENABLED','',NULL,'2016-04-25 01:07:00','2016-04-25 01:07:00'),(7,0.00,'aaa@aaa.cpma','aaaaaaaa','$2y$10$eLBw7ujCPN9K0MwH/NsPZub/dju/eQ1heQaVD.kh2S303CobQ24ji','asdsadasa','ENABLED','',NULL,'2016-04-25 01:07:29','2016-04-25 01:07:29'),(8,-164390.00,'asaasdda@asdsa.com','asdsad','$2y$10$juUqRN1z72PJlvPS9cyWFOFWvKh3Ar2hIQWcbvyrHrIzEX2wgAMqO','asdasd','ENABLED','USER',NULL,'2016-04-25 01:12:29','2018-02-06 03:01:00'),(9,0.00,'asdas@sadsad.coma','asdsasa','$2y$10$TCJLZwSDWKNNIZiffnUmk.Ze.YBECUCUEW28GKbmfUuf/1Yp4Vrla','asd','ENABLED','DIRECTIVE',NULL,'2016-04-25 06:03:22','2016-04-25 06:03:22'),(10,0.00,'admin@mail.com','Admin','$2y$10$jHE2Uwz8a3ttQEyP0hVHsugaQCScs3Ky9zb1IRXzLsHjKCdno0wSG','123456','ENABLED','ADMIN',NULL,'2017-03-29 17:07:36','2017-03-29 17:07:36'),(11,-2200.00,'pedro@mail.com','Pedro','$2y$10$rcNCxXTlYBJoq7nGY77GdOW32CAeu4DVvWG0HzvvGUrBAGKhSC/cO','1','ENABLED','USER',NULL,'2017-03-30 03:21:10','2018-02-06 03:01:01'),(12,-1200.00,'test@house.com','Test House','$2y$10$WCkzy7WOmtL4LoesgSpHfOAyd/qek1bsjEimivSYu/sLzjH3PT/i6','021223815685','ENABLED','USER',NULL,'2018-02-01 18:53:55','2018-02-06 03:01:01');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-23 17:59:59
