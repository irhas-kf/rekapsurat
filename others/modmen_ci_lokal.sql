-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: modmen_ci
-- ------------------------------------------------------
-- Server version	5.5.5-10.5.8-MariaDB-log

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
-- Table structure for table `posting`
--

DROP TABLE IF EXISTS `posting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `konten` text DEFAULT NULL,
  `id_user` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posting`
--

LOCK TABLES `posting` WRITE;
/*!40000 ALTER TABLE `posting` DISABLE KEYS */;
INSERT INTO `posting` VALUES (1,'Posting 1x','Hello World !',3);
/*!40000 ALTER TABLE `posting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_data`
--

DROP TABLE IF EXISTS `user_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_data` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `LEVEL_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_data`
--

LOCK TABLES `user_data` WRITE;
/*!40000 ALTER TABLE `user_data` DISABLE KEYS */;
INSERT INTO `user_data` VALUES (1,'superadmin','d033e22ae348aeb5660fc2140aec35850c4da997',1),(2,'admin','d033e22ae348aeb5660fc2140aec35850c4da997',2),(3,'staff','d033e22ae348aeb5660fc2140aec35850c4da997',3);
/*!40000 ALTER TABLE `user_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_level`
--

DROP TABLE IF EXISTS `user_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_level` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LEVEL` varchar(50) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_level`
--

LOCK TABLES `user_level` WRITE;
/*!40000 ALTER TABLE `user_level` DISABLE KEYS */;
INSERT INTO `user_level` VALUES (1,'SUPER_ADMIN'),(2,'ADMIN'),(3,'STAFF');
/*!40000 ALTER TABLE `user_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_menu`
--

DROP TABLE IF EXISTS `user_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_menu` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MODUL_ID` int(11) NOT NULL DEFAULT 0,
  `MENU` varchar(100) NOT NULL DEFAULT 'MENU',
  `LINK` varchar(100) NOT NULL DEFAULT '#',
  `ICON` varchar(100) DEFAULT NULL,
  `MAIN_MENU` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_menu`
--

LOCK TABLES `user_menu` WRITE;
/*!40000 ALTER TABLE `user_menu` DISABLE KEYS */;
INSERT INTO `user_menu` VALUES (1,8,'Superadmin','#','fa fa-rocket',0),(2,9,'Master','#','fa fa-circle-o',1),(3,1,'Level','superadmin/user_level','fa fa-circle-o',2),(4,2,'Modul','superadmin/modul','fa fa-circle-o',2),(5,10,'Manajemen','#','fa fa-circle-o',1),(6,3,'User Role','superadmin/user_role','fa fa-circle-o',5),(7,4,'Akun','superadmin/akun','fa fa-circle-o',5),(8,6,'Profil Akun','akun','fa fa-user',0),(9,11,'Menu','superadmin/menu','fa fa-circle-o',2),(10,7,'Posting','posting','fa fa-file',0);
/*!40000 ALTER TABLE `user_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_modul`
--

DROP TABLE IF EXISTS `user_modul`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_modul` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MODUL` varchar(100) NOT NULL DEFAULT 'MODUL',
  `SUPERADMIN_ONLY` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_modul`
--

LOCK TABLES `user_modul` WRITE;
/*!40000 ALTER TABLE `user_modul` DISABLE KEYS */;
INSERT INTO `user_modul` VALUES (1,'LEVEL',1),(2,'MODUL',1),(3,'USER_ROLE',1),(4,'AKUN',1),(5,'DASHBOARD',0),(6,'PROFIL_AKUN',0),(7,'POSTING',0),(8,'SUPERADMIN',1),(9,'MASTER',1),(10,'MANAJEMEN',1),(11,'MENU',0);
/*!40000 ALTER TABLE `user_modul` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_role` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LEVEL_ID` int(11) NOT NULL,
  `MODUL_ID` int(11) NOT NULL,
  `_CREATE` int(1) NOT NULL DEFAULT 0,
  `_READ` int(1) NOT NULL DEFAULT 0,
  `_UPDATE` int(1) NOT NULL DEFAULT 0,
  `_DELETE` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (1,1,1,1,1,1,1),(2,1,2,0,0,0,0),(3,1,3,1,1,1,1),(4,1,4,1,1,1,1),(5,1,5,1,1,1,1),(6,2,1,0,0,0,0),(7,2,2,0,0,0,0),(8,2,3,0,0,0,0),(9,2,4,0,0,0,0),(10,2,5,1,1,1,1),(11,3,1,0,0,0,0),(12,3,2,0,0,0,0),(13,3,3,0,0,0,0),(14,3,4,0,0,0,0),(15,3,5,1,1,1,1),(16,1,6,0,0,0,0),(17,2,6,0,0,0,0),(18,3,6,1,1,1,1),(19,1,7,0,0,0,0),(20,2,7,0,0,0,0),(21,3,7,1,1,1,1),(22,1,8,0,1,0,0),(23,2,8,0,0,0,0),(24,3,8,0,0,0,0),(25,1,9,0,1,0,0),(26,2,9,0,0,0,0),(27,3,9,0,0,0,0),(28,1,10,0,1,0,0),(29,2,10,0,0,0,0),(30,3,10,0,0,0,0),(31,1,11,1,1,1,1),(32,2,11,0,0,0,0),(33,3,11,0,0,0,0);
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'modmen_ci'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-19  9:56:51
