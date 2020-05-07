CREATE DATABASE  IF NOT EXISTS `proyectopyrdh` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;
USE `proyectopyrdh`;
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
  `usuario_id` bigint(20) unsigned DEFAULT NULL,
  `categoria_id` int(11) NOT NULL,
  `titulo` varchar(70) DEFAULT NULL,
  `portada` varchar(145) DEFAULT NULL,
  `fecha_de_creacion` date DEFAULT NULL,
  `puntuacion` int(11) DEFAULT NULL,
  `descripcion` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `categoria_id` (`categoria_id`),
  CONSTRAINT `cuestionarios_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`),
  CONSTRAINT `cuestionarios_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuestionarios`
--

LOCK TABLES `cuestionarios` WRITE;
/*!40000 ALTER TABLE `cuestionarios` DISABLE KEYS */;
INSERT INTO `cuestionarios` VALUES (14,1,7,'Matematicas','7ZE1ynhVGjvxa1myikGD6SU29uvF90Q3liVy5ot5.jpeg',NULL,NULL,'Sin descripción'),(16,5,6,'Lorem','imagen predefinida',NULL,NULL,'Sin descripción'),(17,1,8,'Cuestionario de prueba','jyFLiRCMW5974ruF902yyKkRqQCXKNruNqMHT99z.png',NULL,NULL,'Sin descripción');
/*!40000 ALTER TABLE `cuestionarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2020_02_20_004550_completar_tabla_users',2),(6,'2020_02_22_235641_cambio_nombre_y_agregar_descripcion',3),(7,'2020_02_24_231113_columna_descripcion_y_drop_cantidad_preguntas',3),(8,'2020_04_02_075405_create_plays_table',4),(10,'2020_04_04_091334_agregar_columna_tiempo',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plays`
--

DROP TABLE IF EXISTS `plays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `plays` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usuario_id` bigint(20) unsigned NOT NULL,
  `cuestionario_id` int(11) NOT NULL,
  `respuestas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiempo` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `plays_usuario_id_foreign` (`usuario_id`),
  KEY `plays_cuestionario_id_foreign` (`cuestionario_id`),
  CONSTRAINT `plays_cuestionario_id_foreign` FOREIGN KEY (`cuestionario_id`) REFERENCES `cuestionarios` (`id`),
  CONSTRAINT `plays_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plays`
--

LOCK TABLES `plays` WRITE;
/*!40000 ALTER TABLE `plays` DISABLE KEYS */;
INSERT INTO `plays` VALUES (17,NULL,NULL,1,14,'[false,true,true,false,true]',73);
/*!40000 ALTER TABLE `plays` ENABLE KEYS */;
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
  `consigna` varchar(85) DEFAULT NULL,
  `respuesta_correcta` varchar(45) DEFAULT NULL,
  `segunda_respuesta` varchar(45) DEFAULT NULL,
  `tercera_respuesta` varchar(45) DEFAULT NULL,
  `cuarta_respuesta` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cuestionario_id` (`cuestionario_id`),
  CONSTRAINT `preguntas4respuestas_ibfk_1` FOREIGN KEY (`cuestionario_id`) REFERENCES `cuestionarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntas4respuestas`
--

LOCK TABLES `preguntas4respuestas` WRITE;
/*!40000 ALTER TABLE `preguntas4respuestas` DISABLE KEYS */;
INSERT INTO `preguntas4respuestas` VALUES (27,14,'2 + 2 =  ¿?','4','3','1','pez'),(28,14,'(A + B)² = A² + B²',NULL,NULL,NULL,NULL),(29,14,'La potencia no es distributiva en...','las sumas','los cocientes','la multiplicacion','ninguna de las anteriores'),(33,16,'Lorem','ipsum','ispum','sipum','muspi'),(34,17,'Pregunta de prueba 1','a','b','c','d'),(35,17,'jadns','dasjn','dsanj','ajsdn','asd');
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
  `consigna` varchar(85) DEFAULT NULL,
  `respuesta_correcta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cuestionario_id` (`cuestionario_id`),
  CONSTRAINT `preguntasvof_ibfk_1` FOREIGN KEY (`cuestionario_id`) REFERENCES `cuestionarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntasvof`
--

LOCK TABLES `preguntasvof` WRITE;
/*!40000 ALTER TABLE `preguntasvof` DISABLE KEYS */;
INSERT INTO `preguntasvof` VALUES (7,14,'(2)² + (-2²) = 4',0),(8,14,'(A + B)² es distinto de A² + B²',1);
/*!40000 ALTER TABLE `preguntasvof` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `foto_perfil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'TCassas','tomascassas@gmail.com',NULL,'$2y$10$lf0WTUu.yMCqy5htVKnbqOSqqp8zwQN/kHNe2jNnr0bvvJe.O6uWK',NULL,'2020-02-18 04:10:42','2020-04-15 23:35:51','jGNHfYJ2Mv7WhGLPTyMNKnfTfRCBVlVbN2PtpqFP.jpeg'),(5,'Fulano','cosmefulano@gmail.com',NULL,'$2y$10$ToTySRFiONHuR7eIv2owUu1g9Z5qk6gvYRQAfVgj7gW0mr.qEG9Zq',NULL,'2020-04-16 01:25:12','2020-04-16 01:25:12','imagen predefinida');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
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

-- Dump completed on 2020-05-06 22:00:40
