-- MySQL dump 10.13  Distrib 5.5.36, for osx10.11 (x86_64)
--
-- Host: localhost    Database: yii
-- ------------------------------------------------------
-- Server version	5.5.36-log

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
-- Table structure for table `pop_admin_log`
--

DROP TABLE IF EXISTS `pop_admin_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pop_admin_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `route` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `created_at` int(10) NOT NULL,
  `user_id` int(10) NOT NULL DEFAULT '0',
  `ip` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pop_article`
--

DROP TABLE IF EXISTS `pop_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pop_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL COMMENT '标题',
  `category` varchar(50) NOT NULL COMMENT '分类',
  `category_id` int(11) NOT NULL,
  `author` varchar(100) NOT NULL COMMENT '作者',
  `created_at` int(10) NOT NULL,
  `updated_at` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '状态',
  `cover` varchar(255) DEFAULT NULL COMMENT '封面',
  `comment` int(11) NOT NULL,
  `up` int(11) NOT NULL DEFAULT '0',
  `down` int(11) NOT NULL DEFAULT '0',
  `view` int(11) NOT NULL DEFAULT '0',
  `desc` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `source` varchar(50) NOT NULL,
  `deleted_at` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `pop_article_data`
--

DROP TABLE IF EXISTS `pop_article_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pop_article_data` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `pop_article_tag`
--

DROP TABLE IF EXISTS `pop_article_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pop_article_tag` (
  `article_id` int(10) NOT NULL,
  `tag_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pop_article_tag`
--

LOCK TABLES `pop_article_tag` WRITE;
/*!40000 ALTER TABLE `pop_article_tag` DISABLE KEYS */;
INSERT INTO `pop_article_tag` VALUES (4643,1),(4643,2),(4644,1),(4645,1),(4646,1),(4647,1),(4648,1),(4649,1);
/*!40000 ALTER TABLE `pop_article_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pop_auth`
--

DROP TABLE IF EXISTS `pop_auth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pop_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `source` varchar(255) NOT NULL,
  `source_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pop_auth`
--

LOCK TABLES `pop_auth` WRITE;
/*!40000 ALTER TABLE `pop_auth` DISABLE KEYS */;
INSERT INTO `pop_auth` VALUES (1,2,'qq','CFC79CFBB4667EB6C0A7E93C759A3328'),(2,3,'qq','CD19C8890B58E67EA555C2852FA96247'),(3,4,'qq','65ED6B1845CE7EF9BAAFA7228A63403D'),(4,5,'qq','CCAA5434AB96B17C3260F648C895442D');
/*!40000 ALTER TABLE `pop_auth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pop_auth_assignment`
--

DROP TABLE IF EXISTS `pop_auth_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pop_auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `pop_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `pop_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pop_auth_assignment`
--

LOCK TABLES `pop_auth_assignment` WRITE;
/*!40000 ALTER TABLE `pop_auth_assignment` DISABLE KEYS */;
INSERT INTO `pop_auth_assignment` VALUES ('author','2',1443080982),('superAdmin','1',1443080982);
/*!40000 ALTER TABLE `pop_auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pop_auth_item`
--

DROP TABLE IF EXISTS `pop_auth_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pop_auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `pop_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `pop_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pop_auth_item`
--

LOCK TABLES `pop_auth_item` WRITE;
/*!40000 ALTER TABLE `pop_auth_item` DISABLE KEYS */;
INSERT INTO `pop_auth_item` VALUES ('/*',2,NULL,NULL,NULL,1458640575,1458640575),('/admin-log/*',2,NULL,NULL,NULL,1458640575,1458640575),('/admin-log/index',2,NULL,NULL,NULL,1458640575,1458640575),('/admin-log/view',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/*',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/assignment/*',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/assignment/assign',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/assignment/index',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/assignment/search',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/assignment/view',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/default/*',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/default/index',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/menu/*',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/menu/create',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/menu/delete',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/menu/index',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/menu/update',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/menu/view',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/permission/*',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/permission/assign',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/permission/create',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/permission/delete',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/permission/index',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/permission/search',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/permission/update',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/permission/view',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/role/*',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/role/assign',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/role/create',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/role/delete',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/role/index',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/role/search',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/role/update',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/role/view',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/route/*',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/route/assign',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/route/create',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/route/index',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/route/search',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/rule/*',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/rule/create',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/rule/delete',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/rule/index',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/rule/update',2,NULL,NULL,NULL,1458640575,1458640575),('/admin/rule/view',2,NULL,NULL,NULL,1458640575,1458640575),('/article/*',2,NULL,NULL,NULL,1458640575,1458640575),('/article/create',2,NULL,NULL,NULL,1458640575,1458640575),('/article/delete',2,NULL,NULL,NULL,1458640575,1458640575),('/article/hard-delete',2,NULL,NULL,NULL,1458640575,1458640575),('/article/index',2,NULL,NULL,NULL,1458640575,1458640575),('/article/reduction',2,NULL,NULL,NULL,1458640575,1458640575),('/article/trash',2,NULL,NULL,NULL,1458640575,1458640575),('/article/update',2,NULL,NULL,NULL,1458640575,1458640575),('/article/upload',2,NULL,NULL,NULL,1458640575,1458640575),('/article/view',2,NULL,NULL,NULL,1458640575,1458640575),('/article/webupload',2,NULL,NULL,NULL,1458640575,1458640575),('/category/*',2,NULL,NULL,NULL,1458640575,1458640575),('/category/create',2,NULL,NULL,NULL,1458640575,1458640575),('/category/delete',2,NULL,NULL,NULL,1458640575,1458640575),('/category/index',2,NULL,NULL,NULL,1458640575,1458640575),('/category/update',2,NULL,NULL,NULL,1458640575,1458640575),('/category/view',2,NULL,NULL,NULL,1458640575,1458640575),('/config/*',2,NULL,NULL,NULL,1458640575,1458640575),('/config/create',2,NULL,NULL,NULL,1458640575,1458640575),('/config/delete',2,NULL,NULL,NULL,1458640575,1458640575),('/config/index',2,NULL,NULL,NULL,1458640575,1458640575),('/config/update',2,NULL,NULL,NULL,1458640575,1458640575),('/config/view',2,NULL,NULL,NULL,1458640575,1458640575),('/database/*',2,NULL,NULL,NULL,1458640575,1458640575),('/database/export/*',2,NULL,NULL,NULL,1458640575,1458640575),('/database/export/index',2,NULL,NULL,NULL,1458640575,1458640575),('/database/export/init',2,NULL,NULL,NULL,1458640575,1458640575),('/database/export/optimize',2,NULL,NULL,NULL,1458640575,1458640575),('/database/export/start',2,NULL,NULL,NULL,1458640575,1458640575),('/database/import/*',2,NULL,NULL,NULL,1458640575,1458640575),('/database/import/del',2,NULL,NULL,NULL,1458640575,1458640575),('/database/import/index',2,NULL,NULL,NULL,1458640575,1458640575),('/database/import/init',2,NULL,NULL,NULL,1458640575,1458640575),('/database/import/start',2,NULL,NULL,NULL,1458640575,1458640575),('/debug/*',2,NULL,NULL,NULL,1458640575,1458640575),('/debug/default/*',2,NULL,NULL,NULL,1458640575,1458640575),('/debug/default/db-explain',2,NULL,NULL,NULL,1458640575,1458640575),('/debug/default/download-mail',2,NULL,NULL,NULL,1458640575,1458640575),('/debug/default/index',2,NULL,NULL,NULL,1458640575,1458640575),('/debug/default/toolbar',2,NULL,NULL,NULL,1458640575,1458640575),('/debug/default/view',2,NULL,NULL,NULL,1458640575,1458640575),('/gii/*',2,NULL,NULL,NULL,1458640575,1458640575),('/gii/default/*',2,NULL,NULL,NULL,1458640575,1458640575),('/gii/default/action',2,NULL,NULL,NULL,1458640575,1458640575),('/gii/default/diff',2,NULL,NULL,NULL,1458640575,1458640575),('/gii/default/index',2,NULL,NULL,NULL,1458640575,1458640575),('/gii/default/preview',2,NULL,NULL,NULL,1458640575,1458640575),('/gii/default/view',2,NULL,NULL,NULL,1458640575,1458640575),('/gridview/*',2,NULL,NULL,NULL,1458640575,1458640575),('/gridview/export/*',2,NULL,NULL,NULL,1458640575,1458640575),('/gridview/export/download',2,NULL,NULL,NULL,1458640575,1458640575),('/nav/*',2,NULL,NULL,NULL,1458640575,1458640575),('/nav/create',2,NULL,NULL,NULL,1458640575,1458640575),('/nav/delete',2,NULL,NULL,NULL,1458640575,1458640575),('/nav/index',2,NULL,NULL,NULL,1458640575,1458640575),('/nav/update',2,NULL,NULL,NULL,1458640575,1458640575),('/nav/view',2,NULL,NULL,NULL,1458640575,1458640575),('/page/*',2,NULL,NULL,NULL,1458640575,1458640575),('/page/create',2,NULL,NULL,NULL,1458640575,1458640575),('/page/delete',2,NULL,NULL,NULL,1458640575,1458640575),('/page/index',2,NULL,NULL,NULL,1458640575,1458640575),('/page/update',2,NULL,NULL,NULL,1458640575,1458640575),('/page/view',2,NULL,NULL,NULL,1458640575,1458640575),('/site/*',2,NULL,NULL,NULL,1458640575,1458640575),('/site/demo',2,NULL,NULL,NULL,1458640575,1458640575),('/site/error',2,NULL,NULL,NULL,1458640575,1458640575),('/site/index',2,NULL,NULL,NULL,1458640575,1458640575),('/site/login',2,NULL,NULL,NULL,1458640575,1458640575),('/site/logout',2,NULL,NULL,NULL,1458640575,1458640575),('/system/*',2,NULL,NULL,NULL,1458640575,1458640575),('/system/config',2,NULL,NULL,NULL,1458640575,1458640575),('/system/webupload',2,NULL,NULL,NULL,1458640575,1458640575),('/user/*',2,NULL,NULL,NULL,1458640575,1458640575),('/user/create',2,NULL,NULL,NULL,1458640575,1458640575),('/user/delete',2,NULL,NULL,NULL,1458640575,1458640575),('/user/index',2,NULL,NULL,NULL,1458640575,1458640575),('/user/reset-password',2,NULL,NULL,NULL,1458640575,1458640575),('/user/update',2,NULL,NULL,NULL,1458640575,1458640575),('/user/view',2,NULL,NULL,NULL,1458640575,1458640575),('author',1,NULL,NULL,NULL,1443080982,1443080982),('superAdmin',1,'超级管理员',NULL,NULL,1443080982,1443408507);
/*!40000 ALTER TABLE `pop_auth_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pop_auth_item_child`
--

DROP TABLE IF EXISTS `pop_auth_item_child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pop_auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `pop_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `pop_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pop_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `pop_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pop_auth_item_child`
--

LOCK TABLES `pop_auth_item_child` WRITE;
/*!40000 ALTER TABLE `pop_auth_item_child` DISABLE KEYS */;
INSERT INTO `pop_auth_item_child` VALUES ('superAdmin','/*');
/*!40000 ALTER TABLE `pop_auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pop_auth_rule`
--

DROP TABLE IF EXISTS `pop_auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pop_auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pop_auth_rule`
--

LOCK TABLES `pop_auth_rule` WRITE;
/*!40000 ALTER TABLE `pop_auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `pop_auth_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pop_category`
--

DROP TABLE IF EXISTS `pop_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pop_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL COMMENT '名字',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父id',
  `created_at` int(10) NOT NULL,
  `updated_at` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pop_category`
--

LOCK TABLES `pop_category` WRITE;
/*!40000 ALTER TABLE `pop_category` DISABLE KEYS */;
INSERT INTO `pop_category` VALUES (1,'励志',0,1449050838,1449050838,'lizhi'),(2,'美文',0,1449050838,1449050838,'meiwen'),(3,'健康',0,1449050838,1449050838,'jiankang'),(4,'野史',0,1449067684,1449067684,'yeshi'),(5,'搞笑',0,1449068001,1449068001,'gaoxiao'),(6,'两性',0,1449129937,1449129937,'liangxing'),(7,'亲子',0,1449129937,1449129937,'qinzi'),(9,'汽车',0,1450609214,1450609214,'qiche'),(10,'测试',0,0,0,'ceshi');
/*!40000 ALTER TABLE `pop_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pop_comment`
--

DROP TABLE IF EXISTS `pop_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pop_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL COMMENT '内容',
  `created_at` int(10) NOT NULL,
  `updated_at` int(10) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `up` int(11) NOT NULL DEFAULT '0',
  `down` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pop_comment`
--

LOCK TABLES `pop_comment` WRITE;
/*!40000 ALTER TABLE `pop_comment` DISABLE KEYS */;
INSERT INTO `pop_comment` VALUES (1,1,3228,'hehe',1449837393,1449837393,0,0,0),(2,1,3212,'jjjj',1449839506,1449839506,0,0,0),(3,2,2816,'真吓人呀',1449988976,1449988976,0,0,0),(4,1,2816,'真的假的啊！！！',1449990175,1449990175,0,0,0),(5,1,6291,'咋都没人评价',1451571848,1451571848,0,0,0),(6,1,6274,'哈哈',1451571868,1451571868,0,0,0),(7,1,5888,'喝喝',1452402150,1452402150,0,0,0),(8,1,5120,'111',1458096406,1458096406,0,0,0),(9,1,5120,'111',1458096409,1458096409,0,0,0),(10,1,5120,'111',1458096412,1458096412,0,0,0),(11,1,5120,'111',1458096418,1458096418,0,0,0),(12,1,5120,'111',1458096422,1458096422,0,0,0),(13,1,5120,'111',1458096428,1458096428,0,0,0),(14,1,5120,'111',1458096431,1458096431,0,0,0),(15,1,5120,'111',1458096434,1458096434,0,0,0),(16,1,5120,'111',1458096438,1458096438,0,0,0),(17,1,5120,'111',1458096444,1458096444,0,0,0),(18,1,5120,'111',1458096447,1458096447,0,0,0);
/*!40000 ALTER TABLE `pop_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pop_config`
--

DROP TABLE IF EXISTS `pop_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pop_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '配置键值',
  `value` text NOT NULL COMMENT '配置值',
  `extra` varchar(255) NOT NULL DEFAULT '',
  `desc` varchar(255) NOT NULL COMMENT '配置描述',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pop_config`
--

LOCK TABLES `pop_config` WRITE;
/*!40000 ALTER TABLE `pop_config` DISABLE KEYS */;
/*!40000 ALTER TABLE `pop_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pop_gather`
--

DROP TABLE IF EXISTS `pop_gather`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pop_gather` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `url_org` varchar(255) NOT NULL,
  `res` tinyint(1) NOT NULL DEFAULT '1',
  `result` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9672 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pop_menu`
--

DROP TABLE IF EXISTS `pop_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pop_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` text,
  `icon` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `pop_menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `pop_menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pop_menu`
--

LOCK TABLES `pop_menu` WRITE;
/*!40000 ALTER TABLE `pop_menu` DISABLE KEYS */;
INSERT INTO `pop_menu` VALUES (1,'系统管理',NULL,NULL,2,NULL,'fa-cog'),(2,'菜单管理',1,'/admin/menu/index',NULL,NULL,''),(15,'用户管理',1,'/admin/assignment/index',NULL,NULL,''),(16,'路由管理',1,'/admin/route/index',NULL,NULL,''),(17,'角色管理',1,'/admin/role/index',NULL,NULL,''),(20,'控制面板',NULL,'/site/index',1,NULL,'fa-dashboard'),(21,'文章管理',NULL,NULL,3,NULL,'fa-book'),(22,'文章列表',21,'/article/index',1,NULL,''),(23,'发布文章',21,'/article/create',2,NULL,''),(24,'分类管理',21,'/category/index',3,NULL,''),(25,'数据库备份',NULL,NULL,4,NULL,'fa-book'),(26,'备份',25,'/database/export/index',NULL,NULL,''),(27,'还原',25,'/database/import/index',NULL,NULL,''),(28,'操作记录',1,'/admin-log/index',0,NULL,'');
/*!40000 ALTER TABLE `pop_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pop_nav`
--

DROP TABLE IF EXISTS `pop_nav`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pop_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '名称',
  `route` varchar(255) NOT NULL COMMENT '路由',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pop_nav`
--

LOCK TABLES `pop_nav` WRITE;
/*!40000 ALTER TABLE `pop_nav` DISABLE KEYS */;
INSERT INTO `pop_nav` VALUES (1,'励志','article/1'),(2,'美文','article/2');
/*!40000 ALTER TABLE `pop_nav` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pop_spider`
--

DROP TABLE IF EXISTS `pop_spider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pop_spider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '标识',
  `title` varchar(100) NOT NULL COMMENT '名称',
  `domain` varchar(255) NOT NULL COMMENT '域名',
  `page_dom` varchar(255) NOT NULL COMMENT '分页链接元素',
  `list_dom` varchar(255) NOT NULL COMMENT '列表链接元素',
  `time_dom` varchar(255) DEFAULT NULL COMMENT '内容页时间元素',
  `content_dom` varchar(255) NOT NULL COMMENT '内容页内容元素',
  `title_dom` varchar(255) NOT NULL COMMENT '内容页标题元素',
  `target_category` varchar(255) NOT NULL COMMENT '目标分类',
  `target_category_url` varchar(255) NOT NULL COMMENT '目标分类地址',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pop_spider`
--

LOCK TABLES `pop_spider` WRITE;
/*!40000 ALTER TABLE `pop_spider` DISABLE KEYS */;
INSERT INTO `pop_spider` VALUES (1,'chncomic','中国国际动漫网','http://www.chncomic.com/','.page_div ul li a','.info_list h1 a','.time span','.article_con','.w_640 h1.article_title','影视','http://www.chncomic.com/info/yingshi/'),(2,'neihan','内涵段子','http://neihanshequ.com/','','.share_url',NULL,'.content-wrapper .upload-txt','.name-time-wrapper .name','段子','http://neihanshequ.com/'),(3,'tiejiong','微信热文','http://www.tiejiong.com','.page li a','.mainnews li .testimg a','.listltitle .spanimg3','.wzbody','.listltitle center h3','励志,美文,健康,野史,搞笑,两性,汽车','http://www.tiejiong.com/lizhi/,http://www.tiejiong.com/meiwen/,http://www.tiejiong.com/jiankang/,http://www.tiejiong.com/lishi/,http://www.tiejiong.com/duanzi/,http://www.tiejiong.com/yangsheng/,http://www.tiejiong.com/qiche/'),(4,'fzn','fzn','http://fzn.cc','','article.excerpt h2 a','time.muted','article.article-content','h1 a','测试','http://fzn.cc/ceshi/');
/*!40000 ALTER TABLE `pop_spider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pop_suggest`
--

DROP TABLE IF EXISTS `pop_suggest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pop_suggest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `created_at` int(10) NOT NULL,
  `updated_at` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pop_suggest`
--

LOCK TABLES `pop_suggest` WRITE;
/*!40000 ALTER TABLE `pop_suggest` DISABLE KEYS */;
/*!40000 ALTER TABLE `pop_suggest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pop_tag`
--

DROP TABLE IF EXISTS `pop_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pop_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `article` int(11) NOT NULL DEFAULT '0' COMMENT '具有该标签的文章数（冗余字段）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pop_tag`
--

LOCK TABLES `pop_tag` WRITE;
/*!40000 ALTER TABLE `pop_tag` DISABLE KEYS */;
INSERT INTO `pop_tag` VALUES (1,'hehe',3),(2,'haha',1),(3,'xixi',0);
/*!40000 ALTER TABLE `pop_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pop_user`
--

DROP TABLE IF EXISTS `pop_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pop_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pop_user`
--

LOCK TABLES `pop_user` WRITE;
/*!40000 ALTER TABLE `pop_user` DISABLE KEYS */;
INSERT INTO `pop_user` VALUES (1,'hehe','1lQl4TG6sYlyWRqXZEWL0ZhQkPATVnMs','$2y$13$lYlhIcBcs6jBr7yTd6YrWueckcs.Cvx70juIHs6wEfjtUwnA318VW',NULL,'hehe@qq.com',10,1441766741,1458640427);
/*!40000 ALTER TABLE `pop_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pop_vote`
--

DROP TABLE IF EXISTS `pop_vote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pop_vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(10) NOT NULL,
  `updated_at` int(10) NOT NULL,
  `action` varchar(20) NOT NULL DEFAULT 'up',
  `type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pop_vote`
--

LOCK TABLES `pop_vote` WRITE;
/*!40000 ALTER TABLE `pop_vote` DISABLE KEYS */;
INSERT INTO `pop_vote` VALUES (1,'article',2,1452402739,1452402739,'up',5888);
/*!40000 ALTER TABLE `pop_vote` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-22 18:07:19
