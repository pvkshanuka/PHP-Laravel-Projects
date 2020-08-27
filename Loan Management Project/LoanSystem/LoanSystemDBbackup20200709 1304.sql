-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-m3


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema sanjufinance
--

CREATE DATABASE IF NOT EXISTS sanjufinance;
USE sanjufinance;

--
-- Definition of table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `addressId` int(11) NOT NULL AUTO_INCREMENT,
  `line1` varchar(50) DEFAULT NULL,
  `line2` varchar(50) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`addressId`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--

/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` (`addressId`,`line1`,`line2`,`city`,`status`) VALUES 
 (9,'No:190/59,Narthanagala,Munagama,Horana','Munagama','Horana',1),
 (10,'No:190/59,Narthanagala,Munagama,Horana','aaaaaaaaaaa','Horana',1),
 (13,'No:190/59,Narthanagala,Munagama,Horana','Munagama','Horana',1),
 (14,'kaluthra','Munagama','gamagoda',1),
 (18,'thusithamadusanka92@gmail.com','No:190/59,Narthanagala,Munagama,Horana','Horana',1),
 (19,'thusithamadusanka92@gmail.com','No:190/59,Narthanagala,Munagama,Horana','Horana',1),
 (20,'thusithamadusanka92@gmail.com','No:190/59,Narthanagala,Munagama,Horana','Horana',1),
 (21,'thusithamadusanka92@gmail.com','No:190/59,Narthanagala,Munagama,Horana','Horana',1),
 (22,'No:190/59,Narthanagala,Munagama,Horana','munagama','Horana',1),
 (23,'No:190/59,Narthanagala,Munagama,Horana','munagama','Horana',1),
 (32,'kaluthea','gamagoda','galuthara',1),
 (33,'No:190/59,Narthanagala,Munagama,Horana','aaa','Horana',1),
 (34,'No:190/59,Narthanagala,Munagama,Horana','aaa','Horana',1),
 (35,NULL,NULL,NULL,1),
 (36,NULL,NULL,NULL,1),
 (37,'No:190/59,Narthanagala,Munagama,Horana','qqqqqqqq','Horana',1),
 (38,'kaluthara','gamagoda','kaluthara',1),
 (39,NULL,NULL,NULL,1),
 (40,NULL,NULL,NULL,1),
 (41,NULL,NULL,NULL,1),
 (42,'No:190/59,Narthanagala,Munagama,Horana','aaaaaaaaa','Horana',1),
 (43,NULL,NULL,NULL,1),
 (44,NULL,NULL,NULL,1),
 (45,NULL,NULL,NULL,1),
 (46,NULL,NULL,NULL,1),
 (47,NULL,NULL,NULL,1),
 (48,NULL,NULL,NULL,1),
 (49,NULL,NULL,NULL,1),
 (50,NULL,NULL,NULL,1),
 (51,NULL,NULL,NULL,1),
 (52,NULL,NULL,NULL,1),
 (53,NULL,NULL,NULL,1),
 (54,NULL,NULL,NULL,1),
 (55,NULL,NULL,NULL,1),
 (56,NULL,NULL,NULL,1),
 (57,NULL,NULL,NULL,1),
 (58,NULL,NULL,NULL,1),
 (59,NULL,NULL,NULL,1),
 (60,NULL,NULL,NULL,1),
 (61,NULL,NULL,NULL,1),
 (62,NULL,NULL,NULL,1),
 (63,NULL,NULL,NULL,1),
 (64,NULL,NULL,NULL,1),
 (65,NULL,NULL,NULL,1),
 (66,NULL,NULL,NULL,1),
 (67,NULL,NULL,NULL,1),
 (68,NULL,NULL,NULL,1),
 (69,NULL,NULL,NULL,1),
 (70,NULL,NULL,NULL,1),
 (71,NULL,NULL,NULL,1),
 (72,NULL,NULL,NULL,1),
 (73,NULL,NULL,NULL,1),
 (74,NULL,NULL,NULL,1),
 (75,NULL,NULL,NULL,1),
 (76,NULL,NULL,NULL,1),
 (77,NULL,NULL,NULL,1),
 (78,NULL,NULL,NULL,1),
 (79,NULL,NULL,NULL,1),
 (80,NULL,NULL,NULL,1),
 (81,NULL,NULL,NULL,1),
 (82,NULL,NULL,NULL,1),
 (83,NULL,NULL,NULL,1),
 (84,NULL,NULL,NULL,1),
 (85,NULL,NULL,NULL,1),
 (86,NULL,NULL,NULL,1),
 (87,NULL,NULL,NULL,1),
 (88,'smartinnovationlk@gmail.com','No:190/59,Narthanagala,Munagama,Horana','Horana',1),
 (89,'thusithamadusanka92@gmail.com','No:190/59,Narthanagala,Munagama,Horana','Horana',1),
 (90,'thusithamadusanka92@gmail.com','No:190/59,Narthanagala,Munagama,Horana','Horana',1),
 (91,NULL,NULL,NULL,1),
 (92,NULL,NULL,NULL,1),
 (93,NULL,NULL,NULL,1),
 (94,NULL,NULL,NULL,1),
 (95,NULL,NULL,NULL,1),
 (96,NULL,NULL,NULL,1),
 (97,NULL,NULL,NULL,1),
 (98,NULL,NULL,NULL,1),
 (99,NULL,NULL,NULL,1),
 (100,NULL,NULL,NULL,1),
 (101,NULL,NULL,NULL,1),
 (102,NULL,NULL,NULL,1),
 (103,NULL,NULL,NULL,1),
 (104,NULL,NULL,NULL,1),
 (105,NULL,NULL,NULL,1),
 (106,NULL,NULL,NULL,1),
 (107,NULL,NULL,NULL,1),
 (108,NULL,NULL,NULL,1),
 (109,'44444','4','4',1),
 (110,'44444','4','4',1),
 (111,'44444','4','4',1),
 (112,'44444','4','4',1),
 (113,'44444','4','4',1),
 (114,'44444','4','4',1),
 (115,'44444','4','4',1),
 (116,'44444','4','4',1),
 (117,'44444','4','4',1),
 (118,'44444','4','4',1),
 (119,'111','111','111',1),
 (120,'111','111','111',1),
 (121,'111','111','111',1),
 (122,'111','111','111',1),
 (123,'111','111','111',1),
 (124,'111','111','111',1),
 (125,'111','111','111',1),
 (126,'111','111','111',1),
 (127,'111','111','111',1),
 (128,'111','111','111',1),
 (129,'22','22','22',1),
 (130,'No:190/59,Narthanagala,Munagama,Horana','3423','Horana',1),
 (131,'No:190/59,Narthanagala,Munagama,Horana','sssss','Horana',1),
 (132,'No:190/59,Narthanagala,Munagama,Horana','sssss','Horana',1),
 (133,NULL,NULL,NULL,1),
 (134,NULL,NULL,NULL,1),
 (135,NULL,NULL,NULL,1),
 (136,NULL,NULL,NULL,1),
 (137,NULL,NULL,NULL,1),
 (138,'No:190/59,Narthanagala,Munagama,Horana','cccc','Horana',1),
 (139,'No:190/59,Narthanagala,Munagama,Horana','ccccc','Horana',1),
 (140,'No:190/59,Narthanagala,Munagama,Horana','cccccc','Horana',1),
 (141,'No:190/59,Narthanagala,Munagama,Horana','galle','Horana',0),
 (142,'adasda','asdasd','adasd',1);
/*!40000 ALTER TABLE `address` ENABLE KEYS */;


--
-- Definition of table `bankaccount`
--

DROP TABLE IF EXISTS `bankaccount`;
CREATE TABLE `bankaccount` (
  `accountId` int(11) NOT NULL AUTO_INCREMENT,
  `accName` varchar(45) DEFAULT NULL,
  `accNumber` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `employeeId` int(11) NOT NULL,
  PRIMARY KEY (`accountId`),
  KEY `fk_bankAccount_employee1_idx` (`employeeId`),
  CONSTRAINT `fk_bankAccount_employee1` FOREIGN KEY (`employeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bankaccount`
--

/*!40000 ALTER TABLE `bankaccount` DISABLE KEYS */;
INSERT INTO `bankaccount` (`accountId`,`accName`,`accNumber`,`status`,`employeeId`) VALUES 
 (1,'Sampath','401564',1,1),
 (2,'Sampath','451254',1,1);
/*!40000 ALTER TABLE `bankaccount` ENABLE KEYS */;


--
-- Definition of table `checkdetails`
--

DROP TABLE IF EXISTS `checkdetails`;
CREATE TABLE `checkdetails` (
  `checkDetailId` int(11) NOT NULL AUTO_INCREMENT,
  `bankName` varchar(45) DEFAULT NULL,
  `checkNo` varchar(45) DEFAULT NULL,
  `datec` datetime DEFAULT NULL,
  `realizeDate` datetime DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `loanId` int(11) NOT NULL,
  PRIMARY KEY (`checkDetailId`),
  KEY `fk_checkDetails_loan2_idx` (`loanId`),
  CONSTRAINT `fk_checkDetails_loan2` FOREIGN KEY (`loanId`) REFERENCES `loan` (`loanId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `checkdetails`
--

/*!40000 ALTER TABLE `checkdetails` DISABLE KEYS */;
INSERT INTO `checkdetails` (`checkDetailId`,`bankName`,`checkNo`,`datec`,`realizeDate`,`description`,`status`,`loanId`) VALUES 
 (1,'HNB','123123123','2020-07-06 00:00:00','2020-08-31 00:00:00','name:sandun  nic:33333333  customerNo:333333333',1,18);
/*!40000 ALTER TABLE `checkdetails` ENABLE KEYS */;


--
-- Definition of table `chequetransactions`
--

DROP TABLE IF EXISTS `chequetransactions`;
CREATE TABLE `chequetransactions` (
  `transactionsId` int(11) NOT NULL AUTO_INCREMENT,
  `checkNo` varchar(45) DEFAULT NULL,
  `issueDate` datetime DEFAULT NULL,
  `realizeDate` date DEFAULT NULL,
  `description` varchar(225) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `marked` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `accountId` int(11) NOT NULL,
  `loanId` int(11) DEFAULT NULL,
  `employeeId` int(11) NOT NULL,
  PRIMARY KEY (`transactionsId`),
  KEY `fk_chequeTransactions_bankAccount1_idx` (`accountId`),
  KEY `fk_chequeTransactions_loan1_idx` (`loanId`),
  KEY `fk_chequeTransactions_employee1_idx` (`employeeId`),
  CONSTRAINT `fk_chequeTransactions_bankAccount1` FOREIGN KEY (`accountId`) REFERENCES `bankaccount` (`accountId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_chequeTransactions_employee1` FOREIGN KEY (`employeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_chequeTransactions_loan1` FOREIGN KEY (`loanId`) REFERENCES `loan` (`loanId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chequetransactions`
--

/*!40000 ALTER TABLE `chequetransactions` DISABLE KEYS */;
INSERT INTO `chequetransactions` (`transactionsId`,`checkNo`,`issueDate`,`realizeDate`,`description`,`status`,`marked`,`amount`,`accountId`,`loanId`,`employeeId`) VALUES 
 (6,'11111111','2020-07-02 05:13:38','2020-07-09','aaaaaaaaaa',0,1,11111,1,1,1),
 (7,'234234','2020-07-02 05:14:13','2020-07-30','adsdasd',0,1,10000,2,NULL,1),
 (8,'13123123','2020-07-02 16:05:26','2020-07-17','asdsdasd',0,1,25000,2,NULL,1),
 (9,'123456','2020-07-02 16:07:54','2020-07-24','1231231',1,0,1231231,1,NULL,1),
 (10,'123123123','2020-07-06 15:21:53','2020-07-23','Issue for monthly customer loan',1,0,90000,2,15,13),
 (11,'678678','2020-07-06 15:25:00','2020-07-30','Issue for monthly customer loan',1,0,69000,2,16,13),
 (12,'3232312','2020-07-07 00:17:43','2020-07-10','Issue for monthly customer loan',1,0,71610,1,23,13);
/*!40000 ALTER TABLE `chequetransactions` ENABLE KEYS */;


--
-- Definition of table `collectionhandover`
--

DROP TABLE IF EXISTS `collectionhandover`;
CREATE TABLE `collectionhandover` (
  `collectionhandoverId` int(11) NOT NULL AUTO_INCREMENT,
  `collectorRouteId` int(11) NOT NULL,
  `employeeId` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `collectedamount` double DEFAULT NULL,
  `handoverdate` datetime DEFAULT NULL,
  `collectiondate` datetime DEFAULT NULL,
  PRIMARY KEY (`collectionhandoverId`),
  KEY `fk_collectorRoute_has_employee_employee1_idx` (`employeeId`),
  KEY `fk_collectorRoute_has_employee_collectorRoute1_idx` (`collectorRouteId`),
  CONSTRAINT `fk_collectorRoute_has_employee_collectorRoute1` FOREIGN KEY (`collectorRouteId`) REFERENCES `collectorroute` (`collectorRouteId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_collectorRoute_has_employee_employee1` FOREIGN KEY (`employeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `collectionhandover`
--

/*!40000 ALTER TABLE `collectionhandover` DISABLE KEYS */;
/*!40000 ALTER TABLE `collectionhandover` ENABLE KEYS */;


--
-- Definition of table `collector`
--

DROP TABLE IF EXISTS `collector`;
CREATE TABLE `collector` (
  `idcollector` int(11) NOT NULL AUTO_INCREMENT,
  `note` text,
  `status` int(11) DEFAULT '1',
  `employeeId` int(11) NOT NULL,
  PRIMARY KEY (`idcollector`),
  KEY `fk_collector_employee1_idx` (`employeeId`),
  CONSTRAINT `fk_collector_employee1` FOREIGN KEY (`employeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `collector`
--

/*!40000 ALTER TABLE `collector` DISABLE KEYS */;
INSERT INTO `collector` (`idcollector`,`note`,`status`,`employeeId`) VALUES 
 (1,'ssad',0,1),
 (2,'ddd',0,12),
 (3,'czxczxczxc',1,14);
/*!40000 ALTER TABLE `collector` ENABLE KEYS */;


--
-- Definition of table `collectorroute`
--

DROP TABLE IF EXISTS `collectorroute`;
CREATE TABLE `collectorroute` (
  `routeId` int(11) NOT NULL,
  `datec` date DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `end_date` date DEFAULT NULL,
  `idcollector` int(11) NOT NULL,
  `collectorRouteId` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`collectorRouteId`),
  KEY `fk_route_has_collector_route_idx` (`routeId`),
  KEY `fk_collectorRoute_collector1_idx` (`idcollector`),
  CONSTRAINT `fk_collectorRoute_collector1` FOREIGN KEY (`idcollector`) REFERENCES `collector` (`idcollector`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_route_has_collector_route` FOREIGN KEY (`routeId`) REFERENCES `route` (`routeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `collectorroute`
--

/*!40000 ALTER TABLE `collectorroute` DISABLE KEYS */;
INSERT INTO `collectorroute` (`routeId`,`datec`,`status`,`end_date`,`idcollector`,`collectorRouteId`) VALUES 
 (19,'2020-06-30',0,'2020-07-07',3,1),
 (20,'2020-06-30',1,NULL,1,2);
/*!40000 ALTER TABLE `collectorroute` ENABLE KEYS */;


--
-- Definition of table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `idcustomer` int(11) NOT NULL AUTO_INCREMENT,
  `customerNo` varchar(45) DEFAULT NULL,
  `nic` varchar(20) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `img` text,
  `nickname` varchar(45) DEFAULT NULL,
  `pno` varchar(15) DEFAULT NULL,
  `pno2` varchar(20) DEFAULT NULL,
  `email` varchar(130) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `customerLevelId` int(11) NOT NULL,
  `addressId` int(11) NOT NULL,
  `routeId` int(11) NOT NULL,
  PRIMARY KEY (`idcustomer`),
  KEY `fk_customer_customerLevel1_idx` (`customerLevelId`),
  KEY `fk_customer_address1_idx` (`addressId`),
  KEY `fk_customer_route1_idx` (`routeId`),
  CONSTRAINT `fk_customer_address1` FOREIGN KEY (`addressId`) REFERENCES `address` (`addressId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_customer_customerLevel1` FOREIGN KEY (`customerLevelId`) REFERENCES `customerlevel` (`customerLevelId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_customer_route1` FOREIGN KEY (`routeId`) REFERENCES `route` (`routeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`idcustomer`,`customerNo`,`nic`,`name`,`img`,`nickname`,`pno`,`pno2`,`email`,`note`,`status`,`customerLevelId`,`addressId`,`routeId`) VALUES 
 (5,'1234','920034462V','sandun6',NULL,'Dema1','0711067032','1111155553','thusithamadusanka92@gmail.com',NULL,1,2,13,19),
 (6,'S1245','920034462V','thushitha',NULL,'sew','0711067032','0711937765','sewwandi.madu192@gmail.com','ssssssssssss',0,3,14,19),
 (7,'1234','920034462V','sandun12',NULL,'Dema22','1111111111','1111122225','thusithamadusanka92@gmail.com2',NULL,1,1,33,20),
 (8,'1234','920034462V','sandun',NULL,'Dema','111','111','thusithamadusanka92@gmail.com','11111',1,3,34,19),
 (9,'465466','955034456V','madu',NULL,'sew','0711067032','0711937765','sewwand.madu192@gmail.com','dasdasd',0,1,38,19),
 (10,'1234','920034462V','Madusanka',NULL,'Dema1','0711067033','0711937763','thushimadu01@gmail.com1','aaaaaaaaaaaaaaaa',1,1,43,19),
 (11,'1234','920034462V','sandun',NULL,'Dema','0711067032','0711937765','thusithamadusanka92@gmail.com','aaaaaaaa',1,2,44,19),
 (12,'sdsd','sdsd','asdasd',NULL,'sdsds','0711067032','0711937765','sdd','sdada',1,2,45,20),
 (47,'123433','920034ss462V','sandun',NULL,'Dema','0711067032','0711937765','thushimadu01@gmail.com','qqqqqqqqqqqqqqq',1,2,87,19),
 (48,'1111','1111','sandun',NULL,'Dema','0711067032','0711937765','thushimadu01@gmail.com','asdasdasd',1,2,99,20),
 (49,'23123','123123','sandun','C:\\xampp\\htdocs\\Loan_Management\\loan_management1\\loan_management\\public\\images/1593802344.png','Dema','0711067032','0711937765','thusithamadusanka92@gmail.com','111111111',1,2,128,19),
 (50,'678','4534534','5645645','images/1593803128.png','444','0711067032','0711937765','thusithamadusanka92@gmail.com','cxzcxxxxxxxxxxxxxxxxxx',1,1,130,20),
 (51,'12321312','123123123','tttttttttt','images/1593839248.jpg','Dema','0711067032','0711937765','thushimadu01@gmail.com','dsddasdad',1,1,139,20),
 (52,'333333333','33333333','sandun','images/1593839329.jpg','Dema','0711067032','0711937765','thusithamadusanka92@gmail.com','zczxczxczx',1,2,140,19),
 (53,'78','955444444V','kusal','images/1593970758.jpg','kisal','0711067032','0711937765','kaajdak@gmail.com','adadasd',1,2,142,20);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;


--
-- Definition of table `customerlevel`
--

DROP TABLE IF EXISTS `customerlevel`;
CREATE TABLE `customerlevel` (
  `customerLevelId` int(11) NOT NULL AUTO_INCREMENT,
  `cuslevelname` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`customerLevelId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customerlevel`
--

/*!40000 ALTER TABLE `customerlevel` DISABLE KEYS */;
INSERT INTO `customerlevel` (`customerLevelId`,`cuslevelname`,`status`) VALUES 
 (1,'beginner',1),
 (2,'Middle Value Customer',1),
 (3,'high value customer',1);
/*!40000 ALTER TABLE `customerlevel` ENABLE KEYS */;


--
-- Definition of table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `employeeId` int(11) NOT NULL AUTO_INCREMENT,
  `employeeTypeId` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `nic` varchar(20) DEFAULT NULL,
  `pno` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `addressId` int(11) NOT NULL,
  `gender` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `idlogin` int(11) NOT NULL,
  PRIMARY KEY (`employeeId`),
  KEY `fk_employee_employeeType1_idx` (`employeeTypeId`),
  KEY `fk_employee_address1_idx` (`addressId`),
  KEY `fk_employee_login2_idx` (`idlogin`),
  CONSTRAINT `fk_employee_address1` FOREIGN KEY (`addressId`) REFERENCES `address` (`addressId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_employee_employeeType1` FOREIGN KEY (`employeeTypeId`) REFERENCES `employeetype` (`employeeTypeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_employee_login2` FOREIGN KEY (`idlogin`) REFERENCES `login` (`idlogin`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` (`employeeId`,`employeeTypeId`,`name`,`nic`,`pno`,`email`,`addressId`,`gender`,`status`,`idlogin`) VALUES 
 (1,4,'thushitha','920034462V','0711067032','thusithamadusanka92@gmail.com',21,NULL,0,5),
 (12,4,'madu','955034456V','0711937765','sewwand.madu192@gmail.com',32,NULL,0,16),
 (13,2,'thushitha','920034462V','0711067032','thusithamadusanka92@gmail.com',90,NULL,1,17),
 (14,4,'Avishka','9422121212V','0711937765',NULL,141,NULL,0,18);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;


--
-- Definition of table `employeetype`
--

DROP TABLE IF EXISTS `employeetype`;
CREATE TABLE `employeetype` (
  `employeeTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`employeeTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employeetype`
--

/*!40000 ALTER TABLE `employeetype` DISABLE KEYS */;
INSERT INTO `employeetype` (`employeeTypeId`,`name`,`status`) VALUES 
 (1,'Admin',1),
 (2,'Main Employee',1),
 (3,'Employee',1),
 (4,'Cash Collector',1);
/*!40000 ALTER TABLE `employeetype` ENABLE KEYS */;


--
-- Definition of table `guarantor`
--

DROP TABLE IF EXISTS `guarantor`;
CREATE TABLE `guarantor` (
  `guarantorId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `nic` varchar(20) DEFAULT NULL,
  `pno` varchar(20) DEFAULT NULL,
  `pno2` varchar(20) DEFAULT NULL,
  `addressId` int(11) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `details` varchar(500) DEFAULT NULL,
  `status` varchar(1) DEFAULT '1',
  PRIMARY KEY (`guarantorId`),
  KEY `fk_guarantor_address1_idx` (`addressId`),
  CONSTRAINT `fk_guarantor_address1` FOREIGN KEY (`addressId`) REFERENCES `address` (`addressId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guarantor`
--

/*!40000 ALTER TABLE `guarantor` DISABLE KEYS */;
/*!40000 ALTER TABLE `guarantor` ENABLE KEYS */;


--
-- Definition of table `guarantorloan`
--

DROP TABLE IF EXISTS `guarantorloan`;
CREATE TABLE `guarantorloan` (
  `guarantorId` int(11) NOT NULL AUTO_INCREMENT,
  `datec` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `loanId` int(11) NOT NULL,
  PRIMARY KEY (`guarantorId`),
  KEY `fk_guarantor_has_loan_guarantor1_idx` (`guarantorId`),
  KEY `fk_guarantorLoan_loan1_idx` (`loanId`),
  CONSTRAINT `fk_guarantorLoan_loan1` FOREIGN KEY (`loanId`) REFERENCES `loan` (`loanId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_guarantor_has_loan_guarantor1` FOREIGN KEY (`guarantorId`) REFERENCES `guarantor` (`guarantorId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guarantorloan`
--

/*!40000 ALTER TABLE `guarantorloan` DISABLE KEYS */;
/*!40000 ALTER TABLE `guarantorloan` ENABLE KEYS */;


--
-- Definition of table `holidays`
--

DROP TABLE IF EXISTS `holidays`;
CREATE TABLE `holidays` (
  `idholidayId` int(11) NOT NULL AUTO_INCREMENT,
  `employeeId` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `datec` date DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`idholidayId`),
  KEY `fk_holidays_employee1_idx` (`employeeId`),
  CONSTRAINT `fk_holidays_employee1` FOREIGN KEY (`employeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `holidays`
--

/*!40000 ALTER TABLE `holidays` DISABLE KEYS */;
INSERT INTO `holidays` (`idholidayId`,`employeeId`,`name`,`datec`,`status`) VALUES 
 (3,13,'xxsxasx','2020-07-24',1);
/*!40000 ALTER TABLE `holidays` ENABLE KEYS */;


--
-- Definition of table `installment`
--

DROP TABLE IF EXISTS `installment`;
CREATE TABLE `installment` (
  `installmentId` int(11) NOT NULL AUTO_INCREMENT,
  `amount` double DEFAULT NULL,
  `paidAmount` double DEFAULT NULL,
  `datec` date DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `loanId` int(11) NOT NULL,
  PRIMARY KEY (`installmentId`),
  KEY `fk_installment_loan2_idx` (`loanId`),
  CONSTRAINT `fk_installment_loan2` FOREIGN KEY (`loanId`) REFERENCES `loan` (`loanId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `installment`
--

/*!40000 ALTER TABLE `installment` DISABLE KEYS */;
INSERT INTO `installment` (`installmentId`,`amount`,`paidAmount`,`datec`,`status`,`loanId`) VALUES 
 (1,2000,0,'2020-07-05',1,4),
 (2,2000,0,'2020-07-06',1,4),
 (3,2000,0,'2020-07-07',1,4),
 (4,2000,0,'2020-07-08',1,4),
 (5,2000,0,'2020-07-09',1,4),
 (6,2000,0,'2020-07-10',1,4),
 (7,2000,0,'2020-07-11',1,4),
 (8,2000,0,'2020-07-12',1,4),
 (9,2000,0,'2020-07-13',1,4),
 (10,2000,2000,'2020-07-14',1,4),
 (11,2000,0,'2020-07-15',1,4),
 (12,2000,0,'2020-07-16',1,4),
 (13,2000,0,'2020-07-17',1,4),
 (14,2000,2000,'2020-07-18',1,4),
 (15,2000,0,'2020-07-19',1,4),
 (16,2000,0,'2020-07-20',1,4),
 (17,2000,0,'2020-07-21',1,4),
 (18,2000,0,'2020-07-22',1,4),
 (19,2000,0,'2020-07-23',1,4),
 (20,2000,0,'2020-07-24',1,4),
 (21,2500,0,'2020-07-05',1,5),
 (22,2500,0,'2020-07-06',1,5),
 (23,2500,0,'2020-07-07',1,5),
 (24,2500,0,'2020-07-08',1,5),
 (25,2500,0,'2020-07-09',1,5),
 (26,2500,2500,'2020-07-10',0,5),
 (27,2500,0,'2020-07-11',1,5),
 (28,2500,0,'2020-07-12',1,5),
 (29,2500,0,'2020-07-13',1,5),
 (30,2500,0,'2020-07-14',1,5),
 (31,2500,0,'2020-07-15',1,5),
 (32,2500,0,'2020-07-16',1,5),
 (33,2500,0,'2020-07-17',1,5),
 (34,2500,0,'2020-07-18',1,5),
 (35,2500,0,'2020-07-19',1,5),
 (36,2500,0,'2020-07-20',1,5),
 (37,2500,0,'2020-07-21',1,5),
 (38,2500,0,'2020-07-22',1,5),
 (39,2500,0,'2020-07-23',1,5),
 (40,2500,0,'2020-07-25',1,5),
 (41,2500,0,'2020-07-26',1,5),
 (42,2500,2500,'2020-07-27',0,5),
 (43,2500,0,'2020-07-28',1,5),
 (44,2500,0,'2020-07-29',1,5),
 (45,2500,0,'2020-07-30',1,5),
 (46,1000,0,'2020-07-06',1,12),
 (47,1000,0,'2020-07-07',1,12),
 (48,1000,0,'2020-07-08',1,12),
 (49,1000,0,'2020-07-09',1,12),
 (50,1000,0,'2020-07-10',1,12),
 (51,NULL,0,'2020-08-07',1,27),
 (52,NULL,0,'2020-09-07',1,27),
 (53,NULL,0,'2020-10-07',1,27),
 (54,NULL,0,'2020-11-07',1,27),
 (55,NULL,0,'2020-12-07',1,27),
 (56,NULL,0,'2021-01-07',1,27),
 (57,NULL,0,'2021-02-07',1,27),
 (58,NULL,0,'2021-03-07',1,27),
 (59,NULL,0,'2021-04-07',1,27),
 (60,NULL,0,'2021-05-07',1,27),
 (61,NULL,0,'2021-06-07',1,27),
 (62,NULL,0,'2021-07-07',1,27),
 (63,NULL,0,'2021-08-07',1,27),
 (64,NULL,0,'2021-09-07',1,27),
 (65,NULL,0,'2021-10-07',1,27),
 (66,NULL,0,'2021-11-07',1,27),
 (67,NULL,0,'2021-12-07',1,27),
 (68,NULL,0,'2022-01-07',1,27),
 (69,4376.5,0,'2020-08-07',1,28),
 (70,4376.5,0,'2020-09-07',1,28),
 (71,4376.5,0,'2020-10-07',1,28),
 (72,4376.5,0,'2020-11-07',1,28),
 (73,4376.5,0,'2020-12-07',1,28),
 (74,4376.5,0,'2021-01-07',1,28),
 (75,4376.5,0,'2021-02-07',1,28),
 (76,4376.5,0,'2021-03-07',1,28),
 (77,4950,0,'2020-08-07',1,29),
 (78,4950,0,'2020-09-07',1,29),
 (79,4950,0,'2020-10-07',1,29),
 (80,4950,0,'2020-11-07',1,29),
 (81,4950,0,'2020-12-07',1,29),
 (82,4950,0,'2021-01-07',1,29),
 (83,4950,0,'2021-02-07',1,29),
 (84,4950,0,'2021-03-07',1,29),
 (85,4950,0,'2021-04-07',1,29),
 (86,4950,0,'2021-05-07',1,29),
 (87,6050,0,'2020-08-07',1,30),
 (88,6050,0,'2020-09-07',1,30),
 (89,6050,0,'2020-10-07',1,30),
 (90,6050,0,'2020-11-07',1,30),
 (91,6050,0,'2020-12-07',1,30),
 (92,6050,0,'2021-01-07',1,30),
 (93,6050,0,'2021-02-07',1,30),
 (94,6050,0,'2021-03-07',1,30),
 (95,6050,0,'2021-04-07',1,30),
 (96,6050,0,'2021-05-07',1,30),
 (97,7000,0,'2020-07-10',1,31),
 (98,7000,0,'2020-07-11',1,31),
 (99,7000,0,'2020-07-12',1,31),
 (100,7000,0,'2020-07-13',1,31),
 (101,7000,0,'2020-07-14',1,31),
 (102,7000,0,'2020-07-15',1,31),
 (103,7100,0,'2020-07-10',1,32),
 (104,7100,0,'2020-07-11',1,32),
 (105,7100,0,'2020-07-12',1,32),
 (106,7100,0,'2020-07-13',1,32),
 (107,7100,0,'2020-07-14',1,32),
 (108,7100,0,'2020-07-15',1,32),
 (109,74000,0,'2020-07-10',1,33),
 (110,74000,0,'2020-07-11',1,33),
 (111,74000,0,'2020-07-12',1,33),
 (112,74000,0,'2020-07-13',1,33),
 (113,74000,0,'2020-07-14',1,33),
 (114,74000,0,'2020-07-15',1,33),
 (115,10000,0,'2020-07-10',1,34),
 (116,10000,0,'2020-07-11',1,34),
 (117,10000,0,'2020-07-12',1,34),
 (118,10000,0,'2020-07-13',1,34),
 (119,10000,0,'2020-07-14',1,34),
 (120,10000,0,'2020-07-15',1,34),
 (121,10000,0,'2020-07-16',1,34),
 (122,10000,0,'2020-07-17',1,34),
 (123,10000,0,'2020-07-18',1,34),
 (124,10000,0,'2020-07-19',1,34),
 (125,10000,0,'2020-07-20',1,34),
 (126,11000,0,'2020-07-10',1,35),
 (127,11000,0,'2020-07-11',1,35),
 (128,11000,0,'2020-07-12',1,35),
 (129,11000,0,'2020-07-13',1,35),
 (130,11000,0,'2020-07-14',1,35),
 (131,11000,0,'2020-07-15',1,35),
 (132,11000,0,'2020-07-16',1,35),
 (133,12000,0,'2020-07-10',1,36),
 (134,12000,0,'2020-07-11',1,36),
 (135,12000,0,'2020-07-12',1,36),
 (136,12000,0,'2020-07-13',1,36),
 (137,12000,0,'2020-07-14',1,36),
 (138,12000,0,'2020-07-15',1,36),
 (139,12000,0,'2020-07-16',1,36),
 (140,12000,0,'2020-07-17',1,36),
 (141,12000,0,'2020-07-18',1,36),
 (142,12000,0,'2020-07-19',1,36),
 (143,13000,0,'2020-07-10',1,37),
 (144,13000,0,'2020-07-11',1,37),
 (145,13000,0,'2020-07-12',1,37),
 (146,13000,0,'2020-07-13',1,37),
 (147,13000,0,'2020-07-14',1,37),
 (148,13000,0,'2020-07-15',1,37),
 (149,14000,0,'2020-07-10',1,38),
 (150,14000,0,'2020-07-11',1,38),
 (151,14000,0,'2020-07-12',1,38),
 (152,14000,0,'2020-07-13',1,38),
 (153,14000,0,'2020-07-14',1,38);
/*!40000 ALTER TABLE `installment` ENABLE KEYS */;


--
-- Definition of table `installmentpay`
--

DROP TABLE IF EXISTS `installmentpay`;
CREATE TABLE `installmentpay` (
  `installmentPayId` int(11) NOT NULL AUTO_INCREMENT,
  `amount` double DEFAULT NULL,
  `datec` date DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `installmentId` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL,
  PRIMARY KEY (`installmentPayId`),
  KEY `fk_installmentPay_installment1_idx` (`installmentId`),
  KEY `fk_installmentPay_employee1_idx` (`employeeId`),
  CONSTRAINT `fk_installmentPay_employee1` FOREIGN KEY (`employeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_installmentPay_installment1` FOREIGN KEY (`installmentId`) REFERENCES `installment` (`installmentId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `installmentpay`
--

/*!40000 ALTER TABLE `installmentpay` DISABLE KEYS */;
/*!40000 ALTER TABLE `installmentpay` ENABLE KEYS */;


--
-- Definition of table `interest`
--

DROP TABLE IF EXISTS `interest`;
CREATE TABLE `interest` (
  `interestId` int(11) NOT NULL AUTO_INCREMENT,
  `amount` double DEFAULT NULL,
  `paidAmount` double DEFAULT NULL,
  `datec` date DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `loanId` int(11) NOT NULL,
  PRIMARY KEY (`interestId`),
  KEY `fk_interest_loan2_idx` (`loanId`),
  CONSTRAINT `fk_interest_loan2` FOREIGN KEY (`loanId`) REFERENCES `loan` (`loanId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `interest`
--

/*!40000 ALTER TABLE `interest` DISABLE KEYS */;
INSERT INTO `interest` (`interestId`,`amount`,`paidAmount`,`datec`,`status`,`loanId`) VALUES 
 (1,10000,0,'2020-08-06',1,14),
 (2,10000,0,'2020-08-06',1,15),
 (3,6000,0,'2020-08-06',1,16),
 (4,1500,0,'2020-08-06',1,17),
 (5,20000,0,'2020-09-06',1,18),
 (8,3000,3000,'2020-07-07',1,21),
 (10,5390,5390,'2020-07-07',1,23),
 (11,4690,4690,'2020-07-07',1,24),
 (12,640,640,'2020-07-07',1,25),
 (13,100,0,NULL,1,26);
/*!40000 ALTER TABLE `interest` ENABLE KEYS */;


--
-- Definition of table `interestpay`
--

DROP TABLE IF EXISTS `interestpay`;
CREATE TABLE `interestpay` (
  `interestPayId` int(11) NOT NULL AUTO_INCREMENT,
  `interestId` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL,
  `paidAmount` double DEFAULT NULL,
  `datec` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`interestPayId`),
  KEY `fk_interestPay_interest1_idx` (`interestId`),
  KEY `fk_interestPay_employee1_idx` (`employeeId`),
  CONSTRAINT `fk_interestPay_employee1` FOREIGN KEY (`employeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_interestPay_interest1` FOREIGN KEY (`interestId`) REFERENCES `interest` (`interestId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `interestpay`
--

/*!40000 ALTER TABLE `interestpay` DISABLE KEYS */;
INSERT INTO `interestpay` (`interestPayId`,`interestId`,`employeeId`,`paidAmount`,`datec`,`status`) VALUES 
 (1,8,13,3000,'2020-07-07 00:12:39',1),
 (3,10,13,5390,'2020-07-07 00:17:43',1),
 (4,11,13,4690,'2020-07-07 00:18:44',1),
 (5,12,13,640,'2020-07-07 00:21:37',1);
/*!40000 ALTER TABLE `interestpay` ENABLE KEYS */;


--
-- Definition of table `interface`
--

DROP TABLE IF EXISTS `interface`;
CREATE TABLE `interface` (
  `interfaceId` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `display_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`interfaceId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `interface`
--

/*!40000 ALTER TABLE `interface` DISABLE KEYS */;
/*!40000 ALTER TABLE `interface` ENABLE KEYS */;


--
-- Definition of table `loan`
--

DROP TABLE IF EXISTS `loan`;
CREATE TABLE `loan` (
  `loanId` int(11) NOT NULL AUTO_INCREMENT,
  `custom_loanId` varchar(45) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `targetIncome` double DEFAULT NULL,
  `takenDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `paidAmount` double DEFAULT NULL,
  `completeStatus` varchar(1) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `idcustomer` int(11) NOT NULL,
  `loanTypeId` int(11) DEFAULT NULL,
  `loancomment` text,
  PRIMARY KEY (`loanId`),
  KEY `fk_loan_customer1_idx` (`idcustomer`),
  KEY `fk_loan_loanType1_idx` (`loanTypeId`),
  CONSTRAINT `fk_loan_customer1` FOREIGN KEY (`idcustomer`) REFERENCES `customer` (`idcustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_loan_loanType1` FOREIGN KEY (`loanTypeId`) REFERENCES `loantype` (`loanTypeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loan`
--

/*!40000 ALTER TABLE `loan` DISABLE KEYS */;
INSERT INTO `loan` (`loanId`,`custom_loanId`,`amount`,`rate`,`targetIncome`,`takenDate`,`endDate`,`paidAmount`,`completeStatus`,`status`,`idcustomer`,`loanTypeId`,`loancomment`) VALUES 
 (1,'0001',NULL,NULL,NULL,'2020-07-02',NULL,NULL,'0',1,5,1,NULL),
 (2,'0002',25000,NULL,NULL,NULL,NULL,NULL,'0',1,10,2,NULL),
 (3,'0003',25000,NULL,NULL,'2020-07-04','2020-07-24',NULL,'0',1,52,1,NULL),
 (4,'0004',35000,NULL,5000,'2020-07-04','2020-07-24',NULL,'2',3,51,1,NULL),
 (5,'0005',50000,NULL,12500,'2020-07-04','2020-07-30',NULL,'1',1,9,1,NULL),
 (12,'0006',3000,NULL,2000,'2020-07-05','2020-07-10',0,'0',1,53,1,NULL),
 (13,'0007',10000,10,NULL,'2020-07-06',NULL,0,'0',1,53,3,NULL),
 (14,'0008',100000,10,NULL,'2020-07-06',NULL,0,'0',1,53,3,NULL),
 (15,'0009',100000,10,NULL,'2020-07-06',NULL,0,'0',1,53,3,NULL),
 (16,'0010',75000,8,NULL,'2020-07-06',NULL,0,'0',1,53,3,NULL),
 (17,'0011',25000,6,NULL,'2020-07-06',NULL,0,'0',1,53,3,NULL),
 (18,'0012',200000,10,20000,'2020-07-06',NULL,0,'0',1,52,6,NULL),
 (21,'0013',60000,5,NULL,'2020-07-07',NULL,0,'0',1,53,3,NULL),
 (23,'0014',77000,7,NULL,'2020-07-07',NULL,0,'0',1,53,3,NULL),
 (24,'0015',67000,7,NULL,'2020-07-07',NULL,0,'0',1,53,3,NULL),
 (25,'0016',8000,8,NULL,'2020-07-07',NULL,0,'0',1,53,3,NULL),
 (26,'0017',100,100,NULL,'2020-07-07',NULL,0,'0',1,53,3,NULL),
 (27,'0018',75000,NULL,-75000,'2020-07-07','2022-01-07',0,NULL,1,53,4,NULL),
 (28,'0019',35000,12,4200,'2020-07-07','2021-03-07',0,NULL,1,53,4,NULL),
 (29,'0020',45000,10,4500,'2020-07-07','2021-05-07',0,'0',1,53,4,NULL),
 (30,'0021',55000,10,5500,'2020-07-07','2021-05-07',0,'0',1,53,5,NULL),
 (31,NULL,36000,NULL,720,'2020-07-09','2020-07-15',0,NULL,1,51,1,NULL),
 (32,NULL,36000,0,360,'2020-07-09','2020-07-15',0,'0',1,51,1,'sdasdasdas'),
 (33,NULL,36000,0,360,'2020-07-09','2020-07-15',0,'0',1,51,1,'dasdasdasda'),
 (34,NULL,93500,0,9350,'2020-07-09','2020-07-20',0,'0',1,9,1,'adsdasdasda'),
 (35,NULL,93500,0,3740,'2020-07-09','2020-07-16',0,'0',1,9,1,'cczxczxczx'),
 (36,NULL,93500,0,3740,'2020-07-09','2020-07-19',0,'0',1,9,1,'sdfdsfdsfsdf'),
 (37,NULL,93500,0,1870,'2020-07-09','2020-07-15',0,'0',1,9,1,'dfsaddds'),
 (38,NULL,93500,0,3740,'2020-07-09','2020-07-14',0,'0',1,9,1,'asxas');
/*!40000 ALTER TABLE `loan` ENABLE KEYS */;


--
-- Definition of table `loanpay`
--

DROP TABLE IF EXISTS `loanpay`;
CREATE TABLE `loanpay` (
  `loanPayId` int(11) NOT NULL AUTO_INCREMENT,
  `amount` double DEFAULT NULL,
  `datec` datetime DEFAULT NULL,
  `employeeId` int(11) NOT NULL,
  `status` int(11) DEFAULT '1',
  `loanId` int(11) NOT NULL,
  PRIMARY KEY (`loanPayId`),
  KEY `fk_loanPay_employee1_idx` (`employeeId`),
  KEY `fk_loanPay_loan2_idx` (`loanId`),
  CONSTRAINT `fk_loanPay_employee1` FOREIGN KEY (`employeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_loanPay_loan2` FOREIGN KEY (`loanId`) REFERENCES `loan` (`loanId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loanpay`
--

/*!40000 ALTER TABLE `loanpay` DISABLE KEYS */;
/*!40000 ALTER TABLE `loanpay` ENABLE KEYS */;


--
-- Definition of table `loantransfer`
--

DROP TABLE IF EXISTS `loantransfer`;
CREATE TABLE `loantransfer` (
  `loanTransferId` int(11) NOT NULL AUTO_INCREMENT,
  `fromloanId` int(11) NOT NULL,
  `toloanId` int(11) NOT NULL,
  `note` text,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`loanTransferId`,`fromloanId`,`toloanId`),
  KEY `fk_loan_has_loan_loan2_idx` (`toloanId`),
  KEY `fk_loan_has_loan_loan1_idx` (`fromloanId`),
  CONSTRAINT `fk_loan_has_loan_loan1` FOREIGN KEY (`fromloanId`) REFERENCES `loan` (`loanId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_loan_has_loan_loan2` FOREIGN KEY (`toloanId`) REFERENCES `loan` (`loanId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loantransfer`
--

/*!40000 ALTER TABLE `loantransfer` DISABLE KEYS */;
INSERT INTO `loantransfer` (`loanTransferId`,`fromloanId`,`toloanId`,`note`,`status`) VALUES 
 (13,4,33,'dasdasdasda',1),
 (14,4,34,'adsdasdasda',1),
 (15,5,34,'adsdasdasda',1),
 (16,4,35,'cczxczxczx',1),
 (17,5,35,'cczxczxczx',1),
 (18,4,36,'sdfdsfdsfsdf',1),
 (19,5,36,'sdfdsfdsfsdf',1),
 (20,4,37,'dfsaddds',1),
 (21,5,37,'dfsaddds',1),
 (22,4,38,'asxas',1),
 (23,5,38,'asxas',1);
/*!40000 ALTER TABLE `loantransfer` ENABLE KEYS */;


--
-- Definition of table `loantype`
--

DROP TABLE IF EXISTS `loantype`;
CREATE TABLE `loantype` (
  `loanTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`loanTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loantype`
--

/*!40000 ALTER TABLE `loantype` DISABLE KEYS */;
INSERT INTO `loantype` (`loanTypeId`,`name`,`status`) VALUES 
 (1,'Daily Loan',1),
 (2,'Monthly Loan',1),
 (3,'Monthly Loan(P Type)',1),
 (4,'Property Loan',1),
 (5,'Vehical Loan',1),
 (6,'Cheque Loan',1);
/*!40000 ALTER TABLE `loantype` ENABLE KEYS */;


--
-- Definition of table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `idlogin` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`idlogin`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` (`idlogin`,`name`,`username`,`password`,`status`) VALUES 
 (2,'thushitha','thushi','123',1),
 (3,'thushitha','thushi','123',1),
 (4,'thushitha','thushi','123',1),
 (5,'thushitha','thushi','123',1),
 (6,'thushitha','thushi','123',1),
 (7,'thushitha','thushi','123',1),
 (8,'thushitha','thushi','123',1),
 (9,'thushitha','madu','123',1),
 (10,'thushitha','madu','123',1),
 (11,'thushitha','madu','123',1),
 (13,'abc','sss','www',1),
 (14,'werd','qwe','123456',1),
 (15,'fristProject','vvv','111',1),
 (16,'madu','Madu','123',1),
 (17,'thushitha','aaa','eyJpdiI6IjJNSmVtVTUycFp6RHZPNW1DSlhHZGc9PSIsInZhbHVlIjoiMmk2dTRtY1U2ZHhWS09xZFFOREFHdz09IiwibWFjIjoiMjkwYTIyYzdhZTUzMzBhNDMzNTBkMjUwNWI4ZGZhY2VjYzQ2ZDFkZjcxMjNjODgzOTk3MWI1MTBlMjEyYThjOCJ9',1),
 (18,'Avishka','avi','eyJpdiI6IjQ1blZ1enVRUmE1eVZZQ3kwS01lN1E9PSIsInZhbHVlIjoiL3d3VkY3VjR4U2FmUkZHdzA1TElYZz09IiwibWFjIjoiNjBkMzY4YjFjOGUxYmQyOTcyMWU5OTUzZTIwZDBhZTNiYjU1MWUxNGRhM2FhODU5YTUyNmU3OTBiMzU0ZGU3ZSJ9',0);
/*!40000 ALTER TABLE `login` ENABLE KEYS */;


--
-- Definition of table `privilage`
--

DROP TABLE IF EXISTS `privilage`;
CREATE TABLE `privilage` (
  `privilageId` int(11) NOT NULL AUTO_INCREMENT,
  `employeeTypeId` int(11) NOT NULL,
  `interfaceId` int(11) NOT NULL,
  PRIMARY KEY (`privilageId`),
  KEY `fk_privilage_employeeType1_idx` (`employeeTypeId`),
  KEY `fk_privilage_interface1_idx` (`interfaceId`),
  CONSTRAINT `fk_privilage_employeeType1` FOREIGN KEY (`employeeTypeId`) REFERENCES `employeetype` (`employeeTypeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_privilage_interface1` FOREIGN KEY (`interfaceId`) REFERENCES `interface` (`interfaceId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `privilage`
--

/*!40000 ALTER TABLE `privilage` DISABLE KEYS */;
/*!40000 ALTER TABLE `privilage` ENABLE KEYS */;


--
-- Definition of table `propertydetails`
--

DROP TABLE IF EXISTS `propertydetails`;
CREATE TABLE `propertydetails` (
  `propertyDetailsId` int(11) NOT NULL AUTO_INCREMENT,
  `details` varchar(200) DEFAULT NULL,
  `documents` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `loanId` int(11) NOT NULL,
  PRIMARY KEY (`propertyDetailsId`),
  KEY `fk_propertyDetails_loan2_idx` (`loanId`),
  CONSTRAINT `fk_propertyDetails_loan2` FOREIGN KEY (`loanId`) REFERENCES `loan` (`loanId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `propertydetails`
--

/*!40000 ALTER TABLE `propertydetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `propertydetails` ENABLE KEYS */;


--
-- Definition of table `route`
--

DROP TABLE IF EXISTS `route`;
CREATE TABLE `route` (
  `routeId` int(11) NOT NULL AUTO_INCREMENT,
  `routename` varchar(50) DEFAULT NULL,
  `details` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`routeId`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `route`
--

/*!40000 ALTER TABLE `route` DISABLE KEYS */;
INSERT INTO `route` (`routeId`,`routename`,`details`,`status`) VALUES 
 (19,'Route A','AAAAAAAAAAAAAAa',1),
 (20,'Route B','xxxxxx',1),
 (21,'Route C','asdasd',1);
/*!40000 ALTER TABLE `route` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
