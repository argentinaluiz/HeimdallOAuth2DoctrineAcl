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
-- Table structure for table `Email_User`
--

DROP TABLE IF EXISTS `Email_User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `Email_User` (
  `user_id` int(11) DEFAULT NULL,
  `emailId` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `isFirst` tinyint(1) DEFAULT NULL,
  `checked` tinyint(1) DEFAULT NULL,
  `hash` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `mailing` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`emailId`),
  KEY `IDX_FDCA5A22A76ED395` (`user_id`),
  CONSTRAINT `FK_FDCA5A22A76ED395` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Email_User`
--

LOCK TABLES `Email_User` WRITE;
/*!40000 ALTER TABLE `Email_User` DISABLE KEYS */;
INSERT INTO `Email_User` VALUES (1,1,'prazeres@gmail.com',1,NULL,NULL,NULL,NULL),(1,2,'prazeres2@gmail.com',NULL,NULL,NULL,NULL,NULL),(2,3,'lauoliveiraa@gmail.com',1,NULL,NULL,NULL,NULL),(2,4,'lauoliveiraa@hotmaill.com',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `Email_User` ENABLE KEYS */;
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
