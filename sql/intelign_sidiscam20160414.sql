/*
SQLyog Community v12.15 (64 bit)
MySQL - 5.5.47-0ubuntu0.14.04.1 : Database - intelign_sidiscam
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
  `id_country` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone1` varchar(20) NOT NULL,
  `phone2` varchar(20) NOT NULL,
  `email1` varchar(100) NOT NULL,
  `email2` varchar(100) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `aba` varchar(100) NOT NULL,
  `swif` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id_bank`),
  KEY `bank_country` (`id_country`),
  CONSTRAINT `bank_country` FOREIGN KEY (`id_country`) REFERENCES `country` (`id_country`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `bank` */

insert  into `bank`(`id_bank`,`name`,`id_country`,`address`,`phone1`,`phone2`,`email1`,`email2`,`account_number`,`aba`,`swif`,`status`,`date_created`,`date_updated`) values 
(1,'BANCO',1,'','phone1','phone2','email1','email2','account_number','aba','swif',1,'2016-04-14 23:04:02','2016-04-14 23:05:48');

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
  PRIMARY KEY (`id_broker`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `brokers` */

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
  `id_client` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `clients` */

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rif` varchar(45) NOT NULL,
  `razon_social` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `company` */

insert  into `company`(`id`,`rif`,`razon_social`,`status`,`date_created`,`date_updated`) values 
(1,'V-20303709-7','razon social de prueba',1,'2016-04-02 21:28:41','2016-04-03 11:51:00'),
(2,'V-18020594-9','marcos',0,'2016-04-03 17:44:48','2016-04-03 12:07:48'),
(3,'V-20303709-7','jean',1,'2016-04-03 20:38:36','2016-04-03 20:55:58');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `country` */

insert  into `country`(`id_country`,`id_region`,`name`,`abr`,`status`,`date_created`,`date_updated`) values 
(1,5,'Venezuela','VE',1,'2016-04-05 20:58:17','2016-04-14 22:14:29');

/*Table structure for table `farms` */

DROP TABLE IF EXISTS `farms`;

CREATE TABLE `farms` (
  `id_farm` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id_farm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `farms` */

/*Table structure for table `incoterms` */

DROP TABLE IF EXISTS `incoterms`;

CREATE TABLE `incoterms` (
  `id_incoterm` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id_incoterm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `incoterms` */

/*Table structure for table `ports` */

DROP TABLE IF EXISTS `ports`;

CREATE TABLE `ports` (
  `id_port` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `abr` varchar(10) NOT NULL,
  `description` varchar(200) NOT NULL,
  `cod_port` varchar(30) NOT NULL,
  `id_country` int(11) NOT NULL,
  `id_region` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id_port`),
  KEY `port_country` (`id_country`),
  KEY `port_region` (`id_region`),
  CONSTRAINT `port_region` FOREIGN KEY (`id_region`) REFERENCES `regions` (`id_region`),
  CONSTRAINT `port_country` FOREIGN KEY (`id_country`) REFERENCES `country` (`id_country`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `ports` */

insert  into `ports`(`id_port`,`name`,`abr`,`description`,`cod_port`,`id_country`,`id_region`,`status`,`date_created`,`date_updated`) values 
(1,'Puero1','Abreviatur','Descripción','Código',1,1,1,'2016-04-14 22:46:22','2016-04-14 22:46:22'),
(2,'aaaaaaaaa','aaaaaaaaaa','aaaaaaaaaaaaaaaaaaa','aaaaaaaaaaaaaaa',1,1,1,'2016-04-14 22:46:53','2016-04-14 22:46:53');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `products` */

insert  into `products`(`id_product`,`name`,`description`,`status`,`date_created`,`date_updated`) values 
(1,'camaron','camaron',1,'2016-04-12 17:54:03','2016-04-14 21:44:46');

/*Table structure for table `products_type` */

DROP TABLE IF EXISTS `products_type`;

CREATE TABLE `products_type` (
  `id_product_type` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `abr` varchar(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id_product_type`),
  KEY `produc_product_type` (`id_product`),
  CONSTRAINT `produc_product_type` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `products_type` */

insert  into `products_type`(`id_product_type`,`id_product`,`name`,`description`,`abr`,`status`,`date_created`,`date_updated`) values 
(1,1,'40/40','CAMARON SIN CABEZA','40/40',1,'2016-04-14 21:59:45','2016-04-14 22:00:44');

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
(1,'NORTE AMERICA','t',1,'2016-04-14 22:33:45','2016-04-14 22:34:20'),
(2,'ASIA','',1,'2016-04-14 22:33:45','2016-04-14 22:33:45'),
(3,'EUROPA','',1,'2016-04-14 22:33:45','2016-04-14 22:33:45'),
(4,'OCEANIA','',1,'2016-04-14 22:33:45','2016-04-14 22:33:45'),
(5,'SUR AMERICA','',1,'2016-04-14 22:33:45','2016-04-14 22:33:45'),
(6,'CENTRO AMERICA','',1,'2016-04-14 22:33:45','2016-04-14 22:33:45'),
(7,'CARIBE','',1,'2016-04-14 22:33:45','2016-04-14 22:33:45'),
(8,'MEDIO ORIENTE','',1,'2016-04-14 22:33:45','2016-04-14 22:33:45');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `shipping_lines` */

insert  into `shipping_lines`(`id_shipping_lines`,`name`,`status`,`date_created`,`date_updated`,`abr`,`address`,`phone1`,`phone2`,`email1`,`email2`,`contact1`,`phone_contact1`,`email_contact1`,`contact2`,`phone_contact2`,`email_contact2`) values 
(1,'linea 1',1,'2016-04-05 20:56:01','2016-04-14 21:44:09','l1','address','phone1','phone2','email1','email2','contact1',' phone_contact1','email_contact1','contact2','phone_contact2','email_contact2'),
(2,'linea 2',0,'2016-04-05 20:56:19','2016-04-05 20:56:27','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

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
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id_user`,`login`,`password`,`status`,`date_created`,`date_updated`,`mail`,`mail_alternative`) values 
(1,'mdeandrade','18bfddf1020067bbd33fad652bc8f1a59b2427ff8c7ebfd62bbfef6c2dddff49',1,'2016-04-02 20:55:08','2016-04-05 20:37:31','',NULL),
(2,'M-V18020594','cd19ffa6452e2a0a0d0a4fcd4197e16789b627bd20da6883593d36fcfba733ec',0,'2016-04-02 21:28:41','2016-04-03 12:07:48','deandrademarcos@gmail.com',NULL),
(3,'M-V18020594','a2ba9b5660b268265788d2323285226620c610b2e2cf0b3cec6fbcc30875ad7e',1,'2016-04-03 17:41:26','2016-04-03 20:55:58','deandrademarcos@hotmail.com','deandrademarcos@hotmail.com'),
(4,'M-V18020594','9e6174adf47fdc4f671977510ccb7a52fd9f05d722ece859c070cc89f53fd688',1,'2016-04-03 17:44:48','2016-04-03 17:44:48','deandrademarcos@hotmail.com','deandrademarcos@hotmail.com'),
(5,'M-V20303709','35922aa7db6be7607d2c79dfe8cb6cadcbf7a6e32be47a509353e2cdc77333a8',1,'2016-04-03 20:38:36','2016-04-03 20:38:36','jeancufm@gmail.com','jeancufm@gmail.com'),
(6,'O-V20303709','18bfddf1020067bbd33fad652bc8f1a59b2427ff8c7ebfd62bbfef6c2dddff49',1,'2016-04-03 20:50:13','2016-04-03 20:50:13','jeancufm@gmail.com',NULL);

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
