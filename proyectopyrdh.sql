-- MySQL dump 10.13  Distrib 8.0.15, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: proyectopyrdh
-- ------------------------------------------------------
-- Server version	8.0.15

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Historia'),(2,'Arte'),(3,'Deporte'),(4,'Cine'),(5,'Videojuegos'),(6,'Otro'),(7,'Ciencia'),(8,'Geografía');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuestionarios`
--

DROP TABLE IF EXISTS `cuestionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `cuestionarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `titulo` varchar(70) DEFAULT NULL,
  `portada` varchar(145) DEFAULT NULL,
  `fecha_de_creacion` date DEFAULT NULL,
  `puntuacion` int(11) DEFAULT NULL,
  `cantidad_preguntas` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `categoria_id` (`categoria_id`),
  CONSTRAINT `cuestionarios_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `cuestionarios_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuestionarios`
--

LOCK TABLES `cuestionarios` WRITE;
/*!40000 ALTER TABLE `cuestionarios` DISABLE KEYS */;
INSERT INTO `cuestionarios` VALUES (3,3,1,'Cuestionario test','imagen predefinida','2020-01-30',0,'1'),(4,3,6,'cuestionario test 2','imagen predefinida','2020-01-30',0,'2'),(6,3,5,'Cuestionario :O','imagen predefinida','2020-01-30',0,'4');
/*!40000 ALTER TABLE `cuestionarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preguntas4respuestas`
--

DROP TABLE IF EXISTS `preguntas4respuestas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `preguntas4respuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cuestionario_id` int(11) DEFAULT NULL,
  `consigna` varchar(45) DEFAULT NULL,
  `respuesta_correcta` varchar(45) DEFAULT NULL,
  `segunda_respuesta` varchar(45) DEFAULT NULL,
  `tercera_respuesta` varchar(45) DEFAULT NULL,
  `cuarta_respeusta` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cuestionario_id` (`cuestionario_id`),
  CONSTRAINT `preguntas4respuestas_ibfk_1` FOREIGN KEY (`cuestionario_id`) REFERENCES `cuestionarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntas4respuestas`
--

LOCK TABLES `preguntas4respuestas` WRITE;
/*!40000 ALTER TABLE `preguntas4respuestas` DISABLE KEYS */;
INSERT INTO `preguntas4respuestas` VALUES (1,4,'pregunta 1','1','2','3','4'),(2,6,'Pregunta 1','respuesta 1','respuesta 2','respuesta 3','respuesta 4'),(3,6,'PreguntaAa','res1','res2','res3','res4');
/*!40000 ALTER TABLE `preguntas4respuestas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preguntasvof`
--

DROP TABLE IF EXISTS `preguntasvof`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `preguntasvof` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cuestionario_id` int(11) DEFAULT NULL,
  `consigna` varchar(45) DEFAULT NULL,
  `respuesta_correcta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cuestionario_id` (`cuestionario_id`),
  CONSTRAINT `preguntasvof_ibfk_1` FOREIGN KEY (`cuestionario_id`) REFERENCES `cuestionarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntasvof`
--

LOCK TABLES `preguntasvof` WRITE;
/*!40000 ALTER TABLE `preguntasvof` DISABLE KEYS */;
INSERT INTO `preguntasvof` VALUES (1,4,'pregunta 2',1),(2,6,'Si o no',1),(3,6,'xD?',1);
/*!40000 ALTER TABLE `preguntasvof` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `mail` varchar(45) NOT NULL,
  `contrasenia` varchar(145) NOT NULL,
  `fecha_de_creacion` date NOT NULL,
  `img` varchar(145) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail_UNIQUE` (`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'test','test@test.com','$2y$10$HkmDkvOPfOt0u5B723zlf.OSssZcg/QJ7rM0irc1s7UDLXBSuQppi','2020-01-29','imgs/fondoPunteado.jpg'),(2,'test2','test@test2.com','$2y$10$dFB3QDqst3SapZotQZYtlunOUatLAqRJcCEJ5QS6FjNlfVd9cFudK','2020-01-29','imgs/fondoPunteado.jpg'),(3,'TCassas','tomascassas@gmail.com','$2y$10$EFDYC2KU0gqBboNe9eJeGem2rY0Vd.g6onYKJbWRO1habj9yRXfoW','2020-01-29','imgs/TCassas.jpg');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-30  4:12:16
