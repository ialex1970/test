# ************************************************************
# Sequel Pro SQL dump
# Версия 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Адрес: 127.0.0.1 (MySQL 5.5.42)
# Схема: guest_book
# Время создания: 2016-08-15 12:57:11 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Дамп таблицы messages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `published_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `homepage` varchar(255) DEFAULT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `browser` varchar(100) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `published_at`, `homepage`, `ip`, `browser`, `file`)
VALUES
	(12,'John Silver','silver@piratebay.com','<p>Hey, from the pirate bay!</p>','2016-08-08 14:35:17','http://nassau.com','localhost','Chrome 52.0.2743.116',NULL),
	(13,'Flint','flint@piratebay.com','<p>Hello, World!</p>','2016-08-08 16:49:29','http://flint.nassau.com','localhost','Chrome 52.0.2743.116',NULL),
	(16,'James Vane','vane@piratybay.com','<p>Yo-ho-ho!!!</p>','2016-08-08 18:27:40','http://vane.nassau.com','localhost','Safari 9.1.2',NULL),
	(32,'wrwewrewr','sandrik1970@gmail.com','<p>eqweqeqeewqwqe</p>','2016-08-08 19:17:51','wrwerewrwr','localhost','Chrome 52.0.2743.116',NULL),
	(33,'admin','admin@change.me','<p>fsdffsaf asfasdfsadf asdfsdfdsf</p>','2016-08-08 19:40:39','adfsffa','localhost','Chrome 52.0.2743.116',NULL),
	(34,'admin','adasdd@sdfffsd','<p>asfdsdfsdfsfdsff</p>','2016-08-08 19:42:12','afdfsf','localhost','Chrome 52.0.2743.116',NULL),
	(37,'admin','admin@change.me','Test Lorem','2016-08-10 19:36:22','http://nassau.com','127.0.0.1','Chrome 52.0.2743.116',''),
	(39,'Jabba','john@piratebay.com','Text File','2016-08-14 11:24:50','http://john.nassau.com','127.0.0.1','Chrome 52.0.2743.116','uploads/Jabba_git_guest_book.txt'),
	(40,'Jabba','john@piratebay.com','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','2016-08-14 11:06:28','http://john.nassau.com','localhost','Chrome 52.0.2743.116',NULL),
	(42,'Jabba','john@piratebay.com','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','2016-08-10 19:35:42','http://john.nassau.com','localhost','Chrome 52.0.2743.116',NULL),
	(43,'admin','admin@change.me','<p>fsdffsaf asfasdfsadf asdfsdfdsf</p>','2016-08-08 19:40:39','adfsffa','localhost','Chrome 52.0.2743.116',NULL),
	(44,'James Vane','vane@piratybay.com','<p>Yo-ho-ho!!!</p>','2016-08-08 18:27:40','http://vane.nassau.com','localhost','Safari 9.1.2',NULL),
	(45,'admin','admin@change.me','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&amp;nbsp;','2016-08-10 19:36:22','http://nassau.com','localhost','Chrome 52.0.2743.116',NULL),
	(46,'admin','admin@change.me','<p>fsdffsaf asfasdfsadf asdfsdfdsf</p>','2016-08-08 19:40:39','adfsffa','localhost','Chrome 52.0.2743.116',NULL),
	(47,'wrwewrewr','sandrik1970@gmail.com','<p>eqweqeqeewqwqe</p>','2016-08-08 19:17:51','wrwerewrwr','localhost','Chrome 52.0.2743.116',NULL),
	(48,'Jabba','john@piratebay.com','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','2016-08-10 19:35:42','http://john.nassau.com','localhost','Chrome 52.0.2743.116',NULL),
	(49,'wrwewrewr','sandrik1970@gmail.com','<p>eqweqeqeewqwqe</p>','2016-08-08 19:17:51','wrwerewrwr','localhost','Chrome 52.0.2743.116',NULL),
	(50,'wrwewrewr','sandrik1970@gmail.com','<p>eqweqeqeewqwqe</p>','2016-08-08 19:17:51','wrwerewrwr','localhost','Chrome 52.0.2743.116',NULL),
	(51,'admin','admin@change.me','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&amp;nbsp;','2016-08-10 19:36:22','http://nassau.com','localhost','Chrome 52.0.2743.116',NULL),
	(53,'John','john@piratebay.com','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','2016-08-10 19:32:01','http://john.nassau.com','localhost','Chrome 52.0.2743.116',NULL),
	(54,'admin','admin@admin.loc','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','2016-08-10 19:35:28','http://admin.com','localhost','Chrome 52.0.2743.116',NULL),
	(55,'Jabba','jabba@tatooine.com','Привет от Джаббы','2016-08-11 22:26:30','http://tatooine.com','localhost','Chrome 52.0.2743.116',NULL),
	(56,'John','john@piratebay.com','Photo','2016-08-14 11:06:34','','localhost','Chrome 52.0.2743.116',NULL),
	(57,'Alex','alex@gmail.loc','New test Message','2016-08-14 13:06:01','','127.0.0.1','Chrome 52.0.2743.116',NULL),
	(58,'admin','admin@admin.loc','Test admin message','2016-08-15 12:20:25','http://admin.com','127.0.0.1','Chrome 52.0.2743.116','');

/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
