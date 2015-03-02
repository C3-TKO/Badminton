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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game`
--

LOCK TABLES `game` WRITE;
/*!40000 ALTER TABLE `game` DISABLE KEYS */;
INSERT INTO `game` VALUES (1,1,12,4,21,19),(2,1,9,2,23,21),(3,1,7,3,21,17),(4,1,16,7,21,18),(5,1,8,4,21,16),(6,1,16,2,21,18),(7,1,13,1,21,16),(8,1,12,1,21,19),(9,1,8,13,21,19),(10,1,9,3,21,16),(11,1,3,13,21,14),(12,1,7,4,21,13),(13,2,12,1,21,12),(14,2,9,5,21,19),(15,2,16,14,21,19),(16,2,8,19,21,17),(17,2,7,4,21,8),(18,2,2,17,21,14),(19,2,7,3,21,12),(20,2,10,4,23,21),(21,2,12,19,21,12),(22,2,9,17,21,9),(23,2,2,9,21,16),(24,2,12,5,21,11);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `round`
--

LOCK TABLES `round` WRITE;
/*!40000 ALTER TABLE `round` DISABLE KEYS */;
INSERT INTO `round` VALUES (1,1,'2014-02-06'),(2,1,'2014-02-20');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `season`
--

LOCK TABLES `season` WRITE;
/*!40000 ALTER TABLE `season` DISABLE KEYS */;
INSERT INTO `season` VALUES (1,'Saison 2014'),(2,'Saison 2015');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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

-- Dump completed on 2015-03-02 14:50:28
