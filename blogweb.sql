-- MariaDB dump 10.19  Distrib 10.9.4-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: blogweb
-- ------------------------------------------------------
-- Server version	10.9.4-MariaDB

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
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`article_id`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `article_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `article_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES
(1,'Title','logo2.jpg',7,NULL,'<div>uasvdha basgycbagudsahjksdadadada</div>','2022-11-25 18:35:25'),
(11,'Jakarta Keras',NULL,7,4,'<div>asdbasbsajdhasjkadksaadsasda</div>','2022-11-29 08:28:25'),
(17,'Lorem','/~ar/dasarWeb/TugasBesar/img/article/Nyarch_Wallpaper.png',3,-256761742,'<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus ex qui praesentium, voluptatum libero, reprehenderit consequatur neque sit rem iste soluta eum? Quos maxime quo, laboriosam suscipit saepe ab vero architecto vel dolorem itaque deserunt repellendus mollitia blanditiis modi consequatur! Itaque cupiditate odit quae quidem, molestiae fuga atque! Quo hic consequuntur iusto a consectetur possimus atque velit esse fugiat dolores cum maxime dolor perferendis, facilis nobis veritatis id totam illo magni ea iure quasi cumque numquam quaerat? Officiis, iste! Nam quam harum corrupti repellat consequuntur iure tempora! Debitis, provident non perspiciatis quis tenetur vitae illo sint voluptas consequuntur, soluta doloremque.<br><br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus ex qui praesentium, voluptatum libero, reprehenderit consequatur neque sit rem iste soluta eum? Quos maxime quo, laboriosam suscipit saepe ab vero architecto vel dolorem itaque deserunt repellendus mollitia blanditiis modi consequatur! Itaque cupiditate odit quae quidem, molestiae fuga atque! Quo hic consequuntur iusto a consectetur possimus atque velit esse fugiat dolores cum maxime dolor perferendis, facilis nobis veritatis id totam illo magni ea iure quasi cumque numquam quaerat? Officiis, iste! Nam quam harum corrupti repellat consequuntur iure tempora! Debitis, provident non perspiciatis quis tenetur vitae illo sint voluptas consequuntur, soluta doloremque.</div>','2022-12-02 10:21:17'),
(18,'Ilzam Ganteng',NULL,7,-256761742,'<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus ex qui praesentium, voluptatum libero, reprehenderit consequatur neque sit rem iste soluta eum? Quos maxime quo, laboriosam suscipit saepe ab vero architecto vel dolorem itaque deserunt repellendus mollitia blanditiis modi consequatur! Itaque cupiditate odit quae quidem, molestiae fuga atque! Quo hic consequuntur iusto a consectetur possimus atque velit esse fugiat dolores cum maxime dolor perferendis, facilis nobis veritatis id totam illo magni ea iure quasi cumque numquam quaerat? Officiis, iste! Nam quam harum corrupti repellat consequuntur iure tempora! Debitis, provident non perspiciatis quis tenetur vitae illo sint voluptas consequuntur, soluta doloremque.<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus ex qui praesentium, voluptatum libero, reprehenderit consequatur neque sit rem iste soluta eum? Quos maxime quo, laboriosam suscipit saepe ab vero architecto vel dolorem itaque deserunt repellendus mollitia blanditiis modi consequatur! Itaque cupiditate odit quae quidem, molestiae fuga atque! Quo hic consequuntur iusto a consectetur possimus atque velit esse fugiat dolores cum maxime dolor perferendis, facilis nobis veritatis id totam illo magni ea iure quasi cumque numquam quaerat? Officiis, iste! Nam quam harum corrupti repellat consequuntur iure tempora! Debitis, provident non perspiciatis quis tenetur vitae illo sint voluptas consequuntur, soluta doloremque.<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus ex qui praesentium, voluptatum libero, reprehenderit consequatur neque sit rem iste soluta eum? Quos maxime quo, laboriosam suscipit saepe ab vero architecto vel dolorem itaque deserunt repellendus mollitia blanditiis modi consequatur! Itaque cupiditate odit quae quidem, molestiae fuga atque! Quo hic consequuntur iusto a consectetur possimus atque velit esse fugiat dolores cum maxime dolor perferendis, facilis nobis veritatis id totam illo magni ea iure quasi cumque numquam quaerat? Officiis, iste! Nam quam harum corrupti repellat consequuntur iure tempora! Debitis, provident non perspiciatis quis tenetur vitae illo sint voluptas consequuntur, soluta doloremque.<br><br><br>AKU MAU CARI JODOHHH</div>','2022-12-06 02:07:56'),
(19,'qwertyuio','/~ar/dasarWeb/TugasBesar/img/article/Nyarch_4K.png',7,-256761742,'<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus ex qui praesentium, voluptatum libero, reprehenderit consequatur neque sit rem iste soluta eum? Quos maxime quo, laboriosam suscipit saepe ab vero architecto vel dolorem itaque deserunt repellendus mollitia blanditiis modi consequatur! Itaque cupiditate odit quae quidem, molestiae fuga atque! Quo hic consequuntur iusto a consectetur possimus atque velit esse fugiat dolores cum maxime dolor perferendis, facilis nobis veritatis id totam illo magni ea iure quasi cumque numquam quaerat? Officiis, iste! Nam quam harum corrupti repellat consequuntur iure tempora! Debitis, provident non perspiciatis quis tenetur vitae illo sint voluptas consequuntur, soluta doloremque.<br><br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus ex qui praesentium, voluptatum libero, reprehenderit consequatur neque sit rem iste soluta eum? Quos maxime quo, laboriosam suscipit saepe ab vero architecto vel dolorem itaque deserunt repellendus mollitia blanditiis modi consequatur! Itaque cupiditate odit quae quidem, molestiae fuga atque! Quo hic consequuntur iusto a consectetur possimus atque velit esse fugiat dolores cum maxime dolor perferendis, facilis nobis veritatis id totam illo magni ea iure quasi cumque numquam quaerat? Officiis, iste! Nam quam harum corrupti repellat consequuntur iure tempora! Debitis, provident non perspiciatis quis tenetur vitae illo sint voluptas consequuntur, soluta doloremque.<br><br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus ex qui praesentium, voluptatum libero, reprehenderit consequatur neque sit rem iste soluta eum? Quos maxime quo, laboriosam suscipit saepe ab vero architecto vel dolorem itaque deserunt repellendus mollitia blanditiis modi consequatur! Itaque cupiditate odit quae quidem, molestiae fuga atque! Quo hic consequuntur iusto a consectetur possimus atque velit esse fugiat dolores cum maxime dolor perferendis, facilis nobis veritatis id totam illo magni ea iure quasi cumque numquam quaerat? Officiis, iste! Nam quam harum corrupti repellat consequuntur iure tempora! Debitis, provident non perspiciatis quis tenetur vitae illo sint voluptas consequuntur, soluta doloremque.</div>','2022-12-06 02:07:56'),
(20,'qwerfghjk','/~ar/dasarWeb/TugasBesar/img/article/controllerNintendo.jpg',7,-256761742,'<div>&nbsp; &nbsp; transform: translate(6px, -6px);<br>&nbsp; &nbsp; transform: translate(6px, -6px);<br>&nbsp; &nbsp; transform: translate(6px, -6px);&nbsp; &nbsp; transform: translate(6px, -6px);&nbsp; &nbsp; transform: translate(6px, -6px);&nbsp; &nbsp; transform: translate(6px, -6px);&nbsp; &nbsp; transform: translate(6px, -6px);&nbsp; &nbsp; transform: translate(6px, -6px);&nbsp; &nbsp; transform: translate(6px, -6px);</div>','2022-12-06 02:07:56'),
(23,'Ilzammmmmmmmmm','/~ar/dasarWeb/TugasBesar/img/article/img1667541934.png',7,-256761742,'<div>\"img\" . rand() . \".jpg\"\"img\" . rand() . \".jpg\"\"img\" . rand() . \".jpg\"\"img\" . rand() . \".jpg\"\"img\" . rand() . \".jpg\"\"img\" . rand() . \".jpg\"\"img\" . rand() . \".jpg\"\"img\" . rand() . \".jpg\"\"img\" . rand() . \".jpg\"</div>','2022-12-06 02:07:56'),
(25,'tesasdna','/~ar/dasarWeb/TugasBesar/img/article/img543846087.png',5,1979821762,'<div>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere accusamus ea dolor officiis assumenda eaque quae dolore earum beatae, commodi rerum quasi quis animi sequi sed quam amet ad nesciunt quibusdam odit ratione. Vitae aliquam ex quisquam maiores exercitationem ad impedit nesciunt quibusdam dolore asperiores ea iste quasi atque officiis qui earum accusamus quis, debitis aut voluptates sunt suscipit eius sed. Labore velit officia odio soluta a harum perspiciatis culpa nemo ad reiciendis cupiditate vitae quisquam adipisci repudiandae possimus dolorum veniam temporibus minima dignissimos, pariatur quae quas. Numquam, voluptatibus aliquid, explicabo repellat eius unde natus totam consectetur mollitia libero obcaecati?<br><br>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere accusamus ea dolor officiis assumenda eaque quae dolore earum beatae, commodi rerum quasi quis animi sequi sed quam amet ad nesciunt quibusdam odit ratione. Vitae aliquam ex quisquam maiores exercitationem ad impedit nesciunt quibusdam dolore asperiores ea iste quasi atque officiis qui earum accusamus quis, debitis aut voluptates sunt suscipit eius sed. Labore velit officia odio soluta a harum perspiciatis culpa nemo ad reiciendis cupiditate vitae quisquam adipisci repudiandae possimus dolorum veniam temporibus minima dignissimos, pariatur quae quas. Numquam, voluptatibus aliquid, explicabo repellat eius unde natus totam consectetur mollitia libero obcaecati?<br><br></div>','2022-12-06 04:03:53');
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES
(1,'Social Media'),
(2,'Games'),
(3,'Health'),
(4,'Technology'),
(5,'Music'),
(6,'Economy'),
(7,'Uncategorized');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(13) NOT NULL,
  `article_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `article_id` (`article_id`),
  CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `article` (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES
(4,-256761742,19,'hanya tes saja','2022-12-06 01:55:19'),
(5,1979821762,19,'Nice Article','2022-12-06 02:16:10'),
(6,1979821762,20,'wow','2022-12-06 02:23:37'),
(7,1979821762,20,'again','2022-12-06 02:24:26'),
(8,1979821762,20,'adsfg','2022-12-06 04:05:54');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(13) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES
(-1895082438,'userhh','test@gamc.co','$2y$10$MIrYB4o2NvG4H5wfn4JRSeEtQETiSv7PIS29KBZ0sEUtxu8D9fZS6',0),
(-1754684920,'asduk','asduk@go.co','$2y$10$g3CZme3Vq.K3LMhsB42Ieu/owk5Ju6KPMU6HmfKX/AE/jA57vhB5K',0),
(-393713445,'uasa123','uck12@gam.co','$2y$10$SQDSidVa52gbsZPBsbVQhOw342YLtCbeiRH/40zb2Te2HTwn4oMMy',0),
(-256761742,'admin','admin@admin','$2y$10$x4..BOW/LedcsstFKA50UeN4lQHxmaOQYkyZYigW0JcRVpou7Et5u',1),
(-223848381,'emailbaru','emailbaru@go.id','$2y$10$Ctk0y3H7d9qRqnofOY3ydOKb/kuRfBX.AgdB72CHY6czs3XwptQzC',0),
(4,'admin123','admin@polteksuhat.com','$2y$10$8XKoWrfleezsN7YKHI11Je2Acu0IVN5F8samsK4NqFeFzlxMRk9eq',1),
(17,'caklukman','caklukman@usman.com','$2y$10$AqQTvVDt7C.1Y82jdx6GbeWUvXadhH2/fUrf4zRmBS1Mgi1CZoETi',0),
(6385,'userbaru123','userbaru123@email.co','$2y$10$NFQwwHiv9Aa8AdkGZUEojeH2LmX5KZEGBRFh2WO6XYusWaMmBMiR.',0),
(1669722,'testering123','testing78@emial.co','$2y$10$wS2s9qXekG4p4Z0S5S./gOffqu231nfurXzfbLThTUtTSguEFLkTm',0),
(1979821762,'userrr','userrr@mail','$2y$10$Oh6ggA9U5Q4a/uL8hYrDRuwhFK06YUtUreEmpAob.7HbAEIIvCZmO',0),
(2147483647,'userbaru','userbaru@gakadnsja.co','$2y$10$f1ML7Oi6NnYEHxjnnPz/HOqc1rIw1cGmGkViDewxY6uwZwmf2urYG',0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-06 11:56:17
