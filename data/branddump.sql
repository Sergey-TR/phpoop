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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userName` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `comment` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,5,'2020-12-19 17:02:49','2020-12-19 17:02:49','','','        '),(2,5,'2020-12-19 17:04:56','2020-12-19 17:04:56','','','        '),(3,7,'2020-12-19 17:47:53','2020-12-19 17:47:53','','','        '),(4,7,'2020-12-19 17:49:45','2020-12-19 17:49:45','','','        '),(5,7,'2020-12-19 17:50:40','2020-12-19 17:50:40','','','        '),(6,7,'2020-12-19 17:51:46','2020-12-19 17:51:46','','','        '),(7,7,'2020-12-19 18:03:40','2020-12-19 18:03:40','','','        '),(8,7,'2020-12-19 18:07:01','2020-12-19 18:07:01','','','        '),(9,7,'2020-12-19 18:11:39','2020-12-19 18:11:39','','','        '),(10,7,'2020-12-19 18:17:26','2020-12-19 18:17:26','','','        '),(11,7,'2020-12-19 18:22:49','2020-12-19 18:22:49','','','        '),(12,7,'2020-12-19 18:25:23','2020-12-19 18:25:23','','','        '),(13,7,'2020-12-19 18:27:30','2020-12-19 18:27:30','','','        '),(14,7,'2020-12-19 18:29:18','2020-12-19 18:29:18','','','        '),(15,7,'2020-12-19 18:31:31','2020-12-19 18:31:31','','','        '),(16,7,'2020-12-19 18:35:33','2020-12-19 18:35:33','','','        '),(17,7,'2020-12-19 18:38:39','2020-12-19 18:38:39','','','        '),(18,7,'2020-12-19 18:48:51','2020-12-19 18:48:51','','','        '),(19,7,'2020-12-19 18:55:06','2020-12-19 18:55:06','','','        '),(20,7,'2020-12-19 18:58:30','2020-12-19 18:58:30','','','        '),(21,7,'2020-12-19 19:04:47','2020-12-19 19:04:47','','','        '),(22,7,'2020-12-19 19:04:59','2020-12-19 19:04:59','','','        '),(23,7,'2020-12-19 19:05:37','2020-12-19 19:05:37','','','        '),(24,7,'2020-12-19 19:07:31','2020-12-19 19:07:31','','','        '),(25,7,'2020-12-19 19:07:58','2020-12-19 19:07:58','','','        '),(26,7,'2020-12-19 19:08:47','2020-12-19 19:08:47','','','        '),(27,7,'2020-12-19 19:11:26','2020-12-19 19:11:26','','','        '),(28,7,'2020-12-19 19:14:23','2020-12-19 19:14:23','','','        '),(29,7,'2020-12-19 19:16:09','2020-12-19 19:16:09','','','        '),(30,7,'2020-12-19 19:20:20','2020-12-19 19:20:20','','','        '),(31,7,'2020-12-19 19:26:27','2020-12-19 19:26:27','','','        '),(32,7,'2020-12-19 19:41:42','2020-12-19 19:41:42','','','        '),(33,5,'2020-12-20 07:13:51','2020-12-20 07:13:51','','','        '),(34,5,'2020-12-20 07:15:24','2020-12-20 07:15:24','','','        '),(35,5,'2020-12-20 07:16:42','2020-12-20 07:16:42','','','        '),(36,5,'2020-12-20 07:19:14','2020-12-20 07:19:14','','','        '),(37,5,'2020-12-20 07:19:48','2020-12-20 07:19:48','','','        '),(38,5,'2020-12-20 07:22:00','2020-12-20 07:22:00','','','        '),(39,5,'2020-12-20 07:27:06','2020-12-20 07:27:06','','','        '),(40,5,'2020-12-20 07:29:21','2020-12-20 07:29:21','','','        '),(41,5,'2020-12-20 07:37:52','2020-12-20 07:37:52','','','        '),(42,5,'2020-12-20 08:28:01','2020-12-20 08:28:01','','','        '),(43,5,'2020-12-20 08:39:26','2020-12-20 08:39:26','','','        '),(44,5,'2020-12-20 08:45:34','2020-12-20 08:45:34','','','        '),(45,5,'2020-12-20 08:52:26','2020-12-20 08:52:26','','','        '),(46,5,'2020-12-20 08:59:15','2020-12-20 08:59:15','','','        '),(47,5,'2020-12-20 09:00:15','2020-12-20 09:00:15','','','        '),(48,5,'2020-12-20 09:10:28','2020-12-20 09:10:28','','','        '),(49,5,'2020-12-20 09:11:40','2020-12-20 09:11:40','','','        '),(50,5,'2020-12-20 09:12:57','2020-12-20 09:12:57','','','        '),(51,5,'2020-12-20 09:20:52','2020-12-20 09:20:52','','','        '),(52,5,'2020-12-20 09:23:59','2020-12-20 09:23:59','','','        '),(53,5,'2020-12-20 09:25:10','2020-12-20 09:25:10','','','        '),(54,5,'2020-12-20 09:25:54','2020-12-20 09:25:54','','','        '),(55,5,'2020-12-20 09:27:45','2020-12-20 09:27:45','','','        '),(56,5,'2020-12-20 09:29:14','2020-12-20 09:29:14','','','        '),(57,5,'2020-12-20 09:32:33','2020-12-20 09:32:33','','','        '),(58,5,'2020-12-20 09:42:03','2020-12-20 09:42:03','','','        '),(59,5,'2020-12-20 09:42:54','2020-12-20 09:42:54','','','        '),(60,5,'2020-12-20 09:46:01','2020-12-20 09:46:01','','','        '),(61,5,'2020-12-20 10:19:58','2020-12-20 10:19:58','','','        '),(62,5,'2020-12-20 10:22:27','2020-12-20 10:22:27','','','        '),(63,5,'2020-12-20 10:25:30','2020-12-20 10:25:30','','','        '),(64,5,'2020-12-20 10:27:47','2020-12-20 10:27:47','','','        '),(65,5,'2020-12-20 10:34:02','2020-12-20 10:34:02','','','        '),(66,7,'2020-12-20 10:37:40','2020-12-20 10:37:40','yoda','8-333-444-5555','      arbaiten  '),(67,8,'2020-12-20 17:37:01','2020-12-20 17:37:01','','','        '),(68,8,'2020-12-20 17:37:46','2020-12-20 17:37:46','','','        '),(69,8,'2020-12-20 17:38:37','2020-12-20 17:38:37','','','        '),(70,8,'2020-12-20 18:39:37','2020-12-20 18:39:37','','','        '),(71,8,'2020-12-20 18:40:14','2020-12-20 18:40:14','','','        '),(72,9,'2020-12-21 04:52:53','2020-12-21 04:52:53','predator','8-322-223-3222','        ');
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_product`
--

LOCK TABLES `orders_product` WRITE;
/*!40000 ALTER TABLE `orders_product` DISABLE KEYS */;
INSERT INTO `orders_product` VALUES (1,64,1,1,'2020-12-20 13:27:47','2020-12-20 13:27:47',100.00),(2,64,2,3,'2020-12-20 13:27:47','2020-12-20 13:27:47',110.00),(3,65,1,1,'2020-12-20 13:34:02','2020-12-20 13:34:02',100.00),(4,65,2,3,'2020-12-20 13:34:02','2020-12-20 13:34:02',110.00),(5,66,3,1,'2020-12-20 13:37:40','2020-12-20 13:37:40',120.00),(6,66,4,1,'2020-12-20 13:37:40','2020-12-20 13:37:40',130.00),(17,67,2,1,'2020-12-20 20:37:01','2020-12-20 20:37:01',110.00),(18,67,4,1,'2020-12-20 20:37:01','2020-12-20 20:37:01',130.00),(19,68,2,1,'2020-12-20 20:37:46','2020-12-20 20:37:46',110.00),(20,68,4,1,'2020-12-20 20:37:46','2020-12-20 20:37:46',130.00),(21,69,2,2,'2020-12-20 20:38:37','2020-12-20 20:38:37',110.00),(22,69,4,4,'2020-12-20 20:38:37','2020-12-20 20:38:37',130.00),(23,71,1,1,'2020-12-20 21:40:14','2020-12-20 21:40:14',100.00),(24,72,12,1,'2020-12-21 07:52:53','2020-12-21 07:52:53',210.00);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review` VALUES (1,1,1,'ниче так маичка','2020-12-19 09:57:51'),(2,1,2,'да фигня, она стока не стоит','2020-12-19 09:57:51'),(3,2,2,'блондинка лопоушистая','2020-12-19 09:57:51');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'User','qwerty','user@mail.com','2020-12-19 06:56:44',NULL),(2,'Nickname','ytrewq','nick@ya.ru','2020-12-19 06:56:44',NULL),(3,'Us','qwery','usr@mail.com','2020-12-19 06:56:44',NULL),(4,'Nikname','yrewq','nck@ya.ru','2020-12-19 06:56:44',NULL),(5,'DartWeider','$2y$10$XWfqB9NUP.fTNbVB2T0VKOp6z6nFVH0y1IWnkA5ZDJN.ez6TOP/8O','dart@weider','2020-12-19 07:00:36',NULL),(6,'Skywocker','$2y$10$7u32K7Ue5Yp.YYx173J3QezimjqcGSeplWKk/.V1XDcHwSIDZrVce','sky@wocker.jd','2020-12-19 07:31:13',NULL),(7,'Yoda','$2y$10$/x/nZJx/D7BjXPUnpHZj9O8NB87HdrueZ6mmL2Y7BWuv3TN3kmMYS','yoda@jed.ay','2020-12-19 17:16:36',NULL),(8,'Terminator','$2y$10$otQcg/QOo9iD4qUUROp4IOkSBpdcNqU4Xa3wmh4vfSa8EEcsTzmsC','sky@net.com','2020-12-20 17:01:18',NULL),(9,'Predator','$2y$10$oHtzWnxyHS.GA37boKM6BOBRfelOA2xvWBxDrN5Ww/egGI1iT3hOS','pre@dator.com','2020-12-21 04:51:50',NULL);
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

-- Dump completed on 2020-12-21 12:00:57
