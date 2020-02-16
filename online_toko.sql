-- MySQL dump 10.16  Distrib 10.1.41-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: kyanarhi_toko
-- ------------------------------------------------------
-- Server version	10.1.41-MariaDB-cll-lve

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tabel_barang`
--

DROP TABLE IF EXISTS `tabel_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_barang` (
  `kd_barang` varchar(15) NOT NULL,
  `nm_barang` varchar(30) NOT NULL,
  `kd_kategori` varchar(10) NOT NULL,
  `deskripsi_brg` varchar(256) NOT NULL,
  `cara_pakai` varchar(256) NOT NULL,
  `file` varchar(256) NOT NULL,
  `kd_supplier` varchar(10) NOT NULL,
  `kd_merk` varchar(10) NOT NULL,
  PRIMARY KEY (`kd_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_barang`
--

LOCK TABLES `tabel_barang` WRITE;
/*!40000 ALTER TABLE `tabel_barang` DISABLE KEYS */;
/*!40000 ALTER TABLE `tabel_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_barang_harga`
--

DROP TABLE IF EXISTS `tabel_barang_harga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_barang_harga` (
  `kd_barang` varchar(15) NOT NULL,
  `kd_satuan` varchar(15) NOT NULL,
  `hrg_jual` int(11) DEFAULT NULL,
  `hrg_beli` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_barang`,`kd_satuan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_barang_harga`
--

LOCK TABLES `tabel_barang_harga` WRITE;
/*!40000 ALTER TABLE `tabel_barang_harga` DISABLE KEYS */;
/*!40000 ALTER TABLE `tabel_barang_harga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_cara_kirim`
--

DROP TABLE IF EXISTS `tabel_cara_kirim`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_cara_kirim` (
  `kd_carkim` varchar(10) NOT NULL,
  `nm_carkim` varchar(256) NOT NULL,
  PRIMARY KEY (`kd_carkim`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_cara_kirim`
--

LOCK TABLES `tabel_cara_kirim` WRITE;
/*!40000 ALTER TABLE `tabel_cara_kirim` DISABLE KEYS */;
INSERT INTO `tabel_cara_kirim` (`kd_carkim`, `nm_carkim`) VALUES ('R001','CASH ON DELIVERY (COD)'),('R002','AMBIL DI AGENT (TOKO)');
/*!40000 ALTER TABLE `tabel_cara_kirim` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_cara_pembayaran`
--

DROP TABLE IF EXISTS `tabel_cara_pembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_cara_pembayaran` (
  `kd_carpem` varchar(10) NOT NULL,
  `nm_carpem` varchar(256) NOT NULL,
  PRIMARY KEY (`kd_carpem`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_cara_pembayaran`
--

LOCK TABLES `tabel_cara_pembayaran` WRITE;
/*!40000 ALTER TABLE `tabel_cara_pembayaran` DISABLE KEYS */;
INSERT INTO `tabel_cara_pembayaran` (`kd_carpem`, `nm_carpem`) VALUES ('E001','CASH'),('E002','TERMIN 7 HARI'),('E003','TERMIN 14 HARI'),('E004','TERMIN 21 HARI');
/*!40000 ALTER TABLE `tabel_cara_pembayaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_kategori_barang`
--

DROP TABLE IF EXISTS `tabel_kategori_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_kategori_barang` (
  `kd_kategori` varchar(10) NOT NULL,
  `nm_kategori` varchar(25) NOT NULL,
  PRIMARY KEY (`kd_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_kategori_barang`
--

LOCK TABLES `tabel_kategori_barang` WRITE;
/*!40000 ALTER TABLE `tabel_kategori_barang` DISABLE KEYS */;
INSERT INTO `tabel_kategori_barang` (`kd_kategori`, `nm_kategori`) VALUES ('K001','LAKBAN'),('K002','PENSIL 2 B');
/*!40000 ALTER TABLE `tabel_kategori_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_merk`
--

DROP TABLE IF EXISTS `tabel_merk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_merk` (
  `kd_merk` varchar(10) NOT NULL,
  `nm_merk` varchar(256) NOT NULL,
  PRIMARY KEY (`kd_merk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_merk`
--

LOCK TABLES `tabel_merk` WRITE;
/*!40000 ALTER TABLE `tabel_merk` DISABLE KEYS */;
INSERT INTO `tabel_merk` (`kd_merk`, `nm_merk`) VALUES ('X001','Faber Castle'),('X002','Kiko');
/*!40000 ALTER TABLE `tabel_merk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_sales`
--

DROP TABLE IF EXISTS `tabel_sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_sales` (
  `kd_sales` varchar(10) NOT NULL,
  `nm_sales` varchar(256) NOT NULL,
  PRIMARY KEY (`kd_sales`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_sales`
--

LOCK TABLES `tabel_sales` WRITE;
/*!40000 ALTER TABLE `tabel_sales` DISABLE KEYS */;
INSERT INTO `tabel_sales` (`kd_sales`, `nm_sales`) VALUES ('SL001','ADHIT'),('SL002','RUDI');
/*!40000 ALTER TABLE `tabel_sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_satuan_barang`
--

DROP TABLE IF EXISTS `tabel_satuan_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_satuan_barang` (
  `kd_satuan` varchar(10) NOT NULL,
  `nm_satuan` varchar(25) NOT NULL,
  PRIMARY KEY (`kd_satuan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_satuan_barang`
--

LOCK TABLES `tabel_satuan_barang` WRITE;
/*!40000 ALTER TABLE `tabel_satuan_barang` DISABLE KEYS */;
INSERT INTO `tabel_satuan_barang` (`kd_satuan`, `nm_satuan`) VALUES ('S001','cm'),('S002','DUS'),('S003','PCS');
/*!40000 ALTER TABLE `tabel_satuan_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_supplier`
--

DROP TABLE IF EXISTS `tabel_supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_supplier` (
  `kd_supplier` varchar(10) NOT NULL,
  `nm_supplier` varchar(25) NOT NULL,
  `almt_supplier` varchar(150) NOT NULL,
  `tlp_supplier` varchar(15) NOT NULL,
  `fax_supplier` varchar(15) NOT NULL,
  `atas_nama` varchar(20) NOT NULL,
  PRIMARY KEY (`kd_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_supplier`
--

LOCK TABLES `tabel_supplier` WRITE;
/*!40000 ALTER TABLE `tabel_supplier` DISABLE KEYS */;
INSERT INTO `tabel_supplier` (`kd_supplier`, `nm_supplier`, `almt_supplier`, `tlp_supplier`, `fax_supplier`, `atas_nama`) VALUES ('SUP001','PT. FABER CASTEL INDONESI','INDONESIA','','','');
/*!40000 ALTER TABLE `tabel_supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_user`
--

DROP TABLE IF EXISTS `tabel_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_user` (
  `id_user` varchar(10) NOT NULL,
  `password` varchar(150) NOT NULL,
  `akses` varchar(15) NOT NULL,
  `nm_user` varchar(25) NOT NULL,
  `kd_toko` varchar(15) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_user`
--

LOCK TABLES `tabel_user` WRITE;
/*!40000 ALTER TABLE `tabel_user` DISABLE KEYS */;
INSERT INTO `tabel_user` (`id_user`, `password`, `akses`, `nm_user`, `kd_toko`) VALUES ('admin','admin','1','admin','admin');
/*!40000 ALTER TABLE `tabel_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'kyanarhi_toko'
--

--
-- Dumping routines for database 'kyanarhi_toko'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-20 22:43:04
