CREATE DATABASE  IF NOT EXISTS `Heimdall_OAuth2_3` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `Heimdall_OAuth2_3`;
-- MySQL dump 10.13  Distrib 8.0.13, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: Heimdall_OAuth2_3
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.34-MariaDB-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `parent_client` bigint(20) DEFAULT NULL,
  `username` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `ref` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstName` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastName` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `birthDay` smallint(6) DEFAULT NULL,
  `birthMonth` smallint(6) DEFAULT NULL,
  `birthYear` smallint(6) DEFAULT NULL,
  `occupation` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2DA17977D60322AC` (`role_id`),
  KEY `IDX_2DA179778857C793` (`parent_client`),
  CONSTRAINT `FK_2DA179778857C793` FOREIGN KEY (`parent_client`) REFERENCES `Client_OAuth2` (`id`),
  CONSTRAINT `FK_2DA17977D60322AC` FOREIGN KEY (`role_id`) REFERENCES `Role_Acl` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (1,2,1,'capivara',NULL,NULL,'Natalia','Souza','$2y$10$ujVJVUSLnrInBUKvvYmkOepaYR1XzSz7xBg5NvaR/0TCeoTbHJ176','2019-01-18 15:04:32','2019-01-18 16:45:59',NULL,19,9,1990,NULL),(2,4,1,'lauoliveiraa',NULL,NULL,'Lau','Oliveira','$2y$10$ODxx1nVAc/uaoJsYA2a2B.9trsCRwtH7V00xsy5RwKtJ2nZ9AgFWa','2019-01-19 17:40:31','2019-01-19 17:47:39',NULL,8,5,1970,NULL);
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-21 18:17:51
