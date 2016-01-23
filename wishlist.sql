CREATE DATABASE  IF NOT EXISTS `wishlist` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `wishlist`;
-- MySQL dump 10.13  Distrib 5.6.24, for osx10.8 (x86_64)
--
-- Host: 127.0.0.1    Database: wishlist
-- ------------------------------------------------------
-- Server version	5.5.42

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
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `house_num` varchar(45) DEFAULT NULL,
  `street` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zipcode` int(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `billings`
--

DROP TABLE IF EXISTS `billings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `billings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`user_id`),
  KEY `fk_billings_users1_idx` (`user_id`),
  KEY `fk_billings_addresses1_idx` (`address_id`),
  CONSTRAINT `fk_billings_addresses1` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_billings_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `billings`
--

LOCK TABLES `billings` WRITE;
/*!40000 ALTER TABLE `billings` DISABLE KEYS */;
/*!40000 ALTER TABLE `billings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carts` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `recipient_id` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`,`product_id`),
  KEY `fk_users_has_products_products1_idx` (`product_id`),
  KEY `fk_users_has_products_users1_idx` (`user_id`),
  CONSTRAINT `fk_users_has_products_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_products_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dislikes`
--

DROP TABLE IF EXISTS `dislikes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dislikes` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`product_id`,`user_id`),
  KEY `fk_products_has_users_users1_idx` (`user_id`),
  KEY `fk_products_has_users_products1_idx` (`product_id`),
  CONSTRAINT `fk_products_has_users_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_has_users_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dislikes`
--

LOCK TABLES `dislikes` WRITE;
/*!40000 ALTER TABLE `dislikes` DISABLE KEYS */;
INSERT INTO `dislikes` VALUES (9,6,'2015-10-29 21:21:48'),(10,6,'2015-10-29 21:25:17'),(14,6,'2015-10-29 22:54:26');
/*!40000 ALTER TABLE `dislikes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friend_requests`
--

DROP TABLE IF EXISTS `friend_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friend_requests` (
  `requestor_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`requestor_id`,`recipient_id`),
  KEY `fk_users_has_users_users3_idx` (`recipient_id`),
  KEY `fk_users_has_users_users2_idx` (`requestor_id`),
  CONSTRAINT `fk_users_has_users_users2` FOREIGN KEY (`requestor_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_users_users3` FOREIGN KEY (`recipient_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friend_requests`
--

LOCK TABLES `friend_requests` WRITE;
/*!40000 ALTER TABLE `friend_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `friend_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friendships`
--

DROP TABLE IF EXISTS `friendships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friendships` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`,`friend_id`),
  KEY `fk_users_has_users_users1_idx` (`friend_id`),
  KEY `fk_users_has_users_users_idx` (`user_id`),
  CONSTRAINT `fk_users_has_users_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_users_users1` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friendships`
--

LOCK TABLES `friendships` WRITE;
/*!40000 ALTER TABLE `friendships` DISABLE KEYS */;
INSERT INTO `friendships` VALUES (6,7,'2015-10-29 22:56:54'),(7,6,'2015-10-29 22:56:54');
/*!40000 ALTER TABLE `friendships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Tesla Model S','A Good Car',100000,'http://buyersguide.caranddriver.com/media/assets/submodel/6667.jpg','2015-10-30 03:09:00','2015-10-30 03:09:00'),(2,'Toyota Rav4','A SUV manufactured by Toyota',24000,'http://images.thecarconnection.com/sml/2015-toyota-rav4-fwd-4-door-limited-natl-angular-front-exterior-view_100488134_s.jpg','2015-10-30 03:09:00','2015-10-30 03:09:00'),(3,'Double Cheeseburger','Double Cheeseburger Great for Sustenance',2.49,'https://s3.amazonaws.com/rapgenius/20121008-daily-double-mcdonalds-3.jpg','2015-10-30 03:16:21','2015-10-30 03:16:21'),(4,'Bananas','High in Potassium!',1.99,'http://media.npr.org/assets/img/2011/08/19/istock_000017061174small_wide-69bb958273302dc0a2ecaf5050d94a2beeee3376.jpg?s=6','2015-10-30 03:16:21','2015-10-30 03:16:21'),(5,'Pacman Game','A classical game',0.99,'http://www.zooradio.gr/wp-content/uploads/2015/01/pac-man-simple-games-1440x2560.jpg','2015-10-30 03:16:21','2015-10-30 03:16:21'),(6,'Game Boy','Nintendo\'s First Hand Held Console',999.99,'https://upload.wikimedia.org/wikipedia/commons/f/f4/Game-Boy-FL.jpg','2015-10-30 03:16:21','2015-10-30 03:16:21'),(7,'Toilet','An essential of every house',79.99,'http://www.americanstandard-us.com/assets/images/components/033056711903.jpg','2015-10-30 03:16:21','2015-10-30 03:16:21'),(8,'Ping Pong Balls','A rare commodity in Coding Dojo!',9.99,'https://myslate-media-prod.s3.amazonaws.com/picks/promo_images/ping_pong_balls.jpg','2015-10-30 03:16:21','2015-10-30 03:16:21'),(9,'$50 Gift Card','A generic gift, lame.',50,'http://www.rhodyoysters.com/wp-content/uploads/wp-checkout/images/gift-card-1370463543.jpg','2015-10-30 03:16:21','2015-10-30 03:16:21'),(10,'Crab Dinner','Crabs, Why Not?',6.99,'http://media.hamptonroads.com/cache/files/images/319111.jpg','2015-10-30 03:16:21','2015-10-30 03:16:21'),(11,'Mystery Gift','A surprise that MIGHT be worth $100',99.99,'http://images4.fanpop.com/image/photos/22200000/Christmas-gifts-christmas-gifts-22231228-2048-2048.jpg','2015-10-30 03:16:21','2015-10-30 03:16:21'),(12,'Ugly Sweater','A Christmas Classic',19.99,'http://www.uglychristmassweater.com/wp-content/uploads/2012/12/merry-christmas-filthy-animal-christmas-sweater.jpg','2015-10-30 03:16:21','2015-10-30 03:16:21'),(13,'Coffee','Who couldn\'t use a morning jolt?',3.99,'http://cdn.marksdailyapple.com/wordpress/wp-content/themes/Marks-Daily-Apple-Responsive/images/blog2/coffee.jpg','2015-10-30 03:16:21','2015-10-30 03:16:21'),(14,'Movie','For the movie of your choice',11.99,'http://www.yummymath.com/wp-content/uploads/movie_tickets.jpg','2015-10-30 03:16:21','2015-10-30 03:16:21'),(15,'Arizona Drink','1 Flavor Only',0.99,'http://www.pyramidswholesale.com/media/catalog/product/cache/1/image/800x800/9df78eab33525d08d6e5fb8d27136e95/e/n/enhanced-buzz-28703-1345482514-1.jpg','2015-10-30 03:16:21','2015-10-30 03:16:21'),(16,'Money','It\'s a surprise!',9.99,'http://www.wall-street.com/wp-content/uploads/2013/11/Money-100s.jpg','2015-10-30 03:16:21','2015-10-30 03:16:21'),(17,'Green Belt','Everyone can get a green belt now!',19.99,'http://www.budomartamerica.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/b/t/bt-club-gr_1_1.jpg','2015-10-30 03:16:21','2015-10-30 03:16:21'),(18,'XBOX One','Newest generation XBOX',399.99,'http://compass.xboxlive.com/assets/93/76/93764cb0-0ab4-4400-8539-fbd37958d1de.png?n=Meet1.png','2015-10-30 03:16:21','2015-10-30 03:16:21'),(19,'Chow Mein','A classic in a chinese restaurant',8.95,'https://chinakingporterranch.files.wordpress.com/2013/05/img_1591.jpg','2015-10-30 03:16:21','2015-10-30 03:16:21'),(20,'Pizza','Delicious',11.99,'http://www.nicolapizza.com/img/pizza.png','2015-10-30 03:16:21','2015-10-30 03:16:21'),(21,'Whiteboard Markers','A much needed commodity',10.99,'http://www.china-pen-supplier.com/UploadFiles/2008111822422583.jpg','2015-10-30 03:16:21','2015-10-30 03:16:21'),(22,'Deck of Cards','Fun Times',6.99,'http://www.futilitycloset.com/wp-content/uploads/2007/12/2007-12-02-the-kruskal-count.jpg','2015-10-30 03:16:21','2015-10-30 03:16:21'),(23,'Beer','21+',3.95,'http://hypefreshmag.com/wp-content/uploads/2015/06/beer-genes-app-will-help-people-pick-beers.jpg','2015-10-30 03:16:21','2015-10-30 03:16:21');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shippings`
--

DROP TABLE IF EXISTS `shippings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shippings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`user_id`),
  KEY `fk_shippings_users1_idx` (`user_id`),
  KEY `fk_shippings_addresses1_idx` (`address_id`),
  CONSTRAINT `fk_shippings_addresses1` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_shippings_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shippings`
--

LOCK TABLES `shippings` WRITE;
/*!40000 ALTER TABLE `shippings` DISABLE KEYS */;
/*!40000 ALTER TABLE `shippings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `salt` varchar(45) DEFAULT NULL,
  `billing_id` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (6,'Jeff','C','j@1.com','d0a0e1c629f49ae0588ce4b225bb2283','af3c128afe5ed78d0b36a2a85bbd52c4965704f74d51',NULL,'2015-10-29 21:21:38','2015-10-29 21:21:38'),(7,'Tom','Sawyer','j@2.com','50ecc7f2a1ce42919ecbd143d1a13794','0d7baed724bdcd846ce9f5baa465fd8984b1e5b725ae',NULL,'2015-10-29 22:55:55','2015-10-29 22:55:55');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wishlists` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`,`product_id`),
  KEY `fk_users_has_products1_products1_idx` (`product_id`),
  KEY `fk_users_has_products1_users1_idx` (`user_id`),
  CONSTRAINT `fk_users_has_products1_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_products1_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlists`
--

LOCK TABLES `wishlists` WRITE;
/*!40000 ALTER TABLE `wishlists` DISABLE KEYS */;
INSERT INTO `wishlists` VALUES (6,3,'2015-10-29 22:54:13'),(6,8,'2015-10-29 23:33:51'),(6,15,'2015-10-29 23:32:45'),(6,16,'2015-10-29 23:32:46'),(6,20,'2015-10-29 21:26:57'),(7,8,'2015-10-29 22:56:10');
/*!40000 ALTER TABLE `wishlists` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-29 23:35:06
