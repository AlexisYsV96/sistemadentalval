CREATE DATABASE  IF NOT EXISTS `sis_clinicadental` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sis_clinicadental`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: sis_clinicadental
-- ------------------------------------------------------
-- Server version	5.7.26

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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `codi_cat` int(11) NOT NULL AUTO_INCREMENT,
  `nomb_cat` varchar(45) DEFAULT NULL,
  `esta_cat` char(1) DEFAULT NULL,
  PRIMARY KEY (`codi_cat`),
  UNIQUE KEY `nomb_cat` (`nomb_cat`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Bajo','A'),(2,'Medio','A'),(3,'Alto','A'),(4,'Intermedio','A'),(5,'cirugia','A'),(6,'Simple ','A'),(7,'NIVEL ALTO','A'),(8,'ALTO NIVEL','A'),(9,'o','A');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cita_medica`
--

DROP TABLE IF EXISTS `cita_medica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cita_medica` (
  `codi_cit` int(11) NOT NULL AUTO_INCREMENT,
  `codi_pac` int(11) DEFAULT NULL,
  `codi_homed` int(11) DEFAULT NULL,
  `motivo_consult` varchar(80) DEFAULT NULL,
  `sintomas` varchar(40) DEFAULT NULL,
  `obsv_cit` varchar(200) NOT NULL,
  `esta_cit` char(1) DEFAULT 'A',
  PRIMARY KEY (`codi_cit`),
  KEY `fk_cita_medica_paciente` (`codi_pac`),
  KEY `fk_cita_medica_horario_medico` (`codi_homed`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cita_medica`
--

LOCK TABLES `cita_medica` WRITE;
/*!40000 ALTER TABLE `cita_medica` DISABLE KEYS */;
INSERT INTO `cita_medica` VALUES (101,10,8,'sdf','sdf','','A'),(99,10,5,'s','s','','D'),(100,10,3,'gv','dfg','','A'),(98,10,4,'asd','asd','','D'),(97,10,1,'sad','asd','','T'),(96,10,2,'asdsa','asdsa','','T');
/*!40000 ALTER TABLE `cita_medica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clinica`
--

DROP TABLE IF EXISTS `clinica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clinica` (
  `id_clin` int(11) NOT NULL AUTO_INCREMENT,
  `nomb_clin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `direc_clin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telf_clin` int(15) NOT NULL,
  `email_clin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ruc_clin` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `esta_clin` char(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_clin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clinica`
--

LOCK TABLES `clinica` WRITE;
/*!40000 ALTER TABLE `clinica` DISABLE KEYS */;
INSERT INTO `clinica` VALUES (1,'VALVERDENT','Jr. Alfonso Ugarte 366, Urb. Ingeniería, 3er piso, San Martin de Porres.',929356450,'creative.alxs@gmail.com','10424584555','A');
/*!40000 ALTER TABLE `clinica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_fac`
--

DROP TABLE IF EXISTS `detalle_fac`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_fac` (
  `precio` decimal(10,2) DEFAULT NULL,
  `codi_dpr` int(11) NOT NULL,
  `codi_fac` int(11) NOT NULL,
  PRIMARY KEY (`codi_dpr`,`codi_fac`),
  KEY `fk_detalle_fac_detalle_proc` (`codi_dpr`),
  KEY `fk_detalle_fac_factura` (`codi_fac`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_fac`
--

LOCK TABLES `detalle_fac` WRITE;
/*!40000 ALTER TABLE `detalle_fac` DISABLE KEYS */;
INSERT INTO `detalle_fac` VALUES (200.00,1,1),(200.00,2,2),(200.00,3,3),(200.00,4,3),(200.00,5,4),(200.00,6,4),(200.00,7,5),(200.00,8,5),(200.00,9,6),(200.00,10,6),(200.00,11,7),(200.00,12,7),(200.00,13,7),(200.00,14,8),(200.00,15,8),(200.00,16,9),(200.00,17,10),(200.00,18,10),(200.00,19,11),(200.00,20,12),(200.00,21,12),(200.00,22,13),(200.00,23,13),(200.00,24,14),(200.00,25,15),(200.00,26,15),(200.00,27,16),(200.00,28,16),(200.00,29,17),(200.00,30,17),(200.00,31,18),(200.00,32,18),(200.00,33,18),(200.00,34,19),(200.00,35,19),(200.00,36,19),(200.00,37,20),(200.00,38,21),(200.00,39,21),(200.00,40,22),(200.00,41,22),(200.00,42,23),(200.00,43,24),(200.00,44,24),(200.00,45,25),(200.00,46,25),(200.00,47,25),(200.00,48,26),(200.00,49,26),(200.00,50,26),(200.00,51,27),(200.00,52,27),(200.00,53,27),(200.00,54,28),(200.00,55,29),(200.00,56,30),(200.00,57,31),(200.00,58,32),(200.00,59,33),(200.00,60,34),(200.00,61,34),(200.00,62,34),(200.00,63,34),(200.00,64,34),(200.00,65,35),(200.00,66,35),(200.00,67,35),(200.00,68,36),(180.00,69,36),(180.00,70,36),(180.00,71,36),(200.00,72,37),(200.00,73,37),(200.00,74,37),(200.00,75,37),(200.00,76,37),(200.00,77,37),(200.00,78,37),(200.00,79,47),(200.00,80,47),(200.00,81,47),(200.00,82,48),(200.00,83,49),(200.00,84,49),(200.00,85,49),(200.00,86,50),(200.00,87,51),(200.00,88,51),(200.00,89,51),(192.00,90,51),(200.00,91,52),(200.00,92,53),(200.00,93,53),(200.00,94,54),(450.00,95,54),(200.00,96,55),(200.00,97,55),(200.00,98,55),(200.00,99,55),(623.76,100,56),(678.00,101,56),(678.00,102,56),(600.00,103,58),(200.00,104,59),(450.00,105,59),(450.00,106,59),(200.00,107,60),(480.00,108,60),(450.00,109,61),(200.00,110,63),(200.00,111,64);
/*!40000 ALTER TABLE `detalle_fac` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_proc`
--

DROP TABLE IF EXISTS `detalle_proc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_proc` (
  `codi_dpr` int(11) NOT NULL AUTO_INCREMENT,
  `codi_odo` int(11) NOT NULL,
  `codi_tar` int(11) NOT NULL,
  `aseg_dpr` decimal(3,1) DEFAULT NULL,
  PRIMARY KEY (`codi_dpr`),
  KEY `fk_detalle_proc_odontograma` (`codi_odo`),
  KEY `fk_detalle_proc_tarifa_proc` (`codi_tar`)
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_proc`
--

LOCK TABLES `detalle_proc` WRITE;
/*!40000 ALTER TABLE `detalle_proc` DISABLE KEYS */;
INSERT INTO `detalle_proc` VALUES (1,76,7,0.0),(2,77,7,0.0),(3,81,7,0.0),(4,82,7,0.0),(5,83,7,0.0),(6,84,7,0.0),(7,9,7,0.0),(8,85,7,0.0),(9,86,7,0.0),(10,87,7,0.0),(11,88,7,0.0),(12,12,7,0.0),(13,89,7,0.0),(14,8,7,0.0),(15,90,7,0.0),(16,8,7,0.0),(17,8,7,0.0),(18,91,7,0.0),(19,8,7,0.0),(20,6,7,0.0),(21,15,7,0.0),(22,8,7,0.0),(23,15,7,0.0),(24,92,7,0.0),(25,8,7,0.0),(26,15,7,0.0),(27,17,7,0.0),(28,7,7,0.0),(29,8,7,0.0),(30,15,7,0.0),(31,6,7,0.0),(32,94,7,0.0),(33,15,7,0.0),(34,8,7,0.0),(35,15,7,0.0),(36,95,7,0.0),(37,8,7,0.0),(38,8,7,0.0),(39,21,7,0.0),(40,8,7,0.0),(41,97,7,0.0),(42,99,7,0.0),(43,8,7,0.0),(44,101,7,0.0),(45,6,7,0.0),(46,102,7,0.0),(47,21,7,0.0),(48,103,7,0.0),(49,18,7,0.0),(50,20,7,0.0),(51,8,7,0.0),(52,104,7,0.0),(53,105,7,0.0),(54,8,7,0.0),(55,17,7,0.0),(56,17,7,0.0),(57,22,7,0.0),(58,6,7,0.0),(59,107,7,0.0),(60,8,7,0.0),(61,8,7,0.0),(62,8,7,0.0),(63,108,7,0.0),(64,109,7,0.0),(65,110,7,0.0),(66,111,7,0.0),(67,112,7,0.0),(68,113,7,0.0),(69,113,7,10.0),(70,114,7,10.0),(71,116,7,10.0),(72,118,7,0.0),(73,119,7,0.0),(74,120,7,0.0),(75,121,7,0.0),(76,122,7,0.0),(77,123,7,0.0),(78,124,7,0.0),(79,15,7,0.0),(80,15,7,0.0),(81,15,7,0.0),(82,8,7,0.0),(83,8,7,0.0),(84,8,7,0.0),(85,8,7,0.0),(86,8,7,0.0),(87,131,7,0.0),(88,131,7,0.0),(89,132,7,0.0),(90,133,7,4.0),(91,6,7,0.0),(92,6,7,0.0),(93,7,7,0.0),(94,134,7,0.0),(95,134,9,0.0),(96,136,7,0.0),(97,137,7,0.0),(98,139,7,0.0),(99,141,7,0.0),(100,135,8,8.0),(101,142,8,0.0),(102,143,8,0.0),(103,32,10,0.0),(104,145,7,0.0),(105,145,9,0.0),(106,146,9,0.0),(107,17,7,0.0),(108,9,11,0.0),(109,32,9,0.0),(110,149,7,0.0),(111,150,7,0.0);
/*!40000 ALTER TABLE `detalle_proc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diente`
--

DROP TABLE IF EXISTS `diente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diente` (
  `codi_die` int(11) NOT NULL AUTO_INCREMENT,
  `codi_pac` int(11) NOT NULL,
  `codi_cit` int(11) NOT NULL,
  `id_die` int(11) NOT NULL,
  `num_die` int(11) NOT NULL,
  `codi_edi` int(11) DEFAULT NULL,
  `part_die` char(5) NOT NULL DEFAULT '00000',
  PRIMARY KEY (`codi_die`),
  KEY `fk_diente_paciente` (`codi_pac`),
  KEY `fk_diente_estado_diente` (`codi_edi`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diente`
--

LOCK TABLES `diente` WRITE;
/*!40000 ALTER TABLE `diente` DISABLE KEYS */;
INSERT INTO `diente` VALUES (1,4,4,1,65,2,'MDVPO'),(2,4,5,1,52,6,'MDVPO'),(3,4,5,1,72,3,'000P0'),(4,4,5,1,83,5,'MDVPO'),(5,4,5,1,85,5,'00V00'),(6,1,89,1,11,7,'MDVPO'),(7,1,76,1,61,4,'MDVPO'),(8,1,71,1,21,5,'MDVPO'),(9,1,90,1,51,2,'MDVPO'),(10,1,54,1,43,2,'MDVPO'),(11,2,22,1,11,4,'MDVPO'),(12,2,24,1,31,4,'MDVPO'),(13,2,40,1,21,3,'MDVPO'),(14,2,24,1,47,8,'MDVPO'),(15,1,68,1,31,2,'MDVPO'),(16,1,54,1,42,8,'MDVPO'),(17,1,89,1,22,1,'0D00I'),(18,1,54,1,32,2,'MDVPO'),(19,1,54,1,81,4,'MDVPO'),(20,1,54,1,46,1,'MDVPO'),(21,1,54,1,41,3,'MDVPO'),(22,1,54,1,71,2,'MDVPO'),(23,1,54,1,45,16,'MDVPO'),(24,2,40,1,72,3,'MDVPO'),(25,2,40,1,42,4,'MDVPO'),(26,1,89,1,64,4,'MDVPO'),(27,1,54,1,52,6,'MDVPO'),(28,1,60,1,12,11,'MDVPO'),(29,1,54,1,62,1,'MDVPO'),(30,1,54,1,82,4,'MDVPO'),(31,1,54,1,53,2,'MDVPO'),(32,1,90,1,23,3,'MDVPO'),(33,1,54,1,15,4,'MDVPO'),(34,1,54,1,26,3,'MDVPO'),(35,7,55,1,13,5,'MDVPO'),(36,7,55,1,62,2,'MDVPO'),(37,7,55,1,46,1,'MDVPO'),(38,3,56,1,11,6,'MDVPO'),(39,3,56,1,62,5,'MDVPO'),(40,3,56,1,32,5,'000L0'),(41,3,56,1,74,5,'0000O'),(42,3,56,1,82,8,'M0000'),(43,7,57,1,55,3,'MDVPO'),(44,7,57,1,54,7,'MDVPO'),(45,7,57,1,53,7,'MDVPO'),(46,7,57,1,71,7,'MDVPO'),(47,7,57,1,81,7,'MDVPO'),(48,7,57,1,72,7,'MDVPO'),(49,7,57,1,75,7,'MDVPO'),(50,7,57,1,74,7,'MDVPO'),(51,1,59,1,13,8,'MDVPO'),(52,1,59,1,28,7,'MDVPO'),(53,2,63,1,13,1,'MDVPO'),(54,2,67,1,41,3,'MDVPO'),(55,1,71,1,83,3,'MDVPO'),(56,8,74,1,12,3,'MDVPO'),(57,8,74,1,26,5,'MDVPO'),(58,8,74,1,71,2,'MDVPO'),(59,1,77,1,24,2,'MDVPO'),(60,6,81,1,22,1,'MDVPO'),(61,6,78,1,23,4,'M0000'),(62,6,78,1,13,4,'M0000'),(63,6,78,1,14,3,'0D000'),(64,6,78,1,15,5,'0D000'),(65,6,78,1,25,6,'0D000'),(66,6,78,1,21,6,'0D000'),(67,6,81,1,63,3,'MDVPO'),(68,6,81,1,53,6,'MDVPO'),(69,1,89,1,25,2,'MDVPO'),(70,8,87,1,61,2,'MDVPO'),(71,8,87,1,64,4,'0D0P0'),(72,8,87,1,13,1,'MDVPO'),(73,8,87,1,22,4,'MDVPO'),(74,10,96,1,13,5,'MD00I'),(75,10,97,1,11,2,'MDVPO');
/*!40000 ALTER TABLE `diente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enfermedad`
--

DROP TABLE IF EXISTS `enfermedad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enfermedad` (
  `codi_enf` varchar(6) NOT NULL,
  `titu_enf` char(1) DEFAULT NULL,
  `desc_enf` varchar(200) DEFAULT NULL,
  `esta_enf` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`codi_enf`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enfermedad`
--

LOCK TABLES `enfermedad` WRITE;
/*!40000 ALTER TABLE `enfermedad` DISABLE KEYS */;
INSERT INTO `enfermedad` VALUES ('K00.4','D','Trastornos en la formación ','A'),('K00.2','D','Anormalidades de tamaño y forma de los dientes','A'),('K00.1','D','Hiperodontia','A'),('K00.0','D','Anodoncia','A'),('K02.1','D','Caries de dentina','A'),('K00.5','D','Trastornos hereditarios en la estructura de los dientes, no clasificados en otra parte','A'),('K00.6','D','Trastornos en la erupción de los dientes','A'),('K00.7','D','Síndrome de la dentición','A'),('K00.8','D','Otros trastornos del desarrollo de los dientes','A'),('K00.9','D','Trastorno del desarrollo de los dientes sin especificar','A'),('K01.0','D','Dientes embebidos','A'),('K01.1','D','Dientes impactados','A'),('K02.0','D','Caries limitada al esmalte','A'),('K02.2','D','Caries del cemento','A'),('K02.3','D','Caries arrestada','A'),('K02.4','D','Odontoclasia','A'),('K02.8','D','Otras caries','A'),('K02.9','D','Caries sin especificar','A'),('K03.0','D','Atrición excesiva de los dientes','A'),('K03.1','D','Abrasion de los dientes','A'),('K03.2','D','Erosión de los dientes','A'),('K03.3','D',' Resorción patológica de los dientes','A'),('K03.4','D','Hipercementosis','A'),('K03.5','D','Anquilosis de los dientes','A'),('K03.6','D','Depósitos (acreciones) de los dientes','A'),('K03.7','D','Cambios de color posteruptivos de los tejidos duros dentales','A'),('K03.8','D','Otras enfermedades especificadas de los tejidos duros de los dientes','A'),('K03.9','D','Enfermedad de los tejidos duros de los dientes sin especificar','A'),('K04.0','D','Pulpitis','A'),('K04.1','D','Necrosis de la pulpa dentaria','A'),('K04.2','D','Degeneración de la pulpa dentaria','A'),('K04.3','D','Formación anormal de los tejidos duros de la pulpa dentaria','A'),('K04.4','D','Periodontitis apical aguda de la pulpa dentaria','A'),('K04.5','D','Periodontitis apical crónica','A'),('K04.6','D','Absceso periapical con senos','A'),('K04.7','D','Absceso periapical sin senos','A'),('K04.8','D','Quiste radicular','A'),('K04.9','D','Otras enfermedades de la pulpa dentaria y los tejidos periapicales y enfermedades sin especificar','A'),('K05.0','D','Gingivitis aguda','A'),('K05.1','D','Gingivitis crónica','A'),('K05.2','D','Periodontitis aguda','A'),('K05.3','D','Periodontitis crónica','A'),('K05.4','D','Periodontosis','A'),('K05.5','D','Otras enfermedades periodontales','A'),('K05.6','D','Enfermedad periodontal sin especificar','A'),('K06.0','D','Recesión gingival','A'),('K06.1','D','Alargamiento gingival','A'),('K06.2','D','Lesiones gingivales y de la cresta alveolar edentulosa asociadas con traumas','A'),('K06.8','D','Otros trastornos gingivales y de la cresta alveolar edentulosa especificados','A'),('K06.9','D','Trastorno gingival y de la cresta alveolar edentulosa sin especificar','A'),('K07.0','D','Anomalías mayores del tamaño de la mandíbula','A'),('K07.1','D','Anomalías de la relación mandíbula-base del craneo','A'),('K07.2','D','Anomalías de la relación del arco dental','A'),('K07.3','D','Anomalías de la posición de los dientes','A'),('K07.4','D','Maloclusión sin especificar','A'),('K07.5','D',' Anormalidades funcionales dentofaciales','A'),('K07.6','D','Trastornos de la unión temporomandibular','A'),('K07.8','D','Otras anomalías dentofaciales','A'),('K07.9','D','Anomalía dentofacial sin especificar','A'),('K08.0','D','Exfoliación de los dientes debida a causas sistémicas','A'),('K08.1','D','Pérdida de los dientes debido a un accidente, extracción o enfermedad periodontal local','A'),('K08.2','D','Atrofia de la cresta alveolar edentulosa','A'),('K08.3','D','Raíz dental retenida','A'),('K08.8','D','Otros trastornos especificados de dientes y estructuras de soporte','A'),('K08.9','D','Trastorno especificado de dientes y estructuras de soporte sin especificar','A'),('K09.0','D',' Quiste odontogánico de desarrollo','A'),('K09.1','D','Quistes de desarrollo (no-odontogénicos) de la región oral','A'),('K09.2','D','Otros quistes de la mandíbula','A'),('K09.8','D','Otros quistes de la región oral, no clasificados en otra parte','A'),('K09.9','D','Quiste de la región oral sin especificar','A'),('K10.0','D','Trastornos de desarrollo de las mandíbulas','A'),('K10.1','D','Granuloma celular gigante, central','A'),('K10.2','D','Condiciones inflamatorias de las mandíbulas','A'),('K10.3','D','Alveolitis de las mandíbulas','A'),('K10.8','D','Otras enfermedades de las mandíbulas especificadas','A'),('K10.9','D','Enfermedad de las mandíbulas, sin especificar','A'),('K11.0','D','Atrofia de las glándulas salivales','A'),('K11.1','D','Hipertrofia de las glándulas salivales','A'),('K11.2','D','Sialadenitis','A'),('K11.3','D','Abceso de las glándulas salivales','A'),('K11.4','D','Fístula de las glándulas salivales','A'),('K11.5','D','Sialolitiasis','A'),('K11.6','D','Mucocele de las glándulas salivales','A'),('K11.7','D','Trastornos de la secreción salival','A'),('K11.8','D','Otras enfermedades de las glándulas salivales','A'),('K11.9','D','Enfermedad de las glándulas salivales sin especificar','A'),('K12.0','D','Afta oral recurrente','A'),('K12.1','D','Otras formas de estomatitis','A'),('K12.2','D','Celulitis y abceso bucal','A'),('K13.0','D','Enfermedades de los labios','A'),('K13.1','D','Picadure en la mejilla y los labios','A'),('K13.2','D','Leucoplaquia y otros trastornos del epitelio oral, incluyendo la lengua','A'),('K13.3','D','Leucoplaquia capilar','A'),('K13.4','D','Granuloma y lesiones de tipo granulómico de la mucosa oral','A'),('K13.5','D','Fibrosis oral submucosa','A'),('K13.6','d','Hiperplasia irritativa de la mucosa oral','A'),('K13.7','D','Otras lesiones y lesiones sin especificar de la mucosa oral','A'),('K14.0','D','Glositis','A'),('K14.1','D','Lengua geográfica','A'),('K14.2','D','Glositis romboidea mediana','D'),('K14.3','D','Hipertrofia de las papilas gustativas','A'),('K14.4','D','Atrofia de las papilas gustativas','A'),('K14.5','D','Lengua plicada','A'),('K14.6','D','Glosodinia','A'),('K14.8','D','Otras enfermedades de la lengua','A'),('K14.9','D','Enfermedad de la lengua sin especificar','A'),('K00.30','D','Diagnostico diente molar','A'),('k00.19','E','Exodoncia','A'),('M00.7','B','Brakers','A'),('FF','F','POR ROTURA','A'),('Z00.1','Z','Endodoncia maxilar superioes','A');
/*!40000 ALTER TABLE `enfermedad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_diente`
--

DROP TABLE IF EXISTS `estado_diente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_diente` (
  `codi_edi` int(11) NOT NULL AUTO_INCREMENT,
  `titu_edi` varchar(5) NOT NULL,
  `nomb_edi` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codi_edi`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_diente`
--

LOCK TABLES `estado_diente` WRITE;
/*!40000 ALTER TABLE `estado_diente` DISABLE KEYS */;
INSERT INTO `estado_diente` VALUES (1,'','Sano'),(2,'','Curado'),(5,'--','Faltante'),(3,'DO','Diente obturado'),(4,'C','Cariado'),(7,'X','Exodoncia'),(8,'CP','Caries penetrante'),(9,'R','Retenido'),(10,'PP','Pieza de puente'),(11,'CO','Corona'),(12,'PR','Protesis removible'),(13,'INC','Incrustación'),(14,'EP','Enfermedad periodontal'),(15,'FD','Fractura dentaria'),(16,'MPD','Mal posición dentaria'),(17,'PM','Perno muñon'),(18,'TC','Tratamiento de cto'),(19,'F','Fluorosis'),(20,'IMP','Implante dental'),(21,'MB','Mancha blanca'),(22,'SE','Sellador'),(23,'SP SR','Surco profundo o mineralizado'),(24,'HP','Hipoplasia de esmalte'),(25,'MS','Maxilar Superior'),(6,'X','Extraido');
/*!40000 ALTER TABLE `estado_diente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `factura` (
  `codi_fac` int(11) NOT NULL AUTO_INCREMENT,
  `fech_fac` datetime DEFAULT NULL,
  `sesi_fac` varchar(45) DEFAULT NULL,
  `tota_fac` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`codi_fac`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` VALUES (1,'2018-02-10 14:59:21','1',200.00),(2,'2018-02-11 10:39:04','1',200.00),(3,'2018-03-10 09:44:57','1',400.00),(4,'2018-03-13 23:53:12','1',400.00),(5,'2018-03-19 22:08:08','1',400.00),(6,'2018-03-31 15:08:13','1',400.00),(7,'2018-04-04 00:21:43','1',600.00),(8,'2018-04-04 01:56:39','1',400.00),(9,'2018-04-04 01:58:26','1',200.00),(10,'2018-04-04 02:08:27','1',400.00),(11,'2018-04-04 02:14:40','1',200.00),(12,'2018-04-04 02:18:44','1',400.00),(13,'2018-04-04 02:20:52','1',400.00),(14,'2018-04-04 02:24:41','1',200.00),(15,'2018-04-04 02:27:47','1',400.00),(16,'2018-04-04 14:41:54','1',400.00),(17,'2018-04-05 04:52:23','1',400.00),(18,'2018-04-05 05:03:01','1',600.00),(19,'2018-04-05 05:07:14','1',600.00),(20,'2018-04-05 05:13:30','1',200.00),(21,'2018-04-05 05:17:17','1',400.00),(22,'2018-04-05 05:21:29','1',400.00),(23,'2018-04-05 05:26:54','1',200.00),(24,'2018-04-08 19:48:18','1',400.00),(25,'2018-04-08 21:12:48','1',600.00),(26,'2018-04-10 22:30:50','1',600.00),(27,'2018-04-10 22:32:56','1',600.00),(28,'2018-04-10 22:50:34','1',200.00),(29,'2018-04-10 22:53:34','1',200.00),(30,'2018-04-11 23:38:38','1',200.00),(31,'2018-04-15 12:09:51','1',200.00),(32,'2018-04-15 22:56:04','1',200.00),(33,'2018-04-17 00:35:43','1',200.00),(34,'2018-04-18 12:24:39','1',1000.00),(35,'2018-04-19 15:42:44','1',600.00),(36,'2018-04-19 23:30:50','1',740.00),(37,'2018-04-20 15:29:47','1',1400.00),(38,'2018-04-22 13:20:18','1',400.00),(39,'2018-04-22 13:21:23','1',200.00),(40,'2018-04-22 13:22:54','1',200.00),(41,'2018-04-22 13:43:37','1',200.00),(42,'2018-04-22 13:50:00','1',200.00),(43,'2018-04-22 13:58:07','1',200.00),(44,'2018-04-22 14:00:16','1',200.00),(45,'2018-04-22 14:01:46','1',200.00),(46,'2018-04-22 14:03:30','1',200.00),(47,'2018-04-22 20:06:04','1',200.00),(48,'2018-04-22 20:06:52','1',200.00),(49,'2018-04-22 20:33:45','1',600.00),(50,'2018-04-22 20:58:30','1',200.00),(51,'2018-04-23 22:42:08','1',792.00),(52,'2018-04-25 00:03:49','1',200.00),(53,'2018-04-25 00:06:45','1',400.00),(54,'2018-05-03 22:20:26','1',650.00),(55,'2018-05-07 23:04:03','1',800.00),(56,'2018-06-18 22:43:47','1',1979.76),(57,'2018-09-01 01:49:32','1',0.00),(58,'2018-09-19 23:25:21','1',450.00),(59,'2018-09-29 13:41:03','1',1100.00),(60,'2018-10-06 14:03:58','1',680.00),(61,'2018-10-06 14:05:11','1',450.00),(62,'2023-08-13 02:38:37','1',200.00),(63,'2023-08-13 02:41:31','1',200.00),(64,'2023-08-13 03:13:33','1',200.00);
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historial_enf`
--

DROP TABLE IF EXISTS `historial_enf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historial_enf` (
  `codi_hie` int(11) NOT NULL AUTO_INCREMENT,
  `codi_cit` int(11) NOT NULL,
  `codi_enf` varchar(6) CHARACTER SET utf8 NOT NULL,
  `num_die` int(11) NOT NULL,
  PRIMARY KEY (`codi_hie`)
) ENGINE=MyISAM AUTO_INCREMENT=150 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial_enf`
--

LOCK TABLES `historial_enf` WRITE;
/*!40000 ALTER TABLE `historial_enf` DISABLE KEYS */;
INSERT INTO `historial_enf` VALUES (1,4,'K00.0',65),(2,5,'K00.4',52),(3,10,'K00.0',11),(4,10,'K00.0',61),(5,16,'K00.1',21),(6,16,'K00.6',51),(7,21,'K00.1',21),(8,21,'K00.7',51),(9,21,'K00.7',43),(10,22,'K02.1',11),(11,22,'K02.1',31),(12,24,'K00.5',21),(13,24,'K13.2',31),(14,24,'K13.2',47),(15,25,'K00.5',21),(16,25,'K08.1',31),(17,26,'K00.5',21),(18,27,'K00.5',21),(19,27,'K00.5',42),(20,28,'K00.5',21),(21,29,'K00.5',11),(22,29,'K00.5',31),(23,30,'K00.0',21),(24,30,'K00.0',31),(25,31,'K02.1',22),(26,32,'K00.5',21),(27,32,'K08.1',31),(28,33,'K00.5',22),(29,33,'K00.5',61),(30,34,'K00.7',21),(31,34,'K00.7',31),(32,35,'K00.5',11),(33,35,'K00.5',81),(34,35,'K08.1',31),(35,36,'K00.5',21),(36,36,'K00.9',21),(37,36,'K08.1',31),(38,36,'K08.8',46),(39,37,'K00.5',21),(40,37,'K08.1',21),(41,37,'K06.2',21),(42,38,'K00.2',21),(43,38,'K00.5',41),(44,39,'K00.5',21),(45,39,'K08.1',21),(46,39,'K08.1',71),(47,39,'K07.0',45),(48,40,'K00.0',72),(49,40,'K00.5',72),(50,40,'K08.1',72),(51,41,'K02.1',21),(52,41,'K02.1',64),(53,42,'K00.5',11),(54,42,'K00.5',52),(55,42,'K02.0',41),(56,47,'K00.5',12),(57,47,'K00.5',32),(58,47,'K00.5',46),(59,46,'K00.2',21),(60,46,'K00.2',62),(61,46,'K02.3',82),(62,45,'K02.1',21),(63,48,'K00.6',22),(64,49,'K00.5',22),(65,49,'K01.0',51),(66,50,'K00.7',71),(67,51,'K02.1',11),(68,51,'K00.8',11),(69,52,'K00.4',23),(70,54,'K00.0',21),(71,54,'K00.5',21),(72,54,'K02.0',21),(73,54,'K01.0',15),(74,54,'K03.0',26),(75,55,'K00.5',13),(76,55,'K00.5',62),(77,55,'K00.5',46),(78,56,'K00.4',11),(79,56,'K00.6',11),(80,56,'K00.6',62),(81,56,'K00.6',74),(82,57,'K00.4',55),(83,57,'K00.4',54),(84,57,'K00.4',53),(85,57,'K00.4',71),(86,57,'K00.4',81),(87,57,'K00.4',72),(88,57,'K00.4',75),(89,57,'K00.4',74),(90,59,'K00.4',13),(91,59,'K02.1',13),(92,59,'K01.0',13),(93,59,'K01.0',28),(94,59,'K02.0',28),(95,59,'K02.8',28),(96,60,'K00.4',12),(97,61,'K00.4',22),(98,62,'K02.1',21),(99,62,'K02.1',61),(100,62,'K00.9',61),(101,63,'K00.4',13),(102,64,'K00.4',22),(103,65,'K00.4',61),(104,66,'K00.4',31),(105,67,'K00.4',41),(106,68,'K00.7',31),(107,68,'K01.0',31),(108,68,'K00.7',31),(109,68,'K01.0',31),(110,68,'K00.7',31),(111,68,'K01.0',31),(112,69,'K00.4',21),(113,70,'K00.7',21),(114,70,'K02.3',21),(115,70,'K00.5',51),(116,71,'K00.4',21),(117,71,'K00.8',21),(118,74,'K00.2',12),(119,74,'K00.9',12),(120,74,'K02.4',26),(121,74,'K02.2',71),(122,75,'K00.4',11),(123,75,'K00.6',11),(124,75,'K00.6',61),(125,75,'K02.0',61),(126,76,'K00.4',11),(127,76,'K00.7',11),(128,76,'K02.0',61),(129,76,'K00.1',61),(130,77,'K00.4',24),(131,78,'K00.4',23),(132,78,'K00.4',13),(133,78,'K00.4',15),(134,78,'K00.4',21),(135,81,'K00.1',22),(136,81,'K00.1',63),(137,81,'K00.1',53),(138,86,'K00.8',23),(139,86,'K02.2',23),(140,86,'K03.0',25),(141,87,'K00.0',61),(142,87,'K00.9',64),(143,87,'K00.9',13),(144,89,'K00.8',22),(145,89,'K00.8',51),(146,90,'K00.0',23),(147,90,'K00.0',51),(148,96,'K00.0',13),(149,97,'K00.4',11);
/*!40000 ALTER TABLE `historial_enf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historial_paciente`
--

DROP TABLE IF EXISTS `historial_paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historial_paciente` (
  `codi_his` int(11) NOT NULL AUTO_INCREMENT,
  `codi_pac` int(11) NOT NULL,
  `codi_cit` int(11) NOT NULL,
  `codi_die` int(11) NOT NULL,
  `id_die` int(11) NOT NULL,
  `num_die` int(11) NOT NULL,
  `codi_edi` int(11) NOT NULL,
  `part_die` char(5) NOT NULL DEFAULT '00000',
  `fech_his` date DEFAULT NULL,
  PRIMARY KEY (`codi_his`)
) ENGINE=MyISAM AUTO_INCREMENT=152 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial_paciente`
--

LOCK TABLES `historial_paciente` WRITE;
/*!40000 ALTER TABLE `historial_paciente` DISABLE KEYS */;
INSERT INTO `historial_paciente` VALUES (1,4,4,1,1,65,2,'MDVPO','2018-02-10'),(2,4,5,2,1,52,6,'MDVPO','2018-02-11'),(3,4,5,3,1,72,3,'000P0','2018-02-11'),(4,4,5,4,1,83,5,'MDVPO','2018-02-11'),(5,4,5,5,1,85,5,'00V00','2018-02-11'),(6,1,10,6,1,11,2,'MDVPO','2018-03-10'),(7,1,10,7,1,61,2,'MDVPO','2018-03-10'),(8,1,16,8,1,21,4,'MDVPO','2018-03-13'),(9,1,16,9,1,51,3,'MDVPO','2018-03-13'),(10,1,21,8,1,21,3,'MDVPO','2018-03-19'),(11,1,21,9,1,51,2,'MDVPO','2018-03-19'),(12,1,21,10,1,43,2,'MDVPO','2018-03-19'),(13,2,22,11,1,11,4,'MDVPO','2018-03-31'),(14,2,22,12,1,31,2,'MDVPO','2018-03-31'),(15,2,24,13,1,21,2,'MDVPO','2018-04-04'),(16,2,24,12,1,31,4,'MDVPO','2018-04-04'),(17,2,24,14,1,47,8,'MDVPO','2018-04-04'),(18,1,25,8,1,21,2,'MDVPO','2018-04-04'),(19,1,25,15,1,31,14,'MDVPO','2018-04-04'),(20,1,26,8,1,21,8,'MDVPO','2018-04-04'),(21,1,26,7,1,61,2,'MDVPO','2018-04-04'),(22,1,27,8,1,21,3,'MDVPO','2018-04-04'),(23,1,27,16,1,42,8,'MDVPO','2018-04-04'),(24,1,28,8,1,21,13,'MDVPO','2018-04-04'),(25,1,29,6,1,11,2,'MDVPO','2018-04-04'),(26,1,29,15,1,31,7,'MDVPO','2018-04-04'),(27,1,30,8,1,21,1,'MDVPO','2018-04-04'),(28,1,30,15,1,31,3,'MDVPO','2018-04-04'),(29,1,31,17,1,22,8,'MDVPO','2018-04-04'),(30,1,31,18,1,32,23,'MDVPO','2018-04-04'),(31,1,32,8,1,21,4,'MDVPO','2018-04-04'),(32,1,32,15,1,31,23,'MDVPO','2018-04-04'),(33,1,33,17,1,22,2,'MDVPO','2018-04-04'),(34,1,33,7,1,61,4,'MDVPO','2018-04-04'),(35,1,34,8,1,21,1,'MDVPO','2018-04-05'),(36,1,34,15,1,31,13,'MDVPO','2018-04-05'),(37,1,35,6,1,11,14,'MDVPO','2018-04-05'),(38,1,35,19,1,81,4,'MDVPO','2018-04-05'),(39,1,35,15,1,31,1,'MDVPO','2018-04-05'),(40,1,36,8,1,21,3,'MDVPO','2018-04-05'),(41,1,36,15,1,31,3,'MDVPO','2018-04-05'),(42,1,36,20,1,46,1,'MDVPO','2018-04-05'),(43,1,37,8,1,21,3,'MDVPO','2018-04-05'),(44,1,37,21,1,41,3,'MDVPO','2018-04-05'),(45,1,37,9,1,51,3,'MDVPO','2018-04-05'),(46,1,38,8,1,21,23,'MDVPO','2018-04-05'),(47,1,38,21,1,41,14,'MDVPO','2018-04-05'),(48,1,39,8,1,21,3,'MDVPO','2018-04-05'),(49,1,39,22,1,71,23,'MDVPO','2018-04-05'),(50,1,39,23,1,45,16,'MDVPO','2018-04-05'),(51,2,40,24,1,72,3,'MDVPO','2018-04-05'),(52,2,40,13,1,21,3,'MDVPO','2018-04-05'),(53,2,40,25,1,42,4,'MDVPO','2018-04-05'),(54,1,41,8,1,21,14,'MDVPO','2018-04-08'),(55,1,41,26,1,64,3,'MDVPO','2018-04-08'),(56,1,42,6,1,11,3,'MDVPO','2018-04-08'),(57,1,42,27,1,52,6,'MDVPO','2018-04-08'),(58,1,42,21,1,41,3,'MDVPO','2018-04-08'),(59,1,47,28,1,12,2,'MDVPO','2018-04-10'),(60,1,47,18,1,32,2,'MDVPO','2018-04-10'),(61,1,47,20,1,46,1,'MDVPO','2018-04-10'),(62,1,46,8,1,21,6,'MDVPO','2018-04-10'),(63,1,46,29,1,62,1,'MDVPO','2018-04-10'),(64,1,46,30,1,82,4,'MDVPO','2018-04-10'),(65,1,45,8,1,21,2,'MDVPO','2018-04-10'),(66,1,48,17,1,22,2,'MDVPO','2018-04-10'),(67,1,49,17,1,22,3,'MDVPO','2018-04-11'),(68,1,49,9,1,51,2,'MDVPO','2018-04-11'),(69,1,50,8,1,21,2,'MDVPO','2018-04-15'),(70,1,50,22,1,71,2,'MDVPO','2018-04-15'),(71,1,51,6,1,11,4,'MDVPO','2018-04-15'),(72,1,51,31,1,53,2,'MDVPO','2018-04-15'),(73,1,52,6,1,11,4,'MDVPO','2018-04-17'),(74,1,52,6,1,11,4,'MDVPO','2018-04-17'),(75,1,52,6,1,11,4,'MDVPO','2018-04-17'),(76,1,52,31,1,53,2,'MDVPO','2018-04-17'),(77,1,52,31,1,53,2,'MDVPO','2018-04-17'),(78,1,52,31,1,53,2,'MDVPO','2018-04-17'),(79,1,52,32,1,23,5,'MDVPO','2018-04-17'),(80,1,54,8,1,21,6,'MDVPO','2018-04-18'),(81,1,54,33,1,15,4,'MDVPO','2018-04-18'),(82,1,54,34,1,26,3,'MDVPO','2018-04-18'),(83,7,55,35,1,13,5,'MDVPO','2018-04-19'),(84,7,55,36,1,62,2,'MDVPO','2018-04-19'),(85,7,55,37,1,46,1,'MDVPO','2018-04-19'),(86,3,56,38,1,11,6,'MDVPO','2018-04-19'),(87,3,56,39,1,62,5,'MDVPO','2018-04-19'),(88,3,56,40,1,32,5,'000L0','2018-04-19'),(89,3,56,41,1,74,5,'0000O','2018-04-19'),(90,3,56,42,1,82,8,'M0000','2018-04-19'),(91,7,57,43,1,55,3,'MDVPO','2018-04-20'),(92,7,57,44,1,54,7,'MDVPO','2018-04-20'),(93,7,57,45,1,53,7,'MDVPO','2018-04-20'),(94,7,57,46,1,71,7,'MDVPO','2018-04-20'),(95,7,57,47,1,81,7,'MDVPO','2018-04-20'),(96,7,57,48,1,72,7,'MDVPO','2018-04-20'),(97,7,57,49,1,75,7,'MDVPO','2018-04-20'),(98,7,57,50,1,74,7,'MDVPO','2018-04-20'),(99,1,59,51,1,13,8,'MDVPO','2018-04-22'),(100,1,59,52,1,28,7,'MDVPO','2018-04-22'),(101,1,60,28,1,12,11,'MDVPO','2018-04-22'),(102,1,61,17,1,22,9,'MDVPO','2018-04-22'),(103,1,62,8,1,21,5,'MDVPO','2018-04-22'),(104,1,62,7,1,61,3,'MDVPO','2018-04-22'),(105,2,63,53,1,13,1,'MDVPO','2018-04-22'),(106,1,64,17,1,22,3,'MDVPO','2018-04-22'),(107,1,65,7,1,61,4,'MDVPO','2018-04-22'),(108,1,66,15,1,31,2,'MDVPO','2018-04-22'),(109,2,67,54,1,41,3,'MDVPO','2018-04-22'),(110,1,68,15,1,31,2,'MDVPO','2018-04-22'),(111,1,68,15,1,31,2,'MDVPO','2018-04-22'),(112,1,68,15,1,31,2,'MDVPO','2018-04-22'),(113,1,68,6,1,11,7,'MDVPO','2018-04-22'),(114,1,69,8,1,21,6,'MDVPO','2018-04-22'),(115,1,70,8,1,21,6,'MDVPO','2018-04-22'),(116,1,70,9,1,51,2,'MDVPO','2018-04-22'),(117,1,71,8,1,21,5,'MDVPO','2018-04-22'),(118,1,71,55,1,83,3,'MDVPO','2018-04-22'),(119,8,74,56,1,12,3,'MDVPO','2018-04-23'),(120,8,74,57,1,26,5,'MDVPO','2018-04-23'),(121,8,74,58,1,71,2,'MDVPO','2018-04-23'),(122,1,75,6,1,11,7,'MDVPO','2018-04-25'),(123,1,75,7,1,61,2,'MDVPO','2018-04-25'),(124,1,76,6,1,11,6,'MDVPO','2018-04-25'),(125,1,76,7,1,61,4,'MDVPO','2018-04-25'),(126,1,77,59,1,24,2,'MDVPO','2018-05-03'),(127,6,78,60,1,22,8,'0D000','2018-05-07'),(128,6,78,61,1,23,4,'M0000','2018-05-07'),(129,6,78,62,1,13,4,'M0000','2018-05-07'),(130,6,78,63,1,14,3,'0D000','2018-05-07'),(131,6,78,64,1,15,5,'0D000','2018-05-07'),(132,6,78,65,1,25,6,'0D000','2018-05-07'),(133,6,78,66,1,21,6,'0D000','2018-05-07'),(134,6,81,60,1,22,1,'MDVPO','2018-06-18'),(135,6,81,67,1,63,3,'MDVPO','2018-06-18'),(136,6,81,68,1,53,6,'MDVPO','2018-06-18'),(137,1,86,32,1,23,1,'0D00I','2018-09-19'),(138,1,86,69,1,25,6,'M00PO','2018-09-19'),(139,8,87,70,1,61,2,'MDVPO','2018-09-29'),(140,8,87,71,1,64,4,'0D0P0','2018-09-29'),(141,8,87,72,1,13,1,'MDVPO','2018-09-29'),(142,8,87,73,1,22,4,'MDVPO','2018-09-29'),(143,1,89,17,1,22,1,'0D00I','2018-10-06'),(144,1,89,9,1,51,8,'MDVPO','2018-10-06'),(145,1,89,26,1,64,4,'MDVPO','2018-10-06'),(146,1,89,69,1,25,2,'MDVPO','2018-10-06'),(147,1,89,6,1,11,7,'MDVPO','2018-10-06'),(148,1,90,32,1,23,3,'MDVPO','2018-10-06'),(149,1,90,9,1,51,2,'MDVPO','2018-10-06'),(150,10,96,74,1,13,5,'MD00I','2023-08-13'),(151,10,97,75,1,11,2,'MDVPO','2023-08-13');
/*!40000 ALTER TABLE `historial_paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historial_proc`
--

DROP TABLE IF EXISTS `historial_proc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historial_proc` (
  `codi_hip` int(11) NOT NULL AUTO_INCREMENT,
  `codi_cit` int(11) NOT NULL,
  `codi_dpr` int(11) NOT NULL,
  PRIMARY KEY (`codi_hip`)
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial_proc`
--

LOCK TABLES `historial_proc` WRITE;
/*!40000 ALTER TABLE `historial_proc` DISABLE KEYS */;
INSERT INTO `historial_proc` VALUES (1,4,1),(2,5,2),(3,10,3),(4,10,4),(5,16,5),(6,16,6),(7,21,7),(8,21,8),(9,22,9),(10,22,10),(11,24,11),(12,24,12),(13,24,13),(14,25,14),(15,25,15),(16,26,16),(17,27,17),(18,27,18),(19,28,19),(20,29,20),(21,29,21),(22,30,22),(23,30,23),(24,31,24),(25,32,25),(26,32,26),(27,33,27),(28,33,28),(29,34,29),(30,34,30),(31,35,31),(32,35,32),(33,35,33),(34,36,34),(35,36,35),(36,36,36),(37,37,37),(38,38,38),(39,38,39),(40,39,40),(41,39,41),(42,40,42),(43,41,43),(44,41,44),(45,42,45),(46,42,46),(47,42,47),(48,47,48),(49,47,49),(50,47,50),(51,46,51),(52,46,52),(53,46,53),(54,45,54),(55,48,55),(56,49,56),(57,50,57),(58,51,58),(59,52,59),(60,54,60),(61,54,61),(62,54,62),(63,54,63),(64,54,64),(65,55,65),(66,55,66),(67,55,67),(68,56,68),(69,56,69),(70,56,70),(71,56,71),(72,57,72),(73,57,73),(74,57,74),(75,57,75),(76,57,76),(77,57,77),(78,57,78),(79,68,79),(80,68,80),(81,68,81),(82,69,82),(83,70,83),(84,70,84),(85,70,85),(86,71,86),(87,74,87),(88,74,88),(89,74,89),(90,74,90),(91,75,91),(92,76,92),(93,76,93),(94,77,94),(95,77,95),(96,78,96),(97,78,97),(98,78,98),(99,78,99),(100,81,100),(101,81,101),(102,81,102),(103,86,103),(104,87,104),(105,87,105),(106,87,106),(107,89,107),(108,89,108),(109,90,109),(110,96,110),(111,97,111);
/*!40000 ALTER TABLE `historial_proc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horario_medico`
--

DROP TABLE IF EXISTS `horario_medico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horario_medico` (
  `codi_homed` int(11) NOT NULL AUTO_INCREMENT,
  `codi_med` int(11) DEFAULT NULL,
  `fech_homed` date NOT NULL,
  `hora_homed` time NOT NULL,
  `esta_homed` char(1) DEFAULT 'A',
  `libre` char(1) DEFAULT 'S',
  PRIMARY KEY (`codi_homed`),
  KEY `fk_horario_medico_medico` (`codi_med`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horario_medico`
--

LOCK TABLES `horario_medico` WRITE;
/*!40000 ALTER TABLE `horario_medico` DISABLE KEYS */;
INSERT INTO `horario_medico` VALUES (1,1,'2023-08-12','18:36:00','A','N'),(2,2,'2023-08-16','20:32:00','A','N'),(3,2,'2023-08-24','19:50:00','A','N'),(4,2,'2023-08-12','19:50:00','A','N'),(5,1,'2023-08-12','22:57:00','A','S'),(6,2,'2023-08-21','18:21:00','A','S'),(7,1,'2023-08-24','20:00:00','A','S'),(8,3,'2023-08-29','07:00:00','A','N');
/*!40000 ALTER TABLE `horario_medico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventario`
--

DROP TABLE IF EXISTS `inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventario` (
  `cod_inventario` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_barra` varchar(50) DEFAULT NULL,
  `nombre_almacen` varchar(80) NOT NULL,
  `nombre_producto` varchar(60) DEFAULT NULL,
  `cod_tipo_inventario` int(11) NOT NULL,
  `precio_entrada` decimal(10,2) DEFAULT NULL,
  `precio_salida` decimal(10,2) DEFAULT NULL,
  `unidad` varchar(100) DEFAULT NULL,
  `stock_inventario` int(11) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cod_inventario`),
  KEY `fk_inventario_tipo_inventario` (`cod_tipo_inventario`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventario`
--

LOCK TABLES `inventario` WRITE;
/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
INSERT INTO `inventario` VALUES (1,'12345','Almacen central','Jeringa',21,12.00,14.00,'15 x 20 ',4,'2018-04-13 10:28:03',1),(2,NULL,'Almacen de procedimientos','Alcohol',3,12.00,14.00,'por frasco',0,'2018-01-13 05:02:46',0),(3,NULL,'Almacen de centros','jeringas',3,15.00,14.00,'ninguno',0,'2018-01-13 06:05:07',0),(4,NULL,'Almacen de procedimientos','Diente molar',1,12.00,12.00,'por 100',3,'2018-01-19 13:12:08',0),(5,NULL,'Farmacia','Hizijot',2,23.00,45.00,'Frasco',4,'2018-01-19 22:10:17',0),(6,NULL,'Por consumo','diente molar',1,0.00,12.00,'2',4,'2018-03-09 13:42:00',0),(7,NULL,'Almacen para dental','Molares ',21,12.00,16.00,'Kilos',3,'2018-04-13 03:29:06',0),(8,NULL,'Almacen de pasta','Pasta para dientes',45,12.00,16.00,'12 x4',6,'2018-04-24 10:55:00',1);
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medico`
--

DROP TABLE IF EXISTS `medico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medico` (
  `codi_med` int(11) NOT NULL AUTO_INCREMENT,
  `nomb_med` varchar(20) DEFAULT NULL,
  `apel_med` varchar(20) DEFAULT NULL,
  `dni_med` varchar(10) DEFAULT NULL,
  `ruc_med` varchar(11) NOT NULL,
  `coleg_med` varchar(50) NOT NULL,
  `telf_med` varchar(10) DEFAULT NULL,
  `dire_med` varchar(100) DEFAULT NULL,
  `emai_med` varchar(100) DEFAULT NULL,
  `fena_med` date DEFAULT NULL,
  `sexo_med` char(1) DEFAULT NULL,
  `esta_med` char(1) DEFAULT NULL,
  PRIMARY KEY (`codi_med`),
  UNIQUE KEY `ruc_med` (`ruc_med`),
  UNIQUE KEY `coleg_med` (`coleg_med`),
  UNIQUE KEY `nomb_med` (`nomb_med`),
  UNIQUE KEY `apel_med` (`apel_med`),
  UNIQUE KEY `dni_med` (`dni_med`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medico`
--

LOCK TABLES `medico` WRITE;
/*!40000 ALTER TABLE `medico` DISABLE KEYS */;
INSERT INTO `medico` VALUES (1,'DIEGO ALFONSO','LOAYZA LOPEZ','42458455','10424584555','40508','949105955','URB. LOS JARDINES C11','clinicavitaldent@hotmail.com','1984-06-20','M','A'),(2,'Silvana','Diaz Salinas','44660415','20230608688','232456','992398412','SAN BARTOLOME 3RA ETAPA','silvana123@gmail.com','1979-01-01','F','A'),(3,'Jose ','Diaz Valladares','66666666','3333333','12345','992398412','san jacinto','cdiaz_1987@outlook.com','1979-07-12','M','A');
/*!40000 ALTER TABLE `medico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `odontograma`
--

DROP TABLE IF EXISTS `odontograma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `odontograma` (
  `codi_odo` int(11) NOT NULL AUTO_INCREMENT,
  `part_die` char(6) NOT NULL DEFAULT '000000',
  `codi_die` int(11) DEFAULT NULL,
  `codi_enf` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`codi_odo`),
  KEY `fk_odontograma_diente` (`codi_die`),
  KEY `fk_odontograma_enfermedad` (`codi_enf`)
) ENGINE=MyISAM AUTO_INCREMENT=151 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `odontograma`
--

LOCK TABLES `odontograma` WRITE;
/*!40000 ALTER TABLE `odontograma` DISABLE KEYS */;
INSERT INTO `odontograma` VALUES (1,'000000',1,NULL),(2,'000000',2,NULL),(3,'000000',3,NULL),(4,'000000',4,NULL),(5,'000000',5,NULL),(6,'000000',6,NULL),(7,'000000',7,NULL),(8,'000000',8,NULL),(9,'000000',9,NULL),(10,'000000',10,NULL),(11,'000000',11,NULL),(12,'000000',12,NULL),(13,'000000',13,NULL),(14,'000000',14,NULL),(15,'000000',15,NULL),(16,'000000',16,NULL),(17,'000000',17,NULL),(18,'000000',18,NULL),(19,'000000',19,NULL),(20,'000000',20,NULL),(21,'000000',21,NULL),(22,'000000',22,NULL),(23,'000000',23,NULL),(24,'000000',24,NULL),(25,'000000',25,NULL),(26,'000000',26,NULL),(27,'000000',27,NULL),(28,'000000',28,NULL),(29,'000000',29,NULL),(30,'000000',30,NULL),(31,'000000',31,NULL),(32,'000000',32,NULL),(33,'000000',33,NULL),(34,'000000',34,NULL),(35,'000000',35,NULL),(36,'000000',36,NULL),(37,'000000',37,NULL),(38,'000000',1,NULL),(39,'000000',2,NULL),(40,'000000',3,NULL),(41,'000000',4,NULL),(42,'000000',5,NULL),(43,'000000',6,NULL),(44,'000000',7,NULL),(45,'000000',8,NULL),(46,'000000',9,NULL),(47,'000000',10,NULL),(48,'000000',11,NULL),(49,'000000',12,NULL),(50,'000000',13,NULL),(51,'000000',14,NULL),(52,'000000',15,NULL),(53,'000000',16,NULL),(54,'000000',17,NULL),(55,'000000',18,NULL),(56,'000000',19,NULL),(57,'000000',20,NULL),(58,'000000',21,NULL),(59,'000000',22,NULL),(60,'000000',23,NULL),(61,'000000',24,NULL),(62,'000000',25,NULL),(63,'000000',26,NULL),(64,'000000',27,NULL),(65,'000000',28,NULL),(66,'000000',29,NULL),(67,'000000',30,NULL),(68,'000000',31,NULL),(69,'000000',32,NULL),(70,'000000',33,NULL),(71,'000000',34,NULL),(72,'000000',35,NULL),(73,'000000',1,NULL),(74,'000000',2,NULL),(75,'000000',3,NULL),(76,'000000',1,NULL),(77,'000000',2,NULL),(78,'000000',3,NULL),(79,'000000',4,NULL),(80,'000000',5,NULL),(81,'000000',6,NULL),(82,'000000',7,NULL),(83,'000000',8,NULL),(84,'000000',9,NULL),(85,'000000',10,NULL),(86,'000000',11,NULL),(87,'000000',12,NULL),(88,'000000',13,NULL),(89,'000000',14,NULL),(90,'000000',15,NULL),(91,'000000',16,NULL),(92,'000000',17,NULL),(93,'000000',18,NULL),(94,'000000',19,NULL),(95,'000000',20,NULL),(96,'000000',21,NULL),(97,'000000',22,NULL),(98,'000000',23,NULL),(99,'000000',24,NULL),(100,'000000',25,NULL),(101,'000000',26,NULL),(102,'000000',27,NULL),(103,'000000',28,NULL),(104,'000000',29,NULL),(105,'000000',30,NULL),(106,'000000',31,NULL),(107,'000000',32,NULL),(108,'000000',33,NULL),(109,'000000',34,NULL),(110,'000000',35,NULL),(111,'000000',36,NULL),(112,'000000',37,NULL),(113,'000000',38,NULL),(114,'000000',39,NULL),(115,'000000',40,NULL),(116,'000000',41,NULL),(117,'000000',42,NULL),(118,'000000',43,NULL),(119,'000000',44,NULL),(120,'000000',45,NULL),(121,'000000',46,NULL),(122,'000000',47,NULL),(123,'000000',48,NULL),(124,'000000',49,NULL),(125,'000000',50,NULL),(126,'000000',51,NULL),(127,'000000',52,NULL),(128,'000000',53,NULL),(129,'000000',54,NULL),(130,'000000',55,NULL),(131,'000000',56,NULL),(132,'000000',57,NULL),(133,'000000',58,NULL),(134,'000000',59,NULL),(135,'000000',60,NULL),(136,'000000',61,NULL),(137,'000000',62,NULL),(138,'000000',63,NULL),(139,'000000',64,NULL),(140,'000000',65,NULL),(141,'000000',66,NULL),(142,'000000',67,NULL),(143,'000000',68,NULL),(144,'000000',69,NULL),(145,'000000',70,NULL),(146,'000000',71,NULL),(147,'000000',72,NULL),(148,'000000',73,NULL),(149,'000000',74,NULL),(150,'000000',75,NULL);
/*!40000 ALTER TABLE `odontograma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paciente` (
  `codi_pac` int(11) NOT NULL AUTO_INCREMENT,
  `nomb_pac` varchar(20) NOT NULL,
  `apel_pac` varchar(20) NOT NULL,
  `edad_pac` varchar(3) NOT NULL,
  `ocupacion` varchar(40) DEFAULT NULL,
  `lugar_nacimiento` varchar(30) NOT NULL,
  `informacion_clinica` varchar(70) DEFAULT NULL,
  `dire_pac` varchar(100) DEFAULT NULL,
  `telf_pac` varchar(20) DEFAULT NULL,
  `dni_pac` varchar(10) NOT NULL,
  `fena_pac` date NOT NULL,
  `sexo_pac` char(1) NOT NULL,
  `civi_pac` char(1) DEFAULT NULL,
  `esta_pac` char(1) DEFAULT NULL,
  `afil_pac` varchar(30) DEFAULT NULL,
  `aler_pac` varchar(120) DEFAULT NULL,
  `emai_pac` varchar(50) DEFAULT NULL,
  `titu_pac` varchar(20) NOT NULL,
  `enfe_pac` varchar(50) DEFAULT NULL,
  `motivo_consulta` varchar(200) DEFAULT NULL,
  `signos` varchar(60) DEFAULT NULL,
  `antec_pac` varchar(200) DEFAULT NULL,
  `presion_pac` varchar(8) DEFAULT NULL,
  `pulso_pac` varchar(6) DEFAULT NULL,
  `temp_pac` varchar(20) DEFAULT NULL,
  `fc_pac` varchar(6) DEFAULT NULL,
  `frec_resp` varchar(10) DEFAULT NULL,
  `exam_clinico` varchar(200) DEFAULT NULL,
  `exam_complementario` varchar(200) DEFAULT NULL,
  `odonestomalogico` varchar(250) DEFAULT NULL,
  `diagn_pac` varchar(300) DEFAULT NULL,
  `observacion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`codi_pac`),
  UNIQUE KEY `dni_pac` (`dni_pac`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES (1,'CHRISTHIAM ALEXIS','Diaz Saona','30','INGENIERO','HUACHO','POR FACEBOOK','SAN BARTOLOME 3RA ETAPA','992398412','44660415','1987-07-15','M','C','A','Particular','TOS','cdiaz_1987@hotmail.com','SI','NINGUNA','2','2','2','45','2','2','2','2','2','2','2','CIE12',''),(2,'ANTONIO','Corso','23','ADE','HUACHO','POR AMIGO','SAN JACINTO','12345678','44665423','2011-07-01','M','S','A','EPS','Por dolor a garganta','csaona@clinicasanpedro.com','si','si','d','dd','d','','12','1','1','COMPLETO','d','d','d','CIE10',''),(3,'123','123','123','123','123','123','123','123','12312323','1970-01-01','M','S','A','Particular','123','a@a.com','123','123','123','123','123','','123','123','123','123','123','123','123','123',''),(4,'Carlos','García','27','','',NULL,NULL,'123456789','47474747','1970-01-01','M','C','A','EPS','Nada','yo@me.com','Yo','Inmortal','c#','','','','','','','','','','re','C45',''),(5,'KEVIN ROJAS','ESPINOZA','12','Ingeniero','Huacho','Por facebookes','SAN JACINTO DEL BIEN','992398412','20230688','1988-07-15','M','S','A','Particular','Ninguna','krojas@clinicasanpedro.com','si','NingunA','si','ninguno','callos','','12','34','23','12','POR MEDULAR','POR COMPLEMENTO','ODONTOLOGICO','E.12.4',''),(6,'Marcia ','Ayres ximena','23','Ingeniera','Huacho','por todas las partes','San Jacinto de aquino','992398412','23333333','1995-07-12','F','S','A','EPS','Polvo','jose@gmail.com','Si el mismo','23 dias','Por motivo de consulta medica','Tos ronquida','por padre','2','2','4','5','5','Por clinica dental','Por caries','Por presion',' C.10',''),(7,'carlos villa','sono ','40','gerente','huacho','por facebook','san jacinto del peru juan','992398412','55555555','1997-06-10','M','C','A','Particular',' ninguno','cvilla@clinicasanpedro.com','por lados','años','por cita medica','muchotobby','por personales   ','2','2','4','6','7',' des','   dess','   desss',' seee',''),(8,'SEBASTIAN','CUADRO','23','PROFESOR','URUGUAY','Por face y un amigo','URUGUAY','433333','33333333','1988-02-12','M','C','A','Particular',' al polvo ','sebascuadro19@gmail.com','Si el mismo','2 meses','Por dolor de los dientes','ninguno','ninguno','12','13','3','4','67',' Ninguno','ninguno   ','ninguno   ','POR GRIPE CE.10 ',''),(9,'Soria','Quijantes','año','Docente','Lima','Por facebook','Aramburu 520','992398412','50679234','1970-03-18','M','C','A','Particular',' polvo','soria@gmail.com','el mismo','ninguno','Por un dolor ','dolor','  por dolores','3','4','3','6','4','ninguno','  no presenta','   ninguno',' ninguno',''),(10,'Jose','Zevallos','25','Programador','Lima','FACEBOOK','Calle Ollantaytambo 275','924345385','74141566','1995-09-18','M','S','A','EPS',' -','phantomzx03@gmail.com','Jose','1 mes','Dolor en el abdomen derecho','Dolor','   -','139','120','36.8','123','125',' -','   -','   -',' -',''),(11,'Jose','Zevallos','27',NULL,'Ate',NULL,'Ollantaytambo 275 - cooperativa 27 de abril','995696673','74141577','1969-12-09','M',NULL,'A',NULL,' s','zevallosjose91@gmail.com','sadsad','s','s','s','no','3','3','3','3','3',' 3','   3',' ',' ','');
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pago`
--

DROP TABLE IF EXISTS `pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pago` (
  `cod_pago` int(11) NOT NULL AUTO_INCREMENT,
  `concepto_pago` varchar(80) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_pago` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `monto_pago` decimal(10,2) NOT NULL,
  `movimiento_pago` varchar(1) NOT NULL,
  `tipo_pago` varchar(1) NOT NULL,
  `observacion` text,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cod_pago`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago`
--

LOCK TABLES `pago` WRITE;
/*!40000 ALTER TABLE `pago` DISABLE KEYS */;
INSERT INTO `pago` VALUES (1,'Pago de personal','2018-04-13 04:51:29','2018-04-13 04:51:29',40.00,'E','C','Pago personal de limpieza',1),(2,'Pago de luz','2018-01-17 06:35:18','2018-01-17 06:35:18',12.00,'E','C','pago de luz ',0),(3,'Pago suplementos','2018-01-29 07:06:47','2018-01-29 07:06:47',23.00,'E','C','',0),(4,'Pago por comision','2018-04-13 04:32:44','2018-04-13 04:32:44',12.00,'E','C','por devolucion',0),(5,'Pago de agua','2018-04-24 03:56:32','2018-04-24 03:56:32',45.00,'E','P','Por pago mensual de agua',0);
/*!40000 ALTER TABLE `pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `placa`
--

DROP TABLE IF EXISTS `placa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `placa` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Paciente` int(11) NOT NULL,
  `NombreArchivo` varchar(255) NOT NULL,
  `Estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `placa`
--

LOCK TABLES `placa` WRITE;
/*!40000 ALTER TABLE `placa` DISABLE KEYS */;
INSERT INTO `placa` VALUES (1,1,'000.png',1),(2,2,'000.png',0),(3,4,'2018-01-08 at 09-39-10.png',1),(4,4,'2017-12-18 at 15-16-47.png',1),(5,2,'contacto_9.jpg',0),(6,3,'Productos.png',1),(7,3,'Productos.png',1),(8,1,'cajero.jpg',1),(9,4,'1604907_803032483176793_6251016339880222135_n.jpg',1),(10,4,'12181_1020306408044477_5178803912017649300_n.jpg',1),(11,4,'12181_1020306408044477_5178803912017649300_n.jpg',1),(12,4,'12181_1020306408044477_5178803912017649300_n.jpg',1),(13,3,'994740_10153834837940419_3234783633739683684_n.jpg',1),(14,3,'994740_10153834837940419_3234783633739683684_n.jpg',1),(15,2,'10155016_10153705350901006_6581652315462611827_n.jpg',0),(16,4,'677605.jpg',1),(17,4,'waterfall-high-quality-hd-jpg-1080P-wallpaper.jpg',1),(18,4,'waterfall-high-quality-hd-jpg-1080P-wallpaper.jpg',1),(19,4,'waterfall-high-quality-hd-jpg-1080P-wallpaper.jpg',1),(20,3,'677605.jpg',1),(21,3,'waterfall-high-quality-hd-jpg-1080P-wallpaper.jpg',1),(22,3,'waterfall-high-quality-hd-jpg-1080P-wallpaper.jpg',1),(23,4,'3464_1259891837364588_371872476449882433_n.jpg',1),(24,5,'581895_10153834838335419_2907799703966513927_n.jpg',1),(25,5,'10255849_1056391401090554_8590161764988025352_n.jpg',1),(26,5,'3464_1259891837364588_371872476449882433_n.jpg',0),(27,6,'581895_10153834838335419_2907799703966513927_n.jpg',1),(28,5,'994740_10153834837940419_3234783633739683684_n.jpg',1),(29,8,'677605.jpg',1),(30,8,'waterfall-high-quality-hd-jpg-1080P-wallpaper.jpg',0),(31,5,'10155016_10153705350901006_6581652315462611827_n.jpg',1),(32,5,'1604907_803032483176793_6251016339880222135_n.jpg',0),(33,7,'581895_10153834838335419_2907799703966513927_n.jpg',1),(34,7,'994740_10153834837940419_3234783633739683684_n.jpg',1),(35,9,'11048774_802557329890975_3621912673063467855_n (1).jpg',1);
/*!40000 ALTER TABLE `placa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presupuesto`
--

DROP TABLE IF EXISTS `presupuesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presupuesto` (
  `id_presupuesto` int(11) NOT NULL AUTO_INCREMENT,
  `codi_pac` int(11) NOT NULL,
  `adelanto` decimal(8,2) DEFAULT NULL,
  `codi_med` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `estado_tratamiento` char(1) NOT NULL DEFAULT '1',
  `estado_presupuesto` varchar(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`id_presupuesto`),
  KEY `fk_presupuesto_paciente` (`codi_pac`),
  KEY `fk_medico_presupuesto` (`codi_med`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presupuesto`
--

LOCK TABLES `presupuesto` WRITE;
/*!40000 ALTER TABLE `presupuesto` DISABLE KEYS */;
INSERT INTO `presupuesto` VALUES (1,1,34.00,1,'2018-04-08',200.00,'1','S'),(2,1,200.00,1,'2018-04-09',200.00,'1','S'),(3,1,200.00,1,'2018-04-08',200.00,'1','S'),(4,1,200.00,1,'2018-04-16',0.00,'1','S'),(5,1,1100.00,1,'2018-04-16',1233.00,'1','S'),(6,1,200.00,1,'2018-04-16',0.00,'2','S'),(7,1,1000.00,1,'2018-04-15',10000000.00,'2','S'),(8,1,100.00,1,'2018-04-18',0.00,'2','S'),(9,1,150.00,1,'2018-04-18',0.00,'2','S'),(10,1,200.00,1,'2018-04-18',200.00,'1','S'),(11,1,150.00,1,'2018-04-18',0.00,'2','S'),(12,1,150.00,1,'2018-04-18',0.00,'2','S'),(13,1,150.00,1,'2018-04-18',0.00,'2','S'),(14,1,200.00,1,'2018-04-18',200.00,'2','S'),(15,1,200.00,1,'2018-04-18',200.00,'2','S'),(16,1,24.00,1,'2018-04-18',0.00,'2','S'),(17,1,234.00,1,'2018-04-18',0.00,'2','S'),(18,6,345.00,1,'2018-04-20',200.00,'2','S'),(19,1,345.00,1,'2018-04-20',200.00,'2','S'),(20,1,456.00,1,'2018-04-20',0.00,'2','S'),(21,1,456.00,1,'2018-04-20',600.00,'2','S'),(22,1,345.00,1,'2018-04-20',0.00,'2','S'),(23,1,345.00,1,'2018-04-20',0.00,'2','S'),(24,1,345.00,1,'2018-04-20',0.00,'2','S'),(25,1,345.00,1,'2018-04-20',0.00,'2','S'),(26,1,23.00,1,'2018-04-20',0.00,'2','S'),(27,1,234.00,1,'2018-04-20',600.00,'2','S'),(28,1,345.00,1,'2018-04-20',600.00,'2','S'),(29,1,345.00,1,'2018-04-20',0.00,'2','S'),(30,1,45.00,1,'2018-04-20',0.00,'2','S'),(31,1,56.00,1,'2018-04-20',600.00,'2','S'),(32,1,56.00,1,'2018-04-20',0.00,'2','S'),(33,1,45.00,1,'2018-04-20',600.00,'2','S'),(34,1,345.00,1,'2018-04-20',600.00,'2','S'),(35,1,56.00,1,'2018-04-20',600.00,'2','S'),(36,1,45.00,1,'2018-04-20',800.00,'2','S'),(37,1,56.00,1,'2018-04-20',0.00,'2','S'),(38,1,67.00,1,'2018-04-20',800.00,'2','S'),(39,2,500.00,1,'2018-04-20',0.00,'2','S'),(40,2,320.00,1,'2018-04-20',200.00,'1','S'),(41,1,23.00,1,'2018-04-22',0.00,'2','S'),(42,1,34.00,1,'2018-04-22',0.00,'2','S'),(43,1,345.00,1,'2018-04-22',0.00,'1','S'),(44,1,45.00,1,'2018-04-22',200.00,'2','S'),(45,1,56.00,1,'2018-04-22',200.00,'2','S'),(46,8,200.00,1,'2018-05-01',200.00,'1','S'),(47,1,100.00,1,'2018-05-04',400.00,'2','S'),(48,1,34.00,1,'2018-05-04',450.00,'2','S'),(49,1,300.00,1,'2018-05-04',450.00,'2','S'),(50,1,23.00,1,'2018-05-29',450.00,'2','S'),(51,1,0.00,3,'2018-09-20',0.00,'1','S'),(52,1,0.00,3,'2018-09-20',1050.00,'1','S'),(53,1,500.00,1,'2018-09-29',450.00,'1','S'),(54,2,180.00,1,'2021-05-19',1400.00,'1','S');
/*!40000 ALTER TABLE `presupuesto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presupuesto_detalle`
--

DROP TABLE IF EXISTS `presupuesto_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presupuesto_detalle` (
  `id_pres_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `codi_pro` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_procedimiento` decimal(10,2) NOT NULL,
  `id_presupuesto` int(11) NOT NULL,
  PRIMARY KEY (`id_pres_detalle`),
  KEY `fk_presupuesto_detalle_tarifa_proc` (`codi_pro`),
  KEY `fk_presupuesto_detalle_presupuesto` (`id_presupuesto`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presupuesto_detalle`
--

LOCK TABLES `presupuesto_detalle` WRITE;
/*!40000 ALTER TABLE `presupuesto_detalle` DISABLE KEYS */;
INSERT INTO `presupuesto_detalle` VALUES (1,7,1,200.00,1),(2,7,1,200.00,2),(3,7,1,200.00,3),(4,7,1,1233.00,5),(5,7,1,10000000.00,7),(6,7,1,200.00,10),(7,7,1,200.00,14),(8,7,1,200.00,15),(9,7,1,200.00,18),(10,7,1,200.00,19),(11,7,1,200.00,21),(12,7,1,200.00,21),(13,7,1,200.00,21),(14,7,1,200.00,27),(15,7,1,200.00,27),(16,7,1,200.00,27),(17,7,1,200.00,28),(18,7,1,200.00,28),(19,7,1,200.00,28),(20,7,1,200.00,31),(21,7,1,200.00,31),(22,7,1,200.00,31),(23,7,1,200.00,33),(24,7,1,200.00,33),(25,7,1,200.00,33),(26,7,1,200.00,34),(27,7,1,200.00,34),(28,7,1,200.00,34),(29,7,1,200.00,35),(30,7,1,200.00,35),(31,7,1,200.00,35),(32,7,1,200.00,36),(33,7,1,200.00,36),(34,7,1,200.00,36),(35,7,1,200.00,36),(36,7,1,200.00,38),(37,7,1,200.00,38),(38,7,1,200.00,38),(39,7,1,200.00,38),(40,7,1,200.00,40),(41,7,1,200.00,44),(42,7,1,200.00,45),(43,7,1,200.00,46),(44,7,1,200.00,47),(45,7,1,200.00,47),(46,8,1,450.00,48),(47,8,1,450.00,49),(48,8,1,450.00,50),(49,8,1,450.00,52),(50,9,1,600.00,52),(51,8,1,450.00,53),(52,7,1,200.00,54),(53,7,1,200.00,54),(54,7,1,200.00,54),(55,7,1,200.00,54),(56,9,1,600.00,54),(57,7,1,200.00,55),(58,7,1,200.00,55),(59,7,1,200.00,55),(60,7,1,200.00,55);
/*!40000 ALTER TABLE `presupuesto_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `procedimiento`
--

DROP TABLE IF EXISTS `procedimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `procedimiento` (
  `codi_pro` int(11) NOT NULL AUTO_INCREMENT,
  `desc_pro` varchar(150) DEFAULT NULL,
  `grup_pro` varchar(50) DEFAULT NULL,
  `esta_pro` char(1) DEFAULT NULL,
  PRIMARY KEY (`codi_pro`),
  UNIQUE KEY `desc_pro` (`desc_pro`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `procedimiento`
--

LOCK TABLES `procedimiento` WRITE;
/*!40000 ALTER TABLE `procedimiento` DISABLE KEYS */;
INSERT INTO `procedimiento` VALUES (7,'Sutura de diente','S','A'),(8,'sutura por molar','B','A'),(9,'sutura dientes','S','A'),(10,'sacado de dientes','D','A');
/*!40000 ALTER TABLE `procedimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recetas`
--

DROP TABLE IF EXISTS `recetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recetas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `codi_med` int(11) NOT NULL,
  `txt_med` varchar(200) DEFAULT NULL,
  `codi_pac` int(11) NOT NULL,
  `txt_pac` varchar(200) DEFAULT NULL,
  `edad_pac` int(11) DEFAULT NULL,
  `receta` varchar(1000) DEFAULT NULL,
  `prescripcion` varchar(1000) DEFAULT NULL,
  `fecha_sc` datetime DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recetas`
--

LOCK TABLES `recetas` WRITE;
/*!40000 ALTER TABLE `recetas` DISABLE KEYS */;
INSERT INTO `recetas` VALUES (1,'2018-09-27 00:00:00',1,'LOAYZA LOPEZ DIEGO ALFONSO',1,'Diaz Saona CHRISTHIAM ALEXIS',30,'[\"POR DOMIR\"]','[\"DOLOR\"]','2018-09-27 16:03:00','v'),(2,'2019-02-13 00:00:00',1,'LOAYZA LOPEZ DIEGO ALFONSO',1,'Diaz Saona CHRISTHIAM ALEXIS',30,'[\"dolores fuertes\"]','[\"ninguna\"]','2019-02-13 13:10:00','v');
/*!40000 ALTER TABLE `recetas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `codi_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nomb_rol` varchar(30) DEFAULT NULL,
  `esta_rol` char(1) NOT NULL,
  PRIMARY KEY (`codi_rol`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'Administrador','A'),(2,'Asistente','A'),(3,'Doctor','A');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarifa_proc`
--

DROP TABLE IF EXISTS `tarifa_proc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarifa_proc` (
  `codi_tar` int(11) NOT NULL AUTO_INCREMENT,
  `codi_cat` int(11) DEFAULT NULL,
  `codi_pro` int(11) DEFAULT NULL,
  `cost_tar` decimal(10,2) DEFAULT NULL,
  `esta_tar` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`codi_tar`),
  KEY `fk_tarifa_proc_categoria` (`codi_cat`),
  KEY `fk_tarifa_proc_procedimiento` (`codi_pro`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarifa_proc`
--

LOCK TABLES `tarifa_proc` WRITE;
/*!40000 ALTER TABLE `tarifa_proc` DISABLE KEYS */;
INSERT INTO `tarifa_proc` VALUES (7,2,7,200.00,'A'),(8,1,7,678.00,'A'),(9,4,8,450.00,'A'),(10,1,9,600.00,'A'),(11,1,10,480.00,'A');
/*!40000 ALTER TABLE `tarifa_proc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_inventario`
--

DROP TABLE IF EXISTS `tipo_inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_inventario` (
  `cod_tipo_inventario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(80) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cod_tipo_inventario`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_inventario`
--

LOCK TABLES `tipo_inventario` WRITE;
/*!40000 ALTER TABLE `tipo_inventario` DISABLE KEYS */;
INSERT INTO `tipo_inventario` VALUES (1,'Venta','Por medicamento',0),(2,'Compras','Para Farmacia',0),(3,'Compra','Por compra de medicamentos',0),(4,'DES','SS',0),(5,'WEEE','EE',0),(6,'ds','ss',0),(7,'d','d',0),(8,'d','d',0),(9,'JUH','JUH',0),(10,'fr','d',0),(11,'DESDES','DESE',0),(12,'Por ventas','medicamentos',0),(13,'por demoler','bien',0),(14,'por telefono','no no',0),(15,'des','',0),(16,'desdee','',0),(17,'des','sss',0),(18,'dess','sss',0),(19,'dess','ss',0),(20,'des','seee',0),(21,'Por medicamento','medicamento',0),(22,'dientes','molares',0),(23,'prueba','prueba',0),(24,'pruebas','r',0),(25,'des','e',0),(26,'ttee','e',0),(27,'ee','ee',0),(28,'tr','',0),(29,'fr','f',0),(30,'ft','tt',0),(31,'ii','ii',0),(32,'hhh','',0),(33,'feded','des',0),(34,'fedes','hugo',0),(35,'gtfr','hy',0),(36,'hygttt','kijii',0),(37,'juhuu','juu',0),(38,'sistemas','christhiam',0),(39,'hgvfghgfh','ftxffcgcfgcfgy',0),(40,'hgvfghgfh','ftxffcgcfgcfgy',0),(41,'Por ingreso almacen','almacen',1),(42,'231132123165564','fdcxdfcdftg',0),(43,'ygbvygvytv','rtftftrtfr',0),(44,'CHRISTIAM ALEXIS','des',0),(45,'Salida de procedimientos','procedimientos',1);
/*!40000 ALTER TABLE `tipo_inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmp`
--

DROP TABLE IF EXISTS `tmp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmp` (
  `id_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad_tmp` int(11) NOT NULL,
  `codi_pro_tmp` int(11) NOT NULL,
  `precio_tmp` int(11) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tmp`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmp`
--

LOCK TABLES `tmp` WRITE;
/*!40000 ALTER TABLE `tmp` DISABLE KEYS */;
INSERT INTO `tmp` VALUES (25,1,7,200,'0rb3ojf2n9lrvst8u56vve4c20'),(26,1,7,200,'0rb3ojf2n9lrvst8u56vve4c20'),(27,1,7,200,'0rb3ojf2n9lrvst8u56vve4c20');
/*!40000 ALTER TABLE `tmp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `codi_usu` int(11) NOT NULL AUTO_INCREMENT,
  `logi_usu` varchar(20) DEFAULT NULL,
  `pass_usu` varbinary(1000) DEFAULT NULL,
  `esta_usu` char(1) DEFAULT NULL,
  `codi_rol` int(11) DEFAULT NULL,
  PRIMARY KEY (`codi_usu`),
  KEY `fk_usuario_rol` (`codi_rol`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','A',1),(2,'DEBI','afd9b41950a5def7bcd2c2ea03c1280e','A',2),(3,'DIEGO','449f77dbb837335b02e3845212a15124','A',2),(4,'XXX','bc9189406be84ec297464a514221406d','A',1),(5,'','','A',0),(6,'','','A',0),(7,'MANUEL','c064492320308620dc774dfa77c2ef74','A',1),(8,'ARON','d41d8cd98f00b204e9800998ecf8427e','A',1),(9,'DEMO','e10adc3949ba59abbe56e057f20f883e','A',2),(10,'CARLOS235','57a09ca04e7d7e7d85fb4db27b1f732e','A',1),(11,'medico','e10adc3949ba59abbe56e057f20f883e','A',3);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vcitas_medicas`
--

DROP TABLE IF EXISTS `vcitas_medicas`;
/*!50001 DROP VIEW IF EXISTS `vcitas_medicas`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vcitas_medicas` AS SELECT 
 1 AS `codi_cit`,
 1 AS `fech_cit`,
 1 AS `nomb_pac`,
 1 AS `apel_pac`,
 1 AS `nomb_med`,
 1 AS `apel_med`,
 1 AS `obsv_cit`,
 1 AS `codi_pac`,
 1 AS `codi_med`,
 1 AS `esta_cit`,
 1 AS `motivo_consult`,
 1 AS `sintomas`,
 1 AS `codi_homed`,
 1 AS `hora_homed`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vdetalle_procedimiento`
--

DROP TABLE IF EXISTS `vdetalle_procedimiento`;
/*!50001 DROP VIEW IF EXISTS `vdetalle_procedimiento`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vdetalle_procedimiento` AS SELECT 
 1 AS `codi_odo`,
 1 AS `codi_die`,
 1 AS `codi_pac`,
 1 AS `num_die`,
 1 AS `codi_enf`,
 1 AS `desc_enf`,
 1 AS `codi_dpr`,
 1 AS `codi_tar`,
 1 AS `aseg_dpr`,
 1 AS `codi_pro`,
 1 AS `desc_pro`,
 1 AS `grup_pro`,
 1 AS `codi_cat`,
 1 AS `nomb_cat`,
 1 AS `cost_tar`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vdiente_enfermedad`
--

DROP TABLE IF EXISTS `vdiente_enfermedad`;
/*!50001 DROP VIEW IF EXISTS `vdiente_enfermedad`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vdiente_enfermedad` AS SELECT 
 1 AS `codi_odo`,
 1 AS `part_die`,
 1 AS `codi_die`,
 1 AS `codi_enf`,
 1 AS `titu_enf`,
 1 AS `desc_enf`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vdiente_enfermedad_2`
--

DROP TABLE IF EXISTS `vdiente_enfermedad_2`;
/*!50001 DROP VIEW IF EXISTS `vdiente_enfermedad_2`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vdiente_enfermedad_2` AS SELECT 
 1 AS `codi_odo`,
 1 AS `codi_die`,
 1 AS `part_die`,
 1 AS `codi_pac`,
 1 AS `num_die`,
 1 AS `codi_enf`,
 1 AS `titu_enf`,
 1 AS `desc_enf`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vfactura`
--

DROP TABLE IF EXISTS `vfactura`;
/*!50001 DROP VIEW IF EXISTS `vfactura`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vfactura` AS SELECT 
 1 AS `codi_fac`,
 1 AS `fech_fac`,
 1 AS `sesi_fac`,
 1 AS `tota_fac`,
 1 AS `precio`,
 1 AS `aseg_dpr`,
 1 AS `part_die`,
 1 AS `cost_tar`,
 1 AS `num_die`,
 1 AS `nomb_cat`,
 1 AS `desc_pro`,
 1 AS `grup_pro`,
 1 AS `nomb_pac`,
 1 AS `apel_pac`,
 1 AS `codi_cit`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vhistorial`
--

DROP TABLE IF EXISTS `vhistorial`;
/*!50001 DROP VIEW IF EXISTS `vhistorial`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vhistorial` AS SELECT 
 1 AS `codi_his`,
 1 AS `codi_die`,
 1 AS `codi_pac`,
 1 AS `codi_cit`,
 1 AS `fech_cit`,
 1 AS `id_die`,
 1 AS `num_die`,
 1 AS `codi_edi`,
 1 AS `part_die`,
 1 AS `nomb_edi`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vhistorial_proc`
--

DROP TABLE IF EXISTS `vhistorial_proc`;
/*!50001 DROP VIEW IF EXISTS `vhistorial_proc`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vhistorial_proc` AS SELECT 
 1 AS `codi_cit`,
 1 AS `codi_dpr`,
 1 AS `num_die`,
 1 AS `desc_pro`,
 1 AS `nomb_cat`,
 1 AS `cost_tar`,
 1 AS `aseg_dpr`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vhorario_medico`
--

DROP TABLE IF EXISTS `vhorario_medico`;
/*!50001 DROP VIEW IF EXISTS `vhorario_medico`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vhorario_medico` AS SELECT 
 1 AS `codi_homed`,
 1 AS `fech_homed`,
 1 AS `hora_homed`,
 1 AS `codi_med`,
 1 AS `nomb_med`,
 1 AS `apel_med`,
 1 AS `dni_med`,
 1 AS `ruc_med`,
 1 AS `coleg_med`,
 1 AS `telf_med`,
 1 AS `dire_med`,
 1 AS `emai_med`,
 1 AS `fena_med`,
 1 AS `sexo_med`,
 1 AS `esta_med`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vodontograma`
--

DROP TABLE IF EXISTS `vodontograma`;
/*!50001 DROP VIEW IF EXISTS `vodontograma`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vodontograma` AS SELECT 
 1 AS `codi_odo`,
 1 AS `codi_die`,
 1 AS `codi_pac`,
 1 AS `codi_cit`,
 1 AS `fech_cit`,
 1 AS `id_die`,
 1 AS `num_die`,
 1 AS `codi_edi`,
 1 AS `part_die`,
 1 AS `nomb_edi`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vodontograma_reporte`
--

DROP TABLE IF EXISTS `vodontograma_reporte`;
/*!50001 DROP VIEW IF EXISTS `vodontograma_reporte`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vodontograma_reporte` AS SELECT 
 1 AS `codi_cit`,
 1 AS `apel_med`,
 1 AS `nomb_med`,
 1 AS `coleg_med`,
 1 AS `codi_pac`,
 1 AS `apel_pac`,
 1 AS `nomb_pac`,
 1 AS `num_die`,
 1 AS `nomb_edi`,
 1 AS `desc_enf`,
 1 AS `part_die`,
 1 AS `codi_enf`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vpacientes_historial`
--

DROP TABLE IF EXISTS `vpacientes_historial`;
/*!50001 DROP VIEW IF EXISTS `vpacientes_historial`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vpacientes_historial` AS SELECT 
 1 AS `codi_pac`,
 1 AS `nomb_pac`,
 1 AS `apel_pac`,
 1 AS `dire_pac`,
 1 AS `telf_pac`,
 1 AS `dni_pac`,
 1 AS `fena_pac`,
 1 AS `sexo_pac`,
 1 AS `civi_pac`,
 1 AS `esta_pac`,
 1 AS `afil_pac`,
 1 AS `aler_pac`,
 1 AS `emai_pac`,
 1 AS `titu_pac`,
 1 AS `enfe_pac`,
 1 AS `edad_pac`,
 1 AS `ocupacion`,
 1 AS `lugar_nacimiento`,
 1 AS `motivo_consulta`,
 1 AS `signos`,
 1 AS `antec_pac`,
 1 AS `presion_pac`,
 1 AS `pulso_pac`,
 1 AS `temp_pac`,
 1 AS `fc_pac`,
 1 AS `frec_resp`,
 1 AS `exam_clinico`,
 1 AS `exam_complementario`,
 1 AS `odonestomalogico`,
 1 AS `diagn_pac`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vtarifa`
--

DROP TABLE IF EXISTS `vtarifa`;
/*!50001 DROP VIEW IF EXISTS `vtarifa`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vtarifa` AS SELECT 
 1 AS `codi_tar`,
 1 AS `desc_pro`,
 1 AS `nomb_cat`,
 1 AS `cost_tar`,
 1 AS `grup_pro`,
 1 AS `codi_pro`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vtarifa_tmp`
--

DROP TABLE IF EXISTS `vtarifa_tmp`;
/*!50001 DROP VIEW IF EXISTS `vtarifa_tmp`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vtarifa_tmp` AS SELECT 
 1 AS `codi_tar`,
 1 AS `desc_pro`,
 1 AS `nomb_cat`,
 1 AS `cost_tar`,
 1 AS `grup_pro`,
 1 AS `codi_pro`,
 1 AS `id_tmp`,
 1 AS `cantidad_tmp`,
 1 AS `codi_pro_tmp`,
 1 AS `precio_tmp`,
 1 AS `session_id`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vusuario`
--

DROP TABLE IF EXISTS `vusuario`;
/*!50001 DROP VIEW IF EXISTS `vusuario`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vusuario` AS SELECT 
 1 AS `codi_usu`,
 1 AS `logi_usu`,
 1 AS `pass_usu`,
 1 AS `codi_rol`,
 1 AS `esta_usu`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vusuario_rol`
--

DROP TABLE IF EXISTS `vusuario_rol`;
/*!50001 DROP VIEW IF EXISTS `vusuario_rol`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vusuario_rol` AS SELECT 
 1 AS `codi_usu`,
 1 AS `logi_usu`,
 1 AS `pass_usu`,
 1 AS `esta_usu`,
 1 AS `codi_rol`,
 1 AS `nomb_rol`,
 1 AS `esta_rol`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vcitas_medicas`
--

/*!50001 DROP VIEW IF EXISTS `vcitas_medicas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vcitas_medicas` AS select `c`.`codi_cit` AS `codi_cit`,`hm`.`fech_homed` AS `fech_cit`,`p`.`nomb_pac` AS `nomb_pac`,`p`.`apel_pac` AS `apel_pac`,`m`.`nomb_med` AS `nomb_med`,`m`.`apel_med` AS `apel_med`,`c`.`obsv_cit` AS `obsv_cit`,`p`.`codi_pac` AS `codi_pac`,`m`.`codi_med` AS `codi_med`,`c`.`esta_cit` AS `esta_cit`,`c`.`motivo_consult` AS `motivo_consult`,`c`.`sintomas` AS `sintomas`,`hm`.`codi_homed` AS `codi_homed`,`hm`.`hora_homed` AS `hora_homed` from (((`cita_medica` `c` join `paciente` `p`) join `horario_medico` `hm`) join `medico` `m`) where ((`c`.`codi_pac` = `p`.`codi_pac`) and (`c`.`codi_homed` = `hm`.`codi_homed`) and (`hm`.`codi_med` = `m`.`codi_med`) and ((`c`.`esta_cit` = 'A') or (`c`.`esta_cit` = 'T')) and (`p`.`esta_pac` = 'A')) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vdetalle_procedimiento`
--

/*!50001 DROP VIEW IF EXISTS `vdetalle_procedimiento`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vdetalle_procedimiento` AS select `o`.`codi_odo` AS `codi_odo`,`o`.`codi_die` AS `codi_die`,`d`.`codi_pac` AS `codi_pac`,`d`.`num_die` AS `num_die`,`o`.`codi_enf` AS `codi_enf`,`ed`.`desc_enf` AS `desc_enf`,`dp`.`codi_dpr` AS `codi_dpr`,`dp`.`codi_tar` AS `codi_tar`,`dp`.`aseg_dpr` AS `aseg_dpr`,`tp`.`codi_pro` AS `codi_pro`,`p`.`desc_pro` AS `desc_pro`,`p`.`grup_pro` AS `grup_pro`,`tp`.`codi_cat` AS `codi_cat`,`c`.`nomb_cat` AS `nomb_cat`,`tp`.`cost_tar` AS `cost_tar` from ((((((`odontograma` `o` join `diente` `d`) join `enfermedad` `ed`) join `detalle_proc` `dp`) join `tarifa_proc` `tp`) join `procedimiento` `p`) join `categoria` `c`) where ((`o`.`codi_die` = `d`.`codi_die`) and (`o`.`codi_enf` = `ed`.`codi_enf`) and (`dp`.`codi_odo` = `o`.`codi_odo`) and (`dp`.`codi_tar` = `tp`.`codi_tar`) and (`tp`.`codi_pro` = `p`.`codi_pro`) and (`tp`.`codi_cat` = `c`.`codi_cat`)) order by `dp`.`codi_dpr` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vdiente_enfermedad`
--

/*!50001 DROP VIEW IF EXISTS `vdiente_enfermedad`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vdiente_enfermedad` AS select `ed`.`codi_odo` AS `codi_odo`,`ed`.`part_die` AS `part_die`,`ed`.`codi_die` AS `codi_die`,`ed`.`codi_enf` AS `codi_enf`,`e`.`titu_enf` AS `titu_enf`,`e`.`desc_enf` AS `desc_enf` from (`odontograma` `ed` join `enfermedad` `e`) where (`ed`.`codi_enf` = `e`.`codi_enf`) order by `ed`.`codi_die` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vdiente_enfermedad_2`
--

/*!50001 DROP VIEW IF EXISTS `vdiente_enfermedad_2`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vdiente_enfermedad_2` AS select `o`.`codi_odo` AS `codi_odo`,`o`.`codi_die` AS `codi_die`,`o`.`part_die` AS `part_die`,`d`.`codi_pac` AS `codi_pac`,`d`.`num_die` AS `num_die`,`o`.`codi_enf` AS `codi_enf`,`ed`.`titu_enf` AS `titu_enf`,`ed`.`desc_enf` AS `desc_enf` from ((`odontograma` `o` join `diente` `d`) join `enfermedad` `ed`) where ((`o`.`codi_die` = `d`.`codi_die`) and (`o`.`codi_enf` = `ed`.`codi_enf`)) order by `d`.`num_die` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vfactura`
--

/*!50001 DROP VIEW IF EXISTS `vfactura`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vfactura` AS select `f`.`codi_fac` AS `codi_fac`,`f`.`fech_fac` AS `fech_fac`,`f`.`sesi_fac` AS `sesi_fac`,`f`.`tota_fac` AS `tota_fac`,`df`.`precio` AS `precio`,`dp`.`aseg_dpr` AS `aseg_dpr`,`d`.`part_die` AS `part_die`,`tp`.`cost_tar` AS `cost_tar`,`d`.`num_die` AS `num_die`,`c`.`nomb_cat` AS `nomb_cat`,`p`.`desc_pro` AS `desc_pro`,`p`.`grup_pro` AS `grup_pro`,`pa`.`nomb_pac` AS `nomb_pac`,`pa`.`apel_pac` AS `apel_pac`,`cm`.`codi_cit` AS `codi_cit` from ((((((((((`factura` `f` join `detalle_fac` `df`) join `detalle_proc` `dp`) join `odontograma` `o`) join `tarifa_proc` `tp`) join `diente` `d`) join `categoria` `c`) join `procedimiento` `p`) join `paciente` `pa`) left join `historial_proc` `hp` on((`hp`.`codi_dpr` = `dp`.`codi_dpr`))) left join `cita_medica` `cm` on(((`hp`.`codi_cit` = `cm`.`codi_cit`) and (`d`.`codi_cit` = `cm`.`codi_cit`)))) where ((`f`.`codi_fac` = `df`.`codi_fac`) and (`df`.`codi_dpr` = `dp`.`codi_dpr`) and (`dp`.`codi_odo` = `o`.`codi_odo`) and (`o`.`codi_die` = `d`.`codi_die`) and (`dp`.`codi_tar` = `tp`.`codi_tar`) and (`tp`.`codi_pro` = `p`.`codi_pro`) and (`tp`.`codi_cat` = `c`.`codi_cat`) and (`pa`.`codi_pac` = `d`.`codi_pac`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vhistorial`
--

/*!50001 DROP VIEW IF EXISTS `vhistorial`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vhistorial` AS select `hp`.`codi_his` AS `codi_his`,`hp`.`codi_die` AS `codi_die`,`hp`.`codi_pac` AS `codi_pac`,`hp`.`codi_cit` AS `codi_cit`,`hm`.`fech_homed` AS `fech_cit`,`hp`.`id_die` AS `id_die`,`hp`.`num_die` AS `num_die`,`hp`.`codi_edi` AS `codi_edi`,`hp`.`part_die` AS `part_die`,`ed`.`nomb_edi` AS `nomb_edi` from (((`historial_paciente` `hp` join `estado_diente` `ed`) join `cita_medica` `c`) join `horario_medico` `hm`) where ((`hp`.`codi_edi` = `ed`.`codi_edi`) and (`hp`.`codi_cit` = `c`.`codi_cit`) and (`hm`.`codi_homed` = `c`.`codi_homed`)) order by `hp`.`codi_pac` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vhistorial_proc`
--

/*!50001 DROP VIEW IF EXISTS `vhistorial_proc`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vhistorial_proc` AS select `h`.`codi_cit` AS `codi_cit`,`h`.`codi_dpr` AS `codi_dpr`,`di`.`num_die` AS `num_die`,`p`.`desc_pro` AS `desc_pro`,`c`.`nomb_cat` AS `nomb_cat`,`t`.`cost_tar` AS `cost_tar`,`d`.`aseg_dpr` AS `aseg_dpr` from ((((((`historial_proc` `h` join `detalle_proc` `d`) join `procedimiento` `p`) join `categoria` `c`) join `tarifa_proc` `t`) join `odontograma` `o`) join `diente` `di`) where ((`h`.`codi_dpr` = `d`.`codi_dpr`) and (`d`.`codi_tar` = `t`.`codi_tar`) and (`t`.`codi_pro` = `p`.`codi_pro`) and (`t`.`codi_cat` = `c`.`codi_cat`) and (`d`.`codi_odo` = `o`.`codi_odo`) and (`o`.`codi_die` = `di`.`codi_die`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vhorario_medico`
--

/*!50001 DROP VIEW IF EXISTS `vhorario_medico`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vhorario_medico` AS select `hm`.`codi_homed` AS `codi_homed`,`hm`.`fech_homed` AS `fech_homed`,`hm`.`hora_homed` AS `hora_homed`,`m`.`codi_med` AS `codi_med`,`m`.`nomb_med` AS `nomb_med`,`m`.`apel_med` AS `apel_med`,`m`.`dni_med` AS `dni_med`,`m`.`ruc_med` AS `ruc_med`,`m`.`coleg_med` AS `coleg_med`,`m`.`telf_med` AS `telf_med`,`m`.`dire_med` AS `dire_med`,`m`.`emai_med` AS `emai_med`,`m`.`fena_med` AS `fena_med`,`m`.`sexo_med` AS `sexo_med`,`m`.`esta_med` AS `esta_med` from (`horario_medico` `hm` join `medico` `m`) where (`hm`.`codi_med` = `m`.`codi_med`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vodontograma`
--

/*!50001 DROP VIEW IF EXISTS `vodontograma`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vodontograma` AS select `o`.`codi_odo` AS `codi_odo`,`d`.`codi_die` AS `codi_die`,`d`.`codi_pac` AS `codi_pac`,`d`.`codi_cit` AS `codi_cit`,`hm`.`fech_homed` AS `fech_cit`,`d`.`id_die` AS `id_die`,`d`.`num_die` AS `num_die`,`d`.`codi_edi` AS `codi_edi`,`d`.`part_die` AS `part_die`,`ed`.`nomb_edi` AS `nomb_edi` from ((((`diente` `d` join `estado_diente` `ed`) join `cita_medica` `c`) join `odontograma` `o`) join `horario_medico` `hm`) where ((`o`.`codi_die` = `d`.`codi_die`) and (`d`.`codi_edi` = `ed`.`codi_edi`) and (`d`.`codi_cit` = `c`.`codi_cit`) and (`c`.`codi_homed` = `hm`.`codi_homed`)) order by `d`.`codi_die` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vodontograma_reporte`
--

/*!50001 DROP VIEW IF EXISTS `vodontograma_reporte`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vodontograma_reporte` AS select `he`.`codi_cit` AS `codi_cit`,`m`.`apel_med` AS `apel_med`,`m`.`nomb_med` AS `nomb_med`,`m`.`coleg_med` AS `coleg_med`,`p`.`codi_pac` AS `codi_pac`,`p`.`apel_pac` AS `apel_pac`,`p`.`nomb_pac` AS `nomb_pac`,`he`.`num_die` AS `num_die`,`ed`.`nomb_edi` AS `nomb_edi`,`en`.`desc_enf` AS `desc_enf`,`hp`.`part_die` AS `part_die`,`he`.`codi_enf` AS `codi_enf` from (((((((`historial_enf` `he` join `historial_paciente` `hp`) join `cita_medica` `c`) join `medico` `m`) join `paciente` `p`) join `estado_diente` `ed`) join `enfermedad` `en`) join `horario_medico` `hm`) where ((`he`.`codi_cit` = `hp`.`codi_cit`) and (`hp`.`num_die` = `he`.`num_die`) and (`he`.`codi_cit` = `c`.`codi_cit`) and (`c`.`codi_homed` = `hm`.`codi_homed`) and (`c`.`codi_pac` = `p`.`codi_pac`) and (`hp`.`codi_edi` = `ed`.`codi_edi`) and (`he`.`codi_enf` = `en`.`codi_enf`) and (`hm`.`codi_med` = `m`.`codi_med`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vpacientes_historial`
--

/*!50001 DROP VIEW IF EXISTS `vpacientes_historial`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vpacientes_historial` AS select distinct `h`.`codi_pac` AS `codi_pac`,`p`.`nomb_pac` AS `nomb_pac`,`p`.`apel_pac` AS `apel_pac`,`p`.`dire_pac` AS `dire_pac`,`p`.`telf_pac` AS `telf_pac`,`p`.`dni_pac` AS `dni_pac`,`p`.`fena_pac` AS `fena_pac`,`p`.`sexo_pac` AS `sexo_pac`,`p`.`civi_pac` AS `civi_pac`,`p`.`esta_pac` AS `esta_pac`,`p`.`afil_pac` AS `afil_pac`,`p`.`aler_pac` AS `aler_pac`,`p`.`emai_pac` AS `emai_pac`,`p`.`titu_pac` AS `titu_pac`,`p`.`enfe_pac` AS `enfe_pac`,`p`.`edad_pac` AS `edad_pac`,`p`.`ocupacion` AS `ocupacion`,`p`.`lugar_nacimiento` AS `lugar_nacimiento`,`p`.`motivo_consulta` AS `motivo_consulta`,`p`.`signos` AS `signos`,`p`.`antec_pac` AS `antec_pac`,`p`.`presion_pac` AS `presion_pac`,`p`.`pulso_pac` AS `pulso_pac`,`p`.`temp_pac` AS `temp_pac`,`p`.`fc_pac` AS `fc_pac`,`p`.`frec_resp` AS `frec_resp`,`p`.`exam_clinico` AS `exam_clinico`,`p`.`exam_complementario` AS `exam_complementario`,`p`.`odonestomalogico` AS `odonestomalogico`,`p`.`diagn_pac` AS `diagn_pac` from (`historial_paciente` `h` join `paciente` `p`) where (`h`.`codi_pac` = `p`.`codi_pac`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vtarifa`
--

/*!50001 DROP VIEW IF EXISTS `vtarifa`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vtarifa` AS select `t`.`codi_tar` AS `codi_tar`,`p`.`desc_pro` AS `desc_pro`,`c`.`nomb_cat` AS `nomb_cat`,`t`.`cost_tar` AS `cost_tar`,`p`.`grup_pro` AS `grup_pro`,`p`.`codi_pro` AS `codi_pro` from ((`categoria` `c` join `procedimiento` `p`) join `tarifa_proc` `t`) where ((`t`.`codi_cat` = `c`.`codi_cat`) and (`t`.`codi_pro` = `p`.`codi_pro`) and (`t`.`esta_tar` = 'A')) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vtarifa_tmp`
--

/*!50001 DROP VIEW IF EXISTS `vtarifa_tmp`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vtarifa_tmp` AS select `vtarifa`.`codi_tar` AS `codi_tar`,`vtarifa`.`desc_pro` AS `desc_pro`,`vtarifa`.`nomb_cat` AS `nomb_cat`,`vtarifa`.`cost_tar` AS `cost_tar`,`vtarifa`.`grup_pro` AS `grup_pro`,`vtarifa`.`codi_pro` AS `codi_pro`,`tmp`.`id_tmp` AS `id_tmp`,`tmp`.`cantidad_tmp` AS `cantidad_tmp`,`tmp`.`codi_pro_tmp` AS `codi_pro_tmp`,`tmp`.`precio_tmp` AS `precio_tmp`,`tmp`.`session_id` AS `session_id` from (`vtarifa` join `tmp`) where (`vtarifa`.`codi_pro` = `tmp`.`codi_pro_tmp`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vusuario`
--

/*!50001 DROP VIEW IF EXISTS `vusuario`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vusuario` AS select `usuario`.`codi_usu` AS `codi_usu`,`usuario`.`logi_usu` AS `logi_usu`,`usuario`.`pass_usu` AS `pass_usu`,`usuario`.`codi_rol` AS `codi_rol`,`usuario`.`esta_usu` AS `esta_usu` from `usuario` where (`usuario`.`esta_usu` = 'A') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vusuario_rol`
--

/*!50001 DROP VIEW IF EXISTS `vusuario_rol`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vusuario_rol` AS select `u`.`codi_usu` AS `codi_usu`,`u`.`logi_usu` AS `logi_usu`,`u`.`pass_usu` AS `pass_usu`,`u`.`esta_usu` AS `esta_usu`,`r`.`codi_rol` AS `codi_rol`,`r`.`nomb_rol` AS `nomb_rol`,`r`.`esta_rol` AS `esta_rol` from (`usuario` `u` join `rol` `r`) where (`u`.`codi_rol` = `r`.`codi_rol`) */;
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

-- Dump completed on 2023-09-02 10:46:08
