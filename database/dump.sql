-- MySQL dump 10.13  Distrib 5.7.26, for osx10.9 (x86_64)
--
-- Host: localhost    Database: project2
-- ------------------------------------------------------
-- Server version	5.7.26

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
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `namefile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (1,'0',9),(2,'734fd7a85dafed657cf5c760429ff627.png',10),(3,'734fd7a85dafed657cf5c760429ff627.png',11),(4,'3d3752c36288fe6c8729e52242fe04c7.png',12),(6,'734fd7a85dafed657cf5c760429ff627.png',12),(7,'734fd7a85dafed657cf5c760429ff627.png',12),(8,'734fd7a85dafed657cf5c760429ff627.png',12),(9,'734fd7a85dafed657cf5c760429ff627.png',12),(10,'734fd7a85dafed657cf5c760429ff627.png',12),(11,'734fd7a85dafed657cf5c760429ff627.png',12),(12,'734fd7a85dafed657cf5c760429ff627.png',12),(13,'734fd7a85dafed657cf5c760429ff627.png',12),(14,'734fd7a85dafed657cf5c760429ff627.png',12),(15,'734fd7a85dafed657cf5c760429ff627.png',12),(16,'734fd7a85dafed657cf5c760429ff627.png',12),(17,'734fd7a85dafed657cf5c760429ff627.png',12),(18,'734fd7a85dafed657cf5c760429ff627.png',12),(19,'734fd7a85dafed657cf5c760429ff627.png',12),(20,'734fd7a85dafed657cf5c760429ff627.png',12),(21,'734fd7a85dafed657cf5c760429ff627.png',12),(22,'734fd7a85dafed657cf5c760429ff627.png',12),(23,'734fd7a85dafed657cf5c760429ff627.png',12),(24,'734fd7a85dafed657cf5c760429ff627.png',12),(25,'734fd7a85dafed657cf5c760429ff627.png',12),(26,'734fd7a85dafed657cf5c760429ff627.png',12),(27,'734fd7a85dafed657cf5c760429ff627.png',12),(28,'1621a22fe24232bee27beff5d3e1fb70.png',11);
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (9,'Андрей Донец',26,'добавил пользователя без файла','DONEC20152015@YANDEX.RU','df185a17f141eb98569f2c3883bdda6e9c9bdad5'),(10,'Donets Andrei',17,'Добавил пользователя с файлом','DONEC2015@YAN.RU','df185a17f141eb98569f2c3883bdda6e9c9bdad5'),(11,'Петрович',18,'Пользователь с файлом','DONEC@YANDEX.RU','df185a17f141eb98569f2c3883bdda6e9c9bdad5'),(12,'Петя Пупкин',16,'Просто пользователь с фото','INFO@CANDYKINDER.RU','4d8a6ffe8813fea041616e4d86e4f9a36d312272');
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

-- Dump completed on 2020-01-11 17:33:24
