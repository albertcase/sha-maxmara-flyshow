-- MySQL dump 10.13  Distrib 5.6.19, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: maxmara_flyshow
-- ------------------------------------------------------
-- Server version	5.6.19-0ubuntu0.14.04.4

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
-- Table structure for table `flyshow`
--

DROP TABLE IF EXISTS `flyshow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flyshow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT '',
  `comment` varchar(400) DEFAULT '',
  `path` varchar(300) DEFAULT '',
  `width` int(11) DEFAULT '1',
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flyshow`
--

LOCK TABLES `flyshow` WRITE;
/*!40000 ALTER TABLE `flyshow` DISABLE KEYS */;
INSERT INTO `flyshow` VALUES (1,'首页','','/upload/img/57c461c36f09e.jpg',0,'2016-08-28 16:33:38'),(2,'大片星赏1','','/vstyle/img/loadpage-2.jpg',1,'2016-08-28 16:41:08'),(3,'星动瞬间','','/vstyle/img/loadpage-3.jpg',2,'2016-08-28 16:41:41'),(8,'Max Mara群星璀','图片来：Femina','/vstyle/img/pro-1.jpg',5,'2016-08-28 18:03:01'),(10,'Max Mara群星璀璨','图片来源：Femina3','/upload/img/57c5aef5807aa.jpg',1,'2016-08-28 18:03:38'),(11,'Max Mara群星璀璨阿','图片来源：Femina啊','/vstyle/img/pro-1.jpg',3,'2016-08-28 18:03:39'),(13,'Max Mara群星璀璨1','图片来源：22','/vstyle/img/pro-1.jpg',3,'2016-08-28 18:03:55'),(14,'Max Mara群星璀','图片来源：Femina','/upload/img/57c5b196e5fdf.jpg',2,'2016-08-28 18:03:58'),(15,'Max Mara群星璀璨3','图片来源：2','/vstyle/img/pro-1.jpg',4,'2016-08-28 18:04:01'),(16,'Max Mara群星璀璨4','图片来源：Femina','/vstyle/img/pro-1.jpg',5,'2016-08-28 18:04:04'),(18,'添加1','添加添加添1','/upload/img/57c52c3968a14.jpg',2,'2016-08-30 06:48:46'),(19,'添加2','添加2添加2','/upload/img/57c52c6d8a8a0.jpg',1,'2016-08-30 06:49:30'),(20,'test','testestets','/upload/img/57c68d94bd829.jpg',4,'2016-08-31 07:56:12');
/*!40000 ALTER TABLE `flyshow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hierarchy`
--

DROP TABLE IF EXISTS `hierarchy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hierarchy` (
  `tid` int(11) NOT NULL,
  `parent` int(11) DEFAULT '0',
  KEY `flyshow_tid` (`tid`),
  CONSTRAINT `flyshow_id` FOREIGN KEY (`tid`) REFERENCES `flyshow` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hierarchy`
--

LOCK TABLES `hierarchy` WRITE;
/*!40000 ALTER TABLE `hierarchy` DISABLE KEYS */;
INSERT INTO `hierarchy` VALUES (1,0),(2,1),(3,1),(8,2),(10,2),(11,2),(13,3),(14,3),(15,3),(16,3),(18,2),(19,3),(20,2);
/*!40000 ALTER TABLE `hierarchy` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-31  7:58:18
