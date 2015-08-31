-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: tecnographic.com.ve    Database: tecnogra_nia
-- ------------------------------------------------------
-- Server version	5.5.42-cll

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
-- Table structure for table `bancos`
--

DROP TABLE IF EXISTS `bancos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bancos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banco` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `num_cuenta` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `deleted` int(11) DEFAULT '0',
  `tipo` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `imagen` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bancos`
--

LOCK TABLES `bancos` WRITE;
/*!40000 ALTER TABLE `bancos` DISABLE KEYS */;
INSERT INTO `bancos` VALUES (1,'Banco General','123599605',0,'corriente','Sin título-2-01.jpg','2015-08-27','2015-08-29','https://www.bgeneral.com/bgespanol/personal/index.asp');
/*!40000 ALTER TABLE `bancos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_nomb` varchar(50) NOT NULL,
  `cat_desc` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Vestido','Vestido','2015-08-27','2015-08-27',0),(2,'Traje de baño','Traje de baño','2015-08-27','2015-08-27',0),(3,'Cartera','Cartera','2015-08-27','2015-08-27',0),(4,'Lentes','Lentes','2015-08-27','2015-08-27',0);
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colores`
--

DROP TABLE IF EXISTS `colores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color_nomb` varchar(20) DEFAULT NULL,
  `color_desc` varchar(20) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colores`
--

LOCK TABLES `colores` WRITE;
/*!40000 ALTER TABLE `colores` DISABLE KEYS */;
INSERT INTO `colores` VALUES (1,'Rojo','Rojo','2015-08-27','2015-08-27',0),(2,'Negro','Negro','2015-08-30','2015-08-30',0);
/*!40000 ALTER TABLE `colores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` VALUES (1,'Bocas del Toro'),(2,'Coclé'),(3,'Colón'),(4,'Chiriquí'),(5,'Darién'),(6,'Herrera'),(7,'Los Santos'),(8,'Panamá'),(9,'Veraguas');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direcciones`
--

DROP TABLE IF EXISTS `direcciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `direcciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `dir` varchar(500) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `deleted` int(11) DEFAULT '0',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `user_dir` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direcciones`
--

LOCK TABLES `direcciones` WRITE;
/*!40000 ALTER TABLE `direcciones` DISABLE KEYS */;
INSERT INTO `direcciones` VALUES (1,28,'cagua','carlucho@carlucho.com',0,'2015-08-29','2015-08-29',1),(2,25,'av. panama','sosafelipe.89@gmail.com',0,'2015-08-29','2015-08-30',1);
/*!40000 ALTER TABLE `direcciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factura_item`
--

DROP TABLE IF EXISTS `factura_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `factura_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `factura_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_qty` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `item_talla` int(11) DEFAULT NULL,
  `item_color` int(11) DEFAULT NULL,
  `item_precio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura_item`
--

LOCK TABLES `factura_item` WRITE;
/*!40000 ALTER TABLE `factura_item` DISABLE KEYS */;
INSERT INTO `factura_item` VALUES (1,1,1,1,'2015-08-29','2015-08-29',1,1,25),(2,2,1,1,'2015-08-29','2015-08-29',1,1,25),(3,3,1,1,'2015-08-29','2015-08-29',1,1,25),(4,4,1,1,'2015-08-29','2015-08-29',1,1,25),(5,5,1,3,'2015-08-29','2015-08-29',1,1,25),(6,6,1,1,'2015-08-29','2015-08-29',1,1,25),(7,7,1,1,'2015-08-29','2015-08-29',1,1,25),(8,8,1,2,'2015-08-29','2015-08-29',1,1,25),(9,9,5,1,'2015-08-29','2015-08-29',1,1,15),(10,10,4,1,'2015-08-30','2015-08-30',1,1,40),(11,10,5,1,'2015-08-30','2015-08-30',1,1,15),(12,11,6,2,'2015-08-30','2015-08-30',1,1,55),(13,11,5,1,'2015-08-30','2015-08-30',1,1,15),(14,11,4,2,'2015-08-30','2015-08-30',1,1,40),(15,11,1,1,'2015-08-30','2015-08-30',1,1,25);
/*!40000 ALTER TABLE `factura_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facturas`
--

DROP TABLE IF EXISTS `facturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `pagada` int(11) DEFAULT '0',
  `num_trans` varchar(200) DEFAULT NULL,
  `dir` varchar(500) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `fech_trans` varchar(45) DEFAULT NULL,
  `banco` int(11) DEFAULT NULL,
  `banco_ext` varchar(45) DEFAULT NULL,
  `deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facturas`
--

LOCK TABLES `facturas` WRITE;
/*!40000 ALTER TABLE `facturas` DISABLE KEYS */;
INSERT INTO `facturas` VALUES (1,28,1,'bancoBpa.png','1','2015-08-29 17:41:05','2015-08-30 00:52:32',NULL,'04-08-2015',1,NULL,0),(2,25,1,'345678','2','2015-08-29 17:45:29','2015-08-29 18:55:38',NULL,'28-08-2015',1,'banesco',0),(3,25,1,'234445','2','2015-08-29 18:27:56','2015-08-29 18:49:52',NULL,'29-08-2015',1,'banesco',0),(4,25,1,'2147483647','2','2015-08-29 18:33:10','2015-08-29 18:46:26',NULL,'29-08-2015',1,'banistmo',0),(5,25,-1,'Captura de pantalla 2015-08-28 a la(s) 16.28.11.png','2','2015-08-29 19:09:19','2015-08-29 21:50:37',NULL,'28-08-2015',1,'banistmo',0),(6,25,1,'4567899','2','2015-08-29 19:17:55','2015-08-29 22:29:06',NULL,'30-08-2015',1,'banistmo',0),(7,25,0,NULL,'2','2015-08-29 21:56:59','2015-08-29 21:56:59',NULL,NULL,NULL,NULL,0),(8,25,1,'Captura de pantalla 2015-08-28 a la(s) 16.28.11.png','2','2015-08-29 22:25:24','2015-08-30 00:54:08',NULL,'29-08-2015',1,'banistmo',0),(9,25,-1,'Captura de pantalla 2015-08-28 a la(s) 16(1).28','2','2015-08-29 23:56:20','2015-08-29 23:57:05',NULL,'29-08-2015',1,'banistmo',0),(10,25,1,'Captura de pantalla 2015-08-28 a la(s) 16(2).28','2','2015-08-30 00:01:25','2015-08-30 00:03:10',NULL,'31-08-2015',1,'banistmo',0),(11,25,1,'Captura de pantalla 2015-08-29 a la(s) 21.25.38.png','2','2015-08-30 22:35:37','2015-08-30 23:52:56',NULL,'30-08-2015',1,'general',0);
/*!40000 ALTER TABLE `facturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `misc_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted` int(11) DEFAULT '0',
  `order` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,1,'1/vestidos-rojo-peplum.jpg','2015-08-27','2015-08-27',0,0),(2,2,'2/vestidos-rojo-peplum.jpg','2015-08-27','2015-08-27',1,0),(3,2,'2/vestidos-rojo-peplum(1).jpg','2015-08-27','2015-08-27',1,0),(4,3,'3/vestido-formal-moda-japonesa-dama-mujer-envio-gratis-19185-MLM20167185457_092014-F.jpg','2015-08-27','2015-08-28',1,0),(5,4,'4/vestido-formal-moda-japonesa-dama-mujer-envio-gratis-19185-MLM20167185457_092014-F.jpg','2015-08-29','2015-08-29',0,0),(6,5,'5/ultimas-fotos-modelo-candice-swanepoel-traje-de-bano-2.jpg','2015-08-29','2015-08-29',0,0),(7,6,'6/KL784S_078P_175-euros.jpg','2015-08-30','2015-08-30',0,0),(8,7,'7/louisvuitton-speedy.jpg','2015-08-30','2015-08-30',0,0),(9,8,'8/nina_6.jpg','2015-08-31','2015-08-31',0,0);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_cod` varchar(10) NOT NULL,
  `item_nomb` varchar(100) NOT NULL,
  `item_desc` text NOT NULL,
  `item_prov` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `deleted` int(11) DEFAULT '0',
  `item_cat` int(11) DEFAULT NULL,
  `item_subcat` int(11) DEFAULT NULL,
  `item_precio` float DEFAULT NULL,
  `item_precio_dolar` varchar(45) DEFAULT NULL,
  `item_prom` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `item_cod` (`item_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,'0001','Vestido Rojo','<p>La&nbsp;ropa&nbsp;es un t&eacute;rmino que se refiere a las prendas fabricadas con diversas telas y pieles animales , usadas para vestirse y protegerse del clima adverso. Los atuendos pueden ser visibles o no, como en el caso &nbsp;En su sentido m&aacute;s amplio, la vestimenta incluye tambi&eacute;n algunos otros accesorios como los&nbsp;que cubren las manos.</p>\r\n',0,'2015-08-27','2015-08-29',0,1,NULL,25,'25',NULL),(2,'0002','Vestido Rojo','<p>La&nbsp;ropa&nbsp;es un t&eacute;rmino que se refiere a las prendas fabricadas con diversas telas y pieles animales , usadas para vestirse y protegerse del clima adverso. Los atuendos pueden ser visibles o no, como en el caso &nbsp;En su sentido m&aacute;s amplio, la vestimenta incluye tambi&eacute;n algunos otros accesorios como los&nbsp;que cubren las manos.</p>\r\n',0,'2015-08-27','2015-08-27',1,1,NULL,25,'25',NULL),(3,'0003','De botones','<p>Un&nbsp;<strong>vestido</strong>&nbsp;de novia o&nbsp;<strong>vestido</strong>&nbsp;de casamiento es la prenda utilizada por las novias durante la ceremonia de la boda. La importancia del color, del estilo y del</p>\r\n',0,'2015-08-27','2015-08-28',1,1,NULL,35,NULL,NULL),(4,'ooo4','Vestido de pepa','<p>Promociones exclusivas y &uacute;ltimas tendencias en&nbsp;<strong>vestidos</strong>&nbsp;de mujer: cortos, largos, de fiesta o de d&iacute;a a precios especiales. ENTREGA GRATUITA DESDE 30 &euro;</p>\r\n',0,'2015-08-29','2015-08-29',0,1,NULL,40,NULL,NULL),(5,'0005','traje de baño','<p>Oportunidad en Mujer en&nbsp;<strong>Trajes de Ba&ntilde;o</strong>! M&aacute;s de 2807 ofertas a excelentes precios en MercadoLibre: blusas damas, bolsos, crop tops, franelas&nbsp;</p>\r\n',0,'2015-08-29','2015-08-29',0,2,NULL,15,NULL,NULL),(6,'0006','lentes chanel','<p>La l&iacute;nea&nbsp;<strong>Chanel</strong>&nbsp;fu&eacute; fundada por Mademoiselle &quot;Coco&quot;,&nbsp;<strong>Chanel</strong>&nbsp;es la Maison de Haute Couture por excelencia. En esta colecci&oacute;n de&nbsp;<strong>gafas</strong>&nbsp;de sol</p>\r\n',0,'2015-08-30','2015-08-30',0,4,NULL,55,NULL,NULL),(7,'0008','Cartera chanel','<p>La l&iacute;nea&nbsp;<strong>Chanel</strong>&nbsp;fu&eacute; fundada por Mademoiselle &quot;Coco&quot;,&nbsp;<strong>Chanel</strong>&nbsp;es la Maison de Haute Couture por excelencia. En esta colecci&oacute;n de&nbsp;<strong>gafas</strong>&nbsp;de sol</p>\r\n',0,'2015-08-30','2015-08-30',0,3,NULL,89,NULL,NULL),(8,'0007','traje de buzo ','<p>La l&iacute;nea&nbsp;<strong>Chanel</strong>&nbsp;fu&eacute; fundada por Mademoiselle &quot;Coco&quot;,&nbsp;<strong>Chanel</strong>&nbsp;es la Maison de Haute Couture por excelencia. En esta colecci&oacute;n de&nbsp;<strong>gafas</strong>&nbsp;de sol</p>\r\n',0,'2015-08-31','2015-08-31',0,2,NULL,65,NULL,NULL);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `miscelanias`
--

DROP TABLE IF EXISTS `miscelanias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `miscelanias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `item_talla` varchar(20) DEFAULT NULL,
  `item_color` varchar(20) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `deleted` int(11) DEFAULT '0',
  `item_stock` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `miscelanias`
--

LOCK TABLES `miscelanias` WRITE;
/*!40000 ALTER TABLE `miscelanias` DISABLE KEYS */;
INSERT INTO `miscelanias` VALUES (1,1,'1','1','2015-08-30','2015-08-27',0,'4'),(2,2,'1','1','2015-08-28','2015-08-27',1,'10'),(3,3,'1','1','2015-08-28','2015-08-27',1,'5'),(4,4,'1','1','2015-08-30','2015-08-29',0,'3'),(5,5,'1','1','2015-08-30','2015-08-29',0,'6'),(6,6,'1','1','2015-08-30','2015-08-30',0,'6'),(7,7,'2','2','2015-08-30','2015-08-30',0,'9'),(8,8,'1','2','2015-08-31','2015-08-31',0,'5');
/*!40000 ALTER TABLE `miscelanias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pais`
--

DROP TABLE IF EXISTS `pais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=256 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pais`
--

LOCK TABLES `pais` WRITE;
/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
INSERT INTO `pais` VALUES (1,'AC','Isla de la Ascensión'),(2,'AD','Andorra'),(3,'AE','Emiratos Árabes Unidos'),(4,'AF','Afganistán'),(5,'AG','Antigua y Barbuda'),(6,'AI','Anguila'),(7,'AL','Albania'),(8,'AM','Armenia'),(9,'AN','Antillas Neerlandesas'),(10,'AO','Angola'),(11,'AQ','Antártida'),(12,'AR','Argentina'),(13,'AS','Samoa Americana'),(14,'AT','Austria'),(15,'AU','Australia'),(16,'AW','Aruba'),(17,'AX','Islas Åland'),(18,'AZ','Azerbaiyán'),(19,'BA','Bosnia-Herzegovina'),(20,'BB','Barbados'),(21,'BD','Bangladesh'),(22,'BE','Bélgica'),(23,'BF','Burkina Faso'),(24,'BG','Bulgaria'),(25,'BH','Bahréin'),(26,'BI','Burundi'),(27,'BJ','Benín'),(28,'BL','San Bartolomé'),(29,'BM','Bermudas'),(30,'BN','Brunéi'),(31,'BO','Bolivia'),(32,'BR','Brasil'),(33,'BS','Bahamas'),(34,'BT','Bután'),(35,'BV','Isla Bouvet'),(36,'BW','Botsuana'),(37,'BY','Bielorrusia'),(38,'BZ','Belice'),(39,'CA','Canadá'),(40,'CC','Islas Cocos'),(41,'CD','República Democrática del Congo'),(42,'CF','República Centroafricana'),(43,'CG','Congo - Brazzaville'),(44,'CH','Suiza'),(45,'CI','Costa de Marfil'),(46,'CK','Islas Cook'),(47,'CL','Chile'),(48,'CM','Camerún'),(49,'CN','China'),(50,'CO','Colombia'),(51,'CP','Isla Clipperton'),(52,'CR','Costa Rica'),(53,'CS','Serbia y Montenegro'),(54,'CU','Cuba'),(55,'CV','Cabo Verde'),(56,'CX','Isla Christmas'),(57,'CY','Chipre'),(58,'CZ','República Checa'),(59,'DE','Alemania'),(60,'DG','Diego García'),(61,'DJ','Yibuti'),(62,'DK','Dinamarca'),(63,'DM','Dominica'),(64,'DO','República Dominicana'),(65,'DZ','Argelia'),(66,'EA','Ceuta y Melilla'),(67,'EC','Ecuador'),(68,'EE','Estonia'),(69,'EG','Egipto'),(70,'EH','Sáhara Occidental'),(71,'ER','Eritrea'),(72,'ES','España'),(73,'ET','Etiopía'),(74,'EU','Unión Europea'),(75,'FI','Finlandia'),(76,'FJ','Fiyi'),(77,'FK','Islas Malvinas'),(78,'FM','Micronesia'),(79,'FO','Islas Feroe'),(80,'FR','Francia'),(81,'GA','Gabón'),(82,'GB','Reino Unido'),(83,'GD','Granada'),(84,'GE','Georgia'),(85,'GF','Guayana Francesa'),(86,'GG','Guernsey'),(87,'GH','Ghana'),(88,'GI','Gibraltar'),(89,'GL','Groenlandia'),(90,'GM','Gambia'),(91,'GN','Guinea'),(92,'GP','Guadalupe'),(93,'GQ','Guinea Ecuatorial'),(94,'GR','Grecia'),(95,'GS','Islas Georgia del Sur y Sandwich del Sur'),(96,'GT','Guatemala'),(97,'GU','Guam'),(98,'GW','Guinea-Bissau'),(99,'GY','Guyana'),(100,'HK','Región Administrativa Especial de Hong Kong de la República Popu'),(101,'HM','Islas Heard y McDonald'),(102,'HN','Honduras'),(103,'HR','Croacia'),(104,'HT','Haití'),(105,'HU','Hungría'),(106,'IC','Islas Canarias'),(107,'ID','Indonesia'),(108,'IE','Irlanda'),(109,'IL','Israel'),(110,'IM','Isla de Man'),(111,'IN','India'),(112,'IO','Territorio Británico del Océano Índico'),(113,'IQ','Iraq'),(114,'IR','Irán'),(115,'IS','Islandia'),(116,'IT','Italia'),(117,'JE','Jersey'),(118,'JM','Jamaica'),(119,'JO','Jordania'),(120,'JP','Japón'),(121,'KE','Kenia'),(122,'KG','Kirguistán'),(123,'KH','Camboya'),(124,'KI','Kiribati'),(125,'KM','Comoras'),(126,'KN','San Cristóbal y Nieves'),(127,'KP','Corea del Norte'),(128,'KR','Corea del Sur'),(129,'KW','Kuwait'),(130,'KY','Islas Caimán'),(131,'KZ','Kazajistán'),(132,'LA','Laos'),(133,'LB','Líbano'),(134,'LC','Santa Lucía'),(135,'LI','Liechtenstein'),(136,'LK','Sri Lanka'),(137,'LR','Liberia'),(138,'LS','Lesoto'),(139,'LT','Lituania'),(140,'LU','Luxemburgo'),(141,'LV','Letonia'),(142,'LY','Libia'),(143,'MA','Marruecos'),(144,'MC','Mónaco'),(145,'MD','Moldavia'),(146,'ME','Montenegro'),(147,'MF','San Martín'),(148,'MG','Madagascar'),(149,'MH','Islas Marshall'),(150,'MK','Macedonia'),(151,'ML','Mali'),(152,'MM','Myanmar [Birmania]'),(153,'MN','Mongolia'),(154,'MO','Región Administrativa Especial de Macao de la República Popular '),(155,'MP','Islas Marianas del Norte'),(156,'MQ','Martinica'),(157,'MR','Mauritania'),(158,'MS','Montserrat'),(159,'MT','Malta'),(160,'MU','Mauricio'),(161,'MV','Maldivas'),(162,'MW','Malaui'),(163,'MX','México'),(164,'MY','Malasia'),(165,'MZ','Mozambique'),(166,'NA','Namibia'),(167,'NC','Nueva Caledonia'),(168,'NE','Níger'),(169,'NF','Isla Norfolk'),(170,'NG','Nigeria'),(171,'NI','Nicaragua'),(172,'NL','Países Bajos'),(173,'NO','Noruega'),(174,'NP','Nepal'),(175,'NR','Nauru'),(176,'NU','Isla Niue'),(177,'NZ','Nueva Zelanda'),(178,'OM','Omán'),(179,'PA','Panamá'),(180,'PE','Perú'),(181,'PF','Polinesia Francesa'),(182,'PG','Papúa Nueva Guinea'),(183,'PH','Filipinas'),(184,'PK','Pakistán'),(185,'PL','Polonia'),(186,'PM','San Pedro y Miquelón'),(187,'PN','Islas Pitcairn'),(188,'PR','Puerto Rico'),(189,'PS','Territorios Palestinos'),(190,'PT','Portugal'),(191,'PW','Palau'),(192,'PY','Paraguay'),(193,'QA','Qatar'),(194,'QO','Territorios alejados de Oceanía'),(195,'RE','Reunión'),(196,'RO','Rumanía'),(197,'RS','Serbia'),(198,'RU','Rusia'),(199,'RW','Ruanda'),(200,'SA','Arabia Saudí'),(201,'SB','Islas Salomón'),(202,'SC','Seychelles'),(203,'SD','Sudán'),(204,'SE','Suecia'),(205,'SG','Singapur'),(206,'SH','Santa Elena'),(207,'SI','Eslovenia'),(208,'SJ','Svalbard y Jan Mayen'),(209,'SK','Eslovaquia'),(210,'SL','Sierra Leona'),(211,'SM','San Marino'),(212,'SN','Senegal'),(213,'SO','Somalia'),(214,'SR','Surinam'),(215,'ST','Santo Tomé y Príncipe'),(216,'SV','El Salvador'),(217,'SY','Siria'),(218,'SZ','Suazilandia'),(219,'TA','Tristán da Cunha'),(220,'TC','Islas Turcas y Caicos'),(221,'TD','Chad'),(222,'TF','Territorios Australes Franceses'),(223,'TG','Togo'),(224,'TH','Tailandia'),(225,'TJ','Tayikistán'),(226,'TK','Tokelau'),(227,'TL','Timor Oriental'),(228,'TM','Turkmenistán'),(229,'TN','Túnez'),(230,'TO','Tonga'),(231,'TR','Turquía'),(232,'TT','Trinidad y Tobago'),(233,'TV','Tuvalu'),(234,'TW','Taiwán'),(235,'TZ','Tanzania'),(236,'UA','Ucrania'),(237,'UG','Uganda'),(238,'UM','Islas menores alejadas de los Estados Unidos'),(239,'US','Estados Unidos'),(240,'UY','Uruguay'),(241,'UZ','Uzbekistán'),(242,'VA','Ciudad del Vaticano'),(243,'VC','San Vicente y las Granadinas'),(244,'VE','Venezuela'),(245,'VG','Islas Vírgenes Británicas'),(246,'VI','Islas Vírgenes de los Estados Unidos'),(247,'VN','Vietnam'),(248,'VU','Vanuatu'),(249,'WF','Wallis y Futuna'),(250,'WS','Samoa'),(251,'YE','Yemen'),(252,'YT','Mayotte'),(253,'ZA','Sudáfrica'),(254,'ZM','Zambia'),(255,'ZW','Zimbabue');
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) DEFAULT NULL,
  `active` int(11) DEFAULT '0',
  `deleted` int(11) DEFAULT '0',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `pos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slides`
--

LOCK TABLES `slides` WRITE;
/*!40000 ALTER TABLE `slides` DISABLE KEYS */;
INSERT INTO `slides` VALUES (1,'000207439W.jpg',1,1,NULL,'2015-08-27',1),(2,'pero-moda-etnica.jpg',1,1,NULL,'2015-08-27',1),(3,'peru-moda.jpg',1,1,NULL,'2015-08-27',1),(4,'peru-moda(1).jpg',0,1,'2015-08-27','2015-08-27',1),(5,'Batido-Verde-Saludable-KO-La-Vida-de-Serendipity.jpg',0,1,'2015-08-27','2015-08-27',1),(6,'moda.jpg',1,0,'2015-08-27','2015-08-27',1),(7,'moda1.jpg',1,0,'2015-08-27','2015-08-27',1),(8,'perú-moda.jpg',0,1,'2015-08-27','2015-08-27',1),(9,'perúmoda.jpg',1,1,'2015-08-27','2015-08-27',1),(10,'perúmoda(1).jpg',1,0,'2015-08-27','2015-08-27',1),(11,'perúmoda(2).jpg',0,1,'2015-08-27','2015-08-27',1);
/*!40000 ALTER TABLE `slides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcat`
--

DROP TABLE IF EXISTS `subcat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `sub_nomb` varchar(100) NOT NULL,
  `sub_desc` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `deleted` int(11) DEFAULT '0',
  `img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcat`
--

LOCK TABLES `subcat` WRITE;
/*!40000 ALTER TABLE `subcat` DISABLE KEYS */;
/*!40000 ALTER TABLE `subcat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tallas`
--

DROP TABLE IF EXISTS `tallas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tallas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `talla_nomb` varchar(20) DEFAULT NULL,
  `talla_desc` varchar(20) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tallas`
--

LOCK TABLES `tallas` WRITE;
/*!40000 ALTER TABLE `tallas` DISABLE KEYS */;
INSERT INTO `tallas` VALUES (1,'M','M','2015-08-27','2015-08-27',0),(2,'Sin talla','Sin talla','2015-08-30','2015-08-30',0);
/*!40000 ALTER TABLE `tallas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `cedula` varchar(15) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '2',
  `user_deleted` int(11) NOT NULL DEFAULT '0',
  `register_cod` varchar(150) NOT NULL,
  `register_cod_active` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(255) DEFAULT NULL,
  `dir2` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `pais` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'admin','$2y$08$E6jwtZftFZMcpA8sOAQzyOdekYpNQp5WHvM.CpWdcxeaCtiEGtWBu',NULL,NULL,NULL,NULL,NULL,'2015-06-11',NULL,NULL,1,0,'',0,'moo7tpiq5AqMSeFERZzGHKWy5yMj6Snxa00ra5ZbzL54najcl4jdP9b3VHhc',NULL,NULL,NULL,15),(24,'pepito@pepito.com','$2y$08$ZNmecPxT9VGnkTp2kSk46eh8JKnlwxzpQMXDRvJ.hnQPuc3xWS0Jm','pepito','pepito@pepito.com',NULL,NULL,'2015-08-27','2015-08-27','pepito','pepito',3,0,'',0,NULL,NULL,'pepito',1,NULL),(25,'sosafelipe.89@gmail.com','$2y$08$HpeIqH.5tntXTgzp462gNusF7SdGl3F46Y9FwgdT4lhXpS730mVLq','  av. panama','sosafelipe.89@gmail.com','536378484',NULL,'2015-08-27','2015-08-30','felipe','sosa',3,0,'',0,'H4TexQoep5OU9XEEEuLNG6AJfAYeYHjNuQacsypDkVO2EqLRLwan2nrduC2f','  av. panama','maracay',4,NULL),(26,'tecnographicvenezuela@gmail.com','$2y$08$KGmaJKh0OdqGg6pK0jmLXOwsacwVFMpZVHsMF3hFe4nTsITu7avZC','av. maracay','tecnographicvenezuela@gmail.com','2344954',NULL,'2015-08-27','2015-08-27','felipe','sosa',3,0,'',0,NULL,NULL,'maracay',4,NULL),(27,'sosafelipe.09@gmail.com','$2y$08$nlkxp2oW5Tcg/rIqnmaeWecbyvpuv5nVngMZQrlybTPG9JPFuxPEq','av. maracay','sosafelipe.09@gmail.com','37739923',NULL,'2015-08-27','2015-08-27','felipe','sosa',3,0,'',0,NULL,NULL,'maracay',3,NULL),(28,'carlucho@carlucho.com','$2y$08$TIE5y.Fh/BZGMv7..OhyPO8yt5ozAnfGaFEqjc5DmBfEuPX9vo68a','cagua','carlucho@carlucho.com',NULL,NULL,'2015-08-28','2015-08-28','carlucho','carlucho',3,0,'',0,'vrHujwchSwf2uhE3q71PZojU2cJhoBhSwEQovmLKl0ZrXcBLWGRLN3kRt7JQ',NULL,'cagua',1,NULL),(29,'tecnographicvenezuel@gmail.com','$2y$08$iE5Juz5Va7V71mIt.Syy0OLIf/90tdJAHijmoS/CgtsIUxedL4P6W','panama','tecnographicvenezuel@gmail.com','098366533',NULL,'2015-08-29','2015-08-29','tecno','sosa',3,0,'',0,NULL,'venezuela','maracay',2,NULL),(30,'tcnographicvenezuel@gmail.com','$2y$08$tJsJzODPvnpfsXN51QB8aOvt1etfZ5NtajjaPAWvC.EHYhfetMSQW','panama','tcnographicvenezuel@gmail.com','9377644',NULL,'2015-08-29','2015-08-29','tecno','sosa',3,0,'',0,NULL,'venezuela','maracay',2,NULL),(31,'nijma1989@gmail.com','$2y$08$yL3I4lvIBijAHvEf.cyqy.dwU5Ujw9ug2Lv0xUAhJ8chlycPsNVbu','David','nijma1989@gmail.com','+50765503383',NULL,'2015-08-30','2015-08-30','Nijma','Shehadeh',3,0,'',0,'jBsObaQbQ8YZ6ucNtydQvH3982PcUbJ3pGzbA6NJrHVz7d9BAztUs4HYXjo2','David','Panama',4,NULL),(32,'soraia_shehadeh@hotmail.com','$2y$08$DK5uvwuiH1TeNJ2mQLu1/e/H1Yl5S3TDmqclt1GSLGwi9yEmZ8rP6','Villa Zaita','soraia_shehadeh@hotmail.com','390-1119',NULL,'2015-08-30','2015-08-30','Soraia','Shehadeh',3,0,'',0,'2wArpDWZkmC5gQiIL1lMeIoftX1xtGAV9Z9RyRRJaKPFcH2NbkTS0bdu0BM5','Ernesto Cordoba','Panamá',8,NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wish_list`
--

DROP TABLE IF EXISTS `wish_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wish_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `deleted` int(11) DEFAULT '0',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wish_list`
--

LOCK TABLES `wish_list` WRITE;
/*!40000 ALTER TABLE `wish_list` DISABLE KEYS */;
INSERT INTO `wish_list` VALUES (1,25,1,0,'2015-08-28','2015-08-28'),(2,25,4,0,'2015-08-29','2015-08-29'),(3,25,7,0,'2015-08-31','2015-08-31');
/*!40000 ALTER TABLE `wish_list` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-08-31 11:20:13
