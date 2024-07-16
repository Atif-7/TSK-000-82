-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: users
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `activated` tinyint(1) DEFAULT 0,
  `reset_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Atif','atif@gmail.com','$2y$10$0D5ZoUJgM7T7ZSos21JmnO6hJtF4FgWpMpxFT5T1bkEvnbQd3DDE2',1,'9969875054da4ea46bafb671acf4f228'),(2,'Atif ur Rehman','atifurehman176@gmail.com','$2y$10$vWz2rn3CxB2jReB.t6Au8.F21.W0rwb3uUE9ZglPuBBjhaqmHxrMC',1,'48f968b8653ffef71932a531750ce88c'),(3,'Arzu','ak47@gmail.com','$2y$10$WvMF05hG95EiGfckUz.2VOmmuseLNdUBRWTa7qLzJRU9whszw5Ife',1,'cfbb7ff2f6a0ea9263fe96e769163dd1'),(4,'Atif','atifurehman176@gmail.com1','$2y$10$qsjMuqp4AALgUlk/8v3zle4bs6mnyYv3g6zpJXw05eVNhKKNIzYOG',1,'ca131ab61d6abbc57f5cc65b6ce66f81'),(5,'Atif ur Rehman 7','atif@example.com','$2y$10$iGRCBLpRkTZzFh0pLhm6DO2RPP4Erw4nLUANMzunZoCfjaIu5xFPi',1,'5c6828ae004f33465e57b9d31f0bc7f6'),(6,'example','example@email.com','$2y$10$8CxBEVA9d43omSP/kZJ5NOMqA/5cQ9IkosH7lgswboL/hL879qdQG',1,'8346026e430c2c5598fa65a23e618ec3');
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

-- Dump completed on 2024-07-15 14:41:50
