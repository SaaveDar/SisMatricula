-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: localhost    Database: bdacademicov3
-- ------------------------------------------------------
-- Server version	9.0.1

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
-- Table structure for table `estadodeuda`
--

DROP TABLE IF EXISTS `estadodeuda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estadodeuda` (
  `id_estado_deuda` int NOT NULL AUTO_INCREMENT,
  `id_estudiante_estado_deuda` int NOT NULL,
  `id_tupa` int NOT NULL,
  `estado` int NOT NULL,
  `fechagenerado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_estado_deuda`,`id_estudiante_estado_deuda`,`id_tupa`),
  KEY `id_estudiante_estado_pago` (`id_estudiante_estado_deuda`),
  KEY `id_pago_estado_pago` (`id_tupa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadodeuda`
--

LOCK TABLES `estadodeuda` WRITE;
/*!40000 ALTER TABLE `estadodeuda` DISABLE KEYS */;
INSERT INTO `estadodeuda` VALUES (1,4,6,1,'2024-11-03 21:53:14'),(2,7,6,1,'2024-11-04 21:29:58');
/*!40000 ALTER TABLE `estadodeuda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estudiante` (
  `id_estudiante` int NOT NULL AUTO_INCREMENT,
  `id_postulante_estudiante` int NOT NULL,
  `id_periodo_lectivo_estudiante` int NOT NULL,
  `id_programa_estudios_estudiante` int NOT NULL,
  `estado` int NOT NULL,
  `fecha_registro_estudiante` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_estudiante`),
  KEY `id_persona_estudiante` (`id_postulante_estudiante`),
  KEY `id_periodo_lectivo_estudiante` (`id_periodo_lectivo_estudiante`),
  KEY `id_programa_estudios_estudiante` (`id_programa_estudios_estudiante`),
  CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`id_postulante_estudiante`) REFERENCES `persona` (`id_persona`),
  CONSTRAINT `estudiante_ibfk_2` FOREIGN KEY (`id_periodo_lectivo_estudiante`) REFERENCES `periodolectivo` (`id_periodo_lectivo`),
  CONSTRAINT `estudiante_ibfk_3` FOREIGN KEY (`id_programa_estudios_estudiante`) REFERENCES `programaestudios` (`id_programa`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante`
--

LOCK TABLES `estudiante` WRITE;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` VALUES (1,1,2,3,1,'2024-10-22 07:56:33'),(2,4,3,2,1,'2024-10-22 08:46:04'),(3,5,3,3,1,'2024-10-22 09:17:05'),(4,6,1,2,1,'2024-10-22 21:23:37'),(7,7,2,1,1,'2024-10-27 15:51:19'),(8,7,2,2,1,'2024-11-01 22:48:50');
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historialmatriculas`
--

DROP TABLE IF EXISTS `historialmatriculas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historialmatriculas` (
  `id_hismatricula_hismatricula` int NOT NULL AUTO_INCREMENT,
  `id_estudiante_hismatricula` int NOT NULL,
  `id_planestudios_hismatricula` int NOT NULL,
  `id_periodoacademico_hismatricula` int NOT NULL,
  `id_periodolectivo` int NOT NULL,
  `id_programa_estudio` int NOT NULL,
  `periodoacademico_hismatricula` varchar(20) NOT NULL,
  `periodolectivo_hismatricula` int NOT NULL,
  `estado` int NOT NULL,
  `fechamatricula` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_hismatricula_hismatricula`,`id_estudiante_hismatricula`,`id_planestudios_hismatricula`,`id_periodoacademico_hismatricula`,`id_periodolectivo`,`id_programa_estudio`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historialmatriculas`
--

LOCK TABLES `historialmatriculas` WRITE;
/*!40000 ALTER TABLE `historialmatriculas` DISABLE KEYS */;
INSERT INTO `historialmatriculas` VALUES (1,7,1,2,0,1,'I',202410,0,NULL),(2,20,3,1,1,2,'II',202410,1,NULL),(3,21,1,6,2,2,'III',202420,1,NULL),(5,7,1,5,2,1,'V',202420,0,NULL),(6,7,1,2,2,1,'II',202420,0,NULL),(21,4,6,1,3,2,'I',202510,1,'2024-11-03 21:53:14'),(22,7,1,3,3,1,'III',202510,1,'2024-11-04 21:29:58');
/*!40000 ALTER TABLE `historialmatriculas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matricula`
--

DROP TABLE IF EXISTS `matricula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `matricula` (
  `id_matricula` int NOT NULL AUTO_INCREMENT,
  `id_hismatri` int NOT NULL,
  `id_estudiante_matricula` int NOT NULL,
  `id_unidad_didactica_matricula` int NOT NULL,
  `nombre_ud` varchar(200) COLLATE utf8mb3_spanish_ci NOT NULL,
  `estado` int NOT NULL,
  `fecha_matricula` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_matricula`,`id_hismatri`,`id_estudiante_matricula`,`id_unidad_didactica_matricula`),
  KEY `id_estudiante_matricula` (`id_estudiante_matricula`),
  KEY `id_unidad_didactica_matricula` (`id_unidad_didactica_matricula`),
  CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`id_estudiante_matricula`) REFERENCES `estudiante` (`id_estudiante`),
  CONSTRAINT `matricula_ibfk_6` FOREIGN KEY (`id_unidad_didactica_matricula`) REFERENCES `unidaddidactica` (`id_unidad`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matricula`
--

LOCK TABLES `matricula` WRITE;
/*!40000 ALTER TABLE `matricula` DISABLE KEYS */;
INSERT INTO `matricula` VALUES (1,6,7,4,'LOGICA COMPUTACIONAL',1,'2024-11-03 23:46:11');
/*!40000 ALTER TABLE `matricula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matricula2`
--

DROP TABLE IF EXISTS `matricula2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `matricula2` (
  `id_matricula` int NOT NULL AUTO_INCREMENT,
  `id_estudiante_matricula` int NOT NULL,
  `id_periodo_lectivo_matricula` int NOT NULL,
  `id_periodo_academico_matricula` int NOT NULL,
  `id_programa_matricula` int NOT NULL,
  `id_plan_matricula` int NOT NULL,
  `id_unidad_didactica_matricula` int NOT NULL,
  `id_pago_matricula` int NOT NULL,
  `estado` int NOT NULL,
  `fecha_matricula` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_matricula`,`id_estudiante_matricula`,`id_periodo_lectivo_matricula`,`id_periodo_academico_matricula`,`id_programa_matricula`,`id_plan_matricula`,`id_unidad_didactica_matricula`,`id_pago_matricula`),
  KEY `id_estudiante_matricula` (`id_estudiante_matricula`),
  KEY `id_periodo_lectivo_matricula` (`id_periodo_lectivo_matricula`),
  KEY `id_periodo_academico_matricula` (`id_periodo_academico_matricula`),
  KEY `id_programa_matricula` (`id_programa_matricula`),
  KEY `id_plan_matricula` (`id_plan_matricula`),
  KEY `id_unidad_didactica_matricula` (`id_unidad_didactica_matricula`),
  KEY `id_pago_matricula` (`id_pago_matricula`),
  CONSTRAINT `matricula2_ibfk_1` FOREIGN KEY (`id_estudiante_matricula`) REFERENCES `estudiante` (`id_estudiante`),
  CONSTRAINT `matricula2_ibfk_2` FOREIGN KEY (`id_periodo_lectivo_matricula`) REFERENCES `periodolectivo` (`id_periodo_lectivo`),
  CONSTRAINT `matricula2_ibfk_3` FOREIGN KEY (`id_periodo_academico_matricula`) REFERENCES `periodoacademico` (`id_periodo_academico`),
  CONSTRAINT `matricula2_ibfk_4` FOREIGN KEY (`id_programa_matricula`) REFERENCES `programaestudios` (`id_programa`),
  CONSTRAINT `matricula2_ibfk_5` FOREIGN KEY (`id_plan_matricula`) REFERENCES `planestudios` (`id_plan`),
  CONSTRAINT `matricula2_ibfk_6` FOREIGN KEY (`id_unidad_didactica_matricula`) REFERENCES `unidaddidactica` (`id_unidad`),
  CONSTRAINT `matricula2_ibfk_7` FOREIGN KEY (`id_pago_matricula`) REFERENCES `pago` (`id_pago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matricula2`
--

LOCK TABLES `matricula2` WRITE;
/*!40000 ALTER TABLE `matricula2` DISABLE KEYS */;
/*!40000 ALTER TABLE `matricula2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pago`
--

DROP TABLE IF EXISTS `pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pago` (
  `id_pago` int NOT NULL AUTO_INCREMENT,
  `id_estudiante_pago` int DEFAULT NULL,
  `id_tupa_pago` int DEFAULT NULL,
  `concepto` varchar(100) COLLATE utf8mb3_spanish_ci NOT NULL,
  `monto_pago` double DEFAULT NULL,
  `modalidad_pago` varchar(20) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `numero_operacion_pago` varchar(20) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `id_periodo_lectivo_pago` int DEFAULT NULL,
  `fecha_pago` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pago`),
  KEY `id_tupa_pago` (`id_tupa_pago`),
  KEY `id_estudiante_pago` (`id_estudiante_pago`),
  KEY `id_periodo_lectivo_pago` (`id_periodo_lectivo_pago`),
  CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`id_tupa_pago`) REFERENCES `tupa` (`id_tupa`),
  CONSTRAINT `pago_ibfk_2` FOREIGN KEY (`id_estudiante_pago`) REFERENCES `estudiante` (`id_estudiante`),
  CONSTRAINT `pago_ibfk_3` FOREIGN KEY (`id_periodo_lectivo_pago`) REFERENCES `periodolectivo` (`id_periodo_lectivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago`
--

LOCK TABLES `pago` WRITE;
/*!40000 ALTER TABLE `pago` DISABLE KEYS */;
/*!40000 ALTER TABLE `pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periodoacademico`
--

DROP TABLE IF EXISTS `periodoacademico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `periodoacademico` (
  `id_periodo_academico` int NOT NULL AUTO_INCREMENT,
  `nombre_periodo` varchar(10) COLLATE utf8mb3_spanish_ci NOT NULL,
  `ciclo` int NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_periodo_academico`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodoacademico`
--

LOCK TABLES `periodoacademico` WRITE;
/*!40000 ALTER TABLE `periodoacademico` DISABLE KEYS */;
INSERT INTO `periodoacademico` VALUES (1,'I',1,1),(2,'II',2,1),(3,'III',3,1),(4,'IV',4,1),(5,'V',5,1),(6,'VI',6,1);
/*!40000 ALTER TABLE `periodoacademico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periodolectivo`
--

DROP TABLE IF EXISTS `periodolectivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `periodolectivo` (
  `id_periodo_lectivo` int NOT NULL AUTO_INCREMENT,
  `nombre_periodo` varchar(10) COLLATE utf8mb3_spanish_ci NOT NULL,
  `numero_periodo` int NOT NULL,
  `fechainicio` datetime DEFAULT NULL,
  `fechafinal` datetime DEFAULT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_periodo_lectivo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodolectivo`
--

LOCK TABLES `periodolectivo` WRITE;
/*!40000 ALTER TABLE `periodolectivo` DISABLE KEYS */;
INSERT INTO `periodolectivo` VALUES (1,'2024-I',202410,NULL,NULL,0),(2,'2024-II',202420,NULL,NULL,0),(3,'2025-I',202510,NULL,NULL,1),(4,'2025-II',202520,NULL,NULL,0),(6,'2026-I',202610,NULL,NULL,0),(7,'2026-II',202620,NULL,NULL,0),(8,'2027-I',202710,NULL,NULL,0);
/*!40000 ALTER TABLE `periodolectivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persona` (
  `id_persona` int NOT NULL AUTO_INCREMENT,
  `tipo_documento_identidad_persona` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL,
  `nro_documento_persona` int NOT NULL,
  `primer_nombre_persona` varchar(30) COLLATE utf8mb3_spanish_ci NOT NULL,
  `segundo_nombre_persona` varchar(30) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `tercer_nombre_persona` varchar(30) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `primer_apellido_persona` varchar(30) COLLATE utf8mb3_spanish_ci NOT NULL,
  `segundo_apellido_persona` varchar(30) COLLATE utf8mb3_spanish_ci NOT NULL,
  `sexo_persona` char(1) COLLATE utf8mb3_spanish_ci NOT NULL,
  `fecha_nacimiento_persona` date NOT NULL,
  `celular_persona` int NOT NULL,
  `correo_persona` varchar(100) COLLATE utf8mb3_spanish_ci NOT NULL,
  `direccion_persona` varchar(100) COLLATE utf8mb3_spanish_ci NOT NULL,
  `fecha_registro_persona` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_persona`),
  UNIQUE KEY `nro_documento_persona` (`nro_documento_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,'',43001122,'Carlos','Luis',NULL,'Rivera','Gonzales','F','1986-01-07',999526333,'crivera@gmail.com','Calle Los Geranios 258','2024-10-20 07:57:14'),(2,'DNI',40225522,'Carlos','Luis','','Silva','Arce','M','2009-01-29',999985895,'carlos@gmail.com','','2024-10-20 07:57:14'),(3,'DNI',71228922,'CIELO','LIZ','','CERNA','PONCE','F','2011-07-07',999321654,'cielo@gmail.com','Av. Torres 456','2024-10-20 09:00:14'),(4,'DNI',77820011,'LIAM','MANUEL','ELIAS','TELLO','PERALTA','F','2004-02-06',985222000,'LIAM@GMAIL.COM','SAN ANDRES 4TA ETAPA MZ A45 LOTE 3','2024-10-20 09:31:21'),(5,'DNI',41425522,'DIANA','LUZ','CELESTE','JUAREZ','VILLAR','F','2008-02-01',999555222,'DIANA@GMAIL.COM','PSJ CORAL 789','2024-10-20 09:50:27'),(6,'CARNET EXT.',951620789,'CESAR','SANTA','MARIA','PEREZ','RODRIGUEZ','M','2008-11-08',995252631,'CESARRODRIGUEZ@GMAIL.COM','URB. SANTA INEZ 8954','2024-10-20 10:00:22'),(7,'DNI',77115896,'DANIEL ','ALEJANDRO','ANGEL','VELIZ','PAREDES','M','2009-10-08',999478512,'DANIELVELIZ@GMAIL.COM','CALLE LAS ESMERALDAS 895 , SANTA INES','2024-10-20 10:18:20'),(8,'DNI',44789652,'DANIELA','','','URIARTE','BELO','F','2011-12-17',90545623,'DANIELAURIARTE@GMAIL.COM','CALLE SIN NUMERO','2024-10-20 10:34:54'),(10,'DNI',71720330,'VALERIA','','','CRUZ','CRUZ','F','2012-06-06',995621235,'VALERIACRUZ@GMAIL.COM','SAN ANDRES','2024-10-20 11:05:40'),(11,'DNI',80258900,'LUCY','','','RAMIREZ','CUELLAR','F','2024-09-25',987456111,'LUCYRAMIREZ@GMAIL.COM','DVFVFDGBFDB','2024-10-20 11:16:45'),(12,'DNI',80001122,'GGGGG','VVVVVVV','','OKOOK','HGHGHGH','M','2024-10-11',999235654,'GGGGGG@GMAIL.COM','SCSDFDSFSDFDSF','2024-10-20 11:23:08'),(13,'DNI',70859623,'beatriz','VVVVVVV','','peralta','miller','F','2024-10-04',959632587,'beatriz@gmail.com','ghnfghnf','2024-10-20 14:29:22'),(14,'DNI',85631245,'mmmmm','bbbbb','','bbbbbbb','mmmmm','M','2024-10-05',999526456,'mmmm@gmail.com','ghfgnhfgjhgjkhi','2024-10-20 14:35:29'),(16,'DNI',56231458,'ppppppp','mmmmmm','','tttttttttttt','bbbbbbbbbbbbbbbb','F','2024-10-03',2147483647,'mmmm@gmail.com','ghfgnhfgjhgjkhi','2024-10-20 14:42:47'),(17,'DNI',72701022,'DAVID','OSCAR','RAÚL','CHIRINOS','GONZALES','M','2004-10-13',998456123,'DAVIDCHIRINOS@GMAIL.COM','CALLE NUEVA S/N TRUJILLO','2024-10-22 08:43:31'),(18,'DNI',62701122,'SOFIA','MIA','CELESTE','CABELLOS','RIOS','F','2007-01-31',99999999,'SOFIACABELLOS@GMAIL.COM','JR ENRIQUEZ 852, LA ESMERALDA','2024-10-22 09:10:04'),(19,'DNI',19191919,'ELIANNA','LIZBETH','','ULLOA','HORNA','F','1990-11-02',999999999,'ELIANNAULLOA@GMAIL.COM','CALLE SIN DESTINO ','2024-10-22 21:20:23'),(21,'DNI',76691490,'DARLEY','','','SAAVEDRA','SAAVEDRA','M','2024-10-18',963852741,'DARLEY@GMAIL.COM','calle sin nro','2024-10-25 12:43:52');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `planestudios`
--

DROP TABLE IF EXISTS `planestudios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `planestudios` (
  `id_plan` int NOT NULL AUTO_INCREMENT,
  `id_programa` int NOT NULL,
  `id_programaestudios` int NOT NULL,
  `nombre_plan` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `descripcion_plan` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `anio` int NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_plan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `planestudios`
--

LOCK TABLES `planestudios` WRITE;
/*!40000 ALTER TABLE `planestudios` DISABLE KEYS */;
INSERT INTO `planestudios` VALUES (1,0,1,'ICSI','PLAN DE ESTUDIOS DE SISTEMAS',2024,1),(2,0,1,'APSTI','PLAN DE ESTUDIOS DE ARQUITECTURA DE PLAT. Y STI',2024,0),(3,0,2,'ENFTEC','PLAN DE ESTUDIOS DE ENFERMERIA',2024,0),(4,0,1,'APSTI','PLAN DE ESTUDIOS DE ARQUITECTURA DE PLAT. Y STI',2020,0),(5,0,1,'APSTI','PLAN DE ESTUDIOS DE ARQUITECTURA DE PLAT. Y STI',2018,0),(6,0,2,'ENFTEC','PLAN DE ESTUDIOS DE ENFERMERIA',2018,1);
/*!40000 ALTER TABLE `planestudios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postulante`
--

DROP TABLE IF EXISTS `postulante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `postulante` (
  `id_postulante` int NOT NULL AUTO_INCREMENT,
  `id_persona_postulante` int NOT NULL,
  `anio_admision_postulante` int NOT NULL,
  `colegio_procedencia_postulante` varchar(100) COLLATE utf8mb3_spanish_ci NOT NULL,
  `primera_opcion_postulante` varchar(80) COLLATE utf8mb3_spanish_ci NOT NULL,
  `segunda_opcion_postulante` varchar(80) COLLATE utf8mb3_spanish_ci NOT NULL,
  `dni_foto_postulante` text COLLATE utf8mb3_spanish_ci,
  `pago_postulante` text COLLATE utf8mb3_spanish_ci,
  `foto_postulante` text COLLATE utf8mb3_spanish_ci,
  `certificado_estudios_postulante` text COLLATE utf8mb3_spanish_ci,
  `partida_nacimiento_postulante` text COLLATE utf8mb3_spanish_ci,
  `declaracion_jurada_postulante` text COLLATE utf8mb3_spanish_ci,
  `estado` int NOT NULL,
  `fecha_registro_postulante` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_postulante`),
  KEY `id_persona_postulante` (`id_persona_postulante`),
  CONSTRAINT `postulante_ibfk_1` FOREIGN KEY (`id_persona_postulante`) REFERENCES `persona` (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postulante`
--

LOCK TABLES `postulante` WRITE;
/*!40000 ALTER TABLE `postulante` DISABLE KEYS */;
INSERT INTO `postulante` VALUES (1,13,2024,'I.E. 85231 MARIA BELEN','ENFERMERÍA TÉCNICA','CONTABILIDAD','2024-10-20-02-29-22__FOTO1.jpeg','2024-10-20-02-29-22__FOTO2.jpeg','2024-10-20-02-29-22__FOTO3.jpeg','2024-10-20-02-29-22__FOTO4.jpeg','2024-10-20-02-29-22__FOTO5.jpeg','2024-10-20-02-29-22__FOTO6.jpeg',1,'2024-10-20 14:29:22'),(2,14,2024,'I.E. 96632 VICTOR ANDRES BELAUNDE','ENFERMERÍA TÉCNICA','CONTABILIDAD','2024-10-20-02-35-29__FOTO1.jpeg','2024-10-20-02-35-29__FOTO2.jpeg','2024-10-20-02-35-29__FOTO3.jpeg','2024-10-20-02-35-29__FOTO4.jpeg','2024-10-20-02-35-29__FOTO5.jpeg','2024-10-20-02-35-29__FOTO6.jpeg',1,'2024-10-20 14:35:29'),(3,16,2024,'I.E. 96632 VICTOR ANDRES BELAUNDE','ENFERMERÍA TÉCNICA','ARQUITECTURA DE PLATAFORMAS Y SERVICIOS DE TECNOLOGÍAS DE LA INFORMACIÓN','2024-10-20-02-42-47__FOTO1.jpeg','2024-10-20-02-42-47__FOTO2.jpeg','2024-10-20-02-42-47__FOTO3.jpeg','2024-10-20-02-42-47__FOTO4.jpeg','2024-10-20-02-42-47__FOTO5.jpeg','2024-10-20-02-42-47__FOTO6.jpeg',1,'2024-10-20 14:42:47'),(4,17,2025,'COLEGIO SANTA RITA','ENFERMERÍA TÉCNICA','CONTABILIDAD','2024-10-22-08-43-31__','2024-10-22-08-43-31__','2024-10-22-08-43-31__','2024-10-22-08-43-31__','2024-10-22-08-43-31__','2024-10-22-08-43-31__',1,'2024-10-22 08:43:31'),(5,18,2025,'IE ANDRES AVELINO','ENFERMERÍA TÉCNICA','CONTABILIDAD','2024-10-22-09-10-04__','2024-10-22-09-10-04__','2024-10-22-09-10-04__','2024-10-22-09-10-04__','2024-10-22-09-10-04__','2024-10-22-09-10-04__',1,'2024-10-22 09:10:04'),(6,19,2024,'COLEGIO SANTA RITA','ENFERMERÍA TÉCNICA','CONTABILIDAD','2024-10-22-09-20-23__FOTO1.jpeg','2024-10-22-09-20-23__FOTO2.jpeg','2024-10-22-09-20-23__','2024-10-22-09-20-23__','2024-10-22-09-20-23__','2024-10-22-09-20-23__',1,'2024-10-22 21:20:23'),(7,21,2024,'I.E. 96632 VICTOR ANDRES BELAUNDE','ARQUITECTURA DE PLATAFORMAS Y SERVICIOS DE TECNOLOGÍAS DE LA INFORMACIÓN','CONTABILIDAD','2024-10-25-12-43-52__FOTO1.jpeg','2024-10-25-12-43-52__FOTO2.jpeg','2024-10-25-12-43-52__FOTO3.jpeg','2024-10-25-12-43-52__','2024-10-25-12-43-52__','2024-10-25-12-43-52__',1,'2024-10-25 12:43:52');
/*!40000 ALTER TABLE `postulante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programaestudios`
--

DROP TABLE IF EXISTS `programaestudios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `programaestudios` (
  `id_programa` int NOT NULL AUTO_INCREMENT,
  `abreviatura_programa` varchar(15) COLLATE utf8mb3_spanish_ci NOT NULL,
  `nombre_programa` varchar(100) COLLATE utf8mb3_spanish_ci NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_programa`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programaestudios`
--

LOCK TABLES `programaestudios` WRITE;
/*!40000 ALTER TABLE `programaestudios` DISABLE KEYS */;
INSERT INTO `programaestudios` VALUES (1,'ARQ','ARQUITECTURA DE PLATAFORMAS Y SERVICIOS DE TECNOLOGÍAS DE LA INFORMACIÓN',1),(2,'ENF','ENFERMERÍA TÉCNICA',1),(3,'CONT','CONTABILIDAD',1),(7,'SEC_EJ','SECRETARIADO EJECUTIVO',1),(8,'TEC_EL','TÉCNICO ELECTRICISTA',1),(9,'AGRON','AGRONOMIA',1),(10,'ENFTEC','ENFERMERIA TECNICA',1),(11,'CONTEC','CONTABILIDAD TECNICA',1);
/*!40000 ALTER TABLE `programaestudios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tupa`
--

DROP TABLE IF EXISTS `tupa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tupa` (
  `id_tupa` int NOT NULL AUTO_INCREMENT,
  `denominacion_tupa` varchar(120) COLLATE utf8mb3_spanish_ci NOT NULL,
  `monto_tupa` decimal(10,0) NOT NULL,
  `requisitos_tupa` varchar(300) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `estado` int NOT NULL,
  `fecha_tupa` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tupa`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tupa`
--

LOCK TABLES `tupa` WRITE;
/*!40000 ALTER TABLE `tupa` DISABLE KEYS */;
INSERT INTO `tupa` VALUES (1,'CARNET / FOTOSHECK (duplicado)',10,'1. Estar considerado en la Nómina de estudiantes.',1,'2024-10-22 19:01:00'),(2,'DERECHO DE INSCRIPCION A EXAMEN DE ADMISION',50,'1. Solicitud dirigida al Director \n2. Copia de DNI \n3. Dos (2) fotos t/carné \n4. Recibo por derecho de admisión',1,'2024-10-22 19:07:52'),(3,'RATIFICACIÓN DE MATRICULA Y MATRICULA DE INGRESANTES',170,'1. Solicitud dirigida al Director\r\n2. Boleta de Notas\r\n3. Haber aprobado el examen de admisión\r\n4. Comprobante de pago',1,'2024-10-22 19:10:19'),(5,'CERTIFICADO DE ESTUDIOS',100,'',1,'2024-10-25 12:48:36'),(6,'DERECHO MATRICULA',50,NULL,1,'2024-11-03 01:49:13');
/*!40000 ALTER TABLE `tupa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidaddidactica`
--

DROP TABLE IF EXISTS `unidaddidactica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `unidaddidactica` (
  `id_unidad` int NOT NULL AUTO_INCREMENT,
  `nombre_unidad` varchar(100) COLLATE utf8mb3_spanish_ci NOT NULL,
  `abreviatura_unidad` varchar(15) COLLATE utf8mb3_spanish_ci NOT NULL,
  `id_plan_unidad` int DEFAULT NULL,
  `programa_estudios_unidad` varchar(100) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `modulo_unidad` char(3) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `tipo_unidad` varchar(15) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `periodo_academico_unidad` varchar(3) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `creditos_unidad` int NOT NULL,
  `horas_teoricas_unidad` int NOT NULL,
  `horas_practicas_unidad` int NOT NULL,
  `horas_totales_unidad` int NOT NULL,
  `horas_semanales_unidad` int NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_unidad`),
  KEY `id_plan_unidad` (`id_plan_unidad`),
  CONSTRAINT `unidaddidactica_ibfk_1` FOREIGN KEY (`id_plan_unidad`) REFERENCES `planestudios` (`id_plan`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidaddidactica`
--

LOCK TABLES `unidaddidactica` WRITE;
/*!40000 ALTER TABLE `unidaddidactica` DISABLE KEYS */;
INSERT INTO `unidaddidactica` VALUES (1,'SISTEMAS OPERATIVOS','SISOPE',1,'1','I','Empleabilidad','I',4,16,90,106,6,1),(2,'SOPORTE TÉCNICO','SOTEC',1,'1','I','Empleabilidad','I',4,16,90,106,6,1),(3,'SEGURIDAD DE REDES','SEGRED',1,'1','I','Empleabilidad','II',5,16,120,136,8,1),(4,'LOGICA COMPUTACIONAL','LOGCOMPU',1,'1','II','Empleabilidad','III',7,16,190,206,12,1),(5,'DESARROLLO DE APLICACIONES','DAPP',1,'1','II','EMPLEABILIDAD','IV',4,16,90,106,6,1),(6,'METODO DE DESARROLLO','METDAPP',1,'1','III','EMPLEABILIDAD','V',4,16,90,106,6,1),(7,'VIRTUALIZACION DE APLICACIONES','VAPP',1,'1','III','EMPLEABILIDAD','VI',5,16,120,136,8,1),(8,'PRIMEROS AUXILIOS','PRIMAXU',3,'2','II','EMPLEABILIDAD','IV',6,16,150,166,10,1),(9,'REDES','RED',1,'1','I','EMPLEABILIDAD','I',4,16,90,106,6,1);
/*!40000 ALTER TABLE `unidaddidactica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `id_persona_usuario` int NOT NULL,
  `tipo_usuario` varchar(20) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `identificador_usuario` varchar(8) COLLATE utf8mb3_spanish_ci NOT NULL,
  `clave_usuario` varchar(8) COLLATE utf8mb3_spanish_ci NOT NULL,
  `estado` int NOT NULL,
  `fecha_creacion_usuario` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`),
  KEY `id_persona_usuario` (`id_persona_usuario`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_persona_usuario`) REFERENCES `persona` (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,1,'Administrador','43001122','123456',0,'2024-08-13 04:24:45');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-04 22:38:02
