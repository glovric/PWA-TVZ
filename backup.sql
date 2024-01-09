-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: pwa
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `arhiva`
--

DROP TABLE IF EXISTS `arhiva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arhiva` (
  `naslov` varchar(50) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `ksadrzaj` varchar(200) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `sadrzaj` varchar(400) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `slika` varchar(50) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `kategorija` varchar(30) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `archive` tinyint(1) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datum` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arhiva`
--

LOCK TABLES `arhiva` WRITE;
/*!40000 ALTER TABLE `arhiva` DISABLE KEYS */;
INSERT INTO `arhiva` VALUES ('Wer in dieses Land reisen will','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac scelerisque tellus.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac scelerisque tellus. Donec lectus purus, dictum nec eros quis, pulvinar faucibus dui. Pellentesque vel faucibus mauris, vel pulvinar leo. Duis eget elit ac ipsum consectetur elementum. Nunc accumsan odio lorem, quis aliquam ligula lobortis id. Nullam pellentesque lectus massa, a luctus justo tempor vel. Nam porta mi non dui dign','1.jpg','Reise',0,42,'18.06.2022.'),('Sexuelle Belastigung','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac scelerisque tellus. ','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac scelerisque tellus. Donec lectus purus, dictum nec eros quis, pulvinar faucibus dui. Pellentesque vel faucibus mauris, vel pulvinar leo. Duis eget elit ac ipsum consectetur elementum. Nunc accumsan odio lorem, quis aliquam ligula lobortis id. Nullam pellentesque lectus massa, a luctus justo tempor vel. Nam porta mi non dui dign','2.jpg','Reise',0,43,'18.06.2022.'),('Ausgewahlte Leserreisen','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac scelerisque tellus.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac scelerisque tellus. Donec lectus purus, dictum nec eros quis, pulvinar faucibus dui. Pellentesque vel faucibus mauris, vel pulvinar leo. Duis eget elit ac ipsum consectetur elementum. Nunc accumsan odio lorem, quis aliquam ligula lobortis id. Nullam pellentesque lectus massa, a luctus justo tempor vel. Nam porta mi non dui dign','3.jpg','Reise',0,44,'18.06.2022.'),('Deshalb sind diese','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac scelerisque tellus.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac scelerisque tellus. Donec lectus purus, dictum nec eros quis, pulvinar faucibus dui. Pellentesque vel faucibus mauris, vel pulvinar leo. Duis eget elit ac ipsum consectetur elementum. Nunc accumsan odio lorem, quis aliquam ligula lobortis id. Nullam pellentesque lectus massa, a luctus justo tempor vel. Nam porta mi non dui dign','4.jpg','Verbraucher',0,45,'18.06.2022.'),('Millionen Liter Olivenol','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac scelerisque tellus.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac scelerisque tellus. Donec lectus purus, dictum nec eros quis, pulvinar faucibus dui. Pellentesque vel faucibus mauris, vel pulvinar leo. Duis eget elit ac ipsum consectetur elementum. Nunc accumsan odio lorem, quis aliquam ligula lobortis id. Nullam pellentesque lectus massa, a luctus justo tempor vel. Nam porta mi non dui dign','5.jpeg','Verbraucher',0,46,'18.06.2022.'),('Arbeiten wir bald','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac scelerisque tellus.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac scelerisque tellus. Donec lectus purus, dictum nec eros quis, pulvinar faucibus dui. Pellentesque vel faucibus mauris, vel pulvinar leo. Duis eget elit ac ipsum consectetur elementum. Nunc accumsan odio lorem, quis aliquam ligula lobortis id. Nullam pellentesque lectus massa, a luctus justo tempor vel. Nam porta mi non dui dign','6.jpg','Verbraucher',0,47,'18.06.2022.');
/*!40000 ALTER TABLE `arhiva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `korisnicko_ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `lozinka` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `razina` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `korisnik`
--

LOCK TABLES `korisnik` WRITE;
/*!40000 ALTER TABLE `korisnik` DISABLE KEYS */;
INSERT INTO `korisnik` VALUES (2,'admin','admin','admin','$2y$10$3ie8kxOqTelggUp27tb4j.E8rIH6jr15N85lj1F9cv3RmaSBN9Tly',1),(3,'user','user','user','$2y$10$190sNqKE8XLuRa5lBjI11ujRkni2g.b/10uqHNz2q7pwm9pStBlhS',0);
/*!40000 ALTER TABLE `korisnik` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-18 18:04:10
