-- MySQL dump 10.13  Distrib 5.7.31, for Win64 (x86_64)
--
-- Host: localhost    Database: brand
-- ------------------------------------------------------
-- Server version	5.7.31-log

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'man'),(2,'women');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idUser` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `userName` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `comment` text,
  `status` enum('new','payed','rejected','deleted') NOT NULL DEFAULT 'new',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,2,'2020-12-24 10:12:49','2020-12-24 10:12:49','DartWeider','8-111-222-3333','   comment     ','deleted'),(2,3,'2020-12-24 10:33:20','2020-12-24 10:33:20','yoda','8-777-888-9999','    cccccccccc    ','payed'),(3,4,'2020-12-24 10:39:18','2020-12-24 10:39:18','terminator','8-333-333-5555','  allbeback      ','new');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_product`
--

DROP TABLE IF EXISTS `orders_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders_product` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `orderId` bigint(20) unsigned NOT NULL,
  `productId` bigint(20) unsigned NOT NULL,
  `total` int(10) unsigned DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `productId` (`productId`),
  KEY `orderId` (`orderId`),
  CONSTRAINT `orders_product_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`id`),
  CONSTRAINT `orders_product_ibfk_2` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_product`
--

LOCK TABLES `orders_product` WRITE;
/*!40000 ALTER TABLE `orders_product` DISABLE KEYS */;
INSERT INTO `orders_product` VALUES (1,1,1,1,'2020-12-24 12:30:58','2020-12-24 12:30:58',100.00),(2,1,2,1,'2020-12-24 12:30:58','2020-12-24 12:30:58',110.00),(3,2,1,2,'2020-12-24 12:58:03','2020-12-24 12:58:03',100.00),(4,2,2,1,'2020-12-24 12:58:03','2020-12-24 12:58:03',110.00),(5,2,3,2,'2020-12-24 12:58:03','2020-12-24 12:58:03',120.00),(6,2,4,1,'2020-12-24 12:58:03','2020-12-24 12:58:03',130.00),(7,3,1,1,'2020-12-24 13:39:18','2020-12-24 13:39:18',100.00),(8,3,2,1,'2020-12-24 13:39:18','2020-12-24 13:39:18',110.00),(9,3,3,1,'2020-12-24 13:39:18','2020-12-24 13:39:18',120.00);
/*!40000 ALTER TABLE `orders_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `images` varchar(255) NOT NULL,
  `views` int(11) DEFAULT '0',
  `categoryId` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'shirt','Какое-то описание товара надетое на этом кадре, майка',100.00,'1.png',0,1),(2,'blond','Какое-то описание товара надетое на этом кадре, это блондинка',110.00,'2.png',0,2),(3,'tail','Какое-то описание товара надетое на этом кадре, это чувак с хвостиком',120.00,'3.png',0,1),(4,'brunette','Какое-то описание товара надетое на этом кадре, это брюнетка или шатенка, в общем х.з.',130.00,'4.png',0,2),(5,'peroxid','Какое-то описание товара надетое на этом кадре, это пироксидная',140.00,'5.png',0,2),(6,'hat','Какое-то описание товара надетое на этом кадре, чувак в шляпе',150.00,'6.png',0,1),(7,'pants','Какое-то описание товара надетое на этом кадре, коротенькие штанишки',160.00,'7.png',0,1),(8,'shorts','Какое-то описание товара надетое на этом кадре, шорты',170.00,'8.png',0,1),(9,'sad','Какое-то описание товара надетое на этом кадре, грусный мальчик',180.00,'9.png',0,1),(10,'coat','Какое-то описание товара надетое на этом кадре, пальтишко',190.00,'10.png',0,1),(11,'beard','Какое-то описание товара надетое на этом кадре, бородатый мужик',200.00,'11.png',0,1),(12,'bearded man','Какое-то описание товара надетое на этом кадре, переодетый бородач',210.00,'12.png',0,1);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `review` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idProduct` bigint(20) unsigned NOT NULL,
  `idUser` bigint(20) unsigned NOT NULL,
  `body` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `idProduct` (`idProduct`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `review_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `product` (`id`),
  CONSTRAINT `review_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visited_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','$2y$10$FRVJd2id0rFA2RcR5ss/0edbk66kVdDSaR3e6UzFSH.YziQAbAv3K','admin@admin.ru','2020-12-24 09:08:10',NULL),(2,'DartWeider','$2y$10$Xkpkv/wUK9QRWN6bXs2PqulxIGsEU/nzDDUj98H9lgGT2WREWI6aS','dart@weider','2020-12-24 09:08:40',NULL),(3,'Yoda','$2y$10$lKzeKpEm8oy7md3J9Vu2V.ccisnAciku32.CRxp5u1MPNEgPPWOj2','yoda@jed.ay','2020-12-24 09:09:13',NULL),(4,'Terminator','$2y$10$ZZMMvbljfI1DoveHcbX7teq48AbeePTDDw26TUb6I9jw3Hp0I7kyO','termina@tor.com','2020-12-24 10:38:32',NULL);
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

-- Dump completed on 2020-12-24 13:43:27
