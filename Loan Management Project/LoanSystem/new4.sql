-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.6.36-log


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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--

/*!40000 ALTER TABLE `address` DISABLE KEYS */;
/*!40000 ALTER TABLE `address` ENABLE KEYS */;


--
-- Definition of table `bankaccount`
--

DROP TABLE IF EXISTS `bankaccount`;
CREATE TABLE `bankaccount` (
  `accountId` int(11) NOT NULL AUTO_INCREMENT,
  `accName` varchar(45) DEFAULT NULL,
  `accNumber` varchar(45) DEFAULT NULL,
  `employeeId` int(11) NOT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`accountId`),
  KEY `fk_bankAccount_employee1_idx` (`employeeId`),
  CONSTRAINT `fk_bankAccount_employee1` FOREIGN KEY (`employeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bankaccount`
--

/*!40000 ALTER TABLE `bankaccount` DISABLE KEYS */;
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
  `returnpanalty` double DEFAULT NULL,
  `realizeDate` datetime DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `loanId` int(11) NOT NULL,
  `status` int(11) DEFAULT '1',
  `returnstatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`checkDetailId`),
  KEY `fk_checkDetails_loan2_idx` (`loanId`),
  CONSTRAINT `fk_checkDetails_loan2` FOREIGN KEY (`loanId`) REFERENCES `loan` (`loanId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `checkdetails`
--

/*!40000 ALTER TABLE `checkdetails` DISABLE KEYS */;
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
  `marked` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `accountId` int(11) NOT NULL,
  `loanId` int(11) DEFAULT NULL,
  `employeeId` int(11) NOT NULL,
  `status` int(11) DEFAULT '1',
  `depositedate` date DEFAULT NULL,
  PRIMARY KEY (`transactionsId`),
  KEY `fk_chequeTransactions_bankAccount1_idx` (`accountId`),
  KEY `fk_chequeTransactions_loan1_idx` (`loanId`),
  KEY `fk_chequeTransactions_employee1_idx` (`employeeId`),
  CONSTRAINT `fk_chequeTransactions_bankAccount1` FOREIGN KEY (`accountId`) REFERENCES `bankaccount` (`accountId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_chequeTransactions_employee1` FOREIGN KEY (`employeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_chequeTransactions_loan1` FOREIGN KEY (`loanId`) REFERENCES `loan` (`loanId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chequetransactions`
--

/*!40000 ALTER TABLE `chequetransactions` DISABLE KEYS */;
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
  `collectedamount` double DEFAULT NULL,
  `handoverdate` datetime DEFAULT NULL,
  `collectiondate` date DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `arrershvamount` double DEFAULT NULL,
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
  `employeeId` int(11) NOT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`idcollector`),
  KEY `fk_collector_employee1_idx` (`employeeId`),
  CONSTRAINT `fk_collector_employee1` FOREIGN KEY (`employeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `collector`
--

/*!40000 ALTER TABLE `collector` DISABLE KEYS */;
/*!40000 ALTER TABLE `collector` ENABLE KEYS */;


--
-- Definition of table `collectorroute`
--

DROP TABLE IF EXISTS `collectorroute`;
CREATE TABLE `collectorroute` (
  `routeId` int(11) NOT NULL,
  `datec` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `idcollector` int(11) NOT NULL,
  `collectorRouteId` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) DEFAULT '1',
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
/*!40000 ALTER TABLE `collectorroute` ENABLE KEYS */;


--
-- Definition of table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `idcustomer` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `customerNo` varchar(45) DEFAULT NULL,
  `nic` varchar(20) DEFAULT NULL,
  `img` text,
  `name` varchar(45) DEFAULT NULL,
  `pno` varchar(15) DEFAULT NULL,
  `nickname` varchar(45) DEFAULT NULL,
  `email` varchar(130) DEFAULT NULL,
  `pno2` varchar(20) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `customerLevelId` int(11) NOT NULL,
  `addressId` int(11) NOT NULL,
  `routeId` int(11) NOT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`idcustomer`),
  KEY `fk_customer_customerLevel1_idx` (`customerLevelId`),
  KEY `fk_customer_address1_idx` (`addressId`),
  KEY `fk_customer_route1_idx` (`routeId`),
  CONSTRAINT `fk_customer_address1` FOREIGN KEY (`addressId`) REFERENCES `address` (`addressId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_customer_customerLevel1` FOREIGN KEY (`customerLevelId`) REFERENCES `customerlevel` (`customerLevelId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_customer_route1` FOREIGN KEY (`routeId`) REFERENCES `route` (`routeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
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
  `idlogin` int(11) NOT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`employeeId`),
  KEY `fk_employee_employeeType1_idx` (`employeeTypeId`),
  KEY `fk_employee_address1_idx` (`addressId`),
  KEY `fk_employee_login2_idx` (`idlogin`),
  CONSTRAINT `fk_employee_address1` FOREIGN KEY (`addressId`) REFERENCES `address` (`addressId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_employee_employeeType1` FOREIGN KEY (`employeeTypeId`) REFERENCES `employeetype` (`employeeTypeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_employee_login2` FOREIGN KEY (`idlogin`) REFERENCES `login` (`idlogin`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
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
 (1,'Admin',2),
 (2,'Main Employee',2),
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
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`guarantorId`),
  KEY `fk_guarantor_address1_idx` (`addressId`),
  CONSTRAINT `fk_guarantor_address1` FOREIGN KEY (`addressId`) REFERENCES `address` (`addressId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

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
  `guarantorLoanId` int(11) NOT NULL AUTO_INCREMENT,
  `guarantorId` int(11) NOT NULL,
  `datec` datetime DEFAULT NULL,
  `loanId` int(11) NOT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`guarantorLoanId`),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `holidays`
--

/*!40000 ALTER TABLE `holidays` DISABLE KEYS */;
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
  `loanId` int(11) NOT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`installmentId`),
  KEY `fk_installment_loan2_idx` (`loanId`),
  CONSTRAINT `fk_installment_loan2` FOREIGN KEY (`loanId`) REFERENCES `loan` (`loanId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `installment`
--

/*!40000 ALTER TABLE `installment` DISABLE KEYS */;
/*!40000 ALTER TABLE `installment` ENABLE KEYS */;


--
-- Definition of table `installmentpay`
--

DROP TABLE IF EXISTS `installmentpay`;
CREATE TABLE `installmentpay` (
  `installmentPayId` int(11) NOT NULL AUTO_INCREMENT,
  `amount` double DEFAULT NULL,
  `datec` date DEFAULT NULL,
  `installmentId` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`installmentPayId`),
  KEY `fk_installmentPay_installment1_idx` (`installmentId`),
  KEY `fk_installmentPay_employee1_idx` (`employeeId`),
  CONSTRAINT `fk_installmentPay_employee1` FOREIGN KEY (`employeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_installmentPay_installment1` FOREIGN KEY (`installmentId`) REFERENCES `installment` (`installmentId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

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
  `loanId` int(11) NOT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`interestId`),
  KEY `fk_interest_loan2_idx` (`loanId`),
  CONSTRAINT `fk_interest_loan2` FOREIGN KEY (`loanId`) REFERENCES `loan` (`loanId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `interest`
--

/*!40000 ALTER TABLE `interest` DISABLE KEYS */;
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
  `datec` date DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`interestPayId`),
  KEY `fk_interestPay_interest1_idx` (`interestId`),
  KEY `fk_interestPay_employee1_idx` (`employeeId`),
  CONSTRAINT `fk_interestPay_employee1` FOREIGN KEY (`employeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_interestPay_interest1` FOREIGN KEY (`interestId`) REFERENCES `interest` (`interestId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `interestpay`
--

/*!40000 ALTER TABLE `interestpay` DISABLE KEYS */;
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
  `idcustomer` int(11) NOT NULL,
  `loanTypeId` int(11) DEFAULT NULL,
  `loancomment` text,
  `status` int(11) DEFAULT '1',
  `hasfilestat` int(11) DEFAULT NULL,
  PRIMARY KEY (`loanId`),
  KEY `fk_loan_customer1_idx` (`idcustomer`),
  KEY `fk_loan_loanType1_idx` (`loanTypeId`),
  CONSTRAINT `fk_loan_customer1` FOREIGN KEY (`idcustomer`) REFERENCES `customer` (`idcustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_loan_loanType1` FOREIGN KEY (`loanTypeId`) REFERENCES `loantype` (`loanTypeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loan`
--

/*!40000 ALTER TABLE `loan` DISABLE KEYS */;
/*!40000 ALTER TABLE `loan` ENABLE KEYS */;


--
-- Definition of table `loanpay`
--

DROP TABLE IF EXISTS `loanpay`;
CREATE TABLE `loanpay` (
  `loanPayId` int(11) NOT NULL AUTO_INCREMENT,
  `amount` double DEFAULT NULL,
  `datec` date DEFAULT NULL,
  `employeeId` int(11) NOT NULL,
  `loanId` int(11) NOT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`loanPayId`),
  KEY `fk_loanPay_employee1_idx` (`employeeId`),
  KEY `fk_loanPay_loan2_idx` (`loanId`),
  CONSTRAINT `fk_loanPay_employee1` FOREIGN KEY (`employeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_loanPay_loan2` FOREIGN KEY (`loanId`) REFERENCES `loan` (`loanId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loantransfer`
--

/*!40000 ALTER TABLE `loantransfer` DISABLE KEYS */;
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
 (3,'Monthly Interst Loan',1),
 (4,'Land Mortgage',1),
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
  `lgstatus` int(11) DEFAULT '1',
  PRIMARY KEY (`idlogin`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

/*!40000 ALTER TABLE `login` DISABLE KEYS */;
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
  `loanId` int(11) NOT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`propertyDetailsId`),
  KEY `fk_propertyDetails_loan2_idx` (`loanId`),
  CONSTRAINT `fk_propertyDetails_loan2` FOREIGN KEY (`loanId`) REFERENCES `loan` (`loanId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `route`
--

/*!40000 ALTER TABLE `route` DISABLE KEYS */;
/*!40000 ALTER TABLE `route` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
