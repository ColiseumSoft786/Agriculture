-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: assignment
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
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `UserName` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `AccountType` int(11) NOT NULL,
  `AccountStatus` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Email_UNIQUE` (`Email`),
  UNIQUE KEY `UserName_UNIQUE` (`UserName`),
  UNIQUE KEY `AccountType_UNIQUE` (`AccountType`),
  UNIQUE KEY `AccountStatus_UNIQUE` (`AccountStatus`),
  KEY `Asgmnt_Acnt_Un_Indx` (`UserName`),
  KEY `Asgmnt_Acnt_Em_Indx` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forgetpassword`
--

DROP TABLE IF EXISTS `forgetpassword`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forgetpassword` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Account_id` int(11) NOT NULL,
  `ForgetKey` varchar(45) NOT NULL,
  `ExpireDate` varchar(45) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`),
  UNIQUE KEY `Account_id_UNIQUE` (`Account_id`),
  CONSTRAINT `AccountId` FOREIGN KEY (`Id`) REFERENCES `accounts` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forgetpassword`
--

LOCK TABLES `forgetpassword` WRITE;
/*!40000 ALTER TABLE `forgetpassword` DISABLE KEYS */;
/*!40000 ALTER TABLE `forgetpassword` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_events`
--

DROP TABLE IF EXISTS `main_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `main_events` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `StartingTimeDate` varchar(45) DEFAULT NULL,
  `EndingTimeDate` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_events`
--

LOCK TABLES `main_events` WRITE;
/*!40000 ALTER TABLE `main_events` DISABLE KEYS */;
/*!40000 ALTER TABLE `main_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `select_events`
--

DROP TABLE IF EXISTS `select_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `select_events` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `EventID` varchar(45) NOT NULL,
  `PaymentMethod` varchar(45) DEFAULT NULL,
  UNIQUE KEY `Id_UNIQUE` (`Id`),
  UNIQUE KEY `EventID_UNIQUE` (`EventID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `select_events`
--

LOCK TABLES `select_events` WRITE;
/*!40000 ALTER TABLE `select_events` DISABLE KEYS */;
INSERT INTO `select_events` VALUES (3,'Mirza',NULL),(5,'Mirza1',NULL),(7,'Mirza3',NULL),(9,'Mirza4',NULL);
/*!40000 ALTER TABLE `select_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_events`
--

DROP TABLE IF EXISTS `sub_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_events` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `StartingTimeDate` varchar(45) DEFAULT NULL,
  `EndingTimeDate` varchar(45) DEFAULT NULL,
  `MainEventID` varchar(45) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`),
  CONSTRAINT `MainEventID` FOREIGN KEY (`Id`) REFERENCES `main_events` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_events`
--

LOCK TABLES `sub_events` WRITE;
/*!40000 ALTER TABLE `sub_events` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_events` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-27 19:00:55
