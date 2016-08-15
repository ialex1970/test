# ************************************************************
# Sequel Pro SQL dump
# Версия 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Адрес: 127.0.0.1 (MySQL 5.5.42)
# Схема: guest_book
# Время создания: 2016-08-15 14:09:25 +0000
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
	(1,'admin','admin@admin.loc','Test message from admin','2016-08-15 16:12:43','http://admin.com','127.0.0.1','Chrome 52.0.2743.116','uploads/admin_6000000000248792_1920x1080.jpg'),
	(2,'John','john@smith.com','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut massa augue. Nulla luctus at nisl nec faucibus. Praesent posuere metus nisl, eu bibendum enim venenatis et. Mauris vel felis justo. Duis tincidunt enim sed lectus auctor lacinia. Duis quis erat sem. Donec at finibus tortor. Vestibulum consequat malesuada felis, a iaculis arcu luctus vitae. Maecenas congue elit eget ex feugiat ornare. Vestibulum consectetur dui vitae viverra dapibus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce leo nunc, aliquet ac elit non, pellentesque tincidunt nisi. Nunc at ligula gravida, feugiat arcu vitae, convallis libero. Vestibulum pulvinar a purus ac fringilla. Sed vitae justo auctor, iaculis dui at, luctus mauris.','2016-08-15 16:16:10','http://smith.com','127.0.0.1','Safari 9.1.2','uploads/John_16000000000247862_1920x1080.jpg'),
	(3,'Ivan','ivan@ivanov.ru','Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца. Также все другие известные генераторы Lorem Ipsum используют один и тот же текст, который они просто повторяют, пока не достигнут нужный объём.','2016-08-15 16:20:56','','127.0.0.1','Chrome 52.0.2743.116','uploads/Ivan_text.txt'),
	(4,'Flint','captain@flint.org','In Stevenson\'s book, Flint, whose first name is not given, was the captain of a pirate ship,&nbsp;<em style=\"color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.4px;\">The Walrus</em>, which accumulated an enormous amount of captured treasure, approximately &pound;700,000. Flint and six members of his crew bury the plunder on an island located somewhere in the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Caribbean_Sea\" title=\"Caribbean Sea\">Caribbean Sea</a>. Flint then murders his six assistants, leaving the corpse of one, Allardyce, with its arms outstretched in the direction of the buried treasure.','2016-08-15 16:25:33','http://flint.nassau.com','127.0.0.1','Chrome 52.0.2743.116','uploads/Flint_Captain_Flint_X.png'),
	(5,'Ivan','ivan@ivanov.ru','Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца. Также все другие известные генераторы Lorem Ipsum используют один и тот же текст, который они просто повторяют, пока не достигнут нужный объём.','2016-08-15 16:20:56','','127.0.0.1','Chrome 52.0.2743.116',''),
	(6,'Darth','darth@vader.net','orem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut massa augue. Nulla luctus at nisl nec faucibus. Praesent posuere metus nisl, eu bibendum enim venenatis et. Mauris vel felis justo. Duis tincidunt enim sed lectus auctor lacinia. Duis quis erat sem. Donec at finibus tortor. Vestibulum consequat malesuada felis, a iaculis arcu luctus vitae. Maecenas congue elit eget ex feugiat ornare. Vestibulum consectetur dui vitae viverra dapibus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce leo nunc, aliquet ac elit non, pellentesque tincidunt nisi.','2016-08-15 16:33:10','','127.0.0.1','Chrome 52.0.2743.116',''),
	(7,'Luke','luke@skywalker.net','orem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut massa augue. Nulla luctus at nisl nec faucibus. Praesent posuere metus nisl, eu bibendum enim venenatis et. Mauris vel felis justo. Duis tincidunt enim sed lectus auctor lacinia. Duis quis erat sem. Donec at finibus tortor. Vestibulum consequat malesuada felis, a iaculis arcu luctus vitae. Maecenas congue elit eget ex feugiat ornare. Vestibulum consectetur dui vitae viverra dapibus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce leo nunc, aliquet ac elit non, pellentesque tincidunt nisi.','2016-08-15 16:33:10','','127.0.0.1','Chrome 52.0.2743.116',''),
	(8,'Jabba','jubba@hutt.net','orem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut massa augue. Nulla luctus at nisl nec faucibus. Praesent posuere metus nisl, eu bibendum enim venenatis et. Mauris vel felis justo. Duis tincidunt enim sed lectus auctor lacinia. Duis quis erat sem. Donec at finibus tortor. Vestibulum consequat malesuada felis, a iaculis arcu luctus vitae. Maecenas congue elit eget ex feugiat ornare. Vestibulum consectetur dui vitae viverra dapibus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce leo nunc, aliquet ac elit non, pellentesque tincidunt nisi.','2016-08-15 16:33:10','','127.0.0.1','Chrome 52.0.2743.116',''),
	(9,'Darth','darth@vader.net','orem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut massa augue. Nulla luctus at nisl nec faucibus. Praesent posuere metus nisl, eu bibendum enim venenatis et. Mauris vel felis justo. Duis tincidunt enim sed lectus auctor lacinia. Duis quis erat sem. Donec at finibus tortor. Vestibulum consequat malesuada felis, a iaculis arcu luctus vitae. Maecenas congue elit eget ex feugiat ornare. Vestibulum consectetur dui vitae viverra dapibus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce leo nunc, aliquet ac elit non, pellentesque tincidunt nisi.','2016-08-15 16:33:10','','127.0.0.1','Chrome 52.0.2743.116',''),
	(10,'Darth','darth@vader.net','orem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut massa augue. Nulla luctus at nisl nec faucibus. Praesent posuere metus nisl, eu bibendum enim venenatis et. Mauris vel felis justo. Duis tincidunt enim sed lectus auctor lacinia. Duis quis erat sem. Donec at finibus tortor. Vestibulum consequat malesuada felis, a iaculis arcu luctus vitae. Maecenas congue elit eget ex feugiat ornare. Vestibulum consectetur dui vitae viverra dapibus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce leo nunc, aliquet ac elit non, pellentesque tincidunt nisi.','2016-08-15 16:33:10','','127.0.0.1','Chrome 52.0.2743.116',''),
	(11,'Darth','darth@vader.net','orem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut massa augue. Nulla luctus at nisl nec faucibus. Praesent posuere metus nisl, eu bibendum enim venenatis et. Mauris vel felis justo. Duis tincidunt enim sed lectus auctor lacinia. Duis quis erat sem. Donec at finibus tortor. Vestibulum consequat malesuada felis, a iaculis arcu luctus vitae. Maecenas congue elit eget ex feugiat ornare. Vestibulum consectetur dui vitae viverra dapibus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce leo nunc, aliquet ac elit non, pellentesque tincidunt nisi.','2016-08-15 16:33:10','','127.0.0.1','Chrome 52.0.2743.116',''),
	(12,'Darth','darth@vader.net','orem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut massa augue. Nulla luctus at nisl nec faucibus. Praesent posuere metus nisl, eu bibendum enim venenatis et. Mauris vel felis justo. Duis tincidunt enim sed lectus auctor lacinia. Duis quis erat sem. Donec at finibus tortor. Vestibulum consequat malesuada felis, a iaculis arcu luctus vitae. Maecenas congue elit eget ex feugiat ornare. Vestibulum consectetur dui vitae viverra dapibus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce leo nunc, aliquet ac elit non, pellentesque tincidunt nisi.','2016-08-15 16:33:10','','127.0.0.1','Chrome 52.0.2743.116',''),
	(13,'Darth','darth@vader.net','orem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut massa augue. Nulla luctus at nisl nec faucibus. Praesent posuere metus nisl, eu bibendum enim venenatis et. Mauris vel felis justo. Duis tincidunt enim sed lectus auctor lacinia. Duis quis erat sem. Donec at finibus tortor. Vestibulum consequat malesuada felis, a iaculis arcu luctus vitae. Maecenas congue elit eget ex feugiat ornare. Vestibulum consectetur dui vitae viverra dapibus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce leo nunc, aliquet ac elit non, pellentesque tincidunt nisi.','2016-08-15 16:33:10','','127.0.0.1','Chrome 52.0.2743.116',''),
	(14,'Jon','john@snow.io','Winter is Comming!','2016-08-15 16:35:49','','127.0.0.1','Chrome 52.0.2743.116',''),
	(15,'Darth','darth@vader.net','orem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut massa augue. Nulla luctus at nisl nec faucibus. Praesent posuere metus nisl, eu bibendum enim venenatis et. Mauris vel felis justo. Duis tincidunt enim sed lectus auctor lacinia. Duis quis erat sem. Donec at finibus tortor. Vestibulum consequat malesuada felis, a iaculis arcu luctus vitae. Maecenas congue elit eget ex feugiat ornare. Vestibulum consectetur dui vitae viverra dapibus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce leo nunc, aliquet ac elit non, pellentesque tincidunt nisi.','2016-08-15 16:33:10','','127.0.0.1','Chrome 52.0.2743.116',''),
	(16,'Sheldon','sheldon@cooper.com','Integer lobortis egestas sem, eu placerat urna mollis eu. In vehicula diam ac purus lacinia suscipit. In vel ullamcorper nisi. Nullam ante arcu, rutrum a bibendum at, malesuada vel mi. Nulla rhoncus, quam quis molestie lacinia, magna ipsum hendrerit odio, id commodo nibh erat nec nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas rutrum sem vel pharetra consequat. Proin imperdiet et quam sit amet sagittis.','2016-08-15 16:52:18','http://cooper.com','127.0.0.1','Chrome 52.0.2743.116',''),
	(17,'Flash','flash@allen.com','Nam eget lacus ex. Nullam tincidunt scelerisque turpis, vel pretium est interdum eu. Donec sit amet volutpat sapien. Duis mauris turpis, pellentesque vitae volutpat nec, laoreet sit amet enim. Sed porttitor ligula lobortis iaculis imperdiet. Quisque lobortis libero metus, vel vulputate lacus bibendum nec. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec ut ipsum quis nibh faucibus pulvinar. Vestibulum quam nisl, tristique eget hendrerit in, rutrum fermentum ipsum. Etiam dictum eu ipsum et tincidunt. Sed fringilla facilisis tellus, sit amet sodales eros vulputate id. Cras convallis, eros eget tempus aliquet, risus urna tincidunt diam, eu volutpat mauris augue sit amet tortor. Curabitur non urna tempor, rutrum urna eget, dictum tortor.','2016-08-15 16:58:01','http://central-city.com','127.0.0.1','Chrome 52.0.2743.116',''),
	(18,'Luke','luke@skywalker.net','orem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut massa augue. Nulla luctus at nisl nec faucibus. Praesent posuere metus nisl, eu bibendum enim venenatis et. Mauris vel felis justo. Duis tincidunt enim sed lectus auctor lacinia. Duis quis erat sem. Donec at finibus tortor. Vestibulum consequat malesuada felis, a iaculis arcu luctus vitae. Maecenas congue elit eget ex feugiat ornare. Vestibulum consectetur dui vitae viverra dapibus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce leo nunc, aliquet ac elit non, pellentesque tincidunt nisi.','2016-08-15 16:33:10','','127.0.0.1','Chrome 52.0.2743.116',''),
	(19,'Sheldon','sheldon@cooper.com','I love JavaScript!','2016-08-15 16:52:18','http://cooper.com','127.0.0.1','Chrome 52.0.2743.116',''),
	(20,'Darth','darth@vader.net','orem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut massa augue. Nulla luctus at nisl nec faucibus. Praesent posuere metus nisl, eu bibendum enim venenatis et. Mauris vel felis justo. Duis tincidunt enim sed lectus auctor lacinia. Duis quis erat sem. Donec at finibus tortor. Vestibulum consequat malesuada felis, a iaculis arcu luctus vitae. Maecenas congue elit eget ex feugiat ornare. Vestibulum consectetur dui vitae viverra dapibus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce leo nunc, aliquet ac elit non, pellentesque tincidunt nisi.','2016-08-15 16:33:10','','127.0.0.1','Chrome 52.0.2743.116',''),
	(21,'Darth','darth@vader.net','orem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut massa augue. Nulla luctus at nisl nec faucibus. Praesent posuere metus nisl, eu bibendum enim venenatis et. Mauris vel felis justo. Duis tincidunt enim sed lectus auctor lacinia. Duis quis erat sem. Donec at finibus tortor. Vestibulum consequat malesuada felis, a iaculis arcu luctus vitae. Maecenas congue elit eget ex feugiat ornare. Vestibulum consectetur dui vitae viverra dapibus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce leo nunc, aliquet ac elit non, pellentesque tincidunt nisi.','2016-08-15 16:33:10','','127.0.0.1','Chrome 52.0.2743.116',''),
	(22,'Luke','luke@skywalker.net','orem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut massa augue. Nulla luctus at nisl nec faucibus. Praesent posuere metus nisl, eu bibendum enim venenatis et. Mauris vel felis justo. Duis tincidunt enim sed lectus auctor lacinia. Duis quis erat sem. Donec at finibus tortor. Vestibulum consequat malesuada felis, a iaculis arcu luctus vitae. Maecenas congue elit eget ex feugiat ornare. Vestibulum consectetur dui vitae viverra dapibus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce leo nunc, aliquet ac elit non, pellentesque tincidunt nisi.','2016-08-15 16:33:10','','127.0.0.1','Chrome 52.0.2743.116',''),
	(23,'Ivan','ivan@ivanov.ru','Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца. Также все другие известные генераторы Lorem Ipsum используют один и тот же текст, который они просто повторяют, пока не достигнут нужный объём.','2016-08-15 16:20:56','','127.0.0.1','Chrome 52.0.2743.116',''),
	(24,'Darth','darth@vader.net','orem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut massa augue. Nulla luctus at nisl nec faucibus. Praesent posuere metus nisl, eu bibendum enim venenatis et. Mauris vel felis justo. Duis tincidunt enim sed lectus auctor lacinia. Duis quis erat sem. Donec at finibus tortor. Vestibulum consequat malesuada felis, a iaculis arcu luctus vitae. Maecenas congue elit eget ex feugiat ornare. Vestibulum consectetur dui vitae viverra dapibus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce leo nunc, aliquet ac elit non, pellentesque tincidunt nisi.','2016-08-15 16:33:10','','127.0.0.1','Chrome 52.0.2743.116',''),
	(25,'Sheldon','sheldon@cooper.com','Suspendisse aliquam porta nulla. Nunc semper malesuada magna a tristique. Nunc malesuada, ante id lobortis dapibus, est leo rhoncus ipsum, id dignissim ligula quam id justo. Praesent lorem ex, sagittis vel nisl vel, euismod rutrum augue. Nullam rhoncus ultrices est ac bibendum. Donec dapibus in dolor a maximus. Cras condimentum sem eget ultrices efficitur. Curabitur dolor enim, ornare nec maximus ut, porta vel nibh. Vestibulum purus nunc, dictum vitae posuere eget, vulputate eu nisi. Mauris sit amet dignissim ipsum. Nullam eu malesuada mi. Donec non cursus tortor, nec commodo felis. Nullam varius nisl ut velit ultricies pharetra. Nunc luctus nisi id tincidunt egestas. Praesent pharetra ligula augue, eget mattis metus varius at.','2016-08-15 16:52:18','http://cooper.com','127.0.0.1','Chrome 52.0.2743.116',''),
	(26,'Darth','darth@vader.net','orem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut massa augue. Nulla luctus at nisl nec faucibus. Praesent posuere metus nisl, eu bibendum enim venenatis et. Mauris vel felis justo. Duis tincidunt enim sed lectus auctor lacinia. Duis quis erat sem. Donec at finibus tortor. Vestibulum consequat malesuada felis, a iaculis arcu luctus vitae. Maecenas congue elit eget ex feugiat ornare. Vestibulum consectetur dui vitae viverra dapibus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce leo nunc, aliquet ac elit non, pellentesque tincidunt nisi.','2016-08-15 16:33:10','','127.0.0.1','Chrome 52.0.2743.116',''),
	(27,'Han','han@solo.com','Fusce aliquam turpis vitae tortor commodo ullamcorper sit amet vitae turpis. Etiam congue, elit eu dictum euismod, orci ex ultrices libero, eget aliquam orci erat vel dui. Ut non vestibulum purus, vel sagittis quam. Donec in purus posuere enim molestie molestie. Sed ut ante ex. Proin a quam cursus, malesuada metus a, vehicula velit. Nullam laoreet non risus eget egestas. Suspendisse facilisis, arcu quis fermentum vehicula, massa leo congue turpis, vel lobortis velit metus vel ex.','2016-08-15 17:01:00','http://han.tatooine.com','127.0.0.1','Chrome 52.0.2743.116','uploads/Han_url.jpg'),
	(28,'Darth','darth@vader.net','orem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut massa augue. Nulla luctus at nisl nec faucibus. Praesent posuere metus nisl, eu bibendum enim venenatis et. Mauris vel felis justo. Duis tincidunt enim sed lectus auctor lacinia. Duis quis erat sem. Donec at finibus tortor. Vestibulum consequat malesuada felis, a iaculis arcu luctus vitae. Maecenas congue elit eget ex feugiat ornare. Vestibulum consectetur dui vitae viverra dapibus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce leo nunc, aliquet ac elit non, pellentesque tincidunt nisi.','2016-08-15 16:33:10','','127.0.0.1','Chrome 52.0.2743.116','');

/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `password`)
VALUES
	(1,'admin','c3284d0f94606de1fd2af172aba15bf3');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
