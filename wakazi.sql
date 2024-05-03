-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: localhost    Database: wakaziworks
-- ------------------------------------------------------
-- Server version	8.0.36-0ubuntu0.22.04.1

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
-- Table structure for table `ArtisanProducts`
--

DROP TABLE IF EXISTS `ArtisanProducts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ArtisanProducts` (
  `ProductID` int NOT NULL AUTO_INCREMENT,
  `artisan_id` int DEFAULT NULL,
  `ProductName` varchar(255) DEFAULT NULL,
  `SupplierID` int DEFAULT NULL,
  `CategoryID` int DEFAULT NULL,
  `Unit` varchar(100) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `ApprovalStatus` enum('pending','approved','rejected') DEFAULT 'pending',
  PRIMARY KEY (`ProductID`),
  KEY `artisan_id` (`artisan_id`),
  CONSTRAINT `ArtisanProducts_ibfk_1` FOREIGN KEY (`artisan_id`) REFERENCES `artisans` (`artisan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ArtisanProducts`
--

LOCK TABLES `ArtisanProducts` WRITE;
/*!40000 ALTER TABLE `ArtisanProducts` DISABLE KEYS */;
INSERT INTO `ArtisanProducts` VALUES (1,10,'dasdsa',1,1,'1',1.00,'pending'),(2,11,'Bangles',1,1,'23',34.00,'pending'),(3,12,'Flower vases',0,0,'0',1580.00,'pending');
/*!40000 ALTER TABLE `ArtisanProducts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Categories`
--

DROP TABLE IF EXISTS `Categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Categories` (
  `CategoryID` int NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(100) NOT NULL,
  `Description` text,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Categories`
--

LOCK TABLES `Categories` WRITE;
/*!40000 ALTER TABLE `Categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `Categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Counties`
--

DROP TABLE IF EXISTS `Counties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Counties` (
  `CountyID` int NOT NULL AUTO_INCREMENT,
  `CountyName` varchar(100) NOT NULL,
  `RegionID` int DEFAULT NULL,
  PRIMARY KEY (`CountyID`),
  KEY `RegionID` (`RegionID`),
  CONSTRAINT `Counties_ibfk_1` FOREIGN KEY (`RegionID`) REFERENCES `Region` (`RegionID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Counties`
--

LOCK TABLES `Counties` WRITE;
/*!40000 ALTER TABLE `Counties` DISABLE KEYS */;
/*!40000 ALTER TABLE `Counties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Employees`
--

DROP TABLE IF EXISTS `Employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Employees` (
  `EmployeeID` int NOT NULL AUTO_INCREMENT,
  `LastName` varchar(100) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `BirthDate` date DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `Notes` text,
  PRIMARY KEY (`EmployeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Employees`
--

LOCK TABLES `Employees` WRITE;
/*!40000 ALTER TABLE `Employees` DISABLE KEYS */;
/*!40000 ALTER TABLE `Employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `OrderDetails`
--

DROP TABLE IF EXISTS `OrderDetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `OrderDetails` (
  `OrderDetailID` int NOT NULL AUTO_INCREMENT,
  `OrderID` int DEFAULT NULL,
  `ProductID` int DEFAULT NULL,
  `UnitPrice` decimal(10,2) NOT NULL,
  `Quantity` int NOT NULL,
  `Discount` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`OrderDetailID`),
  KEY `OrderID` (`OrderID`),
  KEY `ProductID` (`ProductID`),
  CONSTRAINT `OrderDetails_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `Orders` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `OrderDetails_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `Products` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `OrderDetails`
--

LOCK TABLES `OrderDetails` WRITE;
/*!40000 ALTER TABLE `OrderDetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `OrderDetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Orders`
--

DROP TABLE IF EXISTS `Orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Orders` (
  `OrderID` int NOT NULL AUTO_INCREMENT,
  `CustomerID` int DEFAULT NULL,
  `EmployeeID` int DEFAULT NULL,
  `OrderDate` date DEFAULT NULL,
  `RequiredDate` date DEFAULT NULL,
  `ShippedDate` date DEFAULT NULL,
  `ShipperID` int DEFAULT NULL,
  `Freight` decimal(10,2) DEFAULT NULL,
  `ShipName` varchar(100) DEFAULT NULL,
  `ShipAddress` varchar(255) DEFAULT NULL,
  `ShipCity` varchar(100) DEFAULT NULL,
  `ShipPostalCode` varchar(20) DEFAULT NULL,
  `ShipCountry` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`OrderID`),
  KEY `EmployeeID` (`EmployeeID`),
  KEY `ShipperID` (`ShipperID`),
  CONSTRAINT `Orders_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `Employees` (`EmployeeID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `Orders_ibfk_2` FOREIGN KEY (`ShipperID`) REFERENCES `Shippers` (`ShipperID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Orders`
--

LOCK TABLES `Orders` WRITE;
/*!40000 ALTER TABLE `Orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `Orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Products`
--

DROP TABLE IF EXISTS `Products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Products` (
  `ProductID` int NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `SupplierID` int DEFAULT NULL,
  `CategoryID` int DEFAULT NULL,
  `Unit` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT '0',
  `ApprovalStatus` enum('pending','approved') COLLATE utf8mb4_general_ci DEFAULT 'approved',
  PRIMARY KEY (`ProductID`),
  KEY `SupplierID` (`SupplierID`),
  KEY `CategoryID` (`CategoryID`),
  KEY `idx_category_approval` (`CategoryID`,`ApprovalStatus`),
  CONSTRAINT `Products_ibfk_1` FOREIGN KEY (`SupplierID`) REFERENCES `Suppliers` (`SupplierID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `Products_ibfk_2` FOREIGN KEY (`CategoryID`) REFERENCES `Categories` (`CategoryID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Products`
--

LOCK TABLES `Products` WRITE;
/*!40000 ALTER TABLE `Products` DISABLE KEYS */;
/*!40000 ALTER TABLE `Products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Region`
--

DROP TABLE IF EXISTS `Region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Region` (
  `RegionID` int NOT NULL AUTO_INCREMENT,
  `RegionDescription` varchar(255) NOT NULL,
  PRIMARY KEY (`RegionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Region`
--

LOCK TABLES `Region` WRITE;
/*!40000 ALTER TABLE `Region` DISABLE KEYS */;
/*!40000 ALTER TABLE `Region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Shippers`
--

DROP TABLE IF EXISTS `Shippers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Shippers` (
  `ShipperID` int NOT NULL AUTO_INCREMENT,
  `ShipperName` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Phone` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`ShipperID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Shippers`
--

LOCK TABLES `Shippers` WRITE;
/*!40000 ALTER TABLE `Shippers` DISABLE KEYS */;
/*!40000 ALTER TABLE `Shippers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Suppliers`
--

DROP TABLE IF EXISTS `Suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Suppliers` (
  `SupplierID` int NOT NULL AUTO_INCREMENT,
  `SupplierName` varchar(255) NOT NULL,
  `ContactName` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `PostalCode` varchar(20) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `Phone` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`SupplierID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Suppliers`
--

LOCK TABLES `Suppliers` WRITE;
/*!40000 ALTER TABLE `Suppliers` DISABLE KEYS */;
/*!40000 ALTER TABLE `Suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` enum('sa','pm','sm','m') NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'admin@wakazi.com','$2y$10$PsOPv05xX2Hp1HlUTcvQZuLSqpzc2lo5BCrY7FnjB.h5h8XuNdxNK','Super Admin','sa'),(2,'productmanager@wakazi.com','$2y$10$r0VQX5r/QSMD8xYlbYkLB.rVHQ3aHM2wr/KVUuHVdOXwEbKydIbtK','Product Manager','pm'),(3,'hexanetsystems@wakazi.com','$2y$10$dpYaaJJ4rZGy7IOlVW1NaOb8Nhsyq48Nmxaj9c11AbvHcINhq7JPW','Super Manager','sm'),(4,'manager@wakazi.com','$2y$10$0boFK2jnDc2PDv53tr.zLOZN8gqof/cfHof7NWuXmnAwDDUQB6Et2','Manager','m');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artisans`
--

DROP TABLE IF EXISTS `artisans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `artisans` (
  `artisan_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_image` varchar(255) DEFAULT 'default.jpg',
  PRIMARY KEY (`artisan_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artisans`
--

LOCK TABLES `artisans` WRITE;
/*!40000 ALTER TABLE `artisans` DISABLE KEYS */;
INSERT INTO `artisans` VALUES (1,'skeeperloyaltie','flipsgodfrey@gmail.com','$2y$10$bWisiFlSLxY.5pvR4mvGIuRihNQeYoc4mDvXlsAnQV8Qbfjpf/rnS','2024-04-16 00:28:42','default.jpg'),(5,'skeeperloyaltie','sk33l0y4l0y4lt14@gmail.com','$2y$10$4CCM3mPubZlPXD6p/0NSUe20iYCi57ktIPmM6x4SgbIJplfkJaGES','2024-04-16 00:32:28','default.jpg'),(6,'skeeperloyaltie','flipsgodfrey1@gmail.com','$2y$10$pnaVIMmS6NiMCyONI/sODu4BnQBlQEyGSS0HjBswnqcCjf4H0cw5K','2024-04-16 00:33:41','default.jpg'),(7,'skeeperloyaltie','flipsgodfrey12@gmail.com','$2y$10$/2Aj6v0k78.9o8o5tnenKeqMoFIVJS6PYg8BgeG36ljoLMGRJ40r6','2024-04-16 00:34:32','default.jpg'),(8,'James','james@gmail.com','$2y$10$CtJq08NH0eUhYiEAEol/ae3QbZL7trk0txgUTEh743BX8cQqP6m.W','2024-04-16 01:34:44','31535.png'),(9,'Steve','hexanetsystems@gmail.com','$2y$10$BfA11vsYZB2Z/DeL64TZRuETOd0Ko7shU19CspoulDz9oRyb/pWPG','2024-04-16 13:20:15','default.jpg'),(10,'ArtisanX','artisan@gmail.com','$2y$10$W04cNfjYfm3pDo6qcngEWO6XY5FbOJA.CEH0IK9JOcar..gDew9hG','2024-04-30 08:21:17','default.jpg'),(11,'Joel Muhendi','joelmuhendi@gmail.com','$2y$10$8plv7LHq.dcjzmLKnbpHouH.4SQ2QPngvHUPaM9RjTyubnEzArzEG','2024-04-30 13:15:13','default.jpg'),(12,'Jaffa Traders','jaffatraders@gmail.com','$2y$10$.hSud0VN3taotv1j8pgJGeNCIJp7nBpfArqtcY.F70jD8MtMBnH6y','2024-04-30 13:42:19','default.jpg');
/*!40000 ALTER TABLE `artisans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `customer_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_image` varchar(255) DEFAULT 'default.jpg',
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'freaks','freaks@gmail.com','$2y$10$XEKQwsuM5oeUME5lnU930.p929mmu5IhB1xaznt6uzQwc5Eb5UxgK','2024-04-20 12:34:40','default.jpg'),(2,'mary wairimu','marywairimu@gmail.com','$2y$10$yM4WOZCWAV72aHAPsa9dCOsbsRZnZMGV4ArDWUEa52KfUGKZKA2c.','2024-04-30 13:41:49','default.jpg'),(3,'james','james@gmail.com','$2y$10$eOGnD7/d.oEvM8sJ/2MWYOYitmFCxmSrti2Z/vcrt1kivx0CNcEbW','2024-04-30 14:13:12','default.jpg'),(4,'Abiollagh','abiolla@gmail.com','$2y$10$d9uD4vF2e.IugVYJZVoKKeWa5l6KwMni2AJt6NwUe9DgoRzCFazs2','2024-04-30 14:21:54','default.jpg'),(5,'Nree','jaffatraders@gmail.com','$2y$10$gtWqEc7iYpxzgRhuQSPb2ObCVjlMN9Xu2Fd5quC8bbRwy1a3II6i.','2024-05-02 06:59:45','default.jpg');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `featured_products`
--

DROP TABLE IF EXISTS `featured_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `featured_products` (
  `featured_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `featured_date` date DEFAULT NULL,
  PRIMARY KEY (`featured_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `featured_products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `Products` (`ProductID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `featured_products`
--

LOCK TABLES `featured_products` WRITE;
/*!40000 ALTER TABLE `featured_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `featured_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` char(1) NOT NULL DEFAULT 'c',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'james','james@gmail.com','$2y$10$eOGnD7/d.oEvM8sJ/2MWYOYitmFCxmSrti2Z/vcrt1kivx0CNcEbW','c','2024-04-30 14:13:12'),(2,'Steve','hexanetsystems@gmail.com','$2y$10$fy7mx7gblsdCFH2mSemw..VJnr38k/nwnwTMdfbGKSxDRv2xYUYcq','a','2024-04-16 13:20:15'),(3,'freaks','freaks@gmail.com','$2y$10$c1JjFs/sFcYFcVR4KMTfVOWxWHmxZoXU6EOiBRhSJVbFbhY4po2OK','c','2024-04-20 12:34:40'),(4,'Abiolla','abiollagh@gmail.com','$2y$10$WUc6mALdXVmeomlglZrO9.6ukQ4ZRrqSM0dfflP9G.xNlbxZXJ9fC','c','2024-04-26 16:21:05'),(6,'func','func@gmail.com','$2y$10$kMVink7PwMItUUSUHQe4a.XbUrr8ZKR9vLSuW6i8ymmhZGm47n0ei','c','2024-04-21 10:10:44'),(7,'Ret','ret@gmail.com','$2y$10$TOA99XwM0YhctC02y56Tv.aouQUrQt4OSheSIxcyWDJX63WjxkBFu','c','2024-04-21 10:26:44'),(9,'Hello','hello@gmail.com','$2y$10$mVUD9dhA11z/IRFDoza..eSu4PAbK1JzsJnIImcy/7X6epQBu2DDe','c','2024-04-22 05:23:50'),(10,'New User','abiolla.james@yahoo.com','$2y$10$ykpWcZH8ibc7CvvZvbtTUOlNXZMsRz38QevegWYj08XfZXS1SYovy','c','2024-04-22 05:25:20'),(11,'admin','admin@gmail.com','$2y$10$Nb0ewl8bM4jyU3xXmLHg1eQhb7l55ml3pqeEEpTu99LokrpjKW0B.','c','2024-04-26 07:30:17'),(12,'Abiollagh','abiolla@gmail.com','$2y$10$d9uD4vF2e.IugVYJZVoKKeWa5l6KwMni2AJt6NwUe9DgoRzCFazs2','c','2024-04-30 14:21:54'),(13,'Godfrey','godfrey@gmail.com','$2y$10$p2A9rn5UmecMfQlUGTN4GOY/n.sEQHCfqnJjHPfq1WKRfNZ9rDDzS','c','2024-04-26 17:19:22'),(14,'Godfrey gudah','gudahgodfrey@gmail.com','$2y$10$b7va863v8T9WQ2MLtCt7uu5BpNHOG/tFqVszgwEJIbU99Eq3PyeBG','c','2024-04-26 17:20:40'),(16,'Oluoch','jamesabiolla@gmail.com','$2y$10$ss6LXiw6n.wQHuytCf1fvuN7Seadsce887gTdJCFp49dTEmxgBKUK','c','2024-04-26 17:22:25'),(17,'ArtisanX','artisan@gmail.com','$2y$10$yNjAj7QDUMCMOLjqYfo2gOJ9BeCjSQQqRxC2I0JFNUSjEe5SC4IcW','a','2024-04-30 08:21:17'),(18,'Joel Muhendi','joelmuhendi@gmail.com','$2y$10$9wKosb6wxolx9HPkdAU4beRb/l1FyUN/Q4c0MJGTqXEhkmInLYj52','a','2024-04-30 13:15:13'),(19,'mary wairimu','marywairimu@gmail.com','$2y$10$yM4WOZCWAV72aHAPsa9dCOsbsRZnZMGV4ArDWUEa52KfUGKZKA2c.','c','2024-04-30 13:41:49'),(20,'Nree','jaffatraders@gmail.com','$2y$10$gtWqEc7iYpxzgRhuQSPb2ObCVjlMN9Xu2Fd5quC8bbRwy1a3II6i.','c','2024-05-02 06:59:45');
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

-- Dump completed on 2024-05-03 14:42:56
