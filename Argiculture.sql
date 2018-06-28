-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: agriculture
-- ------------------------------------------------------
-- Server version	5.7.21-log

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
-- Table structure for table `info_desk`
--

DROP TABLE IF EXISTS `info_desk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `info_desk` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `n_id` int(1) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Img` text,
  `Details` text,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info_desk`
--

LOCK TABLES `info_desk` WRITE;
/*!40000 ALTER TABLE `info_desk` DISABLE KEYS */;
INSERT INTO `info_desk` VALUES (2,2,'for 2sads','ttt','1111adasd'),(3,2,'Abdul Manan1212','bundles/062720180350520652.jpg','dasdasdasdasd'),(4,0,'Thesisa sadfsadf ','bundles/062720180334250625.jpg','eqwrwqerqwr');
/*!40000 ALTER TABLE `info_desk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `more`
--

DROP TABLE IF EXISTS `more`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `more` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(7) NOT NULL,
  `Text` text,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Name_UNIQUE` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `more`
--

LOCK TABLES `more` WRITE;
/*!40000 ALTER TABLE `more` DISABLE KEYS */;
INSERT INTO `more` VALUES (1,'Abot','<p>shdf sdf sflsk fsdlf dsl fsdlfsdfdsffksdfsdlfdfjakldjaskldjkjadshfkewhtoshos gfug ogu lvu sdfo adsifuasdgfp dspfuasdofjadslh dslfyof gsdlfh dskfhask ghsldkfh adsfjdsl gf dslfhdskfajfghsklhgkdfshfjdfsgs fs fsjgh slghs dffldsfh sfh</p>\r\n'),(2,'Contatc','New Testing!111bbb11vbb');
/*!40000 ALTER TABLE `more` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-28 13:15:03
