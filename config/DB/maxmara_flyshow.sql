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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `hierarchy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hierarchy` (
  `tid` int(11) NOT NULL ,
  `parent` int(11) DEFAULT 0,
  KEY `flyshow_tid` (`tid`),
  CONSTRAINT `flyshow_id` FOREIGN KEY (`tid`) REFERENCES `flyshow` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
