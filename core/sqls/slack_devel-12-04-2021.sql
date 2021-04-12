-- MySQL dump 10.17  Distrib 10.3.25-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: slack_devel
-- ------------------------------------------------------
-- Server version	10.3.25-MariaDB-0ubuntu0.20.04.1

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
-- Table structure for table `sd_clientes`
--

DROP TABLE IF EXISTS `sd_clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sd_clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_nombre` varchar(90) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(90) NOT NULL,
  `direccion` varchar(90) NOT NULL,
  `localidad` varchar(120) NOT NULL,
  `telefono` varchar(18) NOT NULL,
  `movil` varchar(18) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_clientes`
--

LOCK TABLES `sd_clientes` WRITE;
/*!40000 ALTER TABLE `sd_clientes` DISABLE KEYS */;
INSERT INTO `sd_clientes` VALUES (3,'Augusto Maza','debianmaza@gmail.com','Azara 1871 1C','Banfield','1142420569','1161669201'),(10,'Silvia Medina','silviamedina180169@gmail.com','Zarate 64','Remedios de Escalada','1156469787','1156469787');
/*!40000 ALTER TABLE `sd_clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_proyectos`
--

DROP TABLE IF EXISTS `sd_proyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sd_proyectos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_nombre` varchar(90) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `proyecto` varchar(90) NOT NULL,
  `estado_proyecto` enum('Activo','Inactivo') NOT NULL,
  `estado_pago` enum('SI','NO') DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `monto_pago` float(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_proyectos`
--

LOCK TABLES `sd_proyectos` WRITE;
/*!40000 ALTER TABLE `sd_proyectos` DISABLE KEYS */;
INSERT INTO `sd_proyectos` VALUES (1,'Silvia Medina','SM-Bienestar','Activo',NULL,NULL,NULL);
/*!40000 ALTER TABLE `sd_proyectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sd_usuarios`
--

DROP TABLE IF EXISTS `sd_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sd_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user` varchar(90) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `avatar` varchar(120) DEFAULT NULL,
  `role` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sd_usuarios`
--

LOCK TABLES `sd_usuarios` WRITE;
/*!40000 ALTER TABLE `sd_usuarios` DISABLE KEYS */;
INSERT INTO `sd_usuarios` VALUES (1,'Administrador','root','slack150',NULL,1),(4,'Augusto Maza','debianmaza@gmail.com','Linux1303',NULL,1),(11,'Silvia Medina','silviamedina180169@gmail.com','xo0P7@WyYdqlWqG',NULL,1);
/*!40000 ALTER TABLE `sd_usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-12  8:23:42
