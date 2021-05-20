# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.33)
# Database: todos
# Generation Time: 2021-05-20 16:13:43 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table tags
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `deleted` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;

INSERT INTO `tags` (`id`, `name`, `deleted`)
VALUES
	(1,'Home',0),
	(11,'Work',1),
	(12,'Test',1),
	(13,'Work',0),
	(14,'Other',0);

/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table todos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `todos`;

CREATE TABLE `todos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `todo` varchar(255) DEFAULT NULL,
  `done` int(1) DEFAULT '0',
  `deleted` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `todos` WRITE;
/*!40000 ALTER TABLE `todos` DISABLE KEYS */;

INSERT INTO `todos` (`id`, `todo`, `done`, `deleted`)
VALUES
	(1,'Do this',0,0),
	(2,'Do that',0,0),
	(142,'Do this again',0,0),
	(143,'And again',0,1),
	(144,'The other thing',0,0),
	(145,'Something else',0,0),
	(146,'Again',0,0),
	(147,'Lots more todo',0,0),
	(148,'Todo this',0,1),
	(149,'Thing here',0,0),
	(150,'Stuff here',0,1),
	(191,'sada',0,1),
	(192,'sada',0,1),
	(193,'asd',0,1),
	(194,'Something here',0,0),
	(195,'Something here',0,1),
	(196,'Something later',0,0),
	(197,'Something later',0,1),
	(198,'Something again x2',1,0),
	(199,'Not that again',1,0),
	(200,'Not that again',1,1),
	(201,'Not that thing',0,0),
	(202,'Something later',0,0),
	(203,'Something else later',0,0),
	(204,'Another todo',0,0),
	(205,'Too many todos',0,0),
	(206,'Another thing',0,0),
	(207,'Todo',0,1),
	(208,'Something',0,0),
	(209,'Something else later',0,0),
	(210,'Another of many things',0,1),
	(211,'Another of many things',0,1),
	(212,'That one thing',1,0),
	(213,'That one thing again',0,0),
	(214,'And again again',0,0),
	(215,'And again again again',0,1),
	(216,'test',0,0),
	(217,'test',0,1),
	(218,'t',0,1),
	(219,'test',0,1),
	(220,'test',0,1),
	(221,'test',0,1),
	(222,'test',0,1),
	(223,'test 2',0,1),
	(224,'test',0,1),
	(225,'hello it me',0,0),
	(226,'Test',0,1);

/*!40000 ALTER TABLE `todos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table todos-tags
# ------------------------------------------------------------

DROP TABLE IF EXISTS `todos-tags`;

CREATE TABLE `todos-tags` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `todo-id` int(11) unsigned NOT NULL,
  `tag-id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `todos-tags` WRITE;
/*!40000 ALTER TABLE `todos-tags` DISABLE KEYS */;

INSERT INTO `todos-tags` (`id`, `todo-id`, `tag-id`)
VALUES
	(31,206,1),
	(32,149,13),
	(33,198,1),
	(34,198,13),
	(35,198,1),
	(36,199,14);

/*!40000 ALTER TABLE `todos-tags` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
