CREATE DATABASE  IF NOT EXISTS `e_palengke` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `e_palengke`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: e_palengke
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accesses`
--

DROP TABLE IF EXISTS `accesses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accesses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_role_details_id` int NOT NULL,
  `side_nav_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accesses`
--

LOCK TABLES `accesses` WRITE;
/*!40000 ALTER TABLE `accesses` DISABLE KEYS */;
INSERT INTO `accesses` VALUES (1,1,1,'2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(2,1,4,'2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(3,1,6,'2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(4,1,8,'2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(5,1,11,'2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(6,1,12,'2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(7,2,3,'2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(8,2,2,'2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(9,2,10,'2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(10,2,5,'2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(11,2,13,'2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(12,2,14,'2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(13,3,9,'2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(14,3,14,'2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(15,4,7,'2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(16,4,14,'2023-10-15 23:40:46','2023-10-15 23:40:46',NULL);
/*!40000 ALTER TABLE `accesses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applicant_credentials`
--

DROP TABLE IF EXISTS `applicant_credentials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `applicant_credentials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `requirement_details_id` int NOT NULL,
  `user_role_id` int NOT NULL,
  `picture_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicant_credentials`
--

LOCK TABLES `applicant_credentials` WRITE;
/*!40000 ALTER TABLE `applicant_credentials` DISABLE KEYS */;
INSERT INTO `applicant_credentials` VALUES (1,1,5,'/applicant_credentials/barangay_certificate-652c78c3733eb.jpg','2023-10-15 23:41:55',NULL,NULL),(2,2,5,'/applicant_credentials/barangay_indigency-652c78c3741ef.jpg','2023-10-15 23:41:55',NULL,NULL),(3,1,6,'/applicant_credentials/barangay_certificate-652c78f0d9c9c.jpg','2023-10-15 23:42:40',NULL,NULL),(4,2,6,'/applicant_credentials/barangay_indigency-652c78f0da7d7.jpg','2023-10-15 23:42:40',NULL,NULL);
/*!40000 ALTER TABLE `applicant_credentials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `store_id` int NOT NULL,
  `user_id` int NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_locations`
--

DROP TABLE IF EXISTS `customer_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer_locations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_role_id` int NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_locations`
--

LOCK TABLES `customer_locations` WRITE;
/*!40000 ALTER TABLE `customer_locations` DISABLE KEYS */;
INSERT INTO `customer_locations` VALUES (1,2,'Caloocan City','14.653740','120.966773','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(2,3,'Caloocan City','14.653740','120.966773','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(3,4,'Caloocan City','14.653740','120.966773','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL);
/*!40000 ALTER TABLE `customer_locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery_locations`
--

DROP TABLE IF EXISTS `delivery_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `delivery_locations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_role_id` int NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery_locations`
--

LOCK TABLES `delivery_locations` WRITE;
/*!40000 ALTER TABLE `delivery_locations` DISABLE KEYS */;
/*!40000 ALTER TABLE `delivery_locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2016_06_01_000001_create_oauth_auth_codes_table',1),(2,'2016_06_01_000002_create_oauth_access_tokens_table',1),(3,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),(4,'2016_06_01_000004_create_oauth_clients_table',1),(5,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),(6,'2023_08_31_094810_create_users_table',1),(7,'2023_09_02_011214_create_user_roles_table',1),(8,'2023_09_02_015802_create_applicant_credentials_table',1),(9,'2023_09_02_020112_create_requirements_table',1),(10,'2023_09_02_020217_create_requirement_details_table',1),(11,'2023_09_03_130140_create_store_types_table',1),(12,'2023_09_03_130708_create_store_type_details_table',1),(13,'2023_09_04_072122_create_delivery_locations_table',1),(14,'2023_09_04_072423_create_stores_table',1),(15,'2023_09_05_030447_create_user_details_table',1),(16,'2023_09_05_030517_create_customer_locations_table',1),(17,'2023_09_06_052843_create_side_navs_table',1),(18,'2023_09_06_054800_create_accesses_table',1),(19,'2023_09_06_062919_create_user_role_details_table',1),(20,'2023_09_16_055507_create_product_type_details_table',1),(21,'2023_09_17_141407_create_products_table',1),(22,'2023_09_25_034619_create_carts_table',1),(23,'2023_09_25_034712_create_orders_table',1),(24,'2023_09_25_034932_create_order_details_table',1),(25,'2023_10_15_180503_create_side_nav_children_table',1),(26,'2023_10_15_183957_create_side_nav_child_accesses_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `client_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` VALUES ('74fa693b211403d763e017b2c8e7e084afc9ba47fb4fe22738a52517e73754bfe616603bcd06a31e',2,2,NULL,'[\"*\"]',1,'2023-10-15 23:41:07','2023-10-15 23:42:05','2024-10-16 07:41:07'),('18ea8c4ae68746eae5e659612aafcbaf3bf3ac6b401e75136fcaacc0d8566934240015dd1e5e6a2d',3,2,NULL,'[\"*\"]',1,'2023-10-15 23:42:08','2023-10-15 23:42:43','2024-10-16 07:42:08'),('304072b5fa4e30c96b46668b59ecb22c74ed2d0d7e115e559f8066580db0280057f939a13229827b',1,2,NULL,'[\"*\"]',1,'2023-10-15 23:42:45','2023-10-15 23:42:52','2024-10-16 07:42:45'),('353d0ddb152ac75fd1d1c825b0d9225853741356e6d4ebd0f6c76f02a2cb1ec0c042b9755e540c9c',2,2,NULL,'[\"*\"]',1,'2023-10-15 23:42:57','2023-10-15 23:44:35','2024-10-16 07:42:57'),('00f9937057a20939b3d1b7466ec4fccf1c5c32ed5f97b197a206c2def019bddfdb3796d3b910bcbb',3,2,NULL,'[\"*\"]',1,'2023-10-15 23:44:41','2023-10-15 23:45:38','2024-10-16 07:44:41'),('43875bc00be2adbda75f529a64d9f3fa12f5ee0054f7c8382e12ebcc36e1d86091e9f8bc901cb37b',4,2,NULL,'[\"*\"]',0,'2023-10-15 23:45:40','2023-10-15 23:45:40','2024-10-16 07:45:40');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `client_id` bigint unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` VALUES (1,NULL,'Laravel Personal Access Client','m9kcxhG71B6XoNIrjqKtae3oc5G5IgtZzQdBwSeC',NULL,'http://localhost',1,0,0,'2023-10-15 23:40:37','2023-10-15 23:40:37'),(2,NULL,'Laravel Password Grant Client','j0R011OCYVxLywVOXFRvTVJnuH8SqbgsrouFqn21','users','http://localhost',0,1,0,'2023-10-15 23:40:37','2023-10-15 23:40:37');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` VALUES (1,1,'2023-10-15 23:40:37','2023-10-15 23:40:37');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
INSERT INTO `oauth_refresh_tokens` VALUES ('3ab870af5fff94740fb3c42f67581ac868556170c7c1688a04e558de645b75507abf0ddfe5b0722b','74fa693b211403d763e017b2c8e7e084afc9ba47fb4fe22738a52517e73754bfe616603bcd06a31e',0,'2024-10-16 07:41:07'),('c132f378247ba295d1d9c14c577b1ecbbf74fe9a6afeae02bf2183302e662cdd41424793c58be711','18ea8c4ae68746eae5e659612aafcbaf3bf3ac6b401e75136fcaacc0d8566934240015dd1e5e6a2d',0,'2024-10-16 07:42:08'),('2ec7934bc34a36d3fe945e5b5d351893037ebc8386df3015a8e9bf2380341ccff2a1b6f93c8984c6','304072b5fa4e30c96b46668b59ecb22c74ed2d0d7e115e559f8066580db0280057f939a13229827b',0,'2024-10-16 07:42:45'),('bfc9188ec09d47bb6bcb2ad758adf98408d87e87a0b8e7d357174b854d638f240443ac2b98b7fe4d','353d0ddb152ac75fd1d1c825b0d9225853741356e6d4ebd0f6c76f02a2cb1ec0c042b9755e540c9c',0,'2024-10-16 07:42:57'),('188d2a4c58a3cc344ed50dbba2e69aa873da8a26abc24936f6afccd6d416ae24a2e723d20393d4ad','00f9937057a20939b3d1b7466ec4fccf1c5c32ed5f97b197a206c2def019bddfdb3796d3b910bcbb',0,'2024-10-16 07:44:41'),('229169ff295ee166d90009d9a03ec7356c274ebad6768eaa6896a572789a5b0c5320214f6813162a','43875bc00be2adbda75f529a64d9f3fa12f5ee0054f7c8382e12ebcc36e1d86091e9f8bc901cb37b',0,'2024-10-16 07:45:40');
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `store_id` int NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `delivery_id` int DEFAULT NULL,
  `or_number` int DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` int DEFAULT NULL,
  `change` int DEFAULT NULL,
  `total` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_type_details`
--

DROP TABLE IF EXISTS `product_type_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_type_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_type_details`
--

LOCK TABLES `product_type_details` WRITE;
/*!40000 ALTER TABLE `product_type_details` DISABLE KEYS */;
INSERT INTO `product_type_details` VALUES (1,'Vegetable','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(2,'Meat','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(3,'Tea','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(4,'Grilled Foods','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL);
/*!40000 ALTER TABLE `product_type_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int NOT NULL,
  `product_type_details_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `stock` int NOT NULL,
  `picture_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,NULL,'grilled chicken',150,10,'/products/chicken-652c7954f11af.jpg','2023-10-15 23:44:20','2023-10-15 23:44:20',NULL),(2,1,NULL,'grilled liempo',180,8,'/products/liempo-652c795fcf313.jpg','2023-10-15 23:44:31','2023-10-15 23:44:31',NULL),(3,2,NULL,'milk tea',39,10,'/products/milk-tea-652c7979839f2.png','2023-10-15 23:44:57','2023-10-15 23:44:57',NULL),(4,2,NULL,'milk tea pandan',49,15,'/products/milk-tea-pandan-652c799e65190.png','2023-10-15 23:45:34','2023-10-15 23:45:34',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requirement_details`
--

DROP TABLE IF EXISTS `requirement_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `requirement_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requirement_details`
--

LOCK TABLES `requirement_details` WRITE;
/*!40000 ALTER TABLE `requirement_details` DISABLE KEYS */;
INSERT INTO `requirement_details` VALUES (1,'barangay certificate','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(2,'barangay indigency','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(3,'barangay_id','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(4,'police clearance','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL);
/*!40000 ALTER TABLE `requirement_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requirements`
--

DROP TABLE IF EXISTS `requirements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `requirements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_role_details_id` int NOT NULL,
  `requirement_details_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requirements`
--

LOCK TABLES `requirements` WRITE;
/*!40000 ALTER TABLE `requirements` DISABLE KEYS */;
INSERT INTO `requirements` VALUES (1,2,3,'2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(2,3,1,'2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(3,3,2,'2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(4,4,1,'2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(5,4,2,'2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(6,4,3,'2023-10-15 23:40:46','2023-10-15 23:40:46',NULL);
/*!40000 ALTER TABLE `requirements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `side_nav_child_accesses`
--

DROP TABLE IF EXISTS `side_nav_child_accesses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `side_nav_child_accesses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_role_details_id` int NOT NULL,
  `side_nav_children_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `side_nav_child_accesses`
--

LOCK TABLES `side_nav_child_accesses` WRITE;
/*!40000 ALTER TABLE `side_nav_child_accesses` DISABLE KEYS */;
INSERT INTO `side_nav_child_accesses` VALUES (1,2,1,'2023-10-15 23:40:46','2023-10-15 23:40:46'),(2,3,2,'2023-10-15 23:40:46','2023-10-15 23:40:46'),(3,4,3,'2023-10-15 23:40:46','2023-10-15 23:40:46');
/*!40000 ALTER TABLE `side_nav_child_accesses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `side_nav_children`
--

DROP TABLE IF EXISTS `side_nav_children`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `side_nav_children` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `parent_side_nav_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `side_nav_children`
--

LOCK TABLES `side_nav_children` WRITE;
/*!40000 ALTER TABLE `side_nav_children` DISABLE KEYS */;
INSERT INTO `side_nav_children` VALUES (1,14,'Customer Orders','2023-10-15 23:40:46','2023-10-15 23:40:46'),(2,14,'Store Orders','2023-10-15 23:40:46','2023-10-15 23:40:46'),(3,14,'Delivery Orders','2023-10-15 23:40:46','2023-10-15 23:40:46');
/*!40000 ALTER TABLE `side_nav_children` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `side_navs`
--

DROP TABLE IF EXISTS `side_navs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `side_navs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `side_navs`
--

LOCK TABLES `side_navs` WRITE;
/*!40000 ALTER TABLE `side_navs` DISABLE KEYS */;
INSERT INTO `side_navs` VALUES (1,'ADMIN','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(2,'APPLICATION','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(3,'HOME','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(4,'REQUIREMENT DETAILS','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(5,'STORE','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(6,'USER ROLE','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(7,'DELIVERY','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(8,'APPLICANTS','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(9,'INVENTORY','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(10,'PROFILE','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(11,'PRODUCT TYPE DETAILS','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(12,'STORE TYPE DETAILS','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(13,'TOPUP','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(14,'ORDERS','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL);
/*!40000 ALTER TABLE `side_navs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `store_type_details`
--

DROP TABLE IF EXISTS `store_type_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `store_type_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store_type_details`
--

LOCK TABLES `store_type_details` WRITE;
/*!40000 ALTER TABLE `store_type_details` DISABLE KEYS */;
INSERT INTO `store_type_details` VALUES (1,'Vegetable','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(2,'Tea','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(3,'Meat','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(4,'Fish','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(5,'Grilled','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(6,'School Supplies','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(7,'Hardware','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(8,'others','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL);
/*!40000 ALTER TABLE `store_type_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `store_types`
--

DROP TABLE IF EXISTS `store_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `store_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int NOT NULL,
  `store_type_details_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store_types`
--

LOCK TABLES `store_types` WRITE;
/*!40000 ALTER TABLE `store_types` DISABLE KEYS */;
INSERT INTO `store_types` VALUES (1,1,5,'2023-10-15 23:41:55','2023-10-15 23:41:55',NULL),(2,2,2,'2023-10-15 23:42:40','2023-10-15 23:42:40',NULL);
/*!40000 ALTER TABLE `store_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stores` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_role_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stores`
--

LOCK TABLES `stores` WRITE;
/*!40000 ALTER TABLE `stores` DISABLE KEYS */;
INSERT INTO `stores` VALUES (1,5,'james grilled','sabalo street caloocan city',NULL,'14.654073860594018','120.96654295921327','2023-10-15 23:41:55','2023-10-15 23:41:55',NULL),(2,6,'kim tea','kapak alley caloocan city',NULL,'14.654001201729363','120.96676826477052','2023-10-15 23:42:40','2023-10-15 23:42:40',NULL);
/*!40000 ALTER TABLE `stores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forget_password_otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` int DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_details`
--

LOCK TABLES `user_details` WRITE;
/*!40000 ALTER TABLE `user_details` DISABLE KEYS */;
INSERT INTO `user_details` VALUES (1,1,'admin_name',NULL,'Male',20,'00000000000','admin_address','admin_emailSample@gmail.com',NULL,NULL,0,NULL,NULL,'2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(2,2,'customer_name1',NULL,'Male',20,'00000000000','customer_address1','customer_emailSample@gmail.com',NULL,NULL,0,NULL,NULL,'2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(3,3,'CUSTOMER2_NAME',NULL,'Male',20,'00000000000','Customer2_address1','customer2Sample@gmail.com',NULL,NULL,0,NULL,NULL,'2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(4,4,'naruto',NULL,'Male',20,'00000000000','caloocan','naruto@gmail.com',NULL,NULL,0,NULL,NULL,'2023-10-15 23:40:46','2023-10-15 23:40:46',NULL);
/*!40000 ALTER TABLE `user_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role_details`
--

DROP TABLE IF EXISTS `user_role_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_role_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role_details`
--

LOCK TABLES `user_role_details` WRITE;
/*!40000 ALTER TABLE `user_role_details` DISABLE KEYS */;
INSERT INTO `user_role_details` VALUES (1,'ADMIN','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(2,'CUSTOMER','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(3,'SELLER','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(4,'DELIVERY','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL);
/*!40000 ALTER TABLE `user_role_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `user_role_details_id` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` VALUES (1,1,1,'active','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(2,2,2,'active','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(3,3,2,'active','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(4,4,2,'active','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(5,2,3,'active','2023-10-15 23:41:55','2023-10-15 23:41:55',NULL),(6,3,3,'active','2023-10-15 23:42:40','2023-10-15 23:42:40',NULL);
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','$2y$10$u/SM.As8gzYysEtz9ezPR.ZvfZtoKcK0uhOUbtFSgtoAQItGHQBQG','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(2,'customer1','$2y$10$FLJ04D6vn7sLu/gRqHDuje6B57geNtmOHyr/8GJ5FagRy0P8OauwO','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(3,'customer2','$2y$10$0Mkunr8II1aVir1CUf.doecjIsYsKoy/5I/nNTSOHg9fI/RNO0Gja','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL),(4,'naruto','$2y$10$AEFilfsr2Mc.SzkwTW.MtOh/qUmZ3TQ2bxywrKhM24lMSI5ePb85C','2023-10-15 23:40:46','2023-10-15 23:40:46',NULL);
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

-- Dump completed on 2023-10-16  7:59:17
