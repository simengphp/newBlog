/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : taobao

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-10-23 21:56:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `zan_nav`
-- ----------------------------
DROP TABLE IF EXISTS `zan_nav`;
CREATE TABLE `zan_nav` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '导航名称',
  `url` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT '0',
  `updated_at` int(11) DEFAULT '0',
  `deleted_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='导航';

-- ----------------------------
-- Records of zan_nav
-- ----------------------------
INSERT INTO `zan_nav` VALUES ('1', '9块9包邮', '11', '2', '1540298860', '1540298954', null);
