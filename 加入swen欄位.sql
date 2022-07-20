-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: backend
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `bookdate` date NOT NULL,
  `staffname` varchar(100) NOT NULL,
  `remark` varchar(100) DEFAULT NULL,
  `bdate` date NOT NULL,
  `kmpid` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (1,1,'ASUS','2022-07-13','蔡明明','','2022-07-13','KMP-20220713001'),(2,2,'DELL','2022-07-23','陳澎澎','','2022-07-14','KMP-20220723002'),(3,3,'Acer','2022-07-16','',NULL,'2022-07-15','KMP-20220716001'),(4,4,'Msi','2022-07-16','',NULL,'2022-07-16','KMP-20220716002');
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookdetail`
--

DROP TABLE IF EXISTS `bookdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookdetail` (
  `bdetailid` int(11) NOT NULL AUTO_INCREMENT,
  `bid` int(11) DEFAULT NULL,
  `mname` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `stockIn` date DEFAULT NULL,
  `pstatus` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`bdetailid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookdetail`
--

LOCK TABLES `bookdetail` WRITE;
/*!40000 ALTER TABLE `bookdetail` DISABLE KEYS */;
INSERT INTO `bookdetail` VALUES (1,1,'ASUS ZenScreen Go MB16AWP',30,13900,'2022-07-13','Y'),(2,2,'DELL　Inspiron 13',23,33899,'2022-07-23','Y'),(3,2,'PowerEdge R740xd 機架式伺服器',64,432000,'2022-07-14','Y'),(4,2,'Dell PowerEdge 2U 標準 Bezel',56,1003,'2022-07-14','Y'),(5,3,'Veriton K8',65,321554,'2022-07-16','Y'),(6,3,'H7550ST',17,22900,'2022-07-16','Y'),(7,4,'Prestige 14 - A12U',48,38900,'2022-07-16','Y'),(8,4,'Katana GF66 - 12U',91,45900,'2022-07-16','Y'),(9,4,'MSI Pen',100,3090,'2022-07-16',NULL);
/*!40000 ALTER TABLE `bookdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(100) NOT NULL,
  `ctel` varchar(100) NOT NULL,
  `cmail` varchar(100) NOT NULL,
  `caddress` varchar(100) NOT NULL,
  `tradecode` varchar(100) NOT NULL,
  `legalletter` varchar(100) NOT NULL,
  `instruments` varchar(100) NOT NULL,
  `director` varchar(100) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `salesrep` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `clineid` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (33,'33股份有限公司','043333333','hey_33@gmail.com','台中市南屯區公益路二段51號25樓','123','交換','買賣方','877','877','87','12312314','hey_33'),(34,'swen股份有限公司','04434343433','swen_0440@gmail.com','台中市南屯區公益路二段51號3樓','456','存證','買賣方','祥老大','','','','swen_0440'),(56,'宇哥股份有限公司','19941994','Lynn#3008@gmail.com','臺中市中區建國路172號','1994','交換','買賣方','宇哥','19941994','宇哥','臺中市中區建國路172號','Lynn#3008'),(66,'南瓜股份無限公司','0485555684','Pumpkin@gmail.com','彰化縣大村鄉福興村三角路1號','2020','交換','買賣方','南瓜',NULL,NULL,NULL,'Pumpkincute');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery`
--

DROP TABLE IF EXISTS `delivery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `delivery` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `dcontact` varchar(100) DEFAULT NULL,
  `dtel` varchar(100) DEFAULT NULL,
  `daddress` varchar(100) DEFAULT NULL,
  `mid` int(11) NOT NULL,
  `dstatus` varchar(100) DEFAULT NULL,
  `ddate` date DEFAULT NULL,
  `drownumber` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery`
--

LOCK TABLES `delivery` WRITE;
/*!40000 ALTER TABLE `delivery` DISABLE KEYS */;
INSERT INTO `delivery` VALUES (1,'張珊珊','0433','台中市南屯區公益路二段51號25樓',1,'N',NULL,NULL),(2,'祥老大','04434343433','台中市南屯區公益路二段51號3樓',2,'N',NULL,NULL);
/*!40000 ALTER TABLE `delivery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detaillist`
--

DROP TABLE IF EXISTS `detaillist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detaillist` (
  `dlid` int(11) NOT NULL AUTO_INCREMENT,
  `qid` int(11) DEFAULT NULL,
  `iid` int(11) DEFAULT NULL,
  `rid` int(11) DEFAULT NULL,
  `mname` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `mspecification` varchar(100) NOT NULL,
  `mnumber` varchar(100) NOT NULL,
  `remark` varchar(100) DEFAULT NULL,
  `pstatus` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`dlid`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detaillist`
--

LOCK TABLES `detaillist` WRITE;
/*!40000 ALTER TABLE `detaillist` DISABLE KEYS */;
INSERT INTO `detaillist` VALUES (1,1,1,89,'楷模MB16AWP',5,20000,'ASUS MB16AWP','KM-987654321','買五台螢幕','Y'),(2,2,2,50,'楷模Inspiron 13',12,78999,'Inspiron 13','KM-123214215','買十二台筆電','Y'),(3,2,1,89,'楷模MB16AWP',3,20000,'ASUS MB16AWP','KM-987654321','買三台螢幕','Y'),(4,4,3,NULL,'PowerEdge R740xd 機架式伺服器',2,640000,'R740xd 機架式伺服器','KM-492120864',NULL,'Y'),(5,4,4,NULL,'Dell PowerEdge 2U 標準 Bezel',4,1999,'PowerEdge 2U 標準 Bezel','KM-324823386',NULL,'Y'),(6,4,5,NULL,'Veriton K8',7,577777,'Veriton K8','KM-725848506',NULL,'Y'),(7,5,6,NULL,'H7550ST',1,38999,'MR.JKY11.00J','KM-899364835',NULL,'Y'),(8,5,7,NULL,'Prestige 14 - A12U',5,76999,'Prestige 14 - A12U','KM-110808294',NULL,'Y'),(9,5,8,NULL,'Katana GF66 - 12U',2,73399,'Katana GF66 - 12U','KM-17516092',NULL,'Y'),(10,6,9,NULL,'MSI Pen',9,4500,'MSI Pen','KM-252609029',NULL,'Y'),(11,6,1,NULL,'ASUS ZenScreen Go MB16AWP',2,23200,'ASUS MB16AWP','KM-987654321',NULL,'Y'),(12,6,2,NULL,'DELL　Inspiron 13',5,48999,'Inspiron 13','KM-123214215',NULL,'Y'),(13,7,3,NULL,'PowerEdge R740xd 機架式伺服器',2,640000,'R740xd 機架式伺服器','KM-492120864',NULL,'Y'),(14,7,4,NULL,'Dell PowerEdge 2U 標準 Bezel',5,1999,'PowerEdge 2U 標準 Bezel','KM-324823386',NULL,'Y'),(15,7,5,NULL,'Veriton K8',4,577777,'Veriton K8','KM-725848506',NULL,'Y'),(16,8,6,NULL,'H7550ST',10,38999,'MR.JKY11.00J','KM-899364835',NULL,'Y'),(17,8,7,NULL,'Prestige 14 - A12U',7,76999,'Prestige 14 - A12U','KM-110808294',NULL,'Y'),(18,8,8,NULL,'Katana GF66 - 12U',6,73399,'Katana GF66 - 12U','KM-175160920',NULL,'Y'),(19,9,9,NULL,'MSI Pen',12,4500,'MSI Pen','M-252609029',NULL,'Y'),(20,9,1,NULL,'ASUS ZenScreen Go MB16AWP',3,23200,'ASUS MB16AWP','KM-987654321',NULL,'Y'),(21,9,2,NULL,'DELL　Inspiron 13',8,48999,'Inspiron 13','KM-123214215',NULL,'Y'),(22,4,3,NULL,'PowerEdge R740xd 機架式伺服器',2,640000,'R740xd 機架式伺服器','KM-492120864',NULL,'Y'),(23,10,4,NULL,'Dell PowerEdge 2U 標準 Bezel',1,1999,'PowerEdge 2U 標準 Bezel','KM-324823386',NULL,'N'),(24,10,5,NULL,'Veriton K8',5,577777,'Veriton K8','KM-725848506',NULL,'N'),(25,10,6,NULL,'H7550ST',10,38999,'MR.JKY11.00J','KM-899364835',NULL,'N'),(26,11,7,NULL,'Prestige 14 - A12U',15,76999,'Prestige 14 - A12U','KM-110808294',NULL,'N'),(27,11,8,NULL,'Katana GF66 - 12U',11,73399,'Katana GF66 - 12U','KM-175160920',NULL,'N'),(28,12,9,NULL,'MSI Pen',8,4500,'MSI Pen','KM-252609029',NULL,'N'),(29,12,1,NULL,'ASUS ZenScreen Go MB16AWP',25,23200,'ASUS MB16AWP','KM-987654321',NULL,'N'),(30,12,2,NULL,'DELL　Inspiron 13',17,48999,'Inspiron 13','KM-123214215',NULL,'N'),(31,13,3,NULL,'PowerEdge R740xd 機架式伺服器',1,640000,'R740xd 機架式伺服器','KM-492120864',NULL,'N'),(32,13,4,NULL,'Dell PowerEdge 2U 標準 Bezel',30,1999,'PowerEdge 2U 標準 Bezel','KM-324823386',NULL,'N'),(33,13,5,NULL,'Veriton K8',577777,6,'Veriton K8','KM-725848506',NULL,'N');
/*!40000 ALTER TABLE `detaillist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) DEFAULT NULL,
  `mname` varchar(100) NOT NULL,
  `mnumber` varchar(100) NOT NULL,
  `sid` int(11) NOT NULL,
  `mspecification` varchar(100) NOT NULL,
  `cost` int(11) NOT NULL,
  `sumquantity` int(11) NOT NULL,
  `bdetailid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`iid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` VALUES (1,1,'ASUS ZenScreen Go MB16AWP','KM-987654321',1,'ASUS MB16AWP',13900,30,1,30),(2,2,'DELL　Inspiron 13','KM-123214215',2,'Inspiron 13',33899,23,2,23),(3,3,'PowerEdge R740xd 機架式伺服器','KM-492120864',2,'R740xd 機架式伺服器',432000,64,3,64),(4,4,'Dell PowerEdge 2U 標準 Bezel','KM-324823386',2,'PowerEdge 2U 標準 Bezel',1003,56,4,56),(5,5,'Veriton K8','KM-725848506',3,'Veriton K8',321554,65,5,65),(6,6,'H7550ST','KM-899364835',3,'MR.JKY11.00J',22900,17,6,17),(7,7,'Prestige 14 - A12U','KM-110808294',4,'Prestige 14 - A12U',38900,48,7,48),(8,8,'Katana GF66 - 12U','KM-175160920',4,'Katana GF66 - 12U',45900,91,8,91),(9,9,'MSI Pen','KM-252609029',4,'MSI Pen',3090,100,9,100);
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice` (
  `invoiceid` varchar(100) NOT NULL,
  `iid` int(11) DEFAULT NULL,
  PRIMARY KEY (`invoiceid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` VALUES ('KMI-985562625',2),('KMI-987654322',1);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoicedetail`
--

DROP TABLE IF EXISTS `invoicedetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoicedetail` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `invoiceid` varchar(100) DEFAULT NULL,
  `did` int(11) DEFAULT NULL,
  PRIMARY KEY (`iid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoicedetail`
--

LOCK TABLES `invoicedetail` WRITE;
/*!40000 ALTER TABLE `invoicedetail` DISABLE KEYS */;
INSERT INTO `invoicedetail` VALUES (1,'KMI-987654322',1),(2,'KMI-985562625',2);
/*!40000 ALTER TABLE `invoicedetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manufacture`
--

DROP TABLE IF EXISTS `manufacture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manufacture` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `mdate` date NOT NULL,
  `mcomplete` varchar(100) DEFAULT NULL,
  `oid` int(11) NOT NULL,
  `mremark` varchar(100) DEFAULT NULL,
  `mstatus` varchar(100) DEFAULT NULL,
  `mrownumber` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manufacture`
--

LOCK TABLES `manufacture` WRITE;
/*!40000 ALTER TABLE `manufacture` DISABLE KEYS */;
INSERT INTO `manufacture` VALUES (1,'2022-07-17','Y',1,'無asdasdsad','Y',NULL),(2,'2022-08-13','Y',2,'無','Y',NULL),(3,'2022-07-20','N',1,NULL,'N',NULL);
/*!40000 ALTER TABLE `manufacture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `mnumber` varchar(100) NOT NULL,
  `mspecification` varchar(100) NOT NULL,
  `cost` int(11) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=540 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material`
--

LOCK TABLES `material` WRITE;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
INSERT INTO `material` VALUES (1,1,'ASUS ZenScreen Go MB16AWP','KM-987654321','ASUS MB16AWP',13900),(2,2,'DELL　Inspiron 13','KM-123214215','Inspiron 13',33899),(3,2,'PowerEdge R740xd 機架式伺服器','KM-492120864','R740xd 機架式伺服器',432000),(4,2,'Dell PowerEdge 2U 標準 Bezel','KM-324823386','PowerEdge 2U 標準 Bezel',1003),(5,3,'Veriton K8','KM-725848506','Veriton K8',321554),(6,3,'H7550ST','KM-899364835','MR.JKY11.00J',22900),(7,4,'Prestige 14 - A12U','KM-110808294','Prestige 14 - A12U',38900),(8,4,'Katana GF66 - 12U','KM-17516092','Katana GF66 - 12U',45900),(9,4,'MSI Pen','KM-252609029','MSI Pen',3090);
/*!40000 ALTER TABLE `material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `odate` date NOT NULL,
  `paydate` date DEFAULT NULL,
  `qid` int(11) NOT NULL,
  `ostatus` varchar(100) DEFAULT NULL,
  `orownumber` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (1,'2022-07-17','2022-07-20',1,'Y',NULL),(2,'2022-08-10','2022-08-09',2,'Y',NULL);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quotation`
--

DROP TABLE IF EXISTS `quotation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quotation` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `qdate` date NOT NULL,
  `cid` int(11) NOT NULL,
  `qcontact` varchar(100) NOT NULL,
  `cmail` varchar(100) DEFAULT NULL,
  `staffid` int(11) DEFAULT NULL,
  `dlid` int(11) DEFAULT NULL,
  `rid` int(11) DEFAULT NULL,
  `qstatus` varchar(100) DEFAULT NULL,
  `qrownumber` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotation`
--

LOCK TABLES `quotation` WRITE;
/*!40000 ALTER TABLE `quotation` DISABLE KEYS */;
INSERT INTO `quotation` VALUES (1,'2022-07-15',33,'張珊珊','hey_33@gmail.com',1,1,89,'Y',NULL),(2,'2022-07-31',34,'祥老大','swen_0440@gmail.com',2,2,50,'Y',NULL),(4,'2022-07-16',34,'祥老大','swen_0440@gmail.com',NULL,NULL,NULL,'Y','KMQ-20220716001'),(5,'2022-07-16',56,'宇哥','Lynn#3008@gmail.com',NULL,NULL,NULL,'Y','KMQ-20220716002'),(6,'2022-07-27',66,'南瓜','Pumpkin@gmail.com',NULL,NULL,NULL,'Y','KMQ-20220727001'),(7,'2022-07-27',33,'張珊珊','hey_33@gmail.com',NULL,NULL,NULL,'Y','KMQ-20220727002'),(8,'2022-07-27',34,'祥老大','swen_0440@gmail.com',NULL,NULL,NULL,'Y','KMQ-20220727003'),(9,'2022-07-21',56,'宇哥','Lynn#3008@gmail.com',NULL,NULL,NULL,'Y','KMQ-20220721001'),(10,'2022-07-21',66,'南瓜','Pumpkin@gmail.com',NULL,NULL,NULL,'Y','KMQ-20220721002'),(11,'2022-07-21',33,'張珊珊','hey_33@gmail.com',NULL,NULL,NULL,'Y','KMQ-20220721003'),(12,'2022-07-23',34,'祥老大','swen_0440@gmail.com',NULL,NULL,NULL,'Y','KMQ-20220723001'),(13,'2022-07-23',56,'宇哥','Lynn#3008@gmail.com',NULL,NULL,NULL,'N','KMQ-20220723002');
/*!40000 ALTER TABLE `quotation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rebate`
--

DROP TABLE IF EXISTS `rebate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rebate` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `rtitle` varchar(100) NOT NULL,
  `rcontent` varchar(100) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rebate`
--

LOCK TABLES `rebate` WRITE;
/*!40000 ALTER TABLE `rebate` DISABLE KEYS */;
INSERT INTO `rebate` VALUES (50,'5折','打5折'),(89,'89折','打89折');
/*!40000 ALTER TABLE `rebate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `staffid` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(100) NOT NULL,
  `staffname` varchar(100) NOT NULL,
  `stafftel` varchar(100) NOT NULL,
  `staffmail` varchar(100) NOT NULL,
  PRIMARY KEY (`staffid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (1,'123456','蔡明明','047777777','MingMing@gmail.com'),(2,'654321','陳澎澎','048787878','pengpeng@gmail.com');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplier` (
  `sid` int(11) NOT NULL AUTO_INCREMENT COMMENT '供應商id(統編)',
  `sname` varchar(50) NOT NULL COMMENT '供應商名稱',
  `smail` varchar(100) DEFAULT NULL COMMENT 'Email',
  `stel` varchar(100) DEFAULT NULL COMMENT '電話',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='supplier(供應商)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (1,'ASUS','ASUS@gmail.com','021234567'),(2,'DELL','DELL@gmail.com','022132150'),(3,'Acer','Acer@gmail.com','045458864'),(4,'Msi','Msi@gmail.com','046348564');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-21  1:35:34
