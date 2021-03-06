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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `alias` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'Barbary F Baer','barb','barbarybaer@sbcglobal.net','8aa99b1f439ff71293e95357bac6fd94','0000-00-00','2016-09-23 11:30:06','2016-09-23 11:30:06'),(4,'Joe','joe','joe@joe.com','8aa99b1f439ff71293e95357bac6fd94','0000-00-00','2016-09-23 11:33:09','2016-09-23 11:33:09'),(5,'Gracia','grace','grace@grace.com','8aa99b1f439ff71293e95357bac6fd94','0000-00-00','2016-09-23 11:33:45','2016-09-23 11:33:45'),(6,'Oliver','oliver','oliver@oliver.com','8aa99b1f439ff71293e95357bac6fd94','0000-00-00','2016-09-23 11:34:23','2016-09-23 11:34:23'),(7,'canine','k9','k9@k9.com','8aa99b1f439ff71293e95357bac6fd94','0000-00-00','2016-09-23 11:39:30','2016-09-23 11:39:30'),(8,'Sara Rizik-Baer','Sara','srizikba@gmail.com','8aa99b1f439ff71293e95357bac6fd94','0000-00-00','2016-09-26 13:32:51','2016-09-26 13:32:51'),(9,'Mark Bobb','mark','mark@abc.com','8aa99b1f439ff71293e95357bac6fd94','0000-00-00','2016-09-27 16:11:50','2016-09-27 16:11:50');
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

-- Dump completed on 2016-09-27 16:29:04
