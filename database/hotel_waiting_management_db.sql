CREATE DATABASE  IF NOT EXISTS `hotel` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `hotel`;
-- MySQL dump 10.13  Distrib 5.5.54, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: hotel
-- ------------------------------------------------------
-- Server version	5.5.54-0ubuntu0.12.04.1

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
-- Table structure for table `hotelrate`
--

DROP TABLE IF EXISTS `hotelrate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotelrate` (
  `hotelid` int(5) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `hotelrateid` int(5) NOT NULL AUTO_INCREMENT,
  `rate` int(5) NOT NULL,
  PRIMARY KEY (`hotelrateid`),
  KEY `fk_hotel_rate_1` (`hotelid`),
  KEY `fk_hotel_rate_2` (`userid`),
  CONSTRAINT `fk_hotel_rate_1` FOREIGN KEY (`hotelid`) REFERENCES `hotelregister` (`hotelid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_hotel_rate_2` FOREIGN KEY (`userid`) REFERENCES `userregister` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotelrate`
--

LOCK TABLES `hotelrate` WRITE;
/*!40000 ALTER TABLE `hotelrate` DISABLE KEYS */;
INSERT INTO `hotelrate` VALUES (7,'nidhi22',1,5),(8,'nidhi22',2,3),(9,'nidhi22',3,3),(10,'nidhi22',4,3),(11,'nidhi22',5,3),(12,'nidhi22',6,4),(15,'nidhi22',7,3),(14,'nidhi22',8,4),(16,'nidhi22',9,1),(7,'janvi26',10,3),(8,'janvi26',11,2),(9,'janvi26',12,4),(10,'janvi26',13,4),(11,'janvi26',14,3),(12,'janvi26',15,2),(14,'janvi26',16,4),(15,'janvi26',17,1),(16,'janvi26',18,2),(8,'hiral23',19,4),(16,'hiral23',20,4),(7,'pinjoli2912',21,5),(8,'pinjoli2912',23,5),(18,'pinjoli2912',24,5),(18,'himanshu3110',25,3),(17,'himanshu3110',26,3),(17,'rudra1904',27,5),(14,'krunal0000',28,1),(9,'krunal0000',29,2);
/*!40000 ALTER TABLE `hotelrate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `packagebill`
--

DROP TABLE IF EXISTS `packagebill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `packagebill` (
  `hotelid` int(5) NOT NULL,
  `packageid` int(5) NOT NULL,
  `packagebillid` int(5) NOT NULL AUTO_INCREMENT,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `paymentreferencecode` varchar(50) NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`packagebillid`),
  KEY `fk_package_bill_1` (`hotelid`),
  KEY `fk_package_bill_2` (`packageid`),
  CONSTRAINT `fk_package_bill_1` FOREIGN KEY (`hotelid`) REFERENCES `hotelregister` (`hotelid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_package_bill_2` FOREIGN KEY (`packageid`) REFERENCES `package` (`packageid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packagebill`
--

LOCK TABLES `packagebill` WRITE;
/*!40000 ALTER TABLE `packagebill` DISABLE KEYS */;
INSERT INTO `packagebill` VALUES (7,8,6,'2020-04-08','2020-10-08','',1),(7,8,7,'2020-03-17','2020-03-17','',0),(17,10,8,'2020-04-08','2020-10-08','',1),(17,10,9,'2020-04-28','2020-10-28','',1);
/*!40000 ALTER TABLE `packagebill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menucategory`
--

DROP TABLE IF EXISTS `menucategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menucategory` (
  `hotelid` int(5) NOT NULL,
  `menucategoryid` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  PRIMARY KEY (`menucategoryid`),
  KEY `fk_menu_category_1` (`hotelid`),
  CONSTRAINT `fk_menu_category_1` FOREIGN KEY (`hotelid`) REFERENCES `hotelregister` (`hotelid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menucategory`
--

LOCK TABLES `menucategory` WRITE;
/*!40000 ALTER TABLE `menucategory` DISABLE KEYS */;
INSERT INTO `menucategory` VALUES (7,29,'hh','icon/hh.jpeg'),(8,31,'punjabi','icon/punjabi.jpeg'),(7,32,'dhosaa','icon/dhosaa.png'),(21,33,'breckfast','icon/breckfast.jpeg'),(21,34,'all day breckfast','icon/all day breckfast.jpeg'),(21,35,'side accompanies','icon/side accompanies.jpeg'),(21,36,'balgian waffles','icon/balgian waffles.jpeg'),(21,38,'on toast','icon/on toast.jpeg'),(17,39,'continental','icon/continental.jpeg'),(17,40,'chinese','icon/chinese.png'),(17,41,'indian','icon/indian.png'),(17,42,'dessert','icon/dessert.png');
/*!40000 ALTER TABLE `menucategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menuitem`
--

DROP TABLE IF EXISTS `menuitem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menuitem` (
  `menucategoryid` int(5) NOT NULL,
  `itemid` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `price` int(5) NOT NULL,
  PRIMARY KEY (`itemid`),
  KEY `fk_menu_item_1` (`menucategoryid`),
  CONSTRAINT `fk_menu_item_1` FOREIGN KEY (`menucategoryid`) REFERENCES `menucategory` (`menucategoryid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menuitem`
--

LOCK TABLES `menuitem` WRITE;
/*!40000 ALTER TABLE `menuitem` DISABLE KEYS */;
INSERT INTO `menuitem` VALUES (32,14,'plan paper','image/plan paper.png',40),(32,15,'chezz paper','image/chezz paper.png',60),(32,16,'cripsy  paper','image/cripsy  paper.png',80),(32,17,'masala paper','image/masala paper.png',100),(31,18,'kajukari','image/kajukari.jpeg',450),(32,19,'mast paper','image/mast paper.png',50),(32,20,'panier paper','image/panier paper.jpeg',120),(32,21,'chinez paper','image/chinez paper.png',200),(33,22,'brown poha','image/brown poha.png',150),(34,23,'seasonal fresh fruit','image/seasonal fresh fruit.png',225),(35,24,'khari','image/khari.png',75),(35,25,'assorted cookies','image/assorted cookies.jpeg',90),(36,26,'classic waffle','image/classic waffle.png',175),(36,27,'oreo or kitkat waffle','image/oreo or kitkat waffle.png',225),(36,28,'mix fruit waffle','image/mix fruit waffle.png',250),(38,29,'cheese chilli','image/cheese chilli.png',150),(38,30,'tomato basil and cheese','image/tomato basil and cheese.jpeg',175),(38,31,'mushroom and cheese','image/mushroom and cheese.jpeg',175),(39,32,'mexican chilly bean','image/mexican chilly bean.jpeg',330),(39,33,'thai rice','image/thai rice.jpeg',330),(39,34,'cheese and pepper','image/cheese and pepper.png',380),(40,35,'spicy noodle','image/spicy noodle.jpeg',215),(40,36,'vegetable sweet corn','image/vegetable sweet corn.jpeg',160),(40,37,'vegetable manchuriyam','image/vegetable manchuriyan dry.jpeg',230),(39,38,'french fray','image/french fray.jpeg',210),(39,39,'cheese chilly corn','image/cheese chilly corn.jpeg',320),(39,40,'toastada','image/toastada.jpeg',240),(40,41,'paneer pataya','image/paneer pataya.jpeg',295),(40,42,'baby corn','image/baby corn.jpeg',260),(40,43,'vegetable spring roll','image/vegetable spring roll.jpeg',230),(41,44,'gulati kebab','image/gulati kebab.jpeg',215),(41,45,'shahi roll','image/shahi roll.jpeg',220),(41,46,'dal fry','image/dal fry.jpeg',175),(41,47,'dal palak','image/dal palak.jpeg',200),(41,48,'kadai chole','image/kadai chole.jpeg',220),(41,49,'amritsari paneer bhurji','image/amritsari paneer bhurji.jpeg',325),(41,50,'paneer butter masala','image/paneer butter masala.jpeg',325),(41,51,'sabji makhani','image/sabji makhani.jpeg',260),(41,52,'garlic roti','image/garlic roti.jpeg',60),(41,53,'kulcha','image/kulcha.jpeg',80),(41,54,'cheese naan','image/cheese naan.jpeg',175),(41,55,'zeera rice','image/zeera rice.jpeg',175),(41,56,'dal khichdi','image/dal khichdi.jpeg',215),(41,57,'roasted papad','image/roasted papad.jpeg',35),(41,58,'grren salad','image/grren salad.jpeg',160),(42,59,'ice cream','image/ice cream.jpeg',150),(42,60,'venilla with hot chocalate','image/venilla with hot chocalate.jpeg',190),(42,61,'sizzling brownie icecream','image/sizzling brownie ice creame.jpeg',235),(42,62,'brownie addiction','image/brownie addiction.jpeg',235),(42,63,'fruit cream','image/fruit cream.jpeg',290);
/*!40000 ALTER TABLE `menuitem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userregister`
--

DROP TABLE IF EXISTS `userregister`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userregister` (
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `referpoint` int(5) NOT NULL,
  `refercode` varchar(20) NOT NULL,
  `lastlogin` varchar(45) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userregister`
--

LOCK TABLES `userregister` WRITE;
/*!40000 ALTER TABLE `userregister` DISABLE KEYS */;
INSERT INTO `userregister` VALUES ('dhara','patel','9825631231','dharapatel@gmail.com','dhara1201','dhara2002',100,'082Mh11','04-06-2020 02:58:41'),('himanshu','sheta','9429279768','himss5481@gmail.com','himanshu3110','himanshu1999',50,'251Ec16','04-06-2020 02:58:41'),('hiral','meswania','7878787878','hiralme22@gmail.com','hiral23','hiral1996',50,'358Ro15','04-06-2020 02:58:41'),('janvi','dhameliya','7990571945','janvi2626@gmail.com','janvi26','janvi2000',50,'289Ex20','04-06-2020 02:58:41'),('krunal','shah','1234567890','krunalshah@gmail.com','krunal0000','krunal0000',50,'597Rr21','04-06-2020 02:58:41'),('nidhu','lakkad','9773285270','nidhilakkad8@gmail.com','nidhi22','nidhi2000',50,'128Kk15','04-06-2020 02:58:41'),('pinjoli','kotadiya','6352252047','pkotadiya2912@gmail.com','pinjoli2912','pinjoli1999',50,'528Kf13','04-06-2020 02:58:41'),('rudra','vaghasiya','9601744555','rudravaghasiya@gmail.com','rudra1904','rudra2000',100,'898Nt21','04-06-2020 02:58:41'),('shubham','lakkad','6352129350','shubhamlakkad8@gmail.com','shubham2003','shubham26',50,'475Eg11','04-06-2020 02:58:41'),('SIDDHI','RADADIYA','8160751393','SIDDHIRADADIYA@GMAIL.COM','SIDDHI2107','SIDDHI2000',50,'482Sp11','04-06-2020 02:58:41');
/*!40000 ALTER TABLE `userregister` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package`
--

DROP TABLE IF EXISTS `package`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `package` (
  `packageid` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `duration` int(5) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `logo` varchar(50) NOT NULL,
  PRIMARY KEY (`packageid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package`
--

LOCK TABLES `package` WRITE;
/*!40000 ALTER TABLE `package` DISABLE KEYS */;
INSERT INTO `package` VALUES (8,' gold',6,' 2000','package/gold.jpeg'),(9,'silver',5,'2400','package/silver.png'),(10,'pluto',6,'2400','package/pluto.png');
/*!40000 ALTER TABLE `package` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hoteltable`
--

DROP TABLE IF EXISTS `hoteltable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hoteltable` (
  `hotelid` int(5) NOT NULL,
  `tableid` int(5) NOT NULL AUTO_INCREMENT,
  `tablenumber` int(5) NOT NULL,
  `seat` int(5) NOT NULL,
  `fillstatus` int(5) NOT NULL,
  PRIMARY KEY (`tableid`),
  KEY `fk_hotel_table_1` (`hotelid`),
  CONSTRAINT `fk_hotel_table_1` FOREIGN KEY (`hotelid`) REFERENCES `hotelregister` (`hotelid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hoteltable`
--

LOCK TABLES `hoteltable` WRITE;
/*!40000 ALTER TABLE `hoteltable` DISABLE KEYS */;
INSERT INTO `hoteltable` VALUES (7,1,1,6,0),(7,3,2,5,0),(17,4,1,10,0),(17,5,2,5,0),(17,6,3,4,0),(17,7,4,2,0);
/*!40000 ALTER TABLE `hoteltable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscribe`
--

DROP TABLE IF EXISTS `subscribe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscribe` (
  `subscribeid` int(5) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`subscribeid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscribe`
--

LOCK TABLES `subscribe` WRITE;
/*!40000 ALTER TABLE `subscribe` DISABLE KEYS */;
INSERT INTO `subscribe` VALUES (5,'himss5481@gmail.com'),(6,'dharapatel@gmail.com'),(7,'rudravaghasiya@gmail.com'),(8,'krunalshah@gmail.com');
/*!40000 ALTER TABLE `subscribe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hoteloffer`
--

DROP TABLE IF EXISTS `hoteloffer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hoteloffer` (
  `hotelid` int(5) NOT NULL,
  `offerid` int(5) NOT NULL AUTO_INCREMENT,
  `offername` varchar(20) NOT NULL,
  `offerper` int(5) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `offerrunningstatus` int(5) NOT NULL,
  `offer` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`offerid`),
  KEY `fk_hotel_offer_1` (`hotelid`),
  CONSTRAINT `fk_hotel_offer_1` FOREIGN KEY (`hotelid`) REFERENCES `hotelregister` (`hotelid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hoteloffer`
--

LOCK TABLES `hoteloffer` WRITE;
/*!40000 ALTER TABLE `hoteloffer` DISABLE KEYS */;
INSERT INTO `hoteloffer` VALUES (7,1,'jkhjk',154,'2019-01-05','2020-10-31',1,'sunday'),(7,2,'abcd',45,'2009-12-24','2012-10-29',0,'monday'),(9,3,'dhamaka',50,'2011-02-03','2015-11-30',1,'toto'),(7,4,'mr',50,'2019-12-31','2020-04-30',1,'mondattosunday'),(17,5,'flash sale',20,'2020-03-04','2025-01-30',1,'sunday');
/*!40000 ALTER TABLE `hoteloffer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotelreview`
--

DROP TABLE IF EXISTS `hotelreview`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotelreview` (
  `hotelid` int(5) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `hotelreviewid` int(5) NOT NULL AUTO_INCREMENT,
  `review` varchar(500) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`hotelreviewid`),
  KEY `fk_hotel_review_1` (`hotelid`),
  KEY `fk_hotel_review_2` (`userid`),
  CONSTRAINT `fk_hotel_review_1` FOREIGN KEY (`hotelid`) REFERENCES `hotelregister` (`hotelid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_hotel_review_2` FOREIGN KEY (`userid`) REFERENCES `userregister` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotelreview`
--

LOCK TABLES `hotelreview` WRITE;
/*!40000 ALTER TABLE `hotelreview` DISABLE KEYS */;
INSERT INTO `hotelreview` VALUES (7,'janvi26',1,'good food','2020-03-05'),(12,'janvi26',2,'sss','2020-03-06'),(8,'hiral23',3,'its good for food','2020-03-11'),(7,'pinjoli2912',4,'super work','2020-03-20'),(7,'pinjoli2912',5,'osm work','2020-03-20'),(17,'pinjoli2912',6,'fabulous work ','2020-03-20'),(8,'pinjoli2912',7,'nc','2020-03-20'),(18,'pinjoli2912',8,'good work','2020-03-20'),(17,'rudra1904',9,'nice service','2020-04-28');
/*!40000 ALTER TABLE `hotelreview` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area` (
  `areaid` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`areaid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (1,'piplod'),(2,'adajan'),(3,'jakatnaka'),(4,'vesu'),(5,'parle point'),(6,'Adajan gam'),(7,'udhana'),(8,'isconmall'),(9,'Dumas road'),(10,'  hirabag'),(11,'umra'),(12,'bhatha');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userrefercode`
--

DROP TABLE IF EXISTS `userrefercode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userrefercode` (
  `userid` varchar(20) NOT NULL,
  `userid1` varchar(20) NOT NULL,
  `userefercodeid` int(5) NOT NULL AUTO_INCREMENT,
  `refercode` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `totalamount` int(5) NOT NULL,
  `referdiscount` int(5) NOT NULL,
  `billid` varchar(45) NOT NULL,
  PRIMARY KEY (`userefercodeid`),
  KEY `fk_use_refercode_1` (`userid`),
  KEY `fk_use_refercode_2` (`userid1`),
  CONSTRAINT `fk_use_refercode_1` FOREIGN KEY (`userid`) REFERENCES `userregister` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_use_refercode_2` FOREIGN KEY (`userid1`) REFERENCES `userregister` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userrefercode`
--

LOCK TABLES `userrefercode` WRITE;
/*!40000 ALTER TABLE `userrefercode` DISABLE KEYS */;
INSERT INTO `userrefercode` VALUES ('dhara1201','himanshu3110',5,'082Mh11','2020-03-15',1250,188,'50'),('rudra1904','himanshu3110',6,'898NT21','2020-04-28',1050,158,'15');
/*!40000 ALTER TABLE `userrefercode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotelhall`
--

DROP TABLE IF EXISTS `hotelhall`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotelhall` (
  `hotelid` int(5) NOT NULL,
  `hallid` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `capacity` int(5) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `rentperday` int(5) NOT NULL,
  `floor` int(5) NOT NULL,
  `image1` varchar(50) NOT NULL,
  `image2` varchar(50) NOT NULL,
  `image3` varchar(50) NOT NULL,
  PRIMARY KEY (`hallid`),
  KEY `fk_hotel_hall_1` (`hotelid`),
  CONSTRAINT `fk_hotel_hall_1` FOREIGN KEY (`hotelid`) REFERENCES `hotelregister` (`hotelid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotelhall`
--

LOCK TABLES `hotelhall` WRITE;
/*!40000 ALTER TABLE `hotelhall` DISABLE KEYS */;
INSERT INTO `hotelhall` VALUES (7,4,' blue box hall',100,' nicee',500,1,'hallimg/blue box hallimg.jpeg','hallimg/blue box hallimgg.jpeg','hallimg/blue box hallimggg.jpeg'),(7,5,'rajhans hall',150,'super',1000,3,'hallimg/rajhans hallimg.jpeg','hallimg/rajhans hallimgg.png','hallimg/rajhans hallimggg.jpeg'),(7,6,' luxury hall',300,' fabulos',1500,0,'hallimg/luxuryimg.jpeg','hallimg/luxuryimgg.jpeg','hallimg/luxuryimggg  .jpeg'),(7,7,'SILEVER STROKE HALL',500,'SARU CHE',2000,1,'hallimg/SILEVER STROKE HALLimg.jpeg','hallimg/SILEVER STROKE HALLimgg.jpeg','hallimg/SILEVER STROKE HALLimggg  .jpeg'),(17,8,'black hall',500,'all facality available',2000,3,'hallimg/black hallimg.jpeg','hallimg/black hallimgg.jpeg','hallimg/black hallimggg  .jpeg'),(17,9,'white hall',550,'all facality available',3200,4,'hallimg/white hallimg.jpeg','hallimg/white hallimgg.jpeg','hallimg/white hallimggg  .jpeg');
/*!40000 ALTER TABLE `hotelhall` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banquetrequest`
--

DROP TABLE IF EXISTS `banquetrequest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banquetrequest` (
  `hotelid` int(5) NOT NULL,
  `hallid` int(5) NOT NULL,
  `requestid` int(5) NOT NULL AUTO_INCREMENT,
  `contact` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`requestid`),
  KEY `fk_banquetrequest_1` (`hotelid`),
  KEY `fk_banquetrequest_2` (`hallid`),
  CONSTRAINT `fk_banquetrequest_1` FOREIGN KEY (`hotelid`) REFERENCES `hotelregister` (`hotelid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_banquetrequest_2` FOREIGN KEY (`hallid`) REFERENCES `hotelhall` (`hallid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banquetrequest`
--

LOCK TABLES `banquetrequest` WRITE;
/*!40000 ALTER TABLE `banquetrequest` DISABLE KEYS */;
INSERT INTO `banquetrequest` VALUES (7,4,1,'9429279768','2020-03-16',1),(7,4,2,'7410852963','2020-03-16',1),(7,4,3,'9898989898','2020-03-17',0),(7,4,4,'9429279768','2020-03-17',0),(17,8,5,'9429279768','2020-06-04',1),(17,9,6,'9898882328','2020-06-04',0);
/*!40000 ALTER TABLE `banquetrequest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `otpverify`
--

DROP TABLE IF EXISTS `otpverify`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `otpverify` (
  `id` varchar(45) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `otp` int(6) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `otpverify`
--

LOCK TABLES `otpverify` WRITE;
/*!40000 ALTER TABLE `otpverify` DISABLE KEYS */;
/*!40000 ALTER TABLE `otpverify` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inquiry`
--

DROP TABLE IF EXISTS `inquiry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inquiry` (
  `inquiryid` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `date` varchar(45) NOT NULL,
  PRIMARY KEY (`inquiryid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inquiry`
--

LOCK TABLES `inquiry` WRITE;
/*!40000 ALTER TABLE `inquiry` DISABLE KEYS */;
INSERT INTO `inquiry` VALUES (1,'rajiv patel','9327552626','for searching hotel ','22-2-2020'),(2,'janvi','7676767676','gyu','2-11-2020'),(3,'3SeventyKitchen','9773285270','erfewfre','2-11-2020'),(4,'dddd','9773285270','esterdtger','22-2-2020');
/*!40000 ALTER TABLE `inquiry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emailsubscribe`
--

DROP TABLE IF EXISTS `emailsubscribe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emailsubscribe` (
  `userid` varchar(45) NOT NULL,
  `hotelid` int(5) NOT NULL COMMENT '	',
  `eid` varchar(45) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`eid`),
  KEY `fk_emailsubscribe_1` (`userid`),
  KEY `fk_emailsubscribe_2` (`hotelid`),
  CONSTRAINT `fk_emailsubscribe_1` FOREIGN KEY (`userid`) REFERENCES `userregister` (`userid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_emailsubscribe_2` FOREIGN KEY (`hotelid`) REFERENCES `hotelregister` (`hotelid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emailsubscribe`
--

LOCK TABLES `emailsubscribe` WRITE;
/*!40000 ALTER TABLE `emailsubscribe` DISABLE KEYS */;
INSERT INTO `emailsubscribe` VALUES ('himanshu3110',17,'0','2020-06-04');
/*!40000 ALTER TABLE `emailsubscribe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `landmark`
--

DROP TABLE IF EXISTS `landmark`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `landmark` (
  `areaid` int(5) NOT NULL,
  `landmarkid` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`landmarkid`),
  KEY `fk_landmark_1` (`areaid`),
  CONSTRAINT `fk_landmark_1` FOREIGN KEY (`areaid`) REFERENCES `area` (`areaid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `landmark`
--

LOCK TABLES `landmark` WRITE;
/*!40000 ALTER TABLE `landmark` DISABLE KEYS */;
INSERT INTO `landmark` VALUES (2,2,'pal'),(4,3,'vesu point'),(4,4,'safal square'),(5,5,'vaghel road'),(1,7,'bigbazar'),(4,8,'vip road'),(6,9,'star bazar'),(7,10,'magdalla road'),(1,11,'rajhans cinema'),(1,12,'isconmall'),(9,13,'business centerr'),(11,14,'ovara'),(12,15,'hazira road');
/*!40000 ALTER TABLE `landmark` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banquetbooking`
--

DROP TABLE IF EXISTS `banquetbooking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banquetbooking` (
  `hotelid` int(5) NOT NULL,
  `hallid` int(5) NOT NULL,
  `banquetbookid` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `bookdate` date NOT NULL,
  `date` date NOT NULL,
  `timefrom` time NOT NULL,
  `timeto` time NOT NULL,
  `contact` varchar(10) NOT NULL,
  `advancepayment` int(5) NOT NULL,
  `totalpayment` int(5) NOT NULL,
  `bookfor` varchar(100) NOT NULL,
  `paymentrefercode` varchar(20) NOT NULL,
  PRIMARY KEY (`banquetbookid`),
  KEY `fk_banquet_booking_1` (`hotelid`),
  KEY `fk_banquet_booking_2` (`hallid`),
  CONSTRAINT `fk_banquet_booking_1` FOREIGN KEY (`hotelid`) REFERENCES `hotelregister` (`hotelid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_banquet_booking_2` FOREIGN KEY (`hallid`) REFERENCES `hotelhall` (`hallid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banquetbooking`
--

LOCK TABLES `banquetbooking` WRITE;
/*!40000 ALTER TABLE `banquetbooking` DISABLE KEYS */;
INSERT INTO `banquetbooking` VALUES (7,4,2,'mr','2020-03-16','2020-03-01','01:00:00','01:00:00','9429279768',2,1,'party','');
/*!40000 ALTER TABLE `banquetbooking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotelregister`
--

DROP TABLE IF EXISTS `hotelregister`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotelregister` (
  `areaid` int(5) NOT NULL,
  `landmarkid` int(5) NOT NULL,
  `hotelid` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `map` varchar(2000) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `openday` varchar(50) NOT NULL,
  `opentime` varchar(50) NOT NULL,
  `wifi` varchar(10) NOT NULL,
  `tableimage` varchar(50) NOT NULL,
  `adminconfirmstatus` int(5) NOT NULL,
  `packageconfirmstatus` int(5) NOT NULL,
  `refercodestatus` int(5) NOT NULL,
  PRIMARY KEY (`hotelid`),
  KEY `fk_hotel_register_1` (`areaid`),
  KEY `fk_hotel_register_2` (`landmarkid`),
  CONSTRAINT `fk_hotel_register_1` FOREIGN KEY (`areaid`) REFERENCES `area` (`areaid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_hotel_register_2` FOREIGN KEY (`landmarkid`) REFERENCES `landmark` (`landmarkid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotelregister`
--

LOCK TABLES `hotelregister` WRITE;
/*!40000 ALTER TABLE `hotelregister` DISABLE KEYS */;
INSERT INTO `hotelregister` VALUES (5,5,7,'CoffeeCulture','Sargam Shopping Center, Ground Floor Waghel Road Opp, Behind Neelkanth Apts, Parle Point, Surat, Gujarat 39500','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3720.535424366489!2d72.78830894996973!3d21.17087898821933!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04de84696c4cd%3A0x1bf709c1fac16e96!2sCoffee%20Culture%20-%20The%20Ristorante%20Lounge%2C%20Sargam%2C%20Surat!5e0!3m2!1sen!2sin!4v1583397914303!5m2!1sen!2sin\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>','9429279768','coffeculture12@gmail.com','logo/CoffeeCulture.jpeg','monday to sunday','9am to 11pm','1','tableimage/CoffeeCulture.jpeg',1,1,1),(4,3,8,'Coffee King Cafe and restaurant','UG-1 SHUBH UNIVERSAL, Vesu Main Road, opp. VIJYA LAXMI HALL VESU POINT, Vesu, Surat, Gujarat 395007','<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14884.415194450483!2d72.7729599!3d21.1482671!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x338aaf514d9772e6!2sCoffee%20King%20Cafe%20and%20Restaurant%20-%20Vesu!5e0!3m2!1sen!2sin!4v1583396775649!5m2!1sen!2sin\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>','8967456773','coffeking56@gmail.com','logo/Coffee King Cafe and.jpeg','monday to ','9am to 11p','1','tableimage/Coffee King Cafe and.jpeg',1,0,1),(1,7,9,'CUMIN Lifestyle restaurant','HG-6/7, INTERNATIONAL BUSINESS CENTRE, NR. BIG BAZZAR, DUMAS- SURAT-07, Piplod Main Road, Surat, Gujarat 395007','<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14883.42119685268!2d72.769565!3d21.1581561!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd6c028553ebeae27!2sCumin%20Kitchen%20%26%20Banquets!5e0!3m2!1sen!2sin!4v1583396835567!5m2!1sen!2sin\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>','8976787667','cumin67@gmail.com','logo/CUMIN Lifestyle Rest.jpeg','monday to ','9am to 11p','1','tableimage/CUMIN Lifestyle Rest.jpeg',1,0,1),(4,8,10,'DE RAMAS Multi Cuisine restaurant','white house, opp palm avenue, VIP Road, Vesu, Surat, Gujarat 395007','<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14885.128832070905!2d72.7787744!3d21.1411646!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3de778951752918b!2sDE%20RAMA&#39;S%20Multi%20Cuisine%20Restaurant!5e0!3m2!1sen!2sin!4v1583396877064!5m2!1sen!2sin\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>','9898677876','deram@gmail.com','logo/DE RAMAS Multi Cuisi.png','monday to ','9am to 11p','1','tableimage/DE RAMAS Multi Cuisi.jpeg',1,0,1),(6,9,11,'Dil Se Re Restaurant','Imperial Mall, 2nd, Hazira - Adajan Rd, Above Star Bazar, Adajan Gam, Surat, Gujarat 395009','<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14880.597865664942!2d72.7930837!3d21.1862206!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x46676a59cc34780!2sDil%20Se%20Re%20Restaurant!5e0!3m2!1sen!2sin!4v1583396921982!5m2!1sen!2sin\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>','7898989878','dilsere@gmail.com','logo/Dil Se Re Restaurant.png','monday to ','9am to 11p','1','tableimage/Dil Se Re Restaurant.jpeg',1,0,1),(2,2,12,'Jelly Berry Restaurant','1st Floor Silver Point Pal-Adajan Road, Near, Galaxy Cir, Adajan Gam, Surat, Gujarat 395009','<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14880.128334359888!2d72.7795053!3d21.1908844!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xab53722acae2001f!2sJelly%20Berry%20Restaurant%20And%20Banquet%20Dine!5e0!3m2!1sen!2sin!4v1583396967507!5m2!1sen!2sin\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>','7990571945','jellyb@gmail.com','logo/Jelly Berry Restaura.jpeg','monday to ','9am to 11p','1','tableimage/Jelly Berry Restaura.jpeg',1,0,1),(7,10,14,'lukmaa multi cuisine restaurant','UG 28, Safal Square, Udhana - Magdalla Rd, Udhna, Surat, Gujarat 395007','<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14884.401969524064!2d72.765407!3d21.1483987!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc142ffe06bb75456!2sLukmaa%20Multi%20Cuisine%20Restaurant!5e0!3m2!1sen!2sin!4v1583397063635!5m2!1sen!2sin\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>','9078563456','lukma3@gmail.com','logo/lukmaa multi cuisine.jpeg','monday to ','9am to 11p','1','tableimage/lukmaa multi cuisine.jpeg',1,0,1),(2,2,15,'royal dine restaurant','Green City Rd, Pal Gam, Surat, Gujarat 395009','<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14880.20707970125!2d72.7728156!3d21.1901023!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6f90239e9983c7e8!2sRoyal%20Dine%20Restaurant!5e0!3m2!1sen!2sin!4v1583397123690!5m2!1sen!2sin\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>','9088990077','royalin@gmail.com','logo/royal dine restauran.png','monday to ','9am to 11p','1','tableimage/royal dine restauran.jpeg',1,0,1),(1,11,16,'sizzling salsa','Surat-Dumas Road Opposite Iscon Mall # 1st Floor, Rajhans Cinema, Gujarat 394370','<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14883.19127493022!2d72.7741292!3d21.1604429!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdfc78e6e89ab98e5!2sSizzling%20Salsa!5e0!3m2!1sen!2sin!4v1583397163160!5m2!1sen!2sin\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>','7878787878','sizzling34@gmail.com','logo/sizzling salsa.jpeg','monday to ','9am to 11p','1','tableimage/sizzling salsa.jpeg',1,0,1),(2,2,17,'BLACK PEPPER',' 8/9, ground floor           International Business Centre           surat dumas road            near big bazar            gujarat 395007','<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14883.461160309462!2d72.7689047!3d21.1577586!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xeacf84e8cdfb2889!2sBlack%20Pepper!5e0!3m2!1sen!2sin!4v1584605991515!5m2!1sen!2sin\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>','9898989898','info@blackpepperworld.in','logo/BLACK PEPPER.jpeg','monday to ','12pmto11pm','1','tableimage/BLACK PEPPER.jpeg',1,1,1),(4,4,18,'kitcys sizzlinh club',' 27 safal square,university road ,nr jolly party plot,vesu 395006','<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14884.409295499849!2d72.7653329!3d21.1483258!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdadfaf950e888c56!2sKitcy&#39;s%20Sizzling%20Club!5e0!3m2!1sen!2sin!4v1584606326320!5m2!1sen!2sin\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>','8140077660','litcy@gmail.com','logo/kitcys sizzlinh club.png','monday to sunday','12pmto11pm','1','tableimage/kitcys sizzlinh club.jpeg',1,0,1),(11,14,19,'kitchens badshah','near floral garden karuna sagar ovara umra','<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14882.423074557995!2d72.7768769!3d21.1680817!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5619caf22a68dceb!2sKitchen&#39;s%20Badshah!5e0!3m2!1sen!2sin!4v1586779017495!5m2!1sen!2sin\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>','9725028116','badshah@gmail.com','logo/kitchens badshah.jpeg','monday to sunday','5pmto11:30pm','0','tableimage/kitchens badshah.jpeg',1,0,1),(4,8,20,'la pino z pizza','vip road near metro store vese surat','<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14884.491557820353!2d72.7654676!3d21.1475072!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x94d7f84db7ecdc60!2sLa%20Pino&#39;z%20Pizza%20Vesu%20Surat!5e0!3m2!1sen!2sin!4v1586780367157!5m2!1sen!2sin\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>','9099976896','lapino@gmail.com','logo/la pino z pizza.jpeg','monday to sunday','11amto11pm','1','tableimage/la pino z pizza.jpeg',1,0,1),(12,15,21,'devilla restro lounge','l p savani sport complex  pal hazira gujrat','<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14881.237480870475!2d72.7661249!3d21.1798658!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7a537badac7de3e3!2sDe&#39;%20Villa%20Garden%20Restro%20Lounge!5e0!3m2!1sen!2sin!4v1586781735265!5m2!1sen!2sin\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>','2583691470','villa@gmail.com','logo/devilla restro lounge.jpeg','monday to sunday','6pm to 11pm','1','tableimage/devilla restro lounge.jpeg',1,0,1);
/*!40000 ALTER TABLE `hotelregister` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotelwaitinglist`
--

DROP TABLE IF EXISTS `hotelwaitinglist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotelwaitinglist` (
  `hotelid` int(5) NOT NULL,
  `waitinglistid` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `numberofperson` int(5) NOT NULL,
  `time` time NOT NULL,
  `date` varchar(45) NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`waitinglistid`),
  KEY `fk_hotel_waiting_list_1` (`hotelid`),
  CONSTRAINT `fk_hotel_waiting_list_1` FOREIGN KEY (`hotelid`) REFERENCES `hotelregister` (`hotelid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotelwaitinglist`
--

LOCK TABLES `hotelwaitinglist` WRITE;
/*!40000 ALTER TABLE `hotelwaitinglist` DISABLE KEYS */;
INSERT INTO `hotelwaitinglist` VALUES (7,1,'mrsheta',5,'07:53:17','12:03:2020',0),(7,2,'rudra',8,'08:10:34','12:03:2020',0),(7,3,'siddhi',15,'08:11:00','12:03:2020',0),(7,4,'ravi',3,'08:13:00','12:03:2020',0),(7,5,'manthan',4,'08:14:00','12:03:2020',0),(7,6,'parth',4,'08:14:00','12:03:2020',0),(7,7,'ravii',5,'03:22:53','12:03:2020',0),(17,8,'dhruv',5,'06:13:27','21:04:2020',0),(17,9,'himanshu',4,'06:13:38','21:04:2020',0),(17,10,'rudra',5,'04:35:15','28:04:2020',0);
/*!40000 ALTER TABLE `hotelwaitinglist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotelonlinewaiting`
--

DROP TABLE IF EXISTS `hotelonlinewaiting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotelonlinewaiting` (
  `hotelid` int(5) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `onlinewaitingid` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `numberofperson` int(5) NOT NULL,
  `time` time NOT NULL,
  `amount` int(5) NOT NULL,
  `paymentreferencecode` varchar(50) NOT NULL,
  `runningstatus` int(5) NOT NULL,
  PRIMARY KEY (`onlinewaitingid`),
  KEY `fk_hotel_online_waiting_1` (`hotelid`),
  KEY `fk_hotel_online_waiting_2` (`userid`),
  CONSTRAINT `fk_hotel_online_waiting_1` FOREIGN KEY (`hotelid`) REFERENCES `hotelregister` (`hotelid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_hotel_online_waiting_2` FOREIGN KEY (`userid`) REFERENCES `userregister` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotelonlinewaiting`
--

LOCK TABLES `hotelonlinewaiting` WRITE;
/*!40000 ALTER TABLE `hotelonlinewaiting` DISABLE KEYS */;
/*!40000 ALTER TABLE `hotelonlinewaiting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'hotel'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-05  4:13:32
