-- MySQL dump 10.13  Distrib 5.5.35, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: crabi
-- ------------------------------------------------------
-- Server version	5.5.35-0ubuntu0.12.04.2

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) DEFAULT NULL,
  `password` varchar(80) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `avatar` varchar(255) DEFAULT '/img/crabi_icon.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'pqzada','46f94c8de14fb36680850768ff1b7f2a','pquezada@stochastic.cl','/img/crabi_icon.png'),(2,'javs','39a4f2a4bd082c195427677311d09a19','jvergara@stochastic.cl','/img/crabi_icon.png');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Deportes','categoria'),(2,'Política','categoria'),(3,'Música','categoria'),(4,'Farándula','categoria');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'Borrador'),(2,'Publicado');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noticia`
--

DROP TABLE IF EXISTS `noticia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noticia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `id_red_social` int(11) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `contenido` text,
  `pregunta` varchar(255) DEFAULT NULL,
  `imagen_real` varchar(255) DEFAULT NULL,
  `imagen_falsa` varchar(255) DEFAULT NULL,
  `fecha_publicacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `destacado` smallint(6) DEFAULT '0',
  `seo_titulo` varchar(255) DEFAULT NULL,
  `seo_descripcion` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categoria` (`id_categoria`),
  KEY `id_estado` (`id_estado`),
  KEY `id_red_social` (`id_red_social`),
  CONSTRAINT `noticia_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`),
  CONSTRAINT `noticia_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`),
  CONSTRAINT `noticia_ibfk_3` FOREIGN KEY (`id_red_social`) REFERENCES `red_social` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticia`
--

LOCK TABLES `noticia` WRITE;
/*!40000 ALTER TABLE `noticia` DISABLE KEYS */;
INSERT INTO `noticia` VALUES (1,1,2,1,'Post de prueba','descripcion','contenido','Â¿Hola?','http://crabi.la/media/juanita-viale-gonzalo-valenzuela (1)_2.jpg',NULL,'2014-03-17 19:14:56',1,'123','123','post-de-prueba-1.html','/categoria/post-de-prueba-1.html'),(2,1,2,1,'Post de prueba','descripcion','contenido','Â¿Hola?','http://crabi.la/media/juanita-viale-gonzalo-valenzuela (1)_3.jpg',NULL,'2014-03-17 19:16:01',1,'123','123','post-de-prueba-2.html','/categoria/post-de-prueba-2.html'),(3,1,2,1,'Post de prueba','descripcion','contenido','Â¿Hola?','http://crabi.la/media/juanita-viale-gonzalo-valenzuela (1)_4.jpg',NULL,'2014-03-17 19:22:34',1,'123','123','post-de-prueba-3.html','/categoria/post-de-prueba-3.html'),(4,1,2,1,'Post de prueba','descripcion','contenido','Â¿Hola?','http://crabi.la/media/juanita-viale-gonzalo-valenzuela (1)_5.jpg',NULL,'2014-03-17 19:22:37',1,'123','123','post-de-prueba-4.html','/categoria/post-de-prueba-4.html'),(5,1,2,1,'Post de prueba','descripcion','contenido','Â¿Hola?','http://crabi.la/media/juanita-viale-gonzalo-valenzuela (1)_6.jpg',NULL,'2014-03-17 19:22:41',1,'123','123','post-de-prueba-5.html','/categoria/post-de-prueba-5.html'),(6,1,2,1,'Post de prueba','descripcion','contenido','Â¿Hola?','http://crabi.la/media/juanita-viale-gonzalo-valenzuela (1)_7.jpg',NULL,'2014-03-17 19:22:45',1,'123','123','post-de-prueba-6.html','/categoria/post-de-prueba-6.html'),(7,1,2,1,'Post de prueba','descripcion','contenido','Â¿Hola?','http://crabi.la/media/juanita-viale-gonzalo-valenzuela (1)_8.jpg',NULL,'2014-03-17 19:22:49',1,'123','123','post-de-prueba-7.html','/categoria/post-de-prueba-7.html');
/*!40000 ALTER TABLE `noticia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `red_social`
--

DROP TABLE IF EXISTS `red_social`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `red_social` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `red_social`
--

LOCK TABLES `red_social` WRITE;
/*!40000 ALTER TABLE `red_social` DISABLE KEYS */;
INSERT INTO `red_social` VALUES (1,'Facebook'),(2,'Twitter'),(3,'Youtube'),(4,'Instagram');
/*!40000 ALTER TABLE `red_social` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-04-21 12:12:01
