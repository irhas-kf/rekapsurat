/*
SQLyog Ultimate v10.42 
MySQL - 5.5.5-10.4.11-MariaDB : Database - mahasiswa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mahasiswa` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `mahasiswa`;

/*Table structure for table `faskes` */

DROP TABLE IF EXISTS `faskes`;

CREATE TABLE `faskes` (
  `id_faskes` int(11) NOT NULL AUTO_INCREMENT,
  `nama_faskes` varchar(50) NOT NULL,
  PRIMARY KEY (`id_faskes`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `faskes` */

insert  into `faskes`(`id_faskes`,`nama_faskes`) values (1,'UPTD Puskesmas Blooto'),(2,'UPTD Puskesmas Gedongan'),(3,'UPTD Puskesmas Kedundung'),(4,'UPTD Puskesmas Kranggan'),(5,'UPTD Puskesmas Mentikan'),(6,'UPTD Puskesmas Wates');

/*Table structure for table `jenis_surat` */

DROP TABLE IF EXISTS `jenis_surat`;

CREATE TABLE `jenis_surat` (
  `id_jenis_surat` int(20) NOT NULL AUTO_INCREMENT,
  `nama_jenis_surat` varchar(60) NOT NULL,
  PRIMARY KEY (`id_jenis_surat`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `jenis_surat` */

insert  into `jenis_surat`(`id_jenis_surat`,`nama_jenis_surat`) values (1,'PBID Bayi Baru lahir dan Balita Kurang Dari 1 Tahun'),(2,'PBID Penyakit Kronis'),(3,'PBID Ibu hamil'),(4,'PBID ex Mandiri'),(5,'Penonaktifan PBID');

/*Table structure for table `posting` */

DROP TABLE IF EXISTS `posting`;

CREATE TABLE `posting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `konten` text DEFAULT NULL,
  `id_user` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `posting` */

insert  into `posting`(`id`,`judul`,`konten`,`id_user`) values (1,'Posting 1x','Hello World !',3);

/*Table structure for table `rekap_surat` */

DROP TABLE IF EXISTS `rekap_surat`;

CREATE TABLE `rekap_surat` (
  `id_rekap_surat` int(10) NOT NULL AUTO_INCREMENT,
  `id_faskes` int(11) DEFAULT NULL,
  `id_jenis_surat` int(11) DEFAULT NULL,
  `nik` char(16) DEFAULT NULL,
  `no_kartu_keluarga` char(16) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `nomor_kis` varchar(32) NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  PRIMARY KEY (`id_rekap_surat`),
  KEY `id_faskes` (`id_faskes`),
  KEY `id_jenis_surat` (`id_jenis_surat`),
  CONSTRAINT `rekap_surat_ibfk_1` FOREIGN KEY (`id_faskes`) REFERENCES `faskes` (`id_faskes`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rekap_surat_ibfk_2` FOREIGN KEY (`id_jenis_surat`) REFERENCES `jenis_surat` (`id_jenis_surat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

/*Data for the table `rekap_surat` */

insert  into `rekap_surat`(`id_rekap_surat`,`id_faskes`,`id_jenis_surat`,`nik`,`no_kartu_keluarga`,`nama`,`nomor_kis`,`alamat`,`keterangan`,`tanggal_pengajuan`) values (26,1,1,'3456098458903481','3506374987450001','risa','3290459813','kediri','test','2021-05-27'),(27,2,2,'3456098458903486','3506374987450001','deby','ab322123','test','test','2021-05-27'),(28,5,4,'3456098458903485','3506374987450004','irhas','3290459812','d','d','2021-05-27'),(29,4,3,'3456098458903488','3506374987450001','sinta','3290459821','dr','t','2021-05-27'),(30,2,2,'3456098458903486','3506374987450001','sinta','3290459813','ww','ww','2021-05-27'),(31,5,3,'3456098458903486','3506374987450004','deby','ab322123','sw','ww','2021-05-27'),(32,4,3,'3456098458903485','3506374987450002','risa','ab322123','d','s','2021-05-27'),(33,3,1,'3456098458903485','3506374987450001','fadila','ab322123','ww','ww','2021-05-27'),(34,1,2,'3456098458903488','3506374987450002','sinta','ab322123','e','e','2021-05-27');

/*Table structure for table `tb_rekap_surat` */

DROP TABLE IF EXISTS `tb_rekap_surat`;

CREATE TABLE `tb_rekap_surat` (
  `id_rekap_surat` int(11) NOT NULL AUTO_INCREMENT,
  `kd_klasifikasi` varchar(30) DEFAULT NULL,
  `nama_surat` text DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `jumlah_surat` varchar(10) DEFAULT NULL,
  `keterangan_surat` text DEFAULT NULL,
  `jenis_surat` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_rekap_surat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_rekap_surat` */

insert  into `tb_rekap_surat`(`id_rekap_surat`,`kd_klasifikasi`,`nama_surat`,`tanggal_surat`,`jumlah_surat`,`keterangan_surat`,`jenis_surat`) values (2,'441/13/417.302/2021','Permohonan setting router','2021-01-05','1','Kadiskominfo','keluar'),(3,'B-35761.001/BPS/9280/01/2020','Survei Persepsi dan Kualitas Data(SPDK) Triwulan IV Tahun 2020','2021-01-05','1','BPS kota Mojokerto','masuk');

/*Table structure for table `user_data` */

DROP TABLE IF EXISTS `user_data`;

CREATE TABLE `user_data` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `LEVEL_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `user_data` */

insert  into `user_data`(`ID`,`USERNAME`,`PASSWORD`,`LEVEL_ID`) values (1,'superadmin','d033e22ae348aeb5660fc2140aec35850c4da997',1),(2,'admin','d033e22ae348aeb5660fc2140aec35850c4da997',2),(3,'staff','d033e22ae348aeb5660fc2140aec35850c4da997',3);

/*Table structure for table `user_level` */

DROP TABLE IF EXISTS `user_level`;

CREATE TABLE `user_level` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LEVEL` varchar(50) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `user_level` */

insert  into `user_level`(`ID`,`LEVEL`) values (1,'SUPER_ADMIN'),(2,'ADMIN'),(3,'STAFF');

/*Table structure for table `user_menu` */

DROP TABLE IF EXISTS `user_menu`;

CREATE TABLE `user_menu` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MODUL_ID` int(11) NOT NULL DEFAULT 0,
  `MENU` varchar(100) NOT NULL DEFAULT 'MENU',
  `LINK` varchar(100) NOT NULL DEFAULT '#',
  `ICON` varchar(100) DEFAULT NULL,
  `MAIN_MENU` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `user_menu` */

insert  into `user_menu`(`ID`,`MODUL_ID`,`MENU`,`LINK`,`ICON`,`MAIN_MENU`) values (1,8,'Superadmin','#','fa fa-rocket',0),(2,9,'Master','#','fa fa-circle-o',1),(3,1,'Level','superadmin/user_level','fa fa-circle-o',2),(4,2,'Modul','superadmin/modul','fa fa-circle-o',2),(5,10,'Manajemen','#','fa fa-circle-o',1),(6,3,'User Role','superadmin/user_role','fa fa-circle-o',5),(7,4,'Akun','superadmin/akun','fa fa-circle-o',5),(8,6,'Profil Akun','akun','fa fa-user',0),(9,11,'Menu','superadmin/menu','fa fa-circle-o',2),(10,7,'Posting','posting','fa fa-file',0);

/*Table structure for table `user_modul` */

DROP TABLE IF EXISTS `user_modul`;

CREATE TABLE `user_modul` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MODUL` varchar(100) NOT NULL DEFAULT 'MODUL',
  `SUPERADMIN_ONLY` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `user_modul` */

insert  into `user_modul`(`ID`,`MODUL`,`SUPERADMIN_ONLY`) values (1,'LEVEL',1),(2,'MODUL',1),(3,'USER_ROLE',1),(4,'AKUN',1),(5,'DASHBOARD',0),(6,'PROFIL_AKUN',0),(7,'POSTING',0),(8,'SUPERADMIN',1),(9,'MASTER',1),(10,'MANAJEMEN',1),(11,'MENU',0);

/*Table structure for table `user_role` */

DROP TABLE IF EXISTS `user_role`;

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

/*Data for the table `user_role` */

insert  into `user_role`(`ID`,`LEVEL_ID`,`MODUL_ID`,`_CREATE`,`_READ`,`_UPDATE`,`_DELETE`) values (1,1,1,1,1,1,1),(2,1,2,0,0,0,0),(3,1,3,1,1,1,1),(4,1,4,1,1,1,1),(5,1,5,1,1,1,1),(6,2,1,0,0,0,0),(7,2,2,0,0,0,0),(8,2,3,0,0,0,0),(9,2,4,0,0,0,0),(10,2,5,1,1,1,1),(11,3,1,0,0,0,0),(12,3,2,0,0,0,0),(13,3,3,0,0,0,0),(14,3,4,0,0,0,0),(15,3,5,1,1,1,1),(16,1,6,0,0,0,0),(17,2,6,0,0,0,0),(18,3,6,1,1,1,1),(19,1,7,0,0,0,0),(20,2,7,0,0,0,0),(21,3,7,1,1,1,1),(22,1,8,0,1,0,0),(23,2,8,0,0,0,0),(24,3,8,0,0,0,0),(25,1,9,0,1,0,0),(26,2,9,0,0,0,0),(27,3,9,0,0,0,0),(28,1,10,0,1,0,0),(29,2,10,0,0,0,0),(30,3,10,0,0,0,0),(31,1,11,1,1,1,1),(32,2,11,0,0,0,0),(33,3,11,0,0,0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
