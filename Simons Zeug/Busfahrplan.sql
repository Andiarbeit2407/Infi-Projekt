-- MariaDB dump 10.19  Distrib 10.5.20-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: db
-- ------------------------------------------------------
-- Server version	10.5.20-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `linie`
--

DROP TABLE IF EXISTS `linie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `linie` (
  `id` int(11) NOT NULL,
  `linienname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `linie`
--

LOCK TABLES `linie` WRITE;
/*!40000 ALTER TABLE `linie` DISABLE KEYS */;
INSERT INTO `linie` VALUES (1,'nope'),(2,'just'),(3,'kill'),(4,'me');
/*!40000 ALTER TABLE `linie` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `haltestelle`
--

DROP TABLE IF EXISTS `haltestelle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `haltestelle` (
  `id` int(11) NOT NULL,
  `haltestellenname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `haltestelle`
--

LOCK TABLES `haltestelle` WRITE;
/*!40000 ALTER TABLE `haltestelle` DISABLE KEYS */;
INSERT INTO `haltestelle` VALUES (1,'I'),(2,'have'),(3,'no'),(4,'idea');
/*!40000 ALTER TABLE `haltestelle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fahrt`
--

DROP TABLE IF EXISTS `fahrt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fahrt` (
  `id` int(11) NOT NULL,
  `linie_id` INT DEFAULT NULL,
  `fahrzeit` TIME DEFAULT NULL,
  PRIMARY KEY (`id`),
      KEY `fk_linie_id` (`linie_id`),
CONSTRAINT `fk_linie_id` FOREIGN KEY (`linie_id`) REFERENCES `linie` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fahrt`
--

LOCK TABLES `fahrt` WRITE;
/*!40000 ALTER TABLE `fahrt` DISABLE KEYS */;
INSERT INTO `fahrt` VALUES (1,1,'06:42'),(2,2,'06:54'),(3,3,'7:13'),(4,4,'7:20');
/*!40000 ALTER TABLE `fahrt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fahrzeit`
--

DROP TABLE IF EXISTS `fahrzeit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fahrzeit` (
  `id` INT(11) NOT NULL,  
  `haltestelle_id` INT DEFAULT NULL,
  `fahrt_id` INT DEFAULT NULL,
  `ankunftszeit` TIME DEFAULT NULL,
  `abfahrtszeit` TIME DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id` (`id`),
  KEY `fk_haltestelle_id` (`haltestelle_id`),
  CONSTRAINT `fk_id` FOREIGN KEY (`id`) REFERENCES `fahrt` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_haltestelle_id` FOREIGN KEY (`haltestelle_id`) REFERENCES `haltestelle` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fahrzeit`
--

LOCK TABLES `fahrzeit` WRITE;
/*!40000 ALTER TABLE `fahrzeit` DISABLE KEYS */;
INSERT INTO `fahrzeit` VALUES (1,1,1,'11:00','12:00'),(2,2,2,'13:00','14:00'),(3,3,3,'15:00','16:00'),(4,4,4,'17:00','18:00');
/*!40000 ALTER TABLE `fahrzeit` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-09 15:29:52
