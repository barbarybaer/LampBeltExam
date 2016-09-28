CREATE DATABASE  IF NOT EXISTS `lampbelt` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `lampbelt`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: lampbelt
-- ------------------------------------------------------
-- Server version	5.5.49-log

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
-- Table structure for table `quotes`
--

DROP TABLE IF EXISTS `quotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `posted_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `quote` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotes`
--

LOCK TABLES `quotes` WRITE;
/*!40000 ALTER TABLE `quotes` DISABLE KEYS */;
INSERT INTO `quotes` VALUES (46,4,24,'we need a revolution','2016-09-27 13:36:35','2016-09-27 13:36:35'),(48,4,25,'know what I mean?','2016-09-27 13:37:08','2016-09-27 13:37:08'),(50,4,26,'A stitch in time saves 9.','2016-09-27 13:38:55','2016-09-27 13:38:55'),(52,4,27,'eat the elephant','2016-09-27 13:39:44','2016-09-27 13:39:44'),(54,4,28,'to be or not to be....','2016-09-27 13:44:02','2016-09-27 13:44:02'),(55,4,28,'to be or not to be....','2016-09-27 13:45:15','2016-09-27 13:45:15'),(57,4,24,'you\'re just a reformist','2016-09-27 13:47:45','2016-09-27 13:47:45'),(58,4,25,'i like my jeep','2016-09-27 13:49:09','2016-09-27 13:49:09'),(59,4,28,'to be or not to be....','2016-09-27 13:57:48','2016-09-27 13:57:48'),(62,3,31,'be persistent','2016-09-27 14:10:38','2016-09-27 14:10:38'),(63,3,32,'i am a feminist','2016-09-27 14:10:56','2016-09-27 14:10:56'),(64,3,31,'i lost it somewhere','2016-09-27 14:11:24','2016-09-27 14:11:24'),(65,4,33,'sdfaasdffsda','2016-09-27 14:48:30','2016-09-27 14:48:30'),(66,8,25,'i hate agile','2016-09-27 16:06:53','2016-09-27 16:06:53'),(67,9,34,'I love landscape photography.','2016-09-27 16:25:16','2016-09-27 16:25:16');
/*!40000 ALTER TABLE `quotes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-27 16:29:04
