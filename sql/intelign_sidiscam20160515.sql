/*
SQLyog Community v12.2.1 (64 bit)
MySQL - 5.6.17 : Database - intelign_sidiscam
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`intelign_sidiscam` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `intelign_sidiscam`;

/*Table structure for table `bank` */

DROP TABLE IF EXISTS `bank`;

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `id_table` int(11) NOT NULL,
  `id_country` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone1` varchar(20) NOT NULL,
  `phone2` varchar(20) NOT NULL,
  `email1` varchar(100) NOT NULL,
  `email2` varchar(100) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `aba` varchar(100) NOT NULL,
  `swif` varchar(100) NOT NULL,
  `iban` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id_bank`),
  KEY `bank_country` (`id_country`),
  KEY `id_table` (`id_table`),
  CONSTRAINT `bank_country` FOREIGN KEY (`id_country`) REFERENCES `country` (`id_country`),
  CONSTRAINT `bank_ibfk_1` FOREIGN KEY (`id_table`) REFERENCES `tables` (`id_table`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `bank` */

insert  into `bank`(`id_bank`,`name`,`id_table`,`id_country`,`address`,`phone1`,`phone2`,`email1`,`email2`,`account_number`,`aba`,`swif`,`iban`,`status`,`date_created`,`date_updated`) values 
(1,'MERCANTIL',2,1,'','1234567890','1234512345','deandrademarcos@gmail.com','deandrademarcos@gmail.com','12345678901234567890','0102222','25556655','6667744588',1,'2016-04-14 23:04:02','2016-05-15 12:53:41'),
(3,'BOD',2,1,'','02128601223','','deandrademarcos@gmail.com','','12345678901234567890','','','',1,'2016-04-15 13:01:18','2016-05-15 12:58:55'),
(4,'BANESCO',2,1,'','1234567890','','deandrademarcos@gmail.com','','12345678901234567890','','','',1,'2016-04-15 13:02:17','2016-05-15 12:58:56');

/*Table structure for table `banks_tables_id` */

DROP TABLE IF EXISTS `banks_tables_id`;

CREATE TABLE `banks_tables_id` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bank` int(11) NOT NULL,
  `id_table` int(11) NOT NULL,
  `id_primary` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_bank` (`id_bank`),
  KEY `id_table` (`id_table`),
  CONSTRAINT `banks_tables_id_ibfk_1` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`),
  CONSTRAINT `banks_tables_id_ibfk_2` FOREIGN KEY (`id_table`) REFERENCES `tables` (`id_table`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `banks_tables_id` */

insert  into `banks_tables_id`(`id`,`id_bank`,`id_table`,`id_primary`,`status`,`date_created`,`date_updated`) values 
(1,1,2,1,1,'2016-05-08 16:36:30','2016-05-15 12:25:50'),
(2,3,2,1,0,'2016-05-08 16:36:35','2016-05-08 17:23:00'),
(3,4,2,1,0,'2016-05-08 16:35:01','2016-05-08 17:23:02'),
(4,1,2,2,0,'2016-05-08 17:34:32','2016-05-08 17:35:52'),
(5,3,2,2,1,'2016-05-08 17:34:36','2016-05-08 17:34:36'),
(6,4,2,2,1,'2016-05-08 17:34:40','2016-05-08 17:34:40');

/*Table structure for table `bills` */

DROP TABLE IF EXISTS `bills`;

CREATE TABLE `bills` (
  `id_bill` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  PRIMARY KEY (`id_bill`,`id_company`,`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `bills` */

/*Table structure for table `bills_details` */

DROP TABLE IF EXISTS `bills_details`;

CREATE TABLE `bills_details` (
  `id_bill` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_bill`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `bills_details` */

/*Table structure for table `brokers` */

DROP TABLE IF EXISTS `brokers`;

CREATE TABLE `brokers` (
  `id_broker` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `abr` varchar(20) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `address` text NOT NULL,
  `phone1` varchar(20) NOT NULL,
  `phone2` varchar(20) NOT NULL,
  `email1` varchar(100) NOT NULL,
  `email2` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id_broker`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `brokers` */

insert  into `brokers`(`id_broker`,`name`,`abr`,`status`,`address`,`phone1`,`phone2`,`email1`,`email2`,`date_created`,`date_updated`) values 
(1,'Broker1','br1',1,'direccion de prueba','4268141850','','deandrademarcos@gmail.com','','2016-04-30 12:56:04','2016-04-30 13:10:47'),
(2,'broker2','br2',1,'direccion de prueba','02128601223','','','','2016-04-30 13:02:36','2016-04-30 13:02:36');

/*Table structure for table `cities` */

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
  `id_citie` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `id_country` int(11) NOT NULL,
  PRIMARY KEY (`id_citie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cities` */

/*Table structure for table `clients` */

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `rif` varchar(20) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `id_country` int(11) NOT NULL,
  `address` text,
  `phone1` tinytext,
  `phone2` tinytext,
  `email1` text,
  `email2` varchar(100) DEFAULT NULL,
  `contact1` varchar(100) DEFAULT NULL,
  `phone_contact1` varchar(20) DEFAULT NULL,
  `email_contact1` varchar(20) DEFAULT NULL,
  `contact2` varchar(100) DEFAULT NULL,
  `phone_contact2` varchar(20) DEFAULT NULL,
  `email_contact2` varchar(100) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `clients` */

insert  into `clients`(`id_client`,`name`,`rif`,`status`,`id_country`,`address`,`phone1`,`phone2`,`email1`,`email2`,`contact1`,`phone_contact1`,`email_contact1`,`contact2`,`phone_contact2`,`email_contact2`,`date_created`,`date_updated`) values 
(1,'CLIENTE 1','V-18020594-9',1,2,'DIRECCION DE PRUEBA','02128601223','04268141850','DEANDRADEMARCOS@GMAIL.COM','','','','','','','','2016-04-28 20:45:40','2016-05-15 13:53:05'),
(2,'dd4','ddddddddd',1,1,'DIRECCIÓN DE PRUEBA','04268141850','','','','','','','','','','2016-05-08 17:34:18','2016-05-08 17:36:27');

/*Table structure for table `coins` */

DROP TABLE IF EXISTS `coins`;

CREATE TABLE `coins` (
  `id_coin` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id_coin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `coins` */

/*Table structure for table `company` */

DROP TABLE IF EXISTS `company`;

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL AUTO_INCREMENT,
  `rif` varchar(45) NOT NULL,
  `description` varchar(500) NOT NULL,
  `owner` varchar(100) NOT NULL,
  `ci_owner` varchar(20) NOT NULL,
  `id_country` int(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone1` varchar(20) DEFAULT NULL,
  `phone2` varchar(20) DEFAULT NULL,
  `email1` varchar(100) DEFAULT NULL,
  `email2` varchar(100) DEFAULT NULL,
  `contact1` varchar(100) DEFAULT NULL,
  `phone_contact1` varchar(20) DEFAULT NULL,
  `email_contact1` varchar(100) DEFAULT NULL,
  `contact2` varchar(100) DEFAULT NULL,
  `phone_contact2` varchar(20) DEFAULT NULL,
  `email_contact2` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id_company`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `company` */

insert  into `company`(`id_company`,`rif`,`description`,`owner`,`ci_owner`,`id_country`,`address`,`phone1`,`phone2`,`email1`,`email2`,`contact1`,`phone_contact1`,`email_contact1`,`contact2`,`phone_contact2`,`email_contact2`,`status`,`date_created`,`date_updated`) values 
(1,'V-20303709-7','razon social de prueba','MARCOS DE ANDRADE','V-18020594',1,'aaaaaaaaaaaaaaaaa','04268141850','04261234567','deandrademarcos@gmail.com','deandrademarcos@gmail.com','MARCOS','04141234567','marcos@g.com','ARLINDO','04261412374','arlindo@gmail.com',1,'2016-04-02 21:28:41','2016-05-15 14:00:41'),
(2,'V-18020594-9','marcos','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2016-04-03 17:44:48','2016-05-08 11:47:02'),
(3,'V-20303709-7','jean','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2016-04-03 20:38:36','2016-05-08 11:47:03');

/*Table structure for table `country` */

DROP TABLE IF EXISTS `country`;

CREATE TABLE `country` (
  `id_country` int(11) NOT NULL AUTO_INCREMENT,
  `id_region` int(11) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `abr` varchar(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id_country`),
  KEY `country_region` (`id_region`),
  CONSTRAINT `country_region` FOREIGN KEY (`id_region`) REFERENCES `regions` (`id_region`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `country` */

insert  into `country`(`id_country`,`id_region`,`name`,`abr`,`status`,`date_created`,`date_updated`) values 
(1,2,'VENEZUELA','VE',1,'2016-04-05 20:58:17','2016-05-15 12:57:40'),
(2,1,'COLOMBIA','CO',1,'2016-04-18 16:25:27','2016-04-18 16:25:27');

/*Table structure for table `farms` */

DROP TABLE IF EXISTS `farms`;

CREATE TABLE `farms` (
  `id_farm` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `id_country` int(11) NOT NULL,
  `id_state` int(11) NOT NULL,
  `abr` varchar(10) NOT NULL,
  `capacity` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone1` varchar(20) NOT NULL,
  `phone2` varchar(20) NOT NULL,
  `email1` varchar(100) NOT NULL,
  `email2` varchar(100) NOT NULL,
  `contact1` varchar(100) NOT NULL,
  `phone_contact1` varchar(20) NOT NULL,
  `email_contact1` varchar(100) NOT NULL,
  `contact2` varchar(100) NOT NULL,
  `phone_contact2` varchar(20) NOT NULL,
  `email_contact2` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id_farm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `farms` */

insert  into `farms`(`id_farm`,`name`,`id_country`,`id_state`,`abr`,`capacity`,`address`,`phone1`,`phone2`,`email1`,`email2`,`contact1`,`phone_contact1`,`email_contact1`,`contact2`,`phone_contact2`,`email_contact2`,`status`,`date_created`,`date_updated`) values 
(1,'Granja',2,1,'G00',0,'Dirección','02121234567','02121234567','email1@h.com','','contact1','02121234567','','email1@h.com','02121234567','',1,'2016-04-15 10:20:20','2016-05-15 13:17:53'),
(2,'GRANJA2',1,1,'GR2',0,'Hello how are youy','1234567890','','','','','','','','','',1,'2016-04-15 15:22:59','2016-04-28 20:48:20');

/*Table structure for table `incoterms` */

DROP TABLE IF EXISTS `incoterms`;

CREATE TABLE `incoterms` (
  `id_incoterm` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `abr` varchar(10) NOT NULL,
  `detail` text,
  `status` int(1) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id_incoterm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `incoterms` */

insert  into `incoterms`(`id_incoterm`,`name`,`abr`,`detail`,`status`,`date_created`,`date_updated`) values 
(1,'Incoterm','ICO',NULL,1,'2016-04-30 12:36:41','2016-04-30 12:39:01'),
(2,'INCOTERM2','IC2',NULL,1,'2016-04-30 12:39:20','2016-05-08 12:13:32');

/*Table structure for table `plants` */

DROP TABLE IF EXISTS `plants`;

CREATE TABLE `plants` (
  `id_plant` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `rif` varchar(20) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `id_country` int(11) NOT NULL,
  `address` text,
  `phone1` tinytext,
  `phone2` tinytext,
  `email1` text,
  `email2` varchar(100) DEFAULT NULL,
  `contact1` varchar(100) DEFAULT NULL,
  `phone_contact1` varchar(20) DEFAULT NULL,
  `email_contact1` varchar(20) DEFAULT NULL,
  `contact2` varchar(100) DEFAULT NULL,
  `phone_contact2` varchar(20) DEFAULT NULL,
  `email_contact2` varchar(100) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_plant`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `plants` */

insert  into `plants`(`id_plant`,`name`,`rif`,`status`,`id_country`,`address`,`phone1`,`phone2`,`email1`,`email2`,`contact1`,`phone_contact1`,`email_contact1`,`contact2`,`phone_contact2`,`email_contact2`,`date_created`,`date_updated`) values 
(1,'planta 1','V-18020594-9',1,2,'DIRECCION DE PRUEBA','02128601223','04268141850','DEANDRADEMARCOS@GMAIL.COM','','','','','','','','2016-04-28 20:45:40','2016-05-15 13:05:38'),
(2,'PLANTA 2','V-12341563-9',1,1,'DIRECCION DE PRUEBA','02128601223','','','','','','','','','','2016-04-28 21:47:46','2016-04-28 21:47:46');

/*Table structure for table `ports` */

DROP TABLE IF EXISTS `ports`;

CREATE TABLE `ports` (
  `id_port` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `abr` varchar(10) NOT NULL,
  `description` varchar(200) NOT NULL,
  `cod_port` varchar(30) NOT NULL,
  `id_country` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id_port`),
  KEY `port_country` (`id_country`),
  CONSTRAINT `port_country` FOREIGN KEY (`id_country`) REFERENCES `country` (`id_country`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `ports` */

insert  into `ports`(`id_port`,`name`,`abr`,`description`,`cod_port`,`id_country`,`status`,`date_created`,`date_updated`) values 
(1,'puerto1','ABC','','0001',2,1,'2016-04-14 22:46:22','2016-05-15 13:51:32'),
(2,'aaaaaaaaa','aaaaaaaaaa','aaaaaaaaaaaaaaaaaaa','aaaaaaaaaaaaaaa',1,1,'2016-04-14 22:46:53','2016-04-30 13:36:26');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `id_product_type` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `products` */

insert  into `products`(`id_product`,`name`,`description`,`id_product_type`,`status`,`date_created`,`date_updated`) values 
(1,'camaron','camaron',1,1,'2016-04-12 17:54:03','2016-05-15 13:04:13'),
(2,'CAMARON2','CAMARON2',0,1,'2016-04-15 17:03:41','2016-04-15 17:03:41');

/*Table structure for table `products_type` */

DROP TABLE IF EXISTS `products_type`;

CREATE TABLE `products_type` (
  `id_product_type` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `abr` varchar(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id_product_type`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `products_type` */

insert  into `products_type`(`id_product_type`,`name`,`description`,`abr`,`status`,`date_created`,`date_updated`) values 
(1,'CAMARON','40/40','40/40',1,'2016-04-14 21:59:45','2016-04-18 16:20:25'),
(5,'CAMARON','40/50','40/50',1,'2016-04-15 17:12:49','2016-04-18 16:20:26'),
(6,'40/40','40/40','40/40',1,'2016-04-30 13:41:42','2016-04-30 13:41:42');

/*Table structure for table `providers` */

DROP TABLE IF EXISTS `providers`;

CREATE TABLE `providers` (
  `id_provider` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id_provider`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `providers` */

/*Table structure for table `regions` */

DROP TABLE IF EXISTS `regions`;

CREATE TABLE `regions` (
  `id_region` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `abr` varchar(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id_region`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `regions` */

insert  into `regions`(`id_region`,`name`,`abr`,`status`,`date_created`,`date_updated`) values 
(1,'NORTE AMERICA','NOR',0,'2016-04-14 22:33:45','2016-04-30 13:38:29'),
(2,'ASIA','AS',1,'2016-04-14 22:33:45','2016-04-16 11:02:57'),
(3,'EUROPA','EUR',0,'2016-04-14 22:33:45','2016-04-18 16:58:05'),
(4,'OCEANIA','OCE',1,'2016-04-14 22:33:45','2016-04-18 15:55:27'),
(5,'SUR AMERICA','SA',1,'2016-04-14 22:33:45','2016-04-18 15:55:28'),
(6,'CENTRO AMERICA','CA',1,'2016-04-14 22:33:45','2016-04-18 15:55:29'),
(7,'CARIBE','CAR',1,'2016-04-14 22:33:45','2016-04-18 15:55:29'),
(8,'MEDIO ORIENTE','MEDO',1,'2016-04-14 22:33:45','2016-04-16 11:01:50');

/*Table structure for table `shipping_lines` */

DROP TABLE IF EXISTS `shipping_lines`;

CREATE TABLE `shipping_lines` (
  `id_shipping_lines` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `abr` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `phone1` tinytext,
  `phone2` tinytext,
  `email1` text,
  `email2` text,
  `contact1` text,
  `phone_contact1` tinytext,
  `email_contact1` text,
  `contact2` text,
  `phone_contact2` tinytext,
  `email_contact2` text,
  PRIMARY KEY (`id_shipping_lines`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `shipping_lines` */

insert  into `shipping_lines`(`id_shipping_lines`,`name`,`status`,`date_created`,`date_updated`,`abr`,`address`,`phone1`,`phone2`,`email1`,`email2`,`contact1`,`phone_contact1`,`email_contact1`,`contact2`,`phone_contact2`,`email_contact2`) values 
(1,'linea',0,'2016-04-05 20:56:01','2016-04-30 15:33:59','l','dirección','1234567890','','','','','','','contact2','1234567890','deandrademarcos@gmail.com'),
(2,'linea 2',1,'2016-04-05 20:56:19','2016-04-28 21:27:43','l2','direccion','02128601223','','','','','','','','',''),
(3,'aaaaa',1,'2016-04-15 16:39:38','2016-04-28 21:27:43','aaa','aaaaaaaaaaaa','1234567890','','','','','','','','','');

/*Table structure for table `states` */

DROP TABLE IF EXISTS `states`;

CREATE TABLE `states` (
  `id_state` int(11) NOT NULL AUTO_INCREMENT,
  `id_country` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id_state`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `states` */

insert  into `states`(`id_state`,`id_country`,`name`,`status`,`date_created`,`date_updated`) values 
(1,1,'MIRANDA',1,'2016-05-15 13:33:14','2016-05-15 13:33:33'),
(2,1,'DISTRITO CAPITAL',1,'2016-05-15 13:33:47','2016-05-15 13:33:47');

/*Table structure for table `status` */

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `status` */

insert  into `status`(`id_status`,`name`,`date_created`,`date_updated`) values 
(0,'DESACTIVADO','2016-04-05 16:40:19','2016-04-05 16:40:23'),
(1,'ACTIVO','2016-04-05 16:40:30','2016-04-05 16:40:33');

/*Table structure for table `tables` */

DROP TABLE IF EXISTS `tables`;

CREATE TABLE `tables` (
  `id_table` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `abr` varchar(3) NOT NULL,
  `status` int(1) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id_table`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `tables` */

insert  into `tables`(`id_table`,`name`,`description`,`abr`,`status`,`date_created`,`date_updated`) values 
(1,'company','Compañia','COM',1,'2016-05-08 12:09:10','2016-05-08 12:09:13'),
(2,'clients','Cliente','CLI',1,'2016-05-08 12:09:10','2016-05-08 12:09:13'),
(3,'farms','Granja','FAR',1,'2016-05-08 12:09:10','2016-05-08 12:09:13'),
(4,'brokers','Broker','BRO',1,'2016-05-08 12:09:10','2016-05-08 12:09:13'),
(6,'plants','Planta procesadora','PLA',1,'2016-05-08 12:09:10','2016-05-08 12:09:13');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `mail` varchar(45) NOT NULL,
  `mail_alternative` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id_user`,`login`,`password`,`status`,`date_created`,`date_updated`,`mail`,`mail_alternative`) values 
(1,'mdeandrade','18bfddf1020067bbd33fad652bc8f1a59b2427ff8c7ebfd62bbfef6c2dddff49',1,'2016-04-02 20:55:08','2016-04-28 19:42:46','',NULL),
(7,'admin','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92',1,'2016-05-08 11:51:43','2016-05-08 11:51:43','',NULL);

/*Table structure for table `users_company` */

DROP TABLE IF EXISTS `users_company`;

CREATE TABLE `users_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `users_company` */

insert  into `users_company`(`id`,`id_user`,`id_company`,`status`,`date_created`,`date_updated`) values 
(1,2,1,0,'0000-00-00 00:00:00','2016-04-05 16:42:04'),
(2,2,2,0,'0000-00-00 00:00:00','2016-04-03 12:07:48'),
(3,3,3,0,'0000-00-00 00:00:00','2016-04-05 16:42:13'),
(4,4,4,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(6,6,6,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(7,1,1,0,'2016-04-02 19:39:23','2016-04-02 19:39:23'),
(8,1,1,0,'2016-04-02 19:58:37','2016-04-02 19:58:37'),
(9,1,1,0,'2016-04-02 20:00:54','2016-04-02 20:00:54'),
(10,1,1,0,'2016-04-02 20:06:21','2016-04-02 20:06:21'),
(11,1,1,0,'2016-04-02 20:15:33','2016-04-02 20:15:33'),
(12,2,1,1,'2016-04-02 21:28:41','2016-04-03 11:51:00'),
(13,4,2,0,'2016-04-03 17:44:48','2016-04-03 17:44:48'),
(14,5,3,1,'2016-04-03 20:38:36','2016-04-03 20:38:36'),
(15,6,3,0,'0000-00-00 00:00:00','0000-00-00 00:00:00');

/*Table structure for table `users_data` */

DROP TABLE IF EXISTS `users_data`;

CREATE TABLE `users_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `second_name` varchar(45) DEFAULT NULL,
  `first_last_name` varchar(45) NOT NULL,
  `second_last_name` varchar(45) DEFAULT NULL,
  `nationality` varchar(1) NOT NULL,
  `document` varchar(45) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(1) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `phone1` varchar(45) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `users_data` */

insert  into `users_data`(`id`,`id_users`,`first_name`,`second_name`,`first_last_name`,`second_last_name`,`nationality`,`document`,`birthdate`,`gender`,`phone`,`phone1`,`date_created`,`date_updated`) values 
(1,2,'MARCOS','ARLINDO','DE ANDRADE','CARRERA','V','18020594',NULL,'M','04268141850',NULL,'2016-04-02 21:28:41','2016-04-02 21:28:41'),
(2,3,'Marcos ','arlindo','DE ANDRADE','CARRERA','V','18020594',NULL,'M','04268141850',NULL,'2016-04-03 17:41:26','2016-04-03 17:41:26'),
(3,4,'Marcos','arlindo','DE ANDRADE','CARRERA','V','18020594',NULL,'M','04142695880',NULL,'2016-04-03 17:44:48','2016-04-03 17:44:48'),
(4,5,'jean','maiker','de andrade','carrera ','V','20303709',NULL,'M','04163030894',NULL,'2016-04-03 20:38:36','2016-04-03 20:38:36'),
(5,6,'jean','maiker','de andrade','carrera','V','20303709',NULL,'M','04163030894',NULL,'2016-04-03 20:50:13','2016-04-03 20:50:22');

/*Table structure for table `users_perms` */

DROP TABLE IF EXISTS `users_perms`;

CREATE TABLE `users_perms` (
  `id_user` int(11) NOT NULL,
  `id_perms` int(11) NOT NULL,
  `status` int(11) DEFAULT '0',
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`,`id_perms`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `users_perms` */

insert  into `users_perms`(`id_user`,`id_perms`,`status`,`date_created`,`date_updated`) values 
(1,3,1,'2016-04-02 22:00:27','2016-04-02 22:00:29'),
(2,3,0,'2016-04-02 22:00:27','2016-04-03 12:07:48'),
(5,3,0,'2016-04-03 20:38:37','2016-04-03 20:38:37'),
(6,4,0,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
