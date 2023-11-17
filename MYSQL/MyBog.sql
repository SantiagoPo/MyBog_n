CREATE DATABASE  IF NOT EXISTS `mybog` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `mybog`;
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: mybog
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `arrendamientos`
--

DROP TABLE IF EXISTS `arrendamientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arrendamientos` (
  `Id_de_arrendamientos` int NOT NULL AUTO_INCREMENT,
  `Nombre_de_arrendamientos` varchar(30) NOT NULL,
  `Ubicacion_de_arrendamientos` varchar(50) NOT NULL,
  `Tipos_de_arrendamientos` int NOT NULL,
  `Informacion_de_arrendamientos` varchar(250) NOT NULL,
  `Id_servicio` int NOT NULL,
  `localidad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_de_arrendamientos`),
  KEY `Id_servicio` (`Id_servicio`) USING BTREE,
  KEY `Tipos_de_arrendamientos_idx` (`Tipos_de_arrendamientos`),
  CONSTRAINT `arrendamientos_ibfk_1` FOREIGN KEY (`Id_servicio`) REFERENCES `servicios` (`Id_Servicios`),
  CONSTRAINT `Tipos_de_arrendamientos` FOREIGN KEY (`Tipos_de_arrendamientos`) REFERENCES `tipos_de_arrendamientos` (`Id_de_tipos_de_arrendamientos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arrendamientos`
--

LOCK TABLES `arrendamientos` WRITE;
/*!40000 ALTER TABLE `arrendamientos` DISABLE KEYS */;
/*!40000 ALTER TABLE `arrendamientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `centros_comerciales`
--

DROP TABLE IF EXISTS `centros_comerciales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `centros_comerciales` (
  `Id_de_centros_comerciales` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_centros_comerciales` varchar(250) NOT NULL,
  `Ubicacion_de_centros_comerciales` varchar(50) NOT NULL,
  `Informacion_de_centros_comerciales` text NOT NULL,
  `Id_entretenimiento` int NOT NULL,
  `localidad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_de_centros_comerciales`),
  KEY `Id_entretenimiento` (`Id_entretenimiento`),
  CONSTRAINT `centros_comerciales_ibfk_1` FOREIGN KEY (`Id_entretenimiento`) REFERENCES `entretenimiento` (`Id_entretenimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `centros_comerciales`
--

LOCK TABLES `centros_comerciales` WRITE;
/*!40000 ALTER TABLE `centros_comerciales` DISABLE KEYS */;
INSERT INTO `centros_comerciales` VALUES (9,'Centro Comercial Andino','Carrera 11 # 82-71, Bogotá, Colombia','El Centro Comercial Andino es uno de los más exclusivos de Bogotá. Ofrece una amplia gama de tiendas de moda, restaurantes, cines y entretenimiento. Es conocido por su arquitectura moderna y su ambiente elegante.',1,'Chapinero'),(10,'Centro Comercial Unicentro','Avenida 15 # 124-30, Bogotá, Colombia','Unicentro es uno de los centros comerciales más grandes de la ciudad. Cuenta con una gran variedad de tiendas, desde moda hasta electrónica, así como restaurantes, un supermercado y un complejo de cines.',1,'Usaquén'),(11,'Centro Comercial Santa Fe','Calle 185 # 45-03, Bogotá, Colombia','Santa Fe es uno de los centros comerciales más modernos de Bogotá. Ofrece una experiencia de compra de alta gama con una amplia selección de tiendas de lujo, restaurantes gourmet, y un cine IMAX.',1,'Suba'),(12,'Centro Comercial Gran Estación',' Avenida Calle 26 # 62-47, Bogotá, Colombia','Gran Estación es un centro comercial ubicado cerca de la Terminal de Transportes de Bogotá. Ofrece una variedad de tiendas, restaurantes y actividades de entretenimiento.',1,'Teusaquillo'),(13,'Centro Comercial Titan Plaza','Avenida Boyacá # 80-94, Bogotá, Colombia','Titan Plaza es uno de los centros comerciales más grandes de Bogotá. Tiene una gran cantidad de tiendas de moda, electrónica, un supermercado y opciones gastronómicas.',1,'Engativá'),(14,'Centro Comercial Salitre Plaza','Avenida Cra. 68 # 64-50, Bogotá, Colombia','Salitre Plaza es un centro comercial familiar con tiendas de moda, un supermercado, restaurantes y una pista de patinaje sobre hielo.',1,'Engativá'),(15,'Centro Comercial Hayuelos','Avenida Calle 20 # 82-52, Bogotá, Colombia','Hayuelos es un centro comercial con una amplia oferta de tiendas, restaurantes, supermercado y un complejo de cines.',1,'Fontibón'),(16,'Centro Comercial Bulevar Niza','Calle 127 # 58-04, Bogotá, Colombia','Bulevar Niza es conocido por su diseño abierto y su ambiente fresco. Ofrece una variedad de tiendas, restaurantes y actividades culturales.',1,'Suba'),(17,'Centro Comercial Atlantis Plaza','Carrera 15 # 81-19, Bogotá, Colombia',' Atlantis Plaza es un centro comercial de lujo que alberga tiendas exclusivas, restaurantes gourmet y un ambiente sofisticado.',1,'Chapinero'),(18,'Centro Comercial Multiplaza La Felicidad','Calle 13 # 50-80, Bogotá, Colombia','Multiplaza La Felicidad es un centro comercial que ofrece una amplia variedad de tiendas, opciones gastronómicas y actividades para toda la familia.',1,'Kennedy');
/*!40000 ALTER TABLE `centros_comerciales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuentas`
--

DROP TABLE IF EXISTS `cuentas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuentas` (
  `Id_Usuario` int NOT NULL AUTO_INCREMENT,
  `Nombres` varchar(30) NOT NULL,
  `Apellidos` varchar(30) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Id_servicios` int NOT NULL,
  PRIMARY KEY (`Id_Usuario`),
  KEY `Id_servicios` (`Id_servicios`),
  CONSTRAINT `cuentas_ibfk_1` FOREIGN KEY (`Id_servicios`) REFERENCES `servicios` (`Id_Servicios`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuentas`
--

LOCK TABLES `cuentas` WRITE;
/*!40000 ALTER TABLE `cuentas` DISABLE KEYS */;
INSERT INTO `cuentas` VALUES (12,'Jose Antonio','Montealegre','santi01032@outlook.com','$2y$10$9LNqlmWGc3IY4k0ALbFST.NtvsDHbN0lY7jaZ5cLSf9QWdPoNaFgm',1),(13,'Jose Antonio','Montealegre','sa@outlook.com','$2y$10$BixBpA9e14TMR/2.pTvGyud0MvzYTcyzLZ1bS7ytr0hdOQDjun6I.',1),(15,'Jose Antonio','Montealegre','j.polanco1975@hotmail.com','$2y$10$yUkAet1JKI52zvX45BybueX89j2G9EXhb1hU8DVUWM4MF9cMMKip.',1),(16,'fabian','stiven','carvajalpitta@gmail.com','$2y$10$06PUCkA4LEriAIipUgJvwOkMxuXyoLTdKr1n/0l6blLeJ9WKdUbFO',1),(17,'Nico','Queso','','$2y$10$LoPP6dOrkceL92aurU//peBzZHBk7k9LZso4nHMkYK131cnNVNMxO',1),(18,'pedro','martin','santi1@gmail.com','$2y$10$uRbIsfzcXmZcFR4kcSqVn.iTqaOODpomMq4L85kLSbgI2rzsMc4zi',1),(19,'lol','pol','pol123@gmail.com','$2y$10$mSJWoCgzcv/4M3.xN6R.Zu.dQEco/6eV3o1q.9NGtX9Lx5ytTx9fq',1),(20,'Nicolás','Barón Ortiz','nbaronortiz4@gmail.com','$2y$10$BQQ39JsJavuFSY2X0fFLIe9Ixv2VPr9.0OFmzMFoNnoaZkmLvOj1a',1);
/*!40000 ALTER TABLE `cuentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discotecas`
--

DROP TABLE IF EXISTS `discotecas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `discotecas` (
  `Id_de_discotecas` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_discotecas` varchar(30) NOT NULL,
  `Ubicacion_de_discotecas` varchar(50) NOT NULL,
  `Informacion_de_discotecas` varchar(250) NOT NULL,
  `Id_entretenimiento` int NOT NULL,
  `localidad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_de_discotecas`),
  KEY `Id_de_entretenimiento` (`Id_entretenimiento`),
  KEY `Id_entretenimiento` (`Id_entretenimiento`),
  CONSTRAINT `discotecas_ibfk_1` FOREIGN KEY (`Id_entretenimiento`) REFERENCES `entretenimiento` (`Id_entretenimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discotecas`
--

LOCK TABLES `discotecas` WRITE;
/*!40000 ALTER TABLE `discotecas` DISABLE KEYS */;
/*!40000 ALTER TABLE `discotecas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entretenimiento`
--

DROP TABLE IF EXISTS `entretenimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entretenimiento` (
  `Id_entretenimiento` int NOT NULL AUTO_INCREMENT,
  `Nombre_del_entretenimiento` varchar(30) NOT NULL,
  `Id_Servicios` int NOT NULL,
  PRIMARY KEY (`Id_entretenimiento`),
  KEY `Id_Categorias` (`Id_Servicios`),
  CONSTRAINT `entretenimiento_ibfk_1` FOREIGN KEY (`Id_Servicios`) REFERENCES `servicios` (`Id_Servicios`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entretenimiento`
--

LOCK TABLES `entretenimiento` WRITE;
/*!40000 ALTER TABLE `entretenimiento` DISABLE KEYS */;
INSERT INTO `entretenimiento` VALUES (1,'Entreteniemiento_general ',4);
/*!40000 ALTER TABLE `entretenimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadios`
--

DROP TABLE IF EXISTS `estadios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estadios` (
  `Id_estadios` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_estadios` varchar(30) NOT NULL,
  `Ubicacion_de_estadios` varchar(50) NOT NULL,
  `Tipos_de_estadios` varchar(30) NOT NULL,
  `Informacion_de_estadios` varchar(250) NOT NULL,
  `Id_entreteniemiento` int NOT NULL,
  `localidad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_estadios`),
  KEY `Id_entreteniemiento` (`Id_entreteniemiento`),
  CONSTRAINT `estadios_ibfk_1` FOREIGN KEY (`Id_entreteniemiento`) REFERENCES `entretenimiento` (`Id_entretenimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadios`
--

LOCK TABLES `estadios` WRITE;
/*!40000 ALTER TABLE `estadios` DISABLE KEYS */;
/*!40000 ALTER TABLE `estadios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `start` date NOT NULL,
  `color` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hospedaje`
--

DROP TABLE IF EXISTS `hospedaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hospedaje` (
  `Id_de_hospedaje` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_hospedajes` varchar(30) NOT NULL,
  `Ubicacion_de_hospedajes` varchar(50) NOT NULL,
  `Tipos_de_hospedaje` int NOT NULL,
  `Informacion_de_hospedajes` text NOT NULL,
  `Id_Categorias` int NOT NULL,
  `localidad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_de_hospedaje`),
  KEY `Id_Categorias` (`Id_Categorias`),
  KEY `Tipos_de_hospedaje_idx` (`Tipos_de_hospedaje`),
  CONSTRAINT `hospedaje_ibfk_1` FOREIGN KEY (`Id_Categorias`) REFERENCES `servicios` (`Id_Servicios`),
  CONSTRAINT `Tipos_de_hospedaje` FOREIGN KEY (`Tipos_de_hospedaje`) REFERENCES `tipos_de_hospedajes` (`Id_de_tipos_de_hospedajes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hospedaje`
--

LOCK TABLES `hospedaje` WRITE;
/*!40000 ALTER TABLE `hospedaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `hospedaje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lugares_historicos`
--

DROP TABLE IF EXISTS `lugares_historicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lugares_historicos` (
  `Id_lugares_historicos` int NOT NULL AUTO_INCREMENT,
  `Nombre_de_lugares_historicos` varchar(30) NOT NULL,
  `Ubicacion_de_lugares_historicos` varchar(50) NOT NULL,
  `Tipos_de_lugares_historicos` int NOT NULL,
  `Informacion_de_lugares_historicos` varchar(250) NOT NULL,
  `Id_entreteniemiento` int NOT NULL,
  `localidad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_lugares_historicos`),
  KEY `Id_entreteniemiento` (`Id_entreteniemiento`),
  KEY `Tipos_lugares_historicos_idx` (`Tipos_de_lugares_historicos`),
  CONSTRAINT `lugares_historicos_ibfk_1` FOREIGN KEY (`Id_entreteniemiento`) REFERENCES `entretenimiento` (`Id_entretenimiento`),
  CONSTRAINT `Tipos_lugares_historicos` FOREIGN KEY (`Tipos_de_lugares_historicos`) REFERENCES `tipos_de_lugares_historicos` (`Id_de_tipos_lugares_historicos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lugares_historicos`
--

LOCK TABLES `lugares_historicos` WRITE;
/*!40000 ALTER TABLE `lugares_historicos` DISABLE KEYS */;
/*!40000 ALTER TABLE `lugares_historicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parques`
--

DROP TABLE IF EXISTS `parques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parques` (
  `Id_de_parques` int NOT NULL AUTO_INCREMENT,
  `Nombre_de_parques` varchar(250) NOT NULL,
  `Ubicacion_de_parques` varchar(250) NOT NULL,
  `Tipos_de_parques` int NOT NULL,
  `Informacion_de_parques` text NOT NULL,
  `Id_entreteniemiento` int NOT NULL,
  `localidad` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id_de_parques`),
  KEY `Id_entreteniemiento` (`Id_entreteniemiento`),
  KEY `tipos_de_parques_idx` (`Tipos_de_parques`),
  CONSTRAINT `parques_ibfk_1` FOREIGN KEY (`Id_entreteniemiento`) REFERENCES `entretenimiento` (`Id_entretenimiento`),
  CONSTRAINT `tipos_de_parques` FOREIGN KEY (`Tipos_de_parques`) REFERENCES `tipos_de_parques` (`Id_de_tipos_de_parques`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parques`
--

LOCK TABLES `parques` WRITE;
/*!40000 ALTER TABLE `parques` DISABLE KEYS */;
INSERT INTO `parques` VALUES (1,'Mundo Aventura','Cra. 71d #1-14 Sur, Bogotá',1,'Mundo Aventura es uno de los parques de atracciones más populares de Bogotá y ofrece una amplia variedad de emocionantes juegos mecánicos y atracciones para visitantes de todas las edades. El parque es conocido por su ambiente festivo y su capacidad para proporcionar diversión y entretenimiento a toda la familia. Horario de Operación: El horario de Mundo Aventura puede variar según la temporada, por lo que se recomienda verificar los horarios actualizados en el sitio web oficial antes de planificar tu visita.',1,'Kennedy'),(2,'Salitre Magico',' Avenida El Dorado No. 68D-58, Bogotá',1,'El Parque de Diversiones Salitre Mágico, ubicado en la ciudad de Bogotá, Colombia, ofrece una experiencia emocionante para visitantes de todas las edades. Aquí tienes información sobre horarios y precios:',1,'Engativa'),(3,'Parque Simón Bolívar','Carrera 60 # 63 - 27, Bogotá, Colombia',5,'El Parque Simón Bolívar es uno de los parques más grandes y emblemáticos de Bogotá. Con una extensión de más de 400 hectáreas, este parque ofrece una gran variedad de espacios verdes, lagos, zonas deportivas y áreas de entretenimiento. Es un lugar ideal para relajarse, hacer ejercicio, disfrutar de actividades al aire libre y pasar tiempo en familia.',1,'Engativa'),(4,'Parque Nacional Enrique Olaya Herrera (Parque Nacional)','Carrera 7 # 34-45, Bogotá, Colombia',5,'El Parque Nacional Enrique Olaya Herrera, comúnmente conocido como Parque Nacional, es un espacio público icónico en el centro de Bogotá. Este parque es famoso por su fuente central, su monumento al presidente Enrique Olaya Herrera y su ambiente tranquilo en medio de la ciudad. Es un lugar ideal para dar un paseo, relajarse y disfrutar de la naturaleza en el corazón de la ciudad.',1,'Santa fe'),(5,'Parque Metropolitano El Virrey (Parque El Virrey)','Carrera 15 con Calle 88, Barrio El Virrey, Bogotá, Colombia',5,'El Parque El Virrey es uno de los parques urbanos más emblemáticos de Bogotá. Este parque se encuentra en el corazón de la ciudad y ofrece a los visitantes un lugar ideal para hacer ejercicio, pasear, disfrutar del aire libre y relajarse. Es un espacio verde muy querido por los residentes y visitantes.',1,'Chapinero'),(6,'Parque de los Novios (Parque El Lago)','Carrera 4 con Calle 63, Barrio Chapinero, Bogotá, Colombia',5,'El Parque de los Novios, conocido también como Parque El Lago, es un espacio público icónico en el corazón de la localidad de Chapinero en Bogotá. Este parque es especialmente conocido por su hermoso lago artificial y su entorno tranquilo que ofrece a los visitantes un lugar ideal para relajarse y disfrutar de la naturaleza en medio de la ciudad.',1,'Chapinero'),(7,'Parque El Tunal','Carrera 24C #48A-67 Sur, Bogotá, Colombia',5,'El Parque El Tunal es un espacio verde en el sur de Bogotá que ofrece una variedad de actividades al aire libre para toda la familia. A pesar de no ser tan conocido como otros parques de la ciudad, es un lugar agradable para visitar con bebés debido a su ambiente tranquilo y áreas de juego seguras.',1,'Tunjuelito'),(8,'Parque de la 93','Carrera 11 #93-46, Bogotá, Colombia',5,'El Parque de la 93 es un parque urbano que se ha convertido en uno de los lugares más populares de Bogotá para la recreación y el entretenimiento. El parque está ubicado en la zona norte de la ciudad y ofrece una amplia gama de actividades y opciones gastronómicas.',1,'Chapinero'),(9,'Parque El Virrey','Carrera 15 con Calle 88, Bogotá, Colombia',5,'El Parque El Virrey es un parque urbano ubicado en el corazón de Bogotá. Es un lugar muy frecuentado por los habitantes locales y visitantes que desean disfrutar de actividades al aire libre, hacer ejercicio o simplemente relajarse en un entorno verde en medio de la ciudad.',1,'Chapinero'),(10,'Parque de la Independencia (Parque Nacional)','Carrera 7 con Calle 26, Bogotá, Colombia',5,'El Parque de la Independencia, también conocido como Parque Nacional, es uno de los parques más emblemáticos de Bogotá. Este parque tiene una gran importancia histórica y cultural para la ciudad y el país. Fue inaugurado en 1910 para conmemorar el centenario de la independencia de Colombia.',1,'Santa Fe');
/*!40000 ALTER TABLE `parques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puestos_de_alimentos`
--

DROP TABLE IF EXISTS `puestos_de_alimentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `puestos_de_alimentos` (
  `Id_Puestos_de_alimentos` int NOT NULL AUTO_INCREMENT,
  `Tipos_de_puestos_de_alimentos` int NOT NULL,
  `Nombres_de_puestos_de_alimentos` varchar(30) NOT NULL,
  `Ubicacion_de_puestos_de_alimentos` varchar(30) NOT NULL,
  `Informacion_de_puestos_de_alimentos` varchar(250) NOT NULL,
  `Id_Categorias` int NOT NULL,
  `localidad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_Puestos_de_alimentos`),
  KEY `Id_Categorias` (`Id_Categorias`),
  KEY `tipos_de_puestos_alimentos_idx` (`Tipos_de_puestos_de_alimentos`),
  CONSTRAINT `puestos_de_alimentos_ibfk_1` FOREIGN KEY (`Id_Categorias`) REFERENCES `servicios` (`Id_Servicios`),
  CONSTRAINT `Tipos_de_puestos_de_alimentos` FOREIGN KEY (`Tipos_de_puestos_de_alimentos`) REFERENCES `tipos_de_puestos_de_alimentos` (`Id_tipos_de_puestos_de_alimentos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puestos_de_alimentos`
--

LOCK TABLES `puestos_de_alimentos` WRITE;
/*!40000 ALTER TABLE `puestos_de_alimentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `puestos_de_alimentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro_de_establecimiento`
--

DROP TABLE IF EXISTS `registro_de_establecimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registro_de_establecimiento` (
  `Id_registro` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_categorias` varchar(20) NOT NULL,
  `Nombre_del_establecimiento` varchar(50) NOT NULL,
  `Direccion_de_establecimiento` varchar(50) NOT NULL,
  `Id_Usuario` int NOT NULL,
  `Telefono` int DEFAULT NULL,
  `Informacion_adicional` varchar(250) DEFAULT NULL,
  `Nit` varchar(45) DEFAULT NULL,
  `localidad` varchar(45) DEFAULT NULL,
  `id_tipo_de_establecimiento` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_registro`),
  KEY `Id_usuario_idx` (`Id_Usuario`),
  CONSTRAINT `Id_usuario` FOREIGN KEY (`Id_Usuario`) REFERENCES `cuentas` (`Id_Usuario`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro_de_establecimiento`
--

LOCK TABLES `registro_de_establecimiento` WRITE;
/*!40000 ALTER TABLE `registro_de_establecimiento` DISABLE KEYS */;
INSERT INTO `registro_de_establecimiento` VALUES (5,'restaurante','Manulita','calle 56',18,318746,'sdf','987456','Chapinero','restaurante'),(6,'restaurante','Manulita','calle 56',18,318746,'sdf','987456','Chapinero','restaurante'),(7,'hotel','Manulita','calle 56',18,318746,'dsfd','987456','Chapinero','hotel'),(8,'restaurante','fgh','ftgh',18,5546,'dfg','987456','Chapinero','restaurante'),(9,'restaurante','assAWS','calle 48',16,12312321,'sadqdwqed','2133213213','Chapinero','restaurante'),(10,'restaurante','wqqweeqw','1221312',16,21323232,'eqweqwe','eqweqweqw','Chapinero','restaurante'),(11,'restaurante','qewqewq','fsfdsfsd',16,31231,'ewqewqeqw','3123123','Chapinero','restaurante'),(12,'restaurante','sdasdadas','asdasda',16,213233,'weqeqwe','2131','Chapinero','restaurante'),(13,'restaurante','wasdad','wqewqeewq',16,213312,'qweewqeqweqw','312321312','Chapinero','restaurante'),(14,'restaurante','ewqewqewq','wqewqe',16,2133213,'wqew','weqewqeq','Santa Fe','restaurante'),(15,'restaurante','dsadsada','1232131',16,123133,'qweqweqe','213131','Santa Fe','restaurante'),(16,'restaurante','2313213','wqeqewq',16,1232131,'3213123','21312321','Santa Fe','restaurante'),(17,'restaurante','qweqewq','213312',16,321312,'31231','213313','Chapinero','restaurante');
/*!40000 ALTER TABLE `registro_de_establecimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salud`
--

DROP TABLE IF EXISTS `salud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `salud` (
  `Id_Centros_de_salud` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_centros_de_salud` varchar(30) NOT NULL,
  `Ubicacion_de_centros_de_salud` varchar(50) NOT NULL,
  `Informacion_de_centros_de_salud` varchar(250) NOT NULL,
  `Id_Categorias` int NOT NULL,
  `localidad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_Centros_de_salud`),
  KEY `Id_Categorias` (`Id_Categorias`),
  CONSTRAINT `salud_ibfk_1` FOREIGN KEY (`Id_Categorias`) REFERENCES `servicios` (`Id_Servicios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salud`
--

LOCK TABLES `salud` WRITE;
/*!40000 ALTER TABLE `salud` DISABLE KEYS */;
/*!40000 ALTER TABLE `salud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule_list`
--

DROP TABLE IF EXISTS `schedule_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `schedule_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL,
  `Id_usuario_for` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Id_usuario_for_idx` (`Id_usuario_for`),
  CONSTRAINT `Id_usuario_for` FOREIGN KEY (`Id_usuario_for`) REFERENCES `cuentas` (`Id_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule_list`
--

LOCK TABLES `schedule_list` WRITE;
/*!40000 ALTER TABLE `schedule_list` DISABLE KEYS */;
INSERT INTO `schedule_list` VALUES (52,'asda','qwewqewqe','2023-10-02 01:26:00','2023-10-02 01:26:00',16),(56,'awsdsad','asddsadsa','2023-10-03 03:23:00','2023-10-10 03:23:00',16);
/*!40000 ALTER TABLE `schedule_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicios`
--

DROP TABLE IF EXISTS `servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `servicios` (
  `Id_Servicios` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_servicios` varchar(20) NOT NULL,
  PRIMARY KEY (`Id_Servicios`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicios`
--

LOCK TABLES `servicios` WRITE;
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` VALUES (1,'Usuario'),(2,'Puestos_de_alimentos'),(3,'Hospedajes'),(4,'Entretenimiento'),(5,'Hospitales');
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_de_arrendamientos`
--

DROP TABLE IF EXISTS `tipos_de_arrendamientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipos_de_arrendamientos` (
  `Id_de_tipos_de_arrendamientos` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_tipo_de_arrendamientos` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_de_tipos_de_arrendamientos`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_de_arrendamientos`
--

LOCK TABLES `tipos_de_arrendamientos` WRITE;
/*!40000 ALTER TABLE `tipos_de_arrendamientos` DISABLE KEYS */;
INSERT INTO `tipos_de_arrendamientos` VALUES (1,'Arrendamiento_de_parqueaderos'),(2,'Arrendamiento_de_casa'),(3,'Arrendamiento_de_finca'),(4,'Arrendamiento_de_apartamentos');
/*!40000 ALTER TABLE `tipos_de_arrendamientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_de_hospedajes`
--

DROP TABLE IF EXISTS `tipos_de_hospedajes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipos_de_hospedajes` (
  `Id_de_tipos_de_hospedajes` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_tipos_de_hospedajes` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_de_tipos_de_hospedajes`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_de_hospedajes`
--

LOCK TABLES `tipos_de_hospedajes` WRITE;
/*!40000 ALTER TABLE `tipos_de_hospedajes` DISABLE KEYS */;
INSERT INTO `tipos_de_hospedajes` VALUES (1,'Casa'),(2,'Apartementos'),(3,'Hoteles'),(4,'Fincas'),(5,'Hostales');
/*!40000 ALTER TABLE `tipos_de_hospedajes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_de_lugares_historicos`
--

DROP TABLE IF EXISTS `tipos_de_lugares_historicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipos_de_lugares_historicos` (
  `Id_de_tipos_lugares_historicos` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_tipos_de_lugares_historicos` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_de_tipos_lugares_historicos`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_de_lugares_historicos`
--

LOCK TABLES `tipos_de_lugares_historicos` WRITE;
/*!40000 ALTER TABLE `tipos_de_lugares_historicos` DISABLE KEYS */;
INSERT INTO `tipos_de_lugares_historicos` VALUES (1,'Museos'),(2,'Jardines_Botanicos'),(3,'Capitolio'),(4,'Teatro'),(5,'Iglesias');
/*!40000 ALTER TABLE `tipos_de_lugares_historicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_de_parques`
--

DROP TABLE IF EXISTS `tipos_de_parques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipos_de_parques` (
  `Id_de_tipos_de_parques` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_tipos_de_parques` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_de_tipos_de_parques`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_de_parques`
--

LOCK TABLES `tipos_de_parques` WRITE;
/*!40000 ALTER TABLE `tipos_de_parques` DISABLE KEYS */;
INSERT INTO `tipos_de_parques` VALUES (1,'Mecanicos'),(2,'Acuaticos'),(3,'Parque infantil'),(4,'Parque para bebés'),(5,'Parque urbano'),(6,'Parque temático');
/*!40000 ALTER TABLE `tipos_de_parques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_de_puestos_de_alimentos`
--

DROP TABLE IF EXISTS `tipos_de_puestos_de_alimentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipos_de_puestos_de_alimentos` (
  `Id_tipos_de_puestos_de_alimentos` int NOT NULL AUTO_INCREMENT,
  `Nombres_de_tipos_de_puestos_de_alimentos` varchar(30) NOT NULL,
  PRIMARY KEY (`Id_tipos_de_puestos_de_alimentos`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_de_puestos_de_alimentos`
--

LOCK TABLES `tipos_de_puestos_de_alimentos` WRITE;
/*!40000 ALTER TABLE `tipos_de_puestos_de_alimentos` DISABLE KEYS */;
INSERT INTO `tipos_de_puestos_de_alimentos` VALUES (1,'Restaurantes'),(2,'Comedores'),(3,'Puestos callejeros');
/*!40000 ALTER TABLE `tipos_de_puestos_de_alimentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `verification_codes`
--

DROP TABLE IF EXISTS `verification_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `verification_codes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `cuentas` (`Id_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `verification_codes`
--

LOCK TABLES `verification_codes` WRITE;
/*!40000 ALTER TABLE `verification_codes` DISABLE KEYS */;
INSERT INTO `verification_codes` VALUES (45,16,'812249');
/*!40000 ALTER TABLE `verification_codes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-07  4:56:30
