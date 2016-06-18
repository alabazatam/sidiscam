/*
SQLyog Community v12.15 (64 bit)
MySQL - 5.5.49-0ubuntu0.14.04.1 : Database - intelign_sidiscam
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`intelign_sidiscam` /*!40100 DEFAULT CHARACTER SET utf8 */;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `banks_tables_id` */

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

/*Table structure for table `clients_address_detail` */

DROP TABLE IF EXISTS `clients_address_detail`;

CREATE TABLE `clients_address_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `id_country` int(11) NOT NULL,
  `address` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `clients_address_detail` */

insert  into `clients_address_detail`(`id`,`id_client`,`id_country`,`address`,`status`,`date_created`,`date_updated`) values 
(1,1,1,'direccion1',1,'2016-06-09 23:13:59','2016-06-09 23:13:59'),
(2,1,1,'direccion2',1,'2016-06-09 23:14:57','2016-06-09 23:14:57'),
(3,1,2,'direccion3',1,'2016-06-09 23:15:32','2016-06-09 23:15:32'),
(4,1,1,'direccion4',1,'2016-06-09 23:21:11','2016-06-09 23:21:11'),
(5,1,2,'fgfgfgf',1,'2016-06-09 23:22:07','2016-06-09 23:22:07');

/*Table structure for table `clients_banks_detail` */

DROP TABLE IF EXISTS `clients_banks_detail`;

CREATE TABLE `clients_banks_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `number` varchar(50) NOT NULL,
  `id_country` int(11) NOT NULL,
  `aba` varchar(50) NOT NULL,
  `swit` varchar(50) NOT NULL,
  `iban` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

/*Data for the table `clients_banks_detail` */

insert  into `clients_banks_detail`(`id`,`id_client`,`bank_name`,`number`,`id_country`,`aba`,`swit`,`iban`,`status`,`date_created`,`date_updated`) values 
(6,1,'MERCANTIL','12345678901234567890',1,'ABA1','SWIT','IBAN',1,'2016-06-09 22:21:42','2016-06-09 22:21:42'),
(29,2,'notobank','54545454554',1,'1','1','1',1,'2016-06-09 22:32:58','2016-06-09 22:32:58'),
(36,2,'','',2,'','','',1,'2016-06-09 22:55:36','2016-06-09 22:55:36');

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

/*Table structure for table `containers` */

DROP TABLE IF EXISTS `containers`;

CREATE TABLE `containers` (
  `id_container` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id_container`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `containers` */

insert  into `containers`(`id_container`,`name`,`status`,`date_created`,`date_updated`) values 
(1,'CONTAINER',1,'2016-06-03 22:46:13','2016-06-03 22:46:16');

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
) ENGINE=InnoDB AUTO_INCREMENT=242 DEFAULT CHARSET=utf8;

/*Data for the table `country` */

insert  into `country`(`id_country`,`id_region`,`name`,`abr`,`status`,`date_created`,`date_updated`) values 
(1,5,'VENEZUELA','VE',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(2,2,'AFGANISTÁN','AF',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(3,3,'ALBANIA','AL',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(4,3,'ALEMANIA','DE',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(5,9,'ALGERIA','DZ',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(6,3,'ANDORRA','AD',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(7,9,'ANGOLA','AO',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(8,1,'ANGUILA','AI',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(9,1,'ANTIGUA Y BARBUDA','AG',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(10,3,'ANTILLAS NEERLANDESAS','AN',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(11,2,'ARABIA SAUDITA','SA',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(12,5,'ARGENTINA','AR',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(13,2,'ARMENIA','AM',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(14,1,'ARUBA','AW',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(15,4,'AUSTRALIA','AU',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(16,3,'AUSTRIA','AT',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(17,2,'AZERBAYÁN','AZ',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(18,7,'BAHAMAS','BS',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(19,2,'BAHREIN','BH',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(20,2,'BANGLADESH','BD',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(21,1,'BARBADOS','BB',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(22,3,'BÉLGICA','BE',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(23,6,'BELICE','BZ',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(24,9,'BENÍN','BJ',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(25,2,'BHUTÁN','BT',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(26,3,'BIELORRUSIA','BY',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(27,2,'BIRMANIA','MM',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(28,5,'BOLIVIA','BO',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(29,3,'BOSNIA Y HERZEGOVINA','BA',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(30,9,'BOTSUANA','BW',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(31,5,'BRASIL','BR',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(32,2,'BRUNÉI','BN',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(33,3,'BULGARIA','BG',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(34,9,'BURKINA FASO','BF',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(35,9,'BURUNDI','BI',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(36,9,'CABO VERDE','CV',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(37,2,'CAMBOYA','KH',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(38,9,'CAMERÚN','CM',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(39,1,'CANADÁ','CA',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(40,9,'CHAD','TD',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(41,5,'CHILE','CL',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(42,2,'CHINA','CN',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(43,2,'CHIPRE','CY',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(44,3,'CIUDAD DEL VATICANO','VA',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(45,5,'COLOMBIA','CO',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(46,9,'COMORAS','KM',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(47,9,'CONGO','CD',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(48,9,'CONGO','CG',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(49,2,'COREA DEL NORTE','KP',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(50,2,'COREA DEL SUR','KR',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(51,9,'COSTA DE MARFIL','CI',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(52,6,'COSTA RICA','CR',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(53,3,'CROACIA','HR',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(54,7,'CUBA','CU',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(55,3,'DINAMARCA','DK',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(56,1,'DOMINICA','DM',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(57,5,'ECUADOR','EC',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(58,9,'EGIPTO','EG',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(59,6,'EL SALVADOR','SV',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(60,2,'EMIRATOS ÁRABES UNIDOS','AE',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(61,9,'ERITREA','ER',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(62,3,'ESLOVAQUIA','SK',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(63,3,'ESLOVENIA','SI',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(64,3,'ESPAÑA','ES',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(65,1,'ESTADOS UNIDOS DE AMÉRICA','US',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(66,3,'ESTONIA','EE',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(67,9,'ETIOPÍA','ET',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(68,2,'FILIPINAS','PH',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(69,3,'FINLANDIA','FI',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(70,4,'FIYI','FJ',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(71,3,'FRANCIA','FR',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(72,9,'GABÓN','GA',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(73,9,'GAMBIA','GM',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(74,2,'GEORGIA','GE',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(75,9,'GHANA','GH',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(76,3,'GIBRALTAR','GI',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(77,1,'GRANADA','GD',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(78,3,'GRECIA','GR',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(79,1,'GROENLANDIA','GL',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(80,1,'GUADALUPE','GP',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(81,4,'GUAM','GU',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(82,6,'GUATEMALA','GT',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(83,5,'GUAYANA FRANCESA','GF',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(84,3,'GUERNSEY','GG',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(85,9,'GUINEA','GN',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(86,9,'GUINEA ECUATORIAL','GQ',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(87,9,'GUINEA-BISSAU','GW',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(88,5,'GUYANA','GY',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(89,1,'HAITÍ','HT',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(90,6,'HONDURAS','HN',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(91,2,'HONG KONG','HK',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(92,3,'HUNGRÍA','HU',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(93,2,'INDIA','IN',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(94,2,'INDONESIA','ID',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(95,2,'IRAK','IQ',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(96,2,'IRÁN','IR',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(97,3,'IRLANDA','IE',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(98,3,'ISLA DE MAN','IM',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(99,2,'ISLA DE NAVIDAD','CX',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(100,4,'ISLA NORFOLK','NF',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(101,3,'ISLANDIA','IS',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(102,1,'ISLAS BERMUDAS','BM',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(103,1,'ISLAS CAIMÁN','KY',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(104,2,'ISLAS COCOS (KEELING)','CC',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(105,4,'ISLAS COOK','CK',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(106,3,'ISLAS DE ÁLAND','AX',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(107,3,'ISLAS FEROE','FO',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(108,2,'ISLAS MALDIVAS','MV',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(109,5,'ISLAS MALVINAS','FK',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(110,4,'ISLAS MARIANAS DEL NORTE','MP',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(111,4,'ISLAS MARSHALL','MH',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(112,4,'ISLAS PITCAIRN','PN',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(113,4,'ISLAS SALOMÓN','SB',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(114,1,'ISLAS TURCAS Y CAICOS','TC',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(115,1,'ISLAS ULTRAMARINAS MENORES DE ESTADOS UNIDOS','UM',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(116,1,'ISLAS VÍRGENES BRITÁNICAS','VG',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(117,1,'ISLAS VÍRGENES DE LOS ESTADOS UNIDOS','VI',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(118,2,'ISRAEL','IL',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(119,3,'ITALIA','IT',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(120,7,'JAMAICA','JM',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(121,2,'JAPÓN','JP',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(122,3,'JERSEY','JE',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(123,2,'JORDANIA','JO',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(124,2,'KAZAJISTÁN','KZ',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(125,9,'KENIA','KE',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(126,2,'KIRGIZSTÁN','KG',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(127,4,'KIRIBATI','KI',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(128,2,'KUWAIT','KW',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(129,2,'LAOS','LA',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(130,9,'LESOTO','LS',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(131,3,'LETONIA','LV',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(132,2,'LÍBANO','LB',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(133,9,'LIBERIA','LR',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(134,9,'LIBIA','LY',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(135,3,'LIECHTENSTEIN','LI',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(136,3,'LITUANIA','LT',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(137,3,'LUXEMBURGO','LU',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(138,2,'MACAO','MO',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(139,3,'MACEDÓNIA','MK',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(140,9,'MADAGASCAR','MG',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(141,2,'MALASIA','MY',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(142,9,'MALAWI','MW',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(143,9,'MALI','ML',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(144,3,'MALTA','MT',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(145,9,'MARRUECOS','MA',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(146,1,'MARTINICA','MQ',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(147,9,'MAURICIO','MU',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(148,9,'MAURITANIA','MR',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(149,9,'MAYOTTE','YT',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(150,6,'MÉXICO','MX',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(151,2,'MICRONESIA','FM',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(152,3,'MOLDAVIA','MD',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(153,3,'MÓNACO','MC',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(154,2,'MONGOLIA','MN',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(155,2,'MONTENEGRO','ME',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(156,1,'MONTSERRAT','MS',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(157,9,'MOZAMBIQUE','MZ',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(158,9,'NAMIBIA','NA',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(159,4,'NAURU','NR',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(160,2,'NEPAL','NP',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(161,6,'NICARAGUA','NI',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(162,9,'NIGER','NE',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(163,9,'NIGERIA','NG',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(164,4,'NIUE','NU',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(165,3,'NORUEGA','NO',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(166,4,'NUEVA CALEDONIA','NC',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(167,4,'NUEVA ZELANDA','NZ',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(168,2,'OMÁN','OM',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(169,3,'PAÍSES BAJOS','NL',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(170,2,'PAKISTÁN','PK',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(171,4,'PALAU','PW',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(172,2,'PALESTINA','PS',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(173,6,'PANAMÁ','PA',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(174,4,'PAPÚA NUEVA GUINEA','PG',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(175,5,'PARAGUAY','PY',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(176,5,'PERÚ','PE',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(177,4,'POLINESIA FRANCESA','PF',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(178,3,'POLONIA','PL',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(179,3,'PORTUGAL','PT',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(180,7,'PUERTO RICO','PR',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(181,2,'QATAR','QA',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(182,3,'REINO UNIDO','GB',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(183,9,'REPÚBLICA CENTROAFRICANA','CF',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(184,3,'REPÚBLICA CHECA','CZ',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(185,7,'REPÚBLICA DOMINICANA','DO',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(186,9,'REUNIÓN','RE',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(187,9,'RUANDA','RW',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(188,3,'RUMANÍA','RO',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(189,3,'RUSIA','RU',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(190,9,'SAHARA OCCIDENTAL','EH',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(191,4,'SAMOA','WS',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(192,4,'SAMOA AMERICANA','AS',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(193,1,'SAN BARTOLOMÉ','BL',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(194,1,'SAN CRISTÓBAL Y NIEVES','KN',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(195,3,'SAN MARINO','SM',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(196,1,'SAN MARTÍN (FRANCIA)','MF',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(197,1,'SAN PEDRO Y MIQUELÓN','PM',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(198,1,'SAN VICENTE Y LAS GRANADINAS','VC',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(199,9,'SANTA ELENA','SH',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(200,1,'SANTA LUCÍA','LC',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(201,9,'SANTO TOMÉ Y PRÍNCIPE','ST',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(202,9,'SENEGAL','SN',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(203,2,'SERBIA','RS',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(204,9,'SEYCHELLES','SC',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(205,9,'SIERRA LEONA','SL',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(206,2,'SINGAPUR','SG',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(207,2,'SIRIA','SY',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(208,9,'SOMALIA','SO',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(209,2,'SRI LANKA','LK',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(210,9,'SUDÁFRICA','ZA',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(211,9,'SUDÁN','SD',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(212,3,'SUECIA','SE',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(213,3,'SUIZA','CH',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(214,5,'SURINÁM','SR',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(215,3,'SVALBARD Y JAN MAYEN','SJ',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(216,9,'SWAZILANDIA','SZ',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(217,2,'TAILANDIA','TH',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(218,2,'TAIWÁN','TW',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(219,2,'TAJIKISTAN','TJ',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(220,9,'TANZANIA','TZ',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(221,3,'TERRITORIO BRITÁNICO DEL OCÉANO ÍNDICO','IO',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(222,4,'TIMOR ORIENTAL','TL',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(223,9,'TOGO','TG',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(224,4,'TOKELAU','TK',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(225,4,'TONGA','TO',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(226,1,'TRINIDAD Y TOBAGO','TT',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(227,9,'TUNEZ','TN',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(228,2,'TURKMENISTÁN','TM',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(229,3,'TURQUÍA','TR',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(230,4,'TUVALU','TV',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(231,3,'UCRANIA','UA',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(232,9,'UGANDA','UG',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(233,5,'URUGUAY','UY',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(234,2,'UZBEKISTAN','UZ',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(235,4,'VANUATU','VU',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(236,2,'VIETNAM','VN',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(237,4,'WALLIS Y FUTUNA','WF',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(238,2,'YEMEN','YE',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(239,9,'YIBUTI','DJ',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(240,9,'ZAMBIA','ZM',1,'2016-06-08 00:00:00','2016-06-08 00:00:00'),
(241,9,'ZIMBABUE','ZW',1,'2016-06-08 00:00:00','2016-06-08 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `incoterms` */

insert  into `incoterms`(`id_incoterm`,`name`,`abr`,`detail`,`status`,`date_created`,`date_updated`) values 
(1,'Cost and FReight','CFR','Costo y Flete. El vendedor se hace cargo de todos los costos y el transporte principal, hasta que la mercancía llegue al puerto de destino. El riesgo se transfiere al comprador en el momento que la mercancía se encuentra cargada en el buque, en el país de origen',1,'2016-04-30 12:39:20','2016-05-08 12:13:32'),
(2,'Cost Insurance and Freight','CIF','Costo Seguro y Flete. El vendedor se hace cargo de todos los costos, incluidos el transporte principal y el seguro, hasta que la mercancía llegue al puerto de destino. Aunque el seguro lo ha contratado el vendedor, el beneficiario del seguro es el comprador',1,'2016-04-30 12:39:20','2016-05-08 12:13:32'),
(3,'Carriage and Insurance Paid to','CIP','Porte y Seguro Pagado Hasta. El vendedor se hace cargo de todos los costos hasta que la mercancía llegue al punto convenido en el país de destino. El riesgo se transfiere al comprador en el momento de la entrega de la mercancía al transportista dentro del país de origen',1,'2016-04-30 12:39:20','2016-05-08 12:13:32'),
(4,'Carriage Paid To','CPT','Porte Pagado Hasta. El vendedor asume todos los costos, incluido el transporte principal, hasta que la mercancía llegue al punto convenido en el país de destino. Sin embargo, el riesgo se transfiere al comprador en el momento de la entrega de la mercancía al transportista dentro del país de origen',1,'2016-04-30 12:39:20','2016-05-08 12:13:32'),
(5,'Delivered At Place','DAP','Entregado en un lugar. El vendedor asume todos los costos pero no de los costos asociados a la importación, hasta que la mercancía se ponga a disposición del comprador en un vehículo listo para ser descargado. También asume los riesgos hasta ese momento',1,'2016-04-30 12:39:20','2016-05-08 12:13:32'),
(6,'Delivered At Terminal','DAT','Entregado en terminal. El vendedor asume todos los costos, incluido: transporte principal y el seguro (que no es obligatorio), hasta que se descarga en el terminal convenido. También asume los riesgos hasta ese momento',1,'2016-04-30 12:39:20','2016-05-08 12:13:32'),
(7,'Delivered Duty Paid','DDP','Entregado con derechos pagados. El vendedor paga todos los gastos hasta dejar la mercancía en el punto convenido en el país de destino. El comprador no realiza ningún tipo de trámite. Los gastos de aduana de importación son asumidos por el vendedor',1,'2016-04-30 12:39:20','2016-05-08 12:13:32'),
(8,'EX Works','EXW','Puesto en Planta. El vendedor pone la mercancía a disposición del comprador en sus instalaciones o fábrica. Todos los gastos a partir de ese momento son por cuenta del comprador',1,'2016-04-30 12:39:20','2016-05-08 12:13:32'),
(9,'Free Alongside Ship','FAS','\"Libre a un Costado del Buque. El vendedor entrega la mercancía en el muelle pactado del puerto de carga convenido; esto es, al lado del barco. El vendedor es responsable de la gestión y costo de la aduana de exportación \"',1,'2016-04-30 12:39:20','2016-05-08 12:13:32'),
(10,'Free CArrier','FCA','Libre transportista. El vendedor se compromete a entregar la mercancía en un punto acordado dentro del país de origen, se hace cargo de los costos hasta que la mercancía está situada en ese punto convenido',1,'2016-04-30 12:39:20','2016-05-08 12:13:32'),
(11,'Free On Board','FOB','Libre a Bordo. El vendedor entrega la mercancía sobre el buque. El vendedor contrata el transporte a través de un transitario o un consignatario, pero el coste del transporte lo asume el comprador',1,'2016-04-30 12:39:20','2016-05-08 12:13:32');

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
  `description` varchar(200) NOT NULL,
  `cod_port` varchar(30) NOT NULL,
  `id_country` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id_port`),
  KEY `port_country` (`id_country`),
  CONSTRAINT `port_country` FOREIGN KEY (`id_country`) REFERENCES `country` (`id_country`)
) ENGINE=InnoDB AUTO_INCREMENT=750 DEFAULT CHARSET=utf8;

/*Data for the table `ports` */

insert  into `ports`(`id_port`,`name`,`description`,`cod_port`,`id_country`,`status`,`date_created`,`date_updated`) values 
(1,'CARACAS','','CCS',1,1,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(2,'EL GUAMACHE','','EGU',1,1,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(3,'GUANTA','','GUT',1,1,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(4,'PUERTO DE GUARANAO','','GUB',1,1,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(5,'LA GUAIRA','','LAG',1,1,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(6,'MARACAIBO','','MAR',1,1,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(7,'PORLAMAR','','PMV',1,1,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(8,'PUERTO CABELLO','','PBL',1,1,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(9,'AARHUS','','AAH',55,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(10,'ABU DHABI','','AUH',60,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(11,'ABUDJA','','ABV',163,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(12,'ACAJUTLA','','AQJ',59,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(13,'ACCRA','','ACC',75,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(14,'ADELAIDE','','ADL',15,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(15,'ALATAWSHANKOU','','AKL',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(16,'ALBUQUERQUE, NM','','ABQ',150,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(17,'ALEXANDRA','','ALR',167,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(18,'ALEXANDRIA','','ALX',182,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(19,'ALICANTE','','ALC',64,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(20,'ALTAMIRA','','ATM',31,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(21,'ALTAMIRA','','ATM',150,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(22,'AMBARLI','','PAM',229,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(23,'AMSTERDAM','','AMS',169,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(24,'ANCONA','','AOI',119,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(25,'ANGUILLA','','AXA',8,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(26,'ANQING','','AQG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(27,'ANSHAN','','ASN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(28,'ANTIGUA','','ANU',9,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(29,'ANTWERPEN','','ANR',22,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(30,'ARHAXAT','','ART',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(31,'ARICA','','ARI',41,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(32,'ARUBA','','AUA',14,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(33,'ASUNCION','','ASU',175,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(34,'ATLANTA','','ATL',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(35,'AUCKLAND','','AKL',167,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(36,'AUSTIN','','AUS',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(37,'BAHRAIN','','BAH',19,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(38,'BALBOA','','BLB',173,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(39,'BALTIMORE','','BAL',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(40,'BANGALORE','','BLR',93,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(41,'BANGKOK','','BKK',217,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(42,'BAO-AN','','BON',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(43,'BAOSHANMATOU','','BAO',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(44,'BARCELONA','','BCN',64,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(45,'BARRANQUILLA','','BAQ',45,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(46,'BASEL','','BSL',216,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(47,'BASSETERRE, ST KITTS','','BAS',194,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(48,'BASUO','','BAS',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(49,'BAYUQUAN','','BAY',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(50,'BEIHAI','','BHY',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(51,'BEIJIAO','','YQS',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(52,'BEIJING','','BJS',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(53,'BELGRADO','','BEG',203,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(54,'BELIZE CITY','','BZE',23,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(55,'BERGAMO','','BGY',119,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(56,'BERLIN','','BER',4,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(57,'BILBAO','','BIO',64,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(58,'BILLUND','','BLL',55,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(59,'BINZHOU','','BIN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(60,'BIRMINGHAM','','BHN',182,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(61,'BISSAU','','OXB',87,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(62,'BOGOTA','','BOG',45,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(63,'BOLUO','','BOO',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(64,'BOMBAY (MUMBAI)','','BOM',93,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(65,'BOSTON','','BOS',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(66,'BREMERHAVEN','','BRV',4,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(67,'BRIDGETOWN','','BGI',21,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(68,'BRIDGETOWN','','BJT',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(69,'BRISBANE','','BNE',15,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(70,'BRUSELAS','','BRU',22,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(71,'BUCHAREST','','OTP',188,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(72,'BUDAPEST','','BD',92,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(73,'BUENAVENTURA','','BUN',45,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(74,'BUENOS AIRES','','BUE',12,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(75,'BUFFALO','','BUF',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(76,'BUJI','','BUJ',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(77,'BURANG','','BUR',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(78,'CAACUPEMI','','CAA',175,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(79,'CADIZ','','CAD',64,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(80,'CAGLIARI','','CAG',119,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(81,'CAIRO','','CAI',58,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(82,'CALCUTTA','','CCU',93,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(83,'CALDERA','','CAL',52,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(84,'CALGARY','','YYC',39,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(85,'CALI','','CLO',45,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(86,'CALLAO','','CLL',176,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(87,'CAMBRIDGE','','CGE',167,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(88,'CAMBRIDGE CITY','','CCY',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(89,'CAPETOWN','','CPT',210,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(90,'CARTAGENA','','CTG',45,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(91,'CASABLANCA','','CMN',145,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(92,'CASTRIES (ST LUCIA)','','SLU',200,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(93,'CAUCEDO','','CAU',185,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(94,'CAYENNE','','CAY',83,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(95,'CEBU','','CEB',68,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(96,'CHANG ON','','CHO',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(97,'CHANG-AN','','CHN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(98,'CHANGCHUN','','CGQ',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(99,'CHANGPING','','CPG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(100,'CHANGSHA','','CSX',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(101,'CHANGSHU','','CGU',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(102,'CHANGZHOU','','CZX',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(103,'CHAOYANG','','CYG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(104,'CHAOZHOU','','COZ',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(105,'CHARLESTON','','CHS',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(106,'CHARLOTTE AMALIE, ST THOMAS','','CHA',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(107,'CHARLOTTE, NC','','CLT',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(108,'CHATTANOOGA, TN','','CHA',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(109,'CHENGAO','','CHE',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(110,'CHENGDU','','CTU',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(111,'CHENGHAI','','CHG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(112,'CHENGHAI LAIWU','','CGS',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(113,'CHENGLINGJI','','CLJ',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(114,'CHENNAI','','MAA',93,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(115,'CHICAGO','','CHI',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(116,'CHIMBOTE, PENSILVANIA','','CHM',176,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(117,'CHITTAGONG','','CGP',20,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(118,'CHIWAN','','CWN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(119,'CHONGQING','','CKG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(120,'CHRISTIANSTED, ST. CROIX','','CTD',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(121,'CINCINNATI','','CVG',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(122,'CIVITAVECCHIA','','CVV',119,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(123,'CLEVELAND','','CLE',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(124,'COCHABAMBA','','CBB',28,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(125,'COCO SOLITO','','CSO',173,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(126,'COLOMBO','','CMB',209,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(127,'COLON','','ONX',173,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(128,'COLON CONTAINER TERMINAL','','CCT',173,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(129,'COLON ZONA LIBRE','','CFZ',173,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(130,'COLUMBIA','','CAE',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(131,'COLUMBUS','','CSG',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(132,'CONCEPCION','','CNP',175,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(133,'CONGHUA','','CNH',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(134,'COPENHAGEN','','CPH',55,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(135,'COPENHAJEN','','CPH',55,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(136,'CORINTO','','CIO',161,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(137,'CORINTO','','CORI',161,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(138,'CORONEL','','CNL',41,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(139,'COTONOU','','COO',24,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(140,'CRISTOBAL','','CTB',173,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(141,'CURACAO','','CUR',10,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(142,'CURITIBA','','CWB',31,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(143,'DA NANG','','DAD',236,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(144,'DAAN','','DAN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(145,'DAGANG','','DAA',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(146,'DALIAN','','DLC',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(147,'DALIANXINGANG','','DXG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(148,'DALLAS, TX','','DFW',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(149,'DANDONG','','DDG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(150,'DANSHUI','','DNS',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(151,'DANZAO','','DNZ',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(152,'DAQING','','DQG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(153,'DAR ES SALAAM','','DAR',220,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(154,'DATIAN','','DTG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(155,'DATONG','','DAT',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(156,'DAYTON, OH','','DAY',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(157,'DEGRAD DES CANNES','','DDC',83,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(158,'DELHI','','DLI',39,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(159,'DELHI','','DEL',93,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(160,'DENVER','','DEN',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(161,'DETROIT','','DTR',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(162,'DIANBAI','','DNB',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(163,'DOHA','','DOH',181,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(164,'DOMINICA','','DOM',56,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(165,'DONGGUAN','','DGG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(166,'DONGJIAOTOU','','DJT',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(167,'DONGNING','','DON',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(168,'DONGSHAN','','DSN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(169,'DONGXING','','DOX',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(170,'DOUALA','','DLA',38,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(171,'DOUMEN','','DOU',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(172,'DUBAI','','DXB',60,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(173,'DUBLIN','','DUB',97,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(174,'DUSSELDORF','','DUS',4,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(175,'EDMONTON','','YEG',39,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(176,'EL PASO, TX','','ELP',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(177,'ELIZABETH','','ELZ',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(178,'ENPING','','ENP',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(179,'ENTEBBE','','EBB',232,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(180,'ERENHOT','','RLC',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(181,'ESTOCOLMO','','STO',212,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(182,'FANGCHENG','','FAN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(183,'FELIXSTOWE','','FXT',182,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(184,'FENGGANG','','FEN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(185,'FORTALEZA','','FOR',31,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(186,'FORT-DE-FRANCE','','FDF',146,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(187,'FOSHAN','','FOS',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(188,'FOS-SUR-MER','','FOS',71,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(189,'FRANKFURT/MAIN','','FRA',4,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(190,'FREDERICIA','','FRC',55,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(191,'FREEPORT','','FRX',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(192,'FREEPORT','','FPT',102,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(193,'FREEPORT, GRAND BAHAMA','','FPO',18,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(194,'FREETOWN','','FNA',205,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(195,'FREMANTLE','','FRE',15,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(196,'FT. DE FRANCE','','FDF',71,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(197,'FUJIN','','FUJ',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(198,'FUKUOKA','','FUK',121,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(199,'FUQING','','FUG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(200,'FUSHUN','','FSN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(201,'FUTIAN','','FUT',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(202,'FUXIN','','FUX',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(203,'FUYUAN','','FUY',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(204,'FUZHOU','','FOC',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(205,'GANQMOD','','GQD',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(206,'GAOGANG','','GAO',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(207,'GAOMING','','GOM',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(208,'GAOYAO','','GAY',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(209,'GDANSK','','GDN',178,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(210,'GDYNIA','','GDY',178,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(211,'GEMLIK','','GEM',229,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(212,'GENEVA','','GVA',216,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(213,'GENOA','','GOA',119,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(214,'GEORGE TOWN, GREAT EXUMA I.','','GGT',18,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(215,'GEORGETOWN','','GEW',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(216,'GEORGETOWN','','GEO',83,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(217,'GEORGETOWN','','GGT',120,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(218,'GEORGETOWN','','ASI',199,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(219,'GEORGETOWN, GRAND CAYMAN','','GEC',103,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(220,'GIJON','','GIJ',64,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(221,'GIOIA TAURO','','GIT',119,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(222,'GONGBEI','','GBP',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(223,'GRAND CAYMAN','','GCM',103,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(224,'GRAND TURK ISLAND','','GDT',114,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(225,'GREENBORO, NC','','GSO',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(226,'GRENADA','','GND',77,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(227,'GUADALAJARA','','GDL',150,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(228,'GUADALUPE','','GUA',201,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(229,'GUAN YAO','','GNY',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(230,'GUANGHAI','','GHI',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(231,'GUANGZHOU','','CAN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(232,'GUARULHOS','','GUARU',31,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(233,'GUATEMALA CITY','','GUA',82,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(234,'GUAYAQUIL','','GYE',57,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(235,'GUIGANG','','GUG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(236,'GUILIN','','KWL',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(237,'GUIYANG','','KWE',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(238,'GYIRONG','','GIR',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(239,'HABANA','','HAV',54,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(240,'HAIAN','','HAI',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(241,'HAICHENG','','HAG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(242,'HAIFA','','HFA',118,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(243,'HAIFENG','','HAF',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(244,'HAIKANG','','HKN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(245,'HAIKOU','','HAK',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(246,'HAILAR','','HLD',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(247,'HAIMEN','','HME',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(248,'HAIPHONG','','HPH',236,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(249,'HALIFAX','','HAL',39,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(250,'HAMBRIDGE','','HBR',182,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(251,'HAMBURG','','HAM',4,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(252,'HAMILTON','','BDA',102,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(253,'HAMILTON','','HLZ',167,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(254,'HAMILTON','','HMT',182,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(255,'HANGZHOU','','HGH',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(256,'HANKOU','','HNK',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(257,'HANNOVER','','HAJ',4,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(258,'HANOI','','HAN',236,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(259,'HARBIN','','HRB',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(260,'HARTFORD, PA','','BDL',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(261,'HEFEI','','HFE',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(262,'HEIHE','','HEK',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(263,'HEISHANTOU','','HST',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(264,'HEKOU','','HKM',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(265,'HELSINKI','','HEL',69,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(266,'HENGGANG','','HNG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(267,'HENGYANG','','HNY',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(268,'HEREDIA','','HER',52,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(269,'HESHAN','','HSN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(270,'HO CHI MINH CITY','','SGN',236,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(271,'HOHHOT','','HET',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(272,'HON CHONG','','HCH',236,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(273,'HONG KONG','','HKG',91,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(274,'HONGSHANZUI','','HSZ',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(275,'HORGOS','','HRS',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(276,'HOUSTON','','HOU',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(277,'HUA DU','','HUD',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(278,'HUACHUAN','','HCN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(279,'HUANGGANG','','HUG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(280,'HUANGPU','','HUA',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(281,'HUANGPU','','HUANG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(282,'HUANGSHAN','','HSH',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(283,'HUANGSHI','','HSI',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(284,'HUIZHOU','','HUI',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(285,'HULIN','','HUL',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(286,'HUMA','','HUM',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(287,'HUMEN','','HMN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(288,'HUNCHUN','','HUC',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(289,'HUZHOU','','HZH',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(290,'INCHEON','','JCN',50,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(291,'INDIANAPOLIS, IN','','IND',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(292,'IQUIQUE','','IQQ',41,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(293,'ISTANBUL','','IST',229,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(294,'ITAJAI','','ITJ',31,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(295,'ITAPOA','','IOA',31,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(296,'IZMIR (SMYRNA)','','IZM',229,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(297,'JACKSONVILLE','','JAX',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(298,'JAKARTA, JAVA','','JKT',94,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(299,'JEBEL ALI','','JEA',60,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(300,'JEMINAY','','JEM',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(301,'JI AN','','KNC',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(302,'JIADING','','JIG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(303,'JIAMUSI','','JMU',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(304,'JIANGMEN','','JMN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(305,'JIANGSHAN','','JIS',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(306,'JIANGYIN','','JIA',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(307,'JIAXING','','JIX',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(308,'JIAYIN','','JAY',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(309,'JIAZI','','JIZ',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(310,'JIEXI','','JXI',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(311,'JIEYANG','','JYG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(312,'JILIN','','JIL',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(313,'JINAN','','TNA',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(314,'JINGDEZHEN','','JDZ',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(315,'JINGHONG','','JHG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(316,'JINHUA','','JHA',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(317,'JINING','','JII',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(318,'JINING','','JNG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(319,'JINSHUIHE','','JSH',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(320,'JINZHOU','','JNZ',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(321,'JIUJIANG','','JIU',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(322,'JIUZHOU','','JZU',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(323,'JOHANNESBURG','','JNB',210,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(324,'JOHOR BAHRU','','JHB',141,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(325,'JORDAN','','JOR',118,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(326,'KAIKOU','','KAI',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(327,'KAISHANTUN','','KST',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(328,'KANSAS CITY','','MCI',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(329,'KAOHSIUNG','','KHH',218,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(330,'KARACHI','','KHI',170,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(331,'KASHI','','KHG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(332,'KEELUNG (CHILUNG)','','KEL',218,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(333,'KIEV','','KBP',231,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(334,'KIGALI','','KGL',187,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(335,'KINGSTON','','KIN',120,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(336,'KINGSTOWN, ST VINCENT','','KTN',198,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(337,'KNOXVILLE','','TYS',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(338,'KOBE','','UKB',121,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(339,'KOPER','','KOP',63,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(340,'KRALENDIJK, BONAIRE','','KRA',10,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(341,'KUALA LUMPUR','','KUL',141,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(342,'KUNJIRAP','','KJP',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(343,'KUNMING','','KMG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(344,'KUNSHAN','','KUS',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(345,'KUWAIT','','KWI',128,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(346,'LA CEIBA','','LCE',90,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(347,'LA PAZ','','LPB',28,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(348,'LA SPEZIA','','SPE',119,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(349,'LAGOS','','LOS',163,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(350,'LAIWU','','LWU',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(351,'LAIZHOU','','LAI',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(352,'LANSHAN','','LSN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(353,'LANZHOU','','LHW',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(354,'LAOYEMIAO','','LYM',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(355,'LAS AMERICAS','','SDQ',185,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(356,'LAS PALMAS DE GRAN CANARIA','','LPA',64,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(357,'LAZARO CARDENAS','','LZC',150,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(358,'LE HAVRE','','LEH',71,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(359,'LEIPZIG','','LEJ',4,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(360,'LEXINGTON','','LEX',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(361,'LHASA','','LXA',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(362,'LIANHUASHAN','','LIH',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(363,'LIANYUNGANG','','LYG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(364,'LILLE','','LIL',71,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(365,'LIMA','','LIM',176,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(366,'LINJIANG','','LIN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(367,'LINYI','','LYI',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(368,'LINZ','','LNZ',16,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(369,'LISBOA','','LIS',179,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(370,'LIUZHOU','','LZH',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(371,'LIVERPOOL','','LIV',182,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(372,'LIVORNO','','LIV',119,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(373,'LOME','','LFW',223,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(374,'LONDON GATEWAY PORT','','LGP',182,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(375,'LONDON HEATHROW AIRPORT','','LHR',182,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(376,'LONG BEACH','','LGB',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(377,'LONGKOU','','LKU',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(378,'LOS ANGELES','','LAX',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(379,'LOUISVILLE','','SDF',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(380,'LUANDA','','LAD',7,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(381,'LUOBEI','','LUB',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(382,'LUOYANG','','LYA',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(383,'LUSHUN','','LSH',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(384,'LUXEMBOURG','','LUX',137,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(385,'LYON','','LYS',71,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(386,'LYTTELTON','','LYT',167,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(387,'MAANSHAN','','MAA',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(388,'MADRID','','MAD',64,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(389,'MALABO','','SSG',85,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(390,'MALAGA','','AGP',64,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(391,'MALMOE','','MMA',212,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(392,'MALTA','','MLA',144,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(393,'MANAGUA','','MGA',161,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(394,'MANAUS','','MAO',31,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(395,'MANCHESTER','','MNC',182,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(396,'MANILA','','MNL',68,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(397,'MANTA','','MEC',57,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(398,'MANZANILLO','','MIT',169,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(399,'MANZANILLO','','MIT',173,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(400,'MANZANILLO MX','','ZLO',150,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(401,'MANZHOULI','','MLX',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(402,'MAOMING','','MMI',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(403,'MARIEL','','MAR',54,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(404,'MARIEL','','MAR',169,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(405,'MARSEILLE','','MRS',71,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(406,'MAWAN','','MWN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(407,'MAWEI','','MAW',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(408,'MAZATLAN','','MZT',150,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(409,'MAZONGSHAN','','MZS',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(410,'MEDELLIN','','MDE',45,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(411,'MEIZHOU','','MEZ',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(412,'MELBOURNE','','MEL',15,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(413,'MELILLA','','MLL',64,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(414,'MEMPHIS','','MEM',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(415,'MERIDA','','MID',64,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(416,'MEXICO CITY','','MEX',150,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(417,'MIAMI','','MIA',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(418,'MIDLANDS DEL ESTE','','EMA',182,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(419,'MILWAUKEE','','MKE',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(420,'MINNEAPOLIS','','MSP',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(421,'MISHAN','','MIS',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(422,'MOBILE','','MBL',3,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(423,'MOBILE','','MOB',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(424,'MOERDIJK','','MOE',169,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(425,'MOHAN','','MHN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(426,'MOHE','','MOH',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(427,'MOIN','','MOB',52,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(428,'MOMBASA','','MBA',125,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(429,'MONACO','','MON',153,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(430,'MONTEGO BAY','','MBJ',120,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(431,'MONTEVIDEO','','MVD',233,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(432,'MONTREAL','','MTR',39,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(433,'MONTSERRAT','','MNI',156,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(434,'MOSCÚ','','SVO',189,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(435,'MUBAREK TERMINAL','','MUB',60,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(436,'MULHOUSE','','MLH',71,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(437,'MUNICH','','MUC',4,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(438,'MUSCAT','','MCT',168,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(439,'NAGOYA','','NGO',121,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(440,'NAIROBI','','NBO',125,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(441,'NANAO','','NAN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(442,'NANCHANG','','KHN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(443,'NANGANG','','NGG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(444,'NANHAI','','NAH',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(445,'NANJING','','NKG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(446,'NANNING','','NNG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(447,'NANPING','','NAP',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(448,'NANSHA','','NSA',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(449,'NANTONG','','NTG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(450,'NANTOU','','NTU',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(451,'NANYANG','','NNY',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(452,'NAPOLI','','NAP',119,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(453,'NARITA TOKIO','','NRT',121,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(454,'NASHVILLE','','BNA',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(455,'NASSAU, NEW PROVIDENCE I.','','NAS',18,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(456,'NAVEGANTES','','NVT',31,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(457,'NEIAFU','','NEI',225,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(458,'NEVIS','','NEV',194,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(459,'NEW DELHI','','ICD',93,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(460,'NEW ORLEANS','','MSY',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(461,'NEW YORK','','NYC',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(462,'NEWARK','','EWR',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(463,'NHAVA SHEVA (JAWAHARLAL NEHRU)','','NSA',93,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(464,'NICE','','NCE',71,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(465,'NINGBO','','NGB',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(466,'NORFOLK','','NFK',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(467,'NUREMBERG','','NUE',4,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(468,'OAKLAND','','OAK',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(469,'OKLAHOMA CITY','','OKC',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(470,'OMAHA','','OMA',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(471,'OPORTO','','OPO',179,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(472,'ORANJESTAD','','ORJ',14,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(473,'ORLANDO','','MCO',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(474,'ORLEANS','','ORZ',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(475,'OSAKA','','OSA',121,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(476,'OSLO','','OSL',165,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(477,'OTTAWA','','YOW',39,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(478,'PAITA','','PAI',176,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(479,'PALERMO','','PMO',119,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(480,'PANAMA CENTRAL TERMINAL','','PCT',173,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(481,'PANAMA CITY','','PNA',173,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(482,'PANAMA INTERNATIONAL TERMINAL','','PSA',173,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(483,'PANYU','','PNY',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(484,'PARAMARIBO','','PBM',214,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(485,'PARANAGUA','','PNG',31,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(486,'PARIS','','CDG',71,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(487,'PASIR GUDANG, JOHOR','','PGU',141,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(488,'PENANG (GEORGETOWN)','','PEN',141,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(489,'PHILADELPHIA','','OHL',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(490,'PHILIPSBURG','','PHI',10,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(491,'PHNOM PENH','','PNH',37,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(492,'PHOENIX','','PHX',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(493,'PIETERSBURG','','PTG',210,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(494,'PING WU','','PGW',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(495,'PINGXIANG','','PIN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(496,'PIRAEUS','','PIR',78,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(497,'PITTSBURGH','','PIT',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(498,'PLOCE','','PLE',53,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(499,'PLYMOUTH','','PLY',226,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(500,'POINT LISAS','','PTS',226,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(501,'POINTE-À-PITRE','','PTP',80,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(502,'PORT ADELAIDE','','PAE',15,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(503,'PORT DE PAIX','','PDP',89,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(504,'PORT ELIZABETH','','PLZ',210,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(505,'PORT EVERGLADES','','PEF',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(506,'PORT KELANG','','PKG',141,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(507,'PORT OF DAMIETTA','','EGDAM',58,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(508,'PORT OF SPAIN','','POS',226,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(509,'PORT SAID','','EGPSD',58,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(510,'PORTALEGRE','','POR',179,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(511,'PORT-AU-PRINCE','','PAP',89,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(512,'PORTLAND','','PDX',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(513,'PORTO ALEGRE','','POA',31,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(514,'PRAGUE','','PRG',184,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(515,'PROGRESO','','PGO',150,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(516,'PROVIDENCIALES','','PLS',114,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(517,'PUERTO BARRIOS','','PBR',82,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(518,'PUERTO CORTÉS','','PCR',90,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(519,'PUERTO LIMON','','LIO',52,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(520,'PUERTO MORELOS','','PMS',150,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(521,'PUERTO QUETZAL','','PRQ',82,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(522,'PUERTO SEGURO','','PSG',175,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(523,'PUNING','','PNG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(524,'PUSAN','','PUS',169,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(525,'PUTIAN','','PUT',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(526,'QIANXI','','QIA',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(527,'QINGDAO','','TAO',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(528,'QINGLAN','','QLN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(529,'QINGYUAN','','QYN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(530,'QINHUANGDAO','','SHP',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(531,'QINZHOU','','QZH',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(532,'QIQIHAR','','NDG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(533,'QISHA','','QSA',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(534,'QUANZHOU','','QZJ',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(535,'QUEBEC','','QUE',39,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(536,'QUITO','','UIO',57,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(537,'RALEIGH DURHAM','','RDU',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(538,'RAOHE','','ROH',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(539,'RAVENNA','','RAN',119,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(540,'RIGA','','RIX',131,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(541,'RIO DE JANEIRO-INTERNACIONAL APT','','GIG',31,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(542,'RIO GRANDE','','RIG',31,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(543,'RIO HAINA','','HAI',185,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(544,'RIWO','','RIW',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(545,'RIZHAO','','RZH',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(546,'ROATAN','','RTB',90,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(547,'ROMA','','CIA',119,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(548,'RONGCHENG','','RNG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(549,'RONGQI','','ROQ',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(550,'ROSEAU','','RSU',56,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(551,'ROTTERDAM','','RTM',169,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(552,'RUILI','','RUI',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(553,'SABA IS','','SAB',10,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(554,'SAINT GEORGE\'S','','STG',77,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(555,'SALVADOR','','SSA',31,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(556,'SAN ANTONIO','','SAI',41,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(557,'SAN BEIMAN','','SBM',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(558,'SAN DIEGO','','SAN',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(559,'SAN FRANCISCO','','SFO',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(560,'SAN JOSE','','SJO',52,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(561,'SAN JUAN','','SJU',180,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(562,'SAN PEDRO SULA','','SAP',90,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(563,'SAN SALVADOR','','SAL',59,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(564,'SAN VICENTE','','SVE',41,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(565,'SANBU','','SBU',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(566,'SANHE','','SAH',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(567,'SANSHUI','','SJQ',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(568,'SANTA CRUZ','','SRZ',12,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(569,'SANTA CRUZ DE LA SIERRA','','SCS',28,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(570,'SANTA CRUZ DE TENERIFE','','SCT',64,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(571,'SANTA MARTA','','SMR',45,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(572,'SANTIAGO','','SCL',41,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(573,'SANTIAGO COMPOSTELA','','SCQ',64,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(574,'SANTIAGO DE CUBA','','SCU',54,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(575,'SANTO DOMINGO DOMINICANA','','SBQ',185,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(576,'SANTO TOMAS','','STO',59,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(577,'SANTO TOMAS DE CASTILLA','','STC',82,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(578,'SANTOS','','SSZ',31,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(579,'SANYA','','SYX',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(580,'SAO PAULO','','GRU',31,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(581,'SARAJEVO','','SJJ',29,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(582,'SAVANNAH','','SAV',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(583,'SEATTLE','','SEA',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(584,'SEMARANG, JAVA','','SRG',94,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(585,'SEOUL','','ICN',50,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(586,'SEVILLA','','SVQ',64,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(587,'SHAJIAO','','SHO',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(588,'SHAJING','','SHJ',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(589,'SHANGHAI','','SHA',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(590,'SHANHAIGUAN','','SHH',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(591,'SHANNON','','SNN',97,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(592,'SHANSHAN','','SXJ',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(593,'SHANTOU','','SWA',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(594,'SHANWEI','','SWE',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(595,'SHAOGUAN','','HSC',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(596,'SHAOXING','','SXG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(597,'SHARJAH','','SHJ',60,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(598,'SHATOUJIAO','','STJ',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(599,'SHAWAN','','SWN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(600,'SHEKOU','','SHK',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(601,'SHENYANG','','SHE',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(602,'SHENZHEN','','SZX',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(603,'SHIDAO','','SHD',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(604,'SHIJIAZHUANG','','SJW',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(605,'SHITOUBU','','STB',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(606,'SHIWEI','','SWI',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(607,'SHIYAN','','SYN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(608,'SHUIDONG','','SDG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(609,'SHUIKOU','','SKO',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(610,'SHUNDE','','SUD',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(611,'SIHUI','','SIH',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(612,'SIMAO','','SYM',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(613,'SINES','','CNS',179,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(614,'SINGAPORE','','SIN',206,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(615,'SOFIA','','SOF',33,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(616,'SONGJIANG','','SNG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(617,'SONGXIA','','SON',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(618,'ST BARTHELEMY','','SBH',80,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(619,'ST CROIX ISLAND','','STX',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(620,'ST EUSTATIUS','','EUX',10,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(621,'ST GEORGES','','SGE',102,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(622,'ST JOHN\'S','','SJO',9,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(623,'ST KITTS','','SKB',194,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(624,'ST LOUIS','','STL',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(625,'ST MAARTEN','','SXM',10,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(626,'ST THOMAS ISLAND','','STT',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(627,'ST VINCENT','','SVD',198,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(628,'ST. LUCIA','','SLU',21,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(629,'STOCKHOLM','','SMP',174,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(630,'STUTTGART','','STR',4,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(631,'SUAPE','','SUA',31,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(632,'SUIFENHE','','SFE',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(633,'SUNWU','','SUW',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(634,'SURABAYA, JAVA','','SUB',94,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(635,'SUZHOU','','SZH',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(636,'SYDNEY','','SYD',15,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(637,'TACOMA','','TIW',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(638,'TAHAROA','','THH',167,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(639,'TAIAN','','TAI',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(640,'TAICHUNG','','TXG',218,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(641,'TAIPEI','','TPE',218,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(642,'TAIPING','','TAP',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(643,'TAISHAN','','TSH',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(644,'TAIYUAN','','TYN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(645,'TAMPA','','TAM',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(646,'TAMPA','','TPA',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(647,'TANGGU','','TGU',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(648,'TANGSHAN','','TAS',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(649,'TANGXIA','','TXA',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(650,'TANJONG PELEPAS','','TPP',141,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(651,'TARRAGONA','','TAR',64,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(652,'TAYKEXKIN','','TKK',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(653,'TEESPORT','','TEE',182,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(654,'TEGUCIGALPA','','TGU',90,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(655,'TEL AVIV','','TLV',118,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(656,'TEXAS','','TXA',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(657,'THESSALONIKI','','SKG',78,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(658,'TIANBAO','','TBO',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(659,'TIANJIN','','TSN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(660,'TIANJINXINGANG','','TXG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(661,'TILBURY','','TIL',182,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(662,'TOCUMEN INTERNATIONAL','','PTY',173,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(663,'TOKYO','','TYO',121,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(664,'TOLEDO','','TOL',64,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(665,'TONGJIANG','','TOJ',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(666,'TONGLING','','TOL',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(667,'TORONTO','','TOR',39,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(668,'TORONTO','','YYZ',39,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(669,'TORTOLA','','TOV',116,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(670,'TOULOUSE','','TLS',71,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(671,'TRIANGULACION','','TRI',173,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(672,'TRIESTE','','TRS',119,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(673,'TUCSON','','TUS',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(674,'TULSA','','TUL',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(675,'TUMEN','','TME',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(676,'TURUGART','','TRT',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(677,'ULASTAI','','ULT',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(678,'URUMQI','','URC',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(679,'VALENCIA','','VLC',64,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(680,'VALPARAISO','','VAP',41,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(681,'VANCOUVER','','VAN',39,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(682,'VENICE','','VCE',119,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(683,'VERACRUZ','','VER',150,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(684,'VIENNA','','VIE',16,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(685,'VIEUX FORT','','VIF',200,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(686,'VIGO','','VGO',64,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(687,'VILA DO CONDE','','VLC',31,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(688,'VIRACOPOS','','VCP',31,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(689,'VITORIA','','VIX',31,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(690,'WAFANGDIAN','','WAF',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(691,'WAIGAOQIAO','','WGQ',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(692,'WANCOUVER','','YVR',39,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(693,'WANDING','','WAN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(694,'WANZAI','','WAZ',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(695,'WARSAW','','WAW',178,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(696,'WASHINGTON, DC','','IAD',65,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(697,'WEIFANG','','WFG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(698,'WEIHAI','','WEI',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(699,'WENJINDU','','WJD',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(700,'WENZHOU','','WNZ',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(701,'WILLEMSTAD, CURAZAO','','WIL',10,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(702,'WUHAN','','WUH',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(703,'WUHU','','WHI',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(704,'WUSONG','','WUS',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(705,'WUXI','','WUX',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(706,'WUYISHAN','','WYS',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(707,'WUZHOU','','WUZ',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(708,'XI AN','','SIA',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(709,'XI XIANG','','XIX',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(710,'XIA HUA','','XUA',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(711,'XIAMEN','','XMN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(712,'XIANGZHOU','','XGZ',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(713,'XIAOSHAN','','XIS',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(714,'XINGANG','','XIG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(715,'XINHUI','','XIN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(716,'XINING','','XNN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(717,'XIQIAO','','XIQ',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(718,'XIXIANG','','XXN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(719,'XUNKE','','XUK',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(720,'XUZHOU','','XUZ',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(721,'YANGJIANG','','YJI',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(722,'YANGPU','','YPG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(723,'YANGZHOU','','YZH',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(724,'YANJI','','YNJ',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(725,'YANTAI','','YNT',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(726,'YANTIAN','','YTN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(727,'YINCHUAN','','YIH',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(728,'YINGKOU','','YIK',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(729,'YINING','','YIN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(730,'YOKOHAMA','','YOK',121,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(731,'YOUYIGUAN','','YYG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(732,'YUNCHENG','','YUN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(733,'YUNFU','','YNF',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(734,'ZARATE','','ZAR',175,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(735,'ZENGCHENG','','ZNG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(736,'ZHAM','','ZMU',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(737,'ZHANGJIAGANG','','ZJG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(738,'ZHANGMUTOU','','ZGU',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(739,'ZHANGZHOU','','ZZU',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(740,'ZHANJIANG','','ZHA',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(741,'ZHAOQING','','ZQG',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(742,'ZHENGZHOU','','CGO',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(743,'ZHENJIANG','','ZHE',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(744,'ZHONGSHAN','','ZSN',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(745,'ZHOUSHAN','','ZOS',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(746,'ZHUENGADABUQI','','ZEQ',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(747,'ZHUHAI','','ZUH',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(748,'ZHUOZHOU','','ZHZ',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00'),
(749,'ZIBO','','ZIB',42,0,'2016-06-06 00:00:00','2016-06-06 00:00:00');

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
(1,'camaron','camaron',1,'2016-04-12 17:54:03','2016-05-29 12:50:02');

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
  PRIMARY KEY (`id_product_type`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `products_type` */

insert  into `products_type`(`id_product_type`,`id_product`,`name`,`description`,`abr`,`status`,`date_created`,`date_updated`) values 
(8,1,'40/50','descripcion de este tipo','40/50',1,'2016-05-29 12:58:01','2016-05-29 12:58:01'),
(9,1,'40/40','40/40','40/40',1,'2016-05-29 13:07:49','2016-05-29 13:07:49');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `regions` */

insert  into `regions`(`id_region`,`name`,`abr`,`status`,`date_created`,`date_updated`) values 
(1,'NORTE AMERICA','NAM',1,'2016-04-14 22:33:45','2016-04-30 13:38:29'),
(2,'ASIA','ASI',1,'2016-04-14 22:33:45','2016-04-16 11:02:57'),
(3,'EUROPA','EUR',1,'2016-04-14 22:33:45','2016-04-18 16:58:05'),
(4,'OCEANIA','OCE',1,'2016-04-14 22:33:45','2016-04-18 15:55:27'),
(5,'SUR AMERICA','SAM',1,'2016-04-14 22:33:45','2016-04-18 15:55:28'),
(6,'CENTRO AMERICA','CAM',1,'2016-04-14 22:33:45','2016-04-18 15:55:29'),
(7,'CARIBE','CAR',1,'2016-04-14 22:33:45','2016-04-18 15:55:29'),
(8,'MEDIO ORIENTE','MDO',1,'2016-04-14 22:33:45','2016-04-16 11:01:50'),
(9,'AFRICA','AFR',1,'2016-04-14 22:33:45','2016-04-16 11:01:50');

/*Table structure for table `sales` */

DROP TABLE IF EXISTS `sales`;

CREATE TABLE `sales` (
  `id_sale` int(11) NOT NULL AUTO_INCREMENT,
  `id_type_destiny` int(11) NOT NULL,
  `date_sale` date NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_shipping_lines` int(11) NOT NULL,
  `id_country_out` int(11) NOT NULL,
  `id_port_out` int(11) NOT NULL,
  `id_country_in` int(11) NOT NULL,
  `id_port_in` int(11) NOT NULL,
  `date_out` date NOT NULL,
  `date_estimate_in` date NOT NULL,
  `terms` text NOT NULL,
  `id_broker` int(11) NOT NULL,
  `comision` varchar(20) NOT NULL,
  `id_bank_in` int(11) NOT NULL,
  `id_incoterm` int(11) NOT NULL,
  `note_sale` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id_sale`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `sales` */

insert  into `sales`(`id_sale`,`id_type_destiny`,`date_sale`,`id_client`,`id_shipping_lines`,`id_country_out`,`id_port_out`,`id_country_in`,`id_port_in`,`date_out`,`date_estimate_in`,`terms`,`id_broker`,`comision`,`id_bank_in`,`id_incoterm`,`note_sale`,`status`,`date_created`,`date_updated`) values 
(1,2,'2016-06-10',1,0,0,0,0,0,'0000-00-00','0000-00-00','terminos de negociacion',1,'50%',0,3,'Observación de prueba',1,'2016-06-10 10:12:51','2016-06-10 10:12:51');

/*Table structure for table `sales_containers_detail` */

DROP TABLE IF EXISTS `sales_containers_detail`;

CREATE TABLE `sales_containers_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sale` int(11) NOT NULL,
  `id_container` int(11) NOT NULL,
  `number` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sales_containers_detail` */

/*Table structure for table `sales_farms_detail` */

DROP TABLE IF EXISTS `sales_farms_detail`;

CREATE TABLE `sales_farms_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sale` int(11) NOT NULL,
  `id_farm` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sales_farms_detail` */

/*Table structure for table `sales_plants_detail` */

DROP TABLE IF EXISTS `sales_plants_detail`;

CREATE TABLE `sales_plants_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sale` int(11) NOT NULL,
  `id_plant` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sales_plants_detail` */

/*Table structure for table `sales_products_detail` */

DROP TABLE IF EXISTS `sales_products_detail`;

CREATE TABLE `sales_products_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sale` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_product_type` int(11) NOT NULL,
  `cases` int(11) NOT NULL,
  `packing` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `rate` decimal(10,0) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `note` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sales_products_detail` */

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
(1,'LINEA NAVIERA 1',1,'2016-04-05 20:56:01','2016-06-05 11:55:38','l','dirección','1234567890','','','','','','','contact2','1234567890','deandrademarcos@gmail.com'),
(2,'LINEA NAVIERA 2',1,'2016-04-05 20:56:19','2016-06-05 11:55:48','l2','direccion','02128601223','','','','','','','','',''),
(3,'LINEA NAVIERA 3',1,'2016-04-15 16:39:38','2016-06-05 11:55:57','aaa','aaaaaaaaaaaa','1234567890','','','','','','','','','');

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

/*Data for the table `states` */

insert  into `states`(`id_state`,`id_country`,`name`,`status`,`date_created`,`date_updated`) values 
(1,1,'AMAZONAS',1,'2016-05-15 13:33:47','2016-05-15 13:33:47'),
(2,1,'ANZOÁTEGUI',1,'2016-05-15 13:33:47','2016-05-15 13:33:47'),
(3,1,'APURE',1,'2016-05-15 13:33:47','2016-05-15 13:33:47'),
(4,1,'ARAGUA',1,'2016-05-15 13:33:47','2016-05-15 13:33:47'),
(5,1,'BARINAS',1,'2016-05-15 13:33:47','2016-05-15 13:33:47'),
(6,1,'BOLÍVAR',1,'2016-05-15 13:33:47','2016-05-15 13:33:47'),
(7,1,'CARABOBO',1,'2016-05-15 13:33:47','2016-05-15 13:33:47'),
(8,1,'COJEDES',1,'2016-05-15 13:33:47','2016-05-15 13:33:47'),
(9,1,'DELTA AMACURO',1,'2016-05-15 13:33:47','2016-05-15 13:33:47'),
(10,1,'DEPENDENCIAS FEDERALES',1,'2016-05-15 13:33:47','2016-05-15 13:33:47'),
(11,1,'DISTRITO CAPITAL',1,'2016-05-15 13:33:47','2016-05-15 13:33:47'),
(12,1,'FALCÓN',1,'2016-05-15 13:33:47','2016-05-15 13:33:47'),
(13,1,'GUARICO',1,'2016-05-15 13:33:47','2016-05-15 13:33:47'),
(14,1,'LARA',1,'2016-05-15 13:33:47','2016-05-15 13:33:47'),
(15,1,'MÉRIDA',1,'2016-05-15 13:33:47','2016-05-15 13:33:47'),
(16,1,'MIRANDA',1,'2016-05-15 13:33:47','2016-05-15 13:33:47'),
(17,1,'MONAGAS',1,'2016-05-15 13:33:47','2016-05-15 13:33:47'),
(18,1,'NUEVA ESPARTA',1,'2016-05-15 13:33:47','2016-05-15 13:33:47'),
(19,1,'PORTUGUESA',1,'2016-05-15 13:33:47','2016-05-15 13:33:47'),
(20,1,'SUCRE',1,'2016-05-15 13:33:47','2016-05-15 13:33:47'),
(21,1,'TÁCHIRA',1,'2016-05-15 13:33:47','2016-05-15 13:33:47'),
(22,1,'TRUJILLO',1,'2016-05-15 13:33:47','2016-05-15 13:33:47'),
(23,1,'VARGAS',1,'2016-05-15 13:33:47','2016-05-15 13:33:47'),
(24,1,'YARACUY',1,'2016-05-15 13:33:47','2016-05-15 13:33:47'),
(25,1,'ZULIA',1,'2016-05-15 13:33:47','2016-05-15 13:33:47');

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

/*Table structure for table `type_destiny` */

DROP TABLE IF EXISTS `type_destiny`;

CREATE TABLE `type_destiny` (
  `id_type_destiny` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `abr` varchar(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id_type_destiny`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `type_destiny` */

insert  into `type_destiny`(`id_type_destiny`,`name`,`abr`,`status`,`date_created`,`date_updated`) values 
(1,'NACIONAL','NAC',1,'2016-05-19 13:49:35','2016-05-19 14:45:27'),
(2,'INTERNACIONAL','INT',1,'2016-05-19 13:49:35','2016-05-19 14:45:17');

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
