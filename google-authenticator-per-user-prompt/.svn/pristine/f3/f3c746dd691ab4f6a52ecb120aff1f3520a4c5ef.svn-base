-- MySQL dump 10.13  Distrib 5.5.49, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: wordpress_unit_tests
-- ------------------------------------------------------
-- Server version	5.5.49-0ubuntu0.14.04.1

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
-- Table structure for table `wp_commentmeta`
--

DROP TABLE IF EXISTS `wp_commentmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_commentmeta`
--

LOCK TABLES `wp_commentmeta` WRITE;
/*!40000 ALTER TABLE `wp_commentmeta` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_commentmeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_comments`
--

DROP TABLE IF EXISTS `wp_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_comments`
--

LOCK TABLES `wp_comments` WRITE;
/*!40000 ALTER TABLE `wp_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_links`
--

DROP TABLE IF EXISTS `wp_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_notes` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_links`
--

LOCK TABLES `wp_links` WRITE;
/*!40000 ALTER TABLE `wp_links` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_options`
--

DROP TABLE IF EXISTS `wp_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=InnoDB AUTO_INCREMENT=15594 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_options`
--

LOCK TABLES `wp_options` WRITE;
/*!40000 ALTER TABLE `wp_options` DISABLE KEYS */;
INSERT INTO `wp_options` VALUES (3,'siteurl','http://wp.dev/','yes'),(4,'blogname','General WordPress Sandbox','yes'),(5,'blogdescription','Just another WordPress site','yes'),(6,'users_can_register','0','yes'),(7,'admin_email','ian@iandunn.name','yes'),(8,'start_of_week','1','yes'),(9,'use_balanceTags','0','yes'),(10,'use_smilies','1','yes'),(11,'require_name_email','1','yes'),(12,'comments_notify','1','yes'),(13,'posts_per_rss','10','yes'),(14,'rss_use_excerpt','0','yes'),(15,'mailserver_url','mail.example.com','yes'),(16,'mailserver_login','login@example.com','yes'),(17,'mailserver_pass','password','yes'),(18,'mailserver_port','110','yes'),(19,'default_category','1','yes'),(20,'default_comment_status','open','yes'),(21,'default_ping_status','open','yes'),(22,'default_pingback_flag','0','yes'),(23,'posts_per_page','10','yes'),(24,'date_format','F j, Y','yes'),(25,'time_format','g:i a','yes'),(26,'links_updated_date_format','F j, Y g:i a','yes'),(30,'comment_moderation','0','yes'),(31,'moderation_notify','1','yes'),(32,'permalink_structure','/%postname%/','yes'),(34,'hack_file','0','yes'),(35,'blog_charset','UTF-8','yes'),(36,'moderation_keys','','no'),(37,'active_plugins','a:2:{i:0;s:50:\"google-authenticator-per-user-prompt/bootstrap.php\";i:1;s:45:\"google-authenticator/google-authenticator.php\";}','yes'),(38,'home','http://wp.dev/','yes'),(39,'category_base','','yes'),(40,'ping_sites','http://rpc.pingomatic.com/','yes'),(42,'comment_max_links','2','yes'),(43,'gmt_offset','0','yes'),(44,'default_email_category','1','yes'),(45,'recently_edited','','no'),(46,'template','twentythirteen','yes'),(47,'stylesheet','twentythirteen','yes'),(48,'comment_whitelist','1','yes'),(49,'blacklist_keys','','no'),(50,'comment_registration','0','yes'),(51,'html_type','text/html','yes'),(52,'use_trackback','0','yes'),(53,'default_role','subscriber','yes'),(54,'db_version','37965','yes'),(55,'uploads_use_yearmonth_folders','1','yes'),(56,'upload_path','','yes'),(57,'blog_public','0','yes'),(58,'default_link_category','2','yes'),(59,'show_on_front','posts','yes'),(60,'tag_base','','yes'),(61,'show_avatars','1','yes'),(62,'avatar_rating','G','yes'),(63,'upload_url_path','','yes'),(64,'thumbnail_size_w','150','yes'),(65,'thumbnail_size_h','150','yes'),(66,'thumbnail_crop','1','yes'),(67,'medium_size_w','300','yes'),(68,'medium_size_h','300','yes'),(69,'avatar_default','mystery','yes'),(70,'large_size_w','1024','yes'),(71,'large_size_h','1024','yes'),(72,'image_default_link_type','file','yes'),(73,'image_default_size','','yes'),(74,'image_default_align','','yes'),(75,'close_comments_for_old_posts','0','yes'),(76,'close_comments_days_old','14','yes'),(77,'thread_comments','1','yes'),(78,'thread_comments_depth','5','yes'),(79,'page_comments','0','yes'),(80,'comments_per_page','50','yes'),(81,'default_comments_page','newest','yes'),(82,'comment_order','asc','yes'),(83,'sticky_posts','a:1:{i:0;i:1241;}','yes'),(84,'widget_categories','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(85,'widget_text','a:2:{i:2;a:0:{}s:12:\"_multiwidget\";i:1;}','yes'),(86,'widget_rss','a:2:{i:2;a:0:{}s:12:\"_multiwidget\";i:1;}','yes'),(87,'uninstall_plugins','a:0:{}','no'),(88,'timezone_string','','yes'),(89,'page_for_posts','0','yes'),(90,'page_on_front','0','yes'),(91,'default_post_format','0','yes'),(92,'link_manager_enabled','0','yes'),(93,'initial_db_version','26691','yes'),(94,'wp_user_roles','a:5:{s:13:\"administrator\";a:2:{s:4:\"name\";s:13:\"Administrator\";s:12:\"capabilities\";a:61:{s:13:\"switch_themes\";b:1;s:11:\"edit_themes\";b:1;s:16:\"activate_plugins\";b:1;s:12:\"edit_plugins\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_files\";b:1;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:6:\"import\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:8:\"level_10\";b:1;s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:1;s:12:\"create_users\";b:1;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:1;s:14:\"delete_plugins\";b:1;s:15:\"install_plugins\";b:1;s:13:\"update_themes\";b:1;s:14:\"install_themes\";b:1;s:11:\"update_core\";b:1;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:1;s:13:\"promote_users\";b:1;s:18:\"edit_theme_options\";b:1;s:13:\"delete_themes\";b:1;s:6:\"export\";b:1;}}s:6:\"editor\";a:2:{s:4:\"name\";s:6:\"Editor\";s:12:\"capabilities\";a:34:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;}}s:6:\"author\";a:2:{s:4:\"name\";s:6:\"Author\";s:12:\"capabilities\";a:10:{s:12:\"upload_files\";b:1;s:10:\"edit_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:22:\"delete_published_posts\";b:1;}}s:11:\"contributor\";a:2:{s:4:\"name\";s:11:\"Contributor\";s:12:\"capabilities\";a:5:{s:10:\"edit_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;}}s:10:\"subscriber\";a:2:{s:4:\"name\";s:10:\"Subscriber\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:7:\"level_0\";b:1;}}}','yes'),(95,'widget_search','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(96,'widget_recent-posts','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(97,'widget_recent-comments','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(98,'widget_archives','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(99,'widget_meta','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(100,'sidebars_widgets','a:4:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:0:{}s:9:\"sidebar-2\";a:0:{}s:13:\"array_version\";i:3;}','yes'),(101,'cron','a:7:{i:1461722350;a:1:{s:13:\"pf_10_seconds\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"10-seconds\";s:4:\"args\";a:0:{}s:8:\"interval\";i:10;}}}i:1461722370;a:1:{s:13:\"pf_60_seconds\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"60-seconds\";s:4:\"args\";a:0:{}s:8:\"interval\";i:60;}}}i:1461723135;a:1:{s:30:\"wp_scheduled_auto_draft_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1461725473;a:1:{s:20:\"jetpack_clean_nonces\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"hourly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:3600;}}}i:1461742408;a:3:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1461742413;a:1:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}s:7:\"version\";i:2;}','yes'),(103,'_transient_random_seed','fa54e1768565c9fe98050fd1ba28abd2','yes'),(104,'auth_key','n@/R5qB+znh7!Cj<$48*>o@r(2CYjXgYpGxM`*nntpsqtaYw*bI{h^1n`yKx:2SN','yes'),(105,'auth_salt','{|V_)S+H^77q8Ad!kp9NnXVpeuInE95v.nM%Ae1lSqI),oRD3LDY2W.V4U-4B93C','yes'),(106,'logged_in_key','8@EyXzH2O7VU/}+3)WPb)|>s.Vun7uL od^Wd&XdEr@(,Fv&)Y&C.-lgN{7hb}n)','yes'),(107,'logged_in_salt','l+.b]RJDwala `93l5_|lJis?6M)V]b<%w&<hvJwsyAUqd{9)~omohAyf+DTVyA:','yes'),(108,'nonce_key','f`@|gK+R)L|u6/gO(~N6SC2[Rey+tY8zGDm.8SR8xD$1A%=v,#D-Wh`H:U}(J#I}','yes'),(109,'nonce_salt','n:?}^-81/-]nC<%=ZQVG)ndwa^?%}q7yfZ!}<Zy;DW_b&dg@nq&jpZX[tPHx9@8{','yes'),(154,'recently_activated','a:0:{}','yes'),(190,'category_children','a:2:{i:22;a:5:{i:0;i:37;i:1;i:38;i:2;i:39;i:3;i:40;i:4;i:41;}i:39;a:1:{i:0;i:42;}}','yes'),(238,'template_root','/srv/www/wp.dev/wordpress/wp-content/themes','yes'),(239,'stylesheet_root','/srv/www/wp.dev/wordpress/wp-content/themes','yes'),(240,'current_theme','Twenty Thirteen','yes'),(241,'theme_mods__s','a:2:{i:0;b:0;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1395553321;s:4:\"data\";a:2:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}}}}','yes'),(242,'theme_switched','','yes'),(948,'_transient_all_the_cool_cats','42','yes'),(989,'theme_mods_twentyfourteen','a:1:{s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1396044779;s:4:\"data\";a:4:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}s:9:\"sidebar-2\";a:0:{}s:9:\"sidebar-3\";a:0:{}}}}','yes'),(7042,'db_upgraded','','yes'),(7472,'widget_pages','a:2:{i:2;a:0:{}s:12:\"_multiwidget\";i:1;}','yes'),(7473,'widget_calendar','a:2:{i:2;a:0:{}s:12:\"_multiwidget\";i:1;}','yes'),(7474,'widget_links','a:2:{i:2;a:0:{}s:12:\"_multiwidget\";i:1;}','yes'),(7475,'widget_tag_cloud','a:2:{i:2;a:0:{}s:12:\"_multiwidget\";i:1;}','yes'),(7476,'widget_nav_menu','a:2:{i:2;a:0:{}s:12:\"_multiwidget\";i:1;}','yes'),(7492,'embed_size_w','','yes'),(7493,'embed_size_h','600','yes'),(7504,'dashboard_widget_options','a:4:{s:25:\"dashboard_recent_comments\";a:1:{s:5:\"items\";i:5;}s:24:\"dashboard_incoming_links\";a:5:{s:4:\"home\";s:13:\"http://wp.dev\";s:4:\"link\";s:89:\"http://blogsearch.google.com/blogsearch?scoring=d&partner=wordpress&q=link:http://wp.dev/\";s:3:\"url\";s:122:\"http://blogsearch.google.com/blogsearch_feeds?scoring=d&ie=utf-8&num=10&output=rss&partner=wordpress&q=link:http://wp.dev/\";s:5:\"items\";i:10;s:9:\"show_date\";b:0;}s:17:\"dashboard_primary\";a:7:{s:4:\"link\";s:26:\"http://wordpress.org/news/\";s:3:\"url\";s:31:\"http://wordpress.org/news/feed/\";s:5:\"title\";s:14:\"WordPress Blog\";s:5:\"items\";i:2;s:12:\"show_summary\";i:1;s:11:\"show_author\";i:0;s:9:\"show_date\";i:1;}s:19:\"dashboard_secondary\";a:7:{s:4:\"link\";s:28:\"http://planet.wordpress.org/\";s:3:\"url\";s:33:\"http://planet.wordpress.org/feed/\";s:5:\"title\";s:20:\"Other WordPress News\";s:5:\"items\";i:5;s:12:\"show_summary\";i:0;s:11:\"show_author\";i:0;s:9:\"show_date\";i:0;}}','yes'),(15464,'WPLANG','','yes'),(15468,'rewrite_rules','a:85:{s:11:\"^wp-json/?$\";s:22:\"index.php?rest_route=/\";s:14:\"^wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:47:\"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:42:\"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:23:\"category/(.+?)/embed/?$\";s:46:\"index.php?category_name=$matches[1]&embed=true\";s:35:\"category/(.+?)/page/?([0-9]{1,})/?$\";s:53:\"index.php?category_name=$matches[1]&paged=$matches[2]\";s:17:\"category/(.+?)/?$\";s:35:\"index.php?category_name=$matches[1]\";s:44:\"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:39:\"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:20:\"tag/([^/]+)/embed/?$\";s:36:\"index.php?tag=$matches[1]&embed=true\";s:32:\"tag/([^/]+)/page/?([0-9]{1,})/?$\";s:43:\"index.php?tag=$matches[1]&paged=$matches[2]\";s:14:\"tag/([^/]+)/?$\";s:25:\"index.php?tag=$matches[1]\";s:45:\"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:40:\"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:21:\"type/([^/]+)/embed/?$\";s:44:\"index.php?post_format=$matches[1]&embed=true\";s:33:\"type/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?post_format=$matches[1]&paged=$matches[2]\";s:15:\"type/([^/]+)/?$\";s:33:\"index.php?post_format=$matches[1]\";s:12:\"robots\\.txt$\";s:18:\"index.php?robots=1\";s:48:\".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$\";s:18:\"index.php?feed=old\";s:20:\".*wp-app\\.php(/.*)?$\";s:19:\"index.php?error=403\";s:18:\".*wp-register.php$\";s:23:\"index.php?register=true\";s:32:\"feed/(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:27:\"(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:8:\"embed/?$\";s:21:\"index.php?&embed=true\";s:20:\"page/?([0-9]{1,})/?$\";s:28:\"index.php?&paged=$matches[1]\";s:41:\"comments/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:36:\"comments/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:17:\"comments/embed/?$\";s:21:\"index.php?&embed=true\";s:44:\"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:39:\"search/(.+)/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:20:\"search/(.+)/embed/?$\";s:34:\"index.php?s=$matches[1]&embed=true\";s:32:\"search/(.+)/page/?([0-9]{1,})/?$\";s:41:\"index.php?s=$matches[1]&paged=$matches[2]\";s:14:\"search/(.+)/?$\";s:23:\"index.php?s=$matches[1]\";s:47:\"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:42:\"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:23:\"author/([^/]+)/embed/?$\";s:44:\"index.php?author_name=$matches[1]&embed=true\";s:35:\"author/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?author_name=$matches[1]&paged=$matches[2]\";s:17:\"author/([^/]+)/?$\";s:33:\"index.php?author_name=$matches[1]\";s:69:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:45:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$\";s:74:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]\";s:39:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$\";s:63:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]\";s:56:\"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:51:\"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:32:\"([0-9]{4})/([0-9]{1,2})/embed/?$\";s:58:\"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true\";s:44:\"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]\";s:26:\"([0-9]{4})/([0-9]{1,2})/?$\";s:47:\"index.php?year=$matches[1]&monthnum=$matches[2]\";s:43:\"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:38:\"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:19:\"([0-9]{4})/embed/?$\";s:37:\"index.php?year=$matches[1]&embed=true\";s:31:\"([0-9]{4})/page/?([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&paged=$matches[2]\";s:13:\"([0-9]{4})/?$\";s:26:\"index.php?year=$matches[1]\";s:27:\".?.+?/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\".?.+?/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\".?.+?/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"(.?.+?)/embed/?$\";s:41:\"index.php?pagename=$matches[1]&embed=true\";s:20:\"(.?.+?)/trackback/?$\";s:35:\"index.php?pagename=$matches[1]&tb=1\";s:40:\"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:35:\"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:28:\"(.?.+?)/page/?([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&paged=$matches[2]\";s:35:\"(.?.+?)/comment-page-([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&cpage=$matches[2]\";s:24:\"(.?.+?)(?:/([0-9]+))?/?$\";s:47:\"index.php?pagename=$matches[1]&page=$matches[2]\";s:27:\"[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\"[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\"[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\"[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\"[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\"[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"([^/]+)/embed/?$\";s:37:\"index.php?name=$matches[1]&embed=true\";s:20:\"([^/]+)/trackback/?$\";s:31:\"index.php?name=$matches[1]&tb=1\";s:40:\"([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?name=$matches[1]&feed=$matches[2]\";s:35:\"([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?name=$matches[1]&feed=$matches[2]\";s:28:\"([^/]+)/page/?([0-9]{1,})/?$\";s:44:\"index.php?name=$matches[1]&paged=$matches[2]\";s:35:\"([^/]+)/comment-page-([0-9]{1,})/?$\";s:44:\"index.php?name=$matches[1]&cpage=$matches[2]\";s:24:\"([^/]+)(?:/([0-9]+))?/?$\";s:43:\"index.php?name=$matches[1]&page=$matches[2]\";s:16:\"[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:26:\"[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:46:\"[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:41:\"[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:41:\"[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:22:\"[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";}','yes'),(15557,'_site_transient_update_plugins','O:8:\"stdClass\":5:{s:12:\"last_checked\";i:1461722339;s:7:\"checked\";a:26:{s:31:\"airplane-mode/airplane-mode.php\";s:5:\"0.1.1\";s:19:\"akismet/akismet.php\";s:6:\"3.1.10\";s:42:\"basic-google-maps-placemarks/bootstrap.php\";s:9:\"2.0-alpha\";s:29:\"basic-todo-list/bootstrap.php\";s:3:\"0.1\";s:46:\"camptix-shared-ticket-quantities/bootstrap.php\";s:3:\"0.1\";s:41:\"email-post-changes/email-post-changes.php\";s:5:\"1.7.1\";s:24:\"filters-ui/bootstrap.php\";s:3:\"0.1\";s:45:\"google-authenticator/google-authenticator.php\";s:4:\"0.47\";s:60:\"google-authenticator-encourage-user-activation/bootstrap.php\";s:3:\"0.1\";s:50:\"google-authenticator-per-user-prompt/bootstrap.php\";s:3:\"0.5\";s:27:\"ostrichcize/ostrichcize.php\";s:5:\"0.1.1\";s:31:\"overwrite-uploads/bootstrap.php\";s:3:\"1.1\";s:49:\"p2-new-post-categories/p2-new-post-categories.php\";s:3:\"0.3\";s:51:\"password-confirm-action/password-confirm-action.php\";s:5:\"0.2.0\";s:40:\"quick-navigation-interface/bootstrap.php\";s:3:\"0.6\";s:55:\"re-abolish-slavery-ribbon/re-abolish-slavery-ribbon.php\";s:5:\"1.0.5\";s:43:\"react-product-table/react-product-table.php\";s:0:\"\";s:36:\"rescue-children-banner/bootstrap.php\";s:3:\"1.0\";s:34:\"simpletest-for-wordpress/start.php\";s:3:\"1.1\";s:31:\"sweatshop-warning/bootstrap.php\";s:3:\"0.1\";s:46:\"toppa-plugin-libraries-for-wordpress/start.php\";s:5:\"1.3.7\";s:27:\"vip-scanner/vip-scanner.php\";s:3:\"0.7\";s:41:\"wordpress-importer/wordpress-importer.php\";s:5:\"0.6.1\";s:39:\"wordpress-plugin-skeleton/bootstrap.php\";s:4:\"0.4a\";s:45:\"wp-react-boilerplate/wp-react-boilerplate.php\";s:0:\"\";s:41:\"wp-super-cache-cli/wp-super-cache-cli.php\";s:3:\"1.0\";}s:8:\"response\";a:0:{}s:12:\"translations\";a:0:{}s:9:\"no_update\";a:17:{s:19:\"akismet/akismet.php\";O:8:\"stdClass\":6:{s:2:\"id\";s:2:\"15\";s:4:\"slug\";s:7:\"akismet\";s:6:\"plugin\";s:19:\"akismet/akismet.php\";s:11:\"new_version\";s:6:\"3.1.10\";s:3:\"url\";s:38:\"https://wordpress.org/plugins/akismet/\";s:7:\"package\";s:57:\"https://downloads.wordpress.org/plugin/akismet.3.1.10.zip\";}s:42:\"basic-google-maps-placemarks/bootstrap.php\";O:8:\"stdClass\":7:{s:2:\"id\";s:5:\"22901\";s:4:\"slug\";s:28:\"basic-google-maps-placemarks\";s:6:\"plugin\";s:42:\"basic-google-maps-placemarks/bootstrap.php\";s:11:\"new_version\";s:6:\"1.10.5\";s:3:\"url\";s:59:\"https://wordpress.org/plugins/basic-google-maps-placemarks/\";s:7:\"package\";s:78:\"https://downloads.wordpress.org/plugin/basic-google-maps-placemarks.1.10.5.zip\";s:14:\"upgrade_notice\";s:77:\"BGMP 1.10.5 prepares the plugin to support language packs from WordPress.org.\";}s:41:\"email-post-changes/email-post-changes.php\";O:8:\"stdClass\":6:{s:2:\"id\";s:5:\"11832\";s:4:\"slug\";s:18:\"email-post-changes\";s:6:\"plugin\";s:41:\"email-post-changes/email-post-changes.php\";s:11:\"new_version\";s:5:\"1.7.1\";s:3:\"url\";s:49:\"https://wordpress.org/plugins/email-post-changes/\";s:7:\"package\";s:67:\"https://downloads.wordpress.org/plugin/email-post-changes.1.7.1.zip\";}s:45:\"google-authenticator/google-authenticator.php\";O:8:\"stdClass\":6:{s:2:\"id\";s:5:\"22456\";s:4:\"slug\";s:20:\"google-authenticator\";s:6:\"plugin\";s:45:\"google-authenticator/google-authenticator.php\";s:11:\"new_version\";s:4:\"0.47\";s:3:\"url\";s:51:\"https://wordpress.org/plugins/google-authenticator/\";s:7:\"package\";s:68:\"https://downloads.wordpress.org/plugin/google-authenticator.0.47.zip\";}s:60:\"google-authenticator-encourage-user-activation/bootstrap.php\";O:8:\"stdClass\":7:{s:2:\"id\";s:5:\"46334\";s:4:\"slug\";s:46:\"google-authenticator-encourage-user-activation\";s:6:\"plugin\";s:60:\"google-authenticator-encourage-user-activation/bootstrap.php\";s:11:\"new_version\";s:3:\"0.1\";s:3:\"url\";s:77:\"https://wordpress.org/plugins/google-authenticator-encourage-user-activation/\";s:7:\"package\";s:93:\"https://downloads.wordpress.org/plugin/google-authenticator-encourage-user-activation.0.1.zip\";s:14:\"upgrade_notice\";s:16:\"Initial release.\";}s:50:\"google-authenticator-per-user-prompt/bootstrap.php\";O:8:\"stdClass\":7:{s:2:\"id\";s:5:\"46240\";s:4:\"slug\";s:36:\"google-authenticator-per-user-prompt\";s:6:\"plugin\";s:50:\"google-authenticator-per-user-prompt/bootstrap.php\";s:11:\"new_version\";s:3:\"0.5\";s:3:\"url\";s:67:\"https://wordpress.org/plugins/google-authenticator-per-user-prompt/\";s:7:\"package\";s:83:\"https://downloads.wordpress.org/plugin/google-authenticator-per-user-prompt.0.5.zip\";s:14:\"upgrade_notice\";s:93:\"This version fixes a bug where the &#039;Remember Me&#039; flag was ignored while logging in.\";}s:27:\"ostrichcize/ostrichcize.php\";O:8:\"stdClass\":7:{s:2:\"id\";s:5:\"36513\";s:4:\"slug\";s:11:\"ostrichcize\";s:6:\"plugin\";s:27:\"ostrichcize/ostrichcize.php\";s:11:\"new_version\";s:3:\"0.1\";s:3:\"url\";s:42:\"https://wordpress.org/plugins/ostrichcize/\";s:7:\"package\";s:58:\"https://downloads.wordpress.org/plugin/ostrichcize.0.1.zip\";s:14:\"upgrade_notice\";s:15:\"Initial Release\";}s:31:\"overwrite-uploads/bootstrap.php\";O:8:\"stdClass\":7:{s:2:\"id\";s:5:\"21382\";s:4:\"slug\";s:17:\"overwrite-uploads\";s:6:\"plugin\";s:31:\"overwrite-uploads/bootstrap.php\";s:11:\"new_version\";s:3:\"1.1\";s:3:\"url\";s:48:\"https://wordpress.org/plugins/overwrite-uploads/\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/plugin/overwrite-uploads.1.1.zip\";s:14:\"upgrade_notice\";s:77:\"Overwrite Uploads 1.1 now works without having to modify WordPress Core files\";}s:49:\"p2-new-post-categories/p2-new-post-categories.php\";O:8:\"stdClass\":7:{s:2:\"id\";s:5:\"43866\";s:4:\"slug\";s:22:\"p2-new-post-categories\";s:6:\"plugin\";s:49:\"p2-new-post-categories/p2-new-post-categories.php\";s:11:\"new_version\";s:3:\"0.3\";s:3:\"url\";s:53:\"https://wordpress.org/plugins/p2-new-post-categories/\";s:7:\"package\";s:69:\"https://downloads.wordpress.org/plugin/p2-new-post-categories.0.3.zip\";s:14:\"upgrade_notice\";s:138:\"The tag field is no longer used to store the category, which makes for a cleaner and less confusing experience. Requires p2 version 1.5.2.\";}s:51:\"password-confirm-action/password-confirm-action.php\";O:8:\"stdClass\":6:{s:2:\"id\";s:5:\"60304\";s:4:\"slug\";s:23:\"password-confirm-action\";s:6:\"plugin\";s:51:\"password-confirm-action/password-confirm-action.php\";s:11:\"new_version\";s:5:\"0.2.0\";s:3:\"url\";s:54:\"https://wordpress.org/plugins/password-confirm-action/\";s:7:\"package\";s:72:\"https://downloads.wordpress.org/plugin/password-confirm-action.0.2.0.zip\";}s:40:\"quick-navigation-interface/bootstrap.php\";O:8:\"stdClass\":7:{s:2:\"id\";s:5:\"60670\";s:4:\"slug\";s:26:\"quick-navigation-interface\";s:6:\"plugin\";s:40:\"quick-navigation-interface/bootstrap.php\";s:11:\"new_version\";s:3:\"0.6\";s:3:\"url\";s:57:\"https://wordpress.org/plugins/quick-navigation-interface/\";s:7:\"package\";s:73:\"https://downloads.wordpress.org/plugin/quick-navigation-interface.0.6.zip\";s:14:\"upgrade_notice\";s:71:\"Version 0.6 adds compatibility with the upcoming WordPress 4.5 release.\";}s:55:\"re-abolish-slavery-ribbon/re-abolish-slavery-ribbon.php\";O:8:\"stdClass\":7:{s:2:\"id\";s:5:\"25208\";s:4:\"slug\";s:25:\"re-abolish-slavery-ribbon\";s:6:\"plugin\";s:55:\"re-abolish-slavery-ribbon/re-abolish-slavery-ribbon.php\";s:11:\"new_version\";s:5:\"1.0.5\";s:3:\"url\";s:56:\"https://wordpress.org/plugins/re-abolish-slavery-ribbon/\";s:7:\"package\";s:74:\"https://downloads.wordpress.org/plugin/re-abolish-slavery-ribbon.1.0.5.zip\";s:14:\"upgrade_notice\";s:106:\"Version 1.0.5 updates the link to the NSF campaign to point to their current page about human trafficking.\";}s:36:\"rescue-children-banner/bootstrap.php\";O:8:\"stdClass\":7:{s:2:\"id\";s:5:\"47839\";s:4:\"slug\";s:22:\"rescue-children-banner\";s:6:\"plugin\";s:36:\"rescue-children-banner/bootstrap.php\";s:11:\"new_version\";s:3:\"1.0\";s:3:\"url\";s:53:\"https://wordpress.org/plugins/rescue-children-banner/\";s:7:\"package\";s:69:\"https://downloads.wordpress.org/plugin/rescue-children-banner.1.0.zip\";s:14:\"upgrade_notice\";s:16:\"Initial release.\";}s:34:\"simpletest-for-wordpress/start.php\";O:8:\"stdClass\":6:{s:2:\"id\";s:5:\"23254\";s:4:\"slug\";s:24:\"simpletest-for-wordpress\";s:6:\"plugin\";s:34:\"simpletest-for-wordpress/start.php\";s:11:\"new_version\";s:3:\"1.1\";s:3:\"url\";s:55:\"https://wordpress.org/plugins/simpletest-for-wordpress/\";s:7:\"package\";s:67:\"https://downloads.wordpress.org/plugin/simpletest-for-wordpress.zip\";}s:46:\"toppa-plugin-libraries-for-wordpress/start.php\";O:8:\"stdClass\":6:{s:2:\"id\";s:5:\"23271\";s:4:\"slug\";s:36:\"toppa-plugin-libraries-for-wordpress\";s:6:\"plugin\";s:46:\"toppa-plugin-libraries-for-wordpress/start.php\";s:11:\"new_version\";s:5:\"1.3.7\";s:3:\"url\";s:67:\"https://wordpress.org/plugins/toppa-plugin-libraries-for-wordpress/\";s:7:\"package\";s:85:\"https://downloads.wordpress.org/plugin/toppa-plugin-libraries-for-wordpress.1.3.7.zip\";}s:27:\"vip-scanner/vip-scanner.php\";O:8:\"stdClass\":6:{s:2:\"id\";s:5:\"27453\";s:4:\"slug\";s:11:\"vip-scanner\";s:6:\"plugin\";s:27:\"vip-scanner/vip-scanner.php\";s:11:\"new_version\";s:3:\"0.7\";s:3:\"url\";s:42:\"https://wordpress.org/plugins/vip-scanner/\";s:7:\"package\";s:58:\"https://downloads.wordpress.org/plugin/vip-scanner.0.7.zip\";}s:41:\"wordpress-importer/wordpress-importer.php\";O:8:\"stdClass\":6:{s:2:\"id\";s:5:\"14975\";s:4:\"slug\";s:18:\"wordpress-importer\";s:6:\"plugin\";s:41:\"wordpress-importer/wordpress-importer.php\";s:11:\"new_version\";s:5:\"0.6.1\";s:3:\"url\";s:49:\"https://wordpress.org/plugins/wordpress-importer/\";s:7:\"package\";s:67:\"https://downloads.wordpress.org/plugin/wordpress-importer.0.6.1.zip\";}}}','yes'),(15558,'_site_transient_update_themes','O:8:\"stdClass\":4:{s:12:\"last_checked\";i:1461721448;s:7:\"checked\";a:23:{s:10:\"2013-child\";s:0:\"\";s:12:\"2015-flexbox\";s:9:\"1.0-wpcom\";s:21:\"2015-modern-practices\";s:3:\"0.1\";s:2:\"_s\";s:5:\"1.0.0\";s:14:\"ng-first-theme\";s:0:\"\";s:2:\"p2\";s:5:\"1.5.8\";s:18:\"parent/baskerville\";s:4:\"1.08\";s:14:\"parent/busybee\";s:5:\"2.9.4\";s:12:\"parent/craft\";s:5:\"1.1.2\";s:12:\"parent/diner\";s:5:\"1.9.9\";s:15:\"parent/eighties\";s:5:\"1.0.2\";s:14:\"parent/exclusy\";s:3:\"1.1\";s:11:\"parent/memo\";s:3:\"1.1\";s:15:\"parent/papercut\";s:5:\"2.5.4\";s:13:\"parent/simone\";s:5:\"1.0.3\";s:14:\"parent/slender\";s:3:\"1.0\";s:12:\"twentyeleven\";s:3:\"2.4\";s:13:\"twentyfifteen\";s:3:\"1.5\";s:14:\"twentyfourteen\";s:3:\"1.7\";s:13:\"twentysixteen\";s:3:\"1.2\";s:9:\"twentyten\";s:3:\"2.1\";s:12:\"twentytwelve\";s:3:\"2.0\";s:13:\"wp-ang-meetup\";s:0:\"\";}s:8:\"response\";a:0:{}s:12:\"translations\";a:0:{}}','yes'),(15565,'finished_splitting_shared_terms','1','yes'),(15566,'site_icon','0','yes'),(15567,'medium_large_size_w','768','yes'),(15568,'medium_large_size_h','0','yes'),(15591,'_transient_doing_cron','1470247033.4489829540252685546875','yes'),(15592,'_site_transient_timeout_theme_roots','1470248867','no'),(15593,'_site_transient_theme_roots','a:24:{s:10:\"2013-child\";s:7:\"/themes\";s:12:\"2015-flexbox\";s:7:\"/themes\";s:21:\"2015-modern-practices\";s:7:\"/themes\";s:2:\"_s\";s:7:\"/themes\";s:14:\"ng-first-theme\";s:7:\"/themes\";s:2:\"p2\";s:7:\"/themes\";s:18:\"parent/baskerville\";s:7:\"/themes\";s:14:\"parent/busybee\";s:7:\"/themes\";s:12:\"parent/craft\";s:7:\"/themes\";s:12:\"parent/diner\";s:7:\"/themes\";s:15:\"parent/eighties\";s:7:\"/themes\";s:14:\"parent/exclusy\";s:7:\"/themes\";s:11:\"parent/memo\";s:7:\"/themes\";s:15:\"parent/papercut\";s:7:\"/themes\";s:13:\"parent/simone\";s:7:\"/themes\";s:14:\"parent/slender\";s:7:\"/themes\";s:12:\"twentyeleven\";s:7:\"/themes\";s:13:\"twentyfifteen\";s:7:\"/themes\";s:14:\"twentyfourteen\";s:7:\"/themes\";s:13:\"twentysixteen\";s:7:\"/themes\";s:9:\"twentyten\";s:7:\"/themes\";s:14:\"twentythirteen\";s:7:\"/themes\";s:12:\"twentytwelve\";s:7:\"/themes\";s:13:\"wp-ang-meetup\";s:7:\"/themes\";}','no');
/*!40000 ALTER TABLE `wp_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_postmeta`
--

DROP TABLE IF EXISTS `wp_postmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_postmeta`
--

LOCK TABLES `wp_postmeta` WRITE;
/*!40000 ALTER TABLE `wp_postmeta` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_postmeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_posts`
--

DROP TABLE IF EXISTS `wp_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`),
  KEY `post_name` (`post_name`(191))
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_posts`
--

LOCK TABLES `wp_posts` WRITE;
/*!40000 ALTER TABLE `wp_posts` DISABLE KEYS */;
INSERT INTO `wp_posts` VALUES (2,2,'2016-04-27 01:44:19','0000-00-00 00:00:00','','Auto Draft','','auto-draft','open','open','','','','','2016-04-27 01:44:19','0000-00-00 00:00:00','',0,'http://wp.dev/?p=2',0,'post','',0);
/*!40000 ALTER TABLE `wp_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_term_relationships`
--

DROP TABLE IF EXISTS `wp_term_relationships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_term_relationships`
--

LOCK TABLES `wp_term_relationships` WRITE;
/*!40000 ALTER TABLE `wp_term_relationships` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_term_relationships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_term_taxonomy`
--

DROP TABLE IF EXISTS `wp_term_taxonomy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_term_taxonomy`
--

LOCK TABLES `wp_term_taxonomy` WRITE;
/*!40000 ALTER TABLE `wp_term_taxonomy` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_term_taxonomy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_termmeta`
--

DROP TABLE IF EXISTS `wp_termmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `term_id` (`term_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_termmeta`
--

LOCK TABLES `wp_termmeta` WRITE;
/*!40000 ALTER TABLE `wp_termmeta` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_termmeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_terms`
--

DROP TABLE IF EXISTS `wp_terms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_terms`
--

LOCK TABLES `wp_terms` WRITE;
/*!40000 ALTER TABLE `wp_terms` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_terms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_usermeta`
--

DROP TABLE IF EXISTS `wp_usermeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_usermeta`
--

LOCK TABLES `wp_usermeta` WRITE;
/*!40000 ALTER TABLE `wp_usermeta` DISABLE KEYS */;
INSERT INTO `wp_usermeta` VALUES (1,1,'first_name',''),(2,1,'last_name',''),(3,1,'nickname','iandunn'),(4,1,'description',''),(5,1,'rich_editing','true'),(6,1,'comment_shortcuts','false'),(7,1,'admin_color','fresh'),(8,1,'use_ssl','0'),(9,1,'show_admin_bar_front','true'),(10,1,'wp_capabilities','a:1:{s:13:\"administrator\";b:1;}'),(11,1,'wp_user_level','10'),(12,1,'dismissed_wp_pointers','wp330_toolbar,wp330_saving_widgets,wp340_choose_image_from_library,wp340_customize_current_theme_link,wp350_media,wp360_revisions,wp360_locks,wp390_widgets'),(13,1,'show_welcome_panel','0'),(14,1,'wp_dashboard_quick_press_last_post_id','1'),(15,1,'closedpostboxes_dashboard','a:0:{}'),(16,1,'metaboxhidden_dashboard','a:1:{i:0;s:21:\"dashboard_quick_press\";}'),(17,1,'meta-box-order_dashboard','a:4:{s:6:\"normal\";s:19:\"dashboard_right_now\";s:4:\"side\";s:40:\"dashboard_activity,dashboard_quick_press\";s:7:\"column3\";s:17:\"dashboard_primary\";s:7:\"column4\";s:0:\"\";}'),(90,1,'closedpostboxes_settings_page_bgmp_settings','a:0:{}'),(91,1,'metaboxhidden_settings_page_bgmp_settings','a:0:{}'),(92,1,'wp_user-settings','editor=tinymce&libraryContent=browse&hidetb=1'),(93,1,'wp_user-settings-time','1461722327'),(94,1,'nav_menu_recently_edited','60'),(95,1,'managenav-menuscolumnshidden','a:4:{i:0;s:11:\"link-target\";i:1;s:11:\"css-classes\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";}'),(96,1,'metaboxhidden_nav-menus','a:5:{i:0;s:8:\"add-post\";i:1;s:8:\"add-bgmp\";i:2;s:12:\"add-post_tag\";i:3;s:15:\"add-post_format\";i:4;s:17:\"add-bgmp-category\";}'),(113,2,'first_name',''),(114,2,'last_name',''),(115,2,'nickname','2fa-tester'),(116,2,'description',''),(117,2,'rich_editing','true'),(118,2,'comment_shortcuts','false'),(119,2,'admin_color','fresh'),(120,2,'use_ssl','0'),(121,2,'show_admin_bar_front','true'),(122,2,'wp_capabilities','a:1:{s:11:\"contributor\";b:1;}'),(123,2,'wp_user_level','0'),(124,2,'dismissed_wp_pointers','wp350_media,wp360_revisions,wp360_locks,wp390_widgets'),(127,2,'googleauthenticator_passwords','{\"appname\":\"Default\",\"password\":\"$P$BQ9vFJHMs.yHLQuYov2fAFdWRZQKB41\"}'),(129,2,'googleauthenticator_description','wp.dev 2fa-tester'),(130,2,'googleauthenticator_relaxedmode','disabled'),(131,2,'googleauthenticator_secret','FSFMTBLXN52ALUSY'),(134,2,'googleauthenticator_lasttimeslot','47182718'),(137,2,'session_tokens','a:2:{s:64:\"d36a71e827ad50f254b14c0f790bc69c89c4ee76ee09ddec5d0446f749174f15\";a:4:{s:10:\"expiration\";i:1461893806;s:2:\"ip\";s:9:\"127.0.0.1\";s:2:\"ua\";s:19:\"Symfony2 BrowserKit\";s:5:\"login\";i:1461721006;}s:64:\"65d97a9a621598947d7b824146cd7289debac10a1c3db71d60d9b8379aa7df70\";a:4:{s:10:\"expiration\";i:1461894258;s:2:\"ip\";s:12:\"192.168.50.1\";s:2:\"ua\";s:82:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:47.0) Gecko/20100101 Firefox/47.0\";s:5:\"login\";i:1461721458;}}'),(138,2,'wp_dashboard_quick_press_last_post_id','2'),(140,1,'session_tokens','a:1:{s:64:\"48de70878dc983f6d9dbd1185a7ef1a724d042b79549c272bacffd5a6255c7b3\";a:4:{s:10:\"expiration\";i:1461895129;s:2:\"ip\";s:12:\"192.168.50.1\";s:2:\"ua\";s:82:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:47.0) Gecko/20100101 Firefox/47.0\";s:5:\"login\";i:1461722329;}}'),(142,2,'gapup_login_nonce','a:2:{s:5:\"nonce\";s:32:\"e048435afb95908a428a77fff20122b1\";s:10:\"expiration\";i:1470247038;}');
/*!40000 ALTER TABLE `wp_usermeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_users`
--

DROP TABLE IF EXISTS `wp_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`),
  KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_users`
--

LOCK TABLES `wp_users` WRITE;
/*!40000 ALTER TABLE `wp_users` DISABLE KEYS */;
INSERT INTO `wp_users` VALUES (1,'iandunn','$P$B1iqia8j7BOHwk2MwRl7d4f7gq4doP.','iandunn','ian@iandunn.name','','2014-03-20 07:33:21','$P$BP4scpxgn6f0tPulP1y00qbTWrhPFh1',0,'iandunn'),(2,'2fa-tester','$P$BVwA39Q7EWNc/cBWcUB2NgWEp8IPsC.','2fa-tester','ian.dunn@automattic.com','','2014-04-27 00:18:13','',0,'2fa-tester');
/*!40000 ALTER TABLE `wp_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-03 17:58:12
