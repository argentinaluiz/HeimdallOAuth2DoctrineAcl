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
-- Table structure for table `AuthorizationCodeToScope_OAuth2`
--

DROP TABLE IF EXISTS `AuthorizationCodeToScope_OAuth2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `AuthorizationCodeToScope_OAuth2` (
  `scope_id` bigint(20) NOT NULL,
  `authorization_code_id` bigint(20) NOT NULL,
  PRIMARY KEY (`scope_id`,`authorization_code_id`),
  KEY `IDX_1EA6C7E682B5931` (`scope_id`),
  KEY `IDX_1EA6C7E847B7245` (`authorization_code_id`),
  CONSTRAINT `FK_1EA6C7E682B5931` FOREIGN KEY (`scope_id`) REFERENCES `Scope_OAuth2` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_1EA6C7E847B7245` FOREIGN KEY (`authorization_code_id`) REFERENCES `AuthorizationCode_OAuth2` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AuthorizationCodeToScope_OAuth2`
--

LOCK TABLES `AuthorizationCodeToScope_OAuth2` WRITE;
/*!40000 ALTER TABLE `AuthorizationCodeToScope_OAuth2` DISABLE KEYS */;
/*!40000 ALTER TABLE `AuthorizationCodeToScope_OAuth2` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-21 18:17:49