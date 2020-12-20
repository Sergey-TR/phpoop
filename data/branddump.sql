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
-- Table structure for table `basket`
--

DROP TABLE IF EXISTS `basket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `basket` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `userId` bigint(20) unsigned NOT NULL,
  `productId` bigint(20) unsigned NOT NULL,
  `total` int(10) unsigned DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `productId` (`productId`),
  KEY `userId` (`userId`),
  CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`id`),
  CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `basket`
--

LOCK TABLES `basket` WRITE;
/*!40000 ALTER TABLE `basket` DISABLE KEYS */;
INSERT INTO `basket` VALUES (1,1,2,1),(2,2,3,1),(3,3,4,2),(4,4,5,3),(5,51,12,1),(6,51,2,NULL),(7,51,1,NULL),(8,51,2,NULL),(9,51,4,NULL),(10,51,2,NULL),(11,51,3,NULL),(12,51,3,NULL),(13,51,4,1),(14,51,4,1),(15,51,1,1),(16,51,2,1),(17,51,2,NULL);
/*!40000 ALTER TABLE `basket` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,2,'2020-12-08 08:29:24','2020-12-08 08:29:24',NULL,NULL,NULL),(2,3,'2020-12-08 08:29:24','2020-12-08 08:29:24',NULL,NULL,NULL),(3,51,'2020-12-18 11:29:12','2020-12-18 11:29:12','NAME','8-333-333-4444','        comment net'),(4,51,'2020-12-18 11:35:46','2020-12-18 11:35:46','ТФЬУ','8-333-333-5555','      dfgtsj,j,gllugityu  '),(5,51,'2020-12-18 11:38:04','2020-12-18 11:38:04','zxcvb','','        '),(6,51,'2020-12-18 11:49:08','2020-12-18 11:49:08','nnnnnnn','','        nnnnnnnnnnnnnnnnnnhhhhh'),(7,57,'2020-12-18 11:52:59','2020-12-18 11:52:59','Сергей Трофимов','','        zzzzzzzzzzzzzz'),(8,57,'2020-12-18 12:13:17','2020-12-18 12:13:17','прерр','','        ррр'),(9,52,'2020-12-18 13:10:45','2020-12-18 13:10:45','yoda','8-222-333-4444','        dffghjjmm  '),(10,52,'2020-12-18 13:11:21','2020-12-18 13:11:21','yoda','','        '),(11,52,'2020-12-18 14:10:05','2020-12-18 14:10:05','meeeeeeee','','        dijopdckc;dckodddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd'),(12,51,'2020-12-18 16:35:31','2020-12-18 16:35:31','DartWeider','8-111-222-3333','   id1 id2     '),(13,51,'2020-12-18 17:15:32','2020-12-18 17:15:32','ммммм','','        ');
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
  `total` int(10) unsigned DEFAULT '0' COMMENT 'Количество заказанных товарных позиций',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `productId` (`productId`),
  KEY `orderId` (`orderId`),
  CONSTRAINT `orders_product_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`id`),
  CONSTRAINT `orders_product_ibfk_2` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_product`
--

LOCK TABLES `orders_product` WRITE;
/*!40000 ALTER TABLE `orders_product` DISABLE KEYS */;
INSERT INTO `orders_product` VALUES (1,1,2,1,'2020-12-08 11:34:16','2020-12-08 11:34:16',0.00),(4,7,2,1,'2020-12-18 19:37:07','2020-12-18 19:37:07',110.00),(5,7,1,2,'2020-12-18 20:31:48','2020-12-18 20:31:48',110.00);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review` VALUES (1,1,1,'ниче так маичка','2020-12-03 11:17:06'),(2,1,2,'да фигня, она стока не стоит','2020-12-03 11:17:06'),(3,2,2,'блондинка лопоушистая','2020-12-03 11:17:06'),(4,2,1,'','2020-12-04 08:46:43');
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
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'User','qwerty','user@mail.com','2020-12-02 14:28:01',NULL),(2,'Nickname','ytrewq','nick@ya.ru','2020-12-02 14:28:01',NULL),(3,'mike','white','mim@ya.uu','2020-12-04 13:08:32',NULL),(4,'Myname','black','name@mail.ru','2020-12-04 13:28:31',NULL),(17,'Hot','dog','hot@mail.ru','2020-12-04 14:45:17',NULL),(18,'Bul','dogs','bul@mail.ru','2020-12-04 14:46:47',NULL),(20,'yyyy','dogs','yyyy@itis.yyy','2020-12-04 14:49:44',NULL),(21,'Ass','bigass','ass@all.nu','2020-12-06 15:39:10',NULL),(23,'Us','qwery','usr@mail.com','2020-12-14 06:49:26',NULL),(24,'Nikname','yrewq','nck@ya.ru','2020-12-14 06:49:26',NULL),(25,'nnn','1111','a@ii.ru','2020-12-14 06:49:47',NULL),(26,'tc-1372','$2y$10$pi9meFjn8UurnLm2OuiHseXjkakaWrTcnlCl8Om2xmbWNWlA7ROAC','s@gmail.com','2020-12-14 07:42:08',NULL),(29,'yaya','$2y$10$IQaGkdOJoTX73wBGh.CZZeNzO9TXcniuFLOKsmmU3zP7Tv1XHLLd.','ya@ya.ru','2020-12-14 07:50:59',NULL),(30,'mimi','$2y$10$68DZrYuAjVKItgqNqthq4.slKoodaUR7F9U2bJst/JgnrrnHMPv8y','mi@mi.ps','2020-12-14 08:18:08',NULL),(31,'Iam','$2y$10$yLK7S5cmW3kPP7zh2zItGu3XSymrTRKpWPzX1JewZZIk4LHL/uCmi','am@ma.ru','2020-12-14 09:19:17',NULL),(37,'may','$2y$10$LGWsvsjNeahf0ZecggzY6eMvF7HJaJu4Oqy5ViCmxBYymXdawI/nO','may@gmail.com','2020-12-14 10:58:18',NULL),(38,'Sergey','$2y$10$GIBcByYMwv3iYDmEfiTpTuHzXZvKaLUFU1lImeaxnD2gegDkJs3RK','mov72@mail.com','2020-12-14 12:53:38',NULL),(50,'Sergey-TR','$2y$10$/mrBAqSo9HUUvdbmfig01OyE09XD0E0CGa9.3UZSngm6ZeJAMiRGe','ee@mm.al','2020-12-14 13:34:06',NULL),(51,'DartWeider','$2y$10$4ZZLXA88TFVF7hcHDST/4OdLC47bCbVhESMY7LrkPIz6lylt3J/zK','stars@gm.com','2020-12-14 13:45:31',NULL),(52,'Yoda','$2y$10$XxKm7G1Fdz4vct0l1Ncex.lCGcRdcwUZ/TuGxvj7hfaO0oq6mbBPS','yoda@jed.ay','2020-12-15 08:02:04',NULL),(53,'Skywocker','$2y$10$RsgqHbaWvFGQH5Uk.3wtxORfmuAZpsKGzJkbFEMOFFeRqh28u68i2','sky@wocker.jd','2020-12-18 05:53:45',NULL),(54,'Obivan','$2y$10$F.LtbgnP25Vydt4ZiIpFd.Gm9ln3ICjjAdg2YiBlzh0Rm0K6Jk2.u','obi@van.jd','2020-12-18 05:57:59',NULL),(55,'Morphius','$2y$10$wT.fyU26aw/ooJFwTd509edsTNNCJhjEpFGwmnhdR5kSkunE5fYga','mor@fius.ru','2020-12-18 09:25:01',NULL),(56,'serzh','$2y$10$s6MKCL8iC6lPCCKkwvwereo2GJ71HRXgGAM.A3G4x8Z7criKTXvzC','serzh@mail.ru','2020-12-18 09:35:54',NULL),(57,'marino','$2y$10$2ZNnAh74Y4EDyG9bsONNdutYdzb1EfcWj9usUeN4oPDSCZMtOS6DS','marino@mar.ru','2020-12-18 11:52:18',NULL);
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

-- Dump completed on 2020-12-19  7:34:47
