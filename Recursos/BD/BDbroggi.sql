CREATE DATABASE  IF NOT EXISTS `broggi` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `broggi`;
-- MariaDB dump 10.17  Distrib 10.4.13-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: broggi
-- ------------------------------------------------------
-- Server version	10.4.13-MariaDB

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
-- Table structure for table `afectats`
--

DROP TABLE IF EXISTS `afectats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `afectats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `telefon` int(10) NOT NULL,
  `cip` varchar(45) DEFAULT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `cognoms` varchar(45) DEFAULT NULL,
  `edat` varchar(45) DEFAULT NULL,
  `te_cip` tinyint(4) DEFAULT NULL,
  `sexes_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cip_UNIQUE` (`cip`),
  KEY `fk_afectats_sexes1_idx` (`sexes_id`),
  CONSTRAINT `fk_afectats_sexes1` FOREIGN KEY (`sexes_id`) REFERENCES `sexes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `alertants`
--

DROP TABLE IF EXISTS `alertants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alertants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `telefon` int(10) NOT NULL,
  `nom` varchar(150) DEFAULT NULL,
  `cognoms` varchar(150) DEFAULT NULL,
  `adreca` varchar(150) DEFAULT NULL,
  `municipis_id` int(11) DEFAULT NULL,
  `tipus_alertants_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `telefon_UNIQUE` (`telefon`),
  KEY `fk_alertants_tipus_alertants1_idx` (`tipus_alertants_id`),
  KEY `fk_alertants_municipis1_idx` (`municipis_id`),
  CONSTRAINT `fk_alertants_municipis1` FOREIGN KEY (`municipis_id`) REFERENCES `municipis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_alertants_tipus_alertants1` FOREIGN KEY (`tipus_alertants_id`) REFERENCES `tipus_alertants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `comarques`
--

DROP TABLE IF EXISTS `comarques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comarques` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `provincies_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comarques_provincies1_idx` (`provincies_id`),
  CONSTRAINT `fk_comarques_provincies1` FOREIGN KEY (`provincies_id`) REFERENCES `provincies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `incidencies`
--

DROP TABLE IF EXISTS `incidencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incidencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_incident` int(11) DEFAULT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `telefon_alertant` int(10) NOT NULL,
  `adreca` varchar(150) NOT NULL,
  `adreca_complement` varchar(150) DEFAULT NULL,
  `descripcio` varchar(256) NOT NULL,
  `nom_metge` varchar(45) DEFAULT NULL,
  `tipus_incidencies_id` int(11) NOT NULL,
  `alertants_id` int(11) NOT NULL,
  `municipis_id` int(11) NOT NULL,
  `usuaris_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_incidencies_tipus_incidents1_idx` (`tipus_incidencies_id`),
  KEY `fk_incidencies_alertants1_idx` (`alertants_id`),
  KEY `fk_incidencies_municipis1_idx` (`municipis_id`),
  KEY `fk_incidencies_usuaris1_idx` (`usuaris_id`),
  CONSTRAINT `fk_incidencies_alertants1` FOREIGN KEY (`alertants_id`) REFERENCES `alertants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_incidencies_municipis1` FOREIGN KEY (`municipis_id`) REFERENCES `municipis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_incidencies_tipus_incidents1` FOREIGN KEY (`tipus_incidencies_id`) REFERENCES `tipus_incidencies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_incidencies_usuaris1` FOREIGN KEY (`usuaris_id`) REFERENCES `usuaris` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `incidencies_has_afectats`
--

DROP TABLE IF EXISTS `incidencies_has_afectats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incidencies_has_afectats` (
  `incidencies_id` int(11) NOT NULL,
  `afectats_id` int(11) NOT NULL,
  PRIMARY KEY (`incidencies_id`,`afectats_id`),
  KEY `fk_incidencies_has_afectats_afectats1_idx` (`afectats_id`),
  KEY `fk_incidencies_has_afectats_incidencies_idx` (`incidencies_id`),
  CONSTRAINT `fk_incidencies_has_afectats_afectats1` FOREIGN KEY (`afectats_id`) REFERENCES `afectats` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_incidencies_has_afectats_incidencies` FOREIGN KEY (`incidencies_id`) REFERENCES `incidencies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `incidencies_has_recursos`
--

DROP TABLE IF EXISTS `incidencies_has_recursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incidencies_has_recursos` (
  `incidencies_id` int(11) NOT NULL,
  `recursos_id` int(11) NOT NULL,
  `hora_activacio` time DEFAULT NULL,
  `hora_mobilitzacio` time DEFAULT NULL,
  `hora_assistencia` time DEFAULT NULL,
  `hora_transport` time DEFAULT NULL,
  `hora_arribada_hospital` time DEFAULT NULL,
  `hora_transferencia` time DEFAULT NULL,
  `hora_finalitzacio` time DEFAULT NULL,
  `prioritat` int(11) DEFAULT NULL,
  `desti` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`incidencies_id`,`recursos_id`),
  KEY `fk_incidencies_has_recursos_recursos1_idx` (`recursos_id`),
  KEY `fk_incidencies_has_recursos_incidencies1_idx` (`incidencies_id`),
  CONSTRAINT `fk_incidencies_has_recursos_incidencies1` FOREIGN KEY (`incidencies_id`) REFERENCES `incidencies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_incidencies_has_recursos_recursos1` FOREIGN KEY (`recursos_id`) REFERENCES `recursos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `municipis`
--

DROP TABLE IF EXISTS `municipis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `municipis` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `comarques_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_municipis_comarques1_idx` (`comarques_id`),
  CONSTRAINT `fk_municipis_comarques1` FOREIGN KEY (`comarques_id`) REFERENCES `comarques` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `provincies`
--

DROP TABLE IF EXISTS `provincies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provincies` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `recursos`
--

DROP TABLE IF EXISTS `recursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codi` varchar(45) NOT NULL,
  `actiu` tinyint(4) NOT NULL,
  `tipus_recursos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codi_UNIQUE` (`codi`),
  KEY `fk_recursos_tipus_recursos1_idx` (`tipus_recursos_id`),
  CONSTRAINT `fk_recursos_tipus_recursos1` FOREIGN KEY (`tipus_recursos_id`) REFERENCES `tipus_recursos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rols`
--

DROP TABLE IF EXISTS `rols`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rols` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sexes`
--

DROP TABLE IF EXISTS `sexes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sexes` (
  `id` int(11) NOT NULL,
  `sexe` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sexe_UNIQUE` (`sexe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipus_alertants`
--

DROP TABLE IF EXISTS `tipus_alertants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipus_alertants` (
  `id` int(11) NOT NULL,
  `tipus` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipus_UNIQUE` (`tipus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipus_incidencies`
--

DROP TABLE IF EXISTS `tipus_incidencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipus_incidencies` (
  `id` int(11) NOT NULL,
  `tipus` varchar(45) NOT NULL,
  `video` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipus_UNIQUE` (`tipus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipus_recursos`
--

DROP TABLE IF EXISTS `tipus_recursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipus_recursos` (
  `id` int(11) NOT NULL,
  `tipus` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipus_UNIQUE` (`tipus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuaris`
--

DROP TABLE IF EXISTS `usuaris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuaris` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `contrasenya` varchar(256) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `cognoms` varchar(45) NOT NULL,
  `rols_id` int(11) NOT NULL,
  `recursos_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_usuaris_rols1_idx` (`rols_id`),
  KEY `fk_usuaris_recursos1_idx` (`recursos_id`),
  CONSTRAINT `fk_usuaris_recursos1` FOREIGN KEY (`recursos_id`) REFERENCES `recursos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuaris_rols1` FOREIGN KEY (`rols_id`) REFERENCES `rols` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping events for database 'broggi'
--

--
-- Dumping routines for database 'broggi'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-27 19:33:19
