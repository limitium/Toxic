/*
SQLyog Ultimate - MySQL GUI v8.2 
MySQL - 5.1.40-community : Database - toxqwe12223
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`toxqwe12223` /*!40100 DEFAULT CHARACTER SET cp1251 */;

USE `toxqwe12223`;

/*Table structure for table `Account` */

DROP TABLE IF EXISTS `Account`;

CREATE TABLE `Account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `descriminator` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `Account` */

/*Table structure for table `Bot` */

DROP TABLE IF EXISTS `Bot`;

CREATE TABLE `Bot` (
  `id` int(11) NOT NULL,
  `vkid` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_395242F1D5727132` (`vkid`),
  CONSTRAINT `FK_395242F1BF396750` FOREIGN KEY (`id`) REFERENCES `rawresult` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `Bot` */

/*Table structure for table `Content` */

DROP TABLE IF EXISTS `Content`;

CREATE TABLE `Content` (
  `id` int(11) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_31780935BF396750` FOREIGN KEY (`id`) REFERENCES `rawresult` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `Content` */

/*Table structure for table `Domen` */

DROP TABLE IF EXISTS `Domen`;

CREATE TABLE `Domen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `register_account_id` int(11) DEFAULT NULL,
  `bot_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `bought_at` date DEFAULT NULL,
  `whois` varchar(255) DEFAULT NULL,
  `paid_unitl` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FA9B650FCEE68B80` (`register_account_id`),
  KEY `IDX_FA9B650F92C1C487` (`bot_id`),
  CONSTRAINT `FK_FA9B650F92C1C487` FOREIGN KEY (`bot_id`) REFERENCES `bot` (`id`),
  CONSTRAINT `FK_FA9B650FCEE68B80` FOREIGN KEY (`register_account_id`) REFERENCES `registeraccount` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `Domen` */

/*Table structure for table `DomenHistory` */

DROP TABLE IF EXISTS `DomenHistory`;

CREATE TABLE `DomenHistory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `satellite_id` int(11) DEFAULT NULL,
  `domen_id` int(11) DEFAULT NULL,
  `changet_at` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_97B47152D0EAD71` (`satellite_id`),
  KEY `IDX_97B4715EB3C358F` (`domen_id`),
  CONSTRAINT `FK_97B4715EB3C358F` FOREIGN KEY (`domen_id`) REFERENCES `domen` (`id`),
  CONSTRAINT `FK_97B47152D0EAD71` FOREIGN KEY (`satellite_id`) REFERENCES `satellite` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `DomenHistory` */

/*Table structure for table `FtpAccount` */

DROP TABLE IF EXISTS `FtpAccount`;

CREATE TABLE `FtpAccount` (
  `id` int(11) NOT NULL,
  `host_account_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5ED6AC9E33F805B3` (`host_account_id`),
  CONSTRAINT `FK_5ED6AC9EBF396750` FOREIGN KEY (`id`) REFERENCES `account` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_5ED6AC9E33F805B3` FOREIGN KEY (`host_account_id`) REFERENCES `hostaccount` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `FtpAccount` */

/*Table structure for table `Host` */

DROP TABLE IF EXISTS `Host`;

CREATE TABLE `Host` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `ns_servers` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `Host` */

/*Table structure for table `HostAccount` */

DROP TABLE IF EXISTS `HostAccount`;

CREATE TABLE `HostAccount` (
  `id` int(11) NOT NULL,
  `host_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E933C6871FB8D185` (`host_id`),
  CONSTRAINT `FK_E933C687BF396750` FOREIGN KEY (`id`) REFERENCES `account` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_E933C6871FB8D185` FOREIGN KEY (`host_id`) REFERENCES `host` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `HostAccount` */

/*Table structure for table `HttpAccount` */

DROP TABLE IF EXISTS `HttpAccount`;

CREATE TABLE `HttpAccount` (
  `id` int(11) NOT NULL,
  `login_field` varchar(255) DEFAULT NULL,
  `password_fied` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_D656DFABBF396750` FOREIGN KEY (`id`) REFERENCES `account` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `HttpAccount` */

/*Table structure for table `Indexed` */

DROP TABLE IF EXISTS `Indexed`;

CREATE TABLE `Indexed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domen_id` int(11) DEFAULT NULL,
  `search_engine_id` int(11) DEFAULT NULL,
  `in_index` tinyint(1) DEFAULT NULL,
  `check_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_16FC5409EB3C358F` (`domen_id`),
  KEY `IDX_16FC54095C978CA2` (`search_engine_id`),
  CONSTRAINT `FK_16FC54095C978CA2` FOREIGN KEY (`search_engine_id`) REFERENCES `searchengine` (`id`),
  CONSTRAINT `FK_16FC5409EB3C358F` FOREIGN KEY (`domen_id`) REFERENCES `domen` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `Indexed` */

/*Table structure for table `MetaData` */

DROP TABLE IF EXISTS `MetaData`;

CREATE TABLE `MetaData` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pattern_type_id` int(11) DEFAULT NULL,
  `data` varchar(1000) NOT NULL,
  `content_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1650F97CEE49CE3` (`pattern_type_id`),
  CONSTRAINT `FK_1650F97CEE49CE3` FOREIGN KEY (`pattern_type_id`) REFERENCES `patterntype` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `MetaData` */

/*Table structure for table `PatternType` */

DROP TABLE IF EXISTS `PatternType`;

CREATE TABLE `PatternType` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source_type_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1C872F9A8C9334FB` (`source_type_id`),
  CONSTRAINT `FK_1C872F9A8C9334FB` FOREIGN KEY (`source_type_id`) REFERENCES `sourcetype` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=cp1251;

/*Data for the table `PatternType` */

insert  into `PatternType`(`id`,`source_type_id`,`name`) values (1,1,'title'),(2,1,'date'),(3,1,'tags'),(4,1,'author'),(5,1,'content'),(6,1,'next'),(7,1,'list'),(8,1,'post');

/*Table structure for table `Post` */

DROP TABLE IF EXISTS `Post`;

CREATE TABLE `Post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `satellite_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `is_page` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_FAB8C3B3D7DF1668` (`file_name`),
  KEY `IDX_FAB8C3B32D0EAD71` (`satellite_id`),
  CONSTRAINT `FK_FAB8C3B32D0EAD71` FOREIGN KEY (`satellite_id`) REFERENCES `satellite` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `Post` */

/*Table structure for table `Proxy` */

DROP TABLE IF EXISTS `Proxy`;

CREATE TABLE `Proxy` (
  `id` int(11) NOT NULL,
  `ip` int(11) NOT NULL,
  `port` int(11) NOT NULL,
  `proxy_type` varchar(255) DEFAULT NULL,
  `valid` tinyint(1) DEFAULT NULL,
  `checked_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Unique_IP` (`port`,`ip`),
  CONSTRAINT `FK_B2B3E6BABF396750` FOREIGN KEY (`id`) REFERENCES `rawresult` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `Proxy` */

/*Table structure for table `RawResult` */

DROP TABLE IF EXISTS `RawResult`;

CREATE TABLE `RawResult` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `url` varchar(255) NOT NULL,
  `descriminator` tinytext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2A275658953C1C61` (`source_id`),
  CONSTRAINT `FK_2A275658953C1C61` FOREIGN KEY (`source_id`) REFERENCES `source` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `RawResult` */

/*Table structure for table `Register` */

DROP TABLE IF EXISTS `Register`;

CREATE TABLE `Register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `Register` */

/*Table structure for table `RegisterAccount` */

DROP TABLE IF EXISTS `RegisterAccount`;

CREATE TABLE `RegisterAccount` (
  `id` int(11) NOT NULL,
  `register_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_70CDCECF4976CB7E` (`register_id`),
  CONSTRAINT `FK_70CDCECFBF396750` FOREIGN KEY (`id`) REFERENCES `account` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_70CDCECF4976CB7E` FOREIGN KEY (`register_id`) REFERENCES `register` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `RegisterAccount` */

/*Table structure for table `Rule` */

DROP TABLE IF EXISTS `Rule`;

CREATE TABLE `Rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source_id` int(11) DEFAULT NULL,
  `pattern_type_id` int(11) DEFAULT NULL,
  `pattern` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E6EA03F2953C1C61` (`source_id`),
  KEY `IDX_E6EA03F2EE49CE3` (`pattern_type_id`),
  CONSTRAINT `FK_E6EA03F2EE49CE3` FOREIGN KEY (`pattern_type_id`) REFERENCES `patterntype` (`id`),
  CONSTRAINT `FK_E6EA03F2953C1C61` FOREIGN KEY (`source_id`) REFERENCES `source` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `Rule` */

/*Table structure for table `Satellite` */

DROP TABLE IF EXISTS `Satellite`;

CREATE TABLE `Satellite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domen_id` int(11) DEFAULT NULL,
  `theme_id` int(11) DEFAULT NULL,
  `ftp_account_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_ED36A894EB3C358F` (`domen_id`),
  KEY `IDX_ED36A89459027487` (`theme_id`),
  KEY `IDX_ED36A89468043490` (`ftp_account_id`),
  CONSTRAINT `FK_ED36A89468043490` FOREIGN KEY (`ftp_account_id`) REFERENCES `ftpaccount` (`id`),
  CONSTRAINT `FK_ED36A89459027487` FOREIGN KEY (`theme_id`) REFERENCES `theme` (`id`),
  CONSTRAINT `FK_ED36A894EB3C358F` FOREIGN KEY (`domen_id`) REFERENCES `domen` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `Satellite` */

/*Table structure for table `Schedule` */

DROP TABLE IF EXISTS `Schedule`;

CREATE TABLE `Schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timeout` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=cp1251;

/*Data for the table `Schedule` */

insert  into `Schedule`(`id`,`timeout`) values (1,1),(2,1200),(3,3600),(4,186000);

/*Table structure for table `SearchEngine` */

DROP TABLE IF EXISTS `SearchEngine`;

CREATE TABLE `SearchEngine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `SearchEngine` */

/*Table structure for table `Source` */

DROP TABLE IF EXISTS `Source`;

CREATE TABLE `Source` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theme_id` int(11) DEFAULT NULL,
  `schedule_id` int(11) DEFAULT NULL,
  `source_type_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_58267A4559027487` (`theme_id`),
  KEY `IDX_58267A45A40BC2D5` (`schedule_id`),
  KEY `IDX_58267A458C9334FB` (`source_type_id`),
  CONSTRAINT `FK_58267A458C9334FB` FOREIGN KEY (`source_type_id`) REFERENCES `sourcetype` (`id`),
  CONSTRAINT `FK_58267A4559027487` FOREIGN KEY (`theme_id`) REFERENCES `theme` (`id`),
  CONSTRAINT `FK_58267A45A40BC2D5` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `Source` */

/*Table structure for table `SourceAccount` */

DROP TABLE IF EXISTS `SourceAccount`;

CREATE TABLE `SourceAccount` (
  `id` int(11) NOT NULL,
  `source_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_4E39E6A8953C1C61` (`source_id`),
  CONSTRAINT `FK_4E39E6A8BF396750` FOREIGN KEY (`id`) REFERENCES `account` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_4E39E6A8953C1C61` FOREIGN KEY (`source_id`) REFERENCES `source` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `SourceAccount` */

/*Table structure for table `SourceType` */

DROP TABLE IF EXISTS `SourceType`;

CREATE TABLE `SourceType` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=cp1251;

/*Data for the table `SourceType` */

insert  into `SourceType`(`id`,`name`) values (1,'Content'),(2,'Bot'),(3,'Proxy');

/*Table structure for table `Theme` */

DROP TABLE IF EXISTS `Theme`;

CREATE TABLE `Theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `Theme` */

/*Table structure for table `UsedProxy` */

DROP TABLE IF EXISTS `UsedProxy`;

CREATE TABLE `UsedProxy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source_id` int(11) DEFAULT NULL,
  `proxy_id` int(11) DEFAULT NULL,
  `used_at` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C269B94D953C1C61` (`source_id`),
  KEY `IDX_C269B94DDB26A4E` (`proxy_id`),
  CONSTRAINT `FK_C269B94DDB26A4E` FOREIGN KEY (`proxy_id`) REFERENCES `proxy` (`id`),
  CONSTRAINT `FK_C269B94D953C1C61` FOREIGN KEY (`source_id`) REFERENCES `source` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

/*Data for the table `UsedProxy` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
