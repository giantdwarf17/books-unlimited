-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: localhost    Database: bhoehn
-- ------------------------------------------------------
-- Server version	8.0.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `TBL_AUTHORS`
--

DROP TABLE IF EXISTS `TBL_AUTHORS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TBL_AUTHORS` (
  `Author_ID` int NOT NULL AUTO_INCREMENT,
  `Author_Name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Author_ID`),
  KEY `Author_ID` (`Author_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1012 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TBL_AUTHORS`
--

LOCK TABLES `TBL_AUTHORS` WRITE;
/*!40000 ALTER TABLE `TBL_AUTHORS` DISABLE KEYS */;
INSERT INTO `TBL_AUTHORS` VALUES (1001,'George Orwell'),(1002,'Elie Wiesel'),(1003,'Mary Shelley'),(1004,'Frank Herbert'),(1005,'Ray Bradbury'),(1006,'Alan Moore'),(1007,'Stephen King'),(1008,'Roald Dahl');
/*!40000 ALTER TABLE `TBL_AUTHORS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TBL_BOOKS`
--

DROP TABLE IF EXISTS `TBL_BOOKS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TBL_BOOKS` (
  `Book_ID` int NOT NULL AUTO_INCREMENT,
  `Author_ID` int DEFAULT NULL,
  `Publisher_ID` int DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `ISBN` varchar(255) DEFAULT NULL,
  `Genre` varchar(255) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Cost` decimal(10,2) DEFAULT NULL,
  `Stock` int DEFAULT NULL,
  `Rating` double DEFAULT NULL,
  PRIMARY KEY (`Book_ID`),
  KEY `FK_Author_ID` (`Author_ID`),
  KEY `FK_Publisher_ID` (`Publisher_ID`),
  CONSTRAINT `FK_Author_ID` FOREIGN KEY (`Author_ID`) REFERENCES `TBL_AUTHORS` (`Author_ID`) ON UPDATE CASCADE,
  CONSTRAINT `FK_Publisher_ID` FOREIGN KEY (`Publisher_ID`) REFERENCES `TBL_PUBLISHERS` (`Publisher_ID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1013 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TBL_BOOKS`
--

LOCK TABLES `TBL_BOOKS` WRITE;
/*!40000 ALTER TABLE `TBL_BOOKS` DISABLE KEYS */;
INSERT INTO `TBL_BOOKS` VALUES (1001,1001,1001,'1984','0451524934','Science Fiction',9.99,7.55,10,4.8),(1002,1002,1002,'Night','0374500010','Biography',9.55,6.33,4,4.9),(1003,1003,1004,'Frankenstein','1593080050','Science Fiction',12.99,9.99,11,4.9),(1004,1008,1003,'Matilda','0142410373','Fantasy',7.55,5.25,3,4.7),(1005,1004,1005,'Dune','0441172717','Science Fiction',9.99,7.55,20,4.9),(1006,1005,1006,'The Martian Chronicles','1451678193','Science Fiction',11.99,8.66,12,3.9),(1007,1006,1007,'Watchmen','0446386898','Graphic Novel',14.99,11.99,7,4.1),(1008,1005,1006,'Fahrenheit 451','0345342968','Science Fiction',5.99,3.55,8,4.2),(1009,1007,1008,'Carrie','1416524304','Horror',6.55,4.95,3,4.1);
/*!40000 ALTER TABLE `TBL_BOOKS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TBL_CUSTOMERS`
--

DROP TABLE IF EXISTS `TBL_CUSTOMERS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TBL_CUSTOMERS` (
  `Customer_ID` int NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(255) DEFAULT NULL,
  `Last_Name` varchar(255) DEFAULT NULL,
  `Email_Address` varchar(255) DEFAULT NULL,
  `Phone_Number` int DEFAULT NULL,
  `Address_Line1` varchar(255) DEFAULT NULL,
  `Address_Line2` varchar(255) DEFAULT NULL,
  `Address_City` varchar(255) DEFAULT NULL,
  `Address_State` varchar(50) DEFAULT NULL,
  `Address_ZipCode` int DEFAULT NULL,
  PRIMARY KEY (`Customer_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1006 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TBL_CUSTOMERS`
--

LOCK TABLES `TBL_CUSTOMERS` WRITE;
/*!40000 ALTER TABLE `TBL_CUSTOMERS` DISABLE KEYS */;
INSERT INTO `TBL_CUSTOMERS` VALUES (1001,'Ryan','Munnoz','ryan@example.org',555555555,'123 Main Street',NULL,'Akron','OH',44322),(1002,'Deana','Morris','dmorris@example.org',333333333,'444 Sesame Street',NULL,'Kent','OH',44242),(1003,'Christyne','Hubbard','hubbard_c@example.org',111111111,'52 Candy Lane','Apt #1','Akron','OH',44322),(1004,'Jim','Smith','j_smith_1@example.org',1112223333,'74 High Street',NULL,'Columbus','OH',43204),(1005,'Pearl','Day','pday@example.org',555555555,'456 North Avenue','Unit #12','Columbus','OH',43204);
/*!40000 ALTER TABLE `TBL_CUSTOMERS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TBL_ORDERS`
--

DROP TABLE IF EXISTS `TBL_ORDERS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TBL_ORDERS` (
  `Order_ID` int NOT NULL AUTO_INCREMENT,
  `Customer_ID` int DEFAULT NULL,
  `Online_Order` bit(1) DEFAULT NULL,
  `Order_Date` date DEFAULT NULL,
  PRIMARY KEY (`Order_ID`),
  KEY `Customer_ID` (`Customer_ID`),
  CONSTRAINT `FK_Customer_ID` FOREIGN KEY (`Customer_ID`) REFERENCES `TBL_CUSTOMERS` (`Customer_ID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1010 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TBL_ORDERS`
--

LOCK TABLES `TBL_ORDERS` WRITE;
/*!40000 ALTER TABLE `TBL_ORDERS` DISABLE KEYS */;
INSERT INTO `TBL_ORDERS` VALUES (1001,1005,_binary '','2016-03-05'),(1002,1002,_binary '','2016-04-08'),(1003,1001,_binary '','2016-05-01'),(1004,1002,_binary '','2016-05-01'),(1005,1001,_binary '','2016-05-11'),(1006,1005,_binary '','2016-06-07'),(1007,1003,_binary '','2016-06-08'),(1008,1003,_binary '','2016-06-08'),(1009,1004,_binary '','2016-06-12');
/*!40000 ALTER TABLE `TBL_ORDERS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TBL_ORDER_ITEMS`
--

DROP TABLE IF EXISTS `TBL_ORDER_ITEMS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TBL_ORDER_ITEMS` (
  `Order_ID` int NOT NULL,
  `Book_ID` int NOT NULL,
  `Quantity` int DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`Order_ID`,`Book_ID`),
  KEY `Product_ID` (`Book_ID`),
  CONSTRAINT `FK_Book_ID` FOREIGN KEY (`Book_ID`) REFERENCES `TBL_BOOKS` (`Book_ID`) ON UPDATE CASCADE,
  CONSTRAINT `FK_Order_ID` FOREIGN KEY (`Order_ID`) REFERENCES `TBL_ORDERS` (`Order_ID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TBL_ORDER_ITEMS`
--

LOCK TABLES `TBL_ORDER_ITEMS` WRITE;
/*!40000 ALTER TABLE `TBL_ORDER_ITEMS` DISABLE KEYS */;
INSERT INTO `TBL_ORDER_ITEMS` VALUES (1001,1007,1,19.99),(1002,1003,1,6.99),(1002,1004,1,8.99),(1002,1005,1,7.99),(1003,1001,1,9.99),(1003,1002,1,9.99),(1003,1003,1,5.99),(1004,1008,1,3.99),(1004,1009,1,5.99),(1005,1005,1,7.99),(1006,1001,1,9.99),(1006,1002,1,9.99),(1007,1006,1,5.99),(1008,1005,1,7.99),(1008,1007,1,19.99),(1008,1008,1,3.99),(1008,1009,1,5.99),(1009,1005,1,8.99);
/*!40000 ALTER TABLE `TBL_ORDER_ITEMS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TBL_PUBLISHERS`
--

DROP TABLE IF EXISTS `TBL_PUBLISHERS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TBL_PUBLISHERS` (
  `Publisher_ID` int NOT NULL AUTO_INCREMENT,
  `Publisher_Name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Publisher_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1009 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TBL_PUBLISHERS`
--

LOCK TABLES `TBL_PUBLISHERS` WRITE;
/*!40000 ALTER TABLE `TBL_PUBLISHERS` DISABLE KEYS */;
INSERT INTO `TBL_PUBLISHERS` VALUES (1001,'Signet Classic'),(1002,'Hill and Wang'),(1003,'Puffin Books'),(1004,'Barnes & Noble Classics'),(1005,'Ace'),(1006,'Simon & Schuster'),(1007,'DC Comics'),(1008,'Pocket');
/*!40000 ALTER TABLE `TBL_PUBLISHERS` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-01 17:38:24
