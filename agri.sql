-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: agriculture
-- ------------------------------------------------------
-- Server version	5.7.14-log

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
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Answer` text,
  `Name` varchar(45) DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  `Approved` int(11) DEFAULT NULL,
  `Question` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_question_answer_idx` (`Question`),
  CONSTRAINT `fk_question_answer` FOREIGN KEY (`Question`) REFERENCES `question` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES (1,'jhsdfashdfkjhk','jdshfkasdhf','2018-03-08 19:47:32',1,5),(2,'jafhkjadshf adsflsh fksjfhdfhadf adskfj \r\n','Here is my name','2018-03-09 12:21:20',1,5),(8,'kjadsfashdf;\r\n','aasgdfhk','2018-03-09 12:31:40',1,5),(9,'hjkahsdfjhasdf\r\n','absdfhjk','2018-03-09 12:34:00',1,2),(10,'asdkljfasdf','asjdlkfj','2018-03-12 10:55:49',1,6);
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (3,'Karachi'),(4,'Faisalabad'),(5,'Lahore'),(6,'Sargodha'),(7,'Patiyala');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `info`
--

DROP TABLE IF EXISTS `info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `info` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Mandi` varchar(200) DEFAULT NULL,
  `Agent` varchar(200) DEFAULT NULL,
  `Company` varchar(200) DEFAULT NULL,
  `Phone` varchar(200) DEFAULT NULL,
  `Traded` varchar(200) DEFAULT NULL,
  `Details` varchar(200) DEFAULT NULL,
  `Info` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `subcatinfo_catinfo_fk_idx` (`Info`),
  CONSTRAINT `info_infobank_fk` FOREIGN KEY (`Info`) REFERENCES `infobank` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info`
--

LOCK TABLES `info` WRITE;
/*!40000 ALTER TABLE `info` DISABLE KEYS */;
INSERT INTO `info` VALUES (2,'kahsdfjh ','jahsdjfh ','jakshdfh','jhasdhf','asjdhklSHDFJ','<p>JKSHDFKLADS FSDF SKJFH SFHhasdf askjdfh sadkfjh asdfkjfhl asfhas djf asfk</p>\r\n',1);
/*!40000 ALTER TABLE `info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `infobank`
--

DROP TABLE IF EXISTS `infobank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `infobank` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `infobank`
--

LOCK TABLES `infobank` WRITE;
/*!40000 ALTER TABLE `infobank` DISABLE KEYS */;
INSERT INTO `infobank` VALUES (1,'Arithi'),(4,'New Info Bank');
/*!40000 ALTER TABLE `infobank` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (3,'saag'),(4,'Matar'),(5,'Dhaniya'),(7,'Abuzar'),(8,'Ahmad'),(9,'Akram'),(10,'Mushtaq'),(11,'Tomato');
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `link`
--

DROP TABLE IF EXISTS `link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `link` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) DEFAULT NULL,
  `Path` text,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `link`
--

LOCK TABLES `link` WRITE;
/*!40000 ALTER TABLE `link` DISABLE KEYS */;
INSERT INTO `link` VALUES (1,'Coliseum Soft','http://coliseumsoft.org'),(3,'My important Link','http://tanksw.com/piano-tiles/');
/*!40000 ALTER TABLE `link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Image` varchar(200) DEFAULT NULL,
  `Details` text,
  `Name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (2,'bundles/Images/030520180236180318.jpg','<p>The&nbsp;filter works as the&nbsp;PHP function for arrays and&nbsp;for strings with a fallback to If the start is non-negative, the sequence will start at that start in the variable. If start is negative, the sequence will start that far from the end of the variable. If length is given and is positive, then the sequence will have up to that many elements in it. If the variable is shorter than the length, then only the available variable elements will be present. If length is given and is negative then the sequence will stop that many elements from the end of the variable. If it is omitted, then the sequence will have everything from offset up until the end of the variable.</p>\r\n','jadshfkasdhfj'),(3,'bundles/Images/030620181148250325.jpg','<p>shdf sdf sflsk fsdlf dsl fsdlfsdfdsffksdfsdlfdfjakldjaskldjkjadshfkewhtoshos gfug ogu lvu sdfo adsifuasdgfp dspfuasdofjadslh dslfyof gsdlfh dskfhask ghsldkfh adsfjdsl gf dslfhdskfajfghsklhgkdfshfjdfsgs fs fsjgh slghs dffldsfh sfh</p>\r\n','hsdfjhsd f fksdkfh sdkfjh sfkj kasdf k sf');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pub`
--

DROP TABLE IF EXISTS `pub`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pub` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  `Details` text,
  `Document` varchar(500) DEFAULT NULL,
  `Pub` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `catpub_subcatpub_fk_idx` (`Pub`),
  CONSTRAINT `pub_publication_fk` FOREIGN KEY (`Pub`) REFERENCES `publications` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pub`
--

LOCK TABLES `pub` WRITE;
/*!40000 ALTER TABLE `pub` DISABLE KEYS */;
INSERT INTO `pub` VALUES (4,'Articals ','My Artical :p Oh Yeah ','bundles/documents/030220181237160316.jpg',2),(7,'Articals jhasdhfsdf','<p>jkhskfh sflf fl hlasfa</p>\r\n','bundles/documents/030620181230440344.docx',2),(8,'Articals','<p>kasjdfkl asdflkasj dflkdsj f</p>\r\n',NULL,2),(9,'Articalasdfks fdsf','<p>klajshdf slafk fj aslfkj sdf&nbsp;</p>\r\n',NULL,2),(10,'Thesisa sadfsadf ','<p>,masdfsd afjshdf skdfh dsf</p>\r\n',NULL,1),(11,'jashdf safasjh fasdf','<p>jahsd fsdhf askfksdfkh sdf</p>\r\n',NULL,1);
/*!40000 ALTER TABLE `pub` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publications`
--

DROP TABLE IF EXISTS `publications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publications` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publications`
--

LOCK TABLES `publications` WRITE;
/*!40000 ALTER TABLE `publications` DISABLE KEYS */;
INSERT INTO `publications` VALUES (1,'Thesis'),(2,'Articals'),(10,'My Public'),(11,'asydu');
/*!40000 ALTER TABLE `publications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Question` text,
  `Name` varchar(45) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Approved` int(11) DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (2,'My Another Question','jhsdfj','asdlkfj2hjkkl@kjshdf.com',1,'2018-03-07 12:58:21'),(3,'jahsdjfh k','jhasjdkfh ','ajshfjhjh',1,'2018-03-07 16:59:17'),(4,'uwefkjyqjhg``','kjhwekjfh','kjhdgr',1,'2018-03-08 12:56:45'),(5,'My Question is my question ?','Abuzar Mughal','abuzar2407@gmail.com',1,'2018-03-08 17:50:50'),(6,'ahskjf aslfasjlfk sfsjf sfslaf; asf aslfsfsafsafsafsj fsdlfkj asfsafksldfj sfklsjdf asdfjasdf lasdjf aslkfjasldfkj asfj sdklfjs dlfkjs dlfkjsdfkls dfklsjf askljfs dklfj sdkflj dsklfjs dfklj sdklfjdsklfjasdfkldsf sdfjsdfkl sdkl fskfjdsklfdskfskldfjskldfjasklfjaskldjf','jasdf','jsdfsaf',1,'2018-03-09 12:50:51'),(7,'hhadshkjHASK','sdafhaskjfh','ahsdfkh',1,'2018-03-12 10:55:11');
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rates`
--

DROP TABLE IF EXISTS `rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rates` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Item` int(11) DEFAULT NULL,
  `City` int(11) DEFAULT NULL,
  `Rate` int(11) DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `rate_city_fk_idx` (`City`),
  KEY `rate_item_fk_idx` (`Item`),
  CONSTRAINT `rate_city_fk` FOREIGN KEY (`City`) REFERENCES `city` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `rate_item_fk` FOREIGN KEY (`Item`) REFERENCES `item` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rates`
--

LOCK TABLES `rates` WRITE;
/*!40000 ALTER TABLE `rates` DISABLE KEYS */;
INSERT INTO `rates` VALUES (1,5,3,12347,'2018-03-16 11:26:14'),(5,3,3,7877,'2018-03-15 12:50:07'),(6,9,7,1233,'2018-03-07 14:10:01'),(7,9,7,3441,'2018-03-01 14:01:56'),(8,7,4,37283,'2018-03-14 14:02:28'),(9,9,7,2131,'2018-03-20 14:07:50'),(10,9,7,344,'2018-03-12 14:08:07'),(11,9,7,453,'2018-03-30 14:10:30'),(12,11,5,1200,'2018-03-23 12:20:21');
/*!40000 ALTER TABLE `rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slider` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `Path` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider`
--

LOCK TABLES `slider` WRITE;
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
INSERT INTO `slider` VALUES (1,'Slider ajsdfhsdhf sf sdf sf','bundles/Images/031820181032440344.jpg'),(2,'jahsdfj ashf askjfh askjfh ','bundles/Images/031820181033580358.jpg');
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','81dc9bdb52d04dc20036dbd8313ed055'),(2,'abuzar','81dc9bdb52d04dc20036dbd8313ed055');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-25 16:08:55
