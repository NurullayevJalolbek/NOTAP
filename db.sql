-- MySQL dump 10.13  Distrib 8.0.37, for Linux (x86_64)
--
-- Host: localhost    Database: NOTAP
-- ------------------------------------------------------
-- Server version	8.0.37-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `text` varchar(50) DEFAULT NULL,
  `user_id` bigint DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` VALUES (11,'Nurullayev 2004',1,'2024-08-01 16:08:37'),(15,'Nurullaeyv 2004',1,'2024-08-01 17:00:03'),(19,'ajhghjgdc',1,'2024-08-01 18:22:39'),(20,'ajhghjgdc',1,'2024-08-01 18:23:27'),(21,'ajhghjgdc',1,'2024-08-01 18:23:40'),(24,'ajhghjgdc',1,'2024-08-01 18:58:01'),(25,'bvjcs',1,'2024-08-01 19:08:18'),(26,'fdigvdfv',1,'2024-08-01 19:12:10'),(27,'lkkernfher',1,'2024-08-01 21:22:22'),(28,'jhj',1,'2024-08-02 11:03:45');
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` bigint DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `note_id` int DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,7203034777,'/add',NULL,NULL,NULL),(2,6713021153,'/start',NULL,NULL,NULL),(3,NULL,NULL,NULL,'nurullayev@gmail.com','rfrfr3f33'),(4,NULL,NULL,NULL,'nurullayev@gmail.com','rfrfr3f33'),(5,NULL,NULL,NULL,'nurullayev@gmail.com','rfrfr3f33'),(6,NULL,NULL,NULL,'Nurullayev@ejrnrjjn.com','rhf32jrfj33'),(7,NULL,NULL,NULL,'Jamshid@gmail.com','wehvfwjefw'),(8,NULL,NULL,NULL,'Jamshid@gmail.com','123'),(9,NULL,NULL,NULL,'jalolbek0476@gmail.com','edf'),(10,NULL,NULL,NULL,'rf3rf34','wef'),(11,NULL,NULL,NULL,'jalolbeknurullayev.php@jgmail.com','ewd'),(12,NULL,NULL,NULL,'wdfwe','wef33'),(13,NULL,NULL,NULL,'Jamshidwf@gmail.com','ewf'),(14,NULL,NULL,NULL,'Jamshid33@gmail.com','wefwef');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-02 11:12:01
