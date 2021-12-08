-- MariaDB dump 10.19  Distrib 10.5.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: sawmetode
-- ------------------------------------------------------
-- Server version	10.5.12-MariaDB-0+deb11u1

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
-- Table structure for table `alternatif`
--

DROP TABLE IF EXISTS `alternatif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alternatif` (
  `idalternatif` int(25) NOT NULL AUTO_INCREMENT,
  `nmalternatif` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idalternatif`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alternatif`
--

LOCK TABLES `alternatif` WRITE;
/*!40000 ALTER TABLE `alternatif` DISABLE KEYS */;
INSERT INTO `alternatif` VALUES (4,'Ibu Safiiyah'),(5,'Mas Farhan'),(6,'Mas Anwar');
/*!40000 ALTER TABLE `alternatif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bobot`
--

DROP TABLE IF EXISTS `bobot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bobot` (
  `idbobot` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(50) DEFAULT NULL,
  `idkriteria` int(11) DEFAULT NULL,
  PRIMARY KEY (`idbobot`),
  KEY `idkriteria` (`idkriteria`),
  CONSTRAINT `bobot_kriteria_FK` FOREIGN KEY (`idkriteria`) REFERENCES `kriteria` (`idkriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bobot`
--

LOCK TABLES `bobot` WRITE;
/*!40000 ALTER TABLE `bobot` DISABLE KEYS */;
/*!40000 ALTER TABLE `bobot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kriteria`
--

DROP TABLE IF EXISTS `kriteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kriteria` (
  `idkriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nmkriteria` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idkriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kriteria`
--

LOCK TABLES `kriteria` WRITE;
/*!40000 ALTER TABLE `kriteria` DISABLE KEYS */;
INSERT INTO `kriteria` VALUES (4,'Pekerjaannya Terdampak Covid'),(5,'Berada di wilayah yang menerapkan PPKM Darurat'),(6,'Bukan penerima tiga jenis bansos');
/*!40000 ALTER TABLE `kriteria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matrixkeputusan`
--

DROP TABLE IF EXISTS `matrixkeputusan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matrixkeputusan` (
  `idmatrix` int(11) NOT NULL AUTO_INCREMENT,
  `idalternatif` int(11) DEFAULT NULL,
  `idbobot` int(11) DEFAULT NULL,
  `idskala` int(11) DEFAULT NULL,
  PRIMARY KEY (`idmatrix`),
  KEY `idalternatif` (`idalternatif`),
  KEY `idbobot` (`idbobot`),
  KEY `idskala` (`idskala`),
  CONSTRAINT `FK_matrixkeputusan_alternatif` FOREIGN KEY (`idalternatif`) REFERENCES `alternatif` (`idalternatif`),
  CONSTRAINT `FK_matrixkeputusan_bobot` FOREIGN KEY (`idbobot`) REFERENCES `bobot` (`idbobot`),
  CONSTRAINT `FK_matrixkeputusan_skala` FOREIGN KEY (`idskala`) REFERENCES `skala` (`idskala`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matrixkeputusan`
--

LOCK TABLES `matrixkeputusan` WRITE;
/*!40000 ALTER TABLE `matrixkeputusan` DISABLE KEYS */;
/*!40000 ALTER TABLE `matrixkeputusan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `nilaimax`
--

DROP TABLE IF EXISTS `nilaimax`;
/*!50001 DROP VIEW IF EXISTS `nilaimax`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `nilaimax` (
  `idkriteria` tinyint NOT NULL,
  `nmkriteria` tinyint NOT NULL,
  `maksimum` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `skala`
--

DROP TABLE IF EXISTS `skala`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skala` (
  `idskala` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(11) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idskala`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skala`
--

LOCK TABLES `skala` WRITE;
/*!40000 ALTER TABLE `skala` DISABLE KEYS */;
/*!40000 ALTER TABLE `skala` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `vmatrixkeputusan`
--

DROP TABLE IF EXISTS `vmatrixkeputusan`;
/*!50001 DROP VIEW IF EXISTS `vmatrixkeputusan`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vmatrixkeputusan` (
  `idmatrix` tinyint NOT NULL,
  `idalternatif` tinyint NOT NULL,
  `nmalternatif` tinyint NOT NULL,
  `idkriteria` tinyint NOT NULL,
  `nmkriteria` tinyint NOT NULL,
  `idbobot` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `nilai` tinyint NOT NULL,
  `keterangan` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vnormalisasi`
--

DROP TABLE IF EXISTS `vnormalisasi`;
/*!50001 DROP VIEW IF EXISTS `vnormalisasi`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vnormalisasi` (
  `idmatrix` tinyint NOT NULL,
  `idalternatif` tinyint NOT NULL,
  `nmalternatif` tinyint NOT NULL,
  `idkriteria` tinyint NOT NULL,
  `nmkriteria` tinyint NOT NULL,
  `idbobot` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `nilai` tinyint NOT NULL,
  `keterangan` tinyint NOT NULL,
  `normalisasi` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vprarangking`
--

DROP TABLE IF EXISTS `vprarangking`;
/*!50001 DROP VIEW IF EXISTS `vprarangking`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vprarangking` (
  `idmatrix` tinyint NOT NULL,
  `idalternatif` tinyint NOT NULL,
  `nmalternatif` tinyint NOT NULL,
  `idkriteria` tinyint NOT NULL,
  `nmkriteria` tinyint NOT NULL,
  `idbobot` tinyint NOT NULL,
  `value` tinyint NOT NULL,
  `nilai` tinyint NOT NULL,
  `keterangan` tinyint NOT NULL,
  `normalisasi` tinyint NOT NULL,
  `prarangking` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vrangking`
--

DROP TABLE IF EXISTS `vrangking`;
/*!50001 DROP VIEW IF EXISTS `vrangking`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vrangking` (
  `idalternatif` tinyint NOT NULL,
  `nmalternatif` tinyint NOT NULL,
  `rangking` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Dumping routines for database 'sawmetode'
--

--
-- Final view structure for view `nilaimax`
--

/*!50001 DROP TABLE IF EXISTS `nilaimax`*/;
/*!50001 DROP VIEW IF EXISTS `nilaimax`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `nilaimax` AS select `vmatrixkeputusan`.`idkriteria` AS `idkriteria`,`vmatrixkeputusan`.`nmkriteria` AS `nmkriteria`,max(`vmatrixkeputusan`.`nilai`) AS `maksimum` from `vmatrixkeputusan` group by `vmatrixkeputusan`.`idkriteria` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vmatrixkeputusan`
--

/*!50001 DROP TABLE IF EXISTS `vmatrixkeputusan`*/;
/*!50001 DROP VIEW IF EXISTS `vmatrixkeputusan`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vmatrixkeputusan` AS select `matrixkeputusan`.`idmatrix` AS `idmatrix`,`alternatif`.`idalternatif` AS `idalternatif`,`alternatif`.`nmalternatif` AS `nmalternatif`,`kriteria`.`idkriteria` AS `idkriteria`,`kriteria`.`nmkriteria` AS `nmkriteria`,`bobot`.`idbobot` AS `idbobot`,`bobot`.`value` AS `value`,`skala`.`value` AS `nilai`,`skala`.`keterangan` AS `keterangan` from ((((`matrixkeputusan` join `skala`) join `bobot`) join `kriteria`) join `alternatif`) where `matrixkeputusan`.`idalternatif` = `alternatif`.`idalternatif` and `matrixkeputusan`.`idbobot` = `bobot`.`idbobot` and `matrixkeputusan`.`idskala` = `skala`.`idskala` and `kriteria`.`idkriteria` = `bobot`.`idkriteria` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vnormalisasi`
--

/*!50001 DROP TABLE IF EXISTS `vnormalisasi`*/;
/*!50001 DROP VIEW IF EXISTS `vnormalisasi`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vnormalisasi` AS select `vmatrixkeputusan`.`idmatrix` AS `idmatrix`,`vmatrixkeputusan`.`idalternatif` AS `idalternatif`,`vmatrixkeputusan`.`nmalternatif` AS `nmalternatif`,`vmatrixkeputusan`.`idkriteria` AS `idkriteria`,`vmatrixkeputusan`.`nmkriteria` AS `nmkriteria`,`vmatrixkeputusan`.`idbobot` AS `idbobot`,`vmatrixkeputusan`.`value` AS `value`,`vmatrixkeputusan`.`nilai` AS `nilai`,`vmatrixkeputusan`.`keterangan` AS `keterangan`,`vmatrixkeputusan`.`nilai` / `nilaimax`.`maksimum` AS `normalisasi` from (`vmatrixkeputusan` join `nilaimax`) where `nilaimax`.`idkriteria` = `vmatrixkeputusan`.`idkriteria` group by `vmatrixkeputusan`.`idmatrix` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vprarangking`
--

/*!50001 DROP TABLE IF EXISTS `vprarangking`*/;
/*!50001 DROP VIEW IF EXISTS `vprarangking`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vprarangking` AS select `vnormalisasi`.`idmatrix` AS `idmatrix`,`vnormalisasi`.`idalternatif` AS `idalternatif`,`vnormalisasi`.`nmalternatif` AS `nmalternatif`,`vnormalisasi`.`idkriteria` AS `idkriteria`,`vnormalisasi`.`nmkriteria` AS `nmkriteria`,`vnormalisasi`.`idbobot` AS `idbobot`,`vnormalisasi`.`value` AS `value`,`vnormalisasi`.`nilai` AS `nilai`,`vnormalisasi`.`keterangan` AS `keterangan`,`vnormalisasi`.`normalisasi` AS `normalisasi`,`vnormalisasi`.`value` * `vnormalisasi`.`normalisasi` AS `prarangking` from `vnormalisasi` group by `vnormalisasi`.`idmatrix` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vrangking`
--

/*!50001 DROP TABLE IF EXISTS `vrangking`*/;
/*!50001 DROP VIEW IF EXISTS `vrangking`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vrangking` AS select `vprarangking`.`idalternatif` AS `idalternatif`,`vprarangking`.`nmalternatif` AS `nmalternatif`,sum(`vprarangking`.`prarangking`) AS `rangking` from `vprarangking` group by `vprarangking`.`idalternatif` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-15 14:16:29
