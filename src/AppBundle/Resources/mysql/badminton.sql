-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: badminton
-- ------------------------------------------------------
-- Server version	5.5.38-0ubuntu0.12.04.1

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
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_round` int(11) NOT NULL,
  `id_team_a` int(11) NOT NULL,
  `id_team_b` int(11) NOT NULL,
  `team_a_score` smallint(6) NOT NULL,
  `team_b_score` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_232B318C2B6BAB04` (`id_round`),
  KEY `IDX_232B318C92977BE4` (`id_team_a`),
  KEY `IDX_232B318CB9E2A5E` (`id_team_b`),
  CONSTRAINT `FK_232B318C2B6BAB04` FOREIGN KEY (`id_round`) REFERENCES `round` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_232B318C92977BE4` FOREIGN KEY (`id_team_a`) REFERENCES `team` (`id`),
  CONSTRAINT `FK_232B318CB9E2A5E` FOREIGN KEY (`id_team_b`) REFERENCES `team` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game`
--

LOCK TABLES `game` WRITE;
/*!40000 ALTER TABLE `game` DISABLE KEYS */;
INSERT INTO `game` VALUES (1,1,9,12,21,13),(2,1,4,8,21,18),(3,1,13,21,21,18),(4,1,11,7,21,14),(5,1,7,6,21,10),(6,1,15,16,21,12),(7,1,6,17,22,20),(8,1,1,19,11,21),(9,1,14,3,21,10),(10,1,20,5,21,12),(11,1,18,10,21,15),(12,1,13,18,23,21),(13,2,2,8,17,21),(14,2,9,6,24,22),(15,2,12,20,14,21),(16,2,1,18,15,21),(17,2,7,4,21,12),(18,2,11,16,21,18),(19,2,15,3,21,9),(20,2,13,1,20,22),(21,2,20,12,21,18),(22,2,6,8,11,21),(23,2,2,9,12,21),(24,2,16,15,21,13),(25,2,4,11,15,21),(26,2,3,7,15,21),(27,3,19,7,19,21),(28,3,14,9,21,19),(29,3,13,10,21,15),(30,3,19,7,21,19),(31,3,14,9,21,16),(32,3,13,10,21,11),(33,3,19,7,16,21),(34,3,14,9,21,11),(35,3,13,10,14,21),(36,3,19,7,12,21),(37,3,14,9,21,18),(38,3,13,10,21,17),(39,4,2,16,21,17),(40,4,8,21,17,21),(41,4,18,4,21,14),(42,4,14,1,22,20),(43,4,9,18,21,15),(44,4,6,14,17,21),(45,4,19,7,11,21),(46,4,3,11,8,21),(47,4,9,18,17,21),(48,4,12,5,21,12),(49,4,17,13,12,21),(50,4,1,21,8,21),(51,4,10,13,21,18),(52,4,8,20,21,13),(53,5,10,2,21,15),(54,5,17,1,12,21),(55,5,3,7,6,21),(56,5,14,8,11,21),(57,5,5,12,11,21),(58,5,14,1,21,11),(59,5,10,3,24,22),(60,5,8,2,21,19),(61,5,12,10,21,15),(62,5,17,2,19,21),(63,5,7,5,21,14),(64,6,12,4,21,17),(65,6,1,16,27,29),(66,6,3,7,9,21),(67,6,2,9,21,19),(68,6,13,8,21,16),(69,6,2,16,18,21),(70,6,4,8,21,13),(71,6,1,12,9,21),(72,6,2,9,21,16),(73,6,16,7,17,21),(74,7,3,9,13,21),(75,7,7,17,23,21),(76,7,14,16,21,18),(77,7,4,12,14,21),(78,7,19,1,21,19),(79,7,5,13,11,21),(80,7,7,3,21,17),(81,7,2,8,21,15),(82,7,1,19,21,14),(83,7,13,17,24,26),(84,7,3,10,9,21);
/*!40000 ALTER TABLE `game` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player`
--

DROP TABLE IF EXISTS `player`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player`
--

LOCK TABLES `player` WRITE;
/*!40000 ALTER TABLE `player` DISABLE KEYS */;
INSERT INTO `player` VALUES (1,'Bü'),(2,'David'),(3,'Mike'),(4,'Sandro'),(5,'Thomas'),(6,'Ingo'),(7,'Zaheed');
/*!40000 ALTER TABLE `player` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `round`
--

DROP TABLE IF EXISTS `round`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `round` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_season` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C5EEEA34D6D3EE44` (`id_season`),
  CONSTRAINT `FK_C5EEEA34D6D3EE44` FOREIGN KEY (`id_season`) REFERENCES `season` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `round`
--

LOCK TABLES `round` WRITE;
/*!40000 ALTER TABLE `round` DISABLE KEYS */;
INSERT INTO `round` VALUES (1,1,'2015-01-07'),(2,1,'2015-01-22'),(3,1,'2015-01-29'),(4,1,'2015-02-05'),(5,1,'2015-02-18'),(6,1,'2015-02-26'),(7,1,'2015-03-05');
/*!40000 ALTER TABLE `round` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `season`
--

DROP TABLE IF EXISTS `season`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `season` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `season`
--

LOCK TABLES `season` WRITE;
/*!40000 ALTER TABLE `season` DISABLE KEYS */;
INSERT INTO `season` VALUES (1,'Saison 2015');
/*!40000 ALTER TABLE `season` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_player_a` int(11) NOT NULL,
  `id_player_b` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_combination` (`id_player_a`,`id_player_b`),
  KEY `IDX_C4E0A61FBECE71E6` (`id_player_a`),
  KEY `IDX_C4E0A61F27C7205C` (`id_player_b`),
  CONSTRAINT `FK_C4E0A61F27C7205C` FOREIGN KEY (`id_player_b`) REFERENCES `player` (`id`),
  CONSTRAINT `FK_C4E0A61FBECE71E6` FOREIGN KEY (`id_player_a`) REFERENCES `player` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES (1,1,2,NULL),(2,1,3,NULL),(3,1,4,NULL),(4,1,5,NULL),(5,1,6,NULL),(6,1,7,NULL),(7,2,3,NULL),(8,2,4,NULL),(9,2,5,NULL),(10,2,6,NULL),(11,2,7,NULL),(12,3,4,NULL),(13,3,5,NULL),(14,3,6,NULL),(15,3,7,NULL),(16,4,5,NULL),(17,4,6,NULL),(18,4,7,NULL),(19,5,6,NULL),(20,5,7,NULL),(21,6,7,NULL);
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-06 10:42:22
